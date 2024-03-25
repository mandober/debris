# Assertions

http://php.net/manual/en/function.assert.php

`assert()` evalutes the provided expression taking a predefined action on FALSE.

The `assert()` language construct allows defining assertions that only have effect in development and testing environments, but are removed in production.

```php
# PHP 5 and 7
assert ( mixed $assertion [, string $description ] ) : bool

# PHP 7
assert ( mixed $assertion [, Throwable $exception ] ) : bool
```


## Expectations (PHP 7 only)

`assert()` is a language construct in PHP 7, allowing for the definition of expectations, which are assertions that only have effect in development and testing environments, but are optimized away (have zero cost) in production.

While `assert_options()` can still be used to control behaviour as in previous PHP versions (< 7), for backward compatibility reasons, code that exclusively uses PHP 7 should use the two new configuration directives to control the behaviour of assert (and refrain from calling assert_options).

Config directives exclusive to PHP 7

* `zend.assertions`
  - `1`: generate and execute code (development mode) *This is the default.*
  - `0`: generate code but jump around it at runtime
  - `-1`: do not generate code (production mode)

* `assert.exception`
  - `1`: throw when the assertion fails:
    - either throw the object that was provided as the exception
    - otherwise, throw new `AssertionError` object
  - `0`: use or generate a `Throwable`, but only generate a warning based on that object, rather than throwing it (PHP 5 compatible) *This is the default.*
