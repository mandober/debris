# Strict mode

- strict mode is opt-in for scripts, but enforced in ES modules
- scoped to the file- and function-level (fn-level recommended)
- `'use strict;'` declaration must appear at the top of the file or fn body
- fn using default params cannot be in strict mode (throw exception)
- merging strict and sloppy mode files may result in unexpected mode
- tip: leave files in sloppy mode, but put functions into strict

Strict mode advantages:
- cannot accidentally create globals (e.g. inside functions)
- assignments, that would before silently fail, throw
- attempts to delete an undeletable property throw (before no effect)
- enforces unique names for function parameters
- forbids syntax for octal literals
- forbids setting properties on primitive values
- prohibits `with` statement
- inside functions, `this` defaults to `undefined` (not `window`)
- strict mode `eval` doesn't introduce new variables into scope
- disallows `arguments.callee`


```js
a = 10;                  // creates global var
function f() { b = 5; }  // creates global var (without var/let/const)
```


## Links and reference

- [ECMA-262-5: Strict Mode](http://dmitrysoshnikov.com/ecmascript/es5-chapter-2-strict-mode/)
- [Strict Mode Compatibility Table](http://kangax.github.io/compat-table/es5/#Strict_mode)
- [MDN: Strict Mode](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Strict_mode)
- [MDN: Transitioning to Strict Mode](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Strict_mode/Transitioning_to_strict_mode)
- [John Resig: ECMAScript 5 Strict Mode](http://ejohn.org/blog/ecmascript-5-strict-mode-json-and-more/)
