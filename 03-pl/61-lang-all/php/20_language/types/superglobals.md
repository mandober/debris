# Superglobals

- *Superglobals* are built-in variables that are available in all scopes.
- Superglobals cannot be used as variable variables
- The superglobal arrays (introduced in PHP 4.1.0) consists of:
- Several predefined variables in PHP are superglobals
- they are available in all scopes throughout a script
- no need for `global $variable` to access them

Superglobal variables:
- $_GET
- $_POST
- $_COOKIE
- $_SERVER
- $_FILES
- $_ENV
- $_REQUEST
- $_SESSION

## Variable availability
By default, all of the superglobals are available but there are directives that affect this availability, see `variables_order`.

## register_globals
If the deprecated `register_globals` directive is set to ON then the variables within will also be made available in the global scope of the script. For example, `$_POST['foo']` would also exist as `$foo`.

## Shadowing superglobals

Since PHP 5.4, you cannot use a superglobal as the parameter to a function. This causes a fatal error:

```php
function foo($_GET) {
  // whatever
}
```

This is called *shadowing a superglobal*
