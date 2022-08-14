# Data types in Agda

+ inductive type
- parameterized type
- indexed type
- parameterized indexed type
- dependent type
- indexed type family
- inductive families of datatypes


## Dependent types

In Hindley-Milner style languages, like Haskell, there is a clear separation between types and values, in fact, between values and types and kinds. There are 3 realms with values (terms) at the bottom. Then each value has a certain type, and each type has a certain kind. And kinds have, well, types (back to types). Actually, the modern Haskell is tending to unite types and kinds, into just types, and it has the type-in-type feature (despite the existing paradoxes; their impact is negligible), `Type :: Type`. Moreover, Haskell is also looking to board te dependent typing train, so it is gradually becoming more welcoming and open to those aspects, thereby further blurring the line between its 3 realms.

In dependently typed languages, like Agda, that line is almost non existent as types can contain (depend on) arbitrary values, and appear as arguments and results of functions.

The standard example of a dependent type is the type of lists of a given length, `Vec A n`. Here, `A` is the type of the elements, and `n` is the length of the list (usually a type level natural number, `Nat`, which, in Agda, is the same as a value level natural number). Many languages allow you to define lists of a given size, but what makes `Vec` a true dependent type is that *the length of the list can be an arbitrary term, which need not be known at compile time*.

Since dependent types allows types to talk about values, we can encode properties of values as types whose elements are proofs that the property is true. This means that a dependently typed programming language can be used as a logic. In order for this logic to be consistent we need to require programs to be total, i.e. they are not allowed to crash or non-terminate.



### Non-dependent function type

`f : A → B`

Non-dependent function type is `f : A → B`, where `A` and `B` are possibly different types, with `A` being the domain and `B` the codomain of the function. The function `f` takes a value `x` of the type `A` as input, and produces some value `y` of the type `B` as output, which is generically represented in math as `f(x) = y`. The former expression, `f : A → B`, is then the signature of the function, while the later form is a general outlook of the function's implementation (or definition), which is given by one or more equations of the general form `f x = …`


### Dependent function type

Dependent types can refer to values, not just to other types.

`f : (x : A) → B x`

Dependent function type allows naming an instance (a value) of the domain `A`, e.g. as `x`, that is `x : A`. The name `x` can then be used in the codomain `B` to refer to the value `x : A`. We say that the type `B` is indexed by the values of the type `A`, where those values of `A` are represented by naming them `x`; then the type `B` depends on those values `x : A` (`x` of type `A`), with the type `B` ceising to be just `B` but becoming a dependent type `B x`.

`f : (x : A) → B x`

This generalized to polyadic functions. A binary function `g` then starts similarly

`g : (x : A) → (y : B x) → C x y`




Here's the composition of dependet functions in Agda:

```agda hs
_∘_ : {A :                     Set ℓ }
    → {B :              A    → Set ℓ₁}
    → {C : {x : A}    → B x  → Set ℓ₂}
    → (∀   {x : A} (y : B x) → C y)
    → (f :         (x : A)   → B x)
    →              (x : A)   → C (f x)
g ∘ f = λ x → g (f x)

-- composition of non-dependent functions
_∙_ : (B → C) → (A → B) → (A → C)
g ∙ f = λ x → g (f x)
```
