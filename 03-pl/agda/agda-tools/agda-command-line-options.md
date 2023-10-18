# Agda ∷ Index ∷ Command-line options

* Command-line options in Agda v.2.6.2.2
https://agda.readthedocs.io/en/v2.6.2.2/tools/command-line-options.html

## TOC

<!-- TOC -->

- [TOC](#toc)
- [Options](#options)
- [Command-line only options](#command-line-only-options)
  - [General options](#general-options)
  - [Compilation](#compilation)
  - [Generating highlighted source code](#generating-highlighted-source-code)
  - [Imports and libraries](#imports-and-libraries)
- [Command-line and pragma options](#command-line-and-pragma-options)
  - [Caching](#caching)
  - [Printing and debugging](#printing-and-debugging)
  - [Copatterns and projections](#copatterns-and-projections)
  - [Experimental features](#experimental-features)
  - [Errors and warnings](#errors-and-warnings)
  - [Pattern matching and equality](#pattern-matching-and-equality)
  - [Search depth and instances](#search-depth-and-instances)
  - [Other features](#other-features)
  - [Warnings](#warnings)
- [Examples](#examples)
- [Options Consistency Check](#options-consistency-check)

<!-- /TOC -->

## Options

Options may be introduced via the command line, or directly in the source code, as a pragma. However, some options are only accepted from the command line.

Options
- by means of introduction
  - command-line only
    - general
  - command-line and in pragma
- by virulence
  - infective (downstream): ∀ modules D that depend on M,  `M -> D`
  - coinfective (upstream): ∀ modules U that M depends on, `U -> M`



## Command-line only options

Agda accepts these options only from the command line (not as pragma).


### General options

```
-I  --interactive
    --interaction
    --interaction-json
    --no-projection-like
    --only-scope-checking
    --print-agda-dir
    --transliterate
-V  --version
-?  --help[={TOPIC}]
```


`--interaction`
For use with the Emacs mode (no need to invoke this yourself).

`--interaction-json`
since: 2.6.1
For use with other editors such as Atom (no need to this invoke yourself).

`--interactive, -I` 
Start in interactive mode (unsupported, semi-working).

`--no-projection-like` since: 2.6.1    
Turn off the analysis whether a type signature likens that of a projection. **Projection-likeness** is an optimization that reduces the size of terms by dropping parameter-like reconstructible function arguments. Thus, it is advisable to leave this optimization on, the flag is meant for debugging Agda.

`--only-scope-checking`
Only scope-check the top-level module, don't type-check it (see quickLaTeX)

`--print-agda-dir` since: 2.6.2     
Outputs the root, `$AGDA_DIR`, of the directory structure holding Agda data files such as core libraries, style files for the backends, etc.

`--transliterate` since: 2.6.3    
When writing to stdout or stderr Agda (hopefully) (?!) replaces unsupported code points, perhaps (?!) by question marks. This option is not supported when `-I` is used, because when that option is used, Agda uses UTF-8 to read and write to standard FDs.

`--version, -V`
Show version number.

`--help[={TOPIC}], -?[{TOPIC}]`
Show basically this help, or more help about TOPIC. 
Current topics available: *warning*.
e.g. `agda --help=warning` or `agda -?warning`


### Compilation

`--compile-dir={DIR}`
Set DIR as directory for compiler output.
Default: project root

`--no-main`
Don't treat the requested module as the main module of a program when compiling.

`--with-compiler={PATH}`
Set $PATH as the executable to call to compile the backend's output. 
Default: *ghc* for the GHC backend


### Generating highlighted source code

`--dependency-graph={FILE}`
Generate a dot file FILE with a module dependency graph.

`--dependency-graph-include={LIBRARY}`
Include modules from the given library in the dependency graph. This option can be used multiple times to include modules from several libraries. If this option is not used at all, then all modules are included. Note that the module given on the command line might not be included). 
A module `M` is considered to be in the library `L` 
if `L` is the `name` of a `.agda-lib` file `A` associated to `M` 
(even if `M`'s file can not be found via the `include` paths in `A`.

`--html`
Generate HTML files with highlighted source code.

`--html-dir={DIR}`
Set directory in which HTML files are placed to `DIR` (default: html).

`--html-highlight=[code,all,auto]`
Whether to highlight non-Agda code as comments in generated HTML files. Default: all.

`--css={URL}`
Set URL of the CSS file used by the HTML files to URL

`--latex`
Generate LaTeX with highlighted source code

`--latex-dir={DIR}`
Set directory in which LaTeX files are placed to `DIR`
(default: latex).

`--count-clusters`
Count extended grapheme clusters when generating LaTeX code.

`--vim`
Generate syntax highlighting for Agda files for vim.


### Imports and libraries

(see package-system)

`--ignore-all-interfaces`
  Ignore *all* interface files, including builtin and primitive modules; only use this if you know what you are doing!

`--ignore-interfaces`
  Ignore interface files (re-type check everything, except for builtin and primitive modules).

`--include-path={DIR}, -i={DIR}`
  Look for imports in `DIR`.

`--library={DIR}, -l={LIB}`
  Use library `LIB`.

`--library-file={FILE}`
  Use `{FILE}` instead of the standard libraries file.

`--local-interfaces`
  s  since: 2.6.1
  Read and write interface files next to the Agda files they correspond to (i.e. do not attempt to regroup them in a `_build/` directory at project root).

`--no-default-libraries`
  Don't use default library files.

`--no-libraries`
  Don't use any library files.


## Command-line and pragma options

These options can also be given in `.agda` files using the OPTIONS pragma.

### Caching

`--caching, --no-caching`
  enable caching of typechecking (default). Default: `--caching`


### Printing and debugging

`--no-unicode`
  Don't use unicode characters to print terms.

`--show-implicit`
  Show implicit arguments when printing.

`--show-irrelevant`
  Show irrelevant arguments when printing.

`--verbose={N}, -v={N}`
  Set verbosity level to N.

`--profile={PROF}`
  Turn on profiling option PROF.
  Available options are
  - `internal`
    Measure time taken by various parts of the system (type checking, etc)
  - `modules`
    Measure time spent on individual (Agda) modules
  - `definitions`
    Measure time spent on individual (Agda) definitions
  - `sharing`
    Measure things related to sharing
  - `serialize`
    Collect detailed statistics about serialization
  - `constraints`
    Collect statistics about constraint solving
  - `metas`
    Count number of created metavariables
  - `interactive`
    Measure time of interactive commands

  Only one of `internal`, `modules`, and `definitions` can be turned on
  at a time. You can also give `--profile=all` to turn on all profiling
  options (choosing `internal` over `modules` and `definitions`, 
  use `--profile=modules --profile=all` to pick `modules` instead).


### Copatterns and projections

`--copatterns, --no-copatterns`
  Enable definitions by copattern matching. Default: `--copatterns`

`--postfix-projections`
  Make postfix projection notation the default.


### Experimental features

`--confluence-check`
  since: 2.6.1
  Enable optional *global confluence checking* of REWRITE.

`--local-confluence-check`
  since: 2.6.1
  Enable optional *local confluence checking* of REWRITE.

`--cubical`
  Enable *Cubical Agda* features. Turns on `--without-K`

`--erased-cubical`
  Enable *Erased Cubical version of Cubical Agda*, and `--without-K`.

`--experimental-irrelevance`
  Enable potentially *unsound irrelevance* features 
  (irrelevant levels, irrelevant data matching).

`--injective-type-constructors`
  Enable *injective type constructors* 
  (makes Agda anti-classical and possibly inconsistent).

`--rewriting`
  Enable declaration and use of REWRITE rules.

`--allow-exec`
  Enable system calls during type checking (see reflection).


### Errors and warnings

`--allow-incomplete-matches`
  since: 2.6.1
  Succeed and create interface file regardless of incomplete pattern-matching definitions. See: non-covering pragma.

`--allow-unsolved-metas`
  Succeed and create interface file regardless of unsolved metavariables.

`--no-positivity-check`
  Do not warn about not strictly positive data types (see positivity-checking)

`--no-termination-check`
  Do not warn about possibly nonterminating code (see termination-checking).

`--warning={GROUP|FLAG}, -W {GROUP|FLAG}`
  Set warning group or flag (see warnings).


### Pattern matching and equality

`--exact-split, --no-exact-split`
  Require [do not require] all clauses in a definition to hold as definitional equalities unless marked `CATCHALL` (see case-trees). 
  Default: `--no-exact-split`

`--no-eta-equality`
  Default records to no-eta-equality (see eta-expansion).

`--no-flat-split`
  since: 2.6.1
  Disable pattern matching on `@♭` arguments (see pattern-matching-on-flat).

`--no-pattern-matching`
  Disable pattern matching completely.

`--with-K`
  Overrides a global :option:`--without-K` in a file (see without-K).

`--without-K`
  Disables definitions using Streicher's K axiom (see without-K).

`--keep-pattern-variables`
  since: 2.6.1
  Prevent interactive case splitting from replacing variables with dot patterns (see dot-patterns).


### Search depth and instances

`--instance-search-depth={N}`
  Set instance search depth to `N` (default: 500; see
     :ref:`instance-arguments`),

`--inversion-max-depth={N}`
  Set maximum depth for pattern match inversion to `N` (default:
     50). Should only be needed in pathological cases.

`--termination-depth={N}`
  Allow termination checker to count decrease/increase upto `N`
     (default: 1; see :ref:`termination-checking`).

`--overlapping-instances, --no-overlapping-instances`
  Consider [do not consider] recursive instance arguments during
     pruning of instance candidates.

     Default: `--no-overlapping-instances`


### Other features

`--double-check`
  Enable double-checking of all terms using the internal
     typechecker.

`--guardedness, --no-guardedness`
  Enable [disable] constructor-based guarded corecursion (see
     :ref:`coinduction`).

     The option `--guardedness` is inconsistent with sized types and
     it is turned off by :option:`--safe` (but can be turned on again,
     as long as not also :option:`--sized-types` is on).

     Default: `--guardedness`

`--irrelevant-projections, --no-irrelevant-projections`
  since: 2.5.4

     Enable [disable] projection of irrelevant record fields (see
     :ref:`irrelevance`). The option `--irrelevant-projections`
     makes Agda inconsistent.

     Default (since version 2.6.1): `--no-irrelevant-projections`

`--auto-inline`
  Turn on automatic compile-time inlining. See :ref:`inline-pragma` for more information.

`--no-auto-inline`
  Disable automatic compile-time inlining (default). Only definitions marked
     `INLINE` will be inlined.

`--no-fast-reduce`
  Disable reduction using the Agda Abstract Machine.

`--call-by-name`
  Disable call-by-need evaluation in the Agda Abstract Machine.

`--no-forcing`
  Disable the forcing optimisation. Since Agda 2.6.1 is a pragma
     option.

`--no-print-pattern-synonyms`
  Always expand :ref:`pattern-synonyms` during printing. With this
     option enabled you can use pattern synonyms freely, but Agda will
     not use any pattern synonyms when printing goal types or error
     messages, or when generating patterns for case splits.

`--no-syntactic-equality`
  Disable the syntactic equality shortcut in the conversion
     checker.

`--syntactic-equality={N}`
  since: 2.6.3

     Give the syntactic equality shortcut `N` units of fuel (`N`
     must be a natural number).

     If `N` is omitted, then the syntactic equality shortcut is
     enabled without any restrictions.

     If `N` is given, then the syntactic equality shortcut is given
     `N` units of fuel. The exact meaning of this is
     implementation-dependent, but successful uses of the shortcut do
     not affect the amount of fuel.

`--safe`
  Disable postulates, unsafe :ref:`OPTIONS<options-pragma>` pragmas
     and `primTrustMe`. Turns off :option:`--sized-types` and
     :option:`--guardedness` (at most one can be turned back on again)
     (see :ref:`safe-agda`).

`--sized-types, --no-sized-types`
  Enable [disable] sized types (see :ref:`sized-types`).

     The option `--sized-types` is inconsistent with
     constructor-based guarded corecursion and it is turned off by
     :option:`--safe` (but can be turned on again, as long as not also
     :option:`--guardedness` is on).

     Default: `--sized-types`

`--type-in-type`
  Ignore universe levels (this makes Agda inconsistent; see
     :ref:`type-in-type <type-in-type>`).

`--omega-in-omega`
  Enable typing rule `Setω : Setω` (this makes Agda inconsistent;
     see :ref:`omega-in-omega <omega-in-omega>`).

`--universe-polymorphism, --no-universe-polymorphism`
  Enable [disable] universe polymorphism (see
     :ref:`universe-levels`).

     Default: `--universe-polymorphism`

`--cumulativity, --no-cumulativity`
  since: 2.6.1

     Enable [disable] cumulative subtyping of universes, i.e. if `A :
     Set i` then also `A : Set j` for all `j >= i`.

     Default: `--no-cumulativity`

`--no-import-sorts`
  since: 2.6.2

     Disable the implicit statement `open import Agda.Primitive using
     (Set; Prop)` at the start of each top-level Agda module.

`--save-metas, --no-save-metas`
  since: 2.6.3

     Save [or do not save] meta-variables in `.agdai` files. The
     alternative is to expand the meta-variables to their definitions.
     This option can affect performance. The default is to not save
     the meta-variables.

.. _warnings:

### Warnings

The :option:`-W` or :option:`--warning` option can be used to disable
or enable different warnings. The flag `-W error` (or
`--warning=error`) can be used to turn all warnings into errors,
while `-W noerror` turns this off again.

A group of warnings can be enabled by `-W {group}`, where `group`
is one of the following:

`all`
  All of the existing warnings.

`warn.`
  Default warning level

`ignore`
  Ignore all warnings.

The command `agda --help=warning` provides information about which
warnings are turned on by default.

Individual warnings can be turned on and off by `-W {Name}` and `-W
{noName}` respectively. The flags available are:

`AbsurdPatternRequiresNoRHS`
  RHS given despite an absurd pattern in the LHS.

`CantGeneralizeOverSorts`
  Attempt to generalize over sort metas in 'variable' declaration.

`CoInfectiveImport`
  Importing a file not using e.g. :option:`--safe` from one which
     does.

`CoverageIssue`
  Failed coverage checks.

`CoverageNoExactSplit`
  Failed exact split checks.

`DeprecationWarning`
  Feature deprecation.

`EmptyAbstract`
  Empty `abstract` blocks.

`EmptyInstance`
  Empty `instance` blocks.

`EmptyMacro`
  Empty `macro` blocks.

`EmptyMutual`
  Empty `mutual` blocks.

`EmptyPostulate`
  Empty `postulate` blocks.

`EmptyPrimitive`
  Empty `primitive` blocks.

`EmptyPrivate`
  Empty `private` blocks.

`EmptyRewritePragma`
  Empty `REWRITE` pragmas.

`IllformedAsClause`
  Illformed `as`-clauses in `import` statements.

`InfectiveImport`
  Importing a file using e.g. :option;`--cubical` into one which
     doesn't.

`InstanceNoOutputTypeName`
  Instance arguments whose type does not end in a named or variable
     type are never considered by instance search.

`InstanceArgWithExplicitArg`
Instance arguments with explicit arguments are never considered by
   instance search.

`InstanceWithExplicitArg`
  Instance declarations with explicit arguments are never
     considered by instance search.

`InvalidCatchallPragma`
  :ref:`CATCHALL<catchall-pragma>` pragmas before a non-function clause.

`InvalidNoPositivityCheckPragma`
  No positivity checking pragmas before non-`data`, `record` or
     `mutual` blocks.

`InvalidTerminationCheckPragma`
  Termination checking pragmas before non-function or `mutual`
     blocks.

`InversionDepthReached`
  Inversions of pattern-matching failed due to exhausted inversion
     depth.

`LibUnknownField`
  Unknown field in library file.

`MissingDefinitions`
  Names declared without an accompanying definition.

`ModuleDoesntExport`
  Names mentioned in an import statement which are not exported by
     the module in question.

`NotAllowedInMutual`
  Declarations not allowed in a mutual block.

`NotStrictlyPositive`
  Failed strict positivity checks.

`OldBuiltin`
  Deprecated :ref:`BUILTIN<built-ins>` pragmas.

`OverlappingTokensWarning`
  Multi-line comments spanning one or more literate text blocks.

`PolarityPragmasButNotPostulates`
  Polarity pragmas for non-postulates.

`PragmaCompiled`
  :ref:`COMPILE<foreign-function-interface>` pragmas not allowed in safe mode.

`PragmaCompileErased`
  :ref:`COMPILE<foreign-function-interface>` pragma targeting an erased symbol.

`PragmaNoTerminationCheck`
  :ref:`NO_TERMINATION_CHECK<terminating-pragma>` pragmas are deprecated.

`RewriteMaybeNonConfluent`
  Failed confluence checks while computing overlap.

`RewriteNonConfluent`
  Failed confluence checks while joining critical pairs.

`SafeFlagNonTerminating`
  :ref:`NON_TERMINATING<non_terminating-pragma>` pragmas with the safe flag.

`SafeFlagNoPositivityCheck`
  :ref:`NO_POSITIVITY_CHECK<no_positivity_check-pragma>` pragmas with the safe flag.

`SafeFlagNoUniverseCheck`
  :ref:`NO_UNIVERSE_CHECK<no_universe_check-pragma>` pragmas with the safe flag.

`SafeFlagPolarity`
  :ref:`POLARITY<polarity-pragma>` pragmas with the safe flag.

`SafeFlagPostulate`
  `postulate` blocks with the safe flag

`SafeFlagPragma`
  Unsafe :ref:`OPTIONS<options-pragma>` pragmas with the safe flag.

`SafeFlagTerminating`
  :ref:`TERMINATING<terminating-pragma>` pragmas with the safe flag.

`SafeFlagWithoutKFlagPrimEraseEquality`
  `primEraseEquality` used with the safe and without-K flags.

`ShadowingInTelescope`
  Repeated variable name in telescope.

`TerminationIssue`
  Failed termination checks.

`UnknownFixityInMixfixDecl`
  Mixfix names without an associated fixity declaration.

`UnknownNamesInFixityDecl`
  Names not declared in the same scope as their syntax or fixity
     declaration.

`UnknownNamesInPolarityPragmas`
  Names not declared in the same scope as their polarity pragmas.

`UnreachableClauses`
  Unreachable function clauses.

`UnsolvedConstraints`
  Unsolved constraints.

`UnsolvedInteractionMetas`
  Unsolved interaction meta variables.

`UnsolvedMetaVariables`
  Unsolved meta variables.

`UselessAbstract`
  `abstract` blocks where they have no effect.

`UselessInline`
  :ref:`INLINE<inline-pragma>` pragmas where they have no effect.

`UselessInstance`
  `instance` blocks where they have no effect.

`UselessPrivate`
  `private` blocks where they have no effect.

`UselessPublic`
  `public` blocks where they have no effect.

`WithoutKFlagPrimEraseEquality`
  `primEraseEquality` used with the without-K flags.

`WrongInstanceDeclaration`
  Terms marked as eligible for instance search should end with a
     name.



## Examples

* Run Agda with all warnings, except for warnings about empty `abstract` blocks:

    agda -W all --warning=noEmptyAbstract FILE.agda

* Run Agda on a file which uses the standard library (registered in the *libraries* file):

    agda -l standard-library -i. FILE.agda

* Or, if you have added `standard-library` to your *defaults* file, simply:

    agda FILE.agda

* Run Agda on a file which uses a custom Prelude (registered in the *libraries* file):

    agda -l agda-prelude -i. FILE.agda

* Or, if you have added `agda-prelude` to your *defaults* file, simply:

    agda FILE.agda



## Options Consistency Check

**Module Dependency Graph** (MDG) is generated by representing modules as vertices and dependencies between them as edges. Each module/vertex `M` has an outgoing edge to each module that import it - these are the *upstream modules* with regard to M.

If a module `M` imports a module `U`, then
- `M` depends on `U`, `U -> M`
- `U` is upstream with regard to `M`
- `U` is affected by coinfective options in `M`
- `U` is not affected by infective options in `M`

If a module `M` is imported by a module `D`, then
- `D` depends on `M`, `M -> D`
- `M` is upstream with regard to `D`
- `D` is affected by infective options in `M`

(aka the shit rolls downhill, the praise goes uphill, but in the upcomming scenario, the shit and praise are bidirectional contagions)

```
upstream to D₁ and D₂        U₁ ┬ U₂          upstream to M
     infect D₁ and D₂           │    ↑             infect M
                                |    ↑
                                |    ↑
                                │    coinfection flows upstream
                                |    ↑
                                ↓    ↑
imported by D₁ and D₂           ┼  M          imports (depends on) U₁ and U₂
upstream to D₁ and D₂           │    ↓               downstream to U₁ and U₂
    infects D₁ and D₂           |    ↓                   coinfects U₁ and U₂
                                │    ↓
                                │    ↓
                                |    infection flows downstream
                                │    ↓
                                ↓    ↓
depend on U₁ and U₂          D₁ ┴ D₂          depend on M
downstream to U₁ and U₂                       downstream to M
coinfect U₁ and U₂                            coinfect M
```


*Options Consistency Check* (OCC) is a verification step during which Agda checks that the MDG is consistent, options-wise. Agda needs to verify that the options used across the modules are consistent with each other.

*Infective options* (downstream):   
for all modules `A` and `B`, 
if a contagious option is used in `A`, 
then it must be used in `B`, 
whenever B depends on A, `A → B`. 
Infective options:
- `--cubical`
- `--prop`
- `--rewriting`

*Coinfective options* (upstream):   
for all modules `A` and `B`, 
if a co-contagious option is used in `A`, 
then it must be used in `B`, 
whenever A depends on B, `B → A`. 
Coinfective opts:
- `--safe`
- `--without-K`
- `--no-universe-polymorphism`
- `--no-sized-types`
- `--no-guardedness`


Agda records the options used when generating an *interface file*. If any of the following options differ when loading that interface again, the source file is re-typechecked instead:
- `--termination-depth`
- `--no-unicode`
- `--allow-unsolved-metas`
- `--allow-incomplete-matches`
- `--no-positivity-check`
- `--no-termination-check`
- `--type-in-type`
- `--omega-in-omega`
- `--no-sized-types`
- `--no-guardedness`
- `--injective-type-constructors`
- `--prop`
- `--no-universe-polymorphism`
- `--irrelevant-projections`
- `--experimental-irrelevance`
- `--without-K`
- `--exact-split`
- `--no-eta-equality`
- `--rewriting`
- `--cubical`
- `--overlapping-instances`
- `--safe`
- `--double-check`
- `--no-syntactic-equality`
- `--no-auto-inline`
- `--no-fast-reduce`
- `--instance-search-depth`
- `--inversion-max-depth`
- `--warning`
- `--allow-exec`
- `--save-metas`


[vim]: https://www.vim.org/
[dot]: http://www.graphviz.org/content/dot-language
[rst]: https://github.com/agda/agda/blob/master/doc/user-manual/tools/command-line-options.rst
