# Implementing the naturals numbers with TTLs

https://softwaremill.com/implementing-advanced-type-level-arithmetic-in-typescript-part-1/

Since TypeScript 4.8 it is possible to parse a *string literal type* (SLT) to a *number literal type* (NLT). However, in order to get a specific NLT, the input SLT must not only be numeric but it must also be in a particular format.

1. In order to get a NLT from a SLT, the SLT must be a numeric string, otherwise we won't get neither a NLT nor `number` (but e.g. `never`, depending on the implementation of the type function that parses SLT).

2. The input numeric SLT must be in the plain decimal number format, otherwise we'll get back only the `number` type. So the SLT must be an well-formed integer or a floating-point number in decimal format: binary, octal, hex, scientific formats won't do. Moreover, **well-formed** means there must not be any surpuflouos zeros prepended (for integers) or appended (for floats), and floats must have a leading zero before a decimal point (ok: `0.1`, not: `.1`).


The implementation of `Str2Num` type function, that converts a SNL to NLT:

```ts
type Str2Num<T extends string>
  = T extends `${infer Digit extends number}`
    ? Digit
    : never
```

`Str2Num` function works thanks to *template literal types*, the shorthand construction `infer A extends B`, and the fact that we can place this shorthand construction into a template literal which `extends` some type `T`.

on the right-hand side, that lets us "parse" a string letter by letter by decomposing it into individual letters.





Here are the results of some conversions:

```ts
type Str2Num<T extends string>
  = T extends `${infer Digit extends number}`
    ? Digit
    : never

// conversions
type c1 = Str2Num<"0">       // 0
type c2 = Str2Num<"00">      // number ❕
type c3 = Str2Num<"0.0">     // number ❕❕
type c4 = Str2Num<"0.1">     // 0.1
type c5 = Str2Num<"000.1">   // number
type c6 = Str2Num<"0.10">    // number ❕❕
type c7 = Str2Num<"-0.0">    // number ❕❕
type c8 = Str2Num<"-0.01">   // -0.01
type c9 = Str2Num<".01">     // number ❕
type c0 = Str2Num<".1">      // number ❕
type i1 = Str2Num<"1">       // 1
type i2 = Str2Num<"01">      // number
type i3 = Str2Num<"100">     // 100
type i4 = Str2Num<"Math.PI"> // never
type i5 = Str2Num<"2e16">    // number
type i6 = Str2Num<"0xff">    // number
type i7 = Str2Num<"-2">      // -2
type i8 = Str2Num<"-3.24">   // -3.24
type i9 = Str2Num<"3dea">    // never
```


Our biggest concern is that any number of leading zeros will produce `number`, and since we need to convert back and forth between SLT and NLT we must be aware of that issue.

```ts
type Str2Num<T extends string>
  = T extends `${infer Digit extends number}`
    ? Digit
    : never

type example = Str2Num<"42">   // 42
type example = Str2Num<"2e16"> // number
```

* `Str2Num` converts a literal string to a literal number
* `Num2Str` converts a literal number to a literal string

```ts
type Num2Str<T extends number> = `${T}`
```

We can convert `T` from `number` to `string` via `${T}`. So 100 becomes "100".

We must perform arithmetic by manipulating the string literal types.

In order to decremenet a NLT by one:
- we convert NLT to SLT, `124` -->> "124"
- reverse the SLT,       "124" -->> "421"
- predecessor:           "421" -->> "{4}21" -->> "{3}21" -->> "321"
- remove leading zeros,  "321" -->> "321"
- reverse,               "321" -->> "123"
- Str2Num,               "123" -->> `123`


The predecessor type function manipulates SLT. We first convert a NLT to SLT and then reverse the SLT before calling the `pred` on it.

The `pred` type function:
- the call is `Pred<"XYZ">`
- if `X = 0`, we add "9", and recurse on the rest of digits, `Pred<YZ>`
- otherwise:
  - we replace the digit with one digit less than it, i.e.
    - if X = 1 then X = 0
    - if X = 2 then X = 1
    - if X = 3 then X = 2
    - …
    - if X = 8 then X = 7
    - if X = 9 then X = 8
  - We can do this compactly by placing the replacement digits in a tuple and indexing this tuple with `X`, i.e. [9,0,1,2,3,4,5,6,7,8]["X"]


It works similarly to how you would do long subtraction in elementary school. We take the last digit (here, it's the first one because the number is reversed) and consider two cases:
* If the digit d is not 0, then we replace it with d-1.
  For example, 8 becomes 7, 4 becomes 3, etc.
* If the digit is 0, then we put 9 and recursively subtract 1 from the rest of
  the number. For example, for 80, we'd have "08" (remember, the argument here should be reversed), which we'd change to 9${Minus1<8>}, which would become "97," and after reversing "79."

A cool trick in this type is how we replace d with d-1 using a tuple [9, 0, 1, 2, 3, 4, 5, 6, 7, 8] and indexing it with the `Digit`. Since the elements in the tuple are shifted, the element at index 3 has 2, index 8 has 7 in it, and so on.



Let's compose the above types to create a type that will subtract one from a number and give us a number back:

```ts
type AlmostFullMinusOne<T extends number> =
  ParseInt<Trim<Rev<MinusOne<Rev<`${T}`>>>>>

AlmostFullMinusOne<42> // 41
```

When reading such types, remember to read outwards from the most nested part (in this case, from ${T}). To make it easier to follow, let's also assume that we are evaluating MinusOne<100>.
- First, we convert T from a number to a string via ${T}. So 100 becomes "100".
- Then we reverse it. So "100" becomes "001".
- Then we apply Minus1. So following the rules we described above, we get "990".
- We reverse the string again. So "990" becomes "099".
- We remove any leading zeros that may have been generated in the process. We have to do this because otherwise, our ParseInt type would yield a generic number. In our example, "099" becomes "99".
- Finally, we apply ParseInt. So "99" becomes 99.

## Full MinusOne

AlmostFullMinusOne, which we implemented in the previous section, doesn't handle two important cases: when T = 0 and T < 0

The first one is easy; we'll just hard-code the answer: T extends 0 ? -1 : .... Now, if the number is negative (its string representation starts with a "-" sign), then we'll grab the absolute value, add one to it, and put the minus sign back. To add one to a number, we'll need a Plus1, but this one is analogous to Minus1, so I won't describe it in as much detail:

```ts
type Plus1<S extends string> = S extends "9"
  ? "01"
  : S extends `${infer Digit extends number}${infer Rest}`
  ? Digit extends 9
    ? `0${Plus1<Rest>}`
    : `${[1, 2, 3, 4, 5, 6, 7, 8, 9][Digit]}${Rest}`
  : never
```

Having this, we can finally implement the full MinusOne and analogous PlusOne:

```ts
export type MinusOne<T extends number> =
  T extends 0
    // T = 0
    ? -1
    : `${T}` extends `-${infer Abs}`
      // T < 0
      ? ParseInt<PutSign<Rev<Plus1<Rev<Abs>>>>>
      // T > 0
      : ParseInt<Trim<Rev<Minus1<Rev<`${T}`>>>>>
```
