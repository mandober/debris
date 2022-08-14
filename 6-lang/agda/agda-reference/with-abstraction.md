# With-Abstraction

https://agda.readthedocs.io/en/latest/language/with-abstraction.html

## TOC

<!-- TOC -->

- [TOC](#toc)
- [Contents](#contents)
- [Use](#use)
- [Generalisation](#generalisation)
- [Nested with-abstractions](#nested-with-abstractions)
- [Simultaneous abstraction](#simultaneous-abstraction)
- [Making with-abstractions hidden and/or irrelevant](#making-with-abstractions-hidden-andor-irrelevant)
- [Using underscores and variables in pattern repetition](#using-underscores-and-variables-in-pattern-repetition)
- [Irrefutable With](#irrefutable-with)
- [Rewrite](#rewrite)
- [With-abstraction equality](#with-abstraction-equality)
- [Alternatives to with-abstraction](#alternatives-to-with-abstraction)
- [Termination checking](#termination-checking)
- [Performance considerations](#performance-considerations)
- [Technical details](#technical-details)
- [Examples](#examples)
- [Ill-typed with-abstractions](#ill-typed-with-abstractions)

<!-- /TOC -->


## Contents

- Use
  - Generalisation
  - Nested with-abstractions
  - Simultaneous abstraction
  - Making with-abstractions hidden and/or irrelevant
  - Using underscores and variables in pattern repetition
  - Irrefutable With
  - Rewrite
  - With-abstraction equality
  - Alternatives to with-abstraction
  - Termination checking
  - Performance considerations
- Technical details
  - Examples
  - Ill-typed with-abstractions



*With-abstraction* was first introduced by Conor McBride [McBride2004] and lets you pattern match on the result of an intermediate computation by effectively adding an extra argument to the left-hand side of your function.

[McBride2004]: C. McBride and J. McKinna. The view from the left. Journal of Functional Programming, 2004. http://strictlypositive.org/vfl.pdf

## Use

In the simplest case *the with construct* can be used to discriminate on the result of an intermediate computation.

```hs agda
filter : {A : Set} → (A → Bool) → List A → List A
filter p [] = []
filter p (x ∷ xs) with p x
filter p (x ∷ xs)    | true  = x ∷ filter p xs
filter p (x ∷ xs)    | false =     filter p xs
```

The clause containing the with-abstraction has no right-hand side; instead it is followed by a number of clauses with an extra argument on the left, separated from the original arguments by a pipe.

When the original args are the same in the new clauses, use the `...` syntax insteaad of repeating them:

```hs agda
filter : {A : Set} → (A → Bool) → List A → List A
filter p [] = []
filter p (x ∷ xs) with p x
...                  | true  = x ∷ filter p xs
...                  | false =     filter p xs
```

In this case `...` expands to `filter p (x ∷ xs)`.

However, there are 3 cases where you have to spell out the left-hand side:
1. If you want to do further pattern matching on the original arguments.
2. When the pattern matching on the intermediate result refines 
   some of the other arguments (see Dot patterns).
3. To disambiguate the clauses of nested with-abstractions 
   (see Nested with-abstractions below).



## Generalisation



## Nested with-abstractions



## Simultaneous abstraction



## Making with-abstractions hidden and/or irrelevant



## Using underscores and variables in pattern repetition



## Irrefutable With



## Rewrite

https://agda.readthedocs.io/en/v2.6.2.1/language/with-abstraction.html#with-rewrite

Remember example of *simultaneous abstraction* from above.

```hs
postulate plus-commute : (a b : Nat) → a + b ≡ b + a

thm : (a b : Nat) → P (a + b) → P (b + a)
thm a b t with   a + b  | plus-commute a b
thm a b t    | .(b + a) | refl = t
```

This pattern of rewriting by an equation by with-abstracting over it and its left-hand side is common enough that there is special syntax for it:

```hs
thm : (a b : Nat) → P (a + b) → P (b + a)
thm a b t rewrite plus-commute a b = t
```

The `rewrite` construction takes a term `eq` of type `lhs ≡ rhs` (where _≡_ is the built-in equality type), and expands to a with-abstraction of lhs and `eq` followed by a match of the result of `eq` against `refl`:

```hs
f ps rewrite eq = v
  -->
f ps with lhs | eq
...    | .rhs | refl = v
```

One limitation of the rewrite construction is that you **cannot do further pattern matching on the arguments after the rewrite, since everything happens in a single clause**. You can however do with-abstractions after the rewrite.

```hs
postulate T : Nat → Set

isEven : Nat → Bool
isEven zero = true
isEven (suc zero) = false
isEven (suc (suc n)) = isEven n

thm₁ : (a b : Nat) → T (a + b) → T (b + a)
thm₁ a b t rewrite plus-commute a b with isEven a
thm₁ a b t | true  = t
thm₁ a b t | false = t
```

Note that the with-abstracted arguments introduced by the `rewrite` (lhs and eq) are not visible in the code.


## With-abstraction equality



## Alternatives to with-abstraction



## Termination checking



## Performance considerations



## Technical details



## Examples



## Ill-typed with-abstractions
