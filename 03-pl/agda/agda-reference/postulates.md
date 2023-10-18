# Postulates

With postulates we can introduce elements in a type without actually giving the definition of the element itself.

>A postulate is a declaration of an element of some type without an accompanying definition.

The general form of a postulate declaration:

```hs agda
-- general form
postulate
  c11 … c1i : <Type>
  …
  cn1 … cnj : <Type>

-- Example:
postulate
  A B    : Set
  a      : A
  b      : B
  _=AB=_ : A -> B -> Set
  a==b   : a =AB= b
```

Introducing postulates is in general not recommended. Once postulates are introduced the consistency of the whole development is at risk, because there is nothing that prevents us from introducing an element in the empty set.

```hs agda
data False : Set where

postulate bottom : False
```

A preferable way to postulates is to define a *module parametrised* by the elements we need:

```hs agda
module Absurd (bt : False) where

  -- …

module M (A B : Set) (a : A) (b : B)
         (_=AB=_ : A -> B -> Set) (a==b : a =AB= b) where

  -- …
```

## Postulated built-ins

Some Built-ins such as `Float` and `Char` are introduced as a postulate and then given a meaning by the corresponding `{-# BUILTIN … #-}` pragma.
