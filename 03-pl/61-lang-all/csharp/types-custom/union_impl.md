# Impl union in C#

https://stackoverflow.com/questions/126781/c-union-in-c-sharp

https://stackoverflow.com/questions/852442/c-sharp-equivalent-to-c-union?noredirect=1&lq=1

https://docs.microsoft.com/en-us/dotnet/api/system.runtime.interopservices.structlayoutattribute?redirectedfrom=MSDN&view=netframework-4.7.2

https://social.msdn.microsoft.com/Forums/sqlserver/en-US/a7010f2a-28dc-42ff-b13f-6a1007551f0a/how-to-implement-typedef-struct-union-in-c?forum=csharpgeneral



If you need to marshal it back and forth to native code without changing the 
native code, you can declare it with something like this:

```cs
enum tdFuncType : int
{
    TYPE_FLOAT,
    TYPE_STRING,
    TYPE_INTEGER,
    TYPE_DATETIME
}

[StructLayout(LayoutKind.Explicit, CharSet=CharSet.Ansi)]
struct tdFuncValueUnion
{
    [FieldOffset(0)]
    public double dFloat;
    [FieldOffset(0)]
    public int lInteger;
    //Not really a pointer, but time_t switches between __time32_t and __time64_t depending on the architecture so this at least gets the number of bytes right so marshalling will work correctly
    //Depending on what you want to do with it, you may want to define and/or use a different type
    [FieldOffset(0)]
    public IntPtr tDateTime;
    [FieldOffset(0), MarshalAs(UnmanagedType.ByValTStr, SizeConst = 256)]
    public string szString;
}

[StructLayout(LayoutKind.Sequential)]
struct tdFuncValue{
    [MarshalAs(UnmanagedType.ByValTStr, SizeConst = 256)]
    public string szNm;
    public tdFuncType ft;
    public tdFuncValueUnion val;
}

[StructLayout(LayoutKind.Sequential)]
struct tdFuncValues
{
    public int lCt;
    //If this memory footprint isn't always 11, there's no marshal based on another field value, so you'd want to marshal each subsequent tdFuncValue by adding the offsets calculated with Marshal.SizeOf to the pointer with IntPtr.Add
    //If it's always 11, use MarshalAs with ByValArray and SizeConst=11
    public tdFuncValue fv;
}
```