# Differences between Agda, Idris, Coq and similar languages

## Idris

- Idris has type classes à la Haskell, whereas Agda goes with instance arguments
- Idris includes monadic and applicative notation

Edwin Brady: I may not be the best person to answer this, as having implemented Idris, I'm probably a bit biased! The FAQ - http://docs.idris-lang.org/en/latest/faq/faq.html - has something to say on it, but to expand on that a bit:

Idris has been designed from the ground up to support general purpose programming ahead of theorem proving, and as such has high-level features like
- type classes
- do notation
- idiom brackets
- list comprehensions
- overloading

and so on. Idris puts high-level programming ahead of interactive proving, although because Idris is built on a *tactic-based elaborator*, there is an interface to a tactic based interactive theorem prover (a bit like Coq, but not as advanced, at least not yet).

Another thing Idris aims to support well is *Embedded DSL implementation*. With Haskell you can get a long way with *do notation*, and you can with Idris too, but you can also rebind other constructs such as application and variable binding if you need to. 

You can find more details on this in the tutorial, or full details in paper:   
http://eb.host.cs.st-andrews.ac.uk/drafts/dsl-idris.pdf

Another difference is in *compilation*. Agda goes primarily via `Haskell`, Idris via `C`. There is an experimental back end for Agda which uses the same back end as Idris, via C. I don't know how well maintained it is. A primary goal of Idris will always be to generate efficient code - we can do a lot better than we currently do, but we're working on it.

The type systems in Agda and Idris are pretty similar in many important respects. I think the main difference is in the *handling of universes*. Agda has universe polymorphism, both have cumulativity, and you can have `Set : Set` in both (if you find this too restrictive, and don't mind that your proofs might be unsound).

## Agda vs Idis (more)

*Termination* is another important difference. Idris does not enforce a termination check by default, but rather the programmer must manually check proofs for termination through the `total` keyword. Agda and other dependently-typed theorem provers have a termination check on by default.

Edwin Brady: I'd say it's not so much manually checking as marking the functions where you really care about totality. For some applications, this will be all of them (and it might be worth adding a compiler flag for this - I probably will if anyone asks for it). For some applications, it'll be very few.Every function is checked in Idris whether you mark it or not, 'total' just makes it an error for the totality check to fail. As I understand it, Agda doesn't enforce termination either, but it does complain more loudly about functions which fail the check. It is worth noting that Agda's totality check is much better - hopefully Idris will catch up.

*Codata*: from the perspective of an Agda user, these days you just use normal data types along with the special built-in symbols:

```hs
infix 1000 ♯_
postulate
    ∞  : (A : Set) → Set
    ♯_ : {A : Set} → A → ∞ A
    ♭  : {A : Set} → ∞ A → A
```

That is, given some data type `A`, the corresponding codata type is `∞ A`. Codata is considered to be like *explicit lazy evaluation*, where you use the `♯` and `♭` to suspend and force computations (or raise and lower), in order to move back and forth between the data and codata views. This was quite nice when it came out, much cleaner than the former model with separate data and codata declarations.


## Coq

Coq has been around for a while and has a strong community with many libraries and developments. Coq was developed in parallel with the *Calculus of Constructions* (CoC).

What sets Coq apart is its *tactic language*, notations, code extraction (to OCaml, Haskell), and other extensions that make it very suitable for large projects. Coq has a large library support. Coq's performance is decent and its kernel, if you leave out modules, is reasonably small.

As far as the Coq core language (Galina) is concerned, it often offers less than Agda. For example, it is hard to define functions by *pattern matching* (even though there is an extension which helps). Also, Coq doesn't support *inductive-inductive types* or *mixing induction and coinduction*.

Most Coq developers don't use dependent types (because they are difficult to use in Coq), but instead use rather the combination of simply (or polymorphically typed) programs with predicates on top.

UnlikeAgda, Coq doesn't support: define functions by pattern matching, sized types, inductive-inductive types, mixing induction and coinduction, implicit binders, induction-recursion, copattern-based treatment of coinductive data, Streicher's K axion, canonical structures.



## Refs

* Differences between Agda and Idris?
https://stackoverflow.com/questions/9472488/differences-between-agda-and-idris

* What can Coq do while Agda/Idris can't do?
https://stackoverflow.com/questions/47842309/what-can-coq-do-while-agda-idris-cant-do

* Agda vs Idris
http://www.reddit.com/r/dependent_types/comments/q8n2q/agda_vs_idris/

* Idris FAQ
http://docs.idris-lang.org/en/latest/faq/faq.html
