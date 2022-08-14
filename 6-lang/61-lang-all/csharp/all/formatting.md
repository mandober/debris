## Formatting


composite formatting
https://docs.microsoft.com/en-us/dotnet/standard/base-types/composite-formatting


```cs
Console.WriteLine("output: {0}", 12);
Console.WriteLine("output: {00.00:0}", 12.56264D);

// WARNING!
// will not print the value if no placeholder
WriteLine("val: ", 12); // "val: "
// this works:
WriteLine("val: " + 12); // "val: 12"
// or just do it proper:
WriteLine("val: {0}", 12);
```



**Number class** (contains info about formatting)     
[Number class](https://referencesource.microsoft.com/#mscorlib/system/number.cs)
The Number class implements methods for formatting and parsing numeric values. To format and parse numeric values, applications should use the `Format` and `Parse` methods provided by the numeric classes (Byte, Int16, Int32, Int64, Single, Double, Currency, and Decimal). Those `Format` and `Parse` methods share a common implementation provided by this class, and are thus documented in detail below.





## Formatting

The `Format` methods provided by the numeric classes are all of the form
```cs
public static String Format(XXX value, String format);
public static String Format(XXX value, String format, NumberFormatInfo info);
```
where *XXX* is the name of the particular numeric class.

- `Format` methods convert the numeric value to a string 
  using the format string (supplied by the `format` param).
- If the `format` parameter is `null` or an empty string, number
  is formatted as if the string `G` (general format) was supplied.
- `info` param specifies `NumberFormatInfo` instance to use when 
  formatting the number.
- If `info` param is `null` or omitted, the numeric 
  formatting info is obtained from the current culture.
- `NumberFormatInfo` supplies:
  * characters to use for decimal and thousand separators
  * spelling and placement of currency symbols in monetary values


### Format string

Format strings fall into 2 categories:
1. Standard format string consisting of:
2. Used-defined format strings are all other format strings.

Standard format string has 2 specifiers and the form _Axx_:
* **Format specifier** (FS) controls the type of formatting of number.
  - _A_ is the format specifier, a single alphabetic character, [A-Za-z]
* **Precision specifier** (PS) controls the number of significant digits 
    or decimal places of the formatting operation.
  - _xx_ is the precision specifier (optional), sequence of digits, [0-9]


Standard formats:
- [Cc] Currency
- [Dd] Decimal
- [Ee] Engineering
- [Ff] Fixed point
- [Gg] General
- [Nn] Number
- [Xx] Hex


* **Currency** format, `C c`
  - num to string that repr a currency amount.
  - conversion controlled by currency format info of NumberFormatInfo 
    used to format the number.
  - PS indicates the desired number of decimal places,
  - if PS omitted, the default currency precision given by the 
    NumberFormatInfo is used.

* **Decimal** format, `D d`
  - supports integrals only.
  - num to str of digits, prefixed by a minus sign if negative.
  - PS indicates the min number of digits desired in resulting string,
  - if required, num is zero-left-padded to produce num of places given by PS.

* **Scientific** (sci, engineering) format, `E e`
  - num to string of form: `-d.ddd⋯E+ddd` or `-d.ddd⋯e+ddd`
  - string starts with a minus sign if the number is negative
  - one digit always precedes the decimal point.
  - PS indicates the desired number of digits after the decimal point,
  - if PS omitted, a default is used: 6 digits after the point.
  - FS indicates whether to prefix the exponent with `E` or `e`.
  - exponent is always of the form: +/- and 3 digits.

* **Fixed point** format, `F f`
  - num to string of form: `-ddd.ddd⋯`
  - string starts with minus if number negative.
  - PS indicates the desired number of decimal places,
  - if PS absent, default numeric prec given by `NumberFormatInfo` is used

* **General** format, `G g`
  - num to the shortest possible decimal repr using fixed-point or sci format.
  - PS determines Number of Decimal Digits (NoSD) in the resulting string.
  - if PS absent, NoSD is determined by the type of number being converted:
    - int:      10 significant digits
    - long:     19
    - float:     7
    - double:   15
    - Currency: 19
    - Decimal:  29
  - trailing 0's (after decimal point) removed.
  - resulting string contains a decimal point only if required.
  - Resulting string uses:
    * fixed point format: if `-4 <= exp < SD`
      (if exponent of number is LT the num of sig.digits or GE to -4)
    * otherwise: sci format, and the case of the format specifier
      controls whether the exponent is prefixed with `E` or `e`.

* **Number** format, `N n`
  - num to string of form: `-d,ddd,ddd.ddd⋯`
  - string starts with minus if number negative.
  - thousand separators are inserted between each group of 3 digits.
  - PS indicates the desired number of decimal places
  - if absent, determined by NumberFormatInfo.

* **Hexadecimal** format, `X x`
  - supports integrals only
  - num to string of hex digits
  - FS indicates if to use upper or lower case chars for hex digits.
  - PS indicates the min number of digits desired in the resulting string.
  - if required, the number will be left-padded with zeros to produce the 
    number of digits given by the precision specifier.


### Examples
Examples of standard format strings (assuming default `NumberFormatInfo`):

|       Value | Format |            Result |
|------------:|--------|------------------:|
|  12345.6789 | C      |        $12,345.68 |
| -12345.6789 | C      |      ($12,345.68) |
|       12345 | D      |             12345 |
|       12345 | D8     |          00012345 |
|  12345.6789 | E      |     1.234568E+004 |
|  12345.6789 | E10    | 1.2345678900E+004 |
|  12345.6789 | e4     |       1.2346e+004 |
|  12345.6789 | F      |          12345.68 |
|  12345.6789 | F0     |             12346 |
|  12345.6789 | F6     |      12345.678900 |
|  12345.6789 | G      |        12345.6789 |
|  12345.6789 | G7     |          12345.68 |
|   123456789 | G7     |        1.234568E8 |
|  12345.6789 | N      |         12,345.68 |
|   123456789 | N4     |  123,456,789.0000 |
|     0x2c45e | x      |             2c45e |
|     0x2c45e | X      |             2C45E |
|     0x2c45e | X8     |          0002C45E |


Format strings that do not start with an alphabetic character, or that start with an alphabetic character followed by a non-digit, are called user-defined format strings. The following table describes the formatting characters that are supported in user defined format strings:

`0` Digit placeholder    
If the value being formatted has a digit in the position where the '0' appears in the format string, then that digit is copied to the output string. Otherwise, a '0' is stored in that position in the output string. The position of the leftmost '0' before the decimal point and the rightmost '0' after the decimal point determines the range of digits that are always present in the output string.

`#` Digit placeholder    
If the value being formatted has a digit in the position where the '#' appears in the format string, then that digit is copied to the output string. Otherwise, nothing is stored in that position in the output string.

`.` Decimal point    
The first '.' character
in the format string determines the location of the decimal separator in the
formatted value; any additional '.' characters are ignored. The actual
character used as a the decimal separator in the output string is given by
the NumberFormatInfo used to format the number.

`,` Thousand separator and number scaling.    
The ',' character serves two purposes. First, if the format string contains
a ',' character between two digit placeholders (0 or #) and to the left of
the decimal point if one is present, then the output will have thousand
separators inserted between each group of three digits to the left of the
decimal separator. The actual character used as a the decimal separator in
the output string is given by the NumberFormatInfo used to format the
number. Second, if the format string contains one or more ',' characters
immediately to the left of the decimal point, or after the last digit
placeholder if there is no decimal point, then the number will be divided by
1000 times the number of ',' characters before it is formatted. For example,
the format string '0,,' will represent 100 million as just 100. Use of the
',' character to indicate scaling does not also cause the formatted number
to have thousand separators. Thus, to scale a number by 1 million and insert
thousand separators you would use the format string '#,##0,,'.

`%` Percentage placeholder    
The presence of a '%' character in the format string causes the number to be multiplied by 100 before it is formatted. The '%' character itself is inserted in the output string where it appears in the format string.

`E+ E- e+ e-` Scientific notation.    
If any of the strings 'E+', 'E-', 'e+', or 'e-' are present in the format
string and are immediately followed by at least one '0' character, then the
number is formatted using scientific notation with an 'E' or 'e' inserted
between the number and the exponent. The number of '0' characters following
the scientific notation indicator determines the minimum number of digits to
output for the exponent. The 'E+' and 'e+' formats indicate that a sign
character (plus or minus) should always precede the exponent. The 'E-' and
'e-' formats indicate that a sign character should only precede negative
exponents.

`\` Literal character
A backslash character causes the next character in the format string to be copied to the output string as-is. The backslash itself isn't copied, so to place a backslash character in the output string, use two backslashes (\\) in the format string.

`'ABC' "ABC"` Literal string
Characters enclosed in single or double quotation marks are copied to the output string as-is and do not affect formatting.

`;` Section separator
The ';' character is used to separate sections for positive, negative, and zero numbers in the format string.

*Other*
All other characters are copied to the output string in the position they appear.


For fixed point formats (formats not containing an 'E+', 'E-', 'e+', or
'e-'), the number is rounded to as many decimal places as there are digit
placeholders to the right of the decimal point. If the format string does
not contain a decimal point, the number is rounded to the nearest
integer. If the number has more digits than there are digit placeholders to
the left of the decimal point, the extra digits are copied to the output
string immediately before the first digit placeholder.

For scientific formats, the number is rounded to as many significant digits
as there are digit placeholders in the format string.

### Sections

To allow for different formatting of positive, negative, and zero values, a
user-defined format string may contain up to three sections separated by
semicolons. The results of having one, two, or three sections in the format
string are described in the table below.

Sections:

One   
The format string applies to all values.

Two    
The first section applies to positive values
and zeros, and the second section applies to negative values. If the number
to be formatted is negative, but becomes zero after rounding according to
the format in the second section, then the resulting zero is formatted
according to the first section.

Three    
The first section applies to positive
values, the second section applies to negative values, and the third section
applies to zeros. The second section may be left empty (by having no
characters between the semicolons), in which case the first section applies
to all non-zero values. If the number to be formatted is non-zero, but
becomes zero after rounding according to the format in the first or second
section, then the resulting zero is formatted according to the third
section.

For both standard and user-defined formatting operations on values of type
float and double, if the value being formatted is a NaN (Not
a Number) or a positive or negative infinity, then regardless of the format
string, the resulting string is given by the NaNSymbol,
PositiveInfinitySymbol, or NegativeInfinitySymbol property of
the NumberFormatInfo used to format the number.

### Parsing

The Parse methods provided by the numeric classes are all of the form
```cs
public static XXX Parse(String s);
public static XXX Parse(String s, int style);
public static XXX Parse(String s, int style, NumberFormatInfo info);
```

where `XXX` is the name of the particular numeric class.

The methods convert a string to a numeric value. The optional style parameter specifies the permitted style of the numeric string. It must be a combination of bit flags from the NumberStyles enumeration.

The optional info parameter specifies the NumberFormatInfo instance to use when parsing the string. If the info parameter is null or omitted, the numeric formatting information is obtained from the current culture.

Numeric strings produced by the Format methods using the Currency, Decimal, Engineering, Fixed point, General, or Number standard formats (the C, D, E, F, G, and N format specifiers) are guaranteed to be parseable by the Parse methods if the NumberStyles.Any style is specified. Note, however, that the Parse methods do not accept NaNs or Infinities.