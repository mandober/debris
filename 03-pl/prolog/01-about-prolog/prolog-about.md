# About Prolog

https://en.wikipedia.org/wiki/Prolog

## Introduction

Prolog is a logic programming language that has its roots in FOL. 
Prolog primarily employs the declarative paradigm.

>Program logic is expressed in terms of relations, represented as facts and rules, and a computation is initiated by running a query over these relations.

The language was developed and implemented in 1972, in France, by Alain Colmerauer with Philippe Roussel, based on Robert Kowalski's procedural interpretation of *Horn clauses*.

Prolog was one of the first logic programming languages and remains the most popular such language today, with several free and commercial implementations available.

The language has been used for theorem proving, expert systems, term rewriting, type systems, and automated planning, as well as its original intended field of use, natural language processing. Modern Prolog environments support the creation of WebApps, GUIs, admin and networked apps. Prolog is esp. well-suited for specific tasks that benefit from rule-based logical queries such as searching databases, voice control systems, and filling templates.

## Syntax and semantics

- program logic is expressed in terms of *relations*
- computation is initiated by running a *query* over these relations
- relations and queries are constructed using *terms*
- relations are defined by *clauses*

Given a query, Prolog attempts to find a *resolution refutation of the negated query*. If the negated query can be refuted, i.e. an instantiation for all free variables is found that makes the union of clauses and the singleton set consisting of the negated query false, it follows that the original query, with the found instantiation applied, is a logical consequence of the program.

This makes Prolog (and other logic programming languages) particularly useful for database, symbolic mathematics, and language parsing applications.

Prolog allows some *impure predicates* that are only used for their side effects (e.g. printing a value), thereby allowing some amount of imperative programming when the logical paradigm is inconvenient. Prologs' purely logical subset is called *pure Prolog*.

## Data types

Prolog's single data type is the **term**:
- simple terms
  - constants
    - atoms
    - numbers
  - variables
- compound terms (structures)

An **atom** is a general-purpose name beginning with a lowercase without an inherent meaning. Examples of atoms include x, red, 'Taco', and 'some atom'.

**Numbers** can be floats or integers. ISO standard compatible Prolog systems can check the Prolog flag ~~bounded~~. Most of the major Prolog systems support arbitrary length integer numbers.

**Variables** are denoted by a string consisting of letters, numbers and underscore characters, and beginning with an upper-case letter or underscore. Variables closely resemble variables in logic in that they are placeholders for arbitrary terms.

**Compound term** is composed of an atom called a *functor* and a number of arguments, which are again terms. Compound terms are ordinarily written as a functor followed by a comma-separated list of argument terms in parentheses. The number of arguments is called a term's arity. An atom can be regarded as a nullary compound term. An example of a compound term is `p(z,[t,j])`.

Special cases of compound terms:
* **List** is an ordered collection of terms. It is denoted by square brackets with the terms separated by commas. The empty list is `[]`.
* **Strings** are sequences of characters surrounded by quotes and, depending on the value of the ~~double_quotes~~ flag, they are equivalent to either:
  - a list of (numeric) character codes
  - a list of characters (atoms of length 1)
  - an atom

ISO Prolog provides several predicates used to check the type of a term:
- `atom/1`
- `number/1`
- `integer/1`
- `float/1`

## Facts and rules

- Prolog programs describe relations, and relations are defined by clauses.
- Pure Prolog is restricted to *Horn clauses*.
- There are two types of clauses: facts and rules.
- A clause with an empty body is a fact.
- A clause with a non-empty body is a rule.


A **rule** is of the form `Head :- Body.`, 
read as: Head is true if Body is true.

`Head :- Body`  is actually a left arrow, i.e.
`Head <- Body`  is actually reversed implication, i.e.
`Body -> Head`  so: if Body (is true) then Head (is true)

Thus, Body stands for premises and Head is the conclusion.

A rule consists of calls to predicates, called the rule's *goals*

- the builtin logical operator `,/2` denotes conjunction of goals
- the builtin logical operator `;/2` denotes disjunction of goals
- conjunctions and disjunctions can only appear in body, not in head


## Facts

A clause with an empty body is called a **fact**. It actually has implicit body `true` which makes it a fact (proposition) since the builtin predicate `true/0` is always true.

```prolog
% example of a fact
cat(crookshanks).

% which is equivalent to this rule
cat(crookshanks) :- true.

% (the builtin predicate true/0 is always true)

% you can then ask whether a "crookshanks" is a cat
?- cat(crookshanks).
Yes

% you can also ask what things are cats
?- cat(X).
X = crookshanks
```


## Rules

A clause with a non-empty body is a **rule**.

```prolog
% an example of a rule is:
animal(X) :- cat(X).

% we can then ask what things are animals:
?- animal(X).
X = crookshanks
```

>Due to their relational nature, predicates can be used in several directions.

For example, `length/2` can be used to determine the length of a list, e.g. `length(List, L)`, as well as to generate a list skeleton of a given length `(length(X, 5))`, and also to generate both list skeletons and their lengths together `(length(X, L))`.

Similarly, `append/3` can be used both to append two lists, `append(ListA, ListB, X)`, but also to split a list into parts, `append(X, Y, List)`.

For this reason, a comparatively small set of library predicates suffices for many Prolog programs.

Being a general purpose language, Prolog also provides built-in predicates that lack relational meaning and are used only for their side-effect (e.g. `write/1` displays a term on the screen).


## Execution

Execution of a Prolog program is initiated when the user specifies a goal i.e. when they issue a query. Logically, the Prolog engine tries to find a *resolution refutation of the negated query*.

The resolution method used by Prolog is called **SLD resolution**.

If the negated query can be refuted, it follows that the query, with the appropriate variable bindings in place, is a logical consequence of the program. In that case, all generated variable bindings are reported to the user, and the query is said to have succeeded.

Operationally, Prolog's execution strategy can be thought of as a generalization of function calls in other languages, one difference being that multiple clause heads can match a given call.

In that case, the system creates a **choice-point**, unifies the goal with the clause head of the first alternative, and continues with the goals of that first alternative.

If any goal fails in the course of executing the program, all variable bindings that were made since the most recent choice-point are undone, and execution continues with the next alternative. This execution strategy is called **chronological backtracking**.

```prolog
mother_child(trude, sally).
father_child(tom, sally).
father_child(tom, erica).
father_child(mike, tom).

sibling(X, Y)      :- parent_child(Z, X), parent_child(Z, Y).
parent_child(X, Y) :- father_child(X, Y).
parent_child(X, Y) :- mother_child(X, Y).

% This results in the following query being evaluated as true:
?- sibling(sally, erica).
Yes
```

This is obtained as follows:

Initially, the only matching clause-head for the query `sibling(sally, erica)` is the `sibling` rule, so proving the query is equivalent to proving the body of that clause with the appropriate variable bindings in place, that is, proving the conjunction `(parent_child(Z,sally), parent_child(Z,erica))`.

The next goal to be proved is the leftmost conjunct, `parent_child(Z, sally)`.

Two clause heads match this goal. The system creates a choice-point and tries the first alternative, whose body is `father_child(Z, sally)`.

This goal can be proved using the fact `father_child(tom, sally)`, so the binding `Z = tom` is generated.

The next goal to be proved is the second part of the above conjunction: `parent_child(tom, erica)`. This also can be proved by the corresponding fact.

Since all goals could be proved, the query succeeds.

>Since the query contained no variables, no bindings are reported to the user.

A query with variables, like: `father_child(Father, Child)` would enumerate all valid answers on backtracking.

Notice that with the code as stated above, the query `sibling(sally, sally)`. also succeeds. If needed we can add additional goals to describe the relevant constraints.

## Loops and recursion

Iterative algorithms can be implemented by means of *recursive predicates*.

## Negation

The built-in Prolog predicate `\+/1` provides negation as failure, which allows for *non-monotonic reasoning*. The goal `\+ illegal(X)` in the rule:

`legal(X) :- \+ illegal(X).`

is evaluated as follows: 

Prolog attempts to prove `illegal(X)`. If a proof for that goal can be found, the original goal (i.e. `\+ illegal(X)`) fails. If no proof can be found, the original goal succeeds.

Therefore, the `\+/1` prefix operator is called the *"not provable" operator*, since the query `?- \+ Goal.` succeeds if `Goal` is not provable.

This kind of negation is sound if its argument is *grounded* (i.e. contains no variables). Soundness is lost if the argument contains variables and the proof procedure is complete. In particular, the query `?- legal(X).` now cannot be used to enumerate all things that are legal.

## Programming in Prolog

In Prolog, loading code is referred to as *consulting*.

Prolog can be used interactively by entering queries at the Prolog prompt `?-`. If there is no solution, Prolog writes `no`. If a solution exists then it is printed. If there are multiple solutions to the query, then these can be requested by entering a semi-colon `;`.

## Design patterns of Prolog

A design pattern is a general reusable solution to a commonly occurring problem in software design. Some design patterns in Prolog are
- skeletons
- techniques
- cliches
- program schemata
- logic description schemata
- higher order programming

## Higher-order programming

A higher-order predicate is a predicate that takes one or more other predicates as arguments. Although support for higher-order programming takes Prolog outside the domain of first-order logic, which does not allow quantification over predicates, ISO Prolog now has some built-in higher-order predicates such as call/1, call/2, call/3, findall/3, setof/3, bagof/3.

Furthermore, since arbitrary Prolog goals can be constructed and evaluated at run-time, it is easy to write higher-order predicates like maplist/2, which applies an arbitrary predicate to each member of a given list, and sublist/3, which filters elements that satisfy a given predicate, also allowing for currying.





## Refs

[1]: Clocksin, William F.; Mellish, Christopher S. (2003). Programming in Prolog. Berlin; New York: Springer-Verlag. ISBN 978-3-540-00678-7.

[2]: Bratko, Ivan (2012). Prolog programming for artificial intelligence (4th ed.). Harlow, England; New York: Addison Wesley. ISBN 978-0-321-41746-6.

[3]: Covington, Michael A. (1994). Natural language processing for Prolog programmers. Englewood Cliffs, N.J.: Prentice Hall. ISBN 978-0-13-629213-5.

[4]: Lloyd, J. W. (1984). Foundations of logic programming. Berlin: Springer-Verlag. ISBN 978-3-540-13299-8.

[5]: Kowalski, R. A. (1988). "The early years of logic programming" (PDF). Communications of the ACM. 31: 38. doi:10.1145/35043.35046. S2CID 12259230.
http://www.doc.ic.ac.uk/~rak/papers/the%20early%20years.pdf

[6]: Colmerauer, A.; Roussel, P. (1993). "The birth of Prolog" (PDF). ACM SIGPLAN Notices. 28 (3): 37. doi:10.1145/155360.155362.
http://alain.colmerauer.free.fr/alcol/ArchivesPublications/PrologHistory/19november92.pdf
