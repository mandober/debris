# Pragmas

- [Index of pragmas](#index-of-pragmas)
- [The `DISPLAY` pragma](#the-display-pragma)
- [The `INJECTIVE` pragma](#the-injective-pragma)
- [The `INLINE` and `NOINLINE` pragmas](#the-inline-and-noinline-pragmas)
- [The `NON_COVERING` pragma](#the-non_covering-pragma)
- [The `OPTIONS` pragma](#the-options-pragma)
- [The `WARNING_ON_*` pragmas](#the-warning_on_-pragmas)


Pragmas are special comments that have special meaning in Agda. 
The general form of pragmas is: `{-# <PRAGMA_NAME> <arguments> #-}`


## Index of pragmas

```hs agda
BUILTIN
CATCHALL
COMPILE
DISPLAY
FOREIGN
INJECTIVE
INLINE
NO_POSITIVITY_CHECK
NO_TERMINATION_CHECK
NO_UNIVERSE_CHECK
NOINLINE
NON_COVERING
NON_TERMINATING
OPTIONS
POLARITY
REWRITE
STATIC
TERMINATING
WARNING_ON_USAGE
WARNING_ON_IMPORT
```

See also Command-line and pragma options:   
https://agda.readthedocs.io/en/v2.6.2.1/tools/command-line-options.html#command-line-pragmas


## The `DISPLAY` pragma

Users can declare a `DISPLAY` pragma:

```hs agda
{-# DISPLAY f e1 .. en = e #-}
```

This causes `f e1 .. en` to be printed in the same way as `e`, where `ei` can bind variables used in `e`. The expressions `ei` and `e` are scope checked, but not type checked.

For example this can be used to print overloaded (instance) functions with the overloaded name:

```hs agda
instance
  NumNat : Num Nat
  NumNat = record { ..; _+_ = natPlus }

{-# DISPLAY natPlus a b = a + b #-}
```

Limitations
- Left-hand sides are restricted to vars, ctors, defined functions or types, and literals. In particular, lambdas are not allowed in lhs.
- Since `DISPLAY` pragmas are not type checked, *implicit arg insertion* may not work properly if the type of `f` computes to an implicit function space after pattern matching.

## The `INJECTIVE` pragma

Injective pragmas can be used to mark a definition 
as injective for the pattern matching unifier.

This can be used as a version of `--injective-type-constructors` 
that only applies to specific datatypes.

Example:

```hs agda
open import Agda.Builtin.Equality
open import Agda.Builtin.Nat

data Fin : Nat → Set where
  zero : {n : Nat} → Fin (suc n)
  suc  : {n : Nat} → Fin n → Fin (suc n)

{-# INJECTIVE Fin #-}

Fin-injective : {m n : Nat} → Fin m ≡ Fin n → m ≡ n
Fin-injective refl = refl
```

Aside from datatypes, this pragma can also be used to mark other definitions as being injective (for example postulates).

## The `INLINE` and `NOINLINE` pragmas

A definition marked with an `INLINE` pragma is inlined during compilation.

If it is a simple definition that does no pattern matching, it is also inlined in function bodies at type-checking time.

When the `--auto-inline` command-line option is enabled, definitions are automatically marked `INLINE` if they satisfy the following criteria:
- No pattern matching
- Uses each arg at most once
- Does not use all its args
- Automatic inlining can be prevented using the `NOINLINE` pragma

Example:

```hs agda
-- Would be auto-inlined since it doesn't use the type arguments.
_∘_ : {A B C : Set} → (B → C) → (A → B) → A → C
(f ∘ g) x = f (g x)

{-# NOINLINE _∘_ #-} -- prevents auto-inlining

-- Would not be auto-inlined since it's using all its arguments
_o_ : (Set → Set) → (Set → Set) → Set → Set
(F o G) X = F (G X)

{-# INLINE _o_ #-} -- force inlining
```

## The `NON_COVERING` pragma

- pragma: NON_COVERING
- since :2.6.1.

The `NON_COVERING` pragma can be placed before a function (or a block of mutually defined functions) which the user knows to be **partial**.

To be used as a version of `--allow-incomplete-matches` 
that only applies to specific functions.

## The `OPTIONS` pragma

Some options can be given at the top of files in the form

`{-# OPTIONS --{opt₁} --{opt₂} ... #-}`

The possible options are listed in Command-line and pragma options.

## The `WARNING_ON_*` pragmas

- pragma: WARNING_ON_USAGE
- since:  Agda 2.5.4

A library author can use a `WARNING_ON_USAGE` pragma to attach to a defined name a warning to be raised whenever this name is used (since Agda 2.5.4).


- pragma: WARNING_ON_IMPORT
- since:  Agda 2.6.1

Similarly they can use a `WARNING_ON_IMPORT` pragma to attach to a module a warning to be raised whenever this module is imported (since Agda 2.6.1).


This would typically be used to declare a name or a module 'DEPRECATED' and advise the end-user to port their code before the feature is dropped.

Users can turn these warnings off by using the `--warn=noUserWarning` option.

For more information about the warning machinery, see Warnings.

Example:

```hs agda
-- The new name for the identity
id : {A : Set} → A → A
id x = x

-- The deprecated name
λx→x = id

-- The warning
{-# WARNING_ON_USAGE λx→x "DEPRECATED: Use `id` instead of `λx→x`" #-}
{-# WARNING_ON_IMPORT "DEPRECATED: Use module `Function.Identity` rather than `Identity`" #-}
```
