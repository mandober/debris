# Natural numbers type

https://www.youtube.com/watch?v=GW0jV0l5NB4&list=PLtIZ5qxwSNnzpNqfXzJjlHI9yCAzRzKtx&index=10

For the type of natural numbers, `ℕ`, we have the usual 4 kinds of rules.

The formation rule has no assumptions and just states that `ℕ` is a type, which can also be expressed (in a type theory with universe of types) as `ℕ : 𝒰`.

```hs
-- ℕ-formations

------- ℕf       (OR)        ------- ℕf
ℕ : 𝒰                        ℕ type


-- ℕ-introductions

------- ℕ-intro-Z
0 : ℕ

Γ ⊢ n : ℕ
------------ ℕ-intro-S
Γ ⊢ S n : ℕ


-- ℕ-elimination (induction principle):

Γ, x : ℕ          ⊢ P x        : Type
Γ                 ⊢ c          : P 0
Γ, x : ℕ, y : P x ⊢ d x y      : P (suc x)
--------------------------------------------- ℕ-elim
Γ, x : ℕ          ⊢ ind c d x : P x

-- Conclusion of ℕ-elim indeed is a pi-type, Π (n : ℕ) D(n)
-- obtained by abstracting over n : ℕ in the premise
-- (while ignoring the ind(a,b,x) term?!)


-- ℕ-computation
Γ, x : ℕ          ⊢ P x  type
Γ                 ⊢ c : P 0
Γ, x : ℕ, y : P x ⊢ d : P (suc x)
------------------------------------------------------------------ ℕ-β
Γ  ⊢ ind c d      0  = c               : P 0
Γ  ⊢ ind c d (suc x) = d[y:=ind c d x] : P (suc x)
```


## In Agda

```agda hs
-- ℕ-formation, ℕ-intro
data ℕ : Set where
  zero : ℕ
  suc  : ℕ → ℕ

-- ℕ-induction
-- ℕ-elim : {n : ℕ} {P n : Set}
ℕ-elim : {P : ℕ → Set}
       → P 0
       → ((n : ℕ) → P n → P (suc n))
       -----------------------------
       → (n : ℕ) → P n
ℕ-elim x _      0  = x
ℕ-elim x f (suc n) = f n (ℕ-elim x f n)
```


Consider the case of the type of natural numbers. Its elimination rule can be seen as the propositions-as-types translation of the familiar induction principle:

```agda hs
n : ℕ ⊢ P n : Type                            -- P : ℕ → Set
c : P 0                                       -- P 0
x : ℕ, y : P x ⊢ d x y : P (suc x)            -- ((n : ℕ) → P n → P (suc n))
------------------------------------ ℕ-elim
x : ℕ ⊢ elim c d x : P x                      -- (n : ℕ) → P n
```

Here, `P` is considered as a predicate on the type `ℕ`, `c` as a proof that `P` holds for 0, and `d` as a program that transforms a proof `y`, that `P` holds for `x : N`, into a proof `d(x, y)` that `P` holds for the successor `suc(x)`.

As is well known, the special case of the ℕ-elim rule obtained by considering the dependent type in its premise to be constant provides a counterpart of the familiar principle of definition of a function by recursion:

```agda hs
A : Type
c : A
y : A ⊢ d y : A
---------------------- ℕ-rec
x : N ⊢ rec c d x : A
```

This rule is closely related to Lawvere's notion of a natural number object in a category [Lawvere 1964]. Indeed, it allows us to define a function f : N → A such that each face in the following diagram commutes:

```
      ↗ ℕ ───────────→ ℕ
   0⟋   │     suc      │
1 ⟋     │f             │f
  ⟍     │              │
   c⟍   ↓      d       ↓
      ↘ A ───────────→ A
```

Within type theory, the commutativity of the diagram is expressed by judgmental equalities

`f 0 = c : A, x : ℕ ⊢ f (suc x) = d (f x) : A`

which can be proved as a special case of the computation rules for ℕ.





## Refs

https://www.youtube.com/watch?v=ZMF_2Hr16M0&list=PL-47DDuiZOMCRDiXDZ1fI0TFLQgQqOdDa

https://www.youtube.com/watch?v=VWmXF-P4-Z8&list=PL1-2D_rCQBarjdqnM21sOsx09CtFSVO6Z&index=13

http://www.cs.cmu.edu/~rwh/courses/hott/
