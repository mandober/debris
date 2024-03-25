# TS :: Types :: `type` keyword

When the `type` keyword is used to create a new named type, that type is called a *type alias*. The other way to create a new named type is using the `interface` keyword. Actually, these two keywords behave similarly in most aspects.

```ts
// simple type aliases
type Bool = boolean
type Num = number
type Str = string


type Complex = { data: number[], output: (all: boolean) => number[] };
// usage
let complex2: Complex = {/* .. */}
```
