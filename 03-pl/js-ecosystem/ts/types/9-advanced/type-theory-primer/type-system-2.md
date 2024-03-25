# Type system :: Type theory

## Why types

Being a dynamic language, JS seems to be polymorphic by default. JS functions are unconstrained and can accept any data type at all. JS doesn't even have means to annotate the types, so the programmer can only strongly suggest the intended restirictions in the comment attached to a function. Because, as it turns out, being typeless is far from a good thing.

For one, programmers must be defensive, programming a bunch of *sanity checks* to ensure a function gets the correct data type, the data type it can actually work with. These checks affect the run-time performance of the program, the most tresured aspect of dynamic programmers. What's worse, there is not a single check, which could be bearable, but the same check is redundantly performed every time; all to keep data types in check.

One of the more prominent goals of CS is to push such redundant computation from runtime to compile time. For example, sanity checks are an ideal candidate; it is a kind of computation that should be moved at compile time. Of course, the goal is not to simply move some computation and run it at CT, but to improve the end goal - the reason why that computation even exists should be explored. This is one of the motives for introducing static type checking. "Static" means it is done statically (at compile time) as opposed to dynamically (at runtime). If it can be guaranteed that functions can only be called with suitable data types, then there would be no need for runtime sanity checks in the first place.

A type system is there to ensure that data has the appropriate shape, the shape it is expected to have, and that language items (functions) play nicely with data and with each other. A type system forces contracts on all players to behave correctly. As long as each agent respects this contract the things run smoothly. Or, at least, with way less incidences that before since a type system cannot prevent logical programing errors. It only exists to ensure the data is interchanged according to the contract.

This means that a type system does its thing at compile time and then it is gone. Today, with coding done in advanced editors that are use langauge services, the code is practically compiled as it is written, so there is no single point that compile-time type checking happens; instead it happens all the time, and the editor lets the user know about any errors (e.g. red-squiggles underline the faulting code).
