# Lean : Tactics : rw

## Summary

The `rw` tactic works in several ways, but it always needs these 5 things:
- source
- template
- subject
- target
- side (direction)

A __target__ is an expression that will be rewriten by locating all the occurrences of the template exp and replacing them with the subject exp. The target exp is usually the current goal, although it may also be the current hyposthesis.

A __source__ expression provides a template and subject expressions. Expressions, from which the template and subject are extracted, is usually the current hypothesis, or a (previously proven) theorem. In any case, the source exp must have the form `LHS = RHS`.

A __template__ is an expression whose occurrences appear in the target expression.The rewrite process will locate all the occurrences of the template in the target and replace them with the subject.

A __subject__ is an expression used as the exp that replaces all template exps in the target. The rewrite process will locate all the occurrences of the template in the target and replace them with the subject.

The __side__ (or direction of rewrite) concerns the source, indicating which side of the source (LHS or RHS) is used as the template (the other side is then automatically selected as the subject).
* To use the LHS of the source as the template (and the RHS as the subject), the rewrite takes the form `rw → source` or just `rw source`.
* To use the RHS of the source as the template (and the LHS as the subject), the rewrite takes the form `rw ← source`.

Once all the info is known, the **rewriting process** will locate all the occurrences of the *template* in the *target*, and it will replace them with the *subject*.

For example,

if the source is `src : x = y`
then
  [LTR] `rw → src`
means
  template = x
  subject  = y
but
  [RTL] `rw ← src`
means
  template = y
  subject  = x


>As an operator, `rw` expects its argument to be a source expression.

```lean
-- e.g.
rw h        -- where h is the current hypothesis
rw add_zero -- where add_zero is a previously proven theorem
-- etc.
```


## Details

The rw tactic is a way to do "substituting in".

There are two distinct situations to use this tactic:

* If `h : A = B` is a hypothesis (i.e. a proof of `A = B`) in your local context (the box in the top right) and if your goal contains one or more `A`s, then `rw h` will change them all to `B`'s.

* The rw tactic will also work with proofs of theorems which are equalities (look for them in the drop down menu on the left, within _Theorem Statements_).

For example, in World1 Level4, we learn about `add_zero x : x + 0 = x`, and `rw add_zero` will change `x + 0` into `x` in your goal (or fail with an error if Lean cannot find `x + 0` in the goal).

```lean
⊢ succ x + y = succ (x + y)
-- induction on y

-- 1) base case, {y = 0}
⊢ succ x +      0 =       succ (x + 0)

-- 2) inductive case, {y = succ y'}
h : succ x + y = succ (x + y)
⊢ succ x + succ y = succ (succ (x + y))

-- If we already have the theorem add_zero:
add_zero x : x + 0 = x

-- [LHS ⟼ RHS]GOAL

-- In the base case, {y = 0}
⊢ succ x + 0 = succ (x + 0)
-- saying
rw add_zero
-- rewrites the LHS of the thm (x + 0)
--     with the RHS of the thm (x)
--       in the GOAL
⊢ succ x + 0 = succ (x + 0)
-- producing:
⊢ succ x + 0 = succ (x)

-- [RHS ⟼ LHS]GOAL

-- In the base case, {y = 0}
⊢ succ x + 0 = succ (x + 0)
-- saying
rw ← add_zero
-- Uses the exp on the RHS of the theorem
-- to rewrite all its occurrences in the GOAL
-- with the exp on the LHS on the theorem.

-- rewrites the RHS of the thm (x)
--     with the LHS of the thm (x + 0)
--       in the GOAL
⊢ succ x + 0 = succ (x + 0)
-- producing:
⊢ succ (x + 0) + 0 = succ ((x + 0) + 0)
```

Important note: if `h` is not a proof of the form `A = B` or `A ↔ B` 
(for example if `h` is a function, an implication, or perhaps even a proposition itself rather than its proof), then rw is not the tactic you want.

For example, `rw (P = Q)` is never correct: `P = Q` is a (true-false) statement itself, not the proof. If `h : P = Q` is its proof, then `rw h` will work.

Tip: If `h : A = B` and you want to change `B`s to `A`s instead, use `rw ← h` (get the right-facing arrow with _\l_).

## Example 1

If it looks like this in the top right hand box:

```lean
x y : mynat
h : x = y + y
⊢ succ (x + 0) = succ (y + y)
```

that is, if you have:
- add0 x : `x + 0 = x`             (previously proven theorem)
- h :          `x = y + y`         (current hypothesis)
- ⊢ `succ (x + 0) = succ (y + y)`  (current goal)

then 
  `rw add0,` 
uses "add0" as the source, such that
  template = x + 0
  subject  = x
So it rewrites the goal (the targe) into 
  `⊢ succ x = succ (y + y)`. 
Now, you can do another rewrite 
  `rw h,` 
which uses the hypothesis "h" as the source, s.t. 
  template = x 
  subject  = y + y 
rewriting the goal (the target) into 
  `⊢ succ (y + y) = succ (y + y)`. 
Finally, this can be solved with 
  `refl`


Complete solution:

```lean
x y : mynat
h : x = y + y
⊢ succ (x + 0) = succ (y + y)
rw add0,
rw h,
refl
```


## Example 2

You can use 'rw' to change a hypothesis as well. 
For example, if your local context looks like this:

```lean
x y : mynat
h1 :     x = y + 3
h2 : 2 * y = x
⊢        y = 3
```

then `rw h1` at `h2` will turn `h2` into `h2 : 2 * y = y + 3`.


## Example 3

```lean
x y : mynat,
h : y = x + 7
⊢ 2 * y = 2 * (x + 7)
-- the hypothesis h is the proof of y = x + 7
-- the goal mentions 'y', thus
rw h
-- rewrites all occurrences of y
-- into x + 7
-- in the goal ⊢ 2 * y = 2 * (x + 7)

-- so
h :   y = x + 7
⊢ 2 * y = 2 * (x + 7)
--    ^
-- (rw h) finds y's in the goal and rewrites
-- them with the rhs of h, i.e. with (x + 7)
rw h
-- producing the exp:
⊢ 2 * (x + 7) = 2 * (x + 7)
-- which can be then solved with 'refl'
```

## Example 4

```hs
⊢ succ (succ a) = succ b
h : succ a = b

-- (1)
rw h,       -- ⊢ succ b = succ b
refl,

-- (2)
rw ← h,     -- ⊢ succ (succ a) = succ (succ a)
refl,
```
