# Names

An identifier may be any valid name that is not a reserved word
- valid name regex: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`
- the range `\x80-\xff` is Extended ASCII range (bytes 128-255)

Names identify:
- constants
- variables
- labels
- functions
- classes
- class members
- interfaces
- traits
- namespaces
- heredoc delimiter
- nowdoc delimiter


Constants, variables and function names live in different namespaces.

```php
function doppel() { return 'function'; }
const doppel = 'constant';
$doppel = 'variable';

echo doppel(), PHP_EOL;
echo doppel  , PHP_EOL;
echo $doppel , PHP_EOL;
```
