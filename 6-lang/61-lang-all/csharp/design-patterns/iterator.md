# Design Patterns: Iterator

The iterator pattern is an example of a behavioral pattern, a design pattern that simplifies communication between objects. It allows you to access all the
elements in a sequence of items without caring about what kind of sequence it is: an array, a list, a linked list, or none of the above.

This can be effective for building a *data pipeline*, where an item of data enters the pipeline and goes through a number of different *transformations* or *filters* before coming out the other end.

In .NET, the iterator pattern is encapsulated by interfaces:
- `IEnumerable` (iterable type)
- `IEnumerable<T>`
- `IEnumerator` (iterator)
- `IEnumerator<T>`

The naming is unfortunate - the pattern is normally called _iteration_ to avoid confusing it with other meanings of the word enumeration. _Iterator_ and _iterable_ are better suited.

A type impl'ing `IEnumerable` can be iterated over; calling `GetEnumerator` method returns `IEnumerator` implementation i.e. **iterator** itself.

- Iterator is akin to a (database) cursor: a position within the sequence.
- Iterator can only move forward within the sequence.
- There can be many iterators operating on the same sequence at the same time.

C# 1 supports consuming iterators using `foreach` statement; it compiles down to calls to `GetEnumerator` and `MoveNext` methods and `Current` property (with support for disposing of the iterator afterward if `IDisposable` is also implemented):

```cs
// sample collection
IEnumerable<int> items = Enumerable.Range(1, 29);

// foreach
foreach (var item in items)
  Write(item + "\n");

// The compiler translates foreach into
// ...get iterator
IEnumerator<int> it = items.GetEnumerator();

// ...keep calling next on it while there are items
while (it.MoveNext())
  Write(it.Current + "\n");
```


* `System.Linq.Enumerable` class 
  - provides a set of static methods for querying objects that implement 
  System.Collections.Generic.IEnumerable

* `System.Collections.Generic.IEnumerable<T>`
  - Exposes the enumerator, which supports a simple iteration over a collection of a specified type.
  - Type Parameters: `T` type of objects to enumerate.

* IEnumerator<T> `IEnumerable<T>.GetEnumerator()`
  Returns: an enumerator that iterates through the collection.

* `System.Collections.Generic.IEnumerator<T>`
  - Supports a simple iteration over a generic collection.
  - Type Parameters: `T` type of objects to enumerate.

* bool `System.Collections.IEnumerator.MoveNext()` 
  - Advances the enumerator to the next element of the collection. 
  - Returns:
    - `true` if the enumerator was successfully advanced to the next element
    - `false` if the enumerator has passed the end of the collection
  - Exceptions:
    - `System.InvalidOperationException`: 
      The collection was modified after the enumerator was created.

* T `IEnumerator<T>.Current { get; }` property that 
  - gets and returns the element in the collection 
    at the current position of the enumerator.
