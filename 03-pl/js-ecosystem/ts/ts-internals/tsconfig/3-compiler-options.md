## TS :: Ref :: TSConfig :: compilerOptions

`compilerOptions` make up the bulk of TS configuration and cover how the language should work.

* **Compiler options groups** (2023-07-30)
  - [Type Checking](./31-type-checking.md)
  - [Modules](./32-modules.md)
  - [Emit](./33-emit.md)
  - [Language and Environment](./34-lang-and-env.md)
  - Backwards Compatibility
  - Compiler Diagnostics
  - Projects
  - Interop Constraints
  - JavaScript Support
  - Output Formatting
  - Editor Support
  - Completeness
  - Watch Options
  - Command Line


compilerOptions           (108)
* Emit                     (23)
  - declaration
  - declarationDir
  - declarationMap
  - downlevelIteration
  - emitBOM
  - emitDeclarationOnly
  - importHelpers
  - importsNotUsedAsValues
  - inlineSourceMap
  - inlineSources
  - mapRoot
  - newLine
  - noEmit
  - noEmitHelpers
  - noEmitOnError
  - outDir
  - outFile
  - preserveConstEnums
  - preserveValueImports
  - removeComments
  - sourceMap
  - sourceRoot
  - stripInternal
* Type Checking            (19)
  - allowUnreachableCode
  - allowUnusedLabels
  - alwaysStrict
  - exactOptionalPropertyTypes
  - noFallthroughCasesInSwitch
  - noImplicitAny
  - noImplicitOverride
  - noImplicitReturns
  - noImplicitThis
  - noPropertyAccessFromIndexSignature
  - noUncheckedIndexedAccess
  - noUnusedLocals
  - noUnusedParameters
  - strict
  - strictBindCallApply
  - strictFunctionTypes
  - strictNullChecks
  - strictPropertyInitialization
  - useUnknownInCatchVariables
* Modules                  (17)
  - allowArbitraryExtensions
  - allowImportingTsExtensions
  - allowUmdGlobalAccess
  - baseUrl
  - customConditions
  - module
  - moduleResolution
  - moduleSuffixes
  - noResolve
  - paths
  - resolveJsonModule
  - resolvePackageJsonExports
  - resolvePackageJsonImports
  - rootDir
  - rootDirs
  - typeRoots
  - types
* Language and Environment (12)
  - emitDecoratorMetadata
  - experimentalDecorators
  - jsx
  - jsxFactory
  - jsxFragmentFactory
  - jsxImportSource
  - lib
  - moduleDetection
  - noLib
  - reactNamespace
  - target
  - useDefineForClassFields
* Backwards Compatibility   (7)
  - charset
  - keyofStringsOnly
  - noImplicitUseStrict
  - noStrictGenericChecks
  - out
  - suppressExcessPropertyErrors
  - suppressImplicitAnyIndexErrors
* Compiler Diagnostics      (7)
  - diagnostics
  - explainFiles
  - extendedDiagnostics
  - generateCpuProfile
  - listEmittedFiles
  - listFiles
  - traceResolution
* Projects                  (6)
  - composite
  - disableReferencedProjectLoad
  - disableSolutionSearching
  - disableSourceOfProjectReferenceRedirect
  - incremental
  - tsBuildInfoFile
* Interop Constraints       (6)
  - allowSyntheticDefaultImports
  - esModuleInterop
  - forceConsistentCasingInFileNames
  - isolatedModules
  - preserveSymlinks
  - verbatimModuleSyntax
* JavaScript Support        (3)
  - allowJs
  - checkJs
  - maxNodeModuleJsDepth
* Output Formatting         (3)
  - noErrorTruncation
  - preserveWatchOutput
  - pretty
* Editor Support            (2)
  - disableSizeLimit
  - plugins
* Completeness              (2)
  - skipDefaultLibCheck
  - skipLibCheck
* Watch Options             (1)
  - assumeChangesOnlyAffectDirectDependencies
* Command Line              (0)
