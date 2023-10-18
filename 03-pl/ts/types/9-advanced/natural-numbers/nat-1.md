

* Nats in TS
https://github.com/zzj3720/24game/blob/master/24game.ts

* Nats in TS
https://github.com/aman-tiwari/shape-types/blob/master/index.ts

* TypeScripts Type System is Turing Complete · Issue #14833 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/issues/14833

* Transform union type to intersection type
https://stackoverflow.com/questions/50374908/transform-union-type-to-intersection-type

```ts
type UnionToIntersection<U> =
  (U extends any
    ? (k: U) => void
    : never
    ) extends ((k: infer I) => void)
      ? I
      : never
```

That distributes the union `U` and repackages it into a new union where all the consitutents are in *contravariant position*. That allows the type to be inferred as an *intersection* `I`, as mentioned in the handbook: "Likewise, multiple candidates for the same type variable in contra-variant positions causes an intersection type to be inferred."

* https://stackoverflow.com/search?q=user:2887218+[typescript]

* Type-level programming #22
https://github.com/WrocTypeScript/talks/issues/22

* https://github.com/mattiamanzati/typelevel-interpreter

* Emulating a 4-Bit Virtual Machine in (TypeScript\JavaScript) (just Types no Script)
https://gist.github.com/acutmore/9d2ce837f019608f26ff54e0b1c23d6e

* https://github.com/ronami/meta-typing

https://ricklove.me/typescript-type-system-adventure
