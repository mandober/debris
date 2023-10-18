# Preface

The study of type systems, and of programming languages from a typetheoretic perspective, has become an energetic field with major applications in software engineering, language design, high-performance compiler implementation, and security. This text offers a comprehensive introduction to the fundamental definitions, results, and techniques in the area.

A primary aim is coverage of core topics, including
- basic operational semantics and associated proof techniques
- the untyped lambda-calculus
- simple type systems
- universal and existential polymorphism
- type reconstruction
- subtyping
- bounded quantification
- recursive types
- type operators
- and more...

A second main goal is pragmatism. The book concentrates on the use of type systems in programming languages, at the expense of some topics (such as denotational semantics) that probably would be included in a more mathematical text on typed lambda-calculi.

The underlying computational substrate is a *call-by-value lambda-calculus*, which matches most present-day programming languages and extends easily to imperative constructs such as references and exceptions. For each language feature, the main concerns are the *practical motivations* for considering this feature, the techniques needed to prove *safety* of languages that include it, and the *implementation issues* that it raises - in particular, the design and analysis of *typechecking* algorithms.

A further goal is respect for the diversity of the field; the book covers numerous individual topics and several well-understood combinations but does not attempt to bring everything together into a single unified system.

Unified presentations have been given for some subsets of the topics - for example, many varieties of *arrow types* can be elegantly and compactly treated in the uniform notation of *pure type systems* - but the field as a whole is still growing too rapidly to be fully systematized.

All the systems discussed in the book are implemented. Each chapter is accompanied by a typechecker and interpreter that are used to check the examples mechanically.

The focus here is on *careful development of core concepts*; numerous pointers to the research literature are supplied as starting points for further study. A second non-goal is the practical efficiency of the typechecking algorithms: it is not a book on industrial-strength compiler or typechecker implementation.

## Book structure

Part I of the book discusses *untyped systems*. Basic concepts of abstract syntax, inductive definitions and proofs, inference rules, and operational semantics are introduced first in the setting of a very simple language of numbers and booleans, then repeated for the untyped lambda-calculus.

Part II covers the *simply typed lambda-calculus* and a variety of basic language features such as products, sums, records, variants, references, and exceptions.

A preliminary chapter on typed arithmetic expressions provides a gentle introduction to the key idea of *type safety*.

An optional chapter develops a proof of normalization for the simply typed lambda-calculus using `Tait's method`.

Part III addresses the fundamental mechanism of *subtyping*; it includes a detailed discussion of metatheory and two extended case studies.

Part IV covers *recursive types*, in both the simple *iso-recursive* and the trickier *equi-recursive* formulations.

The second of the two chapters in this part develops the metatheory of a system with equi-recursive types and subtyping in the mathematical framework of *coinduction*.

Part V takes up *polymorphism*, with chapters on ML-style type reconstruction, the more powerful impredicative polymorphism of `System F`, existential quantification and its connections with abstract data types, and the combination of polymorphism and subtyping in systems with bounded quantification.

Part VI deals with *type operators*. One chapter covers basic concepts; the next develops `System Fω` and its metatheory; the next combines type operators and bounded quantification to yield `System Fω <:`. The final chapter is a closing case study.


The treatment of each language feature discussed in the book follows a common pattern. Motivating examples are first; then formal definitions; then proofs of basic properties such as type safety; then (usually in a separate chapter) a deeper investigation of metatheory, leading to typechecking algorithms and their proofs of soundness, completeness, and termination; and finally (again in a separate chapter) the concrete realization of these algorithms as an OCaml program.

An important source of examples throughout the book is the analysis and design of features for object-oriented programming. case-study chapters develop different approaches in detail - a simple model of conventional imperative objects and classes (Chapter 18), a core calculus based on Java (Chapter 19), a more refined account of imperative objects using bounded quantification (Chapter 27), and a treatment of objects and classes in the purely functional setting of `System Fω <:`, using existential types (Chapter 32).

However, **denotational and axiomatic approaches to semantics are omitted** completely; there are already excellent books covering these approaches, and addressing them here would detract from this book's strongly pragmatic, implementation-oriented perspective. The rich connections between type systems and logic are suggested in a few places but not developed in detail.

## Required Background

Readers should be familiar with at least one higher-order FPL, and with basic concepts of programming languages and compilers (abstract syntax, BNF grammars, evaluation, abstract machines, etc.). This material is available in many excellent undergraduate texts; I particularly like:

- `Essentials of Programming Languages`, 2001, Friedman, Wand, and Haynes
- `Programming Language Pragmatics`, 1999 by Scott
