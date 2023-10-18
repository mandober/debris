# Emacs :: Glossary

## Buffer
A buffer is like a scratch space that need not corespond to a file. Each open file corresponds to a buffer, but not the other way around. A buffer must be hosted in a window in order to be displayed to the user. Emacs uses buffers for more than just editing text, they can also act like I/O devices and they can be used to talk to processes, such as bash or Python.

## Window
Windows are geometrical elements - each window hosts exactly one buffer. A window must be inside a frame to be displayed. A window is just a tiled portion of the frame (which is what most window managers call a window; in Emacs, it is the other way around).

## Frame
Frames are top-level geometrical elements - each frame hosts one or more windows, and each window hosts exactly one buffer. (1 frame : many windows, 1 window : 1 buffer).

## Font lock
Font Locking is the term for syntax highlighting, and in turn is made up of faces of properties (color, font, text size) that the font locking engines use to pretty-print the text.

## Mode line
Emacs uses the modeline to communicate facts about Emacs and the current buffer, primarily buffer and mode info (e.g. buffer named *scratch*, the major mode is "Lisp Interaction"). Many optional info can be displayed in the modeline (battery capacity, the current function, git branch, etc.).

## Echo area
The echo area is the very bottom of an Emacs window. It echoes commands and provides a place to type extra arguments for commands.

## Minibuffer
The minibuffer is directly below the modeline and it is where errors and general information are shown. The echo area and the minibuffer share the same spot on the screen.

## Point
The point (caret) is the current position in a buffer. It is often represented (particularly in Emacs doc strings and documentation) as `-!-`. Each buffer tracks the position of the point separately. The buffer that has the point is the current buffer.

## Major mode
A major mode usually introduces font locking, indentation engine, specialized commands, and the things associated to, e.g. writing Haskell source code. Emacs has the central register of associations between file extensions and major modes. Additionally, for ambiguous files, Emacs will try infering the major mode by scanning the head of the file. A buffer can have just one major mode. The major mode is always displayed in the modeline.

## Minor mode
Minor modes, by contrast to major modes, are optional functionalities in the form of add-ons. A buffer may have many minor modes enabled. An example of a minor mode is English spell checker (`flyspell` mode). Some minor modes are also displayed in the modeline, but usually only those that alter the buffer or are somehow special.
