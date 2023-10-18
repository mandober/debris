# Containers with benefits

## TL/DR
A *value container* is a container with benefits, that is, besides performing its elementary job, i.e. holding onto a value, it may also provide additional services or incorporate extra features.

By "providing additional services", we mean that such services are user-definable; and by "incorporating extra features" we mean such container is a (part of a) language construct, i.e. it is realized thanks to the intimate knowledge the compiler has about it (needless to say it cannot be user-defined).

A container may be an object, and in JS it normally is, but it may also be realized as a function. In fact, functions are more versatile than objects.

### Function rulez

(YADDA - yet another digression digresses again): In the function vs object battle for primality, functions win because they can model behaviour as well as data. Objects also model both, but they can model behaviour only via functions. On the other hand, functions have no requirements, making them a more fundamental languge entity. In fact, λ-calculus showed that we can model all kinds of data as functions using a suitable encoding.

(λ-calculus has nothing but functions, which is verbatim - there is no means to interact with it as there is no I/O. Could I/O be implemented, and can it make λ-calculus usable as a proper general purpose language - and would that require introducing things other than functions - is unclear. Anyway, function rulez.)







## Value containers

A container as an object that just wraps a value may seem like a simple thing, but it represents a solid foundation for many useful concepts to built upon.

Many features stem from this simple manoeuvre

of having an object hold onto a value. Beside holding onto a value, an object may offer some additional services.

There is a well-known JS feature called boxing, that illustrates one such use. The extra service offered - or perhaps the serves offered by the boxing concept as a whole - is allowing us to call methods off the bare primitive values. Without this feature, we'd be forced to convert a primitive value to a suitable object every time we want to call a method off of it. By temporarily boxing and then unboxing primitive values automatically, the UX is significantly increased.

Many other useful features are based on the simple concept of an object that holds a value. Some require assistence form the compiler for realization (like boxing) but many others are user-implementable.

Some of these container objects with extra services include:
- boxing
- Identity
- Maybe
- Either
- list, array
- IO
- Env, Store (comonadic containers/contexts)
- Promise


## Boxing

JS, for one, uses this concept to realize a feature called *boxing* that solves the problem of calling methods off bare primitive values.

Because a primitive value stands only for itself - it represents itself, and there's nothing else - there is no room to hold associations to the methods that work with that value. However, it is till useful and a highly desirable UX to allow users to invoke methods right off the primitive value, as opposed to forcing them to wrap the value a suitable object manually; "suitable" here means the corresponding object - numbers can only be wrapped in the `Number` object, booleans in the `Boolean` object, and so on. And only objects o ffer additional services, primairily the possiblitly to invoke methods (and only relevant methods to that value) off them.

especially no room to attach methods - 
nowhere to put some additional information


Nevertheless, when we put a dot after a primitive value (in an IDE that offers completion like intellisense), the impossible happens, and we are presented with a list of all methods we can invoke right there, off that primitive value. This works thanks to the JS feature called boxing; each primitive value has a corresponding object into which it is temporarily placed, allowing us to call methods relevant to that primitive value. Because an object can contain extra information, it has room to hold associations to relevant methods and what not - it is no surprise that we can invoke thes methods off an object we obtained by calling, e.g. `new Number(1)`.


A value that is a proper object, obtained by called


When we try to call a method (e.g. `substring`) off a string, JS temporarily wraps the primitive string in a `String` object, as if we are invoking the `substring` method off the object obtained through `new String("boxing")` - even though the synytax still says `"boxing".substring(0,3)`.

JS temporarily wraps a primitive value in a suitable object (each "proper" primitive value has a corresponding object: booleans have `Boolean`, numbers have `Number`, etc.; `null` and `undefined` are not proper primitives) which allows method calls. As soon as the call is done, JS unwraps the value and discards the object.

```js
// when the JS compiler encounters this
"boxing".substring(0,3)
// it converts it on-the-fly into this
new String("boxing").substring(0,3)
```



, allowing us to invoke number-relevant methods off that object. Primitive values do not have such capabilities becasue they stand only for themselves; there is nothing else, especially no room to attach references to useful methods. 


For one, JS has the concept of *boxing* where a primitive value is temporarily placed in a container object (it get "boxed"); e.g. a `Number` object holds a primitive number value allowing us to call number-related methods off that object (we couldn't do that off the bare primitive value). JS boxes and unboxes primitive values in and out of object container automatically.



## Containers with special features

It is often said that a value is wrapped in a *container*, but sometimes it is said of such a value that it is placed in a *context*, in order to emphasize the fact that these container objects offer an extra bang for the buck).

JS has almost none of the following objects builtin, although most are user-definable, mostly because it has other ways to represent the situations for which they are used.

### Identity

The simplest of such containers is probably the `Identity` object, which just holds onto a given value, offering no extra "services" (although seemingly redundant, the `Identity` has it uses; a neural/identity value is always useful in algebraic contexts, just like the `id` function).

### Maybe

A more useful one is the `Maybe` object, which represents the presence or absence of a value. A `Maybe` object may contain a value inside or it may not, therefore representing the concept of **nullability**.

### Either

The `Maybe` is actually a specialization of a more general container called `Either`, which either holds a value of one type associated with successful computation, or a value of another type associated with failure. By convention, the first value is held in a field named `Left` and it is this one that represents a failure, so it is usually an error value or an error mesage. The value held in the `Right` field is the actual result of a successful computation. The `Maybe` object is the same as the `Either` except it holds no value (error value) in the `Left` slot, i.e. it can signal an error but doesn't offer the possibility to describe the error, the way `Either` does.

`Maybe`, `Either` and lists can all be used to model **fallible computation**, with `Either` offering a way to describe the reason of failure.

FP languages almost always feature the `Maybe` (aka `Option`) container, but JS doesn't OOB since it is a dynamic language, hence all values are nullable by default. TS, on the other hand, being a typed version of JS, must refer to nullabe values explicilty so it ofen has type unions of the form `number | undefined | null`. Perhaps TS has more use for value objects like `Maybe` and `Either`.

Even the lowly array (aka list) can be understood as a container that holds either zero, one, or many values. Limited to hold only a single value, a list behaves similarly to `Maybe`, except, since it can hold many values at the same time, it represents **non-deterministic computations**. For instance, a list can be used to hold multiple return values from a function, thereby helping implement the multi-valued functions like the (square) root (since √4 = ±2).

More advanced of these container objects are context objects, like the `IO` monad used in Haskell to model I/O operations. Haskell also has comonadic objects where a comonad represents a value (computation) that depeneds on the surrounding context (e.g. the active cell in a spreadsheet).


## Algebraic types

In languages with algebraic types, Maybe is a prime example of a coproduct (aka sum) type.

Classification of types into algebraic types has to do with type cardinality. An algebra of types begins with a few "primitive" algebraic types, such as zero (usually denoted by `𝟘`), unit (denoted by `𝟙`), sometimes also with Boolean (denoted by `𝟚`), which are types containig the corresponding number or values: zero type is uninhabited, unit type has exactly one value (sometimes denoted by `*`, so `* : 𝟙`), and `𝟚` (aka Boolean) contains the two familiar values.

Note that all types of the same cardinality are isomorphic to each other. For example, the Boolean and the type `Dir` containing two elements, say 'up' and 'down' are isomorphic to each other, i.e. they are completely inter- convertable; there are several distinct bijections between these two types, but any one is sufficient (e.g. true ⇔ "up", false ⇔ 'down'). This is all to say that the concrete name of a type is not so important as is the number of its inhabitants (values).

These types are deemed "primitive" because they hold concrete, easily understood value, for the lack of a better description. That is, `𝟙` holds a value `*`, `𝟚` holds two values, 'true' and 'false', zero holds no values. They are also primitive in the sense that we used as the building blocks in making more complex types.




A sum type is a compound type. Functionally, a sum type is a type union of at least two types which are called *variants*. Logically, a sum type represents a logical disjunction (OR), mening that only one value (variant) must be present in order to construct an instance value of the type.

to construct a sum type at least the value of one type (variant) must be present. 

Sum types are contrasted by product types which are functionally type intersections or better known as record types. All values of a record type must be present in order to construct its instance.

. A sum type is parallel to product type which represents a logical conjunction (AND).

 which is realized by several compound types in modern languages, including JS, as opposed to sum types which are represented only in functional languages.

## Monads

Value containers or values in a context are in majority functors (i.e. applicable to be members of the Functor type class). Moreover, if they are functors then they are almost always also applicatives and monads.

From the aspect of JS, a functor can be thought of as a value container that can be mapped, i.e. the value it holds can be mapped. This provides a way to convert the inner value without explicitly unpacking and repacking the container.

```hs
map :: (a -> b) -> [a] -> [b]
fmap :: Functor f => (a -> b) -> (f a -> f b)
```

```ts
type map = <A, B>(a: A => B) => A[] => B[]

type map = Functor f => (a => b) => (f a => f b)

```


## Promise object

Similarly, the `Promise` object also wraps a value, only this time, that value may not be present immediately but sometime later in the future - justifying the synonym `Future` for this concept. Just like how the boxing objects provide support to call methods off the primitive values, the `Promise` object provides support to work with a value as though it is present right now.
