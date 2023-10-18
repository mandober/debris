# TS :: Ref :: Types :: Template literal types

## Improved Inference for infer Types in Template String Types

https://devblogs.microsoft.com/typescript/announcing-typescript-4-8-beta/#improved-inference-for-infer-types-in-template-string-types

TypeScript recently introduced a way to add `extends` constraints to `infer` type variables in conditional types.

`T extends (infer U extends V)`

```ts
// Get the first element of a tuple if it's assignable to 'number'
type First<T> = T extends [infer U extends number, ...unknown[]] ? U : never
```

If these `infer` types appear in a template string type and are constrained to a primitive type, TypeScript will now try to parse the literal type out.

T extends `${infer U extends Prim}`

```ts
// SomeNum used to be 'number', now it is '100'
type SomeNum = "100" extends `${infer U extends number}` ? U : never

// SomeBigInt used to be 'bigint', now it is '100n'
type SomeBigInt = "100" extends `${infer U extends bigint}` ? U : never

// SomeBool used to be 'boolean', now it is 'true'
type SomeBool = "true" extends `${infer U extends boolean}` ? U : never
```

This can now better convey what a library will do at runtime, and give more precise types.


**IMPORTANT**: When TS parses the literal types it will *greedily* try to parse as much of what looks like of the appropriate primitive type; however, it then checks to see if the print-back of that primitive matches up with the string contents. In other words, TS *checks whether going from the input string to the primitive and back to the string matches*. If the string cannot be "round tripped", then TS will fallback to a *base primitive type*, instead of parsing out a concrete literal primitive type.

```ts
// JustNumber = number because TS parses out "1.0"
// but String(Number("1.0")) is "1" so it does not match, "1.0" !== "1"
type JustNumber = "1.0" extends `${infer T extends number}` ? T : never


String(Number("1"))    === "1"
String(Number("1.0"))  !== "1"
String(Number(".01"))  !== "0.01"
String(Number("0xff")) !== "255"
String(Number("2e3"))  !== "2000"
```


## Refs

* More specific inference for constrained 'infer' types in template literal types #48094
https://github.com/microsoft/TypeScript/pull/48094

This modifies inference in template literal types when inferring to a constrained type variable by leveraging the constraint of the type variable to infer a more specific type:

```ts
// helper that enforces a constraint on an `infer T` type
type Is<T extends U, U> = T

// today
type T0 = "100" extends `${Is<infer T, number>}` ? T : never    // number
type T1 = "100" extends `${Is<infer T, bigint>}` ? T : never    // bigint
type T2 = "true" extends `${Is<infer T, boolean>}` ? T : never  // boolean

// after this change
type T0 = "100" extends `${Is<infer T, number>}` ? T : never    // 100
type T1 = "100" extends `${Is<infer T, bigint>}` ? T : never    // 100n
type T2 = "true" extends `${Is<infer T, boolean>}` ? T : never  // true
```
