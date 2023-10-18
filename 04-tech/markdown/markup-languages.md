# Markdown ecosystem

As a text format, Markdown is a markup (programming) language, i.e. a presentation-only language, without any logic, similar to HTML.

Similar formats
- bbcode
- restructured text

Related formats
- haml
- pug

Markup languages are created to satisfy the need for easily authoring prose that may be later published. Publishing a piece of text usually means posting it on a site, which means the text must be formatted as a HTML document with all the redundant (for a prose writer) but necessary preambles and markup.

It is understood that a prose writer should be able to elide all the technical nonsense and just write the bare text, without worrying about the HTML versions (although today HTML 5 seems to be the one) and doc validity. However, there's still a need to use some formatting on the text, but since these are modest requirements (discerning different headings, word decoration like bold and emphasis, delineating the paragraphs, etc.), it should be possible to satisfy these rudimentary requirements without forcing an overkill of the full-blown HTML (text structuring) and its faithful stylist CSS (candy and presentation).

On the one hand, there is a need for an onobtrusive text markup language, that would serve the needs of writers who just want to get some prose on the page, while eliding as much as possible of the accompanying technical ceremony. (rst, md).

On the other hand, there is a need for a structured document format that is easier to author than HTML. After all, HTML is based in XML, which is infamous for its verbosity, and even though it was once the ruling format of the interchange, it is now, de facto, replaced with a significantly slimmer, although still somewhat noisy, JSON document format. (pug, haml).

On the information interchange plane, there are requirements for a light, server-to-server, intechange format, preferably textual but possibly binary (json, xml, protobuf).

And then there are concerns of the admins for the format in which to palce settings and various configuration options; perhaps, even a universal, more efficient, textual format for maintaining system and application's logs. (json, yaml, ini).
