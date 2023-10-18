# TS :: Types :: Type parameters

https://www.typescriptlang.org/docs/handbook/typescript-in-5-minutes-func.html#type-parameters


Before talking about generics, whose prominent aspect are type-level fucntions, it pays to remind ourself how regular functions work.

## Value-level functions

Reminder: defining a regular, value-level, function includes declaring a list of variables, called function's *formal parameters*, in parenthesis, after the function's name. Later, when we want to call this function, we pass it a list of *arguments*, also in parenthesis.

*Variables* are all-purpose containers (boxes) that bind unknown and known values, and they are normally always initialized with a value. On the other hand, *parameters* are like variables that are only used inside a function. When defining a function, parameters must be declared in ordered to be referenced inside the function. They are declared as a list called *formal parameters*.

Parameters provide means for a function to list all its dependencies - later, these dependencies will be satisfied in the form of args. Of course, a function can also refer to outside variables, even capturing them, but referencing an external variable (name) introduces a dependency that cannot be easily satisfied. On the other hand, a function need not list every single dependency - some are always available (e.g. arithemtic ops, utility functions), at least within the confines on a given language. A function that does list every single dependency through its formal parameters is called a *combinator*. Combinators are closed expressions (function) that can be transplanted anywhere and, being dependeny-free, they will always work (they will actually work when all the dependencies are provided via args).

A parameter's occurrs three times inside a function. A parameter is first declared as a formal parameter. Here, "formal" means for formality's sake - it serves as a reminder that the concrete name of the parameter is not important; whether a param is named `x` or `foo`, is immaterial as long as it occurs everywhere in the function under the same name. A *formal param* binds the corresponding *argument*, after which the param's *application occurences* within the function's body reflect the value of that argument. That is, each application occurrence of that param is as if it were replaced with the arg's value.

```ts
function foo(a, b) { return a + b}
// calling foo
foo(1, 2)
// binds the args:
function foo(a ⟼ 1, b ⟼ 2) { return a + b }
// as if we now have:
function foo(a ⟼ 1, b ⟼ 2) { return 1 + 2 }
```


- formal parameter: this is its binding occurrence
- applied parameter: this is its applied occurrence

Params are declared, and these parameter occurrences are called *formal parameters*.

Params are similar to vars, excpet parameters remain uninitialized until the function is called, at which time each formal parameter is bound to a corresponding *argument* (so a param gets initialized with a value). 



```ts
// defining a function foo includes declaring a list of formal params:
function foo(p1, p2, p3) { /* ... */ }

// calling foo includes passing it a list of args:
// (a, b, c are previously defined)
foo(a, b, c)
```

When `foo` is called, as above, we pass it the same number of arguments as there are formal parameters, making sure to match their order (position).

However, a few things will happen first before the args are actually passed in.

### Eager evaluation

Since JS uses **eager evaluation**, it will first fully evaluate each of the arguments; each of the args `a`, `b`, `c` can be an arbitrarily complex expression and JS will try to reduce it down to a value, if possible.

Note: *Reduction* is similar to *evaluation*, but the latter means that something, considered to be a value in the language, is produced.

Digression: Eager evaluation is contrasted by *lazy evaluation* in languages like Haskell, where the function's args (and expressions in general) are not evaluated until absolutely necessary; arguments are not touched but get passed to a function as they are, and the logic in the function's body decides whther they get to be evaluated or discarded; basically, if an arg is referenced in connection with the return value, it will be evaluated eventually. Lazy evaluation can be simulated in JS by wrapping the args in *thunks* - nullary functions that just return the wrapped expression/value; e.g.

```ts
// thunk-wrapper
const thunk = exp => () => exp

// to delay the evaluation of `a`, thunk it
const delayed = thunk(a)

// to triger the evaluation, call the thunk-wrapped expression
const ev = delayed()
```

### Call-by-value

Also, since JS uses **call-by-value**, after being evaluated, the arguments are copyied and these copies are actually passed into the function.

For scalar primitive values, this is straightforward, but this also imples that objects are passed by referenced because they are referred by reference, i.e. the stack contains only a reference (a pointer) to the actual object that is stored on the heap.

A similar *calling convention* is *call-by-reference* in which all values (including scalars) are passsed by reference, which means that if a function mutates an argument that changes is reflected outside on the original value.

### Name binding

Finally, when the arguments are fully evaluated and passed to the function, each argument gets bound to the corresponding formal parameter: `a` is bound to `p1`, `b` to `p2`, `c` to `p3`. This process is called *name binding*.


## Type-level functions



Things work very similarly at the type-level. Defining a type-level function also includes decalring a list of parameters, except these are called *formal type parameters* and we declare them using angle brackets instead of parenthesis.


type parameter
type argument
type variable



Type parameters are the main ingedient that drives generics. Generics or generic programming is just another name for *parametric polymorphism*, which is TS is mostly about *type-level functions*.


`<T>`

- TS requires declaration of type parameters. 
- There is no case requirement, but type parameters are single uppercase letters by convention.


```ts
function liftArray<T>(t: T): Array<T> {
  return [t]
}

const liftArray = <T>(t: T): Array<T> => [t]
```

Type parameters can also be constrained to a type, which behaves a bit like **type (class) constraints** in Haskell.

```ts
function firstish<T extends { length: number }>(t1: T, t2: T): T {
  return t1.length > t2.length ? t1 : t2
}
```

`<T extends { length: number }>` is the syntax for constraining the type param `<T>` with an *object literal type*.


TS can usually infer *type arguments* from a call based on the types of the arguments' values, so explicit type arguments are usually not needed.

Because TS is structural, it doesn't need type parameters as much as nominal type systems.
>Specifically, type parameters are not needed to make a function *polymorphic*.
Type parameters should only be used to propagate type information, such as constraining parameters to be of the same type.

```ts
function length<T extends ArrayLike<unknown>>(t: T): number {}

function length(t: ArrayLike<unknown>): number {}
```

In the first `length`, `T` is not necessary; notice that it is only referenced once, so it's not being used to constrain the type of other parameters or return value.




## No higher-kinded types

TS does not have higher-kinded types, so in the following, `T<U>`, is not legal:

```ts
function length<T extends ArrayLike<unknown>, U>(m: T<U>) {}
```


A polyadic type constructor is a type ctor like `List<T>`, which needs a type argument `T` in order to become fully saturated, and thus to stand as a concrete type for a concrete value.

For example, JS arrays can be thought of as *unary type ctors*. Various array types are annotated using square brackets, generically by `T[]`, and concretely by `number[]`. However, using an alphabetic name, like `List<T>`, instead of the symbolic one, `T[]`, is more clearer.

```ts
type List<T> = T[]
```

In TS, an array (list) type is more of a type construct, i.e. we take it for  granted that we must use the given construct `string[]` or `boolean[]` to annotate arrays of the various types, which are generically typed by `T[]`. Typing more complicated array types is horrendeous; typing an array of functions is a travesty.

Anyway. The syntax `List<T>`, unlike `T[]`, allows us see clearly see that it represents a nested type. We have a higher-order type `List`, which is thus unsaturated, and a saturated concrete type `T` (yes, generic types can be concrete, it's all about *saturation*). If we denote the type param by an underscore, as in `List<_>`, the fact that `List` alone (without the type param) can be understood as a type-level function is perhaps clearer.

```ts
List : T -> List<T>
```

Thus, we have:
- `List` is an unsaturated, concrete (named), type ctor, with kind `* -> *`
- `T` is a saturated type (type param), thus its kind is `*`

*Kinds* represent the arity (and saturation) of type-level functions (type ctors). It allows a type system to track the arity of HKTs so that *type applications* are well-typed.

All concrete types are saturated: `number`, `boolean`, `T`, `(x: A) => B`, `List<T>` or `T[]`, `Map<K,V>`, etc. Their arity is 0, i.e. they are *nullary types*. Some of them are always nullary: all primitives types like `string`, `bigint`, etc., while other types start as polyadic (unsaturated) types, but after the sufficient number of type applications eventually become nullary (saturated) types. Those are called higher-order types or higher-kinded types. Their kind is "higher" than the kind of saturated (primitive types). In fact, all other types except the primitives are HKTs. Since JS only has primitive and object-based types, all non-primitive types are actually HKT. They all require type argument(s) to become saturated (nullary).

We cannot express HKT in JS/TS, i.e. we cannot annonate (write) anywhere just `List` - instead we must write `List<T>`. 

>Only saturated types classify (have) values.

The HKT `List` (by itself) is uninhabited - it has no values; or, we usually say that it doesn't classifies values. Saturated types do: e.g. `number` clasifies values of numeric persuasion.

It could be said that `T` (type variable/parameter) represents all conceivable values - past, present and future; and then the concrete types classify this infinite sea of values, grouping them values into sets (types) according to their behaviour.

Anyway. A nullary (thus saturated) type is `boolean`, or, in general, `T`. A unary HKT is e.g. `List<T>`, which is a type-level function from saturated values to a saturated list of those values:


```ts
// HKTs (type-level functions)

// List
List : T -> List<T>
// List's kind
List : * -> *

// Map (key-value map)
Map : K -> V -> Map<K,V>
// Map's kind
List : * -> * -> *

// Function
(=>) : A -> B -> A -> B
// or, in TS-friendlier syntax w/ named params
(=>) : (a: A) -> (b: B) -> (a: A) -> B
// Function's kind
(=>) : * -> * -> *
```

Thus, array, Map, Set, and function even are all HKTs. They are polyadic type-level functions that require one or more type arguments in order to be saturated and thus become value-classifiers.

Shit, maybe HKT are actually further type abstractions, like when we generalize the type ctors themselves by (higher) type paramters. Maybe such types are actually HKTs, or maybe they also are (besides these domesticate dones like `List<T>`).

We can get generics by abstracting/generalizing saturated (concrete) types and representing them all by a type param `T` (as descibed).

```ts
// a type like
number
// ↓ participates in higher types like
List<number>
Set<number>
Maybe<number>
(x: number) => number
```





### Type application

```ts
Maybe<number>
Maybe : T -> Maybe<T>

// type application (type instantiation)
type Maybe(number) = Maybe<number>
// now, Maybe<number> is a concrete type, it can be used as usual
const mx: Maybe<number> = Just(42)

// (type and value) instantiation
Maybe (number) (Just(42)) : Maybe<number>
//      ↑           ↑
//  type arg     value arg
```

Generics abstract (or generalize) the types and give rise to the introduction of *type parameters* in function declarations (definitions), and *type arguments* in function applications; In fact, they pertain, not just to functions, but to other language constructs as well, like classes, `class Person<T>`, literal object types, TS enums, etc. And when there's a *type abstraction* (in form of of generic type param declarations), there must be a corresponding *type application*. Most PLs do not require us to explicitly pass in the type argument(s), because such applications usually supply all the args: type args and value args. Actually, as mentioned, type args need not be passed in explicitly because they can be inferred by examining the value args that must be passed in explicitly. Therefore, as long as the value args are also supplied, type inference takes care of the type args. But if we only want to pass in type args - e.g. in order to *spacialize the type* - then the language must offer a mechanism (syntax) to do so. TS does not; in fact, neither does vanilla Haskell (i.e. Haskell 98, or even Haskell2010) - it is only the GHC compiler that allows us to do so by offering the appropriate, opt-in, language extension.







We instantiate the Maybe type ctor as Maybe<number> type (saturated)
by first passing in the TYPE ARGUMENT (in this case `number`),
obtaining the type Maybe<number> at that point; but then we immediately
pass in the VALUE ARGUEMENT as well, obtaining the value `Just(42)`
of the type Maybe<number>



```ts
// standalone function sig @ type-level
type id = <T>(x: T) => T
// function def @ value-level annotated with a standalone sig
const id: id = x => x

// all-in-one, sig + def, @ value-level
// 1) typing the function:
export const id = <A>(x: A): A => x
// 2) typing the binding variable:
//    exactly the same type as the standalone sig above, <A>(x: A) => A
export const id: <A>(x: A) => A = x => x


// value-level (!): function sig + def
const id = <T>(x: T): T => x


const id =  @number 
```
