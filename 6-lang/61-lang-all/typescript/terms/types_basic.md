# Basic Types

Scalars, `α`
- `boolean`
- `number`
- `string`
- `symbol`
- `bigint`, suffix `n`

Object types:
- `object`
- Function

Compound
- arrays: `α[]`
- tuples: `[α,β,υ]`

`void` types:
- `undefined`
- `null`

Special:
- `any`


```ts
// basic
const myName: string = 'Robert'
const myAge: number = 24
const bHasHobbies: boolean = true;

let empty: void = undefined;
let nil: void = null;


// arrays
const hobbies: string[] = ['Programming', 'Cooking']
const fs: Array<Function> = [x => x+3, x => x+10]

// tuples
const address: [string, number] = ["Street", 99]

// any
let myCar: any = 'BMW'
```

`void` type is usually the return type of effectful functions. Otherwise, declaring variables of type `void` is not very useful because you can only assign `undefined` or `null` to them.

`any` means we want to opt-out of type-checking and let the values pass through compile-time checks.

`enum` is a way of naming numbers. By default, numbering starts at 0. You can change this by manually setting the value of a member.

`object` represents non-primitive types.


```ts
enum Color {
    Gray,           // 0
    Red,            // 1
    Green = 100,    // 100
    Blue,           // 101
    Yellow = 2      // 2
}
const myColor: Color = Color.Green
console.log(myColor) // 100


// typing an object
let userData: {
    name: string,
    age: number,
} = {
    name: 'Max',
    age: 27,
}

let complex: {
    data: number[],
    output: (all: boolean) => number[]
} = {
    data: [100, 3,99, 10],
    output: function(all: boolean): number[] {
        return this.data
    }
}
// complex = {} // type error
```


## Optional object properties

All newly declared object properties, function parameters and interface properties may be declared optional by placing a `?` after the name.

```ts
const right: { name: string, age?: number } = {
    name: 'Robert'
};
```

The type of an optional property is not `number | undefined | null` but it is still `number` and it won't accept other types unless explicitly typed. This is a bit of a grey area because the compiler will run in the case where an optional property is not optional but `undefined` or `null`.

An example that leads to an error on runtime:

```ts
const nullCompiles: { name: string, age: number } = {
    name: 'Robert',
    age: null
};

const undefinedCompiles: { name: string, age: number } = {
    name: 'Robert',
    age: undefined
};

console.log('nullCompiles', nullCompiles);
console.log('undefinedCompiles', undefinedCompiles);
const undefinedAge = undefinedCompiles.age.toString(); // crash
```

The reason this gets compiled successfully may be because the compiler assumes `age` can only be of type `number` (?!), so you better be explicit about the types.


## Type aliases

```ts
// type alias
type Complex = { data: number[], output: (all: boolean) => number[] };
// usage
let complex2: Complex = {/* .. */}
```
