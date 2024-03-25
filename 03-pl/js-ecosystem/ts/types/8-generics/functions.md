# Functions

## Value-level functions
## Type-level functions

## Parameterization

Imagine if functions were not parameterized - within a function's body, we'd only be able to refer to entities that exist in the outer scopes. There would be no association between the (nonexisting) input data types and the function's output.

In general, such function, if it were really pure, would have to rely on side-effects to be useful. And JS has such functions and plenty of use for them. But we're here considering only pure functions, combinators even, in order to understand the commonalities of how the similar functions would behave lifted to the type level.

A pure function is free to refer to the entities (variables) available in the outer scopes. In fact, when it does it becomes a closure that captures the values it references and stores them inside it self since closures are function objects. To make a combinator out of such function/closure, we can use *lambda lifting* to parameterize all its free variables. *Combinators* are the purest form of functions, they have no dependencies, so they can be readily reused (dropped in any environment).

### Overview of various function properties

```ts
let y = 42
// impure function
const impure = x => x + y

// pure, uncurryied, binary function
const add = (x, y) => x + y

// pure, curryied, 'binary' function
const addc = x => y => x + y

// a closure / point-free function
const succ = addc(1)
// equivalent, point-full function
const succ = y => 1 + y

// a combinator
const combo = (f, x, y) => f(x, y)
```

Note that the function, e.g. `add` above, is considered pure only because the operator `+` is available in all JS environments. In fact, it is impossible to shadow it (or any other operator) in JS because they are special *language constructs* and not first-class values; e.g. we cannot pass around the `+` function/operator (like we can in Haskell¹ where it is just an identifier).

However, `g` is not a combinator precisely because of the dependency on `+`. In fact, there's no way to make a combinator out of `g` in JS because the operator `+` cannot be abstracted - we cannot define our own without referring to it.

### Aside: Haskell

¹ Haskell is taken in the discussions about types as the role model language that has already influenced JS. The convention of annotating types à la Haskell seems to be sufficiently spread in the JS world, even when TS is used. Besides having the most readable syntax for denoting types, Haskell is also used as a role model for may FP libraries, especially those that insist on the purity in JS. Haskell is a member of a completely different programming paradigm to JS; in purely functional programming there is no relying on side-effects willy-nilly - referential transparency is always preserved. The purity comes with laziness - unlike th eager JS, Haskell is lazily evaluated, which warrents attention when translating both its value-level and type-level concepts into JS. In general, Haskell does not have the most advanced type system - there are languages with dependent types - but it does have the most user-friendly one: in majority of cases, users need not type-annotate a single expression as the compiler can infer it all. Hasklell's type system is based on Hindly-Milner type system, created in the 60's, which relieves the developer to annotate types (there may be some rare edge cases when it's required), but only a few of the modern mainstream languages have taken advantage of it (Rust, Swift).



## Polymorphism

If we consider the JS function as being polyadic, by decreasing the number of parameters we do get to the case of nullary functions - functions with no parameters at all.

```ts
const f = () => ...
```


Now consider the immense power we get by parameterization. A function that can take parameters becomes a true abstraction, independent from the things in its enclosing scopes. Such a function declares the things it needs, and in order to call it, we must supply it with those things. This establishes a strong connection between a function's input and output datatypes, which is what the functions were always intended to cultivate. For example, *a function of time* is a function that takes time as its input argument; the output it produces is in a dependent relation with its input.


```ts
// value-level function statement
function valueFn(a) { ...a... }

// value-level function expression
const valueFn = a => ...a...
```
