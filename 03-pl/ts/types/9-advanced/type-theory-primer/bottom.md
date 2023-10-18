# TS :: Type System :: Bottom type

Some type systems have a special type called `bottom`





In TS, the type `never` may be taken as the zero type. The zero type is used in languages to mark an impossibility or a failure. In that particular role, it is called a *bottom type*. Bottom type may be inhabited or uninhabited. In TS, the type `never` represents the bottom type and it is uninhabited (thus it also represents the zero type). But e.g. in Haskell, the bottom type is inhabited and its value is denoted `undefined`. The 'undefined' is indeed a value and it is a value of any type, `∀ a. undefined: a`. The bottom type (with its single value 'undefined') is unionized with each type, so any Haskell type constains the 'regular' values plus the value 'undefined'. A type that is so augmented is called *a lifted type*; e.g. 0, 1, -3 are members of the `Int` type, but so is `undefined`. The value `undefined` is used to mark diverging computation, like an unrecoverable error or an infinite loop. This is also the case in TS, where the type `never` marks such a computation; e.g. it is the return type of a function that `throw`s.
