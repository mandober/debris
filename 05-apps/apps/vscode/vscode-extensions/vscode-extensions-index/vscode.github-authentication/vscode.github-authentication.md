GitHub Authentication

name:     GitHub Authentication
id:       vscode.github-authentication
version:  0.0.2
origin:   builtin (bundled)
actions:  can be disabled but not uninstalled
desc:     GitHub Authentication Provider
type:     auth (admin, meta, structural)
state:    enabled globally
scope:    global (local + wsl + etc.)

GitHub Authentication for Visual Studio Code

Notice
  This extension is bundled with Visual Studio Code. It can be disabled but not uninstalled.

Features
  This extension provides support for authenticating to GitHub. It registers the `github` Authentication Provider that can be leveraged by other extensions. This also provides the GitHub authentication used by *Settings Sync*.
  

Authentication Providers:
- github (via vscode.github-authentication)
- microsoft (via vscode.microsoft-authentication)
