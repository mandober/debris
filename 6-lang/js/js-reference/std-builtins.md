# Standard Builtin Objects

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects


**Standard Built-in Objects** (SBO) are objects in the global scope. Although they *are* global objects, it is best to avoid overloading that term and refer to them consistently as **builtins**. Especially because the singular refers to **the** *global object* A.K.A. the object on the other end of the `this` operator (when used in the global scope). The new global property named `globalThis` contains the environment-appropriate global `this` value.

**Global scope** consists of the properties of *the global object*, including those inherited.

Except for programmers', the other objects found in the global scope are those created by the JS host environment. Host objects available in browsers are documented in the WebAPI reference.


## Examples of some globals


The global property `Infinity` is a numeric value representing infinity.
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Infinity

The global `NaN` property is a value representing Not-A-Number.
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/NaN

`undefined` is a primitive value automatically assigned to variables that have just been declared, or to formal arguments for which there are no arguments. `undefined` is a property of the global object, that is, it is a variable in global scope.
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/undefined
https://developer.mozilla.org/en-US/docs/Glossary/Undefined


`Boolean` global object is an object wrapper for a boolean value.
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Boolean
