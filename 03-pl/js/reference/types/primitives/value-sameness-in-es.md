# When are values the same


`SameValue (x, y)`

The internal comparison abstract operation SameValue(x, y), where x and y are 
ECMAScript language values, produces true or false.

Such a comparison is performed:

* If Type(x) is different from Type(y), return FALSE.
* If Type(x) is Number, then
  * If x is NaN and y is NaN, return TRUE.
  * If x is +0 and y is -0, return FALSE.
  * If x is -0 and y is +0, return FALSE.
  * If x is the same Number value as y, return TRUE.
  * Return FALSE.
* Return SameValueNonNumber(x, y). 

NOTE: This algorithm differs from the Strict Equality Comparison
Algorithm in its treatment of signed zeroes and NaNs.


`SameValueZero (x, y)`

The internal comparison abstract operation SameValueZero(x, y), where x and y are 
ECMAScript language values, produces true or false. Such a comparison is performed:

* If Type(x) is different from Type(y), return FALSE.
* If Type(x) is Number, then
  * If x is NaN and y is NaN, return TRUE.
  * If x is +0 and y is -0, return TRUE.
  * If x is -0 and y is +0, return TRUE.
  * If x is the same Number value as y, return TRUE.
  * Return FALSE.
* Return SameValueNonNumber(x, y). 

NOTE: SameValueZero differs from SameValue only in its treatment of +0 and -0.


7.2.11 SameValueNonNumber (x, y)
================================

The internal comparison abstract operation SameValueNonNumber(x, y), where neither 
x nor y are Number values, produces true or false. Such a comparison is performed:

* Assert: Type(x) is not Number.
* Assert: Type(x) is the same as Type(y).

* If Type(x) is Undefined, return TRUE.
* If Type(x) is Null, return TRUE.

* If Type(x) is String, then
  * If x and y are exactly the same sequence of code units (same length and same 
    code units at corresponding indices), return TRUE; otherwise, return FALSE.
    
* If Type(x) is Boolean, then
  * If x and y are both true or both false, return TRUE; otherwise, return FALSE.
  
* If Type(x) is Symbol, then
  * If x and y are both the same Symbol value, return TRUE; otherwise, return FALSE.
  
* Return TRUE if x and y are the same Object value. Otherwise, return FALSE. 


