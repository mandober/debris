# Lambda calculus

There is no FP with lambda calculus (LC). LC is the world's first FPL and the base for all the modern ones. The untyped versions of LC can be explored using vanilla JS, while TS can be used to explore the typed LC versions.

With the introduction of arrow functions, JS has gained one of the most succint notion for anonymous lambda functions. In LC, the identity function is a lambda abstraction (function definition) denoted by `(λx.x)`, expressable by `(x => x)` in JS, and by `(\x -> x)` in Haskell. LC lacks *name binding* - we cannot bind the identity abstraction to an (external) variable, like we can in JS:

```js
const id = x => x
```

or in TS - except we also have to account for the types:

```ts
// standalone sig and definition
type id = <T>(x: T) => T
const id: id = x => x

// or, all-in-one: def + sig
const id = <A>(x: A): A => x
```

On the other hand, Haskell dispenses with a lot of ceremony and infers the signature (although we can add it manually):

```hs
-- binding the id abstraction to a name (`id`)
id = \x -> x

-- or, equivalently, as a named function `id`
-- (moving the formal param to the left-hand side)
id x = x

-- adding the sig manually
id :: a -> a
id = \x -> x

-- the sig stays the same for both flavors
id :: a -> a
id x = x
```
