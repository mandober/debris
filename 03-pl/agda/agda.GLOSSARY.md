# Agda :: GLOSSARY

<!-- TOC -->

- [A-normal form](#a-normal-form)
- [Cumulativity](#cumulativity)
- [Canonical form](#canonical-form)
- [Definition](#definition)
- [Eager evaluation](#eager-evaluation)
- [Elaboration](#elaboration)
- [Induction](#induction)
- [Inductive type](#inductive-type)
- [Iteration](#iteration)
- [Lifting](#lifting)
- [Name](#name)
- [Recursion](#recursion)
- [Recursive type](#recursive-type)
- [Recursor](#recursor)
- [Simple data type](#simple-data-type)
- [Sort](#sort)
- [Strong normalization](#strong-normalization)
- [Subsingleton](#subsingleton)
- [Telescope](#telescope)
- [Universe](#universe)
- [Universe levels](#universe-levels)
- [UTT-Σ](#utt-σ)
- [Two-level type theory](#two-level-type-theory)

<!-- /TOC -->

## A-normal form
A-normal form (ANF) is an intermediate representation of programs in functional compilers. In ANF, all arguments to a function must be trivial (constants or variables); that is, the evaluation of each argument must halt immediately.

## Cumulativity
Cumulativity of universes means that a term of `Set i` automatically becomes a term of all the `Set j` where `j >= i`. Under cumulativity, the basic guarantee of type theory, that each terms belongs to exactly one type, is broken.

## Canonical form

## Definition
A definition is a syntactic construction defining an entity such as a function or a datatype. A name is a string of symbols that identifies a definition. The same definition can have many names and at different points in the program it will have different names. It may also be the case that two definitions have the same name, but in this case there will be an error if the name is used, unless they are in different scopes.

## Eager evaluation
Agda employs eager evaluation, so all arguments are evaluated and reduced before being passed on (to e.g. a function).

## Elaboration
Elaboration is the process that comes after type-checking, when all expressions are assigned the appropriate types, and all the expression are reduced to their canonical forms (e.g. A-form). The elaboration means writing the types in their most explicit canonical form, no matter how redundant the types possibly become.

## Induction
Induction is the process by which we define something; it consists of a base case and a recursive (inductive case). Recursion and induction are the two sides of the same coin. However, induction is more associated to the definition of a type (set) by first listing the simple, atomic rules and then the ever more complex, compound rules based on the simpler ones. Induction is used in type introduction rules, while recursion is used in type elimination rules.

## Inductive type
Mathematically, an inductively defined set is described by inductive clauses or inference rules. Similarly, an inductive data type is completely defined by two types of inference rules: the base case inference rule has no assumptions and just directly states what is the initial element of the type (e.g. `⊢ 0 : ℕ`), and the recursive case specifies how to produce another element, given an already existing element of that type (e.g. `n : ℕ ⊢ S n : ℕ`). Inductive types are defined using recursion and eliminated using induction.

## Iteration
Iteration is a simpler form of recursion, where the function that handles the recursive case does not use all the arguments that the recursor does. Intuitivelly, iteration is a form of repeated function application that starts by applying the function to an initial argument, and then to that result, ad infinitum, which may be denoted a sequence `iterate f x = x, f x, f (f x), …`. Thus, iteration is also called a fold, or an n-fold if the number of applications is bounded (in which case an extra parameter is needed to act as a counter). A variant of iteration produces an infinite list, the elements of which are all the (intermediate) results of application; in a version where the number of applications is bounded, it produces a finite list `[x, f x, f (f x), …]` (the first element being `x` accounts for the case the counter is zero).

## Lifting
Somewhat (more less than more) similarly to Haskell, lifting in Agda refers to the elevation of a term of a lower universe into a higher universe. In Haskell, one of the meanings of "lifting" is bringing a term, that is normally of one type, into another type (somehow perceived to be "higher"). For example, in a do-notation in the context of a monadic stack, the issued queries (commands, functions) can only be heard by the outermost monad; in order to address some of the nested monads, you need to lift a function (even though the nested monads are in the inner layers of a monad stack, i.e. instead of "lifting" it should be called "burying"). In Haskell, lifting also means to bring any term/type into the `IO` context.

## Name
A name is a string of symbols that identifies a definition.

## Recursion
Induction (especially the induction principle aka type elimination rule), recursion, iteration, folding are all related kinds of function recursion schemas. In the grand context of recursion schemes, these are all simpler forms based on primitive recursion - but recursion schemes also include more complex beasts like catamorphisms (aka folding), anamorphisms, hylomorphisms, zygomorphisms, and much more members, all unpronouncable.

Some authors position induction (aka the induction principle, aka the recursor) as the most general form of elimination function, compared to recursion, iteration and fold. According to their nomenclature, recursor is synonymous with induction (principle), but not with recursion because some authors define recursion as having one parameters less then induction. Usually, recursion, at least over the ℕ type, resambles the primitive recursion. Iteration is generally the same as a fold, and it has less (two) parameters than induction.

Some authors define recursion in Agda as a simpler form of induction in that it takes one argument less. In fact, recursion has the same form as the primitive recursion, which takes two functions and produces a recursive function `h` in terms of them: `f` handles the base case, while `g` handles the recursive case.

In Agda, particularly with the type ℕ, we can distinguish between these forms:

```agda hs
-- | INDUCTION (principle), aka the recursor, aka the elimination rule:
ℕ-elim : {P : ℕ → Set}
       → P 0
       → ((n : ℕ) → P n → P (suc n))
       -----------------------------
       → (n : ℕ) → P n
ℕ-elim f _      0  = f
ℕ-elim f g (suc x) = g x (ℕ-elim f g x)

-- | RECURSION - has different args than induction;
-- it can be specified in terms of ℕ-elim.
ℕ-rec : {A : Set}
      → A
      → (ℕ → A → A)
        ------------
      → ℕ → A
ℕ-rec x f n = ℕ-elim x (λ _ → f n) n

-- | ITERATION - has different args than both induction and recursion;
-- it can be specified in terms of either ℕ-elim or ℕ-rec above.
ℕ-iter : {A : Set}
            → A
            → (A → A)
              ----------
            → ℕ → A
-- (1) ℕ-iter in terms of ℕ-elim
ℕ-iter x f n = ℕ-elim x (λ z s → f s) n
-- (2) ℕ-iter in terms of ℕ-rec
ℕ-iteration x f = ℕ-rec x (λ z s → f s)
```

On the other hand, primitive recursion from mathematics, from computability theory, is usually defined like so (notice that this definition using a FP-style math notation doesn't care to introduce the functions `f` and `g` as parameters - in math, functions have no proper type signatures for this to matter anyway):


```math hs
ρ(f,g) = h

-- general form of primitive recursion. `h` is n-ary
-- and `x̅` stands for additional arguments: `x₀, x₁, …, xₙ`
h    0  x̅ = f
h (S y) x̅ = g y x̅ (h y x̅)

-- weaker form of primitive recursion, aka ITERATION
h    0  x̅ = f
h (S y) x̅ = g x̅ (h y x̅)


-- when `h` is a unary fuction, primitive recursion and
-- its weaker form, iteration, have the same definition:
h    0  = f
h (S y) = g y (h y)
```


These two mathematical definitions can be expressed in Agda as simpler types compared to the definitions of `ℕ-elim`, `ℕ-rec` and `ℕ-iter`:

```agda hs
-- | binary form of primitive recursion
ℕ-primrec : (ℕ → ℕ) → (ℕ → ℕ → ℕ → ℕ) → ℕ → ℕ → ℕ
ℕ-primrec f _      0  y = f y
ℕ-primrec f g (suc x) y = g x y (ℕ-primrec f g x y)

-- | unary form of primitive recursion (iteration)
ℕ-pr : ℕ → (ℕ → ℕ → ℕ) → ℕ → ℕ
ℕ-pr f _      0  = f
ℕ-pr f g (suc x) = g x (ℕ-pr f g x)
```

Notice that the type of the function `g` in `ℕ-primrec` has an extra paramater compared to `g` in `ℕ-pr`.



## Recursive type
A recursive type has terms that mention the type itself. A recursive type may be defined in terms of itself, like `ℕ` and `List`.

## Recursor
Inductive types in Agda are defined using the data declaration or a record construct, and in such definitions, the type signature corresponds to type formation rule, while the definition of each data ctor corresponds to one type introduction rule. Each data type has a unique elimination rule, based on the induction principle, which is also known as a recursor. In MLTT, the only recursive definition allowed over the ℕ type is the recursor, in terms of which all other recursive functions over ℕ are expressed. Agda does not follow MLTT that strictly.

## Simple data type
Simple data type is non-indexed data type.

## Sort
A sort or a universe is a type that contains (other) types. The fundamental sort is `Set`, actually `Set₀`, and it is the universe of small types.

## Strong normalization
Agda is strongly normalizing meaning that all terms reduce down to their respective canonical terms.

## Subsingleton

## Telescope
A telescope is a sequence of types where later types may depend on values of previous types. In Agda, telescopes appear in data type and function definitions and their general form is: `∆ = (x₁ : A₁) … (xₙ : Aₙ)`. When there are consecutive occurrences of a type in a telescope we may combine them and write, e.g. `(x y : A) (z : B)` instead of `(x : A) (y : A) (z : B)`.

## Universe
A universe, or a sort, is a type that contains (lower-level) types.

## Universe levels
To circumvent the Russell's paradox, Agda avoids type-in-type by having a hierarchy of types, aka universes. This hierarchy of types is indexed by levels that appear as subscripts to `Set`. The `Set₀` is at the bottom, then universes like `Set₁`, `Set₂`, …, all the way to `Setω` and beyond.

## UTT-Σ
UTT-Σ is an elaborate, explicitly typed λ-calculus. It can be viewed as an extension of the Calculus of Constructions (λPω), which is the fullest-featured system of the λ-cube, featuring dependent types, polymorphic types, and type constructors. UTT-Σ was introduced by Ulf Norell in his 2007 PhD thesis and is the base type theory underlying Agda. UTT-Σ differs from the calculus of constructions in three primary ways. Rather than including just two sorts `Type₀` and `Type₁`, it includes an infinite hierarchy of sorts, `Type₀, Type₁, …`. It has *cumulative sorts*, meaning that when n ≤ m, any type belonging to Typeₙ also belongs to Typeₘ. This fact means that types are not unique up to β-conversion, and necessitates the introduction of a subtyping relation. UTT-Σ introduces a wide variety of types: dependent pairs, the unit type, sorts, dependent function types. These additional types are interesting primarily for their CHI interpretation.

## Two-level type theory
Two-level type theory (2LTT) refers to versions of MLTT that combine two type theories: an "inner" level that is potentially a HoTT or CTT, which may include univalent universes and HITs, and an "outer" level that validates UIPs.
