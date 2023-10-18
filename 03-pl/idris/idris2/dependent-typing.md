# Dependent typing

* the core language of Idris 2 is Quantitative Type Theory (QTT)
* every variable in Idris 2 has a quantity associated with it
* a quantity is one of:
  - `0` variable is erased at run time
  - `1` variable is used exactly once at run time
  - `Unrestricted` same behaviour as Idris 1

In Idris, names which begin with a lower case letter are automatically bound as *implicit arguments in types*. For example, in the following skeleton definition, `n`, `a` and `m` are *implicitly bound*:

```hs
append : Vect n a -> Vect m a -> Vect (n + m) a
append xs ys = ?append_rhs
```

One of the difficulties in compiling a dependently typed programming language is deciding which type values may be erased and which should survive type erasure and be available at runtime.

More importantly, it is one of the difficulties when programming: how can a programmer know when a value will be erased?

In Idris 2, a variable's quantity tells us whether it will be available at RT. We can check the quantities of variables (in `append_rhs`) by inspecting the hole in the REPL `:t append_rhs`.

```hs
Main> :t append_rhs
0 m : Nat
0 a : Type
0 n : Nat
 ys : Vect m a
 xs : Vect n a
-------------------------------------
append_rhs : Vect (plus n m) a
```

Those 0's means these vars are in scope, but each will have 0 occurrences at run-time. That is, it is guaranteed they will be erased at run-time.

In Idris 2, we need to be explicit about what variables we need at run time.

```hs
vlen : {n : Nat} -> Vect n a -> Nat
vlen xs = n
```

Bu the way, note that in Idris 2, names bound in types are also available in the definition without explicit rebinding.
