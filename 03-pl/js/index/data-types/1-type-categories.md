# JS :: Index :: Type categories

## List of JS types
- primitive type
- simple primitive type
- special primitive type
- compound primitive type
- boxed primitive type
- boxed simple primitive type
- boxed compound primitive type
- nominal types
- structural types
- object type
- exotic object type
- function object
- constructor function object
- array
- array-like type (object)

## Individual types

- undefined
  - primitive type
  - special primitive type
- null
  - primitive type
  - special primitive type





Kinds of types in JS
- primitive types,                   PRIM
  - simple primitive types,          SPT
  - special primitive types,         SPEC
  - compound primitive types,        CPT
  - boxed simple primitive types,    BSPT
  - boxed compound primitive types?, BCPT
- nominal type,         NOMINAL
- structural type,      STRUCT
- object type           OBJ
- exotic object type,   EXOTIC
- function object       FUNC
- constructor function, CTOR, constructor function object


* Primitive types
  - simple primitive types
    - boolean
    - number
    - bignum
    - string
    - symbol
  - boxed simple primitive types
    - Boolean
    - Number
    - Bignum
    - String
    - Symbol
  - special primitive types
    - undefined
    - null
  - compound primitive types
    - Tuple, @[1,"abc", true] : [number,string,boolean]
    - Record, #{a: 1. b: 2}

* Compound JS types
  * Boxed primitives
  * Object types
  * Special object types
  * Array object types

* Boxed primitives (as object)
  - Boolean
  - Number
  - BigNum
  - String
  - Symbol

* Object types
  - Object
  - Function
  - Array
  - Date
  - RegExp
  - Map
  - WeakMap
  - Set
  - WeakSet

* Static object types
  - Math
  - Proxy
  - Reflect
  - Atomics
  - Intl




* TS Important types
  - `any`         Any type
  - `unknown`     Top type (diff between `any` and `unknown` wrt top type)
  - `never`       Bottom type
  - `void`        Return type of functions with no return value (aka unit type)
  - *object literal types*, e.g. `{ p: T }`
  - `Array<T>`    Type of mutable arrays
  - `T[]`         Type of mutable arrays
  - `[T, T]`      Tuple types (tuples are fixed-length but mutable)
  - `(a: A) => B` *function types*




- TS Type Constructors
  - enum
  - list, T[], e.g. number[]
    - `type List<A> = A[]`
  - tuple, [A, B]
    - `type Pair<A, B> = [A, B]`
  - Object types
    - typing an object
  - Union Types
  - Intersection Types
    - A | B | C
    - "Adam" | undefined
  - Literal Types
    - "run" | "halt" | "pause"
  - use of `!` @ value level


- TS Type Guards and type differentiation
  - user-defined type guards
  - type predicates
  - type guards with `in` operator
  - type guards with `typeof` operator
  - type guards with `instanceof` operator

* TS Generics
  - type param declaration, <T>
    - `class Point<T> {}`
    - `function point<T>(a: T): T { … }`
    - `const point = <T>(a: T): T => { … }`
  - type param declaration - `extends` keyword, <T extends never>
  - Record type
    - Readonly
  - bang, `type!.prop`



- TS Utility types
  - `Partial<T>`
  - `Readonly<T>`
  - `Record<K,T>`
  - `Pick<T,K>`
  - `Omit<T,K>`
  - `Exclude<T,U>`
  - `Extract<T,U>`
  - `NonNullable<T>`
  - `ReturnType<T>`
  - `InstanceType<T>`
  - `Required<T>`
  - `ThisType<T>`
