# Arrays

[Array declaration - cppreference.com](http://en.cppreference.com/w/c/language/array)

- array is accessed with indexed, which can be negative
- no bounds checks


```c
array == &array[0]
array + k == &array[k]
*array == array[0]
*(array + k) == array[k]
```

## Array declaration

Array is a type consisting of a contiguously allocated, nonempty, sequence of objects with a particular element type. The number of those objects, *the array size never changes* during the array lifetime.

In the declaration of an array, the type-specifier designates the element type and it must be a *complete type*. 

There are several array variations: 
- array of known constant size
- variable-length array (VLA)
- array of unknown size

Declarator for VLA can only appear in fn prototype scope.

## Arrays of constant known size
If expression in an array declarator is an integer constant expression (greater than zero) and the element type is a type with a known constant size, that is, elements are not VLA (since C99), then the declarator declares an array of constant known size:

```c
// integer constants are constant expressions
int n[10];

// sizeof is a constant expression
char o[sizeof(double)];

// enum constants are constant expressions
enum { MAX_SZ=100 };
int n[MAX_SZ];
```

Arrays of constant known size can use *array initializers* to provide their initial values:

```c
// explicit size
int a[5] = {1,2,3}; // declares int[5] initalized to 1,2,3,0,0

// array from string: implicit array size
char b[]  = "abc"; // declares b[4] = {'a','b','c',   '\0'}
char c[5] = "abc"; // declares c[5] = {'a','b','c','','\0'}
```


## Variable-length arrays

If expression is not an integer constant expression, the declarator is for an array of variable size.

Each time the flow of control passes over the declaration, expression is evaluated (and it must always evaluate to a value greater than zero), and the array is allocated (correspondingly, lifetime of a VLA ends when the declaration goes out of scope). The size of each VLA instance does not change during its lifetime, but on another pass over the same code, it may be allocated with a different size. (since C99)

```c
{
   int n = 1;
   
label:
   int a[n]; // re-allocated 10 times, each with a different size
   
   printf("The array has %zu elements\n", sizeof a / sizeof *a);
   
   if (n++ < 10) goto label; 
   
   // leaving the scope of a VLA ends its lifetime
}
```

> If the size is `*`, the declaration is for a **VLA of unspecified size**.

> Such declaration may only appear in a _function prototype scope_, and declares an array of a **complete type**. 

> In fact, all VLA declarators in function prototype scope are treated as if expression were replaced by `*`.

```c
// function prototype
void foo(size_t x, int a[*]);

// function definition
void foo(size_t x, int a[x]) {
  printf("%zu\n", sizeof a); // same as sizeof(int*)
}
```


Variable-length arrays and the types derived from them (pointers to them, etc) are commonly known as **variably-modified types** (VM types).

Objects of any variably-modified type may only be declared at *block scope* or *function prototype scope*.

```c
extern int n;
int A[n];                         // Error: file scope VLA
extern int (*p2)[n];              // Error: file scope VM
int B[100];                       // OK: file-scope array of constant known size
void fvla(int m, int C[m][m]);    // OK: prototype-scope VLA
```

VLA must have *automatic storage duration*. Pointers to VLA, but not VLA themselves may also have *static storage duration*. No VM type may have linkage.

```c
void fvla(int m, int C[m][m]) { // OK: block scope/auto duration pointer to VLA
  typedef int VLA[m][m];      // OK: block scope VLA
  int D[m];                   // OK: block scope/auto duration VLA
    static int E[m];            // ER: static duration VLA
    extern int F[m];            // ER: VLA with linkage
  int (*s)[m];                // OK: block scope/auto duration VM
    extern int (*r)[m];         // ER: VM with linkage
  static int (*q)[m] = &B;    // OK: block scope/static duration VM}
}
```


> Variably-modified types cannot be members of structs or unions (since C99)

```c
struct tag {
  int z[n];     // Error: VLA struct member
  int (*y)[n];  // Error: VM struct member
};
```

If the compiler defines the macro constant `__STDC_NO_VLA__` to integer constant `1`, then VLA and VM types are not supported.



## Arrays of unknown size

> If expression in an *array declarator* is omitted, it declares an **array of unknown size**.

Array of unknown size is an **incomplete type**, except in function parameter lists (where such arrays are transformed to pointers) or when an initializer is available.

Note that VLA of unspecified size, declared with a `*` as the size, is a complete type (since C99)

```c
extern int x[];    // the type of x is "array of unknown bound of int"

int a[] = {1,2,3}; // the type of a is "array of 3 int"
```


Within a struct definition, an array of unknown size may appear as the *last member* as long as there is at least one other named member, in which case it is a special case known as **flexible array member** (FAM).

```c
struct s { 
  int n; 
  double d[]; // s.d is a flexible array member 
};

// as if d was `double d[8]`
struct s *s1 = malloc(sizeof (struct s) + (sizeof (double) * 8));
```


## Qualifiers
If an array type is declared with a `const`, `volatile`, `restrict` (since C99), or `_Atomic` (since C11) qualifier (which is possible through the use of typedef), the array type is not qualified, but its element type is:

```c
typedef int A[2][3];
const A a = {{4, 5, 6}, {7, 8, 9}}; // array of array of const int
int* pi = a[0]; // Error: a[0] has type const int*
```

## Assignment
*Objects of array type are not modifiable lvalues*, and although their address may be taken, they cannot appear on the left hand side of an assignment operator. However, __structs with array members are modifiable lvalues and can be assigned__:

```c
// array of 3 int
int a[3] = {1,2,3}, b[3] = {4,5,6};

// pointer to array of 3 int
int (*p)[3] = &a;    // okay, address of `a` can be taken

// a = b;            // error, `a` is an array

struct {
  int c[3];
} s1, s2 = {3,4,5};

s1 = s2; // okay: can assign structs holding array members
```

## Initialization

When an array is initialized with a *brace-enclosed list of initializers*, the first initializer in the list initializes the array element at index zero (unless a *designator* is specified) (since C99), and each subsequent initializers without a *designator* (since C99) initializes the array element at index one greater than the one initialized by the previous initializer.

```c
int x[]  = {1,2,3}; // x has type int[3] and holds 1,2,3
int y[5] = {1,2,3}; // y has type int[5] and holds 1,2,3,0,0
int z[3] = {0};     // z has type int[3] and holds all zeroes
```

It's an error to provide more initializers than elements when initializing an array of known size; except when initializing character arrays from string literals.

A *designator* causes the following initializer to initialize of the array element described by the designator. Initialization then continues forward in order, beginning with the next element after the one described by the designator. (since C99)

```c
// holds 1,2,3,4,5
int n[5] = { [4] = 5, [0] = 1, 2, 3, 4 }

// starts initializing a[0] = 1, a[1] = 3, ...
int a[MAX] = { 1, 3, 5, 7, 9, [MAX-5] = 8, 6, 4, 2, 0 }
// for MAX=6,  array holds 1,8,6,4,2,0
// for MAX=13, array holds 1,3,5,7,9,0,0,0,8,6,4,2,0 ("sparse array")
```

> When initializing an array of unknown size, the largest subscript for which an initializer is specified determines the size of the array being declared.




## Nested arrays
If the elements of an array are arrays, structs, or unions, the corresponding initializers in the brace-enclosed list of initializers are any initializers that are valid for those members, except that their braces may be omitted as follows:

If the nested initializer begins with an opening brace, the entire nested initializer up to its closing brace initializes the corresponding array element:

```c
int y[4][3] = { // array of 4 arrays of 3 ints each (4x3 matrix)
    { 1 },      // row 0 initialized to {1, 0, 0}
    { 0, 1 },   // row 1 initialized to {0, 1, 0}
    { [2]=1 },  // row 2 initialized to {0, 0, 1}
};              // row 3 initialized to {0, 0, 0}
```


If the nested initializer does not begin with an opening brace, only enough initializers from the list are taken to account for the elements or members of the sub-array, struct or union; any remaining initializers are left to initialize the next array element:

```c
int y[4][3] = { // array of 4 arrays of 3 ints each (4x2 matrix)
1, 3, 5, 2, 4, 6, 3, 5, 7 // row 0 initialized to {1, 3, 5}
};                        // row 1 initialized to {2, 4, 6}
                          // row 2 initialized to {3, 5, 7}
                          // row 3 initialized to {0, 0, 0}


// array of structs
struct {
  int a[3];
  int b;
} w[] = { 
  {1}, // taken to be fully-braced initializer for element #0 of the array
       // that element is initialized to { {1, 0, 0}, 0}
   2 // taken to be the first initialized for element #1 of the array
     // that element is initialized { {2, 0, 0}, 0}
};
```

Array designators may be nested; the bracketed constant expression for nested arrays follows the bracketed constant expression for the outer array:

```c
int y[4][3] = {
     [0][0]=1, // row 0 initialized to {1, 0, 0}
     [1][1]=1, // row 1 initialized to {0, 1, 0}
     [2][0]=1  // row 2 initialized to {1, 0, 0}
               // row 3 initialized to {0, 0, 0}
};
```




## Examples

```c
// ARRAY TO POINTER CONVERSION
int a[3] = {1,2,3};
int* p = a;
printf("%zu\n", sizeof a); // prints size of array
printf("%zu\n", sizeof p); // prints size of a pointer



// ARRAY IN FN PARAMETER LIST is transformed to pointer:
void f(int a[], int sz); 

// actually declares:

// int f(int* a,  int sz);
int a[10];
f(a, 10); 
// converts a to int*, passes the pointer



// MULTIDIMENSIONAL ARRAY

// when array-to-pointer conversion is applied, a multidimensional array is
// converted to a pointer to its first element i.e. pointer to the first row
//
int a[2][3];         // 2x3 matrix
int (*p1)[3] = a;    // pointer to the first 3-element row


int b[3][3][3];      // 3x3x3 cube
int (*p2)[3][3] = b; // pointer to the first 3x3 plane

// Multidimensional arrays may be variably modified in every dimension:
int n = 10;
int a[n][2*n];



// SIZEOF GUARANTEES

// If the size expression of a VLA has side effects, they are GUARANTEED to
// be produced EXCEPT when it is a part of a sizeof expression whose result
// doesn't depend on it:

int n = 5;
int m = 7;
size_t sz = sizeof(int (*)[n++]); // may or may not increment n




// The following four array declarations are the same
short q1[4][3][2] = {
    { 1 },
    { 2, 3 },
    { 4, 5, 6 }
};
short q2[4][3][2] = {1, 0, 0, 0, 0, 0, 2, 3, 0, 0, 0, 0, 4, 5, 6};
short q3[4][3][2] = {
    {
        { 1 },
    },
    {
        { 2, 3 },
    },
    {
        { 4, 5 },
        { 6 },
    }
};
short q4[4][3][2] = {1, [1]=2, 3, [2]=4, 5, 6};


// Character names can be associated with enumeration constants
// using arrays with designators:
enum { RED, GREEN, BLUE };
const char *nm[] = {
    [RED] = "red",
    [GREEN] = "green",
    [BLUE] = "blue",
};
```