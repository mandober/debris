# Parameterized types

A **parameterized type** is a family of types *indexed by another type*. 
A parameterized type is a type that depends on another type.

A **dependent type** is a family of types *indexed by terms of another type*. 
A dependent type is a type that depends on elements of another type.

Consider a family of types `Bᵢ(i ∈ A)`, where each member of a family is annoted with an index `i`.
- Assume the existence of a type of types, `Type`
- Assume the existence of a type of indices `A`
- The family of indexed type can be described by a function `B : A → Type`

Consider a function that takes as input an element `x:A` and guarantees that it always return an element of type `B(x)`
- The type system is extended so that this function is well-typed, the notation for its type is `∀x:A.B(x)`
- The term "forall" is intuitively acceptable: whenever we have an `x:A`, we know we have a value in `B(x)`.

A dependent product is a generalization of a Cartesian product
- Cartesian product has the form `A₁ ⨯ A₂`
- n-times iterated Cartesian product is `A₁ ⨯ A₂ ⨯ … ⨯ Aₙ`
- also written as `Π (i ∈ I) Aᵢ`, where `Aᵢ` is a type family and `I = {1..n}`
- given an element of `Π (i ∈ I) Aᵢ`, we are guaranteed to have an element of `Aᵢ` for every `i`
