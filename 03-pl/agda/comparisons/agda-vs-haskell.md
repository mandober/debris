# Agda vs Haskell

Agda is written in Haskell and shares lot of syntactic forms with it. However, sometimes the seemingly equivalent syntax forms are crucially different.

* Agda only takes the GADT style (and expands on it) for defining types from Haskell, along with a new way of defining types as records.

* A type definable as a GADT can also be defined as a record only if it has a single data ctor (e.g. unit, sigma).

* Agda is a FPL with dependent types so the line between types and values (terms) is not always clear. Terms are still different entities then type in most situations, but sometimes the line between them is more blurry.

* For this reason, Agda does not enforce letter casing for names - terms and types may begin with an uppercase or lowercase letter.

* Also, while Haskell allows type and data ctor punning (since they live in separate namespace), Agda does not - with unary type ctors, we have to come up with different names for the type ctor and its sole data ctor.

```hs
-- In Haskell, type ctor can have the same name as its data ctor
data Unit = Unit

-- In Agda, new types can be defined using the GADT syntax:
data 𝟙 : Type where
  ★ : 𝟙

-- and (sometimes and/or) using the record syntax:
record 𝟙 : Type where
  constructor
    ★
```

* Agda encourages the use of Unicode - it accepts `𝟙` as the type name, which Haskell would refuse.

* Agda has numerous uses for the underscore symbol - some uses mean the same as the `_` in Haskell, some uses are new.

* In Haskell, the same type signature can be specified for several terms by comma-separating the terms. In Agda, the terms need to be space-separated.

```hs
-- in Haskell
p1, p2 :: (Bool, Int)

-- in Agda
Σ-example₁ Σ-example₂ : Σ b ⦂ Bool , D b
Σ-example₁ = (true  , 17)
Σ-example₂ = (false , true)
```
