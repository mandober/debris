# Signatures

```agda hs
data Vec (A : Set) : ℕ → Set where
  []  : Vec A zero
  _∷_ : ∀ {n} (x : A) (xs : Vec A n) → Vec A (suc n)
```

The first line of the definition declares a new datatype and names it `Vec`.

The words `data` and `where` are keywords.

The part, `Vec (A : Set) : ℕ → Set`, determines the type of `Vec`.

`Vec` is not a single type but rather a family of types.

Vec family of types has one *parameter* `A` of type `Set` (which is the sort of small types, such as ℕ, Bool, …) and one *index* of type `ℕ`.

The parameter `A` represents the type of the objects of the vector.

The index represents the length of the vector.

This line says that, for any concrete type `B : Set` and any natural `m : ℕ`, we are declaring a new type `Vec B m`, which also belongs to `Set`.

Each constructors of a datatype is declared on a separate line and indented with a strictly positive number of spaces (in this case two).

We chose the name `[]` for the first constructor. It represents the empty vector, and its type is `Vec A 0`, i.e. it is a vector of length 0.

The second constructor is a mixfix operator named `_∷_` (pronounced cons). For any number `n : ℕ`, it takes as input an object of `A` and a vector of length `n`. As output, it produces a vector with length `suc n`. The number `n` itself is an *implicit argument* to the constructor `_∷_`.

The final declaration with keyword `ìnfixr` does not belong to the datatype declaration itself; therefore it is not indented. It establishes the precedence of the cons operator.
