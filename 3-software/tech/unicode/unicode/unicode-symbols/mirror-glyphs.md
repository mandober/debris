# Mirror glyphs


() <  > [] {} *ascii*

༺ ༻    ༻༺  ༼ ༽

«Var x»     »«

‹Bool s›     ›‹

᚛Int v᚜      ᚜᚛

⁅Abs f a⁆      ⁆⁅

⁽f a⁾   ₍Abs₎

∈ ∋   ∉ ∌   ∊ ∍ ⋲ ⋺   ⋳ ⋻   ⋴ ⋼   ⋶ ⋽   ⋷ ⋾

∼ ∽   ≒ ≓   ≔ ≕   ≤ ≥   ≦ ≧   ≪ ≫   ≶ ≷  ≺ ≻   ≼ ≽

⊂ ⊃   ⊆ ⊇   ⊏ ⊐   ⊑ ⊒   

⊢ ⊣   ⊰ ⊱   ⊲ ⊳   ⊴ ⊵   

⊶ ⊷   ⋉ ⋊   ⋋ ⋌   ≃ ⋍

⋐ ⋑   ⋖ ⋗   ⋘ ⋙   ⋚ ⋛   ⋜ ⋝   ⋞ ⋟   ⋰ ⋱

⌈ ⌉   ⌊ ⌋   〈 〉   ❨ ❩   ❪ ❫   ❬ ❭   ❮ ❯   ❰ ❱   ❲ ❳   ❴ ❵ 

⟃ ⟄   ⟅ ⟆   ⟈ ⟉   ⟋ ⟍

⟕ ⟖   ⟝ ⟞   ⟢ ⟣   ⟤ ⟥   ⟦ ⟧   ⟨ ⟩   ⟪ ⟫   ⟬ ⟭   ⟮ ⟯   ⦃ ⦄   ⦅ ⦆   ⦇ ⦈   ⦉ ⦊

⦋ ⦌   ⦎ ⦏   ⦍ ⦐   ⦑ ⦒   ⦓ ⦔   ⦕ ⦖   ⦗ ⦘   ⊘ ⦸   ⧀ ⧁   ⧄ ⧅   ⧏ ⧐   ⧑ ⧒   ⧔ ⧕

⧘ ⧙   ⧚ ⧛   ∕ ⧵   ⧸ ⧹   ⧼ ⧽   ⨫ ⨬   ⨭ ⨮   ⨴ ⨵   ⨼ ⨽   ⩤ ⩥   ⩹ ⩺   ⩽ ⩾   ⩿ ⪀

⪁ ⪂   ⪃ ⪄   ⪋ ⪌   ⪑ ⪒   ⪓ ⪔   ⪕ ⪖   ⪗ ⪘   ⪙ ⪚   ⪛ ⪜   ⪡ ⪢   ⪦ ⪧   ⪨ ⪩

⪪ ⪫   ⪬ ⪭   ⪯ ⪰   ⪳ ⪴   ⪻ ⪼   ⪽ ⪾   ⪿ ⫀   ⫁ ⫂   ⫃ ⫄   ⫅ ⫆   ⫍ ⫎

⫏ ⫐   ⫑ ⫒   ⫓ ⫔   ⫕ ⫖   ⊦ ⫞   ⊩ ⫣   ⊨ ⫤   ⊫ ⫥   ⫬ ⫭   ⫷ ⫸   ⫹ ⫺

⸂ ⸃    ⸄ ⸅    ⸉ ⸊    ⸌ ⸍    ⸜ ⸝    ⸠ ⸡    ⸢ ⸣    ⸤ ⸥    ⸦ ⸧    ⸨ ⸩    〈 〉    《 》

【 】    〔 〕    〖 〗    〘 〙    〚 〛    ﹙ ﹚    ﹛ ﹜    ﹝ ﹞    ﹤ ﹥    （ ）    ＜ ＞

［ ］    ｛ ｝    ｟ ｠

---
There is a plain-text database of information about every Unicode character available from the Unicode Consortium; the format is described in Unicode Annex #44. The primary information is contained in `UnicodeData.txt`. Open and close punctuation characters are denoted with Ps (punctuation start) and Pe (punctuation end) in the General_Category field (the third field, delimited by ;). Look for those character, and you'll find what you're looking for.

http://www.unicode.org/Public/UNIDATA/
http://www.unicode.org/reports/tr44/
http://www.unicode.org/Public/UNIDATA/UnicodeData.txt
http://www.unicode.org/Public/UNIDATA/BidiMirroring.txt

Note that not all characters that you consider brackets may be listed; for instance, quotation marks (including "«»"). are indicated with `Pi` and `Pf` (initial and final punctuation), so you might want to include those as well.

And some character, like `<` and `>`, are used as brackets in some contexts (such as HTML/XML), while they are considered math symbols (`Sm`) in `UnicodeData.txt`. Those you are going to have to find by hand; there is no pre-determined listing of those.


Some bash implementations have a UTF-8 printing has a bug that causes it 
to print `U+00AB` `«` and `U+00BB` `»` as `?`
and some terminals don't render characters correctly.

Here's a quick Bash script to get this information, and its output.

```bash
while IFS=';' read number name category rest
do 
    if [[ "$category" =~ Ps|Pe|Pi|Pf ]]
    then 
        printf "%s (U+%s, %s): \u"$number"\n" "$name" "$number" "$category"
    fi
done < UnicodeData.txt
```



---

Recent Unicode releases have added a property *Bidi_Paired_Bracket* that gives what Unicode thinks are the pairs of brackets. This is different from the ones that are mirrored.

There are 60 bracket-pairs as of Unicode 8.0. The following table maps each to its mate.
- 1st column gives a code point
- 2nd gives the Unicode version it was introduced in
- 3rd shows the mapping
- 4th column gives the mapping by character name

Also, for looking at the Unicode character database, Perl5 is packaged with the module `Unicode::UCD`, with many functions for inspecting things, including new ones in Perl v5.22 that will output the value of all properties for a given code point. `Unicode::Tussle` on CPAN offers similar and other functionality

https://stackoverflow.com/questions/13535172/list-of-all-unicodes-open-close-brackets

()  )(  RIGHT PARENTHESIS / LEFT PARENTHESIS
[]  ][  RIGHT SQUARE BRACKET / LEFT SQUARE BRACKET
{}  }{  RIGHT CURLY BRACKET / LEFT CURLY BRACKET
< >
᚛᚜
᚜᚛
OGHAM REVERSED FEATHER MARK / OGHAM FEATHER MARK

⁅⁆
⁆⁅
RIGHT SQUARE BRACKET WITH QUILL / LEFT SQUARE BRACKET WITH QUILL

⁽⁾
⁾⁽
SUPERSCRIPT RIGHT PARENTHESIS / SUPERSCRIPT LEFT PARENTHESIS

₍₎
₎₍
SUBSCRIPT RIGHT PARENTHESIS / SUBSCRIPT LEFT PARENTHESIS

⌈⌉
⌉⌈
RIGHT CEILING / LEFT CEILING

⌊⌋
⌋⌊
RIGHT FLOOR / LEFT FLOOR

〈〉
〉〈
RIGHT-POINTING ANGLE BRACKET / LEFT-POINTING ANGLE BRACKET

❨❩
❩❨
MEDIUM RIGHT PARENTHESIS ORNAMENT / MEDIUM LEFT PARENTHESIS ORNAMENT

❪❫
❫❪
MEDIUM FLATTENED RIGHT PARENTHESIS ORNAMENT / MEDIUM FLATTENED LEFT PARENTHESIS ORNAMENT

❬❭
❭❬
MEDIUM RIGHT-POINTING ANGLE BRACKET ORNAMENT / MEDIUM LEFT-POINTING ANGLE BRACKET ORNAMENT

❮❯
❯❮
HEAVY RIGHT-POINTING ANGLE QUOTATION MARK ORNAMENT / HEAVY LEFT-POINTING ANGLE QUOTATION MARK ORNAMENT

❰❱
❱❰
HEAVY RIGHT-POINTING ANGLE BRACKET ORNAMENT / HEAVY LEFT-POINTING ANGLE BRACKET ORNAMENT

❲❳
❳❲
LIGHT RIGHT TORTOISE SHELL BRACKET ORNAMENT / LIGHT LEFT TORTOISE SHELL BRACKET ORNAMENT

❴❵
❵❴
MEDIUM RIGHT CURLY BRACKET ORNAMENT / MEDIUM LEFT CURLY BRACKET ORNAMENT

⟅⟆
⟆⟅
RIGHT S-SHAPED BAG DELIMITER / LEFT S-SHAPED BAG DELIMITER

⟦⟧
⟧⟦
MATHEMATICAL RIGHT WHITE SQUARE BRACKET / MATHEMATICAL LEFT WHITE SQUARE BRACKET

⟨⟩
⟩⟨
MATHEMATICAL RIGHT ANGLE BRACKET / MATHEMATICAL LEFT ANGLE BRACKET

⟪⟫
⟫⟪
MATHEMATICAL RIGHT DOUBLE ANGLE BRACKET / MATHEMATICAL LEFT DOUBLE ANGLE BRACKET

⟬⟭
⟭⟬
MATHEMATICAL RIGHT WHITE TORTOISE SHELL BRACKET / MATHEMATICAL LEFT WHITE TORTOISE SHELL BRACKET

⟮⟯
⟯⟮
MATHEMATICAL RIGHT FLATTENED PARENTHESIS / MATHEMATICAL LEFT FLATTENED PARENTHESIS

⦃⦄
⦄⦃
RIGHT WHITE CURLY BRACKET / LEFT WHITE CURLY BRACKET

⦅⦆
⦆⦅
RIGHT WHITE PARENTHESIS / LEFT WHITE PARENTHESIS

⦇⦈
⦈⦇
Z NOTATION RIGHT IMAGE BRACKET / Z NOTATION LEFT IMAGE BRACKET

⦉⦊
⦊⦉
Z NOTATION RIGHT BINDING BRACKET / Z NOTATION LEFT BINDING BRACKET

⦋⦌
⦌⦋
RIGHT SQUARE BRACKET WITH UNDERBAR / LEFT SQUARE BRACKET WITH UNDERBAR

⦍⦐
⦎⦏
RIGHT SQUARE BRACKET WITH TICK IN BOTTOM CORNER / LEFT SQUARE BRACKET WITH TICK IN BOTTOM CORNER

⦏⦎
⦐⦍
RIGHT SQUARE BRACKET WITH TICK IN TOP CORNER / LEFT SQUARE BRACKET WITH TICK IN TOP CORNER

⦑⦒
⦒⦑
RIGHT ANGLE BRACKET WITH DOT / LEFT ANGLE BRACKET WITH DOT

⦓⦔
⦔⦓
RIGHT ARC GREATER-THAN BRACKET / LEFT ARC LESS-THAN BRACKET

⦕⦖
DOUBLE LEFT ARC GREATER-THAN BRACKET / DOUBLE RIGHT ARC LESS-THAN BRACKET
⦖⦕
DOUBLE RIGHT ARC LESS-THAN BRACKET / DOUBLE LEFT ARC GREATER-THAN BRACKET

⦗⦘
⦘⦗
RIGHT BLACK TORTOISE SHELL BRACKET / LEFT BLACK TORTOISE SHELL BRACKET

⧘⧙
⧙⧘
RIGHT WIGGLY FENCE / LEFT WIGGLY FENCE

⧚⧛
⧛⧚
RIGHT DOUBLE WIGGLY FENCE / LEFT DOUBLE WIGGLY FENCE

⧼⧽
⧽⧼
RIGHT-POINTING CURVED ANGLE BRACKET / LEFT-POINTING CURVED ANGLE BRACKET

⸢⸣
⸣⸢
TOP RIGHT HALF BRACKET / TOP LEFT HALF BRACKET

⸤⸥
⸥⸤
BOTTOM RIGHT HALF BRACKET / BOTTOM LEFT HALF BRACKET

⸦⸧
⸧⸦
RIGHT SIDEWAYS U BRACKET / LEFT SIDEWAYS U BRACKET

⸨⸩
⸩⸨
LEFT DOUBLE PARENTHESIS / RIGHT DOUBLE PARENTHESIS

〈〉
LEFT ANGLE BRACKET / RIGHT ANGLE BRACKET
〉〈

《》
LEFT DOUBLE ANGLE BRACKET / RIGHT DOUBLE ANGLE BRACKET

「」
LEFT CORNER BRACKET / RIGHT CORNER BRACKET

『』
LEFT WHITE CORNER BRACKET / RIGHT WHITE CORNER BRACKET

】【
RIGHT BLACK LENTICULAR BRACKET / LEFT BLACK LENTICULAR BRACKET

〔〕
LEFT TORTOISE SHELL BRACKET / RIGHT TORTOISE SHELL BRACKET

b〗x〖d
RIGHT WHITE LENTICULAR BRACKET / LEFT WHITE LENTICULAR BRACKET

b〙x〘d
RIGHT WHITE TORTOISE SHELL BRACKET / LEFT WHITE TORTOISE SHELL BRACKET

b〚x〛d
LEFT WHITE SQUARE BRACKET / RIGHT WHITE SQUARE BRACKET

b﹙x﹚d
SMALL LEFT PARENTHESIS / SMALL RIGHT PARENTHESIS

b﹛x﹜d
SMALL LEFT CURLY BRACKET / SMALL RIGHT CURLY BRACKET

b﹝x﹞d
SMALL LEFT TORTOISE SHELL BRACKET / SMALL RIGHT TORTOISE SHELL BRACKET

b（x）d
FULLWIDTH LEFT PARENTHESIS / FULLWIDTH RIGHT PARENTHESIS

b［x］d
FULLWIDTH LEFT SQUARE BRACKET / FULLWIDTH RIGHT SQUARE BRACKET

b｛x｝d
FULLWIDTH LEFT CURLY BRACKET / FULLWIDTH RIGHT CURLY BRACKET

b ｟x｠ d
FULLWIDTH LEFT WHITE PARENTHESIS / FULLWIDTH RIGHT WHITE PARENTHESIS

b ｢x｣ d ｢Bra Ket｣
HALFWIDTH LEFT CORNER BRACKET / HALFWIDTH RIGHT CORNER BRACKET
