# JS Array

## Array

`Array()` constructor

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/Array


```js
// array literal
[element0, element1, ..., elementN]

// Array ctor
[new] Array(element0, element1[, ...[, elementN]])

// Array ctor: special case when arg is a single int
[new] Array(arrayLength)
```

## from

Array.from()

Array.from(arrayLike [, mapFn [, thisArg]])

## isArray

Array.isArray()

## of
Array.of()

Array.of(element0[, element1[, ...[, elementN]]])


## entries

Array.prototype.entries()       
Array.prototype.keys()
Array.prototype.values()


## copy

Array.prototype.copyWithin()    
Array.prototype.fill()

## mutate

Array.prototype.pop()

Array.prototype.push()
arr.push(element1[, ...[, elementN]]) ~~> new_length

Array.prototype.shift()
Array.prototype.unshift()

## find
Array.prototype.find()
Array.prototype.findIndex()

## FP

Array.prototype.every()         all
Array.prototype.some()          some
Array.prototype.map()           map
Array.prototype.filter()        filter
Array.prototype.reduce()        foldl
Array.prototype.reduceRight()   foldr
Array.prototype.reverse()       reverse
Array.prototype.includes()      elem


## concat
Array.prototype.concat()
const new_array = old_array.concat([value1[, value2[, ...[, valueN]]]])

```js
[4,5,8,9].concat(55, [77,88]) // [4, 5, 8, 9, 55, 77, 88]
```

## 
Array.prototype.flat()
Array.prototype.flatMap()       


Array.prototype.forEach()
Array.prototype.indexOf()
Array.prototype.lastIndexOf()
Array.prototype.join()
Array.prototype.sort()

Array.prototype.slice()
Array.prototype.splice()

Array.prototype.toString()
Array.prototype.toLocaleString()
Array.prototype.toSource()

Array.prototype[@@iterator]()


get Array[@@species]
The species accessor property returns the default constructor for Array objects. Subclass constructors may override it to change the constructor assignment.
