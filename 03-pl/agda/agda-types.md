# Type signatures in Agda - Sample types

```hs agda
cong : ∀ {A B : Set}
         (f : A → B)
         {x y : A}
       → x ≡ y
       → f x ≡ f y

cong₂ : ∀ {A B C : Set}
          (f : A → B → C)
          {u x : A}
          {v y : B}
        → u ≡ x
        → v ≡ y
        → f u v ≡ f x y

-- non-dependent composition
_∘_ : ∀ {A B C : Set} → (B → C) → (A → B) → (A → C)
g ∘ f = λ x → g (f x)

-- non-dependent, universe-polymorphic composition
_∘_ : ∀ {ℓ₁ ℓ₂ ℓ₃ : Level}
        {A : Set ℓ₁}
        {B : Set ℓ₂}
        {C : Set ℓ₃}
      → (B → C)
      → (A → B)
      → A → C
(g ∘ f) x = g (f x)

-- postulating extensionality of non-dependent functions
ext : ∀ {A B : Set} {f g : A → B}
    → (∀ (x : A) → f x ≡ g x) → f ≡ g

-- postulating extensionality of dependent functions
∀-ext : ∀ {A : Set} {B : A → Set} {f g : ∀(x : A) → B x}
      → (∀ (x : A) → f x ≡ g x) → f ≡ g



konst : {A: Set} -> {B: Set} -> (x: A) -> B x
```
