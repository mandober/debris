# Comments

http://php.net/manual/en/language.basic-syntax.comments.php

Type of Comments:
* Single line comments (SLC)
* Multi-line comments (MLC)
* Doc-block comments (DBC)


Single line comments (SLC)
- start symbol: `//` or `#`
- end symbol: EOL (implicit)
- everything after the start symbol is ignored, inc MLC
- once started, it runs to the EOL; unlike MLC, cannot be escaped

Multi-line comments (MLC)
- start symbol: `/*`
- end symbol: `*/`
- nesting is disallowed

Doc-block comments (DBC)
- start symbol `/**`
- end symbol: `*/`
- Documentable elements
  - file
  - require, require_once, include, include_once
  - function
  - constant
  - class
  - property
  - interface
  - trait
  - method
- Doc tags
  - @param
  - @return
  - @throws
  - etc.


## Doc tags

`@param`
- document single parameter of a function (method)
- @param <type> [name] [<desc>]
- if provided, it must contain at least type to indicate what is expected
- param name is optional if it is the only param of the function
- multi-line description is optional

`@return`
- document the return value of functions or methods.
- When provided it MUST contain a Type to indicate what is returned
- MAY have a multi-line description and does not need explicit delimiting.

`@throws`
- indicates whether the elements could throw a specific type of exception


Other doc tags:
- `@method` Allows a class to know which magic methods are callable
- `@api`    Method will not change until a major release
- @var, @property, @property-read, @property-write
- @category
- @example
- @global
- @ignore
- @internal
- @source, @filesource
- @package, @subpackage
- @uses, @used-by
- @since, @deprecated
- @link, @see
- @author, @copyright, @license, @version, @todo


## Examples

```php
/**
 * This is the description of the function.
 *
 * @param string|null|mixed $description Text, max 80 characters.
 *
 * @return callable|null Maybe describe return value.
 */


// Explicit doc tag for a var in a foreach block
// is here to help IDEs with auto-completion

/** @var \Sqlite3 $sqlite */
foreach($connections as $sqlite) {
  $sqlite->open('/my/database/path');
  /* ... */
}

/**
 * Counts the number of items in the provided array.
 *
 * @param mixed[] $items Array structure to count the elements of.
 *
 * @throws InvalidArgumentException if the provided argument is not of type
 *       'array'.
 * 
 * @return int Returns the number of elements.
 */
function count(array $items){ /* ... */}
```
