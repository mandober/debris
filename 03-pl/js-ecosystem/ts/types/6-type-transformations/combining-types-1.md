# TS :: Types :: Combining types

- union types, `|`
- intersection types, `&`

```ts
type Obj = <T extends object, K extends keyof T & string>(o: T) => Array<T[K]>
```
