# W3C: XSLT Namespace
https://www.w3.org/1999/XSL/Transform

## XSLT Namespace
The namespace `http://www.w3.org/1999/XSL/Transform` is referred to as *the XSLT namespace*.

The prefix `xsl` is conventionally used to refer to this namespace (and is so used both within this document and within the XSLT specification), but it has no special status: any prefix may be used.

The same namespace has been used in all versions of the XSLT Recommendation.

Names in this namespace should be used only as defined in the relevant version of the XSLT Recommendation. In some contexts (for example, in the names of functions or system properties) misuse of the XSLT namespace makes a stylesheet erroneous.

## XSLT Elements
The namespace name `http://www.w3.org/1999/XSL/Transform` is used primarily to identify elements which serve as declarations or instructions in the *XSLT language*.

The full list of element names used in XSLT 3.0 is:
```
xsl:accept xsl:accumulator xsl:accumulator-rule xsl:analyze-string xsl:apply-imports xsl:apply-templates xsl:assert xsl:attribute xsl:attribute-set xsl:break xsl:call-template xsl:catch xsl:character-map xsl:choose xsl:comment xsl:context-item xsl:copy xsl:copy-of xsl:decimal-format xsl:document xsl:element xsl:evaluate xsl:expose xsl:fallback xsl:for-each xsl:for-each-group xsl:fork xsl:function xsl:global-context-item xsl:if xsl:import xsl:import-schema xsl:include xsl:iterate xsl:key xsl:map xsl:map-entry xsl:matching-substring xsl:merge xsl:merge-action xsl:merge-key xsl:merge-source xsl:message xsl:mode xsl:namespace xsl:namespace-alias xsl:next-iteration xsl:next-match xsl:non-matching-substring xsl:number xsl:on-completion xsl:on-empty xsl:on-non-empty xsl:otherwise xsl:output xsl:output-character xsl:override xsl:package xsl:param xsl:perform-sort xsl:preserve-space xsl:processing-instruction xsl:result-document xsl:sequence xsl:sort xsl:source-document xsl:strip-space xsl:stylesheet xsl:template xsl:text xsl:transform xsl:try xsl:use-package xsl:value-of xsl:variable xsl:when xsl:where-populated xsl:with-param
```

## XSLT Attributes
XSLT also defines a number of attributes with names in the namespace `http://www.w3.org/1999/XSL/Transform`; these attributes are used exclusively on elements that are not in this namespace.

These attributes (in XSLT 3.0) are:
```
xsl:default-collation xsl:default-mode xsl:default-validation xsl:exclude-result-prefixes xsl:expand-text xsl:extension-element-prefixes xsl:type xsl:use-when xsl:validation xsl:version xsl:xpath-default-namespace
```

## XSLT System Properties
**QNames** in the namespace `http://www.w3.org/1999/XSL/Transform` are defined for use with the system-property function to obtain information about the processing environment.

The system properties defined in XSLT 3.0 are:
```
xsl:version xsl:vendor xsl:vendor-url xsl:product-name xsl:product-version xsl:is-schema-aware xsl:supports-serialization xsl:supports-backwards-compatibility xsl:supports-namespace-axis xsl:supports-streaming xsl:supports-dynamic-evaluation xsl:supports-higher-order-functions xsl:xpath-version xsl:xsd-version
```

## Miscellaneous
The name `xsl:initial-template` identifies a named template that is to act as the default entry point for execution of a stylesheet.

The name `xsl:original` is used within an overriding component (for example, a variable, function, or template) to identify (and typically invoke) the component that is being overridden.

## Specifications
The XSLT language has 3 versions which are distinguished by content of the version attribute:
* [XSL Transformations (XSLT) Version 1.0](http://www.w3.org/TR/xslt)
* [XSL Transformations (XSLT) Version 2.0](http://www.w3.org/TR/xslt20)
* [XSL Transformations (XSLT) Version 3.0](http://www.w3.org/TR/xslt-30)

## More information
- [XSL page at W3C](http://www.w3.org/Style/XSL/)
- [xsl-list](http://www.mulberrytech.com/xsl/xsl-list/)
- [Unofficial DTD for XSLT 1.0](http://www.w3.org/1999/11/xslt10.dtd)
- [W3C XML Schema for XSLT 2.0](http://www.w3.org/2007/schema-for-xslt20.xsd) (non-normative)
- [W3C XML Schema for XSLT 3.0](https://www.w3.org/TR/xslt-30/schema-for-xslt30.xsd) (non-normative)
- [Relax-NG Schema for XSLT 3.0](https://www.w3.org/TR/xslt-30/schema-for-xslt30.rnc) (non-normative)



## XSLT Elements (sorted)
```
xsl:accept
xsl:accumulator
xsl:accumulator-rule
xsl:analyze-string
xsl:apply-imports
xsl:apply-templates
xsl:assert
xsl:attribute
xsl:attribute-set
xsl:break
xsl:call-template
xsl:catch
xsl:character-map
xsl:choose
xsl:comment
xsl:context-item
xsl:copy
xsl:copy-of
xsl:decimal-format
xsl:document
xsl:element
xsl:evaluate
xsl:expose
xsl:fallback
xsl:for-each
xsl:for-each-group
xsl:fork
xsl:function
xsl:global-context-item
xsl:if
xsl:import
xsl:import-schema
xsl:include
xsl:iterate
xsl:key
xsl:map
xsl:map-entry
xsl:matching-substring
xsl:merge
xsl:merge-action
xsl:merge-key
xsl:merge-source
xsl:message
xsl:mode
xsl:namespace
xsl:namespace-alias
xsl:next-iteration
xsl:next-match
xsl:non-matching-substring
xsl:number
xsl:on-completion
xsl:on-empty
xsl:on-non-empty
xsl:otherwise
xsl:output
xsl:output-character
xsl:override
xsl:package
xsl:param
xsl:perform-sort
xsl:preserve-space
xsl:processing-instruction
xsl:result-document
xsl:sequence
xsl:sort
xsl:source-document
xsl:strip-space
xsl:stylesheet
xsl:template
xsl:text
xsl:transform
xsl:try
xsl:use-package
xsl:value-of
xsl:variable
xsl:when
xsl:where-populated
xsl:with-param
```

## XSLT Attributes (sorted)
```
xsl:default-collation
xsl:default-mode
xsl:default-validation
xsl:exclude-result-prefixes
xsl:expand-text
xsl:extension-element-prefixes
xsl:type
xsl:use-when
xsl:validation
xsl:version
xsl:xpath-default-namespace
```

## XSLT System Properties (sorted)
```
xsl:version
xsl:vendor
xsl:vendor-url
xsl:product-name
xsl:product-version
xsl:is-schema-aware
xsl:supports-serialization
xsl:supports-backwards-compatibility
xsl:supports-namespace-axis
xsl:supports-streaming
xsl:supports-dynamic-evaluation
xsl:supports-higher-order-functions
xsl:xpath-version
xsl:xsd-version
```

## Miscellaneous
```
xsl:initial-template
xsl:original
```

