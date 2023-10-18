# JS :: Ref :: Operators precedence

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Operator_precedence

Operator precedence determines how operators are parsed concerning each other. Operators with higher precedence become the operands of operators with lower precedence.

Operators of the same precedence are grouped by associativity.
- left-associativity: `(a OP1 b) OP2 c`
- right-associativity: `a OP1 (b OP2 c)`

*Assignment operators* are right-associative.

```js
block: {
  let a = b = 5     // undefined, a = 5,  b = 5
  a = b += 5        // 10,        a = 10, b = 10
  a += b += 5       // 25,         a = 25, b = 15
  --a + ++b         // 40,         a = 24, b = 16
  ++a + --b         // 40,         a = 25, b = 15
}
```



```js
let x = a = b = 5

const run = () => {
  block: {
    x = (x === 0) ? 1 : 0
    console.info('x:', x)

    a = b += 5
    console.log('a:', a, 'b:', b)

    if (x === 0) {
      console.info('if x', x)
      break block
    }
    console.info('final x:', x)
  }
}

```
