# Nominal typing

- primitive types are nominal: `string`, `number`, `boolean`, …
- `symbol` and `unique symbol` are nominal types

**Nominal values** are equal iff they were created using the same constructor.

**Structural values** are equal iff they have the same shape, regardless of the names of their types.

TS has structural type system but it is possible to get nominal typing using various tricks.


>In a *nominal type system* each type is unique and even if two types share the same shape (fields), they are not *mutually assignable*.


TypeScript's type system is structural, which means
if the type is shaped like a duck, it's a duck. If a
goose has all the same attributes as a duck, then it also
is a duck. You can learn more here: example:structural-typing

This can have drawbacks, for example there are cases
where a string or number can have special context and you
don't want to ever make the values transferrable. For
example:
-  User Input Strings (unsafe)
-  Translation Strings
-  User Identification Numbers
-  Access Tokens

We can get most of the value from a nominal type
system with a little bit of extra code.

We're going to use an intersectional type, with a unique
constraint in the form of a property called __brand (this
is convention) which makes it impossible to assign a
normal string to a ValidatedInputString.

type ValidatedInputString = string & { __brand: "User Input Post Validation" };

We will use a function to transform a string to
a ValidatedInputString - but the point worth noting
is that we're just _telling_ TypeScript that it's true.

```ts
const validateUserInput = (input: string) => {
  const simpleValidatedInput = input.replace(/\</g, "≤");
  return simpleValidatedInput as ValidatedInputString;
};
```

Now we can create functions which will only accept our new nominal type, and not the general string type.

```ts
const printName = (name: ValidatedInputString) => {
  console.log(name);
};
```

For example, here's some unsafe input from a user, going through the validator and then being allowed to be printed:

```
const input = "alert('bobby tables')";
const validatedInput = validateUserInput(input);
printName(validatedInput);
```

On the other hand, passing the un-validated string to printName will raise a compiler error:

```ts
printName(input);
```

You can read a comprehensive overview of the different ways to create nominal types, and their trade-offs in this 400 comment long GitHub issue:
https://github.com/Microsoft/TypeScript/issues/202

and this post is a great summary:
https://michalzalecki.com/nominal-typing-in-typescript/
