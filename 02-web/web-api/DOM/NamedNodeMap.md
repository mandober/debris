# NamedNodeMap

https://developer.mozilla.org/en-US/docs/Web/API/NamedNodeMap

- `NamedNodeMap`
  - Instance properties
    - length
  - Instance methods
    - item()
    - getNamedItem()
    - setNamedItem()
    - removeNamedItem()
    - getNamedItemNS()
    - setNamedItemNS()
    - removeNamedItemNS()


A `namedNodeMap` is like an array, but the items are accessed by name or index using `item()` method or the array access (which is delegated to item() method).

Unlike NodeList, items inside a NamedNodeMap are not in any particular order.

Although called NamedNodeMap, this interface doesn't deal with `Node` objects but with `Attr` objects, which are a *specialized class of Node objects*.

Attr < Node

A NamedNodeMap object is **a live object** and will thus be auto-updated if changes are made to its contents internally or elsewhere.
