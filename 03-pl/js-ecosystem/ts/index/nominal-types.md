# TS :: Index :: Nominal types

Nominal types: Primitives + TS nominal types
- any
- never
- unknown
- undefined
- null
- void

* JS Primitive types
  - boolean
  - number
  - bigint
  - string
  - symbol
  - object
  - { [key: string]: any }
  - T, T<A>


```ts
type mixed = { [key: string]: any }
           | object
           | number
           | string
           | boolean
           | symbol
           | undefined
           | null
           | void

declare global {
  type unknown = mixed
}
```
