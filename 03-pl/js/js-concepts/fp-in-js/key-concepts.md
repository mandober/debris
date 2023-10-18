# JS :: Concepts :: FP in JS :: Key Concepts

* FP requirements
  - [✔] first class functions
  - [✔] anonymous lambdas
  - [✔] closures
  - types
  - polymorphism
  - type classes
  - parametric polymorphism
  - generics
  - ad-hoc polymorphism
  - operator overloading
  - expression-based syntax
  - ADT
  - pattern matching
  - purity
  - referential transparency
  - immutability
  - demarcated IO
  - infinite data structures
  - laziness
    - can be modelled using thunks
    - subsumes short-cuircuting
    - subsumes infinite data structures
  - tail-call optimization
    - absolutely required but non-existant
    - workarounds
      - FP friendly veneer backed by native JS functions
        e.g. `foldl` backed up by `reduce()`
      - trampolining: non-trivial to implement correctly
  - auto-currying
    - non-trivial to implement correctly
