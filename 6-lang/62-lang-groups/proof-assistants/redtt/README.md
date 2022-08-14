# redtt

https://redprl.org/

[redprl]: https://www.redprl.org/

**redtt** is a core language for *cartesian cubical type theory* with *extension types*.

The plan is to build an extensible interactive proof assistant around redtt, using ideas from proof assistants like RedPRL, Epigram, and Idris.


* What's the relationship to RedPRL?

The goal of the RedPRL Development Team is to study implementation techniques for higher dimensional type theory, and determine which ideas lead to the most convenient and ergonomic system for developing both higher dimensional mathematics and higher dimensional programming. To this end, our first experiment was the RedPRL Proof Assistant; our second experiment is the redtt proof assistant, which synthesizes what we learned from the experience of building RedPRL and using it to formalize mathematics.


https://github.com/RedPRL
https://github.com/RedPRL/redtt
https://github.com/RedPRL/redtt/blob/master/library/basics/biinv-equiv.red


```hs red
-- https://github.com/RedPRL/redtt/blob/master/library/basics/biinv-equiv.red
import prelude
import basics.isotoequiv
import basics.retract

-- Bi-invertible map definition of equivalence

def is-biinv-equiv (A B : type) (f : A → B) : type =
  section A B f × retraction A B f

def biinv-equiv (A B : type) : type = (f : A → B) × is-biinv-equiv A B f

def biinv-equiv→iso (A B : type) : biinv-equiv A B → iso A B =
  λ (f,(g,α),h,β) →
  let β' (a : A) : path _ (g (f a)) a =
    λ i →
    comp 0 1 (h (α (f a) i)) [
    | i=0 j → β (g (f a)) j
    | i=1 j → β a j
    ]
  in
  (f,g,α,β')
```
