# TS :: Isomorphism

## Notions of equality

The concept of isomorphism is found across mathematics, especially in set theory, type theory, category theory.

The notion of equality is usually considered in its absolute sense: two things are equal if they are identical in every way. However, other, more relaxed notions of equality are also practical. For example, two books are equal if they are (absolutely) identical, but a more practical notion may be to consider them equal if they share the same ISBN.

The notion of equivalence is usually considered as a more relaxed notion of equality. After it comes isomorphism, and then other notions of sameness such as congruence, proximity, similarity and other correspondencies.

All these notions of samness are actually equivalence relations since all are reflexive, symmetric and transitive, and any of them (save maybe for equality) must be specified as there is no universally agreed upon hierarchy classifying these notions of sameness.

## Isomomrphism

An isomomrphism or correspondence is an equivalence relation since it is reflexive, symmetric and transitive. An isomorphism relates two objects and states that they are *isomorphic* if a bijective exists between them.

In set theory, for example, two sets are deemed isomorphic if there is a *bijective function*, aka *one-to-one correspondence*, between them. In case there is only one such bijection, it is said that these sets are *equivalent up to an unique isomorphism* (where the unique isomorphism is that bijective function). In case more than one bijection exists, it is said that these two sets are *equivalent up to an isomorphism*.

An isomorphism actually consists of two functions, commonly called `from` and `to`, and a couple of properties that must be satisfied.

So, if the two functions exist, and if the two properties are satisfies, then the two objects are interconvertible - one may be converted into the other and vice versa. The fact that they are interconvertible makes them interchangible, in some contexts (if this is desired): the two objects are sufficiently equal or equiivalent that they may be considered the same object (in that context).

For example, all singleton sets are isomorphic to each other. In category theory, in category Set, all these singleton sets are indistiguishable from each other, so category theory often talks about the singleton object (objects in category Set are sets and arrows are set functions) as though there is only one; this is acceptable because they are all isomorphic and therefore indiscernable.

An **isomorphism** (between two objects A and B) 
is defined as a pair of funtions,
`to : A → B` and `from : B → A` 
such that 
`from ∘ to = id = to ∘ from`.

In addition to the existence of the two functions, `to : A -> B` (which converts object A into object B) and `from : B -> A` (which does the opposite), it is also required that the composition of `from` after `to` (i.e. the application of `from` after the application of `to` to an argument `a : A`), denoted as `from ∘ to` or, fully expanded, as `(from ∘ to)(a)` = `from(to(a)) = id(a) = a`, gives the same object back as the application of `id` to that object.

given
  a: A, b: B
these two bijections must exist
  to: A → B
  from: B → A
such that
  from . to = id = to . from
for there to be an isomorphism between (types) A and B.


Visually,

```
     a
     ↓
to : A → B
         ↓
         b
         ↓
  from : B → A
             ↓
             a = id(a)
```

Applying the function `to` to a value `a` of the type `A`, produces `b` of type `B`; applying `from` to the return value of `to`, gives us back `a` of type `A`. The end result, `a`, is the same as when we apply `identity` function to `a` - we get back `a`.


`from(to(a)) = id(a) = a` and `to(from(b)) = id(b) = b`



### Defining isomorphism in PLs

#### Defining isomorphism in Agda

Agda can define isomorphism as well as the properties that must hold.

```hs agda
-- bijections
to   : A → B
from : B → A
-- properties (axioms)
from∘to : ∀ (x : A) → from (to x) ≡ x
to∘from : ∀ (y : B) → to (from y) ≡ y
-- or:
from∘to : ∀ {x : A} → from ∘ to ≡ id
to∘from : ∀ {y : B} → to ∘ from ≡ id


-- all above defined as a redord
record _≃_ (A B : Set) : Set where
  field
    to   : A → B
    from : B → A
    from∘to : ∀ (x : A) → from (to x) ≡ x
    to∘from : ∀ (y : B) → to (from y) ≡ y
```



For example, these two sets A and B, defined as follows, are isomorphic (to each other), or we say that there is an isomorphism between them.
- A = {0, 1}
- B = {true, false}



some (random) type `flag = 1 | 0` is isomorphic to the Boolean type, `bool = true | false` because there are two bijective functions that can convert one type into the other: `{true ⇔ 1, false ⇔ 0}` and `{true ⇔ 0, false ⇔ 1}`. 








The definite article in the phrase "the zero type" suggest that this type is unique (in a given language), but it may actually mean that, even if there are several uninhabited types, they are all *unique up to an isomorphism*. In other words, they can be considered to be *practically the same* from a particular point of view. Here, that point of view is cardinality as related to the discussion of ADTs. So two types are considered the same if they have the same cardinality. 

The indefinite article in the phrase "an isomorphism" suggests that there may be more than one bijective function that converts one type into the other. *An isomorphism is a bijective function* that can convert type A into type B and vice versa. The condition for two types to be isomorphic is that they have the same cardinality. 

For example, some (random) type `flag = 1 | 0` is isomorphic to the Boolean type, `bool = true | false` because there are two bijective functions that can convert one type into the other: `{true ⇔ 1, false ⇔ 0}` and `{true ⇔ 0, false ⇔ 1}`. 

This is what is meant by saying that the types `flag` and `bool` are isomorphic up to *an* isomorphism. So, cardinality is one dimension of comparison between types and one characteristic according to which two types may be the same.
