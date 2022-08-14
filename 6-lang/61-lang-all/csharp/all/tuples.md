# Tuples

Returning a tuple

```cs
class Program
{
  static void Main(string[] args)
  {
    double div, rem;
    (div, rem) = DivRem(22D, 7D);
  }

  static (double, double) DivRem(double dor, double der) {
    return (dor/der, dor % der);
  }
}
```


Tuple deconstructions:

```cs
// tuple construction
var rect = (10, 20);

// tuple deconstructions:
(int w, int h) = rect;
// or:
(var width, var height) = rect;
// or:
var (ww, hh) = rect;
```

