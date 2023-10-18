# Unicode delineators

Pairs of glyphs used to delineate or emphasize an expression or phase.

## Continuations with shift and reset

The denotation of `reset` operator is fine, but the brackets are usually used for literal lists or arrays, so we need an alt pair of glyphs.

CPS           | off | alt | so always use this  | examples
--------------|-----|-----|---------------------|----
hole context  | [∙] | ⎡∙⎤ | ⎡∙⎤ | 2 + ⎡5 * 3⎤ - 1
reset context | ⟨∙⟩ | <∙> | ⟨∙⟩ | ⟨2 + ⎡5 * 3⎤⟩ - 1

CPS elems
- hole:  `[∙]` replaced by `⎡∙⎤`
- reset: `⟨∙⟩` as emergency `<∙>`

Exp
- ⎡5 * 3⎤  ⎣5 * 3⎦  「5 * 3」  ｢5 * 3｣
- ⌞5 * 2⌟  ⌜5 * 2⌝  ›5 * 2‹  ‹5 * 2›

Trials
- [∙] <∙> (∙) {∙}
- ⎡∙⎤ ⟨∙⟩
- ⎣∙⎦
- ⌜∙⌝
- ⌞∙⌟
- ›∙‹  ‹∙›
- 「∙」  ｢∙｣
- ⟔∙⟓




⟪∙⟫
⧼∙⧽
⦑∙⦒
⦓∙⦔
⦕∙⦖
⦉∙⦊
⦇∙⦈
⦅∙⦆
⦃∙⦄
⟮∙⟯
⦗∙⦘
⟬∙⟭
⟦∙⟧
⦋∙⦌
⦍∙⦎
⦏∙⦐
‹∙›
«∙»



- x = `꡴`
- y = `〠`
- z = `〶`
- w = `🕅`
- a⛶b x▢y a🛆b x⧎y  (f ∘ g) `f ꠶ g`
- `A 〓 B`
- `A === B`
- `A == B`
- `A ≡ B`
- Top left corner: ⌜
- Top right corner: ⌝
- Bottom left crop: `⌍`
- Combining left angle above: `aa̚a`
- MODIFIER LETTER LOWER RIGHT CORNER ANGLE: `aꜚ`
