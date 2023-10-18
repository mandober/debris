# Constants

https://www.php.net/manual/en/language.constants.syntax.php

You can define a constant with:
- `define()` function accepts arbitrary expr. *RT constants*
- `const` keyword (outside class). *CT constants*
- once defined, a constant can never be changed or unset


Constants defined with `const` keyword may contain:
- scalar literals (boolean, integer, float, string)
- scalar expressions
- array
- resource (should be avoided)

Reading a constant:
- just specify its name (constant names have no `$` sigil)
- use `constant()` to pass in constant's name dynamically
- `get_defined_constants()` to get a list of all defined constants
- `defined()` function checks if a constant exists

As opposed to defining constants using `define()`, constants defined using the `const` keyword must be declared at the top-level scope because they are defined at *compile-time*. This means that they cannot be declared inside functions, loops, if statements or try/ catch blocks.


> Constants, variables and function names are in a different namespace. This implies that, e.g. TRUE, $TRUE, TRUE() are distinct.

```php
function ll() { return 'function'; }
const ll = 'const';
$ll = 'variable';

echo ll(), PHP_EOL;
echo ll  , PHP_EOL;
echo $ll , PHP_EOL;
```


- use `constant()` to pass in constant's name dynamically
- `constant()` always behaves as if it is called from the global namespace.
- `define()` allows defining constants with invalid names that only `constant()` can retrieve.


## Constants defined with define() inside namespaces

define() will define constants exactly as specified.  So, if you want to define a constant in a namespace, you will need to specify the namespace in your call to define(), even if you're calling define() from within a namespace.  The following examples will make it clear.

The following code will define the constant "MESSAGE" in the global namespace (i.e. "\MESSAGE").

```php
namespace test;
define('MESSAGE', 'Hello world!');
```

The following code will define two constants in the "test" namespace.

```php
namespace test;
define('test\HELLO', 'Hello world!');
define(__NAMESPACE__ . '\GOODBYE', 'Goodbye cruel world!');
```
