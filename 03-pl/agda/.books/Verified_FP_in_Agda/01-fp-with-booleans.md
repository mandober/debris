# 1. FP with Booleans

Module declaration
- Agda code is contained in a module.
- A module is contained in a file with the same name.
- Modules are organizational units of code.
- Modules contain declarations.
- Modules may be nested.
- Modules may be parameterized - you instantiate the params on import.

Importing and opening modules
- To use code contained in another file, we have to import it.
- to import a module use the `import` keyword.
- `import` statement imports a module, but you have to use its names qualified.
- `open` makes a module's names available in the current scope unqualified.
- qualified names are names prefixed by their module name, `ModuleName.Name`
- `open import` combines these two.
- records are (nested) modules; need to be opened for fields to be used unqual.

Type Levels
- every expression in Agda has a type
- `Set` is the type for (small) types
- Type-in-Type means a lang allows `Type : Type`, i.e. `Set : Set` in Agda.
- Type-in-Type makes a lang nonterminating, diverging programs become possible.
- To avoid this, Agda uses an infinite hierarchy of type levels.
- the type of `Set` is `Set₁`, the type of `Set₁` is `Set₂`, …
- ∀ (n : Nat) the expression `Set n` has type `Set (n + 1)`.
- In fact, it is `Level` not a natural number but it can be though as one.
- therefore, `Set` is indexed by the `Level` type.

It is known that if one literally makes `Set` the type of itself, `Set : Set`, then the language becomes nonterminating, meaning we can write diverging programs, which is normally disallowed in Agda. This remarkable result is discussed in a paper by Meyer and Reinhold, 1986.

In `data Bool : Set`, Booleans have the type `Set`, i.e. the type of small types, which, in turn, has the type, `Set₁`. However, we are only required to provide the initial (`Set`) type for `Bool`, the followinf types can be automatically inferred anyway. Comparing this data decl to Haskell, `data 𝔹`, we see that Haskell's decl doesn't allow putting the type of `𝔹` - in fact, all inhabited types have the type, that is, kind, `Type`; So, in Haskell, `𝔹` automatically gets the type (kind) `𝔹 : Type`. User can also write so explicitly in the same line, `data (𝔹 : Type) where`, or on a separate line, `type 𝔹 : Type; data 𝔹 where`:

```hs
-- Boolean decl in Haskell, ADT style
data 𝔹 = True | False

-- Boolean decl in Haskell, GADT style, variant 1
data 𝔹 where
  True  :: 𝔹
  False :: 𝔹

-- variant 2
data 𝔹 where
  True, False :: 𝔹

-- explicitly declaring the kind, variant 1: inline kind
data (𝔹 : Type) where
  True, False :: 𝔹

-- explicitly declaring the kind, variant 1: on a separate line
type 𝔹 : Type
data 𝔹 where
  True, False :: 𝔹
```
