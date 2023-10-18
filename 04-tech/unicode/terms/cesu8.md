# CESU-8

https://en.wikipedia.org/wiki/CESU-8

The Compatibility Encoding Scheme for UTF-16: 8-Bit (CESU-8) is a variant of UTF-8 that is described in Unicode Technical Report #26.

A Unicode code point from the Basic Multilingual Plane (BMP), i.e. a code point in the range U+0000 to U+FFFF, is encoded in the same way as in UTF-8.

A Unicode supplementary character, i.e. a code point in the range U+10000 to U+10FFFF, is first represented as a surrogate pair, like in UTF-16, and then each surrogate code point is encoded in UTF-8.

Therefore, CESU-8 needs 6 bytes (3 bytes per surrogate) for each Unicode supplementary character while UTF-8 needs only 4. Though not specified in the technical report, unpaired surrogates are also encoded as 3 bytes each, and CESU-8 is exactly the same as applying an older UCS-2 to UTF-8 converter to UTF-16 data.

The encoding of Unicode non-BMP characters works out to 
1110_1101 1010_yyyy 10xx_xxxx 1110_1101 1011_xxxx 10xx_xxxx 
(yyyy represents the top five bits of the character minus one). 

The byte value `0xF0` will not appear in CESU-8, as it starts the 4-byte encoding used by UTF-8.

CESU-8 is not an official part of the Unicode Standard, because Unicode Technical Reports are informative documents only. It should be used exclusively for internal processing and never for external data exchange.

* Supporting CESU-8 in HTML documents is prohibited by the W3C and WHATWG HTML standards, as it would present a cross-site scripting vulnerability.
* Java's Modified UTF-8 is CESU-8 with a special *overlong encoding* of the NUL character (U+0000) as the two-byte sequence `C0 80`.
* The Oracle database uses CESU-8 for its "UTF8" character set. Standard UTF-8 can be obtained using the character set "AL32UTF8" (since Oracle version 9.0).
