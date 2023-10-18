# Introduction

A *univalent type theory* is the underlying formal system for a foundation of univalent mathematics as conceived by Voevodsky.

In the same way as there isn't just one set theory (ZFC, NBG, etc.), there isn't just one *univalent type theory*; there is the underlying type theory used in UniMath, HoTT-book type theory, cubical type theory, among others, and more are expected to come in the foreseeable future before the foundations of univalent mathematics stabilize.

The salient differences between univalent mathematics and traditional, set-based mathematics may be shocking at first sight:

1. The kinds of basic objects

- Types, or *higher groupoids* (rather than sets) are the primitive objects.
- Sets, also called `0-groupoids`, are particular kinds of types.
- We have more general objects as a starting point.
- For example:
  - the type of natural numbers is a set, as a theorem and not as a definition
  - the type of monoids is not a set, but instead a 1-groupoid, automatically
  - the type of categories is a 2-groupoid, again automatically

2. The treatment of logic

- Math statements are interpreted as types rather than as truth values
- Truth values are particular kinds of types, `1-groupoids` with at most 1 elem
- Logical operations are particular cases of math operations on types
- math comes first, with logic as a derived concept
- for example, when we say "AND", we are taking the cartesian product of 
  two types, which may or may not be truth values.

3. The treatment of equality

- The value of an equality `x ≡ y` is a type, called **the identity type**, 
  which is not necessarily a truth value.
- This type collects the ways in which the objects `x` and `y` are identified.
- For example
  - it is a truth value for elements of `ℕ`, as there is at most one way for 
    two natural numbers to be equal.
  - for the [type of monoids][1], it is a set, amounting to the type of 
    monoid isomorphisms, automatically.
  - for the type of categories, it is a 1-groupoid, amounting to the type
    of equivalences of categories, again automatically.


The important word above is "automatic". For example, we don't define equality of monoids to be isomorphism. Instead, we define the collection of monoids as the large type of small types that are sets, equipped with a binary multiplication operation and a unit satisfying associativity of multiplication and neutrality of the unit in the usual way, and then we prove that the native notion of equality that comes with univalent type theory (inherited from MLTT) happens to coincide with the notion of monoid isomorphism. Largeness and smallness are taken as relative concepts, with type universes incorporated in the theory to account for the size distinction.

>In particular, properties of monoids are automatically invariant under isomorphism, properties of categories are automatically invariant under equivalence, and so on.

Voevodsky's way to achieve this is to start with a MLTT, including identity types and type universes, and postulate a single axiom, named univalence.

**The univalence axiom** stipulates a canonical bijection between *type equivalences* (in a suitable sense defined by Voevodsky in type theory) and *type identifications* (in the original sense of MLTT). Voevodsky's notion of type equivalence, formulated in MLTT, is a refinement of the notion of isomorphism, which works uniformly for all higher groupoids, i.e. types.

In particular, Voevodsky didn't design a new type theory, but instead gave an axiom for an existing type theory (or any of a family of possible type theories, to be more precise).

(repeat from above)
1. The kinds of basic objects (types instead of sets)
2. The treatment of logic (math statements as types)
3. The treatment of equality (equality `x ≡ y` is the identity type)

The main technical contributions in type theory by Voevodsky are:
4. The definition of type levels in MLTT, classifying them as `n-groupoids`
   including the possibility that `n = ∞`.
5. The simple and elegant definition of type equivalence that works uniformly
   for all type levels in MLTT.
6. The formulation of the univalence axiom in MLTT.

Univalent mathematics begins within MLTT with (4) and (5) before we postulate univalence. In fact, as the reader will see, we will do a fair amount of univalent mathematics before we formulate or assume the univalence axiom.

All of (4-6) crucially rely on *Martin-Löf's identity type*. [Initially][2], Voevodsky thought that a new concept would be needed in the type theory to achieve (4-6), and hence (1) and (3) above. But he eventually discovered that Martin-Löf's identity type is precisely what he needed.

It may be considered somewhat miraculous that the addition of the univalence axiom alone to MLTT can achieve (1) and (3).

MLTT was designed to achieve (2). Regarding (1), types were conceived as sets (and even named sets in some of the original expositions by Martin-Löf). And regarding (3), the identity type was conceived as having at most one element, even if MLTT cannot prove or disprove this statement, as was eventually shown by [Hofmann][3] and [Streicher][4] with their [groupoid model][5] of types in the early 1990's.


Another important aspect of univalent mathematics is the presence of explicit mechanisms for distinguishing the
7. properties           (e.g. an unspecified thing exists)
8. data or structures   (e.g. a designated thing exists or is given)

which are a commonplace in current mathematical practice; e.g. cartesian closedness of a category is a property in some sense (up to isomorphism), whereas monoidal closedness is a given structure.


In summary, univalent mathematics is characterized by (1-8) and not by the univalence axiom alone (in fact, half of these notes begin without the univalence axiom).

Lastly, univalent type theories do not assume the axiom of choice or the principle of excluded middle, and so, in a sense, they are constructive by default. We emphasize that these two axioms are consistent and hence can be safely used as assumptions. However, virtually all theorems of univalent mathematics, e.g. in [UniMath][6], have been proved without assuming them, with natural mathematical arguments. The formulations of these principles in univalent mathematics differ from their traditional formulations in MLTT, and hence, we sometimes refer to them as *the univalent principle of excluded middle* and *the univalent axiom of choice*.

In these notes we will explore the above ideas, using Agda to write MLTT definitions, constructions, theorems and proofs, with univalence as an explicit assumption each time it is needed.

We will have a further assumption, the existence of a certain subsingleton (or propositional, or truth-value) *truncations* in order to be able to deal with the distinction between property and data, and in particular with the *distinction between designated and unspecified existence* (e.g. the ability to define the notion of image of a function, and the notion of surjections).

We will not assume univalence and truncation globally, so you can see clearly when they are needed. In fact, the foundational definitions, constructions, theorems and proofs of univalent mathematics do not require univalence or propositional truncation, and so can be developed in any version of the original MLTTs, and this is what happens in these notes, and what Voevodsky did in his [original development in the computer system Coq][7].


[1]: https://www.cs.bham.ac.uk/~mhe/HoTT-UF-in-Agda-Lecture-Notes/HoTT-UF-Agda.html#magmasandmonoids
[2]: https://faculty.math.illinois.edu/~dan/Papers/ITP-talk.pdf
[3]: https://www.tcs.ifi.lmu.de/mitarbeiter/martin-hofmann
[4]: https://en.wikipedia.org/wiki/Thomas_Streicher
[5]: https://ieeexplore.ieee.org/document/316071
[6]: https://github.com/UniMath/UniMath/blob/master/README.md
[7]: https://github.com/UniMath/Foundations
