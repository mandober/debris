# Regex Examples

https://regexr.com/

## Clear TOC

When pasting TOC from a pdf file, it often has a format like:

```
title of the topic....32
topic . . . . 32
topic . . . .32
topic. . . .32
topic. . . .
```

This regex removes the dots and page number:

`[\. ]+\d+$`



## Merge blank lines

Characters:
- linefeed: LF, `\n`, 0x0A, ASCII 10
- carriage return: CR, `\r`, 0x0D, ASCII 13

End of line:
- unix: LF: 0x0a
- mac : CR: 0x0d
- win : CRLF: \x0a 0x0d

Squeeze more than 1 consequitive blank lines into one. This depends on the line break encoding: `\n` or `\r\n`

regex: ^(\n)+ , or accounting for windows EOL: ^(\r?\n)+
replace: $1

/^(\n)+/$1/g

\x0a LF
\x0d CR
win: CR+LF
