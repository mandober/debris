# Universe Levels

*Sorts* or *universes* are types whose members are themselves types.

The fundamental universe in Agda is called `Set`, and it is the universe (type) of the *small types*. These are the usual types that include the (base) types like `Bool : Set` and `Nat : Set`, but also functions like `Bool → Bool → Bool : Set` and `Bool → Nat : Set`.

* It is `Bool → Nat : Set`, not ~~Bool → Nat : Set → Set~~

When you define a function, you have to specify the type; first you give a function type (signature), e.g. `f : 𝔹 → 𝔹 → 𝔹` and then you proceed to define the function, `f p q = …`. So the signature specifies the type of `f` by `f : 𝔹 → 𝔹 → 𝔹`, and then the type of `𝔹 → 𝔹 → 𝔹 : Set` is `Set₀`, and the type of `Set₀` is `Set₁`, and do on, ad infinitum. So, the requirement to annotate the type (of just one level) is not so bad - it could've been a lot worse (f : 𝔹 → 𝔹 → 𝔹 : Set₀ : Set₁ : Set₂ : … : Setω : Setω₁ : Setω₂ : … )


Set : Set (type-in-type)

However, any function type that mentions the `Set` type itself cannot have the `Set` type since that would imply the existence of a set of all sets, and we all know how that ends.

Actually, many PL (Haskell has `Type :: Type`, and anyway, Haskell has only two sorts, types and kinds; but even that is one sort larger than most other PLs) that do have type-in-type don't really run into problems, but that's perhaps they have a much weaker type system then Agda's.

* It's not ~~Bool -> Set : Set~~, but `Bool → Set₀ : Set₁`


Agda's type system includes an infinite *hierarchy of universes*:    
`Set₀`, `Set₁`, `Set₂`, …    
such that    
`Setᵢ : Setᵢ₊₁`


Universes are indexed (zero-based) by a level. `Level` is the type of universe subscripts, and even though levels appear to be pulled from the set of the natural numbers (i.e. 0, 1, 2, …), they are actually a primitive builtin type, introduced by a *postulate* (an axiom, a "given", an "as-is").

This hierarchy enables quantification over arbitrary types without running into the inconsistency that follows from `Set : Set`.

- {𝓁 : Level} {A : Set 𝓁}
- {𝓁 : Level} {𝓵 : Level} {A : Set 𝓁} {B : Set 𝓵}
- {𝓁₁ 𝓁₂ : Level} {A : Set 𝓁₁} {B : Set 𝓁₂}



The universes are further detailed on the page on Agda's [sort system](./sort-system.md).

When working with the hierarchy of universes it can quickly get tiresome to repeat the same definition at different universe levels.

For example, instead of defining a list at each universe level
- `data List (A : Set) : Set`
- `data List₁ (A : Set₁) : Set₁`

and so on. Moreover, every function on lists would also have to be defined at each universe level, and every theorem would also have to be re-proved, for every possible level.

Universe polymorphism

The solution to this problem is universe polymorphism. Agda provides a special primitive type `Level`, whose elements are possible levels of universes.

In fact, the notation for the n-th universe, `Setₙ`, is just an abbreviation for `Set n`, where `n : Level` is a level.

We can use this to write a polymorphic `List` operator that works at any level. The module *Agda.Primitive* must be imported to access the `Level` type, and then the definition looks like this

```hs
open import Agda.Primitive

data List {n : Level} (A : Set n) : Set n where
  []   : List A
  _::_ : A → List A → List A
```

The new `List` operator now works at all levels:

```hs
List Nat : Set
List Set : Set₁
List Set₁ : Set₂
```

## Level arithmetic

Even though we don't have the number of levels specified, we know that there is a lowest level, `lzero`, and for each level `n`, there exists a higher level, `lsuc n`, that succeeds `n`. Thus, the set of levels is infinite.

We can also take the *least upper bound*, `n ⊔ m`, of two levels, which returns the higher level.

In summary, the following (and only these) operations on levels are provided:

```hs
lzero : Level
lsuc  : (n : Level) → Level
_⊔_   : (n m : Level) → Level
```

This is sufficient for most purposes; for example, we can define the Cartesian product of two types of arbitrary (and not necessarily equal) levels:

```hs
data _×_ {𝓁₁ 𝓁₂ : Level} (A : Set 𝓁₁) (B : Set 𝓁₂) : Set (𝓁₁ ⊔ 𝓁₂) where
  _,_ : A → B → A × B
```

With this definition, we have, for example:

```hs
Nat × Nat : Set
Nat × Set : Set₁
Set × Set : Set₁
```

## Intrinsic level properties

Levels and their associated operations have some properties which are internally and automatically solved by the compiler. This means that we can replace some expressions with others without worrying whether the expressions, for their corresponding level, matching exactly.

For example, commutativity of levels is automatically solved so we can write:

```hs
f : {F : (l : Level) → Set l} {l1 l2 : Level} → F (l1 ⊔ l2) → F (l2 ⊔ l1)
f = λ x → x
```

Agda will perform the conversion from `F (l1 ⊔ l2)` into `F (l2 ⊔ l1)` automatically.

The properties of level and its operations are (the same as *max*):
+ Identity:         `a ⊔ lzero`  = `a`
- Subsumption:      `a ⊔ lsuc a` = `lsuc a`
+ Associativity:   `(a ⊔ b) ⊔ c` = `a ⊔ (b ⊔ c)`
- Commutativity:         `a ⊔ b` = `b ⊔ a`
- Idempotence:           `a ⊔ a` = `a`
+ Distributivity: `lsuc (a ⊔ b)` = `lsuc a ⊔ lsuc b` (of lsuc over ⊔)    

(Commutative idempotent monoid with distribution?)

Subsumption also holds for arbitrarily many `lsuc` usages:    
`a ⊔ lsuc (lsuc a)` is the same as `lsuc (lsuc a)`.

```hs
max a 0 = a
max a (suc a) = suc a
max a a = a

max a b = max b a
max (max a b) c = max a (max b c)
suc (max a b) = max (suc a) (suc b)
-----------------------------------
A 🗖     0 =     A
A 🗖 suc A = suc A
a 🗖     a =     a

a 🗖 b = b 🗖 a
suc (a 🗖 b) = suc a 🗖 suc b
(a 🗖 b) 🗖 c = a 🗖 (b 🗖 c)
-----------------------------------
🗖 = max
🗕 = min
-----------------------------------
A 🗕     0 = 0
A 🗕 suc A = A
a 🗕     a = a

a 🗕 b = b 🗕 a
(a 🗕 b) 🗕 c = a 🗕 (b 🗕 c)
suc (a 🗕 b) = suc a 🗕 suc b

-------------------------------------
f (a ∙ b) = f a ∙ f b
fmap (a ++ b) = fmap a ++ map b

a ⊕ b = (⊕) a b
a ∙ b  = (∙) a b

--------------------------------------
a ⊕ (b ∙ c) = (a ⊕ b) ∙ (a ⊕ c)
f = ⊕, g = ∙
-------------------
a ⊕ (b ∙ c) =
(⊕) a ((∙) b c) =
f a (g b c)
-------------------
(a ⊕ b) ∙ (a ⊕ c) =
(∙) ((⊕) a b) ((⊕) a c) =
g (f a b) (f a c)
-------------------
a ⊕ (b ∙ c) = (a ⊕ b) ∙ (a ⊕ c)
f a (g b c) = g (f a b) (f a c)
```

## forall notation

From the fact that we write `Set n`, it can always be inferred that `n` is a level. Therefore, when defining universe-polymorphic functions, it is common to use the `∀`, or `forall`, notation.

For example, the type of the universe-polymorphic `map` operator on lists can be written

```hs
map :   {n m : Level} {A : Set n} {B : Set m} → (A → B) → List A → List B
-- equivalent to
map : ∀ {n m}         {A : Set n} {B : Set m} → (A → B) → List A → List B
-- or just
map :   {n m}         {A : Set n} {B : Set m} → (A → B) → List A → List B
```

## Expressions of sort Setω

In a sense, universes were introduced to ensure that every Agda expression has a type, including expressions such as `Set`, `Set₁`, etc. However, the introduction of universe polymorphism inevitably breaks this property again, by creating some new terms that have no type.

For example, the polymorphic singleton set `Unit k : Setₖ` defined by

```hs
data Unit (k : Level) : Set k where
  <> : Unit k
```

`Unit k : Set k` is well-typed, and has the type

```hs
Unit : (k : Level) → Set k

-- but then, what is the type of "(k : Level) → Set k"?
-- Agda says it is Setω, from Agda.Primitive.Setω
(k : Level) → Set k : Setω
```

However, the type `(k : Level) → Set k`, which is a valid Agda expression, does not belong to any universe in the Set hierarchy.

Indeed, the expression denotes a function mapping levels to sorts, so if it had a type, it should be something like _Level → Sort_, where _Sort_ is the collection of all sorts.

But if Agda were to support a sort *Sort of all Sorts*, it would be a sort itself, so, in particular, we'd have `Sort : Sort`; just like `Type : Type`, this would leads to circularity and inconsistency.

Instead, Agda introduces a new sort `Setω` that stands above all sorts `Set ℓ`, but is not itself part of the hierarchy.

So, in the example, Agda assigns the expression `(k : Level) → Set k` to be of type `Setω`.

Alas, `Setω` is itself the first step in another infinite hierarchy   
`Setωᵢ : Setωᵢ₊₁`

However, this hierarchy does not support universe polymorphism, i.e. there are no sorts `Setω ℓ` for `ℓ : Level`. Allowing this would require a new universe `Set2ω`, which would then naturally lead to `Set2ω₁`, and so on.

Disallowing universe polymorphism for `Setωᵢ` avoids the need for such even larger sorts. This is an intentional design decision.

## Pragmas and options

* The option `--type-in-type` disables the checking of universe level consistency for the whole file.

* The option `--omega-in-omega` enables the typing rule `Setω : Setω`
  (thus making Agda inconsistent) but otherwise leaves universe checks intact.

* The pragma `{-# NO_UNIVERSE_CHECK #-}` can be put in front of a data or record type to disable universe consistency checking locally.

```hs
{-# NO_UNIVERSE_CHECK #-}

data U : Set where
  el : Set → U
```

This pragma applies only to the check that the universe level of the type of each constructor argument is less than or equal to the universe level of the datatype, not to any other checks.

* (since 2.6.0) The options `--type-in-type` and `--omega-in-omega`, and the pragma `{-# NO_UNIVERSE_CHECK #-}` cannot be used with `-safe`.
