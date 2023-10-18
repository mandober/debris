# Unicode block

https://en.wikipedia.org/wiki/Unicode_block

A Unicode block is one of several contiguous ranges of numeric character codes (code points) of the Unicode character set that are defined by the Unicode Consortium for administrative and documentation purposes.

Typically, proposals such as the addition of new glyphs are discussed and evaluated by considering the relevant block or blocks as a whole.

Each block is generally, but not always, meant to supply glyphs used by one or more specific languages, or in some general application area such as mathematics, surveying, decorative typesetting, social forums, etc.

## Design and implementation

Unicode blocks are identified by unique, ASCII only, names given in English; the names are usually descriptive of the nature of the symbols ("Tibetan" or "Supplemental Arrows-A").

The recommended way tocompare block names is to use case-insensitive comparison that ignores these non-alphanumerics: whitespace, dashes and underscores.

For example, all these should compare as equal:   
"Supplemental Arrows-A" == "supplemental_arrows__a" == "supplementalarrowsa"


Blocks are pairwise disjoint (they don't overlap).

The starting code point and the size (number of code points) of each block are always multiples of 16; 
therefore, in the hexadecimal notation, 
the starting (smallest) point is U+xxx0 and 
the ending (largest) point is U+yyyF, 
where xxx and yyy are 3 or more hexadecimal digits.

These constraints are intended to simplify the display of glyphs in Unicode Consortium documents, as tables with 16 columns labeled with the last hexadecimal digit of the code point.

The size of a block may range from
the minimum of 16 
to a maximum of 65,536 code points.


Every assigned code point has a glyph property called "Block", 
whose value is a character string 
naming the unique block that owns that point.

However, a block may also contain unassigned code points, 
usually reserved for future additions of characters 
that "logically" should belong to that block. 

Code points not belonging to any of the named blocks, 
e.g. in the unassigned planes 4-13, 
have the value block="No_block"
