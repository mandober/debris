# TS :: Ref :: Types :: Template literal types


1. Template Literal Type (TLT) allows us to *concatenate* String Literal Type (SLTs).

```ts
type A = "Be"
type B = "Ge"
type C = `${A}${B}` // "BeGe"
```

2. TLT allows us to *convert* primitive types to SLTs.

```ts
// Converting a NLT to SLT
type Num2Str<T> = `${T}`

// More generally, converting a primitive type to SLT
type Prim = string | number | bigint | boolean | null | undefined
type ToString<T extends Prim> = `${T}`

type t1 = ToString<1>          // "1"
type t2 = ToString<0.1>        // "0.1"
type t3 = ToString<true>       // "true"
type t5 = ToString<undefined>  // "undefined"
type t6 = ToString<null>       // "null"
type t7 = ToString<number>     // `${number}`
type t8 = ToString<string>     // string

type t4 = ToString<boolean>    // "true" | "false"
type t9 = ToString<1 | 2 | 3>  // "1" | "2" | "3"
```

3. The last two examples shows that TTL also distribute between the union type members.


4. TLT allows us to *deconstruct* SLTs.

```ts
type Str2<T extends string>
  = T extends ''
    ? []
    : T extends `${infer X}${infer Xs}`
      ? [ X, Xs ]
      : []


type s0 = Str1<"">     // []
type s1 = Str1<"a">    // ["a", ""]
type s2 = Str1<"ab">   // ["a", "b"]
type s3 = Str1<"abc">  // ["a", "bc"]
```

If the input SLT is the empty string, return `[]`; otherwise we can deconstruct the string into the first letter, `X`, and the rest of letters, `Xs`.
