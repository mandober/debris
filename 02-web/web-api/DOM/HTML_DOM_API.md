# HTML DOM API

https://developer.mozilla.org/en-US/docs/Web/API/HTML_DOM_API

## Introduction

The DOM is built using multiple APIs that work together. The **core DOM** defines the entities describing any document and the objects within it. This can be expanded as needed by other APIs that add new features and capabilities to the DOM. For example, the `HTML DOM API` adds support for representing HTML documents to the core DOM.

The HTML DOM API is comprised of the interfaces that define the *functionality of each HTML element* and any supporting types and interfaces they rely upon.

The functional areas included in the HTML DOM API include:
- control of HTML elements via the DOM
- manipulation of form data
- interaction with the canvas element
- management of media connected to the HTML media elements (<audio>, <video>)
- dragging and dropping facilities
- access to browser's navigation history
- supporting and connective interfaces for other APIs
  - Web Components
    https://developer.mozilla.org/en-US/docs/Web/API/Web_components
  - Web Storage
    https://developer.mozilla.org/en-US/docs/Web/API/Web_Storage_API
  - Web Workers
    https://developer.mozilla.org/en-US/docs/Web/API/Web_Workers_API
  - WebSocket
    https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API
  - Server-sent events
    https://developer.mozilla.org/en-US/docs/Web/API/Server-sent_events
  - etc.


## HTML DOM concepts and usage

In this article, we'll focus on the parts of the HTML DOM that involve engaging with HTML elements. Discussion of other areas, such as Drag and Drop, WebSockets, Web Storage, etc. can be found in the documentation for those APIs.

### Structure of HTML document

DOM is an architecture that describes the structure of a **document**.

Each document is represented by an instance of the **`Document` interface**.

- [Document interface](https://developer.mozilla.org/en-US/docs/Web/API/Document)

A document, in turn, consists of a *hierarchical tree of nodes*, in which a **node** is a fundamental record representing a single object in the document (such as an element or text node). Nodes may be strictly organizational, providing a means for grouping other nodes, or for providing a point at which a hierarchy can be constructed; other nodes may represent visible components of a document. Each node is based on the **`Node` interface**, which provides *properties* for getting info about the node and *methods* for manipulating nodes within the DOM.

- [Node interface](https://developer.mozilla.org/en-US/docs/Web/API/Node)

Nodes have no notion about the content displayed in the document - they are empty vessels.

The fundamental notion of a node that can represent visual content is introduced by the **`Element` interface**.

An *Element object instance* represents a single element in a document created using HTML (or an XML vocabulary).

For example, consider a document with two elements, one of which has two more elements nested inside it:

- Window
  - Document
    - Element
    - Element
      - Element
      - Element

While the `Document` interface is defined as part of the DOM specification, the HTML specification significantly enhances it to add information specific to using the DOM in the context of a web browser, as well as to using it to represent HTML documents specifically.

Among the things added to `Document` by the HTML standard are:
- Support for accessing various information provided by the *HTTP headers* when loading the page, such as the location from which the document was loaded, *cookies*, modification date, referring site, etc.
- *Access to elements* in the document's <head> and <body>, incl. the lists of the images, links, scripts, etc. contained in the document.
- Support for interacting with the user by examining *focus* and by executing commands on editable content.
- Event handlers for document events defined by the HTML standard to allow access to *mouse and keyboard events*, drag and drop, media control, and more.
- Event handlers for events that can be delivered to both elements and documents; these presently include only *copy, cut, paste actions*.

### HTML element interfaces

The `Element` interface has been further expanded to represent HTML elements specifically by introducing the *HTMLElement interface*, which all specialized HTML element classes inherit from.

This expands the `Element` class to add *HTML-specific general features* to the element nodes. Properties added by `HTMLElement` include for example `hidden` and `innerText`.

- https://developer.mozilla.org/en-US/docs/Glossary/HTML
- https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement
- https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/hidden
- https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/innerText

An *HTML document* is a DOM tree in which each of the nodes is an *HTML element*, represented by the *`HTMLElement` interface*.

The *`HTMLElement` class*, in turn, implements the *`Node` inteface*, so every element is also a *node* (but not the other way around).

>This way, the structural features implemented by the *`Node` interface* are also available to *HTML elements*, allowing them to be nested within each other, created and deleted, moved around, and so forth.

*`HTMLElement` interface* is generic so it provides only the *functionality common to all HTML elements* (ID, coordinates, HTML markup, scroll pos, etc.).

In order to expand upon the functionality of the *core `HTMLElement` interface* to provide the features needed by a specific element, the *`HTMLElement` class* is subclassed to add the needed properties and methods.

For example, the <canvas> element is represented by an object of type `HTMLCanvasElement` which augments the `HTMLElement` type by adding canvas-specific properties and methods.

>The overall inheritance for HTML element classes looks like this:

<svg xmlns="http://www.w3.org/2000/svg" 
     xmlns:xl="http://www.w3.org/1999/xlink" 
     viewBox="191.5 263.5 661.387 565" 
     width="661.387" 
     height="565">
  <defs>
    <marker 
      orient="auto"
      overflow="visible"
      markerUnits="strokeWidth"
      id="a" 
      stroke-linejoin="miter" 
      stroke-miterlimit="10" 
      viewBox="-9 -4 10 8" 
      markerWidth="10" 
      markerHeight="8" 
      color="#000"
    >
    <path d="M-8 0l8 3v-6z" fill="none" stroke="currentColor"/>
    </marker>
    <marker
      orient="auto" 
      overflow="visible" 
      markerUnits="strokeWidth" 
      id="b" 
      stroke-linejoin="miter" 
      stroke-miterlimit="10" 
      viewBox="-1 -4 10 8" 
      markerWidth="10" 
      markerHeight="8" 
      color="#000"
    >
    <path d="M8 0L0-3v6z" fill="none" stroke="currentColor"/>
    </marker>
  </defs>
  <g fill="none">
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget">
<path fill="#ededff" d="M192 516h114.968v48H192z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M192 516h114.968v48H192z"/>
<text transform="translate(197 531.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="6.276" y="12">EventTarget</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/Node">
<path fill="#ededff" d="M327.871 516h62.71v48h-62.71z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M327.871 516h62.71v48h-62.71z"/>
<text transform="translate(332.871 531.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="9.552" y="12">Node</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/Element">
<path fill="#ededff" d="M411.484 516h94.065v48h-94.065z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M411.484 516h94.065v48h-94.065z"/>
<text transform="translate(416.484 531.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="12.627" y="12">Element</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement">
<path fill="#ededff" d="M526.452 516H641.42v48H526.452z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M526.452 516H641.42v48H526.452z"/>
<text transform="translate(531.452 531.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="6.276" y="12">HTMLElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLAnchorElement">
<path fill="#ededff" d="M685.161 264h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 264h167.226v48H685.161z"/>
<text transform="translate(690.161 279.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="7.201" y="12">HTMLAnchorElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLAreaElement">
<path fill="#ededff" d="M685.161 324h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 324h167.226v48H685.161z"/>
<text transform="translate(690.161 339.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="15.603" y="12">HTMLAreaElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLAnchorElement">
<path fill="#ededff" d="M685.161 384h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 384h167.226v48H685.161z"/>
<text transform="translate(690.161 399.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="7.201" y="12">HTMLAnchorElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/">
<path fill="#ededff" d="M685.161 444h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 444h167.226v48H685.161z"/>
<text transform="translate(690.161 459.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="24.004" y="12">HTMLBRElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLTrackElement">
<path fill="#ededff" d="M685.161 600h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 600h167.226v48H685.161z"/>
<text transform="translate(690.161 615.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="11.402" y="12">HTMLTrackElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLUListElement">
<path fill="#ededff" d="M685.161 660h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 660h167.226v48H685.161z"/>
<text transform="translate(690.161 675.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="11.402" y="12">HTMLUListElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLUnknownElement">
<path fill="#ededff" d="M685.161 720h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 720h167.226v48H685.161z"/>
<text transform="translate(690.161 735.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="3.001" y="12">HTMLUnknownElement</tspan>
</text>
</a>
<a xl:href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLVideoElement">
<path fill="#ededff" d="M685.161 780h167.226v48H685.161z"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M685.161 780h167.226v48H685.161z"/>
<text transform="translate(690.161 795.5)" fill="#000">
<tspan font-family="Courier New" font-size="14" font-weight="400" x="11.402" y="12">HTMLVideoElement</tspan>
</text>
</a>
<ellipse cx="763.548" cy="510" rx="5.226" ry="6" fill="#666"/>
<ellipse cx="763.548" cy="510" rx="5.226" ry="6" stroke="#999" stroke-linecap="round" stroke-linejoin="round"/>
<ellipse cx="763.548" cy="534" rx="5.226" ry="6" fill="#666"/>
<ellipse cx="763.548" cy="534" rx="5.226" ry="6" stroke="#999" stroke-linecap="round" stroke-linejoin="round"/>
<ellipse cx="763.548" cy="558" rx="5.226" ry="6" fill="#666"/>
<ellipse cx="763.548" cy="558" rx="5.226" ry="6" stroke="#999" stroke-linecap="round" stroke-linejoin="round"/>
<ellipse cx="763.548" cy="582" rx="5.226" ry="6" fill="#666"/>
<ellipse cx="763.548" cy="582" rx="5.226" ry="6" stroke="#999" stroke-linecap="round" stroke-linejoin="round"/>
<path marker-start="url(#a)" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M316.868 540h11.003m72.61 0h11.003m103.964 0h11.004"/>
<path d="M685.161 288h-24v252h-9.842" marker-end="url(#b)" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M651.32 540h9.841v264h24" marker-start="url(#a)" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/>
<path stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M661.161 348h24m-24 59.5h24m-24 59.5h24m-24 157h24m-24 60h24m-24 60h24"/>
</g>
</svg>





## HTML DOM API interfaces

The majority of the interfaces that comprise the HTML DOM API map almost one-to-one to individual HTML elements, or to a small group of elements with similar functionality. In addition, the HTML DOM API includes a few interfaces and types to support the HTML element interfaces.

### HTML element interfaces

* HTML element interfaces
  * HTML Element Interfaces

  * Deprecated HTML Element Interfaces
    - HTMLMarqueeElement (Deprecated)
  * Obsolete HTML Element Interfaces
    - HTMLFontElement (Obsolete)
    - HTMLFrameElement (Obsolete)
    - HTMLFrameSetElement (Obsolete)
    - HTMLIsIndexElement (Obsolete)
    - HTMLMenuItemElement (Obsolete)


### Web app and browser integration interfaces
These interfaces offer access to the browser window and document that contain the HTML, as well as to the browser's state, available plugins (if any), and various configuration options.

* Web app and browser integration interfaces
  - BarProp
  - Navigator
  - Window
* Deprecated web app and browser integration interfaces
  - External (Deprecated)
* Obsolete web app and browser integration interfaces
  - ApplicationCache (Obsolete)
  - Plugin (Obsolete)
  - PluginArray (Obsolete)

### Form support interfaces
These interfaces provide structure and functionality required by the elements used to create and manage forms, including the <form> and <input> elements.

- FormDataEvent
- HTMLFormControlsCollection
- HTMLOptionsCollection
- RadioNodeList
- ValidityState
