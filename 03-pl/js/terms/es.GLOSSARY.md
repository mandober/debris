# JS :: Glossary :: Glossary of EcmaScript aka JS Core language

<!-- TOC -->

- [BigInt](#bigint)
- [Boolean value](#boolean-value)
- [Boolean type](#boolean-type)
- [Boolean object](#boolean-object)
- [Built-in object](#built-in-object)
- [Constructor](#constructor)
- [ECMA-262](#ecma-262)
- [ECMAScript releases](#ecmascript-releases)
- [ES6](#es6)
- [ECMAScript proposals](#ecmascript-proposals)
- [ECMAScript](#ecmascript)
- [ESNext](#esnext)
- [Floating-point number](#floating-point-number)
- [Number](#number)
- [Global properties](#global-properties)
- [Global object](#global-object)
- [Global objects](#global-objects)
- [Harmony](#harmony)
- [Host object](#host-object)
- [IEEE 754](#ieee-754)
- [Infinity](#infinity)
- [Language construct](#language-construct)
- [NaN](#nan)
- [Native object](#native-object)
- [Null](#null)
- [Null type](#null-type)
- [Number value](#number-value)
- [Number type](#number-type)
- [Number object](#number-object)
- [Object](#object)
- [POJO](#pojo)
- [Primitive value](#primitive-value)
- [Prototype](#prototype)
- [Stringifier](#stringifier)
- [String value](#string-value)
- [String type](#string-type)
- [String object](#string-object)
- [TC39](#tc39)
- [Type](#type)
- [Undefined](#undefined)
- [Undefined type](#undefined-type)

<!-- /TOC -->

## BigInt
The `BigInt` type is a relatively recent addition to JS numeric types. These are integers only numbers with arbitrary precision, but the downside is that their literals must be suffixed with 'n'.

```js
2n**20n === 1_048_576n === (2n**16n * 2n**4n === 0x10_0000n) // true
```

## Boolean value
A boolean value is a member of the type Boolean and is one of either two unique values, true and false.

## Boolean type
The type Boolean represents a logical entity and consists of exactly two unique values. One is called true and the
other is called false.

## Boolean object
A Boolean object is a member of the type Object and is an instance of the Boolean object which is a constructor. That is, a boolean object is created by using the Boolean constructor in a new expression, supplying a boolean as an argument. The resulting object has an implicit (unnamed) property which is the boolean. A boolean object can be coerced to a boolean value. A boolean object can be used anywhere a boolean value is expected. This is an example of one of the conveniences built into ECMAScript-in this case it is to accommodate programmers of varying backgrounds. Those familiar with imperative or procedural programming languages may find number values more natural, while those familiar with object-oriented languages may find number objects more intuitive.

## Built-in object
A built-in object is any object supplied by an ECMAScript implementation, independent of the host environment, that is present at the start of the execution of an ECMAScript program. Standard built-in objects are defined in this specification, and the ECMAScript implementation may specify and define others. Every built-in object is a native object.

## Constructor
A constructor is a function object which creates and initializes objects. Each constructor has an associated prototype object which is used to implement inheritance and shared properties.

## ECMA-262
ECMA-262 is the name assigned to the ECMAScript language and its specification by the body that standardizes the language, ECMA international standards body.

The [latest ES specification](https://tc39.es/ecma262/multipage) is the most accurate and up-to-date ECMAScript specification. It contains the content of the most recent yearly snapshot plus any *finished proposals* (those that have reached *Stage 4* in the *proposal process*, and either are implemented or queued for implementation) since that snapshot was taken.

## ECMAScript releases
Since 2015 and ES6, new releases are on a yearly cycle.

## ES6
After many years of inactivity and disagreements, in 2015, the EcmaScript 2015, aka ES5, was finally released, bringing plethora of new features to the language. It was a seminal realease and scope-wise, nothing similar was seen since (with each subsequent release only introducing bob, like a new method or two; which could be user-defined anyway; i.e. noting of import).

## ECMAScript proposals
ECMAScript (core JS langauge sans the web API part)
ECMAScript proposal stages

## ECMAScript
Ecma International is a Swiss standards association that defines *the core JavaScript language standard* under the name *ECMAScript* or *ECMA-262*. EcmaScript refers to the core language, its standard, but sometimes it is also used interchangibly with JavaScript. More strictly, it should only reference the core JS langauge, without the hosting enviroment and Web APIs.

## ESNext
A dynamic term that references the next upcoming version of ECMAScript.

## Floating-point number
The main numeric machine primitive is integer, but floating-point numbers are also represented having their own dedicated floating-point unit (FPU) in the CPU. The IEEE 754 standardizes the definitions of several variants of floating-point numbers in base 10 (decimalXX) and base 2 (binaryXX). The most popular variants are `binary32` (single precision) and `binary64` (double precision) floating-point numbers, known in many PLs as `Float` and `Double`.

## Number
JS `Number` type is actually what other languages call `Double`, and what the IEEE standard 754 calls `binary64` (double-precision floating-point number). On the surface, JS uses floating-point numbers to represent floats and integers alike, but internally it does discern between them, particularly in relation with bitwise operations; these can be (ab)used to force a number's internal representation to an integer, commonly by OR-ing it with zero, `42|0`.

## Global properties
The global object (in all contexts referenced by `globalThis`) has numerous properties some of which are value properties (global value properties) and others are function properties (global function properties). *Global value properties* return a simple value; they lack properties or methods. Those are `Infinity`, `NaN`, `undefined` and `null`. *Global function properties* are functions and methods in the global scope. All of these are properties of the global object and all of them are also in global scope.

## Global object
*"The global object"* (note the definite article "the") refers to the top-most object, the one referenced by `this`, when `this` is used in the global scope. The global scope is overpopulated with *the global object*'s properties - all its properties are available globally, meaning it is possible to refer to any without a qualifier; e.g. `this` in the global scope in a browser environment returns `window`. The global object is different depending on the context and environment. In the context of browser, you can refer to `window`, `self`, `frames`, in the context of Web Workers to `self`, and in node to `global`. A recent addition to the language is the global property `globalThis` that is a valid reference to the global object in any context and environment.

## Global objects
The term "Global objects" (particularly in the plural or in singular without the deinite article) usually refers to objects that live in the global scope, as opposed to *the global object* (referenced by the `globalThis`). These global objects are actually properties of *the global object*.

## Harmony
Another dynamic term (besides ESNext) that references the next upcoming version of ECMAScript. The `--harmony` flag to V8 enables experimental ESNext features.

## Host object
A host object is any object supplied by the host environment to complete the execution environment of ECMAScript. Any object that is not native is a host object.

## IEEE 754
In 1985, the IEEE 754 Standard for Floating-Point Arithmetic was established, which defines the representation and arithemtic operations on floating-point numbers. Two most popular variants of floating-point numbers are `binary32` (single-precision) and `binary64` (double-precision), known in many PLs as `Float` and `Double`.

## Infinity
The primitive value `Infinity` represents the positive infinite number value. There is also `-Infinity`; both values can also be denoted as constants, i.e. `Number.POSITIVE_INFINITY` and `Number.NEGATIVE_INFINITY`.

## Language construct
In programming languages, in general, the phrase "language construct" means a piece of syntax that is not user-definable and must be interpreted in a special way by the compiler. In JS, a convenient definition is: any language feature that cannot be properly polifilled.

## NaN
The primitive value `NaN` represents a set of values that are by IEEE Standard defined as "Not-a-Number" values.

## Native object
A native object is any object supplied by an ECMAScript implementation independent of the host environment. Standard native objects are defined in this specification. Some native objects are built-in; others may be
constructed during the course of execution of an ECMAScript program.

## Null
Null is a primitive value that represents the null, empty, or nonexistent reference.

## Null type
The type Null has exactly one value, called null.

## Number value
A number value a member of the type Number and is a direct representation of a number.

## Number type
The type Number is a set of values representing numbers. In ECMAScript the set of values represent the doubleprecision 64-bit format IEEE 754 value along with a special "Not-a-Number" (NaN) value, positive infinity, and
negative infinity.

## Number object
A number object is a member of the type Object and is an instance of the Number object which is a constructor.
That is, a number object is created by using the Number constructor in a new expression, supplying a number as
an argument. The resulting object has an implicit (unnamed) property which is the number. A number object can
be coerced to a number value. A number object can be used anywhere a number value is expected. Note that a
number object can have shared properties by adding them to the Number prototype.

## Object
An *object* is a member of the type `Object`. It is an unordered collection of properties which contain primitive values, objects, or functions. A function stored in the property of an object is called a *method*.

## POJO
Plain-old JavaScript Object. The term originated in Java, but it is applicable to JS objects as well.

## Primitive value
A primitive value is a member of one of the types Undefined, Null, Boolean, Number, or String. A primitive value is a datum which is represented directly at the lowest level of the language implementation.

## Prototype
A prototype is an object used to implement structure, state, and behavior inheritance in ECMAScript. When a constructor creates an object, that object implicitly references the constructor's associated prototype for the purpose of resolving property references. The constructor's associated prototype can be referenced by the program expression `constructor.prototype`, and properties added to an object's prototype are shared, through inheritance, by all objects sharing the prototype.

## Stringifier
An object's stringifier is any attribute or method that is defined to provide a textual representation of the object for use in situations where a string is expected. Usually, the method `toString()` is called on the object to get the object's textual representation. An object can be easily stringified using the `JSON.stringify(obj)` method.

## String value
A string value is a member of the type String and is the set of all finite ordered sequences of zero or more Unicode characters.

## String type
The type String is the set of all finite ordered sequences of zero or more Unicode characters.

## String object
A string object is a member of the type Object and is an instance of the String object which is a constructor. That
is, a string object is created by using the String constructor in a new expression, supplying a string as an
argument. The resulting object has an implicit (unnamed) property which is the string. A string object can be
coerced to a string value. A string object can be used anywhere a string value is expected.

## TC39
TC39 is governing committee in charge of ECMAScript (JS core language) specification consisting of representatives from the big tech companies such as Mozilla, Google, Facebook, Apple, Microsoft, Intel, etc.
https://tc39.github.io/

## Type
A type is a set of data values. In general, the correct functioning of a program is not affected if different data values of the same type are substituted for others.

## Undefined
Undefined is a primitive value used when a variable has not been assigned a value.

## Undefined type
The type `undefined` has exactly one value, also denoted `undefined`. Even JS recognizes `undefined` as a type because `typeof undefined` returns `'undefined'`. It TS, `undefined` is a bottom type with a single value, `undefined: undefined`.
