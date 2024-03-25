# Higher-kinded types

https://serokell.io/blog/typescript-for-haskellers#hkts

TypeScript's type system does not have *kinds*. Kinds classify the type ctors (by arity).

Higher-kinded types (HKTs) let us write types that abstract the type ctor, i.e. the type ctor is taken as a parameter, creating another level of abstraction.

For example, imagine that the type ctor is not a specific type, but a concrete type ctor, like `Map` or `Array`, is passed in as a param.

Theoretical implementation would look like this:

```ts
// (pseudo) type class Collection
type Collection<F> = {
  create: <A>()                  => F<A>
  insert: <A>(v: A) => (c: F<A>) => F<A>
}

// (pseudo) instance of the type class Collection for Array
const collectionArray: Collection<Array> = {
  create: ()  => [],
  insert: (v) => (c: number[]) => [...c, v]
}

// (pseudo) instance of the type class Collection for Set
const collectionSet: Collection<Set> = {
  create: ()  => Set(),
  insert: (v) => (c: Set<A>) => c.add(v)
}
```

The `Collection` type function is *parameterized by a unary type ctor*. It expects a type ctor, like `Array`, to be passed in, specializing the `Collection` to, e.g. `Collection<Array>`.

The type param `F` has kind `* -> *`, meaning it is a unary type ctor. For example, `Array` and `Set` have kind `* -> *`, but when the type ctor is *saturated*, e.g. `Array<number>` or `Set<string>`, it has the kind `*`.

The unary type ctors like `Array` and `Set` do not classify values - by themselves they are empty types. But `Array<number>` or `Set<string>` do classify values. So both `Array` and `Set` are type ctors that await for the concrete type (of the kind `*` like `number` or `string`) to saturate them. We cannot pass the type ctor `Set` to the Array type ctor, like `Array<Set>` because `Set` does not have kind `*` but its kind is `* -> *` (as is the `Array`'s). However, we can pass `Set<string>` to `Array` because `Set<string>` has the appropriate kind `*`, thereby obtaining `Array<Set<string>>`.

Higher-kinded types go further in parameterization, parameterizing type ctors.

## Defunctionalization

TS does not support kinds but we can emulate them with defunctionalization, which began as a way to represent higher-order functions in a first-order language (i.e. language without higher-order functions). It can also be used whenever there is a need to represent higher-order program in a first-order language.

The main idea is to defunctionalize higher-kinded types (type functions) by mapping the name of each type constructor to its implementation.

We must create one `Kind`-like type for each kind of type ctors:
- `Kind1` to classify unary type ctors of kind `* -> *`
- `Kind2` to classify binary type ctors of kind `* -> * -> *`
- `Kind3` to classify ternary type ctors of kind `* -> * -> * -> *`
- `KindFX` to classify type ctors of kind `(* -> *) -> * -> *`
- etc.

This is unfortunate because there is an infinite number of distinct kinds, but we can create a new Kind-like type when the need arises. Normally, we'll need a handful of the most commonly used kinds, but for now we concentrate on the unary, `Kind1`, and binary, `Kind2`, type ctors.
- `Kind1` classifies unary type ctors of kind `* -> *`
- `Kind2` classifies binary type ctors of kind `* -> * -> *`

We also need to define the types that translate URIs (identifiers) to Kinds. An *URI* (uniform resource locator) is just the name of a type ctor, such as "Array", "Set", "Map", etc.
- `URItoKind1` translates URIs of unary type ctors to their kind
- `URItoKind2` translates URIs of binary type ctors to their kind

- `URItoKind1` translates URIs of unary type ctors to their kind
- `URItoKind2` translates URIs of binary type ctors to their kind

URIs are used to identify type ctors:
- `URIS1` identifies unary type ctors
- `URIS2` identifies binary type ctors

```ts
type URItoKind1<A> = {
  'Array': Array<A>
  'Set'  : Set<A>
}

type URItoKind2<A, B> = {
  'Map': Map<A, B>
}

type URIS1 = keyof URItoKind1<unknown>           // "Array" | "Set"
type URIS2 = keyof URItoKind2<unknown, unknown>  // "Map"
```

The type `URIS1` has two keys so `URItoKind2<unknown>` amount to the union type of keys (string literal types), i.e. `URIS1 = "Array" | "Set"`.

The type `URIS2` holds the keys of the type `URItoKind2<unknown, unknown>`. But since the type `URItoKind2` only has one key, this amounts to the key "Map", so the type `URIS2 = "Map"`.

Above, `unknown` is a more type-safe representation of `any` that forces us to do some checks before doing actions with values of this type.

These kinds take an *identifier property as the first type parameter*, and the rest of parameters are type params of this identifier (type ctor).

```ts
type Kind1<F extends URIS1, A>    = URItoKind1<A>[F]
type Kind2<F extends URIS2, A, B> = URItoKind2<A, B>[F]
```

## Example of reduction

For example, let's focus on the binary type ctor `Map` that takes two type params `A` and `B` (i.e. `K` and `V`).

The type `URItoKind2<A, B>` is an object type `{ 'Map': Map<A, B> }`, with a single property named 'Map'.

```ts
type URItoKind2<A, B> = { 'Map': Map<A, B> }
type URIS2 = keyof URItoKind2<unknown, unknown>
type Kind2<F extends URIS2, A, B> = URItoKind2<A, B>[F]
```

The type `URIS2` holds the keys of the type `URItoKind2<unknown, unknown>`. But since the type `URItoKind2` only has one key, "Map", this type evaluates to the key itself, "Map", so the type `URIS2 = "Map"`.

Finally, the type `Kind2<F extends URIS2, A, B>` is evaluated as follows. First, the type arg `F` can only be `"Map"`, as anything else would not make sense, so `F = "Map"`. This gets us `Kind2<"Map" extends URIS2, A, B>`. But, like we said above, the type `URIS2 = "Map"`, so we get `Kind2<"Map" extends "Map", A, B>`, which means the constraint passes. Now, on the right hand side we have `URItoKind2<A, B>[F]`, and since F is "Map" we have `URItoKind2<A, B>["Map"]`. The type `URItoKind2<A, B>` is `{ 'Map': Map<A, B> }`, so it is expanded into `{ 'Map': Map<A, B> }["Map"]`, which is just `Map<A, B>`, i.e. exactly the type we wanted.

```ts
type URItoKind2<A, B> = { 'Map': Map<A, B> }            // (1)
type URIS2 = keyof URItoKind2<unknown, unknown>         // (2)
type Kind2<F extends URIS2, A, B> = URItoKind2<A, B>[F] // (3)

/* reduction */

// type (2) reduces to "Map" since "Map" is the only key:
type URIS2 = "Map"
// we can replace URIS2 with "Map" in the type (3):
type Kind2<F extends "Map", A, B> = URItoKind2<A, B>[F]
// F = "Map", since the only valid type arg for F is "Map":
type Kind2<"Map" extends "Map", A, B> = URItoKind2<A, B>["Map"]
// we replace URItoKind2<A,B> with {"Map": Map<A,B>}, according to (1):
type Kind2<"Map", A, B> = { "Map": Map<A, B> }["Map"]
// indexing with "Map" results in Map<A,B>, thus:
type Kind2<"Map", A, B> = Map<A, B>
```

So all this noise is just to be able to map a type ctor, passed in as a type argument (as a literal string), to its appropriate definition. We obtain the appropriate definition by indexing the object type, which holds definitions of the type ctors of the same kind (and thus with the same number of additional type params), by an index that is a "tag", aka string literal type with the name of the certain type ctor.

```ts
// the map of unary type ctors
{ "Set"   : Set<A>   }[ "Set" ] ⟼ Set<A>
{ "Array" : Array<A> }["Array"] ⟼ Array<A>
{ "Maybe" : Maybe<A> }["Maybe"] ⟼ Maybe<A>

// the map of binary type ctors
{ "Map"   : Map<A, B>    }[ "Map"  ] ⟼ Map<A, B>
{ "Either": Either<A, B> }["Either"] ⟼ Either<A, B>

// the map of function-like type ctors, (* -> *) -> * -> *
{ "Functor": Functor<F> }["Functor"] ⟼ Functor<F>
{ "Applic" : Applic<F>  }[ "Applic"] ⟼ Applic<F>
{ "Monad"  : Monad<F>   }[ "Monad" ] ⟼ Monad<F>
```

## Back to the `Collection` HKT

We return to the theoretical `Collection` and implement it using kinds.

To define the instance of `Collection` for arrays, we spread the array `c` and append the value `v` to it, `[...c, v]`.

```ts
type Collection<F extends URIS1> = {
  create: <A>() => Kind1<F, A>
  insert: <A>(v: A, c: Kind1<F, A>) => Kind1<F, A>
}

const collectionArray: Collection<"Array"> = {
  create: () => [],
  insert: (v, c) => [...c, v]
}
```

## Type classes

This is also a valid approach to implement *type classes* in TypeScript.

We can represent a type class as a dictionary of related methods carried in a type.

The `Collection` itself is effectively a type class that works with unary type ctors, those gathered in `URItoKind1`.

The `collectionArray` is then an *type class instance* for the `Array` type ctor (whose implementation, `Array<A>`, is in `URItoKind1`).

We can also declare that the `Set` type ctor is also a member of the `Collection` type class by defining the two required methods, `create` and `insert`, in terms of `Set`.

```ts
const collectionSet: Collection<"Set"> = {
  create: () => new Set(),
  insert: (v, c) => c.add(v),
}
```

Now we have two *instances* of the `Collection` type class, for `Array` and for `Set`. We can now use the `Collection` type class to define functions generic over the `Collection`.

## Functions over a HKT

Now we can define a generic function `f` that works over the `Collection` HKT, i.e. a function that works on a collection of elements, *regardless of whether the concrete collection is in terms of arrays or sets*.

When such a function is called, we must provide a particular instance (e.g. `collectionArray` or `collectionSet`) as an additional argument in that call. That arg will specialize the generic function to a particular type (e.g. the arg `collectionArray` specializes the function to be in terms of arrays).

That instance arg will then be consulted to provide the required methods, `create` or `insert`, which are defined in terms of a particular concrete type.

In the function below, we need to *pass the implementation of a particular type ctor as arg* (this corresponds to the type class context in Haskell).

```ts
const f = <F extends URIS1, A>(C: Collection<F>, v1: A, v2: A): Kind1<F, A> => {
  const newCollection = C.create<A>()
  return C.insert(v2, C.insert(v1, newCollection))
}

f(collectionArray, 1, 2) // [ 1, 2 ]
f(collectionSet, 2, 2)   // Set(1) { 2 }
```



## Refs

Higher-kinded types:
- https://serokell.io/blog/typescript-for-haskellers#hkts
- https://ybogomolov.me/01-higher-kinded-types
- https://ybogomolov.me/02-type-classes
- https://ybogomolov.me/higher-kinded-data


HKTs are based on the approach from the `fp-ts` library and Yuriy Bogomolov's blog. `fp-ts` contains a ton of things that you may know from Haskell, and in the blog, you can find explanation of how the library works.

- fp-ts
  https://gcanti.github.io/fp-ts/
- Yuriy Bogomolov blog
  https://ybogomolov.me/

Libraries in the `fp-ts` ecosystem:
- io-ts
  https://github.com/gcanti/io-ts
- parser-ts
  https://github.com/gcanti/parser-ts
- monocle-ts
  https://github.com/gcanti/monocle-ts
- remote-data-ts
  https://github.com/devex-web-frontend/remote-data-ts
