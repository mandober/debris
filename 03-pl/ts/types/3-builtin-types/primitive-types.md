# TS :: Types :: Primitive types

As of ES2023, JS has 7 primitive types
- 3 common, everyday, data types
  - boolean
  - number
  - string
- 2 additional, non-instantiatiable, primitives
  - bigint
  - symbol
- 2 special primitives
  - null
  - undefined


JS primitive types (3+2+2)
- boolean
- number
- bigint
- string
- symbol
- undefined
- null

TS primitives (5) are a subset of JS primitives
- boolean
- number
- bigint
- string
- symbol

TS inherits these primitives from JS but handlees the special primitives specially - the behaviour of `undefined` and `null` depends on the `strictNullChecks` flag:
- if off, these two remain primitive types just like in JS (unsafe)
- if on, each value gets own type

Since, `strictNullChecks` is a prety standard flag that is almost always turned on, we treat `undefined` and `null` and types.

`undefined: undefined` and `null: null`

The `undefined` and `null` behave like the bottom values, i.e. *each inhabits any other given type*. For example, the type `number` includes numbers, and `undefined` (and `null`). Any given object (compound) type includes `undefined` and `null` as members, perhaps on several levels, i.e. they inhabit `number[]` and `number`.


## Refs

* TS Everyday types
https://www.typescriptlang.org/docs/handbook/2/everyday-types.html

* JS Primitives
https://developer.mozilla.org/en-US/docs/Glossary/Primitive
