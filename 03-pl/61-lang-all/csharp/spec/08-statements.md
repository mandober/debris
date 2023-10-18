# Statements

The actions of a program are expressed using statements.

C# supports several different kinds of statements, a number of which are defined in terms of embedded statements.

A **block** permits multiple statements to be written in contexts where a single statement is allowed. A block consists of a list of statements written between the braces.

**Declaration statements** are used to declare local variables and constants.

**Expression statements** are used to evaluate expressions.    
Expressions that can be used as statements include:
- method invocations
- object allocations using the new operator
- assignment
- compound assignment operators
- increment and decrement operations
- await expressions

**Selection statements** are used to select one of a number of possible statements for execution based on the value of some expression.
- if statement
- switch statement

**Iteration statements** are used to repeatedly execute an embedded statement:
- while statement
- do statement
- for statement
- foreach statement

**Jump statements** are used to transfer control:
- break statement
- continue statement
- goto statement
- throw statement
- return statement
- yield statement

**Exceptions statements**
- try-catch statement is used to catch exceptions
- try-finally statement specifies finalization code that is always executed

The **checked** and **unchecked** statements are used to control the overflow checking context for integral type arithmetic operations and conversions.

The **lock** statement is used to 
- obtain the mutual-exclusion lock for a given object
- execute a statement
- then release the lock

The **using** statement is used to
- obtain a resource
- execute a statement related to that resource
- dispose of that resource


```cs
// LOCAL VARIABLE DECLARATION
static void Main() {
   int a;
   int b = 2, c = 3;
   a = 1;
   Console.WriteLine(a + b + c);
}

// LOCAL CONSTANT DECLARATION
static void Main() {
    const float pi = 3.1415927f;
    const int r = 25;
    Console.WriteLine(pi * r * r);
}


// EXPRESSION STATEMENTS
static void Main() {
    int i;
    i = 123;                // Expression statement
    Console.WriteLine(i);   // Expression statement
    i++;                    // Expression statement
    Console.WriteLine(i);   // Expression statement
}


// IF STATEMENT
static void Main(string[] args) {
    if (args.Length == 0) 
        Console.WriteLine("No arguments");
    else
        Console.WriteLine("One or more arguments");
}


// SWITCH STATEMENT
static void Main(string[] args) {
    int n = args.Length;
    switch (n) {
        case 0:
            Console.WriteLine("No arguments");
            break;
        case 1:
            Console.WriteLine("One argument");
            break;
        default:
            Console.WriteLine("{0} arguments", n);
            break;
    }
}

// WHILE STATEMENT
static void Main(string[] args) {
    int i = 0;
    while (i < args.Length) {
        Console.WriteLine(args[i++]);
    }
}

// DO-WHILE STATEMENT
static void Main() {
    string s;
    do {
        s = Console.ReadLine();
        if (s != null) Console.WriteLine(s);
    } while (s != null);
}

// FOR STATEMENT
static void Main(string[] args) {
    for (int i = 0; i < args.Length; i++) {
        Console.WriteLine(args[i]);
    }
}

// FOREACH STATEMENT
static void Main(string[] args) {
    foreach (string s in args) {
        Console.WriteLine(s);
    }
}

// BREAK STATEMENT
static void Main() {
    while (true) {
        string s = Console.ReadLine();
        if (s == null) break;
        Console.WriteLine(s);
    }
}

// CONTINUE STATEMENT
static void Main(string[] args) {
    for (int i = 0; i < args.Length; i++) {
        if (args[i].StartsWith("/")) continue;
        Console.WriteLine(args[i]);
    }
}

// GOTO STATEMENT
static void Main(string[] args) {
    int i = 0;
    goto check;
   loop:
    Console.WriteLine(args[i++]);
   check:
    if (i < args.Length) goto loop;
}

// RETURN STATEMENT
static int Add(int a, int b) {
    return a + b;
}

static void Main() {
    Console.WriteLine(Add(1, 2));
    return;
}


// YIELD STATEMENT
static IEnumerable<int> Range(int from, int to) {
    for (int i = from; i < to; i++) {
        yield return i;
    }
    yield break;
}

static void Main() {
    foreach (int x in Range(-10,10)) {
        Console.WriteLine(x);
    }
}



// THROW AND TRY STATEMENTS
static double Divide(double x, double y) {
    if (y == 0) throw new DivideByZeroException();
    return x / y;
}

static void Main(string[] args) {
    try {
        if (args.Length != 2) throw new Exception("Two numbers required");
        double x = double.Parse(args[0]);
        double y = double.Parse(args[1]);
        Console.WriteLine(Divide(x, y));
    } catch (Exception e) {
        Console.WriteLine(e.Message);
    } finally {
        Console.WriteLine("Good bye!");
    }
}


// CHECKED AND UNCHECKED STATEMENTS
static void Main() {
    int i = int.MaxValue;

    checked {
        Console.WriteLine(i + 1); // Exception
    }

    unchecked {
        Console.WriteLine(i + 1); // Overflow
    }
}


// LOCK STATEMENT
class Account {
    decimal balance;

    public void Withdraw(decimal amount) {
        lock (this) {
            if (amount > balance) throw new Exception("Insufficient funds");
            balance -= amount;
        }
    }
}


// USING STATEMENT
static void Main() {
    using (TextWriter w = File.CreateText("test.txt")) {
        w.WriteLine("Line one");
        w.WriteLine("Line two");
        w.WriteLine("Line three");
    }
}