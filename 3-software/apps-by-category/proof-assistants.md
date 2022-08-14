# Proof assistants

https://en.wikipedia.org/wiki/Proof_assistant


## Coq

Coq is an interactive theorem prover first released in 1989. It allows for expressing mathematical assertions, mechanically checks proofs of these assertions, helps find formal proofs, and extracts a certified program from the constructive proof of its formal specification.

Coq works within the theory of the *calculus of inductive constructions*, a derivative of the *calculus of constructions*. Coq is not an automated theorem prover but includes automatic theorem proving tactics (procedures) and various decision procedures.

- [Coq homepage][coq-hp]
- [Coq at GitHub][coq-gh]
- [Coq at Wikipedia][coq-wp]


[coq-hp]: https://coq.inria.fr/
[coq-gh]: https://github.com/coq/coq
[coq-wp]: https://en.wikipedia.org/wiki/Coq


## Lean

Lean is a theorem prover and programming language. It is based on the *calculus of constructions with inductive types*. The Lean project was launched by Leonardo de Moura at Microsoft Research in 2013. Lean has an interface that differentiates it from other interactive theorem provers. Lean can be compiled to JavaScript and accessed in a web browser. Lean has an extensive support for meta-programming. Lean has a small kernel and supports quotient types.

Lean has attrackted attention of some mathematicians: Thomas Hales is using Lean for his project, "Formal Abstracts". Kevin Buzzard uses it for "The Xena project" whose goal is to rewrite every mathematical theorem and proof in the undergraduate math curriculum.

The most recent version of Lean is v.4, but previous Lean's versions have already generated a lot of material and resources, so one should be careful when mixing the code and different interpreter versions.

- [Lean homepage][lean-hp]
- [Lean at GitHub][lean-gh]
- [Lean at Wikipedia][lean-wp]


[lean-hp]: https://leanprover.github.io/
[lean-gh]: https://github.com/leanprover/lean4
[lean-wp]: https://en.wikipedia.org/wiki/Lean_(proof_assistant)


## Idris1

## Idris2
based on Quantitative Type Theory, supports linear types.

## Agda1
https://en.wikipedia.org/wiki/Agda_(programming_language)
## Agda2
very close to Martin-Lof Type Theory, handles proof terms directly.

## Dedukti
Dedukti is a logical framework based on the *λΠ-calculus modulo* in which many theories and logics can be expressed. Compared to similar software such as `Coq` and `Twelf`, Dedukti has two main differences: Dedukti is based on rewriting, a very powerful mechanism which can be used to discharge the computational part of proofs to the type-checker. Also, Dedukti is a *proof-checker*, not a *proof assistant*; it has been designed for checking machine-generated proofs and it does not contain features whose sole purpose is to help humans (tactics and mechanisms for trying to fill gaps automatically for example).



## List of proof assistants and theorem provers

* `ACL2` is a programming language, a FOL theory, and a theorem prover with interactive and automatic modes, in the Boyer-Moore tradition.

* `Coq` allows expressing mathematical assertions, mechanically checks proofs of the assertions, helps find formal proofs, can extract a certified program from the constructive proof of its formal specification.

* `Isabelle` is an interactive theorem prover, successor of HOL. The main code-base is BSD-licensed, but the Isabelle distribution bundles many add-on tools with different licenses.

* `HOL theorem provers` is a family of tools ultimately derived from the `LCF` theorem prover. The logical core is a library of their programming language. Theorems represent new elements of the language and can only be introduced via strategies that guarantee logical correctness. Strategy composition gives users the ability to produce significant proofs with few interactions with the system.
* `HOL4` supports Moscow ML and Poly/ML.
* `HOL Light` is a minimalist fork of HOL based on OCaml.
* `ProofPower` is based on Standard ML.

* `Lean` is a FPL and interactive theorem prover.

* `Mizar` is assistant based on FOL, in a natural deduction style, and Tarski-Grothendieck set theory.

* `TPS` and `ETPS` are interactive provers based on STLC and an independent formulation of the logical theory and independent implementation.

* `PVS` Prototype Verification System is proof language and system based on HOL.
* `Matita` is light system based on the Calculus of Inductive Constructions.
* `MINLOG` is proof assistant based on first-order minimal logic.
* `IMPS`   is an Interactive Mathematical Proof System.
* `PhoX`   is based on higher-order logic which is eXtensible.
* `Jape`   is Java based.
* `LEGO`
* `Typelab`
* `Yarrow`




- https://en.wikipedia.org/wiki/ACL2
- https://en.wikipedia.org/wiki/HOL_Light
- https://en.wikipedia.org/wiki/HOL_theorem_prover
- https://en.wikipedia.org/wiki/Isabelle_theorem_prover
- https://en.wikipedia.org/wiki/Jape_(software)
- https://en.wikipedia.org/wiki/Matita
- https://en.wikipedia.org/wiki/MINLOG
- https://en.wikipedia.org/wiki/Mizar_system
- https://en.wikipedia.org/wiki/PhoX
- https://en.wikipedia.org/wiki/Prototype_Verification_System

- http://gtps.math.cmu.edu/tps.html
+ http://hol.sourceforge.net/
+ http://www.dcs.ed.ac.uk/home/lego/
+ http://www.informatik.uni-ulm.de/ki/typelab.html
+ https://www.cs.ru.nl/~janz/yarrow/
