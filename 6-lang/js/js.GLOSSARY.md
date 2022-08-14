# JS GLOSSARY


## ECMAScript
Ecma International, a Swiss standards association, is the standards body that the JS was submitted to for stadardization. It as filed there there under the name ECMAScript or ECMA-262. (*ECMA-262* is the language spec, *TC39* is the tech committee).

## ESNext
Dynamic term that references the next upcoming version of ECMAScript.

## Google Chrome
is a cross-platform web browser developed by Google and first released in 2008. It has upped the ante in JS processing speed by introducing JIT compiler and shit, which soon other players followed, resulting in improved overall web experience. Chrome browser is also the main component of *Chrome OS* or is it *Chromium*, where it serves as the platform for web apps.

## Global Value Property
Global value properties (GVP) return a simple value; they lack properties or methods. GVPs: `Infinity`, `NaN`, `undefined` and `null`.

## Global objects
The term "Global objects" (particularly in the plural or in singular without the deinite article) usually refers to objects that live in the global scope, as opposed to *the global object* (referenced by the `globalThis`). These global objects are actually properties of *the global object*.

## Harmony
Dynamic term that references the next upcoming version of ECMAScript.
As `--harmony`, the flag to V8 to enable experimental ESNext features.

## TC39
TC39 is JS governing committee, consisting of representatives from the big tech companies such as Mozilla, Google, Facebook, Apple, Microsoft, Intel, etc.
https://tc39.github.io/

## The global object
*The global object* (particularly in the singular and with the definite article) refers to the top-most object, the one behind the `this` when it is used in the global scope. In fact, the global scope is overpopulated with the global object's properties; pretty much all of its properties are globally available, so they may be referenced without a qualifier (e.g. `window)

In fact, the global scope is full of properties of the global object. The global object is different depending on the context and env; on the web you can use `window`, `self`, `frames`, but in the context of Web Workers `self` and in Node.js `global`. The recent addition to the language, the global `globalThis` property, is the always valid reference to the global object.
