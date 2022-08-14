# Unicode plane

https://en.wikipedia.org/wiki/Unicode_plane

A **Unicode plane** is a continuous group of 65,536 (2¹⁶) code points.

- Unicode range: `U+00 00 00` - `U+10 FF FF`
- Per plane: 2¹⁶ (65,536) code points
- 17 planes: 1 BMP + 16 SUP
- code point format: `U+ HH hh hh` in hex
- `HH` hex digits, 00 - 10, identify each of the 16 planes

    BMP 0:  HH segment is 00 `U+ 00 hh hh`
    SUP 1:  HH segment is 01 `U+ 01 hh hh`
    SUP 2:  HH segment is 02 `U+ 02 hh hh`
    …
    SUP 15: HH segment is 0F `U+ 0F hh hh`
    SUP 16: HH segment is 10 `U+ 10 hh hh`


There are 17 planes, identified by the first two digits, of the six-digit hex format for code points, `U+ HH hh hh`.

The Unicode code space begins with the plane 0, called the *Basic Multilingual Plane* (BMP), which contains all the code points denoted by `U+ 00 hh hh` (BMP is identified by the initial hexdigits `00`). BMP hosts most of the commonly used characters from the living languages.


The higher planes 1 - 16 are the *Supplementary Planes* (SUP) and they include additional glyphs form the living languages, entire alphabets of some dead languages, emojis, private characters, technical symbols from numerous areas of science, control characters, formatting characters, noncharacters.

The last code point in Unicode is the last code point in plane 16, U+10FFFF.

As of Unicode version 14.0, 5 of the planes have assigned code points and 7 are named.

The limit of 17 planes is due to the UTF-16 encoding, which can encode 2²⁰ code points (16 planes) as pairs of words, plus the BMP as a single word.

The UTF-8 encoding was designed with a much larger limit of 2³¹ (2,147,483,648) code points (32,768 planes), and would still be able to encode 2²¹ (2,097,152) code points (32 planes) even under the current limit of 4 bytes (UTF-8 encodes code points using 1 - 4 bytes).

The 17 planes can accommodate *1,114,112 code points*.
- 2,048 are surrogate code points (used in UTF-16 to make the pairs)
- 66 are noncharacters
- 137,468 are reserved for private use
- leaving 974,530 for public assignment

Planes are further subdivided into Unicode blocks, which, unlike planes, do not have a fixed size. The 320 blocks defined in Unicode 14.0 cover 26% of the possible code point space, and range in size from a minimum of 16 code points (seventeen blocks) to a maximum of 65,536 code points (Supplementary Private Use Area-A and -B, which constitute the entirety of planes 15 and 16). For future usage, ranges of characters have been tentatively mapped out for most known current and ancient writing systems.
