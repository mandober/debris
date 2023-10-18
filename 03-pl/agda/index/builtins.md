# Agda :: Index :: Agda Builtins

- unit type
- Σ type
- Lists
- Maybe
- Booleans
- Natural numbers
- Machine words
- Integers
- Floats
- Characters
- Strings
- Equality
- Sorts
- Universe levels
- Sized types
- Coinduction
- IO
- Rewriting
- Static values

## Index of built-in types

```hs agda
{-# BUILTIN UNIT          ⊤                 #-}
{-# BUILTIN SIGMA         Σ                 #-}
{-# BUILTIN LIST          List              #-}
{-# BUILTIN MAYBE         Maybe             #-}
-- bool
{-# BUILTIN BOOL          Bool              #-}
{-# BUILTIN TRUE          true              #-}
{-# BUILTIN FALSE         false             #-}
-- nat
{-# BUILTIN NATURAL       Nat               #-}
{-# BUILTIN NATPLUS       _+_               #-}
{-# BUILTIN NATMINUS      _-_               #-}
{-# BUILTIN NATTIMES      _*_               #-}
{-# BUILTIN NATEQUALS     _==_              #-}
{-# BUILTIN NATLESS       _<_               #-}
{-# BUILTIN NATDIVSUCAUX  div-helper        #-}
{-# BUILTIN NATMODSUCAUX  mod-helper        #-}
-- int
{-# BUILTIN INTEGER       Int               #-}
{-# BUILTIN INTEGERPOS    pos               #-}
{-# BUILTIN INTEGERNEGSUC negsuc            #-}
-- machine
{-# BUILTIN WORD64        Word64            #-}
{-# BUILTIN FLOAT         Float             #-}
{-# BUILTIN CHAR          Char              #-}
{-# BUILTIN STRING        String            #-}
-- eq
{-# BUILTIN EQUALITY      _≡_               #-}
-- sorts
{-# BUILTIN TYPE          Set               #-}
{-# BUILTIN PROP          Prop              #-}
{-# BUILTIN SETOMEGA      Setω              #-}
-- levels
{-# BUILTIN LEVEL         Level             #-}
{-# BUILTIN LEVELZERO     lzero             #-}
{-# BUILTIN LEVELSUC      lsuc              #-}
{-# BUILTIN LEVELMAX      _⊔_               #-}
-- sized types: Agda.Builtin.Size
{-# BUILTIN SIZEUNIV      SizeUniv          #-} --  SizeUniv : SizeUniv
{-# BUILTIN SIZE          Size              #-} --  Size   : SizeUniv
{-# BUILTIN SIZELT        Size<_            #-} --  Size<_ : ..Size → SizeUniv
{-# BUILTIN SIZESUC       ↑_                #-} --  ↑_     : Size → Size
{-# BUILTIN SIZEINF       ∞                 #-} --  ∞      : Size
{-# BUILTIN SIZEMAX       _⊔ˢ_              #-} --  _⊔ˢ_ : Size → Size → Size
-- Agda.Builtin.Coinduction
{-# BUILTIN INFINITY      ∞                 #-}
{-# BUILTIN SHARP         ♯_                #-}
{-# BUILTIN FLAT          ♭                 #-}
-- Agda.Builtin.IO
{-# BUILTIN IO            IO                #-}
-- Rewriting
{-# BUILTIN REWRITE       _↦_               #-}
-- static
{-# STATIC                <Name>            #-}
```
