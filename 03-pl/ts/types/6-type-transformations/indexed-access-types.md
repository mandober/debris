# TS :: Ref :: Types :: Indexed Access Types

https://www.typescriptlang.org/docs/handbook/2/indexed-access-types.html

*Indexed access type* is the method for referring to a type that is a member of an *object literal type* (type of an object literal's property).

The syntax is similar to the property access syntax on literal objects values, except the dot access cannot be used, *only bracketed or indexed access*.

We can use an **indexed access type** to look up a specific property on another type:

```ts
type Person = {
  age: number,
  name: string,
  alive: boolean,
}

// indexed access type:
type Age = Person["age"]
///  Age = number
```

The *indexing type* is itself a type, so it can be used in unions, with `keyof` type operator, etc., or even another type used as a type variable in what looks like to mimic the "computed property access".

```ts
// indexing type is a union type
type I1 = Person["age" | "name"]
///  I1 = string | number


// indexing type with keyof
type I2 = Person[keyof Person]
///  I2 = string | number | boolean


type AliveOrName = "alive" | "name"
// indexing type as a "computed property access"
type I3 = Person[AliveOrName]
///  I3 = string | boolean


/// error if indexing type is a non-existing property
type I1 = Person["alve"]
```



Another example of **indexing with arbitrary types** is using `number` as the indexing type to get the type of the array's elements. 

```ts
type Elems = typeof Arr[number]

type Elems = typeof Arr[number]["prop"]
```

Here, to get the type of the array's (array of objects) elements. Combining such access with `typeof`, we can conveniently capture the *element type* of an *array literal*:

```ts
const MyArray = [
  { name: "Ali", age: 15 },
  { name: "Bob", age: 23 },
  { name: "Eve", age: 38 },
]

type Person = typeof MyArray[number]
///  Person = {
///    name: string;
///    age: number;
///  }

type Age = typeof MyArray[number]["age"]
///  Age = number

/* Or */
type Age2 = Person["age"]
///  Age2 = number
```
