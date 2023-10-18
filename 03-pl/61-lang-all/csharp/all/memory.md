# Memory

Memory in C#:
- managed heap (GC)
- native memory (unmanaged, no GC)
- stack


Keywords
- `unsafe`
- `stackalloc`

Statements
- `fixed`
- `lock`, acquires mutex

Types
- `Span<T>` ref struct, stack-only type
- `System.Memory<T>` heap type
- `System.ReadOnlyMemory<T>` heap type
- `System.ReadOnlySpan<T>` spans that represent immutable structs
- `Memory<T>` struct that represents a contiguous region of memory
