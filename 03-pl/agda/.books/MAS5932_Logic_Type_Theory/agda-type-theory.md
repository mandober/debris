# MAS5932 Logic, Type Theory and the Mechanization of Mathematics

https://www.math.fsu.edu/~ealdrov/teaching/2020-21/fall/MAS5932/agda/informal.html

The statements we make about types and terms are called **judgements** and there are 4 of them:

1. `Γ ⊢ A : 𝓤`

says that `A` is a type (in the context `Γ`).

2. `Γ ⊢ x : A`

This says that `x` is a term of type `A`.

3. `Γ ⊢ A = B : 𝓤`

This says that type `A` is equal to type `B`.

4. `Γ ⊢ x = y : A`

This says that `x` and `y` are equal terms of type `A`, definitionally.
