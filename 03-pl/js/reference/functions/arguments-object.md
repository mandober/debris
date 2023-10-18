# arguments object

`arguments` is an internal object that each function statement or function expression (those function introduced with the `function` keyword) has available. It is auto-populated with thte values of all arguments, as they were at the corresponding call site, which might include the extra arguments that were not bound to any formal parameters of a function.

`arguments` is a so-called *arrray-like object* because its keys are numeric strings (e.g. "0", "1"). Many DOM objects are arrray-like.

To convert an arrray-like object into a proper array the `length` property must be added that corresponds to the number of actual elements; then it may be converted using `Array.from(arguments)`.


```js
function args(a, b) {
    console.log(Array.from(arguments));
    return arguments;
}

var a = args(2, 3);
//=> { '0':2, '1':3 }

Reflect.ownKeys(a);
//=> ["0", "1", "length", "callee", Symbol(Symbol.iterator)]


var o = { 0: 2, 1: 3, length: 2 };
o = Array.from(o);
Reflect.ownKeys(o);
```


If the `length` property is not present, the resulting array is empty, as if `length = 0` was set:

```js
var d = { '0': 2, '1': 3};
d = Array.from(d); 
Reflect.ownKeys(d); 


// additional string prop names would be 
// discarded as array keys, but not as props
var u = { 0: 2, 1: 3, prop: "abc", length: 2 };
u = Array.from(u); 
Reflect.ownKeys(u); 
```



## Arguments and arrow fn

Instead of being bound when the function is invoked, an arrow function acquires the bindings for `this` and `arguments` from its enclosing scope (just like any other free variable).

```js
// function expressions
(function () {
    return (function () { return arguments[0]; })('inner');
})('outer');
//=> "inner"

// fat arrow:
(function () {
    return (() => arguments[0])('inner');
})('outer'); 
//=> "outer"



// this function takes a number and returns an array representing a row in a hypothetical multiplication table.
const row = function () {
    return mapWith(
        (column) => column * arguments[0],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
    )
};
row(3);
//=> [3,6,9,12,15,18,21,24,27,30,33,36]

// This works just fine, because arguments[0] refers to the 3 we passed to the function row. Our “fat arrow” function (column) => column * arguments[0] doesn’t bind arguments when it’s invoked.But if we rewrite row to use the function keyword, it stops working:
const row2 = function () {
    return mapWith(
        function (column) { return column * arguments[0] },
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
    )
};
row2(3);
//=> [1,4,9,16,25,36,49,64,81,100,121,144]
