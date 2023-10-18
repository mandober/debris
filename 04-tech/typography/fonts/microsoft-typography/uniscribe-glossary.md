## Uniscribe Glossary


## ABC width
An ABC width is a composite value defined by a GDI 'ABC' structure. The structure contains members 'abcA', 'abcB', and 'abcC', corresponding to the "A", "B", and "C" widths of a glyph or run.

The "A" width is underhang (positive; also known as "padding") or overhang (negative) to the left of the on-screen equivalent of ink that represents the glyph or run.

The "B" width is the black width, the width from the leftmost ink to the rightmost ink.

The "C" width is overhang to the right of the ink.

When two or more glyphs are displayed as a unit, usually only the leftmost glyph contributes to the "A" width of the run, and only the rightmost glyph contributes to the "C" width of the run. However, this is not a strict rule. For example, if the first glyph in a run is a narrow letter and the second glyph is a wide diacritical mark, and they are handled as separate glyphs, the diacritical mark might actually extend beyond the letter.

## Advance width
The advance width of a glyph is the movement in the direction of writing from the starting point for rendering that glyph to the starting point for rendering the next glyph.

## Bidirectional stack
The bidirectional stack is a 5-bit integer that keeps track of nesting levels between left-to-right and right-to-left text. It always starts at zero for left-to-right. Thus all even-numbered values represent left-to-right text and all odd-numbered values represent right-to-left text.

## Bidirectional text
Bidirectional text contains both left-to-right and right-to left portions, but the term is also sometimes loosely applied to pure right-to-left text. All right-to-left text requires the use of the bidirectional stack because the default embedding level of zero implies left-to-right text.

## Cell width
An application can justify text to fit a line by adjusting the cell width for certain glyphs. For unjustified text, the cell width for a glyph is the same as its advance width.

## Cluster
A cluster is the smallest linguistic unit that can be shaped. In languages such as Arabic and many of the Indic languages, the glyphs used to represent each Unicode code point depend strongly on the surrounding code points, which constitute the cluster. In these languages, applications can translate code points into appropriate glyphs only by looking at the cluster.

## Complex script
A complex script is a script with any of the following properties:
- Allows bidirectional rendering
- Has contextual shaping
- Has combining characters
- Has specialized word-breaking and justification rules
- Filters out illegal character combinations
- not supported in core Windows fonts, so might require font fallback

In the context of typography, it is sometimes desirable to handle the Latin script used in writing English as a complex script. Examples include the *Stylistic Alternates* feature described in the documentation of OpentType, or ligatures, such as ﬁ  (here shown telephone glyph; but ligature fi was meant) where a single glyph represents two or more consecutive characters.

## Embedding level
In bidirectional text, the embedding level is the index of the bidirectional stack.

## Font fallback
Font fallback is automated selection of a font other than the font selected by the user in an application. In Uniscribe, font fallback is applied by when all or part of the text is in a script that the user-selected font does not support.

## Glyph
A glyph is a single unit of display in a font. For OpenType, this unit is defined by an outline. For other types of fonts, it can be defined by a bitmap, a set of graphic commands, and the like. A glyph does not necessarily correspond to a single character. For example, the "fi" ligature represents the two characters "f" and "i".

## Item
An item has a single script and direction. An item is not necessarily a run. It can contain characters of multiple styles. Item and run information must be combined to determine ranges.

## LRM
LRM indicates the LEFT-TO-RIGHT MARK (Unicode code point U+200E). This mark specifies that characters following it in logical order should be rendered left-to-right.

## LTR
LTR indicates left-to-right.

## Range
A range is a special case of a run. It falls entirely within one item. Thus, if an item is broken into runs, each of those runs is a range.

## RLM
RLM indicates the RIGHT-TO-LEFT MARK (Unicode code point U+200F). This mark indicates that characters following it in logical order should be rendered right-to-left.

## RTL
RTL indicates right-to-left.

## Run
A run is a passage of text for Uniscribe to render. It should have a single style, that is, font, size, and color, but can be drawn from a variety of scripts. A run can contain both left-to-right and right-to-left content.

## NADS
NADS indicates NATIONAL DIGIT SHAPES (Unicode code point U+206E. The term specifies that European digits (U+0030 through U+0039) should be rendered as national digits.

## NODS
NODS indicates NOMINAL DIGIT SHAPES (Unicode code point U+206F). The term specifies that European digits (U+0030 through U+0039) should be rendered normally, not as national digits.

## Overhang
The overhang is the part of the ink of a glyph that extends beyond the advanced width of the glyph. Most glyphs (such as "H") have no overhang, as there is a little white space on either side to separate them from adjacent glyphs. An example of a glyph with overhang is the italic "f" - both the top and bottom of the italic "f" overhang the adjacent glyphs. Overhang corresponds to a negative "A" or "C" width.

## Padding
See underhang.

## Script
A script is a system of written language, for example, Latin script, Arabic script, Chinese script. A single script can apply to one or many human languages. The script has no particular relation to a font. For example, the Latin script can be rendered equally well by the Times New Roman or the Arial font.

## Underhang
The underhang is a width of white space to the left or right of the solid portion of a glyph. Underhang corresponds to a positive "A" or "C" width, as described for ABC width. Underhang is sometimes known as "padding". The following illustration shows the underhang for the lowercase letter n.
