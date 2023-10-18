# Iteration

**Iteration** is a process performed repeatedly in order to generate a sequence of values. Iteration is unbounded; intrinsically, it doesn't have a stop point so a stop condition, if desirable, has to be enfoced. Each repetition of the process is a single iteration that yields a value that becomes the starting point of the next iteration.

More loosely and closer to the everyday's programming, iteration is the process of querying a data collection for its elements in a one-by-one manner. There are many ways to query the elements of a collection and therefore an infinite number of arbitrary names given to the methods involved.

The standardization of iteration means having an interface (a public contract) that clearly defines the number, names and signatures of the methods involved.

**Iterable** is a collection, possibly a custom data structure, that wants to expose its elements for public access in a controlled manner. It does this by implementing the standard *iteration interface*.

In JS, this means that an object has to implement the special method called `Symbol.iterator` in order to conform to the standard iteration protocol.

This method, never formarly known by a normal identifier, is very keen of privacy so it keeps its proper name hidden behind a symbol; the symbol `Symbol.iterator` is the representation of its name. In documentation, the name *@@iterator* is used. This just means that in order to reference this method off of an object, you have to use the brackets syntax for property access, *obj[Symbol.iterator]* (dot syntax, `obj.Symbol.iterator`, won't work).

When invoked, the `Symbol.iterator` method returns an iterator object.


An **iterator** is an object, returned by invoking `Symbol.iterator` method, that manages iteration.

To summarize the participants:
- we have a collection of elements, e.g. `obj`. This collection is a custom data structure, so there is probably a class of which the current object is an instance.
- this object has a special method (possibly defined on its parent class) refered to as `Symbol.iterator`
- when this special method is invoked, an iterator object is returned.

The iterator object manages the iteration. It does this by exposesing the `next` method. When called, `next` returns yet another (what?) object. That object has two properties: `value` and `done`.

The `value` property holds the current payload (current element's value). The `done` property is a Boolean indicating the state of iteration: it is `false` during iteration, turning into `true`, but only *after* the final element is delivered.

When the iterator object is obtained, e.g. as `it`, the first call of its `next` method returns an (anonymous) object that has the payload (value of first element) and iteration status. And each subsequent call, `it.next()`, returns an object holding the payload and the status.

This is the major difference between iteration and other ways to pull values from an object; iteration protocol hands out the iterator objects that track the state of iteration. Each iterator object knows what was the last payload delivered.


```js
// strings are also iterables
let str = 'ab'

// get the iterator over this string 
let it = str[Symbol.iterator]()

console.log(it)
// Object [String Iterator] {}

// use the iterator luke
console.log(it.next())  // { value: 'a', done: false }
console.log(it.next())  // { value: 'b', done: false }        false? LIAR!
console.log(it.next())  // { value: undefined, done: true }   now you tell me
```

Moreover, iterators can be used with the `for...of` construct that will pull the payloads in a sequence.


Summary (with custom data structure)
- class `Bag` defines a custom data structure
- object `items` is an instance of the Bag: `let items = new Bag(...)`
- class defines a method `[Symbol.iterator]` so
- when called, `let it=items[Symbol.iterator]()`, it returns *iterator object*
- iterator object has the `next` method
- each call to `next()` returns an anon obj with `done` and `value` props
- `value` holds the payload, the value of the current collection element
- `done` prop is a Boolean that indicates whether iteration is complete

class     => { ob }
ob.iter() -> { it }
it.next() -> { value, done }



## Iterable JS Bultins

ES6 has introduced the iteration protocol.

Iterable JS builtins:
- String
- Array
- TypedArray
- Map
- Set

Each of their prototype objects implements an `@@iterator` method.
