# Unicode character property

https://en.wikipedia.org/wiki/Unicode_character_property

The Unicode Standard assigns various properties to each *Unicode character* and *Unicode code point*.

The properties can be used to handle characters (code points) in processes, like line-breaking, script direction right-to-left or applying controls. Some character properties are also defined for code points that have no character assigned, and code points that are labeled like "<not a character>". The character properties are described in `Standard Annex #44`.

Properties have levels of forcefulness:
- normative
- informative
- contributory
- provisional

For simplicity of specification, a character property can be assigned by specifying a continuous range of code points that have the same property.

## Semantic elements

Properties are displayed in the following order:

[code];[name];[gc];[cc];[bc];[decomposition];;;[nv];[bm];[alias];;;;

- alias: corrected name
- bc: bidi (bidirectional) category [L, R etc]
- bm: bidi mirrored [N or Y]
- cc: combining class [position of diacritic]
- decomposition:
  - letter + diacritic
  - ligature X Y
  - superscript X
  - font X
  - initial X
  - medial X
  - final X
  - isolated X
  - vertical X
  - etc.
- gc: general category [letter, symbol, digit, case behavior, etc.]
- nv: numeric value [of a digit]

## Name

Each Unicode character is assigned a unique Name (na).

The name is composed of
- uppercase letters A-Z
- digits 0-9
- hyphen-minus (-)
- space ( )

Some sequences are excluded:
- names beginning with a space or hyphen
- names ending with a space or hyphen
- repeated spaces or hyphens
- space after hyphen are not allowed

The name is guaranteed to be unique within Unicode, and can be used to identify a code point and its character. *Ideographic characters*, of which there are tens of thousands, are named in the pattern `cjk unified ideograph-hhhh`. For example, `U+4E00 CJK UNIFIED IDEOGRAPH-4E00`. Formatting characters are named too: `U+00A0 NO-BREAK SPACE`.

The following classes of code point do not have a Name (na=""):
- Controls (General Category: Cc)
- Private use (Co)
- Surrogate (Cs)
- Non-characters (Cn)
- Reserved (Cn)

They may be referenced, informally, by a generic or specific meta-name, called *Code Point Labels*:
- <control>
- <control-0088>
- <reserved>
- <noncharacter-hhhh>
- <private-use-hhhh>
- <surrogate>

Since these labels contain `<>`-brackets, they can never appear as a Name, which prevents confusion.

## Character name alias

Starting from Unicode version 2.0, the published name for a code point will never change. Therefore, in the event of a character name being misspelled or if the character name is completely wrong or seriously misleading, a formal *Character Name Alias* may be assigned to the character, and this alias may be used by applications instead of the actual defective character name. For example, `U+FE18 ︘ PRESENTATION FORM FOR VERTICAL RIGHT WHITE LENTICULAR BRAKCET` has the character name alias `PRESENTATION FORM FOR VERTICAL RIGHT WHITE LENTICULAR BRACKET` in order to mitigate the misspelling of "bracket" as "brakcet" in the actual character name.

In addition to character name aliases which are corrections to defective character names, some characters are assigned aliases which are alternative names or abbreviations. 5 types of character name aliases are defined in the Unicode Standard:
- `Correction`: corrections for misspelled or incorrect character names
- `Control`: ISO 6429 names for C0 and C1 control functions
- `Alternate`: alternative names for some format characters (only U+FEFF "ZERO WIDTH NO-BREAK SPACE" which has the alias "BYTE ORDER MARK")
- `Figment`: Documented labels for some C1 control code functions which are not actual names in any standard
- `Abbreviation`: Abbreviations or acronyms for control codes, format characters, spaces, and variation selectors

As of Unicode version 12.1, 28 formal character name aliases are defined as corrections for defective character names.

Apart from these *normative names*, *informal names* may be shown in the Unicode code charts. These are other commonly used names for a character, and do not have the same character restriction. These informal names are not guaranteed to be unique, and may be changed or removed in later versions of the standard.

## General Category

Each code point is assigned a value for General Category. This is one of the character properties that are also defined for unassigned code points, and code points that are defined as "not a character".

## General Category Values

https://www.unicode.org/reports/tr44/#General_Category_Values

The `General_Category` property of a code point provides for the most general classification of that code point. It is usually determined based on the primary characteristic of the assigned character for that code point. For example, is the character a letter, a mark, a number, punctuation, or a symbol, and if so, of what type? Other General_Category values define the classification of code points which are not assigned to regular graphic characters, including such statuses as private-use, control, surrogate code point, and reserved unassigned.

Many characters have multiple uses, and not all such cases can be captured entirely by the General_Category value. For example, the General_Category value of Latin, Greek, or Hebrew letters does not attempt to cover (or preclude) the numerical use of such letters as Roman numerals or in other numerary systems. Conversely, the General_Category of ASCII digits 0..9 as `Nd` (decimal digit) neither attempts to cover (or preclude) the occasional use of these digits as letters in various orthographies. The General_Category is simply the first-order, most usual categorization of a character.

The values in the General_Category field in `UnicodeData.txt` make use of the short, abbreviated property value aliases for General_Category.

For convenience in reference, we lists below all the abbreviated and long value aliases for General_Category values, reproduced from `PropertyValueAliases.txt`, along with a brief description of each category.

* `General_Category` Values

Ab | Long name             | Desc (count as of v.14)
---|-----------------------|---------------------------------------------------
L  | Letter                | Lu, Ll, Lt, Lm, Lo
Lu | Uppercase_Letter      | uppercase letter (1,831)
Ll | Lowercase_Letter      | lowercase letter (2,227)
Lt | Titlecase_Letter      | digraphics with first part uppercased (31)
LC | Cased_Letter          | Lu, Ll, Lt
Lm | Modifier_Letter       | modifier letter (334)
Lo | Other_Letter          | other including syllables and ideographs (127,333)
.  | .                     | .
M  | Mark                  | Mn, Mc, Me
Me | Enclosing_Mark        | an enclosing combining mark
Mc | Spacing_Mark          | spacing combining mark (positive advance width)
Mn | Nonspacing_Mark       | nonspacing combining mark (zero advance width)
.  | .                     | .
N  | Number                | Nd, Nl, No
Nd | Decimal_Number        | decimal digit
Nl | Letter_Number         | letterlike numeric character
No | Other_Number          | numeric character of other type
.  | .                     | .
P  | Punctuation           | Pc, Pd, Ps, Pe, Pi, Pf, Po
Pc | Connector_Punctuation | connecting punctuation mark, like a tie
Pd | Dash_Punctuation      | dash or hyphen punctuation mark
Ps | Open_Punctuation      | opening punctuation mark (of a pair)
Pe | Close_Punctuation     | closing punctuation mark (of a pair)
Pi | Initial_Punctuation   | initial quotation mark
Pf | Final_Punctuation     | final quotation mark
Po | Other_Punctuation     | punctuation mark of other type
.  | .                     | .
S  | Symbol                | Sm, Sc, Sk, So
Sm | Math_Symbol           | symbol of mathematical use
Sc | Currency_Symbol       | currency sign
Sk | Modifier_Symbol       | non-letterlike modifier symbol
So | Other_Symbol          | symbol of other type
.  | .                     | .
Z  | Separator             | Zs, Zl, Zp
Zs | Space_Separator       | space character (of various non-zero widths)
Zl | Line_Separator        | U+2028 LINE SEPARATOR only
Zp | Paragraph_Separator   | U+2029 PARAGRAPH SEPARATOR only
.  | .                     | .
C  | Other                 | Cc, Cf, Cs, Co, Cn
Cc | Control               | C0 or C1 control code
Cf | Format                | format control character
Cs | Surrogate             | surrogate code point
Co | Private_Use           | private-use character
Cn | Unassigned            | reserved unassigned code point or a noncharacter


Character Property Index
https://util.unicode.org/UnicodeJsps/properties.jsp?a=ID_Start#ID_Start

Property Index by Scope of Use
http://www.unicode.org/reports/tr44/#Property_Index
