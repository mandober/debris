# Document

https://developer.mozilla.org/en-US/docs/Web/API/Document

*`Document` interface* represents any web page loaded in the browser and serves as an entry point into the web page's content, which is the DOM tree.

Any document implements the `Document` interface, plus a more specialized interface according to their type, like `HTMLDocument` interface or `XMLDocument` interface.

Types of documents, `Document` interface plus
- `HTMLDocument` interface
  - HTML documents served with the `text/html` content type
- `XMLDocument` interface
  - XML and SVG documents


DOM tree includes elements such as <body> and <table>, among many others.

DOM tree provides functionality globally to the document, like how to obtain the page's URL and create new elements in the document.

>EventTarget > Node > Document

*`Document` interface* describes the common properties and methods for any kind of document.

Depending on the document's type (HTML, XML, SVG, …), a larger API is available: HTML documents, served with the `text/html` content type, also implement the *`HTMLDocument` interface*, whereas XML and SVG documents implement the *`XMLDocument` interface*.
