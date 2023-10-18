# Predicates vs Boolean functions

Inference rules may be used to specify predicates and relations; we can have a predicate stating that a natural number is even. We'd define such predicate as an inductive type:

```hs agda
data Even : ℕ → Set where
  even-z : Even 0
  even-s : {n : ℕ} → Even n → Even (S S n)
```

This is an important fact: inductive generation of set's elements is the same as the proof of a proposition.

Outside type theory, the usual way to define a predicate is as a Boolean-valued function (i.e. a function that returns a Boolean value).

We can define a pair of mutually-recursive functions in Agda that identify natural numbers as being even or odd:

```agda hs
-- mutually-recursive functions have forward declaration of types
evenᴮ : ℕ → Bool
oddᴮ : ℕ → Bool

evenᴮ 0 = true
evenᴮ (suc n) = oddᴮ n

oddᴮ 0 = false
oddᴮ (suc n) = evenᴮ n
```

The Boolean-valued functions `evenᴮ : ℕ → Bool` has an advantage over the predicate `even : ℕ → Set` because we can compute its result, e.g. `evenᴮ 42` computes to `true`.

However, Boolean-valued functions return a truth value (i.e. a Boolean value), so, in general, although they are decidable (can compute their results), they only return 1 bit of information.

The same functionality (relation) that a Boolean predicate (Boolean-valued function) computes can be represented by a general predicate, but not all predicates can be expressed as Boolean-valued functions, at least not in a computable way.

Unlike the Boolean predicate, a general predicate returns more than just the 'yes' or 'no' answer: `even n` is the *type* of all the ways in which we can prove eveness of a natural number `n`. In this case, the inference rules give exactly one way to show that a number is even (so there will be a single inhabitant of the type). In case the proof cannot be derived (e.g. for odd natural numbers), the resulting type is uninhabited.

For this reason, predicates should be preferred to Boolean-valued functions, whenever possible, although there may be some specific situations when it's possible and perhaps convenient to express a predicate in terms of a Boolean-valued function.

A **predicate is decidable** if it can be represented as a Boolean-valued function. More precisely, a predicate `P : A → Set` is represented by a Boolean-valued function `f : A → Bool` when, for all `x : A`,
- `f x = true`  if `P x` is inhabited
- `f x = false` if `P x` is uninhabited
