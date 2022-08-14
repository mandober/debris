# Data.Nat.Induction

Modules
  Acc
Names
  <-Rec  : {ℓ : Agda.Primitive.Level} → (ℕ → Set ℓ) → ℕ → Set ℓ
  <-rec  : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y Data.Nat.Base.≤ x → P y) → P x) →
           (x : ℕ) → P x
  <-rec-builder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y Data.Nat.Base.≤ x → P y) → P x) →
           (x y : ℕ) → suc y Data.Nat.Base.≤ x → P y
  <-recBuilder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y Data.Nat.Base.≤ x → P y) → P x) →
           (x y : ℕ) → suc y Data.Nat.Base.≤ x → P y
  <-well-founded
         : (x : ℕ) → Acc (λ m n → suc m Data.Nat.Base.≤ n) x
  <-wellFounded
         : (x : ℕ) → Acc (λ m n → suc m Data.Nat.Base.≤ n) x
  <-wellFounded-fast
         : (x : ℕ) → Acc (λ m n → suc m Data.Nat.Base.≤ n) x
  <′-Rec : {ℓ : Agda.Primitive.Level} → (ℕ → Set ℓ) → ℕ → Set ℓ
  <′-rec : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y ≤′ x → P y) → P x) → (x : ℕ) → P x
  <′-rec-builder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y ≤′ x → P y) → P x) →
           (x y : ℕ) → suc y ≤′ x → P y
  <′-recBuilder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → ((y : ℕ) → suc y ≤′ x → P y) → P x) →
           (x y : ℕ) → suc y ≤′ x → P y
  <′-well-founded
         : (x : ℕ) → Acc (λ m n → suc m ≤′ n) x
  <′-well-founded′
         : (n y : ℕ) → suc y ≤′ n → Acc (λ m n₁ → suc m ≤′ n₁) y
  <′-wellFounded
         : (x : ℕ) → Acc (λ m n → suc m ≤′ n) x
  <′-wellFounded′
         : (n y : ℕ) → suc y ≤′ n → Acc (λ m n₁ → suc m ≤′ n₁) y
  Acc    : {a ℓ : Agda.Primitive.Level} {A : Set a} →
           (A → A → Set ℓ) → A → Set (a Agda.Primitive.⊔ ℓ)
  CRec   : (ℓ : Agda.Primitive.Level) → (ℕ → Set ℓ) → ℕ → Set ℓ
  Rec    : (ℓ : Agda.Primitive.Level) → (ℕ → Set ℓ) → ℕ → Set ℓ
  acc    : {a ℓ : Agda.Primitive.Level} {A : Set a}
           {_<_ = _<₁_ : A → A → Set ℓ} {x : A} →
           ((y : A) → y <₁ x → Acc _<₁_ y) → Acc _<₁_ x
  cRec   : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → CRec ℓ P x → P x) → (x : ℕ) → P x
  cRec-builder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → CRec ℓ P x → P x) → (x : ℕ) → CRec ℓ P x
  cRecBuilder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → CRec ℓ P x → P x) → (x : ℕ) → CRec ℓ P x
  rec    : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → Rec ℓ P x → P x) → (x : ℕ) → P x
  rec-builder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → Rec ℓ P x → P x) → (x : ℕ) → Rec ℓ P x
  recBuilder
         : {ℓ : Agda.Primitive.Level} (P : ℕ → Set ℓ) →
           ((x : ℕ) → Rec ℓ P x → P x) → (x : ℕ) → Rec ℓ P x
