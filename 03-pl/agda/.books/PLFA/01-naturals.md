# Natural Numbers

https://plfa.github.io/Naturals/

The naturals are an inductive datatype, defined in Agda like so

```agda hs
data ℕ : Set where
  zero : ℕ
  suc  : ℕ → ℕ
```

`ℕ` is the name of the datatype we are defining, and `zero` and `suc` are the data constructors of the datatype.

Both definitions tell us the same two things:
- Base case: zero is a natural number
- Inductive case: if `m` is a natural, then `suc m` is also a natural

Further, these two rules give the only ways of creating natural numbers.

The two definitions correspond to inference rules - each inference rule consists of zero or more judgments, written above the inference line, called hypotheses, and a single judgment written below, called conclusion.

The first rule is the base case - it has no hypotheses, and the conclusion asserts that zero is a natural.

The second rule is the inductive case. It has one hypothesis, which assumes that `m` is a natural, and based on that the conclusion asserts that `suc m` is also a natural.

The keyword `data` tells us this is an inductive definition, that is, that we are defining a new datatype with data constructors. The phrase `ℕ : Set` tells us that `ℕ` is the name of the new datatype, and that it is a `Set`, which says that `ℕ` is a type. By default, in Agde, types are `Set`, however there are extensions where this is not true - that is, in e.g. cubical Agda, not all types are small sets.

The second line, `suc : ℕ → ℕ`, defines natural numbers in terms of natural numbers - how is that allowed? In fact, it is possible to assign the definition a meaning without falling pray to the vicious circle. Furthermore, we can do so while only working with finite sets and never referring to the infinite set of natural numbers.

## Naturals origin story

In this creation story of naturals, in the beginning we know nothing about natural numbers at all. Now, we try to apply the inference rules to all the naturals we know about, but since we don't know about any, the second rule doesn't apply. The first rule does - it says that zero is a natural number, so we add 0 to the set of known natural numbers. The second rule says that if `m` is a natural number (on the day before today) then `suc m` is also a natural number (today). We didn't know about any natural numbers before today, so the inductive case doesn't apply.

On the next and the following days the first rule won't be applicable no more since we already know about 0. But the second rule wil be applicable forever, getting us one new natural eash new day. This day we get `S 0`, the next day `S S 0`, etc.

On the `n`ᵗʰ day there we'll know about `n` distinct natural numbers. Every natural number will appear on some given day. Since `0` appears on the day one, the number `n` appears on the day `n + 1`.

Therefore, we never actually define the set of numbers in terms of itself. Instead, we define the set of numbers on the day `n + 1` in terms of the set of numbers on the day `n`.

This process is called induction. We start with nothing, and build up a potentially infinite set by applying rules that convert one finite set into another finite set.

The rule defining zero is called a base case because it introduces a natural number even when we know no other natural numbers. Unlike the second rule, it can spawn the number zero out of the thin air. The rule defining successor is called an inductive case and it introduces more natural numbers once we already know some.

A philosophical objection that could be raised is that we refer to the days by (natural) number, implicitly involving the understanding of natural numbers. In this sense, this may indeed be regarded as circular in a sense. We could appeal to the intuition that everyone has about the natural numbers and take that as a foundation for their formal description. We could also refer to only those days for which we know a number (dispensing with the reference to nᵗʰ anything).

While the natural numbers have been understood for as long as people can count, the inductive definition of the natural numbers is a relatively recent event. It can be traced back to Richard Dedekind's paper "Was sind und was sollen die Zahlen?" ("What are and what should be the numbers?"), published in 1888, and Giuseppe Peano's "Arithmetices principia, nova methodo exposita" ("The principles of arithmetic presented by a new method"), published in 1889.

## The `NATURAL` pragma

The pragma `{-# BUILTIN NATURAL ℕ #-}` tells Agda that we consider `ℕ` to correspond to the type of natural numbers. In turn we get to use Hindu-Arabic numerals concurrently with the unary notation.

The pragma must be given a previously declared type. In this case, the type must have precisely 2 data constructors: one nullary whose type is defining type (`zero : ℕ`), and the other unary that takes and returning the defining type (`suc : ℕ → ℕ`). This restricts but doesn't completely stops you from messing with this.

As well as enabling us to write naturals using decimal numerals, this pragma also instructs Agda to use a far more efficient internal representation for naturals, translating them into the Haskell's type for arbitrary-precision integers. Representing the natural `n` with 0 and `suc` requires space proportional to `n`, whereas representing it as an arbitrary-precision integer in Haskell only requires space proportional to `log n`. Time-complexity benefit is even more dramatic.

## Equational resoning

Equational resoning is consucted by replacing equals for equals in the equations. We decompose an expression into its constituient, atomic parts, then we replace the atoms with their definitions. Agda provides tools for equational resoning that render the derivations of proofs more readable. These functions, along with the definition of equality, can be imported from Agda's standard library.

The first line imports the module `Relation.Binary.PropositionalEquality` from stdlib but under a new (shorter) name `Eq`.

The second line `open`s the `Eq` module, which amount to adding the names that are specified in the `using` clause into the current scope. The names we need are `_≡_` (propositional equality) and its data ctor `refl` (the name for evidence that two terms are equal).

```agda hs
import Relation.Binary.PropositionalEquality as Eq
open Eq using (_≡_; refl)
open Eq.≡-Reasoning using (begin_; _≡⟨⟩_; _∎)
```

The third line actually imports the functions that help do equational reasoning in a readable way: `begin_`, `_≡⟨⟩_`, and `_∎`.

```agda hs
begin_ : {A : Set} {x y : A} → x ≡ y → x ≡ y
begin_ x≡y = x≡y

_≡⟨⟩_ : {A : Set} (x {y} : A) → x ≡ y → x ≡ y
_ ≡⟨⟩ x≡y = x≡y

_∎ : {A : Set} (x : A) → x ≡ x
_∎ x = refl x
```

Their (simplified) signatures show that `_∎` is actually `refl`, while `begin_` and `_≡⟨⟩_` are aliases for `symm` (symmetry); these two differ only in that the arg `x : A` is implicit in `begin_`, while it is explicit in `_≡⟨⟩_`.

## Propositional equality

The definition of propositional equality, `≡`, is complicated. Below, in the first definition the type `A` is used as an indexing type (into `Set`) twice.

In the second definition, `A` is on the lhs of `:` and thus a parameter (fixed in all the ctors), while on the rhs, `A` is again used but as an index (into `Set`). Also, `A` the parameter has a named argument, `x : A`, so its equation for `refl` does not have to introduce it (as in `refl : (x : A) → x ≡ x` in 1).

This seems to also imply that `refl` is a function type in (1), while being a constant in (2).

```hs
-- (1)
data _≡_ {A : Set}         : A → A → Set where
  refl : (x : A) → x ≡ x
-- (2)
data _≡_ {A : Set} (x : A) :     A → Set where
  refl : x ≡ x
```


## Monus

Since there are no negative natural numbers, if we subtract a larger number from a smaller number we declare the result to be zero. Monus is uses pattern matching against both arguments:

```agda hs
_∸_ : ℕ → ℕ → ℕ
m     ∸ zero   =  m
zero  ∸ suc n  =  zero
suc m ∸ suc n  =  m ∸ n
```

We defined monus to ensure that exactly one equation applies at any given moment. If the second line was instead written as `0 ∸ n = 0`, then it wouldn't be clear whether Agda should use the first or second line to simplify `0 ∸ 0`. In this case, both lines lead to the same answer, but that may not be the case in general.

The pragma `{-# OPTIONS --exact-split #-}` causes Agda to raise an error if cases overlap, which is sometimes helpful. With some logical connectives the overlap may be desirable.

## The story of creation of naturals, revisited

Just as our inductive definition defines the naturals in terms of the naturals, so does our recursive definition define addition in terms of addition. Again, it is possible to assign our definition a meaning without resorting to unpermitted circularities. We do so by reducing our definition to equivalent inference rules for judgments about equality:

```
  n : ℕ
----------
0 + n = n

     m + n = p
---------------------
(suc m) + n = suc p
```

We assume we have already defined the infinite set of natural numbers, `ℕ`, specifying the meaning of the judgment `n : ℕ`.

Now, we apply the rules to all the judgment we know about. The base case tells us that `0 + n = n` for every natural `n`, so we add all those equations.

The inductive case tells us that if `m + n = p` (on the day before today), then `suc m + n = suc p` (today). We didn't know any equations about addition before today, so that rule doesn't give us any new equations:

On the first day, we know about addition with 0:

```
0 + 0 = 0     0 + 1 = 1     0 + 2 = 2     0 + 3 = 3     ...
```

Then we repeat the process, so on the next day we know about all the equations from the day before, plus any equations added by the rules. The base case tells us nothing new, but now the inductive case adds more equations:

On the second day, we know about addition with 0 and 1:

```
0 + 0 = 0     0 + 1 = 1     0 + 2 = 2     0 + 3 = 3     ...
1 + 0 = 1     1 + 1 = 2     1 + 2 = 3     1 + 3 = 4     ...
```

The process continues. On the `m`th day, we'll know all the equations where the first number is less than `m`.

As we can see, the reasoning that justifies inductive and recursive definitions is quite similar. They might be considered two sides of the same coin.

## The story of creation, finitely

The above story was told in a *stratified* way. First, we create the infinite set of naturals. We take that set as given when creating instances of addition, so even on day one we have an infinite set of instances.

Instead, we could choose to create both the naturals and the instances of addition at the same time. Then on any day there would be only a finite set of instances.

In the beginning, we know nothing. Then we apply the rules to all the judgment we know about. Only the base case for naturals applies, so on the first day, we know zero:

```
0 : ℕ
```

Again, we apply all the rules we know. This gives us a new natural, and the first equation about addition. On the second day, we know one and all sums that yield zero:

```
0 : ℕ
1 : ℕ    0 + 0 = 0
```

Then we repeat the process. We get one more equation about addition from the base case, and also get an equation from the inductive case, applied to equation of the previous day. On the third day, we know two and all sums that yield one:

```
0 : ℕ
1 : ℕ    0 + 0 = 0
2 : ℕ    0 + 1 = 1   1 + 0 = 1
```

On the fourth day, we know three and all sums that yield two:

```
0 : ℕ
1 : ℕ    0 + 0 = 0
2 : ℕ    0 + 1 = 1   1 + 0 = 1
3 : ℕ    0 + 2 = 2   1 + 1 = 2    2 + 0 = 2
```

On the `n`th day there will be `n` distinct natural numbers, and `n(n-1)/2` equations about addition. The number `n` and all equations for addition of numbers less than `n` first appear by day `n+1`. This gives an entirely finitist view of infinite sets of data and equations relating the data.
