# Class

## Class definition

Minimal valid definition of a class
- begins with the `class` keyword
- followed by the name of the class, in PascalCase
- followed by an empty pair of braces

PHP offers a similar (empty) builtin class called `StdClass`.





## Class definition

At a minimum, a class definition:
- begins with the `class` keyword
- followed by the name of class
- followed by a pair of braces

```php
class EmptyClass {}
```

By convention, a class name, is in PascalCase, complying to the regex:   
`^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`

Even if appears empty, this class can be instantiated, `new EmptyClass`, which implicitly calls the class' ctor. A ctor is automatically created if it wasn't provided by the user. The call to ctor makes it construct and implicitly return (no need for `return` keyword in ctors) a new instance of this class, a new object.

Inside a class definition,` $this` refers to the current instance, and `self` refers to the class itself.

A class' dtor is auto created as well if one wasn't provided by the user. The dtor is called when a class instance goes out of scope.


## Class members

Functions, variables and constants, when inside a class, become either *static class members* or *instance class members*.


Class properties and methods live in separate "namespaces", so it is possible to have a property and a method with the same name.

Referring to both a property and a method has the same notation, and whether a property will be accessed or a method will be called, solely depends on the context, i.e. whether the usage is a variable access or a function call.

**Closures cannot be members of a class**. A variable that belongs to a class as a property, is disallowed to bind a closure.

Every instance of a lambda has own instance of static variables. This provides for great event handlers, accumulators, etc.

Creating new lambda with `function() { ... };` expression creates new instance of its static variables, but assigning a lambda to a variable **does not** create a new instance.

A lambda is object of class `Closure`, and assigning lambdas to variables has the same semantics as assigning object instance to variables, that is, *by reference*.



## Class Static Members

Static Class Members (SCM) are functions and variables marked with the `static` keyword. They belong to the class itself (and not to the object instances).

If `public`, static class members are accessible outside the class, without needing to instantiate the class, using a class name followed by the *scope resolution operator*, `::`, and the name of the static class member.

For example, if a class `A` has a static method `m`, it is accessed as `A::m()`


Unlike a *static method*, a *static property* cannot be accessed through the class' object.

For compatibility with PHP 4, a *static class member* (property or method) is treated as *public* by default.



## Instance Class Members




---


**Class static members**
- belong to the class itself (not instances)
- static members are accessible via *scope resolution op*, `::`
- have no visibility levels *?*
- both properties and functions may be static
- static public const are equal to global const


**Instance members**
- belong to objects, to the instances of the class
- instance members are accessible via *property accessor*, `->`
- each object has its own set of class members (props and methods)
- if not mutating, methods could be shared (as static methods or functions)
- within a class definition, an instance is referred to using `$this`
- `$this` is available in object context only (not in static context)


**Properties**
- Properties or fields describe (object) attributes
* Sorts of props: constants, variables
* Constants
    - visibility
      - private, protected works as usual
      - public constants have *global scope*
* Variables
    - scalars, compounds, specials
    - anonymous functions, closures
      - anonymous functionsl auto `use` $this
      - static anonymous functions: no auto import of $this, belong to objects

**Methods**
- function that is a member of a class is called a method 
- methods describes object's behavior
- non-static, object, methods with access to `$this`
- Sorts of methods
  - methods have implicit access to `$this` (objects, class' instances)



**Visibility levels**
- public
- private
- protected

**Class qualifiers**
- static
- final
- abstract


## This

The pseudo-variable `$this` is available when a *method* is called from within an *object context*.

`$this` is a reference to *the calling object*, which is usually the object to which the method belongs; however, it may be some other object, if the method is called *statically* from another object's context. Some functions/methods allow setting the `$this` manually.

As of PHP 7.0.0 calling a non-static method statically from an incompatible context results in `$this` being undefined inside the method. Calling a non-static method statically from an incompatible context has been deprecated as of PHP 5.6.0. As of PHP 7.0.0 calling a non-static method statically has been generally deprecated (even if called from a compatible context). Before PHP 5.6.0 such calls already triggered a strict notice.
