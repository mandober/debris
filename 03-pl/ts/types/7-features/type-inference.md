# TS :: Ref :: Types :: Type inference

- type inference
  - where and how types are inferred
- typing JS expressions
- type information
- type annotation
- type signatures

## Introduction (rant)

The source code of any PL must have all its language items typed which happens at an early point of the compilation phase.

Dynamically-typed languages, like JS, still also be typed even though the types are not exposed to the user. It is the job of the compiler to annotate the types. This usually happens early in the comilation process because types are needed in futher steps. There is usually a component of the compiler dedicated to type annotation.

The job that that the typing component performs cannot really be called type inference, at least not generally because dynamic languages handle the types differently, and they have to accomodate things like when the type of a variable changes.

Some DPLs handle these using a universal type, sometimes called *variant*, that is large enough to accomodate any other type; in this case, each available type is just a variant of the universal type, that acts as a big container, either as an *union type*, or more preferably, as a *disjoint union*, so there is some kind of indication which type is currently contained inside it.

In statically-typed languages, types may be annotated by a user at design time. Some PL reqwuire all language items to be type-annotated by a user, even though the type-checker will checks the correctness anyway at compile time. These are weakly-typed PLs (C, C++, C#, Java and from them derived languages) which require users to annotate all language items using an awkward and cumbersome syntax; type comes before the expression, e.g. `int x[] = [1,2]`, which tends to get confusing very quickly, even with slightly complicated types. Despite using the different, more "proper" syntax for typing, TS also has the problem with unwieldly types - particularly because TS uses the brackets both for list and tuple types - so the type for a list of pairs of strings and numbers is: [string, number][]. Adding intersection or other types to this complicates the matter further: [(string | undefined), (number | null)][], especially when types are interspersed within an expression - it's best to define types separately.

```ts
const ls: [string, number][] = ["abc", 4]
```

Of course, the ideal of anything having to do with types and typing (concrete type syntax, type inference algorithms, type checking, type reconstruction) comes from academia, that is from mathematics and type theory, that has long ago established the standard way of typing things, based on the form `t : A`. Haskell (needlessly) breaks this tradition and uses `::` instead of the standard `:`, preferring to use the more easily typed single colon as the 'cons' list data constructor. Fortunatelly, TS sticks with the tradition, but manages to (needlessly) complicate things elsewhere, tarnishing readablility.

All values and expressions must get annotated with an appropriate type at that point. In statically typed languages, some expressions may already be annotated with types by the users. The compiler's component called the *type checker* then checks that the user has correctly typed language items.




## Basics

In TS, there are several places where *type inference* can provide *type information* when it is lacking.

```ts
let x = 3
```

The type of the `x` variable is inferred as `number` (what gave it away?).

This kind of inference takes place when initializing variables and properties (members), setting default parameter values, and determining function return types.

## Best common type

*Best common type* (BCT) is TS's version of *most general unifier* (MGU).

When a type inference is made from several expressions, the type of each expression influences the calculation of the "best common type".

```ts
/// untyped
const xs = [0, 1, null]
// the type is inferred as: (number | null)[]

/// inline typing
const xs: (number | null)[] = [0, 1, null]

/// standalone type
type NumNuts = (number | null)[]
const xs: NumNuts = [0, 1, null]
```

To infer the type of `x`, TS *must consider the type of each array element* (i.e. always annotate your types). Here, it comes down to 2 types, `number` and `null`. The BCT algorithm considers each candidate type, and picks a type compatible with others, which usually amounts to a union type.

Because the BCT has to be chosen from the provided candidate types, there are some cases where types share a common structure, but no one type is the super type of all candidate types.

```ts
let zoo = [new Rhino(), new Dog(), new Snail()]
```

Ideally, we may want `zoo` to be inferred as an `Animal[]`, but because there is no object with that type in the array, **we refrain from making an inference**. In these cases - when no one type is a super type of all other candidates - you should explicitly provide the type. Otherwise…

```ts
let zoo: Animal[] = [new Rhino(), new Dog(), new Snail()]
```

…otherwise, when no BCT is found, the resulting type is the union of element types (as an array): `(Rhino | Dog | Snail)[]`.

```ts
let zoo: (Rhino | Dog | Snail)[] = [new Rhino(), new Dog(), new Snail()]
```


## Contextual Typing

In some cases, type inference also works in "the other direction", known as *contextual typing*. Contextual typing occurs when the type of an expression is implied by its location.

```ts
window.onmousedown = e => {
  console.log(e.button)              // OK
  console.log(e.kangaroo)            // Error
}
```

Here, the type checker used the type of the `Window.onmousedown` function to infer the type of the arrow function expression on the rhs of the assignment. In doing so, it inferred the type of the `mouseEvent` parameter, which does contain a `button` property, but not a 'kangaroo' property.

TS can infer the type in other contexts as well:

```ts
window.onscroll = e => {
  console.log(e.button) // Error
}
```

Based on the fact that the function above is assigned to `Window.onscroll`, TS knows that `e` is bound to an `uiEvent`, and not to a `MouseEvent` like in the previous example. `UIEvent` object has no `button` property, so TS throws an error.

- [UIEvent](https://developer.mozilla.org/en-US/docs/Web/API/UIEvent)
- [MouseEvent](https://developer.mozilla.org/en-US/docs/Web/API/MouseEvent)


If this function were not in a *contextually typed position*, the function's argument would implicitly have type `any`, and no error would be issued (unless `--noImplicitAny` option is active).

```ts
const handler = e => {
  console.log(e.button) // OK
}
```

We can also explicitly give type information (put `any`) to the function's argument in order to override any contextual type:

```ts
window.onscroll = (e: any) => {
  console.log(e.button) // Now, no error is immediately given
}
```

However, this code will log `undefined`, since `uiEvent` has no property called `button` (which is a kind of mistake we use TS to avoid - thus, avoid `any` and use `--noImplicitAny` option).


Contextual typing applies in cases that include
- arguments to function calls
- right hand side of assignment
- type assertion
- members of object
- members of array literal
- return statement


The *contextual type* also acts as a candidate type for BCT.

```ts
function zoo(): Animal[] {
  return [new Rhino(), new Elephant(), new Snake()]
}
```

Here, BCT has a set of 4 candidates to consider: `Animal`, `Rhino`, `Elephant`, `Snake`. Of these, `Animal` is chosen as the BCT.


Note that in a function statement, the type given after the list of params, like the type `…: Animal[]` in `function zoo(): Animal[] {…}`, indicates the return type of the function, not the overall function type. It seems it is not possible to give the overall fn type as a single expression in the case of fn statement. It seems the formal args must be individually annotated, and the return type goes after the param list.

The type signature of function expressions can be given as a single statement, i.e. as the type of the binding variable. Or as a standalone type signature.

```ts
// types:      |arg-1|    |  arg-2 |  | return |
function zoo(r : Rhino, e : Elephant) : Animal[] {
  return [new Rhino(), new Elephant(), new Snake()]
}

//     entire fn sig ↓ given
//       |              |
const zoo: () => Animal[] = () => [new Rhino(), new Elephant(), new Snake()]
```
