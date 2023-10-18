# Document Object Model

https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model

>The Document Object Model (DOM) exposes an in memory representation of the HTML structure of a document, making it available to scripts.

These scipts are usually written in JavaScript, even though modeling HTML, SVG, or XML documents as objects are not part of the core JavaScript language, but of the host environment's (browser, detached runtime like Node.js) Web API.

DOM's in memory representation of a document is as a *logical tree* - each branch of the tree ends in a node, and each node contains objects.

DOM methods allow programmatic access to the tree. By leveraging these methods, JS can change the document's structure, style and content.

Nodes can also have *event handlers* attached. Once an event is triggered, the event handlers get executed.

## Introduction to the DOM

https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Introduction

>DOM is the data representation of the objects that comprise the structure and content of a document on the web.

This guide introduces the DOM, looks at how the DOM represents an HTML document in memory, and how to use Web APIs.

>DOM is a programming interface (API) for web documents.

It represents the page in a way that JS can manipulate it, changing the document structure, style, and content. The DOM represents the document as nodes and objects, allowing JS to interact with the page.

A web page is a document that exists as the HTML source (page.html), and as a page displayed in the browser. In both cases, it is the same document, but only the DOM representation allows the manipulation of the page. As an OO view of the web page, it can be modified with JavaScript.

For example, the DOM specifies that `querySelectorAll` method returns a list of all paragraphs in the document:

```js
const paragraphs = document.querySelectorAll("p")
// paragraphs[0] is the first <p> element
// paragraphs[1] is the second <p> element, etc.
console.log(paragraphs[0].nodeName)
```

>All properties, methods, events available for manipulation are organized into objects.

For example, the `document` object represents the page itself; a table object that implement the `HTMLTableElement` DOM interface for accessing HTML tables is also an object.

>The DOM is built using multiple APIs that work together.

The *core DOM* defines the entities describing any document and the objects within it. This can be expanded as needed by other APIs that add new features and capabilities to the DOM. For example, the `HTML DOM API` adds support for representing HTML documents to the core DOM, and the `SVG API` adds support for representing SVG documents.

https://developer.mozilla.org/en-US/docs/Web/API/HTML_DOM_API
