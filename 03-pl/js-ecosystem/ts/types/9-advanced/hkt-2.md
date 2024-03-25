# Higher-kinded types

https://ybogomolov.me/01-higher-kinded-types

Let's take a look at the familiar and well-studied array. An array, like a list, is a data structure that expresses the idea of ​​non-determinism: it can store any number of elements all of the same type `a`. Moreover, if we have a function `a -> b`, we can "ask" the array to apply it by calling `map`, yielding an array of the same size but with elements of the type `b`, and in the same order as in the original array. In short, mapping a container does not change the container nor its size.

```ts
const as: number[] = [1, 2, 3, 4, 5, 6]
const toStr = (a: number): string => a.toString()
const bs: string[] = as.map(toStr) // [ '1', '2', '3', '4', '5', '6' ]
```

Let's move `map` from the array prototype into a separate interface `MappableArray`. As a result, we get a *higher-order function* polymorphic in the input and output types.

```ts
interface MappableArray {
  readonly map: <A, B>(f: (a: A) => B) => (as: A[]) => B[]
}
```

If we look at other data structures, we see that a similar mapping function can also be implemented for `Set`, `Map`, `Tree`, `Stack`, etc.

This is how the signatures of `map` functions change:

```ts
type MapForSet   = <A, B>(f: (a: A) => B) => (as: Set<A>) => Set<B>
type MapForTree  = <A, B>(f: (a: A) => B) => (as: Tree<A>) => Tree<B>
type MapForArray = <A, B>(f: (a: A) => B) => (as: Array<A>) => Array<B>
type MapForStack = <A, B>(f: (a: A) => B) => (as: Stack<A>) => Stack<B>
type MapForMap   = <A, B>(f: (a: A) => B) => (as: Map<any, A>) => Map<any, B>
```

The signatures are very similar so how can we abstract the concrete data structure and write a generalized `Mappable` interface?

For such abstraction to be possible, it is necessary for the language to support *higher-order kinds*, i.e. it must have the ability to abstract *type constructors*.

`Set`, `Tree`, `Array` and `Stack` are all *type constructors*: each expects a single type as an argument to become saturated. Without the type arg, they are all unsaturated so they cannot classify any values - they are empty types. Also, all 4 are *unary type ctors* - each expects exactly one type argument. And, moreover, that type arg must itself be a saturated type (non-empty type). For example, when the `Set` type ctor is given the type arg `number`, it becomes saturated as `Set<number>`. Similarly, if we then pass `Set<number>` to the Array type ctor, it becomes saturated as `Array<Set<number>>`.

All 4 mentioned type ctors and unary, and thus each has kind `* -> *`, where `*` denoted a saturated type. Using Haskell to denote their kinds:

```ts
type Array<A> = A[]
// the type ctor Array (by itself) has kind
Array :: * -> *
// the type Array<A> has kind:
Array<A> :: *
// the type param A may be instantiated
// by giving in any saturated type:
Array<number> :: *
Array<string> :: *
Array<Set<string>> :: *
Array<Array<string>> :: *
Array<Array<Array<string>>> :: *
```

>Only saturated types may classify values, i.e. if a type classifies values, it must be saturated.

Actually, the empty type, `never`, is the only saturated type that does not classify values - because it is empty.

Translating the above into the TypeScript terminology, we need to be able to write a *type that accepts other generic types as generic arguments*. That is, a type that accepts a type ctor as an argument - so a type that can accept, e.g. the type ctor `Set` as a type arg.

```ts
interface Mappable<F> {
  readonly map: <A, B>(f: (a: A) => B) => (as: F<A>) => F<B> // ERROR!
}
// or
type Mappable<F> = <A, B>(f: (a: A) => B) => (as: F<A>) => F<B> // ERROR!

// we would then be able to instantiate F with a concrete type ctor:
type MappableSet<A>   = Mappable<Set>
type MappableArray<A> = Mappable<Array>
type MappableTree<A>  = Mappable<Tree>
type MappableStack<A> = Mappable<Stack>
```

However, this is (as of TS 5.2) not possible and we get an error: *"Type `F` is not generic"*.

The type param `F` has the kind `* -> *` because it is intended to be instantiated with a unary type ctor (all of which has this kind). And after `F` is instantiated with a unary type ctor, the resulting type, like `MappableSet<A>`, would still expect a (normal, saturated) type argument `A`. Only when this type param is also instantiated with a type do we get a fully saturated type, like `MappableSet<number>`.

```ts
// In pseudo TS, this HKT would look like this
type Mappable<F><A> = …
// Then it could be specialized first into (F := Set):
type MappableSet<A> = Mappable<Set><A>
// and then finally to a saturated type (A := number):
type MappableSetOfNumbers = Mappable<Set><number>
```

In fact, above, the HKT `Mappable` is defined in the curryied form, so we can specialize (instantiate) it in two steps, which give us more options, i.e. we can first instantiate the type param `F` with a type ctor, and later we can instantiate the type param `A` with a type. The HKT `Mappable` can also be expressed in its uncurryied form, in which case we would need to supply both, a type ctor and a type at once.

Unfortunately, none of this works in TypeScript because TypeScript doesn't allow for type args (like `F`) to accept generic type args:

```ts
type Mappable<F, A> = … // this is the only form that TS allows
type Mappable<F><A> = … // not allowed
type Mappable<F<A>> = … // not allowed
```

However, despite the lack of direct support for HKTs, we can still encode the same concept using the ideas from the paper "Lightweight higher-kinded polymorphism" by Jeremy Yallop and Leo White, which was inspired by the *defunctionalization* techiques invented by John C. Reynolds in his 1972 paper "Definitional Interpreters for Higher-Order Programming Languages".

## Lightweight higher-kinded polymorphism

Defunctionalization is a technique for translating higher-order programs into a first-order language. It was originally invented by Reynolds to convert higher-order functions (which take functions as args) into first-order functions (which do not). Using this techique, a call to a HOF is converted into a call to a data structure which also holds any HOF's arguments. Later, such construction can be interpreted i nvarious ways. A similar technique can be used to emulate kinds.

So, we want to express the following idea: there is a generic type `Mappable`, which has a type param `F`, which itself is a *first-order type ctor*, i.e. a *type ctor parameterized by a type* (like `Set<A>`, but `F` is to be instantiated with `Set` only, not with `Set<A>`). So `F` is a generic type that takes an ordinary, saturated, *non-polymorphic type* as an argument.

By applying the defunctionalization technique, we'll do the following:

1. Replace `F` with a *unique type identifier*. We'll use *string literal types* (SLT) for this. Each type ctor will be associated with a particular SLT. A SLT will unambiguously indicate which type ctor we want to reference. For example, these SLTs will be `"Array"`, `"Set"`, `"Tree"`, etc. By the way, a SLT `"Array"` has only a single value - `"Array"`, but we won't use STLs as types per se, but as *indices*, so we can index into a map of types.

```ts
type MapOfTypes = {
  "Array": 0,
  "Set": 1,
  "Stack": 2,
}

// using a SLT to index into a map of types:
type getArray = MapOfTypes["Array"] // 0
type getSet   = MapOfTypes["Set"]   // 1
type getStack = MapOfTypes["Stack"] // 2
```

Here, the resulting types are number literal types (`0`, `1` and `2`), but this is just to show the indexing - we'll use different types for the result of this mapping.

2. Create a utility type `Kind1<IdF, A>` to represent a call to `F`, along with the type param, `A`, that `F` expects. That is, a call like `Kind1<"F", A>` will emulate the call `F<A>`. More concretely, the call `Kind1<"Array", A>` will emulate the call `Array<A>`, and the call `Kind1<"Set", A>` will emulate the call `Set<A>`.

The type is named `Kind1` to remind us that it is only intended for *unary type ctors*, i.e. those of kind `* -> *`. As the need arises, we'll create more of these types (`Kind2`, `Kind3`, etc.) to emulate type ctors of other kinds.

3. To simplify the interpretation of the `Kind*` types, we'll create a set of dictionary types, which will store the relation between the *type identifier* and the *polymorphic type ctor itself*. There will be a single such dictionary for types of each arity.

For unary type ctors:

```ts
// 1.1) dictionary for unary type ctors
interface URItoKind1<A> {
  'Array': Array<A>
}

// 1.2) sum type of names for unary type ctors
type URIS1 = keyof URItoKind1<unknown>

// 1.3) translation
type Kind1<F extends URIS1, A> = URItoKind1<A>[F]
```

And for binary type ctors:

```ts
// 2.1) dictionary for binary type ctors
interface URItoKind2<A, B> {
  'Map': Map<A, B>
}

// 2.2) sum type of names for binary type ctors
type URIS2 = keyof URItoKind2<unknown, unknown>

// 2.3) translation
type Kind2<F extends URIS2, A, B> = URItoKind2<A, B>[F]
```

The only thing left to do is to provide users the opportunity to extend the `URItoKindN` dictionaries, and not rely on the authors of the library in which this technique is used.

This is where a great TS feature comes to the rescue - *module augmentation*. Namely, interfaces with same name, defined in different modules, are merged into one interface. With this feature it'll be enough to place the code with defunctionalized kinds in the main library, and from the custom code, the definition of a higher-order type will be simple.

Using and extending defunctionalized HKTs:

```ts
import { Kind1 } from '⦂/hkt/hkt.ts'

// example type ctor
type List<A> = Array<A>

// module augmentation in order to merge interface URItoKind1
// with the definition of a new type ctor
declare module '⦂/hkt/hkt.ts' {
  interface URItoKind1<A> {
    'List': List<A>
  }
}

// will be inferred as List<string>
type ListOfStrings = Kind1<'List', string>
```

## Emulating type classes

Now we can define the `Functor` type polymorphically for any unary type constructor, and then we can implement instances of it for different data structures.

This `Functor` type is actually the `Functor` typeclass, which in Haskell is implemented like this. We also implement the `Functor` typeclass instance for `List` unary type ctor.

```hs
-- Functor class
class Functor f where
  fmap :: (a -> b) -> f a -> f b

-- instance of the Functor class for List a
instance Functor List where
  fmap :: (a -> b) -> List a -> List b
  fmap f [] = []
  fmap f (x:xs) = f x : fmap f xs

-- instance of the Functor class for Map k v
instance Functor (Map k) where
  fmap :: (a -> b) -> Map k a -> Map k b
  fmap f m = if null m then m else map f m
```

We can emulate type classes and their instances in TS:

```ts
// Functor1 type class for unary type ctors
interface Functor1<F extends URIS1> {
  fmap: <A, B>(f: (a: A) => B) => (as: Kind1<F, A>) => Kind1<F, B>
}

// Functor2 type class for binary type ctors
interface Functor2<F extends URIS2, K> {
  fmap: <A, B>(f: (a: A) => B) => (as: Kind2<F, K, A>) => Kind2<F, K, B>
}


// Functor1 type class instance for Array
const Functor1Array: Functor1<'Array'> = {
  // xs has type A[] without mentioning the utility type Kind1
  fmap: f => xs => xs.map(f)
}

// Functor1 type class instance for Set
const Functor1Set: Functor1<'Set'> = {
  fmap: f => xs => new Set(Array.from(xs).map(f))
}

// Functor2 type class instance for Map<K, V>
const Functor2Map: Functor2<'Map', K> = {
  fmap: f => xs => new map(Array.from(xs).map(f))
}
```
