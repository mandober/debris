# Symbol

## Symbols in JS

`symbol` is a primitive data type in JS and TS, which, amongst other things, can be used for keys (object property names). Compared to `number` and `string`, `symbol` has some unique features.

New symbols can be created using the `Symbol()` *factory function*. `Symbol` has *no constructor function* (not used with `new`).

```js
const s = new Symbol() // ERROR: Symbol is not a constructor
```

`Symbol` has an optional parameter used to provide the description (as a `string`) for the newly created symbol.

```js
const sym = Symbol('desc')
```

By calling the factory function, `sym` var is assigned the unique value of this freshly created symbol. This symbol is unique, distinguishable from all other symbols and it doesn't clash with any other symbols (whether they have the same description or not, or are entirely without a description).

* symbols also work as property keys, but are not iterable, which is great for serialisation.

* The *global symbols registry* allows you to access tokens across your app.

```js
Symbol.for('print') // creates a global symbol
Symbol.for('age') // creates a global symbol
Symbol.for('halt') // creates a global symbol

const user = {
  // global symbol as a method name (prop key)
  [Symbol.for('print')]: function() {
    console.log(`${this.name} is ${this.age} years old`)
  },

  // shorthand method notation
  [Symbol.for('age')]() {
    console.log(`${this.name} has ${this.age} years`)
  },

  // But not as arrow coz the `this` would be undefined!
  [Symbol.for('halt')]: () => console.log("Hey, Joe, hey man")
  // If `this` is not referenced, then ok
}
```














## Symbol in TS

https://www.typescriptlang.org/docs/handbook/symbols.html

- type `symbol` is a primitive type.
- type `symbol` classifies JS term-level symbols.
- `uniqe symbol` is the type of unique literal symbol types
- `uniqe symbol` <: `symbol`
- each `uniqe symbol` type is distinct and only classifies a particular symbol



The type of a variable initialized with a string is infered as `string` in case of a *let-declaration*, but as a Literal String Type in case of *const-declaration*.

```ts
let   x1 = "abc" // x1: string
const x2 = "abc" // x2: "abc"
```

This situation is similar with symbols. A new symbol bound to a let-declared variable will have the type inferred as `symbol`, but if it is bound to a const-declaration, the type will be inferred as `unique symbol`, i.e. as a *unique literal symbol type* obtained with the help of the `typeof` operator.

* let-declarations

```ts
// let-declarations
let symb1               = Symbol()  // let symb1: symbol
let symb2: typeof symb1 = Symbol()  // let symb2: symbol
let symb3: symbol       = Symbol()  // let symb3: symbol
```

Above, both vars `symb1` and `symb2` have the same type, `symbol` (the primtive `symbol` type). The type `symbol` is inferred for `symb1` because the var uses a let-declaration. The same type, `symbol`, is the type of the `symb2` var because `symbol` is what the type operator `typeof` returns in `typeof symb1`.

* const-declarations

If we use a const-declaration, instead of a let-declaration, the type of a new, unannotated, variable will not be inferred as `symbol` but as a **unique symbol literal type**.

Not only is this type a **literal type**, but it is a **unique literal type**, so it cannot be reused (to type other symbols). And it can only be referenced by the `typeof` operator and only if we have the original variable typed with it to around (so we can use `typeof` operator on to get at the type).

```ts
// const-declarations

// explicitly typed
const s1: symbol = Symbol() // s1: symbol

// inferred as unique symbol
const s2 = Symbol() // s1: typeof s2 === s1: unique symbol

// using typeof on (s1: symbol)
const s3: typeof s1 = Symbol() // s1: symbol

// using typeof on (s2: unique symbol)
const s4: typeof s2 = Symbol()
// ERR: Type 'typeof sym3' is not assignable to type 'typeof sym2'.ts(2322)

// explicitly typed
const s5: unique symbol = Symbol() // const s5: typeof s5

const s6: typeof s5 = Symbol()
// Type 'typeof s6' is not assignable to type 'typeof s5'.ts(2322)
```

The type of an untyped variable (e.g. `s2` above), created with const-declaration, binding a new symbol (created with `Symbol()`), will be inferred as `unique symbol`, that is, the type of `s2` will be a *unique literal symbol type*, non-reusable, and referable only in type context with the `typeof` operator but only if the original variable (`s2`) is in scope: so, `typeof s2` will return the unique literal symbol type tied to the var `s2`.


## Refs

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Symbol#well-known_symbols

TypeScript: Documentation - Symbols
https://www.typescriptlang.org/docs/handbook/symbols.html

TypeScript: Documentation - TypeScript 2.7
https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-7.html#unique-symbol

Allow dynamic names in types by rbuckton · Pull Request #15473 · microsoft/TypeScript
https://github.com/Microsoft/TypeScript/pull/15473

Can typescript not infer the type of unique symbol passed directly into a function? - Stack Overflow
https://stackoverflow.com/questions/71006345/can-typescript-not-infer-the-type-of-unique-symbol-passed-directly-into-a-functi

Force generic type to be the type of a unique symbol in typescript - Stack Overflow
https://stackoverflow.com/questions/69244389/force-generic-type-to-be-the-type-of-a-unique-symbol-in-typescript

react redux - Ignore "unique symbol" in typescript when using "keyof typeof" with Object.keys() - Stack Overflow
https://stackoverflow.com/questions/68087572/ignore-unique-symbol-in-typescript-when-using-keyof-typeof-with-object-keys

typescript - Unknown unique symbol type - Stack Overflow
https://stackoverflow.com/questions/77000713/unknown-unique-symbol-type

Explain the symbol type in TypeScript
https://www.tutorialspoint.com/explain-the-symbol-type-in-typescript

Explain the symbol type in TypeScript - GeeksforGeeks
https://www.geeksforgeeks.org/explain-the-symbol-type-in-typescript/

Symbols in JavaScript and TypeScript
https://fettblog.eu/symbols-in-javascript-and-typescript/
