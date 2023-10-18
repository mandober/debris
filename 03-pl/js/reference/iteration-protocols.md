# Iteration protocols

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Iteration_protocols


- iteration protocols
  - iterable protocol
  - iterator protocol
- `@@iterator` method
- iterable iterator
- [Symbol.iterator] property
- [Symbol.iterator]() method
- async iterator
- async iterable protocols
- interactions between the language and iteration protocols


## Iteration protocols

*Iteration protocols* aren't new built-ins or syntax, but *protocols*. These protocols can be implemented by any object by following some conventions.

There are two iteration protocols:
1. The iterable protocol
2. The iterator protocol


## The iterable protocol

>The iterable protocol allows objects to define or customize their iteration behavior.

The iterable protocol is triggered
- when using an iterable in a `for…of` loop
- explicitly calling [Symbol.iterator]() off an iterable
- when using the spread operator

Some builtin types are iterables with a default iteration behavior:
- string
- array
- TypedArray
- `Set`
- `Map`


In order to be iterable an object must implement the `@@iterator` *method*. This means that the object (or one of the objects up its prototype chain) must have a *property* with a `@@iterator` *key* which is available via constant `Symbol.iterator`:

[Symbol.iterator]
  A nullary function returning an object that conforms to the iterator protocol.

```ts
type [Symbol.iterator] = <A>() => ({ next: boolean, value: A})
```

Whenever an object needs to be iterated (such as at the beginning of a `for…of` loop), its *@@iterator method* is called with no arguments, and the *returned iterator* is used to obtain the values.

Note that when this nullary function is called, it is invoked as a method on the iterable object. Therefore inside of the function, the `this` keyword can be used to access the properties of the iterable object, to decide what to provide during the iteration.

This nullary function can be an ordinary function, or it can be a *generator function* so that when invoked an *iterator object* is returned. Inside of the generator function, values can be provided using `yield`.

```js
// @@iterator method is triggered:

// when using the spread operator
console.log(...arr) // 1 2 3

// when using the for…of loop
for (const ax of arr) {
  console.log(ax) // 1 2 3
}

// explicitly when calling an iterable's [Symbol.iterator]() method
let arr = [1, 2, 3]
let it = arr[Symbol.iterator]()
console.log(it) // Object [Array Iterator] {}
console.log(it.next()) // { value: 1, done: false }
console.log(it.next()) // { value: 2, done: false }
console.log(it.next()) // { value: 3, done: false }
console.log(it.next()) // { value: undefined, done: true }
```


## The iterator protocol

>The iterator protocol defines the standard way to produce a finite or infinite sequence of values.

When the set of values have been exhausted (with `yield`), a return value can be provided as well (with `return`).


An object is an *iterator* when it implements the `next()` method with the following semantics:

`next()`
- a function that accepts 0 or 1 arg, and 
  returns an object conforming to the *IteratorResult interface*.
- if a non-object value gets returned (such as `false` or `undefined`) 
  when a builtin language feature (such as `for…of`) is using the iterator, 
  a *TypeError ("iterator.next() returned a non-object value")* is thrown.
- all iterator protocol methods (`next()`, `return()`, `throw()`) 
  are expected to return an object implementing 
  the *IteratorResult interface*, 
  which must have the following properties:
  - `done` (optional, boolean) equal to
    - `false` if the iterator was able to produce the next value
       (equivalent to not specifying the `done` property)
    - `true` if the iterator was exhausted. In this case, `value`
       can optionally specify the return value of the iterator.
  - `value` (optional, any type)
    - any value can be returned by the iterator
    - value is normally omitted when `done` is `true`

```js
// calling an iterable's [Symbol.iterator]() method off an array
let arr = [1, 2, 3]
let it = arr[Symbol.iterator]()

console.log(it) // Object [Array Iterator] {}

console.log(it.next()) // { value: 1, done: false }
console.log(it.next()) // { value: 2, done: false }
console.log(it.next()) // { value: 3, done: false }
console.log(it.next()) // { value: undefined, done: true }
```

In practice, neither property is strictly required; if an object without either property is returned, it's effectively equivalent to

```js
{ done: false, value: undefined }
```


If an iterator returns a result with `done: true`, any subsequent calls to `next()` are expected to return `done: true` as well, although this is not enforced on the language level.

The `next` method can receive a value which will be made available to the method body. No builtin language feature will pass any value, however the value passed to the `next` method of generators will become the value of the corresponding `yield` expression.



Optionally, the iterator can also implement the `return(value)` and `throw(exception)` methods, which, when called, tells the iterator that the caller is done with iterating it and can perform any necessary cleanup.

`return(value)` (optional)
- A function that accepts 0 or 1 argument and returns an object conforming to the *IteratorResult interface*, typically with `value` equal to the value passed in and `done: true`.
- Calling this method tells the iterator that the caller does not intend to make any more `next()` calls and can perform any cleanup actions.

`throw(exception)` (optional)
- A function that accepts 0 or 1 argument and returns an object conforming to the *IteratorResult interface*, typically with `done: true`.
- Calling this method tells the iterator that the caller detects an error condition, and exception is typically an `Error` instance.


>Note: It is not possible to know *reflectively* (i.e. without actually calling `next()` and validating the returned result) whether a particular object implements the iterator protocol.

It is very easy to *make an iterator also iterable*: just implement an [@@iterator]() method that returns `this`.

```js
// Satisfies both the Iterator Protocol and Iterable Protocol
const myIterator = {
  next() {
    // ...
  },
  [Symbol.iterator]() {
    return this
  },
}
```

Such object is called an **iterable iterator**. Doing so allows an iterator to be consumed by the various syntaxes expecting iterables - therefore, it is seldom useful to implement the Iterator Protocol without also implementing Iterable. In fact, almost all syntaxes and APIs expect *iterables*, not *iterators*.

The generator object is an example:

```js
const aGeneratorObject = (function* () {
  yield 1
  yield 2
  yield 3
})()

console.log(typeof aGeneratorObject.next)
// "function"
// it has `next` method (which returns the right result),
// so it's an ITERATOR

console.log(typeof aGeneratorObject[Symbol.iterator])
// "function"
// it has an @@iterator method (which returns the right iterator),
// so it's an ITERABLE

console.log(aGeneratorObject[Symbol.iterator]() === aGeneratorObject)
// true
// its @@iterator method returns itself (an iterator),
// so it's an ITERABLE ITERATOR
```

All *builtin iterators* inherit from `Iterator.prototype`, which implements the [@@iterator]() method by returning `this`, so that *builtin iterators are also iterable*.

However, when possible, it's better for `iterable[Symbol.iterator]` to return different iterators that always start from the beginning, like `Set.prototype[@@iterator]()` does.

## The async iterator and async iterable protocols


## Interactions between the language and iteration protocols

The language specifies APIs that either produce or consume iterables and iterators.

### Built-in iterables

- String
- Array
- TypedArray
- Map
- Set
- Segments (returned by Intl.Segmenter.prototype.segment()) 

are all built-in iterables, because each of their prototype objects implements an `@@iterator` method.

In addition, the `arguments` object and some *DOM collection types* such as `NodeList` are also iterables. `ReadableStream` is the only *builtin async iterable* at the time of writing.

Generator functions return generator objects, which are iterable iterators.

Async generator functions return async generator objects, which are async iterable iterators.

The iterators returned from builtin iterables actually all inherit from a common class `Iterator` (currently unexposed), which implements the aforementioned `[Symbol.iterator]() { return this }` method, making them all iterable iterators.

In the future, these builtin iterators may have additional helper methods in addition to the `next()` method required by the iterator protocol. You can inspect an iterator's prototype chain by logging it in a console.

```js
console.log([][Symbol.iterator]())

Array Iterator {}
  [[Prototype]]: Array Iterator // ==> prototype shared by all array iterators
    next: ƒ next()
    Symbol(Symbol.toStringTag): "Array Iterator"
    [[Prototype]]: Object       // ==> prototype shared by all builtin iterators
      Symbol(Symbol.iterator): ƒ [Symbol.iterator]()
      [[Prototype]]: Object     // ==> This is Object.prototype
```

### Built-in APIs accepting iterables

Many APIs accept iterables, including
- Map()
- WeakMap()
- Set()
- WeakSet()
- Promise.all()
- Promise.allSettled()
- Promise.race()
- Promise.any()
- Array.from()
- Object.groupBy()
- Map.groupBy()


```js
const myObj = {}

new WeakSet(
  (function* () {
    yield {}
    yield myObj
    yield {}
  })(),
).has(myObj) // true
```

### Syntaxes expecting iterables

Some statements and expressions expect iterables, including
- for…of loops
- array spreading
- parameter spreading
- yield*
- array destructuring

```js
for (const value of ["a", "b", "c"]) {
  console.log(value)
}
// "a" // "b" // "c"

console.log([..."abc"]) // ["a", "b", "c"]

function* gen() {
  yield* ["a", "b", "c"]
}

console.log(gen().next()) // { value: "a", done: false }

[a, b, c] = new Set(["a", "b", "c"])
console.log(a) // "a"
```

When built-in syntaxes are iterating an iterator, and the last result's `done` is `false` (i.e. the iterator is able to produce more values) but no more values are needed, the **return method** will get called if present. This can happen, for example, if a `break` or `return` is encountered in a for…of loop, or if all identifiers are already bound in an array destructuring.

```js
const obj = {
  [Symbol.iterator]() {
    let i = 0
    return {
      next() {
        i++
        console.log("Returning", i)
        return (i === 3)
          ? ({ done: true, value: i })
          : ({ done: false, value: i })
      },
      return() {
        console.log("Closing")
        return { done: true }
      },
    }
  },
}

const [b] = obj
// Returning 1
// Closing

const [a, b, c] = obj
// Returning 1
// Returning 2
// Returning 3
// Already reached the end (the last call returned {done: true}),
// so `return` is not called

for (const b of obj) { break }
// Returning 1
// Closing
```

The for `await…of` loop and `yield*` in *async generator functions* (but not sync generator functions) are the only ways to interact with async iterables.

Using `for…of`, array spreading, etc. on an async iterable that's not also a sync iterable - it has `[@@asyncIterator]()` but no `[@@iterator]()` - throws `TypeError: x is not iterable`.

### Non-well-formed iterables

If an iterable's `@@iterator` method doesn't return an iterator object, then it's considered a non-well-formed iterable.

Using one is likely to result in runtime errors or buggy behavior:

```js
const nonWellFormedIterable = {}

nonWellFormedIterable[Symbol.iterator] = () => 1

[...nonWellFormedIterable]
// TypeError: [Symbol.iterator]() returned a non-object value
```

## User-defined iterables

You can make your own iterables like this:

```js
const myIterable = {
  *[Symbol.iterator]() {
    yield 1
    yield 2
    yield 3
  },
  /// ↑ generator function, i.e. shorthand notation of
  [Symbol.iterator]: function* () {
    yield 10
    yield 11
    yield 12
  }
}
console.log([...myIterable]) // [10, 11, 12]
```

### Simple iterator

Iterators are stateful by nature. If you don't define it as a generator function (as the example above shows), you would likely want to encapsulate the state in a closure.

```js
function makeIterator([...xs]) {
  let nextIndex = 0
  return {
    next = () =>
      nextIndex < xs.length
        ? { value: xs[nextIndex++], done: false }
        : { done: true }
    ,
    return = () =>
      ({ done: true })
  }
}

const it = makeIterator("yo", "ya")

console.log(it.next().value) // 'yo'
console.log(it.next().value) // 'ya'
console.log(it.next().done) // true
```









## References

Iteration protocols - JavaScript | MDN
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Iteration_protocols#built-in_iterables

Generator - JavaScript | MDN
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Generator
