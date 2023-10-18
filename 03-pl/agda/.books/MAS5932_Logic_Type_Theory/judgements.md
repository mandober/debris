# About Type Theory - A Quickstart

https://www.math.fsu.edu/~ealdrov/teaching/2020-21/fall/MAS5932/agda/informal.html


Type Theory deals with *types* and *terms with equalities*, in the plainest, syntactic, sense of the word, between such types and terms. We refer to equality in this sense (which is not much) as *definitional equality*.

## Judgements

Formally, statements we make about types and terms are called *judgements*. There are 4 types of judgements

1. `Γ ⊢ A : 𝓤`

This says that `A` is a type. I am writing 𝓤 instead of `Type` (suggest there is an appropriate universe of types).

2. `Γ ⊢ x : A`

This says that `x` is a term of type `A`.

3. `Γ ⊢ A = B : 𝓤`

This says that `A` is equal to `B`.

4. `Γ ⊢ x = y : A`

This says that `x` and `y` are definitionally equal terms of type `A`.

These judgements are derived from axioms and previous judgements using inference rules. The derivations, which are essentially finite trees labeled by judgements and inference rules, are the main object of study of TT, and typically we derive new judgements from the old ones. The axioms typically include judgements stating the existence of certain basic types and terms.

* Note that in ordinary Set Theory things like `a ∈ A` or `a = b` are propositions, while in TT we have judgements.

* In order to say that `A = B : 𝓤` we have to know that `A : U` and `B : 𝓤`.

The `Γ` denotes a context.

The essential feature of Dependent Type Theory is that we allow types and terms to depend on free variables, that may in turn refer to other types and terms.

For example, `x : A ⊢ B (x) : 𝓤`, states that `B(x)` is a type that depends on a term `x` of type `A`, a judgement that has previously been derived. This is of crucial importance: `B` is a dependent type.

In general, this can be upgraded to many variables, so that a context can be something like `Γ = x₁ : A₁, x₂ : A₂, …, xₙ : Aₙ`, where for each `m ≤ n` each type `A m` can only depend on the variables that were declared previously, that is, `x₁, …, xₘ − 1`.

## Dependent function types

One more example of dependency: let's say we have the above judgement 

`x : A ⊢ B (x) : 𝓤`

So we know that `B` is a dependent type. Now, suppose that we can state:

`x : A ⊢ f(x) : B(x)`

This means we hold true that `f(x)` is term of type `B(x)`, depending on the variable `x`, which is a term of type `A`. So, `f` is a term of a dependent type `B`.

But now, suppose that `B(x)` does not depend on `x`, in fact. This is (the analog of) a function from `A` to `B`, which we write:

`x : A ⊢ f(x) : B`

## What is a type

According to Martin-Löf, for each of the four judgements, we must answer one of the following equivalent questions:
1. What is it? (Ontological-Ancient Greeks)
2. What do we have to know about it? (Epistemological-Descartes, Kant, …)
3. What does it `<judgement here>` mean? (Semantical)

The way Martin-Löf asnwers the question is to call *canonical* the terms that we can directly "see" that they are the result of one of the rules, to be distinguished from all the other possible terms, to be deemed noncanonical.

Thus, the answer is articulated as follows.

A type `A` is defined by prescribing how a canonical term of `A` is formed

Two types `A` and `B` are equal if


```hs
a : A          a : B
-----    &     -----
a : B          a : A

and

a = b : A          a = b : B
---------    &     ---------
a = b : B          a = b : A
```


A term `a : A` is a method (program) which yields a canonical term of `A`.

Example: When we build the naturals we can see that `2 + 2 : ℕ` because it computes to `suc (2 + 1)`.

Two arbitrary terms `a : A` and `b : A` are equal if, when executed, `a` and `b` yield equal canonical elements as a result.


## Rules for definitional equality

Equality is an equivalence relation, in the sense that it satisfies the 3 traditional relations, plus the congruence relation with respect to *substitution* into types and terms:

```hs
a = b : A    x : A ⊢ B (x) : 𝓤
-------------------------------
    B (a) = B (b) : 𝓤


a = b : A    x : A ⊢ f (x) : B (x)
----------------------------------
    f (a) = f (b) : B (a)


A = B : 𝓤    a : A
-------------------
     a : B
```

In summary, when we try to grasp what a certain type is, that is, when we answer the questions above, we use the following rules:
- *Formation*:    Judgement that, given a certain context, we can form the type
- *Introduction*: We specify what are the canonical terms 
                  and equalities between canonical terms
- *Elimination*:  How the newly introduced terms are applied
- *Conversion*:   How the introducton and the elimination rules interact


## Products

```hs
-- Formation:

x : A ⊢ B (x) : 𝕌
-------------------
Π [x : A] B (x) : 𝕌


-- Introduction:

x : A ⊢ f(x) : B (x)
----------------------------
λ x. f (x) : Π [x : A] B (x)


-- Elimination:

f : Π [x : A] B (x)    a : A
----------------------------
app(f,a) : B (a)


-- Conversion:

λ x. f (x) : Π [x : A] B (x)    a : A
-------------------------------------
app(λ x.f (x), a) = f (a) : B (a)
```

## Interpretations

The HoTT book summarizes the different points of view about type-theoretic operations as follows:

Types         | Logic             | Sets                | Homotopy
--------------|-------------------|---------------------|-----------------
A             | proposition       | set                 | space
a:A           | proof             | element             | point
B x           | predicate         | family of sets      | fibration
b x : B x     | conditional proof | family of elements  | section
𝟘, 𝟙          | ⊥, ⊤              | ∅, {∅}              | ∅,*
A + B         | A ∨ B             | disjoint union      | coproduct
A x B         | A ∧ B             | set of pairs        | product space
A → B         | A ⇒ B             | set of functions    | function space
Σ [x : A] B x | ∃ x:A (B x)       | disjoint sum        | total space
Π [x : A] B x | ∀ x:A (B x)       | product             | space of sections
≡             |  =                | {(x,x).x∈A}         | path space Aᶦ


## Types to build

We will incrementally build a minimal depende type system, including the following types:
- The empty type 𝟘
- The unit type 𝟙
- More general finite types
- The natural numbers ℕ
- (Dependent) Products-these correspond to Cartesian products
- (Dependent) Sums-these generalize disjoint unions
- Identity types

*Identity types* embody the equality relation not in the shallow definitional sense stated above, but as a proposition. We will see that, far from being a simple equivalence relation, they embody the homotopical and categorical content of HoTT.


https://www.math.fsu.edu/~ealdrov/teaching/2020-21/fall/MAS5932/agda/mltt.html
