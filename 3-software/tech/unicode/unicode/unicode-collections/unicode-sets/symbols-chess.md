# Unicode: Chess symbols

* Chess pieces

name    | W  | B | S
--------|----|---|------
king    | ♔ | ♚ | K
queen   | ♕ | ♛ | Q
rook    | ♖ | ♜ | R
bishop  | ♗ | ♝ | B
knight  | ♘ | ♞ | N
pawn    | ♙ | ♟︎ | -


* Chessboard with Unicode symbols

(using THIN-SPACE for better alignment)


| φ | a | b | c | d | e | f | g | h |
|---|---|---|---|---|---|---|---|---|
| 8 | ♖ | ♘ | ♗ |  ♔  | ♕  | ♗ | ♘ | ♖ |
| 7 | ♟ | ♟ | ♟ |  ♟  |  ♟   | ♟ | ♟ | ♟ |
| 6 |       |       |       |       |        |       |       |       |
| 5 |       |       |       |       |        |       |       |       |
| 4 |       |       |       |       |        |       |       |       |
| 3 |       |       |       |       |        |       |       |       |
| 7 | ♙ | ♙ | ♙ | ♙ | ♙  | ♙ | ♙ | ♙ |
| 8 | ♜ | ♞ | ♝ | ♛ | ♚  | ♝ | ♞ | ♜ |



* Chessboard with Unicode symbols

(using THIN-SPACE for better alignment)


```
8 ♜ ♞ ♝ ♛ ♚ ♝ ♞ ♜
7 ♟ ♟ ♟ ♟ ♟ ♟ ♟ ♟
6    ⋅       ⋅       ⋅       ⋅       ⋅       ⋅      ⋅      ⋅
5  
4
3
2 ♙ ♙ ♙ ♙ ♙ ♙ ♙ ♙
1 ♖ ♘ ♗ ♕ ♔ ♗ ♘ ♖
  𝙖  𝙗  𝙘  𝙙 𝙚  𝙛  𝙜 𝙝
```


## Chess annotation

* Annotation
  - ♘f3
  - ♞c6
  - ♖xg4
  - ♗b5 a6

* Elementary comments
  - `!`   nice!                     Kh1!
  - `?`   wtf?                      Re7?
  - `!?`  nice! …err, perhaps not?   gh5!?
  - `?!`  fuck's sake?!

* On positions
  - +/= or ⩲  White has a slight advantage
  - =/+ or ⩱  Black has a slight advantage
  - +/− or ±  White has a clear advantage
  - −/+ or ∓  Black has a clear advantage

* Move-related
  - `⌓` *better*     : Indicates a better move than the one played
  - `□`  *only*       : The only reasonable move, or the only move available
  - `Δ`  *idea*       : Indicates the future plan this move supports
  - `∇`  *countering* : Indicates the opponent's plan this move defends against

* Positions or conditions
  - `↑`  *initiative* : indicates an advantage in initiative
  - `→`  *attack*     : with an attack
  - `⇄` *counterplay* : indicates that the player has counterplay
  - `↻` *development* : indicates a lead in development, alt-symbol: `↑↑`
  - `○`  *space*       : indicates more space owned by one player
  - `⊕` *time-trouble*
  - `⊙` *Zugzwang*



## Ref

https://en.wikipedia.org/wiki/Chess_notation
https://en.wikipedia.org/wiki/Glossary_of_chess
https://en.wikipedia.org/wiki/Chess_annotation_symbols
https://en.wikipedia.org/wiki/Algebraic_notation_(chess)

http://www.alanwood.net/unicode/
https://en.wikipedia.org/wiki/Category:Lists_of_symbols



## Chess board schemes


```

8 █ █ █ █ █ █ █ █
7 ░ ░ ░ ░ ░ ░ ░ ░
6 ▀ ▀ ▀ ▀ ▀ ▀ ▀ ▀
5 ▄ ▄ ▄ ▄ ▄ ▄ ▄ ▄
4 █ █ █ ░ █ █ █ █
3 █ ▁ █ █ █ █ █ █
2 ░ ░ ░ ▁ ░ ░ ░ ░
1 ▁ ▁ ▁ ▁ ▁ ▁ ▁ ▁
  A B C D E F G H

░ ,________________________
8 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
7 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
6 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
5 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
4 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
3 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
2 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
1 | ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁ |
░ '------------------------'
░ ░ A  B  C  D  E  F  G  H


8 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
7 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
6 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
5 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
4 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
3 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
2 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
1 ▁  ▁  ▁  ▁  ▁  ▁  ▁  ▁
. A  B  C  D  E  F  G  H

```
