# PHP Ecosystem


* PHP Language Reference
  - Basic syntax
    - PHP tags
    - Escaping from HTML
    - Instruction separation
    - Comments
  - Types
    - Introduction
    - Booleans
    - Integers
    - Floating point numbers
    - Strings
    - Arrays
    - Iterables
    - Objects
    - Resources
    - NULL
    - Callbacks/Callables
    - Type Juggling
    - Pseudo-types and variables used in PHP documentation
  - Variables
    - Basics
    - Predefined Variables
    - Variable scope
    - Variable variables
    - Variables From External Sources
  - Constants
    - Syntax
    - Magic constants
  - Expressions
  - Operators
    - Operator Precedence
    - Arithmetic Operators
    - Assignment Operators
    - Bitwise Operators
    - Comparison Operators
    - Error Control Operators
    - Execution Operators
    - Incrementing/Decrementing Operators
    - Logical Operators
    - String Operators
    - Array Operators
    - Type Operators
  - Control Structures
    - Introduction
    - if
    - else
    - elseif/else if
    - Alternative syntax for control structures
    - while
    - do-while
    - for
    - foreach
    - break
    - continue
    - switch
    - declare
    - return
    - require
    - include
    - require_once
    - include_once
    - goto
  - Functions
    - User-defined functions
    - Function arguments
    - Returning values
    - Variable functions
    - Internal (built-in) functions
    - Anonymous functions
  - Classes and Objects
    - Introduction
    - The Basics
    - Properties
    - Class Constants
    - Autoloading Classes
    - Constructors and Destructors
    - Visibility
    - Object Inheritance
    - Scope Resolution Operator (::)
    - Static Keyword
    - Class Abstraction
    - Object Interfaces
    - Traits
    - Anonymous classes
    - Overloading
    - Object Iteration
    - Magic Methods
    - Final Keyword
    - Object Cloning
    - Comparing Objects
    - Type Hinting
    - Late Static Bindings
    - Objects and references
    - Object Serialization
    - OOP Changelog
  - Namespaces
    - Namespaces overview
    - Defining namespaces
    - Declaring sub-namespaces
    - Defining multiple namespaces in the same file
    - Using namespaces: Basics
    - Namespaces and dynamic language features
    - namespace keyword and `__NAMESPACE__` constant
    - Using namespaces: Aliasing/Importing
    - Global space
    - Using namespaces: fallback to global function/constant
    - Name resolution rules
    - FAQ: things you need to know about namespaces
  - Errors
    - Basics
    - Errors in PHP 7
  - Exceptions
    - Extending Exceptions
  - Generators
    - Generators overview
    - Generator syntax
    - Comparing generators with Iterator objects
  - References Explained
    - What References Are
    - What References Do
    - What References Are Not
    - Passing by Reference
    - Returning References
    - Unsetting References
    - Spotting References
  - Predefined Variables
    - *Superglobals* Built-in variables always available in all scopes
    - `$GLOBALS`    References all variables available in global scope
    - `$_SERVER`    Server and execution environment information
    - `$_GET`       HTTP GET variables
    - `$_POST`      HTTP POST variables
    - `$_FILES`     HTTP File Upload variables
    - `$_REQUEST`   HTTP Request variables
    - `$_SESSION`   Session variables
    - `$_ENV`       Environment variables
    - `$_COOKIE`    HTTP Cookies
    - `$php_errormsg`         The previous error message
    - `$HTTP_RAW_POST_DATA`   Raw POST data
    - `$http_response_header` HTTP response headers
    - `$argc` The number of arguments passed to script
    - `$argv` Array of arguments passed to script
  - Predefined Exceptions
    - Exception
    - ErrorException
    - Error
    - ArgumentCountError
    - ArithmeticError
    - AssertionError
    - DivisionByZeroError
    - CompileError
    - ParseError
    - TypeError
  - Predefined Interfaces and Classes
    - Traversable — The Traversable interface
    - Iterator — The Iterator interface
    - IteratorAggregate — The IteratorAggregate interface
    - Throwable
    - ArrayAccess — The ArrayAccess interface
    - Serializable — The Serializable interface
    - Closure — The Closure class
    - Generator — The Generator class
    - WeakReference — The WeakReference class
  - Context options and parameters
    - Socket context options — Socket context option listing
    - HTTP context options — HTTP context option listing
    - FTP context options — FTP context option listing
    - SSL context options — SSL context option listing
    - CURL context options — CURL context option listing
    - Phar context options — Phar context option listing
    - MongoDB context options — MongoDB context option listing
    - Context parameters — Context parameter listing
    - Zip context options — Zip context option listing
  - Supported Protocols and Wrappers
    - file:// — Accessing local filesystem
    - http:// — Accessing HTTP(s) URLs
    - ftp:// — Accessing FTP(s) URLs
    - php:// — Accessing various I/O streams
    - zlib:// — Compression Streams
    - data:// — Data (RFC 2397)
    - glob:// — Find pathnames matching pattern
    - phar:// — PHP Archive
    - ssh2:// — Secure Shell 2
    - rar:// — RAR
    - ogg:// — Audio streams
    - expect:// — Process Interaction Streams




## Dev

API Development
Middleware
Security
Blockchain
DevOps
Progressive Web Apps (PWA)
Continuous Delivery
Databases
Javascript
PHP Core
Unit Testing
UI/UX
Async PHP
Scalability
Team Development

## Deploy

* PHP Stacks
  - XAMPP
  - WAMP
  - BitNami

## PHP Tools
  - Composer
  - PEAR
  - PECL
  - Accelerator

## PHP frameworks
  - Laravel
  - Symfony
  - CakePHP
  - CodeIgniter
  - Nette Framework
  - Fat-Free
  - FuelPHP

* PHP Testing frameworks
  - Behat
  - PHPUnit
  - PHP Unit Testing Framework
  - Lime (Symfony)

## PHP ORM
  - Doctrine
  - Propel

* PHP Interface Type
  * SAPI (Server API)
    - aolserver
    - apache
    - apache2filter
    - apache2handler
    - caudium
    - cgi (until PHP 5.3)
    - cgi-fcgi
    - cli
    - cli-server
    - continuity
    - embed
    - fpm-fcgi
    - isapi
    - litespeed
    - milter
    - nsapi
    - phttpd
    - pi3web
    - roxen
    - thttpd
    - tux
    - webjames

## PHP Implementations
  - HHVM
  - HPHPc
  - Parrot
  - Phalanger
  - Quercus
  - Zend Engine



# PHP Manual

PHP > PHP Manual:

- PHP Installation
- PHP Configuration
  - Runtime Configuration
  - FastCGI Process Manager (FPM)
  - PECL extensions

* PHP Function Reference
  * Database Extensions
    * Abstraction Layers
      - PDO
      - ODBC
      - DBA
      - dbx
    * Vendor Specific Database Extensions
      - Mssql (Microsoft SQL Server)
      - MySQL (MySQL Drivers and Plugins)
      - MongoDB
      - PostgreSQL
      - SQLite3
      * SQLSRV (Microsoft SQL Server Driver for PHP)
      - SQLite
      - Firebird/InterBase
      - DB++
      - CUBRID
      - dBase
      - filePro
      - FrontBase
      - IBM DB2 (IBM DB2, Cloudscape and Apache Derby)
      - Informix
      - Ingres (Ingres DBMS, EDBC, and Enterprise Access Gateways)
      - MaxDB
      - mSQL
      - OCI8 (Oracle OCI8)
      - Paradox (Paradox File Access)
      - Sybase
      - tokyo_tyrant




* PHP Security
  - Introduction
  - General considerations
  - Installed as CGI binary
  - Installed as an Apache module
  - Session Security
  - Filesystem Security
  - Database Security
  - Error Reporting
  - Using Register Globals
  - User Submitted Data
  - Magic Quotes
  - Hiding PHP
  - Keeping Current

* PHP Features
  - HTTP authentication with PHP
  - Cookies
  - Sessions
  - Dealing with XForms
  - Handling file uploads
  - Using remote files
  - Connection handling
  - Persistent Database Connections
  - Safe Mode
  - Command line usage
  - Garbage Collection
  - DTrace Dynamic Tracing

* PHP Function Reference
  - Affecting PHP's Behaviour
  - Audio Formats Manipulation
  - Authentication Services
  - Command Line Specific Extensions
  - Compression and Archive Extensions
  - Credit Card Processing
  - Cryptography Extensions
  - Database Extensions
  - Date and Time Related Extensions
  - File System Related Extensions
  - Human Language and Character Encoding Support
  - Image Processing and Generation
  - Mail Related Extensions
  - Mathematical Extensions
  - Non-Text MIME Output
  - Process Control Extensions
  - Other Basic Extensions
  - Other Services
  - Search Engine Extensions
  - Server Specific Extensions
  - Session Extensions
  - Text Processing
  - Variable and Type Related Extensions
  - Web Services
  - Windows Only Extensions
  - XML Manipulation
  - GUI Extensions

## PHP Core
- Memory management
- Working with Variables
- Writing Functions
- Writing Classes
- Working with Resources
- Working with INI settings
- Working with streams
- The "counter" Extension - a Continuing Example
- The PHP 5 build system
- Extension structure
- PDO Driver How-To
- Zend Engine 2 API reference
- Zend Engine 2 Opcodes
- Zend Engine 1


## Other topics
  - PHP Installation
  - Build Problems
  - Using PHP
  - Safe Password Hashing
  - PHP and HTML
  - PHP and COM
  - Miscellaneous


* PHP Variants
  * Bitness
    - x86
    - x64
  * Thread Safety
    - TS (Thread Safe)
    - NTS (Non-Thread Safe)
  * Implementation
    - FastCGI
    - SAPI (System API)

* PHP Components
  * Servers
    - Apache HTTP Server
      - use *Thread Safe PHP* build
    - IIS
      - if using `FastCGI` use *Non-Thread Safe PHP* build
  * OS
    * Linux
      * Modules
        - `.so`
    * Windows
      * Microsoft Visual C++ RunTime, `MSVC`
        * `VC11`
          - built with: Visual Studio 2012, `VS 2012`
          - requires: `Visual C++ Redistributable for VS2012 x64` (or x86)
        * `VC14`
          - built with: Visual Studio 2015, `VS 2015`
          - requires: `Visual C++ Redistributable for VS2015 x64` (or x86)
        * `VC15`
          - built with: Visual Studio 2017, `VS 2017`
          - requires: `Visual C++ Redistributable for VS2017 x64` (or x86)
      * Modules
        - `.dll`
