# Assemblies

- Assemblies are units of deployment, such as an `.exe` or `.dll`.
- Classes are compiled into assemblies.
- An assembly can contain many classes.

Assembly is a file that usually has the .dll file name extension, although strictly speaking, executable programs with the .exe file name extension are also assemblies.


For example, a *core* assembly (actually called *mscorlib.dll*) contains all the common classes, such as `System.Console`, and other assemblies contain classes for manipulating databases, accessing web services, building GUIs, etc.

- To make use of a class in an assembly, add a reference to it to the project.
- add `using`s that bring the items in namespaces in that assembly into scope.
- there's not a 1:1 equivalence between an assembly and a namespace
- A single assembly can contain classes defined in many namespaces
- a single namespace can span multiple assemblies.


For example, the classes and items in the `System` namespace are actually implemented by several assemblies, including *mscorlib.dll*, *System.dll* and *System.Core.dll*, among others.

When you use Visual Studio to create an application, the template you select automatically includes references to the appropriate assemblies.

For example, in Solution Explorer for the `TestHello` project, expand the `References` folder. You will see that a console application automatically contains references to assemblies called:
- `Microsoft.CSharp`
- `System`
- `System.Core`
- `System.Data`
- `System.Data.DataSetExtensions`
- `System.Net.Http`
- `System.Xml`
- `System.Xml.Linq`

You might be surprised to see that `mscorlib.dll` is not included in this list. The reason for this is that all .NET Framework applications must use this assembly because it contains fundamental runtime functionality.

The References folder lists only the optional assemblies; you can add or remove assemblies from this folder as necessary.

To add references for additional assemblies to a project, right-click the References folder and then click Add Reference.
