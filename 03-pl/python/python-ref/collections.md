# Collections

https://docs.python.org/3/library/collections.html

The `collections` module implements specialized container datatypes providing alternatives to Python's builtin containers (dict, list, set, tuple).

Source code: [Lib/collections/__init__.py](https://github.com/python/cpython/tree/3.12/Lib/collections/__init__.py)

Collections:

`namedtuple()`
- factory function for creating tuple subclasses with named fields
- https://docs.python.org/3/library/collections.html#collections.namedtuple

`deque`
- list-like container with fast appends and pops on either end
- https://docs.python.org/3/library/collections.html#collections.deque

`ChainMap`
- dict-like class for creating a single view of multiple mappings
- https://docs.python.org/3/library/collections.html#collections.ChainMap

`Counter`
- dict subclass for counting hashable objects
- https://docs.python.org/3/library/collections.html#collections.Counter

`OrderedDict`
- dict subclass that remembers the order entries were added
- https://docs.python.org/3/library/collections.html#collections.OrderedDict

`defaultdict`
- dict subclass that calls a factory function to supply missing values
- https://docs.python.org/3/library/collections.html#collections.defaultdict

`UserDict`
- wrapper around dictionary objects for easier dict subclassing
- https://docs.python.org/3/library/collections.html#collections.UserDict

`UserList`
- wrapper around list objects for easier list subclassing
- https://docs.python.org/3/library/collections.html#collections.UserList

`UserString`
- wrapper around string objects for easier string subclassing
- https://docs.python.org/3/library/collections.html#collections.UserString
