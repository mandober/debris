# TS :: Types :: Type-level keywords :: infer

- `infer` type-level keyword
- `infer` allows us to extract the type of nested parts of compound types
- `infer` requires a fresh type param to which it will bind the type it infers


```ts
/// offical ReturnType utility
type ReturnTy<T extends (...as: any) => any> =
  T extends (...as: any) => infer R
    ? R
    : any
```

Notice how the type param `R` is fresh - `R` is introduce as a target type param to which `infer` will bind the inferred function's returned type.
