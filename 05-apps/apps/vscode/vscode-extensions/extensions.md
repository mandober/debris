# Extensions

A single instance of VS Code's installation with a centralized folder in which all the user-installed extensions are dumped (polluted by keeping all the previous versions of different extensions) plus the fact that all the settings (builtin and from extensions) are cramped into a single file, makes code a dull toy. It needs more granular support for controlling per-project (per workspace) sets of enabled extensions and their settings.

As it is now, each user-installed extension may be enabled or disabled either completely or only for the current workspace.

Managing extensions manually, by clicking around in the *extensions view*, going through the same scheme of motions recursively for each extension is the currently recommended "best practice". With a punchline:

(Dec 5, 2017) The [resulting] list of disabled/enabled extensions [produced by the intense labor] is not stored [in any resonable manner] but instead stored [burried and forever lost] in local storage cache folder.


Extensions are installed in:
- Windows: `%USERPROFILE%\.vscode\extensions`
- Linux:   `~/.vscode/extensions`

Change the location by launching VS Code with the `--extensions-dir <dir>` cmdline option.


https://www.jetbrains.com/remote-development/
https://github.com/microsoft/vscode/issues/54823
https://code.visualstudio.com/api/references/activation-events
https://stackoverflow.com/questions/44797445/vs-code-disable-certain-extensions
https://lifesaver.codes/answer/ability-to-enable-extensions-only-on-specific-workspaces-15611
https://code.visualstudio.com/docs/editor/workspaces
https://code.visualstudio.com/docs/editor/extension-marketplace#_extensions-view-filters
https://code.visualstudio.com/docs/editor/command-line#_working-with-extensions
https://code.visualstudio.com/docs/editor/portable
