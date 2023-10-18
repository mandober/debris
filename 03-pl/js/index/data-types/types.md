# Types

Standard objects by category
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects

Standard builtin objects with their methods and properties.

The term 'global objects' or 'standard builtin objects' must not to be confused with 'the global object'.

*"Global objects"* (particularly in the plural) refers to a collection of objects that live in the global scope.

**The global object** (particularly in the singular and with the definite article) itself can be accessed using the this operator in the global scope. In fact, the global scope consists of the properties of the global object, including inherited properties, if any.

Other objects in the global scope are either created by the user script or provided by the host application.

The host objects available in browser contexts are documented in the API reference.

## Standard objects by category

### Value properties (4)

These global properties return a simple value. They lack properties or methods.

- Infinity    (typeof  Infinity === "number")
- NaN         (typeof       NaN === "number")
- undefined   (typeof undefined === "undefined")
- null        (typeof      null === "object")


### Function properties (13)

These global functions (functions which are called globally, rather than on an object) directly return their results to the caller.

- atob
- btoa
- isFinite  *notice*, use `Number.isFinite`
- isNaN     *notice*, use `Number.isNaN`
- parseInt
- parseFloat
- escape    *deprecated*
- unescape  *deprecated*
- decodeURI
- decodeURIComponent
- encodeURI
- encodeURIComponent
- eval
- uneval    *removed*


### Fundamental objects

These are the fundamental, basic objects upon which all other objects are based. This includes general objects, booleans, functions, and symbols.

- Boolean
- Symbol
- Object
- Function

* Error objects
Error
EvalError
InternalError
RangeError
ReferenceError
SyntaxError
TypeError
URIError

// Numbers and dates
// These are the base objects representing numbers, dates, and mathematical calculations.
Number
Math
Date

// Text processing
// These objects represent strings and support manipulating them.
String
RegExp

// Indexed collections
// These objects represent collections of data which are ordered by
// an index value. This includes (typed) arrays and array-like constructs.
Array
Int8Array
Uint8Array
Uint8ClampedArray
Int16Array
Uint16Array
Int32Array
Uint32Array
Float32Array
Float64Array

// Keyed collections
// These objects represent collections which use keys; these contain
// elements which are iterable in the order of insertion.
Map
Set
WeakMap
WeakSet

// Vector collections
// SIMD vector data types are objects where data is arranged into lanes.
SIMD
SIMD.Float32x4
SIMD.Float64x2
SIMD.Int8x16
SIMD.Int16x8
SIMD.Int32x4
SIMD.Uint8x16
SIMD.Uint16x8
SIMD.Uint32x4
SIMD.Bool8x16
SIMD.Bool16x8
SIMD.Bool32x4
SIMD.Bool64x2

// Structured data
// These objects represent and interact with structured data buffers
// and data coded using JavaScript Object Notation (JSON).
ArrayBuffer
SharedArrayBuffer
Atomics
DataView
JSON

// Control abstraction objects:
Promise
Generator
GeneratorFunction
AsyncFunction

// Reflection
Reflect

// Internationalization:
Intl
Intl.Collator
Intl.DateTimeFormat
Intl.NumberFormat

// WebAssembly:
WebAssembly
WebAssembly.Module
WebAssembly.Instance
WebAssembly.Memory
WebAssembly.Table
WebAssembly.CompileError
WebAssembly.LinkError
WebAssembly.RuntimeError

// Non-standard objects:
Iterator
ParallelArray
StopIteration

// Other:
arguments
```
