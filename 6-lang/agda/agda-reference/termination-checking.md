# Termination Checking

https://agda.readthedocs.io/en/latest/language/termination-checking.html

Not all recursive functions are permitted - Agda accepts only these recursive schemas that it can mechanically prove terminating.

## Primitive recursion

In the simplest case, a given argument must be exactly one constructor smaller in each recursive call. We call this **scheme primitive recursion**.

Correct examples:

```hs agda
plus : Nat → Nat → Nat
plus zero    m = m
plus (suc n) m = suc (plus n m)

natEq : Nat → Nat → Bool
natEq zero    zero    = true
natEq zero    (suc m) = false
natEq (suc n) zero    = false
natEq (suc n) (suc m) = natEq n m
```

Both `plus` and `natEq` are defined by primitive recursion.

The recursive call in `plus` is fine because `n` is a subexpression of `suc n`, so `n` is structurally smaller than `suc n`. Every time `plus` is recursively called, the first argument is getting smaller and smaller. Since a natural number can only have a finite number of `suc` constructors, we know that `plus` will always terminate.

`natEq` terminates for the same reason, but in this case, both arguments are decreasing.

## Structural recursion

Agda's termination checker allows more types of recursion than just primitive recursion - it also allows structural recursion. This means that we require recursive calls to be carried out on a *strict subexpression of the arg expression*. This is a more general means of recursion then having the rec arg shed a constructor at a time.

```hs agda
fib : Nat → Nat
fib zero          = zero
fib (suc zero)    = suc zero
fib (suc (suc n)) = plus (fib n) (fib (suc n))
```

It also means that arguments may decrease in an lexicographic order - this can be thought of as nested primitive recursion.

```hs
ack : Nat → Nat → Nat
ack zero    m       = suc m
ack (suc n) zero    = ack n (suc zero)
ack (suc n) (suc m) = ack n (ack (suc n) m)
```

In `ack` either the first argument decreases, or it stays the same and the second one decreases. This is the same as a lexicographic ordering.



## foetus - Termination Checker for Simple Functional Programs
by Andreas Abel


We focus on functional programs and designing the simple language named `foetus`, for which we have implemented a termination prover. foetus is a simplification of MuTTI (Munich Type Theory Implementation) based on partial Type Theory (ala Martin Lof) extended by tuples, constructors and pattern matching.

>To prove the termination of a functional program there has to be a well-founded order on the product of the function parameters such that the arguments in each recursive call are smaller than the corresponding input regarding this order.

We are limited to structural orderings. foetus tries to find such an order by collecting all recursive calls of the given function and the belonging behaviour of the function arguments. To handle mutually recursive functions a call graph is constructed and completed.
