# Markdown :: Reference :: Linking

## Normal links

A link consists of
- anchor text in brackets
- URL in parenthesis (immediately following the bracketted anchoring text)
- optional hover-on text, in quotes, after the URL separated from it by space. 
  If no hover text, the URL is shown instead.

* Form of the normal link:

```
[anchor](url 'optional hover text')
```

* Example of a normal (full) link:

[Disjoint sets](https://en.wikipedia.org/wiki/Disjoint_sets 'Wikipedia article on disjoint sets')

## Autolink

A bare URL is turned into a link by repeating the URL as the anchor text:

* For example:

Further info about https://en.wikipedia.org/wiki/Colimit in category theory.

[1]: https://en.wikipedia.org/wiki/Universal_property

## Reference links

Ref-links are links with an identifier in brackets, e.g. `[id]`, followed by a colon, a space, and the URL. The list of such ref-links is usually collected at the end of a document, although it could appear anywhere; links could be spread out across the doc.

```
[1]: https://en.wikipedia.org/wiki/Limit_(category_theory)
[ab3]: https://en.wikipedia.org/wiki/Colimit
```

To refer to one of the ref-links, first, bracket the anchored text and immediately follow it with the [bracketted][1] identifier.

In case of conflicting identifiers, the one appearing first wins.

[0]: https://www.markdownguide.org/
[1]: https://en.wikipedia.org/wiki/Limit_(category_theory)
[2]: https://en.wikipedia.org/wiki/Colimit







## Footnote links

Footnote links only work withing a single document.

An identifier is placed in brackets and it is preceded by a caret sign.


Here's a sentence[^1] with a footnote.
Here's a sentence[^¹] with a footnote.






[^1]: This is the footnote. These footnote targets can be placed anywhere.
[^¹]: But they will be logically placed at the bottom of the page, after a hrule.



https://www.markdownguide.org/getting-started/#additional-resources
https://wordpress.com/support/wordpress-editor/blocks/markdown-block/
https://commonmark.org/help/
https://spec.commonmark.org/
https://wordpress.com/home/mandober.wordpress.com
https://daringfireball.net/projects/markdown/
https://github.com/mundimark/awesome-markdown
https://dave.autonoma.ca/blog/2019/05/22/typesetting-markdown-part-1/
