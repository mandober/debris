# Supported Scripts

https://www.unicode.org/standard/supported.html

>The Unicode Standard encodes scripts rather than languages.

## Unicode scripts vs language scripts

- particular language has a particular writing system, i.e. a particular script
- unicode script is a collection of similar graphical symbols (historically related derivations)


When *writing systems* for more than one language share sets of *graphical symbols* that have historically related derivations, **the union of all of those graphical symbols is treated as a single collection of characters for encoding and is identified as a single script**.

Each script then serves as an inventory of graphical symbols, which are drawn upon for *the writing systems of particular languages*.

In many cases, a single script, such as the *Latin script*, may be used to write hundreds of languages.

script                          | n | language
--------------------------------|---|------------------------------------------
Latin  script                   | ∞ | many: Latin, English, French
Latin  script (extended)        | ∞ | many: French
Hangul script                   | 1 | Korean language
Cyrillic script                 | ∞ | many: Serbian, Russian
Greek script                    | ∞ | ancient Greek


In other cases, there is a 1-to-1 correspondence between a language and script. For example, the *Hangul script* is only used to write the *Korean* language.

The writing systems for some languages may also use more than one script; for example, Japanese traditionally makes use of the Han (Kanji), Hiragana, and Katakana scripts, and modern Japanese usage commonly mixes in the Latin script as well.

The scripts supported by the Unicode Standard include all of those listed in the following table. The listing in the table is ordered by the version of the Unicode Standard in which a particular script was first encoded. In many instances, supplemental characters for a given script have been encoded in subsequent versions of the standard, after the initial addition of the script. Details about most of these scripts can be looked up at the ScriptSource website.
