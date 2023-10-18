# Simple inductive types

https://wiki.portal.chalmers.se/agda/ReferenceManual/SimpleInductiveTypes?from=ReferenceManual.Datatypes

General form of the definition of a simple data type `D`:

```agda hs
data  D  :  Setᵢ  where
  c₁ : A₁
  …
  cₙ : Aₙ
```

The name `D` of the data type and the names `c₁, …, cₙ` of the data ctors must be new wrt the current signature and context, and the types `A₁, …, Aₙ` must be function types ending in `D`, i.e. each `Aᵢ` must have the form:   
`(y₁ : B₁) → … → (yₘ : Bₘ) → D`


https://wiki.portal.chalmers.se/agda/ReferenceManual/SimpleInductiveTypes?from=ReferenceManual.Datatypes

https://wiki.portal.chalmers.se/agda/ReferenceManual/Declarations

https://wiki.portal.chalmers.se/agda/ReferenceManual/Data

https://agda.readthedocs.io/en/latest/language/data-types.html

https://agda.github.io/agda-stdlib/Data.Nat.Base.html

https://www.cs.swan.ac.uk/~csetzer/software/agda2/linksAgda.html
