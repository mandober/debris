# Definite clause grammar

https://en.wikipedia.org/wiki/Definite_clause_grammar

As an example, an optimizing compiler with 3 optimization passes could be implemented as a relation between an initial program and its optimized form:

```prolog
program_optimized(Prog0, Prog) :-
    optimization_pass_1(Prog0, Prog1),
    optimization_pass_2(Prog1, Prog2),
    optimization_pass_3(Prog2, Prog).

% or equivalently using DCG notation
program_optimized --> optimization_pass_1, optimization_pass_2, optimization_pass_3.
```
