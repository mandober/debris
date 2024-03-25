# Design Patterns: Singleton

A singleton is a class which only allows a single instance of itself to be created. Usually it gives simplified access to that unique instance.


Most commonly, singletons are parameterless. If a singleton accepted parameterized requests another instance with different parameters could be constructed, which breaks the singleton (i.e. single instance) pattern. However, if the same instance should be accessed for all requests with the same parameter, the factory pattern is more appropriate.

Typical singleton requirements:
- single (unique) instance
- lazily created

single instance
Typically a requirement of singletons is that they are created lazily - i.e. that the instance isn't created until it is first needed.
