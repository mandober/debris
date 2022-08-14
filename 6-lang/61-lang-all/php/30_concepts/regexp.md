# Regular Expressions

The PHP function prefix for PCRE is `preg_`. The PHP function prefix for POSIX RE is `ereg_`. Since the release of PHP 5.3 this engine is *deprecated*.


## PCRE

https://www.php.net/manual/en/book.pcre.php

Perl-Compatible Regular Expressions (PCRE)

When using the PCRE functions, it is required that the pattern is enclosed by delimiters. A delimiter can be any non-alphanumeric, non-backslash, non-whitespace character. Often used delimiters are forward slashes (/), hash signs (#) and tildes (~). It is also possible to use bracket style delimiters where the opening and closing brackets are the starting and ending delimiter, respectively. (), {}, [] and <> are all valid bracket style delimiter pairs. Bracket style delimiters do not need to be escaped when they are used as meta characters within the pattern, but as with other delimiters they must be escaped when they are used as literal characters. If the delimiter needs to be matched inside the pattern it must be escaped using a backslash. If the delimiter appears often inside the pattern, it is a good idea to choose another delimiter in order to increase readability.

Examples of valid delimited patterns:

```
/foo bar/
#^[^0-9]$#
+php+
%[a-zA-Z0-9_-]%
```

The preg_quote() function may be used to escape a string for injection into a pattern and its optional second parameter may be used to specify the delimiter to be escaped.

You may add pattern modifiers after the ending delimiter. The following is an example of case-insensitive matching (`i`): `#[a-z]#i`


- preg_match()                  RE match
- preg_match_all()              Global re match
- preg_replace()                Search and replace
- preg_replace_callback()       Search and replace using a callback
- preg_replace_callback_array() Search and replace using callbacks
- preg_grep()             Returns elements of array matching the pattern
- preg_split()            Split up a string using re
- preg_quote()            Quote re chars within a string
- preg_filter()           re search and replace
- preg_last_error()       error code of the last PCRE re execution




## Pattern Modifiers

The current possible PCRE modifiers are listed below. The names in parentheses refer to internal PCRE names for these modifiers. Spaces and newlines are ignored in modifiers, other characters cause error.

i (PCRE_CASELESS)
If this modifier is set, letters in the pattern match both upper and lower case letters.

m (PCRE_MULTILINE)
By default, PCRE treats the subject string as consisting of a single "line" of characters (even if it actually contains several newlines). The "start of line" metacharacter (^) matches only at the start of the string, while the "end of line" metacharacter ($) matches only at the end of the string, or before a terminating newline (unless D modifier is set). This is the same as Perl. When this modifier is set, the "start of line" and "end of line" constructs match immediately following or immediately before any newline in the subject string, respectively, as well as at the very start and end. This is equivalent to Perl's /m modifier. If there are no "\n" characters in a subject string, or no occurrences of ^ or $ in a pattern, setting this modifier has no effect.

s (PCRE_DOTALL)
If this modifier is set, a dot metacharacter in the pattern matches all characters, including newlines. Without it, newlines are excluded. This modifier is equivalent to Perl's /s modifier. A negative class such as [^a] always matches a newline character, independent of the setting of this modifier.

x (PCRE_EXTENDED)
If this modifier is set, whitespace data characters in the pattern are totally ignored except when escaped or inside a character class, and characters between an unescaped # outside a character class and the next newline character, inclusive, are also ignored. This is equivalent to Perl's /x modifier, and makes it possible to include commentary inside complicated patterns. Note, however, that this applies only to data characters. Whitespace characters may never appear within special character sequences in a pattern, for example within the sequence (?( which introduces a conditional subpattern.

A (PCRE_ANCHORED)
If this modifier is set, the pattern is forced to be "anchored", that is, it is constrained to match only at the start of the string which is being searched (the "subject string"). This effect can also be achieved by appropriate constructs in the pattern itself, which is the only way to do it in Perl.

D (PCRE_DOLLAR_ENDONLY)
If this modifier is set, a dollar metacharacter in the pattern matches only at the end of the subject string. Without this modifier, a dollar also matches immediately before the final character if it is a newline (but not before any other newlines). This modifier is ignored if m modifier is set. There is no equivalent to this modifier in Perl.

S
When a pattern is going to be used several times, it is worth spending more time analyzing it in order to speed up the time taken for matching. If this modifier is set, then this extra analysis is performed. At present, studying a pattern is useful only for non-anchored patterns that do not have a single fixed starting character.

U (PCRE_UNGREEDY)
This modifier inverts the "greediness" of the quantifiers so that they are not greedy by default, but become greedy if followed by ?. It is not compatible with Perl. It can also be set by a (?U) modifier setting within the pattern or by a question mark behind a quantifier (e.g. .*?).
Note: It is usually not possible to match more than pcre.backtrack_limit characters in ungreedy mode.

X (PCRE_EXTRA)
This modifier turns on additional functionality of PCRE that is incompatible with Perl. Any backslash in a pattern that is followed by a letter that has no special meaning causes an error, thus reserving these combinations for future expansion. By default, as in Perl, a backslash followed by a letter with no special meaning is treated as a literal. There are at present no other features controlled by this modifier.

J (PCRE_INFO_JCHANGED)
The (?J) internal option setting changes the local PCRE_DUPNAMES option. Allow duplicate names for subpatterns. As of PHP 7.2.0 J is supported as modifier as well.

u (PCRE_UTF8)
This modifier turns on additional functionality of PCRE that is incompatible with Perl. Pattern and subject strings are treated as UTF-8. An invalid subject will cause the preg_* function to match nothing; an invalid pattern will trigger an error of level E_WARNING. Five and six octet UTF-8 sequences are regarded as invalid since PHP 5.3.4 (resp. PCRE 7.3 2007-08-28); formerly those have been regarded as valid UTF-8.
