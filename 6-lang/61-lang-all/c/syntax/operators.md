# Operators

## sizeof
- unary operator
- `sizeof (char)` is guaranteed to be 1. The actual number of bits of type char is specified by the preprocessor macro `CHAR_BIT`, defined in the standard include file `limits.h`. On most modern systems this is eight bits. The result has an unsigned integral type that is usually denoted by `size_t`.

```c
// sizeof has a single operand
int a = 55;
// which is either a variable
sizeof a;
// or a data type cast
sizeof (char);
```

The operator has a single operand, which is either a variable or a data type cast. A cast is a data type enclosed in parenthesis. Data types may not only be primitive types, such as integer and floating-point types, but also pointer types, and compound datatypes (unions, structs, and C++ classes).

Certain standard header files, such as `stddef.h`, define `size_t` to denote the unsigned integral type of the result of a `sizeof` expression. The `printf` width specifier `z` is intended to format that type.

`sizeof` cannot be used in C preprocessor expressions, such as `#if`, because the preprocessor has no data types.

When `sizeof` is applied to the name of an array, the result is the number of bytes required to store the entire array. This is one of the few exceptions to the rule that the name of an array is converted to a pointer to the first element of the array, and is possible just because the actual array size is fixed and known at compile time, when the `sizeof` operator is evaluated.

The following program uses `sizeof` to determine the size of a declared array, avoiding a buffer overflow when copying characters:

```c
#include <stdio.h>
#include <string.h>

int main(int argc, char** argv) {
  /* Array of 10 chars */
  char buffer[10];
  /* Copy at most 9 characters from argv[1] into buffer. */
  strncpy(buffer, argv[1], sizeof buffer - 1);
  /* Ensure that the buffer is null-terminated: */
  buffer[sizeof buffer - 1] = '\0';
  return 0;
}
```

C99 adds support for flexible array members to structures. This form of array declaration is allowed as the last element in structures only, and differs from normal arrays in that no length is specified to the compiler.

For a structure named `s` containing a flexible array member named `a`, `sizeof s` is therefore equivalent to `offsetof(s, a)`:

```c
#include <stdio.h>

struct flexarray {
  char val;
  int array[]; /* Flexible array member; must be last element of struct */
};

int main(int argc, char** argv) {
  printf("sizeof (struct flexarray): %zu\n", sizeof (struct flexarray));
  return 0;
}
```

In this case the sizeof operator returns the size of the structure, including any padding, but without any storage allowed for the array. Most platforms produce the following output: `sizeof (struct flexarray): 4`


## comma
- each expr evaluated from left to right, rightmost returned

```c
int a = 2;
// parens required
int x = (a=2, a++, a+10);
printf("%d\n", x);

int d, b, g, z;
z = (d=3, b=4, g=5, d+b+g);
printf("%d\n", z);
```

