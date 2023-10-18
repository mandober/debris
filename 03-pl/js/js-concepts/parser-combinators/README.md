# Parser combinators

Based on "Higher-Order Functions for Parsing" by Graham Hutton.

## TL/DR

This is about translating the concept of combinator parsing from Haskell into JavaScript.

## Introduction

In general, a **parser** is a program that analyses text (usually a source code written in a computer language) in order to determine its logical structure and produce a more adequate presentation suitable for further processing as part of the compilation (or interpretation) phase.

A parser is a part of the parsing phase of the overall compiling phase. It takes a source text and aims to produce a data structure, usually an *abstract syntax tree* (AST), which exposes the structure of the program making it more suitable for further manipulation.

Parsers may be built by hand but are most often generated automatically using specialized tools. One particular method of building parsers manually is with the help of higher order functions, or *combinators*, that give it the name *combinator parsing*. In this method, parsers are modelled as functions, with larger parsers built by functional composition from the smaller ones.

## The type of a parser

JS is a dynamic language so we don't deal with the types directly, but TS introduces a type system that, although is not as advanced as Haskell's, it is sufficient to watch over us and stear us in the right direction. So the first thing we should do is come up with a definition for the type of parsers.

A parser is a function that takes some text as input and produces some kind of result as its output.


So the input type is going to be *string*; string is, anyway, the only textual type in JS; there is even no character type. The good thing though is that strings are itarable objects, which will make decomposing strings into characters easier.

```hs
parser :: String -> ?
```

The ouput type of a parser should be a compound type. Since we are trying to model combinator parsing as it is in Haskell, we won't use in-place mutation, e.g., to directly mutate the input string; instead, the outout will hold the result of the successfull parsing as well as the rest of the input string. And since we don't have a pair type in JS, we'll use an array. TS has a *tuple type* which is underneath just an array but with more safety guarantees.

```hs
parser :: String -> (String, String)
```

In the optimistic case, a *character parser* takes an input string, and after successfully parsing the first character, it returns that character and the rest of the input string:

```hs
parser :: String -> (Char, String)
parser (x : xs) = (x, xs)
```

A *string parser* is similar, only it return the parsed string instead of a single character.

We can always use a string to hold a single character, so these two cases can both be covered by a string parser.

```ts
// parser :: String -> (String, String)
type parser = (xs: string) => [string, string]
const parser: parser = ([x, ...xs]) => [x, ...xs]
```

This only defines the *abstract type of a parser*. Even though it has a definition, this function doesn't do anything per se, since it doesn't know how to produce the output given some input. A complete function will also take the actual input string and a parser function that tells it how to parse the input.

```hs
type Parser s a :: s -> (a, s)
-- here both the input type, `s`, and the parsed result, `a`, are of the same type, i.e. a = s = String
type StringParser :: String -> (String, String)

p1 :: Parser -> (String -> (String, String))
p1 :: Parser -> Parser
p1 :: (String -> (String, String)) -> (String -> (String, String))
p1 :: (String -> (String, String)) -> String -> (String, String)
--           parsering fn              input         output
p1 :: String -> (String -> (String, String)) -> (String, String)
--    input           parsering fn                   output

-- generically
type Parser s a :: s -> (a, s)
p1 :: (s -> (a, s)) -> s -> (a, s)
p1 :: s -> (s -> (a, s)) -> (a, s)
p1 :: s -> (s -> m a) -> m a -- m a = (a, s)
(>>=) :: a -> (a -> m b) -> m b
```







Since a parser may fail without consuming any input, 
a part of the result should be a suffix of the input string.

Sometimes a parser may not be able to produce a result at all. For example, it may be expecting a letter, but find a digit. Rather than defining a special type to signal success or failure of a parser, we stick to the simplest route and just use the empty list, `[]` to denote failure, while the success is indicated with a singleton list, [(v,xs)], where `v` is the value (successfully parsed part of the input) and the unconsumed input is `xs`.

## Generic types

The most flexible, or the most generic, parser type is:

```ts
// the most generic Parser type
type Parser<A, S> = (xs: S) => [A, S][]
```

The type `Parser<A, S>` is a parameterized type: it takes two type parameters.

The type parameter `A` represents the result type - the type that is the result of the successful parsing; it is only a part of the overall output type.

The type parameter `S` represents the input type and the same type is also returned as a part of the overall output type.

If we are exclusively dealing with strings, then both types `A` and `S` are strings: we take a string (i.e. `S` type) as input, and produce a pair of types `(A, S)` as output. In the output, `A` is the result of successful parse, and `S` is the rest of the input string.

The `A` part of the overall output type could as well be some kind of a tree (e.g. an AST), or some other type but string.

The `S` type in the overall output type must be the same `S` type of the input. The type `S` is usually a string, but there may be several types of strings. Sure, in JS, there's only the `string` type, but even in JS, by keeping this type generic (i.e. as type parameter `S`) we allow for the possibility that the input is some other string-like type. Perhaps, it is the regular JS `string` type but wrapped in an object. Of course, this input type `S` must be compatible with JS `string` type, meaning it must have the same operational interface (same API).

As the overall output is now, `[A, S][]`, is ugly, because we are wrapping `A` and `S` as a pair `[A, S]` in an array that is there only to signal failure and serves no other purpose. Plus the fact that tuples have the same syntax as arrays (both use brackets but in a different way) is not helpful for readability.

This type means that a parsing failure (e.g. because the input is empty) returns the empty array, `[]`. Otherwise, it returns a pair wrapped in an array. This means the array will always contain either exactly one element (success) or no elements (failure).

In case of successful parsing, the array will contain a single element - a result paired with the rest of the input string, `[A, S]`. Thus, the overall type is `[A, S][]`.

On the value level this will look like:
- on parser failure: `[]`
- on parser success: `[["b", "anana"]]`
- on parser success: `[["ba", "nana"]]`

Note that the success case will never be an array with more than 1 element: it will never be e.g. [["a", "nanas"], ["pe", "ach"]]. It is always a *singleton*.

Now, the question is why keep the types generic as opposed to fixing both `A` and `S` type parameters to string, since, presumably, we will only work with strings? In fact, we can indeed fix the input type `S` to string. Since we're only parsing text this will fix the input to `string` JS type. But we shouldn't fix the resulting type `A` because that will restrict the resulting type to `string` and we won't be able to express compund types based on `string`. For example, the *alternation parser combinator* takes two parsers `p` and `q`, and tries to parse the input with both, returning a *pair* of results! On the value level, this would look like this: `[[["ba", "sa"], "rn"]]`. The problem is that this type is not compatible with the type of parser whose both type parameters are fixed to `string`! The type of this compound result is a pair of strings, `[string, string]`, but our result type only accepts a `string`. Because of this (at least) we need to keep the result type flexible (i.e. generic) as `A`. We can, though, fix the input type `S` to `string`.

```ts
// generic form: s -> (a, s)
type Parser<S, A> = (inp: S) => [A, S][]
// fixing the input type S to string: string -> (a, string)
type StrParser<A> = (inp: string) => [A, string][]
// or, equivalently:
type StrParser<A> = Parser<string, A>
```

Most parsers will instantiate the type parameter `A` to `string`; had we done the same manually, the completely *saturated* parser type would look like this:

```ts
type StrStrParser = (inp: string) => [string, string][]
// or, equivalently, in terms of the generic Parser type
type StrStrParser = Parser<string, string>
```

## Partial application

The generic Parser type, `Parser<S, A> = (inp: S) => [A, S][]`, is called an *unsaturated type* because it has two type paramters. In other words, it requires to be supplied with two types in order to become a *flat type* (fully saturated type). However, on its way to a flat type, it can be given only a one type, i.e. it can be *partially applied*. The resulting type will still be an unsaturated type, which is just called a *partially applied type*. This is partial application of types *at the type level*, similar to how functions can be partially applied *at the value level*.

### Partial application at value level

However the two applications look different: to partially apply a function, we only need pass it some (but not all) arguments. Also the function itself needs to be defined in a way that supports partial application; otherwise, this upport can be "attached" to the function at any time by via *currying*. `curry` is then a HOF that "decorates" any function we pass it, endowing it with partial application capabilities.

```ts
// function defined to support partial application:
// just state each formal parameter individually
const add = x => y => x + y
// partially apply `add` to define the successor function
const succ = add(1)
// now `succ` acts as if it was defined as:
const succ = y => 1 + y
```

### Partial application at type level

On the type level, a generic type (type with type params) can also be partially applied to obtain differnt (but similar) types.

```ts
// A generic type with two type params
type Parser<S, A> = (inp: S) => [A, S][]

// Partially-applying the first type parameter to the `string` type
type StrParser<A> = Parser<string, A>

// The type is now the same as if it was defined as:
type StrParser<A> = (inp: string) => [A, string][]
```

The type parameter that is possible to instantiate with partial application depends on the order in which the type parameters were declared. That is, it is best to anticipate which type params are desirable to instantiate and place them before the others; it is just for convenience since it is possible to skip some type params and partially apply the latter one(s).

### Compound combinators

There, now, before diverged into all that we wanted to fix the input type while keeping the result type generic, so that we can return values like these:

```ts
[["thru", "put"]]             // has type Parser<A>
[[["in", ""], "put"]]         // has type Parser<[A, B]>
[[["for", "fork"], "lift"]]   // has type Parser<[A, B]>
```

The first value above has the type `Parser<A>`, while the second one has a different type, `Parse<[A, B]>`. The first of these types is the one usually returned from parsers, while the second one lets us return a pair of resulting values (along with the rest of the input); so a pair (of results) is the first component of a pair whose second component is the rest of input.

    "input" --> [[["in", ""], "put"]]

A use case for this type is when we know the input starts with one of the two prefixes (but we don't know which). Then we use a combinator that returns a pair of resulting values. Most of the time, we expect only one of the two parsers to succeed, so one of the resulting values will be empty:

    "input" --> [[["in", ""], "put"]]
    "output" --> [[["", "out"], "put"]]

but even if both parsers succeed, we get both results so we can decide how to proceed:

    "insideout" --> [[["in", "side"], "out"]]


>Remember that the input is unbeknownst to us. We have some idea, but generally we don't know what may appear in the input. We can only probe it by throwing different parsers at it.

* There are the *primitive parsers combinators*, each of which is a simple parser itself.
* There are *simpler parser combinators* that take a parsers as an argument, but whose return value is simple, i.e. it conforms to the return type of the primitive parsers.
* There are different kinds of *compound parser combinators*. They take two (or more) parsers but return different values. Some may have a simple return type, while others return more complex values.

For example, a compound combinator that takes two parsers may throw each parser at the input, and return the result of the parser that succeeded (or indicate the total failure if both fail).



try to parse the input with the first one, and if succeed, they don't even try the second parser. If a parser fails, the failure is not signalled like with single parsers (i.e. as the empty array), but the result of the parser that failed is the empty string.



When expanded, these types look like:

...


```hs
type Parser s a :: s -> (a, s)
type Parser s a :: s -> [(a, s)]
type Parser s a :: s -> [((a, b), s)]
```


```ts
// not flexible enough
type Parser = (xs: string) => [string, string][]

// generic type
type Parser<A, S> = (xs: S) => [A, S][]

// generic type partially applied is good enough
type Parser<A> = string => [A, string][]

// because now we have a generic type param A in Parser<A>
// so we can return e.g. a pair of A's
// by instantiating the A in Parser<A> with [A, A] as in
// Parser<[A, A]>
// That is, normally, the type Parser<A> is instantiated with string:
// Parser<A> ---> Parser<string>
// and in cases when we want to return a string as the result type,
// this is fine.
// But if we want to return a pair of strings as the result part of the output,
// we cannot do it if the type is fixed to Parser i.e. Parser<string>


type Parser<A> = string => [string, string][]
```



## Signaling failure

We need to distinguish *total failure* (all parsers fail) from *partial failure* (at least one parser succeeded), in accordance with the shape (type) of the value we return on success.

- total failure: `[]`
  - possibilities: `null`, `undefined`, `""`, `[]`, …
  - "input" ---> ""
  - "input" ---> ["", "input"]
- partial failure (at least one parser succeeded): `""`





## Primitive parsers

The 3 primitive parsers defined here are the building blocks of combinator parsing: `result`, `fail`, `item`.

The first parser is `result`, which succeeds without consuming any input, and returns the result `v`. But if it doesn't consume any input where does it get the value to return? We'll give it that value directly.

```hs
result :: a -> Parser a
result v = \inp -> [(v,inp)]

zero :: Parser a
zero = \inp -> []

item :: Parser Char
item = \inp -> case inp of
  []     -> []
  (x:xs) -> [(x,xs)]
```


```ts
type Parser = string -> [string, string][]
type ParserA = (v: string) => Parser

const result: ParserA = v => inp => [[v, inp]]

const zero: Parser = _ => []

const item: Parser = ([x, ...xs]) =>
  typeof x !== 'undefined' ? [[x, xs.join('')]] : []
```

## Parser combinators

In this section we consider how the primitive parsers may be composed to form more useful parsers.

```hs
seq :: Parser a -> Parser b -> Parser (a, b)
p `seq` q = \inp -> [((v, w), inp2) | (v, inp1) <- p inp, (w, inp2) <- q inp1]


(>>=) :: Parser a -> (a -> Parser b) -> Parser b
p >>= f = \inp -> concat [f v inp' | (v,inp') <- p inp]
```
