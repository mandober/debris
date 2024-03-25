# C Standards

* K&R C
* ANSI C (1990)
* C89/C90 standard (ISO/IEC 9899:1990)
* C99 standard (ISO/IEC 9899:1999)
* C11 standard (ISO/IEC 9899:2011)
* C17 

C Implementations:
K&R, GCC, Clang, Intel C, Microsoft Visual C++, Pelles C, Watcom C


## K&R C
In 1978, Brian Kernighan and Dennis Ritchie published the first edition of "The C Programming Language". The version of C in book is referred to as K&R C. The second edition of the book covers the later ANSI C standard.

K&R added features:
- Standard I/O library
- `long int` data type
- `unsigned int` data type
- compound assignment operators

In early versions of C, only functions that return types other than `int` must be declared if used before the function definition; functions used without prior declaration were presumed to return type `int`.

In the following years several features were added by diff compiler vendors:
- `void` functions (functions with no return value)
- functions returning `struct` or `union` types (rather than pointers)
- assignment for `struct` data types
- `enum` type


## ANSI C and ISO C

In 1983, the American National Standards Institute (ANSI) formed a committee, X3J11, to establish a standard specification of C.

In 1989 C standard was ratified as ANSI X3.159-1989 "Programming Language C". This version of the language is often referred to as ANSI C, Standard C, C89.

In 1990, the ANSI C standard was adopted by the International Organization for Standardization (ISO) as ISO/IEC 9899:1990, which is sometimes called C90. So the terms "C89" and "C90" refer to the same standard.

ANSI, like other national standards bodies, no longer develops the C standard independently, but defers to the international C standard, maintained by the working group ISO/IEC JTC1/SC22/WG14.

One of the aims of C standardization was to produce a superset of K&R C, incorporating many of the subsequently introduced unofficial features. The standards committee also included several additional features:
- function prototypes (borrowed from C++)
- void pointers
- support for international character sets and locales
- preprocessor enhancements

C89 is supported by current C compilers, and most C code being written today is based on it. Any program written only in Standard C and without any hardware-dependent assumptions will run correctly on any platform with a conforming C implementation, within its resource limits.

In cases where code must be compilable by either standard-conforming or K&R C-based compilers, the `__STDC__` macro can be used to split the code into Standard and K&R sections to prevent the use on a K&R C-based compiler of features available only in Standard C.

## C99
C99 features:
- inline functions
- new type `long long int`
- new type `complex` to represent complex numbers
- variable-length arrays
- flexible array members
- improved support for IEEE 754 floating point
- support for variadic macros (macros of variable arity)
- support for line comments
- C99 is for the most part backward compatible with C90, but soemtimes stricter: declaration that lacks a type specifier no longer assumes `int`.
- C99 support is announced by std macro `__STDC_VERSION__` with `199901L`.
- GCC and other compilers now support all of C99.
- C compiler in MS Visual C++ only impl the C89 standard and those parts of C99 that are required for compatibility with C++11.


## C11
In 2007, work began on another revision of the C standard, informally called "C1X" until its official publication on 2011-12-08. The C11 standard adds:
- type generic macros
- anonymous structures
- improved Unicode support
- atomic operations
- multi-threading
- bounds-checked functions

It also makes some portions of the existing C99 library optional, and improves compatibility with C++.
The macro `__STDC_VERSION__` with `201112L` value indicates C11 support.



---

- [C](https://www.wikiwand.com/en/C_(programming_language))
- [ANSI C](https://www.wikiwand.com/en/ANSI_C)
  C89 (C version) or ANSI C, a C programming-language version
- [C11](https://www.wikiwand.com/en/C11)
- [C99](https://www.wikiwand.com/en/C99)
