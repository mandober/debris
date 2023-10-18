# List ADT

## List in Haskell

List - a recursive, coproduct, algebraic data type modelled after the Haskell's list type:

```hs
-- List as ADT
data List a = Nil | Cons a (List a)

-- List as GADT more clearly shows the types of both data ctors
data List a where
  Nil  :: List a
  Cons :: a -> List a -> List a

-- redundant definition of nil
nil :: List a
nil = Nil

-- redundant definition of cons
cons :: a -> List a -> List a
conx x xs = Cons x xs

-- example of pattern matching on lists
drop :: Nat -> List a -> List a
drop 0 xs          = xs
drop _ Nil         = Nil  -- (redundant case)
drop n (Cons x xs) = drop (n - 1) xs
```

A List is the empty list, denoted by `Nil`, or it is an element `a`, as the head of the list, appended, or `Cons`ed, onto the rest of the list that is the list's tail (perhaps more clearly seen in the, redundant, definition of `cons`).

## List in TypeScript

To create a list data type, we need to cover both its value level and its type level parts and the components of each.

At the value level, we need to signify the empty list and a nonempty list.

*The empty list* is traditionaly denoted symbolically by `[]` (taken and syntactically invalid anyway), or alphabetically by `nil` (à la Lisp). So how do we represent the empty list, i.e. `nil`, as a value? We could go with equating Nil with `undefined` or `null`. Whatever we use to represent the empty list as a value, at the type level, it will have to have the type `List<A>`, i.e. the same type as non-empty lists.

*Nonempty list* may be described deconstructivelly as the head of the list (first element) cons'ed (appended) onto the tail (the rest) of the list.

>A list consists of a head (the first element of a list) cons'ed onto the tail (the rest) of the list.

In JS, this pattern occurs exactly when we deconstruct an array, e.g.

```js
const head = ([x, ...xs]) => x
const tail = ([x, ...xs]) => xs
const cons = x => ([...xs]) => [x, xs]
const nil = []
const drop = n => ([x, ...xs]) =>
  n < 1
    ? [x, ...xs]
    : typeof x === 'undefined'
      ? [x, ...xs]
      : drop(n - 1)(xs)
```


What we have so far (consulting the Haskell version for types):

```ts
// List a = Nil | Cons a (List a)
type List<A> = …
// Nil :: List a
Nil: List<A>
// Cons :: a -> List a -> List a
Cons: (x: A, xs: List<A>) => List<A>
```




- Type-wise, List is the List type ctor and two interfaces: `Cons` and `Nil`
- Value-wise, List consists of two constructors functions: `cons` and `nil`

The List data type is a union of the interfaces `Cons` and `Nil`:

```ts
type List<A> = Nil | Cons<A>
```

Both interfaces should describe the `List` object type.


that shares as much of its shape as possible between the `Nil` and `Cons`. If they should share no other property, they should at least share the property `_tag` which acts as a discriminator for a *discriminated union*.


```ts
type List<A> =
  | { _tag: 'Nil' }
  | { _tag: 'Cons', head: A, tail: List<A> }
```




```ts
interface Nil {
  _tag: 'Nil' // type literal! Nil is unit type with only 1 value, Nil
}

interface Cons<A> {
  _tag: 'Cons' // type literal! Cons is unit type with only 1 value, Cons
  head: A
  tail: List<A>
}
```


, but since `Nil` is a singleton type (and as such holds no value, only marks the absence of value, that is, the empty list) is lacks some fields.

The `Cons` interface has the required `tag` fields, plus `head` and `tail` fields since list is represented in decomposed state as the first element and the rest of list.

Warning: we have to jump through this hoops because TS has no support for coproduct types. Even if this all works as it should, it is nothing more but an exercise in futility.

Caveat: this List ADT is not a possibly infinite data structure; for that we'd have to wrap everything in thunks. For starters, nil and cons, instead of returning their values directly, should each wrap the object they return in a thunk; which then means adjusting their call sites, and so on. It is possible to squeeze a lazy list out of TS but uncomfortable.
