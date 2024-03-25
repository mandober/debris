# Tuple type

## TL/DR
- there are tuple values and tuple types
- usually, tuple values have a tuple types
- both tuple values and tuple types are fixed collections
- a tuple type is a fixed collection of types, `[number, string, boolean`
- a tuple (as a value) is a fixed collection of potentially heterogeneous values, `(1, "ab", true)`
- tuples have a fixed size, 
- arrays (usually called vectors) are resizable
- tuple types are fixed
- a tuple value has a fixed number of elements
- a tuple type dependes on the type of each compoenent element
- there are many typle types 
- the "slots" (elements) of a tuple are are called components


## Introduction

Arrays are usually considered as fixed, homogeneous, compact, linear containers, i.e. they hold a sequence of elements of the same type. As long as this is true of an JS array, its internal representation will be as efficient as that of the arrays in C. However, as soon as an array's contents start corroding, e.g. if elements ceise to be of the same type (so the array becomes heterogenenous), or if holes appear (so the array is no longer compact but becomes sparse), its internal representation will also degrade to a less efficient data structure.

Vectors are homogeneous like arrays except they are resizable. Tuples are intended as heterogeneous colections, being fixed but allowing elements of diffeent types.

JS has no tuples, it only has JS arrays. But since JS arrays are extremely flexible, they are used instead of some more specialized data structure, in particular they are used as tuples.

TS adds the tuple type but only on the type-level - at the value level, arrays are used as tuples. TS just adds safety around this particualr use of arrays.

There is an *infinite number of tuple types* since the overall tuple type depends on the type of each component element.

A tuple type may be donoted as `[T, U, V, …]`, but this is a rought, imprecise denotation of its type. The problem with tuple types is that a tuple type is "two-dimensional": on the one hand, its type depends on the number of elements it holds, and on the other hand, its type also depends on the type of each element.

Languages with type system far advanced to TS's have problem typing tuples in general. For example, In Haskell, the type constructor of a 2-tuple is a single comma, denoted in parenthesis as `(,)`. Using a symbolic name for a type ctor allows using it as an infix, but these are equivalent:

```hs
-- (Haskell allows the same name for a type and data ctor, i.e. Pair)
data Pair a b = Pair a b                 -- Pair, equivalent to:
data (,) a b = (,) a b                   -- Pair
data (,,) a b c = (,,) a b c             -- Triple
data (,,,) a b c d = (,,,) a b c d       -- 4-tuple
data (,,,,) a b c d e = (,,,,) a b c d e -- 5-tuple
-- ad infinitum…
```

I think Haskell defines tuple types up to 32-tuple. I'm not sure to which number TS goes.

```ts
type Pair<A, B> = [A, B]
type Triple<A, B, C> = [A, B, C]
type Tuple4<A, B, C, D> = [A, B, C, D]
type Tuple5<A, B, C, D, E> = [A, B, C, D, E]
// ad infinitum…
```

This demonstrates the general problem with tuples that gets even worse when we neeed to define a function that works on tuple: we must define a bunch of similar functions that only differ in the tuple type - so we must stop at some point. Authors usually try to cover at least up to a 10-tuple, sometimes less, depending on the function. At least two of the most common tuple types, a pair and a triple, are always covered.

>The problem with typing the tuple types is due to them being determined by the number as well as by the type of each component.

Arrays are homogeneous, so no matter how many elements an array may have, we can just type it by `T[]`. In fact, true arrays have a fixed number of elements and vectors are their more flexible versions. For example, in Rust, we type an array by specifying both the type and the number of elements, something that would look like this in TS:

```ts
type Array<T, 5>
type Vec<T>
type List<T>
```

Array are homogeneous and fixed in the number of elements. Vectors are homogeneous but can be resized. List is also a linear collection that holds a sequence of elements but its implementation is usually quite different from an array, which can use stack as storage because it is fixed; vector, which cannot use stack because it is resizable but uses a contiguous heap memory; list also uses heap memory but in a discontiguous manner.

```hs agda
data Vector (A : Set) : Nat → Set where
  Nil : Vector A zero
  Cons : {n : Nat} → A → Vector A n → Vector A (suc n)
```

## Syntax for tuple types

To denote a tuple type, in general, we must unfortunatelly use ellipses:   
`[T, U, V, …]`, where `T, U, V, …` are some types.

An example of a concrete 3-tuple:

```ts
type Triple = [string, number, boolean]
const triple: Triple = ["a", 1, true]
```

The syntax for denoting both tuple and array types employs brackets:

```ts
type Array<A> = A[]
// vs
type Tuple2<A, B> = [A,B]
type Tuple3<A, B, C> = [A, B, C]
```

Interestingly TS allows for 1-tuples and even 0-tuples.

```ts
type Tuple0<A> = []
type Tuple1<A> = [A]
```

The empty tuple, as a value, is always inferred by TS as an empty array, never as a 0-tuple.

Tuple values are access the same way as arrays. 
Tuples can also be used with rest/spread parameters and destructuring:

```ts
type Foo = (tri: [string, number, boolean]) => boolean
const foo: Foo = tri => tri[2]
foo(["a", 1, true]) // true


type Triple<A, B, C> = [A, B, C]
type Bar = (tri: Triple<string, number, boolean>) => boolean
const bar: Bar = tri => tri[2]
bar(["a", 1, true]) // true
```







## More about tuple types

TS allows 1-tuples which are not usually found in many languages; a 1-tuple type feels the same as a singleton array.

At the value level, tuples are just plain ol' JS arrays, and they are accessed as arrays, can be indexed, etc.

```ts
// array of numbers
type Arr = number[]
type Arr = Array<number>
let arr2: Arr = [1,2]
let arr1: Arr = [1]
let arr0: Arr = []

// a triple (3-tuple) type of number, string, boolean
type Triple = [number, string, boolean]
const triple: Triple = [1, 'a', true]

// a pair (2-tuple) type of numbers
type Pair = [number, number]
const pair = [3, 4]
```

At a value level (just by examining the untyped value), a 1-tuple cannot be distiguished from a singleton array value - nor is there a particular need since tuples are compiled to arrays.

The type of an untyped singleton array literal, e.g. `[1]`, is inferred as an array (of numbers), never as tuple.

```ts
// a singleton array literal
let arr = [1]

// this type is always inferred as array, never as 1-tuple
let numarr: number[] = [1]
// but it can be explicitly annotated as 1-tuple
let numtup: [number] = [1]
```

At the type level, a 1-tuple can be differentiated from any array since tuple types specify their component types within the brackets, `[T]` vs `T[]`. The difference is clear for simpler types, but can get very complex and hard to discern, especially when generics are involved, e.g. when `T[K]` generically denotes a type `T` indexed by type `K`.

```ts
// a 0-tuple of boolean (!)
type Empt = []
const empt: Empt = []


// array types
type T1 = Array<string>
type T2 = number[]

// vs tuple type
type Tuple1 = [string, number]
```
