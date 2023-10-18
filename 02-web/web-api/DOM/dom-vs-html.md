# DOM vs HTML

The Document Object Model (DOM) is the data representation of the objects that comprise the structure and content of a document on the web (webpage). DOM is a tree of nodes (elements) that represent a webpage's content. DOM represents an HTML document in memory.

>The HTML represents the *initial page content*, whereas the DOM represents the *actual page content*, possibly changed in the meantime by JS or CSS.

Manipulating the DOM directly (since you cannot manipulate thr authored HTML, at least not directly) is slow and error prone, and so React uses the *Virtual DOM* (VDOM), which is an in memory, usually just partial, representation of the DOM, much more amenable to frequent manipulations. VDOM accumulates the updates to the DOM and at some point renders them. It figures out which DOM elements needs updating by diffing the VDOM against the DOM.

The Document Object Model (DOM) is a programming interface for web documents. It represents the page so that programs can change the document structure, style, and content. The DOM represents a *document* as *nodes* and *objects* in a way so that programming languages (mostly JS) can interact with the page.

A web page is a document that can be either displayed in the browser window or as the HTML source. In both cases, it is the same document but *the DOM representation allows it to be manipulated*. As an object-oriented representation of the web page, it can be modified with JavaScript.

For example, the DOM specifies that the `querySelectorAll` method must return a collection of all the <p> elements in the document.

All of the *properties*, *methods*, and *events* that can be manipulated are organized into objects. For example, the *document object* that represents the document itself, any *table objects* that implement the `HTMLTableElement` *DOM interface* for accessing HTML tables, etc., are all objects.

The DOM is built using multiple APIs that work together. The *core DOM* defines the entities describing any document and the objects within it. This is expanded upon as needed by other APIs that add new features and capabilities to the DOM. For example, the HTML DOM API adds support for representing *HTML documents* to the core DOM, and the SVG API adds support for representing *SVG documents*.

The DOM was designed to be independent of any particular programming language, making the structural representation of the document available from a single, consistent API. Even if most web developers will only use the DOM through JavaScript, implementations of the DOM can be built for any language.

When you create a JS script, whether inline in a `<script>` element or included in the web page, you can immediately begin using the API for the `document` or `window` objects to manipulate the document itself, or any of the various elements in the web page (the descendant elements of the document).

Because the vast majority of code that uses the DOM revolves around manipulating HTML documents, it's common to refer to the *nodes* in the DOM as *elements*, although *strictly speaking not every node is an element*.
