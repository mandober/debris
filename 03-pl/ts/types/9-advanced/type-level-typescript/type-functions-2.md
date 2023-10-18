# Type functions

- type-level function, type function, function on types
- value-level function, value function, function on values


## Type functions

*Type functions*, or *type-level functions*, are functions that operate on types. Unlike the usual, term-level functions, that take values and return values, type-level functions take types and return types.

In TS, a *type declaration*, written using the `type` (or `interface`) keyword, is used to create a new *type function* that defines a new type. The two keywords work similary (although they have their differences), but the use of the `type` keyword is usually associated with creating a *type alias*. This is most evident when `type` is used to create simple type aliases.

```ts
type Bln = boolean
type Num = number
type Str = string
```







```ts
type TypeFn = ...τ...

interface TypeFn { ...τ... }
```

here, `τ` stands for a concrete, unparameterized type, i.e. a type that lacks type params, such as `boolean`, `string[]`, `(number | number[])[]`, etc.


Note: The `type` and `interface` have slightly different forms but they both define a new type function. The `type` version is preferred as it more clearly shows that a type function is an equation that relates the two sides flanking the equals sign.

Type-level functions have many similarities with value-level functions. The form above defines a nullary type function - it is a type function that is not parameterized, like a value-level function, `() => τ`. When a function takes no params all it can reference in its body are the unparameterized, concrete types.

More interesting are functions that do take params. In the definition of a value-level function, the params it takes are declared as a quasi-list or a quasi-tuple in parenthesis. There are two basic forms of value-level functions, function statements and function expressions. The former more closely resambles a type-level function defined using the `interface` keyword, while the latter resambles a type-level function defined using the `type` keyword.

### Defining value- and type-level functions

```ts
// value-level function statement
function valueFn(a) { ...a... }

// type-level function with 'interface'
interface TypeFn<A> { ...A... }

// value-level function expression
const valueFn = a => ...a...

// type-level function with 'type'
type TypeFn<A> = ...A...
```

Type-level function definition uses the angle brackets instead of parens to declare its parameters. Here, `TypeFunction` takes a single type parameter `A`, as denoted by `TypeFunction<A>`.


### Calling value- and type-level functions

```ts
// Calling a value-level function
valueFn(x)

// Calling a type-level function
valueFn(x)
```

In both cases, we first declare a parameter - a type parameter `A` in case of the type function, and parameter `a` in case of the value function - and then we can use the parameter somewhere on the right-hand side (as represented by `...A...` and `...a...`, respectively).

A small difference between type and value functions is that the former declare parameters in angle brackets, while the latter declare them in parens. More importantly, when they don't take parameters, a type function may leave out the angle brackets alltogether, while a value function is required to keep a pair of the empty parenthesis. Just like a pure nullary function at the value level, that cannot do very much except return some arbitrary forced value, a nullary type function cannot do very much except return some arbitrary forced type.

```ts
function pure() { return 42 }
const pure = () => 42

type Pure<> = boolean
```






the number of type parameters it takes.


declare a type function `called Parameters` that takes a single type represented by the type parameter `T`.

```ts
type T<A> = ...A...

// e.g.
type Array<T> = T[]
```



TS contains a utility type `Parameters` that extracts the parameter types of a function type as a tuple. It is defined like this:

```ts
type Array<T> = T[]

type Parameters<T extends (...args: any    ) => any> =
                T extends (...args: infer P) => any ? P : never
```




This is pretty much pattern matching on the type level. 

(although with some redundant, repeated elements): 
if `T` matches the shape of the specified type, 
(i.e. if `T` matches the shape of the unary function type), 
then we bind the function input type to a fresh type var `P`, 
(which in TS is denoted `args: infer P`), 
and, if it does indeed match,
we return (the bound type var) `P`. 
Otherwise, we return `never`, 
which in this context stands as nevermind (noop).
