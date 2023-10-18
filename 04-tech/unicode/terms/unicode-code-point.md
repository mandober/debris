# Code point

https://en.wikipedia.org/wiki/Code_point

In character encoding terminology, a code point is a numerical value that maps to a specific character.

Code points usually represent a single grapheme - usually a letter, digit, punctuation mark, or whitespace - but sometimes represent symbols, control characters, formatting.

The set of all possible code points within a given encoding (character set) make up that encoding's codespace.

For example, the character encoding scheme
- ASCII comprises         128 code points in the range 0x00 to 0x7f
- Extended ASCII          256 code points in the range 0x00 to 0xff
- Unicode           1,114,112 code points in the range 0x00 to 0x10ffff

The *Unicode code space* 
is divided into 17 *planes* 
(the basic multilingual plane + 16 supplementary planes), 
each with 65,536 (= 216) code points. 
Thus the total size of the Unicode code space 
is 17 × 65,536 = 1,114,112


## Definition

The notion of a code point is used for abstraction, to distinguish both:
- the number from an encoding as a sequence of bits
- the abstract character from a particular graphical representation (glyph)

This is because one may wish to make these distinctions to:
- encode a particular code space in different ways
- display a character via different glyphs

For Unicode, the particular sequence of bits is called a *code unit*.
- For the *UCS-4 encoding*, any code point is encoded as 4-byte binary numbers.
- For the *UTF-8 encoding*, different code points are encoded as sequences from 1 to 4 bytes long, forming a self-synchronizing code.

(See comparison of Unicode encodings for details)

Code points are normally assigned to abstract characters. An *abstract character* is not a graphical glyph but a unit of textual data. However, code points may also be left reserved for future assignment (most of the Unicode code space is unassigned), or given other designated functions.

The distinction between a code point and the corresponding abstract character is not pronounced in Unicode, but is evident for many other encoding schemes, where numerous *code pages* may exist for a single code space.
