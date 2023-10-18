# Extensionality

## Function extensionality

Function extensionality establishes the equality of two functions if both return the same results for the same input.

Function extensionality is not an axiom in Agda but it can be postulated when required:

```agda hs
-- import Relation.Binary.PropositionalEquality as Eq
-- open Eq             using (_≡_; refl; sym; trans; cong; subst; resp)
-- open Eq.≡-Reasoning using (begin_; _≡⟨⟩_; step-≡; _∎)
open import Axiom.Extensionality.Propositional using (Extensionality)

postulate
  fun-ext : ∀ {a b} → Extensionality a b
```

Fully expanded signature of `fun-ext` is:

```agda hs
fun-ext : {𝓁 𝓀 : Level}
          {A : Set 𝓁}
          {B : A → Set 𝓀}
          {f g : (x : A) → B x}
        → ((x : A) → f x ≡ g x)
          ----------------------
        → f ≡ g
```
