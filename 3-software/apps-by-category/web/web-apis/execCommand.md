# JS and Web API

Most, if not all, Web APIs can be controlled with JS. Here's a list of interesting, and less so, things I've stumbled upon.

## execCommand

https://developer.mozilla.org/en-US/docs/Web/API/Document/execCommand

Is an obsolete feature that still (mostly) works.

When an HTML document has been switched to `designMode`, its `document` object exposes `execCommand` method to run commands that manipulate the *current editable region*, such as form inputs or *contentEditable* elements.

Most commands affect the document's *selection* (bold, italics, etc.), while others insert new elements (adding a link), or affect lines (indenting).

When using `contentEditable`, `execCommand()` affects the currently active editable element.


> document.execCommand(aCommandName, aShowDefaultUI, aValueArgument)

Returns a Boolean that is false if the command is unsupported or disabled.

Parameters:

`aCommandName`
a *DOMString* specifying the name of the command to execute.
See Commands for a list of possible commands:
https://developer.mozilla.org/en-US/docs/Web/API/Document/execCommand#Commands

`aShowDefaultUI`
A Boolean indicating whether the default user interface should be shown.
(not implemented in Mozilla)

`aValueArgument`
a *DOMString* specifying the arg for commands that require it.
For example, `insertImage` requires the URL of the image to insert.
Specify `null` if no argument is needed.


```js
// switch page to design mode (everything becames editable)
document.designMode = "on"

// then exec a fn
document.execCommand('selectAll')

// [aCommandName] and its arg, [aValueArgument]
document.execCommand('backColor', 'darkgrey')

// oneliner:
(document.designMode = "on", document.execCommand('selectAll'))
```
