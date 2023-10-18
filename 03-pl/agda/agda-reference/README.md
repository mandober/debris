# Agda Language Reference

## Agda user manuals

agda-manual-url-format:
  `https://agda.readthedocs.io/en/$TAG/language/`

agda-pdf-download-format:
  `https://agda.readthedocs.io/_/downloads/en/$TAG/pdf/`

All TAG:
  - nightly
  - (the tag v2.6.4 appears here and there but still not a valid tag)
  - latest
  - v2.6.3
  - v2.6.2.2 v2.6.2.1 v2.6.2
  - v2.6.1.3 v2.6.1.2 v2.6.1.1 v2.6.1
  - v2.6.0.1 v2.6.0
  - v2.5.4.2 v2.5.4.1 v2.5.4
  - v2.5.3 v2.5.2


agda-latest
https://agda.readthedocs.io/en/latest/language/

agda-nightly
https://agda.readthedocs.io/en/nightly/language/

agda-2.6.3
https://agda.readthedocs.io/en/v2.6.3/language/

agda-2.6.2.1
https://agda.readthedocs.io/en/v2.6.2.1/language/

agda @readthedocs
- Overview:   https://readthedocs.org/projects/agda/
- Downloads:  https://readthedocs.org/projects/agda/downloads/
- Search:     https://readthedocs.org/search/?q=project:agda
- Builds:     https://readthedocs.org/projects/agda/builds/
- Versions:   https://readthedocs.org/projects/agda/versions/



### Downloaded PDF manuals

agda-latest
- name: Agda 2.6.4 Manual 31-03-2023.pdf
- file: agda-2.6.4-manual-31-03-2023.pdf
- tag: `latest` (but inner cover says v2.6.4, released: 31-03-2023)
- released: 31-03-2023 (writen on inner cover)
- pages: **290**
- HTML manual:  https://agda.readthedocs.io/en/latest/language/
- download URL: https://agda.readthedocs.io/_/downloads/en/latest/pdf/

agda-2.6.3
- file: Agda 2.6.3 Manual 30-01-2023.pdf
- tag: `v2.6.3`
- released: 30-01-2023
- pages: **288**
- HTML manual:  https://agda.readthedocs.io/en/v2.6.3/language/
- download URL: https://agda.readthedocs.io/_/downloads/en/v2.6.3/pdf/

agda-nightly
- file: Agda 2.6.x Manual nightly.pdf
- tag: `nightly` (but inner cover says v2.6.3, released 31-08-2020)
- released: 31-08-2020 (writen on inner cover)
- pages: **274**
- HTML manual:  https://agda.readthedocs.io/en/nightly/language/
- download URL: https://agda.readthedocs.io/_/downloads/en/nightly/pdf/



### Language reference :: Builtins :: URLs

agda-nightly
https://agda.readthedocs.io/en/nightly/language/built-ins.html

agda-latest
https://agda.readthedocs.io/en/latest/language/built-ins.html

agda-2.6.3
https://agda.readthedocs.io/en/v2.6.3/language/built-ins.html

agda-2.6.2.1
https://agda.readthedocs.io/en/v2.6.2.1/language/built-ins.html

agda-manual @github
https://github.com/agda/agda/blob/master/doc/user-manual/language/built-ins.lagda.rst


## Agda language reference

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
