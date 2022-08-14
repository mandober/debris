# Control Flow

## Ternary operator

`EXPR ? TRUE_PART : FALSE_PART;`

If-else statement in in the form of expression, which is always welcome, esp. for lambda context which allows only a single expresion.

```php
# eval_expr ? return_then : return_else
$predicate ? then_() : else_();

# assign the overall expr
$overall_expr = $pred ? then_() : else_();

# or return (if inside a func)
function a($pred)
{
  # return the overall expr
  return $pred ? then_() : else_();

  # if $pred evals to a bool anyway, skip the then/else
  return $pred;

  # if not, you can cast the result explicitly to a boolean:
  return (bool) $pred ? then_() : else_();
}


# or in a lambda
$la = fn($b) => $b ? true : false;
#
# if $b evaluates to a bool anyway:
$la = fn($b) => $b;
#
# if not, you can cast the result explicitly to a boolean:
$la = (bool) fn($b) => $b;
```


## Ternary as binary

`EXPR ?: ELSE_PART`

This variant of ternary expr is a shorthand for this, fully expanded variant:

`EXPR ? EXPR : ELSE_PART;`

This is frequently used to check if a variable has a non-falsy value, in which case that value is returned (used in some context); otherwise the other (latter) expression is returned instead.

```php
echo $val ?: '$val is falsy!';

echo $val ?? '$val is null!'
```

This ternary variant is somewhat similar to *null coercion operator*, `??` except that it returns the other expr only in case the evaluation yields a null.
