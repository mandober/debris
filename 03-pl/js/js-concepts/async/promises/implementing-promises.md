# Implementing promises

Unlike some other JS language constructs, promises are user-implementable. We'll try to implement promises from scratch, in a kind of reverse engineering, by relying on what we know about how the promises are used in JS.

As an overview, a promise is an object that we obtain by calling the `Promise` constructor function. The promise object is actually a state machine with 3 internal states: pending, resolved and rejected.







## Promise class

Since we know that making a new promise involves a `new` call to the `Promise` constructor function, we can start off by making a new class `Promise`.

The constructor should take a single argument, by convention called `executor`. The `executor` is a binary function so it takes two arguments which are both functions, `resolve` and `reject` (in that order by convention). The `resolve` function will be called on successful resolution of the promised value, and `reject` on error.


When a new promise (object) is built, the ctor will execute the 'executor' function argument.


By convention, their order is `resolve` first then `reject` and they are both functions.

```js
// def
class Promise {
  constructor (executor) {
    // ...
  }
}

// call
const p = new Promise(function executor(resolve, reject) { /* ... */ })
// or
const p = new Promise((resolve, reject) => { /* ... */ })
```

When we create a promise, the passes in argument, i.e. the `executor` function, is called immediately. The `executor` function is a callback and it holds the `resolve` function that is called on success, and `reject` function that is called on error. We'll need these two functions so we create two methods, each ot hold one: `onSuccess` method will refer to the `resolve` function, and `onError` method will refer to the `reject` function.

```js
class Promise {
  constructor (executor) {
    executor(this.onSuccess, this.onError)
  }

  onSuccess(value) {}
  onError(value) {}
}
```


We actually want to wrap this inside of a try catch because another interesting thing about promises is if you have an error at any point inside your promise it's going to catch that error and it's just going to call the fail method which in our case is on fail with that error.
