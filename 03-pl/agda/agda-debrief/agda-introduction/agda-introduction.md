# Introduction to Agda

Agda is a FPL and a proof assistant, with a dependent type system based on the intensional predicative version of MLTT (Intuitionistic TT), with options for compatibility with type theories like HoTT and Cubical TT.

Agda is writen in Haskell. Agda can use multiple backend compilers - primarily GHC, but also LaTex, QuickLaTeX, and can transpile programs into JavaScript. Usually, an Agda program is compiled using GHC into an executable.

Agda code is writen using the syntax that especially resambles Haskell, but many aspects of its syntax are different from Haskell.

Agda can be used as a practical programming language, but thanks to being based on a dependent type theory is also offers strong guarantees about the authored programs. Agda's type system can be employed to express constraints on types that cannot be expressed in majority of programming languages, not even in ones with an advanced type system like Haskell's. Haskell has the most advanced type system among the today's popular languages (yes, Haskell is slowely starting to belong to that group). It instills fear among the hoi palloi, even though, once you really get acquainted with it, you realized tht it is more sensible than "type systems" used in the really popular languages. It has made a significant influence and now people put Haskell-like type signatures in a comment as a specification of JS functions.

However, Agda's type system goes beyond Haskell's type system, and takes it to the next level, which is dependent typing. In brief, Haskell allows terms to depend on terms (like all languages do), it also allows terms to depend on types, and types to depend on types. But, in general, it is impractical (singleton types can be used to some extent), and sometimes imposible, to express the dependence of types on terms.

Having types that can depend on terms allows us to define data types like the famous vector, which is a list indexed by its length (the type carries the current length of the vector). This permits us to e.g. have total functions on vectors. For example, while even in Haskell, the `head` function (returns the initial element of a list/vector) fails for empty list, causing an exception, the same function in Agda does not even consider an empty vector as its appropriate input type; it's as if you've given a string to function that specifically states that it only accepts integers.

Such conditions (e.g. that list must not be empty, that an integer must be prime), called invariants, are expressible in the Agda's type system. They provide strong guarantees about the correctness of the resulting programs. That's all to it! You can use any language to author your program in, but no matter how thoroughly you test it, you can never make guarantees about its correctness. After all, the vulnarability monitoring portals are filled with incidents on the daily bases. No matter how carefully writen a piece of software is, some situations just cannot be anticipated. Moreover, modern technological stack is based on parallelism and distributed computation which puts even greater risk on the production of secure software because it is an unpredictable environment - no one can anticipate the conditions that trigger a data race, nor the ensuing consequence. When the cost of, in the least monetary, loss matters, the only way to guaratee the correctness of software boils down to mathematical models and type theory.

## Agda as a proof assistant

Another use of Agda is as a proof assistant.

The Curry-Howard isomorphism (CHI) recognizes the correspondence between propositions in logic and types, the so-called propositions-as-types paradigm, which also considers programs as mathematical proofs, the so-called proofs-as-programs paradigm. This approach extends to many correspondences between logic and set theory, type theory, category theory and CS and programming in particular.

In the propositions-as-types paradigm, mathematical propositions are encoded as types, which can be expressed in the Agda's type system. A type encodes and represents a proposition, and then the inhabitation of that type corresponds to the existence of a proof for that proposition. The empty type, called unit and commonly denoted by `⊥` 
