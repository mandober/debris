# WebDev :: Glossary

## Browser
Among other actions, the primary task of a browser is to fetch, process, render, update the content that makes a web page. A browser is usually composed of parts where each one governs a particular aspect: HTML and CSS engines that manage of presentation, JS engine that manages of behaviour, UI layer (a brower's "chrome", i.e. the non-page part of the browser), etc. Today, popular browsers are Chrome, Edge, FireFox, Safari, Opera, and a slew of mobile browsers, some of which are versions of desktop browsers (Chrome, Firefox), while some browers only have presence as mobile apps.

## DOM
Document Object Model (DOM) is the name for the API that a browser exposes to JS.

## Nitro
Safari's browser JavaScript engine.

## V8
Chrome's browser *JavaScript engine*.

## node-webkit
node-webkit is an *app runtime* based on *Chromium* and *node.js* for building desktop apps for OSX, Windows and Linux.

## nw.js
Call all Node.js modules directly from DOM/WebWorker and enable a new way of writing applications with all Web technologies.

## Node.js
Chrome's V8 JS engine taken out of the browser and endowed with C++ runtime to make JS a stanalone language.

## ECMAScript
ECMAScript is the standard, prescribed by the standards body that controlls the JS language specification. ECMAScript is about the core feature of JS, leaving the features related to its hosting environment to Web APIs.

## ECMAScript 5.1
This is the sordid "before" version of the JS language, the one before the advent of the mighty ES6 revitalization.

## ECMAScript 2015
After idling for a long time, `ECMAScript 2015` or `ECMAScript 6` or `ES6` was a milestone specification that pumped live into JS, delivering a mass of new features. It was such a huge update that it split JS programming language into the "before" and "after" versions. The following releases kept evolving more rapidly, but each subsequent release (on a yearly level) only introduced a few new things.

## ECMAScript 2016
An edition of the ECMAScript specification that defines two new features: exponentiation operator, `**`, and `Array.prototype.includes`, with various minor changes.

## JerryScript
JerryScript is an ultra-lightweight JavaScript engine for the Internet of Things (IoT). It is capable of executing ECMAScript 5.1 source code on devices with less than 64 KB of memory. The engine was open sourced on GitHub in June 2015.

## pixijs
The HTML5 Creation Engine: Create beautiful digital content with the fastest, most flexible 2D WebGL renderer.

## WebWorker
JS is single-threaded, but WebWorker allows running JS code on a separate thread.

## Web APIs
Web APIs are stndardized APIs exposed by the browser (or an alternative JS environemnt, like node.js). Each Web API is specialized to managing a particular aspect or behaviour of the browser and browsing context. For example, there is a Web API that manages pointer devices, unifying and standardizing mouse, keyboard and touch actions and events. Another WebAPI controlls all aspects related to scrolling, so it can be leveraged to trigger loading of the contect when the user scrolls into a particular page region. Web APIs also manage some aspects of the execution of JS, allowing JS to use another thread aside its own, where the callbacks are queued.
