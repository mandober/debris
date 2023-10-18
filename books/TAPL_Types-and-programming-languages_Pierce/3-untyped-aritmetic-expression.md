## 3. Untyped Arithmetic Expressions
(Types and Programming Languages, Benjamin C. Pierce, 2002)

Contents
- 3.1 Introduction
- 3.2 Syntax
- 3.3 Induction on Terms
- 3.4 Semantic Styles
- 3.5 Evaluation
- 3.6 Notes


To talk rigorously about type systems and their properties, we first need clear, precise and mathematically tractable tools for expressing and reasoning about the syntax and semantics of programs.

We first develop a small language of numbers and booleans, somewhat trivial as a language but useful as a vehicle for introduction of several fundamental PLT concepts:
- abstract syntax
- inductive definitions and proofs
- evaluation
- modeling of run-time errors

## 3.1 Introduction

The language used in this chapter contains just a handful of syntactic forms:
- boolean constants true and false
- conditional expressions
- numeric constant 0
- arithmetic operators succ and pred
- testing operation `iszero`

These forms can be summarized compactly by the following grammar.

```
t :=                          terms:
   | true                     constant true
   | false                    constant false
   | if t₁ then t₂ else t₂    conditional
   | 0                        constant zero
   | succ t                   successor
   | pred t                   predecessor
   | iszero t                 zero test
```

The symbol `t` in the rhs of the rules of this grammar is called a *metavariable*. It is a variable in the sense that it is a place-holder for some particular term, and "meta" in the sense that it is not a variable of the *object language* - the simple programming language whose syntax we are currently describing - but rather of the *metalanguage* - the notation in which the description is given.

The prefix "meta" comes from *metamathematics*, the subfield of logic whose subject matter is the mathematical properties of systems for mathematical and logical reasoning (which includes programming languages).

This field also gives us the term *metatheory*, meaning the collection of true statements that we can make about some particular logical system (or programming language)-and, by extension, the study of such statements.

Thus, phrases like "metatheory of subtyping" in this book can be understood as, "the formal study of the properties of systems with subtyping".

For the moment, the words *term* and *expression* are used interchangeably. Later, when we begin discussing calculi with additional syntactic categories such as types, we will use expression for all sorts of syntactic phrases (including term expressions, type expressions, kind expressions, etc.), reserving "term" for the more specialized sense of phrases representing computations (i.e. phrases that can be substituted for the metavariable `t`).

The results of evaluation are terms of a particularly simple form: they will always be either boolean constants or numbers (nested applications of zero or more instances of succ to 0). Such terms are called *values*, and they will play a special role in our formalization of the evaluation order of terms.

## 3.2 Syntax

Definition [Terms, inductively]: The set of terms is the smallest set `𝓣`
1. `{true, false, 0} ⊆ 𝓣`
2. if `t ∈ 𝓣` then `{succ t, pred t, iszero t} ⊆ 𝓣`
3. if `t₁ ∈ 𝓣`, `t₂ ∈ 𝓣`, and `t₃ ∈ 𝓣`, then `if t₁ then t₂ else t₃ ∈ 𝓣`

The first clause tells us 3 simple expressions that are in `T`. The second and third clauses give us rules by which we can judge that certain compound exps are in `T`. Finally, the word "smallest" tells us that `T` has no elements besides the ones required by these 3 clauses.

Formally we are defining T as a set of trees, not as a set of strings.

A different shorthand for the same inductive definition of terms employs the two-dimensional *inference rule* format commonly used in "natural deduction style" presentations of logical systems:

Definition [Terms, by inference rules]: The set of terms is defined by the following rules:

```
---------
true ∈ T

----------
false ∈ T

-------
0 ∈ T

t ∈ T
------------
succ t ∈ T

t ∈ T
------------
pred t ∈ T

t ∈ T
--------------
iszero t ∈ T

t1 ∈ T    t2 ∈ T    t3 ∈ T
---------------------------
if t1 then t2 else t3 ∈ T
```

If we have established the statements in the premise(s) listed above the line, then we may derive the conclusion below the line.

Rules with no premises are *axioms*.

To be completely pedantic, what we are calling *inference rules* are actually *rule schemas*, since their premises and conclusions may include metavariables.

Formally, each schema represents the infinite set of concete rules that can be obtained by replacing each metavariable consistently by all phrases from the appropriate syntactic category, i.e. in the rules above, replacing each `t` by every possible term.


Finally, here is yet another definition of the same set of terms in a slightly different, more "concrete" style, that gives an explicit procedure for generating the elements of T.

Definition [Terms, concretely]: For each natural number `i`, define a set `Sᵢ`:
- S₀  = ∅
- Sᵢ﹢ᵢ = {true, false, 0}
      ⋃ { succ t, pred t, iszero t | t ∈ Sᵢ }
      ⋃ { if t1 then t2 else t3 | t1, t2, t3 ∈ Sᵢ }
- Finally, let `S = ⋃ {i} Sᵢ`


Sets of lang phrases:
- `S₀` is empty,                    `S₀ = ∅`

- `S₁` contains just the constants, `S₁ = {true, false, 0}`

- `S₂` contains the constants and the phrases that can be built with constants using just one of `succ`, `pred`, `iszero`, `if`

- `S₃` contains these and all phrases that can be built using `succ`, `pred`, `iszero`, `if` on phrases in `S₂`
- etc.

`S` collects together all the phrases that can be built in this way, i.e. all phrases built by some finite number of arithmetic and conditional operators, beginning with just constants.

```
- 3 boolean exp: t, f, z?
- 3 nat exp: 0, s 0, p 0
- s : nat -> nat
- p : nat -> nat
- z? : nat -> bool
- if : bool -> bool -> bool -> bool
- if : bool -> nat  -> nat  -> nat

S₀ = ∅
S₁ = {t, f, 0}
S₂ = {t, f, 0,     3 const
        s 0  
        p 0
        z? 0
        t ? t : t
        t ? t : f
        t ? f : t
        t ? f : f

        f ? t : t
        f ? t : f
        f ? f : t
        f ? f : f

        t ?   0 :   0
        t ?   0 : p 0 ✘
        t ?   0 : s 0
        t ? p 0 :   0 ✘
        t ? p 0 : s 0 ✘
        t ? s 0 :   0
        t ? s 0 : p 0
        ⨯ 3 (t, f, iszero 0)
```



## 3.3 Induction on Terms



## 3.4 Semantic Styles

Having formulated the syntax of our language rigorously, we next need a similarly precise definition of how terms are evaluated, i.e. *the semantics of the language*.

There are 3 basic approaches to formalizing semantics:

1. **Operational semantics** specifies the behavior of a PL by defining a simple *abstract machine* for it. This machine is "abstract" in the sense that it uses the terms of the language as its machine code, rather than some low-level microprocessor instruction set. For simple languages, a state of the machine is just a term, and the machine's behavior is defined by a *transition function* that, for each state, either gives the next state by performing a *simplification step* on the term or declares that the machine has halted. The meaning of a term `t` can be taken as the final state the machine reaches when started with `t` as its initial state.

Strictly speaking, what we are describing here is the so-called **small-step style** of operational semantics, sometimes called *structural operational semantics* (Plotkin, 1981).

An alternative, **big-step style**, sometimes called *natural semantics* (Kahn, 1987), also exists in which a single transition of the abstract machine evaluates a term to its final result.

It is sometimes useful to give two or more different operational semantics for a single language - some more abstract, with machine states that look similar to the terms that the programmer writes, others closer to the structures manipulated by an actual interpreter or compiler for the language. Proving that the behaviors of these different machines correspond in some suitable sense when executing the same program amounts to proving the *correctness of an implementation of the language*.

2. **Denotational semantics** takes a more abstract view of meaning: instead of just a sequence of machine states, the meaning of a term is taken to be some mathematical object (number, function, set, relation, etc.).

Giving a denotational semantics for a language consists of finding a collection of semantic domains and then defining an *interpretation function* that maps the terms into elements of these domains.

The search for appropriate semantic domains for modeling various language features has given rise to a rich and elegant research area known as *domain theory*.

One major advantage of denotational semantics is that it abstracts from the gritty details of evaluation and highlights the essential concepts of the language. Also, the properties of the chosen collection of semantic domains can be used to derive powerful laws for reasoning about program behaviors - laws for proving that two programs have exactly the same behavior, for example, or that a program's behavior satisfies some specification. Finally, from the properties of the chosen collection of semantic domains, it is often immediately evident that various (desirable or undesirable) things are impossible in a language.

3. **Axiomatic semantics** takes a more direct approach to these laws: instead of first defining the behaviors of programs (by giving some operational or denotational semantics) and then deriving laws from this definition, axiomatic methods take the laws themselves as the definition of the language.

The meaning of a term is just what can be proved about it. The beauty of axiomatic methods is that they focus attention on the process of reasoning about programs. It is this line of thought that has given CS such powerful ideas as invariants.

During the '60s and '70s, operational semantics was generally regarded as inferior to the other two styles - useful for quick and dirty definitions of language features, but inelegant and mathematically weak. But in the '80s, the more abstract methods began to encounter increasingly thorny technical problems (nondeterminism and concurrency for denotational semantics; procedures for axiomatic semantics), and the simplicity and flexibility of operational methods seemed more and more attractive by comparison - especially in the light of new developments in the area by a number of researchers, beginning with Plotkin's `Structural Operational Semantics` (1981), Kahn's `Natural Semantics` (1987), and Milner's work on CCS (1980, 1989, 1999), which introduced more elegant formalisms and showed how many of the powerful mathematical techniques developed in the context of denotational semantics could be transferred to an operational setting. Operational semantics has become an energetic research area in its own right and is often the method of choice for defining programming languages and studying their properties. It is used exclusively in this book.

## 3.5 Evaluation

Operational semantics of a language of boolean expressions:

```hs
𝔹 (untyped)

Syntax:

  t :=                                                    terms:
    true                                                  constant true
    false                                                 constant false
    if t then t else t                                    conditional

  v :=                                                    values:
    true                                                  value true
    false                                                 value false


Evaluation:                                               t ---> t'


  -------------------------------------------------- (E-IfTrue)
  if true  then t₂ else t₃ ---> t₂


  -------------------------------------------------- (E-IfFalse)
  if false then t₂ else t₃ ---> t₃


  t₁ ---> t₁'
  -------------------------------------------------- (E-If)
  if t₁ then t₂ else t₃ ---> if t₁' then t₂ else t₃
```
Figure 3.1


In the Syntax part, we first have the syntax of terms, `t`, then the syntax of values, `v`, where values are the possible final results of evaluation. The values there are just the constants `true` and `false`. The metavariable `v` is used throughout the book to stand for values.

The **evaluation relation** on terms is written `t --> t'` and pronounced "`t` evaluates to `t'` in one step". Some authors prefer to call it *reduction relation*, reserving the phrase "evaluation relation" for the "big-step" semantics, which maps terms directly to their (final) values.

The intuition is that, if `t` is the state of the abstract machine at a given moment, then the machine can make a step of computation and change its state to `t'`. This relation is defined by the 3 inference rules.

What these rules do not say is just as important as what they do say. The constants `true` and `false` do not evaluate to anything, since they don't appear as the lhs of any of the rules. Moreover, there is no rule allowing the evaluation of a "then" subexp or "else" subexp of an "if" before evaluating the "if" itself.

This interplay between the rules determines a particular *evaluation strategy* for conditionals, corresponding to the familiar order of evaluation in common programming languages: to evaluate a conditional, we must first evaluate its guard; if the guard is itself a conditional, we must first evaluate its guard; and so on. The `E-IfTrue` and `E-IfFalse` rules tell us what to do when we reach the end of this process and find ourselves with a conditional whose guard is already fully evaluated.

In a sense, `E-IfTrue` and `E-IfFalse` do the real work of evaluation, while `E-If` helps determine where the work is to be done. The different character of the rules is sometimes emphasized by referring to `E-IfTrue` and `E-IfFalse` as **computation rules** and `E-If` as a **congruence rule**.

To be a bit more precise about these intuitions, we can define the *evaluation relation* formally as follows:

>(Definition): An instance of an inference rule is obtained by consistently replacing each metavariable by the same term in the rule's conclusion and all its premises (if any).

For example, `if true then true else (if false then false else false) --> true` is an instance of `E-IfTrue`, where both occurrences of `t2` have been replaced by `true`, and `t3` has been replaced by `if false then false else false`.

>(Definition): A *rule is satisfied by a relation* if, for each instance of the rule, either the conclusion is in the relation or one of the premises is not.

>(Definition): The *one-step evaluation relation* `-->` is the smallest binary relation on terms satisfying the 3 rules in Figure 3-1. When the pair `(t,t')` is in the evaluation relation, we say that *the evaluation statement (or judgment) `t --> t'` is derivable*.




The fact that an evaluation statement `t --> t'` is derivable iff there is a derivation tree with `t --> t'` as the label at its root is often useful when reasoning about properties of the evaluation relation. In particular, it leads directly to a proof technique called *induction on derivations*.

>Theorem: Determinacy of one-step evaluation: 
>If `t --> t1` and `t --> t2` then `t1 = t2`.


>(Definition) A term `t` is in **normal form** if no evaluation rule applies to it, i.e. if there is no `t1` such that `t --> t1`.

We have already observed that 'true' and 'false' are normal forms in the present system (since all the evaluation rules have lhs whose outermost constructor is an 'if', there is obviously no way to instantiate any of the rules so that its lhs becomes 'true' or 'false').

We can rephrase this observation in more general terms as a fact about *values*:

>(Theorem) Every value is in normal form.

Being in normal form is part of what it is to be a value (i.e. a fully evaluated result), and any language definition in which this is not the case is
simply broken.

In the present system, the converse of Theorem 3.5.7 is also true: *every normal form is a value*.

This will not be the case in general; in fact, *normal forms that are not values* (e.g. runtime error "values") play a critical role in our analysis of run-time errors.

>(Theorem) If `t` is in normal form, then `t` is a value.
