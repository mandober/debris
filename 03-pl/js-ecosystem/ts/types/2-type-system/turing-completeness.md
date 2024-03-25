# Turing completeness of the TypeScript's type system

## Turing completeness

In practice, a langauge is Turing complete if it supports unbounded iteration (through recursion of while-loops, or GOTO) and conditional code branching. There must also be a way to calculate new values from old ones (otherwise all iteration would either be infinite or not run at all). If recursion is available, there must also be a way to do selection since without it, we cannot select the base case (so any recursive function would result in infinite recursion).

To make it short, Turing completeness requires sequencing, selection and repetition (iteration).

There are Turing complete languages that don't support functions (recursive or not), but they can still be Turing complete if they have the GOTO statement or while loops. However a language with recursive functions needs neither while nor GOTO to be Turing complete. GOTO is not in the set of necessary and sufficient conditions, but there are languages that are no longer Turing complete if you remove GOTO.

A language is Turing complete iff it is able to simulate the operations of a *one-instruction set computer* (OISC); namely, fetching and storing integers in memory and performing the "subtract and branch if zero" operation.

By the *structured programming theorem*, all that is needed for Turing completeness is the ability to do selection (e.g. `if`) and repetition (e.g. `while` loop). Sequencing, such as reading from and writing to the memory is also necessary. Since both of these can be implemented using a conditional jump instruction (e.g. `JNZ` in x86), JNZ is thus sufficient for Turing-equivalence.

## TypeScript's Type System is Turing Complete #14833

TypeScript's Type System (v2.2) is Turing complete.

Turing completeness is being achieved by combining mapped types, recursive type definitions, accessing member types through index types and the fact that one can create types of arbitrary size. In particular, the following device enables turing completeness (with `Thn`, `Els` and `Test` some suitable types):

```ts
type Func<T> = {
  "true": Thn<Func, T>,
  "false": Els<F, T>
}[Test<F, T>]
```

A necessary consequence of being Turing complete is the possibility to create infinite recursion:

```ts
type Foo<T extends "true", B> = {
  "true": Foo<T, Foo<T, B>>
}[T]

let f: Foo<"true", {}> = null!
```

Turing completeness could be disabled in the type system by checking whether a type mentions itself in its own definition (or in a definition of a referenced type) in any way - not just directly - as it is tested currently. This would make recursion impossible.

### Prime numbers example

The following example tests whether a given type represents a prime number:

```ts
type StringBool = "true" | "false"

interface AnyNumber {
  prev?: any,
  isZero: StringBool
}

interface PositiveNumber {
  prev: any,
  isZero: "false"
}

type IsZero<T extends AnyNumber> = T["isZero"]
type Next<T extends AnyNumber> = { prev: T, isZero: "false" }
type Prev<T extends PositiveNumber> = T["prev"]


type Add<T1 extends AnyNumber, T2> =
{
  "true": T2,
  "false": Next<Add<Prev<T1>, T2>>
}[IsZero<T1>]


// Computes T1 * T2
type Mult<T1 extends AnyNumber,
          T2 extends AnyNumber> =
  MultAcc<T1, T2, _0>

type MultAcc<T1 extends AnyNumber, T2, TAcc extends AnyNumber> =
{
  "true": TAcc,
  "false": MultAcc<Prev<T1>, T2, Add<TAcc, T2>>
}[IsZero<T1>]


// monus
type Subt<T1 extends AnyNumber, T2 extends AnyNumber> =
{
  "true": T1,
  "false": Subt<Prev<T1>, Prev<T2>>
}[IsZero<T2>]

interface SubtResult<TIsOverflow extends StringBool,
                     TResult extends AnyNumber>
{
  isOverflowing: TIsOverflow
  result: TResult
}


// Returns a SubtResult that has the result of monus
// and indicates whether there was an overflow (T2 > T1)
type SafeSubt<T1 extends AnyNumber, T2 extends AnyNumber> =
{
  "true": SubtResult<"false", T1>,
  "false": {
    "true": SubtResult<"true", T1>,
    "false": SafeSubt<Prev<T1>, Prev<T2>>
  }[IsZero<T1>]
}[IsZero<T2>]



type _0 = { isZero: "true" }
type _1 = Next<_0>
type _2 = Next<_1>
type _3 = Next<_2>
type _4 = Next<_3>
type _5 = Next<_4>
type _6 = Next<_5>
type _7 = Next<_6>
type _8 = Next<_7>
type _9 = Next<_8>

type Digits = {
  0: _0,
  1: _1,
  2: _2,
  3: _3,
  4: _4,
  5: _5,
  6: _6,
  7: _7,
  8: _8,
  9: _9
}

type Digit = 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9

type NumberToType<TNumber extends Digit> = Digits[TNumber]
// (I don't know why typescript complains here)


type _10  = Next<_9>
type _100 = Mult<_10, _10>


type Dec2<T2 extends Digit, T1 extends Digit>
  = Add<Mult<_10, NumberToType<T2>>, NumberToType<T1>>


function forceEquality<T1, T2 extends T1>() {}
function forceTrue<T extends "true">() { }

//forceTrue<Equals< Dec2<0,3>, Subt<Mult<Dec2<2,0>, _3>, Dec2<5,7>> >>()
//forceTrue<Equals< Dec2<0,2>, Subt<Mult<Dec2<2,0>, _3>, Dec2<5,7>> >>()


type Mod<TNumber extends AnyNumber, TModNumber extends AnyNumber> =
{
  "true": _0,
  "false": Mod2<TNumber, TModNumber, SafeSubt<TNumber, TModNumber>>
}[IsZero<TNumber>]

type Mod2<TNumber extends AnyNumber, TModNumber extends AnyNumber, TSubtResult extends SubtResult<any, any>> =
{
  "true": TNumber,
  "false": Mod<TSubtResult["result"], TModNumber>
}[TSubtResult["isOverflowing"]]


type Equals<TNumber1 extends AnyNumber,
            TNumber2 extends AnyNumber>
  = Equals2<TNumber1, TNumber2, SafeSubt<TNumber1, TNumber2>>

type Equals2<TNumber1 extends AnyNumber, 
             TNumber2 extends AnyNumber,
             TSubtResult extends SubtResult<any, any>> =
{
  "true": "false",
  "false": IsZero<TSubtResult["result"]>
}[TSubtResult["isOverflowing"]]


type IsPrime<TNumber extends PositiveNumber> =
  IsPrimeAcc<TNumber, _2, Prev<Prev<TNumber>>>

type IsPrimeAcc<TNumber, TCurrentDivisor, TCounter extends AnyNumber> = 
{
  "false": {
    "true": "false",
    "false": IsPrimeAcc<TNumber, Next<TCurrentDivisor>, Prev<TCounter>>
  }[IsZero<Mod<TNumber, TCurrentDivisor>>],
  "true": "true"
}[IsZero<TCounter>]


forceTrue< IsPrime<Dec2<1,0>> >()
forceTrue< IsPrime<Dec2<1,1>> >()
forceTrue< IsPrime<Dec2<1,2>> >()
forceTrue< IsPrime<Dec2<1,3>> >()
forceTrue< IsPrime<Dec2<1,4>> >()
forceTrue< IsPrime<Dec2<1,5>> >()
forceTrue< IsPrime<Dec2<1,6>> >()
forceTrue< IsPrime<Dec2<1,7>> >()
```





## Refs

* Turing completeness of TypeScript's type system
https://github.com/Microsoft/TypeScript/issues/14833

* Proof of Turing completeness of TypeScript's type system
https://gist.github.com/hediet/63f4844acf5ac330804801084f87a6d4

* One-instruction set computer
https://en.wikipedia.org/wiki/One-instruction_set_computer

* Structured program theorem
https://en.wikipedia.org/wiki/Structured_program_theorem



TypeScripts Type System is Turing Complete · Issue #14833 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/issues/14833

unsound type constraints · Issue #8459 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/8459

allow recursive generic type aliases · Issue #6230 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/6230

recursive type definitions · Issue #3496 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/3496#issuecomment-128553540

Allow classes to be parametric in other parametric classes · Issue #1213 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/1213

stack overflow in recursive type alias + lookup type · Issue #14837 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/14837

stack overflow in recursive type alias + lookup type · Issue #14837 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/issues/14837

Limit deep generic type instantiations by ahejlsberg · Pull Request #15011 · microsoft/TypeScript
https://github.com/microsoft/TypeScript/pull/15011

Proposal: add a built-in `reduce` function on the type level · Issue #12512 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/issues/12512



## Links

Modularized Front-End: TypeScript and OOP | articles
https://denistakeda.github.io/articles/001_modularized_frontend.html

Improving your React with Typescript ADTs
https://www.javiercasas.com/articles/typescript-adts

Javier Casas
https://www.javiercasas.com/


Programming language - Wikipedia
https://en.wikipedia.org/wiki/Programming_language

Programming language theory - Wikipedia
https://en.wikipedia.org/wiki/Programming_language_theory#History

TypeScript - Wikipedia
https://en.wikipedia.org/wiki/TypeScript

Epigram (programming language) - Wikipedia
https://en.wikipedia.org/wiki/Epigram_(programming_language)

LOOP (programming language) - Wikipedia
https://en.wikipedia.org/wiki/LOOP_(programming_language)



Turing Completeness
https://www.cs.odu.edu/~zeil/cs390/latest/Public/turing-complete/index.html

Turing Complete
https://wiki.c2.com/?TuringComplete



functional programming - What are the practical limitations of a non-turing complete language like Coq? - Stack Overflow
https://stackoverflow.com/questions/3492188/what-are-the-practical-limitations-of-a-non-turing-complete-language-like-coq

regex - Practical non-Turing-complete languages? - Stack Overflow
https://stackoverflow.com/questions/315340/practical-non-turing-complete-languages

computability - Are there minimum criteria for a programming language being Turing complete? - Computer Science Stack Exchange
https://cs.stackexchange.com/questions/991/are-there-minimum-criteria-for-a-programming-language-being-turing-complete

What makes a language Turing-complete? - Software Engineering Stack Exchange
https://softwareengineering.stackexchange.com/questions/132385/what-makes-a-language-turing-complete

How close are common programming languages to not being Turing complete? - Computer Science Stack Exchange
https://cs.stackexchange.com/questions/19676/how-close-are-common-programming-languages-to-not-being-turing-complete

computability - How can primitive recursion be a special case of minimization? - Computer Science Stack Exchange
https://cs.stackexchange.com/questions/135169/how-can-primitive-recursion-be-a-special-case-of-minimization/135175#135175

TypeScript and Turing Completeness | by Ryan Dabler | ITNEXT
https://itnext.io/typescript-and-turing-completeness-ba8ded8f3de3

Esolang, the esoteric programming languages wiki
https://esolangs.org/wiki/Main_Page



Cat's Eye Technologies: How to Recognize Different Kinds of Programming Paradigms from Quite a Long Ways Away
https://web.archive.org/web/20020617124645/http://www.catseye.mb.ca/lala/paradigm/index.html

Cat's Eye Technologies: The Brainf*ck Programming Language
https://web.archive.org/web/20020811173642/http://www.catseye.mb.ca/esoteric/bf/index.html

Cat's Eye Technologies: The Sally Programming Language
https://web.archive.org/web/20020617125108/http://www.catseye.mb.ca/esoteric/sally/

The Polyglot List
https://web.archive.org/web/20020624000812/http://www.nyx.net/~gthompso/poly/polyglot.htm

TypeScripts Type System is Turing Complete · Issue #14833 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/issues/14833

Proof that TypeScript's Type System is Turing Complete
https://gist.github.com/hediet/63f4844acf5ac330804801084f87a6d4

computer science - What are practical guidelines for evaluating a language's "Turing Completeness"? - Stack Overflow
https://stackoverflow.com/questions/449014/what-are-practical-guidelines-for-evaluating-a-languages-turing-completeness

Rust's Type System is Turing-Complete - Recursive Descent into Madness - A countable set of sanities and insanities, by Shea Leffler.
https://sdleffler.github.io/RustTypeSystemTuringComplete/

Proposal: add a built-in `reduce` function on the type level · Issue #12512 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/issues/12512
