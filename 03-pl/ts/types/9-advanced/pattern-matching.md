# Pattern matching

- pattern matching
- patterns
  - irrefutable
    - type parameter, `T`
  - refutable
    - type shapes, e.g. `(a: X, ...args: Xs) => R`, `any[]`, `[A, B, C]`, …
  - nominal
    - `any`
  - returned types of conditionals, esp. in 'else' branch
    - `any`
    - `never`
    - `unknown`
    - same as type arg
  - `infer` type operator
    - infers and names an inner type so we can return it (in one of branches)
    - introduces a fresh type var and binds the (inferred) type
      - `type Elem2<T> = T extends Array<infer E> ? E : never`
      - `type Elem3<T> = T extends (infer E)[] ? E : never`
      - `(a: any, ...args: any[]) => R`
      - `(a: any, ...args: infer Xs) => R`



## Matching a type parameter against a pattern

Patterns are defined using the `extends` construct. That `T extends U` can be interpreted literally as `T` being a subtype of some type `U`. However, it is better to think about this as if it were saying that type `T` matches the type `U`, that is, the type `T` has the same shape as the type `U`.

The type parameter `T` is an input parameter of the type function `Fn`, so we might also refer to it as **type argument** it will eventually become; and denote it as such more appropriately by `Arg`.

The type `U` is used as the type we match the type argument `T` against, so we may call it a **type pattern** and denote it more clearly as `Pat`.

```ts
type Fn<Arg extends Pat> = …
```

Pehaphs confusingy, both `Arg` and `Pat` are patterns. They are both type parameters and they are both (type) patterns. It is only their position that indicates that `Arg` ahould be matched against `Pat`.

A type parameter is the simplest kind of a pattern. A type parameter like `T` will *bind* any sort of type argument a type function is called with. So a type parameter is this position is also a binder - it will bind the type argument when the type function is called.

Calling `Fn` type function with the type argument `string` binds the type parameter `Arg` to `string`:

```ts
type Result = Fn<string>
```

In fact, whichever type we used as a type argument it would be bound to type paramter `Arg`. Such type parameters are said to *irrefutable*. They are *irrefutable binders*. Their shape is so simple they will successfully bind any and all type arguments. Viewed as patterns, they represent the simplest kind of pattern which is also called an *irrefutable pattern*.


See [conditional types](./conditional-types.md)





## Matching a type shape against a pattern

Usually we match a *type parameter* against a pattern, but we may also match a *type shape* against it. Type shape is just a name for a type that is described in more details so as to constraint it to the intended type.

A type shape is a type parameter like `T`, but `T` represents type, so it matches against any kind of pattern. We say that 





First we declare a new type parameter, `T`, and then we match it against a pattern.

```ts
type Type<T extends Pat> =
          T extends Pat ? A : B
```

```ts
type Type<T> =
          T extends Pat ? A : B
```


A simplified form of this construct may look like this (note that this is not a valid TS code as the type params `U`, `A`, `B` have not been declared anywhere; they just mark the places where the legal types may appear, as we'll see later):






## Pattern matching in type-level functions

In TS, the definition of a [type-level function](./type-functions.md) using conditional types allows for what can be considered *pattern-matching* on types.

Take, for example, a TS's utility type, `Parameters`, which extracts the types of a function's parameters as a tuple. `Parameters` is called a utility type but it is actually a unary type-level function.

```ts
type Parameters<T extends (...args: any    ) => any> =
                T extends (...args: infer P) => any ? P : never
```

The `Parameters` type function takes a single argument, denoted by here `T`, which must be a type. If it is a *function type*, the `Parameters` does its thing; otherwise, it returns the `never` type.

There are two ingrediants that make this possible: *pattern-matching* on types and *conditional types*. Both constructs are independent from each other, but used together, we get a powerful pattern that may be called **conditional type with pattern-matching**.

A simplified form of this construct may look like this (note that this is not a valid TS code as the type params `U`, `A`, `B` have not been declared anywhere; they just mark the places where the legal types may appear, as we'll see later):

```ts
type Type<T extends U> =
          T extends U ? A : B
```

We have here a *type-level equation*: on the left side of the equals sign, we declare the name of the new type, here `Type`, along with its type parameters, here only a single type param, `T`. On the right side of the equals sign, we have a type conditional that returns one of the two types, either `A` or `B`, depending on whether the *type argument* matches the specified pattern.

First thing to note is that the same pattern, `extends U`, is used on both sides of the equation, which may seem redundant. However, the pattern on the left side is needed in order to assure that the type argument matches this shape right away. In other words, TS will only allow a call to `Type` type function if the type argument matches the specified shape - we cannot pass in any old shape. If we didn't insist on this, we could have elided the pattern match on the left side like this:

```ts
type Type<T> =
          T extends U ? A : B
```

In this case, any type is accepted as the type argument to `Type` type function, i.e. the shape of the type argument is not restricted, it can have any shape whatsoever, as opposed to the previous version of `Type`.







Pattern-matching on types is realized using the `extends` keyword.

In the definition of the `Parameters` type function above, patter matching is used twice: first, on the left-hand side (of the equals sign) within the angle brackets where a type variable `T` is declared; then again on the right-hand side in the conditional type construct.







```ts
type Parameters<T extends (...args: any    ) => any> =
                T extends (...args: infer P) => any ? P : T
```



Thus, when calling the `Parameters`, we must either pass a (function) type directly or we must get the type of a function via `typeof` keyword.



This is pretty much pattern matching on the type level. 

(although with some redundant, repeated elements): 
if `T` matches the shape of the specified type, 
(i.e. if `T` matches the shape of the unary function type), 
then we bind the function input type to a fresh type var `P`, 
(which in TS is denoted `args: infer P`), 
and, if it does indeed match,
we return (the bound type var) `P`. 
Otherwise, we return `never`, 
which in this context stands as nevermind (noop).
