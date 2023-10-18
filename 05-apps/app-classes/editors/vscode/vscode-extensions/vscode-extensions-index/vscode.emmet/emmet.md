# Emmet

ext id: `vscode.emmet`
home: https://docs.emmet.io/

## Customization
https://docs.emmet.io/customization/

Emmet offers wide range of tweaks you can use to fine-tune your plugin experience. Almost all officially developed editor plugins have extensions support: a special folder where you can put .json and .js files to extend Emmet. Refer to README file bundled with your editor's plugin to find out where Emmet looks for extensions.

Emmet builtin ext to vscode:
  `C:\Users\ivan\AppData\Local\Programs\vscode\resources\app\extensions\emmet`

Each .js file located in extensions folder will be loaded and executed on plugin start-up.

Use .js files to create your own filters or actions: you can use Emmet modules and bindings to script your editor with JavaScript.

With .json files you can fine-tune different parts of Emmet toolkit:

Add your own or update existing snippets:
`snippets.json`

Change behavior of some Emmet filters and actions:
`preferences.json`

Define how generated HTML/XML should look:
`syntaxProfiles.json`

## Abbreviations
https://docs.emmet.io/abbreviations/

Abbreviations are the heart of the Emmet toolkit: these special expressions are parsed in runtime and transformed into structured code block, HTML for example. The abbreviation’s syntax looks like CSS selectors with a few extensions specific to code generation. So every web-developer already knows how to use it.


