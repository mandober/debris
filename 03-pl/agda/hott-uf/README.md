# HoTT/UF

Introduction to Homotopy Type Theory and Univalent Foundations (HoTT/UF)   
with Agda

by Martín Escardó
https://www.cs.bham.ac.uk/~mhe/

March 2019, version of Sep 2022

https://www.cs.bham.ac.uk/~mhe/HoTT-UF-in-Agda-Lecture-Notes/HoTT-UF-Agda.html

## Table of contents

- 1. Introduction to HoTT/UF
  - Introduction
  - Homotopy type theory
  - General references
  - Choice of material
- 2. MLTT in Agda
  - A spartan Martin-Löf type theory (MLTT)
  - What is Agda?
  - Getting started with Agda
  - Type universes 𝓤,𝓥,𝓦
  - The one-element type 𝟙
  - The empty type 𝟘
  - The type ℕ of natural numbers
  - The binary sum type constructor _+_
  - Σ types
  - Π types
  - The identity type former Id, also written _＝_
  - Basic constructions with the identity type
  - Reasoning with negation
  - Example: formulation of the twin-prime conjecture
  - Remaining Peano axioms and basic arithmetic
- 3. Univalent Mathematics in Agda
  - Our univalent type theory
  - Singletons, subsingletons and sets
    - Singleton (or contractible) types
    - Subsingletons (or propositions or truth values)
    - Sets (or 0-groupoids)
  - Univalent excluded middle
  - The types of magmas and monoids
  - The identity type in univalent mathematics
  - Identifications that depend on identifications
  - Equality in Σ types
  - Voevodsky's notion of hlevel
    - Hedberg's Theorem
    - A characterization of sets
    - Subsingletons are sets
    - The types of hlevel 1 are the subsingletons
    - The types of hlevel 2 are the sets
    - The hlevels are upper closed
  - ℕ and 𝟚 are sets
  - Retracts
  - Voevodsky's notion of type equivalence
  - Voevodsky's univalence axiom
  - Example of a type that is not a set under univalence
  - Exercises
    - Formulations
    - Solutions
  - A characterization of univalence
  - Equivalence induction
  - Half adjoint equivalences
  - Function extensionality from univalence
  - Variations of function extensionality and their logical equivalence
  - Universes are map classifiers
  - The univalence axiom is a (sub)singleton type
  - Unique existence in univalent mathematics
  - Universal property of the natural numbers
  - More consequences of function extensionality
  - Propositional extensionality
    - The propositional extensionality axiom
    - Propositional extensionality and the powerset
    - A characterization of propositional univalence
  - Some constructions with types of equivalences
  - Type embeddings
  - The Yoneda Lemma for types
  - What is a function?
  - Partial functions
  - Universe lifting
  - The subtype classifier and other classifiers
  - Magma equivalences
  - Equality of mathematical structures
    - A structure identity principle for a standard notion of structure
    - ∞-Magmas
    - Adding axioms
    - Magmas
    - Pointed types
    - Combining two mathematical structures
    - Pointed ∞-magmas
    - Monoids
    - Associative ∞-magmas
    - Groups
    - The slice type
    - Subgroups
    - Rings
    - Metric spaces, graphs and ordered structures
    - Topological spaces
    - Selection spaces
    - A contrived example
    - Functor algebras
    - Type-valued preorders
    - Categories
  - Subsingleton truncation
    - Voevodsky's approach to subsingleton truncation
    - An axiomatic approach
    - Disjunction and existence
    - Images and surjections
    - A characterization of equivalences
    - Exiting truncations
    - Equality of Noetherian local rings
  - Choice in univalent mathematics
    - Unique choice
    - Univalent choice
    - A second formulation of univalent choice
    - A third formulation of univalent choice
    - Univalent choice gives excluded middle
    - Global choice
  - Propositional resizing, truncation and the powerset
    - Propositional resizing
    - Excluded middle gives propositional resizing
    - The propositional resizing axiom is a subsingleton
    - Propositional impredicativity
    - Propositional resizing gives subsingleton truncation
    - The powerset in the presence of propositional resizing
    - Topological spaces in the presence of propositional resizing
  - Quotients
  - Summary of consistent axioms for univalent mathematics
- 4. Appendix
  - Solutions to some exercises
  - Additional exercises
  - Solutions to additional exercises
  - Operator fixities and precedences
  - Agda files automatically extracted from these notes
  - The sources for these notes


## Abstract

We introduce Voevodsky's univalent foundations and univalent mathematics, and explain how to develop them with the computer system Agda, which is based on Martin-Löf type theory. Agda allows us to write mathematical definitions, constructions, theorems and proofs, for example in number theory, analysis, group theory, topology, category theory or programming language theory, checking them for logical and mathematical correctness.

Agda is a constructive mathematical system by default, which amounts to saying that it can also be considered as a programming language for manipulating mathematical objects. But we can assume the axiom of choice or the principle of excluded middle for pieces of mathematics that require them, at the cost of losing the implicit programming-language character of the system. For a fully constructive development of univalent mathematics in Agda, we would need to use its new cubical flavour, and we hope these notes provide a base for researchers interested in learning cubical type theory and cubical Agda as the next step.

Compared to most expositions of the subject, we work with explicit universe levels.

We also fully discuss and emphasize that non-constructive classical axioms can be assumed consistently in univalent mathematics.

https://www.math.ias.edu/Voevodsky/
https://www.ams.org/journals/bull/2018-55-04/S0273-0979-2018-01616-9/
https://github.com/UniMath/UniMath/blob/master/README.md
https://wiki.portal.chalmers.se/agda/pmwiki.php
https://github.com/michaelt/martin-lof
https://homotopytypetheory.org/2018/12/06/cubical-agda/


## Keywords

- Univalent mathematics
- Univalent foundations
- Univalent type theory
- Univalence axiom
- ∞-Groupoid
- Homotopy type
- Type theory
- Homotopy type theory
- HoTT/UF
- Intensional Martin-Löf type theory
- Dependent type theory
- Identity type
- Type universe
- Constructive mathematics
- Agda
- Cubical type theory
- Cubical Agda
- Computer-verified mathematics


## About this document

This is a literate Agda file, with the formal, verified, mathematical development within code environments, and the usual mathematical discussion outside them. Most of this file is not Agda code, and is in markdown format, and the HTML web page is generated automatically from it using Agda and other tools.

Github issues or pull requests
https://github.com/martinescardo/HoTT-UF-Agda-Lecture-Notes

There is also a PDF version with internal links to sections and Agda definitions, which is automatically generated from the HTML version.
https://www.cs.bham.ac.uk/~mhe/HoTT-UF-in-Agda-Lecture-Notes/HoTT-UF-Agda.pdf

A PDF version is also available at the arxiv, updated from time to time
https://arxiv.org/abs/1911.00580

These notes were originally developed for the Midlands Graduate School 2019
http://events.cs.bham.ac.uk/mgs2019/

They will evolve for a while.
