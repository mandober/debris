# Background

## Callback-based asynchrony

rationale.md
background.md
callback-based-asynchrony.md


Before promises, the main way to handle lengthy computation (computation that would block) was to offload it to a separate thread - indirectly, by wrapping it in a Web API call like `setTimeout` - while also attaching a callback to it that gets invoked when the computation completes. This is usually called *callback-based asynchrony*.

Even though JS is, strictly-speaking, a single-threaded language, the browser is not (just open the task manager and try counting the proccess it spawns), which makes JS a very privileged language, endowed with all kinds of extra resources managed by the browser as made available by various Web APIs.

Note: the techiques for offloading the main thread and moving a computation from the main JS context to an auxillary thread, while receiving the results back in the main JS execution environment, are described in the section dealing with the event loop (hopefully). In brief, for now we accept there are ways to achieve that, otherwise every lenghty computation would block, freezing the UI and ruining the UX.

Of course, the callback-based asynchrony is still a valid approach, sometimes used when a computation decomposes into a few functions. The main problem with this approach arises when the number of these constituent functions increases. Already with several functions - especially when there is an implied ordering (when the next computation depends on the result of the previous one) which forces further nesting of functions and thus introduces more indentation levels - and particularly when each function is accompanied by its error handler (as it should be) - the whole endeavour becomes very hard to reason about.

Nevertheless, the callback-based approach forms the foundation of asynchronous programming in JS. It models the kind of computation whose result is not available right away but will be ready some time in the future (fingers crossed).
