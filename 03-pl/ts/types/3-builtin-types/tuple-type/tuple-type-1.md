# Tuple type


## Tuples and unions

The type of a tuple may be inferred as an array of union types, unless explicitly typed. A tuple's type may be inferred as `(string | number)[]` instead of the intended `[string, number]`.

```ts
type Pair<A, B> = [A, B]

const pair1 = ["one", 1] // inferred as (string | number)[]

// type it explicitly as a tuple type:
const pair2: Pair<string, number> = ["one", 1]
const pair3 = ["one", 1] as Pair<string, number>
```
