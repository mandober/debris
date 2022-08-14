# Typed Arrays

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Indexed_collections

Enabling JS code to easily manipulate raw binary data in typed arrays.

To achieve maximum flexibility and efficiency, **JavaScript typed arrays** split the implementation into buffers and views.

A **buffer**, implemented by the `ArrayBuffer` object, is an object representing a chunk of data. The ArrayBuffer is a data type that is used to represent a generic, fixed-length binary data buffer. You can't directly manipulate the contents of an ArrayBuffer; instead, you create a typed array view or a DataView which represents the buffer in a specific format, and use that to read and write the contents of the buffer.

A **view** provides a context, that is, a data type, starting offset, and number of elements, that turns the raw data into an actual typed array.

## Typed array views

Typed array views have self descriptive names and provide views for all the usual numeric types like Int8, Uint32, Float64 and so forth. There is one special typed array view, the Uint8ClampedArray. It clamps the values between 0 and 255. This is useful for Canvas data processing, for example.

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Indexed_collections

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/TypedArray

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Typed_arrays



## Typed array views

i/u 8 | 16 | 32 | 64    f 32 | 64

Type              |B|Web IDL type       |C type                       
------------------|-|-------------------|-----------------------------
Int8Array         |1|byte               |int8_t                       
Uint8Array        |1|octet              |uint8_t                      
Uint8ClampedArray |1|octet              |uint8_t                      
Int16Array        |2|short              |int16_t                      
Uint16Array       |2|unsigned short     |uint16_t                     
Int32Array        |4|long               |int32_t                      
Uint32Array       |4|unsigned long      |uint32_t                     
BigInt64Array     |8|bigint             |int64_t (signed long long)   
BigUint64Array    |8|bigint             |uint64_t (unsigned long long)
Float32Array      |4|unrestricted float |float                        
Float64Array      |8|unrestricted double|double                       



JS TA  |B | Rust |   C    | _t      | s        |             
-------|--|------|--------|---------|----------|-------------
    Int| 8|  i8  |   byte |   int8_t|   signed |             
   Uint| 8|  u8  |        |  uint8_t| unsigned |             
    Int|16| i16  |  short |  int16_t|   signed |             
   Uint|16| u16  |        | uint16_t| unsigned |             
    Int|32| i32  |    int |  int32_t|   signed |             
   Uint|32| u32  |        | uint32_t| unsigned |             
 BigInt|64| i64  |   long |  int64_t|   signed |             
BigUint|64| u64  |        | uint64_t| unsigned |             
  Float|32| f32  |  float |         |          |             
  Float|64| f64  | double |         |          |             
