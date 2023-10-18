# JS :: Index :: Language Reference

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference

JavaScript language is intended to be used within an environment, be it a browser, server-side scripts, or a runtime like Node.js. For the most part, this reference attempts to be environment-agnostic and does not target a web browser environment specifically.

- Builtins
  - JS standard builtin objects, their methods and properties
    https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects
- Value (data) properties
  - `globalThis`
  - `Infinity`
  - `NaN`
  - `undefined`
- Function (method) properties
  - eval()
  - isFinite()
  - isNaN()
  - parseFloat()
  - parseInt()
  - decodeURI()
  - decodeURIComponent()
  - encodeURI()
  - encodeURIComponent()
  - escape() Deprecated
  - unescape() Deprecated
- Fundamental objects
  - Object
  - Function
  - Boolean
  - Symbol
- Error objects
  - Error
  - AggregateError
  - EvalError
  - RangeError
  - ReferenceError
  - SyntaxError
  - TypeError
  - URIError
InternalError (non-standard)
- Numbers and dates
Number
BigInt
Math
Date
Text processing
String
RegExp
Indexed collections
Array
Int8Array
Uint8Array
Uint8ClampedArray
Int16Array
Uint16Array
Int32Array
Uint32Array
BigInt64Array
BigUint64Array
Float32Array
Float64Array
Keyed collections
Map
Set
WeakMap
WeakSet
Structured data
ArrayBuffer
SharedArrayBuffer
DataView
Atomics
JSON
Managing memory
WeakRef
FinalizationRegistry
Control abstraction objects
Iterator
AsyncIterator
Promise
GeneratorFunction
AsyncGeneratorFunction
Generator
AsyncGenerator
AsyncFunction
Reflection
Reflect
Proxy
Internationalization
Intl
Intl.Collator
Intl.DateTimeFormat
Intl.DisplayNames
Intl.DurationFormat
Intl.ListFormat
Intl.Locale
Intl.NumberFormat
Intl.PluralRules
Intl.RelativeTimeFormat
Intl.Segmenter
Statements
JavaScript statements and declarations

Control flow
return
break
continue
throw
if...else
switch
try...catch
Declaring variables
var
let
const
Functions and classes
function
function*
async function
async function*
class
Iterations
do...while
for
for...in
for...of
for await...of
while
Others
Empty
Block
Expression statement
debugger
export
import
label
with Deprecated
Expressions and operators
JavaScript expressions and operators.

Primary expressions
this
Literals
[]
{}
function
class
function*
async function
async function*
/ab+c/i
`string`
( )
Left-hand-side expressions
Property accessors
?.
new
new.target
import.meta
super
import()
Increment and decrement
A++
A--
++A
--A
Unary operators
delete
void
typeof
+
-
~
!
await
Arithmetic operators
**
*
/
%
+ (Plus)
-
Relational operators
< (Less than)
> (Greater than)
<=
>=
instanceof
in
Equality operators
==
!=
===
!==
Bitwise shift operators
<<
>>
>>>
Binary bitwise operators
&
|
^
Binary logical operators
&&
||
??
Conditional (ternary) operator
(condition ? ifTrue : ifFalse)
Assignment operators
=
*=
/=
%=
+=
-=
<<=
>>=
>>>=
&=
^=
|=
**=
&&=
||=
??=
[a, b] = arr, { a, b } = obj
Yield operators
yield
yield*
Spread syntax
...obj
Comma operator
,
Functions
JavaScript functions.

Arrow Functions
Default parameters
Rest parameters
arguments
Method definitions
getter
setter
Classes
JavaScript classes.

constructor
extends
Private class features
Public class fields
static
Static initialization blocks
Additional reference pages
Lexical grammar
Data types and data structures
Iteration protocols
Trailing commas
Errors
Strict mode
Deprecated features
