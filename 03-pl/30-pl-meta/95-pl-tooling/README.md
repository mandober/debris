# PL :: Tooling

This section collects notes and reference regarding concrete programming languages, and this subsection is about the accompanying tooling from a general perspective (as opposed to a description of actual tooling software products).

Tooling
- tooling manager ("up" cli, e.g. ghcup, rustup, etc.)
  - to download, compile, install the lang compiler and major tooling utils
  - to maintain different versions of the lang compiler
  - possibly sandboxing, virtual environments, etc.
  - maintain index of available software (of community repository)
- package manager
  - to download and install 3rd party libs in own local project
  - to download and install 3rd party CLIs system-wide
  - to make your own project lib available to your other projects
  - to resolve dependencies (!)
- build tool
  - bulid the project
  - resolve dependencies
  - get 3rd party libs
  - treeshaking of the AST
  - hot-reloading
- software repository
  - source where the package manager downloads software from
    or where you upload your finished packages to
  - community repository
  - curated repository
- project manager
  - starting a new local project
  - local project: lib vs exe
  - project starter templates
  - custom project commands
- language server
  - integration with editors
  - completion, jump to whatever, collect references
  - refactoring, quick fix, conversions (e.g. convert arrow to named function)
  - code snippets (editor's responsibility)
  - project-related commands (e.g. run linter on save)
- language tools
  - language syntax highlighting
    - token highlighting (basic highlighting)
    - semantic highlighting (tree-sitter)
  - desugaring tools, inspect assembly, ...
  - linters
  - formatters
  - refactoring tools
  - test tools (test harness, tests generator, extracting properties, run tests)
