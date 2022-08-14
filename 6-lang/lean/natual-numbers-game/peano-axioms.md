# Tutorial world Level 3: Peano's axioms

```lean
-- import Peano's definition of the natural numbers
import mynat.definition
```

The import above gives us the type `mynat` of natural numbers, but also:
- term `0 : mynat` interpreted as the number zero
- function `succ : mynat → mynat`
- the principle of mathematical induction

These axioms are essentially the axioms isolated by Peano which uniquely characterise the natural numbers (we also need recursion, though). The first axiom says that 0 is a natural number. The second says that there is a `succ` function which takes a mynat and returns the number after it.

Peano's last axiom is the principle of mathematical induction. This is a deeper fact. 
It says that 
if we have infinitely many propositions P(0), P(1), P(2), ..., and 
if `P(0)` is true, and 
if for every natural number `d`, 
we know that `P(d)` implies `P(succ(d))`, 
then `P(n)` must be true for every natural number `n`.

One can also think of it as saying that every natural number can be built by starting at `0` and then applying `succ` a finite number of times.

Peano's insight was that, first, these axioms completely characterise the natural numbers; and second, that these axioms alone can be used to build a other structures on the natural numbers, e.g. addition, multiplication, etc.

If our goal is `⊢ succ (succ a) = succ b`, 
and our hypothesis is `h : succ a = b`, 
then what will the goal be after `rw h`?

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

Theorems about addition on naturals

```lean
add_zero (a   : mynat) : a +      0 = a               -- lemma 1
add_succ (a b : mynat) : a + succ b = succ (a + b)    -- lemma 2

a : mynat
⊢ a + succ 0 = succ a      -- (goal 0)

rw add_succ,
-- ⊢   a + succ 0 = succ a    (goal 0)
-- add_succ : ∀ (a b : mynat), a + succ b = succ (a + b)
-- ⊢ succ (a + 0) = succ a    (goal 1)
rw add_zero,
-- ⊢ succ (a + 0) = succ a    (goal 1)
-- ∀ (a : mynat), a + 0 = a
-- ⊢ succ  a = succ a         (goal 2)
refl,
```
