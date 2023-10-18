# Prolog :: Prolog in a nutshell

- outer-level lowercase symbols are logical predicates
- all other lowercase symbols are symbolic constants
- all capitalized symbols are quantified logical variables (LV)
- vars on the left imply `∀`
- free vars on the right imply `∃`
- symbol `:-` means reversed implication
- symbol `,` is conjunction
- symbol `;` is disjunction
- rules can be given in any order (hmm); there are no declarations
- `r(X) :- j(X)` means `∀X(r(X) <- j(X))` i.e. `∀X(j(X) -> r(X))`
- `path(A,B) :- path(A,C), path(C,B)` means
  `∀A ∀B ∃C (path(A,C) ∧ path(C,B) -> path(A,B))`
- `main :- smart(X)` means: prove that `∃X(smart(X))`


## Example

Most Prologs want the clauses for any particular predicate to be listed together, unless you do some magic (`discontiguous/1` declaration). For simple knowledge bases the order usually doesn't matter, but for non-deterministic algorithms, clause order may determine the order in which solutions are generated.

```lua prolog
jump(pax).                        % pax is a jumper.
small(nax).                       % nax is small.
martian(pax).                     % pax is a martxian.
martian(X) :- jump(X), small(X).  % All small jumpers are martians.
green(nax).                       % nax is green.
green(X) :- jump(X).              % All jumping creatures are green.
smart(X) :- martian(X), green(X). % All green martians are smart.

main :- smart(X), format('~w is smart.~n', X), halt.
```

The Prolog engine will try to prove the existence of `X` by using the backtracking search. We can issue "trace" and follow the search:

```
[trace] ?- smart(X).
Call: (6) smart(_G2442)
Call: (7) green(_G2442)
Exit: (7) green(nax)
Call: (7) martian(nax)
Call: (8) small(nax)
Exit: (8) small(nax)
Call: (8) jumping(nax)
Fail: (8) jumping(nax)
Fail: (7) martian(nax)
Redo: (7) green(_G2442)
Call: (8) jumping(_G2442)
Exit: (8) jumping(pax)
Exit: (7) green(pax)
Call: (7) martian(pax)
Exit: (7) martian(pax)
Exit: (6) smart(pax)
X = pax .
```

- the proof may fail, or may succeed in more than one way
- vars are assigned by unification and unassigned on backtracking
- once assigned, a logical variable is immutable
- this is called *resolution of Horn clauses* and *unification*

## Horn clauses and resolution

Consider a restricted fragment of predicate logic.

* Expressions are conjunctions of *Horn clauses*:

`(a ∧ b ∧ … ∧ c -> d) ∧ (p ∧ q ∧ … ∧ r -> s) ∧ (True -> w) ∧ …`

* Disjunction is expressible through Horn clauses:

`(a ∨ b) -> c ≡ (a -> c) ∧ (b -> c)`

* Only ∀ quantifiers are allowed, and only outside:

`∀X ∀Y (a(X,Y) ∧ b(Y) -> c(X))`

In Prolog's syntax, quantifiers are implicit, and implication points leftward (reversed implication).

* *Resolution*: `b` is eliminated from two clauses:
```
(c <- a ∧ p ∧ q) <== b <- a ∧ p
                 <== c <- b ∧ q

         b <- a ∧ p
c <- q ∧ b
-------------------
c <- q ∧      a ∧ p
```

## Recursive predicates

Factorial predicate `fact(N,F)` holds if `F = N!`

```lua prolog
fact(1,1).
fact(N,F) :- M is N-1, fact(M,E), F is E*N.
```

`M is N-1` resembles an expression but is actually a predicate. It means `is(M,'-'(N,1))` i.e. *is M = N - 1*, where `-` is an infix data constructor.


Fibonacci predicate `fibo(N,F)` holds if `F` is `N`-th Fibonacci number:

```lua prolog
fibo(0,1).
fibo(1,1).
fibo(N,F) :- M1 is N-1, fibo(M1,E1),
             M2 is N-2, fibo(M2,E2),
             F is E1+E2.
```

Instead of computing `F` through calling a function, we prove the existence of a value `F` such that some predicate holds.

>Prolog only has predicates - there are no declarations, expressions, functions, variables, or static types.

## Syntax extensions

Data structures have a special syntax - they are **passive predicates** and live in a distinct namespace.

```lua prolog
left(pair(X,Y), X).
right(pair(X,Y), Y).
```

- since `pair(X,Y)` is inside a predicate, it must be data
- however, `pair(X,Y)` can contain free logical variables
- so it can contain any other structures (no type-checking!): `pair(pair(X,Y),pair(Y,pair(Z,T)))`


Syntax sugar for lists: `[]` or [a,b,c] or [a,b,c|[]]

Examples:

```lua prolog
head([X|Xs], X). tail([X|Xs], Xs). empty([]).
length([], 0).
length([X|Xs],N) = length(Xs,M), N is M+1.
```

User-defined infix, prefix, postfix syntax for operators:

```lua prolog
op(400, xfy, *).
op(300, yfx, ^).
op(200, xf, :!)
```

## Unification

- Unification is Prolog's way of assigning values to variables.
- Pattern-matching of recursive structures, fitting unassigned variables.

Assignment is propagated to other rules:

```lua prolog
like(1).
like(2).
like(you_know(Y,X)) :- like(X), like(Y).
really(A,B) :- like(A), like(you_know(A,B).
```

The predicate `really(1,2)` holds because `like(you_know(Y,X))` is unified with `like(you_know(1,2))` to set `Y = 1` and `X = 2`.

## Difference lists

Appending ordinary lists takes O(n) operations:

```lua prolog
l_append([], X, X).
l_append([X|Xs], Y, [X|Zs]) :- l_append(Xs, Y, Zs).
```

To optimize, we need a pointer at the end of the list to get us a hnadle on the last element. Having a pointer there is saying that that part of a data structure is not yet assigned. One solution is to expose a free variable so it can be unified with some part of the data structure.

Difference lists - `O(1)` operations:

```lua prolog
pair([a,b,c|X],X).
-- or
[a,b,c|X]-X.
op(500, xfy, -).
empty(X-X).
dl_append(X-Y,Y-Z,X-Z).

-- usage
dl_append([a,b,c|A]-A, [d,e|B]-B, C).
-- A = [d, e|B],
-- C = [a, b, c, d, e|B]^B

-- tracing
-- [trace] ?- dl_append([a,b,c|A]-A, [d,e|B]-B, C).
--
-- dl_append([a, b, c|_G2447]-_G2447, [d, e|_G2456]-_G2456, _G2463)
-- dl_append([a, b, c, d, e|_G2456]-[d, e|_G2456], [d, e|_G2456]-_G2456,
--  [a, b, c, d, e|_G2456]-_G2456)
--
-- A = [d, e|B], C = [a, b, c, d, e|B]-B.
```

Details:
- we have the program `dl_append(X-Y, Y-Z, X-Z)`
- we have the query `?- dl_append([a,b,c|A]-A, [d,e|B]-B, C).`
- the value of `Y` can be unified with the query structure only if we assign `Y = A` and also `Y = [d,e|B]` and `Z = B`.
- thus, we must have `A = [d,e|B]`
- therefore, `X` must be assigned `[a,b,c|A] = [a,b,c,d,e|B]`
- finally, `C = X-Z = [a,b,c,d,e|B]-B`


## Functional-logic programming in Mercury

Mercury = Prolog + some features of ML
- immutable values, static type inference, algebraic polymorphism
- all predicates and all arguments are labeled with modes
- static detection of errors in predicate use
- functions are deterministic predicates with strict modes
- products, sums, labeled records, higher-order functions
- I/O by unique types
- modules and signatures à la Standard ML
- type classes à la Haskell
- standard library: arrays, multithreading, etc.
- can compile to high-performance machine code, C, Java, Erlang


A taste of Mercury: Read an integer and print its factorial

```lua mercury
:- module f.
:- interface.
:- import_module io.
:- pred main(io::di, io::uo) is det.
:- implementation.
:- import_module int.
:- pred fact(int::in, int::out) is det.
:- import_module list, string.

fact(N,F) :- ( if N =< 1 then F = 1 else fact(N-1, A), F = A*N ).

main(!IO) :- io.read_line_as_string(Result, !IO),
  ( if  Result = ok(String),
        string.to_int(string.strip(String), N)
    then
        io.format("fact(%d) = %d\n", [i(N), i(fact(N))], !IO)
    else
        io.format("That isn't a number...\n", [], !IO)
  ).
```


## Suggested reading

- SWI-Prolog, https://www.swi-prolog.org
- The Mercury programming language, https://mercurylang.org/

* `Computing with logic: Logic programming with Prolog`, 1988, D. Maier, D. S. Warren. Addison-Wesley
* `The art of Prolog`, 1999, E. Shapiro, L. Sterling. MIT
* `Techniques of Prolog programming`, 1993, T. Van Le, Wiley
* `The craft of Prolog`, 1990, R. O'Keefe, MIT

Implementation (the WAM is still an important source of inspiration):
- `Warren's Abstract Machine (WAM)`, 1991, H. Aït-Kaci. MIT
- `Design and simulation of a sequential Prolog machine`, 1985, W. F. Clocksin
