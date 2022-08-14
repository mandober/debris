# Concurrency model and the event loop

JavaScript has a concurrency model based on an *event loop*, which is responsible for executing the code, collecting and processing *events*, and executing *queued tasks*.

## Runtime concepts

- Stack
- Heap
- JS Engine
- Host Environment
- WebAPI (browser) or C++ API (Node.js)
- Message Queue (Task, Callback Queue)
- Event loop


**Heap** is a large, rather unstructured, region of memory that holds large objects or objects that require persistency.

**Stack**, or call stack, is a region of memory with a FILO access discipline, that directs the flow in program by managing function calls. Each function call creates a new frame in the stack, and each time a function returns its stack frame is destroyed. Because of this stack can only hold local variables (locals, return values), it cannot hold persistent values/objects, those need to live on the heap. JS is single threaded, it has a single call stack.

Stack and heap are regions of memory and they are both always active when the JS code is executing. The stack manages the flow of execution and the heap holds the data, along with numerous JS objects.

The ES specs specifies that JS is a single-threaded language, which makes certain guarantees about the memory model and the execution model, allowing the implementations to depend on that; and JS language is present everywhere, including being embedded in some very constrained environments that specifically need to rely on the standardized specs.

The JS code is executed by a *JS engine*, like the V8 JS engine, present in Chrome browser and Node.js. Being single-threaded language means there is only one call stack and that the JS engine can only do one thing at the time.

However, JS doesn't run in isolation but embedded inside a *host environment*. A browser makes numerous **WebAPI** available to the JS engine (like DOM, Ajax, setTimeout calls and others); the **C++ Runtime APIs** do the same for Node. And while JS is single-threaded, browsers and C++ APIs are not, and that is the reason JS can enjoy async execution.

So besides the call stack, heap and the JS engine, the other relevant players are *Web APIs* or *C++ APIs*, *the message queue* and *the event loop*.

The first frame on the stack is an anonymous function or sometimes named `main`, that is the implicit function that represents the currently executing JS file.

If we invoke `setTimout` with, e.g. 5 seconds timeout and `() => console.log('hi')` as the callback function, what happens is that the tack frame for `setTimout` function is created but then it immediately disappears from the stack, due to being managed by the WebAPI. The setTimout WebAPI will manage the timeout and when it expires, it will take the callback function, `() => console.log('hi')`, and place it in the *Message Queue*. `setTimout` called with 0 ms delay is a way to defer the execution of a function we privide as a callback (it must do the dance despite the 0 ms delay). Similarly, AJAX requests are handled by the fetch WebAPI, amd, e.g. `onClick` events are handled by an appropriate WebAPI.

**Message Queue** (Task Queue, Callback Queue) is a queue data structure, and unlike the stack's FILO, the queue has FIFO access discipline. Besides storing messages, the queue's job is to watch the call stack and only when the call stack is empty, it takes a task from the queue and places it on the stack. The stack must be empty, otherwise the flow of execution would be derailed.

The message queue holds many other non-JS related tasks including paint events, requests for animation, layout (re)calculations, and similar tasks in a browser.

**Event loop** is a code that simulates a clock in the JS hosting environment; it is an continuous loop, and each iteration of the loop is called a **tick**. A tick is the basic unit of time for JS execution. For each tick, the callback queue is checked and if there's an event waiting (like a function callback), it is taken off and executed, provided the call stack is empty.

A tick is around 16 ms (probably?), which is a timeframe within which many tasks must be completed for a browser to function properly (Node does less, it doesn't e.g. manage a whole GUI with constant refreshes and repainting).





## JS Engine and the host environment











## Links and reference

Concurrency model and the event loop
https://developer.mozilla.org/en-US/docs/Web/JavaScript/EventLoop

*What the heck is the event loop anyway?* by Philip Roberts at JSConf EU
https://www.youtube.com/watch?v=8aGhZQkoFbQ

Visualize the JS event loop
http://latentflip.com/loupe/

https://github.com/getify/You-Dont-Know-JS/blob/1st-ed/async%20%26%20performance/ch1.md
