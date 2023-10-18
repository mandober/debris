# 2. Statics and Dynamics :: 6. Type Safety

6. Type Safety
  6.1 Preservation
  6.2 Progress
  6.3 Run-Time Errors

## 6. Type Safety

Most programming languages are safe (or, type safe, or strongly typed). Informally, this means that certain kinds of mismatches cannot arise during execution.

>In general, *type safety* expresses the coherence between the statics and the dynamics.

The *statics* may be seen as predicting that the value of an expression will have a certain form so that the *dynamics* of that expression is well-defined.

Consequently, evaluation cannot get stuck in a state for which no transition is possible, corresponding in implementation terms to the absence of "illegal instruction" errors at execution time.

*Safety* is proved by showing that *each step of transition preserves typability* and by showing that *typable states are well-defined*.

Consequently, evaluation can never "go off into the weeds" and, hence, can never encounter an illegal instruction.

>(Theorem 6.1) **Type Safety**
1. If `e : τ` and `e ⟼ e'`, then `e' : τ`
2. If `e : τ`, then either `e val`, or there exists `e′` such that `e ⟼ e′`

The first part, called **preservation**, says that the steps of evaluation preserve typing.

The second part, called **progress**, ensures that well-typed expressions are either values or can be further evaluated.

Safety is the conjunction of preservation and progress.

We say that an expression `e` is *stuck* iff it is not a value, yet there is no `e′` such that `e ⟼ e′`.

It follows from the safety theorem that *a stuck state is necessarily ill-typed*. Or, putting it the other way around, *well-typed states do not get stuck*.

## 6.1 Preservation

>(Theorem 6.2) **Preservation**. If `e : τ` and `e ⟼ e'`, then `e' : τ`.

The proof of preservation is naturally structured as an induction on the transition judgment, because the argument hinges on examining all possible transitions from a given expression.

In some cases, we may manage to carry out a proof by structural induction on `e`, or by an induction on typing, but experience shows that this often leads to awkward arguments, or, sometimes, cannot be made to work at all.


## 6.2 Progress

The progress theorem captures the idea that well-typed programs cannot get stuck.

The proof depends crucially on the following lemma, which characterizes the values of each type.

>(Lemma 6.3) **Canonical Forms**. If `e val` and `e : τ` then
1. If `τ = num`, then `e = num[n]` for some number `n`
2. If `τ = str`, then `e = str[s]` for some string `s`


>(Theorem 6.4) **Progress** If `e : τ`, then either `e val`, or there exists `e′` such that `e ⟼ e′`


Because the typing rules for expressions are syntax-directed, the progress theorem could equally well be proved by induction on the structure of `e`, appealing to the inversion theorem at each step to characterize the types of the parts of `e`. But this approach breaks down when the typing rules are *not syntax-directed, that is, when there is more than one rule for a given expression form*. Such rules present no difficulties, so long as the proof proceeds by induction on the typing rules and not on the structure of the expression.


Summing up, the combination of preservation and progress together constitute the proof of safety.

The *progress theorem* ensures that well-typed expressions do not "get stuck" in an ill-defined state, and the *preservation theorem* ensures that if a step is taken, the result remains well-typed (with the same type).

Thus, the two parts work together to ensure that the *statics and dynamics are coherent* and that no ill-defined states can ever be encountered while evaluating a well-typed expression.

## 6.3 Run-Time Errors
