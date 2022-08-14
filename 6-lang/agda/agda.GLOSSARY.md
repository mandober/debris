# GLOSSARY

<!-- TOC -->

- [A-normal form](#a-normal-form)
- [Definition](#definition)
- [Cumulativity](#cumulativity)
- [Canonical form](#canonical-form)
- [Induction](#induction)
- [Iteration](#iteration)
- [Recursion](#recursion)
- [Recursor](#recursor)
- [Subsingleton](#subsingleton)
- [Eager evaluation](#eager-evaluation)
- [Elaboration](#elaboration)
- [Lifting](#lifting)
- [Simple data type](#simple-data-type)
- [Sort](#sort)
- [Strong normalization](#strong-normalization)
- [Telescope](#telescope)
- [Universe](#universe)
- [Universe levels](#universe-levels)
- [UTT-Σ](#utt-σ)

<!-- /TOC -->

## A-normal form
A-normal form (ANF) is an intermediate representation of programs in functional compilers. In ANF, all arguments to a function must be trivial (constants or variables). That is, evaluation of each argument must halt immediately.

## Definition

## Cumulativity
Cumulativity of universes means that a term of `Set i` automatically becomes a term of all the `Set j` where `j >= i`.


## Canonical form

## Induction
## Iteration
## Recursion
## Recursor
## Subsingleton

## Eager evaluation
Agda employs eager evaluation, so all arguments are evaluated and reduced before being passed on (to e.g. a function).


## Elaboration
Elaboration is the process that comes after type-checking, when all expressions are assigned the appropriate types, and all the expression are reduced to their canonical forms (e.g. A-form). The elaboration means writing the types in their most explicit canonical form, no matter how redundant the types possibly become.

## Lifting
Somewhat (more less than more) similarly to Haskell, lifting in Agda refers to the elevation of a term of a lower universe into a higher universe.

In Haskell, one of the meanings of "lifting" is bringing a term, that is normally of one type, into another type (somehow perceived to be "higher"). For example, in a do-notation in the context of a monadic stack, the issued queries (commands, functions) can only be heard by the outermost monad; in order to address some of the nested monads, you need to lift a function (even though the nested monads are in the inner layers of a monad stack, i.e. instead of "lifting" it should be called "burying"). In Haskell, lifting also means to bring any term/type into the `IO` context.

## Simple data type
Simple data type is non-indexed data type.

## Sort
A sort or a universe is a type that contains (other) types. The fundamental sort is `Set`, actually `Set₀`, and it is the universe of small types.

## Strong normalization
Agda is strongly normalizing meaning that all terms reduce down to their respective canonical terms.

## Telescope
A telescope is a sequence of types where later types may depend on values of the previous types. Telescopes usually appear in data type and function definitions and their general form is: `∆ = (x₁ : A₁) … (xₙ : Aₙ)`. When there are consecutive occurrences of a type in a telescope we may combine them and write, e.g. `(x y : A) (z : B)` instead of `(x : A) (y : A) (z : B)`.

## Universe
A universe or a sort is a type that contains (other) types.

## Universe levels
To resist the Russell's and similar paradoxes, Agda avoids type-in-type by having a hierarchy of types, called universes. This hierarchy of types is indexed by levels (which appear as natural numbers) subscripts to a `Setₖ` or as its arguments, `Set k`, with `Set 0` at the lower end and `Setω` on the other (and further still).

## UTT-Σ
UTT-Σ is a fairly elaborate explicitly typed λ-calculus. It can be viewed as an extension of the Calculus of Constructions, `λPω`, of the λ-cube, which is the fullest-featured system of the λ-cube, featuring dependent types, polymorphic types, and type constructors. UTTΣ was introduced by Ulf Norell in his PhD thesis (Norell 2007), and it is the basic type theory underlying the Agda programming language.

UTTΣ differs from the calculus of constructions in three primary ways.

Rather than including just two sorts {\displaystyle {\text{Type}}_{0}}{\displaystyle {\text{Type}}_{0}} and {\displaystyle {\text{Type}}_{1}}{\displaystyle {\text{Type}}_{1}}, it includes an infinite hierarchy of sorts, {\displaystyle {\text{Type}}_{0},{\text{Type}}_{1},{\text{Type}}_{2},...}{\displaystyle {\text{Type}}_{0},{\text{Type}}_{1},{\text{Type}}_{2},...}.
Its sorts are cumulative, meaning that when {\displaystyle n\leq m}{\displaystyle n\leq m}, any type belonging to {\displaystyle {\text{Type}}_{n}}{\displaystyle {\text{Type}}_{n}} also belongs to {\displaystyle {\text{Type}}_{m}}{\displaystyle {\text{Type}}_{m}}. This fact means that types are not unique up to β-conversion, and necessitates the introduction of a subtyping relation.
It includes a wider variety of types than the calculus of constructions. It includes dependent pair types and a unit type in addition to sorts and dependent function types. The additional types are interesting primarily because of their interpretation under the Curry-Howard correspondence.
