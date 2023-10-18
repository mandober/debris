# git config types

`git help --config`

* The `--type=<type>` option instructs git config to ensure that incoming and outgoing values can be canonized under the given <type>. 
* If no `--type=<type>` is given, no canonization will be performed.
* Callers may unset an existing `--type` specifier with `--no-type`.

**When reading**  the values are read from
- system, global and repository local configuration files by default
- these options are used to tell the command to read from only that location:
  - `--system`
  - `--global`
  - `--local`
  - `--worktree`
  - `--file <filename>`

**When writing** the new value is written to
- the repository local configuration file by default
- these options are used to tell the command to write to only that location:
  - `--system`
  - `--global`
  - `--worktree`
  - `--file <filename>`
  - `--local` (you can specify `--local` but it is the default)
