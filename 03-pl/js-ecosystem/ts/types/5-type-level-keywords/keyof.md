# TS :: Types :: Type-level keywords :: keyof

The `keyof` type-keyword retrieves the keys (indices) of a type. It is used in generic context as

`<T, K extends keyof T>`

where `T` represents the type of an object, and `K` represents the type (a single type) of `T`'s keys.

A standalone reference to T's keys: `T[K]`, means the type of T's properties as indexed by the `K` type (or something like that :).

# `keyof` type operator

https://www.typescriptlang.org/docs/handbook/2/keyof-types.html


The `keyof` operator takes an *object type* and 
produces a string (or numeric) *literal union of its keys*.



In the following example, the type `P` 
is the same type as: `type P = "x" | "y"`

```ts
type Point = { x: number, y: number }
type P = keyof Point
//   P becomes the type:
type P = "x" | "y"
```


If the type has a *string or number* **index signature**, 
`keyof` will return those types instead:

```ts
type ArrayLike = { [n: number]: unknown }
type A = keyof ArrayLike
//   ↓
// type A = number


type MapLike = { [k: string]: boolean }
type M = keyof MapLike
//    ↘
// type M = string | number
```

Note that in this example, `M` is `string | number` because **JS object keys are always coerced to a string**, so obj[0] is the same as obj["0"].


The *keyof types* are especially useful when combined with *mapped types*.
