# Facets of Prolog

Prolog's facets:
- simple language
- declarative language
- logic programming language
- homoiconic language
- dynamic language
- versatile language

## Prolog is a simple language

It is easy to describe Prolog syntax in sufficient detail to start working with Prolog immediately. All data are represented by Prolog terms. There is a single language element, called a clause and it has form: `Head :- Body`. This means that if Body holds, then Head holds. The infix operator `(:-)/2` represents a flipped arrow (←). If `Head` always holds (`Head :- true`), then `:- Body` can be omitted.

This is enough to write useful Prolog programs. You may not believe this, so suck on this: all known computations can be described in terms of Prolog's clauses, making Prolog a Turing complete language.

One way to implement a Turing machine in Prolog is to describe the relation between different states of the machine (with clauses of the form "If the current state is S0 and the symbol under the tape head is T, and ... then the next state is S").

## Prolog is declarative

Prolog is a declarative language meaning we can just state what we want rather then how to compute it. We express the relations and constraints that hold for a solution and let Prolog find one (or more). The declarative nature often allows a concise and general specification.

For example, let us describe the relation between a list and its length, using integer arithmetic:

```
list_length([], 0).
list_length([_|Ls], N) :- N #> 0, N #= N0 + 1, list_length(Ls, N0).
```

We can read this declaratively:
- the length of the empty list, `[]`, is 0,
- if the length of the list `Ls` is `N0`, and `N` is `N0 + 1`, then the length of `[_|Ls]` is `N`,
- further, this only holds if `N` is greater than `0`.

When programming in Prolog, think in terms of relations between entities. The programs become very general with this approach.



In the above example, it is tempting to think and say "We are computing the length of a list". And yes, it is true: We can indeed use the above definition to compute the length of a list:

```
?- list_length([a,b,c], L).
   L = 3.
```

However, this imperative reading does not do justice to what we have actually implemented, because the definition also covers several additional usage patterns. For example, given a specific length, we can ask whether there are lists of that length:

```
?- list_length(Ls, 3).
   Ls = [_A,_B,_C]
;  false.
```

Using the most general query, we can even ask for all answers that Prolog finds in general:

```
?- list_length(Ls, L).
   Ls = [], L = 0
;  Ls = [_A], L = 1
;  Ls = [_A,_B], L = 2
;  Ls = [_A,_B,_C], L = 3
;  ...
```


We say that the relation is usable in different modes. Characteristically, Prolog reports all answers via backtracking.

The predicate length/2 is part of the Prologue for Prolog draft, and already available as a built-in predicate in almost all Prolog implementations with the above semantics.


## Prolog is for logic programming

In the category of declarative languages, we find functional programming languages and logic programming languages.

A function is a special case of a relation, and functional programming can be regarded as a restricted form of logic programming.

Prolog is firmly rooted in logic. A pure Prolog program consists of a set of Horn clauses. Its execution can be regarded as a special case of resolution. This connection to formal logic allows us to apply powerful declarative debugging techniques that are based on logical properties of the program.

Adding a *constraint* can at most reduce the set of solutions, and adding a *clause* can at most extend it. This property of pure Prolog programs is called **monotonicity**.


## Prolog is homoiconic

(from `ὁμοιος` "similar", `εικών` "image")

Prolog programs are also valid Prolog terms!

This has many great advantages as it is easy to write Prolog programs that analyze, transform and interpret other Prolog programs. You can use the builtin predicate `read/1` to read in a Prolog term, and thus also a Prolog clause.

There is a powerful mechanism to rewrite Prolog programs at compilation time, so that you can easily implement a DSL.

You may not believe this, because some goals, such as `list_length(Ls, N)`, look like Prolog terms, whereas other goals, such as `N #> 0`, not so much. The reason for this is that Prolog provides prefix, infix and postfix operators that let you write terms whichever way is more readable. The term `+(a,b)` can also be written `a + b`; the abstract syntax remains completely uniform, and you can read and process all terms independent of how they are written down.

You can dynamically define custom operators for specific use cases.

## Prolog is dynamic

Prolog programs can be easily created, called and modified at run time. This further increases the expressiveness of Prolog and lets you implement *higher-order predicates* which have other predicates as arguments. It also allows the implementation of very dynamic techniques like *adaptive parsing*.

The dynamic nature of Prolog also makes the language ideally suited for writing programs that are extensible by custom rules that users provide.

`Proloxy` and `Gerrit Code Review` are examples of this approach: you configure these programs by supplying rules that express your requirements in a very readable and flexible way.

You can define an interpreter for pure Prolog in two lines of Prolog code.

## Prolog is versatile

Prolog is an extremely versatile language. Its relational nature makes programs very flexible and general. This plays an important role in language processing and knowledge representation in databases.

Modern Prolog systems provide everything that is needed for solving simple logic puzzles to building huge applications, ranging from web hosting to verification and optimization tasks.

Prolog's versatility and power are rooted in implicit mechanisms that include search, unification, argument indexing and constraint propagation. You can use these mechanisms to your advantage, and delegate many tasks to the Prolog engine.
