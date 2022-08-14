# Classes

<!-- TOC -->

- [Class](#class)
- [Fields](#fields)
- [Methods](#methods)
- [Constructors](#constructors)
- [Non-public constructors](#non-public-constructors)
- [Deconstructors](#deconstructors)
- [Object Initializers](#object-initializers)
- [Properties](#properties)

<!-- /TOC -->



## Class
- class is the most common kind of reference type.
- the simplest possible class declaration: `class ClassName {}`


```
[attributes]
class
```

Class members:
- fields
- properties
- methods
  - indexers
  - events
  - fields
  - constructors
  - overloaded operators
  - finalizer
- nested types
  - inner class



Class options:
* Preceding the keyword `class`
  - Attributes and class modifiers
  - Modifiers of a non-nested class
    - public
    - internal
    - abstract
    - sealed
    - static
    - partial
    - unsafe
* Following the class identifier
  - Generic type parameters
  - a base class
  - interfaces
* Within the braces 
  - Class members:
    - methods
    - properties
    - indexers
    - events
    - fields
    - constructors
    - overloaded operators
    - nested types
    - finalizer


## Fields

- A field is a variable that is a member of a class or struct.
- Field initialization is optional.
- Uninitialized field has default value (0, \0, null, false).
- Field initializers run before constructors.
- may declare multiple fields of the same type in a CS list
- convenient for specifying all the fields that share the same attr and mods
- Field initializations occur before the constructor is executed.


Field's modifiers:
- Static modifier `static`
- Access modifiers:
  - `public`
  - `internal`
  - `private`
  - `protected`
- Inheritance modifier: `new`
- Unsafe code modifier: `unsafe`
- Read-only modifier: `readonly`
- Threading modifier: `volatile`


## Methods

- A method's signature must be unique within the type.
- method signature: method name and parameter types in order.

Methods modifiers:
- Static modifier, `static`
- Partial method modifier, `partial`
- Asynchronous code modifier, `async`
- Access modifiers:
  - `public`
  - `internal`
  - `private`
  - `protected`
- Inheritance modifiers: 
  - `new`
  - `virtual`
  - `abstract`
  - `override`
  - `sealed`
- Unmanaged code modifiers:
  - `unsafe`
  - `extern`


## Constructors

- Constructor (CTOR) gets called on object instantiation.
- can be parameterless.


...


## Non-public constructors

*Constructors do not need to be public.*

A common reason to have a nonpublic constructor is to control instance creation via a static method call. The static method could be used to return an object from an object pool, instead of necessarily creating a new object; or return various subclasses based on input arguments:

```cs
public class Singleton {
    // Private constructor (`private` is assumed by default)
    Singleton() {}

    // Public static constructor
    public static Singleton Create (...) {
        // Perform custom logic here to return an instance of Class1 ...
    }
}
```


## Deconstructors

**Deconstructor** (deconstructing method), available in C# 7+, acts as an approximate opposite to a constructor: whereas a constructor typically takes a set of values (as parameters) and assigns them to fields, a deconstructor does the reverse (deconstructs an object) and assigns fields back to a set of variables. *Deconstructor (DCONS) is not destructor (DTOR)*.

A deconstruction method must be called `Deconstruct`, and have one or more `out` parameters:

```cs
class Rectangle {
    public readonly float Width, Height;

    // CTOR
    public Rectangle(float w, float h) {
        Width = w;
        Height = h;
    }

    // Deconstructor desconstructs an object
    public void Deconstruct(out float w, out float h) {
        w = Width;
        h = Height;
    }
}

// object construction
var rect = new Rectangle (3, 4);

// object deconstruction
(float w, float h) = rect;
// or equivalently, with implicit typing:
(var width, var height) = rect;
// or:
var (ww, hh) = rect;
```

If the variables into which you're deconstructing are already defined, omit the types altogether:

```cs
float width, height;
(width, height) = rect;
```
This is called a **deconstructing assignment**.

You can offer the caller a range of deconstruction options by overloading the `Deconstruct` method. The Deconstruct method can be an *extension method*; this is a useful trick if you want to deconstruct types you did not author.


## Object Initializers

To simplify object initialization, any accessible fields of an object can be set via an **object initializer**, directly after construction.

```cs
public class Bunny {
    public string Name;
    public bool LikesCarrots;
    public bool LikesHumans;
    public Bunny () {}
    public Bunny (string n) { Name = n; }
}
```

Using object initializers, you can instantiate Bunny objects as:

```cs
// parameterless constructors can omit empty parentheses
Bunny b1 = new Bunny {
    Name = "Bo",
    LikesCarrots = true,
    LikesHumans = false
};

// constructor with parameters
Bunny b2 = new Bunny ("Bo") {
    LikesCarrots = true,
    LikesHumans = false
};
```

The code above, with object initializers, is translated by the compiler to:

```cs
// <temp1> is some compiler-generated name
Bunny temp1 = new Bunny();
temp1.Name = "Bo";
temp1.LikesCarrots = true;
temp1.LikesHumans = false;
Bunny b1 = temp1;

Bunny temp2 = new Bunny ("Bo");
temp2.LikesCarrots = true;
temp2.LikesHumans = false;
Bunny b2 = temp2;
```

Temporary variables are there to ensure that if an exception is thrown during initialization, you can't end up with a half-initialized object (half-assed object).



## Properties

properties are sugar for a pattern in which a pair of methods, accessor (getter) and mutator (setter) encapsulate operations on a single field of a class. No redundant method signatures for the getter/setter implementations need be written, and the property may be accessed using field syntax rather than more verbose method calls.

- Properties look like fields from outside, but internally they contain logic.
- A property is declared like a field, but with a `get`/`set` block added.

Properties' modifiers:
- Static modifier, `static`
- Access modifiers:
  - public
  - internal
  - private
  - protected
- Inheritance modifiers:
  - new
  - virtual
  - abstract
  - override
  - sealed
- Unmanaged code modifiers:
  - unsafe
  - extern


For example, no one can tell whether `CurrentPrice` is a field or a property:

```cs
Stock msft = new Stock();
msft.CurrentPrice = 30;
msft.CurrentPrice -= 3;
Console.WriteLine (msft.CurrentPrice);
```

A property is declared like a field, but with a get/set block added.

Here's impl of `CurrentPrice` as a property:

```cs
public class Stock {
    // private "backing" field
    decimal currentPrice;

    // public property
    public decimal CurrentPrice 
    {
        get { return currentPrice; }
        set { currentPrice = value; }
    }
}
```

- get and set are **property accessors**.
- `get` accessor runs when the property is read.
- get must return a value of the property's type.
- `set` accessor runs when the property is assigned.
- set has an *implicit parameter* named `value` of the property's type    
  (that is typically assigned to a pre-declared private field)

Although properties are accessed in the same way as fields, they differ in that they give the implementer complete control over getting and setting its value. This control enables the implementer to choose internal representation, without exposing the details (to the client).

Basically, prop accessors are a shorthand for having a private filed, and then having a public getter/setter method for that private field, which controls the field's access, i.e. controls how the field's value is read/written (e.g. permission based access, validation before setting the value, etc.).


- read-only property only specifies a `get` accessor
- write-only property only specifies a `set` accessor (very rare)

Typically, a r/w property has a private backing field to store the data.
A (read-only) property might not have a backing field, instead returning a calculation based on other fields (but it might use a backing field to cache that calculation).

Since C#6, you can declare a ro property with **expression-bodied property**:

```cs
public decimal Worth => currentPrice * sharesOwned;
```

C#7 allows `set` accessors as well to use expression body:

```cs
public decimal Worth {
    get => currentPrice * sharesOwned;
    set => sharesOwned = value / currentPrice;
}
```
