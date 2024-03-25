# malloc

`malloc`

```c
void* malloc( size_t size );
```

- Defined in header `<stdlib.h>`
- Allocates 'size' bytes of uninitialized storage.
- `size` is the number of bytes to allocate
- Return value: on success, returns the pointer to the beginning of newly allocated memory. On failure, returns `NULL`.
- If allocation succeeds, returns a pointer to the lowest (first) byte in the allocated memory block that is suitably aligned for any object type.
On success, returns the pointer to the beginning of newly allocated memory. To avoid a memory leak, the returned pointer must be deallocated with `free` or `realloc`-ated.
- If size is zero, `NULL` pointer is returned (although the exact behavior is implementation defined; alternatively, a non-null pointer is returned that is not to be used to access storage, but has to be passed to `free`).
- (since C11) `malloc` is thread-safe: it behaves as though only accessing the memory locations visible through its argument, and not any static storage.
- (since C11) A previous call to `free` or `realloc` that deallocates a region of memory *synchronizes-with* a call to `malloc` that allocates the same or a part of the same region of memory. This synchronization occurs after any access to the memory by the deallocating function and before any access to the memory by `malloc`. There is a single total order of all allocation and deallocation functions operating on each particular region of memory.



`realloc`

```c
void* realloc(previous_ptr, size_t size);
```

- Defined in header `<stdlib.h>`
- realloc might extend previous allocation in place if there is enough size.
- if first param is NULL it works the same as `malloc`
- it return NULL in OOM case
- slim chance that realloc will honor a request to shrink a memory chunk, previously issued by either malloc or realloc.


---

[malloc - cppreference.com](https://en.cppreference.com/w/c/memory/malloc
)