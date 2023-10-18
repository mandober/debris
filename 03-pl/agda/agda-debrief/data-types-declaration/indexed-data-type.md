# Indexed data type

An indexed data type is a family of types indexed by another type. A dependent indexed data type is a family of types indexed by the value of another type.

In parameterized data type, parameters are declared after the name of the datatype but before the colon.

```agda hs
data  List  (A : Set)  :  Set  where
  []  : List A
  _∷_ : A → List A → List A
```

In contrast to parameters that are required to be the same for all data constructors, indices can vary from constructor to constructor. Indices are declared after the colon, as function arguments to `Set`.

For example, fixed-length vectors (vector is a list indexed by its length of type Nat) can be defined by indexing them over their length of type `Nat`:

```agda hs
data  Vec (A : Set)  :  Nat → Set  where
  []  : Vec A zero
  _∷_ : {n : Nat} → A → Vec A n → Vec A (suc n)
```

The parameter `A` (as `(A : Set)`) is bound once for all constructors, while the index `{n : Nat}` must be bound locally in the constructors - in Vec definition above it is bound only in cons, since nil fixes it at 0. That is, the data ctor nil or `[]` only defines a 0-length vectors; "vectors" coz there are still many types of vectors that varying by the parameter `A` even if the index is fixed at zero, e.g. `Vec Bool 0`, `Vec Int 0`, etc; in case `A` is the 𝟘 type, `Vec 𝟘 0`

### Examples of concrete vector types

The `Vec` type above is polymorphic since it varies in the type of elements, `A`, it is parameterized by `A`. But it also varies by the actual value of its index type, which is `Nat`, andrepresents the actual length of the vector.

### Index 0

The nil or `[]` ctor deals with the case when the index value is `0`. Even if index is `0`, there are still infinitely many vector types indexed by `0`.

With index fixed at `0`, vectors still vary by the type of their elements, `A`. However, this is a vacouus case since vectors with length 0 do not have any elements - they are all empty vectors, but (vacuously) of different types.

These are some concrete types of vectors with index `0`:
- `Vec 𝟘 0`
- `Vec 𝟙 0`
- `Vec Bool 0`
- `Vec ℕ 0`

The type `Vec Bool 0` has only 2 inhabitants… No! It has none, since its length is `0`! (Recall that vectors are indexed by their length). Hah, wrong again! It actually has 1 term - the nil vector
- `[] :: Vec Bool 0`

The type `Vec 𝟘 0` is a nihilistic one but it still has one term:
- `[] :: Vec 𝟘 0`

The type `Vec 𝟙 0` also has 1 term:
- `[] :: Vec 𝟙 0`

For each type `A`, `Vec A 0` has 1 term:
- `[] :: Vec A 0`

>When the index is `0`, whatever the type of parameter is (param `A`), each one of these types will only have a single term - the nil vector, `[] : Vec A 0`.

### Index 1

The type `Vec 𝟘 1` is a nihilistic one but it still has one term:
- `[] :: Vec 𝟘 0`


The type `Vec Bool 1` has only 2 terms… No? Not no! But a Yes! 
Its two 2 inhabitants are these 2 terms:
1. `false :: []`, vector of length 1
2. `true :: []`, vector of length 1

although they are not very vector-y or useful...

The type `Vec Bool 1` has only 2 terms… No? Not no! But a Yes! 







e.g. `Vec Nat Nat`, `Vec Bool Nat`, `Vec Int Nat`. Type `Vec 𝟘 Nat`


varies 
vectors
