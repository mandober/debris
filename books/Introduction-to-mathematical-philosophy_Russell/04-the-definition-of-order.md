# 4. The Definition of Order

We require that the ordering relation should have 3 properties:
1. If x precedes y, y must not also precede x. This is an obvious characteristic of the kind of relations that lead to series. On the other hand, relations which do not give rise to series often do not have this property.  When the relation holds between x and y, it also holds between y and x, i.e. it is *symmetrical*. A relation is *antisymmetrical* if `∀xy. xRy ∧ yRx -> x = y`. But with serial relations such a thing cannot happen. A relation is **asymmetrical** if `∀xy. xRy -> ¬(yRx)`.

2. If x precedes y and y precedes z, x must precede z. As instances of relations which do not have this property: If x is a sibling of y, and y of z, x may not be a sibling of z, since x and z may be the same person. The same applies to difference of height, but not to sameness of height, which has our second property but not our first. The relation "is a father of" on the other hand, has our first property but not our second. A relation having our second property is called **transitive**, `∀xyz. xRy ∧ yRz -> xRz`

3. Given any two terms of the class which is to be ordered, there must be one which precedes and the other which follows. A relation having this property is called **connected**, `∀xy. xRy ⊕ yRx`. For example, of any two integers, fractions or real numbers, one is smaller and the other greater; but of any two complex numbers this is not true.


When a relation possesses these 3 properties, it is of the sort to give rise to an order among the terms between which it holds; and wherever an order exists, some relation having these 3 properties can be found generating it.


A relation is **aliorelative** (or to *be contained in* or *imply diversity*) if no term has this relation to itself. Today this relation is called **irreflexive**, `∀x.¬(xRx)`.



The **square of a relation** is a relation that holds between `x` and `z` if there is an intermediate term `y` over which `x` and `z` can be transitively related, i.e. if there is an intermediate term `y` so that `xRy` and `yRz`, which in turn makes `xRz` hold; i.e. `∀x ∀z ∃y (xRy ∧ yRz -> xRz)`.

This is different from transitivity, `∀x ∀y ∀z (xRy ∧ yRz -> xRz)`, 
in the way variables are quantified: `∀x ∀z ∃y (xRy ∧ yRz -> xRz)`.

```hs
x                             x
│ ⟍                           ┊ ⟍
│   ⟍                         ┊   ⟍
│     ⟍                       ┊     ⟍
↓       ↘                     ↓       ↘
y ------> z                  ∃y ┈┈┈┈┈┈-> z

-- transitivity:             square of a relation:
∀xyz.                          ∀xz. ∃y.
 x R y ∧ y R z -> x R z            x R y ∧ y R z -> x R z
```

The square of a relation is that relation which
holds between two terms x and z when there is an
intermediate term y such that the given relation
holds between x and y and between y and z. Thus
"paternal grandfather" is the square of "father,"
"greater by 2" is the square of "greater by 1".
