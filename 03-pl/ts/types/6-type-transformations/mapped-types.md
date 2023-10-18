# TS :: Ref :: Types :: Mapped types

https://www.typescriptlang.org/docs/handbook/2/mapped-types.html

>Sometimes we need a type based on another type.

*Mapped types* build on the syntax for *index signatures*, which are used to declare the *types of properties* which have are unknown at that time.

```ts
type OnlyBoolsAndHorses = {
  /// prop names can only be strings
  /// (numbers are coerced to strings)
  /// basicially, no symbols allowed
  ///     ↓
  [key: string]: boolean | Horse
}

const conforms: OnlyBoolsAndHorses = {
  del: true,
  rodney: false,
}
```


A *mapped type* is a *generic type* which uses a **union of `PropertyKeys`** (created with `keyof`) to iterate through keys to create a new type:

```ts
type OptionsFlags<T> = {
  [Property in keyof T]: boolean
}
```

In the example above, `OptionsFlags` will walk through the properties from the type `T`, changing their type (of their values) to `boolean`.

[P in keyof T]: boolean
- this is similar to `for (item in items) {…}`
- `P` is a type var (similar to `i` in loops) that binds each prop type
- `in` is a keyword that marks the type-level for-loop
- `keyof` returns the types of keys in the type `T`
- `: boolean` is like the for-loop's body that reassigns all types to boolean


The `keyof` type-level operator takes an *object type* and 
produces a string (or numeric) literal union of its keys.



```ts
type Features = {
  darkMode: () => void
  newUserProfile: () => void
}

type FeatureOptions = OptionsFlags<Features>
// type FeatureOptions = {
//   darkMode: boolean
//   newUserProfile: boolean
// }
```


## Mapping Modifiers

Two modifiers can be applied during mapping
- `readonly` to affect mutability
- `?`        to affect optionality

You can remove or add these modifiers by prefixing with `-` or `+` (default).


## Key Remapping via `as`

From TypeScript 4.1, you can remap keys in mapped types with an `as` clause in a mapped type.

```ts
type MappedType<T> = {
  [P in keyof T as K]: T[P]
}
```

You can leverage features like Template Literal Types to *create new property names* from prior ones. In the example below, we want to use the existing type `Film` to derive a similar type that will have each data property ('name', 'rate') wrapped in a thunk (`name: string` ⟼ `getName: () => string`).

So, for each property name (key) we need to:
- uppercase the first letter of the key
- prefix the key with 'get'
- concatenate the two, e.g. `name` ⟼ `Name` ⟼ `getName`
- actually remap the key type to be the old type wrapped in a thunk

TS has an intrinsic utility that manipulates LST's case, so we use `Capitalize<T>` to uppercase the first letter og the current key, 
e.g. `name` ⟼ `Name`. However this is only done if the key (property name) is a string (and not a symbol). To make sure of it, we use the intersection type `string & P`. So, if the current key, `P`, is indeed the `string` type, TS will interpret that property name as a string literal type. 

we get `string & string` which is just `P`





e.g. `string` ⟼ `() => string`, which is done by the `() => T[P]` part


we capture the properties, which have the shape `get propName() {…}`

```ts
type Getters<T> = {
  [P in keyof T as `get${Capitalize<string & P>}`]: () => T[P]
}

// given this type:
interface Film {
  name: string,
  rate: number,
}

// to derive this type:
type LazyFilm = Getters<Film>
/*
type LazyFilm = {
  getName: () => string,
  getRate: () => number,
}
*/
```







## Refs

https://www.youtube.com/watch?v=0-BsmzlMMIw&list=PLNqp92_EXZBJ4CBroxVBJEpAXoz1g-naZ&index=32
