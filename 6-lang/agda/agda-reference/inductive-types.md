# Agda ∷ Inductive types

<!-- TOC -->

- [Natural numbers](#natural-numbers)
- [Zero-successor algebra](#zero-successor-algebra)
  - [Examples of zero-successor algebras](#examples-of-zero-successor-algebras)
- [Homomorphism](#homomorphism)
  - [Homomorphism example](#homomorphism-example)
- [Unique homomorphism](#unique-homomorphism)
- [Existence of unique homomorphism from ℕ to any Z-S algebra](#existence-of-unique-homomorphism-from-ℕ-to-any-z-s-algebra)
- [Initial algebra](#initial-algebra)
- [Initial Z-S algebras are isomorphic](#initial-z-s-algebras-are-isomorphic)
- [(N,0,S) is the unique Z-S algebra up to an isomorphism](#n0s-is-the-unique-z-s-algebra-up-to-an-isomorphism)
- [Remarks](#remarks)
- [Inductive types in Agda](#inductive-types-in-agda)
- [Negative example of initial algebra](#negative-example-of-initial-algebra)

<!-- /TOC -->


Agda is based on
- type theory
- lambda calculus
- CHI
- inductive types

## Natural numbers

>(Definition) 
The set of natural numbers has the following structure and properties:
1. There is an element called "zero", denoted 0, `0 : ℕ`
2. There is a function called "successor", denoted succ, `succ : ℕ → ℕ`
3. **Universality**: `ℕ` is the *free* set with the structure described above.
  More precisely:
  * Given any other set `X` with
    an element zero, `z ∈ X` and 
    a successor function, `s : X → X`
  * There exists a **unique function** `f : ℕ → X` such that
    - `f(0) = z`
    - `∀n ∈ ℕ. f(succ(n)) = s(f(n))`


To make this definition easier to digest, we'll break it down into parts.

## Zero-successor algebra

>(Definition) 
A zero-successor algebra is a triple `(X, z, s)` such that
1. `X` is a set, called "carrier set" of algebra.
2. `z ∈ X` is an element called "zero" of algebra.
3. `s : X → X` is a function called "successor" of algebra.


### Examples of zero-successor algebras

* The set of the natural numbers `(ℕ, 0, succ)`, where `succ(n) = n + 1`.

* An algebra defined by the triple `(N, 0, f)`, where `f(n) = n + 2`.

* The triple `(X,z,s)` defined by:
  - `X = {1,2,3}` is the carrier set
  - `2` is the zero element
  - `s : X → X` is defined by `s(1) = 2`, `s(2) = 1`, `s(3) = 1`

* The triple `(X,z,s)` defined by:
  - `X = {0,1,2,3,4}` is the carrier set
  - zero is the element `0`
  - `s : X → X` as `s(0) = 1`, `s(1) = 2`, `s(2) = 3`, `s(3) = 4`, `s(4) = 0`

Thus, many sets with defined zero element and successor function can satisfy the axioms of zero-successor algebra, not just the set of the natural numbers.

The number of elements in the carrier set is also not important, as long as there is the successor function defined, and it may or even may not engage all the elements in the carrier set; there could even be some elements that are not "reached" by the successor function.

The last example defines a cyclic structure with regards to the successor, since the successor of 4 goes back to 0, and then the successor of 0 is 1, and so on; the cycle continues and goes on forver, similarly to modular arithmetic.

## Homomorphism

A homomorphism is a structure-preserving map, so it maps objects to objects and arrows to arrows.

A homomorphism `h : M → W` maps _zᵐ ⟼ zʷ_,
the zero element, `zᵐ`, of the first algebra, 
to the zero element, `zʷ`, of the second algebra, 
`h zᵐ = zʷ`.

A homomorphism `h : M → W` also maps _sᵐ ⟼ sʷ_,
the successor function, `sᵐ : M → M`, of the first algebra, 
to the successor function, `sʷ : W → W`, of the second algebra, 
`h ∘ sᵐ = sʷ ∘ h`, that is, for all `x ∈ M`, `h (sᵐ x) = sʷ (h x)`.

>(Definition) 
Let `ℳ = (M, zᵐ, sᵐ)` and `𝒲 = (W, zʷ, sʷ)` be two zero-successor algebras.
A **homomorphism** of these zero-successor algebras is `h : M → W` such that
1. `h zᵐ = zʷ`
2. `h ∘ sᵐ = sʷ ∘ h`, that is `h (sᵐ x) = sʷ (h x)`

<!-- #region diagram -->

<details><summary>Commutative diagrams</summary>

This can be made more clear with commutative diagrams:

```
zᵐ ⟼ zʷ
sᵐ ⟼ sʷ

I ---------> M
|     zᵐ     |   I is a singleton set
|          h |
|            |   h zᵐ = zʷ
|     zʷ     ↓
I ---------> W


                 h  : M → W
M ---------> W
|      h     |   sᵐ : M → M
|            |   sʷ : W → W
|sᵐ - - - →sʷ |               h        sᵐ        h
|            |   h ∘ sᵐ : (M → W) → (M → M) → M → W
↓      h     ↓   sʷ ∘ h : (W → W) → (M → W) → M → W
M ---------> W              sʷ         h        h

                 h ∘ sᵐ = sʷ ∘ h
```

</details>

<!-- #endregion -->


### Homomorphism example

Consider two zero-successor algebras, `ℳ` and `𝒲`, defined by:

1. ℳ = (M, zᵐ, sᵐ) = (ℕ, 0, succ)

`ℳ` is a zero-successor algebra on the set of the natural numbers:
  - carrier set,  `M  = ℕ`
  - zero element, `zᵐ = 0`
  - successor fn, `sᵐ = succ`

2. 𝒲 = (W, zʷ, sʷ) = ({a,b,c}, a, sʷ)

`𝒲` is a zero-successor algebra over an arbitrary set defined by
  - carrier set,  `W  = {a,b,c}`
  - zero element, `zʷ = a`
  - successor fn, `sʷ = { (a,b), (b,c), (c,a) }`

The task is to find a homomorphism from algebra `ℳ` to algebra `𝒲`, described in terms of their carrier sets as a homomorphism from `M` to `W`, defined by the function `h : M → W`.

```js
              h
       ℕ ------------> W

  zᵐ = 0             ┌→ a = zʷ
       ↓            │  ↓
       1            │  b
       ↓            │  ↓
       2            │  c
       ↓            │  ↓
       3            └──┘
       ⋮
```

The homomorphism `h : ℕ → W` maps _zᵐ ⟼ zʷ_, that is, `h zᵐ = zʷ`, which means `h 0 = a`, since `0` is the zero element of `ℕ`, and `a` is the zero element of `W`.

The homomorphism must also map the succesor function, _sᵐ ⟼ sʷ_, such that 
`h ∘ sᵐ = sʷ ∘ h`, that is, for all `x ∈ ℕ. h (succ x) = sʷ (h x)`.

```hs
-- zero, h zᵐ = zʷ
h 0 = a

-- successor, ∀n ∈ ℕ. h (succ n) = sʷ (h n)

h (succ 0) = sʷ (h 0)    -- by the zero mapping above, h 0 = a
h 1        = sʷ a        -- just read out the sʷ(a), which is
h 1        = b           -- sʷ(a) = b

h (succ 1) = sʷ (h 1)    -- by the prev mapping above, h 1 = b
h 2        = sʷ b        -- just read out the sʷ(b), which is
h 2        = c           -- sʷ(b) = c

h (succ 2) = sʷ (h 2)    -- by the prev mapping above, h 2 = c
h 3        = sʷ c        -- just read out the sʷ(c), which is
h 3        = a           -- sʷ(c) = a

h (succ 3) = sʷ (h 3)    -- by the prev mapping above, h 3 = a
h 4        = sʷ a        -- just read out the sʷ(a), which is
h 4        = b           -- sʷ(a) = b

-- etc.

-- thus
h = { (0,a)
    , (1,b), (2,c), (3,a), (4,b), …
    }
```

## Unique homomorphism

(Theorem): 
>There exists a *unique homomorphism* of zero-successor algebras `h : ℕ → W`

(Proof) by induction:
- `h 0` is uniquely determined
- if `h n` is uniquely determined, then `h (succ n)` is uniquely determined also

## Existence of unique homomorphism from ℕ to any Z-S algebra

(Theorem):
>For any zero-successor algebra `𝒲 = (W, zʷ, sʷ)`, there exists a *unique homomorphism* from the natural number to it, `h : ℕ → W`.

(Proof) by induction (same as above)
- `h 0` is uniquely determined
- if `h n` is uniquely determined, then `h (succ n)` is uniquely determined also

## Initial algebra

(Definition): 
>A zero-successor algebra `(M, zᵐ, sᵐ)` is an **initial algebra** if it has the property, that for all (other) zero-successor algebras `(W, zʷ, sʷ)`, there is a unique homomorphism `h : M → W` (form it to them).

(Remark): 
`(ℕ, 0, succ)` is an *initial zero-successor algebra*.

## Initial Z-S algebras are isomorphic

(Theorem): 
>Any two initial zero-successor algebras are **isomorphic**.

This theorem means, if there is an initial algebra, then it is basically unique. The naturals, up to an isomorphism, are the unique zero-successor algebra that is initial.

(Proof): 
Let `ℳ = (M, zᵐ, sᵐ)` and `𝒲 = (W, zʷ, sʷ)` be zero-successor algebras, and assume both are initial algebras.
1. Since `ℳ` is initial, there is unique homomorphism `f : M → W`.
2. Since `𝒲` is initial, there is unique homomorphism `g : W → M`.
3. Then `g ∘ f : M → M` is a homomorphism. 
  But `1ᵐ : M → M` is a homomorphism also. 
  But `ℳ` is initial. Therefore `g ∘ f = 1ᵐ`.
4. Similarly, `f ∘ g = 1ʷ`
5. So `f` and `g` are each other's inverses, and thus isomorphisms.
6. Thus, `ℳ` and `𝒲` are isomorphic.


An *isomorphism* is a homomorphism going both ways, or in other words, it is a bijective homomorphism. Two isomorphic algebras are pretty much the same, up to a morphism (such as alpha-equivalence), where their difference is perhaps in the names or denotation of their elements; for example, the naturals denoted by Hindu-Arabic numerals vs Roman numbers.

## (N,0,S) is the unique Z-S algebra up to an isomorphism

(Theorem): 
>(ℕ, 0, succ) is, up to an isomorphism, the unique zero-successor algebra.

## Remarks

The terms "universality", "freeness" and "initiality" are interchangable (at least wrt an algebra). The term "free", as in free algebra, means there are no equations. In other words, the elements of ℕ are exactly zero, and the successors of the already existing elements, without any equations. So, `0` is a different element then `S0`, which is different then `SS0`, and so on, with every subsequent successor being different than all the elements of ℕ that came before it. Moreover, ℕ has no additional elements but these.

## Inductive types in Agda

In Agda, a data type definition like

```hs agda
data ℕ : Set where
  Z : ℕ
  S : ℕ → ℕ
```

is automatically interpreted that ℕ is the initial such algebra. This kind of definition is called an *inductive data type*.

The set of ℕ is generated "freely". Another consequence of freeness is that we can perform *case analysis* on the inductive data type (with zero as the base case, and successor of some element `n` as the recursive case) - it is guaranteed to either be a zero, or a successor of some natural number (it cannot be both and it cannot be neither). The set of N is partitioned into the zero elements and the successor elements - there's no overlap between them, and there are no extra elements besides them. This holds for an initial algebra (like ℕ), not for any arbitrary algebra (like `W` above, where the two partitions are not disjoint since it is cyclic).


## Negative example of initial algebra

Consider the algebra `𝒲 = (W, zˣ, sˣ)` defined by:
- the singleton set `{∅}` as the carrier
- zero element, `zˣ = ∅`
- successor defined by `sˣ(∅) = ∅`

This is a Z-S algebra, but is it an initial algebra?

<!-- #region recall -->

<details><summary>Recall definitions</summary>

(recall-def) The homomorphism `h : ℕ → X`.
1. The homomorphism `h : ℕ → W` maps _0 ⟼ zˣ_, that is `h(0) = zˣ` so `h(0) = zˣ`, since `0` is the zero element of `ℕ`, and `zˣ` is the zero element of `W`.
2. The homomorphism must also map the succesor function, _sᵐ ⟼ sʷ_, that is, for all x ∈ ℕ, `h (succ x)` = `sˣ (h x)`, such that `h ∘ succ = sˣ ∘ h` holds.

(recall-def) A zero-successor algebra `(M, zᵐ, sᵐ)` is an *initial algebra* if it has the property, that for all (other) zero-successor algebras `(W, zʷ, sʷ)` there is a unique homomorphism, `h : M → W` (form it to them).

</details>

<!-- #endregion -->

If it were an initial algebra it should have a unique homomorphism into, e.g. natural numbers (or any other Z-S algebra), `h : W → ℕ`.

`(W, zˣ, sˣ) ------- h -------> (ℕ, 0, succ)`

```hs
-- zero
h zˣ = zⁿ
h ∅ = 0

-- successor, ∀w ∈ W.
h (sˣ w) = sᵐ (h w)
h (sˣ w) = succ (h w)

h (sˣ ∅) = succ (h 0)
h (∅) = succ (0)
∅ = 1 ✘
```

So, `h` is not a homomorphism! (why not?)
