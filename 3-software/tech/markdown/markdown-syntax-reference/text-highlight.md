# Highlighting text

This isn't common, but some Markdown processors allow you to highlight text by enclosing it with two equal signs.

The default highlight color is butt-ugly orrible yellow, so I've changed it globally by editing the recommended file: 
`$HOME/.mume/style.less`


I need to highlight these ==very important words==.
The rendered output looks like this:

### The <kbd>mark</kbd> HTML tag

Alternatively, if your Markdown app supports HTML, you can use the `mark` HTML tag.

The style for mark tag is set globally in the file: <mark>%HOME%\.mume\style.less</mark>

Override `mark` tag style: <mark style="color: cornflowerblue; background: none;">locally, in this file</mark>.

Combination of local and global
<span style="color: cornflowerblue;">my ==style== related</span>
