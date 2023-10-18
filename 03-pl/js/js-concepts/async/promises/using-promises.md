# Using promises

Promises
- using promises
  - creating a promise (as the 3rd party)
  - consuming a promise (obtained from a 3rd party)
- implementing promises


## Using promises

### Creating promises




### Consuming promises

We create a new promise by calling the `Promise` constructor function with the `new` keyword and passing in one argument that should be a function, by convention called `executor`. The `executor` is a binary funciton and its first parameter is a called `resolve` and the second parameter is `reject`. They are both (callback) functions that are to be applied to the eventual result.


- we can apply resolve and reject to anything, any value at all


```js
let x = Math.random() > 0.5 ? 2 : 0
const p = new Promise((resolve, reject) => {
  if (x !== 0) {
    resolve(8 / x)
  } else {
    reject('division by zero')
  }
})
```

- Promise instance API has only 3 methods:
  - `then`
  - `catch`
  - `finally`
- Promise static API has several methods:
  - `Promise.all`
  - `Promise.allSettled`
  - `Promise.any`
  - `Promise.race`
  - `Promise.resolve`
  - `Promise.reject`
- consuming a promise (exactly like the code above) without calling the `catch` method will trigger an error (in node, probably also in browser).
