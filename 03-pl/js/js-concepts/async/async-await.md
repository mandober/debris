# async/await

https://javascript.info/async-await


async/await is sugar to work with promises in a more comfortable manner.

The keywords `async` and `await` go in pair. The `async` is placed before a function definition to make that function asynchronous. The `await` is placed inside the body of an asynchronous function, before an asynchronous call in order to wait for the promise returned by that call to resolve.

When using async/await, the important thing is to make sure that you wrap your code inside a function and prefix that function with that `async` keyword. You also need to make sure that you're using the `await` keyword before the asynchronous code. If you forget to put `await`, you will get a promise back, and not the actual return value of the promise being executed.
