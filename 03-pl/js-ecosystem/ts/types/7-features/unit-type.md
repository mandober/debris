# TS :: Ref :: Types :: Unit type

https://www.typescriptlang.org/docs/handbook/typescript-in-5-minutes-func.html#unit-types

## Unit type

A *singleton type* is any type that has exactly one member. All singleton types are isomorphic to each other (as are all singleton sets).

In Haskell, we can make a bunch of singleton types, but *the canonical singleton type* is called "unit", `()`, and its only member is the value also denoted by `()`, thus `() :: ()`.

"Unit" is just a name for one particular singleton type.

## Unit types in TS

>Unit types are subtypes of **primitive types** that contain exactly one primitive value.

For example, the string `"foo"` has the type `"foo"`.

```ts
"foo": string
"foo": "foo"
```

Since JS has no builtin enums, it is common to use a set of well-known strings instead. Unions of **string literal types** allow TS to type this pattern:

```ts
declare function pad(s: string, n: number, direction: "left" | "right"): string
pad("hi", 10, "left")
```

When needed, the compiler widens - converts to a supertype - the unit type to the primitive type, such as "foo" to string. This happens when using mutability, which can hamper some uses of mutable variables:

```ts
let s = "right"
pad("hi", 10, s) // error: 'string' is not assignable to '"left" | "right"'
```
Argument of type 'string' is not assignable to parameter of type '"left" | "right"'.

Here's how the error happens:
- `"right": "right"`
- `s: string` because `"right"` *widens to string on assignment to a mutable variable*.
- `string` is not assignable to `"left" | "right"`

You can work around this with a type annotation for `s`, but that in turn prevents assignments to `s` of vars that are not of type `"left" | "right"`.

```ts
let s: "left" | "right" = "right"
pad("hi", 10, s)
```
