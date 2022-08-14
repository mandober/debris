# C♯ Overview

About C♯ language:
- general-purpose object-oriented programming
- support for component-oriented programming
- standardized by ECMA and ISO
- authored by Anders Hejlsberg and his team during .Net Framework development
- initial release in 2002
- developed in Microsoft
- runs on .NET's Common Language Infrastructure (CLI)
- standardized as ECMA-334 and ISO/IEC 23270


C♯ is designed for Common Language Infrastructure (CLI), which consists of the executable code and runtime environment that allows use of various high-level languages on different computer platforms and architectures.

C♯ language features:
- object-oriented
- component-oriented
- Garbage Collection (GC)
- Exception handling
- Type-safe
- unified type system
- Generics
- Operator overloading
- null
- Nullable types
- Async programming
- Events
- Indexers
- Multithreading
- Lambda expressions
- Assembly versioning
- Conditional compilation

C# has a **unified type system**. All C# types, including primitive types such as int and double, inherit from a single root object type. Thus, all types share a set of common operations, and values of any type can be stored, transported, and operated upon in a consistent manner. Furthermore, C# supports both user-defined reference types and value types, allowing dynamic allocation of objects as well as in-line storage of lightweight structures.

To ensure that C# programs and libraries can evolve over time in a compatible manner, much emphasis has been placed on **versioning** in C#'s design. Many programming languages pay little attention to this issue, and, as a result, programs written in those languages break more often than necessary when newer versions of dependent libraries are introduced. Aspects of C#'s design that were directly influenced by versioning considerations include the separate virtual and override modifiers, the rules for method overload resolution, and support for explicit interface member declarations.


When developing in .NET, programmers are given a wide range of choices as to which programming language to use. Some of the more popular .NET languages include VB.NET, C++/CLI, F#, and C#. Among these, C# is often the language of choice. Like the other .NET languages, C# is initially compiled to an intermediate language. This language is called the Common Intermediate Language (CIL) and is run on the .NET Framework. A .NET program will therefore be able to execute on any system that has this framework installed.