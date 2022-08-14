# PECL

https://pecl.php.net/

- PHP Extension and Application Repository, **PEAR**
- PHP Extension Community Library, **PECL**

PEAR is a PHP library repository but not much of a package manager. Anyway, PEAR is practically dead, long live Composer. It maybe still needed to setup `pecl` command? or possibly not at all. Composer can engage PEAR repositories and channels, no love lost.

PECL is a command tool and repository for PHP extensions. These are the proper, C-coded, external PHP extensions. They come in packages managed by `pecl` command. The packaging and distribution system used by PECL is shared with PEAR, keeping it artificially alive. External extensions can be loaded trough `php.ini` directives or programatically, with `dl()` function (if enabled). Unlike the PHP-only packages distributed by composer, PECL extensions are on the lower level, written in C just like PHP itself so they can pretty much add arbitrary functionality to the language.
