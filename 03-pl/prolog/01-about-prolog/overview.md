# Overview of Prolog

Prolog is a logic programming language with roots in FOL.

>In Prolog, program logic is expressed in terms of relations, represented as facts and rules, and a computation is initiated by running a query over these relations.

Prolog primarily employs the declarative paradigm, although it has imperative features as well.

Prolog is a high-level language and leveraging Prolog means describing the problem but not its solution - the compiler finds the solution.

Unfortunately the compiler is not very clever and searches the answer in the tree from left to right, depth first. This way of searching often causes infinite loops. Many of these loops are ridiculous like A=B if B=A, B=A if A=B and so on. Other loops are much more complicated. *Loop checking* is one of the cruicial issues.
