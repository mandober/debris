# 2. Abstract Reduction Systems

In the abstract treatment of reduction, reduction is synonymous with
- the traversal of some directed graph
- the stepwise execution of some computation
- the gradual transformation of some object (e.g. a term)
- or any similar step by step activity.

Mathematically this means we are simply talking about binary relations.

An abstract reduction system is a pair `(A, ⇉)`, where the reduction `⇉` is a binary relation on the set `A`, i.e. `(⇉) ⊆ A⨯A`. Instead of `(a,b) ∈ (⇉)` we write `a ⇉ b`.

>Formally, for an abstract rewriting system, denoted `(A, ⇉)`, a reduction strategy, denoted `⇉ꜱ`, is a binary relation on `A` with `⇉ꜱ ⊆ ⇉﹢` where `⇉﹢` is the transitive closure of `⇉` (but not the reflexive closure).

The term *reduction* has been chosen because in many applications something decreases with each reduction step, but cannot decrease forever. Yet this need not be the case, as witnessed by the reduction `0 ⇉ 1 ⇉ 2 ⇉ …`.

Unless noted otherwise, all our discussions take place in the context of some arbitrary but fixed abstract reduction system `(A, ⇉)`.

## 2.1 Equivalence and reduction

We can view reduction in two ways:

* The first is as a directed computation, which, starting from some point ao, tries to reach a normal form by following the reduction `a0 ⇉ a1 ⇉ …`. This corresponds to the idea of program evaluation.

* Or we may consider `⇉` merely as a description of `⇆`, where `a ⇆ b` means that there is a path between `a` and `b` where the arrows can be traversed in both directions. This corresponds to the idea of *identities* which can be used in both directions.

The key question here is to decide if two elements `a` and `b` are equivalent, i.e. if `a ⇆ b` holds. Settling this question by an undirected search along both `⇉` and `⇆` is bound to be expensive. Wouldn't it be nice if we could decide equivalence by reducing both `a` and `b` to their normal forms and testing if the normal forms are identical? As explained before, this idea is only going to work if reduction terminates and normal forms are unique (confluence).

### 2.1.1 Basic definitions

Given two relations `R ⊆ A⨯B` and `S ⊆ B⨯C`, their *composition* is defined by

>R ∘ S = { (x,z) ∈ A⨯C | ∃y ∈ B. (x,y) ∈ R ∧ (y,z) ∈ S }


We are particularly interested in composing a reduction with itself and define the following notions:

Sym  | Definition      | Desc                                | General rels
-----|-----------------|-------------------------------------|-------------
⟶⁰  | {(x,z) ¦ x ∈ A} | idenitity                           | R⁰
⟶ⁿ  | ⟶ⁱ ∘ ⟶        | n-fold composition, n = i+1, i > 0  | R°ⁿ
⟶ᐩ   | ⋃ {i > 0} ⟶ⁱ   | transitive closure                  | Rᐩ, Rᵗ
⟶ˣ  | ⟶ᐩ ⋃ ⟶⁰       | reflexive transitive closure       | R* = R⁰ ⋃ Rᐩ, Rʳᵗ
⟶⁼  | ⟶ ⋃ ⟶⁰        | reflexive closure                   | R⁼, Rʳ
⟶⁻¹ | {(y,x) ¦ x ⟵ y} | inverse                            | R⁻¹, ᴙ
⟵   | ⟶⁻¹             | inverse                            | R⁻¹, Ꙅ
⟷   | ⟶ ⋃ ⟵          | symmetric closure                   | Rˢ
⟷ᐩ  | (⟷)ᐩ            | transitive symmetric closure          | Rᵗˢ
⟷ˣ  | (⟷)ˣ           | reflexive transitive symmetric closure | Rˣ, Rʳᵗˢ


- reflexivity,  `∀a.  aRa`
- symmetry,     `∀ab. aRb ==> bRa`
- transitivity, `∀abc.aRb ⋀ bRc ==> aRc`
- inverse,      `∀ab. aSb ==> bꙄa`

```hs
'Reflexivity:

  R a b c
  a 1    
  b   1  
  c     1

  ∀x.(x,x) ∈ R

  So, e.g. if R = {(a,b), (c,c)}
  the reflexive closure od R is
  R ⋃ {(a,a),(b,b)}


'Transitivity:

  R a b c
  a     2
  b 1    
  c   3  

  (b,a) ∈ R ⋀ (a,c) ∈ R ==> (b,c) ∈ R

  So, e.g. if R = {(b,a), (a,c)}
  the transitive closure of R is made
  by doing the union of R with {(b,c)},
  Rᵗ = R ⋃ {(b,c)}


'Symmetry:

  R a b c
  a     1
  b      
  c 1    

  (c,a) ∈ R -> (a,c) ∈ R

  So, e.g. if R = {(b,a), (a,c)}
  the symmetric closure of R is
  R ⋃ {(a,b),(c,a)}

'Inverse:

  S a b c Ꙅ
  a 1 1 1 a
  b 0 1 1 b
  c 0 0 1 c
  S a b c Ꙅ

  (a,b) ∈ S ==> (b,a) ∈ Ꙅ

  So, e.g. if R = {(a,a),(a,b),(a,c),(b,b),(b,c),(c,c)}
  the symmetric closure of R is
  R ⋃ {(b,a),(c,a),(c,b)}

```


Some of the constructions can also be expressed in terms of paths:
- `x --ⁿ-> y` if there is a path of length `n` from x to y
- `x --*-> y` if there is some finite path from x to y
- `x --+-> y` if there is some finite nonempty path from x to y


> `P` closure of `R` is the *least set* with property `P` which contains `R`.


For example, `⟶ˣ`, the reflexive transitive closure of `⟶`, is the least reflexive and transitive relation which contains `⟶`.

Note that for arbitrary `P` and `R`, the `P closure of R` need not exist, but in the above cases they always do because reflexivity, transitivity and symmetry are closed under arbitrary intersections. In such cases the P closure of R can be defined directly as the intersection of all sets with property P which contain R.

It is easy to show that the reflexive transitive symmetric closure, `⟷ˣ`, is the least equivalence relation containing `⟶`.

#### Terminology

- `x` is *reducible* iff there is a `y` such that `x ⟶ y`
- `x` is in *normal form (irreducible)* iff it is not reducible
- `y` is *a normal form of* `x` iff `x ⟶ˣ y` and `y` is in normal form
- if `x` has a **uniquely determined normal form**, it is denoted by `x ↓`

- `y` is a *direct successor* of `x` iff `x ⟶ y`
- `y` is a *successor* of `x` iff `x ⟶ᐩ y`

- `x` and `y` are **joinable**, `x ↓ y`, iff `∃z` s.t. `x ⟶ˣ z ˣ⟵ y`
  - `⟶ˣ` reflexive transitive closure
  - `ˣ⟵` inverse reflexive transitive closure

---

Finally we come to some of the central notions of this book.

A reduction `⟶` is called:
- Church-Rosser  iff         `x ⟷ˣ y ==> x ↓ y`
- confluent      iff `y1 ˣ⟵ x ⟶ˣ y2 ==> y1 ↓ y2`
- semi-confluent iff `y1  ⟵ x ⟶ˣ y2 ==> y1 ↓ y2`
- terminating    iff there is no infinite descending chain, a₀ ⟶ a₁ ⟶ …
- normalizing    iff every element has a normal form
- convergent     iff it is both confluent and terminating
where
* `⟷ˣ` reflexive transitive symmetric closure
* `⟶ˣ` reflexive transitive closure
* `ˣ⟵` inverse reflexive transitive closure


>Any terminating relation is normalizing, but the converse is not true.

Thus we have come back to our initial motivation: the **Church-Rosser property** is exactly what we were looking for, namely the ability to test equivalence by the search for a common successor.


### 2.1.2 Basic results

Although semi-confluence looks weaker than confluence, it turns out to be equivalent. The following conditions are equivalent:
- `⟶` has the Church-Rosser property
- `⟶` is confluent
- `⟶` is semi-confluent


## 2.2 Well-founded induction
