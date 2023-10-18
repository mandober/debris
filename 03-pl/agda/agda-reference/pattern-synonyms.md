# Pattern synonyms

https://agda.readthedocs.io/en/v2.6.2.2/language/pattern-synonyms.html

A pattern synonym is a declaration that can be used on the lhs (in pattern matching) as well as the rhs (in expressions).

```hs agda
data Nat : Set where
  zero : Nat
  suc  : Nat → Nat

pattern z    = zero
pattern ss x = suc (suc x)

f : Nat → Nat
f z       = z
f (suc z) = ss z
f (ss n)  = n
```

Pattern synonyms are implemented by *substitution on the abstract syntax*, so definitions are *scope-checked but not type-checked*. They are particularly useful for universe constructions.

## Overloading

Pattern synonyms can be overloaded as long as all candidates have the same shape.

>Two pattern synonym definitions have the same shape if they are equal up to var and ctor names.

Shapes are checked at resolution time and after expansion of nested pattern synonyms. For example

```hs agda
data List (A : Set) : Set where
  lnil  : List A
  lcons : A → List A → List A

data Vec (A : Set) : Nat → Set where
  vnil  : Vec A zero
  vcons : ∀ {n} → A → Vec A n → Vec A (suc n)

pattern [] = lnil
pattern [] = vnil

pattern _∷_ x xs = lcons x xs
pattern _∷_ y ys = vcons y ys

lmap : ∀ {A B} → (A → B) → List A → List B
lmap f []       = []
lmap f (x ∷ xs) = f x ∷ lmap f xs

vmap : ∀ {A B n} → (A → B) → Vec A n → Vec B n
vmap f []       = []
vmap f (x ∷ xs) = f x ∷ vmap f xs
```

Flipping the args in the synonym for `vcons`, changing it to pattern 
`_∷_ ys y = vcons y ys`, 
results in the following error when trying to use the synonym:

```hs agda
Cannot resolve overloaded pattern synonym `_∷_`, since candidates
have different shapes:

  pattern _∷_ x xs = lcons x xs
    at pattern-synonyms.lagda.rst:51,13-16
  pattern _∷_ ys y = vcons y ys
    at pattern-synonyms.lagda.rst:52,13-16

(hint: overloaded pattern synonyms must be equal up to var and ctor names)

when checking that the clause
  lmap f (x ∷ xs) = f x ∷ lmap f xs
has type
  {A B : Set} → (A → B) → List A → List B
```

## Refolding

For each pattern `pattern lhs = rhs`, Agda declares a `DISPLAY` pragma refolding `rhs` to `lhs` (see The DISPLAY pragma for more details).
