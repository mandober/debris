# Emacs

## Versions

* Emacs v. __28.1__ is the latest version
* Emacs v. __28.1__ on Windows 10 via scoop
* Emacs v. __27.2__ on MSYS2 on MigW64 on the path `/mingw64/bin/emacs`
* Emacs v. __26.3__ on WSL 2 on Ubuntu on Focal Fossa 
  (build 2, x86_64-pc-linux-gnu, GTK+ v.3.24.14, 2020-03-26)


## About GNU Emacs

GNU Emacs - an extensible, customizable, free text editor and more. At its core is an interpreter for Emacs Lisp, a dialect of the Lisp programming language with extensions to support text editing.

When you run Emacs you are in fact launching a tiny C core responsible for the low-level interactions with your OS's ABI. That includes things like filesystem and network access, drawing things to the screen or printing control codes to the terminal.

The cornerstone of elisp is the elisp interpreter. It runs in a single thread and intensive tasks will lock the UI. Its speed and asynchrony are its two main issues. When you write elisp you are not isolated in a sandbox, but you are altering a live system. Every function you call is carried out by the very same interpreter you use when you edit text.

## Frame Window Buffer

frame 1 : ∞ windows 1 : 1 buffer

buffer ∈ window ∈ frame
- there can be many frames
- and each frame can have one or more windows
- each window can have exactly one buffer
- *current buffer* is the buffer with the the point (cursor)


## Modeline EchoArea Minibuffer

Emacs uses the **modeline** to show info about Emacs and the current buffer (akin to a status bar). From left, it shows buffer name, the name of the major mode, editing stats, etc.

The **minibuffer** and **echo area** share the same line on the screen, which is directly below the modeline. Minibuffer has almost the same set of capabilities like the normal buffer and it will expand as needed to accomodate a larger command. Echo area shows the current keypress, errors and other general info.

The point and mark functionality serves to delimit a region in a buffer. A *region* is a contiguous block of text, usually in the current buffer. Both mark and point have additional roles; the mark also serves as a reference point from which other areas ofbuffer are more easily reachable.


## Killing and Yanking

* kill = cut
* yank = paste
* copy = copy, saving to the kill ring
* kill ring has slots which can be rotated
