# Constants (literals) in C

- constant or literal is an entity that doesn't change (variable can change).
- two type of constants:
  - primary: integer, character, float
  - secondary: array, struct, pointer, union, enum

## Numeric constants
- Numeric constants are digits that may or may not have a decimal point.
- types: Integer constants, Floating point (real) constants

## Integer constants
- Order of inference: `int`, `unsigned int`, `long int`, `unsigned long int`
- notation: hex, oct, dec
- case-insensitive type suffixes: `-l, -u, -ul`
- ok to mix: `int i = 12 + 045 + 0x3a;`

specify the type of an integer constant as long int by appending l or L:
`10l, 3789L, 094l, 0xabL`

specify the type of an integer constant as unsigned int append u or U:
`23u, 034U, 0x8au`

use u or l to specify the type of an integer constant as an unsigned long int:
`89ul` is unsigned long int


## Floating point or real constants
- notation: fractional, exponential (scientific)
- by default floats are `double`
- case-insensitive type suffixes: `-l, -f, -ul`
- specify type as a float by appending f or F: `12f , -0.87f`
- specify type as long double by appending l or L: `12.13l, -98.12L`

## Character Constants
- character constant is a single char: `'A', 'c', '4', '$', '^'`
- always in single quotes
- ASCII encoding
- char is actually a `u8` integer: `char x = 'a'; //assigns 97 to x`
- (signed) char is -128 to 127, unsigned char: 0-255

## String Constant
String constants consist of zero or more characters (with the null character is automatically placed by the compiler) enclosed in double quotes.
- an empty string is stored as `"\0"`
- add 1 to length of string when calc needed storage
