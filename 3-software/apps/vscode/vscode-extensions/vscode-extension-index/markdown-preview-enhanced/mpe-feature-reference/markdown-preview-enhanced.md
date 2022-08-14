# Markdown Preview Enhanced 

https://shd101wyy.github.io/markdown-preview-enhanced/
https://github.com/shd101wyy/markdown-preview-enhanced

https://github.com/shd101wyy/mume


https://shd101wyy.github.io/markdown-preview-enhanced/#/
https://github.com/0xGG/crossnote
https://www.mediawiki.org/wiki/Transclusion
https://github.com/stathissideris/ditaa
https://vega.github.io/vega/
https://vega.github.io/vega-lite/
https://rmarkdown.rstudio.com/
https://bookdown.org/yihui/rmarkdown/installation.html
https://en.wikipedia.org/wiki/DOT_(graph_description_language)


https://github.com/shd101wyy/markdown-preview-enhanced/issues/606
https://github.com/shd101wyy/mume/blob/master/CHANGELOG.md
https://github.com/shd101wyy/vscode-markdown-preview-enhanced/releases

https://docs.github.com/en/communities/documenting-your-project-with-wikis/editing-wiki-content

https://www.mediawiki.org/wiki/Transclusion

https://shd101wyy.github.io/markdown-preview-enhanced/#/newest
https://shd101wyy.github.io/markdown-preview-enhanced/#/history

https://shd101wyy.github.io/markdown-preview-enhanced/#/math
https://shd101wyy.github.io/markdown-preview-enhanced/#/diagrams?id=mermaid
https://shd101wyy.github.io/markdown-preview-enhanced/#/diagrams?id=plantuml
https://shd101wyy.github.io/markdown-preview-enhanced/#/pandoc
https://shd101wyy.github.io/markdown-preview-enhanced/#/code-chunk

https://rawgit.com/shd101wyy/markdown-preview-enhanced/master/docs/presentation-intro.html

https://github.com/atom-community/markdown-preview-plus

http://rmarkdown.rstudio.com/




<!-- @import "[TOC]" {cmd="toc" depthFrom=1 depthTo=6 orderedList=false} -->

<!-- code_chunk_output -->

- [Markdown Preview Enhanced](#markdown-preview-enhanced)
  - [Keybindings](#keybindings)
  - [Table of Contents](#table-of-contents)
  - [Configuration](#configuration)
  - [TOC and Sidebar TOC Configuration](#toc-and-sidebar-toc-configuration)

<!-- /code_chunk_output -->





## Keybindings


[[toc]]

* ^↑m   Toggle preview
* ^↑s   Sync preview / Sync source
* ↑RET  Run Code Chunk
* ^↑RET Run all Code Chunks
* ^=    Preview zoom in
* ^-    Preview zoom out
* ^0    Preview reset zoom
* esc   Toggle sidebar TOC
* ^↑=   Preview zoom in
* ^↑_   Preview zoom out



## Table of Contents

Markdown Preview Enhanced can create TOC for your markdown file.

cmd-shift-p then choose Markdown Preview Enhanced:
`Create Toc` to create TOC.
That will insert:

`<!-- @import "[TOC]" {cmd="toc" depthFrom=1 depthTo=6 orderedList=false} -->`

- Multiple TOCs can be created.
- To exclude a heading from the TOC, append `{ignore=true}` after your heading.
- The TOC will be updated when you save the markdown file. 
- You need to keep the preview open to get TOC updated.

## Configuration

- `orderedList` Use orderedList or not
- `depthFrom` [1-6] inclusive
- `depthTo` [1-6] inclusive
- `ignoreLink` If set to true, then TOC entry will not be hyperlinks

You can also create TOC by inserting `[TOC]` to your markdown file.

```
[TOC]

# Heading 1

## Heading 2 {ignore=true}

Heading 2 will be ignored from TOC.
```

However, this way will only display TOC in preview, while leaving editor content unchanged.


## TOC and Sidebar TOC Configuration

You can configure `[TOC]` and sidebar TOC by writting front-matter:

```yaml
---
toc:
  depth_from: 1
  depth_to: 6
  ordered: false
---
```
