# 64-bit data models

In 32-bit programs, pointers and data types such as integers generally have the same length. This is not necessarily true on 64-bit machines. Mixing data types (in C, C++, Objective-C) may thus work on 32-bit implementations but not on 64-bit implementations.

In many programming environments for C (and C-derived languages) on 64-bit machines, `int` variables are still 32 bits wide, but `long` integers and pointers are 64 bits wide.

These are described as having an `LP64` data model. Another alternative is the `ILP64` data model in which all 3 data types are 64 bits wide, and even `SILP64` where short integers are also 64 bits wide.

However, in most cases the modifications required are relatively minor and straightforward, and many well-written programs can simply be recompiled for the new environment with no changes. 

Another alternative is the `LLP64` model, which maintains compatibility with 32-bit code by leaving both `int` and `long` as 32-bit. `LL` refers to the `long long` integer type, which is at least 64 bits on all platforms, including 32-bit environments.


Data model     | short | i   | l   | ll | ptr
---------------|-------|-----|-----|----|----
LLP64, IL32P64 | 16    | 32  | 32  | 64 | 64
LP64, I32LP64  | 16    | 32  | 64  | 64 | 64
ILP64          | 16    | 64  | 64  | 64 | 64
SILP64         | 64    | 64  | 64  | 64 | 64

row1) Windows (x86-64 and IA-64) using [Visual C++][msvc] and [MinGW][ming]
row2) Unix-like: Linux, macOS, [Cygwin][cygw], BSD, Solaris, etc.

[msvc]: https://www.wikiwand.com/en/Visual_C%2B%2B "Visual C++"
[ming]: https://www.wikiwand.com/en/MinGW "MinGW"
[cygw]: https://www.wikiwand.com/en/Cygwin "Cygwin"
