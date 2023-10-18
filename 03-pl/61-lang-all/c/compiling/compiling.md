# Compiling

In C programming language terminology, a __translation unit__ is the ultimate input to a C compiler from which an object file is generated. In casual usage it is sometimes referred to as a compilation unit.


## GCC

`gcc -std=gnu11 -Wall -Wextra -pedantic -fcheck-pointer-bounds -Wchkp main.c -o app`

Standards
* select standard: `-std=X` where X:`c90` (`-ansi`), `c99`, `c11` (`c17` corrects the errors from c11, but the corrections are also applied with `-std=c11`, the only diff is the value of `__STDC_VERSION__`).
* to obtain all the diagnostics required by the standard, specify `-pedantic` (or `-pedantic-errors` if you want them to be errors rather than warnings).
* select an extended version of the C language explicitly with `-std=gnu90` (for C90 with GNU extensions), `-std=gnu99` (for C99 with GNU extensions) or `-std=gnu11` (for C11 with GNU extensions).
* The default, if no C language dialect options are given, is `-std=gnu11`.
* Some options, such as `-Wall` and `-Wextra`, turn on other options, such as `-Wunused`, which may turn on further options, such as `-Wunused-value`.
* `-Wall` enables all the warnings about questionable constructions that are easy to avoid (or modify to prevent the warning), even in conjunction with macros.
* `-Wextra` enables some extra warning flags (not enabled by `-Wall`)
* Pointer Bounds Checker: `-fcheck-pointer-bounds`
* `-Wchkp` : warn about invalid memory access found by `-fcheck-pointer-bounds`




```shell
# compile
gcc -Wall -pedantic -g3 -o out in.c


# compiles with info gdb needs
gcc -g3 -o foo foo.c

# warn about many (not all) problems
gcc -g3 -Wall -pedantic -o foo foo.c
```

OPTIONS
- use debug info: `-g`or `-g3` (useful if you plan to watch prog run with gdb)
- use c99 standard: `-std=c99`
- warn about many (not all) problems: `-Wall -pedantic`


## valgrind
valgrind any program: `valgrind ls`
more info output if compiled with debuginfo turned on: `-g`or `-g3`
