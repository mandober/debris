# Newtype

https://serokell.io/blog/typescript-for-haskellers#newtype

## Newtypes in Haskell

In Haskell, the `newtype` keyword, used instead of the `data` keyword, creates a new type by wrapping the type in a ctor and the newtype is isomorphic to the original, wrapped type. It is a construction that allows us to wrap a type in order to make in distinct from the wrapped type. For example,

```hs
newtype Sum = Sum Int
```

The newtype `Sum`, that wraps `Int`, is distinct from `Int`, that is `Sum` and `Int` are distinct to the type-checker but identical at runtime, i.e. the two types are *isomorphic*.

```hs
sumToInt :: Sum -> Int
sumToInt (Sum i) = i

intToSum :: Int -> Sum
intToSum i = Sum i

intToSum . sumToInt = id = sumToInt . intToSum
```

Unlike the `type` keyword, which only creates a type alias indistiguishable from the type it aliases, the `newtype` keyword creates a type distinct from the the type it wraps (at least as far as the compile-time).

## Newtypes in TypeScript

There is no analogue for newtype in TypeScript, but it can be done using object types with distinct tags and intersection type.

If we want to make the type `Name` distinct from the type `string`, we need a way to force nominal typing. TypeScript has structural typing so the type `Name` that is just a type alias of `string` would not be different from the `string`. *Nominal types* break the structural compatibility and make the two types distinct. And a way to create nominal types is to use the intersection type (`&`) to add a unique tag fields to each type that is to be considered unique.

For example, to make the types `Name` and `City`, which are both `string`, distinct from each other and from the `string`, we can use the intersection type to attach a unique "tag" to them.

```ts
type Name = string & { tag: "Name" }
type City = string & { tag: "City" }
```


```ts
type Name = string & { readonly tag: unique symbol }
type City = string & { readonly tag: unique symbol }
```

- intersection type (`&`) is used to add a unique tag field to the type.
- `symbol` lets you declare const-named properties on types.
- `unique` means the type is unique - the type is tagged with a unique symbol.


Now, with `as` (which does type assertion), you can *cast your base type* to a **tagged type**. And when you try to pass a value of another tagged type, the compiler will complain about two unique symbols being different.

```ts
function sendMessage(email: Email)

sendMessage("message")
// Error: Arg of type 'string' is not assignable to param of type 'Email'

sendMessage("St. Petersburg" as City)
// Error: Arg of type 'City' is not assignable to param of type 'Email'

sendMessage("email@gmail.com" as Email) // Ok
```

While this is the simplest solution for newtypes, it is not the best for complex systems. For a better one, see this issue:
* Tag types #4895
https://github.com/Microsoft/TypeScript/issues/4895#issuecomment-401067935


## Tagged types

>A tag type (tagged type, newtype even) is a *qualifier type* that indicates that some predicate about a value it is associated with holds true.




## Refs

* *Tag types* · Issue #4895
  https://github.com/Microsoft/TypeScript/issues/4895

* *Nominal unique type brands* #33038
  https://github.com/microsoft/TypeScript/pull/33038

* Support some (non-structural) *nominal type* matching #202
  https://github.com/microsoft/TypeScript/issues/202



* gcanti/newtype-ts: Implementation of *newtypes* in TypeScript
  https://github.com/gcanti/newtype-ts

* Functional Programming in TypeScript
  https://serokell.io/blog/typescript-for-haskellers#newtype

* ForbesLindesay/opaque-types:
  Support for *opaque* and *nominal types* in typescript via a transformation.
  https://github.com/ForbesLindesay/opaque-types

* Intro to fp-ts, part 2: *Type Class Pattern* | ybogomolov.me
  https://ybogomolov.me/02-type-classes
