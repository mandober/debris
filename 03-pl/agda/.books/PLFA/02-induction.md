# Induction: Proof by Induction

https://plfa.github.io/Induction/

Properties of inductive datatypes are proved by induction.

## Imports

We require equality plus the naturals and some operations on them. Also a couple of new operations, `cong`, `sym`, `_≡⟨_⟩_`. Importing `step-≡` implies the import of `_≡⟨_⟩_`.

```agda hs
import Relation.Binary.PropositionalEquality as Eq
open Eq using (_≡_; refl; cong; sym)
open Eq.≡-Reasoning using (begin_; _≡⟨⟩_; step-≡; _∎)
open import Data.Nat using (ℕ; 0; suc; _+_; _*_; _∸_;_^_)
```

## Properties of operators

*Identity*: `+` has left identity `0` if `0 + n ≡ n`, and right identity `0` if `n + 0 ≡ n`, for all `n`. A value that is both a left and right identity is just called an identity or unit.

*Associativity*: `+` is associative if the location of parentheses does not matter: `(m + n) + p ≡ m + (n + p`), for all m, n, and p.

*Commutativity*: `+` is commutative, `m + n ≡ n + m`, for all m and n, if order of arguments does not matter: 

*Distributivity*: `*` distributes over operator `+` 
from the left if `m * (p + q) ≡ (m * p) + (m * q)`, for all m, p, and q, and 
from the right if `(m + n) * p ≡ (m * p) + (n * p)`, for all m, n, and p.

Addition has identity 0 and multiplication has identity 1; addition and multiplication are both associative and commutative; and multiplication distributes over addition.

## Proof by induction

Recall the definition of natural numbers consists of a base case which tells us that 0 is a natural, and an inductive case which tells us that if `m` is a natural then `suc m` is also a natural.

Proof by induction follows the structure of this definition. To prove a property, `P`, for natural numbers by induction, we need to prove two cases.

First is the base case, where we show the property `P` holds for 0.

Second is the inductive case, where we assume the property holds for an arbitrary natural `m` (we call this the inductive hypothesis), `P m`, and then show that the property must also hold for `suc m`, i.e. `P (suc m)`. Expressed as inference rules:

```
----
P 0

P m
---------
P (S m)
```

The first rule is the base case, and requires we show that property `P` holds for 0. The second rule is the inductive case, and requires we show that if we assume the inductive hypothesis - namely that `P` holds for `m` - then it follows that `P` also holds for `suc m`.

## Creation story

We can again explain how this works by a creation story.

In the beginning, 0 properties are known.

Now, we apply the two rules to all the properties we know about. The base case tells us that `P 0` holds, so we add it to the set of known properties. The inductive case tells us that if `P m` holds (on the day before today) then `P (suc m)` also holds (today). We didn't know about any properties before today, so the inductive case doesn't apply.

On the 1st day, 1 property is known:

```hs
P 0
```

On the next day, we know about all the properties from the day before, plus any properties added by the rules. The base case tells us that `P 0` holds, but we already knew that. But now the inductive case tells us that since `P 0` held yesterday, then `P (suc 0)` holds today.

On the 2nd day, 2 properties are known:

```hs
P 0
P (suc 0)
```

And we repeat the process again. Now the inductive case tells us that since P 0 and P (suc 0) both hold, then P (suc 0) and P (suc (suc 0)) also hold. We already knew about the first of these, but the second is new:

On the 3rd day, 3 properties are known:

```hs
P 0
P (suc 0)
P (suc (suc 0))
```

On the 4th day, 4 properties are known:

```hs
P 0
P (suc 0)
P (suc (suc 0))
P (suc (suc (suc 0)))
```

The process continues. On the `n`th day there will be `n` distinct properties that hold. The property of every natural number will appear on some given day. In particular, the property `P n` first appears on day `n+1`.

## Proof of associativity

To prove associativity, we take `P m` to be the property:

(m + n) + p ≡ m + (n + p)

Here `n` and `p` are arbitrary natural numbers, so if we can show the equation holds for all `m` it will also hold for all `n` and `p`. The appropriate instances of the inference rules are:

```hs
------------------------------ ass-0
(0 + n) + p ≡ 0 + (n + p)


(m + n) + p ≡ m + (n + p)
------------------------------ ass-S
(S m + n) + p ≡ S m + (n + p)
```

If we can demonstrate both of these, then associativity of addition follows by induction.

## Proving associativity

```hs
proposition:
  -- the statement we need to prove
  ∀ (m n p : ℕ) → (m + n) + p ≡ m + (n + p)

base case:

  (m + n) + p ≡ m + (n + p)
  -- for m = 0 becomes the base case:
  (0 + n) + p ≡ 0 + (n + p)
  -- which due to PLUS-0 simplifies to
  n + p ≡ n + p
  -- which holds trivially coz any formula is equal to itself, α ≡ α
  -- i.e. whenever we have α ≡ α we can get 'refl' out for free.
  -- and the proof term of the equality is 'refl'
  refl



inductive case:

  -- | The initial expression to prove
  (m + n) + p ≡ m + (n + p)
  -- | for m = S m, is the inductive case
  GOAL: (S m + n) + p ≡ S m + (n + p)
  -- | we now need to prove. And to prove it we need to somehow
  -- transform this equation so that both sides are the same,
  -- and then the proof will follow by reflexivity.

  -- | In the inductive case, to show that the property P k (assoc) holds for
  -- all numbers k, we need to show that P holds for the S k, i.e. P (suc k).
  -- But in order to prove this, we can use the inductive hypothesis as help:
  IH: (m + n) + p ≡ m + (n + p)

  -- | To reiterate, the current goal is
  (S m + n) + p ≡ S m + (n + p)
  -- | which by PLUS-S (2nd equation) simplifies to
  S ((m + n) + p) ≡ S (m + (n + p))


  -- We would be now stuck if it weren't for IH! Notice that a subexp on
  -- each side of the current goal matches the corresponding side of IH.
         S ((m + n) + p)  ≡  S (m + (n + p))  -- GOAL
            (m + n) + p   ≡     m + (n + p)   -- IH

  -- This is usually not the case in general, but
  -- here it means that we can choose to rewrite:
  --   a) LEFT  subexp in GOAL with RIGHT equation of IH
  --   b) RIGHT subexp in GOAL with LEFT  equation of IH

  -- a) LEFT  subexp in GOAL with RIGHT equation of IH
      S ((m + n) + p)  ≡  S (m + (n + p)) -- GOAL
         (m + n) + p   ≡     m + (n + p)  -- IH
    -----------------------------------------------------
    = S (m + (n + p))  ≡  S (m + (n + p)) -- NEW GOAL

  -- b) RIGHT subexp in GOAL with LEFT  equation of IH
      S ((m + n) + p)  ≡  S (m + (n + p)) -- GOAL
         (m + n) + p   ≡     m + (n + p)  -- IH
    -----------------------------------------------------
    = S (m + (n + p))  ≡  S ((m + n) + p) -- NEW GOAL

  -- | Choosing (b) gets us nowhere while (a) hit the bullseye.
  -- So we proceed and rewrite the matching subexpresion on the left side
  -- of the goal with the right side equation of IH. The new goal is thus:
  S (m + (n + p)) ≡ S (m + (n + p))
  -- and since both sides are now equal we invoke
  refl

  -- | Having proved both base and inductive case, we have proved that P
  -- i.e associativity, holds for all natural numbers.
  QED
```


## Proving associativity in Agda with rewrite

Here is the proposition's statement:

```agda hs
+-assoc : ∀ (m n p : ℕ) → (m + n) + p ≡ m + (n + p)
```

The proof of associativity of addition in Agda now uses rewriting rather than chains of equations.

```agda hs
+-assoc : ∀ (m n p : ℕ) → (m + n) + p ≡ m + (n + p)
+-assoc zero    n p                          =  refl
+-assoc (suc m) n p  rewrite +-assoc m n p  =  refl
```

* For the base case, we must show:

`(zero + n) + p ≡ zero + (n + p)`

Simplifying both sides with the base case of addition yields the equation:

`n + p ≡ n + p`

This holds trivially. The proof that a term is equal to itself is `refl`.

* For the inductive case, we must show:

`(suc m + n) + p ≡ suc m + (n + p)`

Simplifying both sides with the inductive case of addition yields the equation:

`suc ((m + n) + p) ≡ suc (m + (n + p))`

The `rewrite` keyword replaces all occurrences of a subexp in the goal's lhs by the rhs of the induction hypothesis. That subexp needs to match the left side equation of IH.

In this case, the initial goal

`suc ((m + n) + p) ≡ suc (m + (n + p))`

after rewriting by the inductive hypothesis becomes a new goal

`suc (m + (n + p)) ≡ suc (m + (n + p))`

and the proof is given by `refl`.


Rewriting by a given equation is indicated by the keyword `rewrite` followed by a proof of that equation. Rewriting replaces each occurrence of a subexpression on the left-hand side of the goal by the right-hand side of the given equation.

```agda hs
+-assoc (suc m) n p  rewrite +-assoc m n p  =  refl
```

>This means there needs to be a subexpression in the goal's left-hand side's equation that matches the entire equation on the left side of the inductive hypothesis. If this is indeed the case, then we can rewrite that subexpression in the goal with the equation on the right side of the inductive hypothesis.


Rewriting avoids not only chains of equations, but also the need to invoke `cong`.
