## Higher-kinded types

>Actually, *higher-kinded types* are different from *higher-order types*.

- A higher-order type:  TyFn<A>    or TyFn<T, A>,    but not TyFn
- A higher-kinded type: TyFn<F><A> or TyFn<F><A, B>, but not TyFn<T, A>

## Higher-order types

A type function `TyFn` below is unparameterized, and it can be called a *zeroth-odered type*.

```ts
type TyFn0 = …
```

*Higher-order types* are parameterized type functions, like `TyFn1` and `TyFn2` below. They are higher-order types regardless of the the nunmber of params. More precisely, these two are *first-order types* (FOT) provided their type params (`A` and `B`) are not type functions.

```ts
type TyFn1<A> = …
type TyFn1<A, B> = …
```

*Higher-order types* are type functions that may take type functions as arguements and those functions can be of any order.

*Second-order types* are type functions that may take type functions as arguments as long as their order is less than 2.


## Higher-kinded types

These type functions are not determined by the *type order* of their arguments, but by further parameterization.

- Zeroth-kinded type: TyFn<T, A>
- Higher-kinded type: TyFn<F><A> or TyFn<F><A, B>

Higher-kinded types parameterize over types, like higher-order type fucntions do, but these can also parameterize over type constructors.

First, `List` is the name of the type, but it is also a type function, and the type ctor is also called `List`. However, List is not its proper correct name, because List is parameterized - it should be `List<A>`. Although, these things are often used interchangibly, so the type, type function, type ctor (type ctors are always type functions) are often all called List. The type `Set<A>` is similar to list in its shape, but it has further constraints. `Set` and `List` are unary type ctors - each takes a type argument to produce a saturated type. However, there are operations that could be performed on both lists and sets, but whose definition would require parameterization over the type ctors.

For example, a type function `Elem` that checks if an element exists in th given collection (like a set or list) would be parameterized over a type ctor, `Elem<T><A>`.

```ts
type Elem<T><A> = …

// To call it, we'd first have to pass in type ctor, then a base type.

// We could create a type fn that works only on List:
type ElemList<A> = Elem<List><A>

// or one that works only on Set (type remains unsaturated like above)
type ElemList<A> = Elem<Set><A>

// This one only works with sets of numbers (type is now fully saturated)
type ElemSetNumber = Elem<Set><number>
// or list of strings
type ElemListString = Elem<List><string>
```

It's an abstraction one level higher. HKTs are necessary to introduce various algebras like `Monoid`, `Semigroup`, `Group`, etc. (which are implemented in Haskell with type classes; type classes are similar but distinct to HKTs which Haskell also supports).



>HKTs are not supported in TS.

However, the tecnique of defunctionalization can be used to achive the same goal, although it is unclear how comfortable the syntax would be.




## generic functions

In TS, *generic functions* are functions on types - types go in and types come out (more precisely, a single type comes out).

Generic functions are thus parameterized over types. Intead of some concrete type being mentioned somewhere within a function's body, it is abstracted and taken as an argument. This mechanism of *parameterization* saves us from having to write one function for each of the compatible type. If we did, we'd notice that such functions look almost the same, differing only in the concrete type each one uses.

```ts
type Params1<T extends (...args: any    ) => any> =
             T extends (...args: infer P) => any ? P : never


type Params<T extends (...args: any    ) => any> =
            T extends (...args: infer P) => any ? P : never
```

practically the same function for each type we'd like it to work with.

In fact, the parameterization wor


This allows us to create functions that work, practically the same, over a range of types, rather than creating a function for every single of those types.

Then the caller can pass a compatible type in 



A *unary generic function* is parameterized over one type - when we call it, we need to pass it a type as an argument.

A *binary generic function* is parameterized over two type - when we call it, we need to pass it two types as arguments.

In general, functions that take more than one argument are called *polyadic*.


and it returns a type. Actually, a generic function may be parameterized over a set of types - it may take one or more types, or none (well, a nullary generic function, which takes no type args, is not parameterized, so it's not a generic function after all).





A *higher-kinded type* (HKT) or a *higher-order type*
is a kind of type-level function that 
