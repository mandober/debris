# JS :: Internals

- JS spec
- JS versions
- JS engine
  - event loop
  - message queues
    - task queue
    - animation queue
    - micrortask queue
- Browser
  - JS engine (executed in the main thread)
  - Web APIs (executed in spawned threads)
    - fetch
    - worker threads
  - The main thread
    - rendering
    - DOM lives here
    - JS execution



## Timings

Average monitor refresh rate is 60 Hz, i.e. the screen is refreshed 60 times per second, i.e. 60 times per 1000 ms. So a refresh happens every *16.6 ms*.

Browsers account for this value in their timings. On average, browsers have the timeframe of 16.6 ms to prepare everything for the next refresh. During that time, browsers need to execute JS, calculate styles and positions of HTML elements, and a bunch of other things.

16.6 ms may seem like awfully short time to get things ready for the next frame, and sometimes the browsers does struggel. It is said that anything that blocks the main thread for more than *200 ms* becomes noticable by users; because blocking means everything stops: rendering (repainting the page, playing videos or gifs), user interactions (clicks do nothing), the whole UX goes tits up. Things like user interactions get registered and if the blocking ceises, there will be a storm of events happening is rapid succession. But if the blocking prolongs (for how long? 10s? 20s?), the browser will pop up a dialog "This page is taking too long..." asking the user to kill or wait for the offending task to finish. Choosing to wait buys the offending task more time (what, 10 seconds? 15? find out) until the browers pops up the same question again.

1 browser cycle is `16.6ms`, which may seem awfully short to do anything useful, but that is an eternity compared to 1 CPU cycle (of a 3.3 GHz CPU) which takes `0.3ns`. For illustration, a light ray travels 22 cm in 0.3 ns, but traverses 11,100 km in 16.6 ms (1 browser cycle).



## Main thread

Although there is only one *main thread*, browsers *spawn many additional threads* for various tasks like networking, encoding, decoding, monitoring input devices, etc. All these additional tasks are organized into Web APIs, and the browser will spawn new threads whenever appropriate so the Web APIs can execute there, offloading the main thread. However, once such a task finishes, it needs to convey its results to the page (current context) which is on the main thread. Browser synchronizes such communication, relying the data from the auxillary to the main thread, using *the event loop*.

The `setTimeout` is a function provided by a Web API that runs off the main thread (if it were to run on the main thread, it would block). So setTimeout is executed off the main thread - basically, that thread sleeps for the specified amount of milliseconds, after which time the attached callback should be invoked, but that callback cannot be executed outside the main thread, outside the main JS execution environment/context. So, when the timeout expires, the event loop takes that callback and enqueues it on the *task queue*, where it waits for execution. Browser gets the pointer events from the OS the same way - via the task queue. All things that execute off the main thread but need to rely their results to the main execution context are managed the same way.

## Task queue

The task queue (or task queues?) is the oldest part of the event loop.
