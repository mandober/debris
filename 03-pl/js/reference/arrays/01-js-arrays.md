# JS :: Ref :: Arrays

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array

## Description

*Name*: even though the term "array" always includes a sequence of elements in its meaning, its other aspect very greatly between languagues, and arrays in JS are particularly different than most, so they are referred to as *JS arrays* for maximum precision.

JS arrays are specialized objects (with `Object` in their prototype chain), with the constructor function `Array` that holds *static methods*, and the associated prototype object, `Array.prototype`, that holds *instance methods*.

Characteristics of JS arrays
- resizable
- heterogeneous
- zero-indexed
- indices are nonnegative integers (or numeric strings coerced to numbers)
- array-copy operations create shallow copies
- can be sparse
- backing implementation adjusts to support the contents better
- have indexed 'slots' which may contain values or be nothing
- slots can be skipped
- have automagical 'length' property


All builtin operations that create copies, 
create shallow copies (rather than deep copies), 
and this is true for all JS objects, not just arrays.

## Indexing
