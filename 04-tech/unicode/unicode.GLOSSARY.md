# Unicode :: Glossary

<!-- TOC -->

- [Base character](#base-character)
- [Bounding rectangle](#bounding-rectangle)
- [Canonical equivalence](#canonical-equivalence)
- [Character encoding](#character-encoding)
- [Character set](#character-set)
- [CJK](#cjk)
- [Combining character](#combining-character)
- [Combining Grapheme Joiner](#combining-grapheme-joiner)
- [Composite character](#composite-character)
- [Compatible equivalence](#compatible-equivalence)
- [Code point](#code-point)
- [Code space](#code-space)
- [Decomposable character](#decomposable-character)
- [Fullwidth character](#fullwidth-character)
- [Grapheme](#grapheme)
- [Horizontal plane](#horizontal-plane)
- [Precomposed character](#precomposed-character)
- [Regional indicator](#regional-indicator)
- [Separator character](#separator-character)
- [Tag character](#tag-character)
- [Unicode block](#unicode-block)
- [Unicode entity](#unicode-entity)
- [Unicode plane](#unicode-plane)
- [Unicode equivalence](#unicode-equivalence)
- [Word Joiner](#word-joiner)
- [Zero-Width No-Break Space](#zero-width-no-break-space)
- [Zero-Width Joiner](#zero-width-joiner)
- [Zero-Width Non-Joiner](#zero-width-non-joiner)
- [Zero-Width Space](#zero-width-space)

<!-- /TOC -->


## Base character
A base character is a character that can be modified (decorated) by a combining character. The base characters are those that can stand on their own, as opposed to the combining characters.

## Bounding rectangle
Glyphs in a font have a common bounding rectangle defined - it is the smallest rectangle that completely encloses the outline of the glyph.

## Canonical equivalence
Many of what are essentially the same characters can be represented by different code points. For example, the letter 'n' followed by the COMBINING TILDE makes the character 'ñ'; this letter is composed of two code points, as opposed to 'ñ' which is a single code point. Such pairs of character sequences are said to be canonically equivalent.

## Character encoding
Specific way to represent a character in an alphabet for digital including their exchange. Chars are repr by a bit pattern which is basically a number with an interpretation attached; e.g. positive number itself encoded using 2's compliment scheme. When there's some type of (conrete or abstract) cost involved (e.g. telegraph), it pays to encode the most frequent letters using the least amount of symbols. In the Morse code, the most frequent English letters are encoded with the shortest possible sequences: 'e' is dot (short pulse) and 't' is dash (long pulse), as opposed to the infrequent letters like 

## Character set
A collection of character encodings.

## CJK
CJK is a collective term for the Chinese, Japanese and Korean languages, all of which use Chinese characters and derivatives in their writing systems.

## Combining character
Combining characters are not used on their own, but are intended to modify the preceding base character.

## Combining Grapheme Joiner
COMBINING GRAPHEME JOINER (CGJ) U+034F has no visible glyph. Its name is a misnomer because it doesn't describe its function; in fact, CGJ doesn't join graphemes, but it separates the characters semantically; the characters that shouldn't be considered digraphs. CGJ is also used to block canonical reordering of combining marks during normalization.

## Composite character
see Precomposed character

## Compatible equivalence
Code point sequences that are compatible have distinct appearances but the same meaning. For example, the ligature "ﬀ" is defined to be compatible, but not canonically equivalent, to the sequence "ff".

## Code point
In character encoding, a code point is a numerical value that maps to a specific character. Most of the time, code points represent graphemes (letters, digits, punctuation marks, whitespace, symbols), but they also represent invisible characters used for control and formatting, and even 66 noncharacters that are reseved by the Unicode for internal use.

## Code space
The set of all code points in a given character encoding set makes up that encoding's codespace (or code space).

## Decomposable character
see Precomposed character

## Fullwidth character
These are mostly Latin letters with the same width as Japanese characters, typically used when mixing English and Japanese. Characters usually appear visibly larger than normal, "& vs ＆", "1 vs １", "W vs Ｗ" (the second char is fullwidth).

## Grapheme

## Horizontal plane

## Precomposed character
A precomposed character (composite character, decomposable character) is a Unicode entity that can also be defined as a sequence of one or more other characters.

## Regional indicator
Regional indicators are the Unicode block of characters intended to indicate a country or a global region (e.g. 🇫🇷 for France). Some tools use the regional indicators to encode flags - the idea is that the same two-letter country codes used in TLD would be mapped into this block to represent that country (e.g., with a flag). Sequencing the SYMBOL LETTER F U+1F1EB and SYMBOL LETTER R U+1F1F7 may be the way to encode the French flag as `🇫🇷`.

## Separator character
The Unicode provides the LINE SEPARATOR U+2028 and PARAGRAPH SEPARATOR U+2029 characters intended to represent the semantics of the soft and hard return.

## Tag character
The tags Unicode block contains unprintable characters used for tagging texts. All printable ASCII characters have a tag version, which is unprintable and zero-width. The tags are often used to "watermark" a piece of (copyrighted) text, in the hope the text is copy/pasted along with the tags. For example, "tag󠀵ged" contains the (invisible) TAG DIGIT FIVE U+E0035 inserted between the two g's - it would appear as "tag5ged" if tags were visible.


## Unicode block
A Unicode block is a unit of carving up the Unicode codespace. Each Unicode plane consists of Unicode blocks.

## Unicode entity
Broadly, a Unicode entity is a collective name for various Unicode artefacts. In a narrow, more common sense, it relieves the author from using the problematic term "character".

## Unicode plane
A Unicode plane is a unit of carving up the Unicode codespace. A plane is a continuous group of 65,536 (2¹⁶) code points. Unicode has 17 planes: BMP plus 16 supplementary plances.

## Unicode equivalence
Unicode has two notions of equivalence, compatibility and canonical equivalence arising from the different representations of the same or similar characters.

## Word Joiner
WORD JOINER (WJ) U+2060 is a formatting character used to indicate that the word separation should not occur at a particular position, which is relevant in scripts that don't use explicit spacing. WJ is unprintable character that prohibits a line break, so it replaces the ZERO-WIDTH NO-BREAK SPACE U+FEFF (ZWNBSP) for the role of the non-breaking zero-width space character.

## Zero-Width No-Break Space
ZERO-WIDTH NO-BREAK SPACE (ZWNBSP) U+FEFF character is now used only as the Byte-Order Mark (U+FEFF) at the start of a file. The standard once specified that ZWNBSP was to be treated as a zero-width no-break space (its nominal role) if encountered elsewhere in the text file, but this had been deprecated in Unicode 3.2, with the recommendation to use the WJ character for that purpose, and limit ZWNBSP's use as a BOM only.

## Zero-Width Joiner
ZERO-WIDTH JOINER (ZWJ) U+200D is a non-printing character; when placed between two characters that would otherwise not be connected, the ZWJ causes them to be printed in their connected forms. When a ZWJ is placed between two emoji characters (or interspersed between multiple), it can result in a display of a single glyph (such as the family emoji made up of two adult emoji and one child emoji).

## Zero-Width Non-Joiner
ZERO-WIDTH NON-JOINER (ZWNJ) U+200C is a non-printing character used to prevent formation of ligatures. When placed between two characters that would otherwise result in a ligature, the ZWNJ causes them to be printed in their final and initial forms, respectively. The same effect can be obtained with a space character, but ZWNJ has zero width.

Example in VS Code: trying to prevent the formation of the ligature `⩾`:
- '>' + '='              -->> `>=` normally the ligature is produced
- '>' + ZWNJ       + '=' -->> `>‌=` fails
- '>' + ZWJ        + '=' -->> `>‍=` fails
- '>' + ZWSP       + '=' -->> `>​=` fails
- '>' + WJ         + '=' -->> `>⁠=` fails
- '>' + CGJ        + '=' -->> `>͏=` fails
- '>' + HAIR SPACE + '=' -->> `> =` success! (as any kind of SPACE would)

## Zero-Width Space
ZERO-WIDTH SPACE (​ZWSP) U+200B is a non-printing character used to indicate word boundaries in scripts that do not use explicit spacing (Japanese), or after characters (such as the slash) that are not followed by a visible space but after which there may nevertheless be a line break. Normally, it is not a visible separation, but it may expand in passages that are fully justified.
