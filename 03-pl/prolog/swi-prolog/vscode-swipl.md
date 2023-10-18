# SWIPL extension for vscode

- SWI-Prolog 9.0.4


## Settings

ID                              | Description                                           | Default

prolog.executablePath           | Points to the Prolog executable.                      | */usr/bin/swipl*
prolog.dialect                  | swi: SWI-Prolog; ecl: ECLiPSe(eclipseclp).            | *swi*, ecl
prolog.linter.run               | How to trigger the linter.                            | *onType*, onSave, Never
prolog.linter.delay             | The milliseconds to delay when using onType trigger.  | 500
prolog.linter.enableMsgInOutput | Enable errors and warnings in OUTPUT channel.         | false
prolog.terminal.runtimeArgs     | Arguments of Prolog executable run in terminal.       | (empty)
prolog.format.tabSize           | The size of a tab in spaces                           | 4
prolog.format.enabled           | Enable formatting source codes                        | true
prolog.format.insertSpaces      | Prefer spaces over tabs                               | true

## SWIPL settings

swi-prolog :: config file
`c:/users/ivan/appdata/roaming/swi-prolog/swipl.ini`

https://www.swi-prolog.org/modified/config-files.html
says:
Starting with SWI-Prolog 8.1.15, the locations for finding personal configuration files and storing extensions (packs) has changed to statisfy the free desktop standards (XDG) and reach at a common structure for all platforms.

---

Warning: The location of the config file has moved
Warning:   from "c:/users/ivan/appdata/roaming/swi-prolog/swipl.ini"
Warning:   to   "c:/users/ivan/appdata/roaming/swi-prolog/init.pl"
Warning:   See https://www.swi-prolog.org/modified/config-files.html
Welcome to SWI-Prolog (threaded, 64 bits, version 9.0.4)
SWI-Prolog comes with ABSOLUTELY NO WARRANTY. This is free software.
Please run ?- license. for legal details.

For online help and background, visit https://www.swi-prolog.org
For built-in help, use ?- help(Topic). or ?- apropos(Word).

1 ?- ['t:\\pub\\lib\\300-prog-lang\\prolog\\That scripting language called Prolog\\e_martians.pl'].
Warning: t:/pub/lib/300-prog-lang/prolog/that scripting language called prolog/e_martians.pl:17:
Warning:    Clauses of green/1 are not together in the source-file
Warning:    Earlier definition at t:/pub/lib/300-prog-lang/prolog/that scripting language called prolog/e_martians.pl:16Warning:    Current predicate: jumping/1Warning:    
Use :- discontiguous green/1. to suppress this message
Warning: t:/pub/lib/300-prog-lang/prolog/that scripting language called prolog/e_martians.pl:18:
Warning:    Clauses of martian/1 are not together in the source-file
Warning:    Earlier definition at t:/pub/lib/300-prog-lang/prolog/that scripting language called prolog/e_martians.pl:16Warning:    Current predicate: green/1
Warning:    Use :- discontiguous martian/1. to suppress this message
true.

2 ?-
