# JS :: Concepts :: CPS

## Naive Fibbonaci in direct style

Naive implementation of Fibbonaci function is straightforward:

```js
// fix = 0 1       5
//   n = 0 1 2 3 4 5 6  7  8  9
// F n = 0 1 1 2 3 5 8 13 21 34

const fibNaive = n =>
    n <= 0n ? 0n
  : n <= 2n ? 1n
  : fibNaive (n - 1n) + fibNaive (n - 2n)

console.log('fibNaive(5n):', fibNaive(5n))
```

We are using bigints so all numbers must have 'n' suffix.

The naive implementation works fine until it doesn't, which is when the input gets large enough causing the stack to blow up.

Computing `fibNaive(40)` takes about `4s` to get the result, `102,334,155`, but the stack remain fine (computation done in Node.js v.20.5).

## Direct style of programming

In the **direct style** of programming, when a function is called, it uses the `return` statement to yield control back to the caller, possibly passing back some result as well.

In JS, functions always return something - if the return value is not specified explicitly, it will be the `undefined` value. So, the `undefined` value is returned to the called if the `return` statement is elided or if it is not followed by a value.

Determining the return value is usually obvious, but it needs consideration when the substantial branching is involved. The conditional statement `if…else` always has the form `if…else`, even when the `else` part is not explicitly specified. In JS, `if…else` is a statement and the `else` part is optional, but in FPLs not only it is an expression `if…then…else` but also the scrutinee must be a Boolean value and both braches must return a value of the same type. This means that in FPLs (like Haskell) the `if…then…else` is not a special language construct but it is user-implementable as a function.


```js
// function statements
function statement1() {}                   // returns undefined
function statement2() { return }           // returns undefined
function statement3() { return undefined } // returns undefined
function statement4() { return void 0 }    // returns undefined
function statement5(x) { if (x) { return } else { return } }
function statement6(x) { if (x) return; else return }
function statement7(x) { if (x) return }
```

The operator `void` explicitly cases any value to `undefined`.


```js
const exp = expression = () => {}         // returns undefined
const exp = expression = () => ()         // returns undefined
const exp = expression = () => { return } // returns undefined
```

Function expressions have an implicit return in that the last expressions is automatically returned; that is, as long as a function expression remain an expression - if the function's body is wrapped in a block then it becomes a statement and needs an explicit `return` statement.


## Tail-call recursion

https://v8.dev/blog/modern-javascript
https://2ality.com/2015/06/tail-call-optimization.html
https://github.com/tc39/proposal-ptc-syntax
https://stackoverflow.com/questions/23260390/
https://stackoverflow.com/questions/42788139/

* Tail Calls for Wasm (Andreas Rossberg, Wasm CG meeting 2017/07))
https://github.com/WebAssembly/meetings/blob/main/main/2017/CG-07.md#tail-call


A naive implementation of the Fib function risks to blow out the stack in any language that is not expecting and thus optimizes such recursive calls. To make the job a tad easier to the compiler, a recursive function liek Fib can be rewritten so it uses tail-call recursion.

In a *tail-call recursion*, any recursive call is set up in such a way that all information is passed with it, i.e. there is no extraneous operation left to perform on the returned value when the stack unwinds.

In the naive implementation of `fib`, we are leaving every stack frame with unfinished computation: the line `fibNaive (n - 1n) + fibNaive (n - 2n)` shows that both recursive calls go out - but they both need to return (which they will when each recursive branch hits the base case) in order for the `+` operator to do its thing. Each recursive call creates a new stack frame, and they are spawned exponentially, so they generate a huge number of stack frames quickly, which risks extending over the assigned stack's capacity, aka, overflowing the stack.

## Stack size

As a ballpark value, the size of the stack is 1-10 MB. Every thread gets own stack. Even if we don't know the size of stack in megabytes, we can measure the allowed number of recursive calls before the JS engine throws an exception.

```js
let i = 0
const inc = () => (i++, inc())
try {
  inc()
} catch(e) {
  console.log(`The current browser allows ${i} recursive calls`)
  console.log(e)
}
```

Chrome v.116.0.5845.96 (64-bit) allows 13,918 calls, Node.js v.20.5 allows 13,897 calls, and Deno v.1.36.1 allows 14,172 calls. They are all based on the same V8 engine v.8 11.6.189.12.

The routine above only measures the plain function calls - the called function has no parameters nor local variables (maybe the limit would change if it did?).




## Continuation-passing style of programming

In the continuation-passing style (CPS), we specify - as an extra argument called *continuation* - what the function should do with the value it was gonna return to the caller.

Note: *returning* is not so much about a callee returing a value back to the caller as much as it is about returning control, also called *yielding*, back to the caller.

The key is that we can apply this mechanism to make a recursive call into a tail
call because all of the code that comes after will be provided in the recursive call itself.



Introducing an accumulator(s) in a function with multiple recursive branches (like `fib`) turns out to be more complex than introducing continuations.


## Implementing a lazy computation in JS

When sufficiently nausiated of imperatives, bulk in the glory of laziness:

```hs
fib :: [Integer]
fib = 0 : 1 : [ x + y | (x, y) <- zip fib (tail fib) ]
```

Can we get close to this in JS, i.e. besides prone to be uncomfortable fo sho, how would laziness even be implemented in JS. Using thunks, of course, how else.
