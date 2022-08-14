# Unsafe

- [unsafe keyword][unsfkw]
- [allow unsafe blocks][unsfaub]


## Unsafe code pointers

- docs: [unsafe code pointers][unsfptr]

To maintain type safety and security, C# does not support pointer arithmetic, by default. However, by using the `unsafe` keyword, you can define an unsafe context in which pointers can be used.

In the common language runtime (CLR), unsafe code is referred to as unverifiable code. Unsafe code in C# is not necessarily dangerous; it is just code whose safety cannot be verified by the CLR. The CLR will therefore only execute unsafe code if it is in a fully trusted assembly. If you use unsafe code, it is your responsibility to ensure that your code does not introduce security risks or pointer errors.

Properties of unsafe code:
- Methods, types and code blocks can be defined as unsafe
- may increase performance by e.g. removing array bounds checks
- Unsafe code is required when you call native functions that require pointers.
- Using unsafe code introduces security and stability risks.
- to compile unsafe code, compile with `/unsafe` switch




## Compiler option

- docs: [unsafe compiler option][unsfco]
- `-unsafe` compiler option allows code that uses the unsafe keyword to compile

To set this in the Visual Studio: 
- Open the project's Properties page
- Click the Build property page
- Select the Allow Unsafe Code check box.

To add this option in a `csproj` file:
- Open the `.csproj` file for a project (in project root
- add the following:
      <PropertyGroup>
        <AllowUnsafeBlocks>true</AllowUnsafeBlocks>
      </PropertyGroup>



---

[unsfco] https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/compiler-options/unsafe-compiler-option
[unsfptr] https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/unsafe-code-pointers/
[unsfkw] https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/unsafe
[unsfaub]
https://docs.microsoft.com/en-us/dotnet/api/vslangproj80.csharpprojectconfigurationproperties3.allowunsafeblocks?view=visualstudiosdk-2017