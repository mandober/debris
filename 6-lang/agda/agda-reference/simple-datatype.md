# Simple datatype

https://agda.readthedocs.io/en/v2.6.2.1/language/data-types.html#simple-datatypes


```hs
-- The data type of natural numbers
data Nat : Set where
  zero : Nat
  suc  : Nat → Nat

-- The data type of truth values
data Bool : Set where
  true  : Bool
  false : Bool

-- The True set represents the trivially true proposition
data True : Set where
  tt : True

-- The False set has no constructor and hence no elements.
-- It represents the trivially false proposition:
data False : Set where

-- Another example is the data type of non-empty
-- binary trees with natural numbers in the leaves
data BinTree : Set where
  leaf   : Nat → BinTree
  branch : BinTree → BinTree → BinTree

-- Finally, the data type of Brouwer ordinals
data Ord : Set where
  zeroOrd : Ord
  sucOrd  : Ord → Ord
  limOrd  : (Nat → Ord) → Ord
```

## General form of simple datatypes

The general form of the definition of a simple datatype `D`

```hs
data D : Setᵢ where
  c₁ : A₁
  …
  cₙ : Aₙ
```

The name `D` of the data type and 
the names `c₁, …, cₙ` of the constructors 
must be new wrt the current signature and context.

The types `A₁, …, Aₙ` must be function types 
ending in `D`, i.e. they must be of the form:   
`(y₁ : B₁) → ... → (yₘ : Bₘ) → D`

```hs
data D : Setᵢ where
  cᵢ : Aᵢ
  --   Aᵢ must have the form:
  cᵢ : (yᵢ : Bᵢ) → … → (yₘ : Bₘ) → D
```
