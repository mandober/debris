# TS :: Ref :: Types :: TOPICS

## Everyday types

Everyday types
  - primitives
    - string
    - number
    - boolean
  - arrays
  - any
    - noImplicitAny
  - type annotations on variables
  - functions
  - parameter type annotations
  - return type annotations
  - anonymous functions
  - object types
  - optional properties
  - union types
  - defining a union type
  - working with union types
  - type aliases
  - interfaces
  - differences between type aliases and interfaces
  - type assertions
  - literal types
  - literal inference
  - null and undefined
    - strictnullchecks off
    - strictnullchecks on
    - non-null assertion operator (postfix !)
  - enums
  - less common primitives
    - bigint
    - symbol


## JS data types
- primitives
  - base primitives
  - boxable primitives
  - special primitives
- object types
  - general object type
  - specialized object type
  - instantiatiable data types
  - static data types
TS data types
- nominal types
- singleton types
- empty types
- bottom types
- top types

* Primitive JS types
  - boolean
  - number
  - bignum
  - string
  - symbol
  - undefined
  - null
  * boxable primitives
    - boolean
    - number
    - string
    - bignum
  * instantiatiable primitives (new value with `new` or casting if without)
    - boolean
    - number
    - string
  * non-instantiatiable primitives (do not accept `new`)
    - symbol
    - bignum
    - undefined
    - null
  * special primitives
    - undefined
    - null

  * everyday vs additional primitives
    * everyday primitives
      - boolean
      - number
      - string
      - undefined
      - null
    * additional primitives
      - symbol
      - bignum


## TOPICS 0

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


## TOPICS 1

Basic Types
- JS Types
  - Basic types (scalars)
    - boolean
    - number (binary64)
    - string
    - Symbol
    - BigInt, suffix `n`
  - Compound types
    - Object
    - Object types:
      - object
      - String
      - Number
      - BigInt
      - Boolean
      - Symbol
      - Function
      - Array
      - RegExp
      - Void
      - undefined
      - null
- TS additional types
  - any
  - never
  - unknown
  - Array types
    - string[]
    - number[]
  - Tuple types
    - [string, boolean]
  - Intersection types
    - `string | boolean`
  - `object` represents non-primitive types.
  - `enum` 
  - functions
    - function type
    - optional parameters
    - default parameters
  - Literal types
    - `'singleton'`
- more...
  - `type` alias
  - `interface`, type declaration
  - type casting, type assertion, `as`
      - non null type assertion, `element! as HTMLElement`
  - type guards, `if (typeof x == number) …`
  - Index Signatures




## TOPICS 2

- TS data types
- typeof operator
- Primitive types
  - common primitive types
    - boolean
    - number
    - string
  - null, undefined (depends whether they are primitives or own types)
  - less common primitive types
    - bigint
    - symbol
- null and undefined
  - non-null assertion operator (!)

- Arrays
- any
  - noImplicitAny
- Type Annotations on Variables
- Functions
  - Parameter Type Annotations
  - Return Type Annotations
  - Anonymous Functions
- Object Types
  - Optional Properties
- Union Types
  - Defining a Union Type
  - Working with Union Types
- Type aliases and interfaces
  - Type alias
  - Interface
  - Differences between type aliases and interfaces
- Type assertions
  - `typeof` operator (at the type level)
  - `keyof` operator (at the type level)
  - `as` type casting
  - non-null assertion operator (!)
- Literal Types
  - literal inference
  - string literal types
  - Template Literal Types
  - concrete literal types
- null and undefined
  - strictNullChecks off
  - strictNullChecks on
  - Non-null Assertion Operator (Postfix !)
- Enum types
  - `enum` TS-only keyword
  - numeric enumertions
  - optionally assigned to strings
- Generic types
  - generics
  - generic type
  - generic type parameter
  - generic class


TS language items
- functions
- classes
- object
- interfaces
- type aliases


## TS types

- Conditional types
- Union types
- Intersection types
- Type parameters
- Extended types
- Utility types
- Type predicates
- Enums
- Type assignability
- Type compatibility
- Unit type
  - Unit (singleton, literal) types
- subtyping, subtypes and supertypes
- type widening
- type narrowing
- type inference (contextual typing)
- recursive types
- Type alias
- Type interface
- tagged intersection - faking Haskell's `newtype`
- Discriminated union
  - discriminated unions - faking Haskell's `data`
- Object Literal Type
- Immutable types
  - `readonly` modifier for properties
  - Mapped type, `Readonly<T>`, marks all properties with `readonly` modifier
  - const type assertions
