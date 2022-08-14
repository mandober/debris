# JS modules

https://v8.dev/features/modules
https://caniuse.com/#feat=es6-module

Modular JS code is realized using any one of the userland standards: CommonJS, RequireJS, UMD, AMD

JavaScript modules are now supported in all major browsers (June 2018).

JS modules (ES modules or ECMAScript modules) 


All of these module systems have one thing in common: they allow you to import and export language constructs.


## CommonJS
- home: http://www.commonjs.org/
- wiki: http://wiki.commonjs.org/wiki/CommonJS
CommonJS is a module implementation employed in Node (which uses a slight variant). The tools, such as Browserify, make it usable in browsers as well.
Welcome to CommonJS, a group with a goal of building up the JavaScript ecosystem for web servers, desktop and command line apps and in the browser.

**UMD**
https://github.com/umdjs/umd
UMD (Universal Module Definition) patterns for JavaScript modules that work everywhere.
This repository formalizes the design and implementation of the Universal Module Definition (UMD) API for JavaScript modules. These are modules which are capable of working everywhere, be it in the client, on the server or elsewhere.

The UMD pattern typically attempts to offer compatibility with the most popular script loaders of the day (e.g RequireJS amongst others). In many cases it uses AMD as a base, with special-casing added to handle CommonJS compatibility.

**AMD**
https://github.com/amdjs/amdjs-api/wiki/AMD
