# Record types

https://agda.readthedocs.io/en/latest/language/record-types.html

## TOC

- Introduction
  - Example: Pair type

(Agda 2.6.3)
- Example: the Pair type constructor
- Declaring, constructing and decomposing records
  - Declaring record types
  - Constructing record values
  - Decomposing record values
  - Record update
- Record modules
- Eta-expansion
- Recursive records
- Instance fields

(Agda 2.6.2)
- [Declaring a record](#declaring-record-types)
- [Constructing record values](#constructing-record-values)
- [Building records from modules](#building-records-from-modules)
- [Decomposing record values](#decomposing-record-values)
- [Record update](#record-update)
- [Record modules](#record-modules)
- [Eta-expansion](#eta-expansion)
- [Recursive records](#recursive-records)
- [Instance fields](#instance-fields)


## Introduction

Records are compound types similar to products in that they also provide a way to build more complex types by grouping types together. Being essentially enhanced products, records also require that all values of the component types are supplied before a value - called an *instance* of the record type - can be built. The component types, and later, their values, when a record instance is constructed, are caled *fields*.

Records generalise the *dependent product type* (sigma type) by providing named fields and other optional features. Normally, a record type has a corresponding product type that has the same layout, only discards the field names.

### Example: Pair type

Record types are declared using the `record` keyword

```agda hs
-- type Pair : Set → Set → Set
record Pair (A B : Set) : Set where
  field
    fst : A
    snd : B
```

This defines a new type `Pair` with the type ctor `Pair : Set → Set → Set`, along with the two projection functions, `fst` and `snd`, with types

```hs
Pair.fst : {A B : Set} → Pair A B → A
Pair.snd : {A B : Set} → Pair A B → B
```

Note that the `Pair`'s explicit type parameters `A` and `B` become the implicit type parameters to the projection functions.


Elements of record types can be defined using a record expression

```hs
p23 : Pair Nat Nat
p23 = record { fst = 2; snd = 3 }
```

or using copatterns. Copatterns may be used prefix

```hs
p34 : Pair Nat Nat
Pair.fst p34 = 3
Pair.snd p34 = 4
```

suffix (in which case they are written prefixed with a dot)

```hs
p56 : Pair Nat Nat
p56 .Pair.fst = 5
p56 .Pair.snd = 6
```

or using an anonymous copattern-matching lambda (you may only use the suffix form of copatterns in this case)

```hs
p78 : Pair Nat Nat
p78 = λ where
  .Pair.fst → 7
  .Pair.snd → 8
```

If you use the constructor keyword, you can also use the named constructor to define elements of the record type:

```hs
record Pair (A B : Set) : Set where
  constructor _,_
  field
    fst : A
    snd : B

p45 : Pair Nat Nat
p45 = 4 , 5
```

In this sense, record types behave much like single constructor datatypes (but see Eta-expansion below).


## Record declaration

A record declaration begins with the `record` keyword, followed by a record name and the type signature, the `where` keyword, after which a record's body follows. A record's body is indented and begins with the `fields` keyword; at the next indentation level, each field's name and type are given.

```hs agda
record Pair (A B : Set) : Set where
  field
    fst : A
    snd : B
```

A record declaration like the simple one above defines:
- a new type ctor `Pair` of the type `Set → Set → Set`
- a couple of projection functions
  - `Pair.fst` : {A B : Set} → Pair A B → A
  - `Pair.snd` : {A B : Set} → Pair A B → B

### Record scope

The names in a record declaration are located in the record's own scope as records are a special variant of modules. Importing a module is similar to declaring a record, in that the content is immediately available, but the contained names are only accessible in the qualified form. For example, the `fst` field above is only accessible qualified as `Pair.fst`.

However, there's an exception: when using the record expression (see below) to create a new record value, the names must not be qualified. In this case, they are obvious from the context, and it is an error to qualify them, regardless of whether the record was opened or not.

```hs
new1 = record { fst = 2; snd = 3 }  -- ok

new2 = record { Pair.fst = 2; Pair.snd = 3 } -- ERROR
```

To use the bare names, modules and records need to be `open`ed. Adding the line `open Pair` anywhere after the declaration of the `Pair` record, makes the names inside available unqualified, e.g. as `fst` and `snd`.

```hs agda
open Pair

r1 : Pair Nat Nat
fst r1 = 0
snd r1 = 1
```

## Record values

Creating a new value i.e. a record instance
1. Record expression
2. Copatters in prefix position
3. Opatters in suffix position (with dot prepeneded copatterns)
4. Anonymous copattern-matching lambda (copatterns only in suffix form)

```hs agda
-- 1. Record expression
new1 : Pair Nat Nat
new1 = record { fst = 2; snd = 3 }

-- 2. Copatterns in prefix position
p2 : Pair Nat Nat
Pair.fst p2 = 3
Pair.snd p2 = 4

-- 3. Copatterns in suffix position (prepened by a dot)
p3 : Pair Nat Nat
p3 .Pair.fst = 5
p3 .Pair.snd = 6

-- 4. Anonymous copattern-matching lambda (copatterns suffix form only)
p4 : Pair Nat Nat
p4 = λ where
  .Pair.fst → 7
  .Pair.snd → 8
```


## Record constructor

If you use the `constructor` keyword, you can also use 
the *named ctor* to define elements of the record type:

```hs agda
record Pair (A B : Set) : Set where
  constructor _,_
  field
    fst : A
    snd : B

-- new Pair
p5 : Pair Nat Nat
p5 = 4 , 5
```

In this sense, record types behave much like *single-ctor data types* 
(however see Eta-expansion below).



## Declaring record types

The general form of a record declaration is as follows:

```hs
record <recordname> <params> : Set <level> where
  <directives>
  constructor <constructorname>
  field
    <fieldname1> : <type1>
    <fieldname2> : <type2>
    …
  <declarations>
```

All the components are *optional*, and can be given in any order. 
Fields can be given in multiple blocks, interspersed with other declarations. 
Each field is a component of the record. 
Types of later fields can depend on earlier fields.

The directives available are
- `eta-equality`
- `no-eta-equality`
- `pattern` (see Eta-expansion)
- `inductive`
- `co-inductive` (see Recursive records)


## Constructing record values

Record values are constructed by giving a value for each record field:

```hs agda
record { <fieldname1> = <term1> ; <fieldname2> = <term2> ; ... }
```

where the types of the terms match the types of the fields.

If a ctor `<constructorname>` has been declared 
for the record, this can also be written

```hs agda
<constructorname> <term1> <term2> ...
```

For named definitions, this can also be expressed using copatterns:

```hs agda
<named-def> : <recordname> <parameters>
<recordname>.<fieldname1> <named-def> = <term1>
<recordname>.<fieldname2> <named-def> = <term2>
...
```

Records can also be constructed by updating other records.

## Building records from modules

The record `{ <fields> }` syntax also accepts module names. 
Fields are defined using the corresponding definitions from the given module. 
For instance assuming this record type `R` and module `M`

```hs agda
record R : Set where
  field
    x : X
    y : Y
    z : Z

module M where
   x = ...
   y = ...

r : R
r = record { M; z = ... }
```

This construction supports any combination of explicit field definitions and applied modules. 

>If a field is both given explicitly and available in one of the modules, then the explicit one takes precedence. 

>If a field is available in more than one module then this is ambiguous and therefore rejected. As a consequence the order of assignments does not matter.

The modules can be both applied to arguments and have import directives such as hiding, using, and renaming. Here is a contrived example building on the example above:

```hs agda
module M2 (a : A) where
  w = ...
  z = ...

r2 : A → R
r2 a = record { M hiding (y); M2 a renaming (w to y) }
```

## Decomposing record values

With the field name, we can project the corresponding component out of a record value. It is also possible to pattern match against inductive records:

```hs agda
sum : Pair Nat Nat → Nat
sum (x , y) = x + y
Or, using a let binding record pattern:

sum' : Pair Nat Nat → Nat
sum' p = let (x , y) = p in x + y
```

!!! Note
    Naming the constructor is not required to enable pattern matching against record values. Record expressions can appear as patterns.


## Record update

Assume that we have a record type and a corresponding value:

```hs agda
record MyRecord : Set where
  field
    a b c : Nat

old : MyRecord
old = record { a = 1; b = 2; c = 3 }
```

Then we can update (some of) the record value's fields in the following way:

```hs agda
new : MyRecord
new = record old { a = 0; c = 5 }
```

Here new normalises to record `{ a = 0; b = 2; c = 5 }`.

Any expression yielding a value of type `MyRecord` can be used instead of old.

Using that records can be built from module names, together with the fact that all records define a module, this can also be written as

```hs agda
new' : MyRecord
new'  = record { MyRecord old; a = 0; c = 5}
```

>Record updating is not allowed to change types: the resulting value must have the same type as the original one, including the record parameters.

Thus, the type of a record update can be inferred if the type of the original record can be inferred.

The record update syntax is expanded before type checking. 

```hs agda
-- When the expression
record old { upd-fields }

-- is checked against a record type R, it is expanded to
let r = old in record { new-fields }
```

where `old` is required to have type `R` and `new-fields` is defined as:    
for each field `x` in `R`
- if `x = e` is contained in `upd-fields` then `x = e` is included 
  in `new-fields`; otherwise:
  - if `x` is an explicit field then `x = R.x r` is included in `new-fields`
  - if `x` is an implicit or instance field, it is omitted from `new-fields`


The reason for treating *implicit fields* and *instance fields* specially is to allow code like the following:

```hs agda
data Vec (A : Set) : Nat → Set where
  [] : Vec A zero
  _∷_ : ∀{n} → A → Vec A n → Vec A (suc n)

record R : Set where
  field
    {length} : Nat
    vec      : Vec Nat length
    -- More fields ...

xs : R
xs = record { vec = 0 ∷ 1 ∷ 2 ∷ [] }

ys = record xs { vec = 0 ∷ [] }
```

Without the special treatment, the last expression would need to include a new binding for `length` (for instance `length = _`).


## Record modules

>Along with a new type, a record declaration also defines a module with the same name, parameterised over an element of the record type containing the projection functions.

This allows records to be "opened", bringing the fields into scope.

```hs agda
swap : {A B : Set} → Pair A B → Pair B A
swap p = snd , fst
  where open Pair p
```

In the example, the record module `Pair` has the shape

```hs agda
module Pair {A B : Set} (p : Pair A B) where
  fst : A
  snd : B
```

It is possible to add arbitrary definitions to the record module, 
by defining them inside the record declaration section

```hs agda
record Functor (F : Set → Set) : Set₁ where
  field
    fmap : ∀ {A B} → (A → B) → F A → F B

  _<$_ : ∀ {A B} → A → F B → F A
  x <$ fb = fmap (λ _ → x) fb
```

In general, new definitions need to appear after the field declarations, but simple non-recursive function definitions without pattern matching can be interleaved with the fields.

The reason for this restriction is that the type of the record ctor needs to be expressible using let-exp.

In the example below `D₁` can only contain declarations for which the generated type of `mkR` is well-formed.

```hs agda
record R Γ : Setᵢ where
  constructor mkR
  field f₁ : A₁
  D₁
  field f₂ : A₂

mkR : ∀ {Γ} (f₁ : A₁) (let D₁) (f₂ : A₂) → R Γ
```

## Eta-expansion

The eta (η) rule for a record type

```hs agda
record R : Set where
  field
    a : A
    b : B
    c : C
```

states that every `x : R` is definitionally equal to record 

```
{ a = R.a x
; b = R.b x
; c = R.c x
}
```

By default, all (inductive) record types enjoy *η-equality* if the *positivity checker* has confirmed it is safe to have it.

The keywords `eta-equality` and `no-eta-equality` enable or disable η rules for the record type being declared.


## Recursive records

>Recursive records need to be declared as either `inductive` or `coinductive`.

```hs agda
record Tree (A : Set) : Set where
  inductive
  constructor tree
  field
    elem     : A
    subtrees : List (Tree A)

record Stream (A : Set) : Set where
  coinductive
  constructor _::_
  field
    head : A
    tail : Stream A
```

*Inductive records* have `eta-equality` on by default.   
*Coinductive records* have `no-eta-equality` on by default.

In fact, the `eta-equality` and `coinductive` directives are not allowed together, since this can easily make Agda loop. This can be overridden (at your own risk) by using the pragma `ETA` instead.

>You can pattern match on inductive records, but not on coinductive ones.

However, inductive records without η-equality don't support both matching on the record ctor and construction of record elements by copattern matching.

It has been discovered that the combination of both leads to loss of *subject reduction*, i.e. reduction doesn't preserve typing.

For records without η, matching on the record constructor is off by default and construction by copattern matching is on. If you want the converse, you can add the record directive `pattern`:

```hs agda
record HereditaryList : Set where
  inductive
  no-eta-equality
  pattern
  field sublists : List HereditaryList

pred : HereditaryList → List HereditaryList
pred record{ sublists = ts } = ts
```


## Instance fields

Instance fields, that is record fields enclosed in `{{ }}`, can be used to model superclass dependencies.

```hs agda
record Eq (A : Set) : Set where
  field
    _==_ : A → A → Bool

open Eq {{...}}
record Ord (A : Set) : Set where
  field
    _<_ : A → A → Bool
    {{eqA}} : Eq A

open Ord {{...}} hiding (eqA)
```

Now anytime you have a function taking an `Ord A` arg, the `Eq A` instance is also available by virtue of η-expansion. This works as you would expect:

```hs agda
_≤_ : {A : Set} {{OrdA : Ord A}} → A → A → Bool
x ≤ y = (x == y) || (x < y)
```

However, there is a problem if you have multiple record args with conflicting instance fields. For instance, suppose we also have a `Num` record with an `Eq` field:

```hs agda
record Num (A : Set) : Set where
  field
    fromNat : Nat → A
    {{eqA}} : Eq A

open Num {{...}} hiding (eqA)

_≤3 : {A : Set} {{OrdA : Ord A}} {{NumA : Num A}} → A → Bool
x ≤3 = (x == fromNat 3) || (x < fromNat 3)
```

Here the `Eq A` arg to `_==_` is not resolved since there are two conflicting candidates: `Ord.eqA OrdA` and `Num.eqA NumA`. To solve this problem you can declare instance fields as overlappable using the `overlap` keyword

```hs agda
record Ord (A : Set) : Set where
  field
    _<_ : A → A → Bool
    overlap {{eqA}} : Eq A

open Ord {{...}} hiding (eqA)

record Num (A : Set) : Set where
  field
    fromNat : Nat → A
    overlap {{eqA}} : Eq A

open Num {{...}} hiding (eqA)

_≤3 : {A : Set} {{OrdA : Ord A}} {{NumA : Num A}} → A → Bool
x ≤3 = (x == fromNat 3) || (x < fromNat 3)
```

>Whenever there are multiple valid candidates for an instance goal, if all candidates are overlappable, the goal is solved by the left-most candidate.

In the example above that means that the `Eq A` goal is solved by the instance from the `Ord` argument.

Clauses for instance fields can be omitted when defining values of record types. For instance, we can define `Nat` instances for `Eq`, `Ord` and `Num` as follows, leaving out cases for the `eqA` fields:

```hs agda
instance
  EqNat : Eq Nat
  _==_ {{EqNat}} = Agda.Builtin.Nat._==_

  OrdNat : Ord Nat
  _<_ {{OrdNat}} = Agda.Builtin.Nat._<_

  NumNat : Num Nat
  fromNat {{NumNat}} n = n
```
