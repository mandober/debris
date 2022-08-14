# Loops

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Loops_and_iteration

Looping statements
- `while`
    - `do...while`
    - label
    - `break`
    - `continue`
- `for`
    - `for...in`
    - `for...of`

## if

- *if...else* statement is used to defines deferent **execution paths**
- *if* expression (e.g. as ternary exp) defines different **evaluation paths**


## while

- *while*: `while (condition) { statements }`
- *do...while*: `do { statements } while (condition);`


## for

*for...in*
- iterates over all enumerable obj props, incl. inherited enum.props
- can be used with arrays, strings, plain objects (but not with `Map`, `Set`)

*for...of*
- iterates over iterable obj by iterating over values, rather then props
- can be used with arrays, strings, Map, Set (but not with plain objects)

*for each...in*
DEPRECATED. use `for...of` instead.



```js
for ([initExpr]; [cond]; [incExpr])
  statement

do
  statement
while (cond);

while (cond)
  statement

label:
  statement

```
