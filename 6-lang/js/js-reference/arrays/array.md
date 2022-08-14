# Arrays

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array

http://speakingjs.com/es5/ch18.html


- ES spec considers arrays as "exotic" objects
- arrays are also object, but with integer indices and length
- regular objects use keys (strings) but arrays use integer indices
- indices are positive integers with max value $$2^{31}-1$$


# JS Arrays

Arrays in JS are far removed from proper arrays (proper arrays are homogeneous, have fixed size hence they live in the stack); instead, a JS array is more of a dictionary that maps heterogeneous values to indices.

Arrays are specialized objects but nevertheless object, which means thay can have properties attached. These props do not belong with arrays' elements, they are not listed among them. Actually, all arrays have one property in common, i.e. `length`. Just like the `length` prop is not listed when you list an array's elements so are not other props. However, the `length` is a "magic"  prop since it is automatically updated as an array's size changes.

Regular objects are like maps - they map values to *keys* and the keys are Strings (or Symbols, since ES6). On the other hand, arrays are *indexed collections* as they map values to indices. However, not every integer is an index. To qualify as an index, an integer must be a positive integer in the range $$0 \leqslant i \leqslant 2^{31} - 1$$. When a value is mapped to such a proper index, it is considered an **element** of the array, otherwise it is a **property**.

It may happend that a value intended as an element becomes a property unintentionally if the index is not a positive integer or it is bigger than the max allowed. In such case, the integer does not become an index but a key, which means the number gets stringified.

Indices that are out of range are treated as normal property keys (strings!). They don’t show up as array elements and they don’t influence the property length.


The ECMAScript standard specifies arrays as maps (dictionaries) from indices to values. In other words, arrays may not be contiguous and can have holes in them. However, most JS engines optimize packed arrays (without holes) internally and store them contiguously.




There are two ways to use the constructor called `Array`:
- to create the empty array of the given length (single numeric arg)
- to create an array whose elements are the given values

A single numeric arg is interpreted as thenew array's length and its elements are all holes. Otherwise, in case multiple arguments are given, the new array is created with auto-index elements. The `Array` ctor may be invoked with or without the `new` keyword, it does the same think either way.


* A property key `P` (a string) is an array index if `ToString(ToUint32(P))` is equal to `P` and `ToUint32(P)` is not equal to `2^32−1`.
* An array property whose key is an array index is called an **element**.
* in the world of the spec all values in brackets are converted to strings and interpreted as property keys, even numbers.

* With all objects, there is no difference between `obj[123]` and `obj['123']`, because the (indexing) operator `[]` coerces its operand to string.
* The special property `length` tracks the highest index when you read it, and removes elements when written, `arr.length = 2` will shrink the array to len 2.



---

- arrays, like all objects, is always passed by reference
- array is initialized with the given elements, except in the case where a single argument is passed to the Array constructor and that argument is a number.
- arrayLength: If the only argument passed to the Array() constructor is an integer between 0 and 2**32-1(incl), this returns a new array with its length property set to that number (Note: this implies an array of arrayLength empty slots, not slots with actual undefined values). If the argument is any other number, a RangeError exception is thrown.
- Arrays cannot use strings as element indexes (as in an associative array), but must use integers. Setting or accessing via non-integers using bracket notation (or dot notation) will not set or retrieve an element from the array list itself, but will set or access a variable associated with that array's object property collection.



```js
//* Array constructor
var arr = new Array(1, 2, 3, 4); // [1,2,3,4]
// new is not necessary
var arr = Array(4, 5, 6); // [1,2,3,4]
// sets the length
var arr = new Array(4); // [<4 empty elements>]


//* Array literal
var arr = [11, 'hi', 3.14];


//* Arrays are always passed by reference:
var arr1 = [1, 2, 3];
var arr2 = arr1; // variables, arr1 and arr2, share a reference to the [1, 2, 3] value
arr2.push(4);
arr1; // [1,2,3,4]
arr2; // [1,2,3,4]
arr1 === arr2; // true


//* length
// only sets the length
var arr = new Array(4); // [<4 empty elements>]
arr[0] = 9;
arr[1] = 8;
arr[2] = 7;
arr[3] = 6;
arr[4] = 5;
arr[5] = 4;
arr.length; // 6

//* length: resetting length deletes elements
arr.length = 3;
arr.length; // 3, and the elements are gone
```
