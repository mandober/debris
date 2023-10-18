# TS :: Ref :: Types :: Generics

https://www.typescriptlang.org/docs/handbook/2/generics.html

- generic types
  - TS language items that work with generics
    - functions
    - classes
    - object
    - interfaces
    - type aliases
  - TS keywords that work with generics
    - `extends`
    - `implements`
    - `typeof`
    - `keyof`
- type variable/parameter
- generic class
- generic constraint
- type parameters with generic constraints
- class types with generics
- class factories and generics
- generic parameter defaults


## Introduction

Generics are one of the main means of creating reusable components. Generics allow us to create language items (functions, classes, objects, interfaces, type aliases) that can work over a variety of types rather than just with a single type.

Generics is another name for *parameteric polymorphism*. For example, parameterically polymorphic functions can work with any and all types (that is, with values of any and all types) and not be restricted to a single type like e.g. in C or Go (notable for their lack of generics).

## Generic functions

Typing the identity function is a prime example of the use of generics. Without generics, we would either have to give the identity function a *specific type* (e.g. number), or we would describe it using the *`any` type*.

```ts
// typed with a specific type (not generic)
function id(x: number): number { return x }
// typed using the 'any' type (not consistent)
function id(x: any): any { return x }
```

Using a specific type is horrible since that means writing the identity function for each type we'd like to support, getting a bunch of id functions.

Using the type `any` seems as being generic in that the function will be able to accept (and return) any type, but we actually loose information about what the input type was when the function returns. In fact, using `any` to type input and output types introduces a disconnect between them: if we pass in a number to 'id', we can only assume that 'id' can return any type at all - meaning we cannot actually assume anything at all. (This behaviour can be mimicked with generics by introducing two type params, A for input type, and B for output type, so the two types are completely divorced from each other, preventing us, and tsc, to make useful assumptions).

On the other hand, generics provide a way to "capture" the input type so we can resuse it to denote the return type. Generic programming achieves this by using type variables. In fact, there is no generics without type variables because they allow us to *abstract over types*, just like how regular variables allow us to *abstract over expressions*.

**Type variables** are variables that work at the type-level. Regular, *value-level variables* (usually just called variables or parameters) *bind expressions and values* at the value level, while type variables work at the type level where they *bind types*.

Similarly to value-level variables, type variables first need to be declared before they can be used (referred to), which is done using *a list delineated with angle brackets* - as opposed to *a list delineated with parenthesis* that value-level variables (formal parameters) use.

After a type variable is declared (below `T`), we can refer to it, e.g. use it to type the input and output type of the `id` function.

```ts
function id<T>(x: T): T { return x }
```

When the `id` function is appied, the type variable `T` captures the type of the argument, allowing us to refer to that type later - which we do in the return type.

Like value-level variables, type variables are also identified by their name, called the *identifier*. Using the same type variable, `T` (i.e. using the same identifier "T") guarantees that we are referring to the same type - whatever that type may be.

If we use two different type variables, `T` and `U`, they may each bind a different type, but it may also happen that they end up referring to the same type.

An important property of parameterically polymorphic (generic) functions arises:
>the more types a function accepts, the less it can do.

To the point, the identity function is one of the most generic functions there is. It works with any and all conceivable types. It can accept any type - but what can it do with it - pretty much nothing but return it unharmed.

CURIOUS NOTE: JS is one of the rare languages in which an unconstrained parameterically polymorphic function can do something else than just return its argument as is - it can call `toString()` on it! Hand at heart, for many things and especially for builtins, this is artificial: all we get is a message mentioning '[native code]', instead of some meaningful value. Nevertheless, there you go - you can either return the arg as is, or you can call 'toString' on it. Yey, JS!

```ts
type map = <A, B>(f: (a: A) => B, xs: A[]) => B[]
const map: map = (f, xs) => xs.map(f)
```

## Calling generic functions

We call a regular (unary) function by supplying an value-argument. To call an unary generic function we need to supply a type-argument and a value-argument.
