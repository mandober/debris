# Admonitions

https://squidfunk.github.io/mkdocs-material/reference/admonitions/#customization

Admonitions follow a simple syntax: a block starts with `!!!`, followed by a single keyword used as a type qualifier. The content of the block follows on the next line, indented by 4 spaces. By default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

* Type qualifiers:
- info
- success
- warning
- danger
- failure
- bug
- tip
- note
- quote
- abstract
- question
- example


!!! info
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.

!!! success
    tortor non consequat finibus, justo purus auctor.

!!! warning
    Curabitur feugiat, tortor non consequat finibus, justo purus auctor.

!!! failure
    tortor non consequat finibus, justo purus auctor.

!!! danger
    tortor non consequat finibus, justo purus auctor.

!!! bug
    Nulla et euismod nulla.



!!! quote
    details non consequat finibus, justo purus auctor.

!!! tip
    Nulla et euismod nulla.

!!! note
    Admonitions follow a simple syntax: a block starts with `!!!`, followed by a single keyword used as a type qualifier.

!!! abstract
    The content of the block follows on the next line, indented by 4 spaces.

!!! question
    Nulla et euismod nulla.

!!! example
    Curabitur feugiat, tortor non consequat finibus, justo purus auctor.


## Changing the title

!!! tip __The title__
    By default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

!!! info ""
    Similar to changing the title, the icon and **title can be omitted** entirely by adding an *empty string* directly after the type qualifier. Note that this will not work for collapsible blocks.

!!! danger Collapsible Block (**does not work**)
    When *Details* is enabled and an admonition block is started with `???` instead of `!!!`, the admonition is rendered as a collapsible block with a small toggle on the right side.

!!! example Can be done manually
    <details><summary>Collapsable</summary>

    By default, the titleBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

    > will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

    By default, the titBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.
    le will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.
    </details>

    When *Details* is enabled and an admonition block is started with. When *Details* is enabled and an admonition block is started with.


By default, tit can be changed by adding a containing valid Markdown after the type qualifier. By default, the titBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

he titBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier. it can be changed by adding a containing valid Markdown after the type qualifier. By default, the titBy default, the title will equal the type qualifier in titlecit can be changed by adding a containing valid Markdown after the type qualifier. By default, th

e titBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.

ase. However, it can be changed by adding a containing valid Markdown after the type qualifier.


!!! see see also
    Lorem ipsum dolor sit amet, consectetur
    adipiscing elit. Nulla et euismod nulla.
    Curabitur feugiat, tortor non consequat
    finibus, justo purus auctor massa, nec
    semper lorem quam in massa.

it can be changed by adding a containing valid Markdown after the type qualifier. By default, the titBy default, the title will equal the type qualifier in titlecase. However, it can be changed by adding a containing valid Markdown after the type qualifier.
