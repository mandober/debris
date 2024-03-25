# TS :: Types :: Type-level keywords :: satisfies

https://www.totaltypescript.com/clarifying-the-satisfies-operator
https://www.totaltypescript.com/how-to-use-satisfies-operator

- `satisfies` type-level keyword

When you use a colon to annotate the type, *the type trumps the value*. In other words, if you declare a wider type than you want, *you're stuck with the wider type*.

```ts
const routes: Record<string, {}> = {
  "/": {},
  "/users": {},
  "/admin/users": {},
}

routes.awdkjanwdkjn // No error!
```


When you use `satisfies`, *the value trumps the type*. In other words, TS infers *the narrowest possible type*, not the wider type you specify.

```ts
const routes = {
  "/": {},
  "/users": {},
  "/admin/users": {},
} satisfies Record<string, {}>

routes.awdkjanwdkjn // Error!
// Property 'awdkjanwdkjn' does not exist on type
// '{ "/": {}; "/users": {}; "/admin/users": {}; }'
```



Another way you can assign types to variables is with the `as` type operator. Unlike `satisfies` and colon type annotations, using `as` lets you lie to TS. In this example, you wouldn't see an error in your IDE but it will break at RT.

```ts
type User = {
  id: string
  name: {
    first: string
    last: string
  }
}
const user = {} as User
user.name.first // No error! But breaks at runtime
```

There are some limits to the lies - you can add properties to objects, but you can't convert between basic types; e.g. you can't trick TS into converting a string to a number; unless you use the double `as` idiom, `as…as`, usually realized as `as unknown as T`.

```ts
const str = "figaro" as number
// Conversion of type 'string' to type 'number' may be a mistake because neither type sufficiently overlaps with the other. If this was intentional, convert the expression to 'unknown' first.

const str = "figaro" as unknown as number
```

A legit use of `as` is when we need to assure TS that an object which hasn't yet been constructed is of the certain type.

```ts
type User = {
  id: string
  name: string
}

// The user hasn't been constructed yet, so we need to use 'as' here
const userToBeBuilt = {} as User
(["name", "id"] as const).forEach((key) => {
  // Assigning to a dynamic key!
  userToBeBuilt[key] = "default"
})
```
