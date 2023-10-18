# Unicode history

https://en.wikipedia.org/wiki/Unicode#History

The concept of a *code point* is part of Unicode's solution to a difficult conundrum faced by character encoding developers in the 1980s.

At the time, the majority of computer users used the Latin script with the ASCII encoding. ASCII encoding relied on the idea of bijection (a one to one correspondence) between characters and strings of bits. So, for example, given a character `"a"`, you could use the `chr` function to find out its unique bit string is `0:110:0001`, and vice verse: given a 7-bit binary number (or 8-bit with the MSB zeroed), you could get the unique character it represented with the function `ord`.

In other words, the two functions, `chr` and `ord`, are each other's inverses:
- `chr⁻¹` = `ord`
- `ord⁻¹` = `chr`

and each is its own involution:
- `(chr⁻¹)⁻¹` = `chr`
- `(ord⁻¹)⁻¹` = `ord`





then-scarce computing resources for Latin script users (who constituted the vast majority of computer users at the time),

If they added more bits per character to accommodate larger character sets, that design decision would also constitute an unacceptable waste of then-scarce computing resources for Latin script users (who constituted the vast majority of computer users at the time), since those extra bits would always be zeroed out for such users.

The code point avoids this problem by breaking the old idea of a bijection (direct one-to-one correspondence) between characters and particular sequences of bits.
