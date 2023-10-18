# JS Arrays Implementations

Internally, JS arrays are backed up by various data structures depending on the structure of each individual array instance. The important major factors are whether an array is packed or sparse, homogenous or heterogenous, whether it is an array of primitives or objects. Also, each JS engine is free to make its own optimizations as long as arrays work the same at the surface level.

An array of machine integers is surely gonna be backed up by a proper C-like array, i.e. the fastest data structure there is.


From best case, which is a packed array of machine integers, to the worst case scenario which is a very sparse array of any kind, an array could be backed up internally by a bunch of things ranging from the proper C-like array to a dictionary.


---

- https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Indexed_collections
- https://ryanpeden.com/how-do-javascript-arrays-work-under-the-hood/
- http://speakingjs.com/es5/ch11.html#integers_via_bitwise_operators

- https://blog.sessionstack.com/how-javascript-works-inside-the-v8-engine-5-tips-on-how-to-write-optimized-code-ac089e62b12e
- https://blog.sessionstack.com/how-does-javascript-actually-work-part-1-b0bacc073cf
- https://blog.sessionstack.com/how-javascript-works-memory-management-how-to-handle-4-common-memory-leaks-3f28b94cfbec

- https://www.quora.com/How-are-javascript-arrays-implemented-internally

- https://news.qooxdoo.org/javascript-array-performance-oddities-characteristics-d8139757b238
