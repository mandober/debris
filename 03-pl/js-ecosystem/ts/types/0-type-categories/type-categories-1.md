# TS :: Index :: Type categories

- primitive types (subset of JS primitives)
- promoted (JS values promoted to types)
- special TS types
- general object types
- type ctors
- literal types


```
primitives:
                 | boolean              base type
                 | number               base type
                 | string               base type
                 | symbol               uncommon base type
                 | bigint               uncommon base type

promoted:
                 | null                 singleton type
                 | undefined            singleton type
                 | void                 singleton type

special:
                 | any                  universal type
                 | unknown              top type
                 | never                zero type, bottom type

builtin object types:
                 | Object
                 | object
                 | Function
builtin boxed types:
                 | Boolean
                 | Number
                 | String
                 | Symbol
                 | Bigint

type functions:
                 | array type           product type at value level
                 | tuple type           product type at type-level
                 | object type
                 | class type
                 | function type        exponential type

type constructs:
                 | enum                 coproduct type
                 | union type
                 | intersection type

literal types:
                 | literal string type
                 | literal boolean type
                 | literal number type
                 | literal template type
```

* While `object` and `Object` are both legal types, `Array` is not. `Array` is actually a *type constructor* or a *type-level function*. It must be called by passing it a type argument; e.g. `Array<string>` is a type, and so is `Array<[boolean | string]>`, but `Array` alone is not a (regular) type.



## Classes and categories of types

*Nominal types*, i.e. types with a concrete name, as opposed to *structural types* like object, tuple, union, intersection types and others.

* Primitive types:
  - boolean
  - number
  - bigint
  - string
  - symbol
  * Special primitive types (promoted values):
  - undefined
  - null
* Special types:
  - any
  - unknown
  - never
  - void

- functions: `function` or *function type*, `<A, B>(x: A, y: B) => B`
- objects: `object`
- arrays: `T[]` or `Array<T>` (both are nominal types)
- each class defined an eponymous type


*functions*: TS has generic `Function` type that can annotate any function, but a function should be properly annotated using a function type. Functions may have a standalone type signature or type annotations may be inlined with the function definition.

*objects*: all non-primitive values are objects, so each may be annotated with
a generic `object` type; but more properly, it should be annotated with an appropriate, more suitable, more specialized type.

*array* is `object`, but more concretely, it is a specific array type, 
e.g. `[1,2]: number[]`, which may also be annotated as `[1,2]: Array<number>`. Array types have an alphabetic name, `Array`, and symbolic name, `[]`, but both are nominal types. However, since TS has no higher-kinded types, these can never appear alone but always saturated, e.g. as Array<T>, Array<number>, and `T[]` or `boolean[]`, never just as `Array` or `[]`.


## Type names, type constructions and type constructs

- primitive types
- simple primitive types
- special primitive types
- compound primitive types
- boxed simple primitive types
- boxed compound primitive types
- nominal types
- structural type
- object type
- tuple type
- array type
- exotic object type
- function object
- constructor function
- generic type
- universal type
- top type
- bottom type
- unit type
- singleton type
- unknown type
- refined typed
- union type
- intersection types
- enum
- product type
- coproduct (sum) type
- return type
- inferred type
- conditional type


## Kinds of types in TS
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
- generic types
- concrete type
- top type
- universal type
- bottom type
- unit, singleton type
- unknown type
- refined typed
- union type
- intersection type
- product type
- coproduct, sum type
- return type
- parameters type
- inferred type


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
