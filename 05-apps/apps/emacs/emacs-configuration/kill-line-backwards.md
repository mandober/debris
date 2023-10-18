# Kill Line Backward

Emacs doesn't have `backward-kill-line` command (to kill the text from the point to BOL), because the same effect can be obtained by invoking `kill-line` with `0` as the prefix argument.

kill-line is `C-k`
- `C-0   C-k`
- `M-0   C-k`
- `C-u 0 C-k`

To bind the backward line killing to a key like C-BCKSPC (bound to `backward-word-kill` by default):

```el
(global-set-key
  (kbd "C-<backspace>")
    (lambda ()
      (interactive)
      (kill-line 0)
      (indent-according-to-mode)))
```

The last line, `indent-according-to-mode` makes killing indent-aware.
