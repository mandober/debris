# 2. MLTT in Agda

- What is Agda
- A spartan Martin-Löf type theory (MLTT)
- Getting started with Agda
- Type universes 𝓤,𝓥,𝓦
- The one-element type 𝟙
- The empty type 𝟘
- The type ℕ of natural numbers
- The binary sum type constructor _+_
- Σ types
- Π types
- The identity type former Id, also written _＝_
- Basic constructions with the identity type
- Reasoning with negation
- Example: formulation of the twin-prime conjecture
- Remaining Peano axioms and basic arithmetic


## What is Agda

There are two views:

1. Agda is a dependently-typed functional programming language.

2. Agda is a language for defining mathematical notions (e.g. group or topological space), formulating constructions to be performed (e.g. a type of real numbers, a group structure on the integers, a topology on the reals), formulating theorems (e.g. a certain construction is indeed a group structure, there are infinitely many primes), and proving theorems (e.g. the infinitude of the collection of primes with Euclid's argument).

This doesn't mean that Agda has two sets of features, one for (1) and the other for (2). The same set of features account simultaneously for (1) and (2). Programs are mathematical constructions that happen not to use non-constructive principles such as excluded middle.

In these notes we study a minimal univalent type theory and do mathematics with it using a minimal subset of the computer language Agda as a vehicle.

Agda allows one to construct proofs interactively, but we will not discuss how to do this in these notes. Agda is not an automatic theorem prover. We have to come up with our own proofs, which Agda checks for correctness. We do get some form of interactive help to input our proofs and render them as formal objects.

## A spartan Martin-Löf type theory

Before embarking into a full definition of our MLTT in Agda, we summarize the particular MLTT that we will consider, by naming the concepts that we will include. We will have:
- An empty type `𝟘`
- A one-element type `𝟙`
- type `ℕ` of natural numbers
- type formers for
  - `+` binary sum
  - `Π` product
  - `Σ` sum
  - `Id` identity type
- Universes (types of types), ranged over by 𝓤, 𝓥, 𝓦

This is enough to do number theory, analysis, group theory, topology, category theory and even more.

We will also be rather spartan with the subset of Agda that we choose to discuss. Many things we do here can be written in more concise ways using more advanced features. Here we introduce a minimal subset of Agda where everything in our spartan MLTT can be expressed.

## Getting started with Agda

We don't use any Agda library. For pedagogical purposes, we start from scratch, and here are our first two lines of code:

```agda hs
{-# OPTIONS --without-K --exact-split --safe --auto-inline #-}

module HoTT-UF-Agda where
```

The option `--without-K` disables [Streicher's K axiom](https://ncatlab.org/nlab/show/axiom+K+(type+theory)), which we don't want for univalent mathematics.

The option `--exact-split` makes Agda only accept definitions with the equality sign "=" that behave like the judgmental or definitional equalities.

The option `--safe` disables features that may make Agda inconsistent, such as `--type-in-type`, *postulates* and more.


## Type universes

A universe `𝓤` is a type of types. One use of universes is to define families of types indexed by a type `X` as functions `X → 𝓤`. Such functions are sometimes seen as properties of elements of `X`. Another use of universes is to define types of mathematical structures, such as monoids, groups, topological spaces, categories etc.

Sometimes we need more than one universe. For example, the type of groups lives in a bigger universe, and given a category in one universe, its presheaf category also lives in a larger universe.

We work with a tower of type universes: `𝓤₀, 𝓤₁, 𝓤₂, 𝓤₃, …`.

In practice, the first few universes suffice, but it will be easier to formulate definitions, constructions and theorems in full generality, to avoid making universe choices before knowing how they are going to be applied.

These `𝓤`'s are actually universe names, aka `Level`s (not to be confused with `hlevels`). We reference the universes themselves by a deliberately almost-invisible COMBINING DOT ABOVE (0x307), attached onto `𝓤` which is also subscripted by a level, e.g. `𝓤₀ ̇`.

For example, we will have `𝟙 : 𝓤₀ ̇`, where `𝟙` is the one-point type to be defined shortly.

We sometimes omit the COMBINING DOT ABOVE in prose, but are forced to write it in Agda code.

We have that the universe `𝓤₀` is a type in the universe `𝓤₁`, and thus denoted `𝓤₀ ̇ : 𝓤₁ ̇`, the later is a type in the universe `𝓤₂` and thus denoted `𝓤₁ ̇ : 𝓤₂ ̇`, and so on.

The assumption that `𝓤₀ : 𝓤₀` or that any universe is in itself or a smaller universe gives rise to a contradiction, similar to Russell's Paradox.

Given a universe `𝓤`, we denote by `𝓤 ⁺` its successor universe. For example, if `𝓤` is `𝓤₀` then `𝓤 ⁺` is `𝓤₁`. According to the above discussion, we have `𝓤 ̇ : 𝓤 ⁺ ̇`.

The least upper bound of two universes 𝓤 and 𝓥 is written `𝓤 ⊔ 𝓥`.

For example, if 𝓤 is 𝓤₀ and 𝓥 is 𝓤₁, then `𝓤 ⊔ 𝓥` is `𝓤₁`.

We now bring our notation for universes by importing our Agda file `Universes`. The keyword `open` asks to make all definitions in the module `Universe` visible in the importing file. The keyword `public` makes the contents of the module `Universes` available to importers of the module `HoTT-UF-Agda`.

```agda hs
open import Universes public

variable
  𝓤 𝓥 𝓦 𝓣 : Universe
```

We refer to universes by variables 𝓤, 𝓥, 𝓦, 𝓣.

In some type theories, the universes are *cumulative "on the nose"*, in the sense that from `X : 𝓤` we derive that `X : 𝓤 ⊔ 𝓥`. We will instead have an embedding `𝓤 → 𝓤 ⊔ 𝓥` of universes into larger universes.
