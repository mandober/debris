# Relations: Inductive definition of relations
https://plfa.github.io/Relations/

After having defined operations such as addition and multiplication, the next step is to define relations, such as less than or equal.

## Defining relations

The relation LE (less than or equal to) has an infinite number of instances. Here are a few of them:

```
0 ≤ 0     0 ≤ 1     0 ≤ 2     0 ≤ 3     ...
          1 ≤ 1     1 ≤ 2     1 ≤ 3     ...
                    2 ≤ 2     2 ≤ 3     ...
                              3 ≤ 3     ...
                                        ...
```

And yet, we can write a finite definition that encompasses all of these instances, first, as a pair of inference rules. The two rules of inference, as usual, should describe the base case and the inductive case.

Considering first the base case, the simplest, bottom-most, thing we can say about the `≤` relation is bound to concern 0, namely that given any natural number `n : ℕ`, 0 is LE than n, `0 ≤ n`. This holds if `n` is larger than 0, but it holds as well if `n` is 0 since `0 ≤ 0`; that is, it holds always, it doesn't depend on any assumptions, hence nothing appears above the inference line. The name we give to the base inference rule is `z≤n`.

The inductive case is a more general statement that does depend on an assumption: namely, if we already have the proof `p` that `n ≤ m` holds, than we can conclude that `S n ≤ S m` will hold still.

```
                        p : n ≤ m
------------        -----------------
z≤n : 0 ≤ n         s≤s p : S n ≤ S m
```

And here is the definition in Agda:

```hs agda
data _≤_ : ℕ → ℕ → Set where

  z≤n : ∀ {n : ℕ}
      --------
    → zero ≤ n

  s≤s : ∀ {m n : ℕ}
    → m ≤ n
      -------------
    → suc m ≤ suc n
```

Here, `z≤n` and `s≤s` are the names of ctors, while `zero ≤ n`, and `m ≤ n` and `suc m ≤ suc n` are types.

This is our first use of an *indexed datatype*, where the type `m ≤ n` is indexed by two naturals, `m` and `n`.

Both definitions above tell us the same things:
- Base case: for all naturals `n`, the proposition `zero ≤ n` holds.
- Inductive case: for all naturals `m` and `n`, if the proposition `m ≤ n` holds, then the proposition `suc m ≤ suc n` holds.

In fact, they each give us a bit more detail:
- Base case: for all naturals `n`, the constructor `z≤n` produces evidence that `zero ≤ n` holds.
- Inductive case: for all naturals `m` and `n`, the constructor `s≤s` takes the evidence that `m ≤ n` holds into evidence that `suc m ≤ suc n` holds.
