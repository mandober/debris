# Syntax: Keywords

https://www.php.net/manual/en/reserved.keywords.php

- Some keywords (that resemble functions or constants or similar things) are actually **language constructs**

The keywords are disallowed as names of:
- constants
- classes
- functions

The keywords are allowed as names of:
- variable (although not recommended)
- since PHP 7:
  - properties
  - class constants (except `class`)
  - class methods
  - interfaces
  - traits



## PHP Keywords


### PHP Keywords: alphabetically

```php
__halt_compiler()
abstract and array() as
break
callable case catch class clone const continue
declare default die() do
echo else elseif empty() enddeclare endfor endforeach endif 
endswitch endwhile eval() exit() extends
final finally for foreach function
global goto
if implements include include_once instanceof insteadof interface isset()
list()
namespace new
or
print private protected public
require require_once return
static switch
throw trait try
unset() use
var
while
xor
yield
yield from
```

### PHP Keywords: late introductions

```php
goto        (PHP 5.3)
namespace   (PHP 5.3)
callable    (PHP 5.4)
insteadof   (PHP 5.4)
trait       (PHP 5.4)
finally     (PHP 5.5)
yield       (PHP 5.5)
yield from  (PHP 7.0)
```


### PHP Keywords: by category

#### Language constructs

```php
array()  list()
empty()  isset()  unset()
die()    exit()   __halt_compiler()
eval()
```

#### Flow control

```php
if          elseif      else      endif
switch      case                  endswitch     break
for                               endfor        break       continue
foreach     as                    endforeach    break       continue
while                             endwhile      break       continue
do
try         catch       finally
and         or          xor
break       continue
return      throw       goto
yield       yield from
```

#### Misc

```
declare     enddeclare

include     include_once
require     require_once

echo        print

var
const
function
static
default
global

use

callable
```

#### OOP

```
namespace
as

trait

class
extends
abstract
final

interface
implements

new
clone

instanceof
insteadof

private
protected
public
```
