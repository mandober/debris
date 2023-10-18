# Parametrized and indexed data types

Here's the side-by-side comparison

```hs
-- List A data type is parametrized over the type param A
data List (A : Set) : Set where
  []  : List A
  _∷_ : A → List A → List A

-- Vec A Nat data type is parametrized over the type param A
-- and (length-)indexed over the type Nat
data Vec (A : Set) : Nat → Set where
  []  : Vec A zero
  _∷_ : {n : Nat} → A → Vec A n → Vec A (suc n)
```

Parametrized datatypes, like `List A`
- the type param `A` is declared in the header *before the colon*
- this type `A` is then accessible to all ctors
- parameters are the same (fixed) for all ctors

Indexed datatypes, like `Vec A Nat`
- the type param `A` is declared in the header before the colon
- this type `A` is then accessible to all ctors
- parameters are the same (fixed) for all ctors
- indices can vary from ctor to ctor
+ the index `Nat` is declared in the header *after the colon*
+ this index `Nat` is not accessible to ctors, but
+ it is only scoped to the header, until the `where` keyword
+ a ctor that mentions the index, declares its own, fresh, index `Nat`


Here's another example involving the equality data type. It is first declared as a parametrized data type, then as an indexed data type, however both types, `_≡ᵢ_`, have exactly the same signature, `{A : Set} → A → A → Set` (when their types are queryied in emacs with C-d).

```hs
-- (1)
data _≡₁_ {A : Set} : A → A → Set where
  refl : ∀ {x : A} → x ≡₁ x

-- 2
data _≡₂_ : ∀ {A : Set} → A → A → Set where
  refl : ∀ {A : Set} {x : A} → x ≡₂ x
```

Parametrized equality
- (1) declares a parametrized equality data type
- It declares the type param `A` before the colon (so as a type param)
- the type of `_≡₁_` is `{A : Set} → A → A → Set`

Indexed equality
- (2) declares an indexed equality data type
- It declares the type param `A` after the colon (so as an index type)
- the type of `_≡₂_` is `{A : Set} → A → A → Set`
