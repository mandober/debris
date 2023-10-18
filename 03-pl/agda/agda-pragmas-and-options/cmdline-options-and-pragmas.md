# Command-line and pragma options

The following options can be given on the command-line and at the top of the files with source code via the `OPTIONS` pragma. The `OPTIONS` pragma can specify the options as a spece-separated list or with one option per pragma, or in a combined manner.

```agda hs
{-# OPTIONS --without-K --safe #-}
{-# OPTIONS --two-level #-}
{-# OPTIONS --profile=internal #-}
```

## Contents

<!-- TOC -->

- [Contents](#contents)
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

<!-- /TOC -->

## Caching

--caching
--no-caching
  New in version 2.5.4.
  Enable or disable caching of typechecking.
  Default: --caching.

## Printing and debugging

--no-unicode
  New in version 2.5.4.
  Do not use unicode characters to print terms.

--show-implicit
  Show implicit arguments when printing.

--show-irrelevant
  New in version 2.3.2.
  Show irrelevant arguments when printing.

--verbose={N}, -v={N}
  Set verbosity level to N.

--profile={PROF}
  New in version 2.6.3.
  Turn on profiling option `PROF`:
  - `internal`    : Measure time taken by various parts of the system
                    (type checking, serialization, etc.)
  - `modules`     : Measure time spent on individual modules
  - `definitions` : Measure time spent on individual definitions
  - `interactive` : Measure time of interactive commands
  - `sharing`     : Measure things related to sharing
  - `serialize`   : Collect statistics about serialization
  - `constraints` : Collect statistics about constraint solving
  - `metas`       : Count number of created metavariables
  - `conversion`  : Count number of times various steps of the conversion
                    algorithm are used (reduction, η-expansion, syntactic equality, etc.)

  Only one of `internal`, `modules`, and `definitions` can be turned on at a time.

  You can also give `--profile=all` to turn on all profiling options (choosing internal over modules and definitions, use `--profile=modules --profile=all` to pick modules instead).

  The stats are shown in the Agda Debug Buffer.
  In VSCode, display the buffer via: *Agda: Open Debug Buffer*.


## Copatterns and projections

--copatterns
--no-copatterns
  New in version 2.4.0.
  Enable or disable definitions by copattern matching (see Copatterns).
  Default: --copatterns (since 2.4.2.4).

--postfix-projections
  New in version 2.5.2.
  Make postfix projection notation the default.

## Experimental features

--allow-exec
  New in version 2.6.2.
  Enable system calls during type checking (see Reflection).

--confluence-check
--local-confluence-check
  New in version 2.6.1.
  Enable optional (global or local) confluence checking of REWRITE rules (see Confluence checking).

--cubical
  New in version 2.6.0.
  Enable cubical features. 
  Turns on --cubical-compatible and --without-K (see Cubical).

--erased-cubical
  New in version 2.6.3.
  Enable a variant of Cubical Agda, and turn on --without-K.

--experimental-irrelevance
  New in version 2.3.0.
  Enable potentially unsound irrelevance features (irrelevant levels, irrelevant data matching) (see Irrelevance).

--guarded
  New in version 2.6.2.
  Enable locks and ticks for guarded recursion (see Guarded Cubical Agda).

--injective-type-constructors
  New in version 2.2.8.
  Enable injective type constructors (makes Agda anti-classical and possibly inconsistent).

--prop
--no-prop
  New in version 2.6.0.
  Enable or disable declaration and use of definitionally proof-irrelevant propositions (see proof-irrelevant propositions).
  Default: -no-prop.

--rewriting
  New in version 2.4.2.4.
  Enable declaration and use of REWRITE rules (see Rewriting).

--two-level
  New in version 2.6.2.
  Enable the use of strict (non-fibrant) type universes `SSet` (two-level type theory).


## Errors and warnings

--allow-incomplete-matches
  New in version 2.6.1.
  Succeed and create interface file regardless of incomplete pattern-matching definitions. See also the `NON_COVERING` pragma.

--allow-unsolved-metas
  Succeed and create interface file regardless of unsolved meta variables (see Metavariables).

--no-positivity-check
  Do not warn about not strictly positive data types (see Positivity Checking).

--no-termination-check
  Do not warn about possibly nonterminating code (see Termination Checking).

--warning=, -W {GROUP|FLAG}
  New in version 2.5.3.
  Set warning group or flag (see Warnings).

## Pattern matching and equality

--exact-split
--no-exact-split
  New in version 2.5.1.
  Require (or not) all clauses in a definition to hold as definitional equalities unless marked `CATCHALL` (see Case trees).
  Default: --no-exact-split.

--hidden-argument-puns
--no-hidden-argument-puns
  New in version 2.6.4.
  Enable [disable] hidden argument puns.
  Default: --no-hidden-argument-puns.

--no-eta-equality
  New in version 2.5.1.
  Default records to no-eta-equality (see Eta-expansion).

--cohesion
  New in version 2.6.3.
  Enable the cohesion modalities, in particular @♭ (see Flat Modality).

--flat-split
  New in version 2.6.1.
  Enable pattern matching on @♭ arguments (see Pattern Matching on @♭).

--no-pattern-matching
  New in version 2.4.0.
  Disable pattern matching completely.

--with-K
  New in version 2.4.2.
  Overrides a global --without-K in a file (see Without K).

--without-K
  New in version 2.2.10.
  *Disables reasoning principles incompatible with univalent type theory*, most importantly *Streicher's K axiom* (see Without K).

--cubical-compatible
  New in version 2.6.3.
  Generate internal support code necessary for use from Cubical Agda (see Cubical compatible). Implies --without-K.

--keep-pattern-variables
  New in version 2.6.1.
  Prevent interactive case splitting from replacing variables with dot patterns (see Dot patterns).

--infer-absurd-clauses
--no-infer-absurd-clauses
  New in version 2.6.4.
  The --no-infer-absurd-clauses prevents interactive case splitting and coverage checking from automatically filtering out absurd clauses. This means that these absurd clauses have to be written out in the Agda text. Try this option if you experience type checking performance degradation with omitted absurd clauses.
  Default: --infer-absurd-clauses.


## Search depth and instances

--instance-search-depth={N}
  New in version 2.5.2.
  Set instance search depth to N (default: 500; see Instance Arguments).

--inversion-max-depth={N}
  New in version 2.5.4.
  Set maximum depth for pattern match inversion to N (default: 50). Should only be needed in pathological cases.

--termination-depth={N}
  New in version 2.2.8.
  Allow termination checker to count decrease/increase upto N (default: 1; see Termination Checking).

--overlapping-instances, --no-overlapping-instances
  New in version 2.6.0.
  Consider [do not consider] recursive instance arguments during pruning of instance candidates.
  Default: --no-overlapping-instances.

--qualified-instances, --no-qualified-instances
  New in version 2.6.2.
  Consider [do not consider] instances that are (only) in scope under a qualified name.
  Default: --qualified-instances.


## Other features

--double-check
  Enable double-checking of all terms using the internal typechecker. 
  Off by default.

--no-double-check
  New in version 2.6.2.
  Opposite of --double-check.
  On by default.

--guardedness
--no-guardedness
  New in version 2.6.0.
  Enable [disable] constructor-based guarded corecursion (see Coinduction).
  The option --guardedness is inconsistent with sized types, thus, it cannot be used with both --safe and --sized-types.
  Default: --no-guardedness (since 2.6.2).

--irrelevant-projections, --no-irrelevant-projections
  New in version 2.5.4.
  Enable [disable] projection of irrelevant record fields (see Irrelevance). The option --irrelevant-projections makes Agda inconsistent.
  Default (since version 2.6.1): --no-irrelevant-projections.

--auto-inline
  New in version 2.6.2.
  Turn on automatic compile-time inlining. See The INLINE and NOINLINE pragmas for more information.

--no-auto-inline
  New in version 2.5.4.
  Disable automatic compile-time inlining (default). Only definitions marked INLINE will be inlined. On by default.

--no-fast-reduce
  New in version 2.6.0.
  Disable reduction using the Agda Abstract Machine.

--call-by-name
  New in version 2.6.2.
  Disable call-by-need evaluation in the Agda Abstract Machine.

--no-forcing
  New in version 2.2.10.
  Disable the forcing optimisation. Since Agda 2.6.1 it is a pragma option.

--no-print-pattern-synonyms
  New in version 2.5.4.
  Always expand Pattern Synonyms during printing. With this option enabled you can use pattern synonyms freely, but Agda will not use any pattern synonyms when printing goal types or error messages, or when generating patterns for case splits.

--no-syntactic-equality
  New in version 2.6.0.
  Disable the syntactic equality shortcut in the conversion checker.

--syntactic-equality={N}
  New in version 2.6.3.
  Give the syntactic equality shortcut N units of fuel (N must be a natural number).
  If N is omitted, then the syntactic equality shortcut is enabled without any restrictions. (This is the default.)
  If N is given, then the syntactic equality shortcut is given N units of fuel. The exact meaning of this is implementation-dependent, but successful uses of the shortcut do not affect the amount of fuel.
  Note that this option is experimental and subject to change.

--safe
  New in version 2.3.0.
  Disable postulates, unsafe OPTIONS pragmas and primTrustMe. Prevents to have both --sized-types and --guardedness on. Further reading: Safe Agda.

--sized-types, --no-sized-types
  New in version 2.2.0.
  Enable [disable] sized types (see Sized Types).
  The option --sized-types is inconsistent with constructor-based guarded corecursion, thus, it cannot be used with both --safe and --guardedness.
  Default: --no-sized-types (since 2.6.2).

--type-in-type
  Enable typing rule `Set : Set`
  i.e. ignore universe levels, 
  (this makes Agda inconsistent; see type-in-type).

--omega-in-omega
  New in version 2.6.0.
  Enable typing rule `Setω : Setω`
  (this makes Agda inconsistent; see omega-in-omega).

--level-universe
  New in version 2.6.4.
  Makes `Level` live in its own universe `LevelUniv` and disallows having levels depend on terms that are not levels themselves. When this option is turned off, LevelUniv still exists, but reduces to Set (see level-universe).
  Note: While compatible with the --cubical option, this option is currently not compatible with cubical builtin files.

--universe-polymorphism
--no-universe-polymorphism
  New in version 2.3.0.
  Enable [disable] universe polymorphism (see Universe Levels).
  Default: --universe-polymorphism.

--cumulativity
--no-cumulativity
  New in version 2.6.1.
  Enable [disable] cumulative subtyping of universes, i.e. 
  if `A : Set i` then also `A : Set j` for all `j >= i`.
  Default: --no-cumulativity.

--no-import-sorts
  New in version 2.6.2.
  Disable the implicit statement:
  `open import Agda.Primitive using (Set; Prop)`
  at the start of each top-level Agda module.

--no-load-primitives
  New in version 2.6.3.
  Do not load the primitive modules (Agda.Primitive, Agda.Primitive.Cubical) when type-checking this program. This is useful if you want to declare Agda's very magical primitives in a Literate Agda file of your choice.
  If you are using this option, it is your responsibility to ensure that all of the BUILTIN things defined in those modules are loaded. Agda will not work otherwise.
  Incompatible with --safe.

--save-metas
--no-save-metas
  New in version 2.6.3.
  Save [or do not save] meta-variables in `.agdai` files. The alternative is to expand the meta-variables to their definitions. This option can affect performance. The default is to not save the meta-variables.


--erasure
  New in version 2.6.4.
  Allow use of the annotations _@0_ and _@erased_; 
  allow use of names defined in Cubical Agda in Erased Cubical Agda; 
  and mark parameters as erased in the type signatures of constructors and record fields (if --with-K is not active this is not done for indexed data types).

--erased-matches
  New in version 2.6.4.
  Allow matching in erased positions for single-constructor, non-indexed data/record types. (This kind of matching is always allowed for record types with η-equality.)
  This option is implied by --with-K (even implicit use of --with-K through the absence of options like --without-K).

--erase-record-parameters
  New in version 2.6.3.
  Mark parameters as erased in record module telescopes.
  This option may only be used if --erasure is used.


## Warnings

The `-W` or `--warning` option can be used to disable or enable different warnings.

The flag `-W error` or `--warning=error` can be used to turn all warnings into errors, while `-W noerror` turns this off again.

A group of warnings can be enabled by _-W {group}_, 
where _group_ is one of the following:
- all
  All of the existing warnings
- warn
  Default warning level
- ignore
  Ignore all warnings

The command `agda --help=warning` provides information about which warnings are turned on by default.

Individual warnings can be turned on and off by `-W {Name}` and `-W {noName}` respectively.

The flags, {Name}, available are:

AbsurdPatternRequiresNoRHS¶
RHS given despite an absurd pattern in the LHS.

CantGeneralizeOverSorts¶
Attempt to generalize over sort metas in 'variable' declaration.

CoInfectiveImport¶
Importing a file not using e.g. --safe from one which does.

CoverageIssue¶
Failed coverage checks.

CoverageNoExactSplit¶
Failed exact split checks.

DeprecationWarning¶
Feature deprecation.

EmptyAbstract¶
Empty abstract blocks.

EmptyInstance¶
Empty instance blocks.

EmptyMacro¶
Empty macro blocks.

EmptyMutual¶
Empty mutual blocks.

EmptyPostulate¶
Empty postulate blocks.

EmptyPrimitive¶
Empty primitive blocks.

EmptyPrivate¶
Empty private blocks.

EmptyRewritePragma¶
Empty REWRITE pragmas.

IllformedAsClause¶
Illformed as-clauses in import statements.

InfectiveImport¶
Importing a file using e.g. --cubical into one which doesn't.

InstanceNoOutputTypeName¶
Instance arguments whose type does not end in a named or variable type are never considered by instance search.

InstanceArgWithExplicitArg¶
Instance arguments with explicit arguments are never considered by instance search.

InstanceWithExplicitArg¶
Instance declarations with explicit arguments are never considered by instance search.

InvalidCatchallPragma¶
CATCHALL pragmas before a non-function clause.

InvalidNoPositivityCheckPragma¶
No positivity checking pragmas before non-data, record or mutual blocks.

InvalidTerminationCheckPragma¶
Termination checking pragmas before non-function or mutual blocks.

InversionDepthReached¶
Inversions of pattern-matching failed due to exhausted inversion depth.

LibUnknownField¶
Unknown field in library file.

MissingDefinitions¶
Names declared without an accompanying definition.

ModuleDoesntExport¶
Names mentioned in an import statement which are not exported by the module in question.

NotAllowedInMutual¶
Declarations not allowed in a mutual block.

NotStrictlyPositive¶
Failed strict positivity checks.

OldBuiltin¶
Deprecated BUILTIN pragmas.

OverlappingTokensWarning¶
Multi-line comments spanning one or more literate text blocks.

PolarityPragmasButNotPostulates¶
Polarity pragmas for non-postulates.

PragmaCompiled¶
COMPILE pragmas not allowed in safe mode.

PragmaCompileErased¶
COMPILE pragma targeting an erased symbol.

PragmaNoTerminationCheck¶
NO_TERMINATION_CHECK pragmas are deprecated.

RewriteMaybeNonConfluent¶
Failed confluence checks while computing overlap.

RewriteNonConfluent¶
Failed confluence checks while joining critical pairs.

SafeFlagNonTerminating¶
NON_TERMINATING pragmas with the safe flag.

SafeFlagNoPositivityCheck¶
NO_POSITIVITY_CHECK pragmas with the safe flag.

SafeFlagNoUniverseCheck¶
NO_UNIVERSE_CHECK pragmas with the safe flag.

SafeFlagPolarity¶
POLARITY pragmas with the safe flag.

SafeFlagPostulate¶
postulate blocks with the safe flag

SafeFlagPragma¶
Unsafe OPTIONS pragmas with the safe flag.

SafeFlagTerminating¶
TERMINATING pragmas with the safe flag.

SafeFlagWithoutKFlagPrimEraseEquality¶
primEraseEquality used with the safe and without-K flags.

ShadowingInTelescope¶
Repeated variable name in telescope.

TerminationIssue¶
Failed termination checks.

UnknownFixityInMixfixDecl¶
Mixfix names without an associated fixity declaration.

UnknownNamesInFixityDecl¶
Names not declared in the same scope as their syntax or fixity declaration.

UnknownNamesInPolarityPragmas¶
Names not declared in the same scope as their polarity pragmas.

UnreachableClauses¶
Unreachable function clauses.

UnsolvedConstraints¶
Unsolved constraints.

UnsolvedInteractionMetas¶
Unsolved interaction meta variables.

UnsolvedMetaVariables¶
Unsolved meta variables.

UselessAbstract¶
abstract blocks where they have no effect.

UselessInline¶
INLINE pragmas where they have no effect.

UselessInstance¶
instance blocks where they have no effect.

UselessPrivate¶
private blocks where they have no effect.

UselessPublic¶
public blocks where they have no effect.

WithoutKFlagPrimEraseEquality¶
primEraseEquality used with the without-K flags.

WrongInstanceDeclaration¶
Terms marked as eligible for instance search should end with a name.


## Examples

Run Agda with all warnings enabled, except for warnings about empty abstract blocks:

  `agda -W all --warning=noEmptyAbstract file.agda`


Run Agda on a file which uses the standard library. Note that you must have already created a libraries file as described in Library Management:

  `agda -l standard-library -i. file.agda`

or, if you have added stdlib to your defaults file, simply run: 
  `agda file.agda`
