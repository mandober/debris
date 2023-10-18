# FAQ

1. Difference between `symbol` and `unique symbol`?

2. Aspects of putting a function type in an `interface`?

```ts
interface Face {
  <A, B>(...args: A) => B
}

// also compared to
interface Face {
  f: <A, B>(...args: A): B
}
```
