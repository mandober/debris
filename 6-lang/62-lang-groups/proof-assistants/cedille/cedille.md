# Cedille

- Cedille 1.1.2 (2019-12-14)
- https://cedille.github.io/
- https://github.com/cedille/cedille

`Cedille` is an interactive theorem-prover and dependently typed programming language, based on extrinsic (aka Curry-style) type theory. This makes it rather different from type theories like `Coq` and `Agda`, which are intrinsic (aka Church-style).

In Cedille, terms are nothing more than annotated versions of terms of pure untyped lambda calculus. In contrast, in Coq or Agda, the typing annotations are intrinsic parts of terms. The typing annotations can only be erased as an optimization under certain conditions, not by virtue of the definition of the type theory.

Cedille's type theory allows one to derive inductive datatypes, together with their induction principles. These derivations are done via lambda-encodings, including not just the familiar Church encoding (with its well-known limitation to inefficient accessors), but also more efficient Parigot and Mendler encodings. Further, Cedille supports datatype declarations and pattern-matching recursion via elaboration to certain of these encodings.

Cedille is used from an emacs mode, which communicates with the backend tool. The emacs mode supports convenient navigation of the source text following the structure of its syntax tree. Typing and context information is available for all subexpressions as one navigates, as well as information related to type inference.

Cedille implements a novel form of local type inference called *spine-local type inference*. At the moment this is restricted to solving for first-order type variables, but soon we plan to add support for inferring values for term variables as well as dependent and higher-order type variables.
