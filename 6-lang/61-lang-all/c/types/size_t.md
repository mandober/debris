# size_t


C99 standard defines `size_t` to be the unsigned integer return type of the `sizeof` operator, as well as the argument of `*alloc` family of functions. The `SIZE_MAX` set by C99 is that it is at least 2 bytes (65535).


---

This doesn't let us determine `sizeof(size_t)`.

The implementation is free to use any representation it likes for `size_t` - so there is no upper bound on size - and the implementation is also free to define a byte as 16-bits, in which case `size_t` can be equivalent to `unsigned char`.

Putting that aside, however, in general you'll have 32-bit `size_t` on 32-bit programs, and 64-bit on 64-bit programs, regardless of the data model.

Generally the data model only affects static data,

Pointers are 64-bit in all cases; and there's little point to having 64-bit pointers but not 64-bit sizes.

---

`size_t`is an unsigned data type defined by several C/C++ standards, e.g. the C99 ISO/IEC 9899 standard, that is defined in `stddef.h`. It can be further imported by inclusion of `stdlib.h` as this file internally sub includes `stddef.h`.

This type is used to represent the size of an object. Library functions that take or return sizes expect them to be of type or have the return type of `size_t`. Further, the most frequently used compiler-based operator `sizeof` should evaluate to a constant value that is compatible with `size_t`.

---

`size_t` is an unsigned type, used for counting, length, width, etc. For example, `strlen()` returns a `size_t`.

Some functions defined in C and POSIX standards could use `size_t`, but instead use `int` for historic reasons.

---

size_t is a type that can hold any array index.
Depending on the implementation, it can be any of:
- unsigned char
- unsigned short
- unsigned int
- unsigned long
- unsigned long long

As defined in stddef.h: `typedef unsigned long size_t`
