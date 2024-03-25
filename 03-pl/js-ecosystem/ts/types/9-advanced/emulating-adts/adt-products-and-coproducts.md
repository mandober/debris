# Product and coproduct types

In the algebra of types coproduct type corresponds to addition, while product types corresponds to multiplication. These correspondencies are cardinality wise, in the same way as they manifest with sets.

## Product types

*Product type* corresponds to the Cartesian product of sets.   
Given two sets, `A` and `B`, and their Cartesian product, `A⨯B`:

`|A⨯B| = |A| ⨯ |B|`

that is, the cardinality of the Cartesian product `A⨯B` is the product of cardinalities of `A` and `B`. In case `A` and `B` are the same set `A`, the cardinality of the Cartesian product of `A` with itself, `A⨯A`, is the cardinality of `A` squared:

`|A⨯A| ≡ |A²| = |A| ⨯ |A| ≡ |A|²`

The Cartesian product, as an operation, takes each element of set `A` and pairs it with each element of set `B`:

`{ (a,b) | ∀a ∈ A, ∀b ∈ B }`

that is, the resulting set consists of ordered pairs (that is, 2-tuples), and in each pair the first component comes from set `A` and the second component from set `B`, which means it is easy to tell which source set a pair component originates from.

Mainstream languages usually have sevaral ways to construct product types, such as tuples, records, or even objects, and it is common to pick one of them as the canonical way to construct product types. Usually tuples are chosen due to their austerity.

For comparision, records are practically the same (isomorphic) to tuples, except that records name their fields. *Fields* of a record correspond to tuple's *components* or *positions*, so to convert a record to a tuple, it is sufficient to drop the names of fields. The other way around is more involved because then we have to invent field names; however, the data contained remains the same either way.

Fortunately, TypeScript has tuples, even if they are really arrays in disguise (speaking of arrays, they are also a product type but with the restriction that all members have the same type). So, we'll consider *tuples as the canonical product type* in TypeScript. As it was already suggested, this means that all other product type constructions are isomorphic to tuples, i.e. we can use tuples to represent any other product type in TS.

TS has tuples both at the value level, where they are called merely *tuples*, and at the type level, where they are called *tuple types*. Each value-level instance of a tuple is associated with a particular type-level instance of a tuple type. We'll refer to the members of a tuple (whether to values only or types only, or both) as *tuple components or elements or fields*.



## Coproduct types



Since a list is a coproduct (sum) type it should be implemented as *discriminated union* aka *tagged union* aka *disjoint union*, which are often denoted by `⊎`.

The import thing is that, unlike in a union, it is possible to tell which set an element of the tagged union came from.

Also unlike a union, the cardinality of a tagged union (or a sum type) is exactly the sum of the two source sets (or types), i.e. `|A ⊎ B| = |A| + |B|`, which justifies the name *sum type*.

A⨯B = `{ (a,b) | ∀a ∈ A, ∀b ∈ B }`

S = {a,b}
Tᵃᵍ = {Left, Right}
S⨯T =
  { (a,Left), (a,Right)
  , (b,Left), (b,Right)
  }

S ⋃ S = {a,b} ⋃ {a,b} = {a, b, a, b} = {a,b}
S ⨯ S = {a,b} ⨯ {a,b} = { (a,a), (a,b), (b,a), (b,b) }
S ⊎ S = {a,b} ⊎ {a,b} = 

S ⨯ T = { (a,Left), (a,Right), (b,Left), (b,Right) }
S ⊎ S = { (a,Left), (b,Left), (a,Right), (b,Right) }


A ⊎ B =
- Aᵀ = A tagged with 'Left'
- Bᵀ = B tagged with 'Right'
Aᵀ ⋃ Bᵀ


A ----->         A ⊎ B          <---- B
               ↙       ↘
      tagged A     |     B tagged
            ↓      |      ↓
     tag 'left'    |    'right' tag
               ↘   ↓   ↙
                Aᵀ ⋃ Bᵀ
