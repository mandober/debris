# Unicode character property

https://en.wikipedia.org/wiki/Unicode_character_property

The Unicode Standard assigns various properties to each Unicode character and code point.

The properties can be used to handle characters (code points) in text processing (line-breaking, script direction, applying controls chars).

Some "character properties" are also defined for code points that have no character assigned, and code points that are labeled with `<not a character>`. The character properties are described in [Unicode Standard Annex #44](https://www.unicode.org/reports/tr44/).

Properties have levels of forcefulness:
- normative
- informative
- contributory
- provisional

## Semantic elements

Properties are displayed in the following order:

[code];[name];[gc];[cc];[bc];[decomposition];;;[nv];[bm];[alias];;;;

where
- bc = bidi (bidirectional) category, [L,R,…]
- bm = bidi mirrored [N,Y]
- cc = combining class [position_of_diacritic]
- gc = general category [letter,symbol,digit,punctuation,caseBehavior,…]
- nv = numeric value [of_a_digit]
- alias = corrected name
- decomposition =
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

## Name

Each Unicode character is assigned a unique NAME - property `na`.

A name is composed of uppercase letters A-Z, digits 0-9, hyphen-minus (-) and spaces (excluding: names beginning with a space or hyphen, names ending with a space or hyphen, repeated spaces or hyphens, and space after hyphen).

The name is guaranteed to be unique within Unicode, and can be used to identify a code point and its character; formatting characters are named too: (U+00A0) NO-BREAK SPACE.

Ideographic characters, of which there are tens of thousands, are named according to the pattern (U+hhhh) "CJK UNIFIED IDEOGRAPH-hhhh".
For example, (U+4E00) CJK UNIFIED IDEOGRAPH-4E00.

The following classes of code points don't have a _Name_ (na="")
- Controls, in the General Category `Cc`, Code Point Label: `<control-0088>`
- Private use, `Co`, Code Point Label: `<private-use-hhhh>`
- Surrogate, `Cs`, Code Point Label: `<surrogate>`
- Non-characters, `Cn`, Code Point Label: `<noncharacter-hhhh>`
- Reserved, `Cn`, Code Point Label: `<reserved>`

*Code Point Labels* are the informal generic or specific meta-names for characters in these code point classes. Since their labels include angle-brackets, to prevents confusion, they can never appear as _Name_.

## General Category

Each code point is assigned a value for General Category. This is one of the character properties that are also defined for unassigned code points, and code points that are defined "not a character".

* L, Letter
* M, Mark
* N, Number
* P, Punctuation
* S, Symbol
* Z, Separator
* C, other


Legend
- The char count is as of Unicode 14.0
- GC = General category (L, M, N)
- LC = Cased Letter (Lu, Ll, Lt only)
- De = decimal (number)
- the `GC = Nd` corresponds with `Numeric Type = De`


GC | VARIANT           | COUNT   | NOTES
---|-------------------|--------:|---------------------------
Lu | uppercase         |   1,831 | LC
Ll | lowercase         |   2,227 | LC
Lt | titlecase         |      31 | SRB ligatures (`ǅ`,`ǲ`,`ǈ`,`ǋ`)
Lm | modifier          |     334 |
Lo | other             | 127,333 | ideographs
Mn | nonspacing        |   1,950 |
Mc | spacing combining |     445 |
Me | enclosing         |      13 |
Nd | decimal digit     |     660 | only with Numeric Type = De
Nl | letter            |     236 | letterlike numerals
No | other             |     895 | fractions, super/subscripts
Pc | connector         |      10 | underscore
Pd | dash              |      26 | hyphen characters
Ps | open              |      79 | opening brackets
Pe | close             |      77 | closing brackets
Pi | initial quote     |      12 | opening quotations
Pf | final quote       |      10 | closing quotations
Po | other             |     605 |
Sm | math              |     948 | Mathematical symbols
Sc | currency          |      63 | Currency symbols
Sk | modifier          |     125 |
So | other             |   6,605 |
Zs | space             |      17 | space, but not TAB, CR, LF
Zl | line              |       1 |
Zp | paragraph         |       1 |
Cc | control           |      65 |
Cf | format            |     163 |
Cs | surrogate         |   2,048 |
Co | private use       | 137,468 |
Cn | not assigned      |      66 |
Cn | not assigned      | 829,768 |


## Details

* L, Letter

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Lu | uppercase         |   1,831  | LC
Ll | lowercase         |   2,227  | LC
Lt | titlecase         |      31  | SRB ligatures (`ǅ`,`ǲ`,`ǈ`,`ǋ`)
Lm | modifier          |     334  |
Lo | other             | 127,333  | ideographs

* M, Mark

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Mn | nonspacing        |    1,950 |
Mc | spacing combining |      445 |
Me | enclosing         |       13 |

* N, Number

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Nd | decimal digit     |      660 | only with Numeric Type = De
Nl | letter            |      236 | letterlike numerals
No | other             |      895 | fractions, super/subscripts


* P, Punctuation

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Pc | connector         |       10 | underscore
Pd | dash              |       26 | hyphen characters
Ps | open              |       79 | opening brackets
Pe | close             |       77 | closing brackets
Pi | initial quote     |       12 | opening quotations
Pf | final quote       |       10 | closing quotations
Po | other             |      605 |


* S, Symbol

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Sm | math              |      948 | Mathematical symbols
Sc | currency          |       63 | Currency symbols
Sk | modifier          |      125 |
So | other             |    6,605 |


* Z, Separator

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Zs | space             |       17 | space, but not TAB, CR, LF
Zl | line              |        1 | Only U+2028 LINE SEPARATOR (LSEP)
Zp | paragraph         |        1 | Only U+2029 PARAGRAPH SEPARATOR (PSEP)


* C, Other

GC | variant           | count    | Notes
---|-------------------|---------:|---------------------------
Cc | control           |       65 |
Cf | format            |      163 |
Cs | surrogate         |    2,048 |
Co | private use       |  137,468 |
Cn | not assigned      |       66 |
Cn | not assigned      |  829,768 |
