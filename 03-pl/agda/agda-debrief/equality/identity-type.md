# Agda :: Debrief :: Identity type

## Judgements about equality 

Two of the four main judgements in MLTT are about equality of types and terms:
- `Γ ⊢ A ≡ B type`  Type equality
- `Γ ⊢ x ≡ y : A`   Term equality, `x ≡ᴀ y`

To even consider comparing two terms for equality, they must be of the same type, so `x y : A`, presupposing that `A` is a well-formed type.

The equality must also be previously defined, which in MLTT usually amounts to it being defined as an inductive data type using the symbolic name `≡`, but referred to as the identity type.




, can be expressed as `x ≡ y`.

NOTETOSELF: Why it says `x ≡ y : A`?! 

## Implementing equality

```agda hs
-- Identity type
data _≡_ {A : Set} (x : A) : A → Set where
  refl : x ≡ x
```

A very important thing is that `x ≡ y` **is a type**. The infix `≡` is not a Boolean-valued operator that returns a truth value. It is a bona-fide type. If `x` and `y` are really equal, then the type `x ≡ y` will be inhabited - it will contain the term `refl`. The `refl` signifies that `x` and `y` are the same term, so both are in fact `x` (or `y`). If `x` and `y` are not equal the type `x ≡ y` will be uninhabited.

This suggests that `x` and `y` are two terms of some type `A`, `x y : A`, but there is another type around, `x ≡ y` (which could have been hidden behind a type variable `B`). So we have two types: `A` and `B`, i.e. `A` and `x ≡ y`, which (I think) are almost always distinct types.

If `A` is empty, then there were no terms to compare.





A possible inference rule to define equality of terms could just rely on the reflexivity, that every term is equal to itself:

```agda hs
A Type    x : A
----------------
    x ≡ x

A Type    x y : A
------------------
    x ≡ y
```




```agda hs
-- Equality (observational equality) on ℕ
-- as a specialization of the Identity type.
data _≡ᴺ_ : ℕ → ℕ → Set where
  z≡ᴺz :                          0 ≡ᴺ 0
  s≡ᴺs : {n m : ℕ} → n ≡ᴺ m → suc n ≡ᴺ suc m

-- Identity type
data _≡_ {A : Set} (x : A) : A → Set where
  refl : x ≡ x
```
