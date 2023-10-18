# DOM interfaces

https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Introduction#dom_interfaces

Many objects implement several different interfaces.

The table object, for example, implements a specialized `HTMLTableElement` interface, which includes such methods as createCaption and insertRow. But since it's also an HTML element, table implements the `Element` interface. And finally, since an HTML element is also, as far as the DOM is concerned, a node in the tree of nodes that make up the object model for an HTML, the table object also implements the more basic `Node` interface, from which Element derives. When you get a reference to a table object you use all 3 of these interfaces interchangeably on the object.

HTMLElement > HTMLTableElement
Node > Element > HTMLTableElement

## Core interfaces in the DOM

The document and window objects are the objects whose interfaces you generally use most often in DOM programming. In simple terms, the window object represents something like the browser, and the document object is the root of the document itself. Element inherits from the generic Node interface, and together these two interfaces provide many of the methods and properties you use on individual elements. These elements may also have specific interfaces for dealing with the kind of data those elements hold, as in the table object example in the previous section.

A brief list of common APIs in webpage scripting using the DOM
- document.querySelector()
- document.querySelectorAll()
- document.createElement()
- Element.innerHTML
- Element.setAttribute()
- Element.getAttribute()
- EventTarget.addEventListener()
- HTMLElement.style
- Node.appendChild()
- window.onload
- window.scrollTo()
