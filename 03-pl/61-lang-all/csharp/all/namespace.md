# Namespace

- A namespace is a domain for type names.
- Types are typically organized into hierarchical namespaces.
- A namespace forms an integral part of a type's name.
- Namespaces are independent of assemblies.
- Namespaces have no impact on member visibility.
- The dots in the namespace indicate a hierarchy of nested namespaces.
- Can refer to a type with its fully qualified name (FQN)
- FQN includes all namespaces from the outermost to the innermost.
- Types not defined in any namespace reside in the *global namespace*
- Global namespace also includes top-level namespaces.
- `using` directive brings the items in a namespace into scope.
- that way you don't have to use FQN of classes.


Elements defined in a namespace cannot be explicitly declared as: `private`, `protected`, `protected internal`, `private protected`.

From C# 6, you can import not just a namespace, but a specific type, with the `using static` directive. All static members of that type can then be used without being qualified with the type name.

The `using static` directive imports all accessible static members of the type, including fields, properties, and nested types. You can also apply this directive to enum types, in which case their members are imported.

Names declared in outer namespaces can be used with non-qualified names (NQN) within inner namespaces. To refer to a type in a different branch of your namespace hierarchy, you can use a partially qualified name (PQN).

If the same type name appears in both an inner and an outer namespace, the **inner name wins**.

All type names are converted to FQN at compile time. Intermediate Language (IL) code contains no unqualified or partially qualified names.

You can **repeat** a namespace declaration, as long as the type names within the namespaces don't conflict.

```cs
namespace Outer.Middle.Inner {
  class Class1 {}
}

namespace Outer.Middle.Inner {
  class Class2 {}
}
```

Even break the code by namespace into two source files such that we could compile each class into a different assembly.

You can **nest** a `using` directive within a namespace. This allows you to scope the `using` directive within a namespace declaration.

Importing a namespace can result in type-name collision; rather than importing the whole namespace, you can import just the specific types you need, giving each type an **alias**. Or alias entire namespace.

```cs
using PropertyInfo2 = System.Reflection.PropertyInfo;
class Program { PropertyInfo2 p; }

// entire namespace can be aliased:
using R = System.Reflection;
class Program { R.PropertyInfo p; }
```


## Extern aliases

`extern aliases` allow your program to reference two types even with the same FQN, i.e. the namespace and type name are identical.

In that case use `exter alias` directive and asssign arbitrary names to each import.

```cs
extern alias W1;
extern alias W2;
```

Then, to compile the code state assigned names (W1, W2):

```shell
csc /r:W1=Widgets1.dll /r:W2=Widgets2.dll application.cs
```


## Namespace alias qualifiers

Names in inner namespaces hide names in outer namespaces. However, sometimes even the use of a fully qualified type name does not resolve the conflict.

```cs
namespace N {
  class A {
    public class B {} // Nested type
    static void Main() { new A.B(); } // Instantiate class B
  }
}
namespace A {
  class B {}
}
```

The `Main` method could be instantiating either the nested `class B` or the `class B` within the namespace `A`.

The compiler always gives higher precedence to identifiers in the current namespace (in this case, the nested `B class`).

The **global namespace** is the root of all namespaces and it is identified with the contextual keyword `global`.

A namespace name can be qualified relative to
- the `global` namespace
- the set of `extern aliases`

The `::` token is used for namespace alias qualification.

```cs
// qualify using the global namespace (this is commonly
// seen in auto-generated code to avoid name conflicts):
namespace N {
  class A {
    static void Main() {
      System.Console.WriteLine (new A.B());
      System.Console.WriteLine (new global::A.B());
    }
    public class B {}
  }
}
namespace A {
  class B {}
}


// qualifying with an alias:
extern alias W1;
extern alias W2;

class Test {
  static void Main() {
    W1::Widgets.Widget w1 = new W1::Widgets.Widget();
    W2::Widgets.Widget w2 = new W2::Widgets.Widget();
  }
}
```

