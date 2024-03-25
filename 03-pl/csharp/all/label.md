# Label

- Labels are always used in `switch` statements
- Labels can be placed anywhere (compiler will complain if unreferenced)
- viable targets of `goto` statements.
- Named blocks: labels can be used to name a block of code
- Labels must not be the only entity in a container (class, method, namespace)


```cs
goto label;
Write("don't ignore me"); // Warning: Unreachable code detected
//...
label:
  Write("me me me");
```

## Named block

Label can be used to name a block

```cs
// named block
decision: {
  switch (n) {
    case 0:  return 0;
    case 1:  return 1;
    case 2:  return 1;
    default: return fib(n-1) + fib(n-2);
  }
}
```


Labels cannot they be used with `break` to break out of (nested) loops, e.g. `break label`, but you can always use `goto` for that.

```cs
outter:
  for(int i=1; i < 8; i++) {
    if (j == 2) goto inner;
      inner:
        for(int j=1; j < 5; j++) {
            if (j == 2) goto outter;
        }
  }
```
