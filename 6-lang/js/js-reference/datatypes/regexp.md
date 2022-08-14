# Regular Expression

- RegExp is an object specialized in regular expression operations on strings
- re uses patterns to match character combinations in strings.
- RegExp is a compound JS object with own literal syntax: `/.*/`
- re deal with RegExp object and strings, splitting re ethods between the two
- patterns are used with `exec` and `test` that are on `RegExp.prototype`
  - RegExp.prototype.exec()
  - RegExp.prototype.test()
- match, replace, search, split methods are on `String.prototype`:
  - String.prototype.match()
  - String.prototype.replace()
  - String.prototype.search()
  - String.prototype.split()



```js
"string".match(/.*/) ~= /.*/.exec("string")
```
