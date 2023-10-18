# MLTT in Agda :: Equality

Equality - whether the equality of types or the equality of terms (of the same type, of course) is a very complex and complicated subject in type theory in general, but particularly in MLTT and then some in Homotopy Type Theory (HoTT) and related type theories like Cubical Type Theory (CTT).

## Basic judgements in MLTT

Of the 4 basic judgements in MLTT, 2 are about equality:

```hs
               A B type
-------       ---------
A type          A ≡ B


A type        A type    x y : A
------        ------------------
x : A              x ≡ y
```

There is a judgement about type formation, `A type`, meaning that `A` is a well-founded type, usually in some context Γ, as `Γ ⊢ A type`.

There is a judgement about the equality of types: if `A` and `B` are types, then the judgement that they are equal types (in a context Γ) is `Γ ⊢ A ≡ B`.

There is a judgement about term formation, `Γ ⊢ x : A`, which means that `x` is a term of type `A` (assuming `A` is a well-founded type).

There is a judgement about the equality of terms: if `x` and `y` are terms of a type `A`, then the judgement that they are equal (in a context Γ) is denoted by `Γ ⊢ x ≡ y : A`.

Equality obviously plays a significant role in MLTT, but before we take on the identity types (which embed equality relations), let's start with something more digestable.

## Propositions and predicates

First, let's define the type of the natural numbers to have a concrete type for the discussion. The type of the natural numbers, `ℕ`, is an inductive type, i.e. a recursively defined type. Induction and recursion are the two sides of the same coin: recursion is usually used in definitions (formation and introduction rules) and induction in elimination rules.

The two inference rules that define the naturals are also two of the 5 Peano's axioms (in modern treatment of Peano axioms; originally, Peano had 9 axioms).

```
                    n : ℕ
---------         ---------
zero : ℕ          suc n : ℕ
```

The definition in Agda is translation of these two inference rules:

```agda hs
data ℕ : Set where
  zero : ℕ
  suc  : ℕ → ℕ
```

## Inference rule for equality on ℕ

The following two rules of inference were part of the Peano's original 9 axioms:

```
              m = n
------      ----------
0 = 0       S m = S n
```

## Boolean-valued functions

In many programming languages, a function that returns a Boolean value is called a predicate.

NOTE: In math, the proper name for such functions is *Boolean-valued functions* (but when the context makes it clear, the suffix "-valued" is often dropped), since they take a value of any type `A` as input and return a value of the Boolean type, `A ⟼ 𝔹`. Functions that operate solely on the Boolean domain, `𝔹 ⟼ 𝔹`, are called *Boolean functions*.

## Predicates in logic

In math, and particularly in mathematical logic, the term "predicate" has little to do with functions, Boolean or otherwise. In First-Order Predicate Logic, a predicate is, most generally, an `n`-ary relation that relates `n` elements from the domain of Discourse (DOD). In Higher-Order Predicate Logic, predicates can additionally relate other predicates. And Propositional Logic lacks predicates entirely. All it has are propositions, which are wholesome sentencies (and the reason it is also called Sentential Logic, SL) that cannot be broken down further.

It was this robustness of SL that led to the development of predicate logic where propositions have a more granular structure that can be decomposed into the smaller constituent parts. The main two of these constituent parts play the same role, and thus have the same name, as their analogues in linguistics - namely, the subject and the predicate. In predicate logic, the **subject** of a propositional sentence is an element from the DOD, represented by a *constant* (commonly from the begging of the Latin alphabet, e.g. `a`) or by *variable* (commonly from the end of the Latin alphabet, e.g. `x` is always popular) that ranges over the DOD.

The predicate of a propositional sentence is a verb-phrase that would also be a predicate in the corresponding orginal, natural language, sentence. In fact, logic predicates comprise much more parts of a sentence - parts that would perhaps be classified as predicates in the most general view of a liguistical model, but which would, in any narrower view, have their own functional role - e.g. adverbial-phase, or even object-phase - these are all rolled up into a predicate in logic. Basically, predicate logic only recognizes subjects and predicates, but the subjects are not that important - it is all about predicates. Even the attributes and properties of individuals are expressed as predicates; e.g. the sentence "Socrates is mortal" is entirely expressed as a predicate `M(s)` (where `M` is "is mortal", and `s` stands for Socrates).

In logic, predicates are relations, but the two terms are used synonymously most of the time. To emphasize that a relation/predicate is unary, it is sometimes called a *property*. Binary relations, which are by far the most common, are usually referred to as *predicates* (compared to being referred to as relations), while relations of bigger arities are more often called just *relations* (compared to being referred to as predicates).

In brief, the term "property" always refers to a unary (n = 1) predicate, the term "relation" is often used to refer to a polyadic (n > 2) predicate, while the term "predicate" is used whenever, but almost always for binary (n = 2) relations. Another thing… sometimes, in order to uniformly treat the objects of a formal language, constants are considered as nullary (n = 0) predicates. In any case, things predicate on a predicate - that's predication for you.

## Predicates in type theory

[clarification-following-comprehension-expected] In type theory, a predicate is a type. A proposition is a type. Propositions and predicates are (probably) the same thing. Hmm, although Agda has an extension that turns on a special type of universe called `Prop`; which (I think) classifies (truncated?) propositions. Then the types of (proper? regular?) predicates are classified by the usualy universe, `Set`(?). (There is also the `SSet` universe thingy type).

In type theory, a proposition is a type, which should follow from the propositions-as-types principle. In fact, I don't think it is. A proposition may be a type, but generally it may be something more. That is, a simple mathematical proposition can probably be represented in Agda by a single (atomic) type, but more complicated propositions may require a representation that goes beyond asingle (atomic) type; in which case, isn't it also said that such a propostion is also a type? Just a more complicated (non-atomic) type. That seems right. So a mathematical proposition is, before anything else, first translated into Agda.







PLs, the equality of the naturals is expressed in terms of 


We can define such a Boolean-valued function by translating the two inference rules to Agda (assuming the `Bool` type already exists):

```agda hs
are-equal : ℕ → ℕ → Bool
are-equal      0       0  = true
are-equal      0  (suc n) = false
are-equal (suc m) (suc n) = are-equal m n
```

All Boolean predicates can be expressed in terms of genral predicates, but not vice versa. However, Boolean predicates are generally decidable, i.e. they compute down to a value, which, in general, is not the case with general predicates.

>A general predicate, `P : A → Set` is decidable if it can be represented as a Boolean-valued function `f : A → Bool`.

The conversion from a general predicate into a Boolean-valued function looks whether the type that represents the predicate is inhabited (in which case the function returns 'true'), or uninhabited (returns 'false').

A Boolean-valued function or a Boolean predicate that computes whether two naturals are equal can only ever tell us a single bit of information: if they equal it returns 'true', otherwise 'false'. As opposed to Boolean predicates, general predicates can tell us a lot more besides the basic fact whether the equality holds or not. They also hold the witnessing term that testifies to the proof.

How these term look can be seen if we specialize a general predicate to the natural numbers.

### An equality predicate specialized to ℕ

The inference rule for equality on ℕ, stated above, should be named so we can refer to each rule individually, but also in order to record their use.

```
                       p : m ≡ᴺ n
------------      -------------------
z≡ᴺz : 0 ≡ᴺ 0       s≡ᴺs p : S m ≡ᴺ S n
```

In Agda, the symbol `≡` is often chosen for general equality, `A ⟼ Set`, so we attach a superscipt to it, using it as `≡ᴺ`, in order to express equality over the natural numbers only.

We can first translate the Boolean-valued function into a function that just returns either the empty type (corresponding to 'false') or the unit type (corresponding to 'true').

```hs
_≣_ : ℕ → ℕ → Type
0      ≣ 0      = 𝟙
0      ≣ succ y = 𝟘
succ x ≣ 0      = 𝟘
succ x ≣ succ y = x ≣ y
```

However, this function doesn't give us any more information than the Boolean function `are-equal`.





Because two nats can only be equal in one way.




## General predicates

```
data _≡ᴺ_ : ℕ → ℕ → Set where
  z≡ᴺz :                          0 ≡ᴺ 0
  s≡ᴺs : {m n : ℕ} → m ≡ᴺ n → suc m ≡ᴺ suc n

data even : ℕ → Set where
  even-z : even 0
  even-s : {n : ℕ} → even n → even (S S n)

data _≠0 : ℕ → Set where
  suc≠0 : {n : ℕ} → suc n ≠0

data _≤_ : ℕ → ℕ → Set where
  z≤n :   {n : ℕ} →             0 ≤ n
  s≤s : {m n : ℕ} → m ≤ n → suc m ≤ suc n


n+0≡n : (n : ℕ) → n + 0 ≡ n
n+0≡n    0                    = refl
n+0≡n (suc n) rewrite n+0≡n n = refl


data _≡_ {A : Set} (x : A) : A → Set where
  refl : x ≡ x

data _≡_ {𝓁 : Level} {A : Set 𝓁} (x : A) : A → Set 𝓁 where
  refl : x ≡ x
```
