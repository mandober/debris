# Agda ∷ Index ∷ Help output

Agda version 2.6.2.2

Usage: agda [OPTIONS...] [FILE]

  -V         --version                         print version number and exit
  -?[TOPIC]  --help[=TOPIC]                    print help and exit; available TOPIC: warning
             --print-agda-dir                  print $AGDA_DIR and exit
  -I         --interactive                     start in interactive mode
             --interaction                     for use with the Emacs mode
             --interaction-json                for use with other editors such as Atom
             --compile-dir=DIR                 directory for compiler output (default: the project root)
             --vim                             generate Vim highlighting files
             --ignore-interfaces               ignore interface files (re-type check everything)
             --local-interfaces                put interface files next to the Agda files they correspond to
  -i DIR     --include-path=DIR                look for imports in DIR
  -l LIB     --library=LIB                     use library LIB
             --library-file=FILE               use FILE instead of the standard libraries file
             --no-libraries                    don't use any library files
             --no-default-libraries            don't use default libraries
             --only-scope-checking             only scope-check the top-level module, do not type-check it
             --show-implicit                   show implicit arguments when printing
             --show-irrelevant                 show irrelevant arguments when printing
             --show-identity-substitutions     show all arguments of metavariables when printing terms
             --no-unicode                      don't use unicode characters when printing terms
  -v N       --verbose=N                       set verbosity level to N
             --allow-unsolved-metas            succeed and create interface file regardless of unsolved meta variables
             --allow-incomplete-matches        succeed and create interface file regardless of incomplete pattern matches
             --no-positivity-check             do not warn about not strictly positive data types
             --no-termination-check            do not warn about possibly nonterminating code
             --termination-depth=N             allow termination checker to count decrease/increase upto N (default N=1)
             --type-in-type                    ignore universe levels (this makes Agda inconsistent)
             --omega-in-omega                  enable typing rule Setω : Setω (this makes Agda inconsistent)
             --subtyping                       enable subtyping rules in general (e.g. for irrelevance and erasure)
             --no-subtyping                    disable subtyping rules in general (e.g. for irrelevance and erasure) (default)
             --cumulativity                    enable subtyping of universes (e.g. Set =< Set₁) (implies --subtyping)
             --no-cumulativity                 disable subtyping of universes (default)
             --prop                            enable the use of the Prop universe
             --no-prop                         disable the use of the Prop universe (default)
             --two-level                       enable the use of SSet* universes
             --sized-types                     enable sized types (default, inconsistent with --guardedness, implies --subtyping)
             --no-sized-types                  disable sized types
             --flat-split                      allow split on (@flat x : A) arguments (default)
             --no-flat-split                   disable split on (@flat x : A) arguments
             --guardedness                     enable constructor-based guarded corecursion (default, inconsistent with --sized-types)
             --no-guardedness                  disable constructor-based guarded corecursion
             --injective-type-constructors     enable injective type constructors (makes Agda anti-classical and possibly inconsistent)
             --no-universe-polymorphism        disable universe polymorphism
             --universe-polymorphism           enable universe polymorphism (default)
             --irrelevant-projections          enable projection of irrelevant record fields and similar irrelevant definitions (inconsistent)
             --no-irrelevant-projections       disable projection of irrelevant record fields and similar irrelevant definitions (default)
             --experimental-irrelevance        enable potentially unsound irrelevance features (irrelevant levels, irrelevant data matching)
             --with-K                          enable the K rule in pattern matching (default)
             --without-K                       disable the K rule in pattern matching
             --copatterns                      enable definitions by copattern matching (default)
             --no-copatterns                   disable definitions by copattern matching
             --no-pattern-matching             disable pattern matching completely
             --exact-split                     require all clauses in a definition to hold as definitional equalities (unless marked CATCHALL)
             --no-exact-split                  do not require all clauses in a definition to hold as definitional equalities (default)
             --no-eta-equality                 default records to no-eta-equality
             --no-forcing                      disable the forcing analysis for data constructors (optimisation)
             --no-projection-like              disable the analysis whether function signatures liken those of projections (optimisation)
             --rewriting                       enable declaration and use of REWRITE rules
             --local-confluence-check          enable checking of local confluence of REWRITE rules
             --confluence-check                enable global confluence checking of REWRITE rules (more restrictive than --local-confluence-check)
             --no-confluence-check             disable confluence checking of REWRITE rules (default)
             --cubical                         enable cubical features (e.g. overloads lambdas for paths), implies --without-K
             --erased-cubical                  enable cubical features (some only in erased settings), implies --without-K
             --guarded                         enable @lock/@tick attributes
             --experimental-lossy-unification  enable heuristically unifying `f es = f es'` by unifying `es = es'`, even when it could lose solutions.
             --postfix-projections             make postfix projection notation the default
             --keep-pattern-variables          don't replace variables with dot patterns during case splitting
             --instance-search-depth=N         set instance search depth to N (default: 500)
             --overlapping-instances           consider recursive instance arguments during pruning of instance candidates
             --no-overlapping-instances        don't consider recursive instance arguments during pruning of instance candidates (default)
             --qualified-instances             use instances with qualified names (default)
             --no-qualified-instances          don't use instances with qualified names
             --inversion-max-depth=N           set maximum depth for pattern match inversion to N (default: 50)
             --safe                            disable postulates, unsafe OPTION pragmas and primEraseEquality, implies --no-sized-types
             --double-check                    enable double-checking of all terms using the internal typechecker
             --no-double-check                 disable double-checking of terms (default)
             --no-syntactic-equality           disable the syntactic equality shortcut in the conversion checker
  -W FLAG    --warning=FLAG                    set warning flags. See --help=warning.
             --no-main                         do not treat the requested module as the main module of a program when compiling
             --caching                         enable caching of typechecking (default)
             --no-caching                      disable caching of typechecking
             --count-clusters                  count extended grapheme clusters when generating LaTeX (note that this flag has not been enabled in this build of Agda)
             --auto-inline                     enable automatic compile-time inlining
             --no-auto-inline                  disable automatic compile-time inlining (default), only definitions marked INLINE will be inlined
             --no-print-pattern-synonyms       expand pattern synonyms when printing terms
             --no-fast-reduce                  disable reduction using the Agda Abstract Machine
             --call-by-name                    use call-by-name evaluation instead of call-by-need
             --no-import-sorts                 disable the implicit import of Agda.Primitive using (Set; Prop) at the start of each top-level module
             --allow-exec                      allow system calls to trusted executables with primExec

GHC backend options
  -c  --compile, --ghc      compile program using the GHC backend
      --ghc-dont-call-ghc   don't call GHC, just write the GHC Haskell files.
      --ghc-flag=GHC-FLAG   give the flag GHC-FLAG to GHC
      --with-compiler=PATH  use the compiler available at PATH
      --ghc-strict-data     make inductive constructors strict
      --ghc-strict          make functions strict

JS backend options
    --js           compile program using the JS backend
    --js-optimize  turn on optimizations during JS code generation
    --js-minify    minify generated JS code
    --js-verify    except for main module, run generated JS modules through `node` (needs to be in PATH)

Dot backend options
    --dependency-graph=FILE  generate a Dot file with a module dependency graph

HTML backend options
    --html                            generate HTML files with highlighted source code
    --html-dir=DIR                    directory in which HTML files are placed (default: html)
    --highlight-occurrences           highlight all occurrences of hovered symbol in generated HTML files
    --css=URL                         the CSS file used by the HTML files (can be relative)
    --html-highlight=[code,all,auto]  whether to highlight only the code parts (code) or the file as a whole (all) or decide by source file type (auto)

LaTeX backend options
    --latex          generate LaTeX with highlighted source code
    --latex-dir=DIR  directory in which LaTeX files are placed (default: latex)
