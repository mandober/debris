# XQuery

https://en.wikibooks.org/wiki/XQuery


## XQuery and XSLT


http://grtjn.blogspot.com/2011/10/xquery-novelties-revisited.html
https://www.xml.com/pub/a/2005/03/09/xquery-v-xslt.html
http://www.stylusstudio.com/SSDN/default.asp?action=9&fid=48&read=7041


The syntax of XQuery is much more compact because it is not expressed in XML as XSLT. On the other hand, XSLT is based on a different principle, making doing for instance certain structural changes much easier. In this sense, it is mainly down to personal taste and the specific challenges of the task at hand, which of the two will be used by someone in particular for a given task.

Comparison between XQuery and XSLT:

```xquery
(: For-each in XQuery.. :)

for $b in $books
order by $b/title
return
  $b/title 
```


```xslt
(: For-each in XSLT.. :)

<xsl:for-each select="$books">
  <xsl:sort select="title"/>
  <xsl:copy-of select="title"/>
</xsl:for-each>
```

XQuery is often used in combination with databases. XSLT is more common in the area of document conversions. Databases entail additional challenges, often of an entirely different order of magnitude. XQuery has extensions that provide help in those areas. But there are no (official) XSLT extensions, and there is no real need for it either.

And that is why comparing XQuery and XSLT is so difficult, and therefore usually futile.

XQuery is still relatively new, compared to XSLT and XPath. One reason for this is that, after the launch of XPath in 1999, people soon became aware that such language could be largely based on XPath. That resulted in the first Working Draft of both XQuery 1.0 and XPath 2.0 in 2001. XSLT could and should of course also benefit. The XSLT 2.0 Working Draft was initiated at the same time. The Recommendations of these three were released more or less simultaneously. We are talking about 2007 by then, that is six years later!

So, XQuery is a Recommendation only since 2007, while XSLT and XPath are Recommendations since 1999, and were pretty popular from the start. XQuery is still catching up on XSLT and XPath. In addition, XML was booming business back then. Innovations in XML standards have slowed down, while new ideas like JSON and NoSQL are getting all the attention.

XQuery indirectly emerged out of database languages like SQL. The first ideas for storing XML in databases arose with the advent of XML. Initially people mainly abused relational databases. However, languages like SQL are not equipped to handle XML. So, many extensions and variations arose automatically. By the time the XSLT and XPath Recommendations were a fact, people realized that there was a need for a generic query language as well. This resulted in the Quilt language in 2000, which was renamed to XQuery after adoption by the W3C.


