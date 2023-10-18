# Agda :: Index :: Agda features

- modules
  - parametrized modules
  - granular importing
  - renaming of imported entities
  - record types
    - dependent record type
    - coinductive record
  - private blocks
- data types
  - primitive data types
  - built-in data types
  - simple data type (non-indexed data type)
  - parametrized data type (simple?)
  - indexed data type, indexed type family
  - abstract data type
  - inductive data type
  - coinductive data type
  - literal overloading
  - static values
  - empty type
  - unit type
  - Σ-type
  - Π-type
  - W-type
  - sized types
  - dependent types
    - dependent type, `a : A ⊢ B(a)`
      - `B : A → Set`
      - `B : A → 𝓤`
    - dependent sums (sigma types)
      - `Σ (a:A) B(a)` (TT notation)
      - Σ {a : A} B 
      - `Σ a : A ⦂ b` (sugared notation)
    - dependent products (pi types)
  - Sorts
    - Sort types
    - Universe types
    - Universe levels
    - level types



- functions
  - dependent functions
  - implicit arguments
  - instance arguments

- pattern matching
  - pattern matching lambda
  - dependent pattern matching
    - pattern matching on intermediate results using `with` construct
  - dot patterns
  - absurd pattern
  - copatterns
    - copatterns in function definitions
    - mixing patterns and copatterns



  - coinduction
  - IO
  - reflection
  - rewriting
  - strictness
