# TS :: Type-level :: INDEX

Type level programming
* Type system
  - general type systems
    - categorization of types
      - primitives vs nonprimitives
      - scalar vs compound
      - simple cs coplex
      - nominal vs structural
    - base (ground) types + ops to construct compound types


    - flat type, lifted type
    - type system properties
      - consistency
      - soundness
      - expressibility
      - inference capability
  - TS type system
* Types in general
  - types and sets
  - inhabited types
  - uninhabited types
  - top
    - supertype of any other type
  - bottom
    - subtype of any other type
    - flat types
    - infects everything
    - expresses divergence
  - types vs sets
  - types classify (related) values
  - types as approximations of values
  - types as abstractions of values
* Generics in general
  - polymorphism
  - parametric polymorphism
  - ad hoc polymorphism
* Generics in TS
  - types group (similar, related) types
  - type parameter
  - constrained type parameter
* ADTs
  - Sets and ADTs (sets and types)
    - ordered pair, `(a, b)`
    - Cartesian product, `A ⨯ B`
    - Set union, `A ⋃ B`
    - Set intersection, `A ∖ B`
    - Disjoint/tagged/discriminated union, `A ⊎ B`
  - base types
    - zero type, 0,
    - unit type, 1
  - type operators (combinators)
    - product type, `⨯`
      - tuple type, `[A, B]`
    - sum type, `+`
      - (union type + object type)
    - exponential type, `^`
      - function type
* Type functions
  - Pattern matching
  - Conditional types
  - Constraining generic type params
