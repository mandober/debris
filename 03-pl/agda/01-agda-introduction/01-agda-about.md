# What is Agda

Agda version 2.6.2.2

https://agda.readthedocs.io/en/latest/getting-started/what-is-agda.html

Agda is a dependently typed PL extending [Martin-Löf's type theory][1].

Agda is the latest product of the programming logic group at Chalmers in the tradition of programming languages such as [Alf][2], [Alfa][3], [Cayenne][5], [Agda 1][4], and others, loosely related, languages like [Epigram][7], [Coq][6], [Idris][8].

Practically (and theoretically), Agda 1 was a different language from Agda 2 because it relied on a different type theory. A similar situation is around Idris, where `Idris 1` is also a sufficiently different language then Idris 2. *Agda* and *Idris* are the two languages, both written in Haskell, that are investigating different aspects of *dependent type theory*.

*Coq* is a proof assistant that comes with a dependently-typed PL *Galina*. Coq is intended for development of mathematical proofs, and is often used to write formal specifications, and then, using the same framework, to show that a program does comply to its specification. An additional feature of Coq is that it can automatically extract executable programs from specifications, as either OCaml or Haskell code. In Coq, properties, programs and proofs are formalized using the *Calculus of Inductive Constructions* (CIC) as the underlying type theory. All logical judgments in Coq are typing judgments: at the heart of Coq is a type-checking algorithm.

Due to the strong static typing discipline and the use of dependent types, Agda can also be used as a proof assistant, allowing you to prove mathematical theorems in a constructive setting, and to run the proofs as algorithms.

[1]: https://ncatlab.org/nlab/show/Martin-L%C3%B6f+dependent+type+theory
[2]: http://www.cse.chalmers.se/~bengt/papers/alfengine.pdf
[3]: http://www.cse.chalmers.se/~hallgren/Alfa/
[4]: https://sourceforge.net/projects/agda/
[5]: https://en.wikipedia.org/wiki/Cayenne_(programming_language)
[6]: https://coq.inria.fr/
[7]: http://www.e-pig.org/
[8]: https://idris-lang.org/


## Type systems

[Type theory][9] is concerned both with programming and logic. The type system is seen as a way to express syntactic correctness. A type-correct program has a meaning. In languages with weak type system, programs may give a result, but they may also raise exceptions or diverge, which makes analysis very difficult.

[Haskell][10] or [ML][11], and its derivatives, like [Standard ML][12] and [Caml][13], are typed languages, where functions have a type that expresses the type of arguments the function expects and the type of result it will return.

[9]: https://ncatlab.org/nlab/show/type+theory
[10]: https://www.haskell.org/
[11]: https://en.wikipedia.org/wiki/ML_%28programming_language%29
[12]: https://en.wikipedia.org/wiki/Standard_ML
[13]: http://caml.inria.fr/

Between these two families fall other languages with weak type system. Most imperative languages, like C, are typed very loosely (almost everything is an integer or a variant thereof, like pointers). Moreover, the typing system is not rich enough to encode generics and data structures, such as trees or graphs, without the help of pointers.

Most languages are partial, i.e. the result of computing the value of an expression `e` of type `T` may be any of the following:
- the program terminates with a value in the type `T`
- the program `e` does not terminate
- the program raises an exception

> Agda and other languages based on type theory are *total languages* in the sense that a program `e` of type `T` always terminates with a value in `T` (no runtime errors and no diverging).

## Dependent types

> Dependent types are families of types indexed by objects in another type.

For instance, we can define the type `Vec n` of vectors of length `n`. `Vec` is actually a family of types (because there is not a single type of vectors, but many distinct yet related types) indexed by objects in `Nat`. In the type sense, we say that the type `Vec` is parameterized by natural numbers (in the value sense, `Vec` is parameterized by all types, in the form of a type parameter).

With dependent types, we generalize the type of functions and the type of pairs.

In Haskell, the function space is `a -> b`, where `a` and `b` are type parameters, which we may write here in the Agda-compliant way as `A -> B`.

But in Agda, there is the **dependent function space**, `(a : A) -> (B a)`, which is the type of functions taking an argument `a` in a type `A` and a result in `B a`. Here, `A` is a type, `a` is a value of type `A`, and `B` is a family of types indexed by values (elements) `a` in `A`.

In Haskell, the output of a function cannot be type-dependent on the function's input value. Naturally, the function's output value can depend on its input value, but the input value cannot act as the index into the function's output type.

In cases where the output of a dependent function does not depend on the input, we get the same form of functions as in Haskell, `A -> B`.


As another example of dependent types, we may define the type `Mat n m`, of `n⨯m` matrices, as a type indexed by two natural numbers. The function `identity`, which takes a natural number `n` as an argument and produces the `n⨯m` identity matrix, is then a function of type:

```agda
identity : (n : Nat) -> (Mat n n)
```

Without dependent types, we would be able only to define the function    
`identity : Nat -> Nat -> Mat`    
which is not as precise as the dependent version.

> Dependent types make it possible to express properties of programs in the type system.

We can define the type of matrix operations such that the lengths of matrices are correctly constrained, e.g. matrix multiplication:

```agda
∀ {i j k} → (Mat i j) -> (Mat j k) -> (Mat i k)
```

where the type system can check that the product of matrix multiplication actually respect the stated constraints (that the input matrices have the correct size). The type checker makes sure the matrix multiplication is only allowed for matrices of the correct form (i.e. where the number of columns of the first arg equals the number of rows of the second arg).

## Dependent types and logic

Thanks to the *Curry-Howard correspondence*, one can express a logical specification using dependent types. For example, using types only, it is possible to define:
- equality on natural numbers
- properties of arithmetical operations
- the type `(n : Nat) -> (PrimRoot n)` consisting of functions computing primitive root in modular arithmetic

On the mathematical level, we can express formulas and prove them using an algorithm. For example, a function of type `(n : Nat) -> (PrimRoot n)` is also a proof that every natural number has a primitive root.

Perhaps the dependently-typed programs are more difficult to write, but this is more than compensated by the fact that all such programs are **guaranteed to terminate**.


# Agda

https://en.wikipedia.org/wiki/Agda_(programming_language)

Agda is a dependently typed FPL originally developed by *Ulf Norell* at the *Chalmers University* of Technology with implementation described in his PhD thesis.

The original system in `Agda 1` was developed at Chalmers by *Catarina Coquand* in 1999.

The current version, originally known as `Agda 2`, is a full rewrite, and is considered as a new language that shares the same name and tradition.

Agda is also a *proof assistant* based on the propositions-as-types paradigm, but unlike Coq, has no separate *tactics language*, and proofs are written in a FP style.

Agda is written in Haskell and has much similarities to it, but many things are also different. The language has ordinary programming constructs such as data types, pattern matching, records, let expressions and modules, and a Haskell-like syntax.

The system has emacs interface, but can also be run in batch mode from the command line.

Agda is based on Zhaohui Luo's *unified theory of dependent types* (UTT), a type theory similar to Martin-Löf type theory. Agda is named after the Swedish song "Hönan Agda", written by Cornelis Vreeswijk, which is about a hen named Agda (alludes to the naming of Coq).
