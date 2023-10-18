# Equality and equational reasoning

https://plfa.github.io/Equality/

Given two terms `x` and `y` of type `A`, we write `x ≡ y` to assert that `x` and `y` are equal (interchangeable), `x ≡ y`.

```hs agda
data _≡_ {A : Set} (x : A) : A → Set where
  refl : x ≡ x
```

for any type `A` and for any `x` of type `A`, the constructor `refl` provides evidence that `x ≡ x`. The ctor `refl` is the only value (term) of the equality type. Whenever we have that two expressions are equal, `α ≡ α`, we have `refl`. Hence, every value is equal to itself, and we have no other way of showing values equal.

This definition features an asymmetry in the arrangement of type variables: the first arg is a parameter `x : A` (left of the colon), while the second is an index in `A → Set` (right of the colon). The first argument to `_≡_` can be a parameter because it doesn't vary, but the second must be an index, so it can be required to be equal to the first.

However, we can also define equality using indices only:

```hs agda
data _≡_ {A : Set} : A → A → Set where
  refl : (x : A) → x ≡ x
```

In this case, `refl` is a function taking an argument `x : A` and producing a term in `x ≡ x` (which must be `refl`).


## Equality is an equivalence relation

Equality is an equivalence relation: reflexive, symmetric, transitive. 
Reflexivity comes with the definition of equality, via the `refl` ctor. 

* Transitivity

```hs agda
trans : ∀ {A : Set} {x y z : A} → x ≡ y → y ≡ z → x ≡ z
trans refl refl = refl
```

* Symmetry

```hs agda
sym : ∀ {A : Set} {x y : A} → x ≡ y → y ≡ x
sym refl = refl
```

The arg to `sym` has the type `x ≡ y`, but we're matching it against the pattern `refl`, which requires that `x` and `y` are the same; hence, for the rhs we need a term of the type `x ≡ x`, and `refl` will do.

In a slow-motion replay, we can match against an irrefutable pattern like `e` and dig a hole on the rhs. The type of `e` (1) is `x ≡ y`. However, as soon as we case split on it, `e` will be instantiated to the data ctor `refl`. This is the key step - Agda has inferred that `x` and `y` must be the same to match the pattern `refl`. The consequance of this is that the pattern `e` (e : x ≡ y) that was on the lhs with the type `x ≡ y` has been refined into `refl` and it now has the type `x ≡ x` (2). Finally, in (3), C-c C-r will instantiate the hole with the only ctor that yields a value of the expected type, i.e. `refl` (refl : x ≡ x)

```hs agda
sym : ∀ {A : Set} {x y : A} → x ≡ y → y ≡ x
sym e    = ?    -- (1)
sym refl = ?    -- (2)
sym refl = refl -- (3)
```

## Congruence and substitution

**Congruence** is here a name for the fact that a function applied to two equal terms produces the same result. That is

`∀ {u v} {A : Set u} {A : Set v} {f : A → B} {x : A} {y : B} . x ≡ y -> f x ≡ f y`




Equality satisfies congruence.

If two terms are equal, they remain so after the same function is applied to both:
