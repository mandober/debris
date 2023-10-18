# JavaScript :: Syntax :: Escape sequences

Internally, JavaScript encodes Unicode using the **UCS-2** encoding.

In the UCS-2 encoding *higher code points* are represented by a pair of (lower valued) *surrogate pseudocharacters* which are used to comprise the real character.

JS uses *code units* rather than *code points*, and to get the actual character code of these higher code point characters requires some extra work.

## Single character escape sequences

Some single character escape sequences have special meaning in a string:

String | Name      | Unicode point                | Sym | Glyph
-------|-----------|------------------------------|-----|--------
`\0`   | NULL      | U+0000 NULL                  | ␀   | 
`\b`   | BS        | U+0008 BACKSPACE             | ␈   | ↰
`\t`   | TAB       | U+0009 CHARACTER TABULATION  |     | ⭾
`\n`   | LF        | U+000A LINE FEED             | ␊   | ⮒
`\v`   | VTAB      | U+000B LINE TABULATION       |     | ⭿
`\f`   | FF        | U+000C FORM FEED             |     | ⮐
`\r`   | CR        | U+000D CARRIAGE RETURN       |     | ⏎
`\a`   | BELL      | U+0027 APOSTROPHE            | ␇   | ⍾

`\'`   | SQUOTE    | U+0027 APOSTROPHE            |     |
`\"`   | DQUOTE    | U+0022 QUOTATION MARK        |     | 
`\\`   | BACKSLASH | U+005C REVERSE SOLIDUS       |     | 




Because BACKSLASH is used as a part of the escape sequence it needs to be doubled to be interpreted as a single BACKSLASH. On the other hand, BACKSLASH is also used to strip the "specialness" off the special characters and turn them into characters literals.


### Interpretation

In a string, `\0` is interpreted as a `NULL` only if next char is not a decimal digit; otherwise, it is interpreted as an octal escape sequence.

input     | output
----------|----------
"\0"      | '\x00'
"\00"     | '\x00'
"\000"    | '\x00'
'\0000'   | '\x000'
"\0w"     | '\x00w'
"\001"    | '\x01'
"\007"    | '\x07'
"\010"    | '\b'
"\011"    | '\t'
"\012"    | '\n'
"\013"    | '\v'
"\014"    | '\f'
"\015"    | '\r'
"\016"    | '\x0E'
"\017"    | '\x0F'
"\020"    | "\x10"
"\037"    | '\x1F'
"\040"    | ' '
"\041"    | '!'
"\046"    | '&'
"\047"    | "'"
"\050"    | '('
"\057"    | '/'
"\060"    | '0'
"\067"    | '7'
"\070"    | '8'
"\077"    | '?'
"\0100"   | '\b0'
"\0101"   | '\b1'
"\'"      | "'"
"\""      | '"'
"\\"      | '\\'


- The regex for single character escapes characters: `/\\[bfnrtv0'"\\]/`

There's only one exception to this rule:

```js
'abc\⏎
def' == 'abcdef'; // true
```


The BACKSLASH followed by a `⏎` is not a character escape sequence, but a *line continuation*. The ⏎ doesn't become part of the string. This is a way to spread a string over multiple lines. In a way, BACKSLASH followed by a ⏎ escapes the ⏎.

Characters without special meaning can be escaped as well (e.g. '\a' == 'a'), but this is of course not needed.However, using \u outside of a Unicode escape sequence, or \x outside of a hexadecimal escape is disallowed by the specification, and causes some engines to throw a syntax error.

    Note: IE < 9 treats '\v' as 'v' instead of a vertical tab ('\x0B').If cross- browser compatibility is a concern, use \x0B instead of \v.

Another thing to note is that the \v and \0 escapes are not allowed in JSON strings.


## Refs

javascript-escapes
https://mathiasbynens.be/notes/javascript-escapes

javascript-encoding
https://mathiasbynens.be/notes/javascript-encoding
