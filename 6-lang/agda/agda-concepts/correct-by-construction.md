# Correct-by-construction

## Dependent types

With dependent types, we can statically verify that a program satisfies a given *correctness property*; verification is built into the language itself.

Two approaches to verification with dependent types:
1. *Extrinsic approach* 
   first write the program and then prove correctness.
2. *Intrinsic approach* 
   first define the `type` of programs that satisfy the correctness
   property, then write the program that inhabits that type.

The intrinsic approach is also called correct-by-construction programming.


## Example

```agda hs
postulate
  ⋯ : ∀ {ℓ} {A : Set ℓ} → A

module Intro where
  open import Data.Bool.Base using (Bool; true; false)
  open import Data.Char.Base using (Char)
  open import Data.Integer.Base using (ℤ)
  open import Data.List.Base using (List; []; _∷_)
  open import Data.Maybe.Base using (Maybe; nothing; just)
  open import Data.Nat.Base using (ℕ; zero; suc; _+_; _*_; _<_)
  open import Data.Product using (_×_; _,_)
  open import Agda.Builtin.Equality using (_≡_; refl)

-- Example of extrinsic verification
  module Extrinsic where
    sort : List ℕ → List ℕ
    sort = ⋯

    IsSorted : List ℕ → Set
    IsSorted = ⋯

    sort-is-sorted : ∀ xs → IsSorted (sort xs)
    sort-is-sorted = ⋯

-- Example of intrinsic verification
  module Intrinsic where
    SortedList : Set
    SortedList = ⋯

    sort : List ℕ → SortedList
    sort = ⋯
```

## Correct-by-construction programming

Building invariants into the types of our program, to make it impossible to write an incorrect program in the first place. Thus, no proving required!
