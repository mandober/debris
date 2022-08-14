# ValueTuple

ValueTuple struct
- Provides static methods for creating value tuples.
- Namespace: System
- Assemblies:
  - System.ValueTuple.dll
  - mscorlib.dll
  - netstandard.dll
  - System.Runtime.dll




# ValueTuple<T1>

ValueTuple<T1> Struct
- Represents a value tuple with a single component.
- Namespace: System
- Assemblies:
  - System.ValueTuple.dll
  - mscorlib.dll
  - netstandard.dll
  - System.Runtime.dll

```cs
[Serializable]
public struct ValueTuple<T1> : 
  IComparable, 
  IComparable<ValueTuple<T1>>, 
  IEquatable<ValueTuple<T1>>, 
  System.Collections.IStructuralComparable,
  System.Collections.IStructuralEquatable
```

* Type Parameters:
  - `T1` The type of the value tuple's only element.
* Inheritance:
  - ObjectValueTypeValueTuple<T1>
* Attributes
  - SerializableAttribute
* Implements
  - IStructuralComparable 
  - IStructuralEquatable
  - IComparable
  - IComparable<ValueTuple<T1>>
  - IEquatable<ValueTuple<T1>>


## Remarks
Value tuple is a data structure that has a specific number and sequence of values. The `ValueTuple<T1>` structure represents a value tuple that has one element.


The value tuple types differ from the tuple types (such as Tuple<T1> as follows:

They are structures (value types) rather than classes (reference types).

Its Item1 member is a field rather than a property.

Its field is mutable rather than read-only.

The value tuple types provide the runtime implementation that supports tuples in C# and struct tuples in F#. In addition to creating a ValueTuple<T1> instance by using language syntax, you can call the ValueTuple.Create<T1>(T1) factory method.

Serialization and value tuples
The ValueTuple<T1> type is not serializable in .NET Core 1.x or in the .NET Framework 4.7 and earlier versions. In addition, .NET Standard, including .NET Standard 2.0, does not mandate serialization of ValueTuple<T1> instances; whether or not a ValueTuple<T1> instance is serializable depends on the individual .NET Standard implementation. To determine whether a ValueTuple<T1> type is serializable on a particular .NET implementation, get a Type object that represents the ValueTuple<T1> type and retrieve the value of its IsSerializable property. For a list of serializable types in .NET Core and the .NET Framework, see Binary Serialization.

Constructors 
ValueTuple<T1>(T1)	
Initializes a new ValueTuple<T1> instance.

Fields 
Item1	
Gets the value of the current ValueTuple<T1> instance's first element.

Methods 
CompareTo(ValueTuple<T1>)	
Compares the current ValueTuple<T1> instance to a specified ValueTuple<T1> instance.

Equals(Object)	
Returns a value that indicates whether the current ValueTuple<T1> instance is equal to a specified object.

Equals(ValueTuple<T1>)	
Returns a value that indicates whether the current ValueTuple<T1> instance is equal to a specified ValueTuple<T1> instance.

GetHashCode()	
Calculates the hash code for the current ValueTuple<T1> instance.

ToString()	
Returns a string that represents the value of this ValueTuple<T1> instance.

Explicit Interface Implementations 
IStructuralComparable.CompareTo(Object, IComparer)	
Compares the current ValueTuple<T1> instance to a specified object by using a specified comparer and returns an integer that indicates whether the current object is before, after, or in the same position as the specified object in the sort order.

IStructuralEquatable.Equals(Object, IEqualityComparer)	
Returns a value that indicates whether the current ValueTuple<T1> instance is equal to a specified object based on a specified comparison method.

IStructuralEquatable.GetHashCode(IEqualityComparer)	
Calculates the hash code for the current ValueTuple<T1> instance by using a specified computation method.

IComparable.CompareTo(Object)	
Compares the current ValueTuple<T1> instance to a specified object by using a specified comparer and returns an integer that indicates whether the current object is before, after, or in the same position as the specified object in the sort order.

ITuple.Item[Int32]	
Gets the value of the ValueTuple element.

ITuple.Length	
Gets the number of elements in the ValueTuple.

Extension Methods
ToTuple<T1>(ValueTuple<T1>)	
Converts an instance of the ValueTuple structure to an instance of the Tuple class.

Applies to
.NET Core
2.1 2.0 1.1 1.0
.NET Framework
4.7.2 4.7.1 4.7
.NET Standard
2.0
Feedback
We'd love to hear your thoughts. Choose the type you'd like to provide:

 
Our new feedback system is built on GitHub Issues. Read about this change in our blog post.

