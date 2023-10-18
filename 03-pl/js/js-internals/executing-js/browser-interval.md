# Timings

- monitor refresh rate, ~ 60 Hz
- event loop
- 16.6 ms tick, 1 browser cycle
- S, L, P phases


Average *monitor refresh rate* is 60 Hz, i.e. the screen is refreshed 60 times per second, i.e. 60 times per 1000 ms. So a refresh happens every *16.6 ms*.

The main driver of browsers is the *event loop*, which is basically an infinite loop, with a cycle that must take into account for the monitor refresh rate. On average, one pass through the event loop takes 16.6 ms, so a browser has the timeframe of 16.6 ms to prepare everything for the next "frame"; browser also have a notion of a frame since they can be thought of as a sort of a video player, only it doesn't just interpret the prepared content but also generates it all the time, more so when the content of the page is non-static and influenced by user interaction.

including the calculation of styles, `S` phase, calculation of positions of HTML elements, `L` phase, and the calculation of everything else needed for the next (re)paint of the page, `P` phase. 

The things that brow


During that time, browsers need to execute JS, calculate styles and positions of HTML elements, and a bunch of other things.

>Browsers have 16.6 ms to prepare everything for the next repaint cycle.

16.6 ms may seem like awfully short time to get things ready for the next frame, and sometimes the browsers does struggel. It is said that anything that blocks the main thread for more than *200 ms* becomes noticable by users; because blocking means everything stops: rendering (repainting the page, playing videos or gifs), user interactions (clicks do nothing), the whole UX goes tits up. Things like user interactions get registered and if the blocking ceises, there will be a storm of events happening is rapid succession. But if the blocking prolongs (for how long? 10s? 20s?), the browser will pop up a dialog "This page is taking too long..." asking the user to kill or wait for the offending task to finish. Choosing to wait buys the offending task more time (what, 10 seconds? 15? find out) until the browers pops up the same question again.

1 browser cycle is `16.6ms`, which may seem awfully short to do anything useful, but that is an eternity compared to 1 CPU cycle (of a 3.3 GHz CPU) which takes `0.3ns`. For illustration, a light ray travels 22 cm in 0.3 ns, but traverses 11,100 km in 16.6 ms (1 browser cycle).
