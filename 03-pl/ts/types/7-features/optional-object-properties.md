# TS :: Ref :: Types :: Optional object properties

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
