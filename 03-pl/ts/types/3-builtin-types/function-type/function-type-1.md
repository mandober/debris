# TS :: Ref :: Types :: Function type

## Contents

- function type
- parameter type annotation
- return type annotation
- anonymous function

Function Type Expressions
Call Signatures
Construct Signatures
Generic Functions
Inference
Constraints
  Working with Constrained Values
Specifying Type Arguments
Guidelines for Writing Good Generic Functions
Optional Parameters
  Optional Parameters in Callbacks
Function Overloads
  Overload Signatures and the Implementation Signature
  Writing Good Overloads
Declaring `this` in a Function
Other Types to Know About
  `void`
  `object`
  `unknown`
  `never`
  `Function`
Rest Parameters and Arguments
  Rest Parameters
  Rest Arguments
  Parameter Destructuring
Assignability of Functions
Return type void

## Function types

A *function type* describes a function, aka a function as a value, aka a value-level function, or, more precisely, a *function definition at the value-level*. There is an infinite number of function types just like there are functions.

The type of a function can be specified inline or as a standalone signature, however, we can only talk about the standalone signature as a type function, aka a type-level function; we cannot refer the inlined signature directly.

>The standalone type signature of a function (value) is a type function.



## Function types pattern

Consider the official utility `Parameters`, which obtains the parameters of a function as a tuple (of types):

```ts
type Parameters<T extends (...args: any) => any> =
                T extends (...args: infer P) => any ? P : never
```




`T extends (...args: any[]) => any` constrains the type param to match all function types, i.e. a type argument must be a function in order to match the pattern `(...args: any[]) => any`.

Since the concrete types do not matter, we can use `any` as the type of parameters and the return type. The rest operator is used in the constrain to make sure we catch all n-ary fucntions; without it, `(args: any[]) => any`, only unary functions would be match; moreover, only unary functions whose sole parameter is an array or a tuple.

(Perhaps the type of the parameter with the rest operator should be `any[]` rather than just `any`, since we get a tuple of params when we use the rest operator, not just a single param; seems it doesn't matter in this instance, after all, `any` covers all types including arrays).

>The most general pattern to catch all function types `(...args: any[]) => any`

## Parameter type annotation

When you declare a function, you must add type annotations after each parameters because TS's type system is too weak to conclude even the most elementary obvious things.

```ts
function greet(x) {
  return `Hello, ${x.toUpperCase()}!`
}
```

Everything sreems that `x` can only reasonably be a `string`, yet TS complains that "Parameter 'x' implicitly has an 'any' type", i.e. it doesn't try to infer what's obvious, and what is expected from a type system in this day and age, but lays back and proclaims that you better annotate that parameter or else; or else its type will default to `any`, meaning the parameter won't be typed as if the type checking was turned off (like it was ever on). Sure, TS was designed to be tolerant to JS shenanigans, but then what's the point of a type system that keeps enabling the sloppiness to continue? It should enforce sensible behaviour by default, and maybe allow infidels to opt out of reasonable bahaviour via some undocumented flag that doesn't really work.

Even if a call to 'greet' functio above uses a string, it won't push TS any closer to concluding that the param 'x' must be a string. Only manual type annotation will do (no wonder people complain about static typing).

When a parameter has a type annotation, arguments to that function will be checked. Even if the type annotation is lacking, TS will still check that the correct number of arguments is passed (well, fuck, what initiative).

On the other hand, TS seems capable to correctly infer the return type of a function (so why not do it also for inputs?!).

### Functions that return a promise

To annotate the return type of a function which returns a promise, use the `Promise` type:

```ts
async function getFavoriteNumber(): Promise<number> {
  return 26
}
```

## Anonymous functions

Anonymous functions are a little bit different from function declarations. When a function appears in a place where TypeScript can determine how it's going to be called, the parameters of that function are automatically given types.

*Contextual typing* (oh, so grandiose!) can infers parameters of anonymous functions, as well as parameter and return types of arrow functions. As the docs say, the process of how this happens is wrapped in mis4ery and any attempt at expaining it would cause lay people to relapse; "you don't need to explicitly learn how this happens" (ignorance is bliss and TS' type system is complicated as shit).


## Function Type Expressions

The simplest way to describe a function is with a *function type expression*. These types are syntactically similar to arrow functions:

```ts
function greeter(fn: (a: string) => void) { fn("Hello") }
```

Here, the functional `greeter` takes a function argument `fn` whose type is described by the syntax `(a: string) => void`.

Just like with function declarations, if a parameter type isn't specified, it's implicitly `any`.

When specifying function types formal parameters must have names (e.g. `fn` farg above and its param `a`), which are not important since they can be different in the actual function definition; yet, they are required, such is the syntax inherited from JS. The function type `(string) => void` means a function with a parameter named `string` implicitly typed as `any`.

We can also specify the function type separately using a type alias:

```ts
// standalone farg only
type FArg = (a: string) => void
function greeter(fn: FArg) {…}
const greeter = (fn: FArg) => {…}
```

### Typing function statements

Function statement cannot have a seperate signature as there is no syntax to attach a separately defined type signature to a function statement. Its return type can only be specified using an inline annotation.

>The return type of function statement can only be specified using inline type annotation. This means that function statement signatures are not reusable.


```ts
// Function statement with inline type annotations
function greeter(fn: (a: string) => void): void {
  fn("Hello")
}

// Function statement with inlined return type
// but separately defined param type
type FArg = (a: string) => void
function greeter(fn: FArg): void {
  fn("Hello")
}
```

The least painful way to attach an existing signature to a function statement is to convert it into a function expression, by assigning it to a variable, and then annotate the variable instead.

```ts
// Given this function statement
function greet(fn) { fn("Hello") }

// and given this signature (perfectly suitable for it)
type Greet = (fn: (a: string) => void) => void

// we have no syntactic way to attach the sig to the function!
// ...unless we convert it into a function expression and
// then attach the signature to its binding variable instead:
const greeter: Greet = function greeter(fn) {
  fn("Hello")
}
```

### Typing function expressions

Unlike function statements, function expression can be annotated any which way. This means that function expression signatures are reusable.

>Function expression can be annotated any which way which makes the standalone type signatures reusable.

```ts
// function expression with a separate signature
type Greet = (fn: (a: string) => void) => void
const greet: Greet = fn => fn("Hello")

// function expressions with inlined types:
//
const greet = (fn: (a: string) => void)): void => fn("Hello")
//                                       ↗
//           final return type goes here
//                                       ↘
const greet2 = (fn: (a: string) => string): string => fn("Hello")

const greet3 = (): string => "Hello"
//   return type ↗
```

















## Refs

* Everyday types
https://www.typescriptlang.org/docs/handbook/2/everyday-types.html
https://www.typescriptlang.org/docs/handbook/2/functions.html

* Functions
https://basarat.gitbook.io/typescript/type-system/functions
