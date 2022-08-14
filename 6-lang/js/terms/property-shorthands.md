# Property shorthands

Object members:
* Properties:
  - object field == object attribute ?
  - static object field == class attributes ?
* Getters and setters
  - getter (field accessor method)
  - setter (field mutator method)
* Object methods
  - object function/method
  - static method

Do *object members* mean
- object fields (object attributes)
- object properties (accessor methods for fields)
- object methods (object behavior)

---


Property shorthands:
- object method shorthand
- object property shorthand

```js
const value = 42

const atom = {
  // object property
  value: value,
  
  // object method
  addValue: function (value) {
    return atom.value + value
  },
}


const atom = {
  // object property shorthand
  value,

  // object method shorthand
  addValue(value) {
    return atom.value + value;
  },
}
```
