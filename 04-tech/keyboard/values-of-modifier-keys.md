# Keyboard :: Keyboard layout :: Modifier keys values

- nominal      1   Home          ^[[H
- Shift       +1   Home + Shift  ^[[1;2H
- Alt         +2   Home + Alt    ^[[1;3H
- Control     +4   Home + Ctrl   ^[[1;5H
- Win         +8   Home + Win    ^[[1;9H


* *QWERTY keys* are nominal alphabetical keys without modifiers.
* Modifier keys are a set of keys that almost always includes *Shift*, *Alt*, *Ctrl* keys (all 3 are duplicated on the left and right sides of the keyboard), but also *Super/Windows* key, *Menu/App* key, and sometimes also *CapsLock*, *SgLock*.
* Each modifier key adds a bitmask value to the nominal key value:
  -  00001  (1) Shift
  -  00010  (2) Alt
  -  00100  (4) Control
  -  01000  (8) Super/Windows
  -  10000 (16) extra-1
  - 100000 (32) extra-2



Key combos
- Home                               ^[[H       1 + 0 + 0 + 0 + 0 = 1
- Home   Shift                       ^[[1;2H    1 + 1 + 0 + 0 + 0 = 2
- Home           Alt                 ^[[1;3H    1 + 0 + 2 + 0 + 0 = 3
- Home   Shift   Alt                 ^[[1;4H    1 + 1 + 2 + 0 + 0 = 4
- Home                 Ctrl          ^[[1;5H    1 + 0 + 0 + 4 + 0 = 5
- Home   Shift         Ctrl          ^[[1;6H    1 + 1 + 0 + 4 + 0 = 6
- Home           Alt   Ctrl          ^[[1;7H    1 + 0 + 2 + 4 + 0 = 7
- Home   Shift   Alt   Ctrl          ^[[1;8H    1 + 1 + 2 + 4 + 0 = 8
- Home                       Win     ^[[1;9H    1 + 0 + 0 + 0 + 8 = 9
- Home   Shift               Win     ^[[1;10H   1 + 1 + 0 + 0 + 8 = 10
- Home           Alt         Win     ^[[1;11H   1 + 0 + 2 + 0 + 8 = 11
- Home   Shift   Alt         Win     ^[[1;12H   1 + 1 + 2 + 0 + 8 = 12
- Home                 Ctrl  Win     ^[[1;13H   1 + 0 + 0 + 4 + 8 = 13
- Home   Shift         Ctrl  Win     ^[[1;14H   1 + 1 + 0 + 4 + 8 = 14
- Home           Alt   Ctrl  Win     ^[[1;15H   1 + 0 + 2 + 4 + 8 = 15
- Home   Shift   Alt   Ctrl  Win     ^[[1;16H   1 + 1 + 2 + 4 + 8 = 16


nom   (1)   
shift (+1) 
alt   (+2) 
ctrl  (+4) 
super      
n  | nom    | shift | alt   | ctrl  | super | raw     |
---|--------|-------|-------|-------|-------|---------:
 0 | 0000   | .     | .     | .     | .     | ^[[H
 1 | 0001   | x     | .     | .     | .     | ^[[1;2H
 2 | 0010   | .     | x     | .     | .     | ^[[1;3H
 3 | 0011   | x     | x     | .     | .     | ^[[1;4H
 4 | 0100   | .     | .     | x     | .     | ^[[1;5H
 5 | 0101   | x     | .     | x     | .     | ^[[1;6H
 6 | 0110   | .     | x     | x     | .     | ^[[1;7H
 7 | 0111   | x     | x     | x     | .     | ^[[1;8H
 8 | 1000   | .     | .     | .     | x     | ^[[1;9H
 9 | 1001   | x     | .     | .     | x     | ^[[1;10H
10 | 1010   | .     | x     | .     | x     | ^[[1;11H
11 | 1011   | x     | x     | .     | x     | ^[[1;12H
12 | 1100   | .     | .     | x     | x     | ^[[1;13H
13 | 1101   | x     | .     | x     | x     | ^[[1;14H
14 | 1110   | .     | x     | x     | x     | ^[[1;15H
15 | 1111   | x     | x     | x     | x     | ^[[1;16H




0000 key
0001 key + shift
0010 key
0011
0100
0101
0110
0111
1000
1001
1010
1011
1100
1101
1110
