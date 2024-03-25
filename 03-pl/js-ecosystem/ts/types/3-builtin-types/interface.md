# TS :: Types :: Type interface

## TL/DR
- interface is a *type declaration*
- interface specifies the structure (shape) of a type:
  - object type (in terms of its properties)
  - function type (in terms of the function signature)
- interface may be used as *function signature*
- interface may be used for *function overloading*
- interfaces are *open world*: same named interfaces are auto-merged
- interfaces are *structural*: types are matched by their structure
- interface items are delimited by: ε, comma, newline, semi-colon
- there is no sign between a type's name and the opening brace
- a class `implements` one or more interfaces


## Using `interface` type declaration

### Typing an object

The `interface` type declaration is commonly used to describe an *object type* by specifying the types of its properties.

```ts
interface Obj {
  prop0: string,
  prop1: <A, B>(...args: A[]) => B,
}
```

Optionally, we can specify the **type of the index**, i.e. the *type of keys* (property names) and the *type of property values*, in order to restrict the types for properties that already exist, but especially for properties that may be added in the future.

```ts
interface Obj {
  prop0: string,
  prop1: <A, B>(...args: A[]) => B,
  // index signature
  [key: string | number | symbol]: string,
}
```


## Interface as function signature

```ts
interface Sig {
  <A, B>(...args: A[]): B
}
```

## Interface for function overloading

```ts
interface Sig {
  <A, B>(...args: A[]): B
}
```



## About interface

TypeScript uses the interface construct to allow users to describe the structure of values, paricularly of object values and functions.

An *interface type declaration* is introduced using the type-level keyword `interface`, followed by the name of the interface, and the definitions of its members.

* Interface members may be separated using semi-colon, comma, or a newline.
* An interface declaration has nothing (no `:` or `=`) between the name and opening brace.

```ts
// using an interface: first define it
// then use it as a type annotation
interface Point {
  x: number,
  y: number,
}

let pt2: Point = {
  x: 2,
  y: 3,
}

// using inline type annotation instead
let p: {
  x: number;
  y: number;
} = {
  x: 2,
  y: 3
}
```

The two variables above have the same type, but defining an interface before it is used allows better reuse of types. The second variable above has the type that conforms to the interface type `Point`, but its type remain nameless.


## Interfaces are structural

Intefaces are *structural*: unlike nominal typing which considers two types to be compatible only if they have the same name, *structural types* are compatible, or not, regardless of their names, only their structure mattters.

```ts
let pt3: {
  x: number
  y: number
  z: number
} = {
  x: 4,
  y: 7,
  z: 3,
}
```

The value above, `pt3`, is compatible (can be assigned) to the variable `pt2` defined earlier even though `pt2` has type `Point` and `pt3` has an inlined, anonymous type. This is bcause `pt3` has all the required members of the required types (namely, `x: number` and `y: number`) , and the fact that it has extra member (namely, `z: number`) is irrelevant. Naturally, this only works one way - `pt2` value is not assignable to `pt3` variable (since it lacks the member `z: number`).

## Interfaces are open-ended

Using interfaces, TypeScript mimics the extensibility of JS.

Two interfaces with the same name are **automatically merged** even if they are defined in separate files.

The automatic merging of interface declarations may be unexpected - you need not do anything to extend an existing interface, except to give it the same name as the "base" interface.

```ts
// in file1.ts
interface IFace {
  x: number
}

// in file2.ts
// importing file1.ts and defining the same-named interface
interface IFace {
  y: string
  z: boolean
}

// results in having the merged interface
interface IFace {
  x: number
  y: string
  z: boolean
}
```

## Classes implement interfaces

If you want to use classes that must follow an object structure that someone declared for you in an interface you can use the `implements` keyword to ensure compatibility:

```ts
interface Point {
  x: number,
  y: number,
}

class MyPoint implements Point {
  x: number,
  y: number,
}
```

Any changes (adding a new property) in an implemented interface will trigger errors in the class that implements it as well as in the objects derived from that class.


## Not every interface is implementable easily

Interfaces are designed to declare any arbitrarily crazy structure that might be present in JavaScript.

Consider the following interface where something is callable with new:
The `new` call with a class name calls the class' ctor and instantiates an new object of that class.

```ts
interface Crazy {
  new = () => ({ hello: number })
}

class CrazyClass implements Crazy {
  constructor() {
    return { hello: 123 }
  }
}

let crazy = new CrazyClass()
// crazy is { hello: 123 }
```

You can declare all the crazy JS out there with interfaces and even use them safely from TS. Doesn't mean you can use TS classes to implement them (!?)



## Refs

* interfaces
https://basarat.gitbook.io/typescript/type-system/interfaces
