# Types

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/built-in-types-table


- Value type store immediate data
- Reference types (objects) store refs (ptrs on stack) to the data (on heap)
- In unsafe mode, pointer types (counted as ref types) become available
- **Boxing** wraps a value type into a ref type; **unboxing** undoes it.
- Reference types can be `null`; value types cannot.
- Nullable value types can hold `null` (prepend ? to type, e.g. `int?`)


Cs Type | System. |Suf|Size | Range
--------|--------:|---|----:|:--------------------:
sbyte   | SByte   |   |   8 |      -2^7  to  2^7–1
short   | Int16   |   |  16 |      –2^15 to 2^15–1
int     | Int32   |   |  32 |      –2^31 to 2^31–1
long    | Int64   | L |  64 |      –2^63 to 2^63–1
byte    | Byte    |   |   8 |          0 to 2^8–1
ushort  | UInt16  |   |  16 |          0 to 2^16–1
uint    | UInt32  | U |  32 |          0 to 2^32–1
ulong   | UInt64  | UL|  64 |          0 to 2^64–1
float   | Single  | F |  32 | ±  ~10^–45 to 10^38
double  | Double  | D |  64 | ± ~10^–324 to 10^308
decimal | Decimal | M | 128 | ±  ~10^–28 to 10^28
bool    | Bool    |   |  16 |
T*      | IntPtr  |   |  64 |



- `System.IntPtr` platform-specific type representing a pointer or handle.

## Data model
https://www.wikiwand.com/en/64-bit_computing

There are various 64-bit data models: LP64, ILP64

.NET uses LP64: longs and pointers are 64-bits.
Contrast this with ILP64 where ints are also 64-bits.
Thus, on all LP64 platforms, int is 32-bits and long is 64-bits; you can see this in the names of the underlying types System.Int32 and System.Int64.



## Type system

1. Value types
  - Simple types (impl as structs)
    - Boolean, `bool`
    - Character, `char`
    - Numbers
      - Integrals
        - Unsigned: `byte`, `ushort`, `uint`, `ulong`,
        - Signed:  `sbyte`,  `short`,  `int`,  `long`,
      - Floating points: `float`, `double`, `decimal`
  - Array (of scalars)
  - struct
  - enum
2. Reference types
  - Pointer types (unsafe mode only)
  - string (object)
  - objects



## Declaration

Declaration and definition of vars seems to work like in JS: in the initial pass by the compiler, a variable just gets declared (its identifier is placed in the symbol table), and only in the subsequent pass it is assigned a value:

```cs
int num = 5 + (num = 3);
// seems to work like this:
int num;
// because compiler would normally complain about undeclared var
num = 3;
num = 5 + 3;
```


## Defaults

```cs
var n = default(int);  // 0
var b = default(bool); // false
```


## default values

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/default-values-table


## dynamic

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/dynamic


## System.Type

`System.Type` represents type declarations:
- class types
- interface types
- array types
- value types
- enumeration types
- type parameters
- generic type definitions
- open or closed constructed generic types

```cs
Reflections obj = new Reflections();
Type t = obj.GetType();
```


## Type Class

https://docs.microsoft.com/en-us/dotnet/api/system.type?view=netframework-4.7.2

`Type` class in .NET Framework 4.7.2

inheritance: `Object` > `Member` > `InfoType`

inherits:
- `System.Reflection.MemberInfo`

implements:
- `System.Reflection.IReflect`
- `System.Runtime.InteropServices._Type`


```cs
[System.Runtime.InteropServices.ClassInterface(System.Runtime.InteropServices.ClassInterfaceType.None)]
[System.Runtime.InteropServices.ComVisible(true)]
[Serializable]
public abstract class Type : System.Reflection.MemberInfo, System.Reflection.IReflect, System.Runtime.InteropServices._Type
```

