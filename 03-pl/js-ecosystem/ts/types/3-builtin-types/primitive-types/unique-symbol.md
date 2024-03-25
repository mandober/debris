# Unique symbol

To enable treating symbols as unique **literals**, form TS 2.7, a new type `unique symbol` is available. The `symbol` type classifies all term-level symbols, but the type `unique symbol` can be assigned to a symbol for it to be treated as a *unique symbol literal*, similarly to how string literal types are the related to string (SLT are subtypes of string).

>`unique symbol` <: `symbol` similarly to how `"abc"` <: `string`

```ts
// s's type is the `symbol` primitive type
const s: symbol = Symbol()
// u's type is a unique literal symbol type
const u: unique symbol = Symbol()
// to refer to u's unique literal symbol type
type U = typeof u
```


* The `unique symbol` type is a subtype of the `symbol` type (similarly how literal string types are subtypes of string).


* `unique symbol` can only be produced by calling `Symbol()` or `Symbol.for()`, or from an explicit type annotation.

* Only the type of `const` declarations and `readonly` static properties can have a unique symbol type.

* Use `typeof` to reference a specific unique symbol.

* Each reference to a unique symbol implies a completely *unique identity* that's tied to a given declaration.


```ts
// Works
declare const Foo: unique symbol

// Error! Bar is not a constant
let Bar: unique symbol = Symbol()

// Works - refers to a unique symbol, but its identity is tied to Foo
let Baz: typeof Foo = Foo

// Works
class C {
  static readonly StaticSymbol: unique symbol = Symbol()
}
```

>Because each unique symbol has a completely separate identity, no two unique symbol types are assignable or comparable to each other.

```ts
const Foo = Symbol()
const Bar = Symbol()
if (Foo === Bar) // Error: cannot compare two unique symbols
```




## Refs

https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-7.html

https://github.com/Microsoft/TypeScript/pull/15473
