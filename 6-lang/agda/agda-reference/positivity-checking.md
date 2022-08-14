# Positivity checking


## NO_POSITIVITY_CHECK pragma

- pragma: `NO_POSITIVITY_CHECK`
- since: Agda 2.5.1

The `NO_POSITIVITY_CHECK` pragma switches off the positivity checker for data and record definitions and mutual blocks. 
The pragma must precede a data/record definition or a mutual block. 
The pragma cannot be used in `--safe` mode.

```hs agda
-- Skipping a single data definition
{-# NO_POSITIVITY_CHECK #-}
data D : Set where
  lam : (D → D) → D

-- Skipping a single record definition:
{-# NO_POSITIVITY_CHECK #-}
record U : Set where
  field ap : U → U


-- Skipping an old-style mutual block. It must be placed
-- within a mutual block before a data/record definition:
mutual
  data D : Set where
    lam : (D → D) → D

  {-# NO_POSITIVITY_CHECK #-}
  record U : Set where
    field ap : U → U


-- Skipping the old-style mutual block.
-- Placed before the `mutual` keyword:
{-# NO_POSITIVITY_CHECK #-}
mutual
  data D : Set where
    lam : (D → D) → D

  record U : Set where
    field ap : U → U


-- Skipping a new-style mutual block.
-- Placed anywhere before the declaration
-- or the definition of a data/record in the block:
record U : Set
data D   : Set

record U where
  field ap : U → U

{-# NO_POSITIVITY_CHECK #-}
data D where
  lam : (D → D) → D
```


## POLARITY pragmas

Polarity pragmas can be attached to postulates. 
The polarities express how the postulate's args are used. 

Available polarities
- `-`   negative
- `+`   positive
- `++`  strictly positive
- `*`   unknown/mixed
- `_`   unused


Polarity pragmas have the form `{-# POLARITY name <zero+ polarities> #-}` 
and can be given wherever fixity declarations can be given.

The listed polarities apply to the given postulate's arguments 
(explicit, implicit, instance), from left to right.

Polarities currently cannot be given for module parameters. 

If the postulate takes `n` arguments (excluding module parameters), 
then the number of polarities given must be between 0 and `n` (inclusive).

Polarity pragmas are not allowed in safe mode.


Polarity pragmas make it possible to use *postulated type formers in recursive types*:

```hs
postulate
  ∥_∥ : Set → Set

{-# POLARITY ∥_∥ ++ #-}

data D : Set where
  c : ∥ D ∥ → D
```


Note that one can use postulates that may seem benign, together with polarity pragmas, to prove that the empty type is inhabited:

```hs
postulate
  _⇒_    : Set → Set → Set
  lambda : {A B : Set} → (A → B) → (A ⇒ B)
  apply  : {A B : Set} → (A ⇒ B) → (A → B)

{-# POLARITY _⇒_ ++ #-}

data ⊥ : Set where

data D : Set where
  c : D ⇒ ⊥ → D

not-inhabited : D → ⊥
not-inhabited (c f) = apply f (c f)

d : D
d = c (lambda not-inhabited)

bad : ⊥
bad = not-inhabited d
```
