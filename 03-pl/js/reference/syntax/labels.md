# Labels

JavaScript supports labeling statements and statement blocks.

The statement and the statement block are now associated with labels.

```js
// labelled statement
lbl1: console.log('labelled statement');

// labelled statement block
lbl2: {
  console.log('labelled')
  console.log('statement block')
  console.log('block')
};
```

This is almost always used to break out of the current loop that's nested inside a set of loops; instead of breaking all the way out, it enables marking a jump-to point of an enclosing loop.

Calling `break` in any of those points breaks out of the switch, to avoid running the other cases:

```js
for (let y = 0; y < 3; y++) {
  switch (y) {
    case 0:
      console.log(0)
      break
    case 1:
      console.log(1)
      break
    case 2:
      console.log(2)
      break
  }
}
// prints: 0 1 2
```

Break out of `for` when case 1 is reached:

```js
loop: for (let y = 0; y < 3; y++) {
  switch (y) {
    case 0:
      console.log(0)
      break
    case 1:
      console.log(1)
      break loop
    case 2:
      console.log(2)
      break
  }
}
// prints: 0 1
```
