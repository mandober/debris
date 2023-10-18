## OCaml

OCaml is a functional programming language that belong to the Lisp family of languages: Lisp, Scheme, Standard ML, Miranda, Hope, Haskell, etc.

Functional programming (FP) languages:
- all computation is done with functions, which are first-class values
- referential transparency is enforced, no state mutation
- support for concurrent and parallel programming
- iteration (while-, for-, and similar loops) are replaced with recursion
- conciseness, high level of abstraction
- enforces correct code with good performance
- makes code very reusable, easies the refactorings
- language is easily extended keeping the overall stylistic outlook

OCaml features
- OCaml does support imperative programming, but doesn't encourage it.
- the "O" in OCaml signifies the supported for OOP
- garbage collection
- algebraic datatypes
- exceptions and threads
- advanced modules
- statically typed
- type inference
- type-safety
- parametric polymorphism

A type-safe language ensures that you don't apply the wrong operations to the wrong data, which prevents accidents, but enhances security as well (buffer overflow becomes impossible). Functional languages like Scheme and Lisp are type-safe, but since dynamically typed so the type-errors are run-time errors. C et al. are statically typed, but lack type-safety and cannot guarantee a type-error-free code. Java and OCaml are type-safe and statically typed, so most errors are caught at the compile-time. The downside is that the static type-checking is undecidable and thus all statically-typed languages are conservative, occasionally rejecting a correct program. However, all such languages provide means to circumvent the type system if needed.

OCaml supports parametric polymorphism and lets you write generic functions and data structures, enabling code reusability. OCaml has a module language that is used to encapsulate implementations behind interfaces. It offers more functionality then other modular languages by providing functors - functions that manipulate modules.


## History

In the late '70s, at the Edinburgh University for Computer Science, Robin Milner et al. were working on theorem provers. The language used was Lisp, but Milner kept running into the problem that the theorem provers would occasionally validate incorrect, non-proofs, as proofs. Consequently, he begun developing a language with a strong type system that would disallow construction of invalid proofs. A theorem prover was then written as a program that constructed a proof. Milner also formalized the type-inference algorithm and proved its soundness. His work culminated in *Meta Language*, better known by the acronym *ML*. Eventually, it ML evolved into a family of general purpose and specialized languages.

Robin Milner will go on to receive the Turing Award, in large part for his work on ML, but also for furthering the development of concurrent programming by desinging languages such as *CCS*, *CSP* and *pi-Calculus*.

1980's saw a split of the ML community, when the language was forked due to national tensions. The French fork evolved into the *Caml*, followed by the *OCaml* (Objective Caml), while the British fork came to be *SML* (Standard ML).


## OCaml today

Today, OCaml is used for a variety of purposes, but it is particularly strong in the language manipulation arena (compilers, analyzers, verifiers, theorem provers, etc.), which is unsurprising, having evolved from the domain of theorem proving itself. Designing new languages often starts by writing a compiler in OCaml, until the new language matures to be self-hosted, which was the case, for the nowadays extremely popular, *Rust programming language*.

Domains of use:
- theorem provers (e.g., NuPRL, HOL, Coq, etc.)
- compilers (e.g., SML/NJ, OCaml, C-kit, Twelf, Lambda-Prolog, Pict, etc.)
- mathematics
- hardware verification
- advanced protocols (Ensemble, Fox, PLAN)
- financial systems
- genealogical database
- signal processing
- bioinformatics
- scripting
- latex to HTML translation
- smartcards




## Sample OCaml code

```ocaml
let rec sumsq (n:int) : int =
  if n=0 then 0
  else n*n + sumsq(n-1)

let rec sumsq (n) =
  if n=0 then 0
  else n*n + sumsq(n-1)

let rec sumop (f,n) =
  if n=0 then 0
  else f n + sumop(f,(n-1))

sumop((function x -> x*x*x), 5)

let rec reverse (lst:'a list): ' list =
  match lst with
      [] -> []
    | h :: t -> reverse t  @ [h]

let pythagoras (x, y, z) =
  let square n = n*n in
    square z = square x + square y

pythagoras (1, 2, 3)
pythagoras (3, 4, 5)
```
