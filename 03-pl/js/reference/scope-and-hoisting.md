# Scope and hoisting

https://www.freecodecamp.org/news/execution-context-how-javascript-works-behind-the-scenes/

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/arguments

## Variables

- namespace
  - single name-space: names of variables, functions, classes
- r-value
  - by value (stack)
  - by reference (by value, except value is a memory address), heap
- l-value
- assignment (`x = y`, `x += y`, `x *= y`, `x++`, `--x`)



Variables
- Properties of variables
  - *identifier (name)*: `var`, `let`, `const`, `function`, `class`
    - `label` is a name (identifier), not a variable. A lebel names a particular spot in the code (e.g. `here:`). Flow control within a loop can then jump out of the loop to the place named by the label (`break here`), accomplishing similar effect as the GOTO command.
  - *type* (type of value it can store)
  - *kind*
    - data variable
    - function variable (= function name)
    - class variable (= class name)
  - *mutability*
    - constant (immutable) variable: declared with `const`
    - mutable variables are declared with `var`, `let`, `function`, `class`
  - *binding*
    - extent or liveliness (is in scope)
      - bound variable
      - unbound (free) variable
    - binder
    - binding site
    - binding occurence
    - application occurence
    - *occurences*
      - binding occurence
      - application occurence
  - *definedness*
    - declaration
    - initialization
    - definition (declared + initialized)
      - `const`, `function`, `class` are defined (declared + initialized at once)
      - `var`, `let` variables can be first declared, then initialized later; when declared they are initialized to `undefined`.

- Variable introduction
  - declaration
    - keywords: `var`, `let`, `const`, `function`, `class`
  - initialization
  - definition (declared + initialized)
  - *hoisting*
    - `var` and `function` variables are hoisted
    - `var` declaration only is hoisted
    - `function` is completely hoisted (entire function definition)
    - `function` is hoisted higher than `var`
  - variable shadowing
    - variable in a nested scope shadows the same-named variable from an enclosing scope.



### Properties of variables

- identifier (name)
- type
- bound vs unbound (free)
- occurences:
  - binding occurence
  - application occurence


*Variables* are identified by a name, which is called an *identifier*. The form of identifiers is constrained and must follow a particular naming scheme.

Besides a name (identifier), another important property of variables is *type*. Even though in JS variables can change their type, at any one time a variable has a specific type.

Variables also have other properties, which are in JS of less importance.

Given an (sub)expression (piece of code), a variable can appear *bound* or *unbound (free)*. A variable is said to be *free* in that expression if its *binder* is not in the scope. If we keep expanding the considered expression, its *binding site* is bound to appear. If we take the entire JS module into consideration and its binding site is still not included, then that variable will cause a reference error when the program runs; the compiler will issue an error like `"Uncaught ReferenceError: x is not defined"`, where `x` is an unbound variable.



Taking into consideration a larger piece of the currect expression, 



function's body 

In JS, this pertains mostly to functions: given a function definition, 


function is the only 
an expression relavant to the bound and unbound occurences of a variable


In a function definition, a variable has one *binding occurrence* and any number of *application occurrences*. A variable with a binding occurence is called a *formal parameter*. The same variable can then be used any number of times within the function's body - these are its *application occurences*. 

Given a function, a variable that has a binding occurence and application occurences is called a **parameter**.


A variable has a binding occurence - it is declared as a formal parameter of the function in the function's head. Then, in the function's body, that variable can have any number of application occurences.




. For example, parameters in a function definition




Identifiers are names of variables.

Besides variables that bind values (e.g. `var x = …`), function and class names are also variables identifiers

Variables are declared using these keywords: `var`, `let`, `const`, `function` and `class`.

## Hoisting

function statements

When a JS file is parsed, the first pass is done over each scope, and *function statements* (`function work(a, b) { … }`) are immediately discovered.

When a function is declared like this, with a name, that name becomes available to the entire scope when the code in that scope is executed.

A crude timeline of how JS gets executed:
- Parse the scope and detect all function definitions
- Execute the code top-to-bottom with all functions found in step 1 available as variables

This behavior is called 'hoisting' because it is almost like the function definitions have been 'hoisted' up to the top of the function.


Assignments are not evaluated until the code is executed.

An example of an assignment is var foo = function() {} or var foo = function foo() {}. A function must not be associated with an assignment in order for it to be hoisted (see example L)

Wrapping a function in parenthesis (()) is a quick way to convert a function definition into a function expression, which means it does not get hoisted (similar to assigning the function to a variable). I personally do not use this pattern regularly as I find it overly confusing to newbies etc, but I have included it because it is widely used in e.g. jQuery plugins.

I use hoisting as a code organization tool, for example here I rely on hoisting to make parseStream() available on line 20, even though it is defined on line 41, which I think makes that file more readable as I can put the 'meat' of the function at the top.


## Examples

```js
// A (works)
function sayHi() {
  console.log('hi!')
}
sayHi()
b.js

// B (works)
sayHi()
function sayHi() {
  console.log('hi!')
}
c.js

// C (works)
var sayHi = function() {
  console.log('hi!')
}
sayHi()
d.js

// D (does not work)
sayHi()
var sayHi = function() {
  console.log('hi!')
}
e.js

// E (does not work)
(function sayHi() {
  console.log('hi!')
})
sayHi()
f.js

// F (does not work)
sayHi()
(function sayHi() {
  console.log('hi!')
})
g.js

// G (works)
(function sayHi() {
  console.log('hi!')
})()
h.js

// H (works)
(function() {
  console.log('hi!')
})()
i.js

// I (works)
var sayHi = (function() {
  console.log('hi!')
})()
j.js

// J (works)
var sayHi = (function() {
  console.log('hi!')
})
sayHi()
k.js

// K (does not work) 
sayHi()
var sayHi = (function() {
  console.log('hi!')
})
l.js

// L (does not work)
sayHi()
var x = function sayHi() {
  console.log('hi!')
}
m.js

// M
var x = (function sayHi() {
  console.log('hi!')
})
x()     // works
sayHi() // does not work
```
