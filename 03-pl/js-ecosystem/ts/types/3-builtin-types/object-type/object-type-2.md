# Object types

https://www.typescriptlang.org/docs/handbook/2/objects.html

## TOC
- Introduction
- property modifiers
- optional properties
- readonly properties
- index signatures
- excess property checks
- extending types
- intersection types
- interfaces vs intersections
- generic object types
- the array type
- the readonlyarray type
- tuple types
- readonly tuple types


## Introduction

JS objects (object values) are assigned *object types* in TS.

Object types can be
- anonymous: inline type annotations
- named via `interface`
- named via `type`

In all 3 examples below, the functions take objects that must contain the property `name: string` and `age: number`.


* Object types can be anonymous

```ts
function greet(person: { name: string; age: number }) {
  return "Hello " + person.name
}
```

* Object types can be named via `interface`

```ts
interface Person {
  name: string;
  age: number;
}
 
function greet(person: Person) {
  return "Hello " + person.name
}
```

* Object types can be named via `type`

```ts
type Person = {
  name: string;
  age: number;
};

function greet(person: Person) {
  return "Hello " + person.name
}
```

## Object types

JS objects can be specified as liters (as values). Below, for example, `someObj` is a JS object specified as literal. It can be typed using the inlined type annotations, i.e. using an *object literal type*, like `someObj1`. Or, we can define a standalone named object type `someType`, and assign it to the `someObj` as `someObj: someType`.

```ts
// object literal value
const someObj = {
  a: "foo",
  b: { bar: "baz" },
  c: 42,
}

// object with inline literal types
const someObj1: {
  a: "foo",
  b: { bar: "baz" },
  c: 42,
} = {
  a: "foo",
  b: { bar: "baz" },
  c: 42,
}

// standalone named object type
type someType = {
  a: "foo",
  b: { bar: "baz" },
  c: 42,
}

// attaching a object type to an object value
const someObj2: someType = {
  a: "foo",
  b: { bar: "baz" },
  c: 42,
}

// attaching a object type to an object value
type someObjBroad = {
  a: string,
  b: { bar: string },
  c: number,
}
```

Above, the types of the object's properties are as specific as they could be, all being type literals; when we compare `someObj` and `someType`, they appear identical save for the declaration keyword (`const` vs `type`). We can also type the properties of the `someObj` using more broad types, assigning `string` to the properties `a` and `bar`, and `number` to `c`, i.e. we can type `someObj` using the type `someObjBroad`.

## Reading properties off object types

A property is a key-value pair. In the case of objects (both object values and obect types) *keys* can have the type expressed as a union type, `string | symbol | number` (numbers are coerced to satrings but `number` nevertheless appears as a valid type for keys). This fact can be expressed in an object type using *index signatures*:

```ts
const Obj<T> = {
  [key: string | symbol | number]: T
}
```

Properties can be of any type.
- Values of properties of an *object value* are *JS values*.
- Values of properties of an *object type* are *TS types*.

In JS, we can use both the dot syntax and bracket syntax to access the value of a property of an object value; but to access the value of a property of an object type, only the *bracket syntax* is valid.

```ts
type User = {
  name: string,
  age: number,
  isAdmin: boolean,
}

// accessing a propery (value) of an object type
type Name = User["name"]
//   Name = string
// User.name DOES NOT WORK


type ValueOf<T> = T[keyof T]

type UserValue = ValueOf<User>
//   UserValue = string | number | boolean
```

However, when we use the bracket syntax to access a property of an *object value*, the so-called *index* (the value inside the brackets), must be a string (since keys basically have the `string` type; and symbol).

And when we use the bracket syntax to access a property of an *object type*, the index must be a type: *we are indexing an object type by a type*.

An object type `T` is indexed by a type `K`, as `T[K]`, where `K extends keyof T`.

```ts
T[keyof T]
```

Whatever properties (keys) are matched by that index type, their corresponding types (property values) are returned. But the *indexing type* need not be a simple type, we can also use e.g. union types.

>Using a union type as an indexing type returns the union of all the matching properties (keys).

>Using `keyof` *on an object (value)* returns the union of all the object's properties (keys).


```ts
type User = {
  name: string,
  age: number,
  isAdmin: boolean,
}

// Using a union type as an indexing type returns
// the union of all the matching properties (keys).
type NameOrAge = User["age" | "name"]
//   ^ string | number

// Using keyof on an object (value) returns
// the union of all the object's properties (keys).
type UserKeys = keyof User
//   ^ "name" | "age" | "isAdmin"

type UserValues = User[UserKeys]
//   ^ string | number | boolean

// identities:
User[keyof User]
keyof User = User[UserKeys]
// both sides are: string | number | boolean
```
