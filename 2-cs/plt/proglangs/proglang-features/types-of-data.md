# Types

Types classify data, so they may be called *data types*, even *datatypes*, or types of data, even types for (classifying) data.

Types are a prominent feature of a PL: either a language exposes the types (to a certain degree) to the users, or it hides them completely (so you can't talk or mention types in the code using the surface language syntax).

This preliminary classification seems resonable for it immediately separates many specialized languages (markup languages, configuration languages, query languages, etc.) that objectively don't need to deal with the types (low or no point).

In languages where types are not completely implicit, they may be more or less exposed to the user (may be visible to a certain degree) but not intended to be typed by the user. This introduces the most popular division into *dynamically typed languages* and *statically typed languages*.

In dynamically typed languages, types are present in the code, even sometimes typed by the users, but on average they are shoved under the surface syntax and left for dead to the compiler to deal with. Some such languages are very popular still today (Python, Ruby, JS). A common trend with these languages is the development of tooling to provide a type system, sometimes as a separate, type-checking application (Flow for JS); even as a new language that compiles to the original one (the case with TS and JS); For example, Python and PHP, that were originally type-austere, have been gradually adding type related features.

Considering such developments, it would seem that types are finally being perceived as a good thing. Namely, one of the most frequent objects to types was that they are a pain in the ass, as in they take the focus off from what the user should really be doing, as in they are too much trouble to deal with. These objections imply either that people with such attitude are horribly uneducated or savagely uninformed (tertium non datur cuts both ways) because there have been, for a quite long time now, type systems that don't require any action from the user; naturally, they do alert the user when he does something unreasonable, but such systems don't require type signatures or type annotations at all. It seems a large percentage of coders, today still, is not aware of these facts because they are orientated on objects and 50 years old programming techinics - how else to explain the apparent popularity of OO, null infested, sum type lacking languages? An overwhelming number of programmers act as if no progress has been made in programming language theory since the debut of C in 1972.

50-years-old programming techinics are either
1. deprecated tech (OOP, C, null), posed to avoid
2. still underused (parallelism, FP, CPS, DS), posed to understand better
