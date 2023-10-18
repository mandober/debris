# markdown-preview-enhanced

## File include with gitbook v.1


git book file include:
`{% include "./syntax/attributes.md" %}`

git book file include 2:
`{% include "git+https://github.com/GitbookIO/documentation.git/README.md#0.0.1" %}`


markdown-preview-enhanced: import file
`@import "value.md"`

markdown-preview-enhanced: import file: HTML comment:
`<!-- @import "mutability.md" -->`

### Supported file types

- jpeg(jpg), gif, png, apng, svg, bmp files will be treated as markdown image
- csv file will be converted to markdown table
- mermaid file will be rendered by mermaid.
- .dot file will be rendered by viz.js (graphviz).
- .plantuml (.puml) file will be rendered by PlantUML.
- html file will be embeded directly.
- js file will be included as `<script src="your_js"></script>`.
- less and css file will be included as style. Only local less file is currently supported. .css file will be included as `<link rel="stylesheet" href="your_css">`
- pdf file will be converted to svg files by pdf2svg and then be included
- markdown file will be parsed and embeded directly
- All other files will be rendered as code block


### Configure images

`@import "test.png" {width="300px" height="200px" title="my title" alt="my alt"}`

### Import online files

`@import "https://github.com/shdy/marknced/LE.md"`


### Import PDF file
To import PDF file, you need to have pdf2svg installed.

Markdown Preview Enhanced supports importing both local and online PDF files.
However, it is not recommended to import large PDF files.

`@import "test.pdf"`


## PDF configuration

`page_no`
Display the nth page of PDF. 1-based indexing. 
For example {page_no=1} will display the 1st page of pdf.

`page_begin`, `page_end`
Inclusive. For example `{page_begin=2 page_end=4}` will 
display the number 2, 3, 4 pages.


## Force to render as Code Block

`@import "test.puml" {code_block=true class="line-numbers"}`
`@import "test.py" {class="line-numbers"}`


### As Code Block

`@import "test.json" {as="vega-lite"}`


### Import file as Code Chunk

`@import "test.py" {cmd="python3"}`



Term 1
  ~ Definition 1

Term 2
  ~ Definition 2a
  ~ Definition 2b

==Marked==



<details><summary>Example</summary>

```rust
impl<'a> Driver<'a> {
    fn new(n: &str) -> Self {
        Driver {
            name: n.to_string(),
            car: None,
        }
    }

    fn buy(&mut self, c: &'a Car) {
        self.car = Some(c);
    }

    fn swap(&mut self, with: &mut Driver<'a>) {
        if let (Some(sc), Some(wc)) = (self.car, with.car) {
            self.car = Some(wc);
            with.car = Some(sc);
        }
    }

}
```
</details>

variable-length arrays (VLA)

::::: container
:::: row
::: col-xs-6 alert alert-success
success text
:::
::: col-xs-6 alert alert-warning
warning text
:::
::::
:::::



! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris feugiat quam erat, ut iaculis diam posuere nec.
! Vestibulum eu condimentum urna. Vestibulum feugiat odio ut sodales porta. Donec sit amet ante mi. Donec lobortis
! orci dolor. Donec tristique volutpat ultricies. Nullam tempus, enim sit amet fringilla facilisis, ipsum ex
! tincidunt ipsum, vel placerat sem sem vitae risus. Aenean posuere sed purus nec pretium.


!! Lorem ipsum dolor sit amet, **consectetur adipiscing** elit. Mauris feugiat quam erat, ut iaculis diam posuere nec.
!!
!! * List item a
!! * List item b
!!
!! orci dolor. Donec tristique volutpat ultricies. Nullam tempus, enim sit amet fringilla facilisis, ipsum ex
!! tincidunt ipsum, vel placerat sem sem vitae risus. Aenean posuere sed purus nec pretium.
