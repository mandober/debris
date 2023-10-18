# Canvas

Web technology for developers › HTML: Hypertext Markup Language › 
HTML elements reference › `<canvas>`: The Graphics Canvas element

<canvas>: The Graphics Canvas element
https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas

Use the HTML <canvas> element with either the [canvas scripting API](https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API) or the [WebGL API](https://developer.mozilla.org/en-US/docs/Web/API/WebGL_API) to draw graphics and animations.


## Closing the element

Unlike the <img> element, the <canvas> element requires the closing tag.

## Sizing the canvas using CSS versus HTML

The displayed size of the canvas can be changed using CSS, but if you do this the image is scaled during rendering to fit the styled size, which can make the final graphics rendering end up being distorted.

It is better to specify your canvas dimensions by setting the width and height attributes directly on the <canvas> elements, either directly in the HTML or by using JavaScript.

## The canvas element
The **canvas element** is the actual DOM node that's embedded in the HTML page.

The **canvas context** is an object with properties and methods that you can use to render graphics inside the canvas element. The context can be 2d or WebGL (3d).

Each canvas element can only have one context. If we use the `getContext()` method multiple times, it will return a reference to the same context object.
