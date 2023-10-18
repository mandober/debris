# Typing context

This subsection is about the type level or the *typing context* in TS. Although TS is all about types as it pulls its *type system* on top of JS, we can still discern context that are particularly related to types and *type expressions*.

Such typing contexts mostly occur at the type level, but since they follow types, they also occur at the value level into which the types occasionaly descend. On the other hand, values never ascend to the type level (*named function parameters in the signatures of function types* is a side effect of the inherited syntax, not a sign of dependent typing).

## Generic functions

In TS, a function is called *generic* if its type allows it to work with different types in a type-safe way.

## Type safety, correctness and efficiency

But JS is a dynamic language, so seemigly JS functions were already capable of accepting different types, a naive but very dynamic programmer might say, frustratingly questioning the need for types. This was answered the first time long ago by computer scientist who mainstream programmers didn't want to listen to, and then a time and time again, by the time itself, which proved that safe, correct (bug-free) and efficient code can very well be produced with a dynamic language provided safety and correctness were actively ignored.

Asked to choose between total correctness and total efficiency, with no possible overlap, all programmers working in mainstream programming languages will happily choose efficiency, disregarding correctness as much as passable. If the happy code path can be executed very efficiently, fuck those pesky edge cases. The more speed a program can gain, the more assured is the programmer that they are on the right track. While the bug-tracker documents the reasons it ain't so.

Type system is the most efficient, the cheapest way to guarantee, perhaps not total but a certain level of safety and correctness that is several magnitudes of times improvement over the untyped code; still there are people unwilling to let it help them. This is somewhat unique situation in dynamic languages - you can program free-style, but naked and unprotected or you can opt in to use a type system intended solely to help you get to code safety and correctness. The fact that the use of TS, compared with vanilla JS, has soured in the recent times tells that there is still hope for the avarage JS programmer, even if, now a minority, is kicking and creaming against TS.


## Are all type-level functions generic?

Yes. Aeneric function is any value-level TS function that can work with many (poly) different types in a safe way. Contrasted by the regular, untyped JS functions which also accept any and all types, generic functions never expand the set of accepted types all the way but only to include the types that have some shared functionality.

In normal languages, save for the set of well-known combinators, parametrically polymorphic functions are useless:
> the more types a function accepts, the less it can do.
This stems from the fact that a polymorphic argument is untouchable -- probing a polymorphic argument and then coding the execution path for each discovered possibility is not a real option -- instead, we use only the methods that work on each of the types the function accepts. So, the only sensible thing a generic unary function (that accepts any type of argument) can do with its arguemnt, is to return it. There's nothing else it can do because in general, although in JS it can also stringify it.

Unlike most PLs, that lack a function/method that would work on any or all types, due to its prototypical nature, JS sports a method called `toString` that can actually be invoked on any type whatsoever, even functions! The result obtained when calling it on a builtin function shows that, indeed, it is very weird that this is a possibility; invoked on a user-defined function shows that, indeed, it is very weird that this is allowed.
