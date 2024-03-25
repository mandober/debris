# TypeScript :: Type theory :: TOPICS

This section explores type-theoretical concepts pertaining to the TypeScript's type system. Since TypeScript v.2, the type system has reached Turing completeness, making type-level programming possible.



Type systems and other type-theoretical concepts pertaining to TypeScript, with correspondencies found in logic, set theory, algebra, type theory, category theory and theory of programming languages.


Since TypeScript v.2, its type system is nearly Turing complete, making type-level programming possible. There are still, however, issues with recursion and the lack of support for first-class type functions (we cannot return a parameterized type function from a type function).

## Contents

- Type-theoretical concepts
  - type system
  - soundness
  - inference
  - type hierarchy
  - top
  - bottom
  - structural typing
  - nominal typing
- Type systems
  - nominal
  - structural
  - polymorphism
  - subtyping
    - subtyping in face of polymorphism
- TypeScript's type system
  - types as sets
  - nearly Turing complete
  - type hierarchy
  - unsound
- logic, set theory, algebra, PLT, type theory, category theory
  - algebraic data types
  - ADT correspondencies
- type theory vs set theory
  - set theory
    - types as sets
    - type hierarchy
  - top type
  - bottom type
- subtyping
- variance
  - covariance
  - contravariance
- value-level functions
  - purity
  - combinators
  - parameterization
- type-level functions
  - type parameters
  - type arguments
- pattern matching
- isomorphism
- polymorphism
  - parametric polymorphism
    - unconstrained (unbounded)
    - constrained (bounded)
  - ad hoc polymorphism
    - overloading


- types
- types as sets
- types vs sets
- type functions
- type inhabitation
- top type
- bottom type
- type-level programming
- algebraic data types
- isomorphisms between
  - programming languages
    - haskell, (⊥, ∨, ∧, ->)
    - typescript
  - logic, (⊥, ⊤, ∨, ∧, ⇒)
  - set theory
  - type theory
  - category theory

---

topics:
- type system
  - what is type system for?
  - type systems in general
  - properties of type systems
  - features of type systems
  - TS type system
- type theory
- set theory
- correspondence between sets and types
  - sets and types
  - sets vs types
  - cardinality
    - empty set/type
    - singleton set/type
    - nonempty set/type
  - set ops
    - set ops that let us discern origin set in the result
    - ordered vs unordered pair
      - tuples, pair is a 2-tuple
      - projection
        - position in a tuple
        - tuple components
        - pair: fst, snd
    - Cart product
    - set union
    - set intersection
    - set disjoint union
      - discriminating union
        - discriminant
      - tagged union type
        - how can we tell the origin set of an element?
        - the tag
        - tagging procedure


expression - value - variable
data - data structure - data type - datatype - type - type structure - 
type class - type constraint - subtype - supertype - prototype - 
expression - statement - declaration - definition - initialization - implementation - conditional
value-level (value, exp, function, parameter, argument)
type-level (type, type exp, type function, type parameter, type argument)
kind-level (kind, kind function, kind parameter, kind argument)
