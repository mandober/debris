# Arrays in PHP

In PHP, an array is a heterogenous data structure that stores a number of values under a single compound value (it is a very different type then the arrays of other languages, especially C).

Semantically, and up to a point syntactically as well, we can distinguish between *indexed arrays* and *associative arrays*, even though they're internally identical and implemented as an ordered map. A *ordered map* is a data structure that associates keys to values and keeps the entries sorted.

The line of distinction between these two kinds of arrays is a very thin one - an array, created as an indexed array, may become an associative array at any time, just by virtue of having the type of one key changed from `int` into any other type.

In other words, an array is an indexed array as long as its keys are indexed; and to be indexed, its keys must be integers. The moment any of them becomes something other then an integer, the whole array becomes associative.



## Indexed Arrays

- to qualify as indexed array, an array must have `int` type of keys, in which case they are called inexes (indices)

keys must be integers
- a key in an indexed array is called an *index* and 
- indexed array is an array with `int` type of keys
 indices and their type is 
- Keys need not be given explicitly, in which case PHP will assign sequential integers to each element, starting with zero.


As long as integers are provided as keys, an indexed array stays an indexed array.


    - A numeric string given as a key will be silently coerced to an int even with the `declare(strict_types=1)`.
    - If it cannot be converted to a number, an indexed array implicitly becomes an associated array.
    - In brief, an array is an indexed array only during the time the type of its keys are integers. The moment the type of keys changes, it becomes an associated array.

    However, an indexed array may become an associated one at any time, just by explicitly providing a key with a non-integer value (e.g. non-numeric strings).

  ASSOCIATIVE ARRAYS
    While it's still an indexed array, the keys (indices) need not be explicitally provided, and they will start at zero (for the first element); they will also be auto-incremented for subsequent entries. However, if an idex is explicitly given and it is larger then the current, auto-generated, one, then an array becomes sparse.

In PHP, an array, considered as a value, is a heterogenous data structure that stores a number of values under one aggregate value of compound type.

Technically, PHP's array is closer to a vector, since it is extendable and the elements are always stored on the heap (an array is homogeneous and fixed, therefore its elements are stored on the stack by default). While a vector's "payload" is always stored on the heap, it also has a stack component (in the form of a pointer) that is a "handle" to the payload.

PHP distinguishes between *indexed arrays* and *associative arrays*, even though both are internally implemented as an ordered map, which is a data structure that associates keys to values, while keeping the entries ordered.

In an **indexed array** the keys are integers or strings (that is, numeric strings coerceable to integers). However, an indexed array may become an associated one at any time, just by explicitly providing a key with a non-integer value (e.g. non-numeric strings).

While it's still an indexed array, the keys (indices) need not be explicitally provided, and they will start at zero (for the first element); they will also be auto-incremented for subsequent entries. However, if an idex is explicitly given and it is larger then the current, auto-generated, one, then an array becomes **sparse**.
