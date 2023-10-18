# PHP Code Sniffer


https://github.com/squizlabs/PHP_CodeSniffer
http://pear.php.net/package/PHP_CodeSniffer
https://github.com/squizlabs/PHP_CodeSniffer/wiki
https://github.com/squizlabs/PHP_CodeSniffer/wiki/Configuration-Options
https://github.com/squizlabs/PHP_CodeSniffer/wiki/Usage


`PHP_CodeSniffer` analyses PHP, JavaScript and CSS files and detects violations of a defined set of coding standards.

PHP Code Sniffer, `phpcs` helps kep the code clean, consistent, easy to read and maintain by indicating "code smells". Code Sniffer can analyse PHP, JavaScript and CSS files to detect violations of a defined coding standard.

Supported Coding Standards:
- PEAR (default)
- PHPCS
- PSR1
- PSR2
- Squiz
- Zend

PHP Code Sniffer consists of a pair of PHP scripts:
- `phpcs` examines PHP (JS, CSS) detecting violations of the coding standard
- `phpcbf` automatically makes code fixes

PHP Code Sniffer requires PHP version 5.4 +, but individual "sniffs" may have additional requirements (presence of an external app or scripts).

[Configuration Options](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Configuration-Options) page in the manual lists these requirements.

To configure a project's settings use [configuration file](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage#using-a-default-configuration-file)






## Install

```json
// Install with Composer, system-wide:
composer global require "squizlabs/php_codesniffer=*"

// Install with Composer, for current project (as dev dependency):
"require-dev": {
  "squizlabs/php_codesniffer": "3.*"
}

// Install with Phive (phar installer) as a project tool:
phive install phpcs
phive install phpcbf
// Then run it from the tools directory:
./tools/phpcs -h
./tools/phpcbf -h

// Install with PEAR:
pear install PHP_CodeSniffer

// download from git and run directly:
git clone https://github.com/squizlabs/PHP_CodeSniffer.git
```
