# Promises

https://www.freecodecamp.org/news/how-to-implement-promises-in-javascript-1ce2680a7f51/

https://blog.webdevsimplified.com/2021-09/javascript-promises/

## Promise states

A promise can be in one of 3 states: resolved, rejected, or pending.

* **Resolved** means that either everything was ok and we received the promised value, or we caught and handled the error. These two values we may receive, data or error message, may be thought together as payload; so a *payload* is either the expected data or an error message. A resolved promise has delivered a payload.

* **Rejected** means that either we rejected the promise, or an error was thrown and we didn't catch it.

* **Pending** means that neither the `resolve` nor the `reject` method has been called yet and we are still waiting for the value. This is the initial state.

* **Settled** is a quasi-state meaning that the promise is either *resolved* or *rejected*.

* **Value**: a value that we have either resolved or rejected. Once the value is set, there is no way of changing it.





## Promises: basics

https://javascript.info/promise-basics

A promise is an object returned by an asynchronous function, which represents the current state of the operation. At the time the promise is returned to the caller, the operation often isn't finished, but the promise object provides methods to handle the eventual success or failure of the operation.


To create a new promise call the `Promise` constructor (using `new`) passing it the *executor function* as the argument.

```js
let promise = new Promise(function executor(resolve, reject) => { /*...*/})
// or
const executor = (resolve, reject) => { /* ... */ }
let promise = new Promise(executor)
```

>When a new promise is created, the executor is automatically executed.
The executor is a binary function declaring two params traditionally named `resolve` and `reject` - both arguments are expected to be functions. The executor performs some async task, eventually producing some result `payload`. At that time, the executor calls one of the callbacks:
* if the task was finished successfully, the `resolve` callback is invoked with the payload, i.e. `resolve(payload)`
* if the task did not finished successfully, the `reject` callback is invoked with the message `err` explaining the reason of failure, i.e. `reject(err)`.

In summary: the *executor* runs automatically upon the creation of a new promise and attempts to perform a task. On successful completion of the task, the executor invokes the `resolve` callback passing it the task's result; on failure, the executor invokes the `reject` callback passing it the error message.

Internal properties of the promise object
- *state*: 
  initially `pending`, 
  then changes to either `fulfilled` if resolve was called 
  or to `rejected` if reject was called
- *result*: 
  initially `undefined`, 
  then changes to *value* if `resolve(value)` was called, 
  or to `error` if `reject(error)` was called.


```js
new Promise(function executor(resolve, reject) {...})
{ state: "pending", result: undefined }
// then either
resolve(val)
{ state: "fulfilled", result: val }
// or
reject(err)
{ state: "rejected" result: err }
```
