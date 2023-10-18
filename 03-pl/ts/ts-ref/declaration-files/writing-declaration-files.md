# TS :: Declaration files

The purpose of this guide is to teach you how to write a high-quality declaration (definition) file. A **declaration file**, `.d.ts`, contains ambient type declarations so TS knowns the names you refer to in the code have their types defined (somewhere else).

## Declarations overview

Declarations: `declare`, `interface`, `type`
- `declare var`
- `declare let`
- `declare const`
- `declare function`
- `declare function` with everey overloaded function type
- `declare namespace` to declare objects with properties
- `declare namespace` to organize types across files
- `interface` - use to declare reusable types
- `type` - use type aliase to to declare reusable types
- `declare class` to describe a class or class-like object.

## TOC

- [Global variables](#global-variables)
- [Global functions](#global-functions)
- [Objects with properties](#objects-with-properties)
- [Overloaded function](#overloaded-functions)
- [Reusable types (interfaces)](#reusable-types-interfaces)
- [Reusable types (type aliases)](#reusable-types-type-aliases)
- [Organizing types](#organizing-types)
- [Classes](#classes)

## Global variables

The global variable `foo` contains the number of widgets present.

```ts
console.log("Half the number of widgets is " + (foo / 2))

declare var foo: number
// block-scoped vars
declare let foo: number
// constsnt vars
declare const foo: number
```

Declaration:
- use `declare var` to declare variables
- if the variable is read-only, you can use `declare const`
- you can also use `declare let` if the variable is block-scoped


## Global functions

You can call the function `greet` with a string to show a greeting to the user.

Use `declare function` to declare functions.

```ts
greet("hello, world")

declare function greet(greeting: string): void
```

## Overloaded functions

The `getWidget` function accepts a number and returns a Widget, or accepts a string and returns a Widget array.

```ts
let x: Widget = getWidget(43)

let arr: Widget[] = getWidget("all of them")
```

Use `declare function` to declare all overloaded function types.

```ts
declare function getWidget(n: number): Widget
declare function getWidget(s: string): Widget[]
```

## Objects with properties

The global variable `myLib` has a method `makeGreeting`, and a property `numberOfGreetings`.

```ts
let result = myLib.makeGreeting("hello, world")
console.log("The computed greeting is:" + result)

let count = myLib.numberOfGreetings
```

Use `declare namespace` to describe types or values accessed via dot notation.

```ts
declare namespace myLib {
  function makeGreeting(s: string): string
  let numberOfGreetings: number
}
```

## Reusable types - interfaces

The GreetingSettings object with the following properties:
1. `greeting`: Mandatory string
2. `duration`: Optional length of time (in milliseconds)
3. `color`: Optional string, e.g. '#ff00ff'

```ts
greet({
  greeting: "hello world",
  duration: 4000
})
```

Declaration: use `interface` to declare a type with properties:

```ts
interface GreetingSettings {
  greeting: string
  duration?: number
  color?: string
}

declare function greet(setting: GreetingSettings): void
```

## Reusable types - type aliases

Anywhere a greeting is expected, you can provide a `string`, a function returning a `string`, or a `Greeter` instance.

```ts
function getGreeting() {
  return "howdy"
}

class MyGreeter extends Greeter { }

greet("hello")
greet(getGreeting)
greet(new MyGreeter())
```

Declaration: use a type alias, `type`, to make a shorthand for a type

```ts
type GreetingLike = string | (() => string) | MyGreeter

declare function greet(g: GreetingLike): void
```

## Organizing types

The `greeter` object can log to a file or display an alert. You can provide LogOptions to `.log(...)` and alert options to `.alert(...)`

```ts
const g = new Greeter("Hello")
g.log({ verbose: true })
g.alert({ modal: false, title: "Current Greeting" })
```

Declaration: use `namespace` to organize types.

```ts
declare namespace GreetingLib {
  interface LogOptions {
    verbose?: boolean
  }
  interface AlertOptions {
    modal: boolean
    title?: string
    color?: string
  }
}
```

You can also create *nested namespaces* in one declaration:

```ts
declare namespace GreetingLib.Options {
  // Refer to via GreetingLib.Options.Log
  interface Log {
    verbose?: boolean
  }
  interface Alert {
    modal: boolean
    title?: string
    color?: string
  }
}
```

## Classes

You can create a greeter by instantiating the `Greeter` object, or create a customized greeter by extending from it.

```ts
const myGreeter = new Greeter("hello, world")
myGreeter.greeting = "howdy"
myGreeter.showGreeting()

class SpecialGreeter extends Greeter {
  constructor() {
    super("Very special greetings")
  }
}
```

Use `declare class` to describe a class or class-like object.

Class declaration can have properties, methods and constructor type members.

```ts
declare class Greeter {
  constructor(greeting: string)
  greeting: string
  showGreeting(): void
}
```
