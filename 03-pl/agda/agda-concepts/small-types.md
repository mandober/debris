# Small types

- type hierarchy
- sort, universe
- universe level, `𝓁 : Level`
- universe, `{𝓁 : Level} → {A : Set 𝓁}`
- small types, `Set₀`
- higher types, `Setᵢ`
- lower upper bound type, `Setω`
- universe polymorphism
- functions are (first-class) values
- functions are terms
- functions are types
- function types
- function space
- basic function space, `{A : Set} → A → A : Set`



The universe of small types is `Set₀`. 

The small types are best understood progressively: initially (in a blank agda file) there is nothing available implicitly, apart from the `Set₀` type. 

It can be thought of as the "container" type that will house all the (simple) terms you define. Some of these simple terms are datatypes like `⊥`, `⊤`, `𝔹`, `ℕ`, and similar, but also the functions between these simple types.

All these things, be it datatypes or functions, have the same type, namely the type `Set₀`, so `𝔹 : Set₀`, `⊥ ⊤ ℕ : Set₀`, `𝔹 → 𝔹 : Set₀`. Function types are the key to this topic!

To write generic functions that will work across many types, we employ type parameters, instead of writing concrete type names. 

The function `idℕ : ℕ → ℕ` works only on the naturals, `id𝔹 : 𝔹 → 𝔹` works only on the Booleans, although they have the same definition, `idA = λ x → x`; we suddenly realize we're not in C anymore, many decades have passed and generics are commonplace for a minute now.

In generic functions, we use type parameters (type variables) in place of concrete type names. 

```hs agda
-- concrete
idℕ : ℕ → ℕ
idℕ = λ n → n

-- generic [error]
id : A → A
id = λ n → n

-- generic
id : {A : Set} → A → A
id = λ n → n
```

However, this won't work unless we first declare the type parameter `A`. 

<!-- #region note -->

<details><summary>Note</summary>

For now, we'll just say it's a term of the type `Set₀`, just like everything else is at the moment. Later, however, we can interpret declarations such as `A : Set` as letting Agda know where in the type hierarchy we're cutting into (positioning the type in). When you write `ℕ`, the only place it can go is into `Set₀`, so you don't need to restate that again in function's signatures - you have stated that once in the declaration of the ℕ datatype, when you wrote `data ℕ : Set where …`. The point is, everything is declared as a sort of a pair, `A : T`, to let Agda know which universe we mean. `ℕ : Set` specifies we're declaring ℕ in the base universe, universe at the level zero. If we had said `ℕ : Set₁`, then the naturals (identified by ℕ) wouldn't be available in the zero-level universe.

</details>

<!-- #endregion -->

The second function in the example above doesn't work because we didn't say where the type (param) `A` is positioned in the type hierarchy. The third function first declares the `A`, as a term of the type `Set₀`, so it works fine.



To define generic functions, however, unlike the base types (𝔹, ℕ, …), we must declare it first.

, `and : 𝔹 → 𝔹`
, `_+_ : ℕ → ℕ → ℕ`
, `foldℕ : ℕ → (ℕ → ℕ) → ℕ → ℕ`

All these things (datatypes and functions) are also terms, that is, each one, be it a datatype or a function between them, has a type - the type `Set₀`.

, `𝔹 : Set₀`
, `⊥ ⊤ ℕ : Set₀`
, `𝔹 → 𝔹 : Set₀`
, `A → B → A : Set`
, `A → (A → A) → ℕ → A : Set`



More precisely, small types can be thought of as the usual types from many PLs that include Booleans, various types of numbers, characters, and all the functions (and so function types) between them. Actually, function types are the key and explain the need for the small types and universes in general. 

Namely, that base function space consists of all functions between small types (`Bool → Bool`, `Nat → (Nat → Nat) → Nat`, etc.), all of which are terms of `Set₀`. That is, any function over the small types has the type `Set₀`; they are all terms in `Set₀`.
