# PHP 7

New language features in PHP 7 and 7.1 releases:
- Scalar type hints
- Return type hints
- Anonymous classes
- Generator delegation
- Generator return expressions
- The null coalesce operator
- The spaceship operator
- Constant arrays
- Uniform variable syntax
- Throwables
- Group use declarations
- Class constant visibility modifiers
- Catching multiple exceptions types
- Iterable pseudo-type
- Nullable types, `?string $a` (equivalent to longer form: `string $a = null`)
- Void return type, marked with `void` keyword


## Scalar type hints

Since PHP 5 type-hinting was possible for class types, in PHP 5.1 the support was extended for arrays and PHP 7 adds support for scalars.


# New in PHP 7

New language features
- *scalar type hints*
- *null coalescing operator*, `??`
- *anonymous classes*
- *assertions* (zero cost as they are removed at RT)

Architectural improvements
- Improved performance, PHP7 is sometimes twice as fast as PHP 5
- PHP 7 has lower memory consumption
- Consistent support for 64-bit architecture machines
- Various deprecated SAPIs and extensions removed
- Addition of new secure random number generator API
- Improved exception hierarchy
- Many fatal errors converted to Exceptions
- PHP 7 uses the Zend Engine 3.0 that almost doubles the performance of PHP 5, while halving the demand for memory at the same time.
