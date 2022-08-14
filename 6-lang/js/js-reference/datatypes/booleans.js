import assert from 'assert'

// Booleans

// All JS values may be coerced into bool
// Truthy values result in `true`
// Falsy values result in `false`

// Falsy values:
assert.equal(false == false)

Boolean(undefined);
Boolean(null);
Boolean(NaN);
Boolean("");
Boolean();
// Boolean(document.all);
Boolean(0);
// Falsey values stay false if prefixed with +/-
Boolean(-0);
Boolean(+0);

/*
!NaN      == true;
!NaN+1    == 2;
!NaN+!![] == 2;
[]+[]     == "";
{}+[]     == 0;
[]+{}     == "[object Object]"

// Symbols can be coerced to boolean and string only
Boolean(Symbol("xyz")) == true;
toString(Symbol("xyz")) == "[object Undefined]";
*/
