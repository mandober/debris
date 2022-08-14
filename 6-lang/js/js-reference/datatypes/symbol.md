# Symbols

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Symbol
https://developer.mozilla.org/en-US/docs/Glossary/Symbol
http://exploringjs.com/es6/ch_symbols.html

* an instance of Symbol can be assigned to an L-value, can be examined for identity
* used as a key for obj prop when private prop name is desired
* value of symbol type can be referred to as a "symbol value"
* at RT a symbol value is created by invoking the function `Symbol()`, which dynamically produces an unique anonymous value (string of random chars)
* when used as identifier in a prop assignment, the prop (like the symbol) is anonymous and non-enumberable
* prop can be accessed by using the original symbol value that created the symbol or by iterating over the `Object.getOwnPropertySymbols()` array
* builtin `Symbol()` fn is an incomplete class that returns a symbol value when called as a fn i.e. without `new` 
* throws if used as a ctor, `new Symbol()`
* has static methods for accessing global symbol table
* has static properties for addressing certain symbols that are present in commonly used objects
* the internal value of a symbol itself, referred to as its `[[name]]`, is hidden from the code and cannot be obtained; think of a symbol value as an automatically generated, unique (within an app), string value.

## Shared symbols in the global symbol registry

* `Symbol()` won't create a global symbol, available in the whole codebase
* symbol available across files and realms (each of which has its own global scope), can be created using these methods:
  - set symbol in the global symbol registry: `Symbol.for()`
  - retrieve symbols from the global symbol registry: `Symbol.keyFor()`


```js
Symbol.keyFor(Symbol.for("tokenString")) === "tokenString"; // true
```

There are 3 ways to obtain a symbol:

1. `Symbol()`
   returns a new unique symbol each time it’s called

2. `Symbol.for(string)`
   This accesses a set of existing symbols called the symbol registry. Unlike unique symbols defined by Symbol(), symbols in the symbol registry are shared. If you call `Symbol.for("cat")` thirty times, it will return the same symbol each time. The registry is useful when multiple web pages, or multiple modules within the same web page, need to share a symbol.

3. Predefined symbols like `Symbol.iterator`, defined by the standard.
   A few symbols are defined by the standard itself. 
   Each one has its own special purpose.


## Well-known Symbols

**Well-known symbols** are built-in Symbol values that are explicitly referenced by algorithms of this specification. They are typically used as the keys of properties whose values serve as extension points of a specification algorithm. Unless otherwise specified, well-known symbols values are shared by all realms. Within this specification a well-known symbol is referred to by using a notation of the form `@@name`, where "name" is one of the values listed below.


Specification Name : `@@iterator`   
[[Description]]    : *Symbol.iterator*
- A method that returns the default iterator for an object.
- Called by the semantics of `for...of`.

`@@toStringTag`
- *Symbol.toStringTag*
- A String valued property that is used in the creation of the default string description of an object.
- Accessed by the built-in method `Object.prototype.toString`.

`@@toPrimitive`
*Symbol.toPrimitive*
- A method that converts an object to a corresponding primitive value.
- Called by the `ToPrimitive` abstract operation.

`@@hasInstance`
- *Symbol.hasInstance*
- A method that determines if a constructor object recognizes an object as one of the constructor's instances. 
- Called by the semantics of the `instanceof` operator.

`@@isConcatSpreadable`
- *Symbol.isConcatSpreadable*
- A Boolean valued property that if true indicates that an object should
be flattened to its array elements by `Array.prototype.concat`.

`@@species`
- *Symbol.species*
- A function valued property that is the constructor function that is used to create derived objects.

`@@unscopables`
- *Symbol.unscopables*
- An object valued property whose own and inherited property names are property names that are excluded from the `with` environment bindings of the associated object.

`@@match`
- *Symbol.match*
- A regular expression method that matches the regular expression against a string.
- Called by the `String.prototype.match` method.

`@@replace`
- *Symbol.replace*
- A regular expression method that replaces matched substrings of a string.
- Called by the `String.prototype.replace` method.

`@@search`
- *Symbol.search*
- A regular expression method that returns the index within a string that matches the regular expression.
- Called by the `String.prototype.search` method.

`@@split`
- *Symbol.split*
- A regular expression method that splits a string at the indices that match the regular expression.
- Called by the `String.prototype.split` method.



## Symbol type conversions

* trying to convert a symbol to a number throws TypeError
* loose equality, `Object(sym) == sym` is true
* `Symbol("foo") + "bar"` throws a TypeError (can't convert symbol to string). This prevents you from silently creating a new string property name from a symbol.
* `String(sym)` conversion works like a call to `Symbol.prototype.toString()` with symbols, but `new String(sym)` throws

```js
var s = Symbol('test');

+s; // TypeError: Cannot convert a Symbol value to a number
Number(s); // TypeError: Cannot convert a Symbol value to a number

"abc" + s; // TypeError: Cannot convert a Symbol value to a string
String(s); // 'Symbol(test)'

Object(s); // [Symbol: Symbol(test)]
Object(s) == s // true
Object(s) === s // false
Object.is(Symbol(s), s); // TypeError: Cannot convert a Symbol value to a string
```
