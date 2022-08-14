# Agda :: Compilation

Agda has several backends for compilation:
- JS for js code
- GHC for Haskell code
- Alonzo compiler for Haskell code

The directives `{-# COMPILE JS … #-}` are for specifying some aspect of comilation into JS. For example, the Boolean module has these pragmas:

```hs agda
{-# COMPILE JS Bool =
  function (x,v) { return ((x)? v["true"]() : v["false"]()); }
  #-}
{-# COMPILE JS false = false #-}
{-# COMPILE JS true  = true  #-}
```

Meaning, Agda's `true` and `false` will be directly compiled as JS's `true` and `false`, but Agda's `Bool` type will be transpiled into JS as an anonymous functions:

```js
function (x,v) {
  return (
    (x)
      ? v["true"]()
      : v["false"]()
  );
}

// that is
const bool = (x,v) => x ? v["true"]() : v["false"]()

// x might be a tag for the Boolean type (not sure).
// So, if x exists, the object v is queried for the "true" property.
// If x doesn't exists, the object v is queried for the "false" property.

// v is a JS object with properties "true" and "false",
// both of which return a nullary function,
// which is immediately invoked.
```
