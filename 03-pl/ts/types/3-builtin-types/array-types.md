# TS :: Types :: Builtin types :: Array types

## Arrays

*JS arrays are heterogeneous collections of elements*. Not only that, but an array may be sparse, i.e. ridden with holes, since values need not be stored in order. Because of these characteristics, they are called "JS arrays" in order to emphasize the fact that these are nothing like arrays in other languages. While a JS array is homogeneous, it is backed up by an efficient data structure, but the moment it becomes heterogeneous or sparse, the underlying data structure must adapt in turn.

```js
// JS arrays
const arr1 = [1, 2, 3]         // homogeneous array
const arr2 = [true, "blue", 4] // heterogeneous array
const arr3 = [,, null,,, 9]    // sparse heterogeneous array
```


The *array type* (or, more precisely, the array type constructor `[]`) uses the same form as JS arrays; that is, the brackets are used in JS to enclose the elements (values) of an array, e.g. `[1, 2, 3]`, and TS reuses brackets to express the array type by placing the type name before a pair of empty brackets, e.g. `number[]`.



TypeScript tries to improve this loose situation by making a distinction between heterogeneous and homogeneous collections. In TS, arrays are intended only to hold homogeneous collections, while a new data structure, *tuple*, is added to handle heterogeneous collections of elements.

Type-wise, both array and tuple types employ brackets but in a different way. Since an array can now hold elements of the same type, `T`, its type is denoted by `T[]`, i.e. 


```ts
const arr1 = [1, 2, 3]         // homogeneous array
const arr2 = [true, "blue", 4] // heterogeneous array
```




inherited from JS, so the type of an array of strings is `string[]`.



```ts
// an array of strings
const aos: string[] = ["", "sabra", "cadabra"]
```


TS introduces **tuples**, which are like arrays that allow heterogeneous elements, but they are typed by the type of each element, which has the consequence that a tuple's size is also a part of the type, although implicitly.

So, a 2-tuple, aka a pair, may have the type `[string, number]`, which means a pair is like an array that must have exactly two elements, plus each element must be of the exact type as specified.

Although TS makes a difference between arrays and tuples, JS does not, so at the runtime there are only JS arrays around.

```ts
// tuples
const snpair: [string, number] = ["one", 1]

type Pair<A, B> = [A, B]
const pair: Pair<string, number> = ["one", 1]
```



dual syntactic form: it can be generically denoted by `T[]` or `Array<T>`, or concretely as, e.g. `number[]`, `Array<string>`.



The array type is not to be confused with tuple type, which uses the syntax that has bracks, but with tuple types, member types 1) are multiple, potentially heterogenous types, and 2) they appear within the brackets.

```ts
// array types
type T1 = Array<string>
type T2 = number[]

// vs tuple type
type Tuple1 = [string, number]
```



## Array of objects


## Object of arrays
