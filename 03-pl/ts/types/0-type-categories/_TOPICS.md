# Type level

## Algebraic data types

- Algebraic data types in TS
- ADT: base types
  - empty/zero/0 type
  - unit/one/1
  - singleton types
  - inhabited types
  - uninhabited types
  - uninhabited and inhabited types
  - types functions are virtually the same as type ctors
    all type ctors are type fns but not vice versa.
    beside type ctors, there are type fns that do not construct new types but manipulatge existing types (but that's too advanced…)
    - arity and saturation
    - partial application
    - type constructors
      - produce new type
    - type operators
      - are type ctors with symbolic name
    - other functions on types
      - manipulate types
- ADT: type 




## Functions

- parameterization, lambda lifting
- pure functions
- combinators
- closures
- currying
- functions vs operators
  - function application
    - identifier: alphabetical name
    - precedence: highest
  - operator application
    - identifier: symbolic name
    - precedence: custom or conventional
  - identifier, name, label
    - alphabetical name
    - symbolic name
  - fixity
    - associativity
      - left
      - right
      - neutral
    - position
      - prefix, `-n`
      - infix, `o?.p`
      - postfix, `n!`
      - mixfix, `b ? t : e`
  - function (operator) definition
  - function (operator) application
- value-level functions
  - parameters
  - arguments
  - name binding
- type-level functions
  - type parameters
  - type arguments
  - name binding

## Type level

- value-level vs type-level functions
  - value-level functions
  - type-level functions
- generic functions
  - type function, function on types
  - generic function vs any type-level function,
    i.e. are all type-level functions generic? Yes!
  - type parameter
  - type argument
- type parameters vs value parameters

- named function parameters in the signatures of function types
- value-level vs type-level functions
- pattern matching on types
- conditional types
- conditional types with pattern matching
- type-system
- type-level function, type function, function on types
- value-level function, value function, function on values
- generics, generic types, generic functions
- type-level constructions
- type-level function
- type parameter
- type parameters with generic constraints
- type constraints
- TS language items that work with generics
  - `interface`
  - `type`
- generic classes
- generic objects
