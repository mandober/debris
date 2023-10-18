# Type constructor

## Type constructors

A *type constructor* or a *type constructor function* or *type ctor* for short, is a *type function* or a *function on types*, i.e. it is a type-level function that operates on types: it consumes types as arguments and produces a type as its return value.

As the name suggests, a type constructor constructs types. But it cannot construct any arbitrary type, but only particualar types.

In TS, the prime example of a type ctor is `Array`. Unlike `object` and `Object` (what is the difference?!) that describe objects in general, that is, *object values* that may have any arbitrary shape, `Array` cannot be used to annotate the type of any arbitrary *array value* (and there's no `array` type); in fact, we can use `Object` / `object` for that, since arrays are objects.

Thus, `Array` is not a type per se, it is not a regular type ...yet. Here, 'regular' is used as a placeholder for that special property that sets apart 'regular' types and type-things like `Array`, which is *saturation*. Namely, types that classify values (i.e. 'regular' types) are saturated (i.e. complete). Types that are not are unsaturated, i.e. they still await for some type argument to be fully saturated, at which time they will also classify values. These things that can be in the unsaturated state are type constructors. They are functions on types - they take types as arguments and produce a type as their output (return value).

So, `Array` alone is a type ctor, as is `Map`.




or , it is something more, or, more accurately, higher.



an object can be described with a particular object type, but all object may be descibed by these two types.



are both valid types, `Array` is not. In fact, `Array` is a type constructor - a type function that must be called by providing it one type argument; e.g. `Array<string>` is a type, and so is `Array<[boolean | string]>`, but `Array` alone is not a (regular) type.

can also be called *higher-order types*

Besides being a type ctor (because it constructs new types), it may also be called a *higher-order type* because it takes a type to produce (return) a type, similarly how *higher-order functions* take functions as arguments and may return a function, but are not required to - they may also return some other value. This is because functions are also values as are many other things, so there's a choice which value to return there. On the other hand, type constructors have no such choice - they must return a type, since there's nothing else available.
