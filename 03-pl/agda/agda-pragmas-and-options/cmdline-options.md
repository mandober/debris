# Command-line options

These options are accepted only on the command-line.

## General options

--help[={TOPIC}], -?[{TOPIC}]
  Show basically this help, or more help about TOPIC. Current topics available: warning.

--interaction
  For use with the Emacs mode (no need to invoke yourself).

--interaction-json
  New in version 2.6.1.
  For use with other editors such as Atom (no need to invoke yourself).

--interaction-exit-on-error
  New in version 2.6.3.
  Makes Agda exit with a non-zero exit code if `--interaction` or `--interaction-json` are used and a type error is encountered. The option also makes Agda exit with exit code 113 if Agda fails to parse a command.
  This option might for instance be used if Agda is controlled from a script.

--interactive, -I
  Start in interactive mode (not maintained).

--trace-imports[=(0|1|2|3)]
  New in version 2.6.4.
  Configure printing of messages when an imported module is accessed during type-checking.
  0 Do not print any messages about checking a module.
  1 Print only Checking … when an access to an uncompiled module occurs.
    This is the default behavior if --trace-imports is not specified.
  2 Use the effect of 1, but also print Finished …
    when a compilation of an uncompiled module is finished.
    This is the behavior if --trace-imports is specified without a value.
  3 Use the effect of 2, but also print Loading …
    when a compiled module (interface) is accessed during the type-checking.

--no-projection-like
  New in version 2.6.1.
  Turn off the analysis whether a type signature likens that of a projection.
  *Projection-likeness* is an optimization that reduces the size of terms by dropping parameter-like reconstructible function arguments. Thus, it is advisable to leave this optimization on, the flag is meant for debugging Agda.
  See also the `NOT_PROJECTION_LIKE` pragma.

--only-scope-checking
  New in version 2.5.3.
  Only scope-check the top-level module, do not type-check it (see Quicker generation without typechecking).

--version, -V
  Show version number.

--print-agda-dir
  New in version 2.6.2.
  Outputs the root (`AGDA_DIR`) of the directory structure holding Agda's data files such as core libraries, style files for the backends etc.

--transliterate
  New in version 2.6.3.
  When writing to stdout or stderr Agda will (hopefully) replace code points that are not supported by the current locale or code page by something else, perhaps question marks.
  This option is not supported when `--interaction` or `--interaction-json` are used, because when those options are used Agda uses UTF-8 when writing to stdout (and when reading from stdin).

## Compilation

See Compilers for backend-specific options.

--compile-dir={DIR}
  Set DIR as directory for compiler output (default: the project root).

--no-main
  Do not treat the requested module as the main module of a program when compiling.

--with-compiler={PATH}
  Set PATH as the executable to call to compile the backend's output (default: ghc for the GHC backend).

## Generating highlighted source code

--count-clusters
  New in version 2.5.3.
  Count extended grapheme clusters when generating LaTeX code (see Counting Extended Grapheme Clusters). Available only when Agda was built with Cabal flag enable-cluster-counting.
  Pragma option since 2.5.4.

--css={URL}
  Set URL of the CSS file used by the HTML files to URL (can be relative).

--dependency-graph={FILE}
  New in version 2.3.0.
  Generate a Dot file FILE with a module dependency graph.

--dependency-graph-include={LIBRARY}
  New in version 2.6.3.
  Include modules from the given library in the dependency graph. This option can be used multiple times to include modules from several libraries. If this option is not used at all, then all modules are included. (Note that the module given on the command line might not be included.)
  A module M is considered to be in the library L if L is the name of a .agda-lib file A associated to M (even if M's file can not be found via the include paths in A).

--html
  New in version 2.2.0.
  Generate HTML files with highlighted source code (see Generating HTML).

--html-dir={DIR}
  Set directory in which HTML files are placed to DIR (default: html).

--html-highlight=[code,all,auto]
  New in version 2.6.0.

  Whether to highlight non-Agda code as comments in generated HTML files (default: all; see Generating HTML).

--latex
  New in version 2.3.2.
  Generate LaTeX with highlighted source code (see Generating LaTeX).

--latex-dir={DIR}
  New in version 2.5.2.
  Set directory in which LaTeX files are placed to DIR (default: latex).

--vim
  Generate Vim highlighting files.

## Imports and libraries

(see Library Management)

--ignore-all-interfaces
  New in version 2.6.0.
  Ignore all interface files, including builtin and primitive modules; only use this if you know what you are doing!

--ignore-interfaces
  Ignore interface files (re-type check everything, except for builtin and primitive modules).

--include-path={DIR}, -i={DIR}
  Look for imports in DIR.

--library={DIR}, -l={LIB}
  New in version 2.5.1.
  Use library LIB.

--library-file={FILE}
  New in version 2.5.1.
  Use FILE instead of the standard libraries file.

--local-interfaces
  New in version 2.6.1.
  Read and write interface files next to the Agda files they correspond to (i.e. do not attempt to regroup them in a _build/ directory at the project's root).

--no-default-libraries
  New in version 2.5.1.
  Don't use default library files.

--no-libraries
  New in version 2.5.2.
  Don't use any library files.
