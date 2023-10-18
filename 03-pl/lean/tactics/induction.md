# Lean : Tactics : induction


if `n : mynat` is in the assumptions, 
then `induction n with d hd` 
attempts to prove the goal by induction on `n`, and with 
`hd` as the *inductive hypothesis* in the inductive case.

## Details

If you have `n : mynat` as an assumption, 
then `induction n with d hd` turns the current goal 
into two goals: 
0. a base case,   with `n = 0`
1. an inductive step,
   where the inductive hypothesis `hd` 
   is the proof of the `n = d`      case,       hd : n = d
   and the goal is the `n = succ d` case.          ⊢ n = succ d


## Example

```lean
-- if this is the local context
n : mynat
⊢ 2 * n = n + n       -- goal

-- then
induction n with d hd
-- induction on the arg 'n'
-- naming the 'n' as 'd' (coz) n ≠ succ n (but) d = succ n
-- naming the ind.hyp as 'hd'

-- gives two goals:
⊢ 2 * 0 = 0 + 0                   -- base case goal
-- and
d : mynat,
hd : 2 * d = d + d                -- inductive hyp
⊢ 2 * succ d = succ d + succ d    -- inductive case goal

-- all goals overview:
⊢ 2 *      n =      n + n      -- goal0
⊢ 2 *      0 =      0 + 0      -- goalB, for n = 0
⊢ 2 * succ d = succ d + succ d -- goalI, for n = succ n'
```
