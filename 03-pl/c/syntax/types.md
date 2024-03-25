# Type support

https://en.cppreference.com/w/c/types
https://en.cppreference.com/w/c/language/type
https://en.cppreference.com/w/c/language/arithmetic_types

https://en.cppreference.com/w/c/language/object
https://en.cppreference.com/w/c/language/functions
https://en.cppreference.com/w/c/language/expressions


See also *type system overview* and *arithmetic types* defined by the language.

C Type support
- Basic types - additional basic types and convenience macros
- Fixed width integer types (since C99)
- Numeric limits

## Type classification

The C type system consists of the following types:
- *void* type
- basic types
  - *char*
  - signed integer types
    - standard:
      - *signed char*
      - *short*
      - *int*
      - *long*
      - *long long* (since C99)
    - bit-precise: `_BitInt(N)` where N is an integer constant expression that specifies the number of bits that are used to represent the type, including the sign bit. Each value of N designates a distinct type (since C23)
    - extended: implementation defined, e.g. `__int128` (since C99)
  - unsigned integer types
    - standard:
      - `_Bool` (since C99)
      - *unsigned char*
      - *unsigned short*
      - *unsigned int*
      - *unsigned long*
      - *unsigned long long* (since C99)
    - bit-precise: unsigned `_BitInt(N)` where N is an integer constant expression that specifies the number of bits that are used to represent the type. Each value of N designates a distinct type. This category includes the type unsigned _BitInt(1) which does not have a corresponding bit-precise signed integer type (since C23)
    - extended: implementation-defined, e.g. `__uint128` (since C99)
  - floating-point types
    - real floating-point types:
      - float
      - double
      - long double
    - decimal real floating-point types:
      - _Decimal32
      - _Decimal64
      - _Decimal128 (since C23)
    - complex types:
      - float _Complex
      - double _Complex
      - long double _Complex
    - imaginary types:
      - float _Imaginary
      - double _Imaginary
      - long double _Imaginary (since C99)
- enumerated types
- derived types
  - array types
  - structure types
  - union types
  - function types
  - pointer types
  - atomic types (since C11)


For every type listed above several *qualified versions of its type* may exist, corresponding to the combinations of one, two, or all three of the `const`, `volatile`, and `restrict` qualifiers (where allowed by the qualifier's semantics).

## Type groups

- object types:
  - all types except function types
- character types:
  - char
  - signed char
  - unsigned char
- integer types:
  - char
  - signed integer types
  - unsigned integer types
  - enumerated types
- real types:
  - integer types
  - real floating types
- arithmetic types:
  - integer types
  - floating types
- scalar types:
  - arithmetic types
  - pointer types
  - `nullptr_t` (since C23)
- aggregate types:
  - array types
  - structure types
- derived declarator types:
  - array types
  - function types
  - pointer types

Constructing a *complete object type* such that the number of bytes in its object representation is not representable in the type `size_t` (i.e. the result type of `sizeof` operator), including forming such a *VLA type* at runtime (since C99) is undefined behavior.

## Compatible types



## Composite types



## Incomplete types



## Type names
