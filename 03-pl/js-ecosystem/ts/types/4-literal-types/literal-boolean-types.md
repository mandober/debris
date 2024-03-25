# TS :: Types :: Literal types :: Literal Boolean types

There are only two boolean literal types, the types `true` and `false`. In fact, the type `boolean` itself is actually just an alias for the union `true | false`.

```ts
type boolean = true | false
```



There are 2 Boolean literal types, `true` and `false`.

They come in handy when implementing type functions that behave like type predicates or conditionals.

```ts
type IfThenElse<S extends boolean, T, E> = S extends true ? T : E

type t1 = true extends true | false ? true : false  // true
type t2 = 1 extends number ? true : false           // true
type t3 = 'abc' extends string ? true : false       // false
type t4 = string extends 'abc' ? true : false       // false

type Obj = {a: string, b:number} extends {a: string} ? true : false // true
```

## The Boolean type

Like most languages, TS has the Boolean type, denoted `boolean`, which it inherits from JS. In both JS and TS, the `boolean` type is a builtin type and a primitive langauge type (unclear how it is implemented; does it use the entire word or safes space by bit-fiddling; presumably, boolean values are always stored on the stack, unless scalar values are normally implemented as stack-located pointers to the heap data - what heap data).

## The Boolean type across theories

### In type theory

Type-theoretically, the Boolean type is a disjoint union of unit types.


the boolean type could be defined as a sum type, 

denoted as `1 + 1`, where `1` denotes the unit type, and `+` denotes the sum type as an infix symbol.

### In category theory

### In PLT

In PLT, the Boolean type, or more precisely, the two Boolean values, are judged by what they are trying to achieve or convey. If we analyze the places where a Boolean value is used, it almost always has to do something with the control of the program's flow, mainly appearing in conditional expressions (or statements).

A boolean value or an expression that evaluates to a Boolean value (which is unknown at the compile time) is scrutinized at runtime - and assuming in the case of the expression that it is successfully evaluated down to a Boolean value - the compiler takes one of the two execution branches: if the Boolean value is 'true' it takes the "then" branch, and if it was 'false', it takes the "else" branch. Thus, Boolean values are mainly used to make decisions.

The language construct `if-then-else` is the primary 'eliminator' of Boolean values. In most (eager) languages it is implemented as a language construct because it is desirable to take advantage of short-cuircuiting semantics, i.e. if the conditional Boolean value is 'true' there is no need to evaluate the the 'else' branch at all, and vice versa with 'false' and the first branch. In (lazy) FPLs, `if-then-else` may be implemented as a regular user-defined function (the same as any other control flow device).

The Boolean type and its two values are used to make binary (2-ary) decisions, i.e. there are only 2 outcomes possible. However, the support for multiple outcomes is possible by nesting the `if-then-else` constructs.

### In Lambda Calculus

Boolean logic may be considered as a choice. The Church encoding of true and false are functions of two parameters:
- 'true' chooses the first parameter.
- 'false' chooses the second parameter.

This definition allows predicates (i.e. functions returning logical values) to directly act as if-clauses. A function returning a Boolean, which is then applied to two parameters, returns either the first or the second parameter:   
`predicate-x then-clause else-clause`   
evaluates to `then-clause` if `predicate-x` evaluates to 'true', and to `else-clause` if `predicate-x` evaluates to 'false'.


In the untyped lambda calculus, the two Boolean values are encoded as functions (since LC has nothing but pure funcitons), and used to make decisions. The Boolean values behave as *selectors*: 'TRUE' selects (and returns) the first of the two arguments, 'FALSE' selects the second.

```hs
TRUE  := λa.λb.a
FALSE := λa.λb.b
IF    := λs.λa.λb.s a b (redundant)
```

In fact, ther is no need to define `IF` as above since a Boolean-encoded value itself will select one of the two 'branches', i.e. arguments: TRUE selects the first, FALSE the seconf argument. This allows us to encode logical connectives (this encoding is called Church encoding, specifically the Church Booleans).

Because 'true' and 'false' choose the first or second argument, they may be combined to provide *logic operators*; some operators have multiple possible implementations.

```hs
-- Logical constants
T = TRUE  := λa b. a
F = FALSE := λa b. b

-- Logical connectives
AND  := λa b . a b F
OR   := λa b . a T b
IMP  := λa b . a b T

NOT  := λs. s F T
NOT₂ := λs a b. s b a
IF   := λs a b. s a b
```



### In logic

Logically, the Boolean type, being a sum type, corresponds to a disjunction, `∨`, i.e. `A ∨ B`.

### In algebra

Viewed as an algebraic type...

### In Haskell

In Haskell, the Boolean type is denoted `Bool` and defined as a normal, unspecial user-definable type:

```hs
data Bool = True | False
```

In Haskell, the *canonical sum type* is the `Either` type, defined as

```hs
data Bool = True | False
```



### In set-theory

*Set-theoretically*, the Boolean type would be a disjoint union of a singleton set with itself. A singleton set is e.g. `{∅}`.

A disjoint union is more complicated than the usual set operations. First, the elements of disjoint union are not 'bare' elements like in a set union, but ordered pair like in the Cartesian product. They are pairs consisting of a 'bare' element and a tag that specifies the set the element originates from.

In fact, to construct a disjoint union of sets we'll need to use these set ops
- set union
- Cartesian product
- indexed family of sets


#### Disjoint union of two distinct binary sets

First, we show the construction of a disjoint union of two distinct sets `A` and `B`, or maybe better to denote them `A₀ ⊎ A₁`, and we must also have an indexing set `I` that provides the indices or tags.

```
A₀ ⊎ A₁
---------------
A₀ = {a, b}
A₁ = {b, c}
---------------
I  = {0, 1}
I₀ = {0}
I₁ = {1}
---------------
Aᵢ ⨯ Iᵢ
A₀ ⨯ I₀ = {a, b} ⨯ {0} = {(a, 0), (b, 0)}
A₁ ⨯ I₁ = {b, c} ⨯ {1} = {(b, 1), (c, 1)}
---------------
(A₀ ⨯ I₀) ⋃ (A₁ ⨯ I₁)
= {(a, 0), (b, 0)} ⋃ {(b, 1), (c, 1)}
= {(a, 0), (b, 0), (b, 1), (c, 1)}
```

We get the 4-element resulting set, `{(a, 0), (b, 0), (b, 1), (c, 1)}`. Even though the two sets has the one same element, `b`, that element still occurs twice, each time with an appropriate tag.


#### Disjoint union of a singleton sets

Now, we can construct a disjoint union of a singleton set with itself.

`A ⊎ A` = `{∅} ⊎ {∅}`

A disjoint union of a set with itself is not a just a regular set union, since that would be `A ⋃ A = A`, but we need to tag the elements - elements of a disjoint union are pairs of the form `(x, i)`, where `x` is an element and `i` is a tag or an index. Therefore, we need an indexing set `I` from which we can pull indices as tags. In this particular case, it is sufficient if the indexing set has two elements, say {0, 1}, or maybe better `I = {Left, Right}` or just `I = {L, R}`.

A ⊎ A = {∅} ⊎ {∅}
A = {∅}
I = {L, R}
Aₗ = {(∅, L)}
Aᵣ = {(∅, R)}




*Union* of sets A and B is denoted by `A ⋃ B`.
*Disjoint union* of sets A and B is denoted by `A ⊎ B`.
*Cartesian product* of sets A and B is denoted by `A ⨯ B`.
*Indexed family* of sets is denoted by `Aᵢ {i ∈ I}`.


for the sum (coproduct) type, alternativelly denoted `Sum 1 1`.



denoted realized as a disjoint or discriminated (tagged) union.

or even an *enum* since neither of its two data ctors hold additional data.

Algebrically, it is `Bool = 1 + 1`, that is, as a sum type of two distinct unit types. Alternatively, it can be defined as `Bool = 2 ⨯ 1`, that is, as a product of a pair type and the unit type, but that makes less sense.

If the canonical sum type in TS is the `Either` type, given the type definition of Either, we can define the Boolean type as a 








is the simplest primitive type, which classifies just two values, denoted `true` and `false`, collectively called the Boolean values.

## Literal Boolean types

two Boolean values (), but each Boolean value can be made into a literal type, also denoted `true` and `false`

There is a primitive type `boolean` which 


```ts
// 'builtin' boolean type def
type boolean = true | false

// user-defined boolean type replica relying on
// the given literal boolean types `true` and `false`

type True = true     // aliasing the `true` literal booolean type
type False = false   // aliasing the `false` literal booolean type
type False = 'false' // aliasing the `"false"` literal string type


type Bool = True | False

// boolean = {true, false}
const t: boolean = true
const f: boolean = false

//          true = {true}
const litT: true = true
//          false = {false}
const litF: false = false

const litTF: true | false = false
```
