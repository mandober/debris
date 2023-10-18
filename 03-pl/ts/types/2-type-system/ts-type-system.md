# TS :: Types :: TypeScript's type system

## TypeScript's type system - summary
- types are sets
- subtyping
- structural type system
- nearly Turing complete type system
  - type functions
  - recursive type functions
  - conditional types
- variance
  - covariance
  - contravariance
  - invariance
- gradual typing
  - unsound (due to `any`)
  - circular type hierarchy
- type refinement
  - type widening
  - type narrowing


## TypeScript's type system


## Type checking

TypeScript introduces a type system over JavaScript. JS is dynamically typed language with *duck-typing*. This means we have to do a runtime check in order to determine what type a value has. Due to dynamic types and allowed coercions, JS is highly unsafe language, which TypeScript aims to correct by enforcing static typing.

Static types make sure expressions are typed correctly, which is checked at compiletime, after which the types are erased - there are no types around at runtime. This is called *type erasure* and it is a phase of compilatioon present in many statically typed languages. Types are there as a safety net for the programmer, so after asserting that everything type-checks at compile-time, types can be safely erased as they have served their purpose.

In JavaScript, we can check the type a value has, but this check is the work that has to be done at runtime - that is, the type cannot be just read off somewhere - so it incurrs a runtime performance penalty.

This is to say that TS has zero effect at runtime; actually, there's no trace of TS at runtime - all that's left is JS code.
