# Async

You Don't Know JS: Async & Performance, Chapter 1: Async
https://github.com/getify/You-Dont-Know-JS/blob/1st-ed/async%20%26%20performance/ch1.md


Although a JS program is authored as a single file, it is almost certainly later split into several chunks (commonly functions), only one of which is going to execute *now* and the rest *later*. Tasks (chunks) that cannot complete immediately will be completed later, *asynchronously*, rather then executing everything immediately, blocking the execution every time a function waits for some data.

Initially, the simplest way of "waiting" was used, which was in the form of *callback functions*. 

Whenever you wrap some code in a callback function to be executed in response to some event (timer, mouse click, Ajax response, etc.), you are introducing asynchrony.

```js
// SYNC EXECUTION
// this call blocks until the response arrives:
let data = ajax("https://example/api/");
console.log(data);

// ASYNC EXECUTION with callbacks:
// execution continues, only later, when data arrives, callback is executed
ajax("https://example/api/", data => console.log(data));
```

## Async Console

Different host environments handle `console` calls differently because any IO is slow and blocking. To improve performance, most browsers will handle console IO asynchronously in the background. This means that it could happen that a call like `console.log(obj)` may not show the objects snapshot as it was at the exact time of the call. However, the conditions that may lead to console IO being deferred are not clear, nor always observable.

If you run into this rare scenario, the best option is to use breakpoints in your JS debugger instead of relying on console output.

The next best option would be to force a "snapshot" of the object in question by serializing it to a string, like with JSON.stringify(..).


## Event Loop

*What the heck is the event loop anyway?* by Philip Roberts at JSConf EU
https://www.youtube.com/watch?v=8aGhZQkoFbQ

Despite clearly allowing asynchronous JS code, up until ES6, JavaScript itself never actually had any direct notion of asynchrony built into it. The JS engine itself has never done anything more than execute a single chunk of your program at any given moment, when asked to.

The JS engine doesn't run in isolation but inside a *hosting environment*, which is usually a web browser or Node.js. Although JS engine being single threaded, the hosting environment, be it a browser or Node with its C++ APIs, is not. These hosting environments have an intrinsic mechanism, called the *event loop*, for handling execution of multiple chunks of program, over time, at each moment invoking the JS engine.

In other words, the JS engine had no innate sense of time, but has instead been an on-demand execution environment for any arbitrary snippet of JS. It's the surrounding environment that has always scheduled *events* (JS code executions).

For example, when a JS program makes an Ajax request to fetch some data, you set up a *response* code in the form of a *callback function*. The browser then listens for the response from a server and when it receives the data, it *schedules* the callback function to be executed by inserting it into the *callback queue*.

**Event loop** is a code, in a JS hosting environment, that runs continuously in a loop, and each iteration of this loop is called a *tick*. For each tick, the callback queue is checked and if there's an event waiting (like a function callback), it is taken off and executed.

The `setTimeout` function doesn't put the callback in the callback queue, but it sets up a timer; when the timer expires, the hosting environment places the callback in the callback queue, which is, on the next tick, picked up by the event loop and executed. If the queue is stuffed with events, the callback waits for its turn, which means that the the time interval specified in the timeout is not guaranteed to run on time. Even in a setTimeout with 0 ms delay, the callback is also placed on the queue and gets executed, not immediately, but on the next tick.

In summary, a program is generally broken up into lots of small chunks, which happen one after the other in the event loop queue. Technically, other events, not related directly to the program, may be interleaved within the same callback queue (browser's repaint event, layout calculations, animations, etc.).

Since ES6, the jurisdiction of the JS engine is also within JS engine, rather then just the hosting environment. The reason for the change are *Promises* because they require the ability to have direct fine-grained control over scheduling operations on the event loop queue.

## Parallel Threading

async is about the gap between now and later. But parallel is about things being able to occur simultaneously.

The most common tools for parallel computing are processes and threads. Processes and threads execute independently and may execute simultaneously: on separate processors, or even separate computers, but multiple threads can share the memory of a single process.

An event loop, by contrast, breaks its work into tasks and executes them in serial, disallowing parallel access and changes to shared memory. Parallelism and "serialism" can coexist in the form of cooperating event loops in separate threads.

The interleaving of parallel threads of execution and the interleaving of asynchronous events occur at very different levels of granularity.

In a single-threaded environment, it really doesn't matter that the items in the thread queue are low-level operations, because nothing can interrupt the thread. But if you have a parallel system, where two different threads are operating in the same program, you could very likely have unpredictable behavior.

threaded programming is very tricky, because if you don't take special steps to prevent this kind of interruption/interleaving from happening, you can get very surprising, indeterministic behavior that frequently leads to headaches.

JavaScript never shares data across threads, which means that level of nondeterminism isn't a concern. But that doesn't mean JS is always deterministic; e.g. async calls that each triggers a different function would have indeterministic behaviour, depending on which call gets executed first.
