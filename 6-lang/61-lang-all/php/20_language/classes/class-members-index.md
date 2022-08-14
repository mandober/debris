# Language items in a class

A class may be regarded in its own right, since static class members belong to the class itself and they can be accessed without even instantiating the class. The access is possible via: `ClassName::$prop` or `ClassName::meth()`

A class may also be regarded as an object template, where a class defines a common set of members (props and methods) for all (future) objects of this class. In this case, these members are called *instance class members* (or just instance members) because they belong to the class' instances; also, each object gets its own separate (independent from the other instances of this class) set of instance members.





## Class members

**Class Members** are the language items that may be present in a definition of a class. Syntactically, these are variables, constants and functions.

However, these 3 language items can manifest radically different behaviour and functionality depending on their surrounding context and the presence of modifiers.

Even within a class context, each of these items displays a different behaviour depending on the location, but also on the use of modifiers, whether directly on them or on their enclosing elements.

Modifiers that work on class members:
- public
- protected
- private
- static




Variables and constants are usually called **properties** or **fields**, and the functions are **methods**. Sometimes this division is more strict, designating the name "field" only to the variables and constants that are instance members (and not the memebers of the class itself).



There are 2 kinds of Class Members:
* Static Class Members
* Instance Class Members

## Static Class Members
Static Class Members belong to the class itself.
No need to instantiate a class to access them from outside of class

## Instance Class Members
Instance Class Members belong to the class' instances.
Each instance has own, separate, set of Instance Class Members (no conflict)


## Instantiation
A class can be instantited using the `new` construct,
which returns the new object i.e. new instance of this class.
Instance Variable, here named $ins, binds the new object;
Objects are always bound (and passed) by reference,
So, passing the instance var by value or by ref is one and the same.



```php
```
