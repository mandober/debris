# queueMicrotask

https://developer.mozilla.org/en-US/docs/Web/API/queueMicrotask

The `queueMicrotask()` method, which is exposed on the `Window` or `Worker` interface,
>queues a microtask to be executed at a safe time prior to control returning to the browser's event loop.

The microtask is a short function which will run after the current task has completed its work and when there is no other code waiting to be run before control of the execution context is returned to the browser's event loop.

This lets your code run without interfering with any other, potentially higher priority, code that is pending, but before the browser regains control over the execution context, potentially depending on work you need to complete. You can learn more about how to use microtasks and why you might choose to do so in our microtask guide.

The importance of microtasks comes in its ability to perform tasks asynchronously but in a specific order. See Using microtasks in JavaScript with `queueMicrotask()` for more details.

Microtasks are especially useful for libraries and frameworks that need to perform final cleanup or other just-before-rendering tasks.
