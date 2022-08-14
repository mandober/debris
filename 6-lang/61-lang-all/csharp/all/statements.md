# Statements

- [Local variables](#local-variables)
- [Expression Statements](#expression-statements)
- [Selection Statements](#selection-statements)


In C#, a statement is considered a command. Statements perform some action in your code such as calling a method or performing calculations. Statements are also used to declare variables and assign values to them.

Statements are formed from tokens. These tokens can be keywords, identifiers (variables), operators, and the statement terminator which is the semicolon. All statements in must be terminated with a semicolon.




- A statement block is a series of statements appearing between braces.
- **declaration** statement declares a new variable, optionally initializing the variable with an expression (technically called a definition).
- may declare multiple variables of the same type in a comma-separated list
- A constant declaration is like a variable declaration, except that it cannot be changed after it has been declared, and the initialization must occur.
- The scope of a **local variable** or **local constant** extends throughout the current block.
- shadowing (a local variable) is not supported


```cs
// declaration
int x, y, z;

// declaration with initialization i.e. definition
bool rich = true, famous = false;

// constant declaration
const double c = 2.99792458E08;
c += 10; // Compile-time Error
```


## Local variables

The scope of a **local variable** or **local constant** extends throughout the current block. Shadowing (a local variable) is not supported.

A variable's scope extends in both directions throughout its code block. This means that *if we moved the initial declaration of x to the bottom of the method, we'd get the same error* (that x is already defined). This is in contrast to C++ and what makes it strange is that it's not even legal to refer to a variable or constant before it's declared.

```cs
static void Main() { // outer scope
  int x;

  // inner scope 'a
  {
    int y;
    int x; // CT Error: x already defined
  }

  // inner scope 'b
  {
    int y; // OK: y not in scope
  }

  Console.Write(y); // CT Error: y is out of scope
}
```

## Expression Statements

Expression statements are expressions that are also valid statements. An expression statement must either change state or call something that might change state. Changing state essentially means changing a variable.

The possible expression statements are:
* Assignment expressions (including increment and decrement expr)
* Method call expressions (both void and non-void)
* Object instantiation expressions

```cs
// Declare variables with declaration statements:
string s;
int x, y;
System.Text.StringBuilder sb;

// Expression statements
x = 1 + 2;                // assignment expr
x++;                      // incr expr
y = Math.Max(x, 5);       // assignment expr
Console.WriteLine(y);     // method call expr
sb = new StringBuilder(); // assignment expr
new StringBuilder();      // object instantiation expr
```

When you call a constructor or a method that returns a value, you're not obliged to use the result. However, unless the constructor or method changes state, the statement is completely useless:

```cs
new StringBuilder(); // legal, but useless
new string('c', 3);  // legal, but useless
x.Equals(y);         // legal, but useless
```

## Selection Statements

Mechanisms to conditionally control the flow of execution:
* Selection statements: `if`, `switch`
* Conditional (ternary) operator: `?:`
* Loop statements: `while`, `do..while`, `for`, `foreach`

