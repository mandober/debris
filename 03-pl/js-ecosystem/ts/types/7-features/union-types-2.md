# Union types

https://www.typescriptlang.org/docs/handbook/unions-and-intersections.html

A union type describes a value that can be one of several types. The vertical bar, `|`, separates each type. e.g. `number | string | symbol` is the union type that describes allowed types for property names (although `number` is among the allowed types it is actually coerced to `string`).

```ts
type PropNames = number | string | symbol
```

The member types of a union type are called *variants*. We can create more complicated types by using more complicated member types.

## Unions with common fields

If a value is a union type, we can only access members that are common to all variants.

```ts
interface Bird { fly(): void, layEggs(): void }
interface Fish { swim(): void,layEggs(): void }

declare function getSmallPet(): Fish | Bird

let pet = getSmallPet()
pet.layEggs() // OK
pet.swim()    // ERROR: Only available in one of the two possible types
```

If a value has the type `A | B`, we only know for certain that it has properties (fields and methods) that both `A` and `B` have.

In the example, `Bird` has the property `fly`, but we cannot know whether a variable typed as `Bird | Fish` has this property. If at runtime it turns out that the variable is really `Fish`, then calling `pet.fly()` will fail. But if we know that both `Bird` and `Fish` types have the property `layEggs`, then we can call this method off the variable of type `Bird | Fish`, being certain that it will not fail.

## Discriminating union

A common technique for working with unions is for all variants to have a single field in common - so a field with the same name across variants - that is typed with a different literal type in each variant. We can then narrow down the set of possible types by consulting that field.

Using this technique, we can creates analogous of ADTs.

```ts
// analogue of the Result (Either) sum type:
// * the first variant holds the error in case of failure
// * the first variant holds the data in case of success
type Result =
  | { type: "error", message: string }
  | { type: "success", value: number }

```

Note that the common fields have the same property name (i.e. `type`) but distinct property types. Moreover, string literals are used for types because each concrete string literal is a unit type, i.e. it contains a unique value; e.g. *string literal type* `"error"` only has one value, *literal string value* `"error"`.

```ts
// using "pattern matching" we can determine which case we have:
const match = (result: Result): string => {
  switch (result.type) {
    case "error"   : return result.message
    case "success" : return result.value.toString()
    default        : throw new Error "mismatch"
  }
}
```

Note that we should return the same type from "pattern matching", which is here chosen to be a `string`. That is why we have to call `toString` in the success case (error message is already a string).

If we are not ready to print the result of matching then we shouldn't force a value of type `Result` into some concrete type until such time. We can operate on a value of type `Result` by creating a set of functions that can, e.g. transform and manipulate a potential result while ignoring a potential error inside `Result` (as well as a set of functions that do the opposite).

But first, it would be better to create these ADTs more generically using type parameters instead of the concrete types like above.

```ts
type Result<E, A> =
  | { tag: "error", message: E }
  | { tag: "success", value: A }
```

See `ts-adt` library for advanced ADTs in TS: https://github.com/pfgray/ts-adt


## Union exhaustiveness checking

We can have compiler tell us when we don't cover all variants of the discriminated union in pattern matching.



There are two ways to do this.

The first is to turn on `strictNullChecks` and then to specify a return type.

```ts
function logger(s: NetworkState): string {
Function lacks ending return statement and return type does not include 'undefined'.
  switch (s.state) {
    case "loading":
      return "loading request";
    case "failed":
      return `failed with code ${s.code}`;
    case "success":
      return "got response";
  }
}
```

Because the switch is no longer exhaustive, TypeScript is aware that the function could sometimes return `undefined`. If you have an explicit return type `string`, then you will get an error that the return type is actually `string | undefined`. However, this method is quite subtle and, besides, the option `strictNullChecks` does not always work with old code.


The second method uses the `never` type that the compiler uses to check for exhaustiveness:

```ts
function assertNever(x: never): never {
  throw new Error("Unexpected object: " + x);
}
 
function logger(s: NetworkState): string {
  switch (s.state) {
    case "loading":
      return "loading request";
    case "failed":
      return `failed with code ${s.code}`;
    case "success":
      return "got response";
    default:
      return assertNever(s);
// Argument of type 'NetworkFromCachedState' is not assignable to parameter of type 'never'.
  }
}
```

Here, `assertNever` checks that `s` is of type `never` - the type that's left after all other cases have been removed. If you forget a case, then `s` will have a concrete type and you will get a type error. This method requires you to define an extra function, but it's much more obvious when you forget it because the error message includes the missing type name.




## Working with several acceptable types

Sometimes we need a function that can take an argument whose type is one of the several allowed types.

If we are controlling such function, we could follow the traditional OOP approach and abstract over the set of allowed types by creating a hierarchy of classes. That would be explicit but too much of an overkill. But if we don't controll the function, creating this class hierarchy would not even work as the function expected a primitive vaule.

Another approach is to use *constrained generics* to declare the type of the parameter in question so the arg is constrained to have one of the allowed types.

It would be the most convenient, however, if we could just extend the type of that parameter inline, skipping all the ceremoney. That is exactly what union types allow us to do. And we even retain the capability to work with primitive values directly.

For example, the function `padLeft` below takes a string arg, `value`, and another arg, `pad`, that can be either a number or a string. If `pad` is also a string, then it is appended to the `value`; but if `pad` is a number, then that many spaces are appended to the `value`.

```ts
// using `any` is always bad
function padLeft(value: string, pad: any) {…}
// using constrained generics
function padLeft<T extends string | number>(value: string, pad: T) {…}
// too right!
function padLeft(value: string, pad: string | number) {…}
```

Actually, in this example at least, using constrained generics amounts to the same as using the union type. In fact, not really! The approach using (constrained) generics assumes that all the allowed types share a set of common
behaviours, so we can just call those shared methods without first checking which type we are dealing with. This is contrasted with the union type approach in which we first need to check what type we have before we can invoke methods on it. These checks can also be performed when working with a generic (constrained) type but that goes against the whole point of parametricity. Even the TS manual suggests that we should use generic param only if it would appear more than once, i.e. so it would relate two pieces of data (e.g. inputs, or inputs to output); and in this example, the generic type would only be attached to a single function parameter.

Typing the second parameter with a *union type*, `string | number`, means we have to explicitly discriminate between these two possibilities in separate code branches.

```ts
const padLeft = (value: string, pad: string | number) =>
  typeof pad === "number"
    ? " ".repeat(pad) + value
    : typeof pad === "string"
      ? pad + value
      : new Error(`Expected string or number, got '${typeof pad}'.`)

// or sloppily
const padLeft = (s: string, p: string | number) => (" ".repeat(p) || p) + s

padLeft("end", "the ")     // "the end"
padLeft("indented", 4)     // "    indented"
padLeft("indented", true)  // ERROR: Expected string or number, got 'boolean'
```

Of course, the whole point of the type system is to prevent (or point out) the erraneous calls like the last one, so it doesn't occur at runtime. This means that the branch that throws should be impossible to reach (and thus removed).

Also, since we control the function, we should opt to split it into two separate functions and have each one deal with a particular case, e.g. `padLeftStr` and `padLeftNum`. It may be convenient to shove similar functionality under one function but usually it is less type safe.

```ts
const padLeftStr = (s: string, pad: string) => pad + s
const padLeftNum = (s: string, pad: number) => " ".repeat(pad) + s
```
