# Structural type system

Type systems can be divided into structural and nominal.

In a **nominal type system**, two values have the same type only if they were constructed using the same exact type ctor, regardless of their shape.

In a **structural type system**, two values have the same type if they have the same shape; even if they were constructed using distinct type ctors, they still have the same *structural type*. TypeScript has the structural type system. For example:

```ts
type Foo = {
  name: string
}

type Bar = {
  name: string
}
```

If we construct two values, one of the `Foo` type and the other of `Bar` type, they will have *the same structural type*, namely `{ name: string }`. These two values would be completely interchangible type-wise, meaning we would be able to assign the value of `Foo` type to a variable of `Bar` type, and vice versa.

However, two types need not be exactly the same to be compatible. **Structural types are compatible** if one type has the shape that is a *subset* of the shape of the other type. For example,

```ts
type Foo = {
  name: string,
  age: number
}

type Bar = {
  name: string
}
```

Now, even though `Foo` and `Bar` have different structural types, `Foo` is still compatible with `Bar` because `Foo` has the shape that `Bar` type requires (plus some additional fields but they are not a dealbreaker). Therefore, we can still assign a value of `Foo` type to a variable typed as `Bar`.

```ts
// value of `Foo` type
let foo: Foo = {
  name: "Jack",
  age: 42,
}

// Foo type-value assign to a variable of `Bar` type
let bar: Bar = foo // !
```

However, now we cannot do it the other way around: `Foo` is structuraly compatible with `Bar` (since extra fields are immaterial), but `Bar` is not structuraly compatible with `Foo` (since it misses the field `age`).

The structural type `Foo` is a more specialized version of the structural type `Bar`, so `Foo` is a subtype of `Bar`; we can pass a value of `Foo` type wherever a value of `Bar` type is needed (the extra bits will be discarded).

>Thus, a type `T` is **compatible** with a type `U` if `T` has all the fields that the type `U` has, regardless of class hierarchies and inheritance. In other words, type `T` is compatible with type `U` if `T` is a subtype of `U`.
