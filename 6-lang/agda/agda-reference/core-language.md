# Core language

https://agda.readthedocs.io/en/v2.6.2.2/language/core-language.html

A program in Agda consists of a set of declarations written in an agda file. A *declaration* introduces a new *identifier* and specifies its *type* and the *definition*.

Declarations
- pragmas and program options
- modules
- fixity
- datatypes
- record types (incl. coinductive records)
- function definitions (incl. mixfix operators, abstract definitions)
- local definitions with `let` and `where`
- postulates
- variables
- pattern-synonyms

Declarations have a *signature part* and a *definition part*, which can be given separately in the code.

- declarations
  - declaration introduces new
    - identifier and specifies its
      - type
      - definition
  - declaration has
    - signature part
    - definition part
  - floating signature
  - forward reference
  - mutual recursion
    - mutually recursive functions
    - mutually recursive datatypes
      - separated signatures of datatypes


*Names* must be declared before they are used, but by separating the signature from the definition, it is possible to use *mutual recursion*.

Defining *mutually recursive functions*, by separating their signatures from definitions is straightforward, however, defining *mutually recursive data types* has a few rules.

## Grammar

At its core, Agda is a *dependently typed lambda calculus*.

The grammar of terms where `a` represents a generic term is:

```hs ebnf
a := x                       -- variable
   | λ x → a                 -- lambda abstraction
   | f                       -- defined function
   | (x : a) → a             -- function space
   | F                       -- data/record type
   | c a                     -- data/record constructor
   | s                       -- sort Seti, Setω+i
```
