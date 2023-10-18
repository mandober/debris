# TS :: Index :: TS Primitive types

TS primitive types are a subset of JS primitives (assuming the tsconfig flag `strictNullChecks` is enabled).

* JS primitives
  * Scalar primitives
    - boolean
    - number
    - string
  * Non-instantiatiable primitives (`new` operator disallowed)
    - bigint
    - symbol
  * Special primitives
    - undefined
    - null
  * Compound primitives
    - #tuples  (PROPOSAL at stage 3)
    - #records (PROPOSAL at stage 3)

* TS primitive types
  * JS primitives subset
    - boolean
    - number
    - string
    - bigint
    - symbol
  * TS-specific and special primitives
    - undefined
    - null
    - any
    - never
    - unknown
    - void
  * TS Type functions (type and data constructors)
    * Type abstractions
      - type
      - interface
    * Simple type classes
      - unit types (singleton types)
      - literal type
    * Literal types
      - string literal type
      - number literal type
      - boolean literal type
      - object literal type
    * Type roles
      - top types
      - bottom types
    * Compound types
      - tuples, `[T, U, …]`
      - arrays (lists), `Array<T>`
      - enum
      - Record types (KV maps)
      - object literal type
      - extensible object types (decl with type or interface)
