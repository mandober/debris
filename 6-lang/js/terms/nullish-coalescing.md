# Nullish Coalescing Operator

- name: nullish coalescing operator, NCO
- symbol: `??`
- arity: binary
- precedence: 7 (low)
- nullish := `null` or `undefined`

The nullish coalescing operator selects the first variable if it is defined, 
i.e. *non-null* and *non-undefined*, from a pair, otherwise it returns the last one (whatever it may be, defined or not):

```js
let a
let b = false
console.log(a ?? b) // false
```

**WARNING**: watch out if you have the same undeclared variable on both sides; although in this regard NCO behaves just like `||` and `&&`.

```js
let y = y ?? 6      //: ReferenceError: y is not defined
const z = z ?? 7    //: ReferenceError: z is not defined

// either declare it first, or use var to hoist it:
var x = x ?? 5      // 5

let y
y = y ?? 6          // 6

// in console:
var qq = qq ?? 44
//: undefined
// the expr evaluates to undefined, but qq was assigned 44

let ww
//: undefined
ww = ww ?? 33
//: 33
// now it evaluates to 33
```


It is **not allowed** to use it with `||` or `&&` without explicit parentheses.

```js
let x = 1 && 2 ?? 3   // error
let x = (1 || 2) ?? 3 // ok
```
