# mintty

http://mintty.github.io/


## USAGE

    mintty [OPTION]... [ PROGRAM [ARG]... | - ]

Start a new terminal session running the specified PROGRAM. If `-` (dash) is given instead of PROGRAM, invoke the login shell.


* Issues

wsltty closes immediately when using a non-default mount path
https://github.com/mintty/wsltty/issues/91

## OPTIONS

-e, --exec …
Treat remaining arguments as the command to execute

-c, --config FILE
Load specified config file (cf. `-C` or `-o ThemeFile`)

-o, --option OPT=VAL
Set/Override config file option with given value

-l, --log FILE | -
Log output to a FILE or to stdout (with `-`)

-h, --hold never|start|error|always
Keep window open after command finishes


-t, --title TITLE
Set window title (default: the invoked command) (cf. `-T`)

-p, --position X,Y
Open window at specified coordinates

-p, --position center|left|right|top|bottom
Open window at special position

-p, --position @N
Open window on monitor N

-s, --size COLS,ROWS
Set screen size in characters (also COLSxROWS)

-s, --size maxwidth|maxheight
Set max screen size in given dimension

-w, --window normal|min|max|full|hide
Set initial window state

-i, --icon FILE[,IX]
Load window icon from file, optionally with index

-B, --Border frame|void
Use thin/no window border

-R, --Report s|o
Report window position (short/long) after exit

--nopin
Make this instance not pinnable to taskbar

--nobidi | --nortl
Disable bidi (right-to-left support)

-D, --daemon
Start new instance with Windows shortcut key


-V, --version
Print version information and exit

-H, --help
Display help and exit


See manual page for further command line options and configuration
