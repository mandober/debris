# Null Pointers

- constant literal zero
- null pointer constant
- null pointer
- NULL macro
- NUL

<!-- TOC -->

- [From C FAQ](#from-c-faq)
- [Constant literal zero](#constant-literal-zero)
- [Null pointer constant](#null-pointer-constant)
- [NULL macro](#null-macro)
- [Valid NULL pointer checks](#valid-null-pointer-checks)
- [Invalid NULL pointer check](#invalid-null-pointer-check)
- [Null Character](#null-character)

<!-- /TOC -->


## From C FAQ
http://c-faq.com/null/nullor0.html
NULL and 0 are interchangeable only in pointer contexts; an uncast 0 is perfectly acceptable (e.g. to compare against when checking for a null pointer).
Any usage of NULL (as opposed to 0) is just a reminder that a pointer is involved; programmers should not depend on it for distinguishing pointer 0's from integer 0's. It is only in pointer contexts that NULL and 0 are equivalent. NULL should not be used when another kind of 0 is required, even though it might work. Furthermore, if NULL is defined `#define NULL ((void *)0)` as opposed to `#define NULL 0`, it will not work at all in non-pointer contexts. In particular, do not use NULL when the ASCII null character (NUL) is desired, instead provide your own definition of ASCII null if needed.


## Constant literal zero
The integer *constant literal zero* (not a variable whose value is zero, but the compile-time literal constant 0) has different meanings depending upon the context in which it's used. In all cases, it is still an integer constant with the value 0, it is just described in different ways.


## Null pointer constant
If a pointer is being compared to the constant literal zero, then this is a check to see if the pointer is a *null pointer*. This 0 is then referred to as a __null pointer constant__.

The C standard defines that 0 cast to the type `void*` is both:
- a *null pointer* and
- a *null pointer constant*


## NULL macro
To help readability, the macro `NULL` is provided in several header files (`stddef.h`, `stdio.h`, etc.). It is meant to represent implementation defined *null pointer constant*.

> C Standard 2011 7.19.3: `NULL` expands to an implementation-defined null pointer constant, when any of several headers have been included:`<locale.h>`, `<stddef.h>`, `<stdio.h>`, `<stdlib.h>`, `<string.h>`, `<time.h>`, `<wchar.h>`

In `stddef.h`, NULL is defined (edited):

```c
/* A null pointer constant */
#undef NULL /* in case <stdio.h> has defined it */
/* C */
#define NULL ((void *)0)
/* C++ */
#define NULL 0
```

Depending on the compiler it might be possible to undefine it or redefine it as something completely different.


## Valid NULL pointer checks
Some of the valid ways to check for a null pointer:

`if (pointer == NULL)`
NULL is defined to compare equal to a null pointer. It is implementation defined what the actual definition of NULL is, as long as it is a valid null pointer constant.

`if (pointer == 0)`
0 is another representation of the null pointer constant.

`if (!pointer)`
This is an implicit check, similar to the previous.

In fact, whenever one writes: `if(expr)` where expr is any expression at all, the compiler essentially acts as if it had been written: `if((expr) != 0)`. And vice versa: `if(!expr)` is equal to `if((expr) == 0)`.
See http://c-faq.com/null/ptrtest.html


## Invalid NULL pointer check
This is INVALID way to check for a null pointer:

```c
int mynull = 0;
/* ...
more code using mynull
*/
if (pointer == mynull)
```

To the compiler this is not a check for a null pointer, but an __equality check on two variables__. It might work if `mynull` never changes in the code or if the compiler's optimization routine fold the `if` statement into 0; but this is not guaranteed and according to the C Standard the compiler has to produce at least one diagnostic message (warning or error).

Actual definition of the null pointer might be different across architectures and different implementations, however the meaning of null pointer must always be the same.

For example, if some architecture/implementation decided that the memory address 0xDEADBEEF is to represent a null pointer, then it is up to the compiler to deal with this representation however neccessary as long as it presents the null pointer in a way consistent with the standard. As such, even on this architecture, the checks (listed above) are still the only valid ways to check for a null pointer; and the following checks are still invalid because they are interpreted by the compiler as normal comparisons.

```c
// fictious architecture defines this address to be null pointer
#define MYNULL (void *) 0xDEADBEEF
// INVALID ways to check for a null pointer:
if (pointer == MYNULL);     // WRONG
if (pointer == 0xDEADBEEF); // WRONG
```

Even though any pointer variable that has this address is considered a null pointer, it cannot be compared directly because it is considered as a normal integer comparision.


## Null Character
Escape sequence `\0` is defined to be a *null character* - a character with all bits set to zero. It is the first character in UTF-8/ASCII table, usually denoted as `NUL`.

It has nothing to do with pointers. However you may see something similar to this code:

`if (!*string_pointer)`
checks if the string pointer is pointing at a null character

`if (*string_pointer)`
checks if the string pointer is pointing at a non-null character

Don't get these confused with null pointers. Just because the bit representation is the same, and this allows for some convenient cross over cases, they are not the same thing.

Additionally, '\0' is (like all character literals) an integer constant, in this case with the value zero. So '\0' is completely equivalent to an unadorned 0 integer constant - the only difference is in the intent that it conveys to a human reader i.e. "using this as a null character".

