# Basic Types

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




`object` represents non-primitive types.


```ts
// enumeration
enum Color {
  Gray,           // 0
  Red,            // 1
  Green = 100,    // 100
  Blue,           // 101
  Yellow = 2      // 2
}

const myColor: Color = Color.Green
console.log(myColor) // 100

// typing a function
const f = (x: boolean) : boolean => x
const add = (x: number, y: number) : number => x + y


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
