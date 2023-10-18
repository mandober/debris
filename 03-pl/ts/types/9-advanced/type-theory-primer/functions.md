# Functions

Functions. Yes, functions. Again. What is more to say about functions...

If we consider functions in terms of the arguments they take, in the sense whether it is a value or a type, then we have 4 categories of functions:

Functions from _ to _
1. values to values
2. values to types
3. types to values
4. types to types

Most of the time, functions from values to values are just referred to as functions. The name value-level functions can also be used when they are juxtaposed next to type-level functions.

However, which of the 4 sorts of functions are value-level functions? And which are type-level functions?


## 1. Functions from values to values

The first category is the most common one across PLs. These are the plain old, regular functions that take values and return values. Among them are the *zero-order functions* which take non-function values (of the base types) and return base, non-function, values. The *higher-order functions* among them can additionally take functions as arguments, and they can also return functions. Technically, *first-order functions* are then functions which take or return zero-order functions. Second-order functions are functions which take or return first-order functions. And so on. With the exception of higher-order functions, these are rarely mentioned.


## 2. Functions from values to types

This category is easily distinguish as these functions are usually referred to as *dependent functions*. It can be said that a dependent function takes a value and returns a type, but they take types as well. There (most probably) isn't a function that takes just a value and returns a type; it may look so on the surface, but the type argument is implicit, being inferred from the value.

On the surface, it also looks like the TS has dependent types, but not really; naming function parameters is just a consequence of syntactical inheritence form JS that is (probably) required just to keep the parser uncomplicated.

```ts
// inlined type sig with function definition
const konst = <A, B>(a: A) => (b: B): B => b

// standalone type sig + function definition
type Konst = <A, B>(a: A) => (b: B) => B
const const: konst = a => b => b
```

In the standalone type signature, the param names `a` and `b` are superfluous, they serve no purpose. We may replace them with gibberish, like `_` but them we have to be careful not to give the same name to both, i.e. they cannot both be named `_`.

### Dependent types in Agda
Just for comparison, this is how dependent types look like in Agda. Note how the input type `A` has a named param, `x`; this value `x` is then used to parameterized the type `B`; `B` is not a plain old regular type, but a dependent type - it depends on the value `x` of type `A`, `x: A`, so it is denoted by `B x` (and not just `B`). Actually, the type tha we can speak of is `(x: A) -> B x`, aka a dependent product.

```agda hs
konst : (A: Set) -> (B: Set) -> (x: A) -> B x
```

## 3. Functions from types to values


## 4. Functions from types to types
