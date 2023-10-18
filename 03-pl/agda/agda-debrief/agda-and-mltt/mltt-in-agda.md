# MLTT in Agda

Per Martin-Löf's dependent type theory (Martin-Löf 1975) is a specific form of type theory developed to support constructive mathematics. It is synonymous with Constructive Type Theory (CTT) and Intuitionistic Type Theory (ITT). This is not one, but many variants of type theories, differing in a set of supported features, but all related in the fact that they are constructive (i.e. intuitionistic) approaches to mathematics.

MLTT is based on the principles of mathematical constructivism, which requires that proofs contain a witnessing element, aka a term that serves as an evidince or justification that supports the proven claim.

In MLTT, propositions are treated as types, which is the so-called *propositions-as-types* part of the *Curry-Howard isomorphism*. This means that a proposition that has a proof must be an inhabited type. Moreover, that type must contain at least one term (value, element) that is a witness to the proof - that serves as the evidential support for it. In fact, such term is often called the proof.

Therefore, if there is only one way to prove a proposition, then the type of that proposition should have a single inhabitant - a term that is a proof of it. For example, there is only one way to prove that two natural numbers are equal, so there is a sole term in the type of a proposition like `0 ≜ 0`, where `≜` denotes the equality on the natrual numbers. In fact, that term is the literal value `z≜z`, read right off the name of the corresponding inference rule.

```
                     p : m ≜ n
------------      -------------------
z≜z : 0 ≜ 0       s≜s p : S m ≜ S n
```

To reiterate, propositions about the equality of two natural numbers can be expressed by defining the equality on the natural numbers:

```agda hs
data _≜_ : ℕ → ℕ → Set
  z≜z : 0 ≜ 0
  s≜s : {n m : ℕ} n ≜ m → suc n ≜ suc m
```



type 

the proof of the proposition

A proposition like `1 ≜ 1` is a type that also has a single inhabitant, but which is a different term - in this case it is the value `s≜s z≜z` - it is **the proof** that the natural numbers 1 and 1 are equal.






Agda is based on Martin-Löf's type theory (MLTT), which has 


## Contents

- Design
- Type theory
  - 0 type
  - 1 type
  - 2 type
  - Σ type
  - Π type
  - Identity type
  - Inductive types
  - Universe types
- Judgements
- Categorical models of type theory
- Extensional versus intensional
- Implementations of type theory
- Martin-Löf type theories

There are 3 finite types:
- `𝟘` type contains no terms (it is uninhabited)
- `𝟙` type contains 1 canonical term
- `𝟚` type contains 2 canonical terms
