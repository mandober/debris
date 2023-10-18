# Details of the object model

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Details_of_the_Object_Model


## Class-based vs. prototype-based languages

*Class-based object-oriented languages* are founded on the concept of two distinct entities: classes and instances. A **class** defines all of the properties that characterize a certain set of objects. A class is an abstract rather than any particular member in a set of objects it describes. An **instance**, on the other hand, is the instantiation of a class, typically in the form of an object. An instance has exactly the same properties of its parent class.

A *prototype-based* language does not make distinction between abstract classes and their instantiations (concrete objects) - there are just objects. Such a language has the notion of a **prototypical object**, which is an object (any object) used as a template from which the initial properties for a new object are obtained. Any object can specify its own properties, either on creation or during run time.

JavaScript does not have a class definition separate from the constructor. Instead, there is a *constructor function* that can create objects with a particular initial set of properties and values. Any JavaScript function can be used as a constructor.

*ES6 classes* (introduced in ECMAScript 2015) are primarily *syntactic sugar over existing prototype-based inheritance*.

> Any object can act as the prototype for any other object, allowing the second object to share its properties.

This enables *delegation*, as one object can delegate methods to another object without defining them itself.

JavaScript implements *inheritance* by allowing you to associate a prototypical object with any constructor function.

In JavaScript, you can add or remove properties of any object, even at run time. If you add a property to an object that is used as the prototype for a set of objects, they will have the new property immediately available.


## Comparison

Comparison of class-based (Java) and prototype-based (JS) object systems:
* Class vs. Instance:
  - Class and instance are distinct entities (Java)
  - All objects can inherit from another object (JS)
* Definition:
  - Define a class in class definition, instantiate it via constructor
  - Define and create a set of objects with constructor functions
* Creation of new object:
  - Create a single object with the `new` operator
  - `new` operator, sometime optional
* Construction of object hierarchy:
  - by defining class and subclasses
  - by appointing an object as the prototype associated with a constructor fn
* Inheritance model:
  - Inherit properties by following the class-subclass chain
  - Inherit properties by following the *prototype chain*
* Extension of properties:
  - cannot add properties dynamically (at run-time)
  - constructor function or prototype specifies an initial set of properties, which may be altered dynamically on individual objects or entire object sets


## Constructing an object hierarchy


```
            Employee
            ↓      ↓
       Worker     Manager
       ↓    ↓
Engineer    Seller
```

Specs:
* Employee: name = "", dept = "general"
* Manager extends Employee: Employee[] reports = []
* Worker extends Employee: String[] projects = []
* Seller extends Worker: quota = 100, <OR> dept="sales"
* Engineer extends Worker: machine="", <OR> dept="engineering"
