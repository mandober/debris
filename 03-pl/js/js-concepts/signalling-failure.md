# JS :: Signalling failure

Return
- `undefined`, implicitly or explicitly
  - uninitialized variables
  - return value of functions
- `null`
- answer object, like from iterators, with `done` and `value` properties. When `done` becomes true the iteration is finished, otherwise `value` holds the data.
- `throw` a `new Error('miserable failure')`
- Previously defining then using a sum type like `Maybe` or `Either`

Checking for failure:

```js
// coercion checks
if (x) "x is defined"
if (!x) "x is not defined"
if (x !== undefined) "x is defined"

// check for the new prop on the enclosing object
// since all vars are props there
x in this
x in globalThis

x == undefined  // actually checks against null and undefined!
x === undefined // checks against undefined only



/** @typeof prefix operator returns a string */

typeof x !== 'undefined' // x can even be undeclared


const x = null
x === undefined // false
x == undefined  // true since it actually checks for undefined AND null
```

Some of these checks fail if the variable doesn't exist at all (is undeclared), but `typeof x !== 'undefined'` does not throw a `ReferenceError` like others.
