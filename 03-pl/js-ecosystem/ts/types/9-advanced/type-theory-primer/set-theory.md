# Set theory

Since TS types behave like sets, a set theory primer seems warranted.

## Interpreting formulae of first-order logic

Logic uses formulas to express things and, particularly in the context of set theory, the *set-builder notation*, aka *set comprehension*.

For example, the set comprehension is used to define a set `S` by `S = { x | x ∈ x }`, or with explicit quantification as `S = { x | ∀x. x ∈ x }`. This formula has a universally quantified variable `x`, so it talk about *all things* because the variable `x` ranges over the entire *domain of discourse* (as it is unconstrained). Since we talk about sets, the domain of discourse consists of sets, thus any variable ranges over sets. Most set theories only postulate the existence of sets, that is, there is nothing else but sets. Thus, sets are collections but also elements of those collections (sets as containers and sets as elements). So, above, saying that `∀x. x ∈ x` should be interpreted as: for all sets `x`, `x` belongs to itself, i.e. given any arbitrary set, call it `x`, `x` belongs to itself. Normally, this is not true, so this comprehension ends up defining the empty set - the set `S` defined by it is the same as the empty set, which already has a more established name, `∅`.







## Naive set theory

The term "naive set theory" is used in various ways. One use of the term *naive set theory* is to describe a formal theory of sets that is
- formulated in a first-order language,
- that has a non-logical, binary predicate `∈`,
- that includes the axiom of extensionality, and
- that includes the axiom schema of unrestricted comprehension

*The Axiom Of Extensionality*: `∀x ∀y [∀z (z ∈ x ⟺ z ∈ y) ⟹ x = y]`

The Axiom Of Extensionality says that two sets are equal if they have the same elements.

So, two sets `x` and `y` are equal, i.e. `x = y`, if they have the same elements. First, `∀x ∀y` "means given any two sets", or more precisely, "for all `x` and `y`", without explicitly specifying what `x` and `y` are; however, in a set-theory, it is assumed they are sets; in fact, sets are the only thing assumed to exist, so any variable can only ever range over sets. Next, we need to encode "sets that have the same elements" in the language of first-order quantified logic (first-order means that variables range over sets). To reference the elements contained in a set, we introduce another universally quantified variable (`∀z`), which means "for all `z`" (where `z` ranges over all sets, so: 'for all sets as referred to by `z`'). The part in the parenthesis, `(z ∈ x ⟺ z ∈ y)`, says that 




∀x ∀y [∀z (z ∈ x ⟺ z ∈ y) ⟹ x = y]
∀x ∀y ∀z ((z ∈ x ⟺ z ∈ y) ⟹ x = y)

∀x ∀y ∀z ((z ∈ x ⟹ z ∈ y) ⟹ x = y)



*The Axiom Schema of Unrestricted Comprehension*: `∃y ∀x [x ∈ y ⟺ φ (x)]`




for any formula φ with the variable x as a free variable inside φ. Substitute x∉x for φ(x) to get 
∃y∀x(x∈y⟺x∉x)

Then by existential instantiation (reusing the symbol y) and universal instantiation we have
y∈y⟺y∉y

a contradiction.

Therefore, this naive set theory is inconsistent.
