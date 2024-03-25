# TS :: Types :: Nominal types :: any

- `unknown` is a superset of every type; anything can be assigned to it.
  A | unknown = unknown
  A & unknown = A
- `never` corresponds to the empty set. `never` is a subset of every type.
  A | never = A
  A & never = never
- `any` pseudo type is both a superset and a subset (!) of every type
  A | any = any
  A & any = any
- this fact is why `any` is called a *pseudo type*
  and why TypeScript has an *unsound type system*
  any | never   = any
  any | unknown = any
  any & never   = any
  any & unknown = any

>never ⊆ T ⊆ unknown
>>any ⊆ never ⊆ T ⊆ unknown ⊆ any
>>>… ⊆ any ⊆ never ⊆ T ⊆ unknown ⊆ any ⊆ never ⊆ T ⊆ unknown ⊆ any ⊆ …

The fact that `any` is both a superset and a subset of every type makes the typing relation *circular* and the type system thus unsound. In this circular typing relation all type-roles - i.e. bottom type as `never`, any type as `T`, and to ptype as `unknown` - are circular; e.g. any type `T` is both a subtype and a supertype of itself... hmm, that is actually fine, `T ⊆ T`. No, the worse thing is that the bottom is a supertype (and a subtype) of top, and vice versa. 
>How about concrete examples to showcase the consequence of unsoundness?




## pseudo-type any

The *pseudo-type* `any` signifies that TS cannot assume anything about the expression it annotates. In fact, on encountering `any`, type checker is disabled for the expression annotated with it.

Unknown entities (ambient variables like browser-defined objects `window` and `document`, which TS knows nothing about) are automatically assigned the `any` type.

To emit an error when `any` type is inferred, enable `noImplicitAny` in `tsconfig.json`.

Moreover, the `any` type is **contagious** - if you initialize a variable with an expression annotated with `any`, the variable will also have the `any` type.

Importantly, although it sounds like it, `any` is not a *top type* (`unknown` is).

## Type parameters vs any

It is said that with generics, expecially with generic functions, a type parameter that is used only once (declared and used in one place), is no better than using `any` instead.

```ts
// here, the type param A is used as one of the inputs AND as an output, so ✔
type Kite = <A, B>(a: A) => (b: B) => A

// here, the input type is not associated to the the output type, in general
type ToString = <A>(a: A) => string
// so it is said this is no better than doing:
type ToString = (a: any) => string
```

This is supposed to rely the fact that type params, as they are used in TS, are supposed to make connections between the different values the annotate, and using a lone type param fails to make any associations, so it is deemed equivalent as if the `any` type is used in its place.

This probably doesn't imply that in such situations the two are completely equivalent - some situations will keep the code flagged with a warning if the type param is used, and the warning goes away if it is replaced with `any`. After all, `any` is a hammer that turns off the type checking, so they cannot be really equivalent.
