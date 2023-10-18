# TS :: Types :: Type-level keywords :: extends

- `extends` type-level keyword
- narrowing the set of types a type parameter ranges over
- type-level pattern matching


## Basics

Basic syntax: `T extends U` inside a type context

The `extends` type-keyword broadens (extends) the types a type parameter on its left, `T`, ranges over to also include the type on its right, `U`.

```ts
type StringToo<T> = T extends string
```

Guess: A type param `T` by itself ranges over all possible types, as any type param does. In order to constraint these set of types over which `T` ranges, we use `extends` construct to specify the type, as `U`, making sure `T` only ranges over `U`? I mean, if `T` ranges over all types then `T` ranges over all types, right? Including a specific type into the set of all types is still that same set of all types, no? If not, then does this mean that the set of types `T` ranges over is actually restricted to this one type, `U` after the "extension"? If so, `extends` is a strange name indeed.

## Using extends to constrain generics

>The `extends` keyword is used to *narrow the scope* of type parameters.



## Type-level pattern matching

The `extends` type-keyword may be thought of as a way to provide type-level pattern matching, especially when used with conditional types.

```ts
export type Params<F extends (...args: any[]) => any> =
  F extends ((...args: infer A) => any)
    ? A
    : never

type HasTail<T extends any[]> =
  T extends ([] | [any])
    ? false
    : true
```

Here, in `Params`, the first occurrence of `extends` serves to extend the type param `F` to include function types, but the second occurrence is used to check if the type `F` *conforms* to the shape, i.e. to the type, given on the right side of the `extends`, which is again a general function type. Basically, this serves to determine whether `F` is a function, and if it is, the `infer` type keyword is used to sort of bind the function arguments (args as array) to another type param `A`. So, if it is a function, the condition evaluates to `A`, returning the type of function args; otherwise, the type `never` is returned which serves as no-op, i.e. it expresses that if the *type argument* is not a function, we do nothing.

It is similar with the `HasTail` type utility; `<T extends any[]>` means that `HasTail` type function accepts an array of any type. Then the second occurrence of `extends` pattern matches the type argument against the pattern: either the type argument is an empty tuple `[]` (or an empty array, the two are indistiguishable), or a 1-tuple with any type inside. If the type arg matches this pattern, `false` is returned, otherwise `true`.

Note: An array or a tuple can be decomposed into the first element (component) and the rest of elements. The first element is usually called the head, and the rest of elements are called tail. Strictly, an empty array or an empty tuple do not have neither head nor tail; and singleton arrays or tuples have head but no tail.

So, as its name implies, `HasTail` type function first checks to make sure the type arg is a tuple (although it may also be an array), and then it checks whether it has a tail, i.e. whether it contains more than 1 element type.
