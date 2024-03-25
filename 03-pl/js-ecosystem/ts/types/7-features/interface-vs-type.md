# Interface vs type alias

There are two main ways to describe the shape of an object
- *interfaces* are declared with the `interface` keyword
- *type aliases* are declared with the `type` keyword

They are very similar, and for the most common cases act the same.

```ts
// type
type TBird = { wings: 2 }
const tbird: TBird = { wings: 2 }

// interface
interface IBird { wings: 2 }
const ibird: IBird = { wings: 2 }

// Due to structurality it's possible to intermix their use:
// assigning one to the other
const ibird2: IBird = tbird
```

They can both extend other interfaces and types:
- `type` does this via intersection types created with `&`
- `interface` has the `extends` keyword

```ts
// type: extends types via intersection types
type Owl = { nocturnal: true } & TBird
type Robin = { nocturnal: false } & IBird

// interface: extends types via `extends`
interface Peacock extends TBird {
  colourful: true
  flies: false
}

interface Chicken extends IBird {
  colourful: false
  flies: false
}

let owl: Owl = { wings: 2, nocturnal: true }
let chicken: Chicken = { wings: 2, colourful: false, flies: false }
```

That said, we recommend the use of `interfaces` over `type`, specifically because you get better error messages. If you hover over the following errors, you can see how TS can provide terser and more focused messages when working with interfaces like Chicken.

```ts
owl = chicken
chicken = owl
```

A major difference between type aliases vs interfaces are that *interfaces are open* while *type aliases are closed*. This means you can extend an interface by declaring it a second time.

```ts
interface Kitten { purrs: boolean }
// this extends the interface Kitten:
interface Kitten { colour: string }


// A `type` cannot be changed outside of its declaration.
type Puppy = { color: string }
type Puppy = { toys: number }
```

Depending on the goal, this difference could be a positive or negative. However, it is better to declare publicly exposed types with `interface`.

One of the best resources for seeing all of the edge cases around `type` vs `interface` is this stack overflow thread:

https://stackoverflow.com/questions/37233735/typescript-interfaces-vs-types/52682220#52682220
