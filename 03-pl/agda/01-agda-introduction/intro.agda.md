moule intro where

data Bool : Set where
  true  : Bool
  false : Bool

not : Bool -> Bool
not true  = false
not false = true

equiv : Bool -> Bool -> Bool
equiv true  true  = true
equiv true  false = false
equiv false true  = false
equiv false false = true

_||_ : Bool -> Bool -> Bool
true || true = true
_    || _    = false

infixl 60 _||_


id : (A : Set) -> A -> A
id = \(A : Set) -> \(x : A) -> x

-- we can shift the params on the LHS-RHS

id : (A : Set) -> A -> A
id A x = x

id : (A : Set) -> A -> A
id A = \x -> x


data Nat : Set where
  zero : Nat
  succ : Nat -> Nat


-- tell Agda that our definition of Nat corresponds to the builtin def
{-# BUILTIN NATURAL Nat  #-}


pred : Nat -> Nat
pred zero = zero
pred (succ n) = n

_+_ : Nat -> Nat -> Nat
zero + m = m
succ n + m = succ (n + m)

_*_ : Nat -> Nat -> Nat
zero * n = zero
succ n * m = n * m + m

-- tell Agda that our definitions of + and ⨯ correspond to the builtin defs
{-# BUILTIN NATPLUS  _+_ #-}
{-# BUILTIN NATTIMES _*_ #-}


K : (A B : Set) -> A -> B -> A
K _ _ x _ = x

S : (A B C : Set) -> (A -> B -> C) -> (A -> B) -> A -> C
S _ _ _ f g x = f x (g x)


if_then_else_ : {C : Set} -> Bool -> C -> C -> C
if true then x else y = x
if false then x else y = y

natrec : {C : Set} -> C -> (Nat -> C -> C) -> Nat -> C
natrec p h zero = p
natrec p h (succ n) = h n (natrec p h n)

plus : Nat -> Nat -> Nat
plus n m = natrec m (\x y -> succ y) n

mult : Nat -> Nat -> Nat
mult n m = natrec zero (\x y -> plus y m) n




data List (A : Set) : Set where
  []   : List A
  _::_ : A -> List A -> List A

{-
The arg type (A : Set) is on the left of the colon: this tells Agda that A is a parameter and also A becomes an implicit arg to the data ctors:
    []   : {A : Set} -> List A
    _::_ : {A : Set} -> A -> List A -> List A

Note that this list only allows us to define lists with elements in arbitrary small types, not with elements in arbitrary types. For example, we cannot define lists of sets, since sets form a large type.
-}

map : {A B : Set} -> (A -> B) -> List A -> List B
map f [] = []
map f (x :: xs) = f x :: map f xs
