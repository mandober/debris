# SWI Prolog Installation

* Installation
https://www.swi-prolog.org/build/unix.html

* PPA install
https://www.swi-prolog.org/build/PPA.html

```bash
# first
sudo apt-get install software-properties-common

# Stable versions
sudo apt-add-repository ppa:swi-prolog/stable

# Development versions
sudo apt-add-repository ppa:swi-prolog/devel

# update db and install
sudo apt-get update
sudo apt-get install swi-prolog

# start prolog repl
swipl
Welcome to SWI-Prolog (threaded, 64 bits, version 8.4.1)
```

* SWI Prolog is installed in `/usr/lib/swi-prolog`
* example `init.pl` user startup file: `/usr/lib/swi-prolog/customize/init.pl`

## Installing packages

Directory for packages: `/home/ivan/.local/share/swi-prolog/pack`

package `func`
https://www.swi-prolog.org/pack/list?p=func


```prolog
% inside swipl
swipl

% install 'func' package:
:- use_module(library(func)).

% USAGE

% import module (from repl)
use_module(library(func)).

% import module (from file coz :- introduces a directive)
:- use_module(library(func)).
main :-
  % create a Plus3 function by composing 3 others
  Plus3 = succ of _+1 of plus(1),
    call(Plus3, 1, 4),
    format('~s world~n', [atom_codes $ hello]).
```


## User initialisation file

https://www.swi-prolog.org/pldoc/man?section=initfile

After the system initialisation, the system consults (see `consult/1`) the *user init file*. This file is searched using `absolute_file_name/3` using the path alias `app_config` (see `file_search_path/2`). This is the dir, named `swi-prolog`, located below the OS default dir for placing app config data:
* Windows: CSIDL folder `CSIDL_APPDATA` is typically: `%APPDATA%`
* Linux: use `XDG_DATA_HOME` if set, else `~/.config`

The directory can be found using this call:

```prolog
?- absolute_file_name(app_config(.), Dir, [file_type(directory)]).
Dir = '/home/ivan/.config/swi-prolog'.
```

* After the first startup file is found it is loaded and Prolog stops looking further for startup files.
* The name of the startup file can be changed with the `-f file` option.
* If file denotes an absolute path, this file is loaded, otherwise the file is searched using the same conventions as for the default startup file.
* Finally, if file is none, no file is loaded.

This dir contains the file `customize/init.pl` with commented commands that are often used to customize the behaviour of Prolog, such as interfacing to the editor, color selection or history parameters. Many of the development tools provide menu entries for editing the startup file and starting a fresh startup file from the system skeleton.


The installation provides a file customize/init.pl with (commented) commands that are often used to customize the behaviour of Prolog, such as interfacing to the editor, color selection or history parameters. Many of the development tools provide menu entries for editing the startup file and starting a fresh startup file from the system skeleton.

See also the -s (script) and -F (system-wide initialisation) in section 2.4 and section 2.3.
