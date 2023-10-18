# JS Types

* Types in JS
  * **Primitives**
    1. boolean
    1. number
    1. bigint
    1. string
    1. symbol
    1. undefined
    1. null
  * **Natives**
    1. Object
    2. Function
    3. Array
    4. Map
    5. Set
    6. WeakMap
    7. WeakSet
    8. Reflect
    9. Proxy
    10. JSON
    11. RegExp
    12. Date
    13. Math
    14. Error
    15. Promise
    16. Iterator
    17. Generator
    18. GeneratorFunction
    19. AsyncFunction
    20. Global functions




## Global functions

- Global functions are called directly i.e. no need for object prefix.
- Prefixed object would be the global, top-level object, which is `window` in browsers.
- The top-level object is also accessable using `this` keyword in a top-level scope, e.g. `this.eval`
- Some of these have new versions that are attached to the appropriate object.

Global functions
- eval
- isFinite (*new* Number.isFinite)
- isNaN (*new* Number.isNaN)
- parseFloat (*new* Number.parseFloat)
- parseInt (*new* Number.parseInt)
- encodeURI, decodeURI
- encodeURIComponent, decodeURIComponent
- escape, unescape
