# Uniscribe

Uniscribe is a set of APIs that allow a high degree of control for fine typography and for processing complex scripts.

Both complex scripts and simple scripts with fine typography effects require special processing to display and edit because the characters ("glyphs") are not laid out in a simple way.

For complex scripts, the rules governing the shaping and positioning of glyphs are specified and catalogued in The Unicode Standard.

This topic discusses various aspects of fine typography and the processing of complex scripts, and is presented as follows:

- About Uniscribe
  - About Complex Scripts
  - Complex Script Processing
  - OpenType Font Format
  - Uniscribe Glossary
- Using Uniscribe
- Uniscribe Reference

## About Uniscribe

Uniscribe is one of several ways to implement fine typography and to process complex scripts. The following topics start with a brief description of complex scripts and their special problems, and then describe the other standard ways to deal with complex scripts.

- About Complex Scripts
- Complex Script Processing
- OpenType Font Format
- Uniscribe Glossary

## Using Uniscribe

Uniscribe provides APIs to support typography and to support the display and editing of international text, including the complex rules of Middle Eastern and Asian scripts. Uniscribe provides low-level routines for handling fully formatted text, and a simple ScriptString API set for unformatted text.

Using Uniscribe, applications only have to manage a backing store of Unicode character codes. Text layout applications do not have to maintain any other buffer or mapping table to track character order. Each application only has to store and manage the order in which the characters are entered by the user, which is the same logical order as defined by Unicode. The backing store never changes as a result of layout operations. Uniscribe maintains an index from the reordered clusters to the original character boundaries passed by the application.

The following topics are covered in this section.

**Shaping**

-   [Determining If a Script Requires Glyph Shaping](determining-if-a-script-requires-glyph-shaping.md)
-   [Using Shaping Engines](using-shaping-engines.md)

**Other Processing**

-   [Caching](caching.md)
-   [Displaying Text with Uniscribe](displaying-text-with-uniscribe.md)
-   [Processing Complex Scripts](processing-complex-scripts.md)
-   [Using Font Fallback](using-font-fallback.md)
-   [Using the ScriptString Functions](using-the-scriptstring-functions.md)

**Caret**

-   [Displaying the Caret in Bidirectional Strings](displaying-the-caret-in-bidirectional-strings.md)
-   [Managing Caret Placement and Hit Testing](managing-caret-placement-and-hit-testing.md)
-   [Translating Mouse Hit X Offset to Caret Position](translating-mouse-hit-x-offset-to-caret-position.md)

**Words and Character Clusters**

-   [Using Character Clusters](using-character-clusters.md)
-   [Using Word Break Points](using-word-break-points.md)
-   [Working with Relationships Among Caret Positions, Justification Points, and Clusters](working-with-relationships-among-caret-positions--justification-points--and-clusters.md)


## About Complex Scripts

A [complex script](uniscribe-glossary.md) is a script for which the **fComplex** member of [**SCRIPT\_PROPERTIES**](/windows/desktop/api/Usp10/ns-usp10-script_properties) is set to **TRUE**. This topic details the properties that a complex script might have.

### Bidirectional Rendering

Bidirectional rendering is handling of text that reads both left-to-right and right-to-left. For example, in the bidirectional rendering of Arabic, the default reading direction for text is right-to-left, but it is left-to-right for some numbers. Processing a complex script must account for the difference between the logical (keystroke) order and the visual order of the glyphs. In addition, processing must properly deal with caret movement and hit testing. The mapping between screen position and a character index requires an understanding of the layout algorithms for the particular display, for example, selection of text or caret display.

### Contextual Shaping

In contextual shaping, script characters change shape depending on the characters that surround them. Such shaping occurs in English cursive writing when a lowercase "l" changes shape depending on the character that precedes it, such as an "a" (connects low to the "l") or an "o" (connects high). For example, Arabic is a script that exhibits contextual shaping.

### Combining Characters

Combining characters, also called "ligatures," are characters that join into one character when placed together. Arabic is a script that has many combining characters. One example of the use of combining characters is the "a" followed by "combining grave", for which the rendered representation is "à". The Unicode stream "U+0061 U+0300" requires some processing to make sure the "combining grave" is correctly positioned above the "a".

### Specialized Word Break and Justification

Some scripts, for example, Thai, have complex rules for dividing words between lines or justifying text on a line.

### Filtering for Illegal Character Combinations

A complex script, for example, Thai, can filter out illegal character combinations when a language does not allow certain character combinations.

### Font Fallback

Font fallback is the automated selection of a font other than the font selected by the user. In Uniscribe, font fallback is applied by the [ScriptStringAnalyse](/windows/desktop/api/Usp10/nf-usp10-scriptstringanalyse) function when all or part of the text is in a script that the user-selected font does not support. For more information, see [Using Font Fallback](using-font-fallback.md).



================

## Complex Script Processing

The following are options for display and related processing of text to support fine typography effects or complex scripts:

-   Text functions
-   Edit controls
-   Rich edit controls
-   Uniscribe

The options you choose depend on the following factors:

-   The type of text or scripts.
-   The implementation model, for example, the text layout and handling of line breaking by the application.
-   Update of an existing application versus creation of a new application.

In general, an application that does relatively simple script processing can choose any option for processing complex scripts. However, for the most complete control of complex script processing, Uniscribe is recommended.

### Complex Script Processing Using Text Functions

Applications that use mostly plain text, that is, text that uses the same typeface, weight, color, and so on, have traditionally written text and measured line lengths using standard text functions, such as [**TextOut**](/windows/win32/api/wingdi/nf-wingdi-textouta), [**ExtTextOut**](/windows/win32/api/wingdi/nf-wingdi-exttextouta), [**TabbedTextOut**](/windows/win32/api/winuser/nf-winuser-tabbedtextouta), [**DrawText**](/windows/win32/api/winuser/nf-winuser-drawtext), and [**GetTextExtentExPoint**](/windows/win32/api/wingdi/nf-wingdi-gettextextentexpointa). These functions support processing for complex scripts and fine typography effects. For more information, see [Fonts and Text](../gdi/fonts-and-text.md).

In general, the standard text support is transparent to applications processing complex scripts. However, you should be aware of some specific rules to follow in writing applications that support fine typography and process complex scripts:

-   Your application should save characters in a buffer and display a whole line of text at one time instead of, for example, calling [**ExtTextOut**](/windows/win32/api/wingdi/nf-wingdi-exttextouta) on each character as it is typed in by the user. This mechanism allows the advanced text shaping modules to use context to reorder and generate [glyphs](uniscribe-glossary.md) correctly.
-   The application should use [**GetTextExtentExPoint**](/windows/win32/api/wingdi/nf-wingdi-gettextextentexpointa) to determine line length, instead of computing line lengths from cached character widths, since the width of a glyph can vary by context.
-   The application should optionally add support for right-to-left reading order and right alignment.
-   The reordering and contextual processing required for complex scripts or fine typography requires a significant increase in processing over basic text display for simple scripts. Therefore, to avoid performance issues, your application should not process large amounts of text before displaying results and returning control to the user.

### Complex Script Processing Using Edit Controls

The standard Windows edit controls have been extended to support multilingual text and complex scripts. The extended support includes input and display, as well as correct cursor movement over character clusters, for example, in Thai and Devanagari scripts. For more information, see [Edit Controls](../controls/edit-controls.md).

### Complex Script Processing Using Rich Edit Controls

Rich Edit 3.0 is a higher-level collection of interfaces that takes advantage of Uniscribe to insulate text layout applications from the complexities of certain scripts. Rich Edit is the simplest way for applications to display complex scripts even though their primary purpose is not necessarily text layout. Rich Edit provides fast, versatile editing of rich Unicode multilingual text and simple plain text. It includes extensive message and COM interfaces, text editing, formatting, line breaking, simple table layout, vertical text layout, bidirectional text layout, Indic and Thai support, an editing user interface much like Microsoft Word, and Text Object Model interfaces.

Along with the Rich Edit interfaces, applications can use the Rich Edit [**TextOut**](/windows/win32/api/wingdi/nf-wingdi-textouta) function to automatically parse, shape, position, and break lines. For more information, see [Rich Edit Controls](../controls/rich-edit-controls.md).

### Complex Script Processing Using Uniscribe

[Uniscribe](uniscribe.md) provides the most extensive support for processing of text involving fine typography effects and complex scripts. It supports the complex rules found in scripts such as Arabic, Devanagari, and Thai. It handles scripts written from right to left, such as Arabic and Hebrew, and supports the mixing of scripts. Uniscribe also exposes [OpenType](opentype-font-format.md) font features that can be used by applications to control fine typography effects. For more information, see [Processing Complex Scripts](processing-complex-scripts.md).

## OpenType Font Format

The Unicode-based OpenType font format extends the TrueType font file format. OpenType fonts allow mapping between characters and [glyphs](uniscribe-glossary.md), enabling support for ligatures, positional forms, alternates, and other substitutions. OpenType fonts can also include information that supports two-dimensional glyph positioning and glyph attachment, and can contain either TrueType or PostScript outlines.

Layout features within OpenType fonts are organized by scripts and languages, allowing a single font to support multiple writing systems, even within the same script. To ensure consistency in text layout operations and to avoid unnecessary overhead in font files or applications, many of the text layout and language semantic algorithms are included in Uniscribe. This relieves the font developer from having to define generalized script rules within a font.

Applications can introduce specific knowledge or preferences regarding script layout. OpenType layout fonts might even contain layout rules that duplicate or supersede those applied by operating system services. The layered structure of operating system services supporting text layout allows an application to choose the layout information to use, and select how to apply it. For additional information, see the [Microsoft Typography Specifications overview](https://www.microsoft.com/typography/SpecificationsOverview.mspx) or the [OpenType Specification](https://www.microsoft.com/typography/otspec/).
