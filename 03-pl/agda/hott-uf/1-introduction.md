# 1. Introduction to HoTT/UF

## Introduction

*Univalent type theory* is the underlying formal system for a foundation of univalent mathematics as conceived by Voevodsky.

In the same way as there isn't just one set theory, there isn't just one univalent type theory. There is the underlying type theory used in UniMath, HoTT-book type theory, Cubical Type Theory, among others, and more are expected in the future before the foundations of univalent mathematics stabilize.

The salient differences between univalent mathematics and traditional, set-theory based mathematics, may be shocking at first sight:

1. The kinds of objects we take as primitives
  - types, or *higher groupoids*, rather than sets, are primitive objects.
  - sets, also called *0-groupoids*, are particular kinds of types.
  - we have more general objects as a starting point, e.g.
    - the type `ℕ` is a set, which is a theorem, not a definition.
    - the type of monoids is not a set, but a *1-groupoid*, automatically.
    - the type of categories is a *2-groupoid*, again automatically.

2. The treatment of logic
  - math statements are interpreted as types rather than truth values.
  - truth values are particular kinds of types, called *⁻1-groupoids*, 
    with at most one element.
  - Logical operations are particular cases of mathematical operations on types.
  - The mathematics comes first, with logic as a derived concept,
    - e.g. "and" means the Cartesian product of two types, 
      which may or may not be truth values.

3. The treatment of equality
  - equality, `x ≡ y`, is a type, called the *identity type*, 
    which is not necessarily a truth value.
  - equality type collects the ways in which two math objects `x` and `y` 
    are identified as being equal, e.g.
    - for the type ℕ, it is a *truth value* as there is 
      *at most one way for two naturals to be equal*.
    - for the type of monoids, it is a set, amounting to 
      *the type of monoid isomorphisms*, automatically.
    - for the type of categories, it is a *1-groupoid*, amounting to 
      *the type of equivalences of categories*, automatically.


The important word in the above description of univalent foundations is *"automatic"*.

For example, we don't define equality of monoids to be isomorphism. 
Instead, we define 
the collection of monoids 
  as the large type 
  of small types 
  that are sets, 
equipped with a 
  binary multiplication operation and a unit 
  satisfying 
    associativity of multiplication 
    and neutrality of the unit 
    in the usual way, 
and then we prove 
  that the native notion 
  of equality, 
    that comes with 
    univalent type theory 
    (inherited from MLTT), 
  happens to coincide 
  with the notion of 
monoid isomorphism.

"Largeness" and "smallness" of types are taken as relative concepts, with *type universes* incorporated in the theory to account for the distinction between sizes.

In particular, 
properties of monoids are automatically invariant under isomorphism, 
properties of categories are automatically invariant under equivalence, 
and so on.

Voevodsky's way to achieve this was to start with a MLTT, including identity types and type universes, and postulate a single axiom, univalence.

The **univalence axiom** stipulates 
a canonical bijection 
between *type equivalences* 
  (in a suitable sense defined 
  by Voevodsky in type theory) 
and *type identifications* 
  (in the original sense 
  of Martin-Löf's identity type).

Voevodsky's notion of type equivalence, formulated in MLTT, is a refinement of the notion of isomorphism, which works uniformly for all higher groupoids, aka types.

In particular, Voevodsky didn't design a new type theory, but instead gave an axiom for an existing type theory (or any of the families of possible type theories, to be more precise).

We had 3 points above:
1. primitive objects
2. treatment of logic
3. treatment of equality

Voevodsky's main technical contributions to type theory:
4. definition of type levels in MLTT, 
  classifying them as n-groupoids including the possibility that `n = ∞`
5. simple and elegant definition of type equivalence 
  that works uniformly for all type levels in MLTT
6. the formulation of the univalence axiom in MLTT

Univalent mathematics is based on MLTT with (4) and (5), before we postulate the axiom of univalence. In fact, a fair amount of univalent mathematics can be done before we even formulate or assume the univalence axiom.

The points (4), (5) and (6) crucially rely on Martin-Löf's identity type.

Initially[^1], Voevodsky thought that a new concept would be needed in the type theory to achieve (4), (5) and (6), and hence (1) and (3) above. But he eventually discovered that Martin-Löf's identity type is precisely what he needed.

It may be considered somewhat miraculous that the addition of the univalence axiom alone to MLTT can achieve (1) and (3).

Martin-Löf type theory was designed to achieve (2); and, regarding (1), types were conceived as sets (and even named "sets" in some of the original expositions by Martin-Löf); and, regarding (3), the identity type was imagined as having at most one element, even if MLTT cannot prove or disprove this statement - as was eventually shown by Hofmann[^2] and Streicher[^3] with their *groupoid model of types*[^4] in the early 1990's.

Another important aspect of univalent mathematics is the presence of explicit mechanisms for distinguishing

7. property (e.g. an unspecified thing exists)
8. data or structure (e.g. a designated thing exists or is given)

which are common place in current mathematical practice; e.g. Cartesian closedness of a category is a property in some sense, up to isomorphism, whereas, monoidal closedness is given structure.

In summary, univalent mathematics is characterized by (1) - (8) and not by the univalence axiom alone. In fact, half of these notes don't rely on the univalence axiom.


Lastly, univalent type theories don't assume the Axiom Of Choice (AC) or the principle of the Excluded Middle (EM), and so in some sense they are constructive by default. However, these two are consistent and can be safely postulated. Nevertheless, virtually all theorems of univalent mathematics, e.g. in UniMath[^5], have been proved without assuming them, with natural mathematical arguments. The formulation of these two principles in univalent mathematics differs from their traditional formulations in MLTT, and hence we sometimes refer to them as the *univalent principle of excluded middle* (uEM) and the *univalent axiom of choice* (uAC).

In these notes we explore the above ideas using Agda to write MLTT definitions, constructions, theorems and proofs, with univalence as an explicit assumption each time it is needed.

We will have a further assumption, the existence of certain *subsingleton (propositional, truth-valued) truncations*, in order to be able to deal with the *distinction between property and data*, and in particular with the *distinction between designated and unspecified existence* (for example, to be able to define the notion of function's image and surjective function).

We won't assume univalence and truncation globally, and their use will be pointed out.

In fact, the foundational definitions, constructions, theorems and proofs of univalent mathematics don't require univalence or *propositional truncation*, and can be developed in a version of the original MLTT. This is exactly what Voevodsky did in his original development in the computer system Coq, and what we try to do here, only using Agda rather than Coq.


## Homotopy type theory

Univalent type theory is often called homotopy type theory. Here we are following Voevodsky, who coined the phrases univalent foundations and univalent mathematics. We regard the terminology homotopy type theory as probably more appropriate for referring to the synthetic development of homotopy theory within univalent mathematics, for which we refer the reader to the HoTT book[^6].

However, the terminology homotopy type theory is also used as a synonym for univalent type theory, not only because univalent type theory has a model in homotopy types (as defined in homotopy theory), but also because, without considering models, types do behave like homotopy types, automatically. We will not discuss how to do homotopy theory using univalent type theory in these notes. We refer the reader to the HoTT book as a starting point.

A common compromise is to refer to the subject as HoTT/UF[^7].

## References

### General references

- Papers by Martin-Löf
  https://github.com/michaelt/martin-lof

- Homotopy type theory website references
  https://homotopytypetheory.org/references/

- HoTT book
  https://homotopytypetheory.org/book/

- ncatlab references
  https://ncatlab.org/nlab/show/homotopy+type+theory#References

In particular, it is recommended to read the concluding notes for each chapter in the HoTT book for discussion of original sources. Moreover, the whole HoTT book is a recommended complementary reading for this course.

### Proof assitants

After the reader has gained enough experience:

- Voevodsky's original foundations of univalent mathematics in Coq
  https://github.com/vladimirias/Foundations

- Coq
  https://coq.inria.fr/

- UniMath project in Coq
  https://github.com/UniMath/Foundations

- Agda UniMath library
  https://github.com/UniMath/agda-unimath#setting-up-em%60acs-for-the-notation-of-identity-types

- Coq HoTT library
  https://github.com/HoTT/HoTT

- Agda HoTT library
  https://github.com/HoTT/HoTT-Agda


### Agda

Regarding Agda, we recommend the following as starting points:

- Agda wiki
  https://wiki.portal.chalmers.se/agda/pmwiki.php

- Dependent types at work by Ana Bove and Peter Dybjer
  http://www.cse.chalmers.se/~peterd/papers/DependentTypesAtWork.pdf

- Agda reference manual
  https://agda.readthedocs.io/en/latest/getting-started/index.html

- Agda further references
  https://wiki.portal.chalmers.se/agda/pmwiki.php?n=Main.Documentation

- Cubical Agda blog post by Anders Mörtberg
  https://homotopytypetheory.org/2018/12/06/cubical-agda/

- Cubical Agda documentation
  https://agda.readthedocs.io/en/latest/language/cubical.html#cubical


### Genesis of HoTT/UF

- A very short note on homotopy λ-calculus
  http://math.ucr.edu/home/baez/Voevodsky_note.ps

- Notes on homotopy λ-calculus
  https://github.com/vladimirias/2006_03_Homotopy_lambda_calculus/blob/master/homotopy_lambda_calculus_Mar_5_2006.pdf

Voevodsky says that he was influenced by Makkai's thinking:
- *"Univalent Foundations - new type-theoretic foundations of mathematics"* 
  by Vladimir Voevodsky, talk at IHP, Paris, 2014 
  https://www.math.ias.edu/vladimir/sites/math.ias.edu.vladimir/files/2014_04_22_slides.pdf

- Michael Makkai - Department of Mathematics, McGill University
  https://www.math.mcgill.ca/makkai/
- FOLDS
  https://www.math.mcgill.ca/makkai/folds/foldsinpdf/FOLDS.pdf
- 2021FOLDS
  http://www.math.mcgill.ca/makkai/2021FOLDS
- The theory of abstract sets based on first-order logic with dependent types
  https://www.math.mcgill.ca/makkai/Various/MateFest2013.pdf

An important foundational reference, by Steve Awodey and Michael A. Warren
- *Homotopy theoretic models of identity types*
  https://arxiv.org/abs/0709.0248
  This paper presents a novel connection between homotopical algebra and mathematical logic. It is shown that a form of intensional type theory is valid in any Quillen model category, generalizing the Hofmann-Streicher groupoid model of Martin-Loef type theory.


### Additional material

- *An introduction to univalent foundations for mathematicians*, 
  https://www.ams.org/journals/bull/2018-55-04/S0273-0979-2018-01616-9/
  a paper at the Bulletin of the AMS
  https://www.ams.org/publications/journals/journalsframework/bull
  by Dan Grayson
  https://faculty.math.illinois.edu/~dan/

- Voevodsky's Memorial talk by Dan Grayson
  https://faculty.math.illinois.edu/~dan/Talks/Voevodsky-memorial-talk.pdf

- *Univalent foundations - an introduction* by Benedikt Ahrens
  https://benediktahrens.net/talks/6WFT.pdf

- *Introduction to Homotopy Type Theory* by Egbert Rijke
  https://github.com/EgbertRijke/HoTT-Intro

- *A course on homotopy (type) theory*    
  https://math.andrej.com/2019/05/08/a-course-on-homotopy-type-theory/   
  by Andrej Bauer https://math.andrej.com/    
  and Jaka Smrekar https://www.fmf.uni-lj.si/~smrekar/   
  This semester my colleague Jaka Smrekar and I are teaching a graduate course on homotopy theory and homotopy type theory. The first part was taught by Jaka and was a nice review of classical homotopy theory leading up to Quillen model categories. In the second part I am covering basic HoTT. 
  - The course materials are available at the GitHub repository:
    https://github.com/andrejbauer/homotopy-type-theory-course
  - HoTT lectures are recorded and available on YouTube (6 videos)     
    *2019-HoTT Introduction to homotopy type theory*    
    https://www.youtube.com/watch?v=Yy_U6_cvyLM&list=PL-47DDuiZOMCRDiXDZ1fI0TFLQgQqOdDa    
    Video recordings of doctoral lectures on homotopy type theory, Spring 2019, Faculty of Mathematics and Physics, University of Ljubljana.

- *15-819 Homotopy Type Theory* by Bob Harper
  https://www.cs.cmu.edu/~rwh/courses/hott/
  - videos: https://scs.hosted.panopto.com/Panopto/Pages/Sessions/List.aspx#folderID=%2207756bb0-b872-4a4a-95b1-b77ad206dab3%22

- *Homotopy type theory: the logic of space* by Mike Shulman
  https://arxiv.org/abs/1703.03007

- *Logic in univalent type theory* by Martin Escardo
  https://www.newton.ac.uk/seminar/20170711100011001


There is an ongoing development of univalent foundations in Agda with injective types, compact (or searchable) types, compact ordinals and more.
- https://www.cs.bham.ac.uk/~mhe/TypeTopology/UF.html
- https://www.cs.bham.ac.uk/~mhe/TypeTopology/Compactness.html
- https://www.cs.bham.ac.uk/~mhe/TypeTopology/Ordinals.html


## Choice of material

This is intended as an introductory graduate course. We include what we regard as the essence of univalent foundations and univalent mathematics, but we are certainly omitting important material that is needed to do univalent mathematics in practice, and the readers who wish to practice univalent mathematics should consult the above references.



------------------------------------------------------------------------------

[^1]: *"Voevodsky's work on formalization of proofs and the foundations of mathematics"*, by Daniel R. Grayson, 2018 
https://faculty.math.illinois.edu/~dan/Papers/ITP-talk.pdf

[^2]: Martin Hofmann, https://web.archive.org/web/20230117044040/https://www.tcs.ifi.lmu.de/mitarbeiter/martin-hofmann

[^3]: Thomas Streicher, https://en.wikipedia.org/wiki/Thomas_Streicher

[^4]: *"The groupoid model refutes uniqueness of identity proofs"*, by Martin Hofmann and Thomas Streicher, 1994 
https://ieeexplore.ieee.org/document/316071   
Abstract. We give a model of intensional Martin-Lof type theory based on groupoids and fibrations of groupoids in which identity types may contain two distinct elements which are not even prepositionally equal. This shows that the principle of uniqueness of identity proofs is not derivable in the syntax.    

[^5]: UniMath, a Coq library aiming to formalize a substantial body of mathematics using the univalent point of view. 
https://github.com/UniMath/Foundations

[^6]: Homotopy Type Theory: Univalent Foundations of Mathematics. The Univalent Foundations Program. Institute for Advanced Study. 
https://homotopytypetheory.org/book/

[^7]: Homotopy Type Theory and Univalent Foundations combines ideas and techniques from algebraic topology, logic, higher categories and computer science. As a fairly young subject it is still under dramatic development and sees vibrant activity. https://cas.oslo.no/hott-uf/
