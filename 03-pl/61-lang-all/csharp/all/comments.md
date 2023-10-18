# Comments

* Syntax comments
  - single line
  - multiple lines
* XML documentation comments (also appear as IDE tooltips)
  - single line
  - multiple lines


```cs
/// <Summary>Adds two integers.</Summary>
/// <param name="x">Integer.</param>
/// <param name="y">Integer.</param>
/// <returns>Integer</returns>
public int Sum(int x, int y) => x + y;
```


https://docs.microsoft.com/en-us/visualstudio/ide/reference/generate-xml-documentation-comments


https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/xmldoc/xml-documentation-comments


https://docs.microsoft.com/en-us/dotnet/csharp/codedoc


The XML template is immediately generated above the code element. For example, when commenting a method, it generates the <summary> element, a <param> element for each parameter, and a <returns> element to document the return value.


## XML tags

https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/xmldoc


For angle brackets to appear in the text of a doc comment:

```cs
/// <summary cref="C < T >">
/// </summary>
```

`*` denotes that the compiler verifies syntax.

```
<c>  <para>  <see>*
<code>  <param>*  <seealso>*
<example>  <paramref>  <summary>
<exception>*  <permission>*  <typeparam>*
<include>*  <remarks>  <typeparamref>
<list>  <returns>  <value>

c
code
example
exception*
include*
list
para
param*
paramref
permission*
remarks
returns
see
seealso*
summary
typeparam*
typeparamref
value
```

`<c>` indicates that text within a description should be marked as code.

```cs
// compile with: -doc:DocFileName.xml

/// text for class TestClass
public class TestClass
{
    /// <summary>
    /// <c>DoWork</c> is a method in the <c>TestClass</c> class.
    /// </summary>
    public static void DoWork(int Int1){}
    /// text for Main
    static void Main(){}
}

/// <summary>
/// This sample shows how to specify the <see cref="TestClass"/> constructor as a cref attribute.
/// </summary>

/// <summary>
/// This sample shows how to specify the <see cref="TestClass(int)"/> constructor as a cref attribute.
/// </summary>

/// <summary>The GetZero method.</summary>
/// <example> 
/// This sample shows how to call the <see cref="GetZero"/> method.
/// <code>
/// class TestClass 
/// {
///     static int Main() 
///     {
///         return GetZero();
///     }
/// }
/// </code>
/// </example>

```

`<code>` indicates multiple lines as code.

`<example>` tag lets you specify an example of how to use a method or other library member.

<exception cref="member">description</exception>

The <para> tag is for use inside a tag, such as <summary>, <remarks>, or <returns>, and lets you add structure to the text.

<param name="name">description</param>

<paramref name="name"/>
The <paramref> tag gives you a way to indicate that a word in the code comments, for example in a <summary> or <remarks> block refers to a parameter. The XML file can be processed to format this word in some distinct way, such as with a bold or italic font.


<permission cref="member">description</permission>
The <permission> tag lets you document the access of a member. The PermissionSet class lets you specify access to a member.

<remarks>description</remarks>
The <remarks> tag is used to add information about a type, supplementing the information specified with <summary>. This information is displayed in the Object Browser window.

<returns>description</returns>
The <returns> tag should be used in the comment for a method declaration to describe the return value.


<see cref="member"/>
The <see> tag lets you specify a link from within text. Use <seealso> to indicate that text should be placed in a See Also section. Use the cref Attribute to create internal hyperlinks to documentation pages for code elements.

<seealso cref="member"/>


<summary> tag should be used to describe a type or a type member. Use <remarks> to add supplemental information to a type description. Use the cref Attribute to enable documentation tools such as Sandcastle to create internal hyperlinks to documentation pages for code elements.

The text for the <summary> tag is the only source of information about the type in IntelliSense, and is also displayed in the Object Browser Window.


<typeparam name="name">description</typeparam>  
Parameters
name
The name of the type parameter. Enclose the name in double quotation marks (" ")

description
A description for the type parameter.

Remarks
The <typeparam> tag should be used in the comment for a generic type or method declaration to describe a type parameter. Add a tag for each type parameter of the generic type or method.
The text for the <typeparam> tag will be displayed in IntelliSense, the Object Browser Window code comment web report.

<typeparamref name="name"/>  
Parameters
name
The name of the type parameter. Enclose the name in double quotation marks (" ").
Remarks
For more information on type parameters in generic types and methods, see Generics.
Use this tag to enable consumers of the documentation file to format the word in some distinct way, for example in italics.

<value>property-description</value>  
Parameters
property-description
A description for the property.
Remarks
The <value> tag lets you describe the value that a property represents. Note that when you add a property via code wizard in the Visual Studio .NET development environment, it will add a <summary> tag for the new property. You should then manually add a <value> tag to describe the value that the property represents.