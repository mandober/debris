# TS :: Ref :: Types :: typeof operator

The JS `typeof` operator reports the type of the given expression as one of the primitive types or as object or function - it differentiates functions from the other kinds of objects.

```ts
typeof: <A>(a: A) => string

// typeof on primitives
typeof true       // 'boolean'
typeof "abc"      // 'string'
typeof Symbol()   // 'symbol'
typeof 54         // 'number'
typeof 44n        // 'bigint'
typeof undefined  // 'undefined'
typeof null       // 'object'

// typeof on object objects
typeof {}         // 'object'
typeof []         // 'object'
typeof (() => {}) // 'function'

// typeof on boxable primitives
typeof Boolean            // 'function'
typeof Boolean(true)      // 'boolean'
typeof new Boolean(true)  // 'object'

typeof String             // 'function'
typeof String("a")        // 'string'
typeof new String("a")    // 'object'

typeof Number             // 'function'
typeof Number(2)          // 'number'
typeof new Number(2)      // 'object'

typeof BigInt             // 'function'
typeof BigInt(2n)         // 'bigint'
typeof new BigInt(2n)     // ERROR: BighInt is not a ctor

typeof Symbol             // 'function'
typeof Symbol()           // 'symbol'
typeof new Symbol()       // ERROR: Symbol is not a ctor

typeof Math               // 'object'
typeof Math()             // ERROR: Math is not a function
typeof new Math()         // ERROR: Math is not a ctor

// typeof on constructable objects
typeof new Date()         // 'object'
typeof Date()             // 'string'

typeof new Array([])      // 'object'
typeof Array([])          // 'object'

typeof RegExp(/.*/)       // 'object'
typeof new RegExp(/.*/)   // 'object'

typeof new Object()       // 'object'
typeof Object()           // 'object'

typeof new Function()     // 'object'
typeof Function()         // 'object'

// typeof of casting to Object
typeof new Object(undefined) // 'object'
typeof Object(undefined)     // 'object'
```
