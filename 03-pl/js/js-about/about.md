# JS :: About

## General introduction

JavaScript (JS) is an interpreted, in modern times just-in-time (JIT) compiled, and nowadays finally a general purpose programming language since the tech like Node.js had helped JS escape the confines of a browser.

Ironically, it's the fact that it was confined to the browser that JS is now (2023) the world's most popular PLs, which means nothing at all, except that it is accessible to mediocrity, which, on the other hand, does not qualify the language - mediocrity is a high unobtainium in that case. Why? Well, for one it is too verbose, has too much ceremony and ignores the progress made in CS during the last several decades, instead opting to refresh itself in a yearly cicly by adding a new array method or two.

Unfortunatelly, JS is everywhere and the suffering is practiced in silence. Either that, or just switch to PureScipt or Elm, if possible, to regain sanity. Interestingly, React.js has further fired up interest and applicaiton of FP, so languages like these, that compile to JS, are a reasonable option because doing FP in JS is not.

Traditionally, JS was executed at a client's computer, where it was constrained within a browser, having no means of interacting with the outside environment.

That has changed with the advent of Node.js, which has pulled JS out of the browser, equipping it with the missing functionality (IO, FFI), thereby promoting JS into a complete general-purpose language.

And with that, JS has become the first (and still the only) language that can be used at both ends, at the backend (Node.js) as well as the frontend (JS in browser).

The unique feature of JS, at least concerning JS used on the web that executes in the browser, is that it is the only instance of a programming language that has to be downloaded first before it can be processed further. This raises concerns about the size of each JS file, either individually or taking the form of concatenated script bundles. So, the practice of minifying JS source files emerged, often employed together with the process of uglifying (making identifiers as short as possible), thus rendering JS scripts unfriendly for human consumption.




first-class functions
closures
functional programming

but its procedural nature and object orientation push it toward the class of imperative languages.


JS is not an OO language, as it lacks classes but has a proliferating use of objects, which are probably the most significant language structure, having even their own dedicated literal form to facilitate quick construction.

A/N: one way to determine which is the programming paradigm that a given language leans toward the most, is to to examine how it employs the most succinct syntactical operators. The assumption is that the most concise operators, usually those consisting of a sole character entered with a quick keyboard stroke, are reserved for language constructs that a PL cares about and uses the most.

The special (but printable) characters usable as operators of length one:

Tier A - Premium characters (main keyboard)

```
space     SPC
comma     ,
dot       .
backslash \\
colon     :
squote    '
brackets  [ ]
slash     /
equals    =
dash      -
tick      `
```

Tier B - Delicatessen (numpad)

```
dot       .   (reprise)
plus      +
dash      -   (reprise)
asterix   *
slash     /   (reprise)
```



Tier 2 (shift required):


For example, Haskell is all about functions and they application, so it cuts the protocol of applying a function to its argument to the bare minimum: `f x` is the application of the function called `f` to its argument `x`; function application is denoted by a whitespace character. JS (and many other languages) require more ceremony in the form of parenthesis: `f(x)` (and do not use whitespace as an operator). Another very short operator takes the form of a very and easily typed character, `.` (dot), is used in Haskell to denote function composition, which additionally reveals its functional nature. In JS, however, the dot operator is used for method calls, which implies existence of objects and their attached behaviors, revealing JS's preference for OO paradigm.

In fact, JS is not truly OO language because it doesn't support inheritance, which is one of the staples of OO paradigm along with code encapsulation, interfacing and polymorphism. JS has an alternative notion of code reuse and inheritance via delegation enabled by its prototype chain.




While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apache CouchDB and Adobe Acrobat. JavaScript is a prototype-based, multi-paradigm, dynamic language, supporting object-oriented, imperative, and declarative (e.g. functional programming) styles. Read more about JavaScript.

This section is dedicated to the JavaScript language itself, and not the parts that are specific to Web pages or other host environments. For information about APIs specific to Web pages, please see Web APIs and DOM.

The standard for JavaScript is ECMAScript. As of 2012, all modern browsers fully support ECMAScript 5.1. Older browsers support at least ECMAScript 3. On June 17, 2015, ECMA International published the sixth major version of ECMAScript, which is officially called ECMAScript 2015, and was initially referred to as ECMAScript 6 or ES6. Since then, ECMAScript standards are on yearly release cycles. This documentation refers to the latest draft version, which is currently ECMAScript 2020.

Do not confuse JavaScript with the Java programming language. Both "Java" and "JavaScript" are trademarks or registered trademarks of Oracle in the U.S. and other countries. However, the two programming languages have very different syntax, semantics, and uses.
