# 6. Nameless Representation of Terms

For building an implementation we need to choose a single representation for each term; in particular, we must decide how occurrences of variables are to be represented. We use de Bruijn representation.

## 6.1 Terms and Contexts

De Bruijn's idea was that we can represent terms more straightforwardly by making variable occurrences point directly to their binders, rather than referring to them by name.

This can be accomplished by replacing named variables by natural numbers, where the number `k` stands for "the variable bound by the `k`'th enclosing λ".

For example, the ordinary term `λx.x` corresponds to the nameless term `λ.0`, while `λx.λy. x (y x)` corresponds to `λ.λ. 1 (0 1)`. 

Nameless terms are also sometimes called **de Bruijn terms**, and the numeric variables in them are called **de Bruijn indices**. Compiler writers use the term *static distances* for the same concept.

Examples:

- λx. λy. x (y x)
≡ λ.  λ.  1 (0 1)

- (λx. (λx. x)) (λx. x)
≡ (λ   (λ   0)) (λ   0)

- ID := λx. x
      ≡ λ.  0

- c0 := λs. λz. z
      ≡ λ.  λ.  0

- c2 := λs. λz. s (s z)
      ≡ λ.  λ.  1 (1 0)

- PLUS := λm. λn. λs. λz. m s (n z s)
        ≡ λ.  λ.  λ.  λ.  3 1 (2 0 1)

- FIX  := λf. (λx. f (λy. x x y)) (λx. f (λy. x x y))
        ≡ λ   (λ   1 (λ   1 1 0)) (λ   1 (λ   1 1 0))


Formally, we define the syntax of nameless terms almost exactly like the syntax of ordinary terms. The only difference is that we need to keep careful track of how many free variables each term contains. That is, we distinguish the sets of terms with no free variables, called the *0-terms*, terms with at most one free variable, *1-terms*, and so on.


(Definition) **Terms**: Let `T` be the smallest family of sets {T₀,T₁,T₂,…} s.t.
1. `k ∈ Tₙ` whenever 0 ≤ k < n
2. if `t ∈ Tₙ` and n > 0, then `λ.t ∈ Tₙ˗₁`
3. if `t1 ∈ Tₙ` and `t2 ∈ Tₙ`, then `(t1 t2) ∈ Tₙ`


Note that this is a standard inductive definition, except that what we are defining is a family of sets indexed by numbers, rather than a single set.

The elements of each `Tₙ` are called *n-terms*.

The elements of `Tₙ` are terms with at most `n` free variables, numbered between `0` and `n − 1`: a given element of `Tₙ` need not have free variables with all these numbers, or indeed any free variables at all. When `t` is closed, for example, it will be an element of `Tₙ` for every `n`.

Note that each (closed) ordinary term has just one *de Bruijn representation*, and that two ordinary terms are equivalent (modulo renaming of bound variables) iff they have the same de Bruijn representation.

To deal with terms containing free variables, we need the idea of a naming context. For example, suppose we want to represent `λx. y x` as a nameless term. We know what to do with `x`, but we cannot see the binder for `y`, so it is not clear how "far away" it might be and we do not know what number to assign to it.

The solution is to choose, once and for all, an assignment, called a **naming context**, of de Bruijn indices to free variables, and use this assignment consistently when we need to choose numbers for free variables.

For example, suppose that we choose to work under the naming context `Γ`:

```
Γ = x ⟼ 4
    y ⟼ 3
    z ⟼ 2
    a ⟼ 1
    b ⟼ 0
```

Then
- `x (y z)` is represented as `4 (3 2)`
- `λw. y w` as `λ. 4 0`    (+1 binder for y due to `λw`)
- `λw. λa. x` as `λ. λ. 6` (+2 binders for x due to `λw. λa`)

Since the order in which the variables appear in `Γ` determines their numerical indices, we can write it compactly as a sequence

(Definition): Suppose `x₀` through `xₙ` are variable names from `V`. The naming context `Γ = xₙ, xₙ˗₁, …, x₁, x₀` assigns to each `xᵢ` the de Bruijn index `i`. Note that the rightmost variable in the sequence is given the index 0; this matches the way we count λ binders - from right to left - when converting a named term to a nameless form. We write `dom(Γ)` for the set `{xₙ, ⋯, x₀}` of variable names mentioned in `Γ`.

Strictly speaking, it does not make sense to speak of some `t ∈ T` as we always need to specify how many free variables `t` might have. In practice, though, we will usually have some fixed naming context Γ in mind; we will then abuse the notation slightly and write `t ∈ T` to mean `t ∈ Tn`, where n is the len of Γ.


#### Remove and restore names exercise

The function `removeNames Γ t` takes a naming context `Γ` and an ordinary term `t`, with `FV t ⊆ dom Γ`, and yields the corresponding nameless term.

The function `restoreNames Γ t` takes a nameless term `t` and a naming context `Γ` and produces an ordinary term. To do this, we need to make up names for the vars bound by abstractions in `t`. We assume that the names in `Γ` are pairwise distinct and that the set `V` of variable names is ordered, so that we can just pick the first var name that is not already in `dom Γ`.

This pair of functions has the property that

`removeNames Γ (restoreNames Γ t) = t`

for any nameless term `t`, and similarly

`restoreNames Γ (removeNames Γ t) = t`

up to renaming of bound variables, for any ordinary term `t`.

```hs
removeNames  Γ x       = the index of the rightmost x in Γ
removeNames  Γ (λx.t1) = λ. removeNames {Γ x} t1
removeNames  Γ (t1 t2) = (removeNames {Γ x} t1) (removeNames {Γ x} t2)

restoreNames Γ k       = the k-th name in Γ
restoreNames Γ (t1 t2) = (restoreNames {Γ x} t1) (restoreNames {Γ x} t2)
restoreNames Γ (λ.t1)  = λx. restoreNames {Γ x} t1
  where
  x is the first name ∉ dom Γ
```

The required properties of removeNames and restoreNames are proved by straightforward structural induction on terms.


## 6.2 Shifting and substitution

Our next job is defining a *substitution* operation `[k⟼s]t` on nameless terms.

To to this, we need an operation `shifting` which renumbers the indices of the free variables in a term.

When a substitution goes under a λ-abstraction, e.g `[1 ⟼ s](λ.2)`, i.e. 
`[x ⟼ s](λy.x)` (assuming that 1 is the index of `x` in the outer context), 
the context in which the substitution is taking place becomes one variable longer than the original.

We need to *increment the indices of the free variables* in `s` so that they keep referring to the same names in the new context as they did before. But we need to do this carefully: we can't just shift every variable index in `s` because this could also shift bound variables within `s`.

For example, if `s = 2 (λ.0)`, i.e. `s = z (λw.w)` (assuming 2 is the index of z in the outer context), we need to shift the 2 but not the 0.

```
Γ = { x ⟼ 1, z ⟼ 2 }

f := λx.λy.x
   ≡ λ. λ. 0

s := z λw.w
   ≡ 2 λ. 0

(f)(s) =
= (λx.λy.x)(z λw.w)   [ x ⟼ (z λw.w) ](λy.x)      λy. (z λw.w)
= (λ. λ. 1)(2 λ. 0)   [ 1 ⟼ (2 λ. 0) ](λ. 1)      λ.  (2 λ. 0)   ✘
                                                   λ.  (3 λ. 0)   ✔
```

The shifting function below takes a *cutoff parameter* `c` that controls which variables should be shifted.

The `c` param starts off at `0` (meaning all variables should be shifted) and gets incremented by one every time the shifting function goes through a binder.

ᵈ↑ᶜ
ᵈ↑⁰
ᵈ↑ᶜᐩ¹

So, when calculating `ᵈ↑ᶜ (t)`, we know that the term `t` comes from inside `c`-many binders in the original argument to `ᵈ↑`.

>All identifiers `k < c` in `t` are *bound* in the original arg and *shouldn't be shifted*, while identifiers `k ≥ c` in `t` are *free* and should be shifted.


(Definition) **Shifting**: The `d`-place shift of a term `t` above the cutoff `c`, written `ᵈ↑ᶜ (t)`, is defined as follows:
- ᵈ↑ᶜ (k)     = if `k < c` then `k` else `k + d`
- ᵈ↑ᶜ (λ. t1) = `λ. ᵈ↑ᶜᐩ¹ (t1)`
- ᵈ↑ᶜ (t1 t2) = `ᵈ↑ᶜ (t1)  ᵈ↑ᶜ (t2)`

We write `ᵈ↑ (t)` for `ᵈ↑⁰ (t)`.


- What is `²↑ (λ. λ. 1 (0 2))`?

            b  b f
≡  (λx. λy. x (y _))
²↑ (λ.  λ.  1 (0 2))
=  (λ.  λ.  1 (0 4))

- What is `²↑ (λ. 0 1 (λ. 0 1 2))`?

        b f      b b f
≡  (λx. x _ (λy. y x _))
²↑ (λ.  0 3 (λ.  0 1 4))
=  (λ.  0 3 (λ.  0 1 4))

So we just (+2) the free vars.


If `t` is an `n`-term, then `ᵈ↑ᶜ (t)` is an `n+d`-term.


Now we are ready to define the substitution operator `[j ⟼s ]t`.

When we use substitution, we will usually be interested in substituting for the last variable in the context, i.e. `j = 0`, since that is the case we need in order to define the operation of beta-reduction (in call by value).

However, to substitute for variable `0` in a term that happens to be a λ-abstraction, we need to be able to substitute for the variable number `1` in its body. Thus, the definition of substitution must work on an arbitrary variable.

(Definition) **Substitution**: The substitution of a term `s` for var number `j` in a term `t`, written `[j ⟼ s]t`, is defined as follows:
- [j ⟼ s] (k)      =  if (k = j) then `s` else `k`
- [j ⟼ s] (λ. t)   =  λ. [j+1 ¹↑ (s)] (t)
- [j ⟼ s] (t1 t2)  =  [j ⟼ s]t1  [j ⟼ s]t2


#### Exercise

Convert the following uses of substitution to nameless form, assuming the global context is `Γ = {a, b}`, and calculate their results using the above definition.

```hs
-- (1)
[b ⟼ a] (b (λx. λy. b))  -->>  (a (λx. λy. a))
[0 ⟼ 1] (0 (λ.  λ.  2))  -->>   1 (λ.  λ.  3)

-- | named:

--    (λb. (b (λx. λy. b))) a
= [b ⟼ a] (b (λx. λy. b))
=          (a (λx. λy. a))

-- | nameless:

--  (λb. (b (λx. λy. b))) a --> [b ⟼ a] (b (λx. λy. b)) --> (a (λx. λy. a))
≡   (λ.  (0 (λ.  λ.  2))) a --> [0 ⟼ 1] (0 (λ.  λ.  2)) -->  1 (λ.  λ.  3)


--     (λb. (b (λx. λy. b))) a
       (λ.  (0 (λ.  λ.  2))) a
-- [b ⟼ a] (b (λx. λy. b))
=  [0 ⟼ 1] (0 (λ.  λ.  2))
--          (a (λx. λy. a))
=            1 (λ.  λ.  3)                ✔


[0 ⟼ a] (0 (λ. λ. 2))
=        (a (λ. λ. a))

[0 ⟼ 1] (0 (λ. λ. 2))
=        (1 (λ. λ. 3))


-- ==========================================================================
-- (2)
-- ==========================================================================
   [b ⟼ (a (λz.a))] (b (λx.b))
-- [0 ⟼ (1 (λ. 1))] (0 (λ. 0))  ✘
   [0 ⟼ (1 (λ. 2))] (0 (λ. 1))  ✔

-- (λb. (b (λx.b))) (a (λz.a))
[b ⟼ (a (λz.a))] (b (λx.b))
= (a (λz.a)) (λx.(a (λz.a)))

-- (λ. (0 (λx. 1))) (a (λ. a))
[0 ⟼ (1 (λ. 2))] (0 (λ. 1))
= (1 (λ. 2)) (λ. (2 (λ. 3)))


-- (λb. (b (λx.b)))    (a (λz.a))    =s=  [b ⟼ (a (λz.a))] (b (λx.b))
-- =   ((a (λz.a)) (λx.(a (λz.a))))
  =    (a (λz.a)) (λx. a (λz.a))

-- (λb. (b (λx.b))) (a (λz.a))  =s=  [b ⟼ (a (λz.a))] (b (λx.b))
   (λ.  (0 (λ. 1))) (0 (λ. 1)


-- ==========================================================================
-- (3)
-- ==========================================================================
(λb. λb. b a) a   =s= [b ⟼ a] (λb. b a)
=    λb. b a

(λ.  λ.  0 1) 1   =s= [0 ⟼ 1] (λ. 0 1)  ✘
=    λ.  0 1

(λ.  λ.  0 1) 1   =s= [0 ⟼ 1] (λ. 0 2)  ✔
=    λ.  0 2


-- ==========================================================================
-- (4)
-- ==========================================================================
(λb. λa. b a) a   =s= [b ⟼ a] (λa. b a)
(λb. λz. b z) a   =s= [b ⟼ a] (λz. b z)    (α-rename)
=    λz. a z

(λ.  λ.  1 0) a   =s= [0 ⟼ 1] (λ.  1 0)
=    λ.  2 0
```


## 6.3 Evaluation

To define the evaluation relation on nameless terms, the only thing we need to change (because it is the only place where variable names are mentioned) is the beta-reduction rule, which must now use our new nameless substitution operation.

The only slightly subtle point is that reducing a redex "uses up" the bound var: when we reduce `((λx.t) v)` to `[x ⟼ v]t`, the bound variable `x` disappears in the process.

Thus, we will need to renumber the variables of the result of substitution to take into account the fact that `x` is no longer part of the context.

For example:

```hs
-- (λx. a x b) (λy.y) --> a (λy.y) b
   (λ.  1 0 2) (λ. 0) --> 0 (λ. 0) 1     (-1 free vars after subs)
--                   not: 1 (λ. 0) 2

   (λ.  1  0     2) (λ. 0)   =s=   [0 ⟼ λ. 0](1 0 2)
   =    0 (λ. 0) 1
-- ≠    1 (λ. 0) 2
```


Similarly, we need to shift the variables in `v` up by 1 before substituting into `t`, since `t` is defined in a larger context than `v`. Taking these points into account, the beta-reduction rule looks like this:

```hs

(λ.t) v  -->  ⁻¹↑ ([0 ⟼ ¹↑ (v)] t)         (E-AppAbs)

```

The other rules are identical to what we had before.
