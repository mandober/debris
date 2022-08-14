# Indexed datatypes

In addition to parameters, datatypes can also have indices. In contrast to parameters, which are the same for all ctors, indices can vary from ctor to ctor.

Index types are declared *after the colon*, as function arguments to `Set`.

For example, fixed-length vectors can be defined by indexing them over their length of type of naturals:

```hs
data Vector (A : Set) : Nat → Set where
  []  : Vector A zero
  _∷_ : {n : Nat} → A → Vector A n → Vector A (suc n)
```

Notice that the parameter `A` is bound once for all constructors, while the index `{n : Nat}` must be bound locally in the ctors, e.g. in the ctor `_∷_`.

Indexed datatypes can also be used to describe *predicates*.

For example, the predicate `Even : Nat → Set` can be defined as

```hs
data Even : Nat → Set where
  even-zero  : Even zero
  even-plus2 : {n : Nat} → Even n → Even (suc (suc n))
```

## General form of parametrized indexed datatypes

The general form of the definition of a parametrized and indexed datatype `D`

```hs
data D  (x₁ : P₁)   …   (xₖ : Pₖ)  :
        (y₁ : Q₁) → … → (yₗ : Qₗ)
      → Set ℓ
where
  c₁ : A₁
  --   A₁ must have the form:
  c₁ : (z₁ : B₁) → … → (zₘ : Bₘ)    → D x₁ … xₖ t₁ … tₗ
  …
  cₙ : Aₙ

-- where the types A₁, …, Aₙ are function types of the form
A₁ : (z₁ : B₁)
   → …
   → (zₘ : Bₘ)
   → D x₁ … xₖ t₁ … tₗ



-- that is
data D   (x₁ : P₁)   …   (xₖ : Pₖ)  -- typarams (xᵢ : Pᵢ) before the colon
       :
         (y₁ : Q₁) → … → (yₗ : Qₗ)   -- indices (yᵢ : Qᵢ) after the colon
       → Set ℓ
where
  c₁ : (z₁ : B₁)                  -- ctors have typarams (xᵢ : Pᵢ) in scope
     → …                          -- but not the indices
     → (zₘ : Bₘ)
     → D x₁ … xₖ t₁ … tₗ           -- ctors must return D …
```
