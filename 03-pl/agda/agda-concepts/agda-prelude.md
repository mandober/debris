# Agda Prelude

A new Agda module initially knows only about:
- the function type `→`
- Agda.Primitive.`Set`
  * These public names, from `Agda.Primitive`, are not automatically in scope:
    + The module Agda.Primitive is auto-imported, but using only `Set`
    - Agda.Primitive.`Set`   (loaded)
    - Agda.Primitive.`Setω`  (loaded)
    - Agda.Primitive.`Prop`  (disabled, `--prop` to enable it)
    - Agda.Primitive.`SSetω` (disabled, `--two-level` to enable)
    - Agda.Primitive.`SSet`  (disabled, `--two-level` to enable)
    - Agda.Primitive.`Level`
    - Agda.Primitive.`_⊔_`
    - Agda.Primitive.`lzero`
    - Agda.Primitive.`lsuc`


- Set forms a hierarchy: `Set = Set₀ < Set₁ < … < Setₙ < Setω < SSet … < SSetω`
- Prop forms a hierarchy: `Prop = Prop₀ < Prop₁ < … < Propₙ < Propω`


The primitive sorts used in Agda's type system (`Set`, `Prop`, and `Setω`) are declared in the `Agda.Primitive` module. Their corresponding pragmas should not be used directly in other modules, but it is possible to rename these builtin sorts upon importing Agda.Primitive. The primitive sorts `Set` and `Prop` are automatically imported at the top of every top-level Agda module, unless the `--no-import-sorts` flag is enabled.

In contrast to the `Agda.Builtin` modules, the `Agda.Primitive` module is auto-imported, thus, it is not possible to change the level builtins.

Inspecting the contents of an empty module in the repl using `:scope` yields:

```agda hs
agda> :scope
ScopeInfo
  current =
  context = []
  modules
    scope
      private
        names
          Prop --> [Agda.Primitive.Prop]
          Set  --> [Agda.Primitive.Set]
      imports
        [Agda.Primitive]
    scope Agda.Primitive
      public
        names
          Set   --> [Agda.Primitive.Set]
          Setω  --> [Agda.Primitive.Setω]
          Prop  --> [Agda.Primitive.Prop]
          SSet  --> [Agda.Primitive.SSet]
          SSetω --> [Agda.Primitive.SSetω]
          Level --> [Agda.Primitive.Level]
          _⊔_   --> [Agda.Primitive._⊔_]
          lsuc  --> [Agda.Primitive.lsuc]
          lzero --> [Agda.Primitive.lzero]


-- Set = Set₀ = Set0
agda> :typeOf Set
Ident (QName (Name {nameRange = NoRange, nameInScope = InScope, nameNameParts = Id "Set\8321" :| []}))

-- Set₀ = Set0 = Set
agda> :typeOf Set₀
Ident (QName (Name {nameRange = NoRange, nameInScope = InScope, nameNameParts = Id "Set\8321" :| []}))

-- Set₁ = Set1
agda> :typeOf Set₁
Ident (QName (Name {nameRange = NoRange, nameInScope = InScope, nameNameParts = Id "Set\8322" :| []}))

:typeOf Setω
Ident (QName (Name {nameRange = NoRange, nameInScope = InScope, nameNameParts = Id "Set\969\8321" :| []}))


-- Prop also forms a hierarchy, Prop = Prop₀ < Prop₁ < … < Propₙ
agda> :typeOf Prop
Universe Prop is disabled (use options --prop and --no-prop to dis/enable Prop)

:typeOf SSetω
Universe SSet is disabled (use option --two-level to enable SSet)
```
