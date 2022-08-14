# Agda installation

https://agda.readthedocs.io/en/latest/getting-started/installation.html

## Quick Install

Agda version 2.6.2.2


## Installation


Agda installation
- Install from source, package at [Hackage][1]
- Install from prebuilt binary package for different platforms
- Install standard library
- Install development version from [Git repository][2]
- Install multiple Agda versions
- Installation flags
- Try Agda online: [Agda Pad][3]

[1]: https://hackage.haskell.org/package/Agda
[2]: https://github.com/agda/agda
[3]: https://agdapad.quasicoherent.io/


## Install from source

Agda compilation prerequisites
- [GHC][4], tested with 8.0.2, 8.2.2, 8.4.4, 8.6.5, 8.8.4, 8.10.7, 9.0.2, 9.2.2
- [cabal-install][5]
- [Alex][6]
- [Happy][7]
- [Emacs][8]


[4]: https://www.haskell.org/ghc/
[5]: https://www.haskell.org/cabal/
[6]: https://www.haskell.org/alex/
[7]: https://www.haskell.org/happy/
[8]: http://www.gnu.org/software/emacs/


* Installing the `agda` and the `agda-mode` programs

After installing the prerequisites you can install the latest released version of Agda from Hackage using `cabal`:

```bash
# install Agda which includes agda-mode programs using cabal:
cabal update
cabal install Agda
--# or, if you have a previous version
cabal install --force Agda

--# then run agda-mode to setup emacs
agda-mode compile
agda-mode setup
```

The `agda-mode setup` command sets up Emacs for use with Agda via the Emacs mode. As an alternative you can copy the following text to your .emacs file:

```lisp
(load-file (let ((coding-system-for-read 'utf-8))
                (shell-command-to-string "agda-mode locate")))
```


## Install from prebuilt packages
https://agda.readthedocs.io/en/latest/getting-started/installation.html#prebuilt-packages-and-system-specific-instructions

* Platforms
  - Arch Linux
  - Debian, Ubuntu
  - Fedora
  - FreeBSD
  - Nix, NixOS
  - OS X
  - Windows

## Install standard library

https://github.com/agda/agda-stdlib/blob/master/notes/installation-guide.md

On installing Agda libraries can be found at:
https://agda.readthedocs.io/en/latest/tools/package-system.html


> Use version v1.7 of the standard library with Agda 2.6.2.

1. Navigate to a suitable directory `$HERE` into which to install the stdlib.
2. Download the tarball of v1.7 of stdlib, 
3. Extract it

```bash
HERE="$HOME/.agda/stdlibs"
mkdir -p "$HERE"
cd $HERE

wget -O agda-stdlib.tar https://github.com/agda/agda-stdlib/archive/v1.7.tar.gz
tar -zxvf agda-stdlib.tar
```

4. OPTIONAL: If using `cabal`, run this to install it via cabal

```bash
cd agda-stdlib-1.7
cabal install
```

5. Locate the file `$HOME/.agda/libraries`.
6. Register the stdlib with Agda's package system by adding this to 
`$HOME/.agda/libraries`

The `libraries` file informs Agda about the libraries you want it to know about.

```bash
# add this line into the 'libraries' file
echo "$HERE/agda-stdlib-1.7/standard-library.agda-lib" >> $HOME/.agda/libraries
```


Now the stdlib is ready to be used either for per-project or system-wide:

* In the project `$PROJECT`, create the file `$PROJECT.agda-lib` in the project's root containing:

```yaml
depend: standard-library
include: $DIRS
# where $DIRS is a dir list (comma separated?) where Agda searches for modules
include: ., .., /path/to/mods, path/to/agda/modules
```

where `$DIRS` is a list of directories where Agda searches for modules, for instance `.` (the project's root).


* in all your projects, by adding the following line to the file `$HOME/.agda/defaults`:

```yaml
standard-library
```

The `defaults` file informs Agda which of the libraries pointed to by the `libraries` file should be used by default (i.e. in the default include path).


## Install development version
https://agda.readthedocs.io/en/latest/getting-started/installation.html#installation-of-the-development-version
https://repology.org/project/agda/versions

## Install multiple Agda versions
https://agda.readthedocs.io/en/latest/getting-started/installation.html#installing-multiple-versions-of-agda

## Installation flags
https://agda.readthedocs.io/en/latest/getting-started/installation.html#installation-flags
