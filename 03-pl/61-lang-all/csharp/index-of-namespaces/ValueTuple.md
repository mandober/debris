# ValueTuple
https://docs.microsoft.com/en-us/dotnet/api/system.valuetuple?view=netstandard-2.0

ValueTuple struct
  * Desc:
    Provides static methods for creating value tuples.
  * Namespace:
    System
  * Assemblies:
    - System.ValueTuple.dll
    - mscorlib.dll
    - netstandard.dll
    - System.Runtime.dll
  * Applies to:
    - .NET Core 2.1, 2.0, 1.1, 1.0
    - .NET Framework 4.7.2, 4.7.1, 4.7
    - .NET Standard 2.0
  * Inheritance:
    Object → ValueType → ValueTuple
  * Attributes:
    - SerializableAttribute
  * Implements:
    - IStructuralComparable
    - IStructuralEquatable
    - IComparable
    - IComparable<ValueTuple>
    - IEquatable<ValueTuple>


```cs
  [Serializable]
  public struct ValueTuple<T1> :
    IComparable, 
    IComparable<ValueTuple>, 
    IEquatable<ValueTuple>, 
    System.Collections.IStructuralComparable,
    System.Collections.IStructuralEquatable
```


## Remarks

A tuple is a data structure that has a specific number and sequence of elements.

An example of a tuple is a data structure with 3 elements (known as a 3-tuple or triple).

Value tuples are tuple types introduced in the .NET Framework 4.7 to provide the runtime implementation of tuples in C# and struct tuples in F#.

They differ from the tuple classes, such as `Tuple<T1>`, `Tuple<T1,T2>`, etc.:
- They are structures (value types) rather than classes (reference types).
- They are mutable rather then readonly; value of tuple components can change.
- Their data members, such as Item1, Item2..., are fields rather than props

The `ValueTuple` structure represents a tuple that has no elements.

It is useful primarily for its static methods that let you create and compare instances of value tuple types.

Its helper methods let you instantiate value tuples without having to explicitly specify the type of each value tuple component.

Calling its static `Create` methods creates value tuples of 0-8 components.

For value tuples with more than 8 components, you must call the 
`ValueTuple<T1,T2,T3,T4,T5,T6,T7,TRest>` constructor.


## Serialization and value tuples
The ValueTuple type is not serializable in .NET Core 1.x or in the .NET Framework 4.7 and earlier versions. In addition, .NET Standard, including .NET Standard 2.0, does not mandate serialization of ValueTuple instances; whether or not a ValueTuple instance is serializable depends on the individual .NET Standard implementation. To determine whether a ValueTuple type is serializable on a particular .NET implementation, get a Type object that represents the ValueTuple type and retrieve the value of its IsSerializable property. For a list of serializable types in .NET Core and the .NET Framework, see Binary Serialization.
