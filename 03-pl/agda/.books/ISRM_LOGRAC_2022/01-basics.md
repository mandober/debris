# ISRM-LOGRAC-2022
http://www.andrej.com/zapiski/ISRM-LOGRAC-2022/01-first-steps-with-agda.lagda.html

About the course
1. First steps with Agda
2. Dependent types
3. Dependent sums and records
4. Records as structures
5. Logic
6. Propositions as types


# 1. First steps with Agda

1.1. Proof assistants and Agda
1.2. Installing and obtaining Agda
1.3. Agda files and modules
1.4. Booleans
1.5. Natural numbers
1.6. Inductive generation
1.6.1. Predicates versus boolean functions
1.7. Further examples of inductively defined predicates
1.8. Other inductive datatypes
1.9. Supplementary material

## 1.6. Inductive generation

The datatypes defined using `data` are inductive, by which we mean that all of their elements are constructed by successive applications of the constructors.

For example, all natural numbers are defined starting with 0 and applying `suc`.

Mathematically speaking, an inductively defined set is described by inductive clauses or inference rules which take the form

```
P₀ P₁ … Pₙ
----------
    C
```

Above the line are the *premises* `Pᵢ` and below the line is the *conclusion* `C`. We may read such a rule as
- an inference rule of logic: if premises hold then the conclusion holds.
- a rule that generates an element of a type: 
  if the elements described by the premises are given, 
  then there exists an element described by the conclusion.

For example, the clauses for generating the natural numbers are

```
                   n : Nat
----------      -------------
zero : Nat       suc n : Nat
```

The definition of `Nat` as an datatype directly mirrors these rules. Likewise, the inductive definition of Booleans is expressed by the inductive clauses:

```
--------        ---------
true : 𝔹        false : 𝔹
```

Inference rules may be used to specify *predicates* and *relations*.

For example, the predicate `even` that states that a number is even may be specified as follows:

```
                      even n
---------        ------------------
even zero        even (suc (suc n))
```

> A proof records how inference rules were used to arrive at a conclusion, and to that effect, inference rules should have names.

So we should name the two inference rules above for `even`:

```
                                  p : even n
-----------------        ---------------------------
even₀ : even zero        evenₛ p : even (suc (suc n))
```

Note that `evenₛ` takes an argument, namely a proof, `p`, that shows that `n` is even. Now we record the proof that "S S S S 0 is even" by listing all the inference rules used to derive it.

- proof that 0 is even, `even₀ : even 0` 
  is obtained by directly citing the axiom 1
- proof that 2 is even, `evenₛ even₀ : even 2`: 
  we apply the rule `evenₛ` to the rule `even₀`
  which reads: 0 is even, and if 0 is even, then 2 (S S 0) is even. 
  We have obtain the proof that 0 is even directly from the rule 1. 
  Then `n` in the rule 2 (above the line) is instantiated to 0, 
  allowing us to conclude that S S 0 (2) is also an even number.
- And similarly for the subsequent even numbers, so "4 is even" is  
  `evenₛ (evenₛ even₀) : even (S S S S 0)`

>There is no difference between inductive generation of sets and proofs of propositions.

We now know how to define a predicate in Agda - as an inductive datatype; in fact, as an indexed type family (a type indexed by Nat):

```hs
data even : Nat → Set where
  even₀ : even zero
  evenₛ : {n : Nat} → even n → even (suc (suc n))
```
