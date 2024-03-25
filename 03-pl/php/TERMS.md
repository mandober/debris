# Index of PHP terms


* Internals
  opcode
  Zend engine
  PHP ini
  Phar (PHP Archive)


* Tooling
  extensions
    internal components (internal extensions)
    installable extensions
  packages
    PECL
    PEAR
    composer
    Packagist


* Extensions
  * Internal components
    array
    PDO (PHP Data Object)
  * External extensions
    db
    msql
    XML


* Syntax
  - PHP tags
  - Mixing PHP and HTML, Escaping HTML
  - Instruction separation: semicolons, use of whitespace
  - Comments: line, block
  - Reserved words: keywords, predefined
  - Language construct (vs builtin function)
  - Expressions
  - Values

* Language constructs
  - declare statements
  - loose typing
  - strict typying

* References
  - What References Are
  - What References Do
  - What References Are Not
  - Passing by Reference
  - Returning References
  - Unsetting References
  - Spotting References

* Datatypes
  - type
  - scalars
  - boolean
  - integer
  - float
  - string
  - NULL
  - compound types
  - array
  - object
  - special type (resource)
  - Resource (type)
  - type conversion
  - type coercion
  - type juggling

* Pseudo-types
  - type hint
  - signature (method declaration)
  - Callables
  - Callbacks
  - Iterable
  - Traversable

* arrays
  - array
  - indexed array
  - associative array
  - packet array
  - sparse array


* Constants
  - const, compile-time constant
  - define, run-constant

* Variables
    - Predefined Variables
    - Variable scope
    - Variable variables
    - Variables From External Sources
    - *Predefined Variables*
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
    * Constants
      - Constant syntax
      - Magic constants
  - 4. **Control flow**
    - if, else, elseif, else if
    - while
    - do-while
    - for
    - foreach
    * Alternative syntax for control structures
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
  - 5. **Operators**
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
  - 6. **Functions**
    - User-defined functions
    - Function arguments
    - Returning values
    - Variable functions
    - Internal (built-in) functions
    - Anonymous functions
  - 7. **Generators**
    - Generators overview
    - Generator syntax
    - Comparing generators with Iterator objects
  - 8. **OOP**
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
    * Predefined Interfaces and Classes
      - Traversable:        The Traversable interface
      - Iterator:           The Iterator interface
      - IteratorAggregate:  The IteratorAggregate interface
      - Throwable
      - ArrayAccess:        The ArrayAccess interface
      - Serializable:       The Serializable interface
      - Closure:            The Closure class
      - Generator:          The Generator class
      - WeakReference:      The WeakReference class
  - 9. **Namespaces**
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
  - 10. **Errors and Exceptions**
    - Basics
    - Errors in PHP 7
    - Exceptions
    - Extending Exceptions
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
  - 11. **Context options and parameters**
    - Socket context options:   Socket context option listing
    - HTTP context options:     HTTP context option listing
    - FTP context options:      FTP context option listing
    - SSL context options:      SSL context option listing
    - CURL context options:     CURL context option listing
    - Phar context options:     Phar context option listing
    - MongoDB context options:  MongoDB context option listing
    - Context parameters:       Context parameter listing
    - Zip context options:      Zip context option listing
  - 12. **Protocols and Wrappers**
    - file://   Accessing local filesystem
    - http://   Accessing HTTP(s) URLs
    - ftp://    Accessing FTP(s) URLs
    - php://    Accessing various I/O streams
    - zlib://   Compression Streams
    - data://   Data (RFC 2397)
    - glob://   Find pathnames matching pattern
    - phar://   PHP Archive
    - ssh2://   Secure Shell 2
    - rar://    RAR
    - ogg://    Audio streams
    - expect:// Process Interaction Streams
