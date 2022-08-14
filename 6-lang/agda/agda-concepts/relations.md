# Relations

In Agda, we can model a relation on a set `A` as a value `R : A -> A -> Set`.

Such an `R` takes in two elements of type `A` and returns a `Set`. Under the CHI, on which Agda is based, a `Set` can just as well be viewed as a formula. So, a binary relation, as modeled in Agda, is a function which takes two elements of `A` and returns a formula. But what formula is it? We should think of it as a formula that is provable iff the two elements indeed stand in the relation to one another.

```hs agda
-- ↓ _>_ a means that the > relation is well-founded below a.
-- That is, there are no infinite chains (a > a₁ > …) starting with a.
-- One can also say that > terminates from a.
data ↓    {ℓ ℓ'}
       -> {A : Set ℓ}
       -> (_>_ : A  ->  A  ->  Set ℓ')
        : A -> Set (ℓ ⊔ ℓ')
  where
  pf↓  :  ∀ {x : A}
      -> (∀ {y : A}  ->  x > y  ->  ↓ _>_ y)
      ->                            ↓ _>_ x


↓𝔹 : ∀ {ℓ} {A : Set ℓ} (_>_ : A  ->  A  ->  𝔹)  -> A -> Set ℓ
↓𝔹     {ℓ} {A}          _>_                        x =
  ↓    {ℓ} {lzero} (λ (x y : A) -> (x > y) ≡ true) x
```

This is more general than modeling a relation as a Boolean function of the type `A -> A -> 𝔹`. A concrete example is the function `_<_ : ℕ -> ℕ -> 𝔹`. We can model this as the relation `λ (x y : ℕ) -> x < y ≡ true`.

This has type `ℕ → ℕ → Set` because it takes in arg `x` and `y` of type `ℕ`, and returns `(x < y) ≡ true`, which is a `Set`. Any function of type `A → A → 𝔹` can be turned into one of type `A → A → Set`, but the reverse is not possible in general, in Agda.

The file <termination.agda> uses a more general notion of relation as function of type `A → A → Set`, though there is also a helper definition for the more specific type of relation.

In the file <termination.agda>, the type `↓` is used to express termination.

The type `↓` takes in an explicit argument `_>_`, which is the binary relation about which the `↓` type will express a termination property.

The type `↓` also takes in an element of type `A`, which figures as the starting point from which the `↓` type will express termination regarding the relation `_>_`.

As a convenience, in a common case of Boolean-valued functions, we have the function `↓𝔹` which just wraps a Boolean-valued function as a relation, as we saw previously for `_>_` on the naturals.

For a simple but important example of termination, the type

```hs agda
∀ (n : N) → ↓B _>_ n
```

expresses the idea that for every natural number `n`, the GT relation is terminating. This is in fact true and proven in the file:

```hs agda
-- The proof that the (>) rel over the naturals is terminating
↓-> : ∀ (x : ℕ) → ↓𝔹 _>_ x
↓-> x = pf↓ (h x)
  where h : ∀ x → ∀ {y} → x > y ≡ tt → ↓𝔹 _>_ y
        h 0 {0} () 
        h 0 {suc y} () 
        h (suc x) {y} p with <-drop {y} p 
        h (suc x) {y} p | inj₁ u rewrite u = ↓-> x
        h (suc x) {y} p | inj₂ u = h x u
```
