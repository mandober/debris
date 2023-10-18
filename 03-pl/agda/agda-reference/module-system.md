# Module System

https://agda.readthedocs.io/en/latest/language/module-system.html
https://agda.readthedocs.io/en/v2.6.2/language/module-system.html
https://agda.readthedocs.io/en/v2.6.2.1/language/module-system.html

<!-- TOC -->

- [Basics](#basics)
- [Private definitions](#private-definitions)
- [Name modifiers](#name-modifiers)
- [Re-exporting names](#re-exporting-names)
- [Parameterised modules](#parameterised-modules)
- [Splitting a program over multiple files](#splitting-a-program-over-multiple-files)
- [Datatype modules and record modules](#datatype-modules-and-record-modules)

<!-- /TOC -->

## Basics

A **definition** is a syntactic construction defining an entity (such as a function or a datatype).

A **name** is a string used to identify definitions.

The same definition can have more than one name, and at different points in the program it will have different names. If it happens that more than one definition has the same name, an error will be issued when the name is used.

The main purpose of the *module system* is to structure the way names are used in a program. This is done by organising the program in an hierarchical structure of modules where each module contains a number of definitions and submodules.

In the example below, `bee` is in the module `Bada.Bing`, while `gee` is in the module `Bada`.


```hs
module Bada where

  data ℕ : Set where
      zero : ℕ
      suc  : ℕ → ℕ

  module Bing where
      bee : ℕ → ℕ
      bee n = suc n

  gee : ℕ → ℕ → ℕ
  gee n m = Bing.bee m
```

The way you refer to a particular definition is determined by its location in the module hierarchy. Definitions from the enclosing module are referred to by their given names (like `bee` above).

To access a definition from outside its defining module, a **qualified name** must be used. For example, within the module `Bada`, you refer to a name from the module `Bada.Bing` using a qualified name, e.g. `Bing.bee` (just `bee` won't work). However, within the module `Bada.Bing`, you would refer to the names in the outer module without qualification.

Normally, the identetion level tells you about which code bloks belong to what declaration header. However, there is an exception in the case of modules: the code belonging to a module need not be indented (but it may be).

But what if the nested code is another module declaration? Then you should probably start indenting everything properly in that file, like in the example above. However the same example with the layout as below is also ok

```hs
module Bada where

data ℕ : Set where
    zero : ℕ
    suc  : ℕ → ℕ

module Bing where
    bee : ℕ → ℕ
    bee n = suc n

gee : ℕ → ℕ → ℕ
gee n m = Bing.bee m
```

> To use short names for definitions, a module has to be opened.

Doing `open {MODULE_NAME}` after the module's definition, allows us to refer to names in that module with or without the qualification:

```hs
module Bada where

data ℕ : Set where
    zero : ℕ
    suc  : ℕ → ℕ

module Bing where
    bee : ℕ → ℕ
    bee n = suc n

open Bing

gee : ℕ → ℕ → ℕ
gee n m = bee m

wee : ℕ → ℕ → ℕ
wee n m = Bing.bee m
```

If `A.qname` refers to a definition `d`, then after `open A`, `qname` will also refer to `d`. Note that `qname` can itself be a qualified name.

>Opening a module only introduces new names for a definition, it never removes the old names. 
The policy is to allow the introduction of ambiguous names, but emit an error if an ambiguous name is used.


**Open modules in a local scope** by putting the `open B` statement inside a where-clause:

```hs
ff : Nat → Nat
ff x = f (f x)
  where
    open B
```

## Private definitions

>To make a definition inaccessible outside its defining module, declare it private.

A private definition is treated as a normal definition inside the module that defines it, but outside the module the definition has no name.

In a dependently type setting there are some problems with private definitions: since the type checker aslo performs computations, private names might show up in goals and error messages.

Consider the following (contrived) example:

```hs
module Main₄ where
  module A where

    private
      IsZero' : Nat → Set
      IsZero' zero    = ⊤
      IsZero' (suc n) = ⊥

    IsZero : Nat → Set
    IsZero n = IsZero' n

  open A
  prf : (n : Nat) → IsZero n
  prf n = ?
```

The type of the `goal ?0` is `IsZero n` which normalises to `IsZero' n`.

The question is how to display this normal form to the user. At the point of `?0` there is no name for `IsZero'`.

One option could be try to fold the term and print `IsZero n`. This is a very hard problem in general, so rather than trying to do this we make it clear to the user that `IsZero'` is something that is not in scope and print the goal as `;Main₄.A.IsZero' n`, where *the leading semicolon indicates that the entity is not in scope*. The same technique is used for definitions that only have ambiguous names.

In effect, using private definitions means that, from the user's perspective, we do not have subject reduction. This is just an illusion however, since the type checker has full access to all definitions.

## Name modifiers

An alternative to making definitions private is to exert finer control over what names are introduced when opening a module.

This is done by qualifying the `open` statement with one or more of the modifiers: _using_, _hiding_, _renaming_.

You can combine both `using` and `hiding` with `renaming`, but not with each other.


* The effect of the example below is to introduce the names `xs` and `zs`, where `xs` refers to the same definition as `A.xs`, and `zs` refers to `A.ys`.

```hs
open A using (xs) renaming (ys to zs)
```

We do not permit `xs`, `ys` and `zs` to overlap.

The other forms of opening are defined in terms of this one.   
An omitted _renaming_ modifier is equivalent to an empty renaming.


* To refer to a module `M` inside `A`, you write `module M`. For instance

```hs
open A using (module M)
```


* (Since Agda v.2.6.1) the fixity of an operator can be set or changed in a _renaming_ directive:

```hs
module ExampleRenamingFixity where

  module ArithFoo where
    postulate
      A : Set
      _&_ _^_ : A → A → A
    infixr 10 _&_

  open ArithFoo renaming (_&_ to infixl 8 _+_; _^_ to infixl 10 _^_)
```

Here, we change the fixity of `&` while renaming it to `+`, and assign a new fixity to `^` which has the default fixity in the module `ArithFoo`.


## Re-exporting names

A useful feature is the ability to re-export names from another module.

For instance, one may want to create a module to collect the definitions from several other modules. This is achieved by qualifying the `open` statement with the `public` keyword, as _open MODULE public_

```hs
module Example where

  module Nat₁ where

    data Nat₁ : Set where
      zero : Nat₁
      suc  : Nat₁ → Nat₁

  module Bool₁ where

    data Bool₁ : Set where
      true false : Bool₁

  module Prelude where

    open Nat₁  public
    open Bool₁ public

    isZero : Nat₁ → Bool₁
    isZero zero    = true
    isZero (suc _) = false
```

The module `Prelude` above exports the names `Nat, zero, Bool`, etc., in addition to `isZero`.


## Parameterised modules



## Splitting a program over multiple files

Splitting a program over multiple files is not only beneficial for code organization, but also for reducing type checking and compilation times. The module system offers a structured way to do this.

A program is a collection of modules, with each module being defined in a separate file. To gain access to a module defined in a different file you can import the module with `import M`.

To implement this, we must be able to locate the file in which a module resides. So, we require that the top-level module `A.B.C` is defined in the file `C.agda` in the directory `A/B/`.

>The `import` statement brings the module and its contents into the current scope.

When importing the module `M`, the module and its contents are brought into scope as if the module had been defined in the current file.

>The `open` statement makes the imported names available without qualification.

To access the names of the imported module unqualified, use the `open` statement (after importing the module).

There is also this short-hand available to combine the two statements:

```hs
open import M
-- instead of
import M
open M
```

>The `as` keyword allows importing a module under a different name.

Sometimes the name of the imported module clashes with a local module. In this case it is possible to *import the module under a different name* using the keyword `as`

```hs
import M as M'
```

It is also possible to attach modifiers to the `import` statement, limiting or changing what names are visible from inside the module.

The modifiers attached to the `open import` statements apply only to the `open` statement, and not the `import` statement.


## Datatype modules and record modules

When you define a datatype it also defines a module, so constructors can now be referred qualified by their data type.

For instance,

```hs
module DatatypeModules where

  data Nat₂ : Set where
    zero : Nat₂
    suc  : Nat₂ → Nat₂

  data Fin : Nat₂ → Set where
    zero : ∀ {n} → Fin (suc n)
    suc  : ∀ {n} → Fin n → Fin (suc n)
```

you can refer to the constructors unambiguously as Nat₂.zero, Nat₂.suc, Fin.zero, and Fin.suc (Nat₂ and Fin are modules containing the respective constructors). Example:

```hs
inj : (n m : Nat₂) → Nat₂.suc n ≡ suc m → n ≡ m
inj .m m refl = refl
```


* Previously, you had to write something like below to make the type checker able to figure out that you wanted the natural number `suc`, in this case.

```hs
inj₁ : (n m : Nat₂) → _≡_ {A = Nat₂} (suc n) (suc m) → n ≡ m
inj₁ .m m refl = refl
```

Record declarations define a corresponding module, see [Record modules][1].



[1]: https://agda.readthedocs.io/en/v2.6.2.1/language/record-types.html#record-modules
