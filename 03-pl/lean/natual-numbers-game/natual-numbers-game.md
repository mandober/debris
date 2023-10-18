# Lean : Natual numbers game

game:
https://www.ma.imperial.ac.uk/~buzzard/xena/natural_number_game/

game mirror:
https://cbirkbeck.github.io/natural_number_game/

repo:
https://github.com/ImperialCollegeLondon/natural_number_game

## Tactics

- refl
- rw

### refl

`refl`

The __refl__ (reflexivity) tactic will close any goal of the form `A = B`, where `A` and `B` are exactly the same thing.

### rw

`rw src`
`rw ← src`

The __rw__ (rewrite) tactic is used to rewrite the *target* expression, by replacing all the *template* exps with the *subject* exp, where both template and subject exps are extracted from the *source* exp (`lhs = rhs`), and the form of the `rw` directive determines what is taken as the template and what as the subject. 
So, the form `rw src` means taget = lhs, subject = rhs (of the source exp). 
And the form `rw ← src` means taget = rhs, subject = lhs (of the source exp).

### induction

`induction n with n₁ ih`

- `n` is the arg on which the induction is done
- `n₁` is the name for the new `n`, i.e. `n = succ n₁`
- `ih` is the name for the inductive hypothesis

Induction tactics splits a goal in two goals:
- base case goal, with `n = 0`
- inductive case goal, with `n = n₁`
