# JS :: Index :: Types

## ASIDE: *Type* vs *Data type* vs *Data structure*

The terms "type", "data type" and "data structure" all pertain to data, and, in general, they are synonymous with each other. The term *"type"* is an abbreviation for the expanded term "data type". It is only data that can have a type - there is nothing else in a PL that could have the type property, so the abbreviation alone is unambiguous. There is perhaps still some sense in which the two terms are different, but it only has to do with the way each emphasizes a slighlty different aspects of data. Namely, "type" is perhaps more focused on the (names of) categories that the different data belongs to, while *"data type"*, or even "datatype", puts more emphasis on a particular data structure, i.e. on the form that the data takes. The third term, *"data structure"*, puts more focus on a particular realization of a data structure, placing emphasis on the properties such as cost, efficiency, linearity, etc. of data structures.

## JS types

JS types:
- 7 primitives
  - boolean
  - string
  - number
  - 
- Object

```js
typeof true      // 'boolean'
typeof 4.7e-5    // 'number'
typeof 4e11n   // 'bigint'
```
