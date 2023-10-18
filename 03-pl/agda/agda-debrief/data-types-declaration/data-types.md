# Data types

- primitive data types
  - (Nat to Int conversion)
- builtin data types
  - universe
  - `Set`
  - universe `Level`
  - `Pi` types
- simple data types
  - 𝟘, 𝟙, Bool, Nat
- inductive data types
  - 𝟘, 𝟙, Bool, Nat
- parameterized data types
- indexed families of data types (inductive families)
- inductive-recursive data types
- coinductive data types




Only data types defined using `data` declaration can have their type variables split into parameters (to the left of `:`), which are shared across the data ctors, and indices (to the right of `:` as usual) (which are not shared).


## Syntax form of data type declaration

* General form of the definition of a *simple datatype* `D`:

```agda hs
data  D  :  Setᵢ  where
  c₁ : A₁
  …
  cₙ : Aₙ
```

The name `D` of the data type and the names `c₁, …, cₙ` of the data ctors must be new wrt the current signature and context, and the types `A₁, …, Aₙ` must be function types ending in `D`, i.e. each `Aᵢ` must have the form:

`(y₁ : B₁) → … → (yₘ : Bₘ) → D`


* General form of the definition of a *(parametrized, indexed) datatype* `D`:

```agda hs

type (ctor) name
      │
      │    parameters
      │      │                               indices
      │      │                                   │         universe level ℓ
      │      │                                   │               │
     ┌┴┐ ┌───┴──────────────┐     ┌──────────────┴───────┐     ┌─┴──┐
data  D  (x₁ : P₁) … (xₖ : Pₖ)  :  (y₁ : Q₁) → … → (yₗ : Qₗ)  ->  Set ℓ  where
  c₁  : A₁
  …
  cₙ  :  Aₙ
 └┬─┘  └┬─┘
  │     │
  │ data ctors types
  │
data ctors names


where
  the types A₁, …, Aₙ are function types of the form:

  (z₁ : B₁) → … → (zₘ : Bₘ)  ->  D x₁ … xₖ t₁ … tₗ


In Summary:

  D
  (x₁ : P₁) … (xₖ : Pₖ)
  (y₁ : Q₁) → … → (yₗ : Qₗ)
  Set ℓ
  c₁ : A₁, …, cₙ : Aₙ
    where
    A₁, …, Aₙ are function types of the form
    (z₁ : B₁) → … → (zₘ : Bₘ) -> D x₁ … xₖ t₁ … tₗ


In Summary:

x₁ … xₖ  are parameters of D and thus fixed for all data ctors
P₁ … Pₖ

y₁ … yₖ  are term indices of D, each of which belong to a Qᵢ
Q₁ … Qₗ  are dependent types depending on the indices yᵢ

c₁ … cₙ  data ctors
A₁ … Aₙ  types of data ctors

where

z₁ … zₘ  are terms of each data ctor's own vars/indices of type families
B₁ … Bₘ

t₁ … tₗ  are each data ctor's own type variables
```



## Refs

- https://agda.readthedocs.io/en/latest/language/data-types.html
- https://wiki.portal.chalmers.se/agda/pmwiki.php?n=ReferenceManual.Data
- https://wiki.portal.chalmers.se/agda/ReferenceManual/SimpleInductiveTypes?from=ReferenceManual.Datatypes
- https://lists.chalmers.se/pipermail/agda/2023/013034.html

- https://oxij.org/note/BrutalDepTypes/

- https://cs.stackexchange.com/questions/98529/in-agdas-gadt-are-parameterized-and-indexed-different-semantically
- https://cs.stackexchange.com/questions/109305/strict-positivity-of-indexed-datatype-in-agda
- https://proofassistants.stackexchange.com/questions/1782/descriptions-of-heterogenous-datatypes
- https://stackoverflow.com/questions/58267692/convert-indexed-agda-data-type-to-record
- https://stackoverflow.com/questions/58147691/agda-difference-between-type-args-on-the-left-and-right-side-of-the-colon
