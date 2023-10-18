# JS :: Guides :: Canvas :: Canvas HTML element

Canvas HTML element, <canvas>, is intended for 2D and 3D graphics and animation.

After creating a canvas element in the HTML document, either manually or via JS, we need to get a handle on it, which is most easily done by assigning it a unique ID attribute (HTML elements with an ID can be directly referenced in JS but that's not nice - we should explicitly get a hold of them using the appropriate selector function).

```js
const canvas = document.getElementById('canvas')
```

A single canvas element is enough for simple projects; more complex ones will probably use several canvas elements in a side-by-side manner on even stacked on top of each other. For now an ID like 'canvas' suffices.

A problem with this approach is that it is btittle - there already has to be a canvas element with the ID 'canvas' in the HTML document. To strengthen this, we can instead create canvas element(s) dynamically, attaching it to the DOM as needed. But then we need a reference to a DOM element in order to attach our canvas to. And this, again, means we need to make sure that element really exists in the first place, and that it has the ID we expect. At this point it seems sensible to let go of any assumption about the state of DOM, and instead select an HTML element that is bound to always exist, like <body>. We'll attach our canvas to the body by default, at the same time leaving ourselves the option to be more specific about the parent element when needed.

```js
createCanvas(parent = 'body') {
  /// create a new canvas HTML element in memory
  const el = document.createElement(elem)
  /// adorn it with trinkets
  el.id = 'canvas#1'
  /// append it to the DOM
  document
    /// Select the parent (container) element by a special string:
    .querySelector(parent)
    /// append the new element to the parent in DOM
    .appendChild(el)
}
```


There is a single 2D context, but several 3D contexts each supported by a 3D rendering technology like WebGL, WebGL2, WebGPU, etc.
