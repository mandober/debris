# with

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/with

- forbidden in strict mode

The `with` statement extends the scope chain for a statement.

Use of the `with` statement is not recommended, as it may be the source of confusing bugs and compatibility issues

Syntax:

```js
with (expr) {
  ...
}
```

*expr* adds the given expression to the scope chain used when evaluating the statement. The parentheses around the expression are required.


```js

```

JavaScript looks up an unqualified name 
by searching a scope chain 
associated with the execution context 
of the script or function 
containing that unqualified name.

The `with` statement adds the given object 
to the head of this scope chain 
during the evaluation 
of its statement body. 

If an unqualified name used in the body 
matches a property in the scope chain, 
then the name is bound to the property 
and the object containing the property. 

Otherwise a `ReferenceError` is thrown.

Using `with` is not recommended, 
and is forbidden in ECMAScript 5 strict mode. 

The recommended alternative is 
to assign the object whose properties you want to access 
to a temporary variable.
