# TS :: Types :: Nominal types :: never

The type `never` is a bottom type in TS. 
The type `unknown` is a top type in TS.

The `never` type can only stand on its own representing a computation that diverges; `never` cannot be a member of a union, for example, since that implies a type that is not divergent. In fact, even if `never` is explicitly placed in a union, TS will automatically remove it. This property is sometimes used to remove a member type from a union type by remapping it with `never`.

* The never type
https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html#the-never-type

* The never type
https://github.com/microsoft/TypeScript-Handbook/blob/bb3564f4f06dd776d430198a137ae9058454d990/pages/release%20notes/TypeScript%202.0.md#the-never-type

TypeScript 2.0 introduces a new primitive type `never`. The `never` type represents the type of values that never occur. Specifically, `never` is the return type for functions that never return and `never` is the type of variables under type guards that are never true.
