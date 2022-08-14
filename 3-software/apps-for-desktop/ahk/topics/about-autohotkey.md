# About AutoHotKey

AutoHotkey (ahk) is a scripting language for automating various aspects of the Windows OS via hotkeys. It provides interactions which include manipulation of programs, tasks, clipboard contents, registry, file system, etc., using user-created hotkeys and "hotstrings". It makes advanced features of the Windows API accessible in a friendlier manner. The AHK's central selling point is that it allows Windows users to customize their environment and automate common tasks.

AutoHotkey is an interpreted scripting language, but compilation of scripts into executable (.exe) files is also available.

AutoHotkey cannot be used as a shell extension or be injected into another process, as it can't be compiled to a `dll` [source?]. The compiler only compiles into *.exe files, and it doesn't compile the AutoHotkey's source code itself into a binary [confirm]. Both issues are (partially) solved later by the `IronAHK` version.

You can use AutoHotkey for game scripts, for quick macros, for tasks automation, for system modification, for automating programs via the API or by interacting with their window. You can also write programs; for example, large parts of the officail AutoHotkey's editor, `Scite4AutoHotkey`, are written in AutoHotkey.

## Versions

The "official" version is still v.1 branch, latest verson is `1.1.33.10` released on 2021-12-15.

The work on v2 is still ongoing, with the latest beta `2.0 beta 3` released on 2021-10-23.

Also, AutoHotkey has many forks, few of which are very popular, and some of which have been merged back into the main dev repo.
