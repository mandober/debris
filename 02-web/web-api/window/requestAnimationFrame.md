# requestAnimationFrame

>Reference ⟩ Web APIs ⟩ Window ⟩ requestAnimationFrame()

https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame

The method `window.requestAnimationFrame` lets canvas and its animations work in line with the natural rhythm of the browser, thereby improving the UI updates and animations. It is about optimizating browser's rendering process.

`requestAnimationFrame` takes a function (typically `animate()`) and then calls it each time it is about to do a screen paint and update the interface.

To preserve resources, modern browser will throttle the class to `requestAnimationFrame` when the tab is in the background.

Browser renders a page at a rate of 60 fps, matching the refresh rate of LCD computer monitors. 1000ms = 1s, so 60 frames rendered per one second leaves on the average about (1000 / 60 = 16.6 ms) *16 ms* for the browser to do all the necessary work in order to prepare the next frame in time. 16ms is all the time a browser has, so it cannot devote all of it just to satisfy your canvas shenanigans. Canvas animation should count on having *10ms* in the best case. The JS calculations related to canvas should be kept to 3-4 ms at most. The best case being that the canvas is the only element on the page.


`requestAnimationFrame` schedules JS to run at the earlies possible moment in each frame since JS can influence the layout of other elements (DOM, CSS).

>Browser rendering pipeline: JS > Styles > Layout > Paint > Composite

```js
function animate(deltaTime) {
  //...
  requestAnimationFrame(animate)
}

// call it the first time (kick off)
requestAnimationFrame(animate)
```



## Links

- Window.cancelAnimationFrame()
  https://developer.mozilla.org/en-US/docs/Web/API/Window/cancelAnimationFrame
- OffscreenCanvas
  https://developer.mozilla.org/en-US/docs/Web/API/OffscreenCanvas
- DedicatedWorkerGlobalScope
  https://developer.mozilla.org/en-US/docs/Web/API/DedicatedWorkerGlobalScope

## Blog posts

- `mozRequestAnimationFrame`
  https://robert.ocallahan.org/2010/08/mozrequestanimationframe-frame-rate_17.html

- `requestAnimationFrame` for smart animating
  https://www.paulirish.com/2011/requestanimationframe-for-smart-animating/

- Animating with JavaScript: from `setInterval` to `requestAnimationFrame`
  https://hacks.mozilla.org/2011/08/animating-with-javascript-from-setinterval-to-requestanimationframe/

- Test your web browser for `requestAnimationFrame` Timing Deviations
  https://www.testufo.com/#test=animation-time-graph

- `requestAnimationFrame` API: Now with sub-millisecond precision
  https://developer.chrome.com/blog/requestanimationframe-api-now-with-sub-millisecond-precision/
