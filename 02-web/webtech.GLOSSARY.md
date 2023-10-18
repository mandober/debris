# Web tech :: GLOSSARY
Web technology and full-app stacks


## Bun
Bun is a JS runtime or JS hosting environment that enables running JS outside the browser. In fact, after Node and Deno, Bun is the third instance of making JS a general purpose language.

Unlike Node and Deno that use V8 JS engine by default, Bun uses Microsoft's open-sourced "Chakra" JS engine that debuted in late versions of the IE and early versions of the Edge browser (before it switched to V8).

## Deno
Deno is a JS run-time based on Chrome's V8 JS engine endowed with Rust libraries (that plays the role of Web APIs) that allows JS (and TS) to ascend from the client-side only environemnt into a proper general-purpose language.

## Express
Express.js is a low-level Node framework for building servers and server apps.

## Gatsby
Gatsby is a React-based JS static site generator with support for server-side rendering (SSR) and deferred static content.

## Google Chrome
is a cross-platform web browser developed by Google and first released in 2008. It has upped the ante in JS processing speed by introducing JIT compiler and shit, which soon other players followed, resulting in improved overall web experience. Chrome browser is also the main component of *Chrome OS* or is it *Chromium*, where it serves as the platform for web apps.

## jQuery
jQuery is called a light JS framework, more of a light wrapper that was really popularized thanks to its component called `Sizzle` that enabled developers to select DOM elements using a very concise and cross-browser compatibile syntax. At the time jQuery ruled the web (around 2006 t'was peaking), there were many browsers, each following a slightly different standard, making the developers' job a nightmare (IE6 still needed to be supported, which had a very peculiar set of quirks, even prompting the so-called quirks mode of rendering pages), and jQuery provided a layer of abstraction over these incompatibilities, presenting one API to the developers (except for IE6 which required some extra pain). Later unification of DOM standards diminished the need for jQuery (although the project is still active now in 2023).

## Mongo
MongoDB is a Node-based NoSQL database.

## Node
Node is the Chrome's V8 JS engine with C++ libraries that play the role of Web APIs and allow JS to ascend from the client-side only environemnt into a proper general-purpose language. Node is created by Ryan 

## Prisma
https://www.prisma.io/
Prisma is a Object Document Mapper (ODM)

## React
React.js is a reactive JS framework based on the principles of functional-reactive programming.

## Remix
https://remix.run/
Remix is a full-stack web framework that lets you focus on the UI and work back through web standards to deliver a fast and resilient UX.

Remix is a seamless server and browser runtime that provides snappy page loads and instant *transitions* by leveraging *distributed systems* and native browser features instead of clunky *static builds*. Built on the Web Fetch API (instead of Node) it can run anywhere. It already runs natively on *Cloudflare Workers*, and supports *serverless* and traditional *Node.js environments*. Page speed and excellent UX are one of the main goals.

Remix is 4 primary things: a compiler, an HTTP handler, a server framework, and a browser framework.
