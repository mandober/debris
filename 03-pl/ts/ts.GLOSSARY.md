# TS :: Appendix :: GLOSSARY

## Ambient variable
An ambient variable declaration introduces a variable into a TS scope, but it leaves no tracks in the emitted JS code. Ambient variables serve to let TS know about the objects (and their types) that may be present in a given host environmet. For example, in a browser, those are objects like `window` and `document`. The `tsconfig.json` file is place to define which ambient objects are expected to exists so that TS includes the appropriate type declaration files. For third-party packages, types may be automatically downloaded from the "Definitelly typed" site that collects and curates types from the popular JS packages (utilities, libraries, apps).

## `any`
When the TS's type-checker encounters an expression whose type it cannot infer (as is too often the case), it has to assign some type to that expression nevertheless, so the program would compile. TS inherits this lenience from JS, allowing itself to repeat the same mistakes that allow JS users to be sloppy and imprecise about everything (happy @ CT, les misérables @ RT), annotating the problematic expressions with the spacial type `any`, which serves as a type-checking escape hatch. Instead of complaining and risking an akward situation if prompting the user for the type comes back negative, TS rather turns off the type checker temporarily for the scope of the `any`-annotated expression. However, `any` is contagious, so letting an `any` slide may infect the majority of the program, making type annotations impotent, but at least the user is not made uncomfortable. Impotent types will allow the compilation to go through, but leave the program vulnerable to runtime errors which could have been prevented (either with a smarter type-checker or users).

Unknown entities like ambient variables (such as the browser-defined objects like `window` and `document` which tsc knows nothing about) are automatically assigned `any` type as a default option (unless a suitable lib file is included to make tsc aware of such ambient objects and their types). However, it is possible to switch this behavior off by setting `noImplicitAny` to `true` in the project's `tsconfig.json`, which makes TS loudly complain whenever it encounters an expression it would have assigned `any` type to.

Lastly, although it sounds like it, `any` is not a top type (`unknown` is).

## Bottom type
In type theory, the bottom type is the type at the bottom of type hierarchy, commonly denoted by `⊥`. The bottom type is the type that is a subtype of all other types in the language. It is dual to the top type, which spans all possible values in a system.

The bottom type may be uninhabited (without values), in which case it is known as the 'empty', 'zero' or 'never' type.

In the Curry-Howard correspondence, an empty type corresponds to falsity.

When the bottom type is empty, a function whose return type is bottom cannot return any value, not even the lone value of a unit type.




It is often denoted by `⊥` and it denotes a diverging computation, e.g. the return type of the function that never halts (because it throws an error, or because it enters an infinite loop, or such similar conditions that make it divergent) is bottom.

A bottom type, usually denoted by `⊥`, is a singleton type that contains a single value, usually also denoted by `⊥`

All others types are supertypes of bottom type. 

In TS, `undefined` and `null` are not bottom types (they are unit types since each has only a single value). 

The type `void` is also not a bottom, but a unit type.

`never` is a bottom type.

## Conditional type
A conditional type, `T extends U ? X : Y`, selects one of two possible types based on a condition.

## Higher-kinded polymorphism
Higher-kinded polymorphism is an abstraction over type constructors. It is contrasted by regular polymorphism that abstracts over regular, inhabited types (of kind `*`), but not over type ctors.

## Higher-kinded type
Higher-kinded polymorphism is an abstraction over type constructors. A higher-kinded type (HKT) is a type function that parameterizes over type constructors. For example a HKT function 'Elem' not only abstracts over ground types (number, string), but also over type ctors (List<A>, Set<A>, Multiset<A>). TS does not support HKT but a pseudo syntax for a HKT could look like `Elem<T><A>`. Then, `Elem<List><A>` would be a partial application giving us the equivalent of `ElemOnLists<A>` type function. And Elem<List><number> would completely specialize the HKT to the equivalent of `ElemOnListOnNumbers`.

## Interface
Type aliases (`type`) behave differently from interfaces (`interface`) with respect to recursive definitions and type parameters.

## Nominal typing
A type system can have nominal typing or structural typing.

## Nominal type

## Object Type vs Object Literal Type
The difference between an object type and object literal type is in whether the type signature is specified standalone (nominal type) or inlined with the object's definition (structural type). An object literal type cannot be reffered to directly, but we can extract it either manually or programatically using utility types.

## Object type
Object types is a collective name for all possible types of value-level objects. The type of an object is determined through its properties. A property is a key-value pair and both the key and the value have a specific type. In fact, keys can have one of these 3 concrete types: `string`, `symbol`, `number` (numbers are coerced to strings as are some other primitive types like `undefined` and `null` (?), but `number` is still counted as a bona fide key type). This can be specified generically: `K extends string | symbol | number`, where `K` represents keys. Property values, on the other hand, are unconstrained and can take on any type, generically denoted by an unconstrained type param, `V`.

O
K extends keyof typeof O
V extends typeof O
V = O[K]

An object type is the type signature of a particular object (value-level object).

## Object literal
In JS an *object literal* is the syntax that allows us to define a one-shot *object value* directly, as opposed to first defining a class and then instantiating an object of that class, which would be an indirect way. Object literals are object values directly denoted (hardcoded) by specifying a set of properties inside curly braces.

In TS, however, object literal can means JS *object value literal*, but it may also refer to a type - a type of objects in general, i.e. *object type*, such that the type is annotated inline together with the specification of the object value; as opposed to the type being specified separately using `type` of `interface` and then attached to the object via type annotation. Sometimes, however, maybe even more often than not, both of these ways to define the type of an object (inline and standalone) are called *object type literals*.

Another way to specify an *object type* is through type manipulations and then the resulting type is certainly not called an object type literal.

Basically, an *object type literal* is a type specification for the object tht looks pretty similar to that *object's value literal*. 

## Object literal type
In JS, an *object literal* (object value literal) is the syntax that allows us to specify a one-shot object as a value directly, by hardcoding its properties inside the braces.

In TS, an *object literal type* is the way to specify the type of an object in a similarly manner, also by hardcoding a set of properties inside braces. The two forms, *object value literal* and *object type literal* look almost identical (if we squint our eyes a bit).

---

An object literal type is the *structural type signature* of an object (of a value-level object). An object literal type cannot be referred to directly, unless it is first extracted, either manually or programatically using utility types.

(is this so?) The difference between an *object type* and *object literal type* is in whether the type signature is specified standalone (nominal type) or inlined with the object's definition (structural type).

An *object literal type* is counted as a *literal type*. It describes the shape of an object (value) and has the same form like the object it describes because the syntax for typing objects closely mirrors the syntax for object literal values.

```ts
let person: {
  name: string,
  age: number,
  hobbies: object[]
} = {
  name: "Joe",
  age: 42,
  hobbies: []
}
```

## Singleton type
Singleton type or unit type is a generic name for any type that is inhabited by a single value. The names comes from set theory, where a singleton is a set with exactly one element.

## Structural typing
Structural typing is contrastyed with nominal typing in which two types are the same only if they have the same name. With structural typing, two types are *compatible* if they have a matching structure, i.e. if one type is a subset of another. Of course, structural typing only makes sense with compound types such as objects, especially since objects can be typed using literal object types. TS generally uses structural typing. A type declared with `interface` is structurally typed, unlike the one declared with `type`.

## Top
Top type is a type at the top of the type hierarchy. All others types are subtypes of top type. Top type is often denoted by `⊤`. In TS, `unknown` is top type.

## Type alias
Type aliases (`type`) behave differently from interfaces (`interface`) with respect to recursive definitions and type parameters.

## Unit type
A unit or *singleton type* is any type with exactly one value. In TS, `undefined` and `null` are unit types, since both have exactly one value: `undefined` and `null`, respecivelly. `void` is also a unit type although TS doesn't discole its only value; `void` is almost always used as the return type of side-effectful functions. Literal types (literal string types and literal number types) are also unit types.

## Control flow analysys
Control flow analysys (CFA) almost always pertains to union types - CFA refines a union type depending on user logic. For example, if the input type is `input: string | number`, and the function's body has the assertion `typeof input === 'number'`, the narrowing of the union type `string | number` to just `number` will occur in the 'then' code branch, while the "else" branch will narrow the union type to `string`.

## Assertion functions

```ts
//                             ↓ type assertion
function Guarded(o: Response): asserts o is APIErrorResponse {
  // ...
}
```

## Type guards

```ts
//                               ↓ type guard
function Guarded(o: Response): o is APIErrorResponse {
  // ...
}
```
