# Markdown Preview Enhanced

# Extension info

- extension-domain:     markdown markup
- extension-name:       Markdown Preview Enhanced
- extension-id:         shd101wyy.markdown-preview-enhanced
- extension-desc:       Markdown Preview Enhanced ported to vscode
- extension-publisher:  Yiyi Wang
- extension-version:    0.6.2

# Extension description

Markdown Preview Enhanced (MPE) extension provides many extra functionality
- math typesetting
- rendition of many types of diagrams
  - GraphViz dot
  - Mermaid
  - PlantUML
- code chunk import and execution
- presentation writer (reveal.js)
- pandoc integration
- PDF export
- mume (?)

Inspired by [Markdown Preview Plus](https://github.com/atom-community/markdown-preview-plus) and [RStudio Markdown](http://rmarkdown.rstudio.com/).


## Links ⬇⬇⬇

MPE manual
https://shd101wyy.github.io/markdown-preview-enhanced/#/

MPE repo
https://github.com/shd101wyy/vscode-markdown-preview-enhanced

MPE changelog
https://github.com/shd101wyy/vscode-markdown-preview-enhanced/releases

MPE at VS Marketplace 
https://marketplace.visualstudio.com/items?itemName=shd101wyy.markdown-preview-enhanced


## MPE custom settings

```jsonc
{
    /* markdown-preview-enhanced */
    "markdown-preview-enhanced.previewTheme":   "atom-dark.css",
    "markdown-preview-enhanced.codeBlockTheme": "atom-dark.css",
    "markdown-preview-enhanced.mermaidTheme":   "dark",
    "markdown-preview-enhanced.revealjsTheme":  "night.css",
    "markdown-preview-enhanced.frontMatterRenderingOption": "table",
    "markdown-preview-enhanced.hideDefaultVSCodeMarkdownPreviewButtons": false,
    "markdown-preview-enhanced.HTML5EmbedUseImageSyntax": false,
    "markdown-preview-enhanced.breakOnSingleNewLine": false,
    "markdown-preview-github-styles.colorTheme": "dark",
    "markdown-preview-enhanced.previewTheme": "github-dark.css",
    "markdown-preview-enhanced.frontMatterRenderingOption": "table",
    "markdown-preview-enhanced.automaticallyShowPreviewOfMarkdownBeingEdited": false,
    "markdown-preview-enhanced.breakOnSingleNewLine": false,
    "markdown-preview-enhanced.enableEmojiSyntax": false,
    "markdown-preview-enhanced.mathRenderingOption": "MathJax",
    "markdown-preview-enhanced.mathBlockDelimiters": [
        [
            "$$$",
            "$$$"
        ],
        [
            "\\[",
            "\\]"
        ]
    ],
    "markdown-preview-enhanced.mathInlineDelimiters": [
        [
            "$$",
            "$$"
        ],
        [
            "\\(",
            "\\)"
        ]
    ],
}
```
