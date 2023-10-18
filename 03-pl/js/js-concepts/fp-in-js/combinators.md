# JS :: Concepts :: FP :: Combinators

- closed and open expressions
  - combinators = closed expressions
  - supercombinators
  - open expressions (have free vars)
- free, bound and binding variables
  - binding variable
  - bound variable
  - free variable
- binding and applied occurrence (of a variable)
  - binding occurrence
  - applied (application) occurrence
- variable vs parameter
  - formal parameter
  - argument



## Closed and open expressions

Combinators are *closed expressions*, which are expressions without *free variables*, i.e. all variables they contain are *bounded variables*.

- A variable is *free* if its binder is not in the considered scope.
- A variable is *bound* if its binder is in the considered scope.

We can consider different parts of an expression - an overall expression as well as only some of its component expressions - two two notions (of free and bound variables) become relative to the scope we are considering.

```ts
// all-in-one: def + sig
const identity = <A>(x: A): A => x

// id with a standalone sig
type id = <T>(x: T) => T
const id: id = x => x
```

For example, the `id` function, coinsidered as a whole, is a *closed expression* - its only variable, `x`, is bound. But if we consider a subexpression that is the body of the `id` function, then it is an *open expression* because the variable `x` is free in there.

## Free, bound and binding variables




Most of the time, function expressions, especially lambda functions (fat arrows), are talked about in this context. It is easy to see if a lambda function is closed or not, i.e. whether it is a combinator, by examining whether all of its parameters are bounded. We can also talk about expressions and their parts, as subexpressions. Even if an overall expression is closed, we can always focus on its part that will contain free variables, so combinators and closed/open expressions are sometimes a relative affair. Usually, though, all we want to know is whether an overall expression, particularly a lambda fucntion, is closed, i.e. is a combinator.

Combinator functions are the purest form of functions. Since all their parameters are bound - each is declared as a formal paramter - they have no free variables - which can be considered as *implicit paramters* - that refer to entities outside the function. This fact maximizes a function's reusability; it can be freely copy-pasted, and it will work always and in the same way, in any context we drop it.

Lambda calculus has discovered a great number of combinator functions, inclusing the ubiquituous ones like `id`, `const`, `compose`, but also many other useful ones like `flip`, `pair`, `env`, as well as the fixpoint combinators `Y` and `Z` (`Y` for lazy, `Z` for eager languages). These are affectionately called *combinator birds*. Since JS has first-class functions and closures, we can expressed them all - although we have to introduce a means of deffering evaluation in case of the fixpoint combinator `Z`, which is usually achieved by wrapping a function in a *thunk*, i.e. an empty-parameter function whose bosy is the original (eager) function.

```ts
const Thunk = <F>(f: F) => () => T
```
