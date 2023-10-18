# Agda primitives

By default Agda includes only minimal library support through the `Builtin` modules. The Agda Standard Library provides bindings for most commonly used Haskell functions.

The core language of Agda is almost empty, everything is moved into the standard library except for a few data types. Besides knowing about the common types, the core language doesn't expose them. The user has to define everything or import the stdlib.

In fact, when we create a new empty agda file (module), and check what the module contents are - there is nothing in the scope at all.

Show module contents:
- `C-c C-o` simplified
- `C-c C-u` instantiated
- `C-c C-y` normalized

Nevertheless, Agda knows that the symbol `→` is the function arrow, and the pi-type is (supposed to be) a primitive too.


The preloaded Agda primitives, defined in the `Agda.Primitive` module include
- BUILTIN TYPE            `Set`
- BUILTIN PROP            `Prop`
- BUILTIN SETOMEGA        `Setω`
- BUILTIN STRICTSET       `SSet`
- BUILTIN STRICTSETOMEGA  `SSetω`
- BUILTIN LEVEL           `Level`
- BUILTIN LEVELZERO       `lzero`
- BUILTIN LEVELSUC        `lsuc`
- BUILTIN LEVELMAX        `_⊔_`

`Level` is the first thing that needs to be postulated. The other postulates can only be checked if built-in `Level` is known. The MAlonzo compiler compiles Agda code to Haskell. `Level` is compiled to Haskell's `()`.

```agda hs
postulate
  Level : Set
  lzero : Level
  lsuc  : (ℓ : Level) → Level
  _⊔_   : (ℓ₁ ℓ₂ : Level) → Level
```



Checking for the contents of the module `Agda.Primitive` shows:

```agda hs
Modules
  (nothing)

Names
  _⊔_   : Agda.Primitive.Level → Agda.Primitive.Level → Agda.Primitive.Level
  Level : Set
  Prop  : Set₁
  SSet  : Agda.Primitive.SSet (Agda.Primitive.lsuc Agda.Primitive.lzero)
  SSetω : Agda.Primitive.SSetω₁
  Set   : Set₁
  Setω  : Agda.Primitive.Setω₁
  lsuc  : Agda.Primitive.Level → Agda.Primitive.Level
  lzero : Agda.Primitive.Level


-- unqualified names since they all live in Agda.Primitive module:
Names
  Set   : Set₁
  Level : Set
  _⊔_   : Level → Level → Level
  lsuc  : Level → Level
  lzero : Level
  Prop  : Set₁
  Setω  : Setω₁
  SSet  : SSet (lsuc lzero)
  SSetω : SSetω₁
```

Hierarchy of universes
- `Set` or `Set₀` is the universe level 0 of type `Set₁`
- `Set₁` is the universe level 1 of type `Set₂`
- `Set₂` is the universe level 2 of type `Set₃`
- `Set₃` is the universe level 3 of type `Set₄`
- etc.

If a term lives in the universe level `n` then its type lives in the universe level `n + 1`, and so `Set₀ : Set₁`, `Set₅ : Set₆`, etc.
