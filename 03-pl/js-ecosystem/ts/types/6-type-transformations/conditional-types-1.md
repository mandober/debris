# Conditional types

In TS, *conditional types* are conditional constructs at the type level where one of the two types is returned depending on whether some condition is met.

These conditions are usually specified as pattern matching: if type `T` successfully matches a type `P`, then a type `A` is returned; otherwise a type `B` is returned.

Conditional types are realized with the help of the *ternary operator* known from the value level, except here it operates on types. If the condition is met, the 'true' or 'then' branch is entered; otherwise, the 'false' or 'else' branch is entered, `cond ? then : else`.

```ts
type CondType<T> = T extends P ? A : B
```
