# TS :: Ref :: Types :: Object literal type

**Object literal types** mimic object literal values in their form, but on the type level. That is, an object literal type is a way to give type to an object.

Objects are collections of properties, and each property has a *property name* and *property value* (and values may be simple values or functions).

```ts
const Obj = {
  name: "obj",
  age: 12,
  flag: true,
  toString: () => `The ${this.name} is ${this.age} old`
}
```

The *property names* appear verbatim in the object's type as they appear in object literal value.

**Property names** appear unquoted if they are compatible with the identifiers, but they are actually strings, in most cases. In fact, JS accepts only `string` and `symbol` type as the type of property names, other types (number especially) may be given but they will be coerced to string.

TS allows us to annotate the type of pproperty names (aka keys or indecies) explicitly, and complains if the type is not `string`, `number` (coerced to string), `symbol`, or a *template literal type*. If the type does not conform to this, TS issues an error:

  An *index signature parameter type* must be `string`, `number` (coerced to string), `symbol`, or a *template literal type*.


An **index signature parameter** is actually the name given to the parameter which represents the keys; commonly, the names `index` or `keys` are used (I thought they were keywords, especially in this position - they are not).


Index signature:

```ts
type OLT = {

         key (prop names)             values (prop values)
  ┌────────────────┴────────┐   ┌────────────────┴─────────────┐

  [ index : string | symbol ] : string | number | (() => string)

    └─┬─┘   └──────┬──────┘     └──────────────┬───────────────┘
    index       key types                  value types
  signature   (as type union)             (as type union)
  parameter
    type
}
```


When an *index signature* is given it must be followed by a type annotation, specifying the types allowed for property values.

The types allowed for property values can be (1) listed as a type union (if you know them), or, (2) you may specify a type param instead.

```ts
type Obj = {
  /// Specify types for allowed keys (prop names) as type union
  /// Specify types for allowed values (prop values) as type union
  [index: string | symbol]: string | number | boolean | (() => string),
  name: string,
  age: number,
  flag: boolean,
  toString: () => string
}
```

(1) The types of property values given as a type union. Note that a function type must be parenthesized inside a union type.

```ts
type Obj<K, V> = {
  [index: string | symbol]: K,
}
```

(2) The types of property values given as a generic type parameter means that once that type param is instantiated it stays that way.


An *index signature parameter type* (i.e. type param `K`) cannot be a generic type or literal type:

```ts
type Obj<K, V> = {
  [keys: K]: V
}        ↑
// An INDEX SIGNATURE PARAMETER TYPE cannot be a literal type or generic type.
// Consider using a mapped object type instead.


// An INDEX SIGNATURE PARAMETER TYPE must be a string or symbol (although number is also accepted even though numbers are coerced to strings).
type Obj<K extends string | symbol | number, V> = {
  [keys: string | symbol | number]: V
  K: V
}
```
The above type is interpreted by TS as:
```ts
type Obj<K extends string | number | symbol, V> = {
  [keys: string]: V;
  [keys: number]: V;
  [keys: symbol]: V;
  K: V;
}
```
