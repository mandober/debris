# Library management

https://agda.readthedocs.io/en/latest/tools/package-system.html

<!-- TOC -->

- [Using stdlib](#using-stdlib)
- [Library files](#library-files)
- [agda-lib files](#agda-lib-files)
- [Installing libraries](#installing-libraries)
- [Using a library](#using-a-library)
- [Default libraries](#default-libraries)
- [Version numbers](#version-numbers)
- [Upgrading](#upgrading)

<!-- /TOC -->


Agda has a simple package management system to support working with multiple libraries in different locations. The central concept is that of a library.

## Using stdlib

Tell Agda about the location of stdlib, using the library management system.

The stdlib's dir, as absolute path, should be pointed to by the variable `AGDA_STDLIB`. A file named `standard-library.agda-lib` in this dir, contains

```yaml
name: standard-library
include: src
```

To be able to import and use stdlib in your Agda projects, you have to this:

1. Create the file `$AGDA_DIR/libraries` that contains

```txt
AGDA_STDLIB/standard-library.agda-lib
```

By default, `AGDA_DIR=~/.agda` (nix), `set AGDA_DIR=%AppData%\agda` (win).

* The `libraries` file informs Agda about the libraries you want it to know about.

2. Create the file `$AGDA_DIR/defaults` with the following content:

```txt
standard-library
```

* The `defaults` file informs Agda which of the libraries pointed to by `libraries` file should be used by default (i.e. in the default include path).


## Library files

A library consists of a
- name
- set of dependencies
- set of include paths
- set of default flags

Libraries are defined in `.agda-lib` files with the following syntax:

```hs
name: LIBRARY-NAME -- Comment
depend: LIB1 LIB2
  LIB3
  LIB4
include: PATH1
  PATH2
  PATH3
flags: OPTION1 OPTION2
  OPTION3
```

Dependencies are library names (not paths to `.agda-lib` files) and include paths are relative to the location of the library-file.

Default flags can be any valid pragma options, see    
https://agda.readthedocs.io/en/latest/tools/command-line-options.html#command-line-pragmas

Each of the 4 fields is optional.

Unnamed libraries cannot be depended upon, but dropping the name is possible if the library file only serves to list include paths and/or dependencies of the current project.

## agda-lib files

When a given file is type-checked, Agda uses the options from the *flags* field of zero or more library files. These files are discovered as following way:

1. First, the file's root directory is located. If the top-level module in the file is called `A.B.C`, then it has to be in the directory `root/A/B` (or root\A\B on Windows, although Windows can also use forward slashes), where "root" is the directory root.

2. If root contains any `.agda-lib` files, then these files are used.

3. Otherwise a search is made upwards in the directory hierarchy, and the search stops once one or more `.agda-lib` files are found in a directory. If no `.agda-lib` files are found, then none are used.

If the search finds two or more `.agda-lib` files, then the flags collected from all such files are merged in an unspecified way.

## Installing libraries

To be found by Agda, a library file has to be listed (with its full path) in a `libraries` file
- `AGDA_DIR/libraries-VERSION`, or if that doesn't exist
- `AGDA_DIR/libraries`

where `VERSION` is the Agda version (for instance 2.5.1).

The shell variable `AGDA_DIR` may be overridden by setting the environment variable `AGDA_DIR`. Env vars in the paths (of the form `$VAR`) are expanded. Each line of the `libraries` file is an absolute path to a library's root.

The location of the libraries file used can be overridden using the `--library-file=FILE` command line option.

You can find out the precise location of the `libraries` file by passing gibberish to `agda -l` as the file name (e.g. `agda -l asdfg Dummy.agda`) and then checking the error message.

If you want to install a library so that it is used by default, it must also be listed in the `defaults` file.

## Using a library

There are 3 ways a library gets used:

1. You supply the --library=LIB (or -l LIB) option to Agda. This is equivalent to adding a -iPATH for each of the include paths of LIB and its (transitive) dependencies. In this case the current directory is not implicitly added to the include paths.

2. No explicit --library flag is given, and the current project root (of the Agda file that is being loaded) or one of its parent directories contains an .agda-lib file defining a library LIB. This library is used as if a --library=LIB option had been given, except that it is not necessary for the library to be listed in the AGDA_DIR/libraries file.

3. No explicit --library flag, and no .agda-lib file in the project root. In this case the file AGDA_DIR/defaults is read and all libraries listed are added to the path. The defaults file should contain a list of library names, each on a separate line. In this case the current directory is also added to the path.

To disable default libraries, you can give the flag --no-default-libraries. To disable using libraries altogether, use the --no-libraries flag.

## Default libraries

If you want to usually use a variety of libraries, it is simplest to list them all in the `$AGDA_DIR/defaults` file.

Each line of the `defaults` file shall be the name of a library resolvable using the paths listed in the `libraries` file. For example,

```
standard-library
library2
library3
```

While it is safe to list all your libraries in library, be aware that listing libraries with name clashes in defaults can lead to difficulties, and should be done with care (i.e. avoid it unless you really must).

## Version numbers

Library names can end with a version number (e.g., `mylib-1.2.3`).

When resolving a library name (given in `--library` flag or listed as a default library or library dependency) the following rules are followed:
- If you don't give a version number, any version will do
- If you give a version number an exact match is required
- When there are multiple matches, an exact match is preferred; 
  otherwise the latest matching version is chosen.

For example, suppose you have the following libraries installed:
- mylib
- mylib-1.0
- otherlib-2.1
- otherlib-2.3

Aside from the exact matches, you can also pass `--library=otherlib` to get `otherlib-2.3`.

## Upgrading

If you are upgrading from the version of Agda before v.2.5, be aware that you may have remnants of the previous library management system in your preferences.

In particular, if you get warnings about _agda2-include-dirs_, you will need to find where this is defined. This may be buried in some `.el` emacs file.
