# TS :: Ref :: Types :: Type annotation

Type annotation is the syntactic means to assign a type to an expression. TS offers several way to do it, the principle one being a direct annotation of the type placed on a variable.

```ts
let n: number = 1
```




## Variable declaration without type annotation

- keyword `let` infers types as expected
- keyword `const` infers literal primitive types (given primitives)

```ts
let foo = 1               // ✔ 'foo' has type `number` (as expected)
const bar = 1             // ✔ 'bar' inferred to have literal type `1` (!)
const bar: 1 = 1          // ✔ above but explicit, 'bar' has type `1`
const baz: number = 1     // ✔ 'baz' has type `number`

type Number = typeof 42   // ✘ identifier expected

type Number = typeof baz  // ✔ `Number` ≡ `number`
const n: Number = 3 + 39  // ✔ since `Number` ≡ `number`

type Number = typeof bar  // ✔ `Number` ≡ `42`, i.e. literal number type `42`
const n: Number = 3 + 39  // ✘ Type `number` is not assignable to type `42`
```
