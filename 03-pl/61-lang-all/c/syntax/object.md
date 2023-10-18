# Object

An object, in C, is region of data storage in the execution environment, the contents of which can represent values (a value is the meaning of the contents of an object, when interpreted as having a specific type).

Every object has
- size (can be determined with sizeof)
- alignment requirement (can be determined by alignof) (since C11)
- storage duration (automatic, static, allocated, thread-local)
- lifetime (equal to storage duration or temporary)
- effective type
- value (which may be indeterminate)
- optionally, an identifier that denotes this object

Objects are created by 
- declarations
- allocation functions
- string literals
- compound literals
- and by non-lvalue expressions that return structures or unions with array members.

http://en.cppreference.com/w/c/language/object
