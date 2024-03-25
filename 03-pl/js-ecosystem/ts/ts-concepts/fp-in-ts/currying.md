# Typing curry in TS

https://medium.com/free-code-camp/typescript-curry-ramda-types-f747e99744ab

## Tuple types

In TS, tuples express a sequence with a fixed number of elements. Since JS has no tuples, TS uses JS array instead. At the value level, there is no difference between a tuple and an array, but at the type level, TS makes a difference by forcing different types on them.

An array type is `T[]`, while a tuple is typed by `[T, U, V, …]`. Not only is a tuple sequence of a fixed number of elements (components), but the overall type of a tuple depends on the type of each component element.

## Parameters

`Parameters` is a utility type (type function) used to get the parameters of a function type as a tuple:

```ts
type Parameters<T extends (...args: any    ) => any> =
                T extends (...args: infer P) => any ? P : never

// it seems we can avoid double matching T against the unary function
// type, instad just matching against `any` on the left-hand side:
type Parameters<T extends any> =
                T extends (...args: infer P) => any ? P : never
```

On the lhs of the definition of `Parameters`, a type parameter `T` is declared; it must match the type of a *unary function*, i.e. a function that accepts a single arg, which is an array (since the rest operator gathers all args into an array). No matter how many args it is called with, `args` will be an array.

A unary function type is `(arg: any) => any`, but even if we add the rest operator, the type remains the same: `(...args: any) => any`. Maybe a more precise type would be `(...args: any[]) => any`, since the rest operator gathers args into an array. However using `any[]` amounts to the same thing as `any` when `any` type is used; each occurrence of the `any` type is independent of other occurrences, unlike if we used a type param like `T` instead of `any`.

On the rhs of the definition of `Parameters`, 
the type param `T` is again checked to see if it matches (conforms) 
again, to a unary function type, `(...args: any[]) => any`. 
However, this time we use the magin **infer** keyword 
to have TS infer the type of the input argument, 
and we use the type param `P` 
to refer to that param that TS will infer for us. 

This pretty much looks like pattern matching on the type level 
(although with some redundant, repeated elements): 
if `T` matches the shape of the specified type, 
(i.e. if `T` matches the shape of the unary function type), 
then we bind the function input type to a fresh type var `P`, 
(which in TS is denoted `args: infer P`), 
and, if it does indeed match,
we return (the bound type var) `P`. 
Otherwise, we return `never`, 
which in this context stands as nevermind (noop).

But, we are doing the same pattern match **twice**: first on the left-hand side, then again on the right hand side. (as suspected) It still works if we elide the redundant rhs match and just match against `any`.

```ts
type Pars<T extends any> =
          T extends (...args: infer P) => any ? P : never
```

Mais non! This matches any type, but only returns function params as a tuple if the matched type was indeed a function type; else, we get `never`!

```ts
const foo = (s: string, n: number, b: boolean) => b
const arr = [1,32,3]

type F3 = Pars<typeof foo>
//   F3 = [s: string, n: number, b: boolean]

type F1 = Pars<typeof arr>
//   F1 = never
```

The difference is that with `Parameters`, TS insists that the type must be a function type and complins if it isn't; thus, we cannot use `Parameters` against any other types except unary functions. But `Pars`, we can use on any type - only if the type is indeed unary function, we get back the function's parameters as a tuple and otherwise we get back `never` type (unlike with `Parameters` where we cannot even do the wrong match).

## ReturnType

```ts
type ReturnTy<T extends (...as: any) => any> =
              T extends (...as: any) => infer R ? R : any
```

## Head

Head takes a tuple type `T` and returns its first type component.

We'll use `Head` to implement `Curry`; it will let us know which argument type has to be taken at a time.

```ts
type Head<T extends any[]> =
          T extends [any, ...any[]] ? T[0] : never
```

## Tail

A curried function consumes arguments one by one. This means that when we consume `Head<Params<F>>`, where `F` is the original, uncurryied function type, we need to move on to the next unconsumed parameter. This is the purpose of `Tail`, which removes the first component from a tuple type.

As of TypeScript 3.4, we cannot "simply" remove the first entry of a tuple. So, we are going to work around this problem by using one very valid trick: Using function types, we were able to tell TypeScript to infer the tuple that we wanted.

```ts
// Tail that takes a function type
type Tail<T extends any[]> =
  ((...ts: T) => any)
    extends ((x: any, ...xs: infer Ts) => any) ? Ts : []
```

The `Tail` above takes a function type and destructures the params as `x, ...xs`, infers `xs` to return `xs`.


But, we can simply remove the first component from a tuple:

```ts
// Tail that takes a tuple type
type Tail<T extends any> =
          T extends [infer X, ...infer Xs] ? Xs : []

type _ = Tail<[string, number, boolean]>
//   _ = [number, boolean]
```

## Head and Tail

```ts
type HdTl<T extends any> =
          T extends [infer X, ...infer Xs] ? [X, Xs] : []

type _ = HdTl<[string, number, boolean]>
//   _ = [string, [number, boolean]]
```
