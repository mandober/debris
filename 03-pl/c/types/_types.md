# Types

Objects, functions, and expressions have a property called type, which determines the interpretation of the binary value stored in an object or evaluated by the expression.


## Declarations

The constructions:
(a) int
(b) int *
(c) int *[3]
(d) int (*)[3]
(e) int (*)[*]
(f) int *()
(g) int (*)(void)
(h) int (*const [])(unsigned int, ...)

name respectively the types:
(a) int
(b) pointer to int
(c) array of three pointers to int
(d) pointer to an array of three ints
(e) pointer to a variable length array of an unspecified number of ints
(f) function with no parameter specification returning a pointer to int
(g) pointer to function with no parameters returning an int
(h) array of an unspecified number of constant pointers to functions, each with one parameter that has type unsigned int and an unspecified number of other parameters, returning an int.


The following pair of declarations demonstrates the difference between a "variable pointer to a constant value" and a "constant pointer to a variable value":

```c
const int* ptr_to_constant;
int* const constant_ptr;

const int* const constant_ptr;
```

The contents of any object pointed to by `ptr_to_constant` shall not be modified through that pointer, but `ptr_to_constant` itself may be changed to point to another object. Similarly, the contents of the `int` pointed to by `constant_ptr` may be modified, but `constant_ptr` itself shall always point to the same location.

The declaration of the constant pointer `constant_ptr` may be clarified by including a definition for the type "pointer to int":
```c
typedef int *int_ptr;
const int_ptr constant_ptr;
```
declares `constant_ptr` as an object that has type "const-qualified pointer to int".

Declares an array of float numbers and an array of pointers to float numbers:
```c
float fa[11], *afp[17];


extern int *x;
extern int y[];
```
The first declares `x` to be a pointer to `int`; the second declares `y` to be an array of `int` of unspecified size (an incomplete type), the storage for which is defined elsewhere.

The following declarations demonstrate the compatibility rules for variably modified types:
```c
extern int n;
extern int m;
void fcompat(void) {
  int a[n][6][m];
  int (*p)[4][n+1];
  int c[n][n][6][m];
  int (*r)[n][n][n+1];

  p = a; /* invalid: not compatible because 4 != 6 */
  r = c; /* compatible, but defined behavior only if n = 6 and m = n+1 */
}
```


All declarations of variably modified (VM) types have to be at either block scope or function prototype scope. Array objects declared with the `_Thread_local`, `static`, or `extern` storage-class specifier cannot have a variable length array (VLA) type. However, an object declared with the static storage-class specifier can have a VM type (that is, a pointer to a VLA type). Finally, all identifiers declared with a VM type have to be ordinary identifiers and cannot, therefore, be members of structures or unions:

```c
extern int n;
int A[n];             // invalid: file scope VLA
extern int (*p2)[n];  // invalid: file scope VM
int B[100];           // valid: file scope but not VM

void fvla(int m, int C[m][m]); // valid: VLA with prototype scope

void fvla(int m, int C[m][m])  // valid: adjusted to auto pointer to VLA
{
  
  typedef int VLA[m][m]; // valid: block scope typedef VLA
  
  struct tag {
    int (*y)[n]; // invalid: y not ordinary identifier
    int z[n];    // invalid: z not ordinary identifier
  };
  
  int D[m];                // valid: auto VLA
  static int E[m];         // invalid: static block scope VLA
  extern int F[m];         // invalid: F has linkage and is VLA
  int (*s)[m];             // valid: auto pointer to VLA
  extern int (*r)[m];      // invalid: r has linkage and points to VLA
  static int (*q)[m] = &B; // valid: q is a static block pointer to VLA
}
```



## Type classification

- `void` type
- Basic types
- Enumerated types
- Derived types


Basic types:
- `char`
- signed integer types:
  - standard:
    - `signed char`
    - `short, int`
    - `long`
    - `long long` (since C99)
  - extended: implementation defined (e.g. `__int128`)
- unsigned integer types:
  - standard:
    - `_Bool` (since C99)
    - `unsigned char`
    - `unsigned short`
    - `unsigned int`
    - `unsigned long`
    - `unsigned long long` (since C99)
  - extended: implementation-defined (e.g. `__uint128`)
- floating types:
  - real floating types:
    - `float`
    - `double`
    - `long double`
  - complex types:
    - `float _Complex`
    - `double _Complex`
    - `long double _Complex`
  - imaginary types:
    - `float _Imaginary`
    - `double _Imaginary`
    - `long double _Imaginary`


Derived types
- array
- structure
- union
- function
- pointer
- atomic

Every type can have several qualified versions of its type, realized by the combinations of qualifiers (where semantically allowed):
- `const`
- `volatile`
- `restrict`


## Type groups
- objects: all types except function types
- characters:
  - `char`
  - `signed char`
  - `unsigned char`
- integers:
  - `char`
  - signed integer types
  - unsigned integer types
  - enumerated types
- real types: 
  - integer types
  - real floating types
- arithmetic types:
  - integer types
  - floating types
- scalars:
  - arithmetic types
  - pointer types
- aggregates:
  - array types
  - structure types
- derived declarator types:
  - array types
  - function types
  - pointer types


## Compatible types

In a C program, the declarations referring to the same object or function in different translation units do not have to use the same type. They only have to use sufficiently similar types, formally known as compatible types.

The same applies to function calls and lvalue accesses: argument types must be compatible with parameter types and lvalue expression type must be compatible with the object type that is accessed.

The type `char` is not compatible with `signed char` and not compatible with `unsigned char`. (?)



## Data Types in C

Scalar types and their size in bytes (impl dependent):
- `char`        1
- `short`       2
- `int`         4
- `long`        4
- `long long`   8
- `float`       4
- `double`      8


Types qualifiers:
- sign qualifiers: `signed` (default) and `unsigned`
- size qualifiers (impl dependent): `short` and `long`
- size of many types is compiler dependent


Type (@ x64 Cygwin)  | Size | Range                        | alt
---------------------|-----:|------------------------------|-----------------
(signed) char        | `1`  |        `-128` to `127`       | int8_t
unsigned char        | `1`  |           `0` to `255`       | uint8_t
(signed) short (int) | `2`  |      `-32768` to `32767`     | int16_t
unsigned short (int) | `2`  |           `0` to `65535`     | uint16_t
(signed) int         | `4`  | `-2147483648` to `2147483647`| int32_t
unsigned int         | `4`  |           `0` to `4294967295`| uint32_t
(signed) long long   | `8`  |        `-2^7` to `2^7-1`     | int64_t
unsigned long long   | `8`  |           `0` to `2^8-1`     | uint64_t
float                | `4`  |     `3.4E-38` to `3.4E+38`   | 
double               | `8`  |    `1.7E-308` to `1.7E+308`  |
long double          |`16`  |   `3.4E-4932` to `3.4E+4932` |


signed: ${-({2^{n-1}})}$ to ${{2^{n-1}}-1}$
unsigned: 0 to ${{2^n}-1}$, n = number of bits


C99 `stdint.h` header defines integers independent of impl of C:
- (u)intN_t, (u)int_leastN_t, (u)int_fastN_t, (u)intptr_t, (N = 8,16,32,64)
- (u)intmax_t



---
Links:
- [C data types](https://www.wikiwand.com/en/C_data_types)

