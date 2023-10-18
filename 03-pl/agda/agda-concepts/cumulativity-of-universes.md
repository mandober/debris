# Cumulativity of universes

Agda's universes are cumulative, meaning that a term belonging to a `Setᵢ` is also a term of any universe larger than `i`, i.e.

`A : Set i` → `A : Set j` (∀ j >= i)

https://agda.readthedocs.io/en/v2.6.2.2/language/cumulativity.html
