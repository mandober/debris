# Key bindings

Legend
- [NPA] means the binding accepts the numeric prefix arg.
  e.g. `M-v` move up by a screen, `{N} M-v` move up by N lines




C-x 3     Split window vertically
M-x       Extended command functionality
C-x …     First chord of execution commands
C-x       Drops you to the command line, type another chord next or a command
C-x C-c   Quit
C-g       Abort (command, action, emacs if unresponsive, long action, num.arg)
C-h …     First chord of help commands
C-h t     Starts emacs tutorial
M-u {N} … Numeric arg (e.g. M-7 M-f move forward 7 words)
M-  {N} … Prefix arg (repeat count, flags, etc.)
C-a       move to BOL
C-e       move to EOL
M-v       Scroll by screen up (2 lines of overlap) [NPA]
C-v       Scroll by screen down [NPA]
{N} M-v   Move up N lines
{N} C-v   Move down N lines
C-l       scroll: level cursor line
M-<       move to the beggining of buffer
M->       move to the end of buffer
C-p       move to (up)   to the prev line
C-n       move to (down) to the next line
C-b       move back (left) by char
M-b       move left (left) by word
C-f       move forth (right) by char
M-f       move forth (right) by word

Directions
- start-end:    `a-e`
- prev-next:    `p-n`
- back-forward: `b-f`


* Physical units (C-)
  - char
  - line, BOL, EOL
  - screen (page)
  - buffer, BOB, EOB
* Logical units (M-)
  - word: BOW, EOW, B2W (on space char)
  - sentence: BOS, EOS
  - paragraph: BOP, EOP
