# Introduction

- C# is an object-oriented, and type-safe programming language.
- has its roots in the C family of languages.
- standardized by ECMA International as the ECMA-334 standard
- standardized by ISO/IEC as the ISO/IEC 23270 standard
- MS C# compiler for .NET Framework is conforming impl of both standards.


C# includes support for component-oriented programming.
- Contemporary software design increasingly relies on software components in the form of self-contained and self-describing packages of functionality.
- Key to such components is that they present a programming model with properties, methods, and events; they have attributes that provide declarative information about the component; and they incorporate their own documentation. 
- C# provides language constructs to directly support these concepts.

Several C# features aid in the construction of robust and durable applications:
- Garbage collection automatically reclaims memory occupied by unused objects
- exception handling provides a structured and extensible approach to error detection and recovery
- type-safe design of the language makes it impossible to read from uninitialized variables, to index arrays beyond their bounds, or to perform unchecked type casts.

**Unified type system**   
- All types, including primitives, inherit from a single root `object` type.
- all types share a set of common operations
- values of any type can be stored, transported and operated upon consistently

C# supports both user-defined reference types and value types, allowing dynamic allocation of objects as well as in-line storage of lightweight structures.

**Versioning**   
To ensure that C# programs and libraries can evolve over time in a compatible manner, much emphasis has been placed on versioning in C#'s design. Many programming languages pay little attention to this issue, and, as a result, programs written in those languages break more often than necessary when newer versions of dependent libraries are introduced. Aspects of C#'s design that were directly influenced by versioning considerations include the separate virtual and override modifiers, the rules for method overload resolution, and support for explicit interface member declarations.

- source files typically have the file extension `.cs`
- to compile from CLI: `csc hello.cs`, which produces an executable assembly.

**Namespaces**
- Most programs start with a `using` directive that references the `System` namespace.
- Namespaces provide a hierarchical means of organizing programs and libraries. 
- Namespaces contain types and other namespaces

For example, the System namespace contains a number of types, such as the Console class referenced in the program, and a number of other namespaces, such as IO and Collections.

A using directive that references a given namespace enables unqualified use of the types that are members of that namespace.

Because of the using directive, the program can use Console.WriteLine as shorthand for System.Console.WriteLine.

**Main method**
- The programs' entry point is the static method called `Main`
- Main method is declared with the static modifier.
- instance methods reference particular enclosing object instance using `this`
- static methods operate without reference to a particular object.
- output of program is produced by the `WriteLine` method of the Console class
- This class is provided by the .NET Framework class libraries, which, by default, are automatically referenced by the Microsoft C# compiler.
- C# does not have a separate runtime library
- **.NET Framework is the runtime library of C#**
