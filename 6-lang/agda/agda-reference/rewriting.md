# Rewriting

https://agda.readthedocs.io/en/v2.6.2.1/language/rewriting.html

## TOC

- [Rewrite rules](#rewrite-rules)
- [Overlapping pattern matching](#overlapping-pattern-matching)
- [More examples](#more-examples)
- [General shape of rewrite rules](#general-shape-of-rewrite-rules)
- [Confluence checking](#confluence-checking)
- [Advanced usage](#advanced-usage)

## Rewrite rules

Rewrite rules allow you to extend Agda's evaluation relation with new computation rules.

NB. Agda's `rewrite` keyword is a *language construct* and thus shouldn't be confused with the *rewrite rules*, which are added by a `REWRITE` pragma. Rewriting mechanism (this article) with the `--rewriting` option and the associated `REWRITE` builtin should not be confused with the rewrite construct.

To enable *rewrite rules*, run Agda with the `--rewriting` flag and import the modules `Agda.Builtin.Equality` and `Agda.Builtin.Equality.Rewrite`.

```hs
{-# OPTIONS --rewriting #-}

module language.rewriting where

open import Agda.Builtin.Equality
open import Agda.Builtin.Equality.Rewrite
```

## Overlapping pattern matching

A novice defining commutativity of _+_ may encounter the problem where `0 + m` reduces to `m`, but `m + 0` doesn't; similarly, `suc m + n` ≡ `suc (m + n)` but `m + suc n` ≢ `suc (m + n)`

```hs
+comm : m + n ≡ n + m
+comm {m = 0}     = refl
+comm {m = suc m} = cong suc (+comm {m = m})
```

Here, Agda complains that `n != n + 0` of type `Nat`.

The usual way to solve this problem is by first proving the equations 
`m + 0 ≡ m` and `m + (suc n) ≡ suc (m + n)` 
and then using an explicit rewrite statement in the main proof.

By using rewrite rules, we can solve this in another way. First, we need to prove, that the equations we want, hold as propositional equalities:

```hs
+zero : m + 0 ≡ m
+zero {m = 0}     = refl
+zero {m = suc m} = cong suc +zero

+suc : m + (suc n) ≡ suc (m + n)
+suc {m = zero}  = refl
+suc {m = suc m} = cong suc +suc
```

Next we mark the equalities as rewrite rules with a `REWRITE` pragma:

```hs
{-# REWRITE +zero +suc #-}
```

Now the proof of commutativity works exactly as we wrote it before:

```hs
+comm : m + n ≡ n + m
+comm {m = 0}     = refl
+comm {m = suc m} = cong suc (+comm {m = m})
```

NB. There's no way to make this proof go through without rewrite rules: it is essential that _+_ computes both on its first and its second argument, but there's no way to define _+_ in such a way using Agda's regular pattern matching.

## More examples

Additional examples of how to use rewrite rules can be found in a blog post by Jesper Cockx.

https://jesper.sikanda.be/posts/hack-your-type-theory.html

## General shape of rewrite rules

In general, an equality proof `eq` may be registered as a rewrite rule using the pragma `{-# REWRITE eq #-}`, provided the following requirements are met:
- The type of `eq` is of the form 
  `eq : (x₁ : A₁) ... (xₖ : Aₖ) → f p₁ ... pₙ ≡ v`
  f is a postulate, a defined function symbol, or a constructor applied to fully general parameters (i.e. the parameters must be distinct variables)
- Each variable `x₁, …, xₖ` occurs at least once in a pattern position in 
  `p₁ ... pₙ` (see below for the definition of pattern positions)
- The left-hand side `f p₁ ... pₙ` should be neutral, i.e. it shouldn't reduce.

The following patterns are supported:
- `x y₁ ... yₙ` where `x` is a pattern variable and `y₁, …, yₙ` are distinct
  variables that are bound locally in the pattern
- `f p₁ ... pₙ` where `f` is a postulate, a defined function, a constructor,
   or a data/record type, and `p₁, …, pₙ` are again patterns
- `λ x → p` where `p` is again a pattern
- `(x : P) → Q` where `P` and `Q` are again patterns
- `y p₁ ... pₙ` where `y` is a variable bound locally in the pattern
   and `p₁, …, pₙ` are again patterns
- `Set p` or `Prop p` where `p` is again a pattern
- Any other term `v` (here the variables in `v` are not considered to be in a
  pattern position)

Once a rewrite rule has been added, Agda automatically rewrites all instances of the left-hand side to the corresponding instance of the right-hand side during reduction.

More precisely, a term (definitionally equal to) `f p₁σ ... pₙσ` is rewritten to `vσ` where `σ` is any substitution on the pattern variables `x₁, … xₖ`.

Since rewriting happens after normal reduction, rewrite rules are only applied to terms that would otherwise be neutral.

## Confluence checking

Agda can optionally check confluence of rewrite rules by enabling the `--confluence-check` flag.

Concretely, it does so by enforcing two properties:

- For any two left-hand sides of the rewrite rules that overlap (either at the root position or at a subterm), the most general unifier of the two left-hand sides is again a left-hand side of a rewrite rule. For example, if there are two rules `suc m + n = suc (m + n)` and `m + suc n = suc (m + n)` then there should also be a rule `suc m + suc n = suc (suc (m + n))`.

- Each rewrite rule should satisfy the triangle property: For any rewrite rule `u = w` and any single-step parallel unfolding `u => v`, we should have another single-step parallel unfolding `v => w`.

There is also a flag `--local-confluence-check` that is less restrictive but only checks local confluence of rewrite rules.

In case the rewrite rules are terminating (currently not checked), these two properties are equivalent.

## Advanced usage

Instead of importing `Agda.Builtin.Equality.Rewrite`, a different type may be chosen as the rewrite relation by registering it as the `REWRITE` builtin.

For example, using the pragma `{-# BUILTIN REWRITE _~_ #-}` registers the type _~_ as the rewrite relation.

To qualify as the rewrite relation, the type must take at least two arguments, and the final two arguments should be visible.
