# TypeScript :: TypeScript's type system

This section explores TypeScript's type system and compares it to other type systems, as well as other type-theoretical concepts pertaining to TypeScript.

- static types
- type erasure
- types as sets
- structural typing
- type hierarchy
- unsoundness
- the `any` type
- inference capabilities
- polymorphism
  - generics
  - pattern matching
  - ad hoc polymorphism, overloading
- subtyping
  - subtyping in face of polymorphism
  - variance
- type-level computation
  - type level is nearly Turing complete


## JavaScript and TypeScript
TypeScript could be thought of as a programming language in its own right, when the union of JS and TS is viewed as a single language; in this case, we talk about *TypeScript the language*. On the other hand, what is the case is that the TypeScript is merely a type system pulled over another independent langauge; focused only on this case, we talk about *TypeScript the type system*.

With this in mind, we could talk about TypeScript as being a statically typed langauge, but since it only provides a type system, it seems better to be more precise and use the term *statical typing* and *static types*, although it is nit picking. In any case, the point is that *types do not survive compilation*, which is what happens in many statically typed languages, including Haskell (our role model langauge, especially type-system-wise), (but exclusing dependently-typed langauges where the distinction between values and types either does not exists or it is very thin and vague). Types are primarily there for the benefit of the programmer, so they are crucial during design-time. They are checked during compile-time and then they are gone.

## Type erasure
The compile-time only provides an opportunity to stop and type-check the entire program *once again*; 'once again' because, pressumably, almost everyone works in a modern IDE which is nowadays connected to various language servers, so the type checking is performed all the time during coding. In any case, *after the compilation, types are erased*. Types are not around at the runtime, so JS programs (could) look the same whether they are created with the TypeScript's help or not (save, of course, for the errors which TypeScript is there to weed out).

## Type-level Turing completeness
JavaScript is, of course, Turing complete, but since the version 2, the same property can also be attributed to TypeScript (i.e. TypeScript's type system), which makes type-level programming possible. Actually, the TypeScript's type system is *nearly Turing complete* because it is not (yet) possible to pass generic functions around. There are also some issues with recursion, and this can be work around usually, although sometimes there are no solutions.

## Types are sets
In TypeScript, types are sets. Any given type may be a subset of some type. In fact, given any type, there is a type that is its supertype, and there is a type that is its subtype. Similarly to sets, any given type is also its own super/subtype.

Similarly to how the universal set 𝒰 contains all other types, including itself, 𝒰 ⊆ 𝒰. This makes a naive set theory unsound due to the Russell's paradox. The same is true for TypeScript's type system, where the type `unknown`, corresponding to the universal set, is a supertype of any other type, including itself, `unknown :> unknown`. However, by itself, this property would not perhaps be very determintal (just look at Haskell which also has type-in-type), but the presence of `any` cements the unsoundness.

(I need to understand this better, in particual to find concrete examples that would prove determintal to programming with such a type system. For now I doubt some very tragic consequences exists, since the type system is just a thin veneer over another language - those two are not one)

## Type hierarchy
`any <: never <: T <: unknown <: any`

## Unsoundness
The pseudo-type `any` is the subtype as well as the supertype of every type, and it is this fact that makes its type system unsound. Looking at the type hierarchy `any` is both the top and the bottom type, which makes the hierarchy circular. This is a deliberate choice made for TypeScript since it is intended to accomodate JS shenanigans and this was probably the best way to do it. TypeScript was also created to have gradual adoptation on the existing JS code base, so the `any` type was the solution for that compromise. What the `any` type actually does is turn off type checking for the annotated expression. The problem, however, is that `any` is contagious, so it spreads and infects the surrounding expressions as well. You cannot make the outer type be sound when an inner type was annotated with `any` and thus could stand for anything at all.

## The `any` type
The type `any` is the subtype as well as the supertype of every type, which deserves it the moniker pseudo-type.
