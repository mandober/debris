# Constructors

C# has 2 types of constructors:
- instance constructors
- static constructors


In C#, a constructor resembles a method that
- has the same name as the class.
- doesn't have return type specified as it implicitly returns class' instance.
- has somewhat different set of applicable modifiers.

A class without an explicit constructor is provided one, by the compiler, that will initialize a new instance.

**Default**    
The initializer is of the form `base()`; in other words, a call to the base class's parameterless constructor. A compile time error is raised if you don't provide a constructor initializer and the base class doesn't have an accessible parameterless constructor.

Note, however, that it may have one without you putting one in yourself, see below.

At least one constructor (default if no other) must be invoked in each class in the hierarchy.


## Static Constructors
Static constructors are the equivalent of static initializers in Java - they give the code which is executed when a class is first used.

Invoking static constructor:
- explicitly
- implicitly

A static constructor can be invoked explicitly (it doesn't use `new` operator), by specifying the class name (path), e.g. `ClassName`.

A static constructor is invoked implicitly by referring to any static member of that class.



## Instance constructors
An instance constructor (or commonly just constructor) is a class member that implements the actions required to initialize an instance (in an object form) of a class.

An instance of a class is created with `new` operator; the process:
1. new memory is allocated for the new instance
2. constructor is invoked to initialize the instance
3. reference to the instance is returned

An instance can also be created with various reflective methods.


An example:

```cs
// class
public class Class
{
  // ctor
  public Class (int x)
  {
    Console.WriteLine (x);
  }
}
```

However, the compiler implicitly adds a `base()` call:

```cs
public class Class
{
  public Class (int x) : base()
  {
    Console.WriteLine (x);
  }
}
```

The base call invokes other constructors that should run before the code in constructor's body is executed.

Aside from plain object, every constructor of every class does this, either explicitly or implicitly.

There are two forms of constructor initializer:
- one that calls a base class constructor, `: base()`
- one that calls another constructor from this class, using `: this()` syntax.

There must always be a chain of constructors which runs constructors all the way up the class hierarchy. Every class in the hierarchy will have a constructor invoked, although some of those constructors may not explicitly appear in the code.

The arguments, if any, of `base(..)` or `this(..)` calls are passed as the parameters to the constructor that's being called. These arguments may be defined in the constructor declaration, in `(..)`.


```cs
// PARENT CLASS
public class Parent
{
  // invoke the parameterless constructor in `object`
  // `object` is on top of type hierarchy
  public Parent(int x) : base()
  {
    WriteLine("Parent's constructor taking an int");
  }
}

// CHILD CLASS
public class Child : Parent
{
  // invoke own (Child's constructor) taking an
  // int i.e. spawning a 5 out of nothing
  public Child() : this(5)
  {
    WriteLine("\nChild's parameterless constructor");
  }

    // invoke Parent's constructor
    // passing an int expression to it
    public Child (int y) : base(y + 1)
    {
      WriteLine("\nChild's constructor taking an int param and passing");
      WriteLine("an int expression, (y + 1), to its parent's constructor");
    }

    // invoke Parent's constructor
    // passing an int to it
    public Child(string x) : base(10)
    {
      WriteLine("\nChild's constructor taking a string param, but");
      WriteLine("passing a spawned int, 10, to its parent's constructor");
    }
}
```

At least one constructor (default if no other) must be invoked in each class in the hierarchy.

A class without an explicit constructor is provided one, by the compiler, that will initialize a new instance.

## Default constructor initializers
The initializer is of the form `base()`; in other words, a call to the base class's parameterless constructor. A compile time error is raised if you don't provide a constructor initializer and the base class doesn't have an accessible parameterless constructor.

Note, however, that it may have one without you putting one in yourself, see below.

## Default constructors
If you don't specify any constructors at all, a default constructor is provided by the compiler. This default constructor is a parameterless constructor with no body, which calls the parameterless constructor of the base class. In other words:

```cs
public class MySimpleClass
{
  int someMemberVariable;
}

// IS EQUIVALENT TO:

public class MySimpleClass
{
  int someMemberVariable;
  public MySimpleClass() : base() {}
}
```

Following from the previous section, this means that if the base class has no accessible parameterless constructor (including a default one), you get a compile-time error if the derived class doesn't have any constructors - because the default constructor will implicitly try to call a parameterless constructor from the base type.

If the class is abstract, the default constructor provided has protected accessibility; otherwise it has public accessibility.


## Instance variable initializers
When a member variable declaration also has an assignment, that's called a variable initializer. All the variable initializers for a class are implicitly run directly before the invocation of whichever base class constructor is invoked. (Note that this is a change from a previous version of the page, where I believed that they were invoked after the base constructor, as they are in Java.) Here's a simple example of instance variable initializers:

```cs
public class MySimpleClass
{
    int someMemberVariable = 10;
                
    public MySimpleClass()
    {
        Console.WriteLine ("someMemberVariable={0}", someMemberVariable);
    }
}
```

The output of the above is 10 when a new instance is created, whereas without the instance variable initializer, it would be 0 (the default value for instance variables of type int). Demonstrating the difference between Java and C# in terms of when the instance variable initializers are run requires calling an overridden method from the base class constructor. This is a really bad idea - wherever possible, only call non-virtual methods from constructors, and if you absolutely must call a virtual method, document very carefully that it is called from the constructor, so that people wishing to override it are aware that their object may not be in a consistent state when it is called (as their own constructor won't have run yet). Here's an example:

```cs
public class MyBaseClass
{
    public MyBaseClass ()
    {
        Console.WriteLine (this.ToString());
    }
}

public class MyDerivedClass : MyBaseClass
{
    string name="hello";
    
    public MyDerivedClass : base()
    {
        Console.WriteLine (this.ToString());
    }

    public override string ToString()
    {
        return name;
    }
}
```

When a new instance of MyDerivedClass is created in C#, the output is:
```
hello
hello
```

The first line is hello because the instance variable initializer for the name variable has run directly before the base class constructor. The equivalent code in Java syntax would output:
```
null
hello
```

Here the first line is null because the instance variable initializer for the name variable only runs directly after the base class constructor has returned (but before ToString is called for the second time).

## Constructors are not inherited
Constructors are not inherited. In other words, just because a base class has a constructor taking a certain list of parameters doesn't mean that a derived class has a constructor taking that list of parameters. (It can, by providing one itself, but it doesn't inherit it from the base class.) To demonstrate this, here's an example which doesn't compile:

```cs
public class MyBaseClass
{
  public MyBaseClass (int x) {}
}

public class MyDerivedClass : MyBaseClass
{
    // This constructor itself is okay - it invokes an
    // appropriate base class constructor
    public MyDerivedClass () : base (5)
    {
    }
              
    public static void Main()
    {
        new MyDerivedClass (10);
    }
}
```

Here, we try to invoke a constructor for MyDerivedClass which takes an int parameter. There isn't one, however, as constructors aren't inherited. The MyBaseClass constructor which takes an int parameter can be invoked by a constructor in MyDerivedClass (as is shown by the parameterless MyDerivedClass constructor) but isn't actually inherited. Removing the "10" from the above code would make it compile and run with no problems - the parameterless MyDerivedClass constructor would be invoked, and that would in turn invoke the MyBaseClass constructor taking an int parameter, with 5 as that parameter value.

Some people have said that they would rather constructors were inherited, making the language act as if all derived classes had constructors with all the parameter lists from the constructors from the base class, and just invoking them with the parameters provided. I believe this would be a very bad idea. Take, for instance, the FileInfo class. You must logically provide a filename when constructing a FileInfo instance, as otherwise it won't know what it's meant to be providing information on. However, as object has a parameterless constructor, constructors being inherited would then mean that FileInfo had a parameterless constructor. Some have suggested that this could be fixed by allowing you to "override" the parameters you didn't want invoked as private, but this goes against the idea that you should never be able to override anything to give it more restrictive access, and also means that class developers would have to change their code every time a new constructor was added to a base class.
