# Natural numbers


Sooner or later, we'll need some sort of counter to pull out some of the more engaged type functions like `Drop`, which drops the first `n` elements from a tuple. Peano-style natural numbers are a prime candidate for counters and iteration at the type level, but we need to come up with a way to represent them in the TS.

## Tuples

At the type level, tuples behave like arrays at the value level. We can destructure them and we can use rest/spread operator with them. TS differentiates between tuples and arrays, but JS does not, i.e. JS only has arrays so TS tuples end up being arrays in the end. Although they are both really arrays, TS's tuples are fixed collections that can hold heterogeneous elements, while arrays can only hold homogeneous elements in TS. TS denotes the array types in general by `T[]`, while tuples cannot be denoted in general. A particualar tuple like `[42, true, 'fortitude']` has the type `[number, boolean, string]`. Tuples have no general denotation because they are determined not only by their size but also by the type of each member. Despite this, TS let's us use the construct `T[]` to match both arrays and tuples, while `Array<T>` can be used to match only array types. There is no way to match only tuples - that is, there is no way to constrain the generic type parameter, `T`, so it only matched tuples. However, even though the type expression `T extends any[]` in a type fucntion will let through both arrays and tuples, we can later sieve them to pinpoint tuples using destructuring constructs, e.g. `T extends [X, ...Xs]`, like in the `Tail` type function:

```ts
export type Tail<T extends any[]> =
                 T extends [any, ...infer Xs] ? Xs : never
```

## Tuples as counters

We can also abuse tuples to serve as counters. 
