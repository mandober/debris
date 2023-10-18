# Complicating type functions

- type function (function on types, type-level function, generic function)
- type constructor (type ctor)
  - saturated vs unsaturated type ctors
  - inhabited vs uninhabited types
  - partial application of type ctors
- parameterization
  - arity
  - type parameter vs type argument
  - type parameter ranges over all types...not
    - they range over base types (inhabited types, satisfies type ctors)
    - not over unsaturated/uninhabited types
    - unsaturated type ctor is partially applied type function
    - saturated type ctor is fully applied type function
  * type order
    - unparameterized function is not a generic function
    - parameterized functions are generic functions
    - 0-order type, zeroth-order type function
      - non-higher-order type (function)
      - function that can only take (and return) base types
      - it cannot take (nor return) generic functions
    - n-order type (type function)
    - higher-order type (type function)
      - 1st-order type, first-order type function
        - function that takes (and returns) base types incl. 0-order functions
        - function that can take (and can return) base types, 0-order functions
      - 2nd-order type, second-order type function
        - function that takes (and returns) up to 1-order functions
      - third-order type (type function)
      - 3rd-order type, third-order type function
        - function that takes (and returns) up to 2-order functions
      - etc.
  * type rank
    - function with forall quantified params
    - function taking forall quantified functions


## How to complicate type functions



## Higher-kinded polymorphism
Higher-kinded polymorphism is an abstraction over type constructors. It is contrasted by regular polymorphism that abstracts over regular, inhabited types (of kind `*`), but not over type ctors.

## Higher-kinded type
Higher-kinded polymorphism is an abstraction over type constructors. A higher-kinded type (HKT) is a type function that parameterizes over type constructors. For example a HKT function 'Elem' not only abstracts over ground types (number, string), but also over type ctors (List<A>, Set<A>, Multiset<A>). TS does not support HKT but a pseudo syntax for a HKT could look like `Elem<T><A>`. Then, `Elem<List><A>` would be a partial application giving us the equivalent of `ElemOnLists<A>` type function. And Elem<List><number> would completely specialize the HKT to the equivalent of `ElemOnListOnNumbers`.

(which may have higher-kinds, like `(* → *) → * → *` for unary HK type ctors, `(* → * → *) → * → * → *` for binary HK type ctors)
