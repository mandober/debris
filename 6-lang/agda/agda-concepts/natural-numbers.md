# Agda ∷ Notes ∷ Naturals

## Definition

The set of the natural numbers, ℕ, is defined by replying on the Peano axioms, particularly by transcribing the first two axioms of the modern treatment.

1. Naturals as Peano axioms:
  - AxZ : 0 ∈ ℕ
  - AxS : ∀n(n ∈ ℕ -> S n ∈ ℕ)

2. Naturals as inference rules:

```hs
            n : ℕ
----- (z) --------- (s)
0 : ℕ      S n : ℕ
```

3. Naturals as Agda's inductive data type:

```hs agda
data ℕ : Set where
  Z : ℕ
  S : (n : ℕ) → ℕ
```

## Artifacts

- Relations on ℕ
  - Boolean relations on ℕ
    - Boolean equality relation, `==`, `≡ᵇ`
    - Boolean ordering relation, `<` , `<ᵇ`
    - Boolean LE relation, `≤`
    - Standard ordering relations
      - `≤  , <  , ≥  , >    ≰ , ≮_, ≱ , ≯`
      - _≤_  _<_  _≥_  _>_
      - _≰_  _≮_  _≱_  _≯_
      - _≱ _ NEITHER LESS-THAN NOR EQUAL TO 0x2270
      - `ᴀ ﹤ ʙ`


## Things involving naturals

* Modules
  - Agda.Builtin.Nat
  - Data.Nat
    - Data.Nat.Base
    - Data.Nat.Induction


- ℕ, Nat; zero, 0; suc, succ, S
- ==, ≡ᵇ
- <, <ᵇ 
- ≤
- ≥
