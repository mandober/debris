# Generalization of declared variables

## Overview

Since <Agda v.2.6.0> there is a support for *implicit generalization over variables in types*. Variables to be generalized over must be declared with their types in a `variable` block.

```hs agda
variable
  ℓ : Level
  n m : Nat

data Vec (A : Set ℓ) : Nat → Set ℓ where
  []  : Vec A 0
  _∷_ : A → Vec A n → Vec A (suc n)
```



## Nested generalization




## Placement of generalized bindings




## Instance and irrelevant variables




## Importing and exporting variables




## Interaction




## Modalities
