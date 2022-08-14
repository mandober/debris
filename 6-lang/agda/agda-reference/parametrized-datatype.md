# Parametrized datatype

Data types can have (type) parameters which are declared after the name of the datatype *but before the colon*.

For example, the type of lists, `List A`, is parametrized by the type `A`. This type `A` is then accessible to all ctors.

```hs
data List (A : Set) : Set where
  []  : List A
  _∷_ : A → List A → List A
```

The type `A`, declared before the colon, *is fixed throughout the data type declaration*, and thus, it is available in the signature of the ctors. When a ctor mentions the type `A`, it is talking about the same `A` type declared in the header of the data type (because `A` was declared before the colon).

If the type `A : Set` is declared *after the colon*, then it is scoped only in the header, which ends with the `where` keyword. Then any `A` introduced by a ctor would be a fresh type `A`, so actualy, some other `A'` type, and that `A'` type would be scoped only in the signature of that particular ctor.
