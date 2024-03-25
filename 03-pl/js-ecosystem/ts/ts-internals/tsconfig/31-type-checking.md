## TS :: Ref :: TSConfig :: Compiler options :: Type Checking

https://www.typescriptlang.org/tsconfig#Type_Checking_6248

* Type Checking (options ASC)
  - allowUnreachableCode
  - allowUnusedLabels
  - alwaysStrict
  - exactOptionalPropertyTypes
  - noFallthroughCasesInSwitch
  - noImplicitAny
  - noImplicitOverride
  - noImplicitReturns
  - noImplicitThis
  - noPropertyAccessFromIndexSignature
  - noUncheckedIndexedAccess
  - noUnusedLocals
  - noUnusedParameters
  - strict
  - strictBindCallApply
  - strictFunctionTypes
  - strictNullChecks
  - strictPropertyInitialization
  - useUnknownInCatchVariables


* Compiler options
  - Type Checking
    - *unused stuff*
      - noUnusedLocals                      (function) ✔
      - noUnusedParameters                  (function) ✔
      - allowUnreachableCode                           ✔
      - allowUnusedLabels                              ✔
    - *strictness*
      - strict                                         ✔
      - strictBindCallApply                 (function) ✔
      - strictFunctionTypes                 (function) ✔
      - strictNullChecks
      - strictPropertyInitialization        (props)
      - alwaysStrict                        ('use strict') ✔
      - noImplicitAny
      - noImplicitOverride                  (class)    ✔
      - noImplicitReturns                   (function) ✔
      - noImplicitThis                      (object)   ✔
      - noUncheckedIndexedAccess            (props)
      - noFallthroughCasesInSwitch          (switch)
      - noPropertyAccessFromIndexSignature  (props)
      - exactOptionalPropertyTypes          (props)    ✔
      - useUnknownInCatchVariables


### allowUnreachableCode
https://www.typescriptlang.org/tsconfig#allowUnreachableCode

- @since: 1.8
- @essentially: unnecessary

## allowUnusedLabels
https://www.typescriptlang.org/tsconfig#allowUnusedLabels

- @since: 1.8
- @essentially: unnecessary

## alwaysStrict
https://www.typescriptlang.org/tsconfig#alwaysStrict

- @since: 2.1
- @default: `true` if `strict` enabled; `false` otherwise
- @related: `strict`
- @essentially: redundant

Ensure that your files are parsed in the ECMAScript *strict mode*, and emits `"use strict"` for each source file.

Modern JS uses modules anyway which are always in strict mode.

## exactOptionalPropertyTypes
https://www.typescriptlang.org/tsconfig#exactOptionalPropertyTypes

- @since: 4.4
- @essentially: interesting

>When `true`, optional properties are either defined a specified or completely absent from the object. When `false`, you can assign `undefined` to such prop.

Applies stricter rules regarding the properties on `type` or `interface` with a `?` prefix.

For example, this interface declares that there is a property which can be one of two strings: 'dark' or 'light' **or it should not be in the object**.

```ts
interface UserDefaults {
  // e.g. absence of a value may represent 'system'
  colorThemeOverride?: "dark" | "light"
}
```

Without this flag enabled, there are actually 3 values you can set the prop to: "dark", "light" and *undefined*.

Setting the value to `undefined` will allow most JS runtime checks for the existence to fail, which is effectively falsy.

However, this isn't quite accurate:
>`colorThemeOverride: undefined` is not the same as `colorThemeOverride` not being defined at all.

For example, "colorThemeOverride" in `settings` would have different behavior with `undefined` as the key compared to not being defined.

`exactOptionalPropertyTypes` makes TS truly enforce the definition provided as an optional property:

```ts
const settings = getUserSettings()
settings.colorThemeOverride = "dark"
settings.colorThemeOverride = "light"

// But not:
settings.colorThemeOverride = undefined
// Type 'undefined' is not assignable to type '"dark" | "light"'
// when 'exactOptionalPropertyTypes: true'.
// Consider adding 'undefined' to the type of the target.
```

## noFallthroughCasesInSwitch
https://www.typescriptlang.org/tsconfig#noFallthroughCasesInSwitch

- @since: 1.8
- @essentially: nonessential

Report errors for fallthrough cases in `switch` statements. Ensures that any non-empty case inside a switch statement includes either `break`, `return`, or `throw`.

## noImplicitAny
https://www.typescriptlang.org/tsconfig#noImplicitAny

- @default: true if strict; false otherwise
- @related: `strict`

When enabled TS errors whenever it would have inferred `any`.

## noImplicitOverride
https://www.typescriptlang.org/tsconfig#noImplicitOverride

- @since: 4.3
- @essentially: sure

When working with classes which use inheritance, it's possible for a sub-class to get "out of sync" with the functions it overloads when they are renamed in the base class.

Using noImplicitOverride you can ensure that the sub-classes never go out of sync, by ensuring that functions which override include the keyword `override`.

## noImplicitReturns
https://www.typescriptlang.org/tsconfig#noImplicitReturns

- @since: 1.8

Checks all code paths in a function to ensure they return a value.

## noImplicitThis
https://www.typescriptlang.org/tsconfig#noImplicitThis

Raise error on `this` expressions with an implied `any` type.


## noPropertyAccessFromIndexSignature
https://www.typescriptlang.org/tsconfig#noPropertyAccessFromIndexSignature

This setting ensures consistency between accessing a field with the dot syntax and indexed syntax, and the way which the property is declared in the type.

Without this flag, TS allows you to use the dot syntax to access fields which are not defined.

The goal of this flag is to signal intent in your calling syntax about how certain you are this property exists.

## noUncheckedIndexedAccess
https://www.typescriptlang.org/tsconfig#noUncheckedIndexedAccess

TS has a way to describe objects which have unknown keys but known values on an object, via *index signatures*.

Turning on `noUncheckedIndexedAccess` will add `undefined` to any un-declared field in the type.

## noUnusedLocals
https://www.typescriptlang.org/tsconfig#noUnusedLocals

## noUnusedParameters
https://www.typescriptlang.org/tsconfig#noUnusedParameters

## strict
https://www.typescriptlang.org/tsconfig#strict

The `strict` flag enables a wide range of type checking behavior that results in stronger guarantees of correctness.

Turning this on is equivalent to enabling all of the *strict mode family options*, which are outlined below. You can then turn off individual strict mode family checks as needed.

Future versions of TypeScript may introduce additional stricter checking under this flag, so upgrades of TypeScript might result in new type errors in your program. When appropriate and possible, a corresponding flag will be added to disable that behavior.

## strictBindCallApply
https://www.typescriptlang.org/tsconfig#strictBindCallApply

Checks that the built-in methods of functions, `call`, `bind`, and `apply`, are invoked with correct argument for the underlying function.


## strictFunctionTypes
https://www.typescriptlang.org/tsconfig#strictFunctionTypes

When enabled, this flag causes *functions parameters* to be checked more correctly.

Here's a basic example with `strictFunctionTypes` off:

```ts
function fn(x: string) {
  console.log("Hello, " + x.toLowerCase())
}

type StringOrNumberFunc = (ns: string | number) => void

// Unsafe assignment/typing !
let func: StringOrNumberFunc = fn

// Unsafe (but allowed) call - will crash!
func(10)
```

We cannot type the function that takes a string as the fn type that allows it to take a string or number - wtf should it do with a number? With `strictFunctionTypes` on, the error is correctly detected.

During development of this feature, we discovered a large number of *inherently unsafe class hierarchies*, including some in the DOM. Because of this, the setting only applies to functions written in *function syntax*, not to those in *method syntax*.

```ts
type Methodish = { func(x: string | number): void }
function fn(x: string) { console.log("Hello, " + x.toLowerCase()) }
// Ultimately an UNSAFE ASSIGNMENT, but not detected (!)
const m: Methodish = { func: fn }
m.func(10)
```

## strictNullChecks
https://www.typescriptlang.org/tsconfig#strictNullChecks

When `strictNullChecks` is false, `null` and `undefined` are effectively ignored by the language. This can lead to unexpected errors at runtime.

When `strictNullChecks` is true, `null` and `undefined` *get their own distinct types* so you get a type error if you use them where a concrete value is expected.

## strictPropertyInitialization
https://www.typescriptlang.org/tsconfig#strictPropertyInitialization

When true, errors if class property was declared but not set in the ctor.

## useUnknownInCatchVariables
https://www.typescriptlang.org/tsconfig#useUnknownInCatchVariables

In TypeScript 4.0, support was added to *allow changing the type of the variable in a catch clause from `any` to `unknown`*. Allowing for code like:

```ts
try {
  // ...
} catch (err) {
  // verify err is an error before using it as sucj
  if (err instanceof Error) {
    console.log(err.message);
  }
}
```

This pattern ensures that error handling code becomes more comprehensive because you cannot guarantee that the object being thrown is a Error subclass ahead of time.

With the flag `useUnknownInCatchVariables` enabled, you don't need the additional syntax (`err: unknown`) nor a linter rule to try enforce this behavior.
