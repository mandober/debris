# 1. Motivating Examples

*Equational reasoning* is concerned with a rather restricted class of first-order languages: the only predicate symbol is equality. It is, however, at the heart of many problems in mathematics and CS, which explains why developing specialized methods and tools for this type of reasoning is very popular and important.

For example, in mathematics one often defines classes of algebras (such as groups, rings, etc.) by giving defining identities (which state associativity of the group operation, etc.). In this context, it is important to know which other identities can be derived from the defining ones.

In algebraic specification, new operations are defined from given ones by stating characteristic identities that must hold for the defined operations. As a special case we have functional programs where functions are defined by recursive equations.

The following term rewriting system can then be used to compute sums over the natural numbers:
- m +   0 <-> m           (1)
- m + S n <-> S (m + n)   (2)

By applying these identities, we can calculate the sum of 1 and 2:

```
2 + 1 =
= S (S 0) + S 0     encoded numerals
= S (S (S 0) + 0)   by (2)
= S (S (S 0))       by (1)
```

In this calculation, we have interpreted the identities as rewrite rules that tell us how a subterm of a given term can be replaced by another term.

**Terms** in *term rewriting systems* are are built from
- variables
- constant symbols
- function symbols

In the above example, `+` is a binary function symbol, `S` is a unary function symbol, `0` is a constant symbol, `m` and `n` are variables.

We have used the identities only from left to right above, but *in general, identities can be applied in both directions*. In the following, we illustrate some of the key issues arising in connection with identities and rewrite systems.

* In the first example, the rewrite rules are *unidirectional rules*, denoted by `->`. This is an instance of **rewriting as a computation mechanism**.

* In the second example, we consider the identities defining groups, which are *bidirectional rules*, denoted by `<->`. This is an instance of **rewriting as a deduction mechanism**.

We consider symbolic differentiation of arithmetic expressions built with the operations `+`, `*`, the indeterminates `X` and `Y`, variables, and numbers.

For example, `((X + X) * Y) + 1` is an admissible expression. These expressions can be viewed as terms that are built from the constant symbols 0, 1, X, Y, and the binary function symbols + and *. For the partial derivative with respect to `X`, we introduce the additional (unary) function symbol `δ`.

The following rules are some of the rules for computing the derivative:
- (R1)     `δ(X) -> 1`
- (R2)     `δ(Y) -> 0`
- (R3) `δ(u + v) -> δ(u) + δ(v)`
- (R4) `δ(u * v) -> (u * δ(v)) + (δ(y) * v)`

In terms like `δ(u+v)`, the symbols `u` and `v` are variables, with the intended meaning that they can be replaced by arbitrary expressions. Thus, the rule R3 can be applied to terms having the same pattern as the lhs (`δ` and +).

Starting with the term `δ(X * X)`, the rules the 4 rules lead to this possible reductions:

```
                        δ(X * X)
                            |
                            | R1
                            ↓
                 (X * δ(X)) + (δ(X) * X)
                  /                   \
              D1 /                     \ D1
                ↙                       ↘
(X * 1) + (δ(X) * X)                 (X * δ(X)) + (1 * X)
                \                      /
              D1 \                    / D1
                  ↘                  ↙
                    (X * 1) + (1 * X)
```

This example illustrates two of the most important properties of term rewriting systems: termination and confluence.

## Termination

An expression that is reached after finitely many rule applications is called a **normal form** if no more rules can be applied. The rewrting has terminated. It is not trivial to show termination, for e.g. a rule like R4 may lead to a considerable increase in the size of the expression.

An example of a non-terminating rule is `u + v -> v + u`, which expresses commutativity of addition. The sequence

(X * 1) + (1 * X) -> (1 * X) + (X * 1) -> (X * 1) + (1 * X) -> …

is an example for an infinite chain of applications of this rule. Of course, non-termination need not always be caused by a single rule; it could also result from the interaction of several rules.

## Confluence

If there are different ways of applying rules to a given term `t`, leading to different derived terms `t1` and `t2`, can these derived terms be joined, i.e. can we always find a common term `s` that can be reached both from `t1` and from `t2`?

Above, we had such case - it has exhibit confluence. But, in general, can we prove that rules produce confluent expressions? This shows that the symbolic differentiation of a given expression always leads to the same resulting expression, independent of the strategy for applying rules.

However, if we add (R5) rule like `u + 0 -> u`, we'd lose the confluence property because the terms `δ(X)` and `δ(X) + δ(0)` could not be joined [sure, but that's coz the system would become inconsistent in the first place]:

```
     δ(X + 0)
    /       \
R5 /         \ R3
  /           \
δ(X)      δ(X) + δ(0)
|              |
| R1           | R1
↓              ↓
1            1 + δ(0)
```

In our example, we could get back the confluence property by adding yet another rule like `δ(0) -> 0`.

However, more generally, one can ask whether this is always possible, i.e. can we always make a non-confluent system confluent by adding implied rules. The field of *completion of term rewriting systems* studies this.

Because of their special form, the rules R1-4 constitute a functional program (on the left-hand side, the defined function δ occurs only at the very outside).
- Termination of the rules means that δ is a total function.
- Confluence of the rules means that the result of a computation is independent of the evaluation strategy.

We'll show that all term rewriting systems that constitute functional programs are confluent [Church-Rosser?].

## Group Theory

Using the axioms of a group as our rewriting rules, we can show that the right-inverse is derivable. However, it's nontrivial to find such derivations, i.e. to solve the so-called **word problem** for sets of identities:

Given a set of identities `E` and two terms `s` and `t`, is it possible to transform the term `s` into the term `t`, using the identities in `E` as bidirectional rewrite rules?

A possible way to approach this problem is to consider the identities as unidirectional rewrite rules instead, stemming from the idea that the rules (identities) are only applied in the direction that simplifies a term. We are then looking for *normal forms*, i.e. terms to which no more rules apply.

In order to decide whether the terms `s` and `t` are equivalent (i.e. can be transformed into each other by applying identities in both directions), we use the unidirectional rewrite rules to reduce `s` to a normal form `s'` and `t` to a normal form `t'`. Then we check whether `s'` and `t'` are syntactically equal.

There are, however, two problems that we must overcome before applying this method to resolve the word problem:
- Equivalent terms can have distinct normal forms.
- Normal forms need not exist: the process of reducing a term may lead to an infinite chain of rule applications.

Termination and confluence are the important properties that ensure existence and uniqueness of normal forms. If a given set of identities leads to a non-confluent rewrite system, we do not have to give up - we can again apply the idea of completion to extend the rewrite system to a confluent one.
