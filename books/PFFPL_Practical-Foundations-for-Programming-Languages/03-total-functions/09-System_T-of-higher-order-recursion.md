# 9. System T of Higher-Order Recursion

9. System T of Higher-Order Recursion
  9.1 Statics
  9.2 Dynamics
  9.3 Definability
  9.4 Undefinability

## 9. System T of Higher-Order Recursion

`System T` or `Goedel's T`, is the combination of function types with the type of natural numbers.

In contrast to E, which equips the naturals with some arbitrarily chosen arithmetic operations, the language T provides a general mechanism, primitive recursion, from which these primitives may be defined.

*Primitive recursion* captures the essential inductive character of the natural numbers, and hence may be seen as an intrinsic *termination proof* for each program in the language.

Consequently, we may define *only total functions* in the language, those that always return a value for each argument.

In essence, every program in T "comes equipped" with a proof of its termination. Although this may seem like a shield against infinite loops, it is also a weapon that can be used to show that some programs cannot be written in T. To do so would demand a master termination proof for every possible program in the language, something that we shall prove does not exist.

## 9.1 Statics

The syntax of T is given by the following grammar:

```hs
Typ τ := nat                    nat                               naturals
       | arr(τ₁; τ₂)            τ₁ → τ₂                           function

Exp e := x                      x                                 variable
       | z                      z                                 zero
       | s(e)                   s(e)                              successor
       | lam{τ}(x.e)            λ(x:τ)e                           abstraction
       | ap(e₁; e₂)             e₁(e₂)                            application
       | rec{e₀; x.y.e₁}(e)     rec e{z → e₀ | s(x) with y → e₁}  recursion
```

We write `n̅` for the expression `s(…s(z))`, in which the successor is applied n ≥ 0 times to zero.

The expression `rec{e₀; x.y.e₁}(e)` is called the *recursor*. It represents the e-fold iteration of the transformation `x.y.e₁` starting from `e₀`. The bound variable `x` represents the predecessor and the bound variable `y` represents the result of the x-fold iteration. The `with` clause in the concrete syntax for the recursor binds the variable `y` to the result of the recursive call.

Sometimes the *iterator*, `iter{e₀; y.e₁}(e)`, is considered as an alternative to the recursor. It has essentially the same meaning as the recursor, except that only the result of the recursive call is bound to `y` in `e₁`, and no binding is made for the predecessor.

Clearly, the iterator is a special case of the recursor, because we can always ignore the predecessor binding. Conversely, the recursor is definable from the iterator, provided that we have *product types* at our disposal. To define the recursor from the iterator, we simultaneously compute the predecessor while iterating the specified computation.

The statics of T is given by the following typing rules:

```hs

------------------- (9.1a)
Γ, x : τ |- x : τ


---------------- (9.1b)
Γ |- z : nat


Γ |- e : nat
---------------- (9.1c)
Γ |- s(e) : nat


Γ |- e:nat    Γ |- e₀:τ    Γ, x:nat, y:τ |- e₁:τ
-------------------------------------------------- (9.1d)
Γ |- rec{e₀; x.y.e₁}(e) : τ


Γ,x:τ₁ |- e:τ₂
--------------------------------- (9.1e)
Γ |- lam{τ₁}(x.e) : arr(τ₁; τ₂)


Γ |- e₁ : arr(τ₂; τ)    Γ |- e₂:τ₂
------------------------------------ (9.1f)
Γ |- ap(e₁; e₂) : τ
```


As usual, admissibility of the structural rule of substitution is crucially important.

>(Lemma 9.1) If `Γ |- e:τ` and `Γ,x:τ |- e′:τ′` then `Γ |- [e/x]e′ : τ′`


## 9.2 Dynamics

## 9.3 Definability
