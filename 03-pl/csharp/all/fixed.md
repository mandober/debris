# Fixed statement

fixed statement
https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/keywords/fixed-statement

fixed size buffers
https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/unsafe-code-pointers/fixed-size-buffers


The fixed statement prevents the garbage collector from relocating a movable variable. The fixed statement is only permitted in an unsafe context. fixed can also be used to create fixed size buffers.

The fixed statement sets a pointer to a managed variable and "pins" that variable during the execution of the statement. Pointers to movable managed variables are useful only in a fixed context. Without a fixed context, garbage collection could relocate the variables unpredictably. The C# compiler only lets you assign a pointer to a managed variable in a fixed statement.

