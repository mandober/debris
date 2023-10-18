# JS :: Concepts :: FP in JS :: Abstract

JS sufficiently fullfills the requirements for FP:
- [✔] first class functions, closures, anonymous lambdas
- [✘] types
- [🌗] polymorphism
  - [✘] type classes
  - [✔] parametric polymorphism, generics
  - [✘] ad-hoc polymorphism, operator overloading
- [🌗] expression-based syntax
  - [✘] auto-currying (requires discipline)
- [✘] ADT
  - [✘] pattern matching
- [✘] purity
  - [✘] referential transparency
  - [✘] immutability
  - [✘] demarcated IO
- [✘] laziness, non-strict
- [✘] tail-call optimization


That's 1 at least, so hells yes, JS be FP degenera… ready! No, the thing is not to insist on turning JS into something it cannot ever be, but to use it as a vehicle to learn about those FP concepts that JS is willing to tolerate (as opposed to completely ditching JS for a proper FPL).

Learning even the basics of Haskell is bound to prove beneficial becuse most are universal concepts. There is a niche of people that have acquired enough of Haskell (i.e. hit hard against a wall), then returned to translate those concepts into JS (before going back to unlock further progress).

Doing FP without a type system is probably the biggest concern. In proper (pure) FP languages (Haskell and Clean), types provide guidence and guarantees; a function's type signature gives us hints on how to go about writing its implementation. If we love the types so much we can write them commented-out; even JSDoc will comfort us by offering the '@sig' tag. For a full type system, there is no other option but to switch to another language. The easiest transition is to TS; it's just JS with a decent type system that keeps on improving. And then there are languages that compile to JS. ReasonML, like ML/OCaml, on which it is based, is not a pure FPL. Elm and PureScript are Haskell-based and so offer the best choice. Their type systems are slightly weaker than Haskell's, but it's HM. PureScript is strict, but it adds row polymorphism for record types.

## FP

There are two "flavors" of functional programming (FP): pure and impure.

Historically, the impure paradigm came first with the creation of Lisp in 1964. Lisp was the world's second functional programming language (FPL); the first was lambda calculus on which Lisp was based. Lisp was influenced by lambda calculus in that it used functions as the main building blocks of the language.

ASIDE: What else is a PL to use as its basic building block? Variables? Semi-colons? Of course it has to be something like subroutines - only they provide means to achieve abstraction. Actually, that's not funny (as in strange) at all - code organization was invented because the prevalent coding style was spaghetti.

realized that code should be organized in units of abstrraction, style was prevalent.



## Lambda calculus

Lambda calculus (LC) is often mentioned in FP contexts particularly because it is considered as the world's first FPL. In that role, lambda calculus would be classified today as an esolang since programming in LC is painfully unleasent. In fact, considering LC as a PL at all is unsound as LC doesn't have IO system solved, even theoretically. LC is an ideal that aims to model computation; it was never intended to be used as a PL. It is an austere system build on nothing more than a few rules and a particular system of notation.


function definition
function applicaiton
