# TypeScript :: Types :: Literal types

- Literal types
  - [Literal types](./literal-types.md)
  - [Literal boolean types](./literal-boolean-types.md)
  - [Literal string types](./literal-string-types.md)


## Kinds of literal types

- primitive types
- primitive literal types, concrete literal types
  - literal boolean type (LBT)
  - literal number type (LNT)
  - literal bigint type (LIT)
  - literal string type (LST)
    - intrinsic string manipulation types
    - template literal types (TLT)
  - literal symbol type (as `s: typeof sym3` instead of `s: symbol`)
  - literal undefined type, `undefined: undefined`
  - literal null type, `null: null`
- object literal types
  - object types
  - types of properties as literals, `const o = {…} as const`
