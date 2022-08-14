# Agda Language Reference

https://agda.readthedocs.io/en/latest/language/index.html

* Agda language reference
  * [Abstract definitions](./abstract-definitions.md)
    - Scope of abstraction
    - Abstract definitions with `where` blocks
  * [Built-ins](./builtins.md)
    - Using the built-in types
    - The unit type
    - The Σ-type
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
    - Literal overloading
    - Reflection
    - Rewriting
    - Static values
    - Strictness
  * [Coinduction](./coinduction.md)
    - Coinductive Records
    - Old Coinduction
  * [Copatterns](./copatterns.md)
    - Copatterns in function definitions
    - Mixing patterns and co-patterns
  * [Core language](./core-language.md)
    - Grammar
    - Syntax overview
    - Lexer
    - Parser
    - Concrete Syntax
    - Nice Concrete Syntax
    - Abstract Syntax
    - Internal Syntax
    - Treeless Syntax
  * [Coverage checking](./coverage-checking.md)
    - Single match on a non-indexed datatype
    - Matching on multiple arguments
    - Copattern matching
    - Matching on indexed datatypes
    - General case
  * [Cumulativity](./cumulativity.md)
    - Basics
    - Example usage: N-ary functions
    - Limitations
    - Constraint solving
  * [Data types](./data-types.md)
    - [Simple datatype](./simple-datatype.md)
    - [Parametrized datatype](./parametrized-datatype.md)
    - [Indexed datatype](./indexed-datatype.md)
    - [Parametrized vs indexed datatype](./parametrized-vs-indexed-datatype.md)
    - [Strict positivity](./strict-positivity.md)
    - [Variance](./variance.md)
  * [Flat modality](./flat-modality.md)
    - Pattern Matching on `@♭`
  * [Foreign Function Interface](./ffi.md)
    - Compiler Pragmas
    - Haskell FFI
    - JavaScript FFI
  * [Function definitions](./function-definitions.md)
    - Introduction
    - General form
    - Special patterns
    - Case trees
  * [Function types](./function-types.md)
    - Notational conventions
  * [Generalization of declared variables](./variable-generalization.md)
    - Overview
    - Nested generalization
    - Placement of generalized bindings
    - Instance and irrelevant variables
    - Importing and exporting variables
    - Interaction
    - Modalities
  * [Instance arguments](./instance-arguments.md)
    - Tactic arguments
    - Metavariables
    - Unification
    - Usage
    - Instance resolution
  * [Irrelevance](./irrelevance.md)
    - Motivating example
    - Irrelevant function types
    - Irrelevant declarations
    - Irrelevant record fields
    - Dependent irrelevant function types
    - Irrelevant instance arguments
  * [Lambda abstraction](./lambda-abstraction.md)
    - Pattern matching lambda
  * [Local definitions: let and where](./local-definitions.md)
    - let-expressions
    - where-blocks
    - Proving properties
    - More Examples (for Beginners)
  * [Lexical structure](./lexical-structure.md)
    - Tokens
    - Layout
    - Literate Agda
  * [Literal overloading](./literal-overloading.md)
    - Natural numbers
    - Negative numbers
    - Strings
    - Restrictions
  * [Lossy unification](./lossy-unification.md)
    - Heuristic
    - Example
    - Drawbacks
  * [Mixfix operators](./mixfix-operators.md)
    - Precedence
    - Associativity
    - Ambiguity and Scope
    - Operators in telescopes
  * [Module system](./module-system.md)
    - Module application
    - Anonymous modules
    - Basics
    - Private definitions
    - Name modifiers
    - Re-exporting names
    - Parameterised modules
    - Splitting a program over multiple files
    - Datatype modules and record modules
  * [Mutual recursion](./mutual-recursion.md)
    - Interleaved mutual blocks
    - Forward declaration
    - Old-style mutual blocks
  * [Pattern synonyms](./pattern-synonyms.md)
    - Overloading
    - Refolding
  * [Positivity checking](./positivity-checking.md)
    - The `NO_POSITIVITY_CHECK` pragma
    - The `POLARITY` pragmas
  * [Postulates](./postulates.md)
    - Postulated built-ins
  * [Pragmas](./pragmas.md)
    - Index of pragmas
  * [Prop](./prop.md)
    - Usage
    - The predicative hierarchy of Prop
    - The propositional squash type
    - Limitations
  * [Record types](./record-types.md)
    - Example: the Pair type constructor
    - Declaring, constructing and decomposing records
    - Record modules
    - Eta-expansion
    - Recursive records
    - Instance fields
  * [Reflection](./reflection.md)
    - Builtin types
    - Metaprogramming
  * [Rewriting](./rewriting.md)
    - Rewrite rules by example
    - General shape of rewrite rules
    - Confluence checking
    - Advanced usage
  * [Run-time irrelevance](./run-time-irrelevance.md)
    - Syntax
    - Rules
    - References
  * [Safe Agda](./safe-agda.md)
  * [Sized types](./sized-types.md)
    - Example for coinduction: finite languages
    - References
  * [Sort System](./sort-system.md)
    - Introduction to universes
    - Agda's sort system
    - Sort metavariables and unknown sorts
  * [Syntactic sugar](./syntactic-sugar.md)
    - Do-notation
    - Idiom brackets
  * [Syntax declarations](./syntax-declarations.md)
  * [Telescopes](./telescopes.md)
    - Irrefutable Patterns in Binding Positions
  * [Termination checking](./termination-checking.md)
    - Primitive recursion
    - Structural recursion
    - With-functions
    - Pragmas and Options
    - References
  * [Type checking](./type-checking.md)
  * [Universe Levels](./universe-levels.md)
    - Level arithmetic
    - Intrinsic level properties
    - `forall` notation
    - Expressions of sort `Setω`
    - Pragmas and options
  * [With-abstraction](./with-abstraction.md)
    - Usage
    - Technical details
  * [Without K](./without-k.md)


## Cubical Agda

* [Cubical](./cubical.md)
  - The interval and path types
  - Transport
  - Partial elements
  - Homogeneous composition
  - Glue types
  - Higher inductive types
  - Cubical identity types and computational HoTT/UF
  - Cubical Agda with erased glue
  - References
  - Appendix: Cubical Agda primitives
* [Cubical compatible](./cubical-compatible.md)
  - Restrictions on pattern matching
  - Restrictions on termination checking
  - Restrictions on universe levels
* [Guarded Cubical](./guarded-cubical.md)
  - References
