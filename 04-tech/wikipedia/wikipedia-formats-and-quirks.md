# Wikipedia formats and quirks

## 

## URL format

https://en.wikipedia.org/wiki/%s

## EN DASH in URLs

- `–` (en dash) vs `-` (dash)
- `–` EN DASH 0x2013 (%E2 %80 %93)
- `–` | EN DASH | 0x2013 | %E2%80%93 | %E2 %80 %93
- en∙dash in URLs makes the butt∙ugly link: it is rendered as `%E2%80%93`

> `%E2%80%93` in URLs may be replaced by a regular dash

## Apostroph in URLs

- APOSTROPHE 0x27 `'` (%27)
- apostroph in an URL is rendered as `%27`
- The apostrophed 's' letter in saxon genitive in English possessive's (the `'s` part), e.g. "Gödel's completeness theory", is rendered as HTML entity `%27`
- most of the time, such apostrophe + 's' can be replaced with nothing
 

- `ö` is rendered as `%C3%B6` (%C3 %B6)
- `'` (apostroph) is rendered as `%27`

may be replaced with any of these:
proper `ö` and removed apostrophe

```
https://en.wikipedia.org/wiki/G%C3%B6del%27s_completeness_theorem   ✔ (0)

https://en.wikipedia.org/wiki/G%C3%B6del_completeness_theorem       ✔ (1)
https://en.wikipedia.org/wiki/Gödel_incompleteness_theorems         ✔ (2)
https://en.wikipedia.org/wiki/Goedel_incompleteness_theorems        ✔ (3)

https://en.wikipedia.org/wiki/Gödel_completeness_theorems           ✘ (4)
https://en.wikipedia.org/wiki/Goedels_completeness_theorems         ✘ (5)
https://en.wikipedia.org/wiki/Gödels_completeness_theorems          ✘ (6)
```

0. the original URL with double-fault: apostrophe as `%27` and `ö` as `%C3%B6`
1. both apostrophe and 's' are removed; the fragment `%27s` i.e. `'s` (as in Gödel`'s` or Gödel`%27s`) is removed



## Special pages - query pages

https://en.wikipedia.org/w/index.php?title=Timeline_of_computing_1950%E2%80%931979

https://en.wikipedia.org/w/index.php?title=Timeline_of_computing_1950-1979
