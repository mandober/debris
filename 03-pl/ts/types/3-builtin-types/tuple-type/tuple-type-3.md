# Tuple types

At the value level, a tuple is a fixed sequence of heterogeneous elements, e.g. `[true, 42, "fortitude"]`.

An array is a homogeneous sequence of elements, e.g. `[1, 2, 3]`.

JS has no tuples, only arrays, so TS represents tuples using arrays, since arrays in JS can be heterogeneous. As far as JS is conserned, what TS calls tuples and arrays are just arrays.

TS seeks to bring more order into JS, so it took an oppurtunity to split arrays into tuples and lists/arrays. Tuples have a fixed size, but can contain elements of different types, while arrays can contain unbounded number of elements but all of the same type. Thus, typing an array is a lot simpler, e.g. `[1, 2, 3]: number[]`. We can even express the type of any arbitrary array in general as `T[]`, where `T` is a type variable that ranges over all TS types.

On the other hand, typing a tuple means specifying the type for each of its elements, e.g. `[true, 42, "fortitude"]: [boolean, number, string]`. Moreover, unlike arrays, we cannot express the type of any arbitrary tuple because tuple types are defined by both their size and the type of each element.

However, TS offers the *pattern* `any[]` or `T[]` to match any array type (which is expected), but it also matches any tuple type (which is very much unexpected). But TS gets away with it by taking advantage of the fact that both tuples and arrays are just arrays at the value level.

When defining a new type, the construct below, `T extends any[]`, is used to allow both arrays and tuples to match, i.e. the type variable `T` is constrained to array and tuple types.

```ts
type Head<T extends any[]> = …
```

TS also allows 0-tuples, typed as `[]`, which may be ambiguous in some situations as it may also stand for an empty array - although an array type should also always have the type of its elements attached, i.e. the type `T[]` covers all sorts of array, of any element type and of any length - there is no special type for an empty array - an empty array is still `T[]` or `Array<T>`, just like any other array (so maybe it's not ambiguous after all). However, as we established earlier, the `T[]` variant, unlike `Array<T>`, matches all sorts of arrays as well as tuples.

TS also allows 1-tuples, typed in general as `[T]` or `[any]`. This time the type clearly pertains only to tuples since arrays are typed unambiguously as `Array<T>`; or ambiguously as `T[]` since the latter types all possible arrays and tuples.

Consider the `Head` type function which targets tuples in order to return the first element (type) off of one.

```ts
export type Head<T extends any[]> =
                 T extends [infer X, ...any[]] ? X : never
```

The pattern `T extends [infer X, ...any[]]` cannot match arrays because we are at the type level here, so it can only pertain to tuples.

>Tuple types become similar to value-level arrays, while array types have no internal structure to decompose like they do at the value level. At the type level, it is the tuple types that can be destructured into their components, like the arrays can at the value level.

It makes no sense to use a type function like `Head` on an array type. Array types, `Array<T>`, only "contain" a single type, `T`, which is the type of their elements. It is a singular type since all array elements must have the same type, `T`. We can extract this type from an array type, but that is done using a different utility function, like `ElemType` below, and destructuring is not required to get it done.

```ts
type ElemType<T> = T extends any[] ? T[number] : T
```
