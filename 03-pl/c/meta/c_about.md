# C Language

C was originally developed by Dennis Ritchie between 1969 and 1973 at Bell Labs and used to re-implement the Unix operating system.

C has been standardized by the American National Standards Institute (ANSI) since 1989 (see ANSI C) and subsequently by the International Organization for Standardization (ISO).

Characteristics
- Typing is static, but weakly enforced:   
  all data has a type, but implicit conversions may be performed.
- Declaration syntax mimics usage context:    
  statement beginning with the name of a type is taken as a declaration.
- lexical variable scope and recursion is allowed
- low-level access to memory is possible by using pointers.
- function is indicated by parentheses args list (no "function" keyword)
- all executable code is contained within functions
- Function parameters are always passed by value.
- Pass-by-reference is simulated with pointers.
- Function return values can be ignored.
- Functions not returning a value use untyped return keyword `void`.
- Functions may not be defined within the lexical scope of other functions.
- Function and data pointers permit ad hoc run-time polymorphism.
- Function signature required if fn is used before its definition.
- source is free-format
- semicolon as terminator
- curly braces group blocks of statements
- small fixed number of keywords
- control flow primitives: `for`, `if/else`, `while`, `switch`, `do/while`
- arithmetical and logical operators, such as `+`, `+=`, `++`, `&`, `~`, etc.
- More than one assignment may be performed in a single statement.
- user-defined and compound types are possible. `typedef`
- `struct`, heterogeneous aggregate type, accessed and assigned as a unit.
- `union` (struct variation) may have a number of data elements
  - total allocated memory is the size of the largest data member.
  - last data member takes that memory space displacing previous members.
- `enum` types are not tagged, freely interconvertible with ints.
- Strings are implemented as null-terminated arrays of chars.
- Array indexing is defined in terms of pointer arithmetic.
  - Unlike structs, arrays are not first-class objects;
  - they cannot be assigned or compared using single built-in operators.
  - There is no "array" keyword, in use or definition; 
  - instead, square brackets indicate arrays syntactically
- preprocessor for: 
  - macro definition
  - source file inclusion
  - conditional compilation
- basic modularity: files can be compiled separately and linked together, with control over which functions and data objects are visible to other files via static and extern attributes.
- Complex functionality such as I/O, string manipulation, and mathematical functions are consistently delegated to library routines.

