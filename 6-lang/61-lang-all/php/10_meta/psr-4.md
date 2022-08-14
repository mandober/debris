# PSR-4: Autoloader

https://www.php-fig.org/psr/psr-4/


PSR-4 is a specification for autoloading of classes with regards to file paths.

It is interoperable and can be used in addition to any other autoloading specification, including PSR-0.

PSR-4 also describes where to place files to be autoloaded.


## Specification
The term “class” refers to classes, interfaces, traits, and other similar structures.

A fully qualified class name has the following form:

\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>

The fully qualified class name MUST have a top-level namespace name, also known as a “vendor namespace”.

The fully qualified class name MAY have one or more sub-namespace names.

The fully qualified class name MUST have a terminating class name.

Underscores have no special meaning in any portion of the fully qualified class name.

Alphabetic characters in the fully qualified class name MAY be any combination of lower case and upper case.

All class names MUST be referenced in a case-sensitive fashion.

When loading a file that corresponds to a fully qualified class name …

A contiguous series of one or more leading namespace and sub-namespace names, not including the leading namespace separator, in the fully qualified class name (a “namespace prefix”) corresponds to at least one “base directory”.

The contiguous sub-namespace names after the “namespace prefix” correspond to a subdirectory within a “base directory”, in which the namespace separators represent directory separators. The subdirectory name MUST match the case of the sub-namespace names.

The terminating class name corresponds to a file name ending in .php. The file name MUST match the case of the terminating class name.

Autoloader implementations MUST NOT throw exceptions, MUST NOT raise errors of any level, and SHOULD NOT return a value.
