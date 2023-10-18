# Dependent type

A dependent type is actually a type family indexed by values of another type.

Unlike the regular dependence which only involves the type of an argument, this dependence, besides the type of an argument, also involves the actual value of the argument.

In TT, the simplest case of a dependent type is denoted:

`a : A ⊢ B(a)`

In the general case, however, each successive paramter can depend on the value of any of the previously declared parameters (called a telescope):

`a₀ : A₀, a₁ : A₁(a₀), a₂ : A₂(a₀,a₁), …, aₙ : Aₙ(a₀,a₁) ⊢ Aₙ﹢₁(a₀,a₁,…,aₙ)`

This is called a *telescope*:

```hs
a₀ : A₀
a₁ : A₁(a₀)
a₂ : A₂(a₀, a₁)
a₃ : A₃(a₀, a₁, a₂)
…
aₙ : Aₙ(a₀, a₁, a₂, a₃, …, aₙ˗₁)
⊢
B(a₀, a₁, …, aₙ)

-- sometimes a term b of B is also given (and even annoted by the same params)
⊢ b (a₀, a₁, …, aₙ) : B(a₀, a₁, …, aₙ)
```

A dependent type can be understand as a function from a domain type `A` to a codomain type `B`, `A → B`, which in the simplest case of dependency is annotated by `a : A ⊢ B a` (but can be generalized as needed with currying).

Here, the domain (or argument) type `A` is a "regular" type, like the domain type of an ordinary function. What is new, is that besides stating the input type, we now introduce a name for the input param (input/arg value): instead of being just `A`, it is now `a : A`.

<!-- #region Aside: Naming the input parameter -->

<details><summary>Aside: Naming the input parameter</summary>

So far, there is nothing too strange going on. The only weird thing may be the business of naming the input argument. However, this practice can be seen in a lot of PLs, and they don't even use that name. This usually occurrs when defining interfaces and traits. For example, a definition of a trait in Rust looks something like this:

```rust
trait PartialEq<Rhs = Self> where Rhs: ?Sized {
  fn eq(&self, other: &Rhs) -> bool;
}
```

Even though the sufficient information about the second argument is only its type, here a name `other` is also iontroduced for its corresponding value. When the user implements this trait they have to use this exact name (`other`) for that second parameter, even though the actual names of formal parameters should not matter due to α-equivalence.

Well… Rust may actually justify using the name for the arguments - so it can attach various sigils to them as well as to their types - but stfu, there must be another PL where this indeed happens.

</details>

<!-- #endregion -->

So, the domain `A` is a fixed type, but the codomain type is not. The codomain depends not just on the type of input (like in any non-constant function), but here it also dependeson the actual input value. So, the codomain varies with the input value, turning it into a moving target. The input type is `A`, but the actual input value is captured in the variable `a` (of type `A` naturally). The codomain type then depends not only on plain `A`, but on the input argument `a : A`, which makes the codomain `B` an indexed type (indexed by the type `A`).

```hs
     A  → B     -- non-depenedent type

(a : A) → B a   -- depenedent type
(a : A) → B     -- non-depenedent type in terms of depenedent-type

     A  → Set   -- depenedent type as indexed type
     A  → 𝓤     -- depenedent type as a type indexing the universe
```

This is an attempt to explan dependent types, apparently not a very good one. How does one explain a codomain like this in a more intuitive way? Or is there no better explanation then drawing the correlation to an indexed family of sets?


```hs
(a : A) → B(a)

Σ (a : A) B(a)
```
