# 1. ADTs

The concept of algebraic data types (ADTs), originated in the functional programming paradigm, depicts a similarity between elementary algebra, especially how the basic arithmetical operations of addition and multiplication, that combine existing set elements to create new ones, correspond to certain ways of creating new types from the existing ones in the context of programming languages.

`A = (0, 1, +, ⨯)`

We can start with a simple set, consisting of just two base elements, `0` and `1`, which is also endowed with two operations, `+` and `⨯`, each of which combines two elements to generate a new element.

```hs
class Algebra a where
  zero :: a
  sum  :: a -> a -> a
  one  :: a
  mul  :: a -> a -> a
```

Resisting to wade through the land of algebraic structures, we better focus only on the *cardinality*, which is the main way how this correspondence manifests itself.

```ts
interface Algebra<A> {
  Zero: A
  One: A
  Add: (x: A, y: A) => A
  Mul: (x: A, y: A) => A
}
```

Correspondencies in the *algebra of types* with elementary algebra (arithmetics)
addition corresponds to *coproducts* and multiplication to *products*.

These correspondencies are cardinality wise, in the same way as they manifest with sets.


We first determine the two basic types corresponding to 0 and 1, respectively, and these can be readily recognized as the empty type and unit type. The *empty type* classifies zero values, and the *unit type* classifies exactly one.

A *product type* produces a new composite type by combining two component types such that the cardinality of the resulting type is the *product* of the cardinalities of the components.









```ts
type Either<A, B> = Left<A> | Right<B>

type EPair = [Left<A> | Right<B>, A | B]
```

Product types
- as sets: Cartesian product, A⨯B
- denotation, A⨯B
- cardinality is the product of cardinalities of A and B

Coproduct (sum) types
- denotation, A+B
- 

A (non-dependent) *sum type*, denoted `A + B`

is canonically represented by the `Either` type, 

Tuples represent non-dependent) products.

Functions represent the exponential types.


And basically when you are defining your own algebraic data type, you're just using - you're just doing it for a better API. You could, in theory, just stack tuples on top of eithers and do this like giant nested structure, where instead of defining like a data type with five constructors, you use Either five times nestedly. Yeah, and that's the same relationship between dependent types that will be user definable, and sigma types, and product types. So those two are the core concepts. If you understand them, you basically get the building blocks for dependent types. But then it's up to the users to define their own and apply them - apply the type system feature to design better APIs. Now, I will explain first dependent sums because they're easier, and then dependent products. So dependent sum, you can think of it as a generalization of normal sums. So if you think - you can think about an Either value actually as a pair. So as the first component you have the constructor, it's either left or right. And as the second component, you have the value attached to it, it's either the value of one type or the other type. And in this sense, the first value in this pair determines the type of the second value. So if you have for example, Either Int Bool. Then Left in the first component means you have an Int in the second component and Right in the first component means that you have a Bool in the second component. And this is basically the dependency. That's how the type of one value can depend on another. 
