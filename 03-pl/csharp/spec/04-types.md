# Types and variables

Types:
* Value types
  - simple types
  - enum types
  - struct types
  - nullable types
* Reference types
  - class types
  - interface types
  - array types
  - delegate types

## Value types
Variables of value types directly contain their data. With value types, the variables each have their own copy of the data, and it is not possible for operations on one to affect the other (except in the case of `ref` and `out` parameter variables).

* Simple types
  - Signed integral: `sbyte`, `short`, `int`, `long`
  - Unsigned integral: `byte`, `ushort`, `uint`, `ulong`
  - Unicode characters: `char`
  - IEEE floating point: `float`, `double`
  - High-precision decimal: `decimal`
  - Boolean: `bool`
* Enum types
  - User-defined types of the form `enum E {...}`
* Struct types
  - User-defined types of the form `struct S {...}`
* Nullable types
  - Extensions of all other value types with a `null` value

## Reference types
Variables of reference types store references to their data (objects). With reference types, it is possible for two variables to reference the same object and thus possible for operations on one variable to affect the object referenced by the other variable.

* Class types
  - Ultimate base class of all other types: `object`
  - Unicode strings: `string`
  - User-defined types of the form `class C {...}`
* Interface types
  - User-defined types of the form `interface I {...}`
* Array types
  - Single- and multi-dimensional, for example, `int[]` and `int[,]`
* Delegate types
  - User-defined types of the form e.g. `delegate int D(...)`

## Numeric types
- The 8 integral types provide support for 8-bit, 16-bit, 32-bit, 64-bit values in signed or unsigned form.
- The 2 floating point types, float and double, are represented using the 32-bit single-precision and 64-bit double-precision IEEE 754 formats.
- decimal type is a 128-bit data type suitable for monetary calculations.
- bool type represents boolean values

## Text types
- char and string processing uses Unicode encoding.
- `char` type represents a *UTF-16 code unit*.
- `string` type represents a *sequence of UTF-16 code units*.

## New types
- Programs use *type declarations* to create new types.
- Type declaration specifies the name and the members of the new type.

## User-definable types
- class types
- struct types
- interface types
- enum types
- delegate types

## Generics
Generics supported by:
- class
- struct
- interface
- delegate
whereby they can be parameterized with other types.

## Class type
Class type defines a data structure containing:
* data members:
  - fields
* function members:
  - methods
  - properties
  - others

Class types supports mechanisms whereby derived class can extend and specialize base class using: _single inheritance_ and _polymorphism_.

## Struct type
- Struct type represents a structure with data members and function members
- Structs are value types (unlike classes), do not require heap allocation
- Struct types do not support _user-specified inheritance_
- Struct types implicitly inherit from type `object`

## Interface type
- interface defines a contract as a named set of public function members
- class or struct that implements interface must provide implementations of the interface's function members
- interface may inherit from multiple base interfaces
- class or struct may implement multiple interfaces.

## Delegate type
- delegate type represents references to methods with a particular parameter list and return type
- Delegates make it possible to treat methods as entities that can be assigned to variables and passed as parameters.
- Delegates are similar to the concept of function pointers, but unlike function pointers, delegates are object-oriented and type-safe.

## Enum type
- enum type is a distinct type with named constants.
- Every enum type has an underlying type: one of 8 integral types.
- The set of values of an enum type is the same as the set of values of the underlying type.

## Arrays
- single and multi dimensional arrays of any type.
- arrays need not be declared before they can be used (unlike the types above)
- array types are constructed by following a type name with square brackets.
- `int[]` is a single-dimensional array of int
- `int[,]` is a two-dimensional array of int
- `int[][]` is a single-dimensional array of single-dimensional arrays of int.
- array dimension is called its *rank*

## Nullable types
- also do not have to be declared before they can be used.
- For each non-nullable value type T there is a corresponding nullable type T?, which can hold an additional value null.
- For instance, int? is a type that can hold any 32 bit integer or the value null.

## Unified type system
- type system is unified so a value of any type can be treated as an object.
- Every type in C# directly or indirectly derives from the object class type
- object is the ultimate base class of all types.
- Values of reference types are treated as objects simply by viewing the values as type object.
- Values of value types are treated as objects by performing **boxing** and **unboxing** operations.

When a value of a value type is converted to type object, an object instance, also called a *box* is allocated to hold the value, and the value is copied into that box.

Conversely, when an object reference is cast to a value type, a check is made that the referenced object is a box of the correct value type, and, if the check succeeds, the value in the box is copied out.

Unified type system effectively means that value types can become objects "on demand". Because of the unification, general-purpose libraries that use type object can be used with both reference types and value types.

