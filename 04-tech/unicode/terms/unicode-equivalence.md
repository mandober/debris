# Unicode equivalence

https://en.wikipedia.org/wiki/Unicode_equivalence

**Unicode equivalence** is the specification by the Unicode Character Encoding Standard (UCES) that *some sequences of code points represent essentially the same character*.

This feature was introduced in the standard to allow compatibility with the pre-existing standard character sets, which often included similar or identical characters.

## Contents

- Sources of equivalence
  - Character duplication
  - Combining and precomposed characters
  - Typographical non-interaction
  - Typographic conventions
  - Encoding errors
- Normalization
  - Algorithms
  - Normal forms
  - Canonical ordering
- Errors due to normalization differences


## Character sequence equivalence

Unicode has 2 notions of equivalence: canonical equivalence and compatibility.

>Sequences that are canonically equivalent are also compatible, but the opposite is not necessarily true.


## Canonical equivalence

For compatibility or other reasons, Unicode sometimes assigns two different code points to entities that are essentially the same character.

>Code point sequences defined as **canonically equivalent** (are assumed to) have the same meaning and appearance.

For example, `ñ` and `ñ` are canonically equivalent, even though the former is a combined character sequence ('n' + COMBINING TILDE U+0303) and the later is a single code point.

Being canonically equivalent, these two sequences should be displayed and treated in the same way, and even substituted for each other.

However, `ñ != ñ` is most PLs, using naive string comparison (hence the need for normalization).


## Compatibility

Unicode also provides many *combining characters* that are not used on their own, but are intended to modify the preceding *base character*.

>Code point sequences defined as **compatible** (are assumed to) possibly have distinct appearances but the same meaning in some contexts.

For example, the ligature `ﬀ` is defined to be compatible, but not canonically equivalent, to the sequence `ff`.

Compatible sequences may be treated the same by some applications (such as sorting and indexing), but not by others. They may be substituted for each other in some situations, but not in others.

However, `ﬀ != ff` is most PLs, using naive string comparison (hence the need for normalization).




**Character composition** 
is the process of replacing 
a *decomposed character*
(base letter followed by combining characters)
by a single *precomposed character*.

**Character decomposition** 
is the process of replacing 
a single precomposed character 
by a decomposed character.

is the process opposite to composition.

In general, precomposed characters are defined to be canonically equivalent to the sequence of their base letter and subsequent combining diacritic marks, in whatever order these may occur.

## Unicode normalization

**Unicode normalization** is a text normalization procedure defined by the Unicode standard that replaces equivalent sequences of characters, so that two equivalent texts are reduced to the same sequence of code points, called the **normalization form** (normal form).

Unicode defines two normal forms for each of the two notions of equivalence:
- *fully composed*: multiple points replaced by single points whenever possible
- *fully decomposed*: single points are split into multiple points









## Refs

https://unicode-org.github.io/icu/userguide/transforms/normalization/
