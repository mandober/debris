---
downloaded:       2022-03-05
page-url:         https://www.idris-lang.org/pages/example.html
page-title:       Example
---
# Example

Idris is a purely functional programming language, with first class types, meaning that types are first class language constructs, and can be computed,stored in variables, passed to and returned from functions, just like any other first class construct. Idris has many simlarities with Haskell.

```
main : IO ()
main = putStrLn "Idris 2"
```

Having first class types means you can write functions to calculate types:

```
IntOrString : (isInt : Bool) -> Type
IntOrString True = Int
IntOrString False = String
```

And you can then use such functions in a type. The following function either converts an `Int` to a `String`, or reverses a `String`:

```
showOrReverse : (isInt : Bool) -> IntOrString isInt -> String
showOrReverse True x = show x
showOrReverse False x = reverse x
```

This mechanism allows us to give types to printf-like functions

```
printf : (format : String) -> PrintfType format
```

Idris data types are declared using a similar syntax to Haskell data types. For example, natural numbers, an option type and lists are declared in the standard library as

```
data Nat     = Z       | S Nat
data Maybe a = Nothing | Just a
data List a  = Nil     | (::) a (List a)
```

Functions are implemented by pattern matching. Addition on natural numbers in the standard library is defined as:

```
(+) : Nat -> Nat -> Nat
Z     + y = y
(S k) + y = S (k + y)
```

Having types as a first class construct means that we can write functions to compute types, as with printf above. Also, it means that we can include values in types, to make those types more descriptive. A *dependent type* is a type which is computed from, or depends on, another value.

A classic introductory example of a dependent type is the type of vectors, which are lists which carry their size in the type. They are declared as follows in the standard library, by giving explicit types for each of the constructors:

```
data Vect : Nat -> Type -> Type where
    Nil  : Vect Z a
    (::) : a -> Vect k a -> Vect (S k) a
```

The types of functions defined over vectors will then state explicitly in the type how the function affects the size of the vectors. If we append two vectors, the length of the result is the sum of the lengths of the inputs

```
app : Vect n a -> Vect m a -> Vect (n + m) a
app Nil       ys = ys
app (x :: xs) ys = x :: app xs ys
```

* https://idris2.readthedocs.io/en/latest/
* https://github.com/idris-lang/Idris2
* https://github.com/edwinb/idris-lang.org/

- https://github.com/edwinb/Idris2/blob/main/tests/typedd-book/chapter06/Printf.idr
