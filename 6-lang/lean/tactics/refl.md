# Lean : Tactics : refl

refl tactic
- Summary: `refl` proves goals of the form `X = X`
- Details: The `refl` tactic will close any goal of the form `A = B` where `A` and `B` are exactly the same thing.

```lean
-- Example: If it looks like this in the top right hand box:
a b c d : mynat
⊢ (a + b) * (c + d) = (a + b) * (c + d)
-- then
refl,
-- will close the goal and solve the level
-- Don't forget the comma.
```


The `refl` (reflexivity) tactic will prove any goal of the form `A = A`.

It doesn't matter how complicated `A` is, all that matters is that the left hand side is exactly equal to the right hand side, that is, that they are **definitionally equal**.

For example, `xy + z = xy + z` can be proved by `refl`, but `x + y = y + x` cannot.

Let's see refl in action: at the bottom of the text in this box, there's a lemma, which says that if `x`, `y`, `z` are natural numbers then `xy+z=xy+z`.

Supply the proof by deleting the word `sorry` and putting `refl,` in its place.

Remember that the goal is the thing with the `⊢` just before it. The goal in this case is `x * y + z = x * y + z`. If all is well, Lean should tell you "Proof complete!" in the top right box, and there should be no errors in the bottom right box. If things go weird and you don't understand why the top right box is empty, check for *missing commas*. For each level, the idea is to get Lean into this state: with the top right box saying "Proof complete!", and the bottom right box empty (with no errors in).

```lean
import mynat.definition     -- imports the nat
import mynat.add            -- definition of add
import mynat.mul            -- definition of mul

-- lemma
-- For all natural numbers x, y, z, we have xy + z = xy + z
lemma example1 (x y z : mynat) : x * y + z = x * y + z :=

-- Proof:
begin

  refl,

end
```
