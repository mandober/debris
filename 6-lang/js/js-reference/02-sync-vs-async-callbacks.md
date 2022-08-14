# Callbacks, synchronous and asynchronous

https://blog.ometer.com/2011/07/24/callbacks-synchronous-and-asynchronous/

A **synchronous callback** is invoked before a function returns, that is, while the API receiving the callback remains on the stack.

An **asynchronous or deferred callback** is invoked after a function returns, or at least on another thread's stack. Mechanisms for deferral include threads and main loops (other names include *event loops*, *dispatchers*, *executors*).Async callbacks are popular with IO related APIs.

```js
// sync callback example
list.foreach(callback)
// when `foreach()` returns, you'd expect the callback
// had been invoked on each element

// async callback example
socket.connect(callback)
// you'd expect that when connect() returns, the callback may not
// have been called, since it's waiting for the connection to complete
```

Guideline:
- choose sync or async, but not both
- A given callback should be either always sync or always async, as a documented part of the API contract.
- An async callback should be invoked by a main loop or central dispatch mechanism directly, i.e. there should not be unnecessary frames on the callback-invoking thread’s stack, especially if those frames might hold locks.


Synchronous callbacks:
- invoked in the original thread, don't create thread-safety concerns by themselves
- in, e.g. C++, may access data stored on the stack such as local variables
- in any language, they may access data tied to the current thread, such as thread-local variables. For example many Java web frameworks create thread-local variables for the current transaction or request
- May be able to assume that certain application state is unchanged, for example assume that objects exist, timers have not fired, IO has not occurred, or whatever state the structure of a program involves.

Asynchronous callbacks:
- May be invoked on another thread (for thread-based deferral mechanisms), so apps must synchronize any resources the callback accesses.
- Cannot touch anything tied to the original stack or thread, such as local variables or thread-local data.
- If the original thread held locks, the callback will be invoked outside them.
- Must assume that other threads or events could have modified the application’s state.
