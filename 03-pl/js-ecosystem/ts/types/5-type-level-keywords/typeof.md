# TS :: Types :: Type-level keywords :: typeof

The `typeof` type-level keyword, not to be conflated with the same value-level operator, is used to get the type of an entity.

```ts
type Obj = typeof obj
<T extends typeof Obj>
<T, U extends typeof T>
```

The `typeof` operator works as usual at value-level, but TS promotes it also to be used in a type context. Applied to an exp (value), it returns its type.
