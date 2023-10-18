# Static class members

<!-- TOC -->

- [Static Class Members](#static-class-members)
  - [Static Properties](#static-properties)
  - [Static Methods](#static-methods)

<!-- /TOC -->


Inside a class, the `static` keyword marks 3 different things:
1. Static class members
2. Static variables
3. Late static binding



**Static variables** are variables inside a function that is a member of a class


---

Static Class Members (SCM):
- Static Class Properties (SCP)
- Static Class Functions (SCF)


Static Class Properties are variables ans class constants



- not accessible via object instaces, no access to $this
- accessible through: class name, `::`, static member name
- visibility: non-pub static members are not accessible from outside


---


## Static Class Members

The `static` keyword is primarily used to define *static class members*, i.e. static properties and static methods that belong to the class itself (and not to the object instances).

Static members are accessible without needing to instantiate the class, through the class name followed by scope resolution operator, `::`, e.g. if a class `A` has a static method `m`, it is accessed as `A::m()`


Unlike a *static method*, a *static property* cannot be accessed through the class' object.

For compatibility with PHP 4, a *static class member* (property or method) is treated as *public* by default.

### Static Properties

In a class, the `static` keyword is also used to define *static variables*. Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.




### Static Methods

In a class, the `static` keyword is primarily used to define *static class members*, i.e. properties and methods.

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.



- static methods are callable without the class' instance
- `$this` is not available inside the static methods
- CAUTION: In PHP 5, calling non-static methods statically generates an `E_STRICT` level warning
- WARNING: In PHP 7, calling non-static methods statically is *deprecated*, and will generate an `E_DEPRECATED` warning.
- Support for calling non-static methods statically might be removed!

```php
// EXAMPLE: static method
class Foo {
  public static function staticMethod()
  {
    // ...
  }
}

// static method called statically
Foo::staticMethod();
// Possibly with respect to the namespace
\Foo::staticMethod();

// call it "dynamically" (as a string)
$classname = 'Foo';
$classname::staticMethod(); // since PHP 5.3.0
```
