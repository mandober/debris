# Type hints

PHP 5 introduced type-hinting, enabling users to constrain a type (of input and output values of functions/methods) by specifying the name of a class or an interface. PHP 5.1 extended that support to arrays, PHP 7.0 to scalars, and 7.2 to 'object' type.

Type hints may appear only in two locations
- input types (function's parameters)
- output types (function's return type)
- PHP 7.4 will support *typed properties*

```php
function hinted(int $i, callable $f, ?string &...$list) : callable { /*...*/}
```

List of type-hints
* common input and output types
  * scalars
    - `bool`
    - `int` 
    - `float`, may be used for *generic number* (int cleanly maps to float)
    - `string`
  * compounds
    - `array`
    - `object`
  * special typings
    - `iterable`
    - `callable`
    - `traversable`
  * class name as a type
    - `ClassName $param`
    - `self` in methods
    - `parent` in methods of subclasses
    - maybe others? check for `static`, `class`
  * interface name as a type
    - `InterfaceName $param`
* the last parameter only
  - `<type> ...$param`
  - `<type> &...$param`
* nullable type as parameter
  - `?<type> $param` or/instead of `$param = null`
* nullable type as return type
  - `function() : ?<type> { ... }`
* return type only
  - `void`




## Typed arrays

The `array` annotation cannot be further specialized i.e. we cannot cleanly specify what is the type of array, except in the situation when the splat/rest operator is used on the (last) parameter; we can plug in the type hint just before the dots. Since the splat op makes its associated parameter an array, even if no args are given because it stands for zero or more args, the overall effect is the ability to enforce an array of specific type.

```php
// list by value
function byval(float ...$list) : float { /* ... */}

// list by reference
function byref(float &...$list) : float { /* ... */}

// array of arrays
function mdarray(array ...$list) : float { /* ... */}


// nullable type as input/output type
function nullable_param(?float $n) : ?float {
  #return null; // must return null
  return 3.14;  // or a float
}
nullable_param(null);
```
