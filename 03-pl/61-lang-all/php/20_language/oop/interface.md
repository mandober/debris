# Interface










## Interface Constants

You can specify *class constants* in an interfaces (similar to specifying `public static final` fields in Java's interfaces).

```php
interface IFace
{
  const KONST = 'Interface constant';

  public function method();
}
```

Access the constant:
- **by referring to the interface name** (needs no previous impl by a class!)
- by referring to the implementing class' name (as expected)

```php
class Baz implements IFace { /* ... */}
print Baz::KONST;

print IFace::KONST;
```
