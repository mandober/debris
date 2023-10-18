# ECMAScript language specification

ECMAScript® 2024 Language Specification
(Draft ECMA-262 - August 23, 2023)
https://tc39.es/ecma262/multipage/

## Overview

## Host environment

ECMAScript was originally designed to be used as a scripting language for browsers, but has transitioned into a general-purpose programming language.

A **scripting language** is a programming language used to automate and manipulate the functionality of an existing system. In such systems, functionality is already available through a UI, and the scripting language is just a means through which that functionality is exposed to programatic manipulation. That existing system is a **host environment** for the scripting language; it exposes its functionality through an API which the scripting language consumes and makes it available to programmers.

A scripting language is a subset of general-purpose programming language with a limited I/O functionality. Unlike a GPPL, which is free to access and exchange information with the outside world in any manner, a SPL is limited to the communication with its host environment only.

Examples of scripting languages include VBScript which is hosted in Microsoft Office applications. Each Office application can be controlled by its flavor of VBScript. VBScript is strictly limited to its host environment - it cannot perform arbitrary tasks like GPPLs can. However, sometimes this limit is less clear; for example, bash is also considered a scripting language, but it has far more freedom that other SPL.

Similarly, EcmaScript was also initially confined to a browser - in the sense that JavaScript could only be found in browsers where it was used as a web scripting language, providing a mechanism to enliven Web pages.



ECMAScript is now used to provide core scripting capabilities for a variety of host environments. Therefore the core language is specified in this document apart from any particular host environment.

ECMAScript usage has moved beyond simple scripting and it is now used for the full spectrum of programming tasks in many different environments and scales.

As the usage of ECMAScript has expanded, so have the features and facilities it provides.

ECMAScript is now a fully featured general-purpose programming language.

## 4.1 Web Scripting

A *web browser* provides an ECMAScript *host environment* for client-side computation including, for instance, objects that represent windows, menus, pop-ups, dialog boxes, text areas, anchors, frames, history, cookies, and input/output. Further, the host environment provides a means to attach scripting code to events such as change of focus, page and image loading, unloading, error and abort, selection, form submission, and mouse actions.

Scripting code appears along the HTML code and the displayed page is a combination of UI elements and static (fixed and computed) text and images.

The chunks of the scripting code are each responsible and reactive to user interaction, and there is no need for a main program.

A *web server* provides a different host environment for *server-side computation* including objects representing requests, clients, and files; and mechanisms to lock and share data. By using *browser-side and server-side scripting* together, it is possible to distribute computation between the client and server while providing a customized UI for web-based apps.

Each Web browser and server that supports ECMAScript supplies its own host environment, completing the **ECMAScript execution environment**.

## 4.2 Hosts and Implementations

To aid integrating ECMAScript into host environments, this specification defers the definition of certain facilities (e.g. abstract operations), either in whole or in part, to a source outside of this specification.

This specification distinguishes the following kinds of deferrals.

An **implementation** is an external source that further defines facilities enumerated in Annex D or those that are marked as implementation-defined or implementation-approximated.
>Informally, an *implementation* refers to a concrete artefact, such as a particular web browser.

An **implementation-defined facility** is one that defers its definition to an external source without further qualification. This specification does not make any recommendations for particular behaviours, and conforming implementations are free to choose any behaviour within the constraints put forth by this specification.

An **implementation-approximated facility** is one that defers its definition to an external source while recommending an ideal behaviour. While conforming implementations are free to choose any behaviour within the constraints put forth by this specification, they are encouraged to strive to approximate the ideal. Some mathematical operations, such as `Math.exp`, are implementation-approximated.

A **host** is an external source that further defines facilities listed in Annex D but does not further define other implementation-defined or implementation-approximated facilities.

>Informally, a *host* refers to the set of all implementations, such as the set of all web browsers, that interface with this specification in the same way.

(via Annex D). A host is often an external specification, such as WHATWG HTML (https://html.spec.whatwg.org/). In other words, facilities that are host-defined are often further defined in external specifications.

*A **host hook** is an abstract operation* that is defined in whole or in part by an external source. All host hooks must be listed in Annex D. A host hook must conform to at least the following requirements: It must return either a `normal completion` or a `throw completion`.

A **host-defined facility** is one that defers its definition to an external source without further qualification and is listed in Annex D. Implementations that are not hosts may also provide definitions for host-defined facilities.

A **host environment** is a particular choice of definition for all host-defined facilities.
>A host environment typically includes functionality (objects or functions) which provide I/O as host-defined properties of the global object.

Both hosts and implementations may interface with this specification via
- language types
- specification types
- abstract operations
- grammar productions
- intrinsic objects
- intrinsic symbols defined herein


## 4.3 ECMAScript Overview

ECMAScript is **object-based**: basic language and host facilities are provided by objects, and an ECMAScript program is a cluster of communicating objects.

In ECMAScript, an **object** is a collection of zero or more properties each with attributes that determine how each property can be used; e.g. when the `Writable` attribute for a property is set to false, any attempt by executed ECMAScript code to assign a different value to the property fails.

**Properties** are containers that hold other objects, primitive values, or functions.

A **primitive value** is a member of one of the following *builtin types*:
- Undefined
- Null
- Boolean
- Number
- BigInt
- String
- Symbol

An **object** is a member of the builtin type `Object`.   
A **function** is a *callable object*.   
A function associated with an object via a property is called a *method*.

ECMAScript defines a collection of builtin objects that round out the definition of ECMAScript entities. These **builtin objects** include 
- *the global object*
- objects that are fundamental to the runtime semantics of the language including Object, Function, Boolean, Symbol, and various Error objects
- objects that represent numeric values including Math, Number, and Date
- text processing objects String and RegExp
- objects that are indexed collections of values including Array and 9 different kinds of Typed Arrays whose elements all have a specific numeric data representation
- keyed collections including Map and Set objects
- objects supporting structured data including JSON object, ArrayBuffer, SharedArrayBuffer, DataView
- objects supporting *control abstractions* including generator functions and Promise objects
- reflection objects including Proxy and Reflect


ECMAScript also defines a set of **builtin operators** which include
- various unary operations
- multiplicative operators
- additive operators
- bitwise shift operators
- relational operators
- equality operators
- binary bitwise operators
- binary logical operators
- assignment operators
- the comma operator


Large ECMAScript programs are supported by **modules** which allow a program to be divided into multiple *sequences of statements and declarations*.

Each module explicitly identifies declarations it uses that need to be provided by other modules and which of its declarations are available for use by other modules.

ECMAScript syntax is relaxed to enable it to serve as an easy-to-use scripting language. For example, a variable is not required to have its type declared; function are not required to have their declarations appear textually before calls to them - only because function statements (as well as var-declared variables) are hoisted to the top of the current scope (functions have precedence over var-declared variables re hoisting).
