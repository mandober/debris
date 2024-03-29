# Instance args

https://agda.readthedocs.io/en/v2.6.2.2/language/instance-arguments.html

**Instance arguments** are a special kind of implicit args that get solved by a special *instance resolution algorithm*, rather than by the *unification algorithm* used for normal implicit args.

>Instance args are the Agda equivalent of Haskell type class constraints and can be used for many of the same purposes.

An instance argument will be resolved if its type is a *named type* (a data type or record type) or a variable type (a previously bound variable of type `Set ℓ`), and a unique instance of the required type can be built from declared instances and the current context.

## Use

Instance args are enclosed in double curly braces, `{{x : T}}`, or in the unicode braces, `⦃ x : T ⦄` (typed as `\{{` and `\}}`).

For instance, given a function `_==_`

```hs agda
_==_ : {A : Set} {{eqA : Eq A}} → A → A → Bool
```

for some suitable type `Eq`, you might define

```hs agda
elem : {A : Set} {{eqA : Eq A}} → A → List A → Bool
elem x (y ∷ xs) = x == y || elem x xs
elem x []       = false
```

Here the instance arg to `_==_` is solved by the corresponding arg to `elem`.

>Just like ordinary implicit args, instance args can be given explicitly.

```hs agda
-- The above definition is equivalent to
elem : {A : Set} {{eqA : Eq A}} → A → List A → Bool
elem {{eqA}} x (y ∷ xs) = _==_ {{eqA}} x y || elem {{eqA}} x xs
elem         x []       = false
```

A very useful function that exploits this is the function `it`, 
which lets you apply instance resolution to solve an arbitrary goal:

```hs agda
it : ∀ {a} {A : Set a} → {{A}} → A
it {{x}} = x
```

As the last example shows, the name of the instance arg can be omitted in the type signature:

```hs agda
_==_ : {A : Set} → {{Eq A}} → A → A → Bool
```

## Defining type classes

The type of an instance arg should have the form {Γ} → C vs, where C is a postulated name, a bound variable, or the name of a data or record type, and {Γ} denotes an arbitrary number of implicit or instance args (see Dependent instances below for an example where {Γ} is non-empty).

Instances with explicit args are also accepted but will not be considered as instances because the value of the explicit args cannot be derived automatically. Having such an instance has no effect and thus raises a warning.

Instance args whose types end in any other type are currently also accepted but cannot be resolved by instance search, so they must be given by hand. For this reason it is not recommended to use such instance args. Doing so will also raise a warning.

Other than that there are no requirements on the type of an instance arg. In particular, there is no special declaration to say that a type is a "type class". Instead, Haskell-style type classes are usually defined as record types. For instance,

record Monoid {a} (A : Set a) : Set a where
  field
    mempty : A
    _<>_   : A → A → A
In order to make the fields of the record available as functions taking instance args you can use the special module application

open Monoid {{...}} public
This will bring into scope

mempty : ∀ {a} {A : Set a} → {{Monoid A}} → A
_<>_   : ∀ {a} {A : Set a} → {{Monoid A}} → A → A → A
Superclass dependencies can be implemented using Instance fields.

See Module application and Record modules for details about how the module application is desugared. If defined by hand, mempty would be

mempty : ∀ {a} {A : Set a} → {{Monoid A}} → A
mempty {{mon}} = Monoid.mempty mon
Although record types are a natural fit for Haskell-style type classes, you can use instance args with data types to good effect. See the Examples below.

Declaring instances
As seen above, instance args in the context are available when solving instance args, but you also need to be able to define top-level instances for concrete types. This is done using the instance keyword, which starts a block in which each definition is marked as an instance available for instance resolution. For example, an instance Monoid (List A) can be defined as

instance
  ListMonoid : ∀ {a} {A : Set a} → Monoid (List A)
  ListMonoid = record { mempty = []; _<>_ = _++_ }
Or equivalently, using copatterns:

instance
  ListMonoid : ∀ {a} {A : Set a} → Monoid (List A)
  mempty {{ListMonoid}} = []
  _<>_   {{ListMonoid}} xs ys = xs ++ ys
Top-level instances must target a named type (Monoid in this case), and cannot be declared for types in the context.

You can define local instances in let-expressions in the same way as a top-level instance. For example:

mconcat : ∀ {a} {A : Set a} → {{Monoid A}} → List A → A
mconcat [] = mempty
mconcat (x ∷ xs) = x <> mconcat xs

sum : List Nat → Nat
sum xs =
  let instance
        NatMonoid : Monoid Nat
        NatMonoid = record { mempty = 0; _<>_ = _+_ }
  in mconcat xs
Instances can have instance args themselves, which will be filled in recursively during instance resolution. For instance,

record Eq {a} (A : Set a) : Set a where
  field
    _==_ : A → A → Bool

open Eq {{...}} public

instance
  eqList : ∀ {a} {A : Set a} → {{Eq A}} → Eq (List A)
  _==_ {{eqList}} []       []       = true
  _==_ {{eqList}} (x ∷ xs) (y ∷ ys) = x == y && xs == ys
  _==_ {{eqList}} _        _        = false

  eqNat : Eq Nat
  _==_ {{eqNat}} = natEquals

ex : Bool
ex = (1 ∷ 2 ∷ 3 ∷ []) == (1 ∷ 2 ∷ []) -- false
Note the two calls to _==_ in the right-hand side of the second clause. The first uses the Eq A instance and the second uses a recursive call to eqList. In the example ex, instance resolution, needing a value of type Eq (List Nat), will try to use the eqList instance and find that it needs an instance arg of type Eq Nat, it will then solve that with eqNat and return the solution eqList {{eqNat}}.

Note

At the moment there is no termination check on instances, so it is possible to construct non-sensical instances like loop : ∀ {a} {A : Set a} → {{Eq A}} → Eq A. To prevent looping in cases like this, the search depth of instance search is limited, and once the maximum depth is reached, a type error will be thrown. You can set the maximum depth using the --instance-search-depth flag.

Restricting instance search
To restrict an instance to the current module, you can mark it as private. For instance,

record Default (A : Set) : Set where
  field default : A

open Default {{...}} public

module M where

  private
    instance
      defaultNat : Default Nat
      defaultNat .default = 6

  test₁ : Nat
  test₁ = default

  _ : test₁ ≡ 6
  _ = refl

open M

instance
  defaultNat : Default Nat
  defaultNat .default = 42

test₂ : Nat
test₂ = default

_ : test₂ ≡ 42
_ = refl
Constructor instances
Although instance args are most commonly used for record types, mimicking Haskell-style type classes, they can also be used with data types. In this case you often want the constructors to be instances, which is achieved by declaring them inside an instance block. Constructors can only be declared as instances if all their args are implicit or instance args. See Instance resolution below for the details.

A simple example of a constructor that can be made an instance is the reflexivity constructor of the equality type:

data _≡_ {a} {A : Set a} (x : A) : A → Set a where
  instance refl : x ≡ x
This allows trivial equality proofs to be inferred by instance resolution, which can make working with functions that have preconditions less of a burden. As an example, here is how one could use this to define a function that takes a natural number and gives back a Fin n (the type of naturals smaller than n):

data Fin : Nat → Set where
  zero : ∀ {n} → Fin (suc n)
  suc  : ∀ {n} → Fin n → Fin (suc n)

mkFin : ∀ {n} (m : Nat) → {{suc m - n ≡ 0}} → Fin n
mkFin {zero}  m {{}}
mkFin {suc n} zero    = zero
mkFin {suc n} (suc m) = suc (mkFin m)

five : Fin 6
five = mkFin 5 -- OK
In the first clause of mkFin we use an absurd pattern to discharge the impossible assumption suc m ≡ 0. See the next section for another example of constructor instances.

Record fields can also be declared instances, with the effect that the corresponding projection function is considered a top-level instance.

Overlapping instances
By default, Agda does not allow overlapping instances. Two instances are defined to overlap if they could both solve the instance goal when given appropriate solutions for their recursive (instance) args.

For example, in code below, the instances zero and suc overlap for the goal ex₁, because either one of them can be used to solve the goal when given appropriate args, hence instance search fails.

infix 4 _∈_
data _∈_ {A : Set} (x : A) : List A → Set where
  instance
    zero : ∀ {xs} → x ∈ x ∷ xs
    suc  : ∀ {y xs} → {{x ∈ xs}} → x ∈ y ∷ xs

ex₁ : 1 ∈ 1 ∷ 2 ∷ 3 ∷ 4 ∷ []
ex₁ = it  -- overlapping instances
Overlapping instances can be enabled via the --overlapping-instances flag. Be aware that enabling this flag might lead to an exponential slowdown in instance resolution and possibly (apparent) looping behaviour.

Examples
Dependent instances
Consider a variant on the Eq class where the equality function produces a proof in the case the args are equal:

record Eq {a} (A : Set a) : Set a where
  field
    _==_ : (x y : A) → Maybe (x ≡ y)

open Eq {{...}} public
A simple boolean-valued equality function is problematic for types with dependencies, like the Σ-type

data Σ {a b} (A : Set a) (B : A → Set b) : Set (a ⊔ b) where
  _,_ : (x : A) → B x → Σ A B
since given two pairs x , y and x₁ , y₁, the types of the second components y and y₁ can be completely different and not admit an equality test. Only when x and x₁ are really equal can we hope to compare y and y₁. Having the equality function return a proof means that we are guaranteed that when x and x₁ compare equal, they really are equal, and comparing y and y₁ makes sense.

An Eq instance for Σ can be defined as follows:

instance
  eqΣ : ∀ {a b} {A : Set a} {B : A → Set b} → {{Eq A}} → {{∀ {x} → Eq (B x)}} → Eq (Σ A B)
  _==_ {{eqΣ}} (x , y) (x₁ , y₁) with x == x₁
  _==_ {{eqΣ}} (x , y) (x₁ , y₁)    | nothing = nothing
  _==_ {{eqΣ}} (x , y) (.x , y₁)    | just refl with y == y₁
  _==_ {{eqΣ}} (x , y) (.x , y₁)    | just refl    | nothing   = nothing
  _==_ {{eqΣ}} (x , y) (.x , .y)    | just refl    | just refl = just refl
Note that the instance arg for B states that there should be an Eq instance for B x, for any x : A. The arg x must be implicit, indicating that it needs to be inferred by unification whenever the B instance is used. See Instance resolution below for more details.

## Instance resolution

Given a goal that should be solved using instance resolution we proceed in the following 4 stages:

1. Verify the goal
First we check that the goal type has the right shape to be solved by instance resolution. It should be of the form {Γ} → C vs, where the target type C is a variable from the context or the name of a data or record type, and {Γ} denotes a telescope of implicit or instance args. If this is not the case instance resolution fails with an error message[1].

2. Find candidates
In the second stage we compute a set of candidates. Let-bound variables and top-level definitions in scope are candidates if they are defined in an instance block. Lambda-bound variables, i.e. variables bound in lambdas, function types, left-hand sides, or module parameters, are candidates if they are bound as instance args using {{ }}. Only candidates of type {Δ} → C us, where C is the target type computed in the previous stage and {Δ} only contains implicit or instance args, are considered.

3. Check the candidates
We attempt to use each candidate in turn to build an instance of the goal type {Γ} → C vs. First we extend the current context by {Γ}. Then, given a candidate c : {Δ} → A we generate fresh metavariables αs : {Δ} for the args of c, with ordinary metavariables for implicit args, and instance metavariables, solved by a recursive call to instance resolution, for instance args.

Next we unify A[Δ := αs] with C vs and apply instance resolution to the instance metavariables in αs. Both unification and instance resolution have three possible outcomes: yes, no, or maybe. In case we get a no answer from any of them, the current candidate is discarded, otherwise we return the potential solution λ {Γ} → c αs.

4. Compute the result
From the previous stage we get a list of potential solutions. If the list is empty we fail with an error saying that no instance for C vs could be found (no). If there is a single solution we use it to solve the goal (yes), and if there are multiple solutions we check if they are all equal. If they are, we solve the goal with one of them (yes), but if they are not, we postpone instance resolution (maybe), hoping that some of the maybes will turn into nos once we know more about the involved metavariables.

If there are left-over instance problems at the end of type checking, the corresponding metavariables are printed in the Emacs status buffer together with their types and source location. The candidates that gave rise to potential solutions can be printed with the show constraints command (C-c C-=).

[1] Instance goal verification is buggy at the moment. See issue [#1322].
