# Python :: Containers

- sequences
  - mutable
    - List
    - Set
    - Dictionary
  - immutable
    - Tuple
    - String

- List (mutable sequence)
- Dict (mutable sequence)
- Tuple (immutable sequence)
- String (immutable sequence)

Builtin data structures


```py
# list                              on hover
ls1: list[int] = [1, 2, 3]        # (variable) ls1: list[int]
ls2: [int] = [1, 2, 3]            # (variable) ls2: Any
ls3: Iterable[int] = [1, 2, 3]    # (variable) ls3: list[int]

# string
s1: str = "abc"                   # (variable) s1: Literal['abc']
s2 = "abc"                        # (variable) s1: Literal['abc']

# dict
dict1: dict[str, int] = { 'fst': 1, 'snd': 2 }

# tuple
Point = ('x', 'y')

# named tuple
Point = namedtuple('Point', ['x', 'y'])
```
