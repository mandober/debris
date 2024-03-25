# null and undefined

https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#null-and-undefined

JS has two primitive *values* used to signal absent or uninitialized values: `undefined` and `null` (null should signal the absence of object).

How `undefined` and `null` behave depends on the `strictNullChecks` TS flag.

## strictNullChecks off

Values that may be `null` or `undefined` can still be accessed normally; values `null` and `undefined` can be assigned to a property of any type.

This is similar to how languages without `null` checks behave; the lack of checking for these values tends to be a major source of bugs.

Basically, when strictNullChecks is off, `null` and `undefined` are effectively ignored by TS (and they behave as they do in JS).

## strictNullChecks on

The values `null` and `undefined` get their **own distinct types**, `null` and `undefined`. These two types then behave as *bottom type* in type theory, meaining both null and undefined values become the members of each type.

A bottom value/type that is a member of its own but also of any other type, are said to *lift* other types; e.g. `ℤ` is the *flat type* of integers, but when extended with null, `ℤ ⋃ null` is a *lifted type* of integers.

There is a type `null` whose only value is `null`, and 
there is a type `undefined` whose only value is `undefined`. 
Moreover, the *values* `null` and `undefined`, not only belong to their own types (`null` and `undefined`, respecivelly) but also to all other types.

So, effectively, a `boolean` type does not anymore contain just two values, true and false, but boolean = {true, false, null, undefined}.

```ts
type null = null | T
type undefined = undefined | T

const null: null = null
const undefined: undefined = undefined

// values null/undefine belong to their own types null/undefined
// but also to any other type T
null: null | T
undefined: undefined | T
```

When `strictNullChecks` is enabled, you have to make a guarantee to the `tsc` that it is safe to access some value (or property, etc.). Without such guarantee, tsc will raise an error that you have not made appropriate checks when accessing a property that may be `null` or `undefined`. You get a type error if you try to use `null` or `undefined` where a concrete value is expected.

>It is necessary to make an explicit guarantee to tsc that a value you are trying to manipulate cannot be `null` or `undefined`.

Such a guarantee can be made by manually and explicitly checking against these two values before attempting to access a property. This is called *type narrowing* because by checking against null you are excluiding the possibility that the value has the null type (or undefined).

```ts
function doSomething(x: string | null) {
  /// narrowing: check for null explicitly
  if (x === null) {
    console.log("null here")
  } else {
    /// here, you have made assurences that x cannot be null
    /// so you can access x freely
    console.log(x.toUpperCase())
  }
}
```

Just like checking for `undefined` before using an optional property, we use *narrowing* to check for values that might be `null`.


### Non-null assertion operator: postfix `!` (bang)

TS has a special syntax for removing `null` and `undefined` from a type without doing any explicit checking: writing `!` after any expression is effectively a guarantee to the compiler - a *type assertion* - that the value is not `null` or `undefined`.

```ts
function liveDangerously(x?: number | null) {
  /// No error due to the postfix BANG
  /// This is a user guarantee to TS that x cannot ever be null/undefined
  console.log(x!.toFixed())
}
```

Just like with other type assertions, this doesn't change the runtime behavior of the code, so only use `!` when you know that the value cannot possibly be `null` or `undefined`.
