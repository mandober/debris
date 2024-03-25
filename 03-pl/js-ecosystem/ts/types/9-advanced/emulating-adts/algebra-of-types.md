# Algebra of types


## Algebra of types in TypeScript

We need to make associations between algebraic and TS types:
- 0 ≅ `never`
- 1 ≅ `void`
- A ⨯ B ≅ `[A, B]`
- A + B ≅ `A | B`
- B ^ A or Bᴬ ≅ `(b: B) => A`

```ts
type Zero = never              // 0
type Unit = []                 // 1
type Product<A, B> = [A, B]    // ⨯
type Sum<A, B> = A | B         // +
type Expo<A, B> = (m: A) => B  // ^
```

These correspondencies are mostly straightforward save for the coproduct type. Coproduct cannot be modelled just as union types because in set theory they ahould correspond to set disjoint union and TS's union is just set union.

Disjoint set union aka *discriminated or tagged union* can be modelled using several TS type constructions including union type, object type, type predicates, type literals, type assertions, type conditionals.

The closest equivalent to data is a union of types with discriminant properties, normally called discriminated unions in TypeScript:



Aⁿ ⨯ Aᵐ = Aⁿᐩᵐ ≅ 


```ts
// 0 ≅ never
type Zero = never
// 1 ≅ void
type Unit = []



Aⁿ ⨯ Aᵐ = Aⁿᐩᵐ ≅ (n + m) => A

[(n: N) => A, (m: M) => A]
```
