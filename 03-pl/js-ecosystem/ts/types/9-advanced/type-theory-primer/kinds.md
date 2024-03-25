# Kinds

## Kinds, take 4

Types classify values, and kinds classify types. This classification of types into kinds has much to do with arity (as we'll see).

Consider arrays. In JS, we talk about an array as a single, concrete, collection of elements, where each element may have a different type (they are heterogeneous). In TS, unlike in JS, arrays are restricted to only contain elements of the same type (they are homogeneous). In TS, we talk of arrays as collections of elements, but each concrete array is a collection of elements of the same type. An array of numbers has the type `number[]`, an array of strings has the type `string[]`, etc.

In fact, the equivalent notation for these two arrays is `Array<number>` and `Array<string>`. This notation more clearly shows that `Array` (as a sole token) is in fact a *type constructor*. An array containing an unknown type of elements can still be denoted thanks to parameterization - we can abstract the type of array's elements and represent it with a type parameter, such as `A` or `T`. When we want to talk about arrays in general, we are not forced to give examples of *concrete arrays* like the previously mentioned `Array<number>` or `Array<string>`, but we can talk about *any array* - i.e. *generic array* - denoted by `Array<A>`, where the type parameter `A` represents a type - a type that will be supplied in the call to this type function; yes, `Array` type ctor is can also be viewed as a type function. The function named `Array` that has a single parameter `A` and that returns something, which in this case, is a new type, i.e. a new type obtained by instantiating the type param `A` with a type argument. So `Array<number>` is in fact the call to the type function `Array`, passing it the type `numner` as an arg.

```ts
// function arr(...as) { return as}
const arr = (...as) => as



const Array = A => …
type Array = A => Array<A>
Array<A>
Array<number>
ArrayOfNumbers = Array(number)
ArrayOfNumbers = Array<number>
```



So instead of being forced to tal about 

Type constructors are actually type functions. Array





Namely, primitive types (like `number`, `string`, `boolean`, etc.) are also considered type constructors, just like, e.g. `Array`. However, it is easier to view `Array` as a type ctor - because `Array` really does construct a new type.


are *unparameterized type constructors*; they construct 




## Kinds, take 3

- types classify values, kinds classify types.
- all primitive types have (belong to) the same kind `*`
- all primitive types are inhabited
- the kind `*` classifies inhabited types
- all inhabited types belong to (are classified by) the kind `*`
- bottom type, `never`, is uninhabited (¹)

- JS primitives:
  - `number`, `string`, `boolean`
  - `bigint`, `symbol`
  - `null`, `undefined`
- TS primitive types:
  - `any`
  - `number`, `string`, `boolean`
  - `bigint`, `symbol`
  - `null`, `undefined`
  - `unknown`
  - `void`
  - `never`


have the basic kind `*` (read 'star').

Primitive types like `number`, `string`, `boolean` are type ctors
- *flat* type ctors like `number`, `string`
- 


(¹) whether `never` has the kind `*` is not too important, at least not operationally, but it is certainly curious. Usually, it is said that the kind `*` only containts (classifies) inhabited types and primitive types. The type `never` is uninhabited (has no members, i.e. values), but it should be counted as a TS primitive (though not as JS primitive).



## Kinds, take 2

>*Types* classify *values*, while *kinds* classify types.

- values ∈ type (values belong to a type)
- types ∈ kind (types belong to a kind)

Examples of values and their types
- 0 ∈ number, 1 ∈ number, …
- "" ∈ string, "a" ∈ string, …
- true ∈ boolean, false ∈ boolean
- undefined ∈ undefined
- null ∈ null

Examples of types and their kinds
- number ∈ *
- string ∈ *
- boolean ∈ *
- undefined ∈ *
- null ∈ *

The method of classification of values, i.e. the method that assigns a given value to some type has to do with the properties, deemed important in some way, that values have in common. Actually, often sets come first, and only then we think about their values.

classify values so they belong


The need to classify types can be seen by comparing the type ctors `number`, `Array` and `Map`. The `number` type ctor has kind `*` (read 'star'), which contains saturated (unparameterized) types. All primitive types have the kind `*`. 

>All inhabited types are classified by the kind `*`.

Kind is related to arity 


Higher-kinded types are *type constructors*. 
Type constructors have various kinds, with the simplest one being the kind

of the *flat* type ctors like `number`, `string`, etc.; 

these are unparameterized type ctors and they have the simplest kind, `*` (read "star").


## Kinds, take 1

The primitive TS types (`number`, `string`, `boolean`, `bigint`, `symbol`, `null`, `undefined`) have the basic kind `*` (read 'star').

The kind `*` classifies *inhabited types*; all the primitive types are inhabited by values, i.e. each primitive type classifies values. For example, `boolean` classifies just two values, `null` and `undefined` each classify one value, while the others classifies a lot of values ('classify' is often the word used to say that a type contains values, i.e. that values are contained, or are members, of a type). And just like a type classifies values, so does a kind classify types (value ∈ type ∈ kind).

Consider a collection of all possible values found in some programming language; such set would be infinite, and even if it had a name, like `𝒰`, we wouldn't use it often, if ever; having all the possible values like that, as a bag, is not very useful. It's more useful to classify these values into sets, such that each set holds only values that share some particular property.

This is similar to a naive set theory which allows unrestricted set comprehension, i.e. which allows unrestricted creation of sets using set-builder notation (aka set-comprehension notation). 

`{ x | x ∈ 𝒰 }`
`{ x | P(x) }`


in common (similarly to how the set-builder notation builds sets from elements that satisfy a particular predicate).

Unrestricted set comprehension, e.g. `{ x | x ∈ 𝒰 }`, allows us to build unrestricted sets, which means a set theory that allows it falls pray to the Russell's paradox:

If `R = { x | x ∉ x }`, then `R ∈ R ⇔ R ∉ R`.


`{ x | x ∉ x } ⇒ R ∈ R ⇔ R ∉ R`

would be if the set-bulder notation would allow `{ x | x ∈ 𝒰 }`





>All inhabited types are classified by the kind `*`.


and the empty type, which in TS is the `never` type.

All primitive types are type ctors.



All primitive types have the basic kind `*`. using a pseudo notation, we can specify the kind of each primitive type ctors:

```ts
type number: *
type string: *
type boolean: *
type null: *
type unknown: *
type never: *
type any: *
```
