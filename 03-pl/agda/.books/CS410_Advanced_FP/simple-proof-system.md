# Derivability as an inductively defined relation
https://www.youtube.com/watch?v=CoRbskVXacM&list=PLtMyCt65_Zw4--hs_4Lbqbyqf1TDFDAHO&index=37

We define a simple proof system based on implication.

```hs agda
-- Vars
data Var : Set where
  var : String → Var

-- Formulas
data Wff : Set where
  Atom : Var → Wff
  _⇒_  : Wff → Wff → Wff

-- Context
data Context : Set where
  ε   : Context
  _∙_ : Context → Wff → Context

-- Sequents
data _⊢_ : Context → Wff → Set where
  hyp  : ∀ {Γ A}    →  Γ ∙ A ⊢ A
  weak : ∀ {Γ A B}  →  Γ     ⊢ A      →  Γ ∙ B ⊢ A
  abs  : ∀ {Γ A B}  →  Γ ∙ A ⊢ B      →  Γ ⊢ A ⇒ B
  app  : ∀ {Γ A B}  →  Γ     ⊢ A ⇒ B  →  Γ ⊢ A       → Γ ⊢ B
```


* Axioms

```
                        Γ ⊢ A
  ---------- HYP        --------- WEAK
  Γ, A ⊢ A              Γ, B ⊢ A

  Γ, A ⊢ B              Γ, A ⊢ B    Γ ⊢ A
  ---------- ABS        ------------------ APP
  Γ ⊢ A ⇒ B                   Γ ⊢ B
```

* Components of the proof system

```ebnf
atom := p | q | r | …

wff  := atom
      | wff ⇒ wff

ctx  := ε
      | ctx ∙ wff

seq  := ctx ⊢ wff
```


- *Wff*
  - `Atom : String → Wff`
    - `Atom "p"`, `Atom "q"`
  - implication, `⇒`
    - `p ⇒ q ⇒ p`
    - `Atom "p" ⇒ Atom "p"`
- *Context*, `Γ`
  - empty context, ε
  - context extended with a new wff, Γ ∙ A
- Proof rules, `⊢`
  - *Hypothesis*
    introduces a new assumption,
    and for every wff it holds that
    Γ ∙ A ⊢ A
  - *Weakening*
    allows us to extend Γ with a fresh wff.
    If we can derive A from Γ
    Γ ⊢ A
    we can still do it if Γ is wekened with a new wff
      Γ ∙ B ⊢ A
  - *Abstraction*
    allows us to form an implication. If we have
      Γ ∙ A ⊢ B
    then we can form an implication
      Γ ⊢ A ⇒ B
  - *Application*
    is modus ponens: if we have
      Γ ∙ A ⊢ B
    and we have
      Γ ⊢ A
    then we can derive
      Γ ⊢ B
