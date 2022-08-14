# JS Collections

collection type class (interface)
- map
- fold
- flatmap
- mappend (monoid), chain (monad), ap (applicative)


builtins
- object
- array-like object, `arguments`
- array
- Set
- Map
- string

non-user
- parameters tuple
- arguments tuple

iterators
- iterables
- generators

user, algebraic
- Identity box
- Either, Right, Left
- Maybe, Some, None
- Functors

misc
- list
- tuple
- sequence
- range
- sll, sll
- tree


* Iterable<T>             iteration
  * Collection<T>           read-only collection (methods: size, membership)
    - List<T>                 indexed, repeatable elements
    - Set<T>                  unique elements of undefined order
    - Map<K, V>               unique string/symbol keys
  * MutableIterable<T>
    * MutableCollection<T>    (methods: add, remove)
      - MutableList<T>
      - MutableSet<T>
      - MutableMap<K, V>
