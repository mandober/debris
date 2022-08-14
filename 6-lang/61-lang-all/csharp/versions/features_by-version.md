# C♯ features

## C♯ 2.0
- Generics
- Partial types
- Anonymous methods
- Iterators
- Nullable types
- Getter/setter separate accessibility
- Method group conversions (delegates)
- Co-variance and Contra-variance for delegates
- Static classes
- Delegate inference

## C♯ 3.0
- Implicitly typed local variables
- Object and collection initializers
- Auto-Implemented properties
- Anonymous types
- Extension methods
- Query expressions
- Lambda expression
- Expression trees
- Partial methods

## C♯ 4.0
- Dynamic binding
- Named and optional arguments
- Generic co- and contravariance
- Embedded interop types ("NoPIA")

## C♯ 5.0
- Asynchronous methods
- Caller info attributes

## C♯ 6.0
- Compiler-as-a-service (Roslyn)
- Import of static type members into namespace
- Exception filters
- Await in catch/finally blocks
- Auto property initializers
- Default values for getter-only properties
- Expression-bodied members
- Null propagator (null-conditional operator, succinct null checking)
- String interpolation
- nameof operator
- Dictionary initializer

## C♯ 7.0
- Out variables
- Pattern matching
- Tuples
- Deconstruction
- Local functions
- Digit separators
- Binary literals
- Ref returns and locals
- Generalized async return types
- Expression bodied constructors and finalizers
- Expression bodied getters and setters
- Throw can also be used as expression

## C♯ 7.1
- Async main
- Default literal expressions
- Inferred tuple element names

## C♯ 7.2
- Reference semantics with value types
- Non-trailing named arguments
- Leading underscores in numeric literals
- private protected access modifier

## C♯ 7.3
- Accessing fixed fields without pinning
- Reassigning ref local variables
- Using initializers on stackalloc arrays
- Using fixed statements with any type that supports a pattern


------------------------------------------------------------

# C♯ Features: Mono Compiler

State of the Compiler
The (mcs) compiler defaults to the latest language specification available.

## All C♯ 2.0 features are supported including:
Anonymous methods
Iterators
Partial classes
Generics
Nullable types
Friend assemblies
Static classes
Covariance and contravariance
Access modifiers on properties
Fixed buffers
External assembly alias
namespace alias qualifier
Inline warning control.


## All C♯ 3.0 features are supported including:
Extension methods
Query expressions (LINQ)
Expression trees
Automatically implemented properties
Lambda expressions
Anonymous types
Collection initializers
Object initializers
Implicitly typed arrays
Partial methods

## All C♯ 4.0 features are supported including:
Dynamic binding support
Generic type variance
Optional parameters
Named arguments

## All C♯ 5.0 feature are supported including:
Asynchronous programming support
Caller info attributes

## All C♯ 6.0 features are supported including:
Auto-property initializers
Await in catch and finally blocks
Exception filters
Expression-bodied function members
Index initializers
Null-conditional operator
Nameof operator
String interpolation
Using static

## Following C♯ 7 features are supported:
Tuples
Discards
Out variables declaration
Ref returns and locals
Expression-bodied constructors, finalizers and accessors
Throw expression
Binary Literals
Digit Separators
Generalized async return types
Default literal expressions
Non-trailing named arguments
ref struct
Readonly struct
Pattern matching (limited to simple usage)
