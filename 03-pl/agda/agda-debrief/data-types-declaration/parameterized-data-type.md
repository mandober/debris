# Parameterized data type

- Parameters are declared after the data type name but before the colon.
- Parameters DO NOT vary between data constructors.

A data type may have parameters, in which case we say that it is a parameterized data type.

Type parameters of a data type are declared after the name of the data type but before the colon.

```agda hs
data  List  (A : Set)  :  Set  where
  []  : List A
  _∷_ : A → List A → List A
```

In contrast to indices which vary between data constructors, parameters are required to be the same for all data constructors. 
