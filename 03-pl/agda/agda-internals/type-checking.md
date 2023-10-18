# Type checking

T:\code\agda\vendor\agda\src\full\Agda\TypeChecking\


## Injectivity

T:\code\agda\vendor\agda\src\full\Agda\TypeChecking\Injectivity.hs

*Injectivity*, or more precisely, *constructor headedness*, is a property of functions defined by pattern matching that helps us solve constraints involving blocked applications of such functions. Here, "blocked" means that the pattern matching is blocked on a meta variable, and constructor headedness lets us learn more about that meta variable.

Consider this simple example:

```hs
isZero : Nat -> Bool
isZero zero    = true
isZero (suc n) = false
```

This function is *constructor-headed*, meaning that all RHSs are headed by a distinct constructor. Thus, on a constraint like `isZero ?X = false : Bool` involving an application of `isZero` that is blocked on meta variable `?X`, we can exploit injectivity and learn that `?X = suc ?Y` for a new metavar `?Y`.

<!-- #region Aside -->
<details><summary>Aside</summary>

The successor (`S`) on Nat is injective. It would've been bijective save for the single case of `S⁻¹(0) = ?` that is undefined. This case also makes a problem for the predecesor function (which is the logical inverse of the successor), in that `P(0) = ?`. However, this is often incorrectly forced to be `0`, i.e. `P(0) = 0`, which is not really natural - it should be undefined like the inverse of successor for the input 0, that is `S⁻¹(0) = undef`. Being forced to produce 0, makes the predecesor function surjective since there are then two distinct inputs that give the same output, `P(1) = P(0) = 0`.
- `S` is injective but not bijective (such functions don't have fixpoints)
- `S` has the inverse, `S⁻¹`, which is the same as `P` for `n > 0`
- `S⁻¹(n) = P(n)` for n > 0, `S⁻¹(0) ≠ P(0)` (undefined ≠ 0)
- `P(1) = P(0) = 0` makes `P` surjective
- it also gives `P` the "artificial" fixpoint 0, `P(0) = 0`

</details>

<!-- #endregion -->

### Which functions qualify for injectivity

1. All the clauses that satisfy (2) need to be headed by a distinct constructor.
2. A function needs to have at least one non-absurd clause that has a proper match, meaning that the function can actually be blocked on a meta. Proper matches are these patterns:
  - data constructor, `ConP`, but not record constructor
  - literal, `LitP`
  - HIT-patterns, `DefP`
  - Projection patterns `ProjP` are excluded because metas cannot occupy their place!
