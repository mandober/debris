# Features Added in C# Language Versions

## C# 1.0 (Visual Studio.NET)

Classes
Structs
Interfaces
Events
Properties
Delegates
Expressions
Statements
Attributes
Literals

## C# 2 (VS 2005)

Generics
Partial types
Anonymous methods
Iterators
Nullable types
Getter/setter separate accessibility
Method group conversions (delegates)
Static classes
Delegate inference

## C# 3 (VS 2008)

Implicitly typed local variables
Object and collection initializers
Auto-Implemented properties
Anonymous types
Extension methods
Query expressions
Lambda expression
Expression trees
Partial methods

## C# 4 (VS 2010)

Dynamic binding
Named and optional arguments
Co- and Contra-variance for generic delegates and interfaces
Embedded interop types ("NoPIA")

## C# 5 (VS 2012)

Asynchronous methods
Caller info attributes

## C# 6 (VS 2015)

[Draft Specification online](https://github.com/dotnet/csharplang/blob/master/spec/README.md)
Compiler-as-a-service (Roslyn)
Import of static type members into namespace
Exception filters
Await in catch/finally blocks
Auto property initializers
Default values for getter-only properties
Expression-bodied members
Null propagator (null-conditional operator, succinct null checking)
String interpolation
nameof operator
Dictionary initializer

## C# 7.0 (Visual Studio 2017)

Out variables
Pattern matching
Tuples
Deconstruction
Discards
Local Functions
Binary Literals
Digit Separators
Ref returns and locals
Generalized async return types
More expression-bodied members
Throw expressions

## C# 7.1 (Visual Studio 2017 version 15.3)

Async main
Default expressions
Reference assemblies
Inferred tuple element names
Pattern-matching with generics

## C# 7.2 (Visual Studio 2017 version 15.5)

Span and ref-like types
In parameters and readonly references
Ref conditional
Non-trailing named arguments
Private protected accessibility
Digit separator after base specifier


## C# 7.3 (Visual Studio 2017 version 15.7)

System.Enum, System.Delegate and unmanaged constraints.
Ref local re-assignment: Ref locals and ref parameters can now be reassigned with the ref assignment operator (= ref).
Stackalloc initializers: Stack-allocated arrays can now be initialized, e.g. Span<int> x = stackalloc[] { 1, 2, 3 };.
Indexing movable fixed buffers: Fixed buffers can be indexed into without first being pinned.
Custom fixed statement: Types that implement a suitable GetPinnableReference can be used in a fixed statement.
Improved overload candidates: Some overload resolution candidates can be ruled out early, thus reducing ambiguities.
Expression variables in initializers and queries: Expression variables like out var and pattern variables are allowed in field initializers, constructor initializers and LINQ queries.
Tuple comparison: Tuples can now be compared with == and !=.
Attributes on backing fields: Allows `[field: …]` attributes on an auto-implemented property to target its backing field.
