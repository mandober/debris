# Assignability

https://docs.google.com/presentation/d/18Y0M4SRjKoJGR3ePSBBn8yPlpkE5biufZRdHo1Ka2AI/edit#slide=id.g117eb35f34d_0_249


## never, unknown and any

In TS, the *top type* is the `unknown` type, which means `unknown` is the superset of every type, and anything can be assigned to it, i.e. any other type is assignable to the `unknown` type.

- `unknown` TS's type corresponds to top type (in type theory)
- any other type is assignable to the `unknown` type in TS

- `unknown` is the superset of every type (in TS)
- `unknown` corresponds to the universal set (in set theory) ?
- `unknown` corresponds to the unit set (1) (in set theory)  ?

- `unknown` corresponds to 'true', 1, 'truth', `⊤` in logic
- `unknown` corresponds to the terminal object in a category

- `never` corresponds to the initial object in a category
- `never` corresponds to 'false', 0 or 'truth' (or verum, 1, `⊤`)

In TS, the *bottom type* is the `never` type

corresponds to the empty set. `never` is a subset of every type.

The `never` type corresponds to the empty set from set theory.

  A | unknown = unknown
  A & unknown = A
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


In summary
👉 The datatype-level program transform are types
👉 Types can be primitive, literals, or data structures
👉 In TypeScript, all types are sets
👉 Union types are data structures joining several sets together
👉 unknown is the top type (superset of every type)
👉 never is the bottom type (the empty set, subset of every type)
👉 any is weird (both super/subset of every type)

## Type functions

A type function is a function defined at the type level using `type` (or `interface`):

```ts
//    fn-head    fn-body
//   ↓↓↓↓↓↓↓↓↓↓   ↓↓↓↓↓
type TyFn<A, B> = A | B
//        ↑  ↑    ↑↑↑↑↑
// type-params    return type
```

* Declaring an unconstrained type param (on the left hand side), like `A` or `B` above, means any type can be passed in as a type argument.
* A type parameter can be constrained using the `extends` keyword (on the left hand side).
* Declaring a constrained type param is achieved using the `extends` keyword (on the left hand side)

```ts
type FnTy<A, B extends any[]> = [A, ...B]
```

* The assignability of the function output behaves just like a regular type.
* The assignability of function arguments is reversed (contravariant).



## Subtyping

If `S` is a subtype of `T`: 
the *subtyping relation*, 
written as `S <: T` (or `S ⊑ T`), 
means that any term of type S 
can safely be used in any context 
where a term of type T is expected;
the *supertyping relation*, 
denoted `S :> T`,
means that any term of type T 
can safely be used in any context 
where a term of type S is expected.


The fact that `any` is both a superset and a subset of every type makes the typing relation *circular* and the type system thus unsound. In this circular typing relation all type-roles - i.e. bottom type as `never`, any type as `T`, and to ptype as `unknown` - are circular; e.g. any type `T` is both a subtype and a supertype of itself... hmm, that is actually fine, `T ⊆ T`. No, the worse thing is that the bottom is a supertype (and a subtype) of top, and vice versa. 
>How about concrete examples to showcase the consequence of unsoundness?

*Subtyping* is based on the fact that TS types are sets and on the fact that types can contain other types. In type system design, *subtyping* is known as being very complicated to implement, expecially if parametric polymorphism is also present. User-wise, subtyping can be counter-intuitive since variance must be taken into account.

## Assignability

```ts
/* conditional type */
type T1<A extends boolean, B, C> = A extends true ? B : C
```

### Assignability of object types

* 'Smaller' object types are supersets of 'bigger' object types.
* 'Bigger' object types are subsets of 'smaller' object types.

```ts
type O1 = {a: string, b:number} extends {a: string} ? true : false // true
type O2 = {a: string} extends {a: string, b:number} ? true : false // false
```

An object type with a single property may be extended by an object type that has that same property (since it is required) plus an arbitrary number of additional properties. In this situation, the former is a supertype of the latter, and the latter is a subtype of the former:

`{a: string, b:number} <: {a: string}`

### Assignability of function types

```ts

```

### Assignability of other types

```ts
type t1 = 1 extends number ? true : false           // true
type t2 = true extends true | false ? true : false  // true
type t3 = string extends 'abc' ? true : false       // false
```
