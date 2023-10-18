# TS :: Types :: Literal types :: Literal string types

## Refs

* The pull request to add support for string literal types as proposed in #1003
https://github.com/Microsoft/TypeScript/pull/5185

* Proposal #1003: Singleton types under the form of string literal types
https://github.com/microsoft/TypeScript/issues/1003

* Literal string types
https://shaky.sh/ts-string-theory/

## Terms

- literal type
- constant type
- string literal type
- string constant type
- singleton type


## String literal types

A string literal type is a singleton type of the string provenence at the type level, e.g. the type of "foo" is surely string, `"foo": string`, but we can also narrow it down and also have the type `"foo"` such that `"foo": "foo"`.

```ts
"foo" : string
"foo" : "foo"
```

Having a single literal string type is not as useful as putting a few in a union

```ts
type RGB = "Red" | "Blue" | "Green"

const c1 = "Red"
const c2 = "Blue"

let rb: "Red" | "Blue"
let rgb: RGB
```
