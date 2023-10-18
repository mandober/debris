# ADTs in TS

## TL/DR
The possibility of defining ADTs in TS and the disussion of ADTs and various types (zero type, bottom, unit) from the type theorethical point of view.

## ADTs in TS

Algebraic data types (ADTs) correspond to elementary arithmetic where there is a set of basic elements, i.e. numbers, especially the numbers 0 and 1. Also,there are operations that combine the basic elements in order to create more elements. In arithemtic, the set `{0, 1, +, ⨯}` is more than sufficient to create the rest of numbers; for example, 1 + 1 = 2, and also 2 ⨯ 1 = 2. To see how this translates to type theory is to first recognize which types correspond to the numbers 0 and 1.

The way this correspondence works is through *cardinality*. Types are more than just sets, but since they are sets, they have cardinality, which is the number of elements, i.e. values, a type contains. For example, the Boolean type contains two elements (values), 'true' and 'false'.


## Products and coproducts

We have identified zero and unit type as the basic elements that correspond to the basic element of arithemtic, i.e. to numbers 0 and 1, and now we need to identify the operations that can combine the basic elements; that is, *which functions operating on types behave like addition and multiplication operating on numbers*.

Type that corresponds to addition is called sum or coproduct type, and the one corresponding to multiplication is called product type.

### Naming issues

Vent: previous sentences try to avoid the use of articles to qualify the noun phrases 'sum type' and 'product type' because it is unclear which should be used. In fact many things are unclear concerning sum/product type(s?), like: Is there more than one sum/product type (per language)? If there are, are they acknowledged as separate, or are they considered the same 'up to an isomorphism'? Which syntactical category do sum and product types belong to? That is, what really are they? Is it 'product type' or 'product types'? Are they types or type constructors or some other type functions? These questions are not very important, but still, it would be nice to have a straight answer, a well-rounded theory concerning this subject, that attaches nice labels to the palyers involved. I mean, some elementary things are not even clear: like what to call the member types of sum and product types. Member types of sum types are sporadically called variants, but then again the values of sum types are also so called.

We'll use the name *variants*, or variant types, to refer to the constituent member (types) of a sum type. Or just *coproduct member types*. We don't have any candidates to name the members of a product type, so they will be referred to as *product member types*.

All this is not crucial, but having the proper labels for things is fundamental to get the issue across. Otherwise people'll start making shit up (a hint and a warning).

## Product type

Product type corresponds to multiplication. There is no problem finsing a suitable product type since many languages have a bunch. Pairs, tuples, records, objects, are all product types.

>The fundamental requirement of product types is that all *member types* (i.e. all values of member types) must be present in order to construct an instance of a product type.

Product types behave like logical AND.

In TS, *tuple type* is the canonical product type.

```ts
// tuple type is the canonical product type
type And<A, B> = [A, B]
```



The fundamental difference between product and coproduct types is in the presence of 

that we need 

providing only one variant, i.e. only one value of any variant type, is sufficient to construct an instance of a coproduct type. This is contrasted to product types which require the presence of all values, i.e. a value of each member type, in order to construct an instance of a product type.


Coproduct type, or more commonly *sum type* is thus called because of its cardinality: the total number of elements (values) in a sum type is the sum of the number of elements in its two member types, called *variant types*.



## Coproduct type


In TS, *union type* is the canonical sum type. Fuuuck... come to think of it, it is not; it cannot be a sum type because a TS's union type behaves like a set in that it collapses its elements, e.g. `(boolean | boolean)` type is just `boolean`. It is not a discriminated union which a sum type must be. And it must be a *discriminated or disjoint union* in order to preserve the origin of elements, so we can tell which variant an element came from. Shiiiit, what else is there?

```ts
// union type is the canonical sum type.
type Or<A, B> = A | B
// No, it's not.
```
