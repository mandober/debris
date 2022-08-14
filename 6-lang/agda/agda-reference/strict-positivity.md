# Strict positivity

https://agda.readthedocs.io/en/v2.6.2.1/language/data-types.html#strict-positivity

Related:
- [Variance](./variance.md)
- [Positivity checking](./positivity-checking.md)


When defining a datatype `D`, Agda poses an additional requirement on the types of the D's ctors: `D` may only occur in the **strictly positive position** in the types of the ctor's arguments.

A data type `D` occurs *strictly positively*, roughly, if it does not occur before an arrow. More precisely, a type is in positive position if the sum of its occurences is not a negative integer, see [variance](./variance.md) for exact details.


Concretely, for a datatype `D` with ctors
    `c₁ : A₁`
    …
    cₙ : Aₙ

Agda checks that each ctor signature `A` has the form
    `(y₁ : B₁) → ... → (yₘ : Bₘ) → D`

where an arg type `B` of the ctors is either
- non-inductive (a side condition) and doesn't mention `D` at all
- it is inductive and has the form below 
  and `D` doesn't occur in any `C`:
  `(z₁ : C₁) → ... → (zₖ : Cₖ) → D`


```hs
data D : …
  c : (y₁ : B₁)
    → (y₁ : (z₁ : C₁) → ... → (zₖ : Cₖ) → D))
    → …
    → (yₘ : Bₘ)
    → D
```


The *strict positivity* condition rules out declarations such as

```hs
data Bad : Set where
    bad : (Bad → Bad) → Bad
    --     A     B      C
    -- A is in a negative position, B and C are is positive position
```

Since there is a negative occurrence of `Bad` in the type of the argument of the ctor. (The corresponding type would be allowed in Haskell).

Non strictly-positive declarations are rejected because they admit *non-terminating* functions.

The positivity check can be disabled with the `--no-positivity-check` flag. In that situation, the declaration of `Bad` data type would be allowed. Then, it would also be possible to construct a term of the empty type, even without recursion:

```hs
{-# OPTIONS --no-positivity-check #-}

data ⊥ : Set where

data Bad : Set where
  bad : (Bad → ⊥) → Bad

self-app : Bad → ⊥
self-app (bad f) = f (bad f)

absurd : ⊥
absurd = self-app (bad self-app)
```

For more info see [termination checking](./termination-checking.md).
