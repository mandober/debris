# Algebraic Data Types







The first way of constructing types is a product type construction. A *product type* requires that all member types (i.e. a value of each member type) is supplied in order to create a new value of the product type. 


Looking at the majority of mainstream PLs, we'll find arrays, tuples, structs, records, classes, objects. TS has most of these 'types' - the quotes around the term 'types' demonstrate a peculiarity in that these are *not really types per se, but ways of type construction*. Each of them comes with a set of different properties, but what they all have in common is that they are all product types.

**Product types** are one of the algebraic data types; that is, product types are a way to construct new compound types by combining existing types, such that the cadinality of the resulting product type is the product of cardinalities of its component types.







like the other ADT classes, combine types in a particular way to define new compound types. That particular way in which the existing types are combined requires that all component types (i.e. their values) are present at initialization.





and like all ADT 

where, in order to create the resulting compound type, each component type must be provided (that is, a value of each of the member types).


of ADTs and a way to create a new type by combining existing ones such that all component types (their values) must be provided, i.e. each value must be present on initialization. 

Like many compound, complex types, a new product type is first described in terms of types, similarly to how a class is first defined before an object of the class is created. 

In TS, we can use `type` or `interface` to describe a new compound type, and when we want to instantiate it, we'll have to supply a value of each of its component types. 

This means in order to create a type `C`, which is a compound type consisting of two member types, `A` and `B`, we have to provide *both* `a: A` *and* `b: B`. 




the name product will be justified in that we'll have to provide a value of each member type. Actually, the reason such a type is called a product type has to do with *type inhabitation*. 





when a new value of this new type is instantiated (declared and initialized).





Pulling different types together to create a new type is a type construction called a *product type*. The fundamental characteristic of product types is that a value of each member type must be provided to create the resulting type. So a product type is not really a name for the resulting type, but more of a name for this particular way of creating a new type where 








Namely, arithmetic operations 




Primarily, this is about type construction, about the ways how the existing types are combined to create new types.




As the name suggests, algebraic data types are about data types of a PL, in particular, how some data type constructions correspond to the elementary algebraic operations.


It is a correspondence between the ways 

the basic arithmetical operations of addition and multiplication combine existing numbers (e.g. elements of the set ℕ) to create new elements, 

and the similarity to how some type constructors combine existing types to create new types in the context of programming.


cardinality-wise

(aka elementary algebra) 

In particular, it is how the 

Namely, the manifested correspondence is cardinality-wise and concerns set inhabitation on the one side and type inhabitation on the other.





Algebraic data types (ADTs) are a way to construct types that resambles operations of arithmetics (aka elementary algebra), cardinality-wise. The zero type corresponds to 0, the unit type to 1, coproduct types (sums) to addition, product types to multiplication, exponential types to exponentiation; there are also additional but less-explored correspondencies (e.g. quotient types). The correspondence has to with cardinality of the types, i.e. the number of values they classify. For the base types: the zero type classifies no values and the unit type classifies one. As for the operations: and algebraic operation on types combines two types A and B to produce a new type:
- The cardinality of a sum type is the sum of the cardinalities of the component types, `|A| + |B| = |A + B|`.
- The cardinality of a product type is the product of the cardinalities of the component types, `|A| ⨯ |B| = |A ⨯ B|`.
- The cardinality of an exponential type is the cardinality of the type B raised to the power of the cardinality of the type A, `|B| ^ |A| = |Bᴬ|`.

## Algebraic data types

## Overview of ADTs

- `(0, 1, +, ⨯, ^)`   in arithmetics
- `(⊥, ⊤, ∨, ∧, ⇒)`   in logic
- `(∅, {∅}, ⊎, ⨯, →)` in set theory
- `(𝟘, 𝟙, +, ⨯, →)`   in type theory
- `(Void, (), Either, (,), ->)` in Haskell
- `(never, unknown/[], union+object, tuple, function)` in TS






>Zero corresponds to
- 0 in arithmetics
- falsum in logic
- the empty set in set theory
- uninhabited type in type theory
- the zero type, or empty types
- |𝟘| = 0

>One corresponds to
- |𝟙| = 1
- 1 in arithmetics
- verum in logic
- the simgleton set in set theory
- an inhabited type in type theory
- the unit type, simgleton types


>Product types correspond to
- addition in arithmetics
- conjunction in logic
- Cartesian product in set theory

>Coproduct types correspond to
- multiplication in arithmetics
- disjunction in logic
- disjoint union in set theory



On the algebraic side, we have the 4-tuple `Alg = (0, 1, +, ⨯, →)` consists of the base set `S`, which only has two elements, 0 and 1, but is endowed with two binary operations, + and ⨯, that combine existing elements to make new ones.

On the side of programing languages, we should come up with a similar 4-tuple that may be even denoted the same, `PL = (0, 1, +, ⨯, →)`, except here we interpret `0` as the empty type, `1` as the unit type, `+` as the sum type construction, and `⨯` as the product type construction.

>Product types correspond to
- addition in arithmetics
- conjunction in logic
- Cartesian product in set theory

>Coproduct types correspond to
- multiplication in arithmetics
- disjunction in logic
- disjoint union in set theory

Determining what the *zero type* and *one type* should be in a given programming language is usually evident. The same is true for recognizing the product types because almost all PLs not only support product types but offer them in several verieties (records, tuples, asociative arrays, etc.). This is not the case with coproduct (sum) types. Why most PLs lack the proper support for coproducts is unclear.

Having several cndidates for products is good, but there is the need to pick one as the most representative and call it the canonical product type (i.e. the canonical product *type construction*, which usually amounts to some product *type constructor*). *Tuples* are commonly picked for this role, and, fortunately, TS has (artificial) support for tuples.

The problem is then, as is often the case across different languages, to find a suitable representation for sum type construction (or constructor).
