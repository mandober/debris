# TS :: Types :: Type systems primer :: Type system

- type system
- term
- type (data type, datatype)
- syntactic entity
- language items
  - expression
  - value
  - literal
  - constant
  - variable
  - function
  - statement
  - declaration


>A **type system** is a formal system in which every *term* has a property called *type* which defines the term's meaning and operations it supports.

**Terms** of a programming language are various *language items*. A type system dictates the operations that can be performed on a given term. Thus, in the narrower sense, terms are usually taken to be *values*, *variables* and other kinds of *language expressions*.

**Language items** are language entities like values, variables, expressions, functions, objects, modules, namespaces, conditionals, etc. In fact, probably everything that is named in a program may be a language item. *Syntactic entities* in a language are a subset of language entities - this is only to acknowedge the possibility of some non-syntactical language entities. It is hard to enumerate even the well-known *language items* common to many mainstream languages, especially when the phrase lacks a standard meaning; language items and syntactic entities share this vagueness.

**Expression** is a *syntactic entity* in a programming language that is meant to evaluated, possibly all the way down to a *value*. Expressions are the primary means of expressing the programmers intent and some languages only have expressions as the building blocks, possibly with a few *special forms* that include, e.g. *declarations*, used to define functions and other data structures, so they may not be intended for evaluation. These special forms can be called *statements*, and, in general, any language item which is not intended for evaluation so it doesn't return a value could be called a statement. Statements are usually associated with *imperative, side-effecting actions and commands*. In a static type system every expression must be annotated with a type, either manually by the programmer, or automatically inferred by a type system. *Expressions* (which include literals, constants, values, variables, functions, etc.), or sometimes *terms*, are usually considered as the primary carriers of types.
