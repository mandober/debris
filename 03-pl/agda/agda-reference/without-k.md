# Without K

The manual page is changed since agda `Agda 2.6.3` (latest version)
- https://agda.readthedocs.io/en/latest/language/without-k.html
- https://agda.readthedocs.io/en/v2.6.2/language/without-k.html
- https://agda.readthedocs.io/en/v2.6.2.1/language/without-k.html
- https://agda.readthedocs.io/en/v2.6.1.3/language/without-k.html

## Without K (2.6.3)

See [Cubical compatible](https://agda.readthedocs.io/en/latest/language/cubical-compatible.html#cubical-compatible).

- The option `--without-K` was renamed to `--cubical-compatible` in Agda 2.6.3
- It is retained for backwards compatibility.
- See [Issue #5843](https://github.com/agda/agda/issues/5843)

## Without K (2.6.2.1)

https://agda.readthedocs.io/en/v2.6.2.1/language/without-k.html

The option `--without-K` adds some restrictions to Agda's typechecking algorithm in order to ensure compatability with versions of type theory that do not support *uniqueness of identity proofs* (UIP), such as HoTT.

The option `--with-K` can be used to override the global `--without-K` flag in a file, by adding the pragma. This option is *enabled by default*.

## Restrictions on pattern matching

When the option `--without-K` is *enabled*, then Agda only accepts certain case splits. More specifically, the unification algorithm for checking case splits cannot make use of the *deletion rule* to solve equations of the form `x = x`.

For example, the obvious implementation of the K rule is not accepted:

```hs
K : {A : Set} {x : A} (P : x ≡ x → Set) → P refl → (x≡x : x ≡ x) → P x≡x
K P p refl = p
```

Pattern matching with the constructor `refl` on the argument `x≡x` causes `x` to be unified with `x`, which fails because the deletion rule cannot be used when `--without-K` is enabled.


On the other hand, the obvious implementation of the J rule is accepted:

```hs
J : {A : Set} (P : (x y : A) → x ≡ y → Set)
  → ((x : A) → P x x refl) → (x y : A) (x≡y : x ≡ y) → P x y x≡y
J P p x .x refl = p x
```

Pattern matching with the constructor `refl` on the argument `x≡y` causes `x` to be unified with `y`. The same applies to Christine Paulin-Mohring's version of the J rule:

```hs
J′ : {A : Set} {x : A} (P : (y : A) → x ≡ y → Set)
   → P x refl → (y : A) (x≡y : x ≡ y) → P y x≡y
J′ P p ._ refl = p
```

For more details, see Jesper Cockx's PhD thesis 
[Dependent Pattern Matching and Proof-Relevant Unification][JC17].

[JC17]: https://limo.libis.be/primo-explore/fulldisplay?docid=LIRIAS1656778&context=L&vid=Lirias



## Restrictions on termination checking

When `--without-K` is **enabled**, Agda's termination checker restricts structural descent to arguments ending in data types or `Size`. Likewise, guardedness is only tracked when result type is data or record type:

```hs
data ⊥ : Set where

mutual
  data WOne : Set where wrap : FOne → WOne
  FOne = ⊥ → WOne

postulate iso : WOne ≡ FOne

noo : (X : Set) → (WOne ≡ X) → X → ⊥
noo .WOne refl (wrap f) = noo FOne iso f
```

`noo` is rejected since at type `X` the structural descent `f < wrap f` is discounted `--without-K`

```hs
data Pandora : Set where
  C : ∞ ⊥ → Pandora

postulate foo : ⊥ ≡ Pandora

loop : (A : Set) → A ≡ Pandora → A
loop .Pandora refl = C (♯ (loop ⊥ foo))
```

`loop` is rejected since guardedness is not tracked at type `A` `--without-K`.

See issues:
- https://github.com/agda/agda/issues/1023/
- https://github.com/agda/agda/issues/1264/
- https://github.com/agda/agda/issues/1292/



## Restrictions on universe levels

When `--without-K` is **enabled**, some indexed datatypes must be defined in a higher universe level. In particular, the types of all indices should fit in the sort of the datatype.

For example, usually, i.e. `--with-K`, Agda allows the following definition of equality:

```hs
data _≡₀_ {ℓ} {A : Set ℓ} (x : A) : A → Set where
  refl : x ≡₀ x
```

However, with --without-K it must be defined at a higher universe level:

```hs
data _≡′_ {ℓ} {A : Set ℓ} : A → A → Set ℓ where
  refl : {x : A} → x ≡′ x
```


## Refs

https://stackoverflow.com/questions/39264130/is-agda-without-k-less-powerful

https://dl.acm.org/doi/10.1145/2628136.2628139

https://github.com/agda/agda-stdlib/issues/135

https://github.com/agda/agda/issues/3916

https://lists.chalmers.se/pipermail/agda/2014/006526.html

https://sozeau.gitlabpages.inria.fr/www/research/publications/Equations_Reloaded-ICFP19-190819.pdf

https://code-examples.net/en/q/256bec3

http://www.cse.chalmers.se/~nad//listings/equality/README.Safe.Without-K.html

https://www.math.fsu.edu/~ealdrov/teaching/2020-21/fall/MAS5932/agda/simplenat.html

https://www.normalesup.org/~cagne/gadts/adm/Data.Vec.Bounded.Base.html

http://www.jonmsterling.com/agda-effectful-forcing/Basis.html

https://www.cambridge.org/core/journals/journal-of-functional-programming/article/eliminating-dependent-pattern-matching-without-k/4BC4EA2D02D801E5ABED264FE5FB177A

https://www.cs.bham.ac.uk/~mhe/continuity-false/continuity-false-without-identity-types.html
