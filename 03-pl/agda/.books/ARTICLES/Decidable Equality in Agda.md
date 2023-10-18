---
downloaded:       2022-06-20
page-url:         http://rubrication.blogspot.com/2012/03/decidable-equality-in-agda.html
article-title:    Decidable Equality in Agda
---
# Decidable Equality in Agda
### Decidable Equality in Agda

So I've been playing with typing various things in System-F which previously I had left with auxiliary well-formedness conditions. This includes substitutions and contexts, both of which are interesting to have well typed versions of. Since I've been learning Agda, it seemed sensible to carry out this work in that language, as there is nothing like a problem to help you learn a language.

In the course of proving properties, I ran into the age old problem of showing that equivalence is decidable between two objects. In this particular case, I need to be able to show the decidability of equality over types in System F in order to have formation rules for variable contexts. We'd like a context Γ to have (x:A) only if (x:B) does not occur in Γ when (A ≠ B). For us to have statements about whether two types are equal or not, we're going to need to be able to decide if that's true using a terminating procedure.

And so we arrive at our story. In Coq, equality is something of a nightmare. In Agda, by contrast, often times this nightmare is avoided with clever structuring of the rules for elimination in pattern matching. However, Agda's lack of a system of tactics brings the nightmare home to roost in a different nest. This proof was 1 line in Coq, and amounts to evocation of the tactic *decide equality. decide equality.*.

(Thanks to Saizan for showing me how to do this: [Eq.agda][1])

First of course, we need to set up our modules etc...

```
module SystemFPlus where 

open import Function
open import Data.Fin using (Fin)
open import Data.Nat hiding (_*_) 
open import Data.Bool renaming (_≟_ to _≟_Bool) 
open import Data.List 
open import Data.Unit using (⊤)
open import Relation.Nullary.Core
open import Data.Sum 
open import Data.Product 

open import Relation.Binary hiding (_⇒_)
open import Relation.Binary.PropositionalEquality as PropEq
  using (_≡_; refl)

```

Next we write down an inductive definition for System-F style types.

```
data Ty : Set where
  ① : Ty                
  ι : ℕ → Ty           
  η : ℕ → Ty           
  _⇒_ : Ty → Ty → Ty  
  _⊗_ : Ty → Ty → Ty  
  _⊕_ : Ty → Ty → Ty  
  μ : Ty → Ty          
  Π : Ty → Ty          

```

Next we have to do the business which is relatively usual in Agda, when proving negative goals under a constructor, that is, define explicit inversion principles. It turns out that you don't generally have to do this if you're not under a constructor and inside a λ but I haven't found a way to avoid it when you are, and you almost always are when you're proving false for something decidable.

```
invι : ∀ {n m} → (ι n ≡ ι m) → n ≡ m
invι refl = refl 

invη : ∀ {n m} → (η n ≡ η m) → n ≡ m
invη refl = refl 

invμ : ∀ {α β} → (μ α ≡ μ β) → α ≡ β
invμ refl = refl 

invΠ : ∀ {α β} → (Π α ≡ Π β) → α ≡ β
invΠ refl = refl 

inv⇒L : ∀ {α β δ γ} → (α ⇒ β ≡ δ ⇒ γ) → α ≡ δ
inv⇒L {.α} {β} {α} {.β} refl = refl

inv⇒R : ∀ {α β δ γ} → (α ⇒ β ≡ δ ⇒ γ) → β ≡ γ
inv⇒R {.α} {β} {α} {.β} refl = refl

inv⊕L : ∀ {α β δ γ} → (α ⊕ β ≡ δ ⊕ γ) → α ≡ δ
inv⊕L {.α} {β} {α} {.β} refl = refl

inv⊕R : ∀ {α β δ γ} → (α ⊕ β ≡ δ ⊕ γ) → β ≡ γ
inv⊕R {.α} {β} {α} {.β} refl = refl

inv⊗L : ∀ {α β δ γ} → (α ⊗ β ≡ δ ⊗ γ) → α ≡ δ
inv⊗L {.α} {β} {α} {.β} refl = refl

inv⊗R : ∀ {α β δ γ} → (α ⊗ β ≡ δ ⊗ γ) → β ≡ γ
inv⊗R {.α} {β} {α} {.β} refl = refl

```

Now comes the epic annoyance. This function could have been written by a program. It's absolutely vanilla, and yet I'm forced to write out the full cross-product of possibilities almost all of which lead to the conclusion: (λ ()), which is essentially, "no, and you should know why". Since it knows why, it seems unnecessarily arduous for me to have to write out every case!

```
_≟_ty : Decidable {A = Ty} _≡_
①       ≟ ① ty      = yes refl
①       ≟ (ι m) ty   = no (λ ())
①       ≟ (η m) ty   = no (λ ())
①       ≟ (δ ⇒ γ) ty = no (λ ())  
①       ≟ (δ ⊕ γ) ty = no (λ ()) 
①       ≟ (δ ⊗ γ) ty = no (λ ()) 
①       ≟ (μ β) ty   = no (λ ()) 
①       ≟ (Π β) ty   = no (λ ()) 
(ι n)   ≟ ① ty       = no (λ ())
(ι n)   ≟ (ι m) ty   with n ≟ m 
(ι .n)  ≟ (ι n) ty   | yes refl = yes refl
(ι n)   ≟ (ι m) ty   | no p  = no (p ∘ invι)
(ι n)   ≟ (η m) ty   = no (λ ())
(ι n)   ≟ (δ ⇒ γ) ty = no (λ ())  
(ι n)   ≟ (δ ⊕ γ) ty = no (λ ()) 
(ι n)   ≟ (δ ⊗ γ) ty = no (λ ()) 
(ι n)   ≟ (μ β) ty   = no (λ ()) 
(ι n)   ≟ (Π β) ty   = no (λ ()) 
(η n)   ≟ ① ty       = no (λ ())
(η n)   ≟ (ι m) ty   = no (λ ())
(η n)   ≟ (η m) ty   with n ≟ m 
(η .n)  ≟ (η n) ty   | yes refl = yes refl
(η n)   ≟ (η m) ty   | no p  = no (p ∘ invη)
(η n)   ≟ (δ ⇒ γ) ty = no (λ ())  
(η n)   ≟ (δ ⊕ γ) ty = no (λ ()) 
(η n)   ≟ (δ ⊗ γ) ty = no (λ ()) 
(η n)   ≟ (μ β) ty   = no (λ ()) 
(η n)   ≟ (Π β) ty   = no (λ ()) 
(μ α)   ≟ ① ty       = no (λ ())
(μ α)   ≟ (ι m) ty   = no (λ ())
(μ α)   ≟ (η m) ty   = no (λ ())
(μ α)   ≟ (δ ⇒ γ) ty = no (λ ())  
(μ α)   ≟ (δ ⊕ γ) ty = no (λ ()) 
(μ α)   ≟ (δ ⊗ γ) ty = no (λ ()) 
(μ α)   ≟ (μ β) ty   with α ≟ β ty 
(μ .β)  ≟ (μ β) ty   | yes refl = yes refl 
(μ α)   ≟ (μ β) ty   | no p  = no (p ∘ invμ)
(μ α)   ≟ (Π β) ty   = no (λ ())
(Π α)   ≟ ① ty       = no (λ ())
(Π α)   ≟ (ι m) ty   = no (λ ()) 
(Π α)   ≟ (η m) ty   = no (λ ())
(Π α)   ≟ (δ ⇒ γ) ty = no (λ ())
(Π α)   ≟ (δ ⊕ γ) ty = no (λ ())
(Π α)   ≟ (δ ⊗ γ) ty = no (λ ()) 
(Π α)   ≟ (Π β) ty   with α ≟ β ty 
(Π .α)  ≟ (Π α) ty   | yes refl = yes refl 
(Π α)   ≟ (Π β) ty   | no p  = no (p ∘ invΠ)
(Π α)   ≟ (μ β) ty   = no (λ ()) 
(α ⇒ β) ≟ ① ty      = no (λ ())
(α ⇒ β) ≟ (ι m) ty   = no (λ ())
(α ⇒ β) ≟ (η m) ty   = no (λ ())
(α ⇒ β) ≟ (δ ⇒ γ) ty   with α ≟ δ ty  
(.α ⇒ β) ≟ (α ⇒ γ) ty  | yes refl with β ≟ γ ty 
(.α ⇒ .β) ≟ (α ⇒ β) ty | yes refl | yes refl = yes refl
(.α ⇒ δ) ≟ (α ⇒ γ) ty  | yes refl | no p = no (p ∘ inv⇒R)
(α ⇒ β) ≟ (δ ⇒ γ) ty   | no p = no (p ∘ inv⇒L)
(α ⇒ β) ≟ (δ ⊕ γ) ty = no (λ ()) 
(α ⇒ β) ≟ (δ ⊗ γ) ty = no (λ ()) 
(α ⇒ β) ≟ (μ δ) ty   = no (λ ()) 
(α ⇒ β) ≟ (Π δ) ty   = no (λ ()) 
(α ⊕ β) ≟ ① ty      = no (λ ())
(α ⊕ β) ≟ (ι m) ty   = no (λ ())
(α ⊕ β) ≟ (η m) ty   = no (λ ())
(α ⊕ β) ≟ (δ ⊕ γ) ty   with α ≟ δ ty  
(.α ⊕ β) ≟ (α ⊕ γ) ty  | yes refl with β ≟ γ ty 
(.α ⊕ .β) ≟ (α ⊕ β) ty | yes refl | yes refl = yes refl
(.α ⊕ δ) ≟ (α ⊕ γ) ty  | yes refl | no p = no (p ∘ inv⊕R)
(α ⊕ β) ≟ (δ ⊕ γ) ty   | no p = no (p ∘ inv⊕L)
(α ⊕ β) ≟ (δ ⇒ γ) ty = no (λ ()) 
(α ⊕ β) ≟ (δ ⊗ γ) ty = no (λ ()) 
(α ⊕ β) ≟ (μ δ) ty   = no (λ ()) 
(α ⊕ β) ≟ (Π δ) ty   = no (λ ()) 
(α ⊗ β) ≟ ① ty      = no (λ ())
(α ⊗ β) ≟ (ι m) ty   = no (λ ())
(α ⊗ β) ≟ (η m) ty   = no (λ ())
(α ⊗ β) ≟ (δ ⊗ γ) ty   with α ≟ δ ty  
(.α ⊗ β) ≟ (α ⊗ γ) ty  | yes refl with β ≟ γ ty 
(.α ⊗ .β) ≟ (α ⊗ β) ty | yes refl | yes refl = yes refl
(.α ⊗ δ) ≟ (α ⊗ γ) ty  | yes refl | no p = no (p ∘ inv⊗R)
(α ⊗ β) ≟ (δ ⊗ γ) ty   | no p = no (p ∘ inv⊗L)
(α ⊗ β) ≟ (δ ⇒ γ) ty = no (λ ()) 
(α ⊗ β) ≟ (δ ⊕ γ) ty = no (λ ()) 
(α ⊗ β) ≟ (μ δ) ty   = no (λ ()) 
(α ⊗ β) ≟ (Π δ) ty   = no (λ ()) 

```

Well there has to be a better way right? So I thought I'd try to cook one up. It turns out that you can solve a decidable equality problem by injection into a domain with a decidable equality. So I went about thinking about what kind of decidable equality might have a domain with a similar enough shape that we could do the incoding without to much difficulty. I came up with the following program. It hardly saves any time at all unfortunately, but it does make me wonder if there isn't a more efficient way of doing it, perhaps using vectors, modules with decidable equalities for the carried data and with a single data constructor. Perhaps containers are the solution? I'm not sure. Anyhow, if you have a big inductive data type (such as a rich programming term language) this approach might save you trouble.

The trick is essentially to create an isomorphism with something like a Gödel coding. Since numbers are a hassle, and we need to have an isomorphism, it's more natural to do it into a space of trees where the trees have the same basic shape. We encode each operator as a number up to a finite size, whose limited nature is dictated by Fin n. This ensures that we don't have to worry about what to do with numbers bigger than the number of operators we have. The rest should be fairly self explanatory. Hopefully this gives someone ideas of a better way...

```
module TyDec where 

open import Function using (_∘_)
open import Data.Nat hiding (_*_) 
open import Data.Fin renaming (zero to fzero ; suc to fsuc)
open import Data.Fin.Props renaming (_≟_ to _≟_fin)
open import Data.Product using (Σ; _,_; proj₁; proj₂)
open import Relation.Nullary.Core
open import Relation.Binary hiding (_⇒_)
open import Relation.Binary.PropositionalEquality as PropEq
     using (_≡_; refl; trans; sym; cong)


data Ty : Set where
  ① : Ty
  ι : ℕ → Ty
  η : ℕ → Ty
  μ : Ty → Ty
  Π : Ty → Ty
  _⇒_ : Ty → Ty → Ty
  _⊗_ : Ty → Ty → Ty 
  _⊕_ : Ty → Ty → Ty

data Tree : Set where 
  Nullary : Tree
  NullaryNat : Fin 2 → ℕ → Tree
  Unary : Fin 2 → Tree → Tree
  Binary : Fin 3 → Tree → Tree → Tree

invNullaryNat1 : ∀ {op1 op2 n1 n2} → NullaryNat op1 n1 ≡ NullaryNat op2 n2 → op1 ≡ op2
invNullaryNat1 refl = refl

invNullaryNat2 : ∀ {op1 op2 n1 n2} → NullaryNat op1 n1 ≡ NullaryNat op2 n2 → n1 ≡ n2
invNullaryNat2 refl = refl

invUnary1 : ∀ {op1 op2 t1 t2} → Unary op1 t1 ≡ Unary op2 t2 → op1 ≡ op2
invUnary1 refl = refl

invUnary2 : ∀ {op1 op2 t1 t2} → Unary op1 t1 ≡ Unary op2 t2 → t1 ≡ t2
invUnary2 refl = refl

invBinary1 : ∀ {op1 op2 l1 l2 r1 r2} → Binary op1 l1 r1 ≡ Binary op2 l2 r2 → op1 ≡ op2
invBinary1 refl = refl

invBinary2 : ∀ {op1 op2 l1 l2 r1 r2} → Binary op1 l1 r1 ≡ Binary op2 l2 r2 → l1 ≡ l2
invBinary2 refl = refl

invBinary3 : ∀ {op1 op2 l1 l2 r1 r2} → Binary op1 l1 r1 ≡ Binary op2 l2 r2 → r1 ≡ r2
invBinary3 refl = refl

_≟_tree : Decidable {A = Tree} _≡_
Nullary               ≟ Nullary               tree = yes refl  
Nullary               ≟ (NullaryNat op n)     tree = no (λ())
Nullary               ≟ (Unary op t)          tree = no (λ())
Nullary               ≟ (Binary op l r)       tree = no (λ())
(NullaryNat op n)     ≟ Nullary               tree = no (λ ())
(NullaryNat op1 n1)   ≟ (NullaryNat op2 n2)   tree with op1 ≟ op2 fin
(NullaryNat .op1 n1)  ≟ (NullaryNat op1 n2)   tree | yes refl with n1 ≟ n2
(NullaryNat .op1 .n1) ≟ (NullaryNat op1 n1)   tree | yes refl | yes refl = yes refl
(NullaryNat .op1 n1)  ≟ (NullaryNat op1 n2)   tree | yes refl | no p = no (p ∘ invNullaryNat2)
(NullaryNat op1 n1)   ≟ (NullaryNat op2 n2)   tree | no p  = no (p ∘ invNullaryNat1) 
(NullaryNat op1 n1)   ≟ (Unary op t)          tree = no (λ())
(NullaryNat op1 n1)   ≟ (Binary op l r)       tree = no (λ())
(Unary op1 t1)        ≟ Nullary               tree = no (λ())
(Unary op1 t1)        ≟ (NullaryNat op n)     tree = no (λ())
(Unary op1 t1)        ≟ (Unary op2 t2)        tree with op1 ≟ op2 fin
(Unary .op1 t1)       ≟ (Unary op1 t2)        tree | yes refl with t1 ≟ t2 tree
(Unary .op1 .t1)      ≟ (Unary op1 t1)        tree | yes refl | yes refl = yes refl
(Unary .op1 t1)       ≟ (Unary op1 t2)        tree | yes refl | no p = no (p ∘ invUnary2) 
(Unary op1 t1)        ≟ (Unary op2 t2)        tree | no p = no (p ∘ invUnary1) 
(Unary op1 t1)        ≟ (Binary op2 l r)      tree = no (λ())
(Binary op l r)       ≟ Nullary               tree = no (λ())
(Binary op1 l r)      ≟ (NullaryNat op2 n)    tree = no (λ())
(Binary op1 l r)      ≟ (Unary op2 t)         tree = no (λ())
(Binary op1 l1 r1)    ≟ (Binary op2 l2 r2)    tree with op1 ≟ op2 fin
(Binary .op1 l1 r1)   ≟ (Binary op1 l2 r2)    tree | yes refl with l1 ≟ l2 tree
(Binary .op1 .l1 r1)  ≟ (Binary op1 l1 r2)    tree | yes refl | yes refl with r1 ≟ r2 tree
(Binary .op1 .l1 .r1) ≟ (Binary op1 l1 r1)    tree | yes refl | yes refl | yes refl = yes refl
(Binary .op1 .l1 r1)  ≟ (Binary op1 l1 r2)    tree | yes refl | yes refl | no p = no (p ∘ invBinary3)
(Binary .op1 l1 r1)   ≟ (Binary op1 l2 r2)    tree | yes refl | no p = no (p ∘ invBinary2)
(Binary op1 l1 r1)    ≟ (Binary op2 l2 r2)    tree | no p = no (p ∘ invBinary1)

 

jni : Tree → Ty 
jni Nullary                              = ① 
jni (NullaryNat fzero n)                 = ι n
jni (NullaryNat (fsuc fzero) n)          = η n
jni (NullaryNat (fsuc (fsuc ())) n)   
jni (Unary fzero t)                      = μ (jni t)
jni (Unary (fsuc fzero) t)               = Π (jni t)
jni (Unary (fsuc (fsuc ())) t)
jni (Binary fzero l r)                   = (jni l) ⇒ (jni r)
jni (Binary (fsuc fzero) l r)            = (jni l) ⊗ (jni r)
jni (Binary (fsuc (fsuc fzero)) l r)     = (jni l) ⊕ (jni r)
jni (Binary (fsuc (fsuc (fsuc ()))) l r) 

injEx : (x : Ty) -> Σ Tree \ t -> jni t ≡ x
injEx ①                         = Nullary , refl 
injEx (ι n)                     = NullaryNat fzero n , refl
injEx (η n)                     = NullaryNat (fsuc fzero) n , refl
injEx (μ t)                     with injEx t
injEx (μ .(jni tree))           | tree , refl = (Unary fzero tree) , refl
injEx (Π t)                     with injEx t
injEx (Π .(jni tree))           | tree , refl = (Unary (fsuc fzero) tree) , refl
injEx (t ⇒ s)                   with injEx t
injEx (.(jni tr1) ⇒ s)          | tr1 , refl with injEx s
injEx (.(jni tr1) ⇒ .(jni tr2)) | tr1 , refl | tr2 , refl = (Binary fzero tr1 tr2) , refl 
injEx (t ⊗ s)                   with injEx t
injEx (.(jni tr1) ⊗ s)          | tr1 , refl with injEx s
injEx (.(jni tr1) ⊗ .(jni tr2)) | tr1 , refl | tr2 , refl = (Binary (fsuc fzero) tr1 tr2) , refl 
injEx (t ⊕ s)                   with injEx t
injEx (.(jni tr1) ⊕ s)          | tr1 , refl with injEx s
injEx (.(jni tr1) ⊕ .(jni tr2)) | tr1 , refl | tr2 , refl = (Binary (fsuc (fsuc fzero)) tr1 tr2) , refl 

inj : Ty → Tree
inj = proj₁ ∘ injEx 

injeq : ∀ {x y} -> inj x ≡ inj y -> x ≡ y
injeq {x} {y} p = trans (sym (proj₂ (injEx _))) (trans (cong jni p) (proj₂ (injEx _)))

_≟_ty : (x y : Ty) -> Dec (x ≡ y)
x ≟ y ty with (inj x) ≟ (inj y) tree
x ≟ y ty | yes p = yes (injeq p)
x ≟ y ty | no p = no (p ∘ (cong inj))

```

[1]: http://code.haskell.org/~Saizan/Eq.agda
