# JS :: Index :: Data types :: Kinds of JS functions

https://bocoup.com/blog/the-many-faces-of-functions-in-javascript

## Kinds of functions in JS

- function
- named function
- anonymous function
- lambda
- closure
- arrow function, fat-arrow
- function object, FO
- callable object

- function signature
- function prototype
- function declaration
- function definition
- function implementation

- overriding functions
- overridden function
- bound function (using `Function#bind`)
- `this` in functions
- constructor functions
- `new` with function-statement-as-ctor: `new function fun(x) { return x }`
- classes
- partially applied functions
- curryied functions
- uncurryied functions

- function statement (FS) aka FD
- function declaration (FD) ak FS
- named function statement, (named) function statement
- function expression, FE
- function statement-expression
- IIFE (trivial concept: call FE immediately instead of binding it first)

- generators
  - generator function
  - generator object
  - generator function object

- asynchronous functions
  - async function
  - async generator function statement
  - async function expression

- function argument, farg
- function as value
- returned function, function as return value
- runtime function - created using `Function` ctor
- constructor function object (e.g. `Function`, `Object`)
- constructor, constructor function
- dynamically created function
- first-class function
- first-order function - cannot accept a farg (function arg)
- second-order function - can take a farg which itself does not take fargs
- higher-order function (HOF), (take/return fargs which take/return function)
- polymorphic function (all JS functions are polymorphic)



## Kinds of functions in JS (details)
- function statements
  - function statement
    - always a named function, `function fun(x) { return x }`
    - carves out a new scope
    - when a new code-line starts with the `function` keyword
  - generator function statement
    - always a named function, `function* fun(x) { yield x }`
  - async function statement 
    - always a named function, `async function fun(x) { yield x }`
  - async generator function statement 
    - always a named function, `async function * fun(x) { yield x }`

- function expressions
  - function expression (from function-statement)
    - turning a function statement into expression:
      - bind it to a variable
        - internally, now the function has two names
        - externally, it can only be referred by the variable's name, `f`.
        - internal name may be dropped, obtaining 
        - an *unnammed function statement expression*
      - turn it into an expression
        - prefix it with expression-introducers (`!`, `+`, `-`, …)
        - wrap it in parenthesis
  - function expression as arrow function
    - `const empty = () => {}`, empty arrow function
    - `const id = x => x`, identity arrow function
    - `const add2 = (x, y) => x + y`, addition arrow
    - `const add = x => y => x + y`, curryied addition arrow
    - `const su = (x) => { return x + 1 }`, unnecessarily verbose successor
    - `const suc = x => x + 1`, terse successor arrow
    - `const succ = add (1)`, point free successor
  - async arrow functions
    - `async (x) => x`



```js
// function statement
function fun(x) { return x }

// turning a function statement into an expression:

// binding it to a variable...
const f = function fun(x) { return x }
// internally, the function now has two names: `f` and `fun`.
// externally, it can only be referred to by the (variable) name `f`.
// implying that the internal name (fun) may be dropped.
const f = function (x) { return x }

// Binding a function statement to a variable is a sensible way to turn it into a function expression - these other ways (of turining a function statement into an expression) do nothing...

// prefix it with expression-introducer
!function fun(x) { return x }
-function fun(x) { return x }
+ function fun(x) { return x }
// preferraby, wrap it in parens
(function fun(x) { return x })

// ...unless immediately invoked:
!function fun(x) { return x }(42)  // 42
// parenthesized form (preferred)
(function fun(x) { return x })(42) // 42
// alt parenthesized form
(function fun(x) { return x }(42)) // 42

// `new` with function-statement-as-ctor (except with arrows)
new function fun(x) { return x }
let o = new function fun(x) { return x }
// instead of
function Ctor(x) { return x }
// or, (more commonly) used as object initializer
function Ctor(x, y) { this.x = x; this.y = y }
let ci = new Ctor(a, b)
```


## More examples

```js
// Function Declaration (FD). Classic. Has own this (unlike arrows). 
// Carves new scope. Can become a ctor if used with `new`.
function BindingIdentifier() {}

// Named Function Expression (named-function-as-expression NFAE)
// BindingIdentifier is not accessible outside of this function
// function is hoisted - BindingIdentifier is registered in the symbols table
// along with the function's body as its value - unlike var declared variables
(function BindingIdentifier() {})

// Anonymous Function Expression
(function() {})


// Function Declaration (FD) may be used as a constructor function:
//
// Normally, constructor functions initialize thier instance objects;
// they need not return anything explicitly - new object instance is initialized and returned automativally (return statement is implicit):
function Ctor(a, b) { this.x = a, this.y = b }
let ob = new Ctor('abc', 42)
//
// However, we can make it a one-liner:
let ob = new function Ctor(a, b) { this.x = a, this.y = b } ('abc', 42)


// Self-rewritting function
function rewritesItself(x) {
  if (typeof x !== undefined) {
    rewritesItself = function replaceWith() {
      return 'Replacement!'
    }
  }
  return 'Original!'
}


function rewrites(x) {
  if (typeof x !== undefined) {
    function rewrites(x) {
      return x ? 'Replacement!' : 'Original!'
    }
  }
  return rewrites
}



// inner is hoisted but in the enclosing scope
function rewrites(x) {
  function rewrites() {
    return x ? 'Replacement!' : 'Original!'
  }
}


// does inner breaks out and hoists? No, arrow prevails!
var wrap = (x) => {
  function rev() {
    return x ? 'Replacement!' : 'Original!'
  }
}

// Not without 'return'
var james = function james(x) {
  james.iq = Symbol("tatoo")
  function james() {
    return x ? 'Replacement!' : 'Original!'
  }
}

// Now the inner function is set free
var james = function james(x) {
  james.iq = Symbol("tatoo") // inner james is tattooed, not outer
  function james(a,b,c,d,e) {
    return x ? 'Replacement!' : 'Original!'
  }
  return james
}
james.length   // 1
james().length // 5
james.iq
```
