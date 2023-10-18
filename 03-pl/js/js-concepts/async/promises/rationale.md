# Rationale

The concept of promise is used to wrap a value, or, in general, a computation, when you know it takes a while for that computation to complete. Run naively (on the main thread), eveything would block until the computation completes.

Using promises, a lengthy computation is moved off the man thread to an auxillary thread where it is executed. Once completed, the attached callback (which is fed the result) is placed on the microtask queue, so it is executed back on the main thread, in the main JS execution environment. Actually, two callbacks are attached with a promise: one for the case everything goes well and the other for the case an error occurs, so in the end only one of them is invoked.
