# 6.3 Code spans

https://github.github.com/gfm/#code-spans

A backtick string is a string of one or more backtick characters (`) that is neither preceded nor followed by a backtick.

A code span begins with a backtick string and ends with a backtick string of equal length. The contents of the code span are the characters between the two backtick strings, normalized in the following ways:

First, line endings are converted to spaces.
If the resulting string both begins and ends with a space character, but does not consist entirely of space characters, a single space character is removed from the front and back. This allows you to include code that begins or ends with backtick characters, which must be separated by whitespace from the opening or closing backtick strings.

`` foo ` bar ``


Backslash escapes are never needed, because one can always choose a string of n backtick characters as delimiters, where the code does not contain any strings of exactly n backtick characters.
