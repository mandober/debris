# JS Concepts :: Promises

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_promises

https://stackoverflow.com/questions/23803743/what-is-the-explicit-promise-construction-antipattern-and-how-do-i-avoid-it

https://blog.izs.me/2013/08/designing-apis-for-asynchrony/

https://blog.webdevsimplified.com/2021-09/javascript-promises/

- promise
- `Promise`
- creating promises
- consuming promises
- `async` and `await`

## Promise

## Creating promises

## Consuming promises

When we call a function we know returns a promise, what is actually returned is an object, `Promise` object that represents a convenient "thing" to which we can attach callbacks via the `then()` method (of the Promise object).

If the function doesn't return a promise but uses the older "call me back when it's done" gangsta approach, it would expect us to also give it the callbacks when we invoke it. Then the function would decide which callback to use (i.e. to invoke) depending (hopefully) if some operation it performed was successful or not. "Hopefully" because it could be a third-party function over which we have zero control. But if it obeys convention, that function should invoke the callback we gave it as the first argument, i.e. apply that callback to the data, if everything went ok, so that we receive that data back. Or, in case of failure, it should invoke the callback in the second argument so as to send us the reason for error. Too many moving parts.

>Essentially, a promise is a returned object to which you attach callbacks, instead of passing callbacks into a function.

Placing the `async` keyword before a function definition (function statement or expression), "promisifies" that function such that the function returns what it would normally return, only the return value is wrapped in a promise. This conversion (wrapping) is done automatically by JS. (If you don't know whether a function returns a promise, just slap `async` on it and hope for the best).

## Chaining

A common need is to execute several asynchronous operations back to back, where each subsequent operation starts when the previous operation succeeds, with the result fed to it by the previous operation.

```hs
(>>=) :: m a -> (a -> m b) -> m b
ma >>= k = -- can't define it coz every monad `m` has its own implementation


-- e.g.
-- (where `prevop`, `curr` and `subs` are predefined fucntions)
prevop >>= \x -> curr x >>= \y -> subs y
-- or, with do-notation:
do
  x <- prevop
  y <- curr x
       subs y
```

corresponding to this JS code:

```js
prevop.then(x => curr x)
      .then(y => subs y)
```

The API design of promises makes chaining convenient because callbacks are attached to the returned promise object, instead of being passed into a function. The magic is in the `then()` method which returns a new promise (different from the original).

```js
const promise = doSomething()
const promise2 = promise.then(successCallback, failureCallback)
// or just
const promise2 = doSomething().then(successCallback, failureCallback)
```

This second promise, `promise2`, represents the completion not just of `doSomething()`, but also of the `successCallback` or `failureCallback` callback functions we passed in - *which may be async functions returning a promise themselves*. When that's the case, any callbacks added to `promise2` *get queued* behind the promise returned by either `successCallback` or `failureCallback`.

With this pattern, you can create longer chains of processing, where each promise represents the completion of one asynchronous step in the chain.

In addition, the arguments to `then()` are optional, and `catch(failureCallback)` is short for `then(null, failureCallback)` - so if your error handling code is the same for all steps, you can attach it to the end of the chain via the `catch()` method.

Important: **Always return results** (inside `then` functions), otherwise callbacks won't catch the result of a previous promise. If the previous handler started a promise but did not return it, there's no way to track its settlement anymore, and the promise is said to be *floating*. This gets even worse if you have race conditions - if the promise from the last handler is not returned, the next `then` handler will be called early, and any value it reads may be incomplete.

>Therefore, as a rule of thumb, whenever your operation encounters a promise, return it and defer its handling to the next `then` handler.

## Nesting

Below, the first example has one promise chain nested in the return value of another `then()` handler, while the second example uses an entirely flat chain.

Simple promise chains are *best kept flat*, without nesting, as nesting can be a result of careless composition.

```js
const listOfIngredients = []

// EXAMPLE 1
doSomething()
  .then((url) =>
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        listOfIngredients.push(data)
      }),
  )
  .then(() => {
    console.log(listOfIngredients)
  })


// OR
// EXAMPLE 2
doSomething()
  .then((url) => fetch(url))
  .then((res) => res.json())
  .then((data) => {
    listOfIngredients.push(data)
  })
  .then(() => {
    console.log(listOfIngredients)
  })
```

### Nesting as control structure

Nesting can be used as a kind of *control structure* to limit the scope of the `catch` statements.

Specifically, a nested `catch` only catches failures in its scope and below, not errors higher up in the chain outside the nested scope.

When used correctly, this gives greater precision in error recovery:

```js
doer().then(
  result =>
    optional(result)
      .then(res => extra(res))
      .catch(e => {})
  ) // ignored if optional stuff fails
  .then(() => more())
  .catch(e => console.error(`Failure ${e.message}`))
```

Note that the optional steps here are nested. The inner error-silencing catch handler only catches failures from `optional` and `extra`, after which the code resumes with `more`. Importantly, if `doer` fails, its error is caught by the final (outer) catch only, and does not get swallowed by the inner catch handler.

## Chaining after a catch

It's possible to chain after a `catch`, which is useful to accomplish new actions even after an action failed in the chain.

```js
new Promise((resolve, reject) => {
  console.log("Initial")
  resolve()
})
  .then(() => {
    throw new Error("Something failed")
    console.log("Doing this")
  })
  .catch(() => console.error("Do that"))
  // keep on chaining after a catch
  .then(() => console.log("Do this, no matter what happened before"))
/*
This outputs:
  Initial
  Do that
  Do this, no matter what happened before
*/
```

Note: The text "Doing this" is not displayed because throwing the error "Something failed" caused a rejection.

>If any of the `then` method throws, the subsequent `then` calls are skipped until the `catch` call encountered and executed.


## Common mistakes

>A good rule of thumb is to always either return or terminate promise chains, and as soon as you get a new promise, return it immediately, in order to flatten things out.

Using `async`/`await` addresses most, if not all of these problems - the tradeoff being that it may be easy to forget the `await` keyword.


## Promises 1: Intro

A promise is resolved as a microtask, i.e. a microtask is a fullfilled promise. Microtask queue is consulted at the end of the current pass through event loop.

```js
// https://www.youtube.com/watch?v=vn3tm0quoqE

const tick = Date.now()
const log = (v) => console.log(`${v} \n Elapsed: ${Date.now() - tick}ms`)

const codeBlocker = () => {
    // (1) Blocking
    let i = 0
    while(i < 10e9) i++
    return 'Blocking'

    // (2) Async but still blocking
    return new Promise((resolve, reject) => {
      let i = 0
      while(i < 10e9) i++
      resolve('Async blocking')
    })

    // (3) Non-blocking
    return Promise.resolve().then(v => {
      let i = 0
      while(i < 10e9) i++
      return 'Non-blocking'
    })
}

log('🥪 Synchronous 1')
codeBlocker().then(log)
log('🥪 Synchronous 2')
```

1. Running this while loop in the main thread blocks, as expected, until the loop completes.

2. So to avoid blocking, we wrap the while loop in a promise so we can get it off the main thread and execute it as a micro task. We create a new promise, we add the while loop inside that promise, and then we have it resolved to some value (message string) when done. The hope is that because we're wrapping the while loop in a promise, that code will execute off the main thread. But the actual creation of the promise and that big while loop is still happening on the main thread! It is only the resolving of the value that happens as a micro task.

3. To ensure that all of our synchronous code runs as fast as possible, we'll refactor the code to say `Promise.resolve().then()`, placing the while loop inside of the resolved promise's callback. By putting the while loop inside of a resolved promise's then callback, `Promise.resolve().then(…)`, we are guaranteed that it will be executed after all the synchronous code in the current macro task queue has cleared (completed).

## Promises 2: Review

When we put the `async` keyword in front of a function (1A), the returned value is wrapped in a promise (what is returned will be a promise of that value).

Instead of using the `async` keyword, we could have achieved the same effect by returning a promise that resolves (1B) to the function's return value.

However, the use of the `async` keyword also sets up the context for the use of the `await` keyword. The real power of an async function comes when you combine it with the `await` keyword to pause the execution of the function.

```js
// (1) Basic
const getFruit = async name => {      // (1A)
  const fruits = {
    pineapple: '🍍',
    peach: '🍑',
    strawberry: '🍓'
  }
  return fruits[name]
  // return Promise.resolve(fruits[name])    // (1B)
}
getFruit('peach').then(console.log)


// (2) async/await
const makeSmoothie = async () => {
  const a = await getFruit('pineapple')
  const b = await getFruit('strawberry')
  return [a, b]
}
makeSmoothie().then(console.log)

// (3) promises only, without async/await
const difficultSharing = () => {
  let a                                                   // 3A
  return getFruit('pineapple')
    .then(v => (a = v, return getFruit('strawberry')))    // 3B
    .then(v => [a, v])
}

// (4) Primise.all
const doAll = async () => {
  const a = getFruit('pineapple')
  const b = getFruit('strawberry')
  const c = getFruit('peach')
  return Promise.all([a, b, c])
}
doAll().then(console.log)


// (5) await array of promises
const promiseArray = async () => {
  const a = getFruit('pineapple')
  const b = getFruit('strawberry')
  const c = getFruit('peach')
  const res = await Promise.all([a, b, c])
  return res
}
promiseArray().then(console.log)

// (6) race
const fruitRace = async() => {
  const a = getFruit('pineapple')
  const b = getFruit('strawberry')
  const c = getFruit('peach')
  const winner = await Promise.race([a, b, c])
  return winner
}
fruitRace().then(console.log)
```

In (2), instead of chaining together a bunch of `then` callbacks, we can have a promise resolve to the value of a variable. In effect, the `await` there pauses the execution of `makeSmoothie` function until the `getFruit` promise resolves to a value, at which point we can bind that resolved value to the variable `a`. Then we move to the next line, rinse and repeat to bind the resolved value to the variable `b`, funally returning both values in an array (tuple in TS).

One of the annoying things with promises is that they make sharing of intermediate values awkward. In (3), we must first initialize a new variable (3A), and then we use the comma operator (3B) to keep things as succint as possible. Things look much noicer with async/await.

However, the nice async/await in (2) misses the opportunity to run concurrently. We are waiting for pineapple to resolve, and then we are waiting for strawberry to resolve, but we could have run both at the same time, like in (4).

We only need to `await` one thing after the other if the second value is dependent on the first value.

When working with async functions you don't want to accidentally pause function unnecessarily. Instead of awaiting a bunch of individual promises, you better add all the promises to an array and then await that `Promise.all(array)` call; as in (4) and also in (5).

## Promises 3: Error handling

Error handling with `try…catch` block, instead of `catch` methods, offers greater flexibility when handling errors that might occur across multiple promises.

```js
const badSmoothie = async() => {
  try {
    const a = getFruit('pineapple')
    const b = getFruit('strawberry')
    const smoothie = await Promise.all([a, b])
    throw 'broken!'                               // (1)
    return smoothie;
  } catch(err) {                                  // (2)
    console.log(err)
    throw `💩 It's broken!`                       // (3)
    // xor
    return `😬 We are going to be fine...`        // (4)
  }
}
```

If we throw an error in t he `try` block (1), we can catch that error in the `catch` block (2). Then, after logging the error, we can either throw another error (3) or return a value (4). This decision will dictate the control flow for the consumer of this promise:
* If we return a value (4), that basically ignores the error and provides the returned value as a replacement. The consumer of the promise won't get an error, instead they will receive this replacement value inside of their `then()` callback.
* In contrast, if we throw an error (3) inside of the `catch` block, it will break the consumers promise chain and be handled by their `catch()` callback.


## Promises 4: Sugar

We can write an async functions with a `for…in` or `for…of` loop inside it, and then use `await` inside the loop (1).

To run the promises concurrently we can put `await` inside `for…in/of` loop and make `for…await…in/of` loop (2). If you have a promise that you know resolves to an array you can use `await` directly in the loop, so you can say `for…await` to await the array of items (of `fruits`) to resolve and then loop over them immediately after.

We can also combine `if` statement with `await` (3).

```js
const fruits = ['peach', 'pineapple', 'strawberry']

// (1) await in the loop's body
const fruitLoop = async () => {
  for (const f of fruits) {
    const emoji = await getFruit(f)
    console.log(emoji)
  }
}

// (2) for…await
const fruitLoop = async () => {
  for (await const f of fruits) {
    const emoji = getFruit(f)
    console.log(emoji)
  }
}

// (3) if…await
const fruitInspection = async () => {
  if ((await getFruit('peach')) === '🍑') {
    console.log('looks peachy!')
  }
}


// what
import fetch from 'node-fetch'
const getTodo = async () => {
  const res = await fetch('https://jsonplaceholder.typicode.com/todos/1')
  const { title, userId, body } = await res.json()
  console.log(title, userId, body)
}
```

If we have a array of strings of IDs and want to retrieve all these IDs from the database, we can use the `map` method on the array to convert the array of IDs to an array of promises, and then use `Promise.all` to resolve them concurrently.

Buy we need to be careful when using async/await inside `map` or `forEach` because `await` won't actually pause the function in this context. Normally, we expect such loop to pause the execution of the function, e.g. if we do `await getFruit`, but that's not what happens - instead, the promises are run concurrently in map/forEach and similar methods (loops).

>If you want to run a loop and have every iteration in that loop await a promise, you need to *use synchronous for loop*.

## async/await

When using async/await, the important thing is to make sure that you wrap your code inside a function and prefix that function with that `async` keyword. You also need to make sure that you're using the `await` keyword before the asynchronous code. If you forget to put `await`, you will get a promise back, and not the actual return value of the promise being executed.
