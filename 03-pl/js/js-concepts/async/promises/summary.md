# Promises :: Summary

Promise states
- pending
- resolved
- rejected
- settled
- fullfilled
- floating



- `onfulfilled` is a callback to execute when the Promise is resolved
- `onrejected` is a callback to execute when the Promise is rejected
- a promise is settled if it was fulfilled or rejected


Promises always happen asynchronously even if the result returns immediately. A simple way to defer a computation is to attach it as a callback to `setTimeout` without any delay (which is at least 1 ms delay anyway). However, `setTimeout` is a macro task and macro task callbacks are placed on the task queue which is a queue separate for the queues for rAF, queues for page-related task (like paint), and the queue for microtasks, which are all part of the same branch of the event loop. The queue for macrotasks is on its own separate branch. The event queue enters either branch when there are task there. Anyway, promises' callbacks are placed on the microtask queue. We can explicitly place a task there by wrapping it in promise, or by explicitly calling `queueMicrotask`

https://developer.mozilla.org/en-US/docs/Web/API/queueMicrotask
