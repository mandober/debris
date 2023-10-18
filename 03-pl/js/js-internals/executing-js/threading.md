# Threading

## Main thread

Although there is only one *main thread*, browsers *spawn many additional threads* for various tasks like networking, encoding, decoding, monitoring input devices, etc. All these additional tasks are organized into Web APIs, and the browser will spawn new threads whenever appropriate so the Web APIs can execute there, offloading the main thread. However, once such a task finishes, it needs to convey its results to the page (current context) which is on the main thread. Browser synchronizes such communication, relying the data from the auxillary to the main thread, using *the event loop*.

The `setTimeout` is a function provided by a Web API that runs off the main thread (if it were to run on the main thread, it would block). So setTimeout is executed off the main thread - basically, that thread sleeps for the specified amount of milliseconds, after which time the attached callback should be invoked, but that callback cannot be executed outside the main thread, outside the main JS execution environment/context. So, when the timeout expires, the event loop takes that callback and enqueues it on the *task queue*, where it waits for execution. Browser gets the pointer events from the OS the same way - via the task queue. All things that execute off the main thread but need to rely their results to the main execution context are managed the same way.
