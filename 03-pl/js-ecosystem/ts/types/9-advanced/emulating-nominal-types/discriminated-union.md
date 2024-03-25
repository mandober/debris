# TS :: Types :: Discriminated union

https://www.typescriptlang.org/docs/handbook/typescript-in-5-minutes-func.html#discriminated-unions

The closest to a sum type (Haskell's `data`) is a union of types with discriminant properties, normally called **discriminated unions** in TS:

```ts
type Shape =
  | { kind: "circle", radius: number }
  | { kind: "square", x: number }
  | { kind: "triangle", x: number, y: number }
```

Unlike in Haskell, in TS, the *tag* (or *discriminant*) is just a property in each object type.

Each *variant* has the identical property "kind" with a different unit type; i.e. "kind" is a property name that each variant has, while "circle", "square"  and "trinagle" are each a literal unit type.


This is still a normal union type; the leading | is an optional part of the union type syntax. You can discriminate the members of the union using normal JavaScript code:

type Shape =
  | { kind: "circle"; radius: number }
  | { kind: "square"; x: number }
  | { kind: "triangle"; x: number; y: number };
 
function area(s: Shape) {
  if (s.kind === "circle") {
    return Math.PI * s.radius * s.radius;
  } else if (s.kind === "square") {
    return s.x * s.x;
  } else {
    return (s.x * s.y) / 2;
  }
}
Try
Note that the return type of area is inferred to be number because TypeScript knows the function is total. If some variant is not covered, the return type of area will be number | undefined instead.

Also, unlike Haskell, common properties show up in any union, so you can usefully discriminate multiple members of the union:

function height(s: Shape) {
  if (s.kind === "circle") {
    return 2 * s.radius;
  } else {
    // s.kind: "square" | "triangle"
    return s.x;
  }
}
