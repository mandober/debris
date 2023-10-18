# Predefined Classes

https://www.php.net/manual/en/reserved.classes.php

This lists standard predefined classes, but extensions may define more.

## Standard Defined Classes

Classes defined in the standard set of functions included in the PHP build.
- `Directory` Created by `dir()`
- `stdClass`  Created by typecasting to object
- `__PHP_Incomplete_Class` Possibly created by `unserialize()`
- `Exception` (since PHP 5)
- `ErrorException` (since PHP 5.1.0)
- `php_user_filter`
- `Closure` (since 5.3) Represents anonymous functions
- `Generator` (since 5.5) Represents generators

Predefined interfaces and classes since PHP 7
- `ArithmeticError`
- `AssertionError`
- `DivisionByZeroError`
- `Error`
- `Throwable`
- `ParseError`
- `TypeError`

Special classes   
These identifiers may not be used as class name, they have special purpose.    
- `self`    Current class
- `parent`  Parent class
- `static`  Current class in runtime (late static binding)
