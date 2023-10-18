# Inductive type

Data types defined using the `data` declaration are inductive, which means that all of their elements are constructed by successive applications of the constructors.

## Induction on ℕ

The prime example of an inductive data type is the type of natural numbers, `ℕ`. Its formation rule, ℕ-form, says that `ℕ : Set`. It has two ℕ-intro rules, `zero : ℕ` and `suc : ℕ → ℕ`, which are its data ctors.

This is typical for inductive types - one rule (data ctor) is a literal, an initial value of that type (i.e. `zero` is a literal and the initial value in the set of ℕ, if, for a moment, we consider the type ℕ as a set), and the other rule is recursive, meaning it takes a value of the type that is being defined and returns a new value of that type (i.e. the `suc` takes a natural and returns a natural). All values of ℕ (i.e. all natural numbers) are constructed starting with the initial value (`zero`) and by repeatedly applying the recursive ctor (`suc`) to the initial value, at least initially, and than to any already constructed value of the ℕ type.

Many other data types follow this, inductive, pattern of definition. Even finite data types (like `Bool`) can be considered an inductive type, although its data ctors are not recursive. We can imagine that a Boolean type could also be defined as having an initial value (e.g. 'false') corresponding to ℕ's `zero`, and another data ctor that constructs the next element of Bool given the initial value or an already constructed Boolean. Of course, with Bool only having two values, defining it that way would be an overkill, so it is defined just by listing its two values (each is a literal, and a data ctor), `false : 𝔹` and `true : 𝔹`, which are its two introduction rules; the Bool's formation rule is `𝔹 : Set`.

Despite the type of naturals being an infinite data type and the type of Booleans being a finite data type, both data types are countable, which suggest that the elimination rules for both of them could be defined according to the same, inductive, schema.

## Principle of induction

Each data type has its own principle of induction, which is the elimination rule. As opposed to introduction rules, which tell us how to construct a value of the type, the elimination rules tell us how to use the type. That is, the elimination rule is realized as a function that takes in the type and returns a value of another types - it tells us how to get out of the type.

Besides being called the elimination rule or the inductive principle, another name for it is the *recusor*. In MLTT, once the type ℕ is defined, the only way to have recursive functions that operate on ℕ, is to write them in terms of the recursor. Concretely, here is the recursor for `ℕ`:

```agda hs
ℕ-elim : {P : ℕ → Set}
       → P 0
       → ((m : ℕ) → P m → P (suc m))
       -----------------------------
       → (n : ℕ) → P n

ℕ-elim f _      0  = f
ℕ-elim f g (suc x) = g x (ℕ-elim f g x)
```

The recursor is a functional that expresses how any property, `P`, is defined on ℕ. It follows the mathematical induction: if we can show that `P` holds for the initial element of ℕ, i.e. `P 0`, and, assuming that `P` holds for any natural number `m`, `P m`, that we can show it holds for its successor, `P (suc m)`, then we can conclude that `P` holds for all natural numbers, `P n`.

## Primitive recursion

This is nothing but the schema for primitive recursion. Recall, the primitive recursion operator, `ρ`, takes two functions, `f`, that handles the base case, and `g`, that handles the recursive case, and produces the function `h` (whose two cases are handled by `f` and `g`), `ρ(f, g) = h`.

The helper function `f` has arity that is one less then `h`'s, and `g` has arity that is one more then `h`'s. The function `h` can take any number of parameters, of which we get to decide which ine to use to recurse over. Choosing the first parameter is traditianal but it is better to choose the last one, since not all operations on the natural numbers (primitive recursion is a schema that operates on the naturals exclusively) are associative (i.e. you can't define exponentian, at least not in a straightforward manner (there has to be a helper, convertor, function), by recursing on the first argument).

```hs agda
-- | unary form of primitive recursion:
h : ℕ → (ℕ → ℕ → ℕ) → ℕ → ℕ
h f g      0  = f
h f g (suc x) = g x (h f g x)

-- | binary form of primitive recursion:
h : (ℕ → ℕ) → (ℕ → ℕ → ℕ → ℕ) → ℕ → ℕ → ℕ
h f g      0  y = f y
h f g (suc x) y = g x y (h f g x y)
```

Comparing the induction principle of ℕ and the unary form of primitive recursion, we see they look very much alike (this is valid Agda code):

```hs agda
-- | ℕ primitive recursion
ℕ-primrec : ℕ                           -- f
          → (ℕ → ℕ → ℕ)                 -- g
            ------------
          → ℕ                           -- x
          → ℕ
ℕ-primrec f _      0  = f
ℕ-primrec f g (suc x) = g x (ℕ-primrec f g x)

-- | ℕ induction principle
ℕ-elim : {P : ℕ → Set}
       → P 0                            -- f
       → ((m : ℕ) → P m → P (suc m))    -- g
       -----------------------------
       → (x : ℕ)                        -- x
       → P x
ℕ-elim f _      0  = f
ℕ-elim f g (suc x) = g x (ℕ-elim f g x)
```

Primitive recursion operates exclusively on ℕ, it takes and returns values of `ℕ`. On the other hand, the inductive principle, takes an `ℕ`, but returns a value of some other type, `P`. The functions `ℕ-primrec` and `ℕ-elim` have different signatures, but their implementations are identical.

## Mathematical induction

In general, an inductively defined type is described by inference rules (inductive clauses) which take the form:

```
A₁ A₂ … Aₙ
----------
    B
```

Premises are writen above the inference line with conclusion below the line. We may read an inference rule in two ways:
- as a rule of logic: if the premises holds then the conclusion holds.
- as a generating rule: if the elements described by the premises are given, then there is an element described by the conclusion.

## Predicates

Inference rules may be used to specify predicates. For example, the predicate `even` states that a natural number is even may be specified as:

```
                        n even
----------        --------------
0 even             S (S n) even
```

A *proof records how inference rules were used* to arrive at a conclusion. For that purpose, all inference rules should have names. If we name the two rules above `even-z` and `even-s`

```hs agda
                               p : n even
----------------        -----------------------
even-z : 0 even         even-s p : S S n even

-- traslated into Agda:
data Even : ℕ → Set where
  even-z : Even 0
  even-s : {n : ℕ} → Even n → Even (S S n)
```

>Note how `even-s` takes an argument - a proof `p` that `n` is even.

The proof that 0 is even is given (as recorded) by the rule `even-z`. The proof that 1 (or any other odd number) is even has no proof - we can't derive that proof using the two rules of inference. We can prove that `S S 0` is even: first we get the proof `p` that 0 is even using the even-z rule; then we apply `even-s` rule to `p` to get the proof that `S S 0` is even; that is, the proof that `S S 0` is even is obtained (recorded) by `even-s even-z`.

```hs agda
                       even-z   : 0 even
                even-s even-z   : S (S 0) even
        even-s (even-s even-z)  : S (S (S (S 0))) even
even-s (even-s (even-s even-z)) : S (S (S (S (S (S 0))))) even
```

We have stumbled onto an important fact: inductive generation of set's elements is the same as the proof of a proposition.

>There is no difference between inductive generation of sets and proofs of propositions.




## Refs

- https://en.wikipedia.org/wiki/Inductive_type
- https://agda.readthedocs.io/en/latest/language/data-types.html
- https://www.andrej.com/zapiski/ISRM-LOGRAC-2022/01-first-steps-with-agda.lagda.html
