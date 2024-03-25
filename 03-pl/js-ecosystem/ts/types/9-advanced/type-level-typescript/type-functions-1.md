# Type functions

- type-level function, type function, function on types
- type constructor
- data (value) constructor

## Type functions

*Type functions*, or *type-level functions*, are functions that operate on types. Unlike the usual, term-level functions, that take values and return values, type-level functions take types and return types.

In TS, a *type declaration*, written using the `type` (or `interface`) keyword, is used to create a new *type function* that defines a new type. The two keywords work similary (although they have their differences), but the use of the `type` keyword is usually associated with creating a *type alias*. This is most evident when `type` is used to create simple type aliases.

```ts
type Bln = boolean
type Num = number
type Str = string
```

This is exactly how type aliases are created in Haskell. They served to wrap a, usually primitive type, and give it another name so as to distinguish it from the wrapped primitive. For example, kilometers are numbers (integers), but to distinguish them from integers in general, we can create a type alias for them.

```hs
type Km = Int
```

In OO programming this is similar to creating a wrapper class around a primitive type.

```ts
class Km {
  constructor (x: number) {
    this.value = x
  }
}
```

Then, we can instatiate the class to make a new value of the `Km` type.

```ts
const k1 = new Km(442)
```

The class definition serves to define a new type, here `Km`, that classifies values that we create using the class constructor function.

>Since a class constructs a new type, we can call it a **type constructor**. And the class constructor function, which we call to create new values (instances) of this type (class), can be thought of as a **data constructor**.

This is paralleled by a similar construction in Haskell.

```hs
-- define a new type
data Km = MakeKm Int

-- create a new value of the type
k1 = MakeKm 442
```

This time we get a proper new type, and not just a type alias like before. The new type is called `Km` and its type constructor is called `Km` as well. The `MakeKm` is the data constructor - it is like the class constructor function - both are used to create new values of this type. The value `MakeKm 442` wraps an integer, but is completely distinct from integers: we cannot directly compare them or confuse them from one another, the same way the number 442 and `new Km(442)` are not interchangible.
