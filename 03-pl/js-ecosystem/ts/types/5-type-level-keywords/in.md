# TS :: Types :: Type-level keywords :: in

1. Mapping string literal types
2. Marking covariant type param


## Mapping string literal types

We can use *string literal unions* to create more complex types using *type mapping*. Let's create a `DatabaseConfigs` type based on that `DatabaseName` string union.

```ts
type DatabaseName = "users" | "widgets"  | "events"

type DatabaseConfigs = {
  [key in DatabaseName]: {
    host: string,
    port: number,
    user: string,
    pass: string,
  }
}
```

The `key in T` syntax is the mapping. It means that an instance of `DatabaseConfigs` needs to have 3 properties matching strings in `DatabaseName`.

Mapped types do save you some keystrokes, but they also improve your development experience. Let's say we have our `DatabaseConfigs` instance:

```ts
const dbConfig: DatabaseConfigs = {
  users:   { ... },
  widgets: { ... },
  events:  { ... },
}
```

If we add a new database to our app (say, `orders`) and we add its name to the `DatabaseName` string union, it will automatically become part of the `DatabaseConfig` type. We'll immediately get an error at our `dbConfig` object, saying that it's missing the `orders` field, and reminding us to add the connection details.
