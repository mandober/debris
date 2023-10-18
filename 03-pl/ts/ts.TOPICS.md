# TS :: TOPICS

* TS utility types
  - Awaited<Type>
  - Partial<Type>
  - Required<Type>
  - Readonly<Type>
  - Record<Keys, Type>
  - Pick<Type, Keys>
  - Omit<Type, Keys>
  - Exclude<UnionType, ExcludedMembers>
  - Extract<Type, Union>
  - NonNullable<Type>
  - Parameters<Type>
  - ConstructorParameters<Type>
  - ReturnType<Type>
  - InstanceType<Type>
  - ThisParameterType<Type>
  - OmitThisParameter<Type>
  - ThisType<Type>
  * Intrinsic string manipulation types
    - Uppercase<StringType>
    - Lowercase<StringType>
    - Capitalize<StringType>
    - Uncapitalize<StringType>

* Literal types
  - primitive literal types
    - boolean literal types (BLT)
    - number literal types (NLT)
    - string literal types (SLT)
    - bigint literal types
    - null literal types
    - undefined literal types
    - symbol literal types
  - template literal types (TLT)
    - distributivity property
    - generics in TLT
  - literals are unit types
  - isomorphism, bijectivity
    - 1-to-1 correspondence between a literal type and its single value
    - know the type ⇔ know the value
  - inference of literal types
    - creation of literal types
    - tuple's length is LNT (not the broader, `number` type)
    - `const` declarator vs `let`/`var` declarators
    - `as const`


* Type theory primer
  - type system
  - type (notion of type)
  - structural vs nominal type systems
  - static vs dynamic type systems
  - type erasure

* Type system features (pertaining to TS)
  - special types
    - top, universal type
    - unit, singleton types
    - empty
    - bottom
  - type ctor
  - data ctor
  - type functions
  - subtyping
  - variance
  - polymorphism
  - ADT

* TS type system
  - structural type system
    - structural typing
    - structural types
    - faking nominal types
  - types as sets
    - union
    - intersection
    - subtyping
  - subtyping
  - builtin types
    - primitive types
    - primitive literal types
    - special types
  - typing (expressions)
    - type context
    - type position
  - type inference
    - best common type
    - contextual typing
  - type annotation
    - type signature
    - direct type annotation (on a varible, `let x: number`)
    - standalone (separate) type signature 
  - type declarations
    - `type` keyword
    - `interface` keyword
    - ambient type declaration
      - ambient declaration
      - ambient type
      - ambient type declaration
      - ambient variable declaration
      - declaration (definition) file, `.d.ts`


* Builtin TS types
  - primitive types
  - primitive literal types
  - never (bottom type)
  - unknown (top type)
  - unit types
    - void
    - null
    - undefined
  - generic types
  - compound types
  - compound generic types
    - array
    - tuple
    - function
    - object
    - Map, Set, WeakMap, WeakSet, Promise, Iterator, Generator, …
  - structural types
    - object types
    - tuple
    - function (?)
  - nominal type
    - TS's types with a name


* TS Type system features
  - gradual typing
  - type refinement
    - type narrowing
    - type widening
  - type inference
    - type hinting
  - type transformations
    - utility types
  - type construction
    - type constructors (as opposed to data ctors)
    - type functions (types in type out), Type -> Type
  - conditional type
  - pattern matching
    - `extends` type


* JS/TS nominal scalar primitives
  - `boolean`
  - `number`
  - `bigint`
  - `string`
  - `symbol`
  - `undefined` type
  - `null` type
  - Special types
    - `any` type
    - `unknown` type
    - `void` type

* Compound nominal types
  - `T[]` or `Array<T>`
  - `[T, U, V, …]`, tuple types
  - `Record<T>`, record types
  - literal object types, `{ p1: string, p2: number | bigint }`
  - index/key types, `{ [key: string], p1: string, p2: number | bigint }`

* Generics
  - generic type
  - generic function (type function, type-level function)
  - type ctor
  - data ctor
  - type parameter
  - generics in type predicates and assertion functions
  - using default generics to compute variables
  - spotting useless generics
  - generics in template literal types
  - multiple generics types (per object)
  - `extends` and extending generic types: `extends null`, `extends unknown`
  - `keyof`
  - `in keyof`
  - `in`
  - `typeof`

* Misc
  - type alias
  - interface
  - this is this & {}
  - function overloading
  - converting union types to object types (via key mapping and Extract)
  - type predicates and assertion functions
  - branded types
  - builder pattern
  - type-level trampolines to compute recursive types
  - first-class functions (term-level functions)
    - functions that take/return functions
  - higher-order type functions
