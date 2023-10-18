# ASCII Tables

ASCII is character encoding set, the superset of which is the Unicode (that is, Unicode encodings such as UTF-8 and UTF-16). ASCII is a 7-bit charset which accounts for 2⁷ = 128 different characters, from 0x00 to 0x7f (0 to 127).

ASCII | Bin (to)   | Hex from-to | Dec       | pow of 2  | Notes
------|------------|-------------|-----------|-----------|------
BLK-0 | 0'000:1111 | 0x00 - 0x0f |   0 - 15  | 2⁰ - 2⁴-1 | CC0
BLK-1 | 0'001:1111 | 0x10 - 0x1f |  16 - 31  | 2⁴ - 2⁵-1 | CC1
BLK-2 | 0'010:1111 | 0x20 - 0x2f |  32 - 47  | 2⁵ - 2 -1 | SPC, punct
BLK-3 | 0'011:1111 | 0x30 - 0x3f |  48 - 63  | 2⁵ + 2⁴ - 2⁵-1 | numbers, punct
BLK-4 | 0'100:1111 | 0x40 - 0x4f |  64 - 79  | 2⁶ - 2⁶-1 | @, capitals
BLK-5 | 0'101:1111 | 0x50 - 0x5f |  80 - 95  | 2⁴ - 2⁶-1 | capitals, punct
BLK-6 | 0'110:1111 | 0x60 - 0x6f |  96 - 111 | 2⁴ - 2⁶-1 | acute, small
BLK-7 | 0'111:1111 | 0x70 - 0x7f | 112 - 127 | 2⁴ - 2⁷-1 | small, punct, DEL

0 1 2 4 6 16 32 64 128

000 = 2⁰
015 = 2⁴ - 1
016 = 2⁴
031 = 2⁵ - 1
032 = 2⁵
047 = 2
048 = 2
063 = 2⁶ - 1
064 = 2⁶
079 = 2
080 = 2
095 = 2
096 = 2
111 = 2
112 = 2
117 = 2
118 = 2
127 = 2⁷ - 1
-------------
128 = 2⁷


00  - 15     `2⁰`     : 2⁴ - 1
16  - 31     `2⁴`     : 2⁵ - 1
32  - 47     `2⁵`     :    - 1
48  - 63      2⁵ + 2⁴ : 2⁵ - 1
64  - 79     `2⁶`     : 2
80  - 95      2⁶      : 2
96  - 111     2⁶      : 2
112 - 127     2⁶      : 2⁷ - 1
-------------------------------
128          `2⁷`


32 + 16 = 48

2⁶ + 2^{4,5,6}
64 + 16 = 80
64 + 32 = 96
64 + 64 = 128

2⁶ + 2⁵ + 2⁴
64 + 48 = 112


2⁶ + 2⁵ + 2⁴

2⁴ + 2³ + 2³ = 16 + 8 + 8 = 32
2⁴ + 2¹ + 2² = 16 + 2 + 4 = 20
2⁰ + 2¹ + 2² =  0 + 2 + 4 = 6

2⁰ + 2⁰ + 2⁰ =  0 + 0 + 0 = 0      = 2¹ = 2
2⁰ + 2⁰ + 2⁰ =  0 + 0 + 0 = 0      = 2⁰ = 1


ASCII: 0x0000 - 0x0007f
- 0x00 - 0x0f CC
- 0x10 - 0x1f CC
- 0x20 - 0x2f SPC, punctuation
- 0x30 - 0x3f numbers, punct
- 0x40 - 0x4f @, capitals
- 0x50 - 0x5f capitals, punct
- 0x60 - 0x6f `, small
- 0x70 - 0x7f small, punct, DEL
