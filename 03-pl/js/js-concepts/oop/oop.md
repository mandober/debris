# JS :: OOP

JS is a proper *object-orientated* language, as opposed to many OO languages which are actually *class-orientated*. In JS, object is the principal data type, and classes do not even exists. Everything revolves around objects, so it is often said that everything is an object in JS. This would be completely true save for several primitive types, which have dual representation - as primitives and as corresponding objects. These, as well as the other data types are specializations of a general object data type.



Defining variables (declaring and initializing vars) *means defining properties on the encosing object*; in the global scope, variables declared with `var` become new propeties on the global object, `globalThis`.

```js
var zed = 155

"zed" in globalThis // true (anywhere)
"zed" in window     // true (in browser)
"zed" in this       // true (in browser, WebWorker, Node)

globalThis.zed     // 155
globalThis["zed"]  // 155
```


## Primitive types and boxing

JS has 7 primitive types:
- 5 proper primitives: boolean, number, bignum, string, symbol
- 2 special primitives: undefined and null

The 5 proper primitive types actually have *dual representation* - they can take the form of a primitive value (living on the stack), and/or the form of an object (all objects live on the heap). The 5 proper primitive types are thus *shape-shifters*: normally, they are in their primitive form, but when the user tries to access their associated properties, they immediately transmorph into their object form. This operation is done automatically by JS and is called *boxing*. Boxing a primitive means taking a primitive value and placing it in the corresponding object that acts as a wrapper. An object form of a primitive value allows us to invoke relevant methods to a particular primitive type inside, something we wouldn't be able to if boxing wasn't implemented.

A primitive value consists of itself; e.g. a number like 42 is just the number 42 - there is nothing more to it; there is no place to put additional information. However, having such a compact form means numbers always have a constant size and therefore thay can live directly and entirely on the stack. Compound values like objects have an indirect presence on the stack - their true content is entirely located on the heap, but a reference (pointer) to it is on the stack. Loosing that reference from the stack means loosing the handle on that object - we can never access the object without its handle. If that happens, the object still remains on the heap; without the handler, it cannot be deleted and the space it occupies reclaimed, causing a memory leak.

However, being an object means it can have properties - and among these properties are the methods we expect (depending on which primitive type we're working with).

JS saves us from having to box a primitive value ourself - it does this automatically so we can just go ahead and access its properties to invoke methods relevant to that type.

For example

```js
// string type as a primive
typeof "abc"
// 'string'

// string type as an object "String"
typeof new String("abc")
// 'String'



// primive string type as a literal value

// primive number type as a literal value
42


// does nothing¹ coz its not bound to a var
// ¹ except if it says 'use strict'
var x = "abc"
```



Functions are also objects - they are *callable objects*; functions are actually *closure objects*, which are way more complex.
