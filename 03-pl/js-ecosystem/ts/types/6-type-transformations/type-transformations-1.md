# TS :: Types :: Type transformations

TS offers means to transform one type into another types.

Type-theoretically, this is achieved using *type functions*, which are type-level functions that take type(s) and produce (new) types. *Type constructors* are type functions.

For example, the `List` *type* has a *type ctor* with an alphabetic name, `List`, and/or with a symbolic name, `[]`. If both are used, `List` is the same identifier as `[]`; the advantage of symbolic names is that they are more convenient when used in mixfix positions. A well-known infix type-level function (operator) is the function type constructor, `->`. In one way, the function type ctor belongs to the same category as `[]` (or `List`) type ctor, i.e. they are both *type functions*. In another way, they have different *kinds* since `[]` needs a single type to become *saturated*, while `->` needs two. Only a *saturated type ctor* can contain values - in that case it becomes an *inhabited type* (a type that can classify values, i.e. a type inhabited with values). Unsaturated type ctors are uninhabited types.
