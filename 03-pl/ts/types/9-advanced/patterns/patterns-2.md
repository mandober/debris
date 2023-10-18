# Patterns

- Tuples type match against arrays
- `any[]`         matches any array and *any tuple*
- `Array<any>`    matches any array
- `[any]`         matches a 1-tuple
- `[any, any]`    matches a 2-tuple
- `[]`            matches both an empty array and a 0-tuple
- `([] | [any])`  matches an empty array or a 1-tuple



Are 'type positions' and 'type roles' then different at all?
- type position (param type, return type, first elem, rest of elems, …)
- type role (param type, return type, first elem, rest of elems, …)

* If a type is not intended for reuse, `any` can be used to match any type, rather then first declaring a new type param and then *using* it just to match a type (or rather a type position).

* To get a type that is a part of a larger structure, we can use the `infer` keyword. Using `infer T` immediately creates a fresh type param `T` and binds the type at a particular type position to it.




## Type recursion

```ts
type Last<T extends any[]> = {
  0: Last<Tail<T>>
  1: Head<T>
}[HasTail<T> extends true ? 0 : 1]
```

This demonstrates the pattern of using conditional types as an *indexed type's accessor*. An indexed type's accessor is a conditional type that gets a hold of an inner type that is a part of a larger type structure (usually an object type) by indexing into it, i.e. by accessing its property using the index property access form by passing in a prop's name.

The type function `Last` shows a way to arrange the types of interest as the values of indexed properties, i.e. props whose names are numbers; numbers are prop names are coerced to a string, but then so are the indices, i.e. indexing types, which here are literal number types, `0` and `1`. *Or maybe this coercion does not happen at the type level?* Anyway, the result is the same.
