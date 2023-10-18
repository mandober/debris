# JS :: Index :: Primitive types

https://developer.mozilla.org/en-US/docs/Glossary/Primitive

A primitive (primitive value, primitive data type) is data that is not an object, and thus has no methods or properties.

There are 7 primitive data types:
- boolean
- number
- bigint
- string
- symbol
- undefined
- null


Most of the time, a primitive value is represented directly at the lowest level of the language implementation. 

All primitive values are immutable.

Do not confuse a primitive value with a variable to which it is bound. The variable may be rebound to a new value, but the existing primitive value cannot be mutated like objects can be.

The language has no utilities to mutate primitive values "in place".

Unlike objects, primitives have no associated methods. After writing the name of a variable bound to an object, or, directly, after an object literal, we can put a dot (aka *property accessor*) and then refer to the properties associated with that object, e.g. `[1,2,3].toString()`.

```js
// referring to object's properties directly, off its literal
[1,2,3].toString()

// referring to object's properties indirectly, off its binding variable
let arr = [1,2,3]
arr.toString()

// referring to the associated properties of primitive values

// string
"string".split('')
// boolean
true.
```

With primitive values (whether as variables to which they are bound or directly as primitive value literals), we wouldn't be able to refer to any property because primitive values have none.


However, they still behave as if they do thanks to the *primitive auto-boxing behavior*.

When properties are accessed on primitives, JavaScript auto-boxes the value into a wrapper object and accesses the property on that object instead. For example, "foo".includes("f") implicitly creates a String wrapper object and calls String.prototype.includes() on that object. This auto-boxing behavior is not observable in JavaScript code but is a good mental model of various behaviors - for example, why "mutating" primitives does not work (because str.foo = 1 is not assigning to the property foo of str itself, but to an ephemeral wrapper object).
