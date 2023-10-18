# Move line

Custom commands
- `move-line-up`
- `move-line-down`

Define a pair of custom commands whose invocation (e.g. `M-x move-line-up`) moves the current line up (or down). However, this only defines the commands, the binding is done separately.

```hs
(defun move-line-up ()
  "Move up the current line."
  (interactive)
  (transpose-lines 1)
  (forward-line -2)
  (indent-according-to-mode))

(defun move-line-down ()
  "Move down the current line."
  (interactive)
  (forward-line 1)
  (transpose-lines 1)
  (forward-line -1)
  (indent-according-to-mode))
```

Bind the two commanads to appropriate key combos:

```hs
(global-set-key [(control shift up)]   'move-line-up)
(global-set-key [(control shift down)] 'move-line-down)
```

My keybindings
- `C-Shift-↑`   Moves line up
- `C-Shift-↓`   Moves line down
