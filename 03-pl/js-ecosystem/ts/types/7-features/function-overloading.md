# TS :: Ref :: Types :: Function overloading

## Overloading

Each *named function* has a unique set of properties that sets it apart from all other named functions. This is only because their names alone - being identifiers - are enought to distinguish them, even if their other properties are the same.

In general, functions cannot be easily compared to each other to find out if two functions are the same, i.e. if they produce the same output given the same inputs; we'd have to run them with all possible inputs and compare the results. Luckily, function overloading is not about determining if two functions are the same, but whether they can be distinguished if we disregard their names.

Overloading is a form of *ad hoc polymorphism* which enables name sharing - it allows two (or more) functions to have the same name. A classical situation to want such a thing concerns the arithmetic operators (which are also functions, only placed in the infix instead of the prefix position). That is, we'd like to use the same name, i.e. `+`, for all addition functions/operators. There may be many functions for addition dependeing on the number of numeric types a PL has. Internally, a PL may have functions like addInts, addFloats, addDoubles, etc., and we'd like to use them all with the traditional symbolic name, `+`. To achieve that, a PL must support overloading. When it does, we say that the `+` *operator is overloaded*.

Overloading works by uniquely distinguishing between functions, only it has to rely on their other properties besides their name. The set of these properties is called a **function's prototype** and it consists of:
- function's name (excluded)
- number of input parameters
- type of each input parameter
- type of return value (excluded with some PLs)

However, since name has no significance in overloading (overloaded functions will have the same name), we have to rely on these other properties. In fact, some PLs do not consider a function's return type to be a part of its prototype, which leaves only the number and type of formal parameters as means to tell functions apart (in such Pls).


## Overloading in JavaScript

JavaScript overloads some builtin functions (operators), but does not support custom, user-defined overloading.

Of course, being a dynamic language, you can say that all JS functions are already overloaded; we can pass anything into any function - there are no types to restrict what is allowed and what is not. Then, in order to discern what was passed in, a function has to identify its arguments by examining each (e.g. by using `typeof`) and react accordingly for each type. This is called **duck typing**.


## Overloading in TypeScript

We can use the same approach in TS, at least for simpler functions, by listing all the types a fucntion can take and return, i.e. by making a type union.

For example, to define a function that can accept a string as well as an array of strings, we can define a type union directly in its definition.

```ts
function say(what: string | string[]): string | string[] {…}
```

More cleanly, we can first define this union type separately, as a standalone type, and then annotate the function with it.

```ts
type ssa = string | string[]
function say(what: ssa): ssa {…}
```

### Overloading in TS

Another approach is to use function overloading, which requires defining one or more *overload signatures* and one *implementation signature*.

An **overload signature** only defines a function's parameter types and its return type - there is no implementation (no function body).

An overloaded function can have multiple overload signatures, each corresponding to a different way it can be invoked.

The **implementation signature** must have a more general (parameter and return) types, and it comes with the function's implementation. There can only be a single implementation signature. The implementation signature type must be generic enough to subsume the overload signatures.

For example, the function `say` from above is overloaded like this:

```ts
// OVERLOAD SIGNATURES
// each should contain its own JSDoc

/**
 * @param {string} what Input message
 * @returns string Output message
 */
function say(what: string): string

/**
 * @param {string[]} what Input message array
 * @returns string Output message array
 */
function say(what: string[]): string[]

// IMPLEMENTATION SIGNATURE
// and the actual function's implementation
function say(what: string | string[]) {
  return typeof what === 'string'
    ? what
    : Array.isArray(what)
      ? what.map(x => x)
      : bail()

  function bail(): never {
    throw new Error('say what')
  }
}

// INVOCATIONS
console.log(say('zero'))          // (1)
console.log(say(['one', 'two']))  // (2)
```

Now, when we hover over the name `say` (in VSCode), the popup indicates that `say` is overloaded - it has 2 overloads/versions:    
`function say(what: string): string (+1 overload)`

If we hover over the name `say` in line (1), the signature is adapted to the first overload, i.e. it uses `string` as input and output types.

If we hover over the name `say` in line (2), the signature is adapted to the second overload, i.e. it uses `string[]` as input and output types.


## References

TypeScript Function Overloading
https://dmitripavlutin.com/typescript-function-overloading/




TypeScript: Documentation - More on Functions
https://www.typescriptlang.org/docs/handbook/2/functions.html


Function Overloading in TypeScript
https://www.tutorialsteacher.com/typescript/function-overloading

TypeScript Function or Method Overloading
https://howtodoinjava.com/typescript/function-overloading/

TypeScript Function Overloading - javatpoint
https://www.javatpoint.com/typescript-function-overloading


Function Overloading: How to Handle Multiple Function Signatures - DEV Community
https://dev.to/zirkelc/how-to-overload-functions-in-typescript-22c3

How to Overload Functions in Typescript - by Maina Wycliffe
https://www.allthingstypescript.dev/p/how-to-overload-functions-in-typescript

How to achieve function overloading in TypeScript ? - GeeksforGeeks
https://www.geeksforgeeks.org/how-to-achieve-function-overloading-in-typescript/


Function Overloading in Typescript | by Thomas Laforge | ngconf | Medium
https://medium.com/ngconf/function-overloading-in-typescript-8236706b2c05


TypeScript function overloading - Stack Overflow
https://stackoverflow.com/questions/13212625/typescript-function-overloading

Typescript Method overloading for different type of parameters but same response - Stack Overflow
https://stackoverflow.com/questions/69674774/typescript-method-overloading-for-different-type-of-parameters-but-same-response

TypeScript method overloading - Stack Overflow
https://stackoverflow.com/questions/72738224/typescript-method-overloading

javascript - How to do method overloading in TypeScript? - Stack Overflow
https://stackoverflow.com/questions/12688275/how-to-do-method-overloading-in-typescript

TypeScript class method overloads not behaving the same as function overloads - Stack Overflow
https://stackoverflow.com/questions/71773810/typescript-class-method-overloads-not-behaving-the-same-as-function-overloads
