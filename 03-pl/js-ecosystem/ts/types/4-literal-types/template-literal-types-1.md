# TS :: Ref :: Types :: Template literal types

*Literal string types* are subtypes of the `string` type. Given any string, there is a literal string type that is that string and it is a subtype of `string`, `"abc" <: string`.

**Template Literal Types** (TLT) build on *String Literal Types* (SLT), and both are subtypes of the `string` type.

TLT has the ability to expand into many strings via *unions*.

TLT has the same syntax as Template Literal Strings in JS, except these are used in *type positions* and they produce new types.

Used with concrete literal types, a template literal produces a new SLT by concatenating the contents.

```ts
type str = "literal type"
type slt = `string ${str}`
//   slt = "string literal type"
```


When a *union* is used in the interpolated position, the type is the set of every possible string literal that could be represented by each union member:

```ts
type EmailLocaleIDs = "email" | "user"
type FooterLocaleIDs = "title" | "group"

type AllLocaleIDs = `${EmailLocaleIDs | FooterLocaleIDs}_id`
// AllLocaleIDs becomes:
type AllLocaleIDs = "email_id" | "user_id" | "title_id" | "group_id"
```


For each interpolated position in the template literal, the unions are cross multiplied - *Cartesian product*:

```ts
type AllLocaleIDs = `${EmailLocaleIDs | FooterLocaleIDs}_id`
type Lang = "en" | "fr" | "pt"

type LocaleMessageIDs = `${Lang}_${AllLocaleIDs}`
// LocaleMessageIDs is now:
type LocaleMessageIDs = "en_email_id" | "fr_email_id" | …
```

We generally recommend to use ahead-of-time generation for *large string unions*, but this is useful in smaller cases.


## String unions in types




## Refs

* Template literal types
https://www.typescriptlang.org/docs/handbook/2/template-literal-types.html

* Literal types
https://www.typescriptlang.org/docs/handbook/2/everyday-types.html#literal-types

* Improved Inference for infer Types in Template String Types
https://devblogs.microsoft.com/typescript/announcing-typescript-4-8-beta/#improved-inference-for-infer-types-in-template-string-types

* 2257 - MinusOne (Works up to 9007199254740991 using v4.8.0+) #13507
https://github.com/type-challenges/type-challenges/issues/13507

* JS Template literals
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Template_literals
