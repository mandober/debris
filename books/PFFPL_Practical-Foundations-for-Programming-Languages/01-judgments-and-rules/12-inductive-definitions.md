# 1. Judgments and Rules :: 2. Inductive Definitions

2. Inductive Definitions
  2.1 Judgments
  2.2 Inference Rules
  2.3 Derivations
  2.4 Rule Induction
  2.5 Iterated and Simultaneous Inductive Definitions
  2.6 Defining Functions by Rules


## 2. Inductive Definitions

An *inductive definition* consists of a *set of rules* for deriving judgments (assertions) of a variety of forms. *Judgments* are statements about one or more abstract binding trees of some sort. *The rules* specify necessary and sufficient conditions for the validity of a judgment, and hence fully determine its meaning.

## 2.1 Judgments

We start with the notion of a judgment (assertion) about an abstract binding tree. We shall make use of many forms of judgment, including:
- `n nat`       n is a natural number
- `n + m = s`   s is the sum of n and m
- `τ type`      τ is a type
- `e : τ`       expression e has type τ
- `e ⇓ v`       expression e has value v

A *judgment* states that one or more abstract binding trees have a property (or stand in some relation) to one another.

The property (or relation) itself is called a *judgment form*, and the judgment that an object have that property (or stand in that relation) is said to be an *instance* of that judgment form.

A judgment form is also called a *predicate*, and the objects constituting an instance are its *subjects*.

We write `a J` or `J a`, for the judgment asserting that `J` holds of the abt `a`. Correspondingly, we may notate the judgment form `J` by `(− J)` or `(J −)`, using a dash to indicate the absence of an argument to `J`.

When it is not important to stress the subject of the judgment, we write `J` to stand for an unspecified judgment, that is, an instance of some judgment form. For particular judgment forms, we use mixfix notation to enhance readability.

## 2.2 Inference rules

An *inductive definition of a judgment form* consists of a collection of **rules of inference** which have the form

```
J₁ … Jₖ
-------
  J
```

in which `J` and `J₁ … Jₖ` are all judgments of the form being defined.

The judgments above the horizontal line are called the *premises* of the rule, and the judgment below the line is called its *conclusion*.

If a rule has no premises (that is, when k = 0), the rule is an *axiom*; otherwise, it is called a *proper rule*.

An inference rule can be read as stating that the *premises are sufficient for the conclusion*: to show `J`, it is enough to show `J₁ … Jₖ`. When k=0, a rule states that its conclusion holds unconditionally.

In general, there may be many rules with the same conclusion, each specifying sufficient conditions for the conclusion. Consequently, if the conclusion of a rule holds, then it is not necessary that the premises hold, for it might have been derived by another rule.

For example, the following rules form an 
inductive definition of the judgment form `nat`

```
--------------                    (2.2a)
  zero : nat

   a : nat
--------------                    (2.2b)
succ(a) : nat
```

These rules specify that `a nat` holds whenever either `a` is zero, or `a` is `succ(b)`, where `b nat`, for some `b`. Taking these rules to be exhaustive, it follows that `a nat` iff `a` is a natural number.

Inductive definition of the judgment form `tree`

```
------------                      (2.3a)
empty : tree

a₁ : tree    a₂ : tree
-----------------------           (2.3b)
node(a₁, a₂) : tree
```

These rules specify that `a tree` holds if either `a` is empty, or `a` is `node(a₁, a₂)`, where `a₁ tree` and `a₂ tree`. Taking these to be exhaustive, these rules state that `a` is a binary tree, which is to say it is either empty, or a node consisting of two children, each of which is also a binary tree.

The judgment form `a is b` expresses the *equality* of two ABTs `a` and `b` such that `a nat` and `b nat` is inductively defined by the following rules:

```
-------------                     (2.4a)
zero is zero

    a is b
-------------------               (2.4b)
succ(a) is succ(b)
```

In each of the preceding examples, we have made use of a notational convention for specifying an infinite family of rules by a finite number of patterns or **rule schemes**.

For example, rule (2.2b) is a rule scheme that determines one rule, called *an instance of the rule scheme*, for each choice of object `a` in the rule.

We rely on context to determine whether a rule is stated for a specific object `a` or is instead intended as a rule scheme specifying a rule for each choice of objects in the rule.

A collection of rules is considered to define **the strongest judgment form** that is closed under those rules.

To be closed under the rules means 
that the rules are sufficient 
to show the validity of a judgment: 
`J` holds if there is a way to obtain it using the given rules.

To be the strongest judgment form closed under the rules means 
that the rules are also *necessary*: 
`J` holds only if there is a way to obtain it using the given rules.

The *sufficiency* of the rules means 
that we may show that `J` holds by deriving it by *composing rules*. 
The *necessity* of the rules means 
that we may reason about it using *induction on rules*.

## 2.3 Derivations

To show that an inductively defined judgment holds, it is enough to exhibit a derivation of it. A **derivation of a judgment** is a finite composition of rules, starting with the axioms and ending with that judgment. 

It can be thought of as a tree in which each node is a rule whose children are derivations of its premises. 

We sometimes say that a derivation of `J` is evidence for 
the validity of an inductively defined judgment `J`.

For example, this is a derivation of `succ(succ(zero)) : nat`

```
zero nat
---------------
succ(zero) nat
---------------------
succ(succ(zero)) nat
```

To show that an inductively defined judgment is derivable, we need only find a derivation for it. There are two main methods for finding derivations, called forward chaining and backward chaining.

*Forward chaining* (bottom-up construction) starts with the axioms and works forward towards the desired conclusion, whereas *backward chaining* (top-down construction) starts with the desired conclusion and works backwards towards the axioms.

More precisely, **forward chaining** search maintains a set of derivable judgments and continually extends this set by adding to it the conclusion of any rule all of whose premises are in that set. Initially, the set is empty; the process terminates when the desired judgment occurs in the set.

Assuming that all rules are considered at every stage, forward chaining will eventually find a derivation of any derivable judgment, but it is impossible (in general) to decide algorithmically when to stop extending the set and conclude that the desired judgment is not derivable. We may go on and on adding more judgments to the derivable set without ever achieving the intended goal. It is a matter of understanding the global properties of the rules to determine that a given judgment is not derivable.

Forward chaining is undirected in the sense that it does not take account of the end goal when deciding how to proceed at each step. In contrast, backward chaining is *goal-directed*.

**Backward chaining** search maintains a queue of current goals, judgments whose derivations are to be sought. Initially, this set consists solely of the judgment we wish to derive. 

At each stage, we remove a judgment from the queue and consider all rules whose conclusion is that judgment. For each such rule, we add the premises of that rule to the back of the queue, and continue. If there is more than one such rule, this process must be repeated, with the same starting queue, for each candidate rule. 

The process terminates whenever the queue is empty, all goals having been achieved; any pending consideration of candidate rules along the way can be discarded.

As with forward chaining, backward chaining will eventually find a derivation of any derivable judgment, but there is, in general, no algorithmic method for determining in general whether the current goal is derivable. If it is not, we may futilely add more and more judgments to the goal set, never reaching a point at which all goals have been satisfied.

## 2.4 Rule Induction

Because an inductive definition specifies the strongest judgment form closed under a collection of rules, we may reason about them by rule induction.

**The principle of rule induction** states that to show that a property a `P` holds whenever a `J` is derivable, it is enough to show that `P` is closed under the rules defining the judgment form `J`.

More precisely, the property `P` respects the rule
```
J a₁ … J aₖ
-----------
   J a
```

if `P(a)` holds whenever `P(a₁), …, P(aₖ)` do.

Assumptions `P(a₁), …, P(aₖ)` are the *inductive hypotheses*, 
and `P(a)` is the *inductive conclusion of the inference*.

The principle of rule induction is simply the expression of the definition of an inductively defined judgment form as the strongest judgment form closed under the rules comprising the definition.

Thus, the judgment form defined by a set of rules is both
- closed under those rules
- sufficient for any other property also closed under those rules

The former means that a derivation is evidence for the validity of a judgment; the latter means that we may reason about an inductively defined judgment form by rule induction.

When specialized to rules (2.2), the principle of rule induction states that to show `P(a)` whenever `a nat`, it is enough to show:
1. P(zero)
2. forall a. P(a) ⇒ P(succ(a))

The sufficiency of these conditions is *the principle of mathematical induction*.

Similarly, rule induction for rules (2.3) states that to show `P(a)` whenever `a tree`, it is enough to show:
1. P(empty)
2. forall a1 a2. P(a1) ∧ P(a2) ⇒ P(node(a1;a2))

The sufficiency of these conditions is called *the principle of tree induction*.

Predecessor:   
>Lemma 2.1. `succ(a) : nat ⇒ a : nat`

Equality, as defined by rules (2.4) is reflexive:   
>Lemma 2.2. `a : nat ⇒ a = a`

The successor operation is injective:   
>Lemma 2.3. `succ(a1) = succ(a2) ⇒ a1 = a2`



## 2.5 Iterated and Simultaneous Inductive Definitions

Inductive definitions are often iterated, meaning that one inductive definition builds on top of another. In an **iterated inductive definition**, the premises of a rule may be instances of either a previously defined judgment form, or the judgment form being defined.

Frequently two or more judgments are defined at once by a simultaneous inductive definition. A **simultaneous inductive definition** consists of a set of rules for deriving instances of several different judgment forms, any of which may appear as the premise of any rule.

Because the rules defining each judgment form may involve any of the others, none of the judgment forms can be taken to be defined prior to the others. Instead, we must understand that all of the judgment forms are being defined at once by the entire collection of rules.

The judgment forms defined by these rules are, as before, the strongest judgment forms that are closed under the rules.

Therefore, *the principle of proof by rule induction* continues to apply, albeit in a form that requires us to prove a property of each of the defined judgment forms simultaneously.

For example, consider the following rules, which constitute a simultaneous inductive definition of the judgments `a even`, stating that `a` is an even natural number, and `a odd`, stating that `a` is an odd natural number:

```hs
--------------------       (2.8a)
zero even

b odd
--------------------       (2.8b)
succ(b) even

a even
--------------------       (2.8c)
succ(a) odd
```

The principle of rule induction for these rules states that to show simultaneously that `P(a)` whenever `a even`, and `Q(b)` whenever `b odd`, it is enough to show the following:
1. P(zero)
2. Q(b) ⇒ P(succ(b))
3. P(a) ⇒ Q(succ(a))



## 2.6 Defining Functions by Rules

A common use of inductive definitions is to define a function by giving an *inductive definition of its graph relating inputs to outputs*, and then showing that the relation uniquely determines the outputs for given inputs.

For example, we may define the addition function on natural numbers as the relation `sum(a;b;c)`, with the intended meaning that `c` is the sum of `a` and `b`, as follows:

```
b nat
---------------------- (2.9a)
sum(zero;b;b)

sum(a;b;c)
---------------------- (2.9b)
sum(succ(a);b;succ(c))
```

The rules define a ternary relation `sum(a,b,c)` among natural numbers a, b, and c. We may show that `c` is *uniquely determined by* `a` and `b` in this relation.


>(Theorem 2.4) For every `a nat` and `b nat`, there exists a unique `c nat` such that `sum(a,b,c)`, ie. such that the relation `S(a,b,c)` holds.


This is a relational definition of addition as opposed to a functional one:

```hs
-- | relational definition of (type-level) addition:
type Sum (a :: Nat) (b :: Nat) (c :: Nat) :: Nat
class Sum a b c | a b -> c
instance Sum    Z  b    b
instance Sum (S a) b (S c)

-- | functional definition of (term-level) addition:
                    -- c  = a + b
0   + b = b         -- c  = 0 + b = b
S a + b = S (a + b) -- c' = a' + b
```


The proof decomposes into two parts:

<!-- #region Proof -->

<details><summary>Proof</summary>

1. (Existence) If `a nat` and `b nat`, then there is `c nat` st `sum(a,b,c)`.   
   `a:nat ∧ b:nat ⇒ ∃c. c:nat ∧ sum(a,b,c)`   

2. (Uniqueness) If `sum(a,b,c)` and `sum(a,b,c')`, then `c` is `c'`.   
   `sum(a,b,c) = sum(a,b,c') ⇒ c = c'`   


1. For *existence*:   
let `P(a)` be the proposition:   
if `b nat` then there exists `c nat` such that `sum(a,b,c)`, that is   
P(a) := `b:nat ⇒ ∃c. c:nat ∧ sum(a,b,c)`.

Now we prove that `a:nat ⇒ P(a)` by rule induction on rules (2.2):

We have two cases to consider:
1.1 P(0)       :=  b:nat ⇒ ∃c. sum(a,b,c)   where c=b
1.2 P(succ(a)) := [b:nat ⇒ ∃c. sum(a,b,c)] ⇒ [b':nat ⇒ ∃c'. sum(succ(a),b',c')]


1.1 Rule (2.2a) We are to show `P(0)`.   
  Assuming `b:nat` and taking `c = b`   
  we obtain `sum(0,b,b)` ie. `sum(0,b,c)` by rule (2.9a).

1.2 Rule (2.2b) Assuming `P(a)`, we are to show `P(succ(a))`.   
  That is, we assume that:   
    if `b:nat`   
    then there exists `c`   
    such that `sum(a,b,c)`   
  And we need to show that:    
    if `b':nat`,   
    then there exists `c'` 
    such that `sum(succ(a),b',c')`.   

  To this end, suppose that there is a `b':nat`.   
  Then by induction   
    there exists `c`   
    such that `sum(a,b',c)`.   
  Taking `c' = succ(c)` and applying rule (2.9b)   
  we obtain `sum(succ(a),b',c')`, as required.

---

2. (Uniqueness) If `sum(a,b,c)` and `sum(a,b,c')`, then `c` is `c'`.   
   `sum(a,b,c) = sum(a,b,c') ⇒ c = c'`   


2. For *uniqueness*,   
we prove that 
if `sum(a,b,c₁)` 
then 
  if `sum(a,b,c₂)`
  then `c₁ = c₂` 
  by rule induction based on rules (2.9).

```
a = 0, c₁ = b
sum(a,b,c₁) = sum(a,b,c₂) ⇒ c₁ = c₂
sum(0,b,c₁) = sum(0,b,c₂) ⇒ c₁ = c₂
sum(0,b,b) = sum(0,b,c₂) ⇒ b = c₂
```

1.1 Rule (2.9a) 
  We have `a = 0` and `c₁ = b`. 
  By an inner induction on the same rules, 
  we show that 
    if `sum(0,b,c₂)` 
    then `c₂ = b`. 
  By Lemma 2.2, we obtain `b = b`.


1.2 Rule (2.9b)   
We have that `a = succ(a')` and `c₁ = succ(c₁')` where `sum(a',b,c₁')`.

By an inner induction on the same rules, 
we show that 
if `sum(a,b,c₂)` 
then `c₂ = succ(c₂')` 
where `sum(a',b,c₂')`.

By the outer inductive hypothesis, 
`c₁' = c₂'` and so `c₁ = c₂`.

</details>

<!-- #endregion -->
