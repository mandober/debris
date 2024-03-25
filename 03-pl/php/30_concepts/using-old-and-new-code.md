# Using old code with new versions of PHP

https://www.php.net/manual/en/tutorial.oldcode.php


Now that PHP has grown to be a popular scripting language, there are a lot of public repositories and libraries containing code you can reuse. The PHP developers have largely tried to preserve backwards compatibility, so a script written for an older version will run (ideally) without changes in a newer version of PHP. In practice, some changes will usually be needed.

Two of the most important recent changes that affect old code are:
- `$HTTP_*_VARS` arrays are not available as of PHP 5.4.0
- `register_globals`
  - External variables are no longer registered in the global scope by default
  - `register_globals` (since PHP 4.2.0 ) is off by default in `php.ini`
  - The preferred method of accessing these values is via *superglobal array*
  - Older scripts may rely on this directive being ON
  - If ON, one could use `$id` from URL `http://eg.com/foo.php?id=42`
  - Whether ON or OFF, `$_GET['id']` is always available
