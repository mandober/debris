# Type-level TS

- conditional types
- generic constraints
- `infer` keyword
- recursion in conditional types
- template literal types
- variadic tuples


## General

* `infer` declares a new type param on the fly and binds its operand to it
* `infer` is only permitted in the `extends` clause of a conditional type
* conditional type, `T extends U ? A : B`


## Literal types

* There are also array literal types, i.e. arrays that contain literal types
  `let point: readonly [3, 4] = [3, 4] as const`, equivalent to
  `let point: ReadonlyArray<[3, 4]> = [3, 4]`

* Number literal types go from `0` to `998`. This is the hard upper bound of the `tsc` as of TS v5.2



## Tuple and array types

* Tuple types from TypeScript v1.3
* Tuple types can be accessed with an index that is number literal type
* TS's tuple types and just JS arrays, which enables TS to provide the pattern `T[]` which can match both array and tuple types.
* There is no generic tuple type because tuples are determined by their size and the type of each element.
* However, to only match arrays, use `Array<T>` pattern.
* Tuple types behave like value-level arrays - they can be destructured and we can use rest/spread operator on them in a type context.
* TS also has 0-tuple, `[]`, and 1-tuple, `[T]`.
* [...T] is allowed since TS v4.2
* do not confuse tuples, `[string, number]`, and union types, `string | number`
  or intersection types `{a:number, b:string} & {a:number}`

## Union type

* Union type collapses its members, 
  `T | U | T` collapses into `T | U`

* Subtype-supertype relation, `never <: T <: unknown <: any`

* The `never` type
  - 'never' is a bottom type - subset of any other type
  - when 'never' is a union member it disappears
    `T | U | never` -->> `T | U`
  - unless it is the only unique union member
    `never | never` -->> `never`

* The `unknown` type
  - 'unknown' is a top type - superset of any other type
  - when 'unknown' is a union member, all other elements collapse into it
    `T | unknown | never` -->> `unknown`
  - unless the union also contains the `any` type

* The `any` type
  - 'any' is a quasi (?) top type - superset of any other type
  - when 'any' is a union member, all other elements collapse into it
    `T | unknown | never | any` -->> `any`
  - so 'any' is somehow superior to 'unknown' although both are top types


* Union type also has a distributive property,
  - exarbated when used with literal template types
    in which case it produces a Cartesian product



## Recursive types




### Natual numbers

* Natual numbers at the type level, `Nat`, consists of `Z` and `S` "data ctors".
* To reference them in prose, the form `Nat.Z` and `Nat.S` is used.
* The same file also defines `Add`, `Mul`, `Pred`, (`S` is `Succ`)
