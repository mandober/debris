# Idris

Idris is a programming language designed to encourage Type-Driven Development (TDD). In type-driven development, types are tools for constructing programs. We treat the type as the plan for a program, and use the compiler and type checker as our assistant, guiding us to a complete program that satisfies the type. The more expressive the type is that we give up front, the more confidence we can have that the resulting program will be correct.

In Idris, types are first-class constructs in the langauge. This means types can be passed as arguments to functions, and returned from functions just like ordinary values. This is a small but powerful idea, enabling:
- relations to be expressed between values; e.g. two lists have the same length
- assumptions to be made explicit and checked by the compiler. For example, if you assume that a list is non-empty, Idris can ensure this assumption always holds before the program is run
- properties of program behaviour to be formally stated and proven

* Idris was initially written in Haskell and may still be installed as a Cabal package (if GHC intsalled).
* Idris 2 is based on *Quantitative Type Theory* (QTT)
