# Glossary

<!-- TOC -->

- [Atom](#atom)
- [Body](#body)
- [Clause](#clause)
- [Completeness](#completeness)
- [Conjunctive Normal Form](#conjunctive-normal-form)
- [Constant](#constant)
- [Counter-example](#counter-example)
- [Decidable](#decidable)
- [Declarative Semantics](#declarative-semantics)
- [Definite clause](#definite-clause)
- [Existential Variable](#existential-variable)
- [Failure-driven Loop](#failure-driven-loop)
- [Functor](#functor)
- [General Clause](#general-clause)
- [Ground term](#ground-term)
- [Head](#head)
- [Herbrand universe](#herbrand-universe)
- [Herbrand base](#herbrand-base)
- [Herbrand interpretation](#herbrand-interpretation)
- [Implication](#implication)
- [Inference](#inference)
- [Inference Rule](#inference-rule)
- [List](#list)
- [Literal](#literal)
- [Logical consequence](#logical-consequence)
- [Meta-interpreter](#meta-interpreter)
- [Meta-level](#meta-level)
- [Minimal Model](#minimal-model)
- [Model](#model)
- [Most General Unifier](#most-general-unifier)
- [Negation As Failure](#negation-as-failure)
- [Object-level](#object-level)
- [Possible World](#possible-world)
- [Predicate](#predicate)
- [Predicate Logic](#predicate-logic)
- [Procedural Semantics](#procedural-semantics)
- [Program](#program)
- [Proof by refutation](#proof-by-refutation)
- [Proof Tree](#proof-tree)
- [Proposition](#proposition)
- [Propositional Clausal Logic](#propositional-clausal-logic)
- [Query](#query)
- [Recursion](#recursion)
- [Relational Clausal Logic](#relational-clausal-logic)
- [Resolution](#resolution)
- [Refutation](#refutation)
- [Refutation-complete](#refutation-complete)
- [Reverse Implication](#reverse-implication)
- [Soundness](#soundness)
- [Stratified Program](#stratified-program)
- [Substitution](#substitution)
- [Success set](#success-set)
- [Tautology](#tautology)
- [Term](#term)
- [Unification](#unification)
- [Unifier](#unifier)
- [Variable](#variable)

<!-- /TOC -->

## Atom
An atom has the form `pred(t₁,…,tₙ)`, where `pred` is a predicate, `t₁,…,tₙ` are terms, and `n `is the arity of the predicate. Predicates with the same name but different arities are nevertheless distinct. A nullarity predicate is also called a proposition.

## Body


## Clause
A clause has the form `head :- body`, to be read "head if body" or "if body then head". It is an implication, but with a reversed direction: although, instead of the "forward" form `p -> q` ("p implies q"), it uses the "backwards" form, `q <- p` ("q is implied by p"), the meaning remains the same. Thus, a reversed implication has the consequent on the LHS and the antecedent on RHS.

The head term contains atoms separated by semicolons that represent disjunctions. The body term contains atoms separated by commas that represent conjunctions.


## Completeness



## Conjunctive Normal Form



## Constant
A nullarity functor is called a constant.

## Counter-example


## Decidable


## Declarative Semantics



## Definite clause
A clause with a single atom in the head.

## Existential Variable



## Failure-driven Loop



## Functor



## General Clause



## Ground term
A term, an atom or a clause without variables is a ground term/atom/clause.

## Head



## Herbrand universe
The Herbrand universe is the set of all ground terms. These are all the elements in the universal set, or in a discurs set, i.e. they are the things you can talk about and reference. The Herbrand universe is infinite if we have one or more functors, otherwise finite (i.e. in propositional clausal logic and relational clausal logic).

## Herbrand base
The Herbrand base is the set of all ground elements (terms/atoms/clauses). These represent statements that can be true or false. Depending on the Herbrand universe, the Herbrand base can be finite or infinite.

## Herbrand interpretation
A Herbrand interpretation is the assignment of truth values to all ground elements (term/atom/clause) in the Herbrand base. It is usually represented by the subset of true atoms. Each Herbrand interpretation represents a possible state of affairs in the world, i.e. a possible world.

## Horn clause
A Horn clause is a clause (a disjunction of literals) with at most one positive (i.e. unnegated) literal.

Conversely, a disjunction of literals with at most one negated literal is called a dual-Horn clause.

A Horn clause with exactly one positive literal is a definite clause or a strict Horn clause;[2] a definite clause with no negative literals is a unit clause,[3] and a unit clause without variables is a fact;[4]. A Horn clause without a positive literal is a goal clause. Note that the empty clause, consisting of no literals (which is equivalent to false) is a goal clause. These three kinds of Horn clauses are illustrated in the following propositional example:
## Implication


## Inference
An inference is a conclusion reached on the basis of evidence and reasoning. Sometimes, the term "inference" may also refer to the process of reaching such a conclusion. In a system of logic, one follows its rules of inference to derive a conclusion that must be based solely on the truth value of the premises that precede it. *Deduction* is inference deriving logical conclusions from premises assumed to be true. *Induction* is inference from particular premises to a universal conclusion.

## Inference Rule
A rule of inference is a logical form consisting of a function which takes premises, analyzes their syntax, and returns one or more conclusions. The most popular rule of inference is *modus ponens* (MP), which takes two premises: one is the implication `p -> q`, and the other is the assertion of `p`; it then returns the conclusion `q`. MP is similar to a higher-order (here anonymous) function `λfx.fx` that takes a function argument `f`, and an argument `x`, and then applies the function `f` to the arg `x` returning the result (this may seem like a redundant function since you can just apply a function to an argument straight away, and it may very well be so). The rule is valid with respect to the semantics of many systems of logic, in the sense that if the premises are true (under a particular interpretation), then the conclusion is necessarily so. Typically, a logic system will state each valid rule of inference by specifying the possible derivations. For example, the derivation concerning the use of modus ponens usually looks like this

```
p   p -> q
----------- MP
    q
```

meaning, if you have a `p` and you have an implication `p -> q` (i.e. if you have the propositions specified above the derivation line), then you may conclude `q` (i.e. the proposition specified below the derivation line).

Γ, p, p -> q |- Δ


## List



## Literal
Given a clause, an atom is a positive or negative literal if it occurs in its head or body. This corresponds to interpreting a clause `h1 ; h2 :- b1 , b2` as a disjunction `h1 ⋁ h2 ⋁ ¬ b1 ⋁ ¬ b2`, in which head literals occur unnegated and body literals occur negated.

h1 ; h2 :- b1 , b2
h1 ⋁ h2 <- b1 ⋀ b2


h1 ⋁ h2 ⋁ ¬ b1 ⋁ ¬ b2


## Logical consequence
A clause $C$ is a *logical consequence* of a `program` $P$ (or $P$ entails $C$) iff every `model` of $P$ is also a `model` of $C$; we write $P \models C$. If this isn't the case (i.e., some `model` of $P$ is not a `model` of $C$), then $C$ expresses some knowledge that is not contained in $P$. 

Edge cases: any `tautology` such as `a :- a` is a logical consequence of any `program`; an inconsistent `program` (e.g., containing both `a` and `:-a`) has no `models<model>` and hence entails anything.

## Meta-interpreter



## Meta-level



## Minimal Model


## Model
A Herbrand interpretation that makes a `clause` or `program` true. A `ground clause<ground term/atom/clause>` is **false** in an interpretation if all body atoms are **true** and all head atoms are **false** (`counter-example`), and **true** otherwise. A non-ground clause is true iff all its ground instances over the `Herbrand universe` are. A `program` is true if all of its clauses are.

## Most General Unifier


## Negation As Failure


## Object-level


## Possible World


## Predicate


## Predicate Logic


## Procedural Semantics



## Program
A *(logic) program* consists of one of more `clauses<clause>`, read conjunctively. Hence a program is said to be in `conjunctive normal form`, i.e., a conjunction of disjunctions of (possibly negated) atoms. Normal forms limit the number of ways programs can be written, which is computationally advantageous.

## Proof by refutation
A *proof by refutation*, also referred to as *reduction to the absurd*, adds the negation of the `query` (what you want to prove) to the `program`, and then uses `resolution` to derive the empty clause (falsity). If that succeeds, then the original (un-negated) query is a `logical consequence` of the `program` -- but only under the `substitutions<substitution>` needed for all resolution steps.

## Proof Tree


## Proposition
A nullarity predicate is also known as a proposition.

## Propositional Clausal Logic


## Query


## Recursion


## Relational Clausal Logic


## Resolution
The single `inference rule` in clausal logic is *resolution*. (This is a consequence of having a `normal form<conjunctive normal form>` -- `predicate logic` needs many more `inference rules<inference rule>`.) Resolution takes two clauses and infers a third clause that is a `logical consequence` (i.e., resolution is *`sound<soundness>`). We can chain several resolution steps together into a proof to produce further `logical consequences<logical consequence>`.

In `propositional clausal logic`, resolution is applicable to any two clauses where the same literal occurs positively in one clause (i.e., in the head) and negatively in the other (in the body). This literal is "resolved away", and the remaining literals are combined in the inferred clause, keeping their sign (location in head or body). It follows that if the two input clauses are `definite<definite clause>`, then so is the inferred clause.

With `variables<variable>` we first may have to apply a `substitution` to make the positive/negative literal pair identical. Such a `substitution` is called a `unifier`; it is applied to the entire clause and carried along to the rest of the proof. Applying a `substitution` to a clause produces a `logical consequence`, so this doesn't affect the `soundness` of resolution. We are generally only interested in `most general unifiers<most general unifier>` that don't make unnecessary `substitutions<substitution>`.

Resolution cannot infer all `logical consequences<logical consequence>` (e.g., arbitrary `tautologies<tautology>`) and hence is `incomplete<completeness>`}. This can be overcome by turning things around, starting from the thing you want to prove. Technically, this is realised by `proof by refutation`.

## Refutation


## Refutation-complete


## Reverse Implication


## Soundness



## Stratified Program



## Substitution



## Success set



## Tautology



## Term
A term is either a variable or has the form `f(t₁, …, tₙ)`, where `f` is a *functor*, `t₁, …, tₙ` are terms, and `n` is the arity of the functor. Variable tokens start with an uppercase letter; functor tokens start with a lowercase letter. A nullarity functor is also called a constant.

## Unification
Unification is the process that tries to make two term equal.

## Unifier
A unifier is the term to which two terms unify.

## Variable
Variables in clausal logic are very similar to variables in mathematical formulas - they are placeholders that can be substituted by arbitrary ground terms from the Herbrand universe. It is very important to notice that logical variables are global within a clause (i.e. if the variable occurs at several positions within a clause, it should be substituted everywhere by the same term), but not within a program. This can be clearly seen from the semantics of relational clausal logic, where grounding substitutions are applied to clauses rather than programs. As a consequence, variables in two different clauses are distinct by definition, even if they have the same name. It will sometimes be useful to rename the variables in clauses, such that no two clauses share a variable; this is called *standardizing the clauses apart*.
