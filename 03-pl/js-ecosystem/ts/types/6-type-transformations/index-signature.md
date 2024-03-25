# TS :: Types :: Index Signatures

An **index signature** can be used inside an object type to restrict the types of *property names (keys)* and *property values*.

```ts
interface ObjSig {
  [key: string | symbol | number]: unknown
}
// or
type ObjSig = {
  [key: string | symbol | number]: unknown
}

type Attention = {
  // index signature
  [key: string | symbol | number]: unknown,
  // tuple
  tup1: [string, number, null | undefined],
  // tuple with a named field which holds a union
  tup2: [key: string | number],
  // tuple with named fields
  tup3: [fst: string, snd: number],
}
```



when creating an object but you don't know the exact names of the keys, although you know their types (general shape of the object).

You can declare the types of an object's keys (property names types). In JS, keys are usually identifier-compatible strings or simbols - if they are some other primitive, they are coerced to string.



There could come a time where we wouldn't know what the names of keys are at the time we create an interface, and that's where an index signature can come in handy.

Also, TypeScript requires an index signature to access an object property dynamically.

```ts
interface TransactionObj {
  Pizza: number,            // the type of value of key 'Pizza' is number
  Books: number,            // but what is the type of the key? (e.g. 'Book')
}

interface TransactionObj {
  readonly [index: string]: number // index sig
  Pizza: number,
  Books: number,
  Job: number
}

interface Student {
  [key: string | number ]: string | number | number[] | undefined
  name: string,
  4: number,
  classes?: number[]
}

const todaysTransactions: TransactionObj = {
  Pizza: -10,
  Books: -5,
  Job: 50,
}

// ==========================================================================
interface Student {
  name: string,
  GPA: number,
  classes?: number[]
}
const student: Student = {
  name: "Doug",
  GPA: 3.5,
  classes: [100, 200]
}
for (const key in student) {
  console.log(`${key}: ${student[key as keyof Student]}`)
}

Object.keys(student).map(key => {
  // if we dont know the type of student var we can use typeof to get it
  console.log(student[key as keyof typeof student])
})

const logStudentKey = (student: Student, key: keyof Student): void => {
  console.log(`Student ${key}: ${student[key]}`)
}
logStudentKey(student, 'name')
```

The `keyof` keyword creates a union type of index types. In this particular case it's the union type `string | number | number[]`, inferred from the interface `Student`.
