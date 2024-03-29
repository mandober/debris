# 1. Judgments and Rules :: 1. Abstract Syntax

1. Abstract Syntax
  1.1 Abstract Syntax Trees
  1.2 Abstract Binding Trees

## 1. Abstract Syntax

Programming languages express computations in a form comprehensible to both people and machines. The **syntax** of a PL specifies how various *sorts* of language phrases (expressions, commands, declarations, etc.) may be combined to form programs.

A **concrete (surface) syntax** is concerned with how phrases are entered and displayed on a computer. The surface syntax is usually thought of as given by strings of characters from some alphabet (Unicode).

The **abstract (structural) syntax** is concerned with the structure of phrases, specifically how they are composed from other phrases. At this level, a phrase is a tree, called an *Abstract Syntax Tree (AST)*, whose nodes are operators that combine several phrases to form another phrase.

The **binding structure of syntax** is concerned with the introduction and use of identifiers: how they are declared, and how declared identifiers can be used. At this level, phrases are *Abstract Binding Trees (ABT)*, which enrich AST with the concepts of binding and scope.

A *pieces of syntax* will be a finite tree augmented with a means of expressing the *binding and scope of identifiers* within a syntax tree. We define a "piece of syntax" in two stages:
1. AST captures the hierarchical structure of a piece of syntax 
   (avoiding the commitment of a concrete representation)
2. ABT is enhanced AST with the means of specifying 
   the binding (declaration) and scope (range of significance) of an identifier


## 1.1 Abstract Syntax Tree

**AST** is an *ordered tree* whose leaves are *variables*, and whose interior nodes are *operators* whose arguments are its children.

ASTs are classified into a variety of sorts corresponding to different forms of syntax.

ASTs can be combined by an operator, which has an *arity* specifying the *sort* of the operator and the number and sorts of its arguments. An operator of sort `s` and arity `s₁, …, sₙ` (`n ≥ 0`) combines ASTs of sort `s₁, …, sₙ`, respectively, into a compound AST of sort `s`.


A **variable** stands for an unspecified, or generic, piece of syntax of a *specified sort*. A variable is an unknown object drawn from some domain. 

The unknown can become known by *substitution* of a particular object for all occurrences of a variable in a formula, thereby *specializing* a general formula to a particular *instance*.

A **variable** is a place-holder, an unknown whose meaning is given by substitution.

For example, in algebra variables range over real numbers, and we may form polynomials, such as `x² + 2x + 1`, that can be specialized by substitution of `x = 7` to obtain `7² + 2 × 7 + 1`, which can be simplified according to the laws of arithmetic to `64`, which is `(7 + 1)²`.


ASTs are *classified by sorts* that divide ASTs into *syntactic categories*. For example, PLs often have a syntactic distinction between expressions and commands; these are two sorts of ASTs.

*Variables in ASTs range over sorts* in the sense that only ASTs of the specified sort of the variable can be plugged in for that variable. Thus, it would make no sense to replace an expression variable by a command, nor a command variable by an expression, the two being different sorts of things.

For example, a language of arithmetic expressions built from numbers, addition, and multiplication is *single-sorted*; its abstract syntax consists of a single sort `Exp` generated by the operators:
1. operator `num[n]` of sort `Exp` for each `n ∈ N`
2. operators `plus` and `times` of sort `Exp`, each with 2 args of sort `Exp`

```hs
data Exp where
  EInt :: Exp
  Plus :: Exp -> Exp -> Exp
  Mult :: Exp -> Exp -> Exp
```

The expression `2 + (3 × x)`, which involves a variable `x`, is represented by the AST `plus(num[2], times(num[3], x))` of sort `Exp`, under the assumption that `x` is also of this sort.

```
  +
 / \
2   ×
   / \
  3 × x
```

The AST's tree structure provides a very useful principle of reasoning, called **structural induction**.

Suppose that we wish to prove that a property `P(a)` holds for all ASTs `E` of a given sort. To show this, it is enough to consider all ways in which `E` can be generated, and show that the property holds in each case under the assumption that it holds for its constituent ASTs (if any).

In the case of the sort `Exp` just described, we must show:

1. The property holds for any variable `x` of sort `Exp`: 
  prove that `P(x)`

2. The property holds for any number, `num[n]`: 
  for every `n ∈ N`, prove that `P(num[n])`

3. Assuming that the property holds for `E₁` and `E₂`, 
  prove that it holds for `plus(E₁,E₂)` and `times(E₁,E₂)`: 
  if `P(E₁)` and `P(E₂)`, then `P(plus(E₁,E₂))` and `P(times(E₁,E₂))`.

Because these cases exhaust all possibilities for the formation of `E`, we are assured that `P(E)` holds for any AST of sort `Exp`.


## 1.2 Abstract Binding Trees

An **Abstract Binding Tree** (ABT) enriches an AST with means to introduce new variables and symbols, called *bindings*, with a specified *scope*.

**Scope of a binding** is an ABT within which the *bound identifier* can be used, either as a place-holder (in the case of a *variable declaration*) or as the index of some operator (in the case of a *symbol declaration*).

Thus, the set of *active identifiers* can be larger within a subtree of an ABT than it is within the surrounding tree. Moreover, different subtrees may introduce identifiers with *disjoint scopes*.

>The crucial principle is that any use of an identifier should be understood as a reference, or abstract pointer, to its binding.

The choice of *identifiers* is immaterial, so long as we can always associate a unique binding with each use of an identifier.

For example, consider the exp `let x = a1 in a2`, which introduces a var `x` for use within the exp `a2` to stand for the exp `a1`. The var `x` is bound by the let exp for use within `a2`; any use of `x` within `a1` refers to a different var that happens to have the same name. For example, in the expression `let x = 7 in x + x` occurrences of `x` in the addition refer to the var introduced by the let. On the other hand, in the exp `let x = x*x in x+x`, occurrences of `x` within the multiplication refer to a different var than those occurring within the addition. The latter occurrences refer to the binding introduced by the let, whereas the former refer to some outer binding.

The names of bound variables are immaterial insofar as they determine the same binding. *Renaming of bound variables* is constrained to the extent that it must not alter the reference structure of the expression.

ABT's generalize AST's by allowing an *operator* to bind any finite number (possibly zero) of variables in each argument. An *argument* to an operator is called an *abstractor* and has the form `x₁, …, xₖ.a`. The sequence of variables `x₁, …, xₖ` are bound within the ABT `a` (when k=0, we elide the distinction between `.a` and `a` itself).

Written in the form of an ABT, the expression `let x = a1 in a2` has the form `let(a1; x.a2)`, which specifies that the var `x` is bound within `a2`, and not within `a1`.

To account for binding, *operators are assigned generalized arities* of the form `(v₁, …, vₙ)s`, which specifies operators of sort `s` with `n` args of valence `v₁, …, vₙ`.

In general a *valence* `v` has the form `s₁, …, sₖ.s`, which specifies the sort of an arg as well as the number and sorts of the variables bound within it.

We say that a sequence `x̅` of variables is of sort `s̅` to mean that the two sequences have the same length `k` and that the variable `xᵢ` is of sort `sᵢ` for each 1 ≤ i ≤ k.

To specify that the operator let has arity `(Exp, Exp.Exp)Exp` indicates that it is of sort `Exp` whose first arg is of sort `Exp` and binds no vars, and whose second arg is also of sort `Exp` and within which is bound one var of sort `Exp`.

The informal expression 
  `let x be 2 + 2 in x × x` 
may then be written as the ABT 
  `let( plus(num[2]; num[2]) ; x.times(x; x) )`
in which the let operator has two args: 
the first of which is an exp, `plus(num[2]; num[2])`, 
the second of which is an abstractor, `x.times(x; x)`, that binds one exp var.


Fix a set `𝒮` of sorts and a family `𝒪` of disjoint sets of operators indexed by their generalized arities. For a given family of disjoint sets of variables `𝒳`, the family of ABTs `ℬ[𝒳]` is defined similarly to `𝒜[𝒳]`, except that `𝒳` is not fixed throughout the definition but rather changes as we enter the scopes of abstractors.

(...)

The principle of structural induction extends to ABTs and is called **structural induction modulo fresh renaming**.

(...)

The relation `a =α= b` of **α-equivalence** means that `a` and `b` are identical up to the choice of bound variable names.

The α-equivalence relation is the strongest congruence containing the following two conditions:

(...)

Some care is required in the definition of **substitution** of an ABT `b` (of sort `s`) for free occurrences of a variable `x` (of sort `s`) in some ABT `a` (of some sort), written

`[b/x]a` i.e. `[x⟼b]a` (`x`'s is replaced by `b`'s in `a`)

Substitution is partially defined by the following conditions:

(...)


Bound variables can be seen as the formal analogs of pronouns in natural languages. The binding occurrence of a variable at an abstractor fixes a "fresh" pronoun for use within its body that refers unambiguously to that variable (in contrast to English, in which the referent of a pronoun can often be ambiguous). This observation suggests an alternative representation of ABTs, called **abstract binding graphs** as directed graphs, constructed as follows:
- Free variables are atomic nodes with no outgoing edges.
- Operators with `n` args are n-ary nodes, with one outgoing edge directed at each of their children.
- Abstractors are nodes with an edge directed to the scope of the abstracted var
- Bound vars are back edges directed at the abstractor that introduced it

Notice that ASTs, thought of as ABTs with no abstractors, are *acyclic directed graphs* (more precisely, variadic trees), whereas general ABTs can be cyclic.
