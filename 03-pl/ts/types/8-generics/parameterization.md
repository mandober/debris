# Parameterization

## 1. Parameterization

Consider the parameterization of these 'standalone' function signatures:

```ts
// type param T only on the left
type Fn1<T> = (n: number, xs: T[]) => T[]
// type param T only on the right
type Fn2 = <T>(n: number, xs: T[]) => T[]
// type param T on both sides
type Fn3<T> = <T>(n: number, xs: T[]) => T[]
// split parameterization
type Fn4<N> = (n: N) => <T>(xs: T[]) => T[]
// split parameterization: shadowing
type Fn5<T> = <T>(n: N, xs: T[]) => T[]
// split parameterization:
//  e.g. C may be a tuple or an object type
type Fn6<A, B> = <C>(x: A, y: B) => C
```

- What exactly is the difference between these types, regarding the declaration of type parameters?
- What does the side on which the TP is declared entails?


- In the example `Fn5` it seems probable that the *shadowing* does occur: the type param `T` declared on the right shadows `T` declared on the left. Is there are a way to prove this or show it in a more obvious way (e.g. maybe using constraints and type condiš).



## What does it mean to declare a type param on the left?

[I guess] The left-hand side of a type equation is the 'standard' place to declare a type parameter, that follows the same pattern as the parameterization of objects, classes, interfaces, etc. [I should think] it means that *the type param is shared across the entire definition that follows*.

```ts
interface IFace<A> {
  
}
```


that pertains to the `Fn1` type signature. On the other hand, declaring 


The other signature, in `Fn2`, the parameterization is done for the function on the right hand side. Sure, it is the only function there in this case, but [I think] it need not be. For example, consider this array:

```ts
const arr =
  [ <A>(x: A) => x
  , <A, B>(x: A, y: B) => y
  , <A, B>(x: A, y: B) => y
  , <A, B>(x: A, f: (x: A) => B) => f(x)
  ]
```

Each function in the array is parameterized 'for itself' (for its own sake), and there is no 'shared' type param that would parameterize `arr` container.
