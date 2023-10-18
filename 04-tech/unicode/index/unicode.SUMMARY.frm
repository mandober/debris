# Unicode :: Summary

https://www.unicode.org/versions/stats/

Unicode history
- 1987 Initial Unicode concept by Joe Becker, Lee Collins, Mark Davis
- 1991 (Jan) The Unicode Consortium incorporated
- 1991 (Nov) Unicode version 1.0

Unicode version
- current: v.14.0 2021-09-14
- initial: v.1.0  1991-10

Codespace (decimal)
- total capacity:          1114 112   Σ
- currently assigned:       283 440   A₀         A₀ ⊂ Σ
- currently defined:        144 697   D₀         D₀ ⊂ A₀ ⊂ Σ
- still unassigned (31%):   830 672   Δ₀ = Σ - A₀
- assigned but undefined:   138 743   Δ₁ = A₀ - D₀

Unicode numerically (hex)
- Code point patterns
  - 4-digit: `U+ mm mm` == `U+ 00 hh hh`
  - 6-digit: `U+ PP xx yy`
  - 8-digit: in bash [?] `$'\Uxxyyxxyy'`
- Total range: U+00 00 00 - U+10 FF FF (dec: 0 - 1114111)
- First 127 characters are the same as in ASCII 7-bit encoding
- Currently has 159 modern and historic scripts
- `�` REPLACEMENT CHARACTER U+00 FF FD


Unicode Blocks
- Blocks: 308

Unicode Planes
- Planes: 17 (BMP + 16 SUP)
- code points per plane: 2¹⁶ (65,536)
- unassigned planes: 4 - 13
- BMP Plane, then 16 SUP plane: Plane 0 - Plance 16
- `HH` digits identify each of the 17 planes, 00 - 10 (0 - 16)₁₀


Card | Ord | Name    | Id segment | Lower     | Upper
-----|-----|---------|------------|-----------|------------
0    | 1   | BMP     | U+ 00 hh hh  | U+ 00 00 00 | U+ 00 hh hh
1    | 2   | SUP 1   | U+ 01 hh hh  | U+ 01 00 00 | U+ 01 hh hh


      1st plane, BMP,   PLANE 0: HH segment is 00 `U+ 00 hh hh`
      2nd plane, SUP 1, PLANE 1: HH segment is 01 `U+ 01 hh hh`
      3rd plane, SUP 2, PLANE 2: HH segment is 02 `U+ 02 hh hh`
      4rd plane, SUP 3, PLANE 3: HH segment is 03 `U+ 03 hh hh`
      …
    15th plane, SUP-15, PLANE-15: HH segment is 0F `U+ 0F hh hh`
    16th plane, SUP-15, PLANE-15: HH segment is 0F `U+ 0F hh hh`
    17th plane, SUP-16, PLANE-16: HH segment is 10 `U+ 10 hh hh`
