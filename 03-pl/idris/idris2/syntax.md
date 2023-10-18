# Idris ∷ Syntax

General
+ Idris is strict
+ supports laziness with the `Lazy` ctor
+ has the `codata` keyword for declaring codata
+ the order in which definitions are given is significant

Types
+ dependent types support, types as first-class values
+ type declaration uses a single colon, e.g. `x : Int`
+ each definition must have a type declaration
+ type signature may be elided in only two situations, if inferreable
  - from the enclosing function's signature
  - from the first application of a type arg

Modules
- an Idris file consists of an optional module declaration
- followed by an optional list of imports
- followed by a collection of declarations and definitions
- each module has own namespace
- new declarations must begin at the same level as the preceding ones
- alternatively, a semicolon can be used to terminate declarations
- prelude is auto-imported by every module
- auto-imported: IO, arithmetic, common data structures and functions
- if…then…else language construct

Data types
+ must be defined before use
- declared similarly like in Haskell
- may be declared in Haskell's ADT or GADT style
+ newly declared infix operators must have fixity, e.g. `infixr 10 ::`
- reserved symbols `: = \ % ~ ? ! | => ==> -> <- ?= **`
+ codata using the `codata` data type declaration, `Inf`, `Delay`, `Force`
+ values are made lazy by applying the `Lazy` ctor

Functions
+ must be defined before use
+ anonymous functions use the fat arrow, `\x => x * 2`
+ anonymous functions may take several, comma separated, args, `\x, y => x`
- params may be given explicit types, `\x : Int => x * 2`
- params may be pattern matched against, `\(x, y) => x + y`
+ `(\x : Int, y : Int => x * y) 4 6` -- 24
- Haskell-like operator sections, `(* 2)`, `(5 +)`

Values and params
+ all names beginning with a lowercase are *implicit params*
+ which sometimes requires qualifying the names, `Main.someFn`

Maybe
- `data Maybe a = Just a | Nothing`
- `maybe : Lazy b -> Lazy (a -> b) -> Maybe a -> b`   
- the first two args are wrapped in `Lazy` since only one of them will be used.

Pairs
- `data Pair a b = MkPair a b`
- sugar: dep on the context `(a, b)` means `Pair a b` or `MkPair a b`
- tuples are represented as nested pairs, `("a",5,"c") == ("a",(5,"c"))`


## Dependent Pairs

https://idris.readthedocs.io/en/latest/tutorial/typesfuns.html#useful-data-types

- Dependent pairs are known as Sigma types.
- the value of the second component may depend on the value of the first
- the `with` notation allows pattern matching on intermediate values
- sugar `(a : A ** P)` is the type of a pair of `A` and `P`, where the name `a` can occur inside `P`. `( a ** p )` constructs a value of this type.

```hs
data DPair : (a : Type) -> (P : a -> Type) -> Type where
   MkDPair : {P : a -> Type} -> (x : a) -> P x -> DPair a P

-- pair a number `n` with a `Vect n a`
vec : (n : Nat ** Vect n Int)
vec = (2 ** [3, 4])

-- or equivalently
vec : DPair Nat (\n => Vect n Int)
vec = MkDPair 2 [3, 4]

-- the value (2) of the first comp is inferrable from the length of the vector.
-- use _ in place of values that the type checker can infer
vec : (n : Nat ** Vect n Int)
vec = (_ ** [3, 4])

-- We may also elide the type of the first dpair comp (Nat)
vec : (n ** Vect n Int)
vec = (_ ** [3, 4])
```

We can use dependent pairs to return a value of a dependent type where the index is not known in advance, like in the case of the `filter` function.

For example, if we filter elements out of a Vect according to some predicate, we will not know in advance what the length of the resulting vector will be.

```hs
filter : (a -> Bool) -> Vect n a -> (p ** Vect p a)

-- if the Vect is empty, the result is easy:
filter p Nil = (_ ** [])

-- otherwise, we need to inspect the result of a recursive call
-- in order to extract the length and the vector from the result:
filter p (x :: xs) with (filter p xs)
  | ( _ ** xs' ) = if (p x) then ( _ ** x :: xs' ) else ( _ ** xs' )
```

The `with` notation allows pattern matching on intermediate values.


## Records

- records have different syntax to Haskell's and other Idris' data structures
- records use the `record` keyword
- constructor's name is provided using the `constructor` keyword


```hs
record Person where
    constructor MkPerson
    firstName, middleName, lastName : String
    age : Int

fred : Person
fred = MkPerson "Fred" "Joe" "Bloggs" 30
```



## Dependent records
