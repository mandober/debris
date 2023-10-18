# Agda :: Language reference :: Lexical Structure

https://agda.readthedocs.io/en/v2.6.2.1/language/lexical-structure.html

<!-- TOC -->

- [Tokens](#tokens)
- [Keywords and special symbols](#keywords-and-special-symbols)
    - [Keywords only in import directives](#keywords-only-in-import-directives)
  - [Names](#names)
    - [Examples](#examples)
  - [Literals](#literals)
    - [Integers](#integers)
    - [Floats](#floats)
    - [Characters](#characters)
    - [Strings](#strings)
  - [Holes](#holes)
  - [Comments](#comments)
  - [Pragmas](#pragmas)
- [Layout](#layout)
- [Literal Agda](#literal-agda)

<!-- /TOC -->


Agda code is written in UTF-8 encoded plain text files with suffix `.agda`. Most unicode characters can be used in identifiers and whitespace is important.

## Tokens

## Keywords and special symbols

Most non-whitespace unicode can be used as part of an Agda name, but there are two kinds of exceptions, keywords and special symbols.

Reserved words
- *special symbols*: `. ; { } ( ) @ "`
  Chars with special meaning that cannot appear in a name.
- *keywords*
  Reserved words that cannot appear as a name part, but can appear in a name together with other characters.


Keywords are reserved words that cannot appear in a *name part* by themselves (unless they are accompanyied by other characters).

* Reserved words
  * Characters
    - `:`
    - `=`
    - `->` and `→`
    - `|`
    - `∀`
    - `\` and `λ`
    - `?`
    - `..`
    - `...`
  - forall
  - Set
  - module
  - import
  - open
  - where (layout keyword)
  - do (layout keyword)
  - let (layout keyword)
  - in
  - with
  - rewrite
  - syntax
  - pattern
  * Fixity
    - infix
    - infixl
    - infixr
  * Data type declaration
    - data
    - inductive
    - coinductive
    - record
    - overlap
    - instance (layout keyword)
    - field (layout keyword)
    - constructor (layout keyword)
  * Block
    - mutual (layout keyword)
    - abstract (layout keyword)
    - postulate (layout keyword)
    - private (layout keyword)
    - primitive (layout keyword)
    - variable (layout keyword)
    - macro (layout keyword)
  * Rare
    - interleaved
    - tactic
    - eta-equality
    - no-eta-equality
  * Quotes
    - quote
    - unquote
    - quoteTerm
    - unquoteDecl
    - unquoteDef


The `Set` keyword can appear with a natural number suffix, optionally subscripted. For instance `Set42` and `Set₄₂` are both keywords.


#### Keywords only in import directives

The following words are only reserved in import directives, in connection with _import_ or _open_:

* Import directive keywords
  - `public`
  - `using`
  - `hiding`
  - `renaming`
  - `to`


### Names

A *qualified name* is a non-empty sequence of names separated by dots (.). A name is an alternating sequence of name parts and underscores (_), containing at least one name part. A name part is a non-empty sequence of unicode characters, excluding whitespace, _, and special symbols. A name part cannot be one of the keywords above, and cannot start with a single quote, ' (which are used for character literals, see Literals below).

#### Examples

Valid: data?, ::, if_then_else_, 0b, _⊢_∈_, x=y
Invalid: data_?, foo__bar, _, a;b, [_.._]
The underscores in a name indicate where the arguments go when the name is used as an operator. For instance, the application _+_ 1 2 can be written as 1 + 2. See Mixfix Operators for more information. Since most sequences of characters are valid names, whitespace is more important than in other languages. In the example above the whitespace around + is required, since 1+2 is a valid name.

Qualified names are used to refer to entities defined in other modules. For instance Prelude.Bool.true refers to the name true defined in the module Prelude.Bool. See Module System for more information.

### Literals

There are four types of literal values: integers, floats, characters, and strings. See Built-ins for the corresponding types, and Literal Overloading for how to support literals for user-defined types.

#### Integers

Integer values in decimal, hexadecimal (prefixed by 0x), or binary (prefixed by 0b) notation. The character _ can be used to separate groups of digits. Non-negative numbers map by default to built-in natural numbers, but can be overloaded. Negative numbers have no default interpretation and can only be used through overloading.

Examples: 123, 0xF0F080, -42, -0xF, 0b11001001, 1_000_000_000, 0b01001000_01001001.

#### Floats

Floating point numbers in the standard notation (with square brackets denoting optional parts):

```
float    ::= [-] decimal . decimal [exponent]
           | [-] decimal exponent
exponent ::= (e | E) [+ | -] decimal
```

These map to built-in floats and cannot be overloaded.

Examples: 1.0, -5.0e+12, 1.01e-16, 4.2E9, 50e3.


#### Characters


#### Strings




### Holes

Holes are an integral part of the interactive development supported by the Emacs mode. Any text enclosed in `{!` and `!}` is a hole and may contain nested holes.

A hole with no contents can be written `?` and upon C-l it will be turned into a proper hole.

There are a number of Emacs commands that operate only inside a hole.

The type checker ignores the contents of a hole and treats it as an unknown, see [Implicit Arguments](./implicit-arguments.md).

Example:

```hs
… = {! f {!x!} 5 !}


+comm : ∀ (n m : Nat) → n + m ≡ m + n
+comm n m = ?
-- becomes, after case-spillting on n
+comm : ∀ (n m : Nat) → n + m ≡ m + n
+comm      0  m = {!   0!}
+comm (suc n) m = {!   1!}
--                     ^ hole indices
```


### Comments

Single-line comments are written with a double dash, `--`, followed by arbitrary text. Use space to terminate the comment, e.g. `-- ` because `--#` is not a comment but a possible operator.

Multi-line comments are enclosed in `{-` and `-}` and can be nested.

Comments cannot appear in string literals.

Example:

```hs
{- Here is a {- nested -}
   comment -}
s : String --line comment {-
s = "{- not a comment -}"
```


### Pragmas

Pragmas are special comments enclosed in `{-#` and `#-}` that have special meaning to the system. See [Pragmas](../index/index-pragmas.md) for a full list of pragmas.

## Layout

Agda is layout sensitive using similar rules as Haskell, with the exception that **layout is mandatory**: you cannot use explicit `{`, `}` and `;` to avoid it.

A layout block contains a sequence of statements and is started by one of the layout keywords:

* Layout keywords
  - abstract
  - constructor
  - do
  - field
  - instance
  - let
  - macro
  - mutual
  - postulate
  - primitive
  - private
  - variable
  - where


The first token after the layout keyword decides the indentation of the block.

Any token indented more than this is part of the previous statement, a token at the same level starts a new statement, and a token indented less lies outside the block.

```hs
data Nat : Set where -- starts a layout block
    -- comments are not tokens
  zero : Nat      -- statement 1
  suc  : Nat →    -- statement 2
         Nat      -- also statement 2

one : Nat -- outside the layout block
one = suc zero
```

Note that the indentation of the layout keyword does not matter.

If several layout blocks are started by layout keywords without line break in between (where line breaks inside block comments don't count), then those blocks indented more than the last block, become *passive blocks*, meaning they cannot be further extended by new statements:

```hs
private module M where postulate
          A : Set                 -- module-block goes passive
          B : Set                 -- postulate-block can still be extended
        module N where            -- private-block can still be extended
```


An Agda file contains one top-level layout block, with the special rule that the contents of the top-level module need not be indented.

```hs
module Example where
NotIndented : Set₁
NotIndented = Set
```


## Literal Agda

Agda supports literate programming with multiple typesetting tools like LaTeX, Markdown and reStructuredText.

For instance, with LaTeX, everything in a file is a comment and the code is enclosed between `\begin{code}` and `\end{code}`.

Literate Agda files have special file extensions:
- `.lagda` and `.lagda.tex` for LaTeX
- `.lagda.md` for Markdown
- `.lagda.rst` for reStructuredText

The main use case for literate Agda is to generate LaTeX documents from Agda code (see: Generating HTML and Generating LaTeX).

```lhs
\documentclass{article}
% some preamble stuff

\begin{document}
  Introduction usually goes here

  \begin{code}
    module MyPaper where
      open import Prelude
      five : Nat
      five = 2 + 3
  \end{code}

  Now, conclusions!

\end{document}
```
