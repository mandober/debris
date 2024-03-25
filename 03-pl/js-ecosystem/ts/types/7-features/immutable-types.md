# TS :: Ref :: Types :: Immutable types

## TS: `readonly` and `const`

In JS, mutability is the default, although ES6 added the `const` keyword (declaration modifier) for variable declarations it allows variable declarations to declare that the *reference is immutable*, but the *referent is still mutable*:

```ts
const as = [1, 2, 3]

// reference is immutable:
as = "bddd"     // ERROR: Cannot assign to 'as' because it is a constant
as = {}         // ERROR: 〃
as = [1, 2, 3]  // ERROR: 〃

// referent is not immutable:
as.push(102)    // in-place mutation: now `as` is [1, 2, 3, 102]
as[0] = 101     // in-place mutation: now `as` is [101, 2, 3, 102]
```

TS additionally has a `readonly` *modifier for properties*

```ts
interface Rx {
  readonly x: number
}

let rx: Rx = {
  x: 1
}

rx.x = 12 // error: prop `x` is immutable
```

## `Readonly<T>` mapped type

TS also has a *mapped type* `Readonly<T>` that can mark on-the-fly all properties of the wrapped type (type alias or interface) as being `readonly`:

```ts
interface X {
  x: number
}

let rx: Readonly<X> = {
  x: 1
}

rx.x = 12 // error: prop `x` is immutable
```

## `ReadonlyArray<T>` type

TS has a special `ReadonlyArray<T>` type that removes side-affecting methods and prevents writing to indices of the array. TS has a special syntax for this type.

```ts
let a: ReadonlyArray<number> = [1, 2, 3]
let b: readonly number[] = [1, 2, 3]
a.push(102) // error
b[0] = 101 // error
```

You can also use a **const assertion**, which operates *on arrays and object literals*:

```ts
let a = [1, 2, 3] as const
a.push(102) // error
a[0] = 101  // error
```

However, none of these options are the default, so they are not consistently used in TS code.
