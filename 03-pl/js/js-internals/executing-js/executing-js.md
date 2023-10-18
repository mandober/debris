# Executing JS

## Experiments

### Experiment 1

```js
queueMicrotask(() => setTimeout(() => console.log("timeout via microtask")))
console.log("log first")
setTimeout(() => console.log("timeout"))
Promise.resolve().then(() => console.log("promise microtask"))
requestAnimationFrame(() => console.log("rAF"))
queueMicrotask(() => console.log("queued microtask"))
setTimeout(() => queueMicrotask(() => console.log("microtask via timeout")))
console.log("log last")

// OUTPUT              // SRC LINE
log first              // :2
log last               // :8
promise microtask      // :4
queued microtask       // :6
undefined              // end tick, next tick:
rAF                    // :5
timeout                // :3
microtask via timeout  // :7
timeout via microtask  // :1
```

- weird that rAF's callback is executed only on the next tick

### Experiment 2

However, if I create a thunk as wrapper function instead of hardcoding nullary function wrappers, the code is executed this way instead (!?):

```js
const thunk = x => () => x

queueMicrotask(thunk(setTimeout(thunk(console.log("timeout via microtask")))))
console.log("log first")
setTimeout(thunk(console.log("timeout")))
Promise.resolve().then(thunk(console.log("promise microtask")))
requestAnimationFrame(thunk(console.log("rAF")))
queueMicrotask(thunk(console.log("queued microtask")))
setTimeout(thunk(queueMicrotask(() => console.log("microtask via timeout"))))
console.log("log last")

// Now the OUTPUT is    // SRC LINE
timeout via microtask   // :1
log first               // :2
timeout                 // :3
promise microtask       // :4
rAF                     // :5
queued microtask        // :6
log last                // :8
microtask via timeout   // :7
undefined
```

- all is executed in one tick
- the order is almost linear

Come to think of it, it's no surprise, things call the `thunk` fucntion now which is a new execution context or some shit like that, i.e. I'm *not passing a nullary function but calling a function*, (calling `thunk`).

### Experiment 3

Guess the sequence of numbers - logged normally or thrown as an error:

```js
function err(e = 0) { throw new Error(e) }

queueMicrotask(err)
console.log(1)
setTimeout(() => err(2))
Promise.resolve().then(() => err(3)).then(() => err(3.1))
Promise.resolve().then(() => setTimeout(() => err(4))).then(() => err(4.1))
Promise.resolve().then(() => err(5)).then(() => err(5.1))
setTimeout(() => err(6))
err(7)
queueMicrotask(err)

// solution (note: 1 is logged, all others are uncaught):
1 0 7 2 6 4 3 4.1 5
// plus there's no `undefined` returned due to throw
```

### Experiment 4

How about now?

```js
function err(e = 0) { throw new Error(e) }

try {
  queueMicrotask(err)
  console.log(1)
  setTimeout(() => err(2))
  Promise.resolve().then(() => err(3)).then(() => err(3.1))
  Promise.resolve().then(() => setTimeout(() => err(4))).then(() => err(4.1))
  Promise.resolve().then(() => err(5)).then(() => err(5.1))
  setTimeout(() => err(6))
  err(7)
  queueMicrotask(err)
} catch (e) {
  console.log(e)
}

// solution: (note: 1 is logged, 7 is caught, all others are uncaught)
1
7
0
undefined
2
6
4
3
4.1
5
// however, this version has `undefined` returned after throwing 0
```



## Execution

After all the sync code is executed, the task (callback) queue is checked whether it contains something...

>All of the sync code is executed first.

GC is non-deterministic.

7 queues (!) whaa, which?
- task (callback) queue
- microtask queue
- rAF queue
- render queues:
- is S styles a queue?
- is L styles a queue?
- is P styles a queue?
- call stack is a stack not a queue
- which others queues are there!?
- event queue? isn't that task queue?
- job queue. what's that?
- input queue (mouse/keyboard) (?)



https://html.spec.whatwg.org/multipage/webappapis.html#event-loops

>Essentially, *task sources* are used within standards to separate logically-different types of tasks, which a user agent might wish to distinguish between. *Task queues* are used by user agents to coalesce task sources within a given event loop.

For example, a user agent could have one task queue for mouse and key events (to which the user interaction task source is associated), and another to which all other task sources are associated. Then, using the freedom granted in the initial step of the *event loop processing model*, it could give keyboard and mouse events preference over other tasks three-quarters of the time, keeping the interface responsive but not starving other task queues. Note that in this setup, the processing model still enforces that the user agent would never process events from any one task source out of order.

---

To summarize all this, the specs only require that every event loop has at least one task queue. They won't get into more specification about the task queues, but rather use task sources, that the user agents (UA) will link to whatever task queue they wish however they see fit, as long as the tasks in each task source are executed in order.

Getting an extensive list of all the task sources is not really possible, and not really useful since they could actually all end up in the same and only task queue.

An other very important part of the specs we need to look at is the event loop processing model. This algorithm defines all the steps an event loop should go through at each iteration.

## 8.1.7.3 Processing model

https://html.spec.whatwg.org/multipage/webappapis.html#event-loop-processing-model

An event loop must continually run through the following steps for as long as it exists:

1. Let oldestTask and taskStartTime be null.
2. If the event loop has a task queue with at least one runnable task, then:
  - 2.1 Let taskQueue be one such task queue, chosen in an impl-defined manner.
  - 2.2 Set taskStartTime to the unsafe shared current time.
  - 2.3 Set oldestTask to first runnable task in taskQueue, dequeue it
  - 2.4 Set the event loop's currently running task to oldestTask.
  - 2.5 Perform oldestTask's steps.
  - 2.6 Set the event loop's currently running task back to null.

  >Remember that the *microtask queue* is not a task queue, so it will not be chosen in the step 2.1. However, a task queue to which the microtask task source is associated might be chosen in this step. In that case, the task chosen in the next step was originally a microtask, but it got moved as part of spinning the event loop.

3. Perform a microtask checkpoint.
4. Let hasARenderingOpportunity be false.
5. Let now be the unsafe shared current time. [HRT]
6. If oldestTask is not null, then:
  - 6.1 Let top-level browsing contexts be an empty set.
  - 6.2 For each *environment settings object* settings of oldestTask's 
        script evaluation environment settings object set:
    - 6.2.1 Let global be settings's global object.
    - 6.2.2 If global is not a Window object, then continue.
    - 6.2.3 If global's browsing context is null, then continue.
    - 6.2.4 Let tlbc be global's browsing context's top-level browsing context.
    - 6.2.5 If tlbc is not null, then append it to top-level browsing contexts.
  - 6.3 Report long tasks, passing in taskStartTime, now (the end time of the task), top-level browsing contexts, and oldestTask.
7. Update the rendering: if this is a window event loop, then:
  - many tasks

8. If all of the following are true
  - this is a window event loop
  - there's no task in the event loop's task queue whose doc is fully active
  - this event loop's microtask queue is empty
  - hasARenderingOpportunity is false
then:
...

9. If this is a worker event loop, then:
...



>A single event loop may be shared among multiple documents that's why the specs talks about *event loops*.
