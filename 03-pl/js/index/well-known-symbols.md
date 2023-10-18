# Well-Known Symbols

https://tc39.es/ecma262/multipage/ecmascript-data-types-and-values.html#sec-well-known-symbols

## Symbol data type

The `Symbol` type is the set of all non-String values that may be used as the key of an Object property (6.1.7).

Each possible `Symbol` value is unique and immutable.

Each `Symbol` value immutably holds an associated value called [[Description]] that is either `undefined` or a String value.

## Well-Known Symbols

Well-known symbols are builtin `Symbol` values that are explicitly referenced by algorithms of this specification. They are typically used as the keys of properties whose values serve as extension points of a specification algorithm. Unless otherwise specified, well-known symbols values are shared by all *realms* (9.3).

Within this specification a *well-known symbol is referred* to by using a notation of the form `@@name`, where "name" is one of the values listed in Table 1.


Specification Name | [[Description]] | Value and Purpose


`@@asyncIterator`
- "Symbol.asyncIterator"
- A method that returns the default `AsyncIterator` for an object. Called by the semantics of the *for-await-of statement*.

`@@hasInstance`
- "Symbol.hasInstance"
- A method that determines if a constructor object recognizes an object as one of the constructor's instances. Called by the semantics of the instanceof operator.

`@@isConcatSpreadable`
- "Symbol.isConcatSpreadable"
- A Boolean valued property that if true indicates that an object should be flattened to its array elements by Array.prototype.concat.
@@iterator
- "Symbol.iterator"
- A method that returns the default Iterator for an object. Called by the semantics of the for-of statement.
@@match
- "Symbol.match"
- A regular expression method that matches the regular expression against a string. Called by the String.prototype.match method.
@@matchAll
- "Symbol.matchAll"
- A regular expression method that returns an iterator, that yields matches of the regular expression against a string. Called by the String.prototype.matchAll method.
@@replace
- "Symbol.replace"
- A regular expression method that replaces matched substrings of a string. Called by the String.prototype.replace method.
@@search
- "Symbol.search"
- A regular expression method that returns the index within a string that matches the regular expression. Called by the String.prototype.search method.
@@species
- "Symbol.species"
- A function valued property that is the constructor function that is used to create derived objects.
@@split
- "Symbol.split"
- A regular expression method that splits a string at the indices that match the regular expression. Called by the String.prototype.split method.
@@toPrimitive
- "Symbol.toPrimitive"
- A method that converts an object to a corresponding primitive value. Called by the ToPrimitive abstract operation.
@@toStringTag
- "Symbol.toStringTag"
- A String valued property that is used in the creation of the default string description of an object. Accessed by the built-in method Object.prototype.toString.
@@unscopables
- "Symbol.unscopables"
- An object valued property whose own and inherited property names are property names that are excluded from the with environment bindings of the associated object.
