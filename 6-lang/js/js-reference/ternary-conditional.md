# Ternary Conditional

Ternary conditional is an expression, unlike the `if...else` statement, which makes it good for use in arrow functions.

```js
// synopsys
let a = b === 0 ? c : d;

const arrow = a => (b, r = 5) => 
  a === 0 
    ? a > 0
      ? a + b
      : a <= 0
        ? (r = a - b)
        : 0
```
