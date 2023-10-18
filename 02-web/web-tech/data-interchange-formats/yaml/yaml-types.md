# YAML types

The available data types in YAML with literal notation
- null
- string
- number
- map
- set
- date
- datetime


# YAML elements

- front matter
- triple-dash as a document start tag
- comments `#`
- the root object (containes the entire document)
- Map K V (map of key-value pairs, like a dict, hash map, assoc array)
  - KEYS:
    - keys are `String`
    - keys are not quoted
    - keys may contain SPACES
  - VALUES: values may be un/quoted strings

Types
- Scalar types
  - null: `null`
  - Boolean: `true`, `false` (unquoted!)
  - Number: `1`, `1e-3`
  - String: `abcd`, `space separated and unquoted`
- Compound types
  - Map k v
  - Set a (Map k null)


Numbers
- numeric literals
  - integers, 100
  - scientific-notation, 1e+12
