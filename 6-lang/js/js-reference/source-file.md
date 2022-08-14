# Source File


## Hashbang
https://github.com/tc39/proposal-hashbang


## Byte-Order Mark

The BOM character is assumed to be handled by the host, however web browsers strip this character as part of fetching external scripts or modules (in *decode* or *UTF-8 decode* respectively), which happens before the text is interpreted as ECMAScript. As such, in browsers a BOM character can precede a #! in an external script or module, but not an inline one.


A byte-order mark (BOM) character at the beginning of a source text will prevent a subsequent #! from being interpreted as a hashbang.

https://encoding.spec.whatwg.org/#decode
https://encoding.spec.whatwg.org/#utf-8-decode
