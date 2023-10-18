# JS :: Index :: Data types :: Identifying types

JS offers just one "official" facility for type identification in the form of the `typeof` operator. It can distinguish between the primitive types and the general object type, with the exception that it can also distinguish functions among the object types. Thus, the `typeof` identifies a value either as one of the primitives, or a function, or an object. However, there are other ways to get the specialized type of an object.

JS has 7 primitive types but everything else is an object. Even the primitives have a corresponding object (in which they get boxed in/out). Only `undefined` stays a true primitive value, since even `null` is identified as an object.

Given a value, the `typeof` operator tries to identify its type, returning one of the following strings:
- 'boolean'
- 'number'
- 'bigint'
- 'string'
- 'symbol'
- 'undefined'
- 'object'
- 'function'

The `typeof` operator can only distinguish between primitives and the general object type - it does not distinguish between the specific types of objects except for functions. That is, despite also being an object, a function is recognized by `typeof` as such, so it returns 'function', not 'object'.


```js
typeof undefined              // 'undefined'
typeof null                   // 'object'
typeof String("abc")          // 'string', since String coerces to string prim
typeof new String("abc")      // 'object', since new String returns a new obj


// typeof returns a string
// typeof :: a -> string
typeof undefined === 'undefined' // true
typeof undefined === undefined   // false
```

## StringTag

There is a *general object type* and then there is a *specific object type*, that is jsut a generic, unspecialized object. Other objects stem from the generic object but each is specialized is its own way. However, the `typeof` cannot tell them apart, so we have to use the other means.

Internally, all objects have a special property [[StringTag]] that identifies an object's true nature - its specialty. However, we cannot read this internal tag directly, only through calling the `toString` method off an object. 

- all object have the internal property [[StringTag]]
- some objects have implemented their own `toString` method
- Object (at the top of the hierarchy) has the `toString` method

Calling `toString` off an object, either invokes the object's own `toString` method directly, or if the object doesn't have one, JS goes up the prototype chain, searching for an object that does. Eventually and if no other is found, the `Object`'s (top dog object at the top of the hierarchy) `toString` method is invoked. So, an object might not even have the `toString` method or it may have overwritten it with its own implementation.

So we gotta jump around these issues and get a hold of the top object's `toString` method because we know this one reads the [[StringTag]] property and can help us identify the true nature of objects. But, we need to get a hold of the `toString` off the Object, and then call it using the current object as the target, since we want to read the current object's [[StringTag]] property.

Much ado about nothing:

```js
Object.prototype.toString.call(x)
```
where `x` is the given value, we assume is an object whose speciality we want to obtain. This works but we get strings like `[Object RegExp]`, so we gotta tidy up the output. And we gotta intgrate this method with (after) the `typeof` operator to set up one universal function that can identify JS values for us. Come to think of it, we don't need `typeof` now, since `Object.prototype.toString.call` can also take care of its part.

```js
// better typeof
const ty = x => Object.prototype.toString.call(x).match(/\s([a-zA-Z]+)/)[1]
```
