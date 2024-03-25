# Type casting

- type casting
  - the `as` keyword, `x as T`
  - type cast with angle brackets, `<any> { value: 1 }`
  - double type cast with 'as', `as unknown as T`
- type cast
  - to `any`
  - to `unknown`
  - to `never`?
  - to `T`
- faking nominal types
  - `string & { readonly tag: unique symbol}`
  - intersection types
  - tag fields
  - readonly prop
  - `unique symbol` type
  - type-casting to a tagged type
    - e.g. type-casting a string to a tagged string type, `name as Name`




## Faking nominal types

Type-casting to `any` when constructing instances of these types is the cost of nominal typing.

```ts
// casting to type any ↓
var nomA: NominalA = <any> { value: 1 }

// casting ↓ to a concrete type
var nomA = <NominalA> { value: 1 }
```

In the example below, these two cast produce the same result.

But gives?! How does casting to `any` or to `NominalA` "installs" the missing property? Without the case we get the error:

  Property `'Nominal type A'` is missing in type `'{ value: number }'` but required in type `'NominalA'`.

This property, as can be seen below, has some unique name (thus the spaces in name and therefore the use of quotes), but more importantly, the type of this property is the same type we're defining (i.e. `NominalA`). So, that means there's no way to add this property legally to an object literal value; we can only make `{ value: number }`, and that's it. And if we assign the type `NominalA` to this object, the error above kicks in. But, as shown below, if we cast the object to `any` or to the type `NominalA`, then all is ok. WTF? How does casting the object to the type `NominalA` (or using `as NominalA`) work?! Especially why does casting it to `any` works?! Does this just appease the type checker, yet the object literal still lacks the required property? Probably...it certainly cannot conjure up the missing property by casting, so casting it to `NominalA`, or annotating the object with `NominalA` using `as` in the post position, just serves to play tricks on the type checker and me. Like a "here's what you need to do to have nominal types; do it and stfu". Coz, without that magical prop, the objects (of both types NominalA and NominalB), as well as the typed vars, would all be compatible with each other according to structural typing.



* Faking nominal types
https://github.com/Microsoft/TypeScript/issues/202

(Shame it doesn't work for creating distinct types for string that you want to be indexable)


```ts
interface NominalA {
  'Nominal type A, nobody can match me to anything I am not': NominalA
  value: number
}

interface NominalB {
  'Nominal type B, mostly like A but yet quite different': NominalB
  value: number
}

// Type-casting to <any> when constructing instances of these types is the cost of nominal typing. Lest pollute everything with casting, it's best to define helpers jsut for that purpose. These two constructor functions below perform casting internally and produce a nominal object.

var vala : NominalA = <any> { value: 1 }
var valb : NominalB = <any> { value: 2 }
// or
var vala = <NominalA> { value: 1 }
var valb = <NominalB> { value: 2 }
// or
var vala = { value: 1 } as NominalA
var valb = { value: 2 } as NominalB


vala = valb // <-- is now an error (as it should be)
//| Property `'Nominal type A'` is missing in type '{ value: number }'
//| but required in type 'NominalA'
```
