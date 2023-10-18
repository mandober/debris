# JS :: Glossary :: JS Ecosystem Glossary


## Bun
After Node and Deno, Bun is the third instance of creating a JS standalone runtime. Unlike Node and Deno which use V8 JS engine (although there is an option to use Chakra with Node also), Bun uses the Chakra JS engine.

## Deno
Deno is a JS run-time based on Chrome's V8 JS engine endowed with Rust libraries (that plays the role of Web APIs) that allows JS (and TS) to ascend from the client-side only environemnt into a proper general-purpose language.

## Express
Express.js is a low-level Node framework for building servers and server apps.

## Gatsby
Gatsby is a React-based JS static site generator with support for server-side rendering (SSR) and deferred static content.

## jQuery
jQuery is called a light JS framework, more of a light wrapper that was really popularized thanks to its component called `Sizzle` that enabled developers to select DOM elements using a very concise and cross-browser compatibile syntax. At the time jQuery ruled the web (around 2006 t'was peaking), there were many browsers, each following a slightly different standard, making the developers' job a nightmare (IE6 still needed to be supported, which had a very peculiar set of quirks, even prompting the so-called quirks mode of rendering pages), and jQuery provided a layer of abstraction over these incompatibilities, presenting one API to the developers (except for IE6 which required some extra pain). Later unification of DOM standards diminished the need for jQuery (although the project is still active now in 2023).

## Mongo
MongoDB is a Node-based NoSQL database.

## Node
Node is the Chrome's V8 JS engine with C++ libraries that play the role of Web APIs and allow JS to ascend from the client-side only environemnt into a proper general-purpose language. Node is created by Ryan 

## React
React.js is a reactive JS framework based on the principles of functional-reactive programming.

## Simple Common Gateway Interface
SCGI is a protocol for applications to interface with HTTP servers, as an alternative to the CGI protocol. It is similar to FastCGI but is designed to be easier to parse. Unlike CGI, it permits a long-running service process to continue serving requests, thus avoiding delays in responding to requests due to setup overhead (such as connecting to a database).
