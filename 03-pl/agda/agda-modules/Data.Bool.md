# Data.Bool

- Modules
  - _<_
  - _≤_
  - Bool
- Names
  - _<_       : Bool → Bool → Set
  - _<?_      : (x y : Bool) → Relation.Nullary.Dec (x Data.Bool.< y)
  - _xor_     : Bool → Bool → Bool
  - _∧_       : Bool → Bool → Bool
  - _∨_       : Bool → Bool → Bool
  - _≟_       : (x y : Bool) → Relation.Nullary.Dec (x Agda.Builtin.Equality.≡ y)
  - _≤_       : Bool → Bool → Set
  - _≤?_      : (x y : Bool) → Relation.Nullary.Dec (x Data.Bool.≤ y)
  - Bool      : Set
  - T         : Bool → Set
  - T?        : (x : Bool) → Relation.Nullary.Dec (T x)
  - b≤b       : {b : Bool} → b Data.Bool.≤ b
  - decSetoid : Relation.Binary.Bundles.DecSetoid Agda.Primitive.lzero Agda.Primitive.lzero
  - f<t       : false Data.Bool.< true
  - false     : Bool
  - f≤t       : false Data.Bool.≤ true
  - if_then_else_ : {A.a : Agda.Primitive.Level} {A : Set A.a} → Bool → A → A → A
  - not       : Bool → Bool
  - true      : Bool