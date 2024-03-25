# Simple types

Simple types:
- `char`
- `bool`
- Numbers
  - 4 signed integer types
  - 4 unsigned integer types
  - 3 floating-point types


The simple data types are **aliases for structs** that represent the data types in the .NET Framework; e.g. you can use `int` or `System.Int32`.



## Char Type

`char` type contains a single Unicode character, UTF-16 encoded (2 bytes, fixed encoding) in single quotes. UTF-16 is used in Windows; Linux uses UTF-8 (1-4 bytes variable encoding).

```cs
char c = '3'; // Unicode char
```

## Bool Type

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/bool

The `bool` keyword is an alias of `System.Boolean`. It is used to declare variables to store the Boolean values, `true` and `false`.

- For Boolean variableto also store a `null`, use bool nullable type, `bool?`
- The default value of a `bool` variable is `false`.
- The default value of a `bool?` variable is `null`.
- In C# there is no conversion between the `bool` type and other types.
