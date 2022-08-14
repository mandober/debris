# git config

## https://git-scm.com/docs/git-config.html
https://git-scm.com/docs/git-config/2.37.0

`git config --global --list`

```conf
color.ui=true
color.diff=auto
color.status=auto
color.branch=auto
color.interactive=true

core.eol=lf
core.autocrlf=false
core.safecrlf=false

core.editor=vim
core.excludesfile=~/.config/git/ignore_global
core.filemode=true
core.longpaths=true
core.symlinks=true
core.fscache=true
core.whitespace=blank-at-eol,-blank-at-eof,space-before-tab,tabwidth=2

help.autocorrect=1
help.format=html

; credential.helper manager-core
; credential.helper=store --file ~/.config/git/credentials
url.https://mandober@github.com.insteadof=https://github.com
credential.helperselector.selected=store

filter.lfs.required=true
filter.lfs.process=git-lfs filter-process
filter.lfs.clean=git-lfs clean -- %f
filter.lfs.smudge=git-lfs smudge -- %f

diff.astextplain.textconv=astextplain

rebase.autosquash=true

init.defaultbranch=master

safe.directory=T:/lib/scoop/user/apps/scoop/current
safe.directory=T:/lib/scoop/user/buckets/main
safe.directory=T:/lib/scoop/user/buckets/extras
```
