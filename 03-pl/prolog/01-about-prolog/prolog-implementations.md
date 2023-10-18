# Prolog :: Prolog implementations

https://en.wikipedia.org/wiki/Comparison_of_Prolog_implementations

There are Prolog implementations that are radically different, with different syntax and different semantics (e.g. Visual Prolog) and sub-communities have developed around different implementations.

Code that strictly conforms to the **ISO-Prolog core language** is portable across ISO-compliant implementations. However, the ISO standard for modules was never accepted by most Prolog implementors.

Factors that can adversely affect portability include:
- use of bounded vs. unbounded integer arithmetic
- additional types such as string objects
- advanced numeric types (rationals, complex)
- feature extensions such as Unicode, threads, and tabling
- use of libraries unavailable in other implementations
- organisation of libraries

Currently, the way predicates are spread over the libraries and system built-ins differs enormously. Fortunately, there are only few cases where we find predicates with the same name but different semantics (e.g. `delete/3`).
