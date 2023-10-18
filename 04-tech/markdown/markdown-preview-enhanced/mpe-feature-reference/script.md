# Code Chunk

https://shd101wyy.github.io/markdown-preview-enhanced/#/code-chunk

Script execution is off by default and needs to be explicitly enabled in VSCode extension preferences, search for `enableScriptExecution`.

Markdown Preview Enhanced allows you to render code output into documents.

```bash {cmd=true}
wsl --exec -- wslpath -m .
```

`T:codegit-debriefdebrief.metarefmarkdown-preview-enhanced`

`T:\code\git-debrief\debrief.meta\ref\markdown-preview-enhanced`


```cmd {cmd=true}
cmd dir
```


```javascript {cmd="node"}
const date = Date.now()
console.log(date.toString())
```

```bash {cmd="bash"}
echo 'dir listing'
ls ./
```




```
You can configure code chunk options in 
format of ` ` ` lang {cmd=your_cmd opt1=value1 opt2=value2 ...}

When a value of an attribute is true, it can be omitted 
(e.g. {cmd hide} is identical to {cmd=true hide=true}).

lang
  The grammar that the code block should highlight. 
  It should be put at the most front.

cmd
  The command to run. If cmd is not provided,
  then lang will be regarded as command.

* Defines how to render code output.
output (html, markdown, text, png, none)
  html
    will append output as html.
  markdown
    will parse output as markdown.
    (MathJax and graphs will not be supported in this case, but KaTeX works)
  text
    will append output to a pre block.
  png
    will append output as base64 image.
  none
    will hide the output.
stdin
  If stdin is set to true, then the code will be 
  passed as stdin instead of as file.

modify_source (boolean)
  Insert code chunk output directly into markdown source file.
  Default false.

run_on_save (boolean)
  Run code chunk when the markdown file is saved.
  Default false.


hide
  hide will hide code chunk but only leave the output visible.
  default: false
  e.g. hide=true

args
  args that append to command.
  cmd=true args=["-v"]
  cmd=true args=["-i", "$input_file", "-f", "svg"] output="html"
```
