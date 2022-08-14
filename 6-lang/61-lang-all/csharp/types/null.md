# Null

## Null Operators

C# provides two operators to make it easier to work with nulls: 
- the null coalescing operator
- the null-conditional operator

## Null Coalescing Operator

- `??` operator is the null coalescing operator.
- If the operand is non-null it is returned, otherwise default value is
- null coalescing operator has **short-circuit** logic: if the lefthand expression is non-null, the righthand expression is never evaluated.
- null coalescing operator also works with nullable value types (they need to be declared by appending a `?` to the type).

```cs
// nullable reference types
string s1 = null;
string s2 = s1 ?? "nothing";

// nullable value types
int? n = null;
int x = n ?? 42;
```

## Null-conditional Operator

(since C#6) 

- `?.` operator is the null-conditional or *Elvis* operator (Elvis emoticon)
- It allows method call and member access (just like the standard dot operator) except that if the operand on the left is `null`, the expr evaluates to `null` instead of throwing a `NullReferenceException`

```cs
System.Text.StringBuilder sb = null;
string s = sb?.ToString(); // No error: s instead evaluates to null
// equivalent to:
string s = (sb == null ? null : sb.ToString());
```

Upon encountering a null, the Elvis operator short-circuits remainder of expr.

In the following example, `s` evaluates to `null`, even with a standard dot
operator between `ToString()` and `ToUpper()`:

```cs
System.Text.StringBuilder sb = null;
string s = sb?.ToString().ToUpper(); // s evaluates to null without error
```

Repeated use is necessary if the next expr in chain could also produce a null:

```cs
x?.y?.z
// equivalent to (except x.y is evaluated only once):
x == null ? null : (x.y == null ? null : x.y.z)
```

The final expression must be capable of accepting a null.

```cs
System.Text.StringBuilder sb = null;
int length = sb?.ToString().Length; // Illegal: int cannot be null 
// need to use nullable type:
int? length = sb?.ToString().Length; // OK : int? can be null
```

You can also use the null-conditional operator to **call void method**
```cs
someObject?.VoidMethod();
```
If `someObject` is `null`, this becomes a nop rather than throwing a `NullReferenceException`.

The null-conditional operator can be used with the commonly used type members including methods, fields, properties and indexers.

It also combines well with the null coalescing operator:
```cs
System.Text.StringBuilder sb = null;
string s = sb?.ToString() ?? "nothing"; // s evaluates to "nothing"
```
