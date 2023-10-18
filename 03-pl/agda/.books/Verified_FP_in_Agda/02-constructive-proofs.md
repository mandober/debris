# Constructive Proofs

The Curry-Howard Isomorphism or types as formulas. To express a theorem of interest we usually use the equality type. An equality like this is called a propositional equality, to distinguish it from another form of equality we will consider shortly. If you ask Agda what type this has, Agda will respond with `Set`. So Agda views a formula like this equation as a type (`Set` is the type for types).

The idea that formulas can be viewed as types is a central idea in type theory, known as the Curry-Howard isomorphism, after Haskell Curry and William Howard, the two people primarily credited with discovering it. It is a powerful idea, because when developed in full as in a language like Agda, it allows us to use one and the same language for writing types and writing formulas.

We will see shortly that we can also use the same language for writing programs (which have types) and proofs (which prove formulas). This cuts down on the new languages we need to learn to do verified programming. 
Instead of needing to know
- a language for programs
- a language for their types
- a language for formulas
- a language for proofs

we just need to grasp a fairly straightforward language for programs, along with an admittedly much richer language for types. 

But the Curry-Howard isomorphism has positive benefits for both programming and theorem proving. By giving us a way to *write formulas just as certain special types*, the Curry-Howard isomorphism has introduced new types into our mental universe, which we can use to write typed programs that are not possible with the usual types we are familiar with from mainstream programming languages.

Agda adopts the simple but powerful idea of treating any program expressions that appear inside types as equal if their defining equations make them equal.

When Agda's type checker is asked to consider the type `¬ ¬ true ≡ true`, it takes into account the defining equation for the negation operator, `¬_`. So it treats this type as equivalent to just `true ≡ true`.

```hs agda
¬¬true : ¬ ¬ true ≡ true
¬¬true = refl
```

Let us review what is happening with this piece of Agda code. We are writing a definition for the symbol `¬¬true`. As usual with definitions in Agda, we first have to write the type for `¬¬true` and then give equations defining `¬¬ttue`.

The type is `¬ ¬ true ≡ true`. Agda's type checker treats program expressions that appear in types as equal if their defining equations, which explain how to evaluate calls to the functions occurring in those expressions, make them equal.

Since `¬ ¬ true` evaluates to `true` (as we can easily confirm with C-c C-n), Agda treats the formula we are trying to prove as equivalent to the trivial formula `true ≡ true`. The two formulas are said to be *definitionally equal*.

The formula `true ≡ true` can be proved with `refl`, and so we complete our definition of `¬¬true` by saying that `¬¬true` is defined to be `refl`. The `refl` is actually the sole constructor of the equality type.

Generealizing

We'd like to abstract this theorem so for any Boolean `b`, we have `¬ ¬ b ≡ b`. That is, we would like to write a universally quantified formula, to express the idea of double negation, `∀ (b : 𝔹) → ¬ ¬ b ≡ b` (invalid in ITT).

The `∀` is the operator for type polymorphism. Because types can contain program expressions, this operator can also be used to express *program polymorphism*. Just as the polymorphic type for `if_then_else_` can be instantiated with any type, for the `then_` and `else_` parts, that we wish. Similarly, some types can be instantiated with any program that we wish. We can view `∀` as the operator for universal quantification or for polymorphism. In Agda, these concepts are unified, by the CHI.

```hs
¬¬-elim : ∀ (b : 𝔹) → ¬ ¬ b ≡ b
¬¬-elim true  = refl
¬¬-elim false = refl
```

This theorem can be shown by case analysis on the variable `b`.

So we are actually defining `¬¬-elim` as if it were a function taking in one arg, namely, the Boolean value for `b`.

The universal type `∀ (b : B) → ¬ ¬ b ≡ b` can be seen as a function type: given input `b`, the `¬¬-elim` function returns an output of type `¬ ¬ b ≡ b`. This is also part of the CHI.

Type Refinement

An important note about how Agda type checks a definition like this: the two equations are for the two cases for a Boolean variable `b`. Each equation deals with one instantiation of this variable. Once the LHS of the equation has specified an instantiation for a variable, then the rest of the equation, incl any additional parts of the LHS and then the whole RHS, are type-checked under that instantiation.

Som in the first equation, after it sees `true` as the instantiation for `b`, Agda is checking that the rhs has type `¬ ¬ b ≡ b`, under the instantiation of `b` to `true`. That is, Agda is checking that RHS has type `¬ ¬ true ≡ true`, since we have instantiated `b` to `true`.

This process of proceeding with type checking using an instantiated version of the type we started with, is sometimes called **type refinement**. We are refining the type `¬ ¬ b ≡ b`, which we have for the RHS of the equations, based on instantiations encountered on their LHSs.

**Implicit arguments** to a function are arguments that you do not have to write when you call the function as Agda will try to infer them.

The `refl` also has implicit args and one of them is the term `x` for which we are proving `x ≡ x`. In the case of `¬¬true` this implicit argument is `true`, while in the case of `¬¬false` it is `false`. Agda allows us to write implicit args explicitly if we wish, within curly braces. If we were to write these args explicitly, we'd have the following definitions (where `lzero` is the type level for `𝔹`):

```hs agda
¬¬-elim : ∀ (b : 𝔹) → ¬ ¬ b ≡ b
¬¬-elim true  = refl {lzero} {𝔹} {true}
¬¬-elim false = refl {lzero} {𝔹} {false}
```

Two expressions in Agda are definitionally equal iff they can be proved equal using the defining equations for the function symbols involved.


Assumptions allow us to express more interesting theorems than we have so far, since many interesting properties of our programs are true only under some assumptions. 

This is expressing a special case of the general property, sometimes called **congruence**, that if `x` equals `y`, then any term containing `x` is equal to that same term with some of the `x`'s replaced by `y`. This property holds already for definitional equality (the equality Agda applies automatically during type checking), because definitional equality is already defined by  replacing terms with ones they are defined to be equal, wherever those terms occur. For propositional equalities `x ≡ y` (which are the ones we explicitly state and prove), the general congruence property must be proved.

Using `refl` as a pattern for an equality assumption seems really great - can we just use it everywhere? Np. There is an important rule about using type refinements in Agda: it won't allow us to refine types in such a way that nonvariable terms are discovered to be definitionally equal to other such terms.

## Curry-Howard isomorphism and classical logic

Let's consider the Curry-Howard isomorphism and classical logic. It doesn't appear possible to use the CHI with nonconstructive reasoning.

For it seems that a program that proves `∀ F . F ∨ ¬F` would have to be a universal oracle, which given any formula `F`, could compute whether `F` is true or else report that `F` is false. If one wanted to know if the Goldbach Conjecture (which states that every integer greater than two is the sum of two prime numbers) is true or false, one could just ask this oracle.

Quite surprisingly, it turns out that if we expand the kinds of programs we are allowed to write, the CHI can be made to work for classical logic. This amazing insight is due to Timothy Griffin and is still an active subject of research: `A Formulae-as-Types Notion of Control`, Timothy Griffin, 1990, DOI: 10.1145/96709.96714

To get a hint for how this could make sense, here's how `∀F . F ∨ ¬F` proof can be viewed computationally. The proof, let us call it `p`, takes in a formula `F`, and is required to tell you whether either `F` is true, or else `¬F` is true.

Now, `¬F` is defined in IL as `F → ⊥`. That is, we say `¬F` is true if and only if the truth of `F` would imply a contradiction. So here is what `p` does: it just tells you that, yes, `¬F` is true, by returning a "proof" `q` (we'll see how `q` works in a moment).

The proof `p` always returns the proof `q` which says that `¬F` is true, regardless of what `F` is.

How can we make use of this (dubious) information that `p` has given us? Well, the only thing you can do with a proof of the form `A → B`, in general, is to apply it to an arg of type `A`.

And here we have a proof of the from `F → ⊥`. So, imagine that at some point we want to use this proof - meaning we are going to apply it to an arg of type `F` (let us call that arg `r`).

As soon as `q` sees `r`, `q` travels back in time to the moment when `p` was asked to return either a proof of `F` or a proof of `¬F`!

It changes the past, so that now, `p` returns `r` showing that `F` is true!

So the proof `q`, which `p` returns initially, is a sort of placeholder. It says, sure, `¬F` is true, but if anyone tries to use that information by giving a proof `r` of `F`, then it jumps back in time and tells `p` to return the proof `r` instead of `q` (Continuation-passing style).

This backtracking sounds a bit like exceptions, and indeed, the computational interpretation of such proofs is as *control operators*, which are like more powerful forms of exceptions.

With this approach, a proof of `∀F . F ∨ ¬F` is not a universal oracle that can tell you whether any formula `F` is true or false, for you can never take irrevocable action based on the truth or falsity of `F`. You must always be prepared to backtrack, if it turns out that the answer `¬F`, which the proof gave you, is not definitive. You could never send a network message or initiate some control sequence based on the answer you get from the proof of `∀F . F ∨ ¬F`.

This is why the CHI for classical logic requires more care in programming than the CHI for constructive logic. For an example of researchers making use of CHI for classical logic, for a new approach to concurrent programming, see Mazurak and Zdancewic, 2010:    
`Lolliproc: to concurrency from classical linear logic via Curry-Howard and control`, K. Mazurak and S. Zdancewic, 2010. DOI: 10.1145/1932681.1863551

## Summary

this chapter, we have gotten our first taste of theorem proving in Agda. The theorems we proved are very simple, and their proofs are easy. The point was, of course, to see how to write these proofs in Agda. We saw a number of important features.
- The equality type t ≡ t' expresses equality of expressions t and t', which must have the same type.
- The basic way to prove an equality is with refl, which will prove t ≡ t' for any definitionally equal t and t'.
- Two expressions are definitionally equal in Agda if they can be proved equal using their defining equations.
- A proof in Agda is just a program, which is defined like all other Agda programs, using pattern matching.
- Pattern matching can instantiate universally quantified variables which appear in the type. This has the effect of specializing the desired formula to the specific instances of those variables.
- Arguments can be declared implicit with curly braces in the type. We can still pattern-match on implicit arguments, by writing curly braces around the pattern, on the left-hand side of an equation.
- Assumptions in theorems are just treated as extra arguments to the programs which are serving as proofs of those theorems.
- The absurd pattern () can be used when an assumption is definitionally equal to an obviously impossible equality, where the equated terms start with different datatype constructors (like tt and ff).
- If you use refl as the pattern for an equality assumption `t ≡ t'`, Agda will try to refine the type by making `t` and `t'` definitionally equal. This will fail unless the expressions can be unified: there must be a way to assign values to variables occurring in `t` and `t'` that make the expressions identical [Coquad 1992]. The simplest case of this is if one of these expressions (either `t` or `t'`) is definitionally equal to a variable.

[Coquad 1992]: Thierry Coquand, Pattern matching with dependent types.
In B. Nordstrom, K. Petersson, and G. Plotkin, editors, Electronic Proceedings of the Third Annual BRA Workshop on Logical Frameworks, 1992. Available from Coquand's home page: http://www.cse.chalmers.se/~coquand/pattern.ps
DOI: 10.4204/EPTCS.185.5. 41
