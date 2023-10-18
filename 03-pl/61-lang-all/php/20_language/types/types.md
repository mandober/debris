# Types

- Datatypes in PHP
- Type conversion, coercion, casting
- Type juggling


## Debrief
- PHP is a dynamic language
- the type of expression is decided at RT depending on the context
- The usual type categories are scalars, compound, opaque.
- 4+1 scalars: `bool`, `int`, `float`, `string`; usually, `null` is also here
- 2 compound types: array and object
- 1 opaque type: resource (handles to files, DB, etc.)


# Datatypes in PHP

Usually, the basic PHP types are divided into 3 categories:
* Scalar types
  1. bool
  2. int
  3. float
  4. string
  5. null
* Compound types
  6. array
  7. object
* Opaque types
  8. resource

- Scalars are the most basic types that directly contain a value.
- The most basic 4 scalars are bool, int, float and string.
- Sometimes, `null` is included in scalars, while othertimes it put in the compound category with objects because it represents the absence of an object: or, even is a separate category (possibly named "special types") along with the resource type.



- convert a var type:
  - cast the var
  - use `settype()`


Check the type and value of expr:
  - dump the variable: `var_dump`
  - human-friendlier version for debugging: `gettype`
  - check for certain type: `is_{type}`, e.g. `is_int`, `is_bool`


```php
$a_bool = TRUE;   // a boolean
$a_str  = "foo";  // a string
$a_str2 = 'foo';  // a string
$an_int = 12;     // an integer

echo gettype($a_bool); // boolean
echo gettype($a_str);  // string

// If this is an integer, increment it by four
if (is_int($an_int)) $an_int += 4;

// If $a_bool is a string, print it out (prints nothing)
if (is_string($a_bool)) echo "String: $a_bool";
```
