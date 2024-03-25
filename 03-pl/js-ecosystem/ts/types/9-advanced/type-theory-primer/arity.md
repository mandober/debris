# Arity

The concept of *arity* (adicity, valence) arises already at the term level where we talk about the *arity of functions*, which is the number of arguments a function takes. JS does not have tuples, but TS does, so we can also talk about the *arity of tuples* - the number of elements a tuple holds. However, arity is mostly associated with functions.

- *Nullary functions* take no arguments.
- *Unary functions* take 1 argument.
- *Binary functions* take 2 arguments.
- *Ternary functions* take 3 arguments.
- *Polyadic functions* take more than 1 argument.

We can represent polyadic functions in their curryied forms as a series of nested unary functions. Having only unary functions to work with is convenient since then any function always takes exactly one and returns one value, but a bigger benefit is that currying unlocks a more convenient form of partial application. For example, an uncurryied binary function takes both args at once (as a quasi 2-tuple or, more commonly, a list of arguments), but its curryied version is a function that takes one argument (first arg) and returns a function which, in turn, takes one argument (second arg) and returns the final value. Currying is automatic in FP but not in TS, although we can implement it manually, like many other FP techniques.
