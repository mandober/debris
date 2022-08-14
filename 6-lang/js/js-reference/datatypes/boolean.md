# Booleans

Boolean type has 2 monoids:
- *all* or *every*: with `&&` (identity true)
- *some* or *any*: with `||` (identity false)

## Predicates

Function from any type `a` to Boolean are called **predicates**:

`a -> boolean`

## Coercion

All JS values may be coerced into a Boolean:
* The so-called **truthy** values result in `true`
* The so-called **falsy** values result in `false`

## List of falsy values

Falsy values:
- `false`
- `undefined`
- `null`
* Number:
  - `0` i.e. `+0`
  - `-0` (usually it is not silently coerced to 0)
  - `NaN`
* String:
  - empty string, `''` i.e. `""`
- `document.all` (also falsy for some reason)


* Falsey values stay false when force-casted to number with + or - prefix

Boolean(-0)
Boolean(+0)


!NaN      == true;
!NaN+1    == 2;
!NaN+!![] == 2;
[]+[]     == "";
{}+[]     == 0;
[]+{}     == "[object Object]"


* Symbols can be coerced to boolean and string only

Boolean(Symbol("xyz")) == true;
toString(Symbol("xyz")) == "[object Undefined]";
