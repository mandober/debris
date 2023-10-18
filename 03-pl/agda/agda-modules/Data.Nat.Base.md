# Data.Nat.Base

- ¹ Agda: Modules: normalized
- ² Agda: Modules: instantiated
- ³ Agda: Modules: simplified


- Modules
  - _≤_
  - _≤′_
  - _≤″_
  - _≤‴_
  - Ordering
  - ℕ
- Names
  - _*_       : ℕ → ℕ → ℕ
  - _+_       : ℕ → ℕ → ℕ

  - _+⋎_      : ℕ → ℕ → ℕ

  - ¹ _<_     : ℕ → ℕ → Set
  - ² _<_     : Relation.Binary.Core.Rel ℕ Level.0ℓ

  - _<ᵇ_      : ℕ → ℕ → Agda.Builtin.Bool.Bool
  - _<′_      : ℕ → ℕ → Set
  - _<″_      : ℕ → ℕ → Set
  - _<‴_      : ℕ → ℕ → Set

  - _>_       : ℕ → ℕ → Set
  - _>′_      : ℕ → ℕ → Set
  - _>″_      : ℕ → ℕ → Set
  - _>‴_      : ℕ → ℕ → Set

  - _^_       : ℕ → ℕ → ℕ
  - _∸_       : ℕ → ℕ → ℕ

  - _≡ᵇ_      : ℕ → ℕ → Agda.Builtin.Bool.Bool

  - _≤_       : ℕ → ℕ → Set
  - _≤ᵇ_      : ℕ → ℕ → Agda.Builtin.Bool.Bool
  - _≤′_      : ℕ → ℕ → Set
  - _≤″_      : (m n : ℕ) → Set
  - _≤‴_      : ℕ → ℕ → Set

  - _≥_       : ℕ → ℕ → Set
  - _≥′_      : ℕ → ℕ → Set
  - _≥″_      : ℕ → ℕ → Set
  - _≥‴_      : ℕ → ℕ → Set

  - _≮_       : ℕ → ℕ → Set
  - _≯_       : ℕ → ℕ → Set
  - _≰_       : ℕ → ℕ → Set
  - _≱_       : ℕ → ℕ → Set

  - _⊓_       : ℕ → ℕ → ℕ
  - _⊔_       : ℕ → ℕ → ℕ

  - >-nonZero : {n : ℕ} → 1 ≤ n → NonZero n

  - NonZero   : ℕ → Set
  - Ordering  : ℕ → ℕ → Set

  - compare   : (m n : ℕ) → Ordering m n
  - equal     : (m : ℕ) → Ordering m m
  - greater   : (m k : ℕ) → Ordering (suc (m + k)) m
  - less      : (m k : ℕ) → Ordering m (suc (m + k))
  - less-than-or-equal : {m n k : ℕ} (proof : (m + k) Agda.Builtin.Equality.≡ n) → m ≤″ n

  - ℕ         : Set
  - zero      : ℕ
  - suc       : ℕ → ℕ

  - pred      : ℕ → ℕ

  - z≤n       : {n : ℕ} → 0 ≤ n
  - s≤s       : {m n : ℕ} → m ≤ n → suc m ≤ suc n

  - ∣_-_∣     : ℕ → ℕ → ℕ

  - ≢-nonZero : {n : ℕ} → (n Agda.Builtin.Equality.≡ 0 → Data.Empty.⊥) → NonZero n

  - ≤′-refl   : {m : ℕ} → m ≤′ m
  - ≤′-step   : {m n : ℕ} → m ≤′ n → m ≤′ suc n

  - ≤‴-refl   : {m : ℕ} → m ≤‴ m
  - ≤‴-step   : {m n : ℕ} → suc m ≤‴ n → m ≤‴ n

  - ⌈_/2⌉     : ℕ → ℕ
  - ⌊_/2⌋     : ℕ → ℕ
