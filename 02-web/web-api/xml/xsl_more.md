# XSL

XSL is a language for expressing style sheets. An XSL style sheet is, like with CSS, a file that describes how to display an XML document of a given type. XSL shares the functionality and is compatible with CSS2 (although it uses a different syntax). It also adds:

A transformation language for XML documents: XSLT. Originally intended to perform complex styling operations, like the generation of tables of contents and indexes, it is now used as a general purpose XML processing language. XSLT is thus widely used for purposes other than XSL, like generating HTML web pages from XML data.
Advanced styling features, expressed by an XML document type which defines a set of elements called Formatting Objects, and attributes (in part borrowed from CSS2 properties and adding more complex ones.

Styling requires a source XML documents, containing the information that the style sheet will display and the style sheet itself which describes how to display a document of a given type.

The following shows a sample XML file and how it can be transformed and rendered.

The XML file:

```xml
<scene>
  <FX>General Road Building noises.</FX>
  <speech speaker="Prosser">
    Come off it Mr Dent, you can't win
    you know. There's no point in lying
    down in the path of progress.
  </speech>
  <speech speaker="Arthur">
    I've gone off the idea of progress.
    It's overrated
  </speech>
</scene>
```

This XML file doesn't contain any presentation information, which is contained in the stylesheet. Separating the document's content and the document's styling information allows displaying the same document on different media (like screen, paper, cell phone), and it also enables users to view the document according to their preferences and abilities, just by modifying the style sheet.

The Stylesheet
Here are two templates from the stylesheet used to format the XML file. The full stylesheet (which includes extra information on pagination and margins) is available.

```xsl
...
<xsl:template match="FX">
  <fo:block font-weight="bold">
    <xsl:apply-templates/>
  </fo:block>
</xsl:template>

<xsl:template match="speech[@speaker='Arthur']">
  <fo:block background-color="blue">
    <xsl:value-of select="@speaker"/>:
    <xsl:apply-templates/>
  </fo:block>
</xsl:template>
...
```

The stylesheet can be used to transform any instance of the DTD it was designed for. The first rule says that an FX element will be transformed into a block with a bold font. <xsl:apply-templates/> is a recursive call to the template rules for the contents of the current element. The second template applies to all speech elements that have the speaker attribute set to Arthur, and formats them as blue blocks within which the value speaker attribute is added before the text.

