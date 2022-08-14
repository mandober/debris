# Pointers

- a variable is a named memory area
- `&` only applies to objects in memory: variables and array elements.


To a 64-bit process running on x86_64 architecture on a computer equipped with the maximum allowed amount of memory i.e. 2 EiB (2,048 PiB or 2,097,152 TiB), memory is presented as an array, with byte-sized cells, which is indexed from zero to 2^64-1, which in hex is: `0 - 1FFF FFFF FFFF FFFF`.

The minimum addressable size (unit of memory) is a byte.

A value consisting of a single byte (e.g. `char`) gets stored at a memory address. To read that value only that single memory address is needed.


A variable is a named (n byte-sized) chunk of memory; it only refers to the first byte of that chunk, but the compiler knows its size (i.e. it knows how much bytes it actually refers to) by its type. A pointer, being a variable, has a name and type; its type (base type) is the same type as that of a value (variable) it points to. Its direct value is a memory address which it gets via "address of" operator from a variable; its indirect value is the value beginning at that memory address. A pointer points to a single memory address, but its base type determines how many bytes to access from there on.

For example, a variable of pointer to `int` type points to a single memory address, but if `int` is 4 bytes long (depending on the implementation and platform) the pointed to byte at that address plus the next 3 bytes are accessed to form a value of `int` type. In the case of `char`, whose size is always 1 byte, it is just the pointed to byte that is accessed.

The size of a pointer variable is the same regardless of its base type, but the size of memory (in byte-sized chunks) that will be accessed when retrieving the pointed to data depends on the base type of the pointer variable.

In a way, types in C could be ordered horizontally and vertically: all non-pointer types, like `int`, `char`, `float`, `double`, etc., would be ordered horizontally. Then the available types double by each level of (pointer) indirection, so each "horizontal" type "carries" indirection ("vertical") types: `(int *)` (pointer-to-int type), `(int **)` (pointer-to-pointer-to-int type), `(int ***)`, and so on. Thus, there are theoretically infinitely many types in C.

A pointer has its own type and the base type, which is the type of value it points to, so the base type of `(char *)` is `char` (1 byte is accessed), but the base type of `(char **)` is `(char *)` (8 bytes on x64 are accessed), and for `(char ***)` the base type is `(char **)`(again, 8 bytes @ x64); the base types for  

All (valid) pointers store a memory address, so they all have the same size. That size is determined by architecture of the host platform; in x32 systems it is 4 bytes and in x64 it is 8 bytes. The size of pointer needs to be big enough to accommodate the biggest available memory address (on a given platform).

Pointers contain a number that represents a memory location, and in that regard they are all the same - it is the type system that constrains them to a certain type, classifying them as pointers to integers, to characters, to a user-defined type, etc. The compiler will complain if a pointer to, for example, an integer is assigned the address of a float. Nevertheless, they can easily change their (base) type by casting.


---

Two important differences between x86 and x64 are the 64-bit addressing capability and a flat set of 16 64-bit registers for general use. Given the expanded register set, x64 uses the `__fastcall` calling convention and a RISC-based exception-handling model. The `__fastcall` convention uses registers for the first 4 arguments and the stack frame to pass additional arguments.

Compiler option to optimize the app for x64:
`/favor:{blend | ATOM | AMD64 | INTEL64}`



- [Overview of x64 Calling Conventions](https://docs.microsoft.com/en-us/cpp/build/overview-of-x64-calling-conventions)
- [__fastcall](https://docs.microsoft.com/en-us/cpp/cpp/fastcall)
- [-favor (Optimize for Architecture Specifics)](https://docs.microsoft.com/en-us/cpp/build/reference/favor-optimize-for-architecture-specifics)
- [Compiler Options](https://docs.microsoft.com/en-us/cpp/build/reference/compiler-options)
