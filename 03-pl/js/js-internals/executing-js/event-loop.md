# Event loop

Browser JS execution flow, as well as in Node, is based on an event loop. More precisely, it is a browser that implements an event loop, not the JS engine; similarly, in Node, the event loop is provided by libuv.

The HTML standard prescribes the behaviour of the event loop and the tasks (as well as their order) that should be completed on each pass through the loop.

However, some things have a different implementation in all browsers, while some details diverge from browser to browser. Things in the former category go straight against the spec, while things in the latter are mostly due to the small degree of freedom the specs leaves to implementors.

* WHATWG HTML Living Standard - Chapter 8. Web application APIs - Event loops
https://html.spec.whatwg.org/multipage/webappapis.html#event-loops

Modern browsers seems to have a number of event loops; some browsers provide an event loop for each open page, plus they have some sort of main loop (the exact details are unclear but the spec talks about event loops, in plural).

## Event Loop

The concept of an event loop is based on the actual infinite loop, such as the while loop. Everything a JS engine does is defined within the loop's body.

As a rough and simplifed sketch, and a probably incorrect one, here's a possible implementation of an event loop:

```js
while(1) {
  executeSyncJS()
  handleInputEvents()
  if (! renderQueue.empty) {
    handleRequestAnimationFrame()
    calculateCSSStyles()
    calculateHTMLLayers()
    paint()
  }
  handleInputEvents()
  if (! microtaskQueue.empty) handleMicrotaskQueue()
  handleInputEvents()
  if (! taskQueue.empty) handleTaskQueue()
  handleInputEvents()
}
```

Each iteration through the loop is called a *tick*. Browser handles a number of jobs on each tick. If we imagine an event loop as a circle, then we can imagine differnt jobs as the checkpoints spread around the circle. Each checkpoint represents an opportunity for the browser to handle a specific job. The browser proceeds through the loop in a clockwise manner, stoping at each checkpoint to handle that specific job if there are messages waiting.

Although there is no consesus on which exact checkpoints should be present and in which exact order, some of the certain ones include:
- (macro) task queue
- rAF queue
- render queue
- microtask queue
- handling input (mouse/keyboard) events

In the example code above the job to handle input events appears several times to illustrate that it is prioritized above all others. But the mechanism to pioritaze jobs may be realized by some other way (although I'm under impression that the browser cannot jump to arbitrary jobs in an out-of-order manner; it seems that once a checkpoint is through, but a new message related to that checkpoint arrives, it has to wait for processing on the next tick).

For instance, if there are tasks enqueued in the (macro) task queue, once the browser gets to that checkpoint it will assert that, indeed, there are tasks waiting. At that time the browser will make a note of the present task and proceed to execute each task, in order. Once finished, the browser moves on to the next checkpoint. However, should a new task arrive at this time, the browser will not handle it in this pass - the new task(s) will have to wait for the next tick (once around the block).

Modern browsers are highly optimized apps, so they won't run mindlessly through the loop; if there's nothing to do, they may take short naps.

>Rendering never happens while the JS engine executes (sync) JS code no matter how long it takes.
This is the *blocking* behaviour of JS. This may happen when there are a lot of calculations involved, but 99% of the time it is due to a programming error (that e.g. lead to an infinite loop).

On the other hand, the fact that rendering stalls until the JS code is executing means we can the creation, addition and styling of DOM elements that we do via JS won't have unpredicateble results - all elements will be added to the DOM at once and only once the code is finished executing - visitors won't see any intermediate DOM states.


While the JS engine is executing JS code everything else waits *freezing*: user interactions, mouse movements, page animations, including GIFs (GIF animation is run/controlled by browser, right?). Changes to the DOM are registered. This shows that the events are registered on a separate thread by WebAPI or perhaps by another part of the browser (?). So the events do get registered even when the main thread is blocking; because as soon as the JS engine yields control back to the browser, it will suddenly run all the queued events causing a lot of comotion.

>Even when the main thread is blocked, another browser process running off the main thread is still registering events, such as scrolling. When the main browser process regains control, it executes all the queued scrolling events in a short succession - causing the *rapid fire* effect - as the page undergoes a seizure, jerk-scrolling up and down abnormally.


When JS takes too long, the browser will raises an alert that "Page is taking too long…", suggesting you to kill it, which, if accepted, takes that page (usually only the faulting page) down. If not accepted, the browser will give it a beat before it prompts you into murder again. This indicates that the browser seems to be the more important player, i.e. it is owner of the main thread; which is the main thread of execution; and on which the DOM lives and the JS code is executed. So the browser gives control to JS engine to execute JS code but expects it back soon (is JS engine really another process; it surely goes ujnder the mask of a browser process, but can it be said that browser yields control to JS engine process?).

If you think the JS code will take too long to run, either run it in a worker, or at least split the computation into batches and schedule each batch to run in one tick; i.e. defer the computation of chucks using `setTimeout`. These periodic returns to the event loop between the execution of chunks provide just enough air for the main browser process to do complete other jobs. Interestingly, both situations are comparable speed-wise, even though the former is detrimental to UX.

In summary: split a costly computation and schedule the chunks to execute for a while on each tick, rather than executing all code at once. That way there will be enough time left for the browser to complete all its tasks, ensuring smooth and pleasent UX.



## NOT 100% UNCLEAR

- A browser controls/runs through the event loop (i.e. event loop belongs to browser), and it may have more than one event loops (e.g. for each page), but surely a JS engine does not have its own, separate, event loop?
- In fact, a JS engine is not even aware that an event loop exists, right?
- the main thread is "owned", at least initially by the browsers, which yields control to the JS engine. Or, maybe better said that the control switches between the main, DOM-hosting, part of the browser and the JS engine. All that is on the main thread: the DOM, JS execution, some other stuff probably too. So when JS executes, the "main" browser part cannot paint the screen, thus everything appears frozen, i.e. JS execution is blocking. Unless some (what? code?) is offloaded to WebAPI. WebAPI can spawn as many threads as needed, right? And WebAPI messages the results back to JS engine via task and other queues (on the money?)
- The Web API calls are executed off the main thread, but can we send arbitrary JS code to be executed off the main thread? seems like a no... Seems like no "useful" JS code can be moved off the main thread for execution. Sure we can use an aux thread to sleep x ms, but then the meat of the code (the callback) is executed back on the main thread. But can we execute the bulk of code there and just have it send us back the result: yes, we can! with webworkers if by no other mean. But again, webworkers cannot do DOM manipulation; but surely they can execute pure functions off the main thread and just send us the result back; hmm... what would be the practical examples (factorial of 100? :).






## JS.info on event loop

Examples of tasks include
- When an external script is (down)loaded, a task is to execute it.
- When the mouse is moved, the task is to dispatch `onmousemove` event and execute handlers.
- When the time is due for a scheduled `setTimeout`, the task is to run its callback.


## A more detailed event loop algorithm

A more detailed event loop algorithm (though still simplified compared to the specification):

1. Dequeue and run the oldest task from the macrotask queue (e.g. "script").
2. Execute all microtasks:
  - 2.1 While the microtask queue is not empty:
    - 2.1.1 Dequeue and run the oldest microtask.
3. Render changes if any.
4. If the macrotask queue is empty, wait till a macrotask appears.
5. Go to step 1.

To schedule a new macrotask use `setTimeout()`. It may be used to split a big calculation-heavy task into pieces, for the browser to be able to react to user events and show progress between them. Also, used in event handlers to schedule an action after the event is fully handled (bubbling done).

To schedule a new microtask use `queueMicrotask()`. Also promise handlers go through the microtask queue. There's no UI or network event handling between microtasks: they run immediately one after another. So one may want to `queueMicrotask` to execute a function asynchronously, but within the environment state.


When an error is thrown and uncaught within a promise chain or a microtask, it stops further execution of that specific chain of microtasks but doesn't stop the execution of other promise chains or microtasks.


```js
// Before Promises, the diagram was:
is callstack clear
  ? run callback queue
  : run callstack

// after the Promises it is:
callstack
  ? run callstack
  : micro task queue has task
    ? run microtask
    : run callback queue
```

That is, to run either micro or macro tasks, the call stack must be empty. Microtasks run before macrotasks (macrotasks are queued on the callback queue).



### Web Workers

For long heavy calculations that shouldn't block the event loop, we can use Web Workers. That's a way to run code in another, parallel thread. Web Workers can exchange messages with the main process, but they have their own variables, and their own event loop. Web Workers do not have access to DOM, so they are useful, mainly, for calculations, to use multiple CPU cores simultaneously.
