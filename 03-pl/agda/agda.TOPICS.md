# Agda ∷ Topics

* Theoretical background
  - Set Theory
    - Set Theory paradoxes
    - Frege
    - Russell
      - Introduction of TT to prevent paradoxes
      - Stratified TT (sorts)
      - Ramafied TT (univeses)
  - Lambda Calculus
  - CHI
  - BHK interpretation
  - Constructivism in mathematics
  - Intutionistic logic

* Type theory
  * Type theories
    - MLTT
    - Intesional TT (Agda)
    - Extesional TT
    - Quantative TT (Idris)
    - observational type theory
  * Basic concepts in Type theory
    - proposition
    - predicate
    - property
    - relation
    - postulate
    - type
    - judgment
    - context
    * Notions of equality in TT
      - judgemental (definitional, computational) equality
      - propositional equality
      - identity type
      - equality type
      - observational equality
  * Type-theoretical concepts
    - propositions-as-types
    - proofs-as-programs
    - elaboration in type theory
    - uniqueness of proofs (UIP) HoTT incompatible
  * Practical concerns in programming languages based on TT
    - sort system
    - type erasure
    - Axiom K
    * Sort system in TT
      - universe
      - universe hierarchy
      - hierarchy of types
      - Type-in-Type


* Agda Sorts
  - universe
  - universe hierarchy
    - `Set₀ : Set₁`, `Set₁ : Set₂`, …
    - `Set` = `Set₀` = `Set0` = `Set 0` (if `Level` and `Nat` in Scope)
    - `Set` : `Set₁` : `Set₂` : … : `Setω`
    - `Prop` : `Prop₁` : `Prop₂` : … : `Propω`
  - level
  - universe polymorphism
    `∀ {l : Level} {A : Set l}` …
  - cumulative subtyping of universes
    - Set₀ : Set₁, Set₀ : Set₂, Set₀ : Set₃ (?)
    - `A : Setᵢ` -> `A : Setₖ`, for all `k` such that i <= k
    - `A : Set₀` -> `A : Set₁` -> `A : Set₂` -> …


* Agda Syntax
  - keywords
  - reserved words (in special contexts)
  - reserved-chars
  - identifier, name
    - name-part
    - underscores (mixfix args)
  - fixity
  - modules
  - declarations
  - definitions
  - expressions

* Agda Concepts
  - inductive types
  - coinductive types
  - patterns
    - dot patterns, inaccessible patterns
  - copatterns
  - erased types, `@0` or `@erased`
  - reflection
  - macro
  - syntactic equality
  - syntactic equality shortcut

* Agda as proof assistant
  - proof type
  - goal
  - hole
  - tactics

* Advanced concepts in Agda
  - HoTT in Agda
  - Cubical Agda, cubicaltt
  - fibrant type


* type constructors
  - type constructors
  - positive type constructors
  - negative type ctors (e.g. dependent product, coinductive types, universes)
    - dependent product
    - coinductive types
    - universes
