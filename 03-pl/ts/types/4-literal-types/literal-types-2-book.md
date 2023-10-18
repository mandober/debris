# TS :: Types :: Literal types

https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types

## Literal types

In addition to the general types `string` and `number`, we can refer to *specific* strings and numbers in *type positions*.

One way to think about this is to consider how JavaScript comes with different ways to declare a variable. Both `var` and `let` allow for changing what is held inside the variable, and `const` does not. This is reflected in how TypeScript creates types for literals.

>`const` infers literal types; `let` and `var` infer 'whole' types.

```ts
let fay = 1       // fay: number
const fee = 1     // fee: 1

let zap = "abc"   // zap: string
const foo = "abc" // foo: "abc"

let glu = true    // glu: boolean
const blu = true  // blu: true
```


## Literal Inference

https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-inference

When you initialize a variable with an object, TypeScript assumes that the properties of that object might change values later. For example, if you wrote code like this:

```ts
const obj = { counter: 0 };
if (someCondition) {
  obj.counter = 1;
}
```

TypeScript doesn't assume the assignment of 1 to a field which previously had 0 is an error. Another way of saying this is that `obj.counter` must have the type `number`, not type `0`, because types are used to determine both reading and writing behavior.

The same applies to strings:

```ts
declare function handleRequest(url: string, method: "GET" | "POST"): void

const req = { url: "https://example.com", method: "GET" }
handleRequest(req.url, req.method)
// Arg of type 'string' is not assignable to param of type '"GET" | "POST"'
```

In the above example `req.method` is inferred to be string, not `"GET"`. Because code can be evaluated between the creation of `req` and the call of `handleRequest` which could assign a new string, like "GUESS" to req.method, TypeScript considers this code to have an error.

There are two ways to work around this.

1. You can change the inference by adding a type assertion in either location:

```ts
// Change 1:
const req = { url: "https://example.com", method: "GET" as "GET" }

// Change 2
handleRequest(req.url, req.method as "GET")
```

Change 1 means "I intend for req.method to always have the literal type "GET"", preventing the possible assignment of "GUESS" to that field after.

Change 2 means "I know for other reasons that req.method has the value "GET"".

2. You can use `as const` to convert the entire object to be type literals:

```ts
const req = { url: "https://example.com", method: "GET" } as const;
handleRequest(req.url, req.method);
```

The `as const` suffix acts like `const` but for the type system, ensuring that all properties are assigned the literal type instead of a more general version like string or number.
