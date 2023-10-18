# JS :: Concepts :: FP :: Introduction

## TL/DR

There was always interest of doing FP in JS, as evidenced by many FP libraries, but the interest seems to have grown since React switched from class-based to functional components, which renewed the insistence on maintaining purity (for as long as possible), seeing how it relieves some pains when trying to curb complexity, such as managing an application's state.

## Introduction

Functional programming can be done in any language that has closures and supports functions as first class values, as evidenced by lambda calculus that has nothing but functions, still it serves as the foundation for all FP languages.

FP languages are classified by purity into pure and impure. Pure FPLs place purity in high esteem and go out of their way to make sure values in a program are *referentially transparent*, which means they never change.




Functional programming techniques in JS take inspiration from FPLs, correctly recognizing Haskell as the immediate role model. Haskell, conceived in 1990, is a product of academia that showcases advances and breakthroughs pertaining to the study of programming languages, incorporating the progress across the field from the last several decades. Haskell features are not read about in the language docs, but in the academic papers. The suspicion that academic work usually pays no interest to performance, pushing from correctness instead is justified. Fortunately, in Haskell's case, the challenge of maintaining correctness while improving performance was appealing enough.

The mismatches that occur when translating concepts between Haskell and JS, exist not only because Haskell is a pure (proper pure), lazily-evaluated language, while JS is an eager dirty rat, but primarily because the proper support for FP is missing - having closures and first-class functions is a far cry from the adequate support functional programming needs. Hand at heart, there are many ES proposals that are pushing to introduce more functional devices into JS, such as pattern matching, ADTs, expression-based counterparts of statement-based constructs, etc.

Since JS is so far removed from the pure world of Haskell (or even from the impure FP worlds of Lisp, Scheme, ML, OCaml), all the functional techiniques that can be implemented in JS often come with serious tradeoffs. Sometimes, it's best to stick with the paradigm the language was meant to be used with.

## FP

(more rant ahead)

Doing FP in JS is intended as an exercise, a presentation of some FP concepts that may be beneficial taken sporadically; they are not intended to switch the inherent JS paradigm and turn the language into something it cannot be.

Employing FP concept in JS/TS is essentially about taking as much of Haskell as possible and shoving it into the unexpecting JS/TS setting. This trend seems to be a rite of passages of every programmer who suffered through enough of Haskell and now feels obligated to drop a bunch of FP notions into the wrong environment. Despite reading that JS is multi-paradigm language, it is really imperative at heart, and forcing FP into it will almost immediately result in unreadable code due to the imperative vs functional mismatch. Before everything else, using parenthesis for applying a function is almost a deal breaker for the syntactic purists. The noise that will accumulate in no time at all will be hard to surpass, but if one endures, it is quite possible to express many FP staples in JS.

It's a fine exercise in futility and a splendid opportunity to experiment with familiar FP notions in a strange land, cementing your own comprehension and relating your experience that may be seen as helpful to somebody along their learning path. (Go Haskell, young man; it can offer you everything).

Therefore, expressing FP concept in JS should be seen just as curiosity, sometimes just done for the fun/hell of it. After all, JS is an imperative language and forcing the FP paradigm on it doesn't play well and goes against the grain (and optimizations of JS engines) and normal use of the language. To eat your cake and keep it too, see Elm or PureScript, which offer proper Haskell syntax with a genuine FP feeling, yet compile to JS! Why would anyone insists on using FP-flavoured JS/TS when these langauges exist...The reason may incude: intellectual curiosity; reinforcing what you have learned by forcing yourself to walk it through a hostile ground is commendable; relating you own experiences so somebody else may perhaps improve theirs flexes some higher-order morale muscles; doing it just because or for shit n' giggles. But finally getting away with the implementation of that stubborn FP concept is a reward in iteself.

## FP vs IMP features

- recursion vs loops
- side effects
- error handling, throwing (hmm, here Haskell also has its moments - use Agda :)
- null and in-band signalling vs sum types
- polymorphism
- lazyness (although Elm and PS are eager); PS also has row polymorphism


## Pros

- first-class functions (FCFs) (functions can take and return functions)
- closures (function can capture vars from the outer env)
- anonymous functions/closures
- ugh…
- product types!
- ugh…



## Cons
- no auto-currying
- too much parens, fn application uses parens
- no tail-call optimization (TCO); once it existed but got discontinued - this was the moment FP died afa JS is concerned
- compilers implement no technics to unroll recursion into more efficiant imperative code (the way they do in proper FPLs)
- risk of stack-overflow; may be mitagated using trampolining, but not a comprehansive solution
- no types, types are CSQN in FP
- no ADTs, no sum types, no proper types at all (JS); what is FP without types?
- no sum types (may be user-defined, but not comfortable to use) since there's
- no pattern matching (there's a proposal though)
- no tuples (TS offers them + there's a proposal)
- no immutability (can be enforced by will)
- no purity (can be carved out from all the dirt by will)


## Conclusion

First-class functions (FCF) and closures are neccessary for doing function-orientated programming, but they are no sufficient conditions. Great many functional concept can be expressed using functions only (thanks to λ calculus) but doing it in JS gets very uncomfortable (doing it in λ calculus is unbearable) and verbose because the proper support is lacking. Low sugar.

Just because FCFs are available does not imply the language is remotely suitable for FP.
