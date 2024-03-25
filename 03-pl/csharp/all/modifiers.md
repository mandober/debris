# Modifiers

- Static modifier, `static`
- Read-only modifier: `readonly`
- Variable arity modifier, `params`
- Partial modifier, `partial`
- Asynchronous code modifier, `async`
- Threading modifier: `volatile`
- Access modifiers:
  - `public`
  - `private`
  - `protected`
  - `private protected`
  - `internal`
  - `protected internal`
- Inheritance modifiers: 
  - `new`
  - `virtual`
  - `abstract`
  - `override`
  - `sealed`
- Generics modifier
  - `in`
- Unsafe code modifiers: 
  - `unsafe`
  - `extern`



## readonly

**field**   
The `readonly` modifier prevents a field from being modified after construction. A read-only field can be assigned only in its declaration or within the enclosing type's constructor.


## static

The case for static methods

When all variables required within a method are provided as input (or are statically available), the method can be made static.

You may feel uneasy about this, especially if you’ve seen programs become difficult to test and maintain because of the excessive use of static classes.

Static methods can cause problems if they do either of the following:
- Act on mutable static fields: these are effectively the most global variables, and it’s well known that maintainability suffers from the presence of global mutable variables.
- Perform I/O—In this case, it’s testability that’s jeopardized. If method A depends on the I/O behavior of static method B, it’s not possible to unit test A.

Note that both these cases imply an impure function. On the other hand, when a function is pure, there’s no downside to making it static. As a general guideline,
- Make pure functions static.
- Avoid mutable static fields.
- Avoid direct calls to static methods that perform I/O.
As you code more functionally, more of your functions will be pure, so potentially more of your code will be in static classes without causing any problems related to the abuse of static classes.


## 7.2 Features

Work with value types while using reference semantics. Designed to increase performance by minimizing copying value types without incurring the memory allocations associated with using reference types. The features include:

The `in` modifier
The `in` modifier on parameters specifies that an arg is passed by ref, but not modified by the called method. Adding it to an argument is a [source compatible change][scc].

The `ref readonly` modifier
  - `ref readonly` modifier on method returns indicates that a method returns 
    its value by reference but doesn't allow writes to that object.
  - Adding the ref readonly modifier is a source compatible change,
    if the return is assigned to a value.
  - Adding the readonly modifer to an existing ref return statement is 
    an incompatible change.
  - It requires callers to update the declaration of ref local variables to include the readonly modifier.

The `readonly struct` declaration, to indicate that a struct is immutable and should be passed as an in parameter to its member methods. Adding the readonly modifier to an existing struct declaration is a binary compatible change.

The `ref struct` declaration, to indicate that a struct type accesses managed memory directly and must always be stack allocated. Adding the ref modifier to an existing struct declaration is an incompatible change. A ref struct cannot be a member of a class or used in other locations where it may be allocated on the heap.



---
[scc] https://docs.microsoft.com/en-us/dotnet/csharp/whats-new/version-update-considerations#source-compatible-changes
