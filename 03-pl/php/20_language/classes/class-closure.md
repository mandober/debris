# Closures

<!-- TOC -->

- [Methods of closure object](#methods-of-closure-object)
- [Closure::bind](#closurebind)

<!-- /TOC -->


https://www.php.net/manual/en/class.closure.php

Class used to represent *anonymous functions*.

Anonymous functions (implemented in PHP 5.3) yield objects of this type.

The class has methods that allow further control of the anonymous function after it has been created (since PHP 5.4).

Besides the methods listed here, this class also has an `__invoke` method. This is for consistency with other classes that implement calling magic; it is not used for calling the function.

## Methods of closure object

* `Closure::__construct`  Private ctor that disallows instantiation
* `Closure::fromCallable` Converts a callable into a closure
* `Closure::call`         Binds and calls the closure
* `Closure::bindTo`  Duplicates closure with a new bound obj and class scope
* `Closure::bind` Duplicates closure with specific bound obj and class scope


```php
Closure {
  private __construct ( void )

  public static bind (
    Closure $closure ,
    object $newthis ,
    [ mixed $newscope = "static" ]
  ) : Closure

  public bindTo ( object $newthis [, mixed $newscope = "static" ] ) : Closure

  public call ( object $newthis [, mixed $... ] ) : mixed

  public static fromCallable ( callable $callable ) : Closure
}
```

## Closure::bind

`Closure::bind` 
Duplicates a closure with a specific bound object and class scope. 
This method is a *static version* of `Closure::bindTo()`.

```php
public static bind (
    Closure $closure ,
    object $newthis ,
    [ mixed $newscope = "static" ]
) : Closure
```

`closure`    
The anonymous functions to bind.

`newthis`   
The object to which the given anonymous function should be bound, or NULL for the closure to be unbound.

`newscope = "static"`   
- This parm determines the class scope to which the closure is to be associated
- if skipped or given as the string `"static"` (which is the default parameters value anyway) the closure keeps the current scope.
- If an object is given, the type of the object will be used instead. This determines the visibility of protected and private methods of the bound object. 
- This parameter cannot be an object of an internal class.
