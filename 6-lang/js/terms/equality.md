# Equality

* Testing equality
  - strict equality, `===`
  - loose equality, `==`
  - SameValueZero
- equality: primitives vs references
  - shallow equality
  - deep equality


The different tests for equality exist due to historical omissions, such as the controversal equality of `NaN` values, i.e. `NaN` is the only value not equal to itself.

```js
NaN == NaN   // false
NaN === NaN  // false
```

The diff between loose and strict equality comparison is that strict never coerces its arguments. We could say that `==` checks for equality of values (permitting coercions), while `===` checks for both values AND types, disallowing coercions.

```js
undefined == null      // true
null == undefined      // true
undefined === null     // false
```

The `SameValueZero` is one of the algorithms used by the ES Specs for testing whether two values are equal. It seems to be the same as the strict equality, except `NaN` is considered equal to `NaN`. The algo can't be changed or customized.

https://tc39.es/ecma262/#sec-samevaluezero


To test keys for equivalence, `Map` uses the *SameValueZero* algorithm. Since, that algo deems NaN equal to itself, `NaN` may be used as a key.


- SameValue
- SameValueZero
- SameValueNonNumeric


## Strict Equality Comparison

The comparison x === y, where x and y are values, produces true or false. 
Such a comparison is performed as follows:

If Type(x) is different from Type(y), return false.
If Type(x) is Number or BigInt, then
Return ! Type(x)::equal(x, y).
Return ! SameValueNonNumeric(x, y).

NOTE: This algorithm differs from the `SameValue` in its treatment of signed zeroes (-0, 0, +0) and `NaN`s.
