# Higher-kinded types

Higher-kinded types (HKTs) let us write types that abstract type ctors, i.e. they take a type ctor as a parameter; a type ctor may take parameters on its own. For example, in `Array<A>`, `Array` is a unary type ctor - unary because it takes a single type argument, `A`; similarly, in `Set<A>`, `Set` is a unary type ctor that takes a type argument `A`.

However, if we'd like to implement a function that adds an element to a collection, regardless if the collection is an array or set or some similar collection, we'd need a HKT, i.e. we'd need to parameterize a type name by a type parameter intended to be instantiated only by type ctors of kind `* -> *` (and not by regular types of kind `*`).

In Haskell, HKTs are employed to define type classes that take type ctors. For example, `Functor` is a type class that defines the method `fmap`. Any type that can be mapped over can become an instance of the `Functor` class and then we can apply `fmap` on a general type param `f`, knowing that `f` is a member of the `Functor` class (and thus has the `fmap` method defined fo sho).

In fact, `Functor` has a type param of kind `f :: * -> *`; its kind restricts the set of possible type (ctors) we can instantiate it with to type ctors that (still) *expect at least one type argument*. The word "still" is here used to imply that besides unary type ctors (such as `Array<A>` and `Set<A>`), we can also make any polyadic type ctor an instance of `Functor` by *partially applying* it. That is, we can fix all but one type parameter (all but the last type param), such that its kind becomes `* -> *`.

For example, in `Map<K, V>`, the kind of `Map` is `* -> * -> *` because it takes two types as arguments. In Haskell and in TS, but using a pseudo notation, kinds would be expressed as:

```hs
Map k v :: *
Map k :: * -> *
Map :: * -> * -> *
```

The kind `*` means that the type is completely saturated - if it ever took some type param, then all type args have been provided. All base primitive types (`number`, `string`, `boolean`, etc.) have kind `*`. All unary type ctors (like `Array` and `Set`) that have become saturated (`Array<number>`, `Set<string>`) also have kind `*`. Note that it is a type ctor by itself, like `Array`, that has the kind `* -> *`, while `Array<number>` or even `Array<A>` have kind `*`, even though `Array<A>` may seem unsaturated - this means that the type arg `A` is *fixed* but we don't specify to which concrete type (as it's not important); that is, we don't specify the concrete type to which the type param `A` is instantiated since this is not important (whether `A` is `number` or whatever saturated type, is not that important).


## Exmaples of some kinds

```ts
Map : * -> * -> *
Map<K> : *
Map<K, V> : *

type Map<K, V> = Map<K, V>

type CMap<V, K> = Map<K, V>
type Map_ToNum<K> = CMap<number, K>

type MapNum<V> = Map<number, V>
type MapStr<V> = Map<string, V>
type MapNumToStr = Map<number, string>
type MapStrToNum = Map<string, number>

Map<Set<A>, Array<B>> : *
Map<Set<number>, Array<string>> : *

Set : * -> *
Set<A> : *

Array : * -> *
Array<A> : *
Array<number> : *
Array<string> : *
Array<Array<number>> : *
Array<Array<Array<number>>> : *

Array<Set<Array<number>>> : *
Set<Array<Set<Array<number>>>> : *

type Fun<A, B> = (a: A) => B
```
