# typedef

- syntax: `typedef type declaration;`
- `typedef` is used to create an alias name for another data type.
- used to provide descriptive or context specific names for types and   
  to document the meaning of a variable within the programming context.   
  to simplify the syntax of declaring complex data structures   
- The C standard library and POSIX reserve the suffix `_t` (e.g. `size_t`)




```c
typedef int len;
typedef len wid;   // ok
//unsigned len b;  // error: cannot use type qualifiers
static len b;      // ok: can use modifiers

// creates the type `FALSE` as a synonym of 0
typedef FALSE 0;
// ...and now you have a 4-byte boolean
```

`typedef` is used to simplify the declaration of a compound or pointer type.


To avoid using `struct` keyword when declaring a struct instance.

```c
// struct
struct MyStruct {
  int data1;
  char data2;
};
// struct keyword is required
struct MyStruct a;
// use typedef to get around that (later, after decleration)
typedef struct MyStruct newtype;
// now just type:
newtype a;


// can be combined into a single statement
typedef struct MyStruct {
  int data1;
  char data2;
} newtype;


// struct type name can be left out
typedef struct {
    int data1;
    char data2;
} newtype;
```

In C++, in contrast to C, the keywords `struct`, `class`, and `enum` are optional in variable declarations that are separate from the definitions, as long as there is no ambiguity to another identifier:

```cpp
struct MyStruct x; // This is legal
MyStruct y;        // This is also legal
```

As such, `MyStruct` can be used wherever newtype can be used. However, the reverse is not true; for instance, the constructor methods for `MyStruct` cannot be named newtype.

A notorious example where even C++ needs the `struct` keyword is the POSIX `stat` system call that uses a struct of the same name in its arguments, so both C and C++ need the struct keyword in the parameter definition.

```c
int stat(const char *filename, struct stat *buf);
```





---
http://en.cppreference.com/w/c/language/typedef
https://www.wikiwand.com/en/Typedef
https://overiq.com/c-programming/101/typedef-statement-in-c/