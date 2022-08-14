# Mutual recursion

https://agda.readthedocs.io/en/v2.6.2.2/language/mutual-recursion.html

Agda offers multiple ways to write mutually-defined data types, record types and functions.
- [Interleaved mutual blocks](#interleaved-mutual-blocks)
- [Forward declaration](#forward-declaration)
- [Old-style mutual blocks](#old-style-mutual-blocks)

The last two are more expressive than the first one as they allow the interleaving of declarations and definitions thus making it possible for some types to refere to the ctors of a mutually-defined datatype.

## Interleaved mutual blocks

*Mutual recursive functions* can be written by placing them inside an `interleaved mutual` block.

The type signature of each function must come before its defining clauses and its usage sites on the rhs of other functions.

The clauses for different functions can be interleaved e.g. for pedagogical purposes:

```hs agda
interleaved mutual

  -- Declarations:
  even : Nat → Bool
  odd  : Nat → Bool

  -- zero is even, not odd
  even zero = true
  odd  zero = false

  -- suc case: switch evenness on the predecessor
  even (suc n) = odd n
  odd  (suc n) = even n
```

You can mix arbitrary declarations, such as *modules* and *postulates*, with mutually recursive definitions.

For *data types and records* the following syntax is used to separate the declaration from the introduction of constructors in one or many `data … where` blocks:

```hs agda
interleaved mutual

  -- Declaration of a
  record _×_ (A B : Set) : Set    -- product record
  data U : Set                    -- universe of codes
  El : U → Set                    -- decoding function


  -- We have a code for the type of Nat in our universe
  data U where `Nat : U
  El `Nat = Nat

  -- Btw, we know how to pair values in a record
  record _×_ A B where
    inductive; constructor _,_
    field fst : A; snd : B

  -- And we have a code for pairs in our universe
  data _ where
    _`×_ : (A B : U) → U
  El (A `× B) = El A × El B

-- we can now build types of nested pairs of naturals
ty-example : U
ty-example = `Nat `× ((`Nat `× `Nat) `× `Nat)

-- and their values
val-example : El ty-example
val-example = 0 , ((1 , 2) , 3)
```

You can mix ctors for different data types in a `data _ where` block (underscore instead of a name).

The interleaved mutual blocks get desugared into the *forward declaration blocks* described below by:
- leaving the signatures where they are,
- grouping the clauses for a function together with the first of them, and
- grouping the constructors for a datatype together with the first of them.


## Forward declaration

*Mutual recursive functions* can be written by placing the type signatures of all mutually recursive function before their definitions. The span of the mutual block will be automatically inferred by Agda:

```hs agda
f : A
g : B[f]
f = a[f, g]
g = b[f, g]
```

You can mix arbitrary declarations, such as modules and postulates, with mutually recursive definitions.

For *data types and records* the following syntax is used to separate the declaration from the definition:

```hs agda
-- forward declaration
data Vec (A : Set) : Nat → Set  -- absence of WHERE
-- definition
data Vec A where                -- absence of a TYPE SIGNATURE
  []   : Vec A zero
  _::_ : {n : Nat} → A → Vec A n → Vec A (suc n)


-- forward declaration
record Sigma (A : Set) (B : A → Set) : Set
-- definition
record Sigma A B where
  constructor _,_
  field fst : A
        snd : B fst
```

The parameter lists in the second part of a data or record declaration behave like variables left-hand sides (although infix syntax is not supported). That is, they should have no type signatures, but implicit parameters can be omitted or bound by name.

Such a separation of declaration and definition is for instance needed when defining a set of codes for types and their interpretation as actual types (a so-called universe):

```hs agda
-- Declarations
data TypeCode : Set
Interpretation : TypeCode → Set

-- Definitions
data TypeCode where
  nat : TypeCode
  pi  : (a : TypeCode) (b : Interpretation a → TypeCode) → TypeCode

Interpretation nat      = Nat
Interpretation (pi a b) = (x : Interpretation a) → Interpretation (b x)
```

!!! note
    In contrast to `interleaved mutual` blocks, in forward-declaration style we can only have one `data ... where` block per data type.


When making separated declarations/definitions private or abstract, you should attach the `private` keyword to the declaration and the `abstract` keyword to the definition.

```hs agda
-- a private abstract function
private
  f : A
abstract
  f = e
```

## Old-style mutual blocks

*Mutual recursive functions* can be written by placing the type signatures of all mutually recursive function before their definitions:

```hs agda
mutual
  f : A
  f = a[f, g]

  g : B[f]
  g = b[f, g]
```

Using the `mutual` keyword, the universe example from above is expressed as follows:

```hs agda
mutual
  data TypeCode : Set where
    nat : TypeCode
    pi  : (a : TypeCode) (b : Interpretation a → TypeCode) → TypeCode

  Interpretation : TypeCode → Set
  Interpretation nat      = Nat
  Interpretation (pi a b) = (x : Interpretation a) → Interpretation (b x)
```

This alternative syntax desugars into the new syntax by sorting the content of the mutual block into a declaration and a definition part and placing the declarations before the definitions.

Declarations comprise:
- Type signatures of functions, `data` and `record` declarations, `unquoteDecl`
  (here *functions* include `postulate`, `primitive`, etc.)
- Module statements, such as `module` aliases, `import` and `open` statements
- Pragmas that only need the name, but not the definition of the thing 
  they affect (e.g. `INJECTIVE`)

Definitions comprise:
- Function clauses, `data` ctors and `record` definitions, `unquoteDef`
- `pattern` synonym definitions
- Pragmas that need the definition, e.g. `INLINE`, `ETA`, etc.
- Pragmas that are not needed for type checking, like compiler pragmas

Module definitions with `module ... where` are not supported in old-style mutual blocks.
