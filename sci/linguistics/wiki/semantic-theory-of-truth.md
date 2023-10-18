# Semantic theory of truth

https://en.wikipedia.org/wiki/Semantic_theory_of_truth
https://en.wikipedia.org/wiki/Convention_T

>A *semantic theory of truth* is a theory of truth in the *philosophy of language* which holds that *truth is a property of sentences*.

- philosophy of language:
  - theories of truth:
    - semantic theory of truth:
      - truth is a property of a sentence

## TOC

- Origin
- Tarski's theory of truth
- Kripke's theory of truth

## Origin

The *semantic theory of truth* is related in different ways to both the *correspondence theory of truth* and the *deflationary theory of truth*.

In his 1935 book "On the Concept of Truth in Formal Languages", the Polish logician Alfred Tarski attempted to formulate a new semantic theory of truth, later named *Tarski's theory of truth*.

Tarski's motivation was to resolve the liar paradox, which is a paradox in logic, formulated way back in the ancient Greece, that still wasn't resolved in a satisfactory manner (spoiler: Tarski solution stands but it is not very satisfactory as it requires making sacrifices, vis-a-vis natural languages). The liar paradox can be expressed as "This sentence is false", so the truth value of this proposition is a tricky question.

In the course of writing his theory, Tarski made several metamathematical discoveries, most notably his undefinability theorem using the same formal technique Gödel used in his incompleteness theorems. Roughly, *Tarski's undefinability theorem* states that a truth-predicate satisfying Convention T for the sentences of a given language cannot be defined within that language.

## By the way: Object language and metalanguage

To formulate linguistic theories without semantic paradoxes it is necessary to distinguish the *object language* (used to express the formal objects of study) from the *metalanguage* (language used to talk about the object language).

For example, symbolic language of logic is often used in math, but it is discussed using English. When an italian is learning English, then Italian is their metalanguage and English is the object language. It is also possible to use the same language as both the object language and the metalanguage.

~ ~ ~

Below, in describing the Tarski's theory of truth, quoted text is use of the object language, while unquoted text is use of the metalanguage.

A quoted sentence, such as "P", is always the metalanguage name for the sentence, such that this name is simply the sentence P rendered in the object language.

In this way, the metalanguage can be used to talk about the object language. Tarski's theory of truth demands that the object language is contained in the metalanguage (e.g. using English as both languages).

## Tarski's theory of truth

**Tarski's material adequacy condition**, aka **Convention T**, holds that any viable theory of truth must entail, for every sentence "P", a sentence of the following form, known as "form (T)":
- (1) "P" is true iff, P.

For example:
- (2) 'snow is white' is true iff snow is white.

The sentences such as this one are called *"T-sentences"*. They look trivial because English is used as both object and meta language.

Another example with German as the object language:
- (3) 'Schnee ist weiß' is true iff snow is white.


The point of this dance - suffixing a sentence "P" with "… is true iff P" - is to tackle the liar's paradox. Normal, unparadoxical sentences retain their original truth value, just looking slightly weird when the suffix is attached. However, the paradoxical sentence "This sentence is false" becomes:

'This sentence is false' is true iff this sentence is false.    (So what...?)

~ ~ ~

Alfred Tarski diagnosed the paradox as arising only in languages that are *semantically closed*, by which he meant a language in which it is possible for one sentence to predicate truth (or falsehood) of another sentence in the same language (or even of itself).

To avoid self-contradiction, it is necessary when discussing truth values to envision levels of languages, each of which can predicate truth (or falsehood) only of languages at a lower level.

So, when one sentence refers to the truth-value of another, it is semantically higher. The sentence referred to is part of the "object language", while the referring sentence is considered to be a part of a "meta-language" with respect to the object language.

It is legitimate for sentences in "languages" higher on the semantic hierarchy to refer to sentences lower in the "language" hierarchy, but not the other way around. This prevents a system from becoming self-referential.

However, this system is incomplete. One would like to be able to make statements such as "For every statement in level α of the hierarchy, there is a statement at level α+1 which asserts that the first statement is false". This is a true, meaningful statement about the hierarchy that Tarski defines, but it refers to statements at every level of the hierarchy, so it must be above every level of the hierarchy, and is therefore not possible within the hierarchy (although bounded versions of the sentence are possible).

Saul Kripke is credited with identifying this incompleteness in Tarski's hierarchy, and it is recognized as a general problem in hierarchical languages.

~ ~ ~

It is important to note that as Tarski originally formulated it, his theory applies only to formal languages (cf. also semantics of first-order logic).

He gave a number of reasons for not extending his theory to natural languages, including the problem that there is no systematic way of deciding whether a given sentence of a natural language is well-formed, and that a natural language is closed (that is, it can describe the semantic characteristics of its own elements). 

But Tarski's approach was extended by Davidson into an approach to theories of meaning for natural languages, which involves treating "truth" as a primitive, rather than a defined, concept (see truth-conditional semantics).

Tarski developed the theory to give an inductive definition of truth as follows (see T-schema). 

For a language L containing ¬ ("not"), ∧ ("and"), ∨ ("or"), ∀ ("for all"), and ∃ ("there exists"), Tarski's inductive definition of truth looks like this:

- (1) A primitive statement "A" is true iff A.
- (2) "¬A" is true iff 
      "A" is not true.
- (3) "A ∧ B" is true iff 
      "A" is true and "B" is true.
- (4) "A ∨ B" is true iff 
      "A" is true *or* "B" is true, or if 
      ("A" is true *and* "B" is true).
- (5) "∀x(Fx)" is true iff 
      for all objects x, "Fx" is true.
- (6) "∃x(Fx)" is true iff 
      there is an object x for which "Fx" is true.


These explain how the truth conditions of complex sentences (built up from connectives and quantifiers) can be reduced to the truth conditions of their constituents.

The simplest constituents are *atomic sentences*. A contemporary semantic definition of truth would define truth for the atomic sentences as follows:

An atomic sentence `F(x₁, …, xₙ)` is true - relative to an assignment of values to the variables `x₁, …, xₙ` - if the corresponding values of variables bear the relation expressed by the predicate `F`.

Tarski himself defined truth for atomic sentences in a variant way that does not use any technical terms from semantics, such as the "expressed by" above. This is because he wanted to define these semantic terms in the context of truth. Therefore it would be circular to use one of them in the definition of truth itself.

Tarski's semantic conception of truth plays an important role in modern logic and also in contemporary philosophy of language. It is a rather controversial point whether Tarski's semantic theory should be counted either as a correspondence theory or as a deflationary theory of truth.

## Kripke's theory of truth

https://en.wikipedia.org/wiki/Truth#Kripke's_semantics

*Kripke's theory of truth* (Saul Kripke 1975) is based on *partial logic* (a logic of partially defined truth predicates instead of Tarski's logic of totally defined truth predicates) with the *strong Kleene evaluation scheme*.

https://en.wikipedia.org/wiki/Three-valued_logic#Kleene_and_Priest_logics


## Refs

https://www.youtube.com/watch?v=F2uERWvA5e0

https://en.wikipedia.org/wiki/Disquotational_principle
https://en.wikipedia.org/wiki/First-order_logic#Semantics
https://en.wikipedia.org/wiki/Formal_semantics_(natural_language)
https://en.wikipedia.org/wiki/Liar_paradox
https://en.wikipedia.org/wiki/Logical_truth
https://en.wikipedia.org/wiki/Recursive_definition
https://en.wikipedia.org/wiki/Semantic_theory_of_truth
https://en.wikipedia.org/wiki/Semantics_of_logic
https://en.wikipedia.org/wiki/T-schema
https://en.wikipedia.org/wiki/Tarski%27s_undefinability_theorem
https://en.wikipedia.org/wiki/Triune_continuum_paradigm
https://en.wikipedia.org/wiki/Truth
https://en.wikipedia.org/wiki/Truth_condition
https://en.wikipedia.org/wiki/Truth-conditional_semantics
https://en.wikipedia.org/wiki/Truth#Kripke%27s_semantics
https://en.wikipedia.org/wiki/Kripke%27s_theory_of_truth
