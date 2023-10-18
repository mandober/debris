# microtasks

https://developer.mozilla.org/en-US/docs/Web/API/HTML_DOM_API/Microtask_guide

https://developer.mozilla.org/en-US/docs/Web/API/HTML_DOM_API/Microtask_guide/In_depth


JS engine - event loop queues
- task queues
- animation callback queues (requestAnimationFrame)
- microtasks


## Queues
https://www.youtube.com/watch?v=cCOL7MC4Pl0&t=0s

JS engine maintains 3 kinds of queues and they are all processed in slightly different ways.

*Task queue*: queued tasks are processed only one at the time. If another task is queued it just goes to the end of the task queue, waiting to be processed next time around the event loop. But if that one task that is being processed enters an infinite loop, it will block everything. `setTimeout` puts callbacks on the taask queue.

*Animation queue*: queued animation callbacks, on the other hand, are processed until completion, but if new callbacks are pushed during the processing they are deferred to the next frame. Callbacks from `requestAnimationFrame` go here.

*Microtasks* are processed to completion including any new items that are added while the processing is ongoing. So, if we are adding items to the microtask queue as quickly as they are processed, the browser would be stuck processing microtasks forever. The event loop cannot continue until the microtask queue has completely emptied and that is why continuously stuffing it blocks rendering. Primises put callbacks on the microtask queue. Microtasks are processed only when the JS stack (task queue) is empty.
