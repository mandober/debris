# idris help

`idris --help`

__Idris 2, version 0.5.1-0ab0ecb19__

## Usage

idris2 [options] [input file]

## Available options

--check, -c          Exit after checking source file
--no-prelude         Don't implicitly import Prelude
--output, -o <file>  Specify output file

--exec, -x <name>
Execute function after checking source file

--codegen, --cg <backend>
Set code generator (default chez)

--incremental-cg, --inc <backend>
Incremental code generation on given backend

--whole-program, --wp     Use whole program compilation (overrides `--inc`)
--directive <directive>   Pass a directive to the current code generator
--package, -p <package>   Add a package as a dependency

--source-dir <dir>  Set source directory
--build-dir  <dir>  Set build directory
--output-dir <dir>  Set output directory
--profile           Generate profile data when compiling, if supported
--total             Require functions to be total by default

`-Werror`            Treat warnings as errors
`-Wno-shadowing`     Do not print shadowing warnings

`-Xcase-tree-opt`
Apply experimental optimizations to case tree generation

`-Xcheck-hashes`
Use SHA256 hashes instead of modification time
to determine if a source file needs rebuilding

`--paths`             Show paths
`--prefix`            Show installation prefix
`--libdir`            Show library directory
`--list-packages`     List installed packages

`--init`           [package file] Interactively initialise a new project
--build            [package file] Build modules/executable for the given package
--install          [package file] Install the given package
--install-with-src [package file] Install the given package
--mkdoc            [package file] Build docd for the given package
--typecheck        [package file] Typechecks given package without code gen
--clean            [package file] Clean intermediate files/exes for package
`--repl`           [package file] Build package and launch REPL instance

--find-ipkg              Find and use an .ipkg file in a parent dir
--ignore-missing-ipkg    Fail silently if a dependency is missing

--client <REPL command>  Run a REPL command then quit immediately
--timing                 Display timing logs

`--ide-mode`
Run the REPL with machine-readable syntax

`--ide-mode-socket [host:port]`
Run the ide socket mode on given host and port (default "localhost:38398")

`--console-width <console width>`
Width for console output (0 for unbounded) (auto by default)

`--alt-error-count <alternative count>`
Outputs errors for the given number of alternative parsing attempts.

`--bash-completion <input> <previous input>`
Print bash autocompletion information

`--bash-completion-script <function name>`
Generate a bash script to activate autocompletion for Idris2

--color, --colour         Forces colored console output (enabled by default)
--no-color, --no-colour   Disables colored console output

--no-banner               Suppress the banner
--quiet, -q               Quiet mode; display fewer messages

--log <log level>         Global log level (0 by default)
--verbose                 Verbose mode (default)

--version, -v             Display version string
--help, -h, -? [topic]    Display help text



## Environment variables

EDITOR                Editor used in REPL :e command

IDRIS2_PREFIX         Idris2 installation prefix
IDRIS2_PATH           Places Idris2 looks for import files
IDRIS2_DATA           Places Idris2 looks for data files
IDRIS2_LIBS           Places Idris2 looks for libraries (for code gen)
IDRIS2_PACKAGE_PATH   Places Idris2 looks for packages

CHEZ                  `chez` executable used in Chez codegen
RACKET                `racket` executable used in Racket codegen
RACKET_RACO           `raco` executable used in Racket codegen

GAMBIT_GSI            gsi executable used in Gambit codegen
GAMBIT_GSC            gsc executable used in Gambit codegen
GAMBIT_GSC_BACKEND    gsc executable backend argument

NODE                  `node` executable used in Node codegen
PATH                  used to search for executables in certain codegens

CC                    C compiler executable used in RefC codegen
IDRIS2_CG             Codegen backend
IDRIS2_CC             C compiler executable used in RefC codegen

IDRIS2_INC_CGS
Code generators to use (comma separated) when compiling modules incrementally


## Sandbox

`$ idris --paths`

+ Installation Prefix    :: "/home/ivan/.idris2"
+ Source Directory       :: Nothing
+ Working Directory      :: "/home/ivan/proj/idris"
+ Data Directories       :: ["/home/ivan/.idris2/idris2-0.5.1/support"]
+ Package Directories    :: []
+ Build Directory        :: "build"
+ Local Depend Directory :: "depends"
+ Output Directory       :: "build/exec"

+ CG Library Directories ::
[ "/home/ivan/.idris2/idris2-0.5.1/lib"
, "/home/ivan/proj/idris"
]

+ Extra Directories      ::
[ "."
, "/home/ivan/.idris2/idris2-0.5.1/prelude-0.5.1"
, "/home/ivan/.idris2/idris2-0.5.1/base-0.5.1"
]


idris --bash-completion-script idris2completion
