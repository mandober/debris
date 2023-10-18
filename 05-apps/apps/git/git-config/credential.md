# git :: config :: credential

credential.helper

- *external helper* called when a username or password is needed.
- the helper may consult external storage to avoid prompting for creds
- value:
  - normally, the name of a credential helper with possible args
  - may also be an absolute path with args
  - may also be a shell command when preceded by `!`
- multiple helpers may be defined
- See gitcredentials[^gitcredentials] for details and examples




[^gitcredentials]: https://git-scm.com/docs/gitcredentials
