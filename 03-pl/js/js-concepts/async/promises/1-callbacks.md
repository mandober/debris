# Callbacks

https://javascript.info/callbacks

## TL/DR

Investigating callbacks in the context of asynchronous programming, and the motiffs to replace them with promises and async fucntions.

## setTimeout

`setTimeout` is a well known function, provided by the Timers Web API, that uses callbacks. It accepts a callback and a timeout (as number denoting ms). When the timout expires, the callback is executed.

```js
setTimeout(() => console.log('2 seconds later...'), 2000)
```

However, `setTimeout` expects a callback that is a nullary function, i.e. an expression or statement wrapped in a thunk, of the form `() => {…}`. This is how `setTimeout` likes its callbacks, but other functions may treat their callback differently, like passing them some arguments.

When the timer elapses, `setTimeout` will call the callback, passing nothing to it, so a nullary function as a callback suffices. If the callback is a unary (or a polyadic) function, its arguement(s) will end up being `undefined`.

```js
const later = () => console.log(`Later...`)
setTimeout(later, 4000)

const andnow = x => console.log(`${x} seconds later...`)
setTimeout(andnow, 3000)

const after = (x = 2) => console.log(`${x} seconds later...`)
setTimeout(after, 2000)
setTimeout(() => after(1), 1000)
```

In order to have the callback invoked with an argument, we cannot rely on `setTimeout` but we have to wrap it in an outer function that takes an argument so we can refer to it from the callback's body.

```js
const timeout = ms => {
  return setTimeout(() => {
    return console.log(`${ms} ms later...`)
  }, ms)
}
// 1000 ms later...
```

Eatch out for implicit retuns when you use arrows - unless wrapped in brace, an arrow's body is an expression, so when a statement makes an arrow's body, we better wrap it in braces to prevent implicitly returning it.

```js
// timeout's body is an expression, so it's like palcing the return in front of setTimeout, which then returns the ID of this setTimeout (which can be used to cancel it).
const timeout = ms => setTimeout(() => console.log(`${ms} ms later...`), ms)
/*
Timeout {
  _idleTimeout: 1000,
  _idlePrev: [TimersList],
  _idleNext: [TimersList],
  _idleStart: 51,
  _onTimeout: [Function (anonymous)],
  _timerArgs: undefined,
  _repeat: null,
  _destroyed: false,
  [Symbol(refed)]: true,
  [Symbol(kHasPrimitive)]: false,    
  [Symbol(asyncId)]: 11,
  [Symbol(triggerId)]: 0
}
1000 ms later...
*/


// The above is the same as this:
const timeout = ms => {
  return setTimeout(() => {
    return console.log(`${ms} ms later...`)
  }, ms)
}
/*
Timeout {
  _idleTimeout: 1000,
  _idlePrev: [TimersList],
  _idleNext: [TimersList],
  _idleStart: 51,
  _onTimeout: [Function (anonymous)],
  _timerArgs: undefined,
  _repeat: null,
  _destroyed: false,
  [Symbol(refed)]: true,
  [Symbol(kHasPrimitive)]: false,    
  [Symbol(asyncId)]: 11,
  [Symbol(triggerId)]: 0
}
1000 ms later...
*/
```



## Async functions

Many functions provided by Web APIs allow you to schedule asynchronous actions. These are the actions that we initiate now, but they finish later, e.g. the `setTimeout` function, fetch, loading scripts/modules, and others.

Consider a function `loadScript` below, that loads a script given its `src`.

```js
function loadScript(src) {
  // creates a <script> tag and appends it to the page. this causes
  // the script with given src to load and to execute when complete
  let script = document.createElement('script')
  script.src = src
  document.head.append(script)
}
```

This piece of code is executed asynchronously - it starts loading now, but completes and executes later, when the function `loadScript` has already returned. Any code after the `loadScript` function continues to be executed without waiting on `loadScript` to finish downloading and executing the script.

On the one hand, this is optimal, the program keeps executing without blocking, but on the other hand, if cannot refer to any of the functions defined in and loaded by this script in the "after" code).

The solution is to pass a callback to `loadScript` that would be invoked when the loading script is ready; and in the callback, we can refer to the names defined in the script.

```js
function loadScript(src, cb) {
  let script = document.createElement('script')
  script.src = src
  // callback execution is triggered by the onload event on the script
  script.onload = () => cb(script)
  document.head.append(script)
}
```

The `onload` event fires when the script is loaded and we use it as a cue that we can then invoke the callback function, `cb`. The `script` is fed to `cb`, which produces... what? a script object? module object?

Within the `cb`, we can refer to the names defined in the script. The call to `loadScript` now looks like this:

```js
function loadScript(src, cb) {
  let script = document.createElement('script')
  script.src = src
  script.onload = () => cb(script)
  document.head.append(script)
}

// tell loadScript to load lodash v.3.2.0
loadScript('https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.2.0/lodash.js', script => {
  console.log(`The script, ${script.src}, is loaded`)
  console.log(_.version) // `_` is a function/obj defined in lodash.js
})
```

This is the *callback-based style of asynchronous programming*. A function that performs an async action is given a callback to be invoked when the async action completes.
