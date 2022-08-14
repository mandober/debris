# Definition of Character Set and Collation

MySQL supports multiple Unicode character sets:

* `utf8mb4` UTF-8 encoding of Unicode using 1 to 4 bytes per character.
* `utf8mb3` UTF-8 encoding of Unicode using 1 to 3 bytes per character.
* `utf8`    An alias for `utf8mb3`.
* `ucs2`    UCS-2 encoding of Unicode character set using 2 bytes per char
* `utf16`   UTF-16 encoding for Unicode using 2 or 4 bytes per character.
            (Like `ucs2` but with an extension for supplementary characters)
* `utf32`   UTF-32 encoding for Unicode using 4 bytes per character.


Choose `utf8mb4` and forget about it.

SHOW CHARACTER SET LIKE '%utf%';
SHOW COLLATION LIKE '%utf%';

https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci

**utf8mb4_unicode_ci** is based on the official Unicode rules for universal sorting and comparison, which sorts accurately in a wide range of languages.

**utf8mb4_general_ci** is a simplified set of sorting rules which aims to do as well as it can while taking many short-cuts designed to improve speed. It does not follow the Unicode rules and will result in undesirable sorting or comparison in some situations, such as when using particular languages or characters.

On modern servers, this performance boost will be all but negligible. It was devised in a time when servers had a tiny fraction of the CPU performance of today's computers.



> SHOW CHARACTER SET LIKE '%utf%';
+---------+------------------+--------------------+--------+
| Charset | Description      | Default collation  | Maxlen |
+---------+------------------+--------------------+--------+
| utf8    | UTF-8 Unicode    | utf8_general_ci    |      3 |
| utf8mb4 | UTF-8 Unicode    | utf8mb4_general_ci |      4 | +
| utf16   | UTF-16 Unicode   | utf16_general_ci   |      4 |
| utf16le | UTF-16LE Unicode | utf16le_general_ci |      4 |
| utf32   | UTF-32 Unicode   | utf32_general_ci   |      4 |
+---------+------------------+--------------------+--------+


> SHOW COLLATION LIKE '%utf%';
+--------------------------+---------+-----+---------+----------+---------+
| Collation                | Charset | Id  | Default | Compiled | Sortlen |
+--------------------------+---------+-----+---------+----------+---------+
| utf8_bin                 | utf8    |  83 |         | Yes      |       1 |
| utf8_general_ci          | utf8    |  33 | Yes     | Yes      |       1 |
| utf8_unicode_ci          | utf8    | 192 |         | Yes      |       8 |
| utf8_icelandic_ci        | utf8    | 193 |         | Yes      |       8 |
| utf8_latvian_ci          | utf8    | 194 |         | Yes      |       8 |
| utf8_romanian_ci         | utf8    | 195 |         | Yes      |       8 |
| utf8_slovenian_ci        | utf8    | 196 |         | Yes      |       8 |
| utf8_polish_ci           | utf8    | 197 |         | Yes      |       8 |
| utf8_estonian_ci         | utf8    | 198 |         | Yes      |       8 |
| utf8_spanish_ci          | utf8    | 199 |         | Yes      |       8 |
| utf8_swedish_ci          | utf8    | 200 |         | Yes      |       8 |
| utf8_turkish_ci          | utf8    | 201 |         | Yes      |       8 |
| utf8_czech_ci            | utf8    | 202 |         | Yes      |       8 |
| utf8_danish_ci           | utf8    | 203 |         | Yes      |       8 |
| utf8_lithuanian_ci       | utf8    | 204 |         | Yes      |       8 |
| utf8_slovak_ci           | utf8    | 205 |         | Yes      |       8 |
| utf8_spanish2_ci         | utf8    | 206 |         | Yes      |       8 |
| utf8_roman_ci            | utf8    | 207 |         | Yes      |       8 |
| utf8_persian_ci          | utf8    | 208 |         | Yes      |       8 |
| utf8_esperanto_ci        | utf8    | 209 |         | Yes      |       8 |
| utf8_hungarian_ci        | utf8    | 210 |         | Yes      |       8 |
| utf8_sinhala_ci          | utf8    | 211 |         | Yes      |       8 |
| utf8_german2_ci          | utf8    | 212 |         | Yes      |       8 |
| utf8_croatian_ci         | utf8    | 213 |         | Yes      |       8 |
| utf8_unicode_520_ci      | utf8    | 214 |         | Yes      |       8 |
| utf8_vietnamese_ci       | utf8    | 215 |         | Yes      |       8 |
| utf8_general_mysql500_ci | utf8    | 223 |         | Yes      |       1 |
+--------------------------+---------+-----+---------+----------+---------+
| utf8mb4_bin              | utf8mb4 |  46 |         | Yes      |       1 |
| utf8mb4_general_ci       | utf8mb4 |  45 | Yes     | Yes      |       1 | +
| utf8mb4_unicode_ci       | utf8mb4 | 224 |         | Yes      |       8 |
| utf8mb4_icelandic_ci     | utf8mb4 | 225 |         | Yes      |       8 |
| utf8mb4_latvian_ci       | utf8mb4 | 226 |         | Yes      |       8 |
| utf8mb4_romanian_ci      | utf8mb4 | 227 |         | Yes      |       8 |
| utf8mb4_slovenian_ci     | utf8mb4 | 228 |         | Yes      |       8 |
| utf8mb4_polish_ci        | utf8mb4 | 229 |         | Yes      |       8 |
| utf8mb4_estonian_ci      | utf8mb4 | 230 |         | Yes      |       8 |
| utf8mb4_spanish_ci       | utf8mb4 | 231 |         | Yes      |       8 |
| utf8mb4_swedish_ci       | utf8mb4 | 232 |         | Yes      |       8 |
| utf8mb4_turkish_ci       | utf8mb4 | 233 |         | Yes      |       8 |
| utf8mb4_czech_ci         | utf8mb4 | 234 |         | Yes      |       8 |
| utf8mb4_danish_ci        | utf8mb4 | 235 |         | Yes      |       8 |
| utf8mb4_lithuanian_ci    | utf8mb4 | 236 |         | Yes      |       8 |
| utf8mb4_slovak_ci        | utf8mb4 | 237 |         | Yes      |       8 |
| utf8mb4_spanish2_ci      | utf8mb4 | 238 |         | Yes      |       8 |
| utf8mb4_roman_ci         | utf8mb4 | 239 |         | Yes      |       8 |
| utf8mb4_persian_ci       | utf8mb4 | 240 |         | Yes      |       8 |
| utf8mb4_esperanto_ci     | utf8mb4 | 241 |         | Yes      |       8 |
| utf8mb4_hungarian_ci     | utf8mb4 | 242 |         | Yes      |       8 |
| utf8mb4_sinhala_ci       | utf8mb4 | 243 |         | Yes      |       8 |
| utf8mb4_german2_ci       | utf8mb4 | 244 |         | Yes      |       8 |
| utf8mb4_croatian_ci      | utf8mb4 | 245 |         | Yes      |       8 |
| utf8mb4_vietnamese_ci    | utf8mb4 | 247 |         | Yes      |       8 |
| utf8mb4_unicode_520_ci   | utf8mb4 | 246 |         | Yes      |       8 |
+--------------------------+---------+-----+---------+----------+---------+
| utf16_bin                | utf16   |  55 |         | Yes      |       1 |
| utf16_general_ci         | utf16   |  54 | Yes     | Yes      |       1 |
| utf16_unicode_ci         | utf16   | 101 |         | Yes      |       8 |
| utf16_icelandic_ci       | utf16   | 102 |         | Yes      |       8 |
| utf16_latvian_ci         | utf16   | 103 |         | Yes      |       8 |
| utf16_romanian_ci        | utf16   | 104 |         | Yes      |       8 |
| utf16_slovenian_ci       | utf16   | 105 |         | Yes      |       8 |
| utf16_polish_ci          | utf16   | 106 |         | Yes      |       8 |
| utf16_estonian_ci        | utf16   | 107 |         | Yes      |       8 |
| utf16_spanish_ci         | utf16   | 108 |         | Yes      |       8 |
| utf16_swedish_ci         | utf16   | 109 |         | Yes      |       8 |
| utf16_turkish_ci         | utf16   | 110 |         | Yes      |       8 |
| utf16_czech_ci           | utf16   | 111 |         | Yes      |       8 |
| utf16_danish_ci          | utf16   | 112 |         | Yes      |       8 |
| utf16_lithuanian_ci      | utf16   | 113 |         | Yes      |       8 |
| utf16_slovak_ci          | utf16   | 114 |         | Yes      |       8 |
| utf16_spanish2_ci        | utf16   | 115 |         | Yes      |       8 |
| utf16_roman_ci           | utf16   | 116 |         | Yes      |       8 |
| utf16_persian_ci         | utf16   | 117 |         | Yes      |       8 |
| utf16_esperanto_ci       | utf16   | 118 |         | Yes      |       8 |
| utf16_hungarian_ci       | utf16   | 119 |         | Yes      |       8 |
| utf16_sinhala_ci         | utf16   | 120 |         | Yes      |       8 |
| utf16_german2_ci         | utf16   | 121 |         | Yes      |       8 |
| utf16_croatian_ci        | utf16   | 122 |         | Yes      |       8 |
| utf16_unicode_520_ci     | utf16   | 123 |         | Yes      |       8 |
| utf16_vietnamese_ci      | utf16   | 124 |         | Yes      |       8 |
+--------------------------+---------+-----+---------+----------+---------+
| utf16le_general_ci       | utf16le |  56 | Yes     | Yes      |       1 |
| utf16le_bin              | utf16le |  62 |         | Yes      |       1 |
+--------------------------+---------+-----+---------+----------+---------+
| utf32_general_ci         | utf32   |  60 | Yes     | Yes      |       1 |
| utf32_bin                | utf32   |  61 |         | Yes      |       1 |
| utf32_unicode_ci         | utf32   | 160 |         | Yes      |       8 |
| utf32_icelandic_ci       | utf32   | 161 |         | Yes      |       8 |
| utf32_latvian_ci         | utf32   | 162 |         | Yes      |       8 |
| utf32_romanian_ci        | utf32   | 163 |         | Yes      |       8 |
| utf32_slovenian_ci       | utf32   | 164 |         | Yes      |       8 |
| utf32_polish_ci          | utf32   | 165 |         | Yes      |       8 |
| utf32_estonian_ci        | utf32   | 166 |         | Yes      |       8 |
| utf32_spanish_ci         | utf32   | 167 |         | Yes      |       8 |
| utf32_swedish_ci         | utf32   | 168 |         | Yes      |       8 |
| utf32_turkish_ci         | utf32   | 169 |         | Yes      |       8 |
| utf32_czech_ci           | utf32   | 170 |         | Yes      |       8 |
| utf32_danish_ci          | utf32   | 171 |         | Yes      |       8 |
| utf32_lithuanian_ci      | utf32   | 172 |         | Yes      |       8 |
| utf32_slovak_ci          | utf32   | 173 |         | Yes      |       8 |
| utf32_spanish2_ci        | utf32   | 174 |         | Yes      |       8 |
| utf32_roman_ci           | utf32   | 175 |         | Yes      |       8 |
| utf32_persian_ci         | utf32   | 176 |         | Yes      |       8 |
| utf32_esperanto_ci       | utf32   | 177 |         | Yes      |       8 |
| utf32_hungarian_ci       | utf32   | 178 |         | Yes      |       8 |
| utf32_sinhala_ci         | utf32   | 179 |         | Yes      |       8 |
| utf32_german2_ci         | utf32   | 180 |         | Yes      |       8 |
| utf32_croatian_ci        | utf32   | 181 |         | Yes      |       8 |
| utf32_unicode_520_ci     | utf32   | 182 |         | Yes      |       8 |
| utf32_vietnamese_ci      | utf32   | 183 |         | Yes      |       8 |
+--------------------------+---------+-----+---------+----------+---------+




---



**Character set** is a set of symbols and encodings.

For example, in the ASCII character set, the symbol "A" has encoding 65 (decimal), "B" is 66, "a" 97 and "b" is 98. So, the letter "A" is a *symbol*, the number 65 (dec) is the *encoding* for "A", and *the combination of all symbols and their encodings is a *character set*.

**Collation** is a set of rules for comparing characters in a character set.

The simplest way to compare strings, e.g. "A" and "B", is to compare their encodings: 65 for "A" and 66 for "B", and since 66 > 65 we say "A" is *less than* "B". And with that, we have **applied a collation to the charset*.

A collation is a set of rules, even if there were only one rule in the set, like a rule to just compare the encodings; in fact, in such simple case that would be the simplest possible collation, called **binary collation**.

Sligtly more complex example would be comparing lowercase and uppercase letters. In such case we also have a decision to make as to how they compare: is a lowercase letter GT or LT then a corresponding uppercase letter? Or are they equal? In that case, we would have at least two rules: treat the lowercase letters as equivalent to their uppercase counterpairs; then compare the encodings. This would be the case of so-called **case-insensitive collation**, often abbreviated and appended as a suffix `ci`.

The case of particular interest is coparison of accented letters and multi-character mappings (e.g. ß -> ss, Ö -> OE). If the collation ignores the accents it is called **accent-insensitive**, suffixed as `ai`.

MySQL can:
* Store strings using a variety of character sets
* Compare strings using a variety of collations
* Mix strings with different charsets or collations on many levels (server, db, table)
* Enable specification of charset and collation and their forcing at any level (when retrieveing data)

To display the available charsets in MySQL, `use` the `INFORMATION_SCHEMA CHARACTER_SETS` table or the `SHOW CHARACTER SET` statement.

A given character set always has at least one collation, and most character sets have several. To list collations for a character set, use the `INFORMATION_SCHEMA COLLATIONS` table or the `SHOW COLLATION` statement.
