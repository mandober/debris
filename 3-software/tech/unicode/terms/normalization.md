# Unicode normalization forms

In Unicode, some characters could be represented in multiple ways: as a single point (e.g. `ë`) or as mutliple points, with the base point plus a combining point (e.g. `e + ¨ = ë`). However, the problem is then that the two strings that look identical don't compare as equal, `ë != ë`; moreover, they have different lengths.

This is resolved by normalizing the Unicode strings into one of the four standard *canonical forms*:
- NFC:  Normalization Form Canonical     Composition
- NFD:  Normalization Form Canonical     Decomposition
- NFKC: Normalization Form Compatibility Composition
- NFKD: Normalization Form Compatibility Decomposition

Normalization Form {Canonical,Compatibility} {Composition,Decomposition}

Normalization Form (NF) | Canonical    | Compatibility (K)
------------------------|--------------|-------------------
Composition   (C)       | NFC          | NFKC
Decomposition (D)       | NFD          | NFKD


NFC is the most common form, in which all characters are first decomposed, then all combining sequences are re-composed in a specific order, as defined by the standard. You can pick any of these forms, and as long as you're consistently applying it to some text, you'll get the same result.

In summary, any text, especially user-supplied text, should be normalized to one of these four Unicode canonical forms.
