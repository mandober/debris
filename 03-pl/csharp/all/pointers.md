# Pointer types

https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/unsafe-code-pointers/pointer-types

Besides value and reference types, unsafe context makes pointer types available.

A pointer type declaration takes one of the following forms:

```cs
unsafe {
  // declare pointer to int
  int* ip;
  
  // unlike C where this would declare a ptr to int (pnum) and an int (num),
  // in C# this declares 2 pointers to int
  int *pnum, num;
  
  // asterisk can stand anywhere
  int* ip1;
  int *ip2;
  int * ip3;

  // allowed but not recommended
  void* vp;
}
```

The type specified before the `*` in a pointer type is **referrent type**.

Any of the following types may be a referrent type:
- numbers
- char
- bool
- enum
- pointer (allows expressions such as ptr to ptr to int, e.g. `int**`)
- struct containing only unmanaged type fields


* Pointer types do not inherit from `Object`
* no conversions exist between pointer types and `Object`
* pointers do not support un/boxing
* can convert between pointers
* can convert between pointers and ints

When you declare multiple pointers in the same declaration, the asterisk is written together with the underlying type only; it is not used as a prefix to each pointer name.


```cs
int* p1, p2, p3; // Ok, same as:
int* p1; int* p2; int* p2;

int *p1, *p2, *p3; // Invalid in C#
```

A pointer CANNOT point to:
- a reference
- a struct that contains references
because an *object reference can be garbage collected even if a pointer is pointing to it*. The garbage collector does not keep track of whether an object is being pointed to by any pointer types.

The value of the pointer variable of type `myType*` is the address of a variable of type `myType`.

Examples of pointer type declarations:
- `int* p`      ptr to int
- `int** p`     ptr to ptr to int
- `int*[] p`    single-dimensional array of pointers to ints
- `char* p`     pointer to a char
- `void* p`     pointer to an unknown type


The pointer indirection operator `*` can be used to access the contents at the location pointed to by the pointer variable. For example, consider the following declaration: `int* myVariable;`. The expression `*myVariable` denotes the `int` variable found at the address contained in `myVariable`.


The following example uses the `unsafe` keyword and the `fixed` statement, and shows how to increment an interior pointer.

```cs
// normal pointer to an object (arrays are alloc on the heap, so they're obj)
int[] a = new int[5] { 10, 20, 30, 40, 50 };

// must be in unsafe code to use interior pointers
unsafe
{
    // must pin object on heap so it doesn't move (by GC)
    // while using interior pointers
    fixed (int* p = &a[0])
    {
        // p is pinned as well as object, so create another pointer to show incrementing it.
        int* p2 = p;
        Console.WriteLine(*p2);
        // Incrementing p2 bumps the pointer by four bytes due to its type ...
        p2 += 1;
        Console.WriteLine(*p2);
        p2 += 1;
        Console.WriteLine(*p2);
        Console.WriteLine("--------");
        Console.WriteLine(*p);
        // Dereferencing p and incrementing changes the value of a[0] ...
        *p += 1;
        Console.WriteLine(*p);
        *p += 1;
        Console.WriteLine(*p);
    }
}

Console.WriteLine("--------");
Console.WriteLine(a[0]);

/*
Output:
10
20
30
--------
10
11
12
--------
12
*/
```
