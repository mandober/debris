# Predicates in Agda

- predicate
- proposition
- relation
- property
- function
- functional predicate
- predicate variable
- predicates in Boolean logic
- predicates in Propositional logic
- predicates in Predicate logic
- predicates in Type Theory
  - Boolean functions
  - inductive data types
    - indexed data types
  - functions


## Predicates

A predicate is an `n`-place relation
- 1-place predicate is a property
- 2-place predicate is usually called a relation
- a property is a 1-place relation

Predicates can be expressed as
- Boolean logic: Boolean functions
- Propositional logic: propositional functions
- Predicate logic: propositions, relations, properties
- Type Theory: as `Setᵢ`; as `Set₀` (the set of small types) at the Level 0



## Boolean logic

In Boolean logic, a predicate is a *Boolean-valued function* i.e. a function which returns a Boolean. In fact, in Boolean logic functions' domain and codomain are the Boolean set, so it's obvious that they return a Boolean.

The arity, `n`, of Boolean functions is arbitrary, but it usually doesn't go over three, `𝔹ⁿ → 𝔹`
- n = 0 for nullary functions like the constants 'true' and 'false'
- n = 1 for unary functions like 'not'
- n = 2 for binary connectives like 'and', 'or', 'implies', etc.
- n = 3 for ternary functions like 'if_then_else_'

An example of a Boolean predicate

```hs
isTrue : 𝔹 → 𝔹
isTrue true  = true
isTrue false = false
```


## Propositional logic



Predicate logic, or first-order logic, is a collection of formal systems that extends propositional logic by adding relations (predicates), functions, quantifiers, and allowing variables to range over the domain of discurse.




uses quantified variables over non-logical objects
and allows the use of sentences that contain variables.

so that rather than propositions such as 
"Socrates is a man", 
one can have expressions in the form 
"there exists x such that x is Socrates and x is a man", 
where "there exists" is a quantifier, while x is a variable.

This distinguishes it from propositional logic, which does not use quantifiers or relations; in this sense, propositional logic is the foundation of first-order logic.

Predicates as
- Boolean functions
- functions
- inductive data types
- indexed data types

Generally, in various PLs (even though we explore predicates here as pertaining to Agda), a **predicate** may be realized as a function or a data type. Both of these language constructions have different forms for representing predicates. The most fundamental type of functions that may be called predicates are the *Boolean functions*.

## Predicates in Agda

A predicate like `even` can be defined as
- a Boolean function returning `true` or `false`
  `even? : ℕ → Bool`
- a type function returning `⊤` or `⊥` type
  `even  : ℕ → Set`
- an indexed (by ℕ) datatype returning `Set`
  `Even  : ℕ → Set`
- a parameterized (by ℕ) datatype returning `Set`
  `Even    ℕ : Set` ✘ (no, coz this fixes n : ℕ in all ctors)


The term "predicate" sometimes means a function that returns a Boolean value. However, such functions are more correctly called *Boolean-valued functions*, where the suffix "-valued" signifies that their general form is from any type `A`, to the Boolean type, 𝔹, as the reuturned type, `f : A -> 𝔹`.

Functions whose domain is fixed to the Boolean set as well, `f : 𝔹 -> 𝔹`, are *Boolean functions*. While they are a specialization of the more general form of Boolean-valued functions, nevertheless, Boolean functions are often studied separately, per se.

Finally, function of the form `f : 𝔹 -> A` have no particular name.

In various PLs, Boolean-valued functions are called predicates, under the interpretation that they return a truth value. However, a predicate is a more general concept, signified with the type inhabituation in type theory and represented eith the type:

A -> A -> Set


We represent the proofs of the true proposition by the type `⊤`. 
The true proposition has a trivial proof: tt (trivially true).

We represent the proofs of the false proposition by the type `⊥`. 
The false proposition has no proofs (it cannot be proven).

```hs
-- the proofs of the true proposition
data ⊤ : Set where
  tt : ⊤

-- We represent the proofs of the false proposition by the type ⊥.
data ⊥ : Set where
  -- (no ctors)
```

We wish to represent proofs of propositions `n ⩽ m` where `n, m : ℕ`, and for this we define a set indexed with two natural numbers:

```hs
data  _⩽_ : ℕ → ℕ → Set where
  z⩽n : {n : ℕ} →                       zero  ⩽ n
  s⩽s : {m : ℕ} → {n : ℕ} →   m ⩽ n  →  suc m ⩽ suc n
```

This yields these statements:

```js
          z≤n {0}   : 0 ≤ 0
          z≤n {1}   : 0 ≤ 1
          z≤n {2}   : 0 ≤ 2
…
     s≤s (z≤n {0})  : 1 ≤ 1
     s≤s (z≤n {1})  : 1 ≤ 2
     s≤s (z≤n {2})  : 1 ≤ 3
…
s≤s (s≤s (z≤n {0})) : 2 ≤ 2
s≤s (s≤s (z≤n {1})) : 2 ≤ 3
s≤s (s≤s (z≤n {2})) : 2 ≤ 4
…
```

which means that the following propositions have proofs:

```hs
0 ≤ 0
0 ≤ 1,  1 ≤ 1
0 ≤ 2,  1 ≤ 2,  2 ≤ 2
0 ≤ 3,  1 ≤ 3,  2 ≤ 3,  3 ≤ 3
…       …
 ↑      ↑       ↑       ↑
 |      s≤s yields the rest of columns
 |
z≤n yields the first column
```

- `z≤n` ctor yields the first column of the statements with proofs
- `s≤s` ctor yields the rest of columns of the statements with proofs

Note that `1 ≤ 0` is also a valid expression, but it denotes an unihabited set.

We can prove that a set is non-empty by producing a witness:

```hs
0≤1 : 1 ≤ 10
0≤1 = s≤s z≤n
```

## Predicates versus boolean functions

We can define a predicate in Agda as a datatype.

```hs
data even : ℕ → Set where
  even-z : even zero
  even-ss : {n : ℕ} → even n → even (suc (suc n))
```

And the other way to represent a predicate is with a Boolean function:

```hs
evenᴮ : ℕ → Bool
oddᴮ : ℕ → Bool

evenᴮ 0 = true
evenᴮ (suc n) = oddᴮ n

oddᴮ 0 = false
oddᴮ (suc n) = evenᴮ n
```

The boolean function `evenᴮ : ℕ → Bool` has an advantage over the predicate `even : ℕ → Set` because we can compute its result; e.g, `evenᴮ 42` computes to `true`.

However, (propositional) predicates are more general, as not every predicate may be represented by a Boolean function, at least not in a computable way.

A predicate is decidable if it can be represented by a Boolean function. More precisely, `P : A → Set` is represented by `f : A → 𝔹` when for all `x : A`

```hs
if P(x) is inhabited then f(x) = True
if P(x) is inhabited then f(x) = False
```

The inductively defined predicate `even : ℕ → Set` provides more information than the corresponding boolean function: `even n` is the type of all the ways in which we can prove "eveness" of `n`; it may be empty, and it just so happens that the rules gives precisely one way of showing that an even number is even. 

And `evenᴮ n` yields a single bit of information, namely whether `n` is even.

In general, predicates should be preferred to Boolean functions; however, it is possibe that there are some cases when it may be more convenient to express a predicate as a Boolean function.

- Predicates are preferred to Boolean functions
- Predicates provice more info than Boolean functions
- Predicates are inductively defined
- Binary relations are two-place predicates
- The type of a predicate is the type of all ways which we can use to prove that the predicate holds. If the predicate doesn't hold, then the type is empty.

## Non-zero numbers

The predicate "is not zero" is defined as

```hs
data _≠0 : ℕ → Set where
  suc≠0 : {n : ℕ} → suc n ≠0
```

We write "42 is not zero" as `42 ≠0`. Let us prove that 42 is not zero:

```hs
42≠0 : 42 ≠0
42≠0 = suc≠0 -- the type (42 ≠0) is inhabited
```

Non-zeroness can be represented as a Boolean function

```hs
non-zero : ℕ → 𝔹
non-zero    0  = false
non-zero (S n) = true
```
