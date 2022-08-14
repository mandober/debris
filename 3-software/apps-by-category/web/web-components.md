# Web Components

Web Components
https://www.webcomponents.org/

*Web components* are a set of *Web Platform APIs* that allow you to create new, custom, reusable, encapsulated HTML tags to use in web pages and web apps.

Custom components and widgets build on the *Web Component* standards will work across modern browsers and can be used with any JavaScript library or framework that works with HTML.

Web components are based on existing web standards. Features to support web components are currently being added to the HTML and DOM specs, letting web developers easily extend HTML with new elements with encapsulated styling and custom behavior.

## Specifications

Web components are based on 4 main specifications:

1. *Custom Elements*: foundation specs for design and use of new types of DOM elements.
https://w3c.github.io/webcomponents/spec/custom/

2. *Shadow DOM*: this specification defines how to use encapsulated style and markup in web components.
https://w3c.github.io/webcomponents/spec/shadow/

3. *ES Modules*: modules specification defines the inclusion and reuse of JS documents in a standards-based modular performant way.
https://html.spec.whatwg.org/multipage/webappapis.html#integration-with-the-javascript-module-system

4. *HTML Template*: this specs defines how to declare fragments of markup that go unused at page load, but may be instantiated later.
https://html.spec.whatwg.org/multipage/scripting.html#the-template-element/

---


## Web Components
MDN › Web technology for developers › Web Components
https://developer.mozilla.org/en-US/docs/Web/Web_components

Web Components is a suite of different technologies allowing you to create reusable custom elements — with their functionality encapsulated away from the rest of your code — and utilize them in your web apps.

## Concepts and usage

As developers, we all know that reusing code as much as possible is a good idea. This has traditionally not been so easy for custom markup structures — think of the complex HTML (and associated style and script) you've sometimes had to write to render custom UI controls, and how using them multiple times can turn your page into a mess if you are not careful.

Web Components aims to solve such problems — it consists of 3 main technologies, which can be used together to create versatile custom elements with encapsulated functionality that can be reused wherever you like without fear of code collisions.

*Custom elements*: A set of JavaScript APIs that allow you to define custom elements and their behaviour, which can then be used as desired in your user interface.

*Shadow DOM*: A set of JavaScript APIs for attaching an encapsulated "shadow" DOM tree to an element — which is rendered separately from the main document DOM — and controlling associated functionality. In this way, you can keep an element's features private, so they can be scripted and styled without the fear of collision with other parts of the document.

*HTML templates*: The <template> and <slot> elements enable you to write markup templates that are not displayed in the rendered page. These can then be reused multiple times as the basis of a custom element's structure.

The basic approach for implementing a web component generally looks something like this:
- Create a class or a function in which you specify your web component functionality. If using a class, use the ECMAScript 2015 class syntax.
- Register your new custom element using the `CustomElementRegistry.define()` method, passing it the element name to be defined, the class or function in which its functionality is specified, and optionally, what element it inherits from.
- If required, attach a shadow DOM to the custom element using `Element.attachShadow()` method. Add child elements, event listeners, etc., to the shadow DOM using regular DOM methods.
- If required, define an HTML template using <template> and <slot>. Again use regular DOM methods to clone the template and attach it to your shadow DOM.
- Use your custom element wherever you like on your page, just like you would any regular HTML element.


## Tutorials

## Using custom elements
A guide showing how to use the features of custom elements to create simple web components, as well as looking into lifecycle callbacks and some other more advanced features.

## Using shadow DOM
A guide that looks at shadow DOM fundamentals, showing how to attach a shadow DOM to an element, add to the shadow DOM tree, style it, and more.

## Using templates and slots
A guide showing how to define a reusable HTML structure using <template> and <slot> elements, and then use that structure inside your web components.
