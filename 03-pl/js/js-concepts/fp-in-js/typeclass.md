# FP :: Typeclasses in TS

In PLs, polymorphism comes in two flavors:
- parametric or universal polymorphism
- ad hoc polymorphism (sometimes called overloading)

*Parametric polymorphism* is the qualily of language agents (functions) stating that they can work with any type whatsoever. This can be a too broad of an assumption because there are tricky, advanced types like universally or existentially quantified types which need extra support from the type system to be accepted as the arguments of parametrically polymorphic functions. However, for the usual, domesticated types, which is the case with TS types, we can indeed say that parametrically polymorphic (PP) functions work with any type at all. The examplary PP functions are `id`, `const`, as are any combinators, especially "lambda combinator birds".

```ts
const id = <A>(a: A) => A

```




ad hoc polymorphism

Typeclasses are a realization of ad hoc polymorphism.


by specifying a set of functions or constant names, together with their respective types, that must exist for every type that belongs to the class.

In fp-ts type classes are encoded as TypeScript interfaces.

A type class Eq, intended to contain types that admit equality, is declared in the following way
