# stdlib installation

https://github.com/agda/agda-stdlib/blob/master/notes/installation-guide.md

Note: the full story on installing Agda libraries can be found at readthedocs.
http://agda.readthedocs.io/en/latest/tools/package-system.html

>Use stdlib v1.7.1 with Agda 2.6.2.2, 2.6.2.1, 2.6.2.

- Navigate to a suitable directory `$HERE` (replace appropriately) where you would like to install the library.

- Download the tarball of v1.7.1 of the standard library. This can either be done manually by visiting the Github repository for the library, or via the command line as follows:

    wget -O agda-stdlib.tar https://github.com/agda/agda-stdlib/archive/v1.7.1.tar.gz

You can replace `1.7.1` with any other version of the library you desire.

- Extract the standard library from the tarball.

    tar -zxvf agda-stdlib.tar

- OPTIONAL: If using `cabal` then run the commands to install via cabal:

    cd agda-stdlib-1.7.1
    cabal install

- Locate the file `$HOME/.agda/libraries`. If `~/.agda` dir does not exist create it.

- Register the standard library with Agda's package system by adding the following line to `$HOME/.agda/libraries`:

    $HERE/agda-stdlib-1.7.1/standard-library.agda-lib


## Using stdlib

Now, the standard library is ready to be used either as

1. in your project `$PROJECT`, by creating a file `$PROJECT.agda-lib`
  in the project's root containing:

    depend: standard-library
    include: $DIRS

    e.g.
    include: ., /home/ivan/.agda/stdlibs/agda-stdlib-1.7.2/standard-library.agda-lib, /home/ivan/.agda/stdlibs/agda-prelude/agda-prelude.agda-lib

where `$DIR`S is a list of directories where Agda searches for modules, 
for instance `.` (just the project's root).

2. In all projects, by adding the following line to `$HOME/.agda/defaults`

    standard-library

e.g. `$HOME/.agda/defaults` now contains:

    standard-library
    agda-prelude
