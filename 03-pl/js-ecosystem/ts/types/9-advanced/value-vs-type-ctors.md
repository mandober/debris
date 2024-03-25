# Value vs type constructors

If we ignore the existence of literal strings for a moment, and only admit the `String` constructor function. Then, to create a string we must call the `String` function ctor and pass it some string, e.g. `new String('abc')` (also ignoring that 'abc' is a string literal). The same goes for the other primitives like `number`, `boolean`, etc. In this situation, we can say that a *value or data constructor* is a function that creates values.

On the other hand, JS also has function constructors like `Array`, `Set`, `Map`, etc. but these are different than value ctors: a ctor like `Number` only accepts numbers as arguments, but the `Array` ctor must accept any type whatsoever. In fact, the `Array` ctor can be represented, as TS does it, as a generic function, aka a type function (function on types) denoted by `Array<T>`.

When we analyze `Array<T>`, we can see that it `Array` is a type, but not in the same category as the type like `Number`. While the type `Number` classifies values (numbers), the type `Array` classifies shit; at least until it is given a type as an argument. Then, a type like `Array<number>` does indeed classify values.

```ts
// e.g.
type Array<V> = … // V[]
type Set<V> = …
type Map<K,V> = …
type Function<P,R> = …

// in general, we have a type ctor TC that takes some type args
type TC<…> = …

// we can generalize unary type ctors as
type TC1<A> = …

// we can generalize binary type ctors as
type TC2<A, B> = …

// we can generalize ternary type ctors as
type TC3<A, B, C> = …
```

If we'd liek to discuss variance, we would have to write out examples with concrete type ctor, e.g. 
Since `"abc"` string literal type is a subtype of `string`: 
- Can we use the type `Array<"abc">` where type `Array<string>` is required?
- Can we use the type `Set<"abc">` where the type `Set<string>` is required?
- Can we use `(x: "abc") => T` for `(x: string) => T`?
- Can we use `(x: T) => R` for `(x: T) => R`?

If `A` is a subtype of `Aʹ`, can we use _ where _ is required:

```ts
type A = // opaque type
type Aʹ = A | B | C // B and C are some, unimportant, types

A                       /* vs */  Aʹ
A[]                     /* vs */  Aʹ[]
Array<A>                /* vs */  Array<Aʹ>
Set<A>                  /* vs */  Set<Aʹ>

// Map<K, V>
Map<A, _>               /* vs */  Map<Aʹ, _>
Map<_, A>               /* vs */  Map<_, Aʹ>

// (...xs: any[]) => any
(...xs: A[]) => _       /* vs */  (...xs: Aʹ[]) => _
(...xs: any[]) => A     /* vs */  (...xs: any[]) => Aʹ
```
