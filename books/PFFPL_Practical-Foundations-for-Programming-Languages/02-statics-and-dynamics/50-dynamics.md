# 2. Statics and Dynamics :: 5. Dynamics

5. Dynamics
  5.1 Transition Systems
  5.2 Structural Dynamics
  5.3 Contextual Dynamics
  5.4 Equational Dynamics

## 5. Dynamics

The dynamics of a language describes how programs are executed.

The most important way to define the dynamics of a language is by the method of **structural dynamics**, which defines a transition system that inductively specifies the step-by-step process of executing a program.

Another method for presenting dynamics, called **contextual dynamics**, is a variation of structural dynamics in which the transition rules are specified in a slightly different way.

An **equational dynamics** presents the dynamics of a language by a collection of rules defining when one program is definitionally equivalent to another.

## 5.1 Transition Systems

A transition system is specified by the following four forms of judgment:
1. `s state`, asserting that `s` is a state of the transition system
2. `s final`, where `s state`, asserting that `s` is a final state
3. `s initial`, where `s state`, asserting that `s` is an initial state
4. `s ⟼ s'`, where `s, s' state`, asserting that state `s` transitions to `s'`

In practice, we always arrange things so that no transition is possible from a final state: if `s final`, then there is no `s' state` such that `s ⟼ s'`.

A state from which no transition is possible is *stuck*. Whereas all final states are, by definition, stuck, there may be stuck states in a transition system that are not final.

A transition system is *deterministic* iff for every state `s` there exists at most one state `s'` such that `s ⟼ s'`; otherwise, it is *non-deterministic*.

A *transition sequence* is a sequence of states `s₀, …, sₙ` such that `s₀ initial`, and `sᵢ ⟼ sᵢ﹢₁` for every 0 ≤ i < n.

A transition sequence is *maximal* iff there is no `s` such that `sₙ ⟼ s`, and it is *complete* iff it is maximal and `sₙ final`. Thus, every complete transition sequence is maximal, but maximal sequences are not necessarily complete.

The judgment `s ↓` means that there is *complete transition sequence* starting from `s`, which is to say that there exists `s' final` such that `s ⟼ s'`.

The *iteration* of transition judgment `s ⟼* s'` is inductively defined:

```hs
-------------------- (5.1a)
s ⟼* s'

s ⟼ s'   s' ⟼* s''
-------------------- (5.1b)
s ⟼* s''
```

When applied to the definition of iterated transition, the principle of rule induction states that to show that `P(s, s')` holds when `s ⟼* s'`, it is enough to show these two properties of `P`:
1. `P(s, s)`
2. if `s ⟼ s'` and `P(s', s'')`, then `P(s, s'')`

The first requirement is to show that `P` is reflexive. The second is to show that `P` is closed under *head expansion*, or closed under *inverse evaluation*. Using this principle, it is easy to prove that `⟼*` is reflexive and transitive.

The *n-times iterated* transition judgment `s ⟼ⁿ s'`, where n ≥ 0, is inductively defined by the following rules:

```
---------------------- (5.2a)
s ⟼⁰ s

s ⟼ s'   s' ⟼ⁿ s''
---------------------- (5.2b)
s ⟼ⁿᐩ¹ s''
```

>(Theorem 5.1) For all states `s` and `s'`, `s ⟼* s'` iff `s ⟼ᵏ s'` for some k ≥ 0.

Proof: From left to right, by induction on the definition of multi-step transition. From right to left, by mathematical induction on k ≥ 0.

## 5.2 Structural Dynamics

A *structural dynamics* for the language E is given by a transition system whose states are closed expressions.

All states are initial. The final states are the *(closed) values*, which represent the completed computations.

The judgment `e val`, which states that `e` is a value, is inductively defined by the following rules:

```hs
----------- (5.3a)
num[n] val

----------- (5.3b)
str[s] val
```

The transition judgment `e ⟼ e'` between states is inductively defined by the following rules:

```hs
          n₁ + n₂ = n
--------------------------------- (5.4a) instruction trans
plus(num[n₁]; num[n₂]) ⟼ num[n]

          e₁ ⟼ e₁'
--------------------------------- (5.4b) search trans
plus(e₁; e₂) ⟼ plus(e₁'; e₂)

          e₂ ⟼ e₂'
--------------------------------- (5.4c) search trans
plus(v ; e₂) ⟼ plus(v ; e₂')
--   ^               ^
--      v = e₁ val



        s₁ ^ s₂ = s str
---------------------------------- (5.4d)  instruction trans
cat(str[s₁]; str[s₂]) ⟼ str[s]

         e₁ ⟼ e₁'
---------------------------------- (5.4e) search trans
cat(e₁; e₂) ⟼ cat(e₁'; e₂)

         e₂ ⟼ e₂'
---------------------------------- (5.4f) search trans
cat(v ; e₂) ⟼ cat(v; e₂')
--  ^              ^
--     v = e₁ val


⎡            e₁ ⟼ e₁'                                 ⎤
⎢ -------------------------------- (5.4g) search trans ⎥
⎣ let(e₁; x.e₂) ⟼ let(e₁'; x.e₂)                      ⎦


⎡ e₁ val ⎤
----------------------------- (5.4h) instruction trans
let(e₁; x.e₂) ⟼ [x:=e₁]e₂
```

We have omitted rules for multiplication and computing the length of a string, which follow a similar pattern.

Rules (5.4a), (5.4d), and (5.4h) are *instruction transitions* that correspond to the primitive steps of evaluation.

The remaining rules are *search transitions* that determine the order of execution of instructions.

The entire rule (5.4g) and the premise on rule (5.4h) are bracketed to indicate that this rule and premise are *included in by-value* interpretation and *omitted in by-name* interpretation.

The *by-value interpretation* evaluates an exp before binding it to a variable, whereas the *by-name interpretation* binds the exp in its unevaluated form. The by-value interpretation saves work if the bound variable is used more than once, but wastes work if it is not used at all. Conversely, the by-name interpretation saves work if the defined variable is not used, and wastes work if it is used more than once.

The principle of rule induction for the structural dynamics of E states that to show `P(e ⟼ e')` when `e ⟼ e'`, it is enough to show that `P` is closed under rules (5.4).

For example, we may show by rule induction that the structural dynamics of E is *determinate*, which means that an expression may transition to at most one other expression. The proof
requires a simple lemma relating transition to values.

>(Lemma 5.2) **Finality of Values**. For no expression `e` do we have both `e val`, and `e ⟼ e'` for some `e'`.

>(Lemma 5.3) **Determinacy**. If `e ⟼ e'` and `e ⟼ e''`, then `e'` and `e''` are α-equivalent.

Proof: By rule induction on the premises `e ⟼ e'` and `e ⟼ e''`, carried out either simultaneously or in either order. The primitive operators, such as addition, are assumed to
have a unique value when applied to values.

The rules (5.4) above exemplify the inversion principle of language design. The inversion principle is central to ensuring that a programming language is properly defined.

**Inversion principle** of language design states that the elimination forms are inverse to the introduction forms of a language.

The search rules determine the *principal arguments* of each elimination form, and the instruction rules specify how to evaluate an elimination form when all of its principal arguments are in introduction form.

For example, the rules above specify that both arguments of addition are principal and specify how to evaluate an addition once its principal arguments are evaluated to numerals.

## 5.3 Contextual Dynamics

A variant of structural dynamics, called contextual dynamics, is sometimes useful. There is no fundamental difference between contextual and structural dynamics, but rather one of style.

The main idea is to isolate instruction steps as a special form of judgment, called *instruction transition*, and to formalize the process of locating the next instruction using a device called an *evaluation context*.

The judgment `e val` defining whether an expression is a value, remains unchanged.

The instruction transition judgment `e1 → e2` for E is defined by the following rules, together with similar rules for multiplication of numbers and the length of a string.

```hs
          m + n = p
---------------------------------- (5.5a)
plus(num[m]; num[n]) → num[p]

        s ^ t = u str
---------------------------------- (5.5b)
cat(str[s]; str[t]) → str[u]

---------------------------------- (5.5c)
let(e₁; x.e₂) ⟼ [x:=e₁]e₂
```

The judgment `𝓔 ectxt` determines the location of the next instruction to execute in a larger expression.

The position of the next instruction step is specified by a "hole" written `◦`, into which the next instruction is placed.

```hs

-------- (5.6a)
◦ ectxt

     𝓔₁ ectxt
------------------- (5.6b)
plus(𝓔₁; e₂) ectxt

e₁ val   𝓔₂ ectxt
------------------- (5.6c)
plus(e1; 𝓔₂) ectxt
```

The first rule for evaluation contexts specifies that the next instruction may occur "here" at the occurrence of the hole.

The remaining rules correspond one-for-one to the search rules of the structural dynamics. For example, rule (5.6c) states that in an exp `plus(e1; e2)`, if the first arg, `e1`, is a value, then the next instruction step, if any, lies at or within the second arg, `e2`.

An *evaluation context* is a template that is instantiated by replacing the *hole* with an *instruction to be executed*.

The judgment `e' = 𝓔{e}` states that the expression `e'` is the result of filling the hole in the evaluation context `𝓔` with the exp `e`.

It is inductively defined by the following rules:

```hs

--------- (5.7a)
e = ◦{e}

         e₁ = 𝓔₁{e}
------------------------------- (5.7b)
plus(e₁;e₂) = plus(𝓔₁; e₂){e}

e₁ val    e₂ = 𝓔₂{e}
------------------------------- (5.7c)
plus(e₁; e₂) = plus(e1; 𝓔₂){e}
```


(...)

## 5.4 Equational Dynamics

Another formulation of the dynamics of a language regards computation as a form of *equational deduction*, much in the style of elementary algebra.

We thus obtain a model of computation in which the value of a polynomial for a given value of its variable is determined by substitution and simplification.

Very similar ideas give rise to the concept of **definitional or computational equivalence** of expressions in E, which we write as

`𝓧 | Γ e ≡ e' : τ`

where `Γ` consists of one assumption of the form `x : τ` for each `x ∈ 𝓧`.

Definitional equality of expressions in E under the by-name interpretation of let is inductively defined by the following rules:

```hs
------------------ (5.10a) REFLEXIVITY
Γ |- e ≡ e : τ


Γ |- e′ ≡ e : τ
------------------ (5.10b) SYMMETRY
Γ |- e ≡ e′ : τ


Γ |- e ≡ e′ : τ    Γ |- e′ ≡ e′′ : τ
-------------------------------------- (5.10c) TRANS
        Γ |- e ≡ e′′ : τ



Γ |- e₁ ≡ e₁′ : num    Γ |- e₂ ≡ e₂′ : num
-------------------------------------------- (5.10d)
Γ |- plus(e₁; e₂) ≡ plus(e₁′; e₂′) : num


Γ |- e₁ ≡ e₁′ : str    Γ |- e₂ ≡ e₂′ : str
-------------------------------------------- (5.10e)
Γ |- cat(e₁; e₂) ≡ cat(e₁′; e₂′) : str


Γ |- e₁ ≡ e₁′ : τ₁    Γ, x:τ₁ |- e₂ ≡ e₂′ : τ₂
---------------------------------------------- (5.10f)
Γ |- let(e₁; x.e₂) ≡ let(e₁′; x.e₂′) : τ₂



              n₁ + n₂ is n nat
-------------------------------------------- (5.10g)
Γ |- plus(num[n₁]; num[n₂]) ≡ num[n] : num


              s₁ ^ s₂ = s str
-------------------------------------------- (5.10h)
Γ |- cat(str[s1]; str[s₂]) ≡ str[s] : str


------------------------------------ (5.10i)
Γ |- let(e₁; x.e₂) ≡ [x:=e₁]e₂ : τ
```

The first 3 rules state that definitional equality is an *equivalence relation* (refl, symm, trans).

Rules (5.10d) through (5.10f) state that definitional equality is a *congruence relation*, which means that it is compatible with all expression-forming constructs in the language.

Rules (5.10g) through (5.10i) specify the meanings of the primitive constructs of E.

We say that rules (5.10) define *the strongest congruence closed under rules* the last 3 rules.


Definitional equality is rather weak in that many equivalences that we might intuitively think are true are not derivable from rules (5.10).

A prototypical example is the supposed equivalence

```hs
x1:num, x2:num |- x1 + x2 ≡ x2 + x1 : num   -- (5.11)
```

which, intuitively, expresses the commutativity of addition.

This equivalence is not derivable from rules (5.10). 
And yet we may derive all of its closed instances,

```hs
n1 + n2 ≡ n2 + n1 : num  -- (5.12)
```

where `n1 nat` and `n2 nat` are particular numbers.

The "gap" between a general law (such as Equation 5.11), and all of its instances (given by Equation 5.12), may be filled by enriching the notion of equivalence to include a principle of proof by mathematical induction. Such a notion of equivalence is sometimes called *semantic equivalence*, because it expresses relations that hold by virtue of the dynamics of the expressions involved.

>(Theorem 5.5) For the expression language E, the relation `e ≡ e' : τ` holds iff there exists `e0 val` such that `e ⟼∗ e0` and `e' ⟼∗ e0`.


## History

The use of transition systems to specify the behavior of programs goes back to the early work of Church and Turing on computability. Turing's approach emphasized the concept of an abstract machine consisting of a finite program together with unbounded memory.

Computation proceeds by changing the memory in accordance with the instructions in the program. Much early work on the operational semantics of programming languages, such as the SECD machine (Landin, 1965), emphasized machine models.

Church's approach emphasized the language for expressing computations and defined execution in terms of the programs themselves, rather than in terms of auxiliary concepts such as memories or tapes.

Plotkin's elegant formulation of structural operational semantics (Plotkin, 1981), which we use heavily throughout this book, was inspired by Church's and Landin's ideas (Plotkin, 2004).

Contextual semantics, which was introduced by Felleisen and Hieb (1992), may be seen as an alternative formulation of structural semantics in which "search rules" are
replaced by "context matching." 

Computation viewed as equational deduction goes back to the early work of Herbrand, Godel, and Church.
