# Unicode :: Glyph catalog :: Brackets

## Brackets - Parens - Braces - Fences

fences 🤺
- ⧙ x ∈ A ⧘  wiggly fence.        N.B `⧙` is RIGHT WIGGLY FENCE        0x29d9
- ⧛ x ∈ a ⧚ double-wiggly fence. N.B `⧛` is RIGHT DOUBLE WIGGLY FENCE 0x29db
- ⦙ x ∈ A ⦙  dotted fence
- ⸂x:=z⸃  ⸄x:=z⸅  ⸉x:=z⸊  ⸌x:=z⸍  ⸜x:=z⸝  ⸢U⸣  ⸤U⸥  ⸦U⸧


## ASCII Brackets

```hs
-- symbol set: [ ]  ( )  < >  { }

[]  [a]  [a,b]  [ [], [a], [a,b] ]

[[]]  [[a]]  [[a,b]]  [ [], [[a]], [[a,b]] ]


()  (a)  (a,b)  ( (), (a), (a,b) )

(())  ((a))  ((a,b))  (( (()), ((a)), ((a,b)) ))


<>  <a>  <a,b>  < <>, <a>, <a,b> >

<<>>  <<a>>  <<a,b>>  << <<>>,<<a>>,<<a,b>> >>

{}  {a}  {a,b}  { {}, {a}, {a,b} }

{{}}  {{a}}  {{a,b}}  {{ {{}}, {{a}}, {{a,b}} }}


{()}  {(a)}  {(a,b)}  {()},{(a)},{(a,b)}

[()]  [(a)]  [(a,b)]  [()],[(a)],[(a,b)]

<()>  <(a)>  <(a,b)>  <()>,<(a)>,<(a,b)>

(>a<) (}a{)  [>a<]  {>a<}

|a|  /a/  \a\  [|a|]  {|a|}  (|a|)  <|a|>  </a/>  <\a\>  {\a\}  (/a/)  #a#

#|a|#  #(a)# #!a#! #!a#! #?a#!  #%q%#
```


## Unicode Brackets

```hs
⟅a⟆ ⟆b⟅

⸢ ⸣  ⸤ ⸥  ⸢a⸣ ⸤b⸥

⦑⦒  ⦑a⦒  ⦑a,b⦒  ⦑⦑⦒,⦑a⦒,⦑a,b⦒⦒

⦋⦌  ⦋a⦌  ⦋a,b⦌  ⦋⦋⦌,⦋a⦌,⦋a,b⦌⦌

⟦⟧  ⟦a⟧  ⟦a,b⟧  ⟦⟦⟧,⟦a⟧,⟦a,b⟧⟧

⁅⁆  ⁅a⁆  ⁅a,b⁆  ⁅⁅⁆,⁅a⁆,⁅a,b⁆⁆

⧼⧽  ⧼a⧽  ⧼a,b⧽  ⧼⧼⧽,⧼a⧽,⧼a,b⧽⧽

⟪⟫  ⟪a⟫  ⟪a,b⟫  ⟪⟪⟫,⟪a⟫,⟪a,b⟫⟫

⟨⟩  ⟨a⟩  ⟨a,b⟩  ⟨⟨⟩,⟨a⟩,⟨a,b⟩⟩

⦓⦔  ⦓a⦔  ⦓a,b⦔  ⦓⦓⦔,⦓a⦔,⦓a,b⦔⦔

⦕⦖  ⦕a⦖  ⦕a,b⦖  ⦕⦕⦖,⦕a⦖,⦕a,b⦖⦖

⦍⦎  ⦍a⦎  ⦍a,b⦎  ⦍ ⦍⦎, ⦍a⦎, ⦍a,b⦎ ⦎

⦍⦐  ⦍a⦐  ⦍a,b⦐  ⦍ ⦍⦐, ⦍a⦐, ⦍a,b⦐ ⦐

⦏⦐  ⦏a⦐  ⦏a,b⦐  ⦏ ⦏⦐, ⦏a⦐, ⦏a,b⦐ ⦐

⦏⦎  ⦏a⦎  ⦏a,b⦎  ⦏ ⦏⦎, ⦏a⦎, ⦏a,b⦎ ⦎

⦃⦄  ⦃a⦄  ⦃a,b⦄  ⦃ ⦃⦄, ⦃a⦄, ⦃a,b⦄ ⦄

⦉⦊  ⦉a⦊  ⦉a,b⦊  ⦉ ⦉⦊, ⦉a⦊, ⦉a,b⦊ ⦊

⦇⦈  ⦇a⦈  ⦇a,b⦈  ⦇ ⦇⦈, ⦇a⦈, ⦇a,b⦈ ⦈

⦅⦆  ⦅a⦆  ⦅a,b⦆  ⦅ ⦅⦆, ⦅a⦆, ⦅a,b⦆ ⦆

⟮⟯  ⟮a⟯  ⟮a,b⟯  ⟮ ⟮⟯, ⟮a⟯, ⟮a,b⟯ ⟯

⦗⦘  ⦗a⦘  ⦗a,b⦘  ⦗ ⦗⦘, ⦗a⦘, ⦗a,b⦘ ⦘

⟬⟭  ⟬a⟭  ⟬a,b⟭  ⟬ ⟬⟭, ⟬a⟭, ⟬a,b⟭ ⟭

‹›  ‹a›  ‹a,b›  ‹ ‹›, ‹a›, ‹a,b› ›

«»  «a»  «a,b»  « «», «a», «a,b» »
```

Symbol set:
- lens-brackets: ⟬ m ⟭  ⦗ l ⦘  ⟮ k ⟯  ⦅ i ⦆  ⦇ h ⦈
- braces: ⦃ j ⦄
- angle-brackets: ⟨ a ⟩  ⟪ b ⟫  ⦉ g ⦊  ⧼ c ⧽  ⦑ d ⦒  ‹d›  «h»
- brackets: ⟦ n ⟧  ⦋ o ⦌  ⦍ p ⦎  ⦏ q ⦐ ⁅ a ⁆
- compound: ⦓ e ⦔  ⦕ f ⦖

Chars:
- ⁅ ⁆    SQUARE BRACKET WITH QUILL
- ⦓ ⦔   ARC BRACKET
- ⦕ ⦖   DOUBLE ARC BRACKET
- ⦏      LEFT SQUARE BRACKET WITH TICK IN BOTTOM CORNER
- ⦐      RIGHT SQUARE BRACKET WITH TICK IN TOP CORNER
