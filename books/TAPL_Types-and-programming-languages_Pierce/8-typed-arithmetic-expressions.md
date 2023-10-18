# Typed Arithmetic Expressions

The system studied in this chapter is the typed calculus of booleans and numbers. The corresponding OCaml implementation is `tyarith`.

## 8.1 Types

Evaluating a term can either result in a value or get stuck at some stage, by reaching a term like `pred false`, for which no evaluation rule applies.

Stuck terms correspond to meaningless or erroneous programs. We's like to be able to tell, without actually evaluating a term, that its evaluation will definitely not get stuck. To do this, we need to be able to distinguish between terms whose result will be a numeric value and terms whose result will be a boolean. We introduce two types, `Nat` and `Bool`, for classifying terms in this way. The metavariables `S`, `T`, `U`, etc. range over types.

Saying that "a term `t` has type `T`" means that `t` "obviously" evaluates to a value of the appropriate form - where by "obviously" we mean that we can see this statically, without doing any evaluation of `t`.

However, our analysis of the types of terms will be *conservative*, making use only of static information. This means that we will not be able to conclude that terms like `if (iszero 0) then 0 else false` or even `if true then 0 else false` have any type at all, even though their evaluation does not, in fact, get stuck.

## 8.2 The Typing Relation

The typing relation for arithmetic expressions, written `t : T`, is defined by a set of inference rules assigning types to terms.

```hs
-- Types:

T := Bool | Nat


-- Typing relations:

------------- (T-True)
true : Bool

------------- (T-False)
false : Bool

t1 : Bool    t2 : T    t3 : T
------------------------------- (T-If)
  if t1 then t2 else t3 : T


0 : Nat
---------------- (T-Zero)

t : Nat
---------------- (T-Succ)
succ t : Nat

t : Nat
---------------- (T-Pred)
pred t : Nat

t : Nat
---------------- (T-IsZero)
iszero t : Bool
```

(Definition): Formally, the typing relation for arithmetic expressions is the smallest binary relation between terms and types satisfying all instances of the rules. A term `t` is typable (or well-typed) if there is some `T` such that `t : T`.

(Lemma) **Inversion of the typing relation**
1. If `true : R`,  then `R = Bool`
2. If `false : R`, then `R = Bool`
3. If `if t1 then t2 else t3 : R`, then `t1 : Bool`, `t2 : R` and `t3 : R`
4. If `0 : R`,         then `R = Nat`
5. If `succ t1 : R`  , then `R = Nat`  and `t1 : Nat`
6. If `pred t1 : R`  , then `R = Nat`  and `t1 : Nat`
7. If `iszero t1 : R`, then `R = Bool` and `t1 : Nat`

The inversion lemma is sometimes called the *generation lemma* for the typing relation, since, given a valid typing statement, it shows how a proof of this statement could have been generated. The inversion lemma leads directly to a recursive algorithm for calculating the types of terms, since it tells us, for a term of each syntactic form, how to calculate its type (if it has one) from the types of its subterms.

*Statements* are formal assertions about the typing of programs, *typing rules* are implications between statements, and *derivations* are deductions based on typing rules.

(Theorem) **Uniqueness of Types**: Each term `t` has at most one type. That is, if `t` is typable, then its type is unique. Moreover, there is just one derivation of this typing built from the inference rules.

## 8.3 Safety = Progress + Preservation
