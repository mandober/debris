# Dependent types

Dependent type theory generalises the simple function space `A → B` to a dependent function space `(x : A) → B x` where the result type `B` can depend on the value of the argument `x`.

We sometimes refer to dependent function types as **Π-types** for mathematical reasons. If `B` does not depend on `x` we to write `A → B` and if we have a telescope `∆ = (x₁ : A₁) … (xₙ : Aₙ)` we write `∆ → B` for 
`(x₁ : A₁) → … → (xₙ : Aₙ) → B`.

Functions are introduced by λ-terms, `λx. t`, and computed by β-reduction. To abstract over a sequence of variables `x̅` we write `λx̅. t` or `λ∆. t` rather than `λx₁ … λxₙ. t`.

A **telescope**, `∆ = (x₁ : A₁) … (xₙ : Aₙ)`, is a sequence of types where later types may depend on values of the previous types. When there are consecutive occurrences of a type in a telescope we may combine them and write, for instance, `(x y : A) (z : B)` instead of `(x : A) (y : A) (z : B)`.


Similarly to function types the product type `A × B` generalises to the type of dependent pairs `(x : A) × B x` where the type of the second component depends on the value of the first component. We call a dependent pair type a **Σ-type**.

The elements are constructed and deconstructed as usual. We write <s,t> for the dependent pair of `s` and `t`, and `π₁ t` and `π₂ t` to project the first and second components, respectively, from a pair `t`. The computation rules are the expected ones.

We also include a **singleton type** `𝟙` with the single element `<>`.

## Dependent function types

```hs
-- non-dep function type from set A to set B
g : SetA → SetB

-- dep function type from set (a : A) to set (B a)
f : (a : SetA) → SetB a

-- The type of 'SetB a' gotta be function type, (SetB : ? -> ?)
-- Since 'SetB a' means that SetB takes a param 'a',
-- there's gotta be an 'a' as that func type is like 'a -> SetB'.
-- Since the type of 'a : SetA' is SetA, then on the LHS, we have SetA:
-- SetB : SetA -> ?
-- On the RHS, there is just Set (as usual).
SetB : ? -> ?
SetB : SetA -> ?
SetB : SetA -> Set
-- The dep fun is a fun from something that ends up in Set
-- (or some higher-level Set)
```

How can we create a similar `Set` data type?

```hs
-- Our data type called `SetB` will start
-- with the usual data definition:
data SetB : … where
-- and its type can be what we come up with earlier:
data SetB : SetA → Set where
-- Now for its ctor:
  ctorB₁ : SetB ?
-- Any ctor must return its defining data type; in this case `SetB`.
-- But the type of SetB is indexed by the type SetA.
-- The ctor's sig must be a function (ctorB : ? -> SetB a)
-- where (a : SetA) so the ctor type becomes:
  ctorB₁ : ? -> SetB a
-- and then, since (a : SetA) we need to put exactly that
  ctorB₁ : (a : SetA) -> SetB a

-- Another option, e.g. for the ctorB₂ would be to
-- hardcode the SetA's ctor, i.e. 'ctorA'
  ctorB₂ : SetB ctorA

-- A value of the type SetB
-- can be in term of the ctor 'ctorB₂' that has a harcoded param:
val1 : SetB ctorA
val1 = ctorB₂
-- In a general case, a value of the type SetB,
-- in terms of the ctor ctorB₁, has to take a param:
val2 : SetB ctorA
val2 = ctorB₁ ctorA
```


In summary,

```hs
data SetA : Set where
  ctorA : SetA

data SetB : SetA → Set where
  ctorB₁ : (a : SetA) → SetB a
  ctorB₂ : SetB ctorA
```
