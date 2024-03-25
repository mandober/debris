# Faking nominal types

https://github.com/Microsoft/TypeScript/issues/202


## Nominal Typing

https://basarat.gitbook.io/typescript/main-1/nominaltyping

TypeScript's type system is structural because structural typing is a better match for JS dynamical nature.

However, sometimes nominal typing is desired

for a system where you want two variables to be differentiated because they have a different type name even if they have the same structure. A very common use case is identity structures (which are generally just strings with semantics associated with their name in languages like C#/Java).
