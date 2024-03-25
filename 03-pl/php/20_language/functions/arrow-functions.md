# Arrow functions

https://www.php.net/manual/en/migration74.new-features.php
https://stitcher.io/blog/short-closures-in-php

Arrow functions provide a shorthand syntax for defining functions with implicit by-value scope binding.

```php
$factor = 10;
$nums = array_map(fn($n) => $n * $factor, [1, 2, 3, 4]); // [10, 20, 30, 40];
```
