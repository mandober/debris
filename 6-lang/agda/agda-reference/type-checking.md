# Type checking

The Agda type checker knows about, and has special treatment for, a number of different language concepts. For example, the natural numbers have a special representation as the Haskell's `Integer` type that comes with the support for fast arithmetic.

The surface syntax of these concepts is not fixed, so in order to use the compiler's intimate knowledge about, e.g. natural numbers, you define an appropriate data type (e.g. `Nat`) and then bind that type to the natural number concept using the corresponding pragma, `{-# BUILTIN NATURAL Nat #-}`.
