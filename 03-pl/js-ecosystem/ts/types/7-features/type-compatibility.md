# Type compatibility

https://www.typescriptlang.org/docs/handbook/type-compatibility.html

In TS, *type compatibility* is based on **structural subtyping**, which is a way of relating types based solely on their structure i.e. by checking the presence of member types.

>Structural typing is a way of relating types based on their members.

Structural typing is contrasted by **nominal typing**, in which types are related by name - two types are compatibile if they have the same name.

In structural typing, two types are compatibile if their structure, that is, if their members match, while the concrete type names are irrelevant.

TS chose a type system with structural typing to match JS dynamics. It is said that structural type system lifts duck typing into a first-class construct.

```ts
interface Pet {
  name: string
}

class Dog {
  name: string
}

let pet: Pet

// ok, due to structural typing
pet = new Dog()
```

We can assign the inferred type for the `Dog` class to a variable whose type is declared to be `Pet` because these two types match structurally, i.e. the `Pet` type requires that compatible types must have a property `name` of type `string`, which the expression `new Dog()` does becasue it evalutes to an object literal type and that object indeed has the required property (by both name and type).

In a *nominally-typed* OO language (Java, C#) the equivalent code would be an error because the `Dog` class does not explicitly describe itself as being an implementer of the `Pet` interface.

TypeScript's *structural type system* was designed based on how JS code is typically written. Because JS widely uses *anonymous objects* (like *function expressions* and *object literals*), it is much more natural to represent the kinds of relations found in JS libraries with a structural type system instead of a *nominal type system*.

## Soundness

TypeScript's type system allows certain operations whose safety cannot be determined at compile-time (only at run-time, aka "run and pray").
>Type systems with this property are **unsound**.

The places where TypeScript allows *unsound behavior* were carefully considered, and throughout this document we'll explain where these happen and the motivating scenarios behind them.

## The basics

The basic rule of TS structural typing is that `x` is compatible with `y` if `y` has at least the same members as `x`.

For example, consider the following code involving an interface named 'Pet' which has a 'name' property:

```ts
interface Pet {
  name: string
}

let pet: Pet
let dog = { name: "Lassie", owner: "Rudd Weatherwax" }
// dog type is inferred as: { name: string; owner: string; }
pet = dog
```

To check whether 'dog' can be assigned to 'pet', the compiler checks each property of 'pet' to find a corresponding compatible property in 'dog'. In this case, 'dog' must have a member called 'name' that is a `string`. It does, so the assignment is allowed.


The same rule for assignment is used when checking *function call arguments*:

```ts
interface Pet {
  name: string
}

let dog = { name: "Lassie", owner: "Rudd Weatherwax" }

function greet(pet: Pet) {
  console.log("Hello, " + pet.name)
}

greet(dog) // allowed
```

Note that 'dog' has an extra 'owner' property, but this does not create an error. Only members of the target type ('Pet' in this case) are considered when checking for compatibility. This *comparison process proceeds recursively*, exploring the type of each member and submember.

Be aware, however, that *object literals* may only specify known properties. For example, because we have explicitly specified that 'dog' is of type 'Pet', the following code is invalid:

```ts
let dog: Pet = { name: "Lassie", owner: "Rudd Weatherwax" } // Error
```
