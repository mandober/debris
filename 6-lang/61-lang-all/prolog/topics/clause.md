# Clause

# Clause in logic

In logic, a **clause** is an expression formed from a finite collection of literals (atoms and their negations). In case of a *disjunctive clause* (which is the most common use of the term "clause"), a clause is true either whenever at least one of the literals is true.

# Clause in Prolog

In Prolog, a *clause* consists of two sides, a *head* and a *body*, and it has the form `head :- body`, which is read "head if body" or "if body then head" (or "body implies head").

* `head` contains literals separated by semicolons representing disjunctions
* `body` contains literals separated by commas representing conjunctions
* if `body` is empty, the clause is written `head` or `head :- true`
* if `head` is empty, the clause is written `:-body` or `false :- body`
* the empty clause, `false :- true` or `[]` indicates a logical contradiction
* clause head must have at least one literal (definite clause) since
* clauses with the empty head are interpreted as *queries*

# Prolog's clauses vs sequents

This is similar to the familiar operation of logical implication, only the direction is reversed: instead of the common "forward" flow, `p -> q` ("p implies q"), Prolog uses the reversed, "backwards" form, `q <- p` ("q is implied by p"). The meaning, however, remains the same.

In implication, the antecedent is on the LHS, while the consequent is on the RHS, `antecedent -> consequent`. In the reversed form of implication they swap places because the arrow is flipped; thus, the consequent gets the left side with the antecedent on the right, `consequent <- antecedent`.

However, Prolog's clauses are more like sequents (due to Gerhard Getzen), considering that a clause allows multiple terms on both sides.

In a sequent, the terms (on both sides of the turnstile `|-`) are separated by commas, which are interpreted differently: the commas on the left represent disjunctions, and the commas on the right conjunctions. Thus, a sequent is an implication (entailment) that says: if **all the antecedents** (hypothesis) are true, then **at least one consequent** (conclusion) is true.

Like terms in a Prolog's clause, terms in a sequent may also change sides, becoming negated as a result.

```js
// a sequent
a , b |- c , d

// commas on the left are conjunctions, on the right disjunctions:
a ⋀ b |- c ⋁ d

// terms that switch sides are negated:
a ⋀ b |- c ⋁ d
a |- ¬b ⋁ c ⋁ d
a ⋀ b ⋀ ¬d |- c

a ⋀ b |- c ⋁ d
    a |- ¬b ⋁ c ⋁ d
      |- ¬a ⋁ ¬b ⋁ c ⋁ d


          a ⋀ b |- c ⋁ d
     a ⋀ b ⋀ ¬d |- c
a ⋀ b ⋀ ¬d ⋀ ¬c |-

// an empty sequent represents contradiction
|-
```

The head term contains atoms separated by semicolons that represent disjunctions. The body term contains atoms separated by commas that represent conjunctions.


```js
c ; d :- a , b  ≡  c ⋁ d -| a ⋀ b  ≡  c ⋁ d <- a ⋀ b

c ; d :- a , b  ≡  a ⋀ b |- c ⋁ d  ≡  a ⋀ b -> c ⋁ d


c ; d :- a , b
c ; d ; ¬a ; ¬b   h1 ⋁ h2 ⋁ ¬b1 ⋁ ¬ b2


h1 ⋁ h2 <- b1 ⋀ b2
h1 ⋁ h2 ⋁ <- b1 ⋀ b2
```
