# Either type

Sum types are rarely supported in mainstream languages. It is fortunate that TS has union types which along with object types will give us some way to encode them.

*Union type*, on its own, is not sufficient to encode sum types because we cannot statically (i.e. without runtime examination) tell apart which of the two types a value (of some union type) originated from. In this regard, TypeScript's union type is like the union operation on sets, while we need to represent a disjoint or tagged union, so we know which set (type) an element (value) originated from.

```ts
type Union<A, B> = A | B
type MaybeString = Union<string, undefined>
type MaybeString = string | undefined
```


`Either` type, as a canonical coproduct type.

```hs
data Either a b = Left a | Right b
```

The `Either` ADT consists of two "halves" or two variants - members of a sum type are called *variants* - one tagged as `Left` and holding any type, and the other variant tagged `Right` and holding any type. The two variants may hold different types so we can't use the same type variable - we need two type variables - one for wach variant.

```ts
type Either<A, B> = Left<A> | Right<B>
```
