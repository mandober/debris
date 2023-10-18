# 1. Judgments and Rules :: 3. Hypothetical and General Judgments

3. Hypothetical and General Judgments
  3.1 Hypothetical Judgments
    3.1.1 Derivability
    3.1.2 Admissibility
  3.2 Hypothetical Inductive Definitions
  3.3 General Judgments
  3.4 Generic Inductive Definitions

## 3 Hypothetical and General Judgments

- hypothetical judgment
  (entailment aspects)
  - derivability
  - admissibility
- general judgment
  - generic
  - parametric

A **hypothetical judgment** expresses an entailment between one or more hypotheses and a conclusion.

We will consider two notions of entailment, called *derivability* and *admissibility*. Both express a form of entailment, but they differ in that derivability is stable under extension with new rules, admissibility is not. 

A **general judgment** expresses the *universality (genericity) of a judgment*. There are two forms of general judgment: generic and parametric. 

A **generic judgment** expresses generality with respect to 
all *substitution* instances for variables in a judgment.

A **parametric judgment** expresses generality with respect to 
*renamings* of symbols.

## 3.1 Hypothetical Judgments

A **hypothetical judgment** expresses an entailment between one or more hypotheses and a conclusion.

We consider two notions of entailmentl: derivability and admissibility. Both express a form of entailment, but they differ in that *derivability is stable under extension with new rules*, admissibility is not.

A hypothetical judgment codifies the rules for expressing the validity of a conclusion conditional on the validity of one or more hypotheses.

There are two forms of hypothetical judgment that differ according to the sense in which the conclusion is conditional on the hypotheses. One is stable under extension with more rules, and the other is not.

### 3.1.1 Derivability

For a given set `R` of rules, we define the *derivability judgment*, written `J₁ … Jₖ |-ʀ K`, where each `Jᵢ` and `K` are basic judgments, to mean that we may derive `K` from the expansion `R ⋃ {J₁ … Jₖ}` of the rules `R` with the axioms

```
-----   …   ------
 J₁           Jₖ
```

We treat the hypotheses, or antecedents, of the judgment, `J₁ … Jₖ` as "temporary axioms", and derive the conclusion, or consequent, by composing rules in `R`.

Thus, evidence for a hypothetical judgment consists of a derivation of the conclusion from the hypotheses using the rules in `R`.

We use `Γ`, `Δ`, to stand for a finite set of basic judgments.

We write `R ⋃ Γ` for the expansion of `R` with 
an axiom corresponding to each judgment in `Γ`.

The judgment `Γ |-ʀ K` means that `K` is derivable from rules `R ⋃ Γ`.

The judgment `|-ʀ Γ` means that `|-ʀ J` for each `J` in `Γ`.


An equivalent way of defining `J₁ … Jₙ |-ʀ J` is to say that the rule
```
J₁ … Jₙ
------- (3.1)
   J
```
is derivable from `R`, which means that there is a derivation of `J` composed of the rules in `R` augmented by treating `J₁ … Jₙ` as axioms.

For example, consider the derivability judgment relative to rules (2.2):   
`a nat |- succ(succ(a)) nat`

This judgment is valid for any choice of object `a`, as shown by the derivation

```
a nat
-----------
succ(a) nat
-----------------
succ(succ(a)) nat
```

which composes rules (2.2), starting with `a nat` as an axiom, and ending with `succ(succ(a)) nat`.


Equivalently, the validity of 
`a nat |- succ(succ(a)) nat` 
may also be expressed by stating that the rule

```
a nat
------------------ (3.4)
succ(succ(a)) nat
```

is derivable from rules (2.2).

It follows directly from the definition of derivability that it is stable under extension with new rules.


>(Theorem 3.1) **Stability**: If `Γ |-{R} J` then `Γ |-{R ⋃ R'} J`

Proof: Any derivation of `J` from `R ⋃ Γ` 
is also a derivation from `(R ⋃ R') ⋃ Γ` 
because any rule in `R` is also a rule in `R ⋃ R'`. 
(derivibility is stable under expansion of rules)


Derivability enjoys a number of *structural properties* that follow from its definition, independently of the particular rules `R`:
- *Reflexivity*: every judgment is a consequence of itself.
- *Weakening*: entailment is not influenced by un-exercised options.
- *Transitivity*: If we replace an axiom by a derivation of it, the result is a derivation of its consequent without that hypothesis.

Reflexivity follows directly from the meaning of derivability. Weakening follows directly from the definition of derivability. Transitivity is proved by rule induction on the first premise.

### 3.1.2 Admissibility

Admissibility, written `Γ |=ʀ J`, is a weaker form of hypothetical judgment stating that `|-ʀ Γ` implies `|-ʀ J`.

That is, the conclusion `J` is derivable from rules `R` when the assumptions `Γ` are all derivable from rules `R`.

In particular if any of the hypotheses are not derivable relative to `R`, then the judgment is *vacuously true*.

An equivalent way to define the judgment `J₁, …, Jₙ |=ʀ J` is to state that the rule `J₁, …, Jₙ |- J` is admissible relative to the rules in `R`. Given any derivations of `J₁, …, Jₙ` using the rules in `R`, we may build a derivation of `J` using the rules in `R`.

For example, the admissibility judgment

```
succ(a) even |={2.8} a odd                 (3.6)
```

is valid, because any derivation of `succ(a) even` from rules (2.2) must contain a subderivation of `a odd` from the same rules, which justifies the conclusion.

That judgment (3.6) is valid may also be expressed by saying that the rule

```hs
succ(a) even
------------- (3.7)
a odd
```

is *admissible relative to rules* (2.8).

>In contrast to derivability the admissibility judgment is **not stable** under extension to the rules.

For example, if we enrich rules (2.8) with the axiom 

```hs
--------------- (3.8)
succ(zero) even
```

then rule (3.6) is inadmissible, because there is no composition of rules deriving `zero odd`.

Admissibility is as sensitive to which rules are absent from an inductive definition as it is to which rules are present in it.

The structural properties of derivability ensure that derivability is stronger than admissibility.

>Theorem 3.2. If `Γ |=ʀ J` then `Γ |-ʀ J`

Evidence for admissibility can be thought of as a mathematical function transforming derivations of the hypotheses into a derivation of the consequent.

Therefore, the admissibility judgment enjoys the same structural properties as derivability and hence is a form of hypothetical judgment:

- *Reflexivity*: If `J` is derivable from the original rules, then `J` is derivable from the original rules;
`J |=ʀ J`

- *Weakening*: If `J` is derivable from the original rules assuming that each of the judgments in `Γ` are derivable from these rules, then `J` must also be derivable assuming that `Γ` and `K` are derivable from the original rules; 
`(Γ |=ʀ J) ⇒ (Γ, K |=ʀ J)`

- *Transitivity*: If `Γ, K |=ʀ J` and `Γ |=ʀ K`, then `Γ |=ʀ J`. If the judgments in `Γ` are derivable, so is `K`, by assumption, and hence so are the judgments in `Γ`, `K`, and hence so is `J`.
`(Γ, K |=ʀ J) ∧ (Γ |=ʀ K) ⇒ (Γ |=ʀ J)`


>(Theorem 3.3) Admissibility judgment `Γ |=r J` enjoys the structural properties of entailment.


## 3.2 Hypothetical Inductive Definitions

It is useful to enrich the concept of an inductive definition to allow rules with derivability judgments as premises and conclusions. Doing so lets us introduce local hypotheses that apply only in the derivation of a particular premise, and also allows us to constrain inferences based on the global hypotheses in effect at the point where the rule is applied.

A hypothetical inductive definition consists of a set of hypothetical rules of the following form:

```hs
Γ Γ₁ |- J₁ … Γ Γₙ |- Jₙ
------------------------ (3.9)
          Γ J
```

The hypotheses `Γ` are the global hypotheses of the rule, and the hypotheses `Γᵢ` are the local hypotheses of the ith premise of the rule.
