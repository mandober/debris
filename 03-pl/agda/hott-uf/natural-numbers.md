# HoTT/UF :: Natural numbers

https://www.cs.bham.ac.uk/~mhe/HoTT-UF-in-Agda-Lecture-Notes/HoTT-UF-Agda.html#naturalnumbers

## The type ℕ of natural numbers

The definition is similar but not quite the same as the one via Peano Axioms.

We stipulate an element `zero : ℕ` and a successor function `succ : ℕ → ℕ`, and then define induction. Once we have defined the identity type-former `_＝_`, we will prove the other Peano Axioms.

```agda hs
data ℕ : 𝓤₀ ̇  where
 zero : ℕ
 succ : ℕ → ℕ
```

In general, declarations with `data` are inductive definitions.

In the following, the type family `A` can be seen as playing the role of a *property of elements of ℕ*, except that it doesn't need to be necessarily *subsingleton valued*.

ASIDE: **Singleton (contractible) types**: Voevodsky defined a notion of *contractible type*, which we refer to here as singleton type. We say that a type is a singleton if there is a designated `c : X` that is identified with each `x : X`. Such an element `c` is sometimes referred to as a *center of contraction of `X`*, in connection with homotopy theory. The canonical singleton type is `𝟙`. Once we have defined the notion of type equivalence, we will have that a type is a singleton iff it is equivalent to `𝟙`. **Subsingletons** (propositions or truth values): a type is a subsingleton if it has at most one element, that is, any two of its elements are equal, or identified. Under univalent excluded middle, the empty type `𝟘` and the singleton type `𝟙` are the only subsingletons, up to equivalence, or up to identity if we further assume univalence. Subsingletons are also called propositions or truth values.

When the type family `A` is *subsingleton valued*, the type of the function gives the familiar principle of mathematical induction for natural numbers, whereas, in general, its definition says how to compute with induction.

```agda hs
ℕ-induction : (A : ℕ → 𝓤 ̇)
            → A 0
            → ((n : ℕ) → A n → A (succ n))
            ------------------------------
            → (n : ℕ) → A n

ℕ-induction A a₀ f = h
 where
  h : (n : ℕ) → A n
  h 0        = a₀
  h (succ n) = f n (h n)
```

The definition of ℕ-induction is itself by induction. It says that given a point `a₀ : A 0` and a function `f : (n : ℕ) → A n → A (succ n)`, in order to calculate an element of `A n` for a given `n : ℕ`, we just calculate `h n`, that is, `f n (f (n-1) (f (n-2) (... (f 0 a₀)...)))`.

The principle of induction is a construction that, given a base case `a₀ : A 0`, an induction step `f : (n : ℕ) → A n → A (succ n)`, and a number `n`, specifies how to get an element of the type `A n` by primitive recursion.

Notice also that *ℕ-induction is the dependently typed version of primitive recursion*, where the non-dependently typed version is

```agda hs
ℕ-recursion : (X : 𝓤 ̇)
            → X
            → (ℕ → X → X)
            → ℕ → X
ℕ-recursion X = ℕ-induction (λ _ → X)
```

The following special case occurs often; it is related to the fact that ℕ is the initial algebra of the functor `𝟙 + (-)`

```agda hs
ℕ-iteration : (X : 𝓤 ̇ )
            → X
            → (X → X)
            → ℕ → X

ℕ-iteration X x f = ℕ-recursion X x (λ _ x → f x)
```

Agda checks that any recursive definition is well-founded: the recursive invocations must happen on structurally smaller argument (compared to the previous invocation, i.e. compared to the current argument's value), otherwise the definition is not accepted. If the recursive function is `f` and its arg is `n` then the invocations must be: `f n`, `f (n - 1)`, `f (n - 2)`, ….

In the Martin-Löf type theories, we have to use the ℕ-induction functional to define any other function on the natural numbers. However, Agda allows us to define functions by structural recursion, like ℕ-induction itself is defined.

ℕ-induction is also called ℕ-elimination since it eliminates a natural number, it is the function out of naturals into another type. As opposed to *ℕ-intro* which says how to introduce naturals, *ℕ-elim* specifies how we can use naturals. *ℕ-formation* rule is given by the type in the signature of the definition of naturals, i.e. in the declaration head, `data ℕ : 𝓤 where`, the part `ℕ : 𝓤` states the type of the naturals. The two *ℕ-intro* rules are then given by the two data ctors of the naturals, i.e. `zero : ℕ` and `succ : ℕ → ℕ`.
