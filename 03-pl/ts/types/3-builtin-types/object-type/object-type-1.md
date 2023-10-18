# Object types

- `{}`, the empty object type
- `object`
- `Object`

## The empty object type, `{}`

The empty object type, `{}`, is one of the larger collection of values in TS since all object types are assignable to it, but also primitive types (like number, string and boolean).

>The empty object type, `{}`, classifies object types, but also primitive types except `null` and `undefined`.

Since TypeScript 4.8, unconstrained generics no longer assignable to `{}`. Code that dis not want to handle `null` and `undefined` can be fixed by *propagating the constraints*:

```ts
// Instead of the unconstrained type parameter…
function foo<T>(x: T) {…}
// …use the empty object type instead, propagating the constraints:
function foo<T extends {}>(x: T) {…}


// If you know x cannot be null/undefined, you can also use non-null assertion:
function foo<T>(x: T) {
  // instead of just this:
  bar(x)
  // use a non-null assertion (!):
  bar(x!)
}


// In the worst case, you can check for null/undefined at runtime:
function foo<T>(x: T) {
  if (x !== null && x !== undefined) bar(x)
  // or just
  if (x != undefined) bar(x)
}
```

>The difference between an unconstrained type parameter `T` and `{}` is that the `{}` is like `T` except it doesn't allow `null` and `undefined`.

It means that a function taking `{}` will accept most values - only `null` and `undefined` are not assignable to it.

```ts
function fn(x: {}) {…}

// ✅ all these type-check
fn({ token: "..." })
fn({})
fn("Hi!")
fn(1337)
fn(() => "a function!")

fn(null) // Arg of type 'null' is not assignable to parameter of type '{}'
fn(undefined) // Arg of type 'undefined' is not assignable to param of type {}
```

This is the only difference between `{}` and `unknown` types: all types belong to `unknown` including `null` and `undefined`.

>`unknown` contains everything.

## The `object` type

Unlike `{}`, the `object` type does not include primitive types.

Functions and arrays are assignable to the `object` type too; only primitive types are not.

>`unknown` <: `{}` <: `object`

`unknown`:
- all types

`{}`:
- all types except `null` and `undefined`

`object`:
- all types except primitives (`null` and `undefined` are primitives)


## Unconstrained Generics No Longer Assignable to `{}`

In TypeScript 4.8, for projects with strictNullChecks enabled, TypeScript will now correctly issue an error when an unconstrained type parameter is used in a position where `null` or `undefined` are not legal values. That will include any type that expects `{}`, `object`, or an object type with all-optional properties.

A simple example can be seen in the following.

```ts
// Accepts any non-null non-undefined value
function bar(value: {}) {
  Object.keys(value) // This call throws on null/undefined at runtime
}

// Unconstrained type parameter T
function foo<T>(x: T) {
  bar(x) // Used to be allowed, now is an error in TS 4.8
  //  ^
  // ERROR: Argument of type T is not assignable to parameter of type {}
}

foo(undefined)
```

As demonstrated above, code like this has a potential bug - the values `null` and `undefined` can be indirectly passed through these unconstrained type parameters to code that is not supposed to observe those values.


This behavior is now also visible in type positions. One example would be:

```ts
interface Foo<T> {
  x: Bar<T>
}

interface Bar<T extends {}> {}
```


Existing code that didn't want to handle `null` and `undefined` can be fixed by *propagating the appropriate constraints through*.

```diff
- function foo<T>(x: T) {
+ function foo<T extends {}>(x: T) {
```

Another work-around would be to check for null and undefined at runtime.

```diff
  function foo<T>(x: T) {
+     if (x !== null && x !== undefined) {
          bar(x);
+     }
  }
```

And if you know that for some reason, your generic value can't be `null` or `undefined`, you can just use a non-null assertion.

```diff
  function foo<T>(x: T) {
-     bar(x);
+     bar(x!);
  }
```

When it comes to types, you'll often either need to *propagate constraints*, or *intersect your types with `{}`*.


For more information, you can see the change that introduced this:
https://github.com/microsoft/TypeScript/pull/49119

And the discussion issue regarding *how unconstrained generics now work*:
https://github.com/microsoft/TypeScript/issues/49489

Reference Thread: Correctness Improvement in Unconstrained Type Parameters #49489
https://github.com/microsoft/TypeScript/issues/49489
