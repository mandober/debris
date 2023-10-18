# Unicode variation selectors

## TL/DR

Ultimately this is up to whatever application is displaying the emoji. Some emoji can be followed by U+FE0E **VARIATION SELECTOR-15 to force monochrome presentation**:

⌛ U+231B HOURGLASS

⌛︎ U+231B HOURGLASS + U+FE0E VARIATION SELECTOR-15

Other emoji default to a text presentation and need to be followed by U+FE0F **VARIATION SELECTOR-16 to force a graphical presentation** instead:

☘ U+2618 SHAMROCK

☘️ U+2618 SHAMROCK + U+FE0F VARIATION SELECTOR-16

But only the emoji that are explicitly defined to have these variations can be switched in this fashion. There are plenty of emoji that have only one variation.



## Refs

- https://unicode.org/emoji/charts/emoji-variants.html
- https://en.wikipedia.org/wiki/Variation_Selectors_(Unicode_block)
- https://www.codejam.info/2021/11/emoji-variation-selector.html
- https://emojipedia.org/
- https://www.smashingmagazine.com/2016/11/character-sets-encoding-emoji/


## 🐀 salad


Many emojis come in several variants, the principle of two being their presentation: emojis can be displayed in color, or simplified in a monochrome color. Using Unicode variation selectors we can hint at whether to use one or the other, but when no variation selector is specified, the system will default to its own choice, which may be influenced by the available fonts on the system or the user-selected fonts (as preference) in applications.

For example, in vscode the choice of fonts in user preferences seems to force the display of monochrome emojis, while e.g. Chrome (in bookmark names) will use the colored variants.

In vscode, the RAT emoji is currently displayed mono as

🐀 RAT 0x1f400

The char lacks the variant selector normally adjoined as the next char to indicate that the colored variant should be preferred.

Most emoji pickers will include the emoji variation selector to glyphs that have ambiguous presentation. Copy/pasting from Emojipedia works as they don't leave room for ambiguity and always specify the selector.


So the *mono* rat emoji is displayed as

🐀  RAT                      0x1f400

🐀️   RAT + VS-16   (should be mono rat - it's not)

🐀︎   RAT + VS-15   (should be mono rat) [BINGO!!] BINGO! *mono RAT!*


>**THIS JUST IN**: Some emoji need VS-15 andothers VS-16 to force the mono display.

The colored rat emoji needs another special char to follow that char (or char sequence). This should be displayed as the colored rat emoji at least in one variant (in vscode, it is mono, probably due to the font selection in user-pref in vscode)

🐀︀  RAT                      0x1f400
    VARIATION SELECTOR-1    0xfe00

🐀︁  RAT                      0x1f400
    VARIATION SELECTOR-2    0xfe01

🐀︁  RAT                      0x1f400
    VARIATION SELECTOR-3    0xfe02


>**THIS JUST IN**: Using keyboard will select both the RAT and the VARIATION SELECTOR chars, but using mouse to select just the rat works - only the RAT will be selected without the variant selector - even though these two codepoints are presented as if merged together.

🐀 Rat

🐁 Mouse

🪤 Mouse Trap

=>>
=<=>=
--------->--------->


Also, the MOUSE TRAP is displayed as the unavailable symbol.

🎎🎫🧧🎉🎭🎪👓🐀
🐀
🐀


>**THIS JUST IN**: The font `Symbola` (https://dn-works.com/ufas/) is installed on my system and (!) I did explicitllylist it as a font in the vscode prefs. Symbola is non-color font that contains these emojis in simplified versin only. Removing Symbola from the list of prefs colored all the emojis, but now mono presentation cannot be forced, at least vscode dosn't respect the VS-16 directive to show non-colored versions.


Firefox will always render emoji characters (those with the character property Emoji_Presentation=Yes) using multi-colour fonts such as Segoe UI Emoji or Twemoji Mozilla, even when other, black-and-white fonts are provided (be they local or downloaded) and explicitly requested via CSS.
