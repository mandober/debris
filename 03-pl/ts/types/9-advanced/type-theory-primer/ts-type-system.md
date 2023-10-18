# TS :: Type System



TypeScript's type system
- types are sets (types can be super/subsets of other types)
- has subtyping (types can be super/subsets)
- structural type system
- unsound, due to `any`, which is both superset and subsets of every type
- thus `any` makes the type hierarchy circular
- (nearly) Turing complete type system
- static typing
- type checking at CT
- type erasure





TypeScript has a structural type system in order to mimic the dynamics of JS.


## Refs

* Interfaces
https://basarat.gitbook.io/typescript/type-system/interfaces
