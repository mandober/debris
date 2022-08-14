# Abstract Class vs Interface

Abstract classes are used for modelling a class hierarchy of similar objects. Interface is used for modelling communication between similar but also between very different objects that have some aspects in common (behaviors, actions, attributes, role).

Abstract class inheritance is used when the derived class shares the core properties and behaviour of the abstract class. The kind of behaviour that defines a class in many aspects.

On the other hand, interface inheritance is used when classes share peripheral behaviour, which doesn't necessarily describe the core behaviour of a derived class; Interfaces mare often used to define a set of methods that even unrelated objects may have in common.

For example, a car and a van share a lot of core properties and behaviours, so there might be an abstract class MotorVehicle which both extend. On the other hand, running on gas is what vehicles share with many other unrelated objects, so an interface, e.g. IGas, could define a set of methods dealing with this aspect.


Interface cannot have method definitions (method must not have a body), only method declarations (method signatures). Classes that implement the interface must define concrete implementations of declared methods.

Interface may implement another interface.


Abstract class may contain method definitions for non-abstract methods. This allows you to provide concrete default implementations. This allows an abstract class to provide a more rigorous contract, whereas an interface can just describe how a class is used (accessed) by allowing only declarations of publically accessible methods (API).

An abstract class may have abstract (virtual) and concrete (non-abstract,non-virtual) methods. By defining concrete class members (concrete fields and methods), an abstract class can exert a higher level of control and provide more implementation details of intended inheretable behaviors.

More than one interface can be implemented on a class. A class can only derive from a single abstract base class. This allows for polymorphic hierarchy using interfaces, but not abstract base classes. This also allows for a pseudo-multi-inheritance using interfaces.

Abstract classes may be modified after the code has already been released (even after bumping the major version number) without breaking the API. But changes of the interface code result in the breaking changes.

---

<specific feature to C#> Interfaces, unlike abstract base classes, may be impl by structs. This allows enforcing behavioral contract/guideline to the value types (a struct is a value type).
