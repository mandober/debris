## Introduction to TypeScript

## JavaScript alone

JavaScript has grown from a small scripting language into a language for creating both frontend and backend apps. However, while its capabilities have increased, its type safety assurances have not; its ability to express the relations between different *units of code* have remained the same. Combined with JavaScript's peculiar runtime semantics, this mismatch between language and program complexity has made development a difficult task to manage at scale.

The most common kinds of errors encountered are *type errors*: an unexpected type of value was used where a different type of value was expected. The problem is that JS coerces such mismatched values, it will try to work with the values its got no matter how wrong they are, passing over the type errors silently instead of loudly indicating an error. This means that the program will seemingly work normally until the mistake becomes blows up at an inconvenient moment at runtime.

TypeScript is a *static type-checker* for tool for JavaScript. It performs static analysis of JS programs at compile time, or, in practice, during the code authoring phase, since modern IDEs are augmented with language servers so programmers can see the errors as they happen. The goal of TypeScript is to ensure the types are correct, catching any potential type errors before the runtime.

The relationship between TypeScript and JavaScript is unique among modern programming languages. TypeScript pulls a type system over JavaScript. JavaScript acts as a term-level language, while TypeScript introsuces a new, type-level, language and makes sure the two languages remain in sync.

## JavaScript's quirks

JS was a language designed for quick scripting use which initially justified the decision to make it very tolerable to typing errors. Instead of loudly complaining o nencouring an error, JS wil go out of its way to iron over it, forcing itself to work with erraneous data by coercing it into the data of appropriate type. This accounts for some of the biggest blunders regarding the way some operations behave. For example, operator for equality, `==`, will coerce its operands, reshaping the data into something few people expect, thus eventually leading to unexpected behavior. And sometimes, even the order of operands inflences the coercions involved. By now, these JS oddities have become quite famous, securing their place in the WTF category. Nevertheless, it is not easy to keep track of them, plus that is not something expected of programmers when there are tools that can keep watch over things. Anyway, when writing small programs, such quirks are annoying but manageable, but since JS had grown into a language used to author complex apps that run everywhere, such quirks are no longer cute and such surprises have become a serious problem.

As a static type-checker, TypeScript aims to improve this situation. Detecting code errors before runtime is referred to as *static checking*, also because it happens during compile-time. Determining what's an error and what's not based on the kinds of values being operated on is known as *static type checking*.

## Relation between TS and JS

TypeScript stands in an unusual relationship to JavaScript as it offers all of the JS features, plus an additional layer on top of these: the type system. In fact, that's all TS is - a type system on top of JS.

### Syntax

>TypeScript, as a language, is a **typed superset** of JavaScript.

JS code is therefore legal TS. *Syntax* refers to the rules for writing code to form a program. Breaking these rules results in a *syntax error*.

TypeScript doesn't consider any JavaScript code to be an error because of its syntax. This means you can take any working JavaScript code and put it in a TypeScript file without worrying about how it is written. This is one of the features of TS known as *gradual typing*: a TS code can start as unmodified JS code since any valid JS code is valid TS. The the programmer can gradually add types making the code more and more type safe.

### Types

TypeScript is a *typed superset of JS*, meaning TS adds rules about how different kinds of values should be used. Accessing a non-existing property on an object is not a syntax error but a type error: it is an error of using some a value that has an incorrect type in place where another type is expected. TS will detect such errors and point it them out as such. However, TS can be configured to let such errors slide, thereby retaining the bahaviour of JS. This, at least, let's the programmer know about the error despite they choosing to ignore it. Of course, TS can be configured to not let such errors pass, forcing the programmer to fix it. This also goes towards TS being a gradual type system as the programmers can gradually accept the TS's assistence.

```js
// JS deems this ok, TS does not:
let x = 42 / []
// who in the world would find this operation acceptable?!
// who would ever want to divide a number by an array?!
// JS really tolerates huge amount of nonsense...
```

### Runtime Behavior

TypeScript preserves the runtime behavior of JavaScript. For example, division by zero in JS produces `Infinity` instead of runtime exception. As a principle, *TypeScript will never change the runtime behavior of JavaScript*. This means that if you move code from JS to TS file, it is guaranteed to run the same way, even if TS thinks that the code has type errors.

Keeping the same runtime behavior as JS is a foundational promise of TS because it means you can easily transition between the two languages without worrying about subtle differences that might make your program stop working.

### Type erasure

Once the TypeScript's compiler is done with code checking, all the types are erased and the resulting, "compiled", code is produced. So once the code is compiled, the resulting code is plain old JS with no type information.

TypeScript does not come with a runtime library to manage the program execution. There is nothin at runtime than plain JS code.

TypeScript will never change the behavior of programs based on the types it inferred, and potential type errors. In other words, while a program may have type errors, the type system itself has no bearing on how the program runs - there are no types at runtime.

## Defining Types

TypeScript extends the syntax of JS to introduce legal places where the types may be placed. Some of these places are for *inline type annotations*, so the definition of a term is inteerlaced with the types, but it is also possible to define types separately from values, as *standalone type declarations*.

For example, an object's shape can be described using an *inline type annotation* using an *object type literal*, but it may also be given using a standalone type created using an *`interface` or `type` declaration*.

```ts
// an object literal value (not explicity typed)
const obj1 = { name: "Jack", age: 42 }

// An obj value typed with inlined type annotation (object type literal)
const obj2: { name: string, age: number }
          = { name: "Jack", age: 42 }

// an object literal type defined with `type`
type TObj = { name: string, age: number }

// an object literal type defined with `interface`
interface IObj { name: string, age: number }

// attaching a type to a literal object value
const obj2: TObj = { name: "Jack", age: 42 }
const obj3: IObj = { name: "Jack", age: 42 }
```

The `interface` keyword is intended to type classes and objects as it maintains the potential inheritence chains (?).





## Refs
https://www.typescriptlang.org/docs/handbook/intro.html
https://www.typescriptlang.org/docs/handbook/typescript-from-scratch.html
