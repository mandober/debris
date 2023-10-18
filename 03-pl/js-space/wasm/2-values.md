# Values


Values:
- `i32` 32-Bit integer
- `i64` 64-Bit integer
- `f32` 32-Bit float
- `f64` 64-Bit float

* Values
  - 4 basic value types: ints and floats, in 32 and 64 bit width.
  - i32 are also *Booleans* and *memory addresses*
  - available: usual ops and conversions between the types
  - no distinction between signed and unsigned integer types, 
    only signed and unsigned instructions (in two's complement repr.)



## Values

- WebAssembly programs operate on primitive numeric values.
- number in memory is a little-endian sequence of bytes 
- immutable sequences of values can occur to represent more complex data, such as text strings or other vectors.

* Bytes
  - The simplest form of value are raw uninterpreted bytes
  - Bytes are sometimes interpreted as natural numbers n < 256
* Integers
  - distinguished by their width and signedness
  - uninterpreted integers whose signedness varies with context
  - main integer types in spec: u32, u64, s32, s64, i8, i16, i32, i64
