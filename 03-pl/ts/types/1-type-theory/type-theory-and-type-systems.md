# Type theory and type systems

## Kinds of functions

### Functions on terms vs functions on types

```
functions on terms                      Functions On Types
term functions              vs          Type Functions
term-level functions                    Type-Level Functions
```

The 3 phrases on the right are used interchangibly, all intended to describe functions that work with types or at the type level. That is, they are commonly used to describe functions that use types instead of terms. Thus, we get 'type params' and 'type args', instead of just 'params' and 'args' (which refer to their term-level counterparts).

The 3 phrases on the right are contrasted by the 3 phrases on the left, none of which is used very often; instead, the unadorned term "function" covers all the uses. Without the types to complicate the picture, the only sort of functions are *functions on terms*, i.e. functions that take a number of terms (values) and produce a single value.

If we use *currying* to simplify the treatment of polyadic functions, converting them into (a series of) unary functions, we can talk about any function as if *it takes a single input and returns a single output*. For functions on terms, this means **term in, term out**.

With the introduction of types - well, not types per se, rather, by allowing functions to work on types as well - this picture gets quadruply complicated.

Not only do we get functions that work exclusively on types - *type in, type out* - but we also get two extra categories:
- functions from types (and possibly some terms) to terms
- functions from terms to types

These categories contain functions that, besides terms, also involve types - but how are types "involved" in functions which also "involve" terms?

Without the types complicating the picture, *functions on terms* (term functions, term-level functions) are familiar: they take any number of values and return a single value. Most languages have (term-level) functions, but they come with various restrictions and features across languages.

Issues that arise:
- functions as values (first-class functions)
  - function as argument, funarg or farg
  - returning a function
  - function order
    - first-order (distinct from the first-class)
    - second-order
    - higher-order
- anonymous functions
- support for closures
  - representing closures

When types enter the picture, another set of issue comes along:
- generic functions
  - first-class generic functions
  - abstracting over types
  - abstracting over type ctors, i.e. HKTs?
- type params
  - generic type params
  - constraining type params
- polymorphism
  - universal / ad hoc / row
  - parametricity, parametrical polymorphism
  - ad hoc polymorphism, overloading, type classes
  - row polymorphism (for record types)
- quantification, forall (∀) and exists (∃) quantifiers
  - forall: universally quantified type params
  - exists: existentially quantified type params
- Higher-order types:
  - first-order generic functions
  - second-order generic functions
  - higher-order generic functions
- Higher-kinded types (HKT):
  - kinds and the kind system
  - abstracting type ctors
- Higher-ranked types:
  - rank of functions, rank of type params
  - Rank-0 type: no forall-quantified type params
  - Rank-1 type: 1 level nesting of a forall-quantified type param
  - Rank-2 type: 2 level nesting of a forall-quantified type param
  - Rank-N type: arbitrary level nesting of a forall-quantified type param
  - positive and negative places of type params
- variance:
  - covariance
  - contravariance
  - invariance, nonvariance
- subtyping
  - subtypes and supertypes
  - top and bottom types
  - type hierarchy



### Functions as values

Do functions enjoy the same privileges as the other first-class values? Can we pass them around freely? Can a function take a function as an argument? Can we return a function from a function?

Giving a positive answer to this questions makes for a (sufficiently) functional language. Functions treated as the first-class values (like they are in JS/TS) makes programming very comfortable and many useful programming patterns become possible. This issue is perhaps well-established and known at the term level of JS, but this question is repeated at the type level (where the answer is also positive).






## The 4 categories of functions


so instead of working on terms (values), they work on types. However, if we do permuations with 'terms' and 'types' as input and output, we'd get these 4 categories of functions:
1. functions from terms to terms, `t → t`
2. functions from types to types, `T → T`
3. functions from types to terms, `T → t`
4. functions from terms to types, `t → T`

The 




so they take types as input and return types as output. Strictly, such functions would be *functions from types to types*.



Type-theoretically, this is achieved using *type functions*, which are type-level functions that take type(s) and produce (new) types. *Type constructors* are type functions.
