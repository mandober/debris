# Internal slots

Internal slots of JS objects; denoted in double brackets, e.g. [[Scopes]]. Internal slots correspond to internal state that is associated with objects and used by various ECMAScript specification algorithms.

Internal slot
- [[Callable]]
- [[Description]]
- [[FunctionLocation]]
- [[Iterator]]
- [[PrimitiveValue]]
- [[StringData]]
- [[Prototype]]
- [[Scopes]]
- [[Species]]
- [[StringTag]]
- [[ProxyHandler]]
- [[PreventExtensions]]
- [[OwnPropertyKeys]] ƒ
- [[GetPrototypeOf]] ƒ
- [[SetPrototypeOf]] ƒ
- [[MapData]] represented as [[Entries]]


Every JS object has an internal slot [[Prototype]] and an internal method [[GetOwnProperty]].

ECMAScript objects can be either ordinary or exotic. **Ordinary objects** must have the default behavior for a set of methods called *essential internal methods*. If an object deviates from the default behavior, it is called an **exotic object**.

## Essential Internal Methods

- [[GetPrototypeOf]]
- [[SetPrototypeOf]]
- [[IsExtensible]]
- [[PreventExtensions]]
- [[GetOwnProperty]]
- [[HasProperty]]
- [[OwnPropertyKeys]]
- [[Get]]
- [[Set]]
- [[Delete]]
- [[DefineOwnProperty]]
- [[Enumerate]]
- [[Call]]      (function objects only)
- [[Construct]] (function constructors only)



[[GetPrototypeOf]]
- `() → Object | Null`
- Determine the object that provides inherited properties for this object.
- A `null` value indicates that there are no inherited properties.

[[SetPrototypeOf]]
- `(Object | Null) → Boolean`
- Associate this object with another object that provides inherited properties.
- Passing `null` indicates that there are no inherited properties.
- Returns `true` indicating that the operation was completed successfully
- Returns `false` indicating that the operation was not successful.

[[IsExtensible]]
- `() → Boolean`
- Determine whether it is permitted to add additional properties to this object.

[[PreventExtensions]]
- `() → Boolean`
- Control whether new properties may be added to this object.
- Returns true if the operation was successful
- or false if the operation was unsuccessful.

[[GetOwnProperty]]
- `(propertyKey) → Undefined | Property Descriptor`
- Return a *Property Descriptor* for the own property of this object whose key is *propertyKey*, or `undefined` if no such property exists.

[[OwnPropertyKeys]]
- `() → List of propertyKey`
- Return a List whose elements are all of the own property keys for the object.

[[Get]]
- `(propertyKey, Receiver) → any`
- Return the value of the property whose key is *propertyKey* from this object.
- If any ECMAScript code must be executed to retrieve the property value, *Receiver* is used as the `this` value when evaluating the code.

[[Set]]
- `(propertyKey, value, Receiver) → Boolean`
- Set the value of the property whose key is *propertyKey* to value.
- If any ECMAScript code must be executed to set the property value, *Receiver* is used as the `this` value when evaluating the code.
- Returns true if the property value was set or false if it could not be set.

[[Delete]]
- `(propertyKey) → Boolean`
- Remove the own property whose key is *propertyKey* from this object.
- Return false if the property was not deleted and is still present.
- Return true if the property was deleted or is not present.

[[HasProperty]]
- `(propertyKey) → Boolean`
- Return a Boolean indicating whether this object already has either an own or inherited property whose key is *propertyKey*.

[[DefineOwnProperty]]
- `(propertyKey, PropertyDescriptor) → Boolean`
- Create or alter the own property, whose key is *propertyKey*, to have the state described by *PropertyDescriptor*.
- Return true if that property was successfully created/updated 
- or false if the property could not be created or updated.

[[Enumerate]]
- `() → Object`
- Return an iterator object that produces the keys of the string-keyed enumerable properties of the object.


Table 6 summarizes additional essential internal methods that are supported by *objects that may be called as functions*.

A **function object** is an object that supports the [[Call]] internal methods.

A **constructor function** (or just constructor) is a *function object* that supports the [[Construct]] internal method.


Additional essential internal methods of function objects:

[[Call]]
- `(any, a List of any) → any`
- Executes code associated with this object.
- Invoked via a function call expression.
- The arguments to the internal method are a `this` value and a list containing the arguments passed to the function by a call expression.
- Objects that implement this internal method are callable.

[[Construct]]
- `(a List of any, Object) → Object`
- Creates an object.
- Invoked via the `new` or `super` operators.
- The first argument to the internal method is a list containing the arguments of the operator.
- The second argument is the object to which the new operator was initially applied.
- Objects that implement this internal method are called constructors.
- A function object is not necessarily a constructor
- non-constructor function objects don't have a [[Construct]] internal method.


The semantics of the *essential internal methods* for *ordinary objects* and *standard exotic objects* are specified in clause 9.

If any specified use of an internal method of an exotic object is not supported by an implementation, that usage must throw a `TypeError` exception when attempted.
