# 1. Introduction

https://en.wikibooks.org/wiki/Prolog/What_is_Prolog

## Contents
- What is Prolog?
- History of Prolog
- Introduction to logic
- Glossary
- Built-in predicates
- Frequently Asked Questions
- Exercises (external link)


## Programming paradigms

There are 4 major paradigms:
- Imperative
  - example       : Fortran
  - programs are  : lists of commands
  - difficulty    : order of updates
  - best used for : numerics
- Functional
  - example       : Lisp
  - programs are  : expressions
  - difficulty    : level of abstraction
  - best used for : compilers
- Logic
  - example       : Prolog
  - programs are  : sets of predicates
  - difficulty    : runtime behavior
  - best used for : symbolic AI
- Constraint
  - example       : TEX
  - programs are  : data + constraints
  - difficulty    : conflicting modules
  - best used for : specific domain

Objects, type systems, modules, concurrency, etc., are merely features added on top of a chosen paradigm.

Programming is declarative when specifications are programs.

### Prolog as a DSL for logic puzzles

1. All jumping creatures are green. 
2. All small jumping creatures are martians.
3. All green martians are intelligent.
4. Ngtrks is small and green. 
5. Pgvdrk is a jumping martian.
Who is intelligent? 
(inpired by S. Lem, Invasion from Aldebaran)

1) ∀x(Jx -> Gx)
2) ∀x(Jx ∧ Sx -> Mx)
3) ∀x(Gx ∧ Mx -> Ix)
4) Sn ∧ Gn
5) Jp ∧ Mp

```pro
small(ngtrks).
green(ngtrks).
martian(pgvdrk).
jumping(pgvdrk).

green(X) :- jumping(X).
martian(X) :- small(X), jumping(X).
intelligent(X) :- green(X), martian(X).

main :- intelligent(X), format('~w is intelligent.~n', X), halt.
```


## What is Prolog

Prolog is a declarative programming language. This means that in Prolog, you do not write procedures - instead you describe a situation. Based on this, the compiler will figure out a solution. Prolog will tell you whether a sentence is true or not, and, if it contains variables, what their values are. However, it is also possible to use Prolog proceduraly.

Prolog is most useful in the areas related to artificial intelligence research, such as problem solving, (path) planning or natural language interpretation. Some fields that are not strictly AI, such as parser building, can also benefit greatly from prolog.

Because of its close ties with predicate logic, learning Prolog can lead to a more fluent understanding of predicate logic. The reverse is true as well - anyone experienced in predicate logic will pick up Prolog faster.

## History of Prolog

Following papers provide information about the history of Prolog:

- `The birth of Prolog`
by Alain Colmerauer and Philippe Roussel, 1992
http://web.archive.org/web/20070703003934/www.lim.univ-mrs.fr/~colmer/ArchivesPublications/HistoireProlog/19november92.pdf
Abstract. The programming language, Prolog, was born of a project aimed not at producing a programming language but at processing natural languages; in this case, French. The project gave rise to a preliminary version of Prolog at the end of 1971 and a more definitive version at the end of 1972. This article gives the history of this project and describes in detail the preliminary and then the final versions of Prolog. The authors also felt it appropriate to describe the Q-systems since it was a language which played a prominent part in Prolog's genesis.

- Alain Colmerauer
http://web.archive.org/web/20070703003934/www.lim.univ-mrs.fr/~colmer/
Research papers:
- Full first order constraints
- Global constraints
- Other constraints
- Prolog III and IV
- Early History of Prolog

http://web.archive.org/web/20070709105847fw_/http://www.lif-sud.univ-mrs.fr/~colmer/texte.html#fullfirst

* `1983-1993: The Wonder Years of Sequential Prolog Implementation`
Peter Van Roy, 1993
http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.37.8982
Abstract. This report surveys the major developments in sequential Prolog implementation during the period 1983-1993. In this decade, implementation technology has matured to such a degree that Prolog has left the university and become useful in industry. The survey is divided into 4 parts. The 1st part gives an overview of the important technical developments starting with the *Warren Abstract Machine* (WAM). The 2nd part presents the history and the contributions of the major software and hardware systems. The 3rd part charts the evolution of Prolog performance since Warren's DEC-10 compiler. The 4th part extrapolates current trends regarding the evolution of sequential logic languages, their implementation, and their role in the marketplace.


## Introduction to logic

https://en.wikibooks.org/wiki/Prolog/Introduction_to_logic

Since Prolog is based heavily on formal logic, it's useful to have some experience with it before starting to learn the language. This is a short introduction to logic for people who want to learn Prolog. It will discuss two logical languages: propositional logic and first-order logic.

*Propositional logic* has two basic elements, terms and connectives.

*Terms* are represented by letters (usually upper-case), and represent the trutyh values, though it doesn't always have to be made clear which value they stand for. They are in this sense like variables in mathematics since they represent an unknown value.

*Connectives* connect terms and produce propositions (anything that has a truth value is a proposition). The result of this composition takes on the truth that depends on the values of its constituent terms.


















## Glossary



## Built-in predicates



## Frequently Asked Questions



## Exercises (external link)
