# List

https://www.dotnetperls.com/list

`List<T>` is a generic collection.
You must specify its type in the sharp angle brackets <T>.
These collections have superior performance and usually preferable.

The List in C# is initialized with the new keyword.
When we use `Add`, the List adjusts its size as needed.
It is used in nearly all larger C# programs.

using System.Collections.Generic;
class Program {
    static void Main() {
        List<int> list = new List<int>();
        list.Add(2);
        list.Add(3);
        list.Add(5);
        list.Add(7);
    }
}

*AddRange, InsertRange*
For adding many elements at once—adding an array to a List—we use the AddRange method. InsertRange is like AddRange, but we add at an index. AddRange() is implemented with InsertRange in the .NET Framework.

*Copy array*
Here we create a List with elements from an array. We use the List constructor and pass it the array. List receives this parameter and fills its values from it.
The array element type must match the List element type or compilation will fail.

*Capacity*
We can use the Capacity property on List, or pass an integer to the constructor (which sets an initial capacity) to improve allocation performance. Setting a capacity sometimes improves performance by nearly two times for adding elements.







