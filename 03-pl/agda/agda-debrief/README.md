# Agda Debrief

- data types classes
  - simple data type
  - parameterized data type
  - indexed data type
  - inductive data types
    - small inductive data types
    - large inductive data types
  - strict positivity
    - strictly positive data type
    - positive data type
    - negative data type

- data types: opposing pairs
  - GADT vs record syntax
  - parametrized vs indexed data types
  - small vs large data types
  - universe monomorphic vs universe polymorphic data types
  - dependent vs non-dependent data types
  - dependent vs non-dependent recursors
  - positive vs negative data types


- data types declarations
  - defined using GADT syntax (using `data`)
  - defined syntax the record syntax (only if 1 data ctor, free `η`-rule)
  - universe monomorphic, `τ : Type`
  - universe polymorphic, `τ : 𝓤`, `τ : {𝒿 : Level} → A → 𝓤 𝒿`
  - recursor (elimination constant)
    - dependent elimination rule
    - non-dependent elimination rule
