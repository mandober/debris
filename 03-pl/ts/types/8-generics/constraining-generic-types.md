# TS :: Types :: Constraining generic types

## Constraining a type parameter

Consider this type function:

```ts
// Head v.1
type Head<T> =
          T extends [infer X, ...any[]] ? X : never
```

It is parameterized by a single type param `T`, which may be instantiated with any and all types. A type parameter, like `T` here, ranges over all TS's types. This means this function will accept any type argument. However, then on the right hand side, we check if that type argument has a certain shape, that is, if it conforms to the tuple type, i.e. if it can be destructured into a head element and the rest of elements. If it can, we extract the first element, or we return `never` otherwise.

It is evident that this could be improved - instead of accepting any type whatsoever, this function should only accepts a type argument of the appropriate shape. This is achieved by *constraining the type parameter*. Already on the left hand side, when declaring a type parameter, we should place restrictions on it.

```ts
// Head v.2
type Head<T extends any[]> =
          T extends [infer X, ...any[]] ? X : never
```

The two functions have identical bodies, the only change is made on the left hand side. The constraint is declared using the `extends` keyword, after the type param, along with a type, `T extends any[]`. That type, here `any[]`, should be thought of as a *pattern we are matching the type argument against*. If the match succeds, the type argument is accepted and the right hand side of the function is executed. If the match fails, that would be a compile-time errror; in fact, in modern IDEs, it wouldn't even come to that as we'd get a red squiggly underlining that call to indicate a type error. But if you insisted to compile it despite that type error, you'd get the `never` type as the result.

```ts
type t1 = Head<[string, number]> // string
type t2 = Head<string[]>         // never
type tx = Head<boolean>          // never
//             ^^^^^^^
// red squiggly indicating a TYPE ERROR
// due to the wrong type argument
```

Note that passing an array, `string[]`, is accepted as a type argument, but results in the 'else' brach executing so we get the `never` type as the result. This is because both array and tuple types conform to the pattern `any[]`, but the right hand-side destructuring only makes sense for tuple types. In fact, that destructuring is also pattern matching, but augmented with `infer` keywords which lets us bind the parts of the destructured type (and that type can only be a tuple type). This fact shows that we can indeed diferentiate between array and tuple types and that we should implement the destructing also on the left hand side to only allow tuples as type arguments.

```ts
// Head v.3
type Head<T extends [any, ...any[]]> =
          T extends [infer X, ...any[]] ? X : never
```

And now it works as intended - only type arguments which are tuple types will be admitted. In the 3 example calls above, the function now also excludes the second call, i.e. arrays as type argument, and only accepts tuples:

```ts
type t1 = Head<[string, number]> // string
type t2 = Head<string[]>         // never
//             ^^^^^^^^ TYPE ERROR
type tx = Head<boolean>          // never
//             ^^^^^^^  TYPE ERROR
```

The last revision of the function also justifies calling what the type arg is matched against a pattern, instead of type. Before, a type argument was matched against `any[]`, which may be deemed a type, but now we match against something that should be deemed a pattern, `[any, ...any[]]`.

Moreover, this makes it impossible to get the `never` type as the result of a call to this type function (unless the type error is ignored and the compilation is forced).

## Parameteric polymorphism

The type function above is *parametrically polymorphic*, which in TypeScript is also generic, although generics also cover the other kind of polymorphism, the ad hoc polymorphism, which can also be achieved in TypeScript via overloading.






A type paramter, `T`, refers to all types; that is, any type may be instantiated for `T`. Therefore, a (unary) function whose input is `T` accepts any and all values, and thus it can do very little with it, except return it or convert it to a string - because all JS values (types) have the `toString()` method, even functions (although in their case the returned string is useless; come to think about it, so is for many other types, unless a type specifically redifines the `toString` method).

Anyway, the more types a function accepts the less it can do. That's where the constraints come in - a generic type, i.e. a type parameter like `T` need to be constrained so it doesn't refer to all types but to an explicitly selected subset.

Actually, we can define a specific subset of types using two approaches:
- by explicitly listing the types as a union
- by constaining a type param and extending it to include the listed types

Starting with no types, we can specify the types we want to include via type *union*, e.g. `string | Array<string> | number | number[]`.

Or, we can start with all types (represented by a type parameter `T`) and then specify the types `T` should extend by *constraining* the type parameter, e.g. `T extends string & T extends number`.

Though these two type definitions express the same thing, the one using generics requires less typing (hmm… although it is longer? well, in this case):

```ts
type stringsOnly = <T extends string & T extends number>(t: T): T => t
type stringsOnly = (t: string | number): string | number => t
```
