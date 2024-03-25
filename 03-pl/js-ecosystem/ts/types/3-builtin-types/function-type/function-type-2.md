# TS :: Types :: Function type

## Generics and function types

A generic parameter can be introduced with `class`, `type`, `interface` constructions, but only function types have the ability to introduce a new type param in their own declaration.

```ts
type F    = <T>(...args: T[]) => T // local T
type G<T> =    (...args: T[]) => T // external T
type H<T> = <T>(...args: T[]) => T // local T shadows the external T

// other types cannot declare type params on the right-hand side
type HPair<A> = [A, A]
type Pair<A, B> = [A, B]
type Array<A> = A[]
```

Considing these two declarations that use `type` (but the same would be in case of `interface`), any type can be made generic by parameterizing the constructor i.e. *the type param must be declared on the left-hand side*.

However, only function types have the ability to declare type params on the *right-hand side*, that is, function types need not rely on **external type params** since they can declare their own **local type params**.

In fact, if the external type param has the same name as the local type param, the external type param will be *shadowed* by the local type param.


## Interface and function types

A function type can be placed in an interface

```ts
interface Face {
  <T>(...arg: T[]): T
}
```
