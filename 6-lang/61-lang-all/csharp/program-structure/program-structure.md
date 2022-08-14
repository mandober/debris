# Program structure

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/language-specification/introduction


Program Structure
- Programs: consist of one or more source files.
- Types: declared by programs, types contain members.
- Members:
  - Fields
  - Methods
  - Properties
  - Events
- Namespaces: types are organized into namespaces.
- Assemblies: the physical package of compiled programs


**Assemblies** contain executable code in the form of Intermediate Language (IL) instructions, and symbolic information in the form of metadata. Before it is executed, the IL code in an assembly is automatically converted to processor-specific code by the Just-In-Time (JIT) compiler of .NET Common Language Runtime.

Because an assembly is a self-describing unit of functionality containing both code and metadata, there is no need for #include directives and header files in C#. The public types and members contained in a particular assembly are made available in a C# program simply by referencing that assembly when compiling the program.

C# permits the source text of a program to be stored in several source files. When a multi-file C# program is compiled, all of the source files are processed together, and the source files can freely reference each other—conceptually, it is as if all the source files were concatenated into one large file before being processed. Forward declarations are never needed in C# because, with very few exceptions, declaration order is insignificant. C# does not limit a source file to declaring only one public type nor does it require the name of the source file to match a type declared in the source file.



* Types and Variables
  - value types
  - reference types
  - variables
* Expressions
  - Expressions are constructed from operands and operators.
  - Expressions produce a value.
* Statements
  - statements express the actions of a program.
* Classes and objects
  - Classes are built using members.
  - Objects are instances of a class.
* Structs
  - Structs are data structures that are value types (unlike classes).
* Arrays
  - An array is a data structure that contains a number of variables that are accessed through computed indices.
* Interfaces
  - An interface defines a contract that can be implemented by classes and structs.
  - An interface can contain methods, properties, events, and indexers.
  - An interface does not provide implementations of the members it defines, it merely specifies the members that must be supplied by classes or structs that implement the interface.
* Enums
  - An enum type is a distinct value type with a set of named constants.
* Delegates
  - A delegate type represents references to methods with a particular parameter list and return type.
  - Delegates make it possible to treat methods as entities that can be assigned to variables and passed as parameters.
  - Delegates are similar to the concept of function pointers found in some other languages, but unlike function pointers, delegates are object-oriented and type-safe.
* Attributes
  - Attributes enable programs to specify additional declarative information about types, members, and other entities.

