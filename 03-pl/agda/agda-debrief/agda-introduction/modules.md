# Modules

https://agda.readthedocs.io/en/latest/language/module-system.html#module-system

Agda programs are structured into modules. Each Agda file has one top-level module whose name must match the name of the file, and zero or more nested modules.

A module contains a list of declarations. This example has a single top-level module called `hello-world-dep`, which has 3 declarations:
- an `open import` statement that imports the datatype ℕ and its constructors zero and suc from the module Data.Nat of the stdlib and brings them into scope
- a data declaration defining the datatype `Vec` with two constructors: the empty vector constructor `[]` and the cons constructor `_∷_`
- an `infixr` declaration specifying the precedence for the cons operation.

```agda hs
module hello-world-dep where

open import Data.Nat using (ℕ; zero; suc)

data Vec (A : Set) : ℕ → Set where
  []  : Vec A zero
  _∷_ : ∀ {n} (x : A) (xs : Vec A n) → Vec A (suc n)

infixr 5 _∷_
```
