# TS :: Types :: Type categories

TypeScript provides 5 main categories of types:
- primitive types
  - number
  - string
  - boolean
  - symbol
  - bigint
  - undefined
  - null
- literal types
  - number
  - string
  - boolean
  - symbol
  - bigint
  - undefined
  - null
  - literal object types
- data structure types
  - object types
  - record types
  - array types
  - tuple types
  - function types
- union types
- intersection types



```ts
type DataStructureTypes =
  | { key1: T1, key2: T2 }          // object types
  | object                          // object type
  | Object                          // object type
  | { [key: K]: V }                 // record types
  | []                              // 0-tuple types
  | [A]                             // 1-tuple types
  | [A, B]                          // 2-tuple types
  | [A, B, C, …]                    // n-tuple types
  | any[]                           // array or tuple types
  | Array<T>                        // array types
  | ReadonlyArray<T>                // array types
  | Set<K, V>                       // Set type
  | Map<K, V>                       // Map type
  | <A, B>(x: A) => B               // function types
  | Function                        // function types
  | <R>(...args: any[]) => R        // polyadic function types
  | <R>() => R                      // nullary function types
  | any                             // any pseudo type
  | void                            // singleton type, void: void
  | unknown                         // top type
  | never                           // bottom type
```

- *Object types* describe objects with a finite set of keys, 
  and these keys contain values of potentially different types.
- *Record types* are similar to object types, except they describe objects
  with an unknown number of keys, and all values in a record share the same type. For example, in `{ [key: string]: number }`, all values are numbers.
- *Tuple types* describe arrays with a fixed length. 
  They can have a different type for each index.
- *Array types* describe arrays with an unknown length. 
  Just like with records, all values share the same type.





In JS, values are classified into *primitive types* and *object types*.

Categories of primitives (JS/TS)
- scalar (simple) primitives
- boxed primitives
- compound primitives
- special primitives

Categories of object types (JS/TS)
- generic object type
  - exotic object type
- specialized object types
  - boxed primitives
  - function object types
  - array-like object types
  - collection object types
  - static object types
  - iterable object types
  - iterator object types
  - generator object types


Scalar primitives (JS/TS)
- `boolean`
- `number`
- `bigint`
- `string`
- `symbol`

Boxed primitives (JS/TS)
- `Boolean`
- `Number`
- `Bigint`
- `String`
- `Symbol`

Special primitives
- `undefined`
- `null`

Two special primitive values, `undefined` and `null`, are values in JS but singleton types in TS.


Compound primitives
- 


- generic object type
  - Object
- specialized object type
  - Function
  - Array
  - RegExp
  - 
