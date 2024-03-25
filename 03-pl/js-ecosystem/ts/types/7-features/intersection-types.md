# TS :: Ref :: Types :: Intersection types

>Intersection types are *recursive* in case of conflicts.

`A & B`

TypeScript also has intersection types.

```ts
type Combined = { a: number } & { b: string }

type Conflict = { a: number } & { a: string }
```

`Combined` has two properties, `a` and `b`, just as if they had been written as one object literal type.

>Intersection (and union) types are *recursive* in case of conflicts.

The type `Conflict` is an intersection of two object type literals, where the two object type literals have the same property name, `a`, but each operand type types this property differently. In case of such conflicting information, intersection of types is inclusive (recursive), thus `Conflict.a` has the type `number & string`.


>Intersecting two object types is not exactly like merging two objects with `{...a, ...b}`, the way we would in JS, because the intersection is applied recursively on keys that exist on both object types.

The result of intersecting types that do not overlap is the empty set. In TS, the empty set corresponds to the type `never`.
