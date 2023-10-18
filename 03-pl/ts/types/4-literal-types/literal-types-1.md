# TS :: Types :: Literal types

https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types

## Summary of literal types

- Literal types are types derived from the actual values of JS primitive types.
- Each of the 7 JS primitive types has the corresponding literal types.
- Any literal string type is a subtype of the string type, `"x" <: string`
- which is also true for the other primitive types
- The `null` literal type is indistiguishable from the `null` type.
- The `undefined` literal type is indistiguishable from the `undefined` type.
- The `symbol` makes for poor literals, it's hard to tell them apart.
- *1-to-1 correspondence* between primitive values and primitive literal types


## Literal types

TS supports **literal types**, which are types derived from the actual values of JS primitive types.

For example, JS primitive type `string` is a **supertype** of any literal string type, `"abc" <: string`; any string (as a value) can be made a literal string type. Conversely, any string literal type is a **subtype** of the 'string' type - it is a *more specific* or *more granular* type than 'string'.

The same is true for other literal types, although, besides 'string', only `number` and `boolean` make for interesting literal types. The `bigint` type is rarely used as is, but any *literal bigint type* would behave and look like a number literal type save for the prepended 'n' suffix, e.g. `0n`, `-11n`, `128n`.

The JS primitive type `symbol` can technically also have *literal symbol type*, but it's impossible to tell them apart - exactly because they do not have literal form; they shouldn't even be called 'literal' types since neither symbols as values, nor symbols as literal types can be expressed literally.

Moreover, a literal-symbol-type cannot be typed directly: if `const sym = Symbol()` then this literal-symbol-type appears as `typeof sym` (which is hardly a literal), and depends on its binding variable for typing. In other words, we cannot annotate a variable manually with a literal-symbol-type, like we can with other literal types.

Finally, both `null` and `undefined` JS primitives can technically have literal forms, but their literal types cannot be distinguished from themselves. In TS, `null` is its own type and it has only one value, also denoted `null`. Because the null type classifies a single value, it can only have a single literal type, which is then also called `null`, making it impossible (and unneeded) to distinguish between it and the type `null`. The same is true for `undefined`.

Any literal type classifies exactly one value, which justifies the use of the definite article, so, *the* type `1` is a literal-number-type containing 1 as its sole value. All literal types are **unit types**, which means that
>if we know the (literal) type, then we immediately know its (only) value.    
That is, if we know how the literal type is denoted, then we immediately know that its only value looks exactly the same; e.g. if we encounter the literal string type `"user"`, then we know that its sole value is the string "user". However, if we encounter the string "user", then the type may be the more general `string` type, or the more narrow `"user"` string type literal.

This *one-to-one correspondence between primitive values and primitive literal types* is true in TS, but it may not be so in general; for example, the name used for a unit type and its sole value may not necessarily be the same.

## Creating literal types

Declaring a primitive value using `let` or `var` will instruct TS to try and infer its type as a primitive JS type. However, using `const` instead, instructs TS to infer it as an appropriate primitive literal type.

```ts
// 'let' infers primitive types
let p1 = "abc"       // inferred type: string
let p2 = -1          // inferred type: number
let p3 = true        // inferred type: boolean

// 'const' infers literal primitive types
const l1 = "abc"     // inferred type: "abc" (literal string type)
const l2 = -1        // inferred type: -1    (literal number type)
const l3 = true      // inferred type: true  (literal boolean type)
```

To override the default behaviour when the `const` declaration is used (which should be most of the time), place an explicit type annotation on the variable.

```ts
const l1: string = "abc"     // string
const l2: number = -1        // number
const l3: boolean = true     // boolean
```

## Overview of primitive literal types

The overview of all primitive literal types:

```ts
// primitive value:             inferred type:
const bt = true                 // true
const bf = false                // false

const s1 = "abc"                // "abc"
const s2 = "string"             // "string"     ❕
const s3 = ""                   // ""           ❕

const n1 = 42                   // 42
const n2 = -102                 // -102
const n3 = -42.253              // -42.253

const bi1 = 42n                 // 42n
const bi2 = -100n               // -100n

const nt = null                 // null
const ut = undefined            // undefined

const sym = Symbol("symbolic")  // typeof sym   ❕
```

Primitive | Literal value   | Literal type   | Number of literal types
----------|-----------------|----------------|-------------------------
boolean   | true            | true           | 2
string    | ""              | ""             | ∞
number    | 0               | 0              | ∞
bigint    | 0n              | 0n             | ∞
null      | null            | null           | 1
undefined | undefined       | undefined      | 1
symbol    | s = Symbol()    | typeof s       | (1)


## Refs

* Literal Types
https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types

* Literal Inference
https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-inference
