# Canvas API

Reference ⟩ Web APIs ⟩ Canvas API

https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API

*Canvas API* provides a means for drawing graphics via JS and the HTML <canvas> element.

https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas


## Basic example

This simple example draws a green rectangle onto a canvas.

```js
const canvas = document.getElementById("canvas")
const ctx = canvas.getContext("2d")
ctx.fillStyle = "green"
ctx.fillRect(10, 10, 150, 100)
```
