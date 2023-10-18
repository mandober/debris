# TS :: Ref :: Types :: Type placeholder

https://www.totaltypescript.com/type-argument-placeholders-typescript-5-2-most-discussed-feature

*Type placeholder* is a misnomer for a *typed hole*.

TypeScript 5.2 introduces type argument placeholders, which let you pass the underscore, `_`, in a *type argument slot* to let TS infer the type.

```ts
f<T, _, string>()
```

Currently (pre v5.2), if we pass in a single type argument to a function, TS will not infer the rest of type arguments. ⟨"As if TS can infer anything anywhere anyway", opined the dependent type pleased with the alliteration, "Being so pround of TS inference capabilities implies they're comparing it against nothing. Or C++ maybe". "Bah!", expelled HM, "as if your dependent type system is any better", continuing his thought after a GC beat, "Dependent type systems provably have low inference capabilities". "Screw you guys, I'm going home", said the disillusioned TS and walked away in pain felt by millions.⟩
