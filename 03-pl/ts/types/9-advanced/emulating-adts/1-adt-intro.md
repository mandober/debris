# Algebraic Data Types

## ADTs

Algebraic data types (ADTs), originating in the FP, 
are about certain correspondences 
pertaining to type construction 
in the context of programming on the one hand, 
and mathematics on the other hand, 
in particular, between the concepts from 
algebra, logic, set theory and type theory.

## Introduction

This correspondence revolves around the ways in which compound types can be constructed provided a PL like Haskell that has proper and complete support for such constructions. So, the central question is as follows:
>In what ways can we combine existing types to create new compound types?

Before tackling this question, we need to go over some concepts as they pertain to types. *Cardinality* is usually mentioned in the context of set theory where it denotes the number of elements in a set. In type theory, cardinality is related to the concept of *type inhabitation*, and it is the number of values a type classifies. For example, an empty set has cardinality of zero, as does an uninhabited type (thus also called zero or empty type).

We can combine types `A` and `B` to create a new compound type `C`; then, to instantiate a value of the new type C, we may required that
- all component values are provided: a value of type A *and* a value of type B
- one component value is sufficient: either a value of type A *or* a value of B

We can also recognize a relation between the cardinality of the resulting compound type and the algebraic operation (well, more of the arithmetic operation) used to construct it:
- for *product types*, the cadinality of the resulting type is the product of the cardinalities of the component types, `|A| ⨯ |B| = |A ⨯ B|`
- for *sum types*, the cadinality of the resulting type is the sum of the cardinalities of the component types, `|A| + |B| = |A + B|`
- for *exponential types*, the cardinality of the resulting type is the cardinality of the base type `B` raised to the power of the cardinality of the exponent type `A`, that is, `|B| ^ |A| = |Bᴬ|`.

These 3 operations (more exists) along with the two basic types - the 0 type and the 1 type - are sufficient for doing *algebra on types*.
