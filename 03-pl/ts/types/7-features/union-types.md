# TS :: Ref :: Types :: Union types

- union types, union of types
- union member types
- distributivity (property of union types)


## Union types

`A | B`

A union type is a type formed from two or more other types, representing values that may be *any one of those types*. We refer to each of these types as the **union member types**.

NOTE: Union types are not tagged (discriminated) unions, like Haskell's. However, you can often discriminate types in a union using TS features.

? Unlike intersection types, union types are not recursive in case of conflicts.

TypeScript will only allow an operation if it is valid for every member of the union. For example, if you have the union type `string | number`, you can't use methods that are only available on `string`. The solution is to **narrow down the type**, the same as you would in JS without type annotations. *Narrowing* occurs when TS can deduce a more specific type for a value based on the code. Since we don't have pattern-matching in JS/TS, we narrow a type in a pedestrian way - by using 'typeof', 'if…then', other conditionals and similar constructs (i.e. in a poor man's, 'miserably failing and still learning nothing', 'kill me now', degenerating degeneric denegrating way).

```ts
function printId(id: number | string) {
  if (typeof id === "string") {
    // In this branch, id has type 'string'
    console.log(id.toUpperCase())
  } else {
    // In this branch, id has type 'number'
    console.log(id)
  }
}
```




Below, the type of the arg is a union of several types related to string:
- `string`         A plain string primitive value
- `String`         A wrapper object for the primitive string
- `string[]`       An array of plain string primitive values
- `(() => string)` A constant function returning a primitive string
- `{ s: string }`  An object literal type with a prop of string type


```ts
const stringies2string = (
  arg: string | String | string[] | (() => string) | { s: string }
): string =>
  typeof arg === "string"
    ? arg
    : typeof arg === "function"
      ? arg()
      : typeof arg === "object" && 's' in arg
        ? arg.s
        : typeof arg === "object"
          ? arg.toString()
          : Array.isArray(arg as Array<string>)
            ? arg.join(",")
            : arg
```


## Removing a union member

```ts
type Union = 'a' | 'b' | 'c'
type Remove<T> = T extends 'a' ? never : T
type WithoutA = Remove<Union>
//   WithoutA = "b" | "c"
```

This amounts to TS automatically mapping over the union member types. It seems the type param `T` plays the role of an iterating param, since it takes on each type from the union member types. We get something along these lines:

```ts
type Union = 'a' | 'b' | 'c'                // (1)
type Remove<T> = T extends 'a' ? never : T  // (2)
type WithoutA = Remove<Union>               // (3)

// union type is repr as `Union` but it also needs
type Union = 'a' | 'b' | 'c'
// to be repr as a single type param, T, in (2), so
// T <- 'a' | 'b' | 'c'
// T type param serves as an iterator through union members

// So this query
type Remove<T> = T extends 'a' ? never : T
// when called as
type WithoutA = Remove<Union>
// becomes
type Remove<'a'> = 'a' extends 'a' ? never : 'a'
// which is true, so we get `never` back
// then,
type Remove<'b'> = 'b' extends 'a' ? never : 'b'
// which is false, so we get `b` back
// then,
type Remove<'c'> = 'c' extends 'a' ? never : 'c'
// which is false, so we get `c` back

// So we end up with
type WithoutA = never | 'b' | 'c'
// but `never` (i.e. 'a' type) is automatically excluded from the union (why?)
// and we finally get
type WithoutA = Remove<Union>
// i.e.
type WithoutA = 'b' | 'c'
```

### Returning a different literal type

If we swap the `'d'` literal type for `never`, it is returned when the condition is true (instead of `never` like before), but unlike `never`, `'d'` becomes (remains) a new union member.

```ts
type Union = 'a' | 'b' | 'c'
type Remove<T> = T extends 'a' ? 'd' : T
type WithoutA = Remove<Union>
//   WithoutA = "b" | "c" | "d"
```

### Creating a utility type

We can make a general type utility by parameterizing `Remove` with another type parameter, `R`, that represents the type to remove; the first type param, `T`, still represents the union type.

```ts
type Remove<T, R> = T extends R ? never : T

/// We can now call `Remove` by passing it the union type
/// as well as the type to remove from the union
type WithoutC = Remove<Union, 'c'>
//   WithoutC = 'a' | 'b'

/// If we pass a type that is not a union member, nothing happens
type ABC = Remove<Union, 'g'>
// ABC = 'a' | 'b' | 'c'
```


### Breaking the utility type

However, passing `string` as `R` into `Remove`, produces the `never` type! 
Guess this means that in the following conditional type,    
  `T extends string ? never : T`   
it is true that    
  `T extends string`   
so we get the 'then' type, i.e. `never`.


```ts
/// However, passing string as R into Remove
type Newer = Remove<Union, string>
//   Newer = never


/// Calling Remove like this, produces string (?)
type Str = Remove<string, Union>
//   Str = string
```

### Breaking it some more

However, if the union type also includes `string` type as a member

```ts
/// However if Union is
type Union = 'a' | 'b' | 'c' | string
/// and Remove remains as is
type Remove<T, R> = T extends R ? never : T
/// then
type NoC   = Remove<Union, 'c'>       // string
type ABC   = Remove<Union, 'g'>       // string
type Newer = Remove<Union, string>    // never
type Str   = Remove<string, Union>    // never
```

## Preventing union from collapsing its members

Imagine we have a union type that lists allowed icon sizes.

```ts
type Icon = 'xs' | 'sm'
```

Consider we'd like to relax this requirement: we want to keep these two values ('xs' and 'sm' and their literal types `'xs'` and `'sm'`), but also we want to be able to pass in any arbitrary value for icon size as well. Basically, any string is allowed except we offer these two predefined values as hints.

The obvious thing would be to just add `string` as a union member

```ts
type Icon = 'xs' | 'sm' | string
```

but this doesn't work out quite nicely because we loose intellisense autocompletion capability in the IDE (vscode).

More seriously, this happens because TS likes to think, and to collapse union types. Here, since the union has `string`, and since `xs` and `sm` are strings, TS collapses all member into just `string`, and hence we loose autocompletion (is that the only consequence?).

To prevent this, we need to insist on preserving those literal types, which we can do with the `Omit` utility type,

```ts
// we replace
type Icon = 'xs' | 'sm' | string
// with
type Icon = 'xs' | 'sm' | Omit<string, 'xs' | 'sm' >
```

thereby saving the allmightly autocompletion.

### Making a utility

We can turn this into a utility type `KeepAutoCompletion`

```ts
type KeepAutoCompletion<T extends string> = T | Omit<string, T>

// we can use it like this
type Icon = KeepAutoCompletion<'xs' | 'sm'>

let smallIcon: 'sm' = blah
```
