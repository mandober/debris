# Two-Level Type Theory

https://agda.readthedocs.io/en/latest/language/two-level.html

New in 2.6.3

## Basics

**Two-level type theory** (2LTT) refers to versions of Martin-Löf type theory that combine two type theories:
* *inner level* that is potentially a HoTT or Cubical Type Theory, which may include univalent universes and higher inductive types (HIT)
* *outer level* that validates uniqueness of identity proofs (UIP)

Since Agda 2.6.2, 2LTT can be enabled with the `--two-level` flag.

The 2 levels are distinguished with 2 hierarchies of universes:
- the usual universes `Set` for the inner level and
- a new hierarchy of universes `SSet` (for *strict sets*) for the outer level

The names of `SSet` and `Set` types in the literature:
- in HTS  (2017), `SSet` are *non-fibrant types*, `Set` are fibrant types
- in 2LTT (2017), `SSet` are *outer types*,       `Set` are inner types
- in UP   (2021), `SSet` are *exo-types*,         `Set` are jsut types

* Function types belong to `Set` if both their domain and codomain do, and to `SSet` otherwise.
* Records and datatypes can always be declared to belong to `SSet`, and can be declared to belong to `Set` instead if all their inputs belong to `Set`.

In particular, any type in `Set` has an isomorphic copy in `SSet` defined as a trivial record:

```agda hs
record c (A : Set) : SSet where
  constructor
    ↑
  field
    ↓ : A

open c
```

The main differences between the two levels
- homotopical flags such as `--without-K` and `--cubical` apply only to the `Set` level; the `SSet` level is **never homotopical**.
- datatypes belonging to the inner level cannot be pattern-matched against when the motive belongs to the outer level (this is necessary to maintain the previous distinction).


As a primary example, we can define separate *inductive equality types* for both levels:

```agda hs
infix 4 _≡ˢ_ _≡_

data _≡ˢ_ {a} {A : SSet a} (x : A) : A → SSet a where
  reflˢ : x ≡ˢ x

data _≡_ {a} {A : Set a} (x : A) : A → Set a where
  refl : x ≡ x
```



...
