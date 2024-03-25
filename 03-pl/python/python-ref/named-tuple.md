# Python :: Data structures :: Named tuple

https://docs.python.org/3/library/collections.html#collections.namedtuple

Named tuple
- tuple-like
- tuples with named fields
- lightweight object types
- similar to struct or record types
- immutable
- iterable
- sequence
- namedtuple is a subclass of tuple
- 'typename' is a subclass of namedtuple
- 'typename' is the user-given name to the new namedtuple subclass instance
- 'typename' introduces a new type called 'typename'


`namedtuple` is part of the `collections` module which implements specialized container datatypes providing alternatives to Python's general purpose builtin containers (dict, list, set, tuple).

https://docs.python.org/3/library/collections.html

`namedtuple()` - factory function for tuples with named fields.

`namedtuple` is a subclass of tuple.

**Named tuples** assign meaning to each position in a tuple. They can be used wherever regular tuples are used. Its fields can be accessed by name or index.

To make a new subclass-instance of namedtuple, we call the `namedtuple` ctor, passing it the `typename` - name and type (as string) for the subclass, and `field_names` - a list of strings containing the names we choose for the fields. The length of `field_names` determines the arity of the named tuple.

```py
# Returns a new subclass of tuple with named fields
def namedtuple(
  typename,          # (str) subclass (and new type) name
  field_names,       # [str] or space/commas separated string
  *, 
  rename=False, 
  defaults=None, 
  module=None):

# e.g.
Point = namedtuple('Point', ['x', 'y'])
```

Calling the `namedtuple()` ctor returns a new tuple subclass named `typename`.

The new subclass is used to create *tuple-like objects* that have fields accessible by attribute lookup besides being indexable and iterable.

Instances of the subclass also have a docstring (with `typename` and `field_names`), while `__repr__()` method lists the tuple contents in a name=value format.

The `field_names` are a sequence of strings, e.g. `['x', 'y']`. Alternatively, `field_names` can be a single string with each fieldname separated by whitespace and/or commas, e.g. `'x y'` or `'x, y'`.


```py
# Make a new subclass of tuple with named fields
Point = namedtuple('Point', ['x', 'y'])
print([10], Point)
# >>> <class '__main__.Point'>

# docstring for the new class
print([11], Point.__doc__)
# >>> Point(x, y)

# instantiate it with positional args or keywords
p01 = Point(1, 2)
p02 = Point(y=-7, x=-2)
p = Point(11, y=22)
print([31], p01)
print([32], p02)
print([33], p)

# Named tuple are indexable like plain tuples
print([41], p[0] + p[1])
# >>> 33

# Named tuple's fields are accessible by name also
print([6], p.x + p.y)
# >>> 33

# Named tuples can be unpacked like regular tuples
x, y = p
print([5], x, y)
# >>> (11, 22)

π1 = p.x

# to dict: Point to dict
d1 = p._asdict()
print([7], d1)
# >>> {'x': 11, 'y': 22}
print([8], d1['x'])
# >>> 11

# from dict: spread dict to Point
p3 = Point(**d1)
print([9], p3)
# >>> Point(x=11, y=22)

# _replace() is like str.replace() but targets named fields
p2 = p._replace(x=100)
p2 = p._replace(y=200)
print([10], p2)
# >>> Point(x=100, y=200)

print([11], p)
# >>> Point(x=11, y=22)
```
