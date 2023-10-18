# TS :: Types :: Conditional types

https://www.typescriptlang.org/docs/handbook/2/conditional-types.html

## TOC
- conditional types
- deferred conditional types
- conditional type constraints
- inferring within conditional types
- distributive conditional types

## Conditional types

- general form: `T extends U ? A : B`

A conditional type selects one of two possible types based on a condition. 
The type syntax uses the ternary conditional operator.

A *conditional type* may be used when the type (represented by a type param `T`) is not known at the time of the type declaration.

## About Conditional Types

```ts
type Num = string
type Cond = Num extends string ? number : null
```

In the example above, the type of `Cond` will *eventually* be either `number` or `null`, depending on whether the `Num` type extends `string`; here, it does, as evident in the first line, so `Cond` has the type `number`.

  BTW, which types extend `string` beside the `string` type itself? Bad question form! The `extends` keyword here doesn't mean "includes" but "equals", or "structurally conforms by shape" (like in pattern matching).

Since `string` is assignable to `string`, TS has decided that the type of `Cond` is `string`. If we change the type of `Num`, like below, TS will decide that `Num` is `null` type.

  Q: Since when is `mull` a type? A: Since always, as is `undefined`. This is on by default as controlled by the flag `strictNullChecks` in `tsconfig.json`.


```ts
type Num = number
type Cond = Num extends string ? string : null
```

In this, more complex example, `Cond: number`

```ts
type List<T> = T[]
type ListNum = List<number>
type Cond = ListNum extends List<number> ? number : null
```


In this, more complex example, `Omni` is eventually a `number`

```ts
type List<T> = T[]
type Cond<T> = ListNum extends List<T> ? number : null
// type of Cond<T> is the entire rhs: TS cannot yet decide its type
type Omni<T> = Cond<number>
// type of Omni<T> is number
```


Examples:

```ts
type IsStringOrNumber = T extends number | string ? T : never

// results of these expressions:
IsStringOrNumber<string>    // string
IsStringOrNumber<number>    // number
IsStringOrNumber<boolean>   // never
```


## Intro

At the heart of most useful programs, we have to make decisions based on input. JS programs are no different, but given the fact that values can be easily introspected, those decisions are also based on the types of the inputs. Conditional types help describe the relation between the types of inputs and outputs.

Conditional types take a form that looks like a conditional expression:

`SomeType extends OtherType ? ThenType : ElseType`

When the type on the left of the `extends` *is assignable to* the one on the right, then we get the `ThenType` type, otherwise `ElseType`.

The power of conditional types comes from using them with generics.

## Straigntforward use

```ts
interface IdLabel {
  id: number
}
interface NameLabel {
  name: string
}

function createLabel(id: number): IdLabel
function createLabel(name: string): NameLabel
function createLabel(nameOrId: string | number): IdLabel | NameLabel
function createLabel(nameOrId: string | number): IdLabel | NameLabel {
  throw "unimplemented"
}
```

These overloads for `createLabel` describe a single function that *makes a choice based on the types of its inputs*. Note a few things:
- If a library has to make the same sort of choice over and over throughout its API, this becomes cumbersome.
- We have to create 3 overloads: one for each case when we're sure of the type (one for `string` and one for `number`), and one for the most general case (taking a `string | number`). For every new type `createLabel` can handle, the number of overloads grows exponentially.

Instead, we can encode this logic in a conditional type. We can then use that conditional type to simplify the overloads down to a single function with no overloads.

```ts
// conditional type
type NameOrId<T extends number | string> = T extends number
  ? IdLabel
  : NameLabel

// returns a conditional type
function createLabel<T extends number | string>(idOrName: T): NameOrId<T> {
  throw "unimplemented"
}

// for strings
let a = createLabel("typescript")
//  a: NameLabel

// for numbers
let b = createLabel(2.8)
//  b: IdLabel

// for string | number
let c = createLabel(Math.random() > 0.5 ? "hello" : 42)
//  c: NameLabel | IdLabel
```

## Conditional type constraints

Often, the check in a conditional type will provide new information. Just like narrowing with type guards gives a more specific type, the 'true' (aka 'then') branch of a conditional type will further constrain generics by the type we check against.

For example, this won't work coz the type `"message"` cannot be used to index type `T`.

```ts
type MessageOf<T> = T["message"]
// ERROR: Type 'message' cannot be used to index type T
```

TS errors because the type `T` is not known to have a property `'message'`. A type that can be index by a property `'message'` is an object type like this `MsgObj`:

```ts
type MsgObj = { message: unknown }
```

To make the error go away, we need to check whether the type param `T` (the one on the rhs) matches the `MsgObj` object type.

When we constrain `T`, TS no longer complains:

```ts
type MsgObj = { message: unknown }
type MessageOf<T extends MsgObj> = T["message"]

// or just
type MessageOf<T extends { message: unknown }> = T["message"]  // (A)

type Email = { message: string }

type EMC = MessageOf<Email>
//:  EMC = string
```

Since the `Email` type is compatible with `MsgObj` type, i.e. `Email` indeed has the `message` property, `MessageOf<Email>` becomes the type on the rhs of the type equation (A), i.e. it becomes the `string` type.

```ts
type EMC = MessageOf<Email>                                         // (1)
//  replace Email by { message: string }
type EMC = MessageOf<{ message: string }>                           // (2)
// def of MessageOf type function
type MessageOf<T extends { message: unknown }> = T["message"]       // (3)
//  bind type param T to the arg `{ message: string }` in
type MessageOf<{ message: string } extends { message: unknown }> =  // (4)
     { message: string }["message"]
// on the left hand side we have a match:
//             { message: string } extends { message: unknown }
// so the right hand side of MessageOf is returned and bound to EMC
type EMC = { message: string }["message"]                           // (5)
// indexing { message: string } with ["message"]
type EMC = string                                                   // (6)
```

(1) First, we evaluate the rhs of `type EMC = MessageOf<Email>`: the type function `MessageOf` is called with the type arg `Email`. Since `Email` type was actually defined as `type Email = { message: string }`, this means (2) the type function `MessageOf` is actually called with the type arg `{ message: string }`. Recall, `MessageOf<T extends { message: unknown }> = T["message"]` was the definition of `MessageOf` type function. We are calling it with the type argument `{ message: string }`. We bind the type param `T` to the argument `{ message: string }`, replacing all occurences of `T` with it; we get `MessageOf<{ message: string } extends { message: unknown }> = { message: string }["message"]`. Since, on the lhs, we have a match, `{ message: string }` does extend `{ message: unknown }`, we evaluate the rhs which says `{ message: string }["message"]`. Indexing the type `{ message: string }` by the type `["message"]` we get `string`. So EMC is `string`.


```ts
// type function
type MessageOf<T extends {message: unknown}> = T["message"]
// is called as
type EMC = MessageOf<Email>
// which is actually
type EMC = MessageOf<{message: string}>

// So we bind type param `T` to type arg `{message: unknown}`
type MessageOf<T extends {message: unknown}> = T["message"]
// replacing `T` by `{message: string}` everywhere
type MessageOf<{message: string} extends {message: unknown}> = 
    {message: string}["message"]
// on the left side, we have a match:
//             {message: string} extends {message: unknown}
// so the right hand side is returned and bound to EMC
type EMC = {message: string}["message"]
// the left hand side indexing evaluates successfully to
type EMC = string
```

However, what if we wanted `MessageOf` to take any type, and default to `never` if `message` property is not available? We can do this by moving the constraint out (from the left-hand side angle braces) and introducing a conditional type (on the right-hand side):

```ts
// before
type MessageOf<T extends {message: unknown}> = T["message"]
// now
type MessageOf<T> = T extends { message: unknown }
    ? T["message"]
    : never

type Email = {message: string}
type Dog   = {bark(): void}

type EMC = MessageOf<Email>
//   EMC = string

type DMC = MessageOf<Dog>
//   DMC = never
```

Within the true branch, TS knows that `T` will have the `message` property.

## Flatten

As another example, we could also write a type called `Flatten` that flattens array types to their element types, but leaves them alone otherwise.

So, given an array type, we want to extract the type of its elements; e.g. given `T[]`, we want to get `T`. Also, if the type is not an array type, leave it alone.

```ts
type Flatten<T> = T extends any[] ? T[number] : T

// Extract the element type:
type Str = Flatten<string[]>
//   Str = string

// Not an array so leave it alone:
type Num = Flatten<number>
//   Num = number
```

When `Flatten` is given an array of strings, it uses an **indexed access with the type `number`** to get the element's type, i.e. `string`.

>Arrays can only be indexed by the `number` type, so here we use `number` in a specific construct, `T[number]`, to get the array's element type, `T`.

We could have inferred the element type in `Flatten` instead of fetching it "manually" with an **indexed access type**:

```ts
type Flatten<Type> = Type extends Array<infer Item> ? Item : Type
```

## Inferring within conditional types

Conditional types provide us with a way to infer from types we compare against in the true branch using the `infer` keyword.

For example, we could have inferred the element type in `Flatten` instead of fetching it "manually" with an **indexed access type**:

```ts
type Flatten<T> = T extends Array<infer Item> ? Item : T
type Elem<T>    = T extends (infer Item)[]    ? Item : never
```

Here, we used the `infer` keyword *to declaratively introduce a new generic type param*, `Item`, instead of specifying how to retrieve the element type of `T` within the true branch. This frees us from having to think how to decompose the structure in order to reach the inner types.

We can write some useful utility types with the `infer` keyword, like extracting the input and output types from function types.

```ts
type GetReturnType<Type> = Type extends (...args: never[]) => infer Return
  ? Return
  : never

type Num = GetReturnType<() => number>
//   Num = number

type Str = GetReturnType<(x: string) => string>
//   Str = string

type Bools = GetReturnType<(a: boolean, b: boolean) => boolean[]>
//   Bools = boolean[]
```
