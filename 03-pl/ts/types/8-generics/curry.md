# Defining and typing the `curry` function

## Defining the `curry` function

Currying is a technique of transforming an *`n`-ary function* - a polyadic funtion that takes *`n`-tuple of arguments* - into a sequence of `n` nested functions, each of which takes a single argument, while the last and innermost function, finally having all the args available, computes and returns the overall result.

This general desciption is well known, but that's all that is said about it. The definition of the goal - a higher-order function named `curry` - is not standardized or canonical, and the possible edge cases are not taken into account.

- higher-order function (HOF), `curry`
- original function, `f`
  - polyadic function `f`
  - `f` is passed as arg to `curry`, so it is also a function arg, farg
- a number of unsaturated intermediary functions
- final saturated function
- function argument, aka `f`
- other arguments, aka args of `f`
- the args (to the diff versions of an `n`-ary function) can be passed:
  - as `1`-tuple at a time, `n` times (aka one arg at a time)
  - as `2`-tuple at a time, `n / 2` times
  - as `3`-tuple at a time, `n / 3` times
  - as `k`-tuple at a time, `n / k` times
  - as `n`-tuple at a time, `1` time (aka all `n` args at once)


```js
const f = (a,b,c) => a
```

A ternary function `f3`, defined as `const f = (a,b,c) => a`, declares its arguments, like all JS functions do, using a *parameter quasi-list*, which is a (1) parenthesized (2) sequence.

A declaration of function's formal parameters requires parenthesis (except in the case of a unary arrow fucntion when parens are optional), that is, the quasi list of formal params have to be parenthesized. It is a quasi list - or a quasi array, or more properly a *quasi tuple* - **but quasi nontheless because this data structure does not have first-class status** (it is not a first class value like array is, i.e. it cannot be passed around and manipulated on its own, out of the context of a fucntion definition). The same quasi tuple is also used in function calls, but there, it is populated by real values, that is, it holds function's arguments.

```js
const f = (a,b,c) => a
```

`f(1,2,3)` vs `f([1,2,3])` vs `f((1,2,3))`

`f` declares its args as a *quasi 3-tuple*, `(a,b,c)`. This is a quasi structure because it cannot stand on its own, i.e. it is not a first-class value. Function `f` can be calle, e.g. `f(1,2,3)`, which also uses the same quesi tuple to pass these 3 args to the function. Again, `(1,2,3)` is a quasi tuple - a proper tuple (or in JS, since it has no tuples, a proper array), is a *single value* - not 3 separate values - it would be passes as `f([1,2,3])`. Tuples, in languages that support them, are usually expressed as parenthesized sequences, such as `(a,b,c)`, which is why function's formal parameters and arguments are said to use a *quasi **tuple*** - and not a quasi set/list/array, although the phrases "quasi array" or "quasi list" are sometimes used as well.

Anyway, we'll call it a *quasi tuple*, or just *tuple* when unambiguous, and now we can describe **the ways in which arguments can be passed to a function in function calls**.

Different forms of passing the args, to an `n`-ary function `f`, in calls to that function `f` - aka, different versions of *argument packing*:
- `1`-tuple at a time, `n` times (aka 1 arg at a time, n times)
- `2`-tuple at a time, `n / 2` times
- `3`-tuple at a time, `n / 3` times
- `k`-tuple at a time, `n / k` times
- `n`-tuple at a time, `1` time (aka all `n` args at once)


An **abstract function** names all the versions of the same function, arg-wise; that is, curryied and uncurryied versions particularly (and any intermediary versions args-wise, e.g. a 5-ary function that takes its first 3 args 3-at-once and then takes the last two args in a one-by-one manner) of a function are counted as the same abstract function.

For example, argument packing forms in calls to the **abstract function** `g`, with some versions of `g` defined as below (below, `g` return type is boolean so it arbitrarily returns `true`; the return type/value is immaterial in these considerations).

```ts
// uncurryied `g`
const g = (a, b, c) => true

// curryied `g`
const g = a => b => c => true

// intermadiary versions of `g`:
const g = (a, b) => c => true
const g = a => (b, c) => true
```

Note: the number of ways to group `n` elements is known as a ~~Catalan numbers~~ (?). These nubers are terms of the sequence 1, 1, 2, 4, 7, 23


Numerators of `a(n + 1) = Σ_{k=1}^n  a'(n/k)`, a(1)=1 , 
where `a'(x) = a(x)` if `x ∈ ℤ`, 
and is linearly interpolated otherwise.

```
         ₙ 
a(n+1) = Σ  a'(n/k)
        ᵏ⁼¹
```

a(1) = a'(1) = 1

a(2)
= a(1+1)
= a'(1/1)
= a'(1)
= a(1)
= 1

so a'(x) = 1  forall x ∈ [1,2]


             k=1
a(1+1) = a'(2 /1)

             k=1        k=2
a(2+1) = a'(2 /1) + a'(2 /2)




n = 0  1  2  3  4   5    6    7, …
a = 1, 1, 2, 4, 7, 23,  35, 155, …



- 0: 1  (one way to group 0 elems)
- 1: 1  (one way to group 1 elem)
- 2: 2
- 3: 4
- 4: 7
- 5: 23


```
{a,b} :=
  { (a, b)
  , (a)(b)
  }

{a,b,c} :=
  { (a, b, c)
  , (a, b) (c)
  , (a) (b, c)
  , (a) (b) (c)
  }


{a,b,c,d} :=
(a) (b) (c) (d)  | . . . .  0     | 1 1 1 1 | 
                 | . . . x  1 N/A |         | 
                 | . . x .  2 N/A |         | 
(a) (b) (c, d)   | . . x x  3     | 1 1 2   | 
                 | . x . .  4 N/A |         | 
                 | . x . x  5 N/A |         | 
(a) (b, c) (d)   | . x x .  6     | 1 2 1   | 
(a) (b, c, d)    | . x x x  7     | 1 3     | 
                 | x . . .  8 N/A |         | 
                 | x . . x  9 N/A |         | 
                 | x . x .  a N/A |         | 
                 | x . x x  b N/A |         | 
(a, b) (c) (d)   | x x . .  c     | 2 1 1   | 
                 | x x . x  d N/A |         | 
(a, b, c) (d)    | x x x .  e     | 3 1     | 
(a, b, c, d)     | x x x x  f     | 4       | 
(a, b) (c, d)    | x x y y  ???   | 2 2     | 


------- 1-elem per group
a b c d
------- 2-elems per group
a b cd
a bc d
ab cd
-4---- three-per-gr -----5-------------6---------------------
abc d                     abc de        abc def     3 3
                                        abc de f    3 2 1
                                        abc d e f   3 1 1 1

a bcd                     ab cde        ab cde f    2 3 1
                                        a b cde f   1 1 3 1
                          a bcd e       a bcd ef    1 3   2
                                        a bcd e f   1 3 1 1


=============== 4 =======
= 4               abcd
= 3 + 1           abc d
= 1 + 3           a bcd
= 2 + 2           ab cd
= 2 + 1 + 1       ab c d
= 1 + 2 + 1       a bc d
= 1 + 1 + 2       a b cd
= 1 + 1 + 1 + 1   a b c d
=============== 4 =======


=============== 5 elems ===========================
5+0 abcde
0+5 a b c d e

4+1
1+4

3+2
2+3

3+1+1
1+3+1
1+1+3

2+1+1+1
1+2+1+1
1+1+2+1
1+1+1+2



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 5 ........... 2
= 5              abcde       5 0
= 1 1 1 1 1      a b c d e   0 5

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 4 ........... 2
------------------- 4,1
= 4 + 1          abcd e      4 1
= 1 + 4          a bcde      1 4

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 3 ........... 5

------------------- {3,2}
= 3 + 2          abc de      3 2
= 2 + 3          ab cde      2 3

------------------- {3,1,1}
= 1 + 1 + 3      a b cde     1 1 3
= 1 + 3 + 1      a bcd e     1 3 1
= 3 + 1 + 1      abc d e     3 1 1

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 2 ........... 7

----------------- 2,2,1 ......................... 3
= 2 + 2 + 1      ab cd e
= 2 + 1 + 2      ab c de
= 1 + 2 + 2      a bc de

----------------- 2,1,1,1 ....................... 4
= 2 + 1 + 1 + 1  ab c d e
= 1 + 2 + 1 + 1  a bc d e
= 1 + 1 + 2 + 1  a b cd e
= 1 + 1 + 1 + 2  a b c de


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 1
----------------- 1,1,1,1,1
(look up 0 5)

======================================================= = ====
                                          = 2+2+5+7+3+4 =  23



= 1 + 3           a bcd
= 2 + 2           ab cd
= 2 + 1 + 1       ab c d
= 1 + 2 + 1       a bc d
= 1 + 1 + 2       a b cd
= 1 + 1 + 1 + 1   a b c d
=============== 5 =======



grouping 4 elements
such that only adjacent elems can be grouped,
gives 4 places
so 2⁴ = 16 possible combinations
out of which 9 are invalid
==============================================
thus, there are 7 + 1 = 8
8 valid ways to group 4 elements!
==============================================
{a,b,c,d} :=
 1:  (a) (b) (c) (d)       a b c d
 2:  (a) (b) (c,  d)       a b cd
 3:  (a) (b,  c) (d)       a bc d
 5:  (a,  b) (c) (d)       ab c d
 8:  (a,  b),(c,  d)       ab cd
 4:  (a) (b,  c,  d)       a bcd
 6:  (a,  b,  c) (d)       abc d
 7:  (a,  b,  c,  d)       abcd
```



## Typing the `curry` function

Properly typing the `curry` function is a long standing problem in TS. The `curry` function can bew typed improperly using the `any` type, but the goal is 100% type safety, not just a partial type safety.

## Unsafe curry

Here's a definition of `curry` in JS:

```js
const curry = (f, ...xs) =>
  f.length <= xs.length
    ? f(...xs)
    : ((...ys) => curry(f, ...xs, ...ys))
```



The logic of this implementation is to accept a polyadic function that is to be curryied, and then to keep returning a function that would collect the rest of arguments until all args are gathered, at which time the original function is called by passing it all the required args.

This version is much more relaxed than a proper 'curry' function should be, tolerating very weird behaviours. A proper 'curry' should be a functional that, applied to a polyadic function, returns its version endowed with the capability to take the args one at the time (rather than all at once). That's it. That's all that's prescibed by the standard, if it can be called a standard at all. It is more of an expectation at best.



```ts
const curry = (f: any, ...xs: any) : any =>
  f.length <= xs.length
    ? f (...xs)
    : (...ys: any) : any =>
      curry (f, ...xs, ...ys)
```


Calling the curryied function with one arg at the time is, naturally, supported - this is how a curryied functions is supposed to behave. However, this version does not force the arguments to be passed that way exculusively. Namely, the args can 


also allows the arg

passing it arguments one-by-one, but also many-at-once, as well as 


The other param, `xs`, is used in recursive call, but it may also be used initially in calls such as `curry(f, a)`, where `f` has the parameters, say, `a`, `b` and `c`. The `curry` then allows us to call `f` also as `curry(f)(a)(b)(c)`, which is the call form most expected when currying a function like `f`. However, thsi implementation of `curry` in addition enables some stanger call forms, such as

```ts
// the def of polyadic function
const f = (a,b,c) => a
// it is called as usual:
let _ = f(a,b,c)

// ** Canonical initial call **
// Initially, apply `curry` to a polyadic function
// in order to create its curryied version:
const cf = curry(f)
// then call the curryied version by supplying each arg separetely:
_ = cf(a)(b)(c)
// aka
_ = curry(f)(a)(b)(c)

// ** Non-canonical initial call **
// is also possible: we pass the function along with its (first) arg to curry:
const cfa = curry(f, a)
// then apply it to the rest of args in a one-by-one manner:
_ = cfa(b)(c)

// ** Canonical non-initial calls **
// This def of curry also allows for some non-standard call forms:
_ = curry(f)(a,b)(c)
_ = curry(f)(a)(b, c)
// and some weirder call forms
_ = curry(f)(a)()()(b)()(c)
// and even this defeating-the-purpose call:
_ = curry(f)(a, b, c)
```





An uncurryied function type `F` take a tuple of params `P` and a returns a type `R`. `P` tuple type of params is `[A1, A2, …, An]`. We want to transform `F` into a curryied function type `C` that takes the fst param from the tuple, `A1`, and returns a curryied function, which repeats this process until all the param types from the input tuple are exhausted.

```ts
// uncurryied function type
type F = (a1: A1, a2: A2) => R

// curryied function type
type C = (a1: A1) => (a2: A2) => R

// the goal
Curry<F> == C
```

The `Curry` type function we are trying to create is a recursive function type that varies with the length of `P`.




The `Bin` below is a binary function type that declares a 2-tuple, so `P` is `[number, string]`, and the return type `R` is `boolean`.

```ts
type Bin = (x: number, y: string) => boolean
const bin: Bin = (x, y) => true
```



## Refs
* Conditional types
https://www.typescriptlang.org/docs/handbook/2/conditional-types.html

* Learn how to create types for curry
https://medium.com/free-code-camp/typescript-curry-ramda-types-f747e99744ab
