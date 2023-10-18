---
downloaded:       2022-08-26
page-url:         https://yaml.org/spec/1.2.2/
article-title:    YAML Ain’t Markup Language (YAML™) revision 1.2.2
---
# YAML Ain’t Markup Language (YAML™) revision 1.2.2
## Revision 1.2.2 (2021-10-01)

Copyright presently by YAML Language Development Team[1][1]  
Copyright 2001-2009 by Oren Ben-Kiki, Clark Evans, Ingy döt Net

This document may be freely copied, provided it is not modified.

**Status of this Document**

This is the **YAML specification v1.2.2**. It defines the **YAML 1.2 data language**. There are no normative changes from the **YAML specification v1.2**. The primary objectives of this revision are to correct errors and add clarity.

This revision also strives to make the YAML language development process more open, more transparent and easier for people to contribute to. The input format is now Markdown instead of DocBook, and the images are made from plain text LaTeX files rather than proprietary drawing software. All the source content for the specification is publicly hosted[2][2].

The previous YAML specification[3][3] was published 12 years ago. In that time span, YAML’s popularity has grown significantly. Efforts are ongoing to improve the language and grow it to meet the needs and expectations of its users. While this revision of the specification makes no actual changes to YAML, it begins a process by which the language intends to evolve and stay modern.

The YAML specification is often seen as overly complicated for something which appears to be so simple. Even though YAML often is used for software configuration, it has always been and will continue to be a complete data serialization language. Future YAML plans are focused on making the language and ecosystem more powerful and reliable while simultaneously simplifying the development process for implementers.

While this revision of the specification is limiting itself to informational changes only, there is companion documentation intended to guide YAML framework implementers and YAML language users. This documentation can continue to evolve and expand continually between published revisions of this specification.

See:

-   [YAML Resources Index][4]
-   [YAML Vocabulary Glossary][5]
-   [YAML Specification Changes][6]
-   [YAML Specification Errata][7]

**Abstract**

YAML™ (rhymes with “camel”) is a human-friendly, cross language, Unicode based data serialization language designed around the common native data types of dynamic programming languages. It is broadly useful for programming needs ranging from configuration files to internet messaging to object persistence to data auditing and visualization. Together with the Unicode standard for characters[4][8], this specification provides all the information necessary to understand YAML version 1.2 and to create programs that process YAML information.

**Contents**

-   [YAML Ain’t Markup Language (YAML™) version 1.2][9]
    -   [Revision 1.2.2 (2021-10-01)][10]
-   [Chapter 1. Introduction to YAML][11]
    -   [1.1. Goals][12]
    -   [1.2. YAML History][13]
    -   [1.3. Terminology][14]
-   [Chapter 2. Language Overview][15]
    -   [2.1. Collections][16]
    -   [2.2. Structures][17]
    -   [2.3. Scalars][18]
    -   [2.4. Tags][19]
    -   [2.5. Full Length Example][20]
-   [Chapter 3. Processes and Models][21]
    -   [3.1. Processes][22]
        -   [3.1.1. Dump][23]
        -   [3.1.2. Load][24]
    -   [3.2. Information Models][25]
        -   [3.2.1. Representation Graph][26]
            -   [3.2.1.1. Nodes][27]
            -   [3.2.1.2. Tags][28]
            -   [3.2.1.3. Node Comparison][29]
        -   [3.2.2. Serialization Tree][30]
            -   [3.2.2.1. Mapping Key Order][31]
            -   [3.2.2.2. Anchors and Aliases][32]
        -   [3.2.3. Presentation Stream][33]
            -   [3.2.3.1. Node Styles][34]
            -   [3.2.3.2. Scalar Formats][35]
            -   [3.2.3.3. Comments][36]
            -   [3.2.3.4. Directives][37]
    -   [3.3. Loading Failure Points][38]
        -   [3.3.1. Well-Formed Streams and Identified Aliases][39]
        -   [3.3.2. Resolved Tags][40]
        -   [3.3.3. Recognized and Valid Tags][41]
        -   [3.3.4. Available Tags][42]
-   [Chapter 4. Syntax Conventions][43]
    -   [4.1. Production Syntax][44]
    -   [4.2. Production Parameters][45]
    -   [4.3. Production Naming Conventions][46]
-   [Chapter 5. Character Productions][47]
    -   [5.1. Character Set][48]
    -   [5.2. Character Encodings][49]
    -   [5.3. Indicator Characters][50]
    -   [5.4. Line Break Characters][51]
    -   [5.5. White Space Characters][52]
    -   [5.6. Miscellaneous Characters][53]
    -   [5.7. Escaped Characters][54]
-   [Chapter 6. Structural Productions][55]
    -   [6.1. Indentation Spaces][56]
    -   [6.2. Separation Spaces][57]
    -   [6.3. Line Prefixes][58]
    -   [6.4. Empty Lines][59]
    -   [6.5. Line Folding][60]
    -   [6.6. Comments][61]
    -   [6.7. Separation Lines][62]
    -   [6.8. Directives][63]
        -   [6.8.1. “`YAML`” Directives][64]
        -   [6.8.2. “`TAG`” Directives][65]
            -   [6.8.2.1. Tag Handles][66]
            -   [6.8.2.2. Tag Prefixes][67]
    -   [6.9. Node Properties][68]
        -   [6.9.1. Node Tags][69]
        -   [6.9.2. Node Anchors][70]
-   [Chapter 7. Flow Style Productions][71]
    -   [7.1. Alias Nodes][72]
    -   [7.2. Empty Nodes][73]
    -   [7.3. Flow Scalar Styles][74]
        -   [7.3.1. Double-Quoted Style][75]
        -   [7.3.2. Single-Quoted Style][76]
        -   [7.3.3. Plain Style][77]
    -   [7.4. Flow Collection Styles][78]
        -   [7.4.1. Flow Sequences][79]
        -   [7.4.2. Flow Mappings][80]
    -   [7.5. Flow Nodes][81]
-   [Chapter 8. Block Style Productions][82]
    -   [8.1. Block Scalar Styles][83]
        -   [8.1.1. Block Scalar Headers][84]
            -   [8.1.1.1. Block Indentation Indicator][85]
            -   [8.1.1.2. Block Chomping Indicator][86]
        -   [8.1.2. Literal Style][87]
        -   [8.1.3. Folded Style][88]
    -   [8.2. Block Collection Styles][89]
        -   [8.2.1. Block Sequences][90]
        -   [8.2.2. Block Mappings][91]
        -   [8.2.3. Block Nodes][92]
-   [Chapter 9. Document Stream Productions][93]
    -   [9.1. Documents][94]
        -   [9.1.1. Document Prefix][95]
        -   [9.1.2. Document Markers][96]
        -   [9.1.3. Bare Documents][97]
        -   [9.1.4. Explicit Documents][98]
        -   [9.1.5. Directives Documents][99]
    -   [9.2. Streams][100]
-   [Chapter 10. Recommended Schemas][101]
    -   [10.1. Failsafe Schema][102]
        -   [10.1.1. Tags][103]
            -   [10.1.1.1. Generic Mapping][104]
            -   [10.1.1.2. Generic Sequence][105]
            -   [10.1.1.3. Generic String][106]
        -   [10.1.2. Tag Resolution][107]
    -   [10.2. JSON Schema][108]
        -   [10.2.1. Tags][109]
            -   [10.2.1.1. Null][110]
            -   [10.2.1.2. Boolean][111]
            -   [10.2.1.3. Integer][112]
            -   [10.2.1.4. Floating Point][113]
        -   [10.2.2. Tag Resolution][114]
    -   [10.3. Core Schema][115]
        -   [10.3.1. Tags][116]
        -   [10.3.2. Tag Resolution][117]
    -   [10.4. Other Schemas][118]
-   [Reference Links][119]

## Chapter 1. Introduction to YAML

YAML (a recursive acronym for “YAML Ain’t Markup Language”) is a data serialization language designed to be human-friendly and work well with modern programming languages for common everyday tasks. This specification is both an introduction to the YAML language and the concepts supporting it. It is also a complete specification of the information needed to develop [applications][120] for processing YAML.

Open, interoperable and readily understandable tools have advanced computing immensely. YAML was designed from the start to be useful and friendly to people working with data. It uses Unicode [printable][121] characters, [some][122] of which provide structural information and the rest containing the data itself. YAML achieves a unique cleanness by minimizing the amount of structural characters and allowing the data to show itself in a natural and meaningful way. For example, [indentation][123] may be used for structure, [colons][124] separate [key/value pairs][125] and [dashes][126] are used to create “bulleted” [lists][127].

There are many kinds of [data structures][128], but they can all be adequately [represented][129] with three basic primitives: [mappings][130] (hashes/dictionaries), [sequences][131] (arrays/lists) and [scalars][132] (strings/numbers). YAML leverages these primitives and adds a simple typing system and [aliasing][133] mechanism to form a complete language for [serializing][134] any [native data structure][135]. While most programming languages can use YAML for data serialization, YAML excels in working with those languages that are fundamentally built around the three basic primitives. These include common dynamic languages such as JavaScript, Perl, PHP, Python and Ruby.

There are hundreds of different languages for programming, but only a handful of languages for storing and transferring data. Even though its potential is virtually boundless, YAML was specifically created to work well for common use cases such as: configuration files, log files, interprocess messaging, cross-language data sharing, object persistence and debugging of complex data structures. When data is easy to view and understand, programming becomes a simpler task.

## 1.1. Goals

The design goals for YAML are, in decreasing priority:

1.  YAML should be easily readable by humans.
2.  YAML data should be portable between programming languages.
3.  YAML should match the [native data structures][136] of dynamic languages.
4.  YAML should have a consistent model to support generic tools.
5.  YAML should support one-pass processing.
6.  YAML should be expressive and extensible.
7.  YAML should be easy to implement and use.

## 1.2. YAML History

The YAML 1.0 specification was published in early 2004 by by Clark Evans, Oren Ben-Kiki, and Ingy döt Net after 3 years of collaborative design work through the yaml-core mailing list[5][137]. The project was initially rooted in Clark and Oren’s work on the SML-DEV[6][138] mailing list (for simplifying XML) and Ingy’s plain text serialization module[7][139] for Perl. The language took a lot of inspiration from many other technologies and formats that preceded it.

The first YAML framework was written in Perl in 2001 and Ruby was the first language to ship a YAML framework as part of its core language distribution in 2003.

The YAML 1.1[8][140] specification was published in 2005. Around this time, the developers became aware of JSON[9][141]. By sheer coincidence, JSON was almost a complete subset of YAML (both syntactically and semantically).

In 2006, Kyrylo Simonov produced PyYAML[10][142] and LibYAML[11][143]. A lot of the YAML frameworks in various programming languages are built over LibYAML and many others have looked to PyYAML as a solid reference for their implementations.

The YAML 1.2[3][144] specification was published in 2009. Its primary focus was making YAML a strict superset of JSON. It also removed many of the problematic implicit typing recommendations.

Since the release of the 1.2 specification, YAML adoption has continued to grow, and many large-scale projects use it as their primary interface language. In 2020, the new [YAML language design team][145] began meeting regularly to discuss improvements to the YAML language and specification; to better meet the needs and expectations of its users and use cases.

This YAML 1.2.2 specification, published in October 2021, is the first step in YAML’s rejuvenated development journey. YAML is now more popular than it has ever been, but there is a long list of things that need to be addressed for it to reach its full potential. The YAML design team is focused on making YAML as good as possible.

## 1.3. Terminology

The key words “MUST”, “MUST NOT”, “REQUIRED”, “SHALL”, “SHALL NOT”, “SHOULD”, “SHOULD NOT”, “RECOMMENDED”, “MAY”, and “OPTIONAL” in this document are to be interpreted as described in RFC 2119[12][146].

The rest of this document is arranged as follows. Chapter [2][147] provides a short preview of the main YAML features. Chapter [3][148] describes the YAML information model and the processes for converting from and to this model and the YAML text format. The bulk of the document, chapters [4][149], [5][150], [6][151], [7][152], [8][153] and [9][154], formally define this text format. Finally, chapter [10][155] recommends basic YAML schemas.

## Chapter 2. Language Overview

This section provides a quick glimpse into the expressive power of YAML. It is not expected that the first-time reader grok all of the examples. Rather, these selections are used as motivation for the remainder of the specification.

## 2.1. Collections

YAML’s [block collections][156] use [indentation][157] for scope and begin each entry on its own line. [Block sequences][158] indicate each entry with a dash and space (“`-` ”). [Mappings][159] use a colon and space (“`:` ”) to mark each [key/value pair][160]. [Comments][161] begin with an octothorpe (also called a “hash”, “sharp”, “pound” or “number sign” - “`#`”).

**Example 2.1 Sequence of Scalars (ball players)**

```
- Mark McGwire
- Sammy Sosa
- Ken Griffey

```

**Example 2.2 Mapping Scalars to Scalars (player statistics)**

```
hr:  65    # Home runs
avg: 0.278 # Batting average
rbi: 147   # Runs Batted In

```

**Example 2.3 Mapping Scalars to Sequences (ball clubs in each league)**

```
american:
- Boston Red Sox
- Detroit Tigers
- New York Yankees
national:
- New York Mets
- Chicago Cubs
- Atlanta Braves

```

**Example 2.4 Sequence of Mappings (players’ statistics)**

```
-
  name: Mark McGwire
  hr:   65
  avg:  0.278
-
  name: Sammy Sosa
  hr:   63
  avg:  0.288

```

YAML also has [flow styles][162], using explicit [indicators][163] rather than [indentation][164] to denote scope. The [flow sequence][165] is written as a [comma][166] separated list within [square][167] [brackets][168]. In a similar manner, the [flow mapping][169] uses [curly][170] [braces][171].

**Example 2.5 Sequence of Sequences**

```
- [name        , hr, avg  ]
- [Mark McGwire, 65, 0.278]
- [Sammy Sosa  , 63, 0.288]

```

**Example 2.6 Mapping of Mappings**

```
Mark McGwire: {hr: 65, avg: 0.278}
Sammy Sosa: {
    hr: 63,
    avg: 0.288,
 }

```

## 2.2. Structures

YAML uses three dashes (“`---`”) to separate [directives][172] from [document][173] [content][174]. This also serves to signal the start of a document if no [directives][175] are present. Three dots ( “`...`”) indicate the end of a document without starting a new one, for use in communication channels.

**Example 2.7 Two Documents in a Stream (each with a leading comment)**

```
# Ranking of 1998 home runs
---
- Mark McGwire
- Sammy Sosa
- Ken Griffey

# Team ranking
---
- Chicago Cubs
- St Louis Cardinals

```

**Example 2.8 Play by Play Feed from a Game**

```
---
time: 20:03:20
player: Sammy Sosa
action: strike (miss)
...
---
time: 20:03:47
player: Sammy Sosa
action: grand slam
...

```

Repeated [nodes][176] (objects) are first [identified][177] by an [anchor][178] (marked with the ampersand - “`&`”) and are then [aliased][179] (referenced with an asterisk - “`*`”) thereafter.

**Example 2.10 Node for “`Sammy Sosa`” appears twice in this document**

```
---
hr:
- Mark McGwire
# Following node labeled SS
- &SS Sammy Sosa
rbi:
- *SS # Subsequent occurrence
- Ken Griffey

```

A question mark and space (“`?` ”) indicate a complex [mapping][180] [key][181]. Within a [block collection][182], [key/value pairs][183] can start immediately following the [dash][184], [colon][185] or [question mark][186].

**Example 2.11 Mapping between Sequences**

```
? - Detroit Tigers
  - Chicago cubs
: - 2001-07-23

? [ New York Yankees,
    Atlanta Braves ]
: [ 2001-07-02, 2001-08-12,
    2001-08-14 ]

```

**Example 2.12 Compact Nested Mapping**

```
---
# Products purchased
- item    : Super Hoop
  quantity: 1
- item    : Basketball
  quantity: 4
- item    : Big Shoes
  quantity: 1

```

## 2.3. Scalars

[Scalar content][187] can be written in [block][188] notation, using a [literal style][189] (indicated by “`|`”) where all [line breaks][190] are significant. Alternatively, they can be written with the [folded style][191] (denoted by “`>`”) where each [line break][192] is [folded][193] to a [space][194] unless it ends an [empty][195] or a [more-indented][196] line.

**Example 2.13 In literals, newlines are preserved**

```
# ASCII Art
--- |
  \//||\/||
  // ||  ||__

```

**Example 2.14 In the folded scalars, newlines become spaces**

```
--- >
  Mark McGwire's
  year was crippled
  by a knee injury.

```

**Example 2.15 Folded newlines are preserved for “more indented” and blank lines**

```
--- >
 Sammy Sosa completed another
 fine season with great stats.

   63 Home Runs
   0.288 Batting Average

 What a year!

```

**Example 2.16 Indentation determines scope**

```
name: Mark McGwire
accomplishment: >
  Mark set a major league
  home run record in 1998.
stats: |
  65 Home Runs
  0.278 Batting Average

```

YAML’s [flow scalars][197] include the [plain style][198] (most examples thus far) and two quoted styles. The [double-quoted style][199] provides [escape sequences][200]. The [single-quoted style][201] is useful when [escaping][202] is not needed. All [flow scalars][203] can span multiple lines; [line breaks][204] are always [folded][205].

**Example 2.17 Quoted Scalars**

```
unicode: "Sosa did fine.\u263A"
control: "\b1998\t1999\t2000\n"
hex esc: "\x0d\x0a is \r\n"

single: '"Howdy!" he cried.'
quoted: ' # Not a ''comment''.'
tie-fighter: '|\-*-/|'

```

**Example 2.18 Multi-line Flow Scalars**

```
plain:
  This unquoted scalar
  spans many lines.

quoted: "So does this
  quoted scalar.\n"

```

In YAML, [untagged nodes][206] are given a type depending on the [application][207]. The examples in this specification generally use the `seq`, `map` and `str` types from the [fail safe schema][208]. A few examples also use the `int`, `float` and `null` types from the [JSON schema][209].

**Example 2.19 Integers**

```
canonical: 12345
decimal: +12345
octal: 0o14
hexadecimal: 0xC

```

**Example 2.20 Floating Point**

```
canonical: 1.23015e+3
exponential: 12.3015e+02
fixed: 1230.15
negative infinity: -.inf
not a number: .nan

```

**Example 2.21 Miscellaneous**

```
null:
booleans: [ true, false ]
string: '012345'

```

**Example 2.22 Timestamps**

```
canonical: 2001-12-15T02:59:43.1Z
iso8601: 2001-12-14t21:59:43.10-05:00
spaced: 2001-12-14 21:59:43.10 -5
date: 2002-12-14

```

Explicit typing is denoted with a [tag][210] using the exclamation point (“`!`”) symbol. [Global tags][211] are URIs and may be specified in a [tag shorthand][212] notation using a [handle][213]. [Application][214]-specific [local tags][215] may also be used.

**Example 2.25 Unordered Sets**

```
# Sets are represented as a
# Mapping where each key is
# associated with a null value
--- !!set
? Mark McGwire
? Sammy Sosa
? Ken Griffey

```

**Example 2.26 Ordered Mappings**

```
# Ordered maps are represented as
# A sequence of mappings, with
# each mapping having one key
--- !!omap
- Mark McGwire: 65
- Sammy Sosa: 63
- Ken Griffey: 58

```

## 2.5. Full Length Example

Below are two full-length examples of YAML. The first is a sample invoice; the second is a sample log file.

**Example 2.27 Invoice**

```
--- !<tag:clarkevans.com,2002:invoice>
invoice: 34843
date   : 2001-01-23
bill-to: &id001
  given  : Chris
  family : Dumars
  address:
    lines: |
      458 Walkman Dr.
      Suite #292
    city    : Royal Oak
    state   : MI
    postal  : 48046
ship-to: *id001
product:
- sku         : BL394D
  quantity    : 4
  description : Basketball
  price       : 450.00
- sku         : BL4438H
  quantity    : 1
  description : Super Hoop
  price       : 2392.00
tax  : 251.42
total: 4443.52
comments:
  Late afternoon is best.
  Backup contact is Nancy
  Billsmer @ 338-4338.

```

**Example 2.28 Log File**

```
---
Time: 2001-11-23 15:01:42 -5
User: ed
Warning:
  This is an error message
  for the log file
---
Time: 2001-11-23 15:02:31 -5
User: ed
Warning:
  A slightly different error
  message.
---
Date: 2001-11-23 15:03:17 -5
User: ed
Fatal:
  Unknown variable "bar"
Stack:
- file: TopClass.py
  line: 23
  code: |
    x = MoreObject("345\n")
- file: MoreClass.py
  line: 58
  code: |-
    foo = bar

```

## Chapter 3. Processes and Models

YAML is both a text format and a method for [presenting][216] any [native data structure][217] in this format. Therefore, this specification defines two concepts: a class of data objects called YAML [representations][218] and a syntax for [presenting][219] YAML [representations][220] as a series of characters, called a YAML [stream][221].

A YAML *processor* is a tool for converting information between these complementary views. It is assumed that a YAML processor does its work on behalf of another module, called an *application*. This chapter describes the information structures a YAML processor must provide to or obtain from the application.

YAML information is used in two ways: for machine processing and for human consumption. The challenge of reconciling these two perspectives is best done in three distinct translation stages: [representation][222], [serialization][223] and [presentation][224]. [Representation][225] addresses how YAML views [native data structures][226] to achieve portability between programming environments. [Serialization][227] concerns itself with turning a YAML [representation][228] into a serial form, that is, a form with sequential access constraints. [Presentation][229] deals with the formatting of a YAML [serialization][230] as a series of characters in a human-friendly manner.

## 3.1. Processes

Translating between [native data structures][231] and a character [stream][232] is done in several logically distinct stages, each with a well defined input and output data model, as shown in the following diagram:

**Figure 3.1. Processing Overview**

A YAML processor need not expose the [serialization][233] or [representation][234] stages. It may translate directly between [native data structures][235] and a character [stream][236] ([dump][237] and [load][238] in the diagram above). However, such a direct translation should take place so that the [native data structures][239] are [constructed][240] only from information available in the [representation][241]. In particular, [mapping key order][242], [comments][243] and [tag handles][244] should not be referenced during [construction][245].

### 3.1.1. Dump

*Dumping* native data structures to a character [stream][246] is done using the following three stages:

Representing Native Data Structures

YAML *represents* any *native data structure* using three [node kinds][247]: [sequence][248] - an ordered series of entries; [mapping][249] - an unordered association of [unique][250] [keys][251] to [values][252]; and [scalar][253] - any datum with opaque structure presentable as a series of Unicode characters.

Combined, these primitives generate directed graph structures. These primitives were chosen because they are both powerful and familiar: the [sequence][254] corresponds to a Perl array and a Python list, the [mapping][255] corresponds to a Perl hash table and a Python dictionary. The [scalar][256] represents strings, integers, dates and other atomic data types.

Each YAML [node][257] requires, in addition to its [kind][258] and [content][259], a [tag][260] specifying its data type. Type specifiers are either [global][261] URIs or are [local][262] in scope to a single [application][263]. For example, an integer is represented in YAML with a [scalar][264] plus the [global tag][265] “`tag:yaml.org,2002:int`”. Similarly, an invoice object, particular to a given organization, could be represented as a [mapping][266] together with the [local tag][267] “`!invoice`”. This simple model can represent any data structure independent of programming language.

Serializing the Representation Graph

For sequential access mediums, such as an event callback API, a YAML [representation][268] must be *serialized* to an ordered tree. Since in a YAML [representation][269], [mapping keys][270] are unordered and [nodes][271] may be referenced more than once (have more than one incoming “arrow”), the serialization process is required to impose an [ordering][272] on the [mapping keys][273] and to replace the second and subsequent references to a given [node][274] with place holders called [aliases][275]. YAML does not specify how these *serialization details* are chosen. It is up to the YAML [processor][276] to come up with human-friendly [key order][277] and [anchor][278] names, possibly with the help of the [application][279]. The result of this process, a YAML [serialization tree][280], can then be traversed to produce a series of event calls for one-pass processing of YAML data.

Presenting the Serialization Tree

The final output process is *presenting* the YAML [serializations][281] as a character [stream][282] in a human-friendly manner. To maximize human readability, YAML offers a rich set of stylistic options which go far beyond the minimal functional needs of simple data storage. Therefore the YAML [processor][283] is required to introduce various *presentation details* when creating the [stream][284], such as the choice of [node styles][285], how to [format scalar content][286], the amount of [indentation][287], which [tag handles][288] to use, the [node tags][289] to leave [unspecified][290], the set of [directives][291] to provide and possibly even what [comments][292] to add. While some of this can be done with the help of the [application][293], in general this process should be guided by the preferences of the user.

### 3.1.2. Load

*Loading* [native data structures][294] from a character [stream][295] is done using the following three stages:

Parsing the Presentation Stream

*Parsing* is the inverse process of [presentation][296], it takes a [stream][297] of characters and produces a [serialization tree][298]. Parsing discards all the [details][299] introduced in the [presentation][300] process, reporting only the [serialization tree][301]. Parsing can fail due to [ill-formed][302] input.

Composing the Representation Graph

*Composing* takes a [serialization tree][303] and produces a [representation graph][304]. Composing discards all the [details][305] introduced in the [serialization][306] process, producing only the [representation graph][307]. Composing can fail due to any of several reasons, detailed [below][308].

Constructing Native Data Structures

The final input process is *constructing* [native data structures][309] from the YAML [representation][310]. Construction must be based only on the information available in the [representation][311] and not on additional [serialization][312] or [presentation details][313] such as [comments][314], [directives][315], [mapping key order][316], [node styles][317], [scalar content format][318], [indentation][319] levels etc. Construction can fail due to the [unavailability][320] of the required [native data types][321].

## 3.2. Information Models

This section specifies the formal details of the results of the above processes. To maximize data portability between programming languages and implementations, users of YAML should be mindful of the distinction between [serialization][322] or [presentation][323] properties and those which are part of the YAML [representation][324]. Thus, while imposing a [order][325] on [mapping keys][326] is necessary for flattening YAML [representations][327] to a sequential access medium, this [serialization detail][328] must not be used to convey [application][329] level information. In a similar manner, while [indentation][330] technique and a choice of a [node style][331] are needed for the human readability, these [presentation details][332] are neither part of the YAML [serialization][333] nor the YAML [representation][334]. By carefully separating properties needed for [serialization][335] and [presentation][336], YAML [representations][337] of [application][338] information will be consistent and portable between various programming environments.

The following diagram summarizes the three *information models*. Full arrows denote composition, hollow arrows denote inheritance, “`1`” and “`*`” denote “one” and “many” relationships. A single “`+`” denotes [serialization][339] details, a double “`++`” denotes [presentation][340] details.

**Figure 3.2. Information Models**

### 3.2.1. Representation Graph

YAML’s *representation* of [native data structure][341] is a rooted, connected, directed graph of [tagged][342] [nodes][343]. By “directed graph” we mean a set of [nodes][344] and directed edges (“arrows”), where each edge connects one [node][345] to another (see a formal directed graph definition[13][346]). All the [nodes][347] must be reachable from the *root node* via such edges. Note that the YAML graph may include cycles and a [node][348] may have more than one incoming edge.

[Nodes][349] that are defined in terms of other [nodes][350] are [collections][351]; [nodes][352] that are independent of any other [nodes][353] are [scalars][354]. YAML supports two [kinds][355] of [collection nodes][356]: [sequences][357] and [mappings][358]. [Mapping nodes][359] are somewhat tricky because their [keys][360] are unordered and must be [unique][361].

**Figure 3.3. Representation Model**

#### 3.2.1.1. Nodes

A YAML *node* [represents][362] a single [native data structure][363]. Such nodes have *content* of one of three *kinds*: scalar, sequence or mapping. In addition, each node has a [tag][364] which serves to restrict the set of possible values the content can have.

Scalar

The content of a *scalar* node is an opaque datum that can be [presented][365] as a series of zero or more Unicode characters.

Sequence

The content of a *sequence* node is an ordered series of zero or more nodes. In particular, a sequence may contain the same node more than once. It could even contain itself.

Mapping

The content of a *mapping* node is an unordered set of *key/value* node *pairs*, with the restriction that each of the keys is [unique][366]. YAML places no further restrictions on the nodes. In particular, keys may be arbitrary nodes, the same node may be used as the value of several key/value pairs and a mapping could even contain itself as a key or a value.

#### 3.2.1.2. Tags

YAML [represents][367] type information of [native data structures][368] with a simple identifier, called a *tag*. *Global tags* are URIs and hence globally unique across all [applications][369]. The “`tag:`” URI scheme[14][370] is recommended for all global YAML tags. In contrast, *local tags* are specific to a single [application][371]. Local tags start with “`!`”, are not URIs and are not expected to be globally unique. YAML provides a “`TAG`” directive to make tag notation less verbose; it also offers easy migration from local to global tags. To ensure this, local tags are restricted to the URI character set and use URI character [escaping][372].

YAML does not mandate any special relationship between different tags that begin with the same substring. Tags ending with URI fragments (containing “`#`”) are no exception; tags that share the same base URI but differ in their fragment part are considered to be different, independent tags. By convention, fragments are used to identify different “variants” of a tag, while “`/`” is used to define nested tag “namespace” hierarchies. However, this is merely a convention and each tag may employ its own rules. For example, Perl tags may use “`::`” to express namespace hierarchies, Java tags may use “`.`”, etc.

YAML tags are used to associate meta information with each [node][373]. In particular, each tag must specify the expected [node kind][374] ([scalar][375], [sequence][376] or [mapping][377]). [Scalar][378] tags must also provide a mechanism for converting [formatted content][379] to a [canonical form][380] for supporting [equality][381] testing. Furthermore, a tag may provide additional information such as the set of allowed [content][382] values for validation, a mechanism for [tag resolution][383] or any other data that is applicable to all of the tag’s [nodes][384].

#### 3.2.1.3. Node Comparison

Since YAML [mappings][385] require [key][386] uniqueness, [representations][387] must include a mechanism for testing the equality of [nodes][388]. This is non-trivial since YAML allows various ways to [format scalar content][389]. For example, the integer eleven can be written as “`0o13`” (octal) or “`0xB`” (hexadecimal). If both notations are used as [keys][390] in the same [mapping][391], only a YAML [processor][392] which recognizes integer [formats][393] would correctly flag the duplicate [key][394] as an error.

Canonical Form

YAML supports the need for [scalar][395] equality by requiring that every [scalar][396] [tag][397] must specify a mechanism for producing the *canonical form* of any [formatted content][398]. This form is a Unicode character string which also [presents][399] the same [content][400] and can be used for equality testing.

Equality

Two [nodes][401] must have the same [tag][402] and [content][403] to be *equal*. Since each [tag][404] applies to exactly one [kind][405], this implies that the two [nodes][406] must have the same [kind][407] to be equal.

Two [scalars][408] are equal only when their [tags][409] and canonical forms are equal character-by-character. Equality of [collections][410] is defined recursively.

Two [sequences][411] are equal only when they have the same [tag][412] and length and each [node][413] in one [sequence][414] is equal to the corresponding [node][415] in the other [sequence][416].

Two [mappings][417] are equal only when they have the same [tag][418] and an equal set of [keys][419] and each [key][420] in this set is associated with equal [values][421] in both [mappings][422].

Different URI schemes may define different rules for testing the equality of URIs. Since a YAML [processor][423] cannot be reasonably expected to be aware of them all, it must resort to a simple character-by-character comparison of [tags][424] to ensure consistency. This also happens to be the comparison method defined by the “`tag:`” URI scheme. [Tags][425] in a YAML stream must therefore be [presented][426] in a canonical way so that such comparison would yield the correct results.

If a node has itself as a descendant (via an alias), then determining the equality of that node is implementation-defined.

A YAML [processor][427] may treat equal [scalars][428] as if they were identical.

Uniqueness

A [mapping’s][429] [keys][430] are *unique* if no two keys are equal to each other. Obviously, identical nodes are always considered equal.

### 3.2.2. Serialization Tree

To express a YAML [representation][431] using a serial API, it is necessary to impose an [order][432] on [mapping keys][433] and employ [alias nodes][434] to indicate a subsequent occurrence of a previously encountered [node][435]. The result of this process is a *serialization tree*, where each [node][436] has an ordered set of children. This tree can be traversed for a serial event-based API. [Construction][437] of [native data structures][438] from the serial interface should not use [key order][439] or [anchor names][440] for the preservation of [application][441] data.

**Figure 3.4. Serialization Model**

#### 3.2.2.1. Mapping Key Order

In the [representation][442] model, [mapping keys][443] do not have an order. To [serialize][444] a [mapping][445], it is necessary to impose an *ordering* on its [keys][446]. This order is a [serialization detail][447] and should not be used when [composing][448] the [representation graph][449] (and hence for the preservation of [application][450] data). In every case where [node][451] order is significant, a [sequence][452] must be used. For example, an ordered [mapping][453] can be [represented][454] as a [sequence][455] of [mappings][456], where each [mapping][457] is a single [key/value pair][458]. YAML provides convenient [compact notation][459] for this case.

#### 3.2.2.2. Anchors and Aliases

In the [representation graph][460], a [node][461] may appear in more than one [collection][462]. When [serializing][463] such data, the first occurrence of the [node][464] is *identified* by an *anchor*. Each subsequent occurrence is [serialized][465] as an [alias node][466] which refers back to this anchor. Otherwise, anchor names are a [serialization detail][467] and are discarded once [composing][468] is completed. When [composing][469] a [representation graph][470] from [serialized][471] events, an alias event refers to the most recent event in the [serialization][472] having the specified anchor. Therefore, anchors need not be unique within a [serialization][473]. In addition, an anchor need not have an alias node referring to it.

### 3.2.3. Presentation Stream

A YAML *presentation* is a [stream][474] of Unicode characters making use of [styles][475], [scalar content formats][476], [comments][477], [directives][478] and other [presentation details][479] to [present][480] a YAML [serialization][481] in a human readable way. YAML allows several [serialization trees][482] to be contained in the same YAML presentation stream, as a series of [documents][483] separated by [markers][484].

**Figure 3.5. Presentation Model**

#### 3.2.3.1. Node Styles

Each [node][485] is presented in some *style*, depending on its [kind][486]. The node style is a [presentation detail][487] and is not reflected in the [serialization tree][488] or [representation graph][489]. There are two groups of styles. [Block styles][490] use [indentation][491] to denote structure. In contrast, [flow styles][492] rely on explicit [indicators][493].

YAML provides a rich set of *scalar styles*. [Block scalar][494] styles include the [literal style][495] and the [folded style][496]. [Flow scalar][497] styles include the [plain style][498] and two quoted styles, the [single-quoted style][499] and the [double-quoted style][500]. These styles offer a range of trade-offs between expressive power and readability.

Normally, [block sequences][501] and [mappings][502] begin on the next line. In some cases, YAML also allows nested [block][503] [collections][504] to start in-line for a more [compact notation][505]. In addition, YAML provides a [compact notation][506] for [flow mappings][507] with a single [key/value pair][508], nested inside a [flow sequence][509]. These allow for a natural “ordered mapping” notation.

**Figure 3.6. Kind/Style Combinations**

#### 3.2.3.2. Scalar Formats

YAML allows [scalars][510] to be [presented][511] in several *formats*. For example, the integer “`11`” might also be written as “`0xB`”. [Tags][512] must specify a mechanism for converting the formatted content to a [canonical form][513] for use in [equality][514] testing. Like [node style][515], the format is a [presentation detail][516] and is not reflected in the [serialization tree][517] and [representation graph][518].

[Comments][519] are a [presentation detail][520] and must not have any effect on the [serialization tree][521] or [representation graph][522]. In particular, comments are not associated with a particular [node][523]. The usual purpose of a comment is to communicate between the human maintainers of a file. A typical example is comments in a configuration file. Comments must not appear inside [scalars][524], but may be interleaved with such [scalars][525] inside [collections][526].

#### 3.2.3.4. Directives

Each [document][527] may be associated with a set of [directives][528]. A directive has a name and an optional sequence of parameters. Directives are instructions to the YAML [processor][529] and like all other [presentation details][530] are not reflected in the YAML [serialization tree][531] or [representation graph][532]. This version of YAML defines two directives, “`YAML`” and “`TAG`”. All other directives are [reserved][533] for future versions of YAML.

## 3.3. Loading Failure Points

The process of [loading][534] [native data structures][535] from a YAML [stream][536] has several potential *failure points*. The character [stream][537] may be [ill-formed][538], [aliases][539] may be [unidentified][540], [unspecified tags][541] may be [unresolvable][542], [tags][543] may be [unrecognized][544], the [content][545] may be [invalid][546], [mapping][547] [keys][548] may not be [unique][549] and a native type may be [unavailable][550]. Each of these failures results with an incomplete loading.

A *partial representation* need not [resolve][551] the [tag][552] of each [node][553] and the [canonical form][554] of [formatted scalar content][555] need not be available. This weaker representation is useful for cases of incomplete knowledge of the types used in the [document][556].

In contrast, a *complete representation* specifies the [tag][557] of each [node][558] and provides the [canonical form][559] of [formatted scalar content][560], allowing for [equality][561] testing. A complete representation is required in order to [construct][562] [native data structures][563].

**Figure 3.7. Loading Failure Points**

### 3.3.1. Well-Formed Streams and Identified Aliases

A [well-formed][564] character [stream][565] must match the BNF productions specified in the following chapters. Successful loading also requires that each [alias][566] shall refer to a previous [node][567] [identified][568] by the [anchor][569]. A YAML [processor][570] should reject *ill-formed streams* and *unidentified aliases*. A YAML [processor][571] may recover from syntax errors, possibly by ignoring certain parts of the input, but it must provide a mechanism for reporting such errors.

### 3.3.2. Resolved Tags

Typically, most [tags][572] are not explicitly specified in the character [stream][573]. During [parsing][574], [nodes][575] lacking an explicit [tag][576] are given a *non-specific tag*: “`!`” for non-[plain scalars][577] and “`?`” for all other [nodes][578]. [Composing][579] a [complete representation][580] requires each such non-specific tag to be *resolved* to a *specific tag*, be it a [global tag][581] or a [local tag][582].

Resolving the [tag][583] of a [node][584] must only depend on the following three parameters: (1) the non-specific tag of the [node][585], (2) the path leading from the [root][586] to the [node][587] and (3) the [content][588] (and hence the [kind][589]) of the [node][590]. When a [node][591] has more than one occurrence (using [aliases][592]), tag resolution must depend only on the path to the first ([anchored][593]) occurrence of the [node][594].

Note that resolution must not consider [presentation details][595] such as [comments][596], [indentation][597] and [node style][598]. Also, resolution must not consider the [content][599] of any other [node][600], except for the [content][601] of the [key nodes][602] directly along the path leading from the [root][603] to the resolved [node][604]. Finally, resolution must not consider the [content][605] of a sibling [node][606] in a [collection][607] or the [content][608] of the [value node][609] associated with a [key node][610] being resolved.

These rules ensure that tag resolution can be performed as soon as a [node][611] is first encountered in the [stream][612], typically before its [content][613] is [parsed][614]. Also, tag resolution only requires referring to a relatively small number of previously parsed [nodes][615]. Thus, in most cases, tag resolution in one-pass [processors][616] is both possible and practical.

YAML [processors][617] should resolve [nodes][618] having the “`!`” non-specific tag as “`tag:yaml.org,2002:seq`”, “`tag:yaml.org,2002:map`” or “`tag:yaml.org,2002:str`” depending on their [kind][619]. This *tag resolution convention* allows the author of a YAML character [stream][620] to effectively “disable” the tag resolution process. By explicitly specifying a “`!`” non-specific [tag property][621], the [node][622] would then be resolved to a “vanilla” [sequence][623], [mapping][624] or string, according to its [kind][625].

[Application][626] specific tag resolution rules should be restricted to resolving the “`?`” non-specific tag, most commonly to resolving [plain scalars][627]. These may be matched against a set of regular expressions to provide automatic resolution of integers, floats, timestamps and similar types. An [application][628] may also match the [content][629] of [mapping nodes][630] against sets of expected [keys][631] to automatically resolve points, complex numbers and similar types. Resolved [sequence node][632] types such as the “ordered mapping” are also possible.

That said, tag resolution is specific to the [application][633]. YAML [processors][634] should therefore provide a mechanism allowing the [application][635] to override and expand these default tag resolution rules.

If a [document][636] contains *unresolved tags*, the YAML [processor][637] is unable to [compose][638] a [complete representation][639] graph. In such a case, the YAML [processor][640] may [compose][641] a [partial representation][642], based on each [node’s kind][643] and allowing for non-specific tags.

### 3.3.3. Recognized and Valid Tags

To be *valid*, a [node][644] must have a [tag][645] which is *recognized* by the YAML [processor][646] and its [content][647] must satisfy the constraints imposed by this [tag][648]. If a [document][649] contains a [scalar node][650] with an *unrecognized tag* or *invalid content*, only a [partial representation][651] may be [composed][652]. In contrast, a YAML [processor][653] can always [compose][654] a [complete representation][655] for an unrecognized or an invalid [collection][656], since [collection][657] [equality][658] does not depend upon knowledge of the [collection’s][659] data type. However, such a [complete representation][660] cannot be used to [construct][661] a [native data structure][662].

### 3.3.4. Available Tags

In a given processing environment, there need not be an *available* native type corresponding to a given [tag][663]. If a [node’s tag][664] is *unavailable*, a YAML [processor][665] will not be able to [construct][666] a [native data structure][667] for it. In this case, a [complete representation][668] may still be [composed][669] and an [application][670] may wish to use this [representation][671] directly.

## Chapter 4. Syntax Conventions

The following chapters formally define the syntax of YAML character [streams][672], using parameterized BNF productions. Each BNF production is both named and numbered for easy reference. Whenever possible, basic structures are specified before the more complex structures using them in a “bottom up” fashion.

The productions are accompanied by examples which are presented in a two-pane side-by-side format. The left-hand side is the YAML example and the right-hand side is an alternate YAML view of the example. The right-hand view uses JSON when possible. Otherwise it uses a YAML form that is as close to JSON as possible.

## 4.1. Production Syntax

Productions are defined using the syntax `production-name ::= term`, where a term is either:

An atomic term

-   A quoted string (`"abc"`), which matches that concatenation of characters. A single character is usually written with single quotes (`'a'`).
-   A hexadecimal number (`x0A`), which matches the character at that Unicode code point.
-   A range of hexadecimal numbers (`[x20-x7E]`), which matches any character whose Unicode code point is within that range.
-   The name of a production (`c-printable`), which matches that production.

A lookaround

-   `[ lookahead = term ]`, which matches the empty string if `term` would match.
-   `[ lookahead ≠ term ]`, which matches the empty string if `term` would not match.
-   `[ lookbehind = term ]`, which matches the empty string if `term` would match beginning at any prior point on the line and ending at the current position.

A special production

-   `<start-of-line>`, which matches the empty string at the beginning of a line.
-   `<end-of-input>`, matches the empty string at the end of the input.
-   `<empty>`, which (always) matches the empty string.

A parenthesized term

Matches its contents.

A concatenation

Is `term-one term-two`, which matches `term-one` followed by `term-two`.

A alternation

Is `term-one | term-two`, which matches the `term-one` if possible, or `term-two` otherwise.

A quantified term:

-   `term?`, which matches `(term | <empty>)`.
-   `term*`, which matches `(term term* | <empty>)`.
-   `term+`, which matches `(term term*)`.

> Note: Quantified terms are always greedy.

The order of precedence is parenthesization, then quantification, then concatenation, then alternation.

Some lines in a production definition might have a comment like:

```
production-a ::=
  production-b      # clarifying comment

```

These comments are meant to be informative only. For instance a comment that says `# not followed by non-ws char` just means that you should be aware that actual production rules will behave as described even though it might not be obvious from the content of that particular production alone.

## 4.2. Production Parameters

Some productions have parameters in parentheses after the name, such as [`s-line-prefix(n,c)`][673]. A parameterized production is shorthand for a (infinite) series of productions, each with a fixed value for each parameter.

For instance, this production:

```
production-a(n) ::= production-b(n)

```

Is shorthand for:

```
production-a(0) ::= production-b(0)
production-a(1) ::= production-b(1)
…

```

And this production:

```
production-a(n) ::=
  ( production-b(n+m) production-c(n+m) )+

```

Is shorthand for:

```
production-a(0) ::=
    ( production-b(0) production-c(0) )+
  | ( production-b(1) production-c(1) )+
  | …
production-a(1) ::=
    ( production-b(1) production-c(1) )+
  | ( production-b(2) production-c(2) )+
  | …
…

```

The parameters are as follows:

Indentation: `n` or `m`

May be any natural number, including zero. `n` may also be -1.

Context: `c`

This parameter allows productions to tweak their behavior according to their surrounding. YAML supports two groups of *contexts*, distinguishing between [block styles][674] and [flow styles][675].

May be any of the following values:

-   `BLOCK-IN` – inside block context
-   `BLOCK-OUT` – outside block context
-   `BLOCK-KEY` – inside block key context
-   `FLOW-IN` – inside flow context
-   `FLOW-OUT` – outside flow context
-   `FLOW-KEY` – inside flow key context

(Block) Chomping: `t`

The [line break][676] chomping behavior for flow scalars. May be any of the following values:

-   `STRIP` – remove all trailing newlines
-   `CLIP` – remove all trailing newlines except the first
-   `KEEP` – retain all trailing newlines

## 4.3. Production Naming Conventions

To make it easier to follow production combinations, production names use a prefix-style naming convention. Each production is given a prefix based on the type of characters it begins and ends with.

`e-`

A production matching no characters.

`c-`

A production starting and ending with a special character.

`b-`

A production matching a single [line break][677].

`nb-`

A production starting and ending with a non-[break][678] character.

`s-`

A production starting and ending with a [white space][679] character.

`ns-`

A production starting and ending with a non-[space][680] character.

`l-`

A production matching complete line(s).

`X-Y-`

A production starting with an `X-` character and ending with a `Y-` character, where `X-` and `Y-` are any of the above prefixes.

`X+`, `X-Y+`

A production as above, with the additional property that the matched content [indentation][681] level is greater than the specified `n` parameter.

## Chapter 5. Character Productions

## 5.1. Character Set

To ensure readability, YAML [streams][682] use only the *printable* subset of the Unicode character set. The allowed character range explicitly excludes the C0 control block[15][683] `x00-x1F` (except for TAB `x09`, LF `x0A` and CR `x0D` which are allowed), DEL `x7F`, the C1 control block `x80-x9F` (except for NEL `x85` which is allowed), the surrogate block[16][684] `xD800-xDFFF`, `xFFFE` and `xFFFF`.

On input, a YAML [processor][685] must accept all characters in this printable subset.

On output, a YAML [processor][686] must only produce only characters in this printable subset. Characters outside this set must be [presented][687] using [escape][688] sequences. In addition, any allowed characters known to be non-printable should also be [escaped][689].

> Note: This isn’t mandatory since a full implementation would require extensive character property tables.

```
[1] c-printable ::=
                         # 8 bit
    x09                  # Tab (\t)
  | x0A                  # Line feed (LF \n)
  | x0D                  # Carriage Return (CR \r)
  | [x20-x7E]            # Printable ASCII
                         # 16 bit
  | x85                  # Next Line (NEL)
  | [xA0-xD7FF]          # Basic Multilingual Plane (BMP)
  | [xE000-xFFFD]        # Additional Unicode Areas
  | [x010000-x10FFFF]    # 32 bit

```

To ensure [JSON compatibility][690], YAML [processors][691] must allow all non-C0 characters inside [quoted scalars][692]. To ensure readability, non-printable characters should be [escaped][693] on output, even inside such [scalars][694].

> Note: JSON [quoted scalars][695] cannot span multiple lines or contain [tabs][696], but YAML [quoted scalars][697] can.

```
[2] nb-json ::=
    x09              # Tab character
  | [x20-x10FFFF]    # Non-C0-control characters

```

> Note: The production name `nb-json` means “non-break JSON compatible” here.

## 5.2. Character Encodings

All characters mentioned in this specification are Unicode code points. Each such code point is written as one or more bytes depending on the *character encoding* used. Note that in UTF-16, characters above `xFFFF` are written as four bytes, using a surrogate pair.

The character encoding is a [presentation detail][698] and must not be used to convey [content][699] information.

On input, a YAML [processor][700] must support the UTF-8 and UTF-16 character encodings. For [JSON compatibility][701], the UTF-32 encodings must also be supported.

If a character [stream][702] begins with a *byte order mark*, the character encoding will be taken to be as indicated by the byte order mark. Otherwise, the [stream][703] must begin with an ASCII character. This allows the encoding to be deduced by the pattern of null (`x00`) characters.

Byte order marks may appear at the start of any [document][704], however all [documents][705] in the same [stream][706] must use the same character encoding.

To allow for [JSON compatibility][707], byte order marks are also allowed inside [quoted scalars][708]. For readability, such [content][709] byte order marks should be [escaped][710] on output.

The encoding can therefore be deduced by matching the first few bytes of the [stream][711] with the following table rows (in order):

|   | Byte0 | Byte1 | Byte2 | Byte3 | Encoding |
| --- | --- | --- | --- | --- | --- |
| Explicit BOM | x00 | x00 | xFE | xFF | UTF-32BE |
| ASCII first character | x00 | x00 | x00 | any | UTF-32BE |
| Explicit BOM | xFF | xFE | x00 | x00 | UTF-32LE |
| ASCII first character | any | x00 | x00 | x00 | UTF-32LE |
| Explicit BOM | xFE | xFF |   |   | UTF-16BE |
| ASCII first character | x00 | any |   |   | UTF-16BE |
| Explicit BOM | xFF | xFE |   |   | UTF-16LE |
| ASCII first character | any | x00 |   |   | UTF-16LE |
| Explicit BOM | xEF | xBB | xBF |   | UTF-8 |
| Default |   |   |   |   | UTF-8 |

The recommended output encoding is UTF-8. If another encoding is used, it is recommended that an explicit byte order mark be used, even if the first [stream][712] character is ASCII.

For more information about the byte order mark and the Unicode character encoding schemes see the Unicode FAQ[17][713].

```
[3] c-byte-order-mark ::= xFEFF

```

In the examples, byte order mark characters are displayed as “`⇔`”.

**Example 5.1 Byte Order Mark**

<table><tbody><tr><td><pre><mark>⇔</mark># Comment only.

</pre></td><td><pre># This stream contains no
# documents, only comments.
</pre></td></tr></tbody></table>

**Example 5.2 Invalid Byte Order Mark**

<table><tbody><tr><td><pre>- Invalid use of BOM
<mark>⇔</mark>
- Inside a document.
</pre></td><td><pre>ERROR:
 A <mark>BOM</mark> must not appear
 inside a document.
</pre></td></tr></tbody></table>

## 5.3. Indicator Characters

*Indicators* are characters that have special semantics.

”`-`” (`x2D`, hyphen) denotes a [block sequence][714] entry.

```
[4] c-sequence-entry ::= '-'

```

”`?`” (`x3F`, question mark) denotes a [mapping key][715].

```
[5] c-mapping-key ::= '?'

```

”`:`” (`x3A`, colon) denotes a [mapping value][716].

```
[6] c-mapping-value ::= ':'

```

**Example 5.3 Block Structure Indicators**

<table><tbody><tr><td><pre>sequence<mark>:</mark>
<mark>-</mark> one
<mark>-</mark> two
mapping<mark>:</mark>
  <mark>?</mark> sky
  <mark>:</mark> blue
  sea <mark>:</mark> green
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"sequence"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>"one"</span><span>,</span><span>
    </span><span>"two"</span><span> </span><span>],</span><span>
  </span><span>"mapping"</span><span>:</span><span> </span><span>{</span><span>
    </span><span>"sky"</span><span>:</span><span> </span><span>"blue"</span><span>,</span><span>
    </span><span>"sea"</span><span>:</span><span> </span><span>"green"</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

”`,`” (`x2C`, comma) ends a [flow collection][717] entry.

```
[7] c-collect-entry ::= ','

```

”`[`” (`x5B`, left bracket) starts a [flow sequence][718].

```
[8] c-sequence-start ::= '['

```

”`]`” (`x5D`, right bracket) ends a [flow sequence][719].

```
[9] c-sequence-end ::= ']'

```

”`{`” (`x7B`, left brace) starts a [flow mapping][720].

```
[10] c-mapping-start ::= '{'

```

”`}`” (`x7D`, right brace) ends a [flow mapping][721].

```
[11] c-mapping-end ::= '}'

```

**Example 5.4 Flow Collection Indicators**

<table><tbody><tr><td><pre>sequence: <mark>[</mark> one<mark>,</mark> two<mark>,</mark> <mark>]</mark>
mapping: <mark>{</mark> sky: blue<mark>,</mark> sea: green <mark>}</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"sequence"</span><span>:</span><span> </span><span>[</span><span> </span><span>"one"</span><span>,</span><span> </span><span>"two"</span><span> </span><span>],</span><span>
  </span><span>"mapping"</span><span>:</span><span>
    </span><span>{</span><span> </span><span>"sky"</span><span>:</span><span> </span><span>"blue"</span><span>,</span><span> </span><span>"sea"</span><span>:</span><span> </span><span>"green"</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[c-sequence-start][722] [c-sequence-end][723]`
-   `[c-mapping-start][724] [c-mapping-end][725]`
-   `[c-collect-entry][726]`

”`#`” (`x23`, octothorpe, hash, sharp, pound, number sign) denotes a [comment][727].

```
[12] c-comment ::= '#'

```

”`&`” (`x26`, ampersand) denotes a [node’s anchor property][728].

```
[13] c-anchor ::= '&'

```

”`*`” (`x2A`, asterisk) denotes an [alias node][729].

```
[14] c-alias ::= '*'

```

The “`!`” (`x21`, exclamation) is used for specifying [node tags][730]. It is used to denote [tag handles][731] used in [tag directives][732] and [tag properties][733]; to denote [local tags][734]; and as the [non-specific tag][735] for non-[plain scalars][736].

```
[15] c-tag ::= '!'

```

**Example 5.6 Node Property Indicators**

<table><tbody><tr><td><pre>anchored: <mark>!</mark>local <mark>&amp;</mark>anchor value
alias: <mark>*</mark>anchor
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"anchored"</span><span>:</span><span> </span><span>!local</span><span> </span><span>&amp;A</span><span>1</span><span> </span><span>"value"</span><span>,</span><span>
  </span><span>"alias"</span><span>:</span><span> </span><span>*A</span><span>1</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[c-tag][737]`
-   `[c-anchor][738]`
-   `[c-alias][739]`

”`|`” (`7C`, vertical bar) denotes a [literal block scalar][740].

```
[16] c-literal ::= '|'

```

”`>`” (`x3E`, greater than) denotes a [folded block scalar][741].

```
[17] c-folded ::= '>'

```

**Example 5.7 Block Scalar Indicators**

<table><tbody><tr><td><pre>literal: <mark>|</mark>
  some
  text
folded: <mark>&gt;</mark>
  some
  text
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"literal"</span><span>:</span><span> </span><span>"some</span><span>\n</span><span>text</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>"folded"</span><span>:</span><span> </span><span>"some text</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[c-literal][742]`
-   `[c-folded][743]`

”`'`” (`x27`, apostrophe, single quote) surrounds a [single-quoted flow scalar][744].

```
[18] c-single-quote ::= "'"

```

”`"`” (`x22`, double quote) surrounds a [double-quoted flow scalar][745].

```
[19] c-double-quote ::= '"'

```

**Example 5.8 Quoted Scalar Indicators**

<table><tbody><tr><td><pre>single: <mark>'</mark>text<mark>'</mark>
double: <mark>"</mark>text<mark>"</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"single"</span><span>:</span><span> </span><span>"text"</span><span>,</span><span>
  </span><span>"double"</span><span>:</span><span> </span><span>"text"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

”`%`” (`x25`, percent) denotes a [directive][746] line.

```
[20] c-directive ::= '%'

```

**Example 5.9 Directive Indicator**

<table><tbody><tr><td><pre><mark>%</mark>YAML 1.2
--- text
</pre></td><td></td></tr></tbody></table>

The “`@`” (`x40`, at) and “`` ` ``” (`x60`, grave accent) are *reserved* for future use.

```
[21] c-reserved ::=
    '@' | '`'

```

**Example 5.10 Invalid use of Reserved Indicators**

<table><tbody><tr><td><pre>commercial-at: <mark>@</mark>text
grave-accent: <mark>`</mark>text
</pre></td><td><pre>ERROR:
 <mark>Reserved indicators</mark> can't
 start a plain scalar.
</pre></td></tr></tbody></table>

Any indicator character:

```
[22] c-indicator ::=
    c-sequence-entry    # '-'
  | c-mapping-key       # '?'
  | c-mapping-value     # ':'
  | c-collect-entry     # ','
  | c-sequence-start    # '['
  | c-sequence-end      # ']'
  | c-mapping-start     # '{'
  | c-mapping-end       # '}'
  | c-comment           # '#'
  | c-anchor            # '&'
  | c-alias             # '*'
  | c-tag               # '!'
  | c-literal           # '|'
  | c-folded            # '>'
  | c-single-quote      # "'"
  | c-double-quote      # '"'
  | c-directive         # '%'
  | c-reserved          # '@' '`'

```

The “`[`”, “`]`”, “`{`”, “`}`” and “`,`” indicators denote structure in [flow collections][765]. They are therefore forbidden in some cases, to avoid ambiguity in several constructs. This is handled on a case-by-case basis by the relevant productions.

```
[23] c-flow-indicator ::=
    c-collect-entry     # ','
  | c-sequence-start    # '['
  | c-sequence-end      # ']'
  | c-mapping-start     # '{'
  | c-mapping-end       # '}'

```

## 5.4. Line Break Characters

YAML recognizes the following ASCII *line break* characters.

```
[24] b-line-feed ::= x0A

```

```
[25] b-carriage-return ::= x0D

```

```
[26] b-char ::=
    b-line-feed          # x0A
  | b-carriage-return    # X0D

```

All other characters, including the form feed (`x0C`), are considered to be non-break characters. Note that these include the *non-ASCII line breaks*: next line (`x85`), line separator (`x2028`) and paragraph separator (`x2029`).

[YAML version 1.1][773] did support the above non-ASCII line break characters; however, JSON does not. Hence, to ensure [JSON compatibility][774], YAML treats them as non-break characters as of version 1.2. YAML 1.2 [processors][775] [parsing][776] a [version 1.1][777] [document][778] should therefore treat these line breaks as non-break characters, with an appropriate warning.

```
[27] nb-char ::=
  c-printable - b-char - c-byte-order-mark

```

Line breaks are interpreted differently by different systems and have multiple widely used formats.

```
[28] b-break ::=
    (
      b-carriage-return  # x0A
      b-line-feed
    )                    # x0D
  | b-carriage-return
  | b-line-feed

```

Line breaks inside [scalar content][786] must be *normalized* by the YAML [processor][787]. Each such line break must be [parsed][788] into a single line feed character. The original line break format is a [presentation detail][789] and must not be used to convey [content][790] information.

```
[29] b-as-line-feed ::=
  b-break

```

Outside [scalar content][792], YAML allows any line break to be used to terminate lines.

```
[30] b-non-content ::=
  b-break

```

On output, a YAML [processor][794] is free to emit line breaks using whatever convention is most appropriate.

In the examples, line breaks are sometimes displayed using the “`↓`” glyph for clarity.

**Example 5.11 Line Break Characters**

<table><tbody><tr><td><pre>|
  Line break (no glyph)
  Line break (glyphed)<mark>↓</mark>
</pre></td><td><div><pre><code><span>"Line break (no glyph)</span><span>\n</span><span>Line break (glyphed)</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 5.5. White Space Characters

YAML recognizes two *white space* characters: *space* and *tab*.

```
[31] s-space ::= x20

```

```
[32] s-tab ::= x09

```

```
[33] s-white ::=
  s-space | s-tab

```

The rest of the ([printable][797]) non-[break][798] characters are considered to be non-space characters.

```
[34] ns-char ::=
  nb-char - s-white

```

In the examples, tab characters are displayed as the glyph “`→`”. Space characters are sometimes displayed as the glyph “`·`” for clarity.

**Example 5.12 Tabs and Spaces**

<table><tbody><tr><td><pre># Tabs and spaces
quoted:<mark>·</mark>"Quoted <mark>→</mark>"
block:<mark>→</mark>|
<mark>··</mark>void main() {
<mark>··</mark><mark>→</mark>printf("Hello, world!\n");
<mark>··</mark>}
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"quoted"</span><span>:</span><span> </span><span>"Quoted </span><span>\t</span><span>"</span><span>,</span><span>
  </span><span>"block"</span><span>:</span><span> </span><span>"void main()
    {</span><span>\n\t</span><span>printf(</span><span>\"</span><span>Hello, world!</span><span>\\</span><span>n</span><span>\"</span><span>);</span><span>\n</span><span>}</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 5.6. Miscellaneous Characters

The YAML syntax productions make use of the following additional character classes:

A decimal digit for numbers:

```
[35] ns-dec-digit ::=
  [x30-x39]             # 0-9

```

A hexadecimal digit for [escape sequences][801]:

```
[36] ns-hex-digit ::=
    ns-dec-digit        # 0-9
  | [x41-x46]           # A-F
  | [x61-x66]           # a-f

```

ASCII letter (alphabetic) characters:

```
[37] ns-ascii-letter ::=
    [x41-x5A]           # A-Z
  | [x61-x7A]           # a-z

```

Word (alphanumeric) characters for identifiers:

```
[38] ns-word-char ::=
    ns-dec-digit        # 0-9
  | ns-ascii-letter     # A-Z a-z
  | '-'                 # '-'

```

URI characters for [tags][805], as defined in the URI specification[18][806].

By convention, any URI characters other than the allowed printable ASCII characters are first *encoded* in UTF-8 and then each byte is *escaped* using the “`%`” character. The YAML [processor][807] must not expand such escaped characters. [Tag][808] characters must be preserved and compared exactly as [presented][809] in the YAML [stream][810], without any processing.

```
[39] ns-uri-char ::=
    (
      '%'
      ns-hex-digit{2}
    )
  | ns-word-char
  | '#'
  | ';'
  | '/'
  | '?'
  | ':'
  | '@'
  | '&'
  | '='
  | '+'
  | '$'
  | ','
  | '_'
  | '.'
  | '!'
  | '~'
  | '*'
  | "'"
  | '('
  | ')'
  | '['
  | ']'

```

The “`!`” character is used to indicate the end of a [named tag handle][813]; hence its use in [tag shorthands][814] is restricted. In addition, such [shorthands][815] must not contain the “`[`”, “`]`”, “`{`”, “`}`” and “`,`” characters. These characters would cause ambiguity with [flow collection][816] structures.

```
[40] ns-tag-char ::=
    ns-uri-char
  - c-tag               # '!'
  - c-flow-indicator

```

## 5.7. Escaped Characters

All non-[printable][820] characters must be *escaped*. YAML escape sequences use the “`\`” notation common to most modern computer languages. Each escape sequence must be [parsed][821] into the appropriate Unicode character. The original escape sequence is a [presentation detail][822] and must not be used to convey [content][823] information.

Note that escape sequences are only interpreted in [double-quoted scalars][824]. In all other [scalar styles][825], the “`\`” character has no special meaning and non-[printable][826] characters are not available.

```
[41] c-escape ::= '\'

```

YAML escape sequences are a superset of C’s escape sequences:

Escaped ASCII null (`x00`) character.

```
[42] ns-esc-null ::= '0'

```

Escaped ASCII bell (`x07`) character.

```
[43] ns-esc-bell ::= 'a'

```

Escaped ASCII backspace (`x08`) character.

```
[44] ns-esc-backspace ::= 'b'

```

Escaped ASCII horizontal tab (`x09`) character. This is useful at the start or the end of a line to force a leading or trailing tab to become part of the [content][827].

```
[45] ns-esc-horizontal-tab ::=
  't' | x09

```

Escaped ASCII line feed (`x0A`) character.

```
[46] ns-esc-line-feed ::= 'n'

```

Escaped ASCII vertical tab (`x0B`) character.

```
[47] ns-esc-vertical-tab ::= 'v'

```

Escaped ASCII form feed (`x0C`) character.

```
[48] ns-esc-form-feed ::= 'f'

```

Escaped ASCII carriage return (`x0D`) character.

```
[49] ns-esc-carriage-return ::= 'r'

```

Escaped ASCII escape (`x1B`) character.

```
[50] ns-esc-escape ::= 'e'

```

Escaped ASCII space (`x20`) character. This is useful at the start or the end of a line to force a leading or trailing space to become part of the [content][828].

```
[51] ns-esc-space ::= x20

```

Escaped ASCII double quote (`x22`).

```
[52] ns-esc-double-quote ::= '"'

```

Escaped ASCII slash (`x2F`), for [JSON compatibility][829].

```
[53] ns-esc-slash ::= '/'

```

Escaped ASCII back slash (`x5C`).

```
[54] ns-esc-backslash ::= '\'

```

Escaped Unicode next line (`x85`) character.

```
[55] ns-esc-next-line ::= 'N'

```

Escaped Unicode non-breaking space (`xA0`) character.

```
[56] ns-esc-non-breaking-space ::= '_'

```

Escaped Unicode line separator (`x2028`) character.

```
[57] ns-esc-line-separator ::= 'L'

```

Escaped Unicode paragraph separator (`x2029`) character.

```
[58] ns-esc-paragraph-separator ::= 'P'

```

Escaped 8-bit Unicode character.

```
[59] ns-esc-8-bit ::=
  'x'
  ns-hex-digit{2}

```

Escaped 16-bit Unicode character.

```
[60] ns-esc-16-bit ::=
  'u'
  ns-hex-digit{4}

```

Escaped 32-bit Unicode character.

```
[61] ns-esc-32-bit ::=
  'U'
  ns-hex-digit{8}

```

Any escaped character:

```
[62] c-ns-esc-char ::=
  c-escape         # '\'
  (
      ns-esc-null
    | ns-esc-bell
    | ns-esc-backspace
    | ns-esc-horizontal-tab
    | ns-esc-line-feed
    | ns-esc-vertical-tab
    | ns-esc-form-feed
    | ns-esc-carriage-return
    | ns-esc-escape
    | ns-esc-space
    | ns-esc-double-quote
    | ns-esc-slash
    | ns-esc-backslash
    | ns-esc-next-line
    | ns-esc-non-breaking-space
    | ns-esc-line-separator
    | ns-esc-paragraph-separator
    | ns-esc-8-bit
    | ns-esc-16-bit
    | ns-esc-32-bit
  )

```

**Example 5.13 Escaped Characters**

<table><tbody><tr><td><pre>- "Fun with <mark>\\</mark>"
- "<mark>\"</mark> <mark>\a</mark> <mark>\b</mark> <mark>\e</mark> <mark>\f</mark>"
- "<mark>\n</mark> <mark>\r</mark> <mark>\t</mark> <mark>\v</mark> <mark>\0</mark>"
- "<mark>\ </mark> <mark>\_</mark> <mark>\N</mark> <mark>\L</mark> <mark>\P</mark> \
  <mark>\x41</mark> <mark>\u0041</mark> <mark>\U00000041</mark>"
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"Fun with </span><span>\\</span><span>"</span><span>,</span><span>
  </span><span>"</span><span>\"</span><span> </span><span>\u</span><span>0007 </span><span>\b</span><span> </span><span>\u</span><span>001b </span><span>\f</span><span>"</span><span>,</span><span>
  </span><span>"</span><span>\n</span><span> </span><span>\r</span><span> </span><span>\t</span><span> </span><span>\u</span><span>000b </span><span>\u</span><span>0000"</span><span>,</span><span>
  </span><span>"</span><span>\u</span><span>0020 </span><span>\u</span><span>00a0 </span><span>\u</span><span>0085 </span><span>\u</span><span>2028 </span><span>\u</span><span>2029 A A A"</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Example 5.14 Invalid Escaped Characters**

<table><tbody><tr><td><pre>Bad escapes:
  "\<mark>c</mark>
  \x<mark>q-</mark>"
</pre></td><td><pre>ERROR:
- <mark>c</mark> is an invalid escaped character.
- <mark>q</mark> and <mark>-</mark> are invalid hex digits.
</pre></td></tr></tbody></table>

## Chapter 6. Structural Productions

## 6.1. Indentation Spaces

In YAML [block styles][854], structure is determined by *indentation*. In general, indentation is defined as a zero or more [space][855] characters at the start of a line.

To maintain portability, [tab][856] characters must not be used in indentation, since different systems treat [tabs][857] differently. Note that most modern editors may be configured so that pressing the [tab][858] key results in the insertion of an appropriate number of [spaces][859].

The amount of indentation is a [presentation detail][860] and must not be used to convey [content][861] information.

```
[63]
s-indent(0) ::=
  <empty>

# When n≥0
s-indent(n+1) ::=
  s-space s-indent(n)

```

A [block style][864] construct is terminated when encountering a line which is less indented than the construct. The productions use the notation “`s-indent-less-than(n)`” and “`s-indent-less-or-equal(n)`” to express this.

```
[64]
s-indent-less-than(1) ::=
  <empty>

# When n≥1
s-indent-less-than(n+1) ::=
  s-space s-indent-less-than(n)
  | <empty>

```

```
[65]
s-indent-less-or-equal(0) ::=
  <empty>

# When n≥0
s-indent-less-or-equal(n+1) ::=
  s-space s-indent-less-or-equal(n)
  | <empty>

```

Each [node][869] must be indented further than its parent [node][870]. All sibling [nodes][871] must use the exact same indentation level. However the [content][872] of each sibling [node][873] may be further indented independently.

**Example 6.1 Indentation Spaces**

<table><tbody><tr><td><pre><mark>··</mark># Leading comment line spaces are
<mark>···</mark># neither content nor indentation.
<mark>····</mark>
Not indented:
<mark>·</mark>By one space: |
<mark>····</mark>By four
<mark>····</mark><mark>··</mark>spaces
<mark>·</mark>Flow style: [    # Leading spaces
<mark>··</mark><mark>·</mark>By two,        # in flow style
<mark>··</mark>Also by two,    # are neither
<mark>··</mark>→Still by two   # content nor
<mark>··</mark><mark>··</mark>]             # indentation.
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"Not indented"</span><span>:</span><span> </span><span>{</span><span>
    </span><span>"By one space"</span><span>:</span><span> </span><span>"By four</span><span>\n</span><span>  spaces</span><span>\n</span><span>"</span><span>,</span><span>
    </span><span>"Flow style"</span><span>:</span><span> </span><span>[</span><span>
      </span><span>"By two"</span><span>,</span><span>
      </span><span>"Also by two"</span><span>,</span><span>
      </span><span>"Still by two"</span><span> </span><span>]</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[s-indent(n)][874]`
-   `Content`
-   `Neither content nor indentation`

The “`-`”, “`?`” and “`:`” characters used to denote [block collection][875] entries are perceived by people to be part of the indentation. This is handled on a case-by-case basis by the relevant productions.

**Example 6.2 Indentation Indicators**

<table><tbody><tr><td><pre><mark><mark>?</mark></mark>·a
<mark><mark>:</mark><mark>·</mark><mark>-</mark></mark>→b
<mark><mark>··</mark><mark>-</mark><mark>··</mark><mark>-</mark></mark>→c
<mark><mark>·····</mark><mark>-</mark></mark>·d
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"a"</span><span>:</span><span>
  </span><span>[</span><span> </span><span>"b"</span><span>,</span><span>
    </span><span>[</span><span> </span><span>"c"</span><span>,</span><span>
      </span><span>"d"</span><span> </span><span>]</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `Total Indentation`
-   `[s-indent(n)][876]`
-   `Indicator as indentation`

## 6.2. Separation Spaces

Outside [indentation][877] and [scalar content][878], YAML uses [white space][879] characters for *separation* between tokens within a line. Note that such [white space][880] may safely include [tab][881] characters.

Separation spaces are a [presentation detail][882] and must not be used to convey [content][883] information.

```
[66] s-separate-in-line ::=
    s-white+
  | <start-of-line>

```

**Example 6.3 Separation Spaces**

<table><tbody><tr><td><pre>-<mark>·</mark>foo:<mark>→·</mark>bar
- -<mark>·</mark>baz
  -<mark>→</mark>baz
</pre></td><td><div><pre><code><span>[</span><span> </span><span>{</span><span> </span><span>"foo"</span><span>:</span><span> </span><span>"bar"</span><span> </span><span>},</span><span>
  </span><span>[</span><span> </span><span>"baz"</span><span>,</span><span>
    </span><span>"baz"</span><span> </span><span>]</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 6.3. Line Prefixes

Inside [scalar content][885], each line begins with a non-[content][886] *line prefix*. This prefix always includes the [indentation][887]. For [flow scalar styles][888] it additionally includes all leading [white space][889], which may contain [tab][890] characters.

Line prefixes are a [presentation detail][891] and must not be used to convey [content][892] information.

```
[67]
s-line-prefix(n,BLOCK-OUT) ::= s-block-line-prefix(n)
s-line-prefix(n,BLOCK-IN)  ::= s-block-line-prefix(n)
s-line-prefix(n,FLOW-OUT)  ::= s-flow-line-prefix(n)
s-line-prefix(n,FLOW-IN)   ::= s-flow-line-prefix(n)

```

```
[68] s-block-line-prefix(n) ::=
  s-indent(n)

```

```
[69] s-flow-line-prefix(n) ::=
  s-indent(n)
  s-separate-in-line?

```

**Example 6.4 Line Prefixes**

<table><tbody><tr><td><pre>plain: text
<mark><mark>·</mark>·</mark>lines
quoted: "text
<mark><mark>·</mark>·→</mark>lines"
block: |
<mark><mark>··</mark></mark>text
<mark><mark>··</mark></mark>·→lines
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"plain"</span><span>:</span><span> </span><span>"text lines"</span><span>,</span><span>
  </span><span>"quoted"</span><span>:</span><span> </span><span>"text lines"</span><span>,</span><span>
  </span><span>"block"</span><span>:</span><span> </span><span>"text</span><span>\n</span><span> </span><span>\t</span><span>lines</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 6.4. Empty Lines

An *empty line* line consists of the non-[content][900] [prefix][901] followed by a [line break][902].

```
[70] l-empty(n,c) ::=
  (
      s-line-prefix(n,c)
    | s-indent-less-than(n)
  )
  b-as-line-feed

```

The semantics of empty lines depend on the [scalar style][906] they appear in. This is handled on a case-by-case basis by the relevant productions.

**Example 6.5 Empty Lines**

<table><tbody><tr><td><pre>Folding:
  "Empty line
<mark>···→</mark>
  as a line feed"
Chomping: |
  Clipped empty lines
<mark>·</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"Folding"</span><span>:</span><span> </span><span>"Empty line</span><span>\n</span><span>as a line feed"</span><span>,</span><span>
  </span><span>"Chomping"</span><span>:</span><span> </span><span>"Clipped empty lines</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 6.5. Line Folding

*Line folding* allows long lines to be broken for readability, while retaining the semantics of the original long line. If a [line break][907] is followed by an [empty line][908], it is *trimmed*; the first [line break][909] is discarded and the rest are retained as [content][910].

```
[71] b-l-trimmed(n,c) ::=
  b-non-content
  l-empty(n,c)+

```

Otherwise (the following line is not [empty][913]), the [line break][914] is converted to a single [space][915] (`x20`).

```
[72] b-as-space ::=
  b-break

```

A folded non-[empty line][917] may end with either of the above [line breaks][918].

```
[73] b-l-folded(n,c) ::=
  b-l-trimmed(n,c) | b-as-space

```

**Example 6.6 Line Folding**

<table><tbody><tr><td><pre>&gt;-
  trimmed<mark>↓</mark>
<mark>··↓</mark>
<mark>·↓</mark>
<mark>↓</mark>
  as<mark>↓</mark>
  space
</pre></td><td></td></tr></tbody></table>

The above rules are common to both the [folded block style][921] and the [scalar flow styles][922]. Folding does distinguish between these cases in the following way:

Block Folding

In the [folded block style][923], the final [line break][924] and trailing [empty lines][925] are subject to [chomping][926] and are never folded. In addition, folding does not apply to [line breaks][927] surrounding text lines that contain leading [white space][928]. Note that such a [more-indented][929] line may consist only of such leading [white space][930].

The combined effect of the *block line folding* rules is that each “paragraph” is interpreted as a line, [empty lines][931] are interpreted as a line feed and the formatting of [more-indented][932] lines is preserved.

**Example 6.7 Block Folding**

<table><tbody><tr><td><pre>&gt;
<mark>··</mark>foo<mark>·</mark><mark>↓</mark>
<mark>·↓</mark>
<mark>··</mark><mark>→·</mark>bar<mark>↓</mark>
<mark>↓</mark>
<mark>··</mark>baz↓
</pre></td><td><div><pre><code><span>"foo </span><span>\n\n\t</span><span> bar</span><span>\n\n</span><span>baz</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[b-l-folded(n,c)][933]`
-   `Non-content spaces`
-   `Content spaces`

Flow Folding

Folding in [flow styles][934] provides more relaxed semantics. [Flow styles][935] typically depend on explicit [indicators][936] rather than [indentation][937] to convey structure. Hence spaces preceding or following the text in a line are a [presentation detail][938] and must not be used to convey [content][939] information. Once all such spaces have been discarded, all [line breaks][940] are folded without exception.

The combined effect of the *flow line folding* rules is that each “paragraph” is interpreted as a line, [empty lines][941] are interpreted as line feeds and text can be freely [more-indented][942] without affecting the [content][943] information.

```
[74] s-flow-folded(n) ::=
  s-separate-in-line?
  b-l-folded(n,FLOW-IN)
  s-flow-line-prefix(n)

```

**Example 6.8 Flow Folding**

<table><tbody><tr><td><pre>"<mark>↓</mark>
<mark><mark>··</mark></mark>foo<mark><mark>·</mark>↓</mark>
<mark><mark>·</mark>↓</mark>
<mark><mark>··→·</mark></mark>bar<mark>↓</mark>
<mark>↓</mark>
<mark><mark>··</mark></mark>baz<mark>↓</mark> "
</pre></td><td></td></tr></tbody></table>

**Legend:**

-   `[s-flow-folded(n)][947]`
-   `Non-content spaces`

An explicit *comment* is marked by a “`#`” indicator. Comments are a [presentation detail][948] and must not be used to convey [content][949] information.

Comments must be [separated][950] from other tokens by [white space][951] characters.

> Note: To ensure [JSON compatibility][952], YAML [processors][953] must allow for the omission of the final comment [line break][954] of the input [stream][955]. However, as this confuses many tools, YAML [processors][956] should terminate the [stream][957] with an explicit [line break][958] on output.

```
[75] c-nb-comment-text ::=
  c-comment    # '#'
  nb-char*

```

```
[76] b-comment ::=
    b-non-content
  | <end-of-input>

```

```
[77] s-b-comment ::=
  (
    s-separate-in-line
    c-nb-comment-text?
  )?
  b-comment

```

Outside [scalar content][965], comments may appear on a line of their own, independent of the [indentation][966] level. Note that outside [scalar content][967], a line containing only [white space][968] characters is taken to be a comment line.

```
[78] l-comment ::=
  s-separate-in-line
  c-nb-comment-text?
  b-comment

```

In most cases, when a line may end with a comment, YAML allows it to be followed by additional comment lines. The only exception is a comment ending a [block scalar header][972].

```
[79] s-l-comments ::=
  (
      s-b-comment
    | <start-of-line>
  )
  l-comment*

```

## 6.7. Separation Lines

[Implicit keys][975] are restricted to a single line. In all other cases, YAML allows tokens to be separated by multi-line (possibly empty) [comments][976].

Note that structures following multi-line comment separation must be properly [indented][977], even though there is no such restriction on the separation [comment][978] lines themselves.

```
[80]
s-separate(n,BLOCK-OUT) ::= s-separate-lines(n)
s-separate(n,BLOCK-IN)  ::= s-separate-lines(n)
s-separate(n,FLOW-OUT)  ::= s-separate-lines(n)
s-separate(n,FLOW-IN)   ::= s-separate-lines(n)
s-separate(n,BLOCK-KEY) ::= s-separate-in-line
s-separate(n,FLOW-KEY)  ::= s-separate-in-line

```

```
[81] s-separate-lines(n) ::=
    (
      s-l-comments
      s-flow-line-prefix(n)
    )
  | s-separate-in-line

```

**Example 6.12 Separation Spaces**

<table><tbody><tr><td><pre>{<mark>·</mark>first:<mark>·</mark>Sammy,<mark>·</mark>last:<mark>·</mark>Sosa<mark>·</mark>}:<mark>↓</mark>
<mark># Statistics:</mark>
<mark><mark>··</mark></mark>hr:<mark>··# Home runs</mark>
<mark><mark>···</mark>··</mark>65
<mark>··</mark>avg:<mark>·# Average</mark>
<mark><mark>···</mark></mark>0.278
</pre></td><td><div><pre><code><span>{</span><span> </span><span>{</span><span> </span><span>"first"</span><span>:</span><span> </span><span>"Sammy"</span><span>,</span><span>
    </span><span>"last"</span><span>:</span><span> </span><span>"Sosa"</span><span> </span><span>}</span><span>:</span><span> </span><span>{</span><span>
    </span><span>"hr"</span><span>:</span><span> </span><span>65</span><span>,</span><span>
    </span><span>"avg"</span><span>:</span><span> </span><span>0.278</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 6.8. Directives

*Directives* are instructions to the YAML [processor][988]. This specification defines two directives, “`YAML`” and “`TAG`”, and *reserves* all other directives for future use. There is no way to define private directives. This is intentional.

Directives are a [presentation detail][989] and must not be used to convey [content][990] information.

```
[82] l-directive ::=
  c-directive            # '%'
  (
      ns-yaml-directive
    | ns-tag-directive
    | ns-reserved-directive
  )
  s-l-comments

```

Each directive is specified on a separate non-[indented][996] line starting with the “`%`” indicator, followed by the directive name and a list of parameters. The semantics of these parameters depends on the specific directive. A YAML [processor][997] should ignore unknown directives with an appropriate warning.

```
[83] ns-reserved-directive ::=
  ns-directive-name
  (
    s-separate-in-line
    ns-directive-parameter
  )*

```

```
[84] ns-directive-name ::=
  ns-char+

```

```
[85] ns-directive-parameter ::=
  ns-char+

```

**Example 6.13 Reserved Directives**

<table><tbody><tr><td><pre>%<mark><mark>FOO</mark>  <mark>bar</mark> <mark>baz</mark></mark> # Should be ignored
               # with a warning.
--- "foo"
</pre></td><td></td></tr></tbody></table>

### 6.8.1. “`YAML`” Directives

The “`YAML`” directive specifies the version of YAML the [document][1003] conforms to. This specification defines version “`1.2`”, including recommendations for *YAML 1.1 processing*.

A version 1.2 YAML [processor][1004] must accept [documents][1005] with an explicit “`%YAML 1.2`” directive, as well as [documents][1006] lacking a “`YAML`” directive. Such [documents][1007] are assumed to conform to the 1.2 version specification. [Documents][1008] with a “`YAML`” directive specifying a higher minor version (e.g. “`%YAML 1.3`”) should be processed with an appropriate warning. [Documents][1009] with a “`YAML`” directive specifying a higher major version (e.g. “`%YAML 2.0`”) should be rejected with an appropriate error message.

A version 1.2 YAML [processor][1010] must also accept [documents][1011] with an explicit “`%YAML 1.1`” directive. Note that version 1.2 is mostly a superset of version 1.1, defined for the purpose of ensuring *JSON compatibility*. Hence a version 1.2 [processor][1012] should process version 1.1 [documents][1013] as if they were version 1.2, giving a warning on points of incompatibility (handling of [non-ASCII line breaks][1014], as described [above][1015]).

```
[86] ns-yaml-directive ::=
  "YAML"
  s-separate-in-line
  ns-yaml-version

```

```
[87] ns-yaml-version ::=
  ns-dec-digit+
  '.'
  ns-dec-digit+

```

**Example 6.14 “`YAML`” directive**

<table><tbody><tr><td><pre>%<mark>YAML <mark>1.3</mark></mark> # Attempt parsing
           # with a warning
---
"foo"
</pre></td><td></td></tr></tbody></table>

It is an error to specify more than one “`YAML`” directive for the same document, even if both occurrences give the same version number.

**Example 6.15 Invalid Repeated YAML directive**

<table><tbody><tr><td><pre>%YAML 1.2
%<mark>YAML</mark> 1.1
foo
</pre></td><td><pre>ERROR:
The <mark>YAML</mark> directive must only be
given at most once per document.
</pre></td></tr></tbody></table>

### 6.8.2. “`TAG`” Directives

The “`TAG`” directive establishes a [tag shorthand][1020] notation for specifying [node tags][1021]. Each “`TAG`” directive associates a [handle][1022] with a [prefix][1023]. This allows for compact and readable [tag][1024] notation.

```
[88] ns-tag-directive ::=
  "TAG"
  s-separate-in-line
  c-tag-handle
  s-separate-in-line
  ns-tag-prefix

```

**Example 6.16 “`TAG`” directive**

<table><tbody><tr><td><pre>%<mark>TAG <mark>!yaml!</mark> <mark>tag:yaml.org,2002:</mark></mark>
---
!yaml!str "foo"
</pre></td><td></td></tr></tbody></table>

It is an error to specify more than one “`TAG`” directive for the same [handle][1029] in the same document, even if both occurrences give the same [prefix][1030].

**Example 6.17 Invalid Repeated TAG directive**

<table><tbody><tr><td><pre>%TAG ! !foo
%TAG <mark>!</mark> !foo
bar
</pre></td><td><pre>ERROR:
The TAG directive must only
be given at most once per
<mark>handle</mark> in the same document.
</pre></td></tr></tbody></table>

#### 6.8.2.1. Tag Handles

The *tag handle* exactly matches the prefix of the affected [tag shorthand][1031]. There are three tag handle variants:

```
[89] c-tag-handle ::=
    c-named-tag-handle
  | c-secondary-tag-handle
  | c-primary-tag-handle

```

Primary Handle

The *primary tag handle* is a single “`!`” character. This allows using the most compact possible notation for a single “primary” name space. By default, the prefix associated with this handle is “`!`”. Thus, by default, [shorthands][1035] using this handle are interpreted as [local tags][1036].

It is possible to override the default behavior by providing an explicit “`TAG`” directive, associating a different prefix for this handle. This provides smooth migration from using [local tags][1037] to using [global tags][1038] by the simple addition of a single “`TAG`” directive.

```
[90] c-primary-tag-handle ::= '!'

```

**Example 6.18 Primary Tag Handle**

<table><tbody><tr><td><pre># Private
<mark>!</mark>foo "bar"
...
# Global
%TAG <mark>!</mark> tag:example.com,2000:app/
---
<mark>!</mark>foo "bar"
</pre></td><td><div><pre><code><span>!&lt;!foo&gt;</span><span> </span><span>"bar"</span><span>
</span><span>---</span><span>
</span><span>!&lt;tag:example.com,</span><span>2000</span><span>:app/foo&gt;</span><span> </span><span>"bar"</span><span>
</span></code></pre></div></td></tr></tbody></table>

Secondary Handle

The *secondary tag handle* is written as “`!!`”. This allows using a compact notation for a single “secondary” name space. By default, the prefix associated with this handle is “`tag:yaml.org,2002:`”.

It is possible to override this default behavior by providing an explicit “`TAG`” directive associating a different prefix for this handle.

```
[91] c-secondary-tag-handle ::= "!!"

```

**Example 6.19 Secondary Tag Handle**

<table><tbody><tr><td><pre>%TAG <mark>!!</mark> tag:example.com,2000:app/
---
<mark>!!</mark>int 1 - 3 # Interval, not integer
</pre></td><td><div><pre><code><span>!&lt;tag:example.com,</span><span>2000</span><span>:app/int&gt;</span><span> </span><span>"1 - 3"</span><span>
</span></code></pre></div></td></tr></tbody></table>

Named Handles

A *named tag handle* surrounds a non-empty name with “`!`” characters. A handle name must not be used in a [tag shorthand][1039] unless an explicit “`TAG`” directive has associated some prefix with it.

The name of the handle is a [presentation detail][1040] and must not be used to convey [content][1041] information. In particular, the YAML [processor][1042] need not preserve the handle name once [parsing][1043] is completed.

```
[92] c-named-tag-handle ::=
  c-tag            # '!'
  ns-word-char+
  c-tag            # '!'

```

**Example 6.20 Tag Handles**

<table><tbody><tr><td><pre>%TAG <mark>!e!</mark> tag:example.com,2000:app/
---
<mark>!e!</mark>foo "bar"
</pre></td><td><div><pre><code><span>!&lt;tag:example.com,</span><span>2000</span><span>:app/foo&gt;</span><span> </span><span>"bar"</span><span>
</span></code></pre></div></td></tr></tbody></table>

#### 6.8.2.2. Tag Prefixes

There are two *tag prefix* variants:

```
[93] ns-tag-prefix ::=
  c-ns-local-tag-prefix | ns-global-tag-prefix

```

Local Tag Prefix

If the prefix begins with a “`!`” character, [shorthands][1049] using the [handle][1050] are expanded to a [local tag][1051]. Note that such a [tag][1052] is intentionally not a valid URI and its semantics are specific to the [application][1053]. In particular, two [documents][1054] in the same [stream][1055] may assign different semantics to the same [local tag][1056].

```
[94] c-ns-local-tag-prefix ::=
  c-tag           # '!'
  ns-uri-char*

```

**Example 6.21 Local Tag Prefix**

<table><tbody><tr><td><pre>%TAG !m! <mark>!my-</mark>
--- # Bulb here
!m!light fluorescent
...
%TAG !m! <mark>!my-</mark>
--- # Color here
!m!light green
</pre></td><td><div><pre><code><span>!&lt;!my-light&gt;</span><span> </span><span>"fluorescent"</span><span>
</span><span>---</span><span>
</span><span>!&lt;!my-light&gt;</span><span> </span><span>"green"</span><span>
</span></code></pre></div></td></tr></tbody></table>

Global Tag Prefix

If the prefix begins with a character other than “`!`”, it must be a valid URI prefix, and should contain at least the scheme. [Shorthands][1059] using the associated [handle][1060] are expanded to globally unique URI tags and their semantics is consistent across [applications][1061]. In particular, every [document][1062] in every [stream][1063] must assign the same semantics to the same [global tag][1064].

```
[95] ns-global-tag-prefix ::=
  ns-tag-char
  ns-uri-char*

```

**Example 6.22 Global Tag Prefix**

<table><tbody><tr><td><pre>%TAG !e! <mark>tag:example.com,2000:app/</mark>
---
- !e!foo "bar"
</pre></td><td><pre>- !&lt;tag:example.com,2000:app/foo&gt; "bar"
</pre></td></tr></tbody></table>

## 6.9. Node Properties

Each [node][1067] may have two optional *properties*, [anchor][1068] and [tag][1069], in addition to its [content][1070]. Node properties may be specified in any order before the [node’s content][1071]. Either or both may be omitted.

```
[96] c-ns-properties(n,c) ::=
    (
      c-ns-tag-property
      (
        s-separate(n,c)
        c-ns-anchor-property
      )?
    )
  | (
      c-ns-anchor-property
      (
        s-separate(n,c)
        c-ns-tag-property
      )?
    )

```

**Example 6.23 Node Properties**

<table><tbody><tr><td><pre><mark><mark>!!str</mark> <mark>&amp;a1</mark></mark> "foo":
  <mark><mark>!!str</mark></mark> bar
<mark><mark>&amp;a2</mark></mark> baz : *a1
</pre></td><td><div><pre><code><span>{</span><span> </span><span>&amp;B</span><span>1</span><span> </span><span>"foo"</span><span>:</span><span> </span><span>"bar"</span><span>,</span><span>
  </span><span>"baz"</span><span>:</span><span> </span><span>*B</span><span>1</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 6.9.1. Node Tags

The *tag property* identifies the type of the [native data structure][1078] [presented][1079] by the [node][1080]. A tag is denoted by the “`!`” indicator.

```
[97] c-ns-tag-property ::=
    c-verbatim-tag
  | c-ns-shorthand-tag
  | c-non-specific-tag

```

Verbatim Tags

A tag may be written *verbatim* by surrounding it with the “`<`” and “`>`” characters. In this case, the YAML [processor][1084] must deliver the verbatim tag as-is to the [application][1085]. In particular, verbatim tags are not subject to [tag resolution][1086]. A verbatim tag must either begin with a “`!`” (a [local tag][1087]) or be a valid URI (a [global tag][1088]).

```
[98] c-verbatim-tag ::=
  "!<"
  ns-uri-char+
  '>'

```

Tag Shorthands

A *tag shorthand* consists of a valid [tag handle][1090] followed by a non-empty suffix. The [tag handle][1091] must be associated with a [prefix][1092], either by default or by using a “`TAG`” directive. The resulting [parsed][1093] [tag][1094] is the concatenation of the [prefix][1095] and the suffix and must either begin with “`!`” (a [local tag][1096]) or be a valid URI (a [global tag][1097]).

The choice of [tag handle][1098] is a [presentation detail][1099] and must not be used to convey [content][1100] information. In particular, the [tag handle][1101] may be discarded once [parsing][1102] is completed.

The suffix must not contain any “`!`” character. This would cause the tag shorthand to be interpreted as having a [named tag handle][1103]. In addition, the suffix must not contain the “`[`”, “`]`”, “`{`”, “`}`” and “`,`” characters. These characters would cause ambiguity with [flow collection][1104] structures. If the suffix needs to specify any of the above restricted characters, they must be [escaped][1105] using the “`%`” character. This behavior is consistent with the URI character escaping rules (specifically, section 2.3 of URI RFC).

```
[99] c-ns-shorthand-tag ::=
  c-tag-handle
  ns-tag-char+

```

**Example 6.26 Tag Shorthands**

<table><tbody><tr><td><pre>%TAG !e! tag:example.com,2000:app/
---
- <mark>!local</mark> foo
- <mark>!!str</mark> bar
- <mark>!e!tag%21</mark> baz
</pre></td><td><div><pre><code><span>[</span><span> </span><span>!&lt;!local&gt;</span><span> </span><span>"foo"</span><span>,</span><span>
  </span><span>!&lt;tag:yaml.org</span><span>,</span><span>2002</span><span>:str&gt;</span><span> </span><span>"bar"</span><span>,</span><span>
  </span><span>!&lt;tag:example.com</span><span>,</span><span>2000</span><span>:app/tag!&gt;</span><span> </span><span>"baz"</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Example 6.27 Invalid Tag Shorthands**

<table><tbody><tr><td><pre>%TAG !e! tag:example,2000:app/
---
- <mark>!e!</mark> foo
- <mark>!h!</mark>bar baz
</pre></td><td><pre>ERROR:
- The <mark>!e!</mark> handle has no suffix.
- The <mark>!h!</mark> handle wasn't declared.
</pre></td></tr></tbody></table>

Non-Specific Tags

If a [node][1108] has no tag property, it is assigned a [non-specific tag][1109] that needs to be [resolved][1110] to a [specific][1111] one. This [non-specific tag][1112] is “`!`” for non-[plain scalars][1113] and “`?`” for all other [nodes][1114]. This is the only case where the [node style][1115] has any effect on the [content][1116] information.

It is possible for the tag property to be explicitly set to the “`!`” non-specific tag. By [convention][1117], this “disables” [tag resolution][1118], forcing the [node][1119] to be interpreted as “`tag:yaml.org,2002:seq`”, “`tag:yaml.org,2002:map`” or “`tag:yaml.org,2002:str`”, according to its [kind][1120].

There is no way to explicitly specify the “`?`” non-specific tag. This is intentional.

```
[100] c-non-specific-tag ::= '!'

```

### 6.9.2. Node Anchors

An anchor is denoted by the “`&`” indicator. It marks a [node][1121] for future reference. An [alias node][1122] can then be used to indicate additional inclusions of the anchored [node][1123]. An anchored [node][1124] need not be referenced by any [alias nodes][1125]; in particular, it is valid for all [nodes][1126] to be anchored.

```
[101] c-ns-anchor-property ::=
  c-anchor          # '&'
  ns-anchor-name

```

Note that as a [serialization detail][1129], the anchor name is preserved in the [serialization tree][1130]. However, it is not reflected in the [representation][1131] graph and must not be used to convey [content][1132] information. In particular, the YAML [processor][1133] need not preserve the anchor name once the [representation][1134] is [composed][1135].

Anchor names must not contain the “`[`”, “`]`”, “`{`”, “`}`” and “`,`” characters. These characters would cause ambiguity with [flow collection][1136] structures.

```
[102] ns-anchor-char ::=
    ns-char - c-flow-indicator

```

```
[103] ns-anchor-name ::=
  ns-anchor-char+

```

**Example 6.29 Node Anchors**

<table><tbody><tr><td><pre>First occurrence: <mark>&amp;<mark>anchor</mark></mark> Value
Second occurrence: *<mark>anchor</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"First occurrence"</span><span>:</span><span> </span><span>&amp;A</span><span> </span><span>"Value"</span><span>,</span><span>
  </span><span>"Second occurrence"</span><span>:</span><span> </span><span>*A</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## Chapter 7. Flow Style Productions

YAML’s *flow styles* can be thought of as the natural extension of JSON to cover [folding][1140] long content lines for readability, [tagging][1141] nodes to control [construction][1142] of [native data structures][1143] and using [anchors][1144] and [aliases][1145] to reuse [constructed][1146] object instances.

## 7.1. Alias Nodes

Subsequent occurrences of a previously [serialized][1147] node are [presented][1148] as *alias nodes*. The first occurrence of the [node][1149] must be marked by an [anchor][1150] to allow subsequent occurrences to be [presented][1151] as alias nodes.

An alias node is denoted by the “`*`” indicator. The alias refers to the most recent preceding [node][1152] having the same [anchor][1153]. It is an error for an alias node to use an [anchor][1154] that does not previously occur in the [document][1155]. It is not an error to specify an [anchor][1156] that is not used by any alias node.

Note that an alias node must not specify any [properties][1157] or [content][1158], as these were already specified at the first occurrence of the [node][1159].

```
[104] c-ns-alias-node ::=
  c-alias           # '*'
  ns-anchor-name

```

**Example 7.1 Alias Nodes**

<table><tbody><tr><td><pre>First occurrence: &amp;<mark>anchor</mark> Foo
Second occurrence: <mark>*<mark>anchor</mark></mark>
Override anchor: &amp;<mark>anchor</mark> Bar
Reuse anchor: <mark>*<mark>anchor</mark></mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"First occurrence"</span><span>:</span><span> </span><span>&amp;A</span><span> </span><span>"Foo"</span><span>,</span><span>
  </span><span>"Override anchor"</span><span>:</span><span> </span><span>&amp;B</span><span> </span><span>"Bar"</span><span>,</span><span>
  </span><span>"Second occurrence"</span><span>:</span><span> </span><span>*A</span><span>,</span><span>
  </span><span>"Reuse anchor"</span><span>:</span><span> </span><span>*B</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 7.2. Empty Nodes

YAML allows the [node content][1162] to be omitted in many cases. [Nodes][1163] with empty [content][1164] are interpreted as if they were [plain scalars][1165] with an empty value. Such [nodes][1166] are commonly resolved to a “`null`” value.

```
[105] e-scalar ::= ""

```

In the examples, empty [scalars][1167] are sometimes displayed as the glyph “`°`” for clarity. Note that this glyph corresponds to a position in the characters [stream][1168] rather than to an actual character.

**Example 7.2 Empty Content**

<table><tbody><tr><td><pre>{
  foo : !!str<mark>°</mark>,
  !!str<mark>°</mark> : bar,
}
</pre></td><td></td></tr></tbody></table>

Both the [node’s properties][1169] and [node content][1170] are optional. This allows for a *completely empty node*. Completely empty nodes are only valid when following some explicit indication for their existence.

```
[106] e-node ::=
  e-scalar    # ""

```

**Example 7.3 Completely Empty Flow Nodes**

<table><tbody><tr><td><pre>{
  ? foo :<mark>°</mark>,
  <mark>°</mark>: bar,
}
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"foo"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>null</span><span> </span><span>:</span><span> </span><span>"bar"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 7.3. Flow Scalar Styles

YAML provides three *flow scalar styles*: [double-quoted][1172], [single-quoted][1173] and [plain][1174] (unquoted). Each provides a different trade-off between readability and expressive power.

The [scalar style][1175] is a [presentation detail][1176] and must not be used to convey [content][1177] information, with the exception that [plain scalars][1178] are distinguished for the purpose of [tag resolution][1179].

### 7.3.1. Double-Quoted Style

The *double-quoted style* is specified by surrounding “`"`” indicators. This is the only [style][1180] capable of expressing arbitrary strings, by using “`\`” [escape sequences][1181]. This comes at the cost of having to escape the “`\`” and “`"`” characters.

```
[107] nb-double-char ::=
    c-ns-esc-char
  | (
        nb-json
      - c-escape          # '\'
      - c-double-quote    # '"'
    )

```

```
[108] ns-double-char ::=
  nb-double-char - s-white

```

Double-quoted scalars are restricted to a single line when contained inside an [implicit key][1188].

```
[109] c-double-quoted(n,c) ::=
  c-double-quote         # '"'
  nb-double-text(n,c)
  c-double-quote         # '"'

```

```
[110]
nb-double-text(n,FLOW-OUT)  ::= nb-double-multi-line(n)
nb-double-text(n,FLOW-IN)   ::= nb-double-multi-line(n)
nb-double-text(n,BLOCK-KEY) ::= nb-double-one-line
nb-double-text(n,FLOW-KEY)  ::= nb-double-one-line

```

```
[111] nb-double-one-line ::=
  nb-double-char*

```

**Example 7.4 Double Quoted Implicit Keys**

<table><tbody><tr><td><pre><mark>"<mark>implicit block key</mark>"</mark> : [
  <mark>"<mark>implicit flow key</mark>"</mark> : value,
 ]
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"implicit block key"</span><span>:</span><span>
  </span><span>[</span><span> </span><span>{</span><span> </span><span>"implicit flow key"</span><span>:</span><span> </span><span>"value"</span><span> </span><span>}</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

In a multi-line double-quoted scalar, [line breaks][1197] are subject to [flow line folding][1198], which discards any trailing [white space][1199] characters. It is also possible to *escape* the [line break][1200] character. In this case, the escaped [line break][1201] is excluded from the [content][1202] and any trailing [white space][1203] characters that precede the escaped line break are preserved. Combined with the ability to [escape][1204] [white space][1205] characters, this allows double-quoted lines to be broken at arbitrary positions.

```
[112] s-double-escaped(n) ::=
  s-white*
  c-escape         # '\'
  b-non-content
  l-empty(n,FLOW-IN)*
  s-flow-line-prefix(n)

```

```
[113] s-double-break(n) ::=
    s-double-escaped(n)
  | s-flow-folded(n)

```

**Example 7.5 Double Quoted Line Breaks**

<table><tbody><tr><td><pre>"folded<mark>·↓</mark>
to a space,<mark>→↓</mark>
<mark>·↓</mark>
to a line feed, or<mark>·→\↓</mark>
<mark>·</mark>\·→non-content"
</pre></td><td><div><pre><code><span>"folded to a space,</span><span>\n</span><span>to a line feed, or </span><span>\t</span><span> </span><span>\t</span><span>non-content"</span><span>
</span></code></pre></div></td></tr></tbody></table>

All leading and trailing [white space][1213] characters on each line are excluded from the [content][1214]. Each continuation line must therefore contain at least one non-[space][1215] character. Empty lines, if any, are consumed as part of the [line folding][1216].

```
[114] nb-ns-double-in-line ::=
  (
    s-white*
    ns-double-char
  )*

```

```
[115] s-double-next-line(n) ::=
  s-double-break(n)
  (
    ns-double-char nb-ns-double-in-line
    (
        s-double-next-line(n)
      | s-white*
    )
  )?

```

```
[116] nb-double-multi-line(n) ::=
  nb-ns-double-in-line
  (
      s-double-next-line(n)
    | s-white*
  )

```

**Example 7.6 Double Quoted Lines**

<table><tbody><tr><td><pre>"<mark>·1st non-empty</mark><mark>↓</mark>
<mark>↓</mark>
<mark>·<mark>2nd non-empty</mark>·</mark>
<mark>→<mark>3rd non-empty</mark></mark>·"
</pre></td><td><div><pre><code><span>" 1st non-empty</span><span>\n</span><span>2nd non-empty 3rd non-empty "</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 7.3.2. Single-Quoted Style

The *single-quoted style* is specified by surrounding “`'`” indicators. Therefore, within a single-quoted scalar, such characters need to be repeated. This is the only form of *escaping* performed in single-quoted scalars. In particular, the “`\`” and “`"`” characters may be freely used. This restricts single-quoted scalars to [printable][1227] characters. In addition, it is only possible to break a long single-quoted line where a [space][1228] character is surrounded by non-[spaces][1229].

```
[117] c-quoted-quote ::= "''"

```

```
[118] nb-single-char ::=
    c-quoted-quote
  | (
        nb-json
      - c-single-quote    # "'"
    )

```

```
[119] ns-single-char ::=
  nb-single-char - s-white

```

**Example 7.7 Single Quoted Characters**

<table><tbody><tr><td><pre>'here<mark>''</mark>s to "quotes"'
</pre></td><td></td></tr></tbody></table>

Single-quoted scalars are restricted to a single line when contained inside a [implicit key][1235].

```
[120] c-single-quoted(n,c) ::=
  c-single-quote    # "'"
  nb-single-text(n,c)
  c-single-quote    # "'"

```

```
[121]
nb-single-text(FLOW-OUT)  ::= nb-single-multi-line(n)
nb-single-text(FLOW-IN)   ::= nb-single-multi-line(n)
nb-single-text(BLOCK-KEY) ::= nb-single-one-line
nb-single-text(FLOW-KEY)  ::= nb-single-one-line

```

```
[122] nb-single-one-line ::=
  nb-single-char*

```

**Example 7.8 Single Quoted Implicit Keys**

<table><tbody><tr><td><pre><mark>'<mark>implicit block key</mark>'</mark> : [
  <mark>'<mark>implicit flow key</mark>'</mark> : value,
 ]
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"implicit block key"</span><span>:</span><span>
  </span><span>[</span><span> </span><span>{</span><span> </span><span>"implicit flow key"</span><span>:</span><span> </span><span>"value"</span><span> </span><span>}</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

All leading and trailing [white space][1244] characters are excluded from the [content][1245]. Each continuation line must therefore contain at least one non-[space][1246] character. Empty lines, if any, are consumed as part of the [line folding][1247].

```
[123] nb-ns-single-in-line ::=
  (
    s-white*
    ns-single-char
  )*

```

```
[124] s-single-next-line(n) ::=
  s-flow-folded(n)
  (
    ns-single-char
    nb-ns-single-in-line
    (
        s-single-next-line(n)
      | s-white*
    )
  )?

```

```
[125] nb-single-multi-line(n) ::=
  nb-ns-single-in-line
  (
      s-single-next-line(n)
    | s-white*
  )

```

**Example 7.9 Single Quoted Lines**

<table><tbody><tr><td><pre>'<mark>·1st non-empty</mark><mark>↓</mark>
<mark>↓</mark>
<mark>·<mark>2nd non-empty</mark>·</mark>
<mark>→<mark>3rd non-empty</mark></mark>·'
</pre></td><td><div><pre><code><span>" 1st non-empty</span><span>\n</span><span>2nd non-empty 3rd non-empty "</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 7.3.3. Plain Style

The *plain* (unquoted) style has no identifying [indicators][1258] and provides no form of escaping. It is therefore the most readable, most limited and most [context][1259] sensitive [style][1260]. In addition to a restricted character set, a plain scalar must not be empty or contain leading or trailing [white space][1261] characters. It is only possible to break a long plain line where a [space][1262] character is surrounded by non-[spaces][1263].

Plain scalars must not begin with most [indicators][1264], as this would cause ambiguity with other YAML constructs. However, the “`:`”, “`?`” and “`-`” [indicators][1265] may be used as the first character if followed by a non-[space][1266] “safe” character, as this causes no ambiguity.

```
[126] ns-plain-first(c) ::=
    (
        ns-char
      - c-indicator
    )
  | (
      (
          c-mapping-key       # '?'
        | c-mapping-value     # ':'
        | c-sequence-entry    # '-'
      )
      [ lookahead = ns-plain-safe(c) ]
    )

```

Plain scalars must never contain the “`:` ” and “ `#`” character combinations. Such combinations would cause ambiguity with [mapping][1273] [key/value pairs][1274] and [comments][1275]. In addition, inside [flow collections][1276], or when used as [implicit keys][1277], plain scalars must not contain the “`[`”, “`]`”, “`{`”, “`}`” and “`,`” characters. These characters would cause ambiguity with [flow collection][1278] structures.

```
[127]
ns-plain-safe(FLOW-OUT)  ::= ns-plain-safe-out
ns-plain-safe(FLOW-IN)   ::= ns-plain-safe-in
ns-plain-safe(BLOCK-KEY) ::= ns-plain-safe-out
ns-plain-safe(FLOW-KEY)  ::= ns-plain-safe-in

```

```
[128] ns-plain-safe-out ::=
  ns-char

```

```
[129] ns-plain-safe-in ::=
  ns-char - c-flow-indicator

```

```
[130] ns-plain-char(c) ::=
    (
        ns-plain-safe(c)
      - c-mapping-value    # ':'
      - c-comment          # '#'
    )
  | (
      [ lookbehind = ns-char ]
      c-comment          # '#'
    )
  | (
      c-mapping-value    # ':'
      [ lookahead = ns-plain-safe(c) ]
    )

```

**Example 7.10 Plain Characters**

<table><tbody><tr><td><pre># Outside flow collection:
- <mark>:</mark><mark>:</mark>vector
- "<mark>:</mark> - ()"
- Up<mark>,</mark> up, and away!
- <mark>-</mark>123
- http<mark>s</mark>://example.com/fo<mark>o</mark>#bar
# Inside flow collection:
- [ <mark>:</mark><mark>:</mark>vector,
  "<mark>:</mark> - ()",
  "Up<mark>,</mark> up and away!",
  <mark>-</mark>123,
  http<mark>s</mark>://example.com/fo<mark>o</mark>#bar ]
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"::vector"</span><span>,</span><span>
  </span><span>": - ()"</span><span>,</span><span>
  </span><span>"Up, up, and away!"</span><span>,</span><span>
  </span><span>-123</span><span>,</span><span>
  </span><span>"http://example.com/foo#bar"</span><span>,</span><span>
  </span><span>[</span><span> </span><span>"::vector"</span><span>,</span><span>
    </span><span>": - ()"</span><span>,</span><span>
    </span><span>"Up, up, and away!"</span><span>,</span><span>
    </span><span>-123</span><span>,</span><span>
    </span><span>"http://example.com/foo#bar"</span><span> </span><span>]</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[ns-plain-first(c)][1293]`
-   `[ns-plain-char(c)][1294]`
-   `Not ns-plain-first(c)`
-   `Not ns-plain-char(c)`

Plain scalars are further restricted to a single line when contained inside an [implicit key][1295].

```
[131]
ns-plain(n,FLOW-OUT)  ::= ns-plain-multi-line(n,FLOW-OUT)
ns-plain(n,FLOW-IN)   ::= ns-plain-multi-line(n,FLOW-IN)
ns-plain(n,BLOCK-KEY) ::= ns-plain-one-line(BLOCK-KEY)
ns-plain(n,FLOW-KEY)  ::= ns-plain-one-line(FLOW-KEY)

```

```
[132] nb-ns-plain-in-line(c) ::=
  (
    s-white*
    ns-plain-char(c)
  )*

```

```
[133] ns-plain-one-line(c) ::=
  ns-plain-first(c)
  nb-ns-plain-in-line(c)

```

**Example 7.11 Plain Implicit Keys**

<table><tbody><tr><td><pre><mark>implicit block key</mark> : [
  <mark>implicit flow key</mark> : value,
 ]
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"implicit block key"</span><span>:</span><span>
  </span><span>[</span><span> </span><span>{</span><span> </span><span>"implicit flow key"</span><span>:</span><span> </span><span>"value"</span><span> </span><span>}</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

All leading and trailing [white space][1304] characters are excluded from the [content][1305]. Each continuation line must therefore contain at least one non-[space][1306] character. Empty lines, if any, are consumed as part of the [line folding][1307].

```
[134] s-ns-plain-next-line(n,c) ::=
  s-flow-folded(n)
  ns-plain-char(c)
  nb-ns-plain-in-line(c)

```

```
[135] ns-plain-multi-line(n,c) ::=
  ns-plain-one-line(c)
  s-ns-plain-next-line(n,c)*

```

**Example 7.12 Plain Lines**

<table><tbody><tr><td><pre><mark>1st non-empty</mark><mark>↓</mark>
<mark>↓</mark>
<mark>·<mark>2nd non-empty</mark>·</mark>
<mark>→<mark>3rd non-empty</mark></mark>
</pre></td><td><div><pre><code><span>"1st non-empty</span><span>\n</span><span>2nd non-empty 3rd non-empty"</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 7.4. Flow Collection Styles

A *flow collection* may be nested within a [block collection][1313] ([`FLOW-OUT` context]), nested within another flow collection ([`FLOW-IN` context]) or be a part of an [implicit key][1314] ([`FLOW-KEY` context] or [`BLOCK-KEY` context]). Flow collection entries are terminated by the “`,`” indicator. The final “`,`” may be omitted. This does not cause ambiguity because flow collection entries can never be [completely empty][1315].

```
[136]
in-flow(n,FLOW-OUT)  ::= ns-s-flow-seq-entries(n,FLOW-IN)
in-flow(n,FLOW-IN)   ::= ns-s-flow-seq-entries(n,FLOW-IN)
in-flow(n,BLOCK-KEY) ::= ns-s-flow-seq-entries(n,FLOW-KEY)
in-flow(n,FLOW-KEY)  ::= ns-s-flow-seq-entries(n,FLOW-KEY)

```

### 7.4.1. Flow Sequences

*Flow sequence content* is denoted by surrounding “`[`” and “`]`” characters.

```
[137] c-flow-sequence(n,c) ::=
  c-sequence-start    # '['
  s-separate(n,c)?
  in-flow(n,c)?
  c-sequence-end      # ']'

```

Sequence entries are separated by a “`,`” character.

```
[138] ns-s-flow-seq-entries(n,c) ::=
  ns-flow-seq-entry(n,c)
  s-separate(n,c)?
  (
    c-collect-entry     # ','
    s-separate(n,c)?
    ns-s-flow-seq-entries(n,c)?
  )?

```

**Example 7.13 Flow Sequence**

<table><tbody><tr><td><pre>- <mark>[</mark> <mark>one</mark>, <mark>two</mark>, <mark>]</mark>
- <mark>[</mark><mark>three</mark> ,<mark>four</mark><mark>]</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>[</span><span> </span><span>"one"</span><span>,</span><span>
    </span><span>"two"</span><span> </span><span>],</span><span>
  </span><span>[</span><span> </span><span>"three"</span><span>,</span><span>
    </span><span>"four"</span><span> </span><span>]</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

Any [flow node][1329] may be used as a flow sequence entry. In addition, YAML provides a [compact notation][1330] for the case where a flow sequence entry is a [mapping][1331] with a [single key/value pair][1332].

```
[139] ns-flow-seq-entry(n,c) ::=
  ns-flow-pair(n,c) | ns-flow-node(n,c)

```

**Example 7.14 Flow Sequence Entries**

<table><tbody><tr><td><pre>[
<mark>"double</mark>
<mark> quoted"</mark>, <mark>'single</mark>
<mark>           quoted'</mark>,
<mark>plain</mark>
<mark> text</mark>, <mark>[ nested ]</mark>,
<mark>single: pair</mark>,
]
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"double quoted"</span><span>,</span><span>
  </span><span>"single quoted"</span><span>,</span><span>
  </span><span>"plain text"</span><span>,</span><span>
  </span><span>[</span><span> </span><span>"nested"</span><span> </span><span>],</span><span>
  </span><span>{</span><span> </span><span>"single"</span><span>:</span><span> </span><span>"pair"</span><span> </span><span>}</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 7.4.2. Flow Mappings

*Flow mappings* are denoted by surrounding “`{`” and “`}`” characters.

```
[140] c-flow-mapping(n,c) ::=
  c-mapping-start       # '{'
  s-separate(n,c)?
  ns-s-flow-map-entries(n,in-flow(c))?
  c-mapping-end         # '}'

```

Mapping entries are separated by a “`,`” character.

```
[141] ns-s-flow-map-entries(n,c) ::=
  ns-flow-map-entry(n,c)
  s-separate(n,c)?
  (
    c-collect-entry     # ','
    s-separate(n,c)?
    ns-s-flow-map-entries(n,c)?
  )?

```

**Example 7.15 Flow Mappings**

<table><tbody><tr><td><pre>- <mark>{</mark> <mark>one : two</mark> , <mark>three: four</mark> , <mark>}</mark>
- <mark>{</mark><mark>five: six</mark>,<mark>seven : eight</mark><mark>}</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>{</span><span> </span><span>"one"</span><span>:</span><span> </span><span>"two"</span><span>,</span><span>
    </span><span>"three"</span><span>:</span><span> </span><span>"four"</span><span> </span><span>},</span><span>
  </span><span>{</span><span> </span><span>"five"</span><span>:</span><span> </span><span>"six"</span><span>,</span><span>
    </span><span>"seven"</span><span>:</span><span> </span><span>"eight"</span><span> </span><span>}</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

If the optional “`?`” mapping key indicator is specified, the rest of the entry may be [completely empty][1344].

```
[142] ns-flow-map-entry(n,c) ::=
    (
      c-mapping-key    # '?' (not followed by non-ws char)
      s-separate(n,c)
      ns-flow-map-explicit-entry(n,c)
    )
  | ns-flow-map-implicit-entry(n,c)

```

```
[143] ns-flow-map-explicit-entry(n,c) ::=
    ns-flow-map-implicit-entry(n,c)
  | (
      e-node    # ""
      e-node    # ""
    )

```

**Example 7.16 Flow Mapping Entries**

<table><tbody><tr><td><pre>{
? <mark>explicit: entry</mark>,
<mark>implicit: entry</mark>,
?<mark>°</mark><mark>°</mark>
}
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"explicit"</span><span>:</span><span> </span><span>"entry"</span><span>,</span><span>
  </span><span>"implicit"</span><span>:</span><span> </span><span>"entry"</span><span>,</span><span>
  </span><span>null</span><span>:</span><span> </span><span>null</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

Normally, YAML insists the “`:`” mapping value indicator be [separated][1352] from the [value][1353] by [white space][1354]. A benefit of this restriction is that the “`:`” character can be used inside [plain scalars][1355], as long as it is not followed by [white space][1356]. This allows for unquoted URLs and timestamps. It is also a potential source for confusion as “`a:1`” is a [plain scalar][1357] and not a [key/value pair][1358].

Note that the [value][1359] may be [completely empty][1360] since its existence is indicated by the “`:`”.

```
[144] ns-flow-map-implicit-entry(n,c) ::=
    ns-flow-map-yaml-key-entry(n,c)
  | c-ns-flow-map-empty-key-entry(n,c)
  | c-ns-flow-map-json-key-entry(n,c)

```

```
[145] ns-flow-map-yaml-key-entry(n,c) ::=
  ns-flow-yaml-node(n,c)
  (
      (
        s-separate(n,c)?
        c-ns-flow-map-separate-value(n,c)
      )
    | e-node    # ""
  )

```

```
[146] c-ns-flow-map-empty-key-entry(n,c) ::=
  e-node    # ""
  c-ns-flow-map-separate-value(n,c)

```

```
[147] c-ns-flow-map-separate-value(n,c) ::=
  c-mapping-value    # ':'
  [ lookahead ≠ ns-plain-safe(c) ]
  (
      (
        s-separate(n,c)
        ns-flow-node(n,c)
      )
    | e-node    # ""
  )

```

**Example 7.17 Flow Mapping Separate Values**

<table><tbody><tr><td><pre>{
<mark>unquoted</mark>·<mark>:·"separate"</mark>,
<mark>https://foo.com</mark>,
<mark>omitted value</mark><mark>:<mark>°</mark></mark>,
<mark>°</mark><mark>:·omitted key</mark>,
}
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"unquoted"</span><span>:</span><span> </span><span>"separate"</span><span>,</span><span>
  </span><span>"http://foo.com"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"omitted value"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>null</span><span>:</span><span> </span><span>"omitted key"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

To ensure [JSON compatibility][1375], if a [key][1376] inside a flow mapping is [JSON-like][1377], YAML allows the following [value][1378] to be specified adjacent to the “`:`”. This causes no ambiguity, as all [JSON-like][1379] [keys][1380] are surrounded by [indicators][1381]. However, as this greatly reduces readability, YAML [processors][1382] should [separate][1383] the [value][1384] from the “`:`” on output, even in this case.

```
[148] c-ns-flow-map-json-key-entry(n,c) ::=
  c-flow-json-node(n,c)
  (
      (
        s-separate(n,c)?
        c-ns-flow-map-adjacent-value(n,c)
      )
    | e-node    # ""
  )

```

```
[149] c-ns-flow-map-adjacent-value(n,c) ::=
  c-mapping-value          # ':'
  (
      (
        s-separate(n,c)?
        ns-flow-node(n,c)
      )
    | e-node    # ""
  )

```

**Example 7.18 Flow Mapping Adjacent Values**

<table><tbody><tr><td><pre>{
<mark>"adjacent"</mark>:<mark>value</mark>,
<mark>"readable"</mark>:·<mark>value</mark>,
<mark>"empty"</mark>:<mark>°</mark>
}
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"adjacent"</span><span>:</span><span> </span><span>"value"</span><span>,</span><span>
  </span><span>"readable"</span><span>:</span><span> </span><span>"value"</span><span>,</span><span>
  </span><span>"empty"</span><span>:</span><span> </span><span>null</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

A more compact notation is usable inside [flow sequences][1393], if the [mapping][1394] contains a *single key/value pair*. This notation does not require the surrounding “`{`” and “`}`” characters. Note that it is not possible to specify any [node properties][1395] for the [mapping][1396] in this case.

**Example 7.19 Single Pair Flow Mappings**

<table><tbody><tr><td><pre>[
<mark>foo: bar</mark>
]
</pre></td><td></td></tr></tbody></table>

If the “`?`” indicator is explicitly specified, [parsing][1397] is unambiguous and the syntax is identical to the general case.

```
[150] ns-flow-pair(n,c) ::=
    (
      c-mapping-key     # '?' (not followed by non-ws char)
      s-separate(n,c)
      ns-flow-map-explicit-entry(n,c)
    )
  | ns-flow-pair-entry(n,c)

```

**Example 7.20 Single Pair Explicit Entry**

<table><tbody><tr><td><pre>[
? <mark>foo</mark>
 <mark>bar : baz</mark>
]
</pre></td><td></td></tr></tbody></table>

If the “`?`” indicator is omitted, [parsing][1402] needs to see past the *implicit key* to recognize it as such. To limit the amount of lookahead required, the “`:`” indicator must appear at most 1024 Unicode characters beyond the start of the [key][1403]. In addition, the [key][1404] is restricted to a single line.

Note that YAML allows arbitrary [nodes][1405] to be used as [keys][1406]. In particular, a [key][1407] may be a [sequence][1408] or a [mapping][1409]. Thus, without the above restrictions, practical one-pass [parsing][1410] would have been impossible to implement.

```
[151] ns-flow-pair-entry(n,c) ::=
    ns-flow-pair-yaml-key-entry(n,c)
  | c-ns-flow-map-empty-key-entry(n,c)
  | c-ns-flow-pair-json-key-entry(n,c)

```

```
[152] ns-flow-pair-yaml-key-entry(n,c) ::=
  ns-s-implicit-yaml-key(FLOW-KEY)
  c-ns-flow-map-separate-value(n,c)

```

```
[153] c-ns-flow-pair-json-key-entry(n,c) ::=
  c-s-implicit-json-key(FLOW-KEY)
  c-ns-flow-map-adjacent-value(n,c)

```

```
[154] ns-s-implicit-yaml-key(c) ::=
  ns-flow-yaml-node(0,c)
  s-separate-in-line?
  /* At most 1024 characters altogether */

```

```
[155] c-s-implicit-json-key(c) ::=
  c-flow-json-node(0,c)
  s-separate-in-line?
  /* At most 1024 characters altogether */

```

**Example 7.21 Single Pair Implicit Entries**

<table><tbody><tr><td><pre>- [ <mark>YAML·</mark><mark>: separate</mark> ]
- [ <mark>°</mark><mark>: empty key entry</mark> ]
- [ <mark>{JSON: like}</mark><mark>:adjacent</mark> ]
</pre></td><td><div><pre><code><span>[</span><span> </span><span>[</span><span> </span><span>{</span><span> </span><span>"YAML"</span><span>:</span><span> </span><span>"separate"</span><span> </span><span>}</span><span> </span><span>],</span><span>
  </span><span>[</span><span> </span><span>{</span><span> </span><span>null</span><span>:</span><span> </span><span>"empty key entry"</span><span> </span><span>}</span><span> </span><span>],</span><span>
  </span><span>[</span><span> </span><span>{</span><span> </span><span>{</span><span> </span><span>"JSON"</span><span>:</span><span> </span><span>"like"</span><span> </span><span>}</span><span>:</span><span> </span><span>"adjacent"</span><span> </span><span>}</span><span> </span><span>]</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Example 7.22 Invalid Implicit Keys**

<table><tbody><tr><td><pre>[ <mark>foo</mark>
<mark> bar</mark>: invalid,
 <mark>"foo_...&gt;1K characters..._bar"</mark>: invalid ]
</pre></td><td><pre>ERROR:
- The <mark>foo bar</mark> key spans multiple lines
- The <mark>foo...bar</mark> key is too long
</pre></td></tr></tbody></table>

## 7.5. Flow Nodes

*JSON-like* [flow styles][1422] all have explicit start and end [indicators][1423]. The only [flow style][1424] that does not have this property is the [plain scalar][1425]. Note that none of the “JSON-like” styles is actually acceptable by JSON. Even the [double-quoted style][1426] is a superset of the JSON string format.

```
[156] ns-flow-yaml-content(n,c) ::=
  ns-plain(n,c)

```

```
[157] c-flow-json-content(n,c) ::=
    c-flow-sequence(n,c)
  | c-flow-mapping(n,c)
  | c-single-quoted(n,c)
  | c-double-quoted(n,c)

```

```
[158] ns-flow-content(n,c) ::=
    ns-flow-yaml-content(n,c)
  | c-flow-json-content(n,c)

```

**Example 7.23 Flow Content**

<table><tbody><tr><td><pre>- <mark>[ a, b ]</mark>
- <mark>{ a: b }</mark>
- <mark>"a"</mark>
- <mark>'b'</mark>
- <mark>c</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>[</span><span> </span><span>"a"</span><span>,</span><span> </span><span>"b"</span><span> </span><span>],</span><span>
  </span><span>{</span><span> </span><span>"a"</span><span>:</span><span> </span><span>"b"</span><span> </span><span>},</span><span>
  </span><span>"a"</span><span>,</span><span>
  </span><span>"b"</span><span>,</span><span>
  </span><span>"c"</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

A complete [flow][1434] [node][1435] also has optional [node properties][1436], except for [alias nodes][1437] which refer to the [anchored][1438] [node properties][1439].

```
[159] ns-flow-yaml-node(n,c) ::=
    c-ns-alias-node
  | ns-flow-yaml-content(n,c)
  | (
      c-ns-properties(n,c)
      (
          (
            s-separate(n,c)
            ns-flow-yaml-content(n,c)
          )
        | e-scalar
      )
    )

```

```
[160] c-flow-json-node(n,c) ::=
  (
    c-ns-properties(n,c)
    s-separate(n,c)
  )?
  c-flow-json-content(n,c)

```

```
[161] ns-flow-node(n,c) ::=
    c-ns-alias-node
  | ns-flow-content(n,c)
  | (
      c-ns-properties(n,c)
      (
        (
          s-separate(n,c)
          ns-flow-content(n,c)
        )
        | e-scalar
      )
    )

```

**Example 7.24 Flow Nodes**

<table><tbody><tr><td><pre>- <mark>!!str "a"</mark>
- <mark>'b'</mark>
- <mark>&amp;anchor "c"</mark>
- <mark>*anchor</mark>
- <mark>!!str°</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"a"</span><span>,</span><span>
  </span><span>"b"</span><span>,</span><span>
  </span><span>"c"</span><span>,</span><span>
  </span><span>"c"</span><span>,</span><span>
  </span><span>""</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

## Chapter 8. Block Style Productions

YAML’s *block styles* employ [indentation][1455] rather than [indicators][1456] to denote structure. This results in a more human readable (though less compact) notation.

## 8.1. Block Scalar Styles

YAML provides two *block scalar styles*, [literal][1457] and [folded][1458]. Each provides a different trade-off between readability and expressive power.

[Block scalars][1459] are controlled by a few [indicators][1460] given in a *header* preceding the [content][1461] itself. This header is followed by a non-content [line break][1462] with an optional [comment][1463]. This is the only case where a [comment][1464] must not be followed by additional [comment][1465] lines.

> Note: See [Production Parameters][1466] for the definition of the `t` variable.

```
[162] c-b-block-header(t) ::=
  (
      (
        c-indentation-indicator
        c-chomping-indicator(t)
      )
    | (
        c-chomping-indicator(t)
        c-indentation-indicator
      )
  )
  s-b-comment

```

#### 8.1.1.1. Block Indentation Indicator

Every block scalar has a *content indentation level*. The content of the block scalar excludes a number of leading [spaces][1472] on each line up to the content indentation level.

If a block scalar has an *indentation indicator*, then the content indentation level of the block scalar is equal to the indentation level of the block scalar plus the integer value of the indentation indicator character.

If no indentation indicator is given, then the content indentation level is equal to the number of leading [spaces][1473] on the first non-[empty line][1474] of the contents. If there is no non-[empty line][1475] then the content indentation level is equal to the number of spaces on the longest line.

It is an error if any non-[empty line][1476] does not begin with a number of spaces greater than or equal to the content indentation level.

It is an error for any of the leading [empty lines][1477] to contain more [spaces][1478] than the first non-[empty line][1479].

A YAML [processor][1480] should only emit an explicit indentation indicator for cases where detection will fail.

```
[163] c-indentation-indicator ::=
  [x31-x39]    # 1-9

```

**Example 8.2 Block Indentation Indicator**

<table><tbody><tr><td><pre>- |<mark>°</mark>
<mark>·</mark>detected
- &gt;<mark>°</mark>
<mark>·</mark>
<mark>··</mark>
<mark>··</mark># detected
- |<mark>1</mark>
<mark>··</mark>explicit
- &gt;<mark>°</mark>
<mark>·</mark>→
<mark>·</mark>detected
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"detected</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>"</span><span>\n\n</span><span># detected</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>" explicit</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>"</span><span>\t\n</span><span>detected</span><span>\n</span><span>"</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Example 8.3 Invalid Block Scalar Indentation Indicators**

<table><tbody><tr><td><pre>- |
·<mark>·</mark>
·text
- &gt;
··text
<mark>·</mark>text
- |2
<mark>·</mark>text
</pre></td><td><pre>ERROR:
- A leading all-space line must
  not have too many <mark>spaces</mark>.
- A following text line must
  not be <mark>less indented</mark>.
- The text is <mark>less indented</mark>
  than the indicated level.
</pre></td></tr></tbody></table>

#### 8.1.1.2. Block Chomping Indicator

*Chomping* controls how final [line breaks][1481] and trailing [empty lines][1482] are interpreted. YAML provides three chomping methods:

Strip

*Stripping* is specified by the “`-`” chomping indicator. In this case, the final [line break][1483] and any trailing [empty lines][1484] are excluded from the [scalar’s content][1485].

Clip

*Clipping* is the default behavior used if no explicit chomping indicator is specified. In this case, the final [line break][1486] character is preserved in the [scalar’s content][1487]. However, any trailing [empty lines][1488] are excluded from the [scalar’s content][1489].

Keep

*Keeping* is specified by the “`+`” chomping indicator. In this case, the final [line break][1490] and any trailing [empty lines][1491] are considered to be part of the [scalar’s content][1492]. These additional lines are not subject to [folding][1493].

The chomping method used is a [presentation detail][1494] and must not be used to convey [content][1495] information.

```
[164]
c-chomping-indicator(STRIP) ::= '-'
c-chomping-indicator(KEEP)  ::= '+'
c-chomping-indicator(CLIP)  ::= ""

```

The interpretation of the final [line break][1496] of a [block scalar][1497] is controlled by the chomping indicator specified in the [block scalar header][1498].

```
[165]
b-chomped-last(STRIP) ::= b-non-content  | <end-of-input>
b-chomped-last(CLIP)  ::= b-as-line-feed | <end-of-input>
b-chomped-last(KEEP)  ::= b-as-line-feed | <end-of-input>

```

**Example 8.4 Chomping Final Line Break**

<table><tbody><tr><td><pre>strip: |-
  text<mark>↓</mark>
clip: |
  text<mark>↓</mark>
keep: |+
  text<mark>↓</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"strip"</span><span>:</span><span> </span><span>"text"</span><span>,</span><span>
  </span><span>"clip"</span><span>:</span><span> </span><span>"text</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>"keep"</span><span>:</span><span> </span><span>"text</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

The interpretation of the trailing [empty lines][1502] following a [block scalar][1503] is also controlled by the chomping indicator specified in the [block scalar header][1504].

```
[166]
l-chomped-empty(n,STRIP) ::= l-strip-empty(n)
l-chomped-empty(n,CLIP)  ::= l-strip-empty(n)
l-chomped-empty(n,KEEP)  ::= l-keep-empty(n)

```

```
[167] l-strip-empty(n) ::=
  (
    s-indent-less-or-equal(n)
    b-non-content
  )*
  l-trail-comments(n)?

```

```
[168] l-keep-empty(n) ::=
  l-empty(n,BLOCK-IN)*
  l-trail-comments(n)?

```

Explicit [comment][1513] lines may follow the trailing [empty lines][1514]. To prevent ambiguity, the first such [comment][1515] line must be less [indented][1516] than the [block scalar content][1517]. Additional [comment][1518] lines, if any, are not so restricted. This is the only case where the [indentation][1519] of [comment][1520] lines is constrained.

```
[169] l-trail-comments(n) ::=
  s-indent-less-than(n)
  c-nb-comment-text
  b-comment
  l-comment*

```

**Example 8.5 Chomping Trailing Lines**

<table><tbody><tr><td><pre># Strip
  # Comments:
strip: |-
  # text↓
<mark>··⇓</mark>
<mark><mark>·# Clip</mark></mark>
<mark><mark>··# comments:</mark></mark>
<mark><mark>↓</mark></mark>
clip: |
  # text↓
<mark>·↓</mark>
<mark><mark>·# Keep</mark></mark>
<mark><mark>··# comments:</mark></mark>
<mark><mark>↓</mark></mark>
keep: |+
  # text↓
<mark>↓</mark>
<mark><mark>·# Trail</mark></mark>
<mark><mark>··# comments.</mark></mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"strip"</span><span>:</span><span> </span><span>"# text"</span><span>,</span><span>
  </span><span>"clip"</span><span>:</span><span> </span><span>"# text</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>"keep"</span><span>:</span><span> </span><span>"# text</span><span>\n\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

If a [block scalar][1525] consists only of [empty lines][1526], then these lines are considered as trailing lines and hence are affected by chomping.

**Example 8.6 Empty Scalar Chomping**

<table><tbody><tr><td><pre>strip: &gt;-
<mark>↓</mark>
clip: &gt;
<mark>↓</mark>
keep: |+
<mark>↓</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"strip"</span><span>:</span><span> </span><span>""</span><span>,</span><span>
  </span><span>"clip"</span><span>:</span><span> </span><span>""</span><span>,</span><span>
  </span><span>"keep"</span><span>:</span><span> </span><span>"</span><span>\n</span><span>"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 8.1.2. Literal Style

The *literal style* is denoted by the “`|`” indicator. It is the simplest, most restricted and most readable [scalar style][1527].

```
[170] c-l+literal(n) ::=
  c-literal                # '|'
  c-b-block-header(t)
  l-literal-content(n+m,t)

```

**Example 8.7 Literal Scalar**

<table><tbody><tr><td><pre><mark>|↓</mark>
<mark>·literal↓</mark>
<mark>·→text↓</mark>
<mark>↓</mark>
</pre></td><td></td></tr></tbody></table>

Inside literal scalars, all ([indented][1531]) characters are considered to be [content][1532], including [white space][1533] characters. Note that all [line break][1534] characters are [normalized][1535]. In addition, [empty lines][1536] are not [folded][1537], though final [line breaks][1538] and trailing [empty lines][1539] are [chomped][1540].

There is no way to escape characters inside literal scalars. This restricts them to [printable][1541] characters. In addition, there is no way to break a long literal line.

```
[171] l-nb-literal-text(n) ::=
  l-empty(n,BLOCK-IN)*
  s-indent(n) nb-char+

```

```
[172] b-nb-literal-next(n) ::=
  b-as-line-feed
  l-nb-literal-text(n)

```

```
[173] l-literal-content(n,t) ::=
  (
    l-nb-literal-text(n)
    b-nb-literal-next(n)*
    b-chomped-last(t)
  )?
  l-chomped-empty(n,t)

```

**Example 8.8 Literal Content**

<table><tbody><tr><td><pre>|
<mark>·</mark>
<mark>··</mark>
<mark>··literal</mark><mark>↓</mark>
<mark><mark>···</mark></mark><mark>↓</mark>
<mark><mark>··</mark></mark>
<mark><mark>··text</mark></mark><mark>↓</mark>
↓
<mark>·# Comment</mark>
</pre></td><td><div><pre><code><span>"</span><span>\n\n</span><span>literal</span><span>\n</span><span>·</span><span>\n\n</span><span>text</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[l-nb-literal-text(n)][1551]`
-   `[b-nb-literal-next(n)][1552]`
-   `[b-chomped-last(t)][1553]`
-   `[l-chomped-empty(n,t)][1554]`

### 8.1.3. Folded Style

The *folded style* is denoted by the “`>`” indicator. It is similar to the [literal style][1555]; however, folded scalars are subject to [line folding][1556].

```
[174] c-l+folded(n) ::=
  c-folded                 # '>'
  c-b-block-header(t)
  l-folded-content(n+m,t)

```

**Example 8.9 Folded Scalar**

<table><tbody><tr><td><pre><mark>&gt;↓</mark>
<mark>·folded↓</mark>
<mark>·text↓</mark>
<mark>↓</mark>
</pre></td><td></td></tr></tbody></table>

[Folding][1560] allows long lines to be broken anywhere a single [space][1561] character separates two non-[space][1562] characters.

```
[175] s-nb-folded-text(n) ::=
  s-indent(n)
  ns-char
  nb-char*

```

```
[176] l-nb-folded-lines(n) ::=
  s-nb-folded-text(n)
  (
    b-l-folded(n,BLOCK-IN)
    s-nb-folded-text(n)
  )*

```

**Example 8.10 Folded Lines**

<table><tbody><tr><td><pre>&gt;

<mark><mark>·folded</mark>↓</mark>
<mark><mark>·line</mark>↓</mark>
↓
<mark><mark>·next</mark></mark>
<mark><mark>·line</mark></mark>↓
   * bullet

   * list
   * lines

<mark><mark>·last</mark>↓</mark>
<mark><mark>·line</mark></mark>↓

# Comment
</pre></td><td><div><pre><code><span>"</span><span>\n</span><span>folded line</span><span>\n</span><span>next line</span><span>\n</span><span>  </span><span>\</span><span>
* bullet</span><span>\n</span><span> </span><span>\n</span><span>  * list</span><span>\n</span><span>  </span><span>\</span><span>
* lines</span><span>\n\n</span><span>last line</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

(The following three examples duplicate this example, each highlighting different productions.)

Lines starting with [white space][1569] characters (*more-indented* lines) are not [folded][1570].

```
[177] s-nb-spaced-text(n) ::=
  s-indent(n)
  s-white
  nb-char*

```

```
[178] b-l-spaced(n) ::=
  b-as-line-feed
  l-empty(n,BLOCK-IN)*

```

```
[179] l-nb-spaced-lines(n) ::=
  s-nb-spaced-text(n)
  (
    b-l-spaced(n)
    s-nb-spaced-text(n)
  )*

```

**Example 8.11 More Indented Lines**

<table><tbody><tr><td><pre>&gt;

 folded
 line

 next
 line
<mark><mark>···* bullet</mark>↓</mark>
<mark>↓</mark>
<mark><mark>···* list</mark>↓</mark>
<mark><mark>···* lines</mark></mark>↓

 last
 line

# Comment
</pre></td><td><div><pre><code><span>"</span><span>\n</span><span>folded line</span><span>\n</span><span>next line</span><span>\n</span><span>  </span><span>\</span><span>
* bullet</span><span>\n</span><span> </span><span>\n</span><span>  * list</span><span>\n</span><span>  </span><span>\</span><span>
* lines</span><span>\n\n</span><span>last line</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

[Line breaks][1579] and [empty lines][1580] separating folded and more-indented lines are also not [folded][1581].

```
[180] l-nb-same-lines(n) ::=
  l-empty(n,BLOCK-IN)*
  (
      l-nb-folded-lines(n)
    | l-nb-spaced-lines(n)
  )

```

```
[181] l-nb-diff-lines(n) ::=
  l-nb-same-lines(n)
  (
    b-as-line-feed
    l-nb-same-lines(n)
  )*

```

**Example 8.12 Empty Separation Lines**

<table><tbody><tr><td><pre>&gt;
<mark>↓</mark>
 folded
 line<mark>↓</mark>
<mark>↓</mark>
 next
 line<mark>↓</mark>
   * bullet

   * list
   * lines<mark>↓</mark>
<mark>↓</mark>
 last
 line

# Comment
</pre></td><td><div><pre><code><span>"</span><span>\n</span><span>folded line</span><span>\n</span><span>next line</span><span>\n</span><span>  </span><span>\</span><span>
* bullet</span><span>\n</span><span> </span><span>\n</span><span>  * list</span><span>\n</span><span>  </span><span>\</span><span>
* lines</span><span>\n\n</span><span>last line</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[b-as-line-feed][1588]`
-   `(separation) [l-empty(n,c)][1589]`

The final [line break][1590] and trailing [empty lines][1591] if any, are subject to [chomping][1592] and are never [folded][1593].

```
[182] l-folded-content(n,t) ::=
  (
    l-nb-diff-lines(n)
    b-chomped-last(t)
  )?
  l-chomped-empty(n,t)

```

**Example 8.13 Final Empty Lines**

<table><tbody><tr><td><pre>&gt;

 folded
 line

 next
 line
   * bullet

   * list
   * lines

 last
 line<mark>↓</mark>
<mark>↓</mark>
<mark># Comment</mark>
</pre></td><td><div><pre><code><span>"</span><span>\n</span><span>folded line</span><span>\n</span><span>next line</span><span>\n</span><span>  </span><span>\</span><span>
* bullet</span><span>\n</span><span> </span><span>\n</span><span>  * list</span><span>\n</span><span>  </span><span>\</span><span>
* lines</span><span>\n\n</span><span>last line</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 8.2. Block Collection Styles

For readability, *block collections styles* are not denoted by any [indicator][1597]. Instead, YAML uses a lookahead method, where a block collection is distinguished from a [plain scalar][1598] only when a [key/value pair][1599] or a [sequence entry][1600] is seen.

### 8.2.1. Block Sequences

A *block sequence* is simply a series of [nodes][1601], each denoted by a leading “`-`” indicator. The “`-`” indicator must be [separated][1602] from the [node][1603] by [white space][1604]. This allows “`-`” to be used as the first character in a [plain scalar][1605] if followed by a non-space character (e.g. “`-42`”).

```
[183] l+block-sequence(n) ::=
  (
    s-indent(n+1+m)
    c-l-block-seq-entry(n+1+m)
  )+

```

```
[184] c-l-block-seq-entry(n) ::=
  c-sequence-entry    # '-'
  [ lookahead ≠ ns-char ]
  s-l+block-indented(n,BLOCK-IN)

```

**Example 8.14 Block Sequence**

<table><tbody><tr><td><pre>block sequence:
<mark>··</mark><mark>- one↓</mark>
  <mark>- two : three↓</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"block sequence"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>"one"</span><span>,</span><span>
    </span><span>{</span><span> </span><span>"two"</span><span>:</span><span> </span><span>"three"</span><span> </span><span>}</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[c-l-block-seq-entry(n)][1611]`
-   `auto-detected [s-indent(n)][1612]`

The entry [node][1613] may be either [completely empty][1614], be a nested [block node][1615] or use a *compact in-line notation*. The compact notation may be used when the entry is itself a nested [block collection][1616]. In this case, both the “`-`” indicator and the following [spaces][1617] are considered to be part of the [indentation][1618] of the nested [collection][1619]. Note that it is not possible to specify [node properties][1620] for such a [collection][1621].

```
[185] s-l+block-indented(n,c) ::=
    (
      s-indent(m)
      (
          ns-l-compact-sequence(n+1+m)
        | ns-l-compact-mapping(n+1+m)
      )
    )
  | s-l+block-node(n,c)
  | (
      e-node    # ""
      s-l-comments
    )

```

```
[186] ns-l-compact-sequence(n) ::=
  c-l-block-seq-entry(n)
  (
    s-indent(n)
    c-l-block-seq-entry(n)
  )*

```

**Example 8.15 Block Sequence Entry Types**

<table><tbody><tr><td><pre>-<mark>° # Empty</mark>
-<mark> |</mark>
 <mark>block node</mark>
-<mark>·- one # Compact</mark>
<mark>··- two # sequence</mark>
-<mark> one: two # Compact mapping</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"block node</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>[</span><span> </span><span>"one"</span><span>,</span><span> </span><span>"two"</span><span> </span><span>],</span><span>
  </span><span>{</span><span> </span><span>"one"</span><span>:</span><span> </span><span>"two"</span><span> </span><span>}</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `Empty`
-   `[s-l+block-node(n,c)][1631]`
-   `[ns-l-compact-sequence(n)][1632]`
-   `[ns-l-compact-mapping(n)][1633]`

### 8.2.2. Block Mappings

A *Block mapping* is a series of entries, each [presenting][1634] a [key/value pair][1635].

```
[187] l+block-mapping(n) ::=
  (
    s-indent(n+1+m)
    ns-l-block-map-entry(n+1+m)
  )+

```

**Example 8.16 Block Mappings**

<table><tbody><tr><td><pre>block mapping:
<mark>·</mark><mark>key: value↓</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"block mapping"</span><span>:</span><span> </span><span>{</span><span>
    </span><span>"key"</span><span>:</span><span> </span><span>"value"</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

**Legend:**

-   `[ns-l-block-map-entry(n)][1638]`
-   `auto-detected [s-indent(n)][1639]`

If the “`?`” indicator is specified, the optional value node must be specified on a separate line, denoted by the “`:`” indicator. Note that YAML allows here the same [compact in-line notation][1640] described above for [block sequence][1641] entries.

```
[188] ns-l-block-map-entry(n) ::=
    c-l-block-map-explicit-entry(n)
  | ns-l-block-map-implicit-entry(n)

```

```
[189] c-l-block-map-explicit-entry(n) ::=
  c-l-block-map-explicit-key(n)
  (
      l-block-map-explicit-value(n)
    | e-node                        # ""
  )

```

```
[190] c-l-block-map-explicit-key(n) ::=
  c-mapping-key                     # '?' (not followed by non-ws char)
  s-l+block-indented(n,BLOCK-OUT)

```

```
[191] l-block-map-explicit-value(n) ::=
  s-indent(n)
  c-mapping-value                   # ':' (not followed by non-ws char)
  s-l+block-indented(n,BLOCK-OUT)

```

**Example 8.17 Explicit Block Mapping Entries**

<table><tbody><tr><td><pre><mark>? explicit key # Empty value↓</mark><mark>°</mark>
<mark>? |</mark>
<mark>  block key↓</mark>
<mark>:·- one # Explicit compact</mark>
<mark>··- two # block value↓</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"explicit key"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"block key\n"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>"one"</span><span>,</span><span>
    </span><span>"two"</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

If the “`?`” indicator is omitted, [parsing][1652] needs to see past the [implicit key][1653], in the same way as in the [single key/value pair][1654] [flow mapping][1655]. Hence, such [keys][1656] are subject to the same restrictions; they are limited to a single line and must not span more than 1024 Unicode characters.

```
[192] ns-l-block-map-implicit-entry(n) ::=
  (
      ns-s-block-map-implicit-key
    | e-node    # ""
  )
  c-l-block-map-implicit-value(n)

```

```
[193] ns-s-block-map-implicit-key ::=
    c-s-implicit-json-key(BLOCK-KEY)
  | ns-s-implicit-yaml-key(BLOCK-KEY)

```

In this case, the [value][1662] may be specified on the same line as the [implicit key][1663]. Note however that in block mappings the [value][1664] must never be adjacent to the “`:`”, as this greatly reduces readability and is not required for [JSON compatibility][1665] (unlike the case in [flow mappings][1666]).

There is no compact notation for in-line [values][1667]. Also, while both the [implicit key][1668] and the [value][1669] following it may be empty, the “`:`” indicator is mandatory. This prevents a potential ambiguity with multi-line [plain scalars][1670].

```
[194] c-l-block-map-implicit-value(n) ::=
  c-mapping-value           # ':' (not followed by non-ws char)
  (
      s-l+block-node(n,BLOCK-OUT)
    | (
        e-node    # ""
        s-l-comments
      )
  )

```

**Example 8.18 Implicit Block Mapping Entries**

<table><tbody><tr><td><pre><mark>plain key</mark><mark>: in-line value</mark>
<mark>°</mark><mark>:° # Both empty</mark>
<mark>"quoted key"</mark><mark>:</mark>
<mark>- entry</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"plain key"</span><span>:</span><span> </span><span>"in-line value"</span><span>,</span><span>
  </span><span>null</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"quoted key"</span><span>:</span><span> </span><span>[</span><span> </span><span>"entry"</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

A [compact in-line notation][1675] is also available. This compact notation may be nested inside [block sequences][1676] and explicit block mapping entries. Note that it is not possible to specify [node properties][1677] for such a nested mapping.

```
[195] ns-l-compact-mapping(n) ::=
  ns-l-block-map-entry(n)
  (
    s-indent(n)
    ns-l-block-map-entry(n)
  )*

```

**Example 8.19 Compact Block Mappings**

<table><tbody><tr><td><pre>- <mark>sun: yellow↓</mark>
- <mark>? earth: blue↓</mark>
<mark>  : moon: white↓</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>{</span><span> </span><span>"sun"</span><span>:</span><span> </span><span>"yellow"</span><span> </span><span>},</span><span>
  </span><span>{</span><span> </span><span>{</span><span> </span><span>"earth"</span><span>:</span><span> </span><span>"blue"</span><span> </span><span>}</span><span>:</span><span>
      </span><span>{</span><span> </span><span>"moon"</span><span>:</span><span> </span><span>"white"</span><span> </span><span>}</span><span> </span><span>}</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 8.2.3. Block Nodes

YAML allows [flow nodes][1681] to be embedded inside [block collections][1682] (but not vice-versa). [Flow nodes][1683] must be [indented][1684] by at least one more [space][1685] than the parent [block collection][1686]. Note that [flow nodes][1687] may begin on a following line.

It is at this point that [parsing][1688] needs to distinguish between a [plain scalar][1689] and an [implicit key][1690] starting a nested [block mapping][1691].

```
[196] s-l+block-node(n,c) ::=
    s-l+block-in-block(n,c)
  | s-l+flow-in-block(n)

```

```
[197] s-l+flow-in-block(n) ::=
  s-separate(n+1,FLOW-OUT)
  ns-flow-node(n+1,FLOW-OUT)
  s-l-comments

```

**Example 8.20 Block Node Types**

<table><tbody><tr><td><pre>-<mark>↓</mark>
<mark>··"flow in block"↓</mark>
-·<mark>&gt;</mark>
<mark> Block scalar↓</mark>
-·<mark>!!map # Block collection</mark>
<mark>  foo : bar↓</mark>
</pre></td><td><div><pre><code><span>[</span><span> </span><span>"flow in block"</span><span>,</span><span>
  </span><span>"Block scalar</span><span>\n</span><span>"</span><span>,</span><span>
  </span><span>{</span><span> </span><span>"foo"</span><span>:</span><span> </span><span>"bar"</span><span> </span><span>}</span><span> </span><span>]</span><span>
</span></code></pre></div></td></tr></tbody></table>

The block [node’s properties][1697] may span across several lines. In this case, they must be [indented][1698] by at least one more [space][1699] than the [block collection][1700], regardless of the [indentation][1701] of the [block collection][1702] entries.

```
[198] s-l+block-in-block(n,c) ::=
    s-l+block-scalar(n,c)
  | s-l+block-collection(n,c)

```

```
[199] s-l+block-scalar(n,c) ::=
  s-separate(n+1,c)
  (
    c-ns-properties(n+1,c)
    s-separate(n+1,c)
  )?
  (
      c-l+literal(n)
    | c-l+folded(n)
  )

```

**Example 8.21 Block Scalar Nodes**

<table><tbody><tr><td><pre>literal: <mark>|2</mark>
<mark>··value</mark>
folded:<mark>↓</mark>
<mark>···!foo</mark>
<mark>··&gt;1</mark>
<mark>·value</mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"literal"</span><span>:</span><span> </span><span>"value"</span><span>,</span><span>
  </span><span>"folded"</span><span>:</span><span> </span><span>!&lt;!foo&gt;</span><span> </span><span>"value"</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

Since people perceive the “`-`” indicator as [indentation][1710], nested [block sequences][1711] may be [indented][1712] by one less [space][1713] to compensate, except, of course, if nested inside another [block sequence][1714] ([`BLOCK-OUT` context] versus [`BLOCK-IN` context]).

```
[200] s-l+block-collection(n,c) ::=
  (
    s-separate(n+1,c)
    c-ns-properties(n+1,c)
  )?
  s-l-comments
  (
      seq-space(n,c)
    | l+block-mapping(n)
  )

```

```
[201] seq-space(n,BLOCK-OUT) ::= l+block-sequence(n-1)
    seq-space(n,BLOCK-IN)  ::= l+block-sequence(n)

```

**Example 8.22 Block Collection Nodes**

<table><tbody><tr><td><pre>sequence:<mark> !!seq</mark>
<mark><mark>- entry</mark></mark>
<mark><mark>- !!seq</mark></mark>
<mark><mark> - nested</mark></mark>
mapping:<mark> !!map</mark>
<mark><mark> foo: bar</mark></mark>
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"sequence"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>"entry"</span><span>,</span><span>
    </span><span>[</span><span> </span><span>"nested"</span><span> </span><span>]</span><span> </span><span>],</span><span>
  </span><span>"mapping"</span><span>:</span><span> </span><span>{</span><span> </span><span>"foo"</span><span>:</span><span> </span><span>"bar"</span><span> </span><span>}</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## Chapter 9. Document Stream Productions

## 9.1. Documents

A YAML character [stream][1721] may contain several *documents*. Each document is completely independent from the rest.

### 9.1.1. Document Prefix

A document may be preceded by a *prefix* specifying the [character encoding][1722] and optional [comment][1723] lines. Note that all [documents][1724] in a stream must use the same [character encoding][1725]. However it is valid to re-specify the [encoding][1726] using a [byte order mark][1727] for each [document][1728] in the stream.

The existence of the optional prefix does not necessarily indicate the existence of an actual [document][1729].

```
[202] l-document-prefix ::=
  c-byte-order-mark?
  l-comment*

```

**Example 9.1 Document Prefix**

<table><tbody><tr><td><pre><mark>⇔# Comment</mark>
<mark># lines</mark>
Document
</pre></td><td></td></tr></tbody></table>

### 9.1.2. Document Markers

Using [directives][1732] creates a potential ambiguity. It is valid to have a “`%`” character at the start of a line (e.g. as the first character of the second line of a [plain scalar][1733]). How, then, to distinguish between an actual [directive][1734] and a [content][1735] line that happens to start with a “`%`” character?

The solution is the use of two special *marker* lines to control the processing of [directives][1736], one at the start of a [document][1737] and one at the end.

At the start of a [document][1738], lines beginning with a “`%`” character are assumed to be [directives][1739]. The (possibly empty) list of [directives][1740] is terminated by a *directives end marker* line. Lines following this marker can safely use “`%`” as the first character.

At the end of a [document][1741], a *document end marker* line is used to signal the [parser][1742] to begin scanning for [directives][1743] again.

The existence of this optional *document suffix* does not necessarily indicate the existence of an actual following [document][1744].

Obviously, the actual [content][1745] lines are therefore forbidden to begin with either of these markers.

```
[203] c-directives-end ::= "---"

```

```
[204] c-document-end ::=
  "..."    # (not followed by non-ws char)

```

```
[205] l-document-suffix ::=
  c-document-end
  s-l-comments

```

```
[206] c-forbidden ::=
  <start-of-line>
  (
      c-directives-end
    | c-document-end
  )
  (
      b-char
    | s-white
    | <end-of-input>
  )

```

**Example 9.2 Document Markers**

<table><tbody><tr><td><pre>%YAML 1.2
<mark>---</mark>
Document
<mark><mark>...</mark> # Suffix</mark>
</pre></td><td></td></tr></tbody></table>

### 9.1.3. Bare Documents

A *bare document* does not begin with any [directives][1752] or [marker][1753] lines. Such documents are very “clean” as they contain nothing other than the [content][1754]. In this case, the first non-comment line may not start with a “`%`” first character.

Document [nodes][1755] are [indented][1756] as if they have a parent [indented][1757] at -1 [spaces][1758]. Since a [node][1759] must be more [indented][1760] than its parent [node][1761], this allows the document’s [node][1762] to be [indented][1763] at zero or more [spaces][1764].

```
[207] l-bare-document ::=
  s-l+block-node(-1,BLOCK-IN)
  /* Excluding c-forbidden content */

```

**Example 9.3 Bare Documents**

<table><tbody><tr><td><pre><mark>Bare</mark>
<mark>document</mark>
...
# No document
...
<mark>|</mark>
<mark>%!PS-Adobe-2.0 # Not the first line</mark>
</pre></td><td><div><pre><code><span>"Bare document"</span><span>
</span><span>---</span><span>
</span><span>"%!PS-Adobe-2.0</span><span>\n</span><span>"</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 9.1.4. Explicit Documents

An *explicit document* begins with an explicit [directives end marker][1767] line but no [directives][1768]. Since the existence of the [document][1769] is indicated by this [marker][1770], the [document][1771] itself may be [completely empty][1772].

```
[208] l-explicit-document ::=
  c-directives-end
  (
      l-bare-document
    | (
        e-node    # ""
        s-l-comments
      )
  )

```

**Example 9.4 Explicit Documents**

<table><tbody><tr><td><pre><mark>---</mark>
<mark>{ matches</mark>
<mark>% : 20 }</mark>
...
<mark>---</mark>
<mark># Empty</mark>
...
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"matches %"</span><span>:</span><span> </span><span>20</span><span> </span><span>}</span><span>
</span><span>---</span><span>
</span><span>null</span><span>
</span></code></pre></div></td></tr></tbody></table>

### 9.1.5. Directives Documents

A *directives document* begins with some [directives][1777] followed by an explicit [directives end marker][1778] line.

```
[209] l-directive-document ::=
  l-directive+
  l-explicit-document

```

**Example 9.5 Directives Documents**

<table><tbody><tr><td><pre><mark>%YAML 1.2</mark>
<mark>--- |</mark>
<mark>%!PS-Adobe-2.0</mark>
...
<mark>%YAML 1.2</mark>
<mark>---</mark>
<mark># Empty</mark>
...
</pre></td><td><div><pre><code><span>"%!PS-Adobe-2.0</span><span>\n</span><span>"</span><span>
</span><span>---</span><span>
</span><span>null</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 9.2. Streams

A YAML *stream* consists of zero or more [documents][1781]. Subsequent [documents][1782] require some sort of separation [marker][1783] line. If a [document][1784] is not terminated by a [document end marker][1785] line, then the following [document][1786] must begin with a [directives end marker][1787] line.

```
[210] l-any-document ::=
    l-directive-document
  | l-explicit-document
  | l-bare-document

```

```
[211] l-yaml-stream ::=
  l-document-prefix*
  l-any-document?
  (
      (
        l-document-suffix+
        l-document-prefix*
        l-any-document?
      )
    | c-byte-order-mark
    | l-comment
    | l-explicit-document
  )*

```

**Example 9.6 Stream**

<table><tbody><tr><td><pre><mark>Document</mark>
<mark>---</mark>
<mark># Empty</mark>
<mark>...</mark>
<mark>%YAML 1.2</mark>
<mark>---</mark>
<mark>matches %: 20</mark>
</pre></td><td><div><pre><code><span>"Document"</span><span>
</span><span>---</span><span>
</span><span>null</span><span>
</span><span>---</span><span>
</span><span>{</span><span> </span><span>"matches %"</span><span>:</span><span> </span><span>20</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

A sequence of bytes is a *well-formed stream* if, taken as a whole, it complies with the above `l-yaml-stream` production.

## Chapter 10. Recommended Schemas

A YAML *schema* is a combination of a set of [tags][1799] and a mechanism for [resolving][1800] [non-specific tags][1801].

## 10.1. Failsafe Schema

The *failsafe schema* is guaranteed to work with any YAML [document][1802]. It is therefore the recommended [schema][1803] for generic YAML tools. A YAML [processor][1804] should therefore support this [schema][1805], at least as an option.

### 10.1.1. Tags

#### 10.1.1.1. Generic Mapping

URI

`tag:yaml.org,2002:map`

Kind

[Mapping][1806].

Definition

[Represents][1807] an associative container, where each [key][1808] is unique in the association and mapped to exactly one [value][1809]. YAML places no restrictions on the type of [keys][1810]; in particular, they are not restricted to being [scalars][1811]. Example [bindings][1812] to [native][1813] types include Perl’s hash, Python’s dictionary and Java’s Hashtable.

**Example 10.1 `!!map` Examples**

```
Block style: !!map
  Clark : Evans
  Ingy  : döt Net
  Oren  : Ben-Kiki

Flow style: !!map { Clark: Evans, Ingy: döt Net, Oren: Ben-Kiki }

```

#### 10.1.1.2. Generic Sequence

URI

`tag:yaml.org,2002:seq`

Kind

[Sequence][1814].

Definition

[Represents][1815] a collection indexed by sequential integers starting with zero. Example [bindings][1816] to [native][1817] types include Perl’s array, Python’s list or tuple and Java’s array or Vector.

**Example 10.2 `!!seq` Examples**

```
Block style: !!seq
- Clark Evans
- Ingy döt Net
- Oren Ben-Kiki

Flow style: !!seq [ Clark Evans, Ingy döt Net, Oren Ben-Kiki ]

```

#### 10.1.1.3. Generic String

URI

`tag:yaml.org,2002:str`

Kind

[Scalar][1818].

Definition

[Represents][1819] a Unicode string, a sequence of zero or more Unicode characters. This type is usually [bound][1820] to the [native][1821] language’s string type or, for languages lacking one (such as C), to a character array.

Canonical Form:

The obvious.

**Example 10.3 `!!str` Examples**

```
Block style: !!str |-
  String: just a theory.

Flow style: !!str "String: just a theory."

```

### 10.1.2. Tag Resolution

All [nodes][1822] with the “`!`” non-specific tag are [resolved][1823], by the standard [convention][1824], to “`tag:yaml.org,2002:seq`”, “`tag:yaml.org,2002:map`” or “`tag:yaml.org,2002:str`”, according to their [kind][1825].

All [nodes][1826] with the “`?`” non-specific tag are left [unresolved][1827]. This constrains the [application][1828] to deal with a [partial representation][1829].

## 10.2. JSON Schema

The *JSON schema* is the lowest common denominator of most modern computer languages and allows [parsing][1830] JSON files. A YAML [processor][1831] should therefore support this [schema][1832], at least as an option. It is also strongly recommended that other [schemas][1833] should be based on it.

### 10.2.1. Tags

The JSON [schema][1834] uses the following [tags][1835] in addition to those defined by the [failsafe][1836] schema:

#### 10.2.1.1. Null

URI

`tag:yaml.org,2002:null`

Kind

[Scalar][1837].

Definition

[Represents][1838] the lack of a value. This is typically [bound][1839] to a [native][1840] null-like value (e.g., `undef` in Perl, `None` in Python). Note that a null is different from an empty string. Also, a [mapping][1841] entry with some [key][1842] and a null [value][1843] is valid and different from not having that [key][1844] in the [mapping][1845].

Canonical Form

`null`.

**Example 10.4 `!!null` Examples**

```
!!null null: value for null key
key with null value: !!null null

```

#### 10.2.1.2. Boolean

URI

`tag:yaml.org,2002:bool`

Kind

[Scalar][1846].

Definition

[Represents][1847] a true/false value. In languages without a [native][1848] Boolean type (such as C), they are usually [bound][1849] to a native integer type, using one for true and zero for false.

Canonical Form

Either `true` or `false`.

**Example 10.5 `!!bool` Examples**

```
YAML is a superset of JSON: !!bool true
Pluto is a planet: !!bool false

```

#### 10.2.1.3. Integer

URI

`tag:yaml.org,2002:int`

Kind

[Scalar][1850].

Definition

[Represents][1851] arbitrary sized finite mathematical integers. Scalars of this type should be [bound][1852] to a [native][1853] integer data type, if possible.

Some languages (such as Perl) provide only a “number” type that allows for both integer and floating-point values. A YAML [processor][1854] may use such a type for integers as long as they round-trip properly.

In some languages (such as C), an integer may overflow the [native][1855] type’s storage capability. A YAML [processor][1856] may reject such a value as an error, truncate it with a warning or find some other manner to round-trip it. In general, integers representable using 32 binary digits should safely round-trip through most systems.

Canonical Form

Decimal integer notation, with a leading “`-`” character for negative values, matching the regular expression `0 | -? [1-9] [0-9]*`

**Example 10.6 `!!int` Examples**

```
negative: !!int -12
zero: !!int 0
positive: !!int 34

```

#### 10.2.1.4. Floating Point

URI

`tag:yaml.org,2002:float`

Kind

[Scalar][1857].

Definition

[Represents][1858] an approximation to real numbers, including three special values (positive and negative infinity and “not a number”).

Some languages (such as Perl) provide only a “number” type that allows for both integer and floating-point values. A YAML [processor][1859] may use such a type for floating-point numbers, as long as they round-trip properly.

Not all floating-point values can be stored exactly in any given [native][1860] type. Hence a float value may change by “a small amount” when round-tripped. The supported range and accuracy depends on the implementation, though 32 bit IEEE floats should be safe. Since YAML does not specify a particular accuracy, using floating-point [mapping keys][1861] requires great care and is not recommended.

Canonical Form

Either `0`, `.inf`, `-.inf`, `.nan` or scientific notation matching the regular expression  
`-? [1-9] ( \. [0-9]* [1-9] )? ( e [-+] [1-9] [0-9]* )?`.

**Example 10.7 `!!float` Examples**

```
negative: !!float -1
zero: !!float 0
positive: !!float 2.3e4
infinity: !!float .inf
not a number: !!float .nan

```

### 10.2.2. Tag Resolution

The [JSON schema][1862] [tag resolution][1863] is an extension of the [failsafe schema][1864] [tag resolution][1865].

All [nodes][1866] with the “`!`” non-specific tag are [resolved][1867], by the standard [convention][1868], to “`tag:yaml.org,2002:seq`”, “`tag:yaml.org,2002:map`” or “`tag:yaml.org,2002:str`”, according to their [kind][1869].

[Collections][1870] with the “`?`” non-specific tag (that is, [untagged][1871] [collections][1872]) are [resolved][1873] to “`tag:yaml.org,2002:seq`” or “`tag:yaml.org,2002:map`” according to their [kind][1874].

[Scalars][1875] with the “`?`” non-specific tag (that is, [plain scalars][1876]) are matched with a list of regular expressions (first match wins, e.g. `0` is resolved as `!!int`). In principle, JSON files should not contain any [scalars][1877] that do not match at least one of these. Hence the YAML [processor][1878] should consider them to be an error.

| Regular expression | Resolved to tag |
| --- | --- |
| `null` | tag:yaml.org,2002:null |
| `true | false` | tag:yaml.org,2002:bool |
| `-? ( 0 | [1-9] [0-9]* )` | tag:yaml.org,2002:int |
| `-? ( 0 | [1-9] [0-9]* ) ( \. [0-9]* )? ( [eE] [-+]? [0-9]+ )?` | tag:yaml.org,2002:float |
| `*` | Error |

> Note: The regular expression for `float` does not exactly match the one in the JSON specification, where at least one digit is required after the dot: `( \. [0-9]+ )`. The YAML 1.2 specification intended to match JSON behavior, but this cannot be addressed in the 1.2.2 specification.

**Example 10.8 JSON Tag Resolution**

<table><tbody><tr><td><pre>A null: null
Booleans: [ true, false ]
Integers: [ 0, -0, 3, -19 ]
Floats: [ 0., -0.0, 12e03, -2E+05 ]
Invalid: [ True, Null,
  0o7, 0x3A, +12.3 ]
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"A null"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"Booleans"</span><span>:</span><span> </span><span>[</span><span> </span><span>true</span><span>,</span><span> </span><span>false</span><span> </span><span>],</span><span>
  </span><span>"Integers"</span><span>:</span><span> </span><span>[</span><span> </span><span>0</span><span>,</span><span> </span><span>0</span><span>,</span><span> </span><span>3</span><span>,</span><span> </span><span>-19</span><span> </span><span>],</span><span>
  </span><span>"Floats"</span><span>:</span><span> </span><span>[</span><span> </span><span>0.0</span><span>,</span><span> </span><span>-0.0</span><span>,</span><span> </span><span>12000</span><span>,</span><span> </span><span>-200000</span><span> </span><span>],</span><span>
  </span><span>"Invalid"</span><span>:</span><span> </span><span>[</span><span> </span><span>"True"</span><span>,</span><span> </span><span>"Null"</span><span>,</span><span>
    </span><span>"0o7"</span><span>,</span><span> </span><span>"0x3A"</span><span>,</span><span> </span><span>"+12.3"</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 10.3. Core Schema

The *Core schema* is an extension of the [JSON schema][1879], allowing for more human-readable [presentation][1880] of the same types. This is the recommended default [schema][1881] that YAML [processor][1882] should use unless instructed otherwise. It is also strongly recommended that other [schemas][1883] should be based on it.

### 10.3.1. Tags

The core [schema][1884] uses the same [tags][1885] as the [JSON schema][1886].

### 10.3.2. Tag Resolution

The [core schema][1887] [tag resolution][1888] is an extension of the [JSON schema][1889] [tag resolution][1890].

All [nodes][1891] with the “`!`” non-specific tag are [resolved][1892], by the standard [convention][1893], to “`tag:yaml.org,2002:seq`”, “`tag:yaml.org,2002:map`” or “`tag:yaml.org,2002:str`”, according to their [kind][1894].

[Collections][1895] with the “`?`” non-specific tag (that is, [untagged][1896] [collections][1897]) are [resolved][1898] to “`tag:yaml.org,2002:seq`” or “`tag:yaml.org,2002:map`” according to their [kind][1899].

[Scalars][1900] with the “`?`” non-specific tag (that is, [plain scalars][1901]) are matched with an extended list of regular expressions. However, in this case, if none of the regular expressions matches, the [scalar][1902] is [resolved][1903] to `tag:yaml.org,2002:str` (that is, considered to be a string).

| Regular expression | Resolved to tag |
| --- | --- |
| `null | Null | NULL | ~` | tag:yaml.org,2002:null |
| `/* Empty */` | tag:yaml.org,2002:null |
| `true | True | TRUE | false | False | FALSE` | tag:yaml.org,2002:bool |
| `[-+]? [0-9]+` | tag:yaml.org,2002:int (Base 10) |
| `0o [0-7]+` | tag:yaml.org,2002:int (Base 8) |
| `0x [0-9a-fA-F]+` | tag:yaml.org,2002:int (Base 16) |
| `[-+]? ( \. [0-9]+ | [0-9]+ ( \. [0-9]* )? ) ( [eE] [-+]? [0-9]+ )?` | tag:yaml.org,2002:float (Number) |
| `[-+]? ( \.inf | \.Inf | \.INF )` | tag:yaml.org,2002:float (Infinity) |
| `\.nan | \.NaN | \.NAN` | tag:yaml.org,2002:float (Not a number) |
| `*` | tag:yaml.org,2002:str (Default) |

**Example 10.9 Core Tag Resolution**

<table><tbody><tr><td><pre>A null: null
Also a null: # Empty
Not a null: ""
Booleans: [ true, True, false, FALSE ]
Integers: [ 0, 0o7, 0x3A, -19 ]
Floats: [
  0., -0.0, .5, +12e03, -2E+05 ]
Also floats: [
  .inf, -.Inf, +.INF, .NAN ]
</pre></td><td><div><pre><code><span>{</span><span> </span><span>"A null"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"Also a null"</span><span>:</span><span> </span><span>null</span><span>,</span><span>
  </span><span>"Not a null"</span><span>:</span><span> </span><span>""</span><span>,</span><span>
  </span><span>"Booleans"</span><span>:</span><span> </span><span>[</span><span> </span><span>true</span><span>,</span><span> </span><span>true</span><span>,</span><span> </span><span>false</span><span>,</span><span> </span><span>false</span><span> </span><span>],</span><span>
  </span><span>"Integers"</span><span>:</span><span> </span><span>[</span><span> </span><span>0</span><span>,</span><span> </span><span>7</span><span>,</span><span> </span><span>58</span><span>,</span><span> </span><span>-19</span><span> </span><span>],</span><span>
  </span><span>"Floats"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>0.0</span><span>,</span><span> </span><span>-0.0</span><span>,</span><span> </span><span>0.5</span><span>,</span><span> </span><span>12000</span><span>,</span><span> </span><span>-200000</span><span> </span><span>],</span><span>
  </span><span>"Also floats"</span><span>:</span><span> </span><span>[</span><span>
    </span><span>Infinity</span><span>,</span><span> </span><span>-Infinity</span><span>,</span><span> </span><span>Infinity</span><span>,</span><span> </span><span>NaN</span><span> </span><span>]</span><span> </span><span>}</span><span>
</span></code></pre></div></td></tr></tbody></table>

## 10.4. Other Schemas

None of the above recommended [schemas][1904] preclude the use of arbitrary explicit [tags][1905]. Hence YAML [processors][1906] for a particular programming language typically provide some form of [local tags][1907] that map directly to the language’s [native data structures][1908] (e.g., `!ruby/object:Set`).

While such [local tags][1909] are useful for ad hoc [applications][1910], they do not suffice for stable, interoperable cross-[application][1911] or cross-platform data exchange.

Interoperable [schemas][1912] make use of [global tags][1913] (URIs) that [represent][1914] the same data across different programming languages. In addition, an interoperable [schema][1915] may provide additional [tag resolution][1916] rules. Such rules may provide additional regular expressions, as well as consider the path to the [node][1917]. This allows interoperable [schemas][1918] to use [untagged][1919] [nodes][1920].

It is strongly recommended that such [schemas][1921] be based on the [core schema][1922] defined above.

## Reference Links

[1]: https://yaml.org/spec/1.2.2/#fn:team
[2]: https://yaml.org/spec/1.2.2/#fn:spec-repo
[3]: https://yaml.org/spec/1.2.2/#fn:1-2-spec
[4]: https://yaml.org/spec/1.2.2/ext/resources
[5]: https://yaml.org/spec/1.2.2/ext/glossary
[6]: https://yaml.org/spec/1.2.2/ext/changes
[7]: https://yaml.org/spec/1.2.2/ext/errata
[8]: https://yaml.org/spec/1.2.2/#fn:unicode
[9]: https://yaml.org/spec/1.2.2/#yaml-aint-markup-language-yaml-version-12
[10]: https://yaml.org/spec/1.2.2/#revision-122-2021-10-01
[11]: https://yaml.org/spec/1.2.2/#chapter-1-introduction-to-yaml
[12]: https://yaml.org/spec/1.2.2/#11-goals
[13]: https://yaml.org/spec/1.2.2/#12-yaml-history
[14]: https://yaml.org/spec/1.2.2/#13-terminology
[15]: https://yaml.org/spec/1.2.2/#chapter-2-language-overview
[16]: https://yaml.org/spec/1.2.2/#21-collections
[17]: https://yaml.org/spec/1.2.2/#22-structures
[18]: https://yaml.org/spec/1.2.2/#23-scalars
[19]: https://yaml.org/spec/1.2.2/#24-tags
[20]: https://yaml.org/spec/1.2.2/#25-full-length-example
[21]: https://yaml.org/spec/1.2.2/#chapter-3-processes-and-models
[22]: https://yaml.org/spec/1.2.2/#31-processes
[23]: https://yaml.org/spec/1.2.2/#311-dump
[24]: https://yaml.org/spec/1.2.2/#312-load
[25]: https://yaml.org/spec/1.2.2/#32-information-models
[26]: https://yaml.org/spec/1.2.2/#321-representation-graph
[27]: https://yaml.org/spec/1.2.2/#3211-nodes
[28]: https://yaml.org/spec/1.2.2/#3212-tags
[29]: https://yaml.org/spec/1.2.2/#3213-node-comparison
[30]: https://yaml.org/spec/1.2.2/#322-serialization-tree
[31]: https://yaml.org/spec/1.2.2/#3221-mapping-key-order
[32]: https://yaml.org/spec/1.2.2/#3222-anchors-and-aliases
[33]: https://yaml.org/spec/1.2.2/#323-presentation-stream
[34]: https://yaml.org/spec/1.2.2/#3231-node-styles
[35]: https://yaml.org/spec/1.2.2/#3232-scalar-formats
[36]: https://yaml.org/spec/1.2.2/#3233-comments
[37]: https://yaml.org/spec/1.2.2/#3234-directives
[38]: https://yaml.org/spec/1.2.2/#33-loading-failure-points
[39]: https://yaml.org/spec/1.2.2/#331-well-formed-streams-and-identified-aliases
[40]: https://yaml.org/spec/1.2.2/#332-resolved-tags
[41]: https://yaml.org/spec/1.2.2/#333-recognized-and-valid-tags
[42]: https://yaml.org/spec/1.2.2/#334-available-tags
[43]: https://yaml.org/spec/1.2.2/#chapter-4-syntax-conventions
[44]: https://yaml.org/spec/1.2.2/#41-production-syntax
[45]: https://yaml.org/spec/1.2.2/#42-production-parameters
[46]: https://yaml.org/spec/1.2.2/#43-production-naming-conventions
[47]: https://yaml.org/spec/1.2.2/#chapter-5-character-productions
[48]: https://yaml.org/spec/1.2.2/#51-character-set
[49]: https://yaml.org/spec/1.2.2/#52-character-encodings
[50]: https://yaml.org/spec/1.2.2/#53-indicator-characters
[51]: https://yaml.org/spec/1.2.2/#54-line-break-characters
[52]: https://yaml.org/spec/1.2.2/#55-white-space-characters
[53]: https://yaml.org/spec/1.2.2/#56-miscellaneous-characters
[54]: https://yaml.org/spec/1.2.2/#57-escaped-characters
[55]: https://yaml.org/spec/1.2.2/#chapter-6-structural-productions
[56]: https://yaml.org/spec/1.2.2/#61-indentation-spaces
[57]: https://yaml.org/spec/1.2.2/#62-separation-spaces
[58]: https://yaml.org/spec/1.2.2/#63-line-prefixes
[59]: https://yaml.org/spec/1.2.2/#64-empty-lines
[60]: https://yaml.org/spec/1.2.2/#65-line-folding
[61]: https://yaml.org/spec/1.2.2/#66-comments
[62]: https://yaml.org/spec/1.2.2/#67-separation-lines
[63]: https://yaml.org/spec/1.2.2/#68-directives
[64]: https://yaml.org/spec/1.2.2/#681-yaml-directives
[65]: https://yaml.org/spec/1.2.2/#682-tag-directives
[66]: https://yaml.org/spec/1.2.2/#6821-tag-handles
[67]: https://yaml.org/spec/1.2.2/#6822-tag-prefixes
[68]: https://yaml.org/spec/1.2.2/#69-node-properties
[69]: https://yaml.org/spec/1.2.2/#691-node-tags
[70]: https://yaml.org/spec/1.2.2/#692-node-anchors
[71]: https://yaml.org/spec/1.2.2/#chapter-7-flow-style-productions
[72]: https://yaml.org/spec/1.2.2/#71-alias-nodes
[73]: https://yaml.org/spec/1.2.2/#72-empty-nodes
[74]: https://yaml.org/spec/1.2.2/#73-flow-scalar-styles
[75]: https://yaml.org/spec/1.2.2/#731-double-quoted-style
[76]: https://yaml.org/spec/1.2.2/#732-single-quoted-style
[77]: https://yaml.org/spec/1.2.2/#733-plain-style
[78]: https://yaml.org/spec/1.2.2/#74-flow-collection-styles
[79]: https://yaml.org/spec/1.2.2/#741-flow-sequences
[80]: https://yaml.org/spec/1.2.2/#742-flow-mappings
[81]: https://yaml.org/spec/1.2.2/#75-flow-nodes
[82]: https://yaml.org/spec/1.2.2/#chapter-8-block-style-productions
[83]: https://yaml.org/spec/1.2.2/#81-block-scalar-styles
[84]: https://yaml.org/spec/1.2.2/#811-block-scalar-headers
[85]: https://yaml.org/spec/1.2.2/#8111-block-indentation-indicator
[86]: https://yaml.org/spec/1.2.2/#8112-block-chomping-indicator
[87]: https://yaml.org/spec/1.2.2/#812-literal-style
[88]: https://yaml.org/spec/1.2.2/#813-folded-style
[89]: https://yaml.org/spec/1.2.2/#82-block-collection-styles
[90]: https://yaml.org/spec/1.2.2/#821-block-sequences
[91]: https://yaml.org/spec/1.2.2/#822-block-mappings
[92]: https://yaml.org/spec/1.2.2/#823-block-nodes
[93]: https://yaml.org/spec/1.2.2/#chapter-9-document-stream-productions
[94]: https://yaml.org/spec/1.2.2/#91-documents
[95]: https://yaml.org/spec/1.2.2/#911-document-prefix
[96]: https://yaml.org/spec/1.2.2/#912-document-markers
[97]: https://yaml.org/spec/1.2.2/#913-bare-documents
[98]: https://yaml.org/spec/1.2.2/#914-explicit-documents
[99]: https://yaml.org/spec/1.2.2/#915-directives-documents
[100]: https://yaml.org/spec/1.2.2/#92-streams
[101]: https://yaml.org/spec/1.2.2/#chapter-10-recommended-schemas
[102]: https://yaml.org/spec/1.2.2/#101-failsafe-schema
[103]: https://yaml.org/spec/1.2.2/#1011-tags
[104]: https://yaml.org/spec/1.2.2/#10111-generic-mapping
[105]: https://yaml.org/spec/1.2.2/#10112-generic-sequence
[106]: https://yaml.org/spec/1.2.2/#10113-generic-string
[107]: https://yaml.org/spec/1.2.2/#1012-tag-resolution
[108]: https://yaml.org/spec/1.2.2/#102-json-schema
[109]: https://yaml.org/spec/1.2.2/#1021-tags
[110]: https://yaml.org/spec/1.2.2/#10211-null
[111]: https://yaml.org/spec/1.2.2/#10212-boolean
[112]: https://yaml.org/spec/1.2.2/#10213-integer
[113]: https://yaml.org/spec/1.2.2/#10214-floating-point
[114]: https://yaml.org/spec/1.2.2/#1022-tag-resolution
[115]: https://yaml.org/spec/1.2.2/#103-core-schema
[116]: https://yaml.org/spec/1.2.2/#1031-tags
[117]: https://yaml.org/spec/1.2.2/#1032-tag-resolution
[118]: https://yaml.org/spec/1.2.2/#104-other-schemas
[119]: https://yaml.org/spec/1.2.2/#reference-links
[120]: https://yaml.org/spec/1.2.2/#processes-and-models
[121]: https://yaml.org/spec/1.2.2/#character-set
[122]: https://yaml.org/spec/1.2.2/#indicator-characters
[123]: https://yaml.org/spec/1.2.2/#indentation-spaces
[124]: https://yaml.org/spec/1.2.2/#flow-mappings
[125]: https://yaml.org/spec/1.2.2/#mapping
[126]: https://yaml.org/spec/1.2.2/#block-sequences
[127]: https://yaml.org/spec/1.2.2/#sequence
[128]: https://yaml.org/spec/1.2.2/#dump
[129]: https://yaml.org/spec/1.2.2/#representation-graph
[130]: https://yaml.org/spec/1.2.2/#mapping
[131]: https://yaml.org/spec/1.2.2/#sequence
[132]: https://yaml.org/spec/1.2.2/#scalars
[133]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[134]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[135]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[136]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[137]: https://yaml.org/spec/1.2.2/#fn:yaml-core
[138]: https://yaml.org/spec/1.2.2/#fn:sml-dev
[139]: https://yaml.org/spec/1.2.2/#fn:denter
[140]: https://yaml.org/spec/1.2.2/#fn:1-1-spec
[141]: https://yaml.org/spec/1.2.2/#fn:json
[142]: https://yaml.org/spec/1.2.2/#fn:pyyaml
[143]: https://yaml.org/spec/1.2.2/#fn:libyaml
[144]: https://yaml.org/spec/1.2.2/#fn:1-2-spec
[145]: https://yaml.org/spec/1.2.2/ext/team
[146]: https://yaml.org/spec/1.2.2/#fn:rfc-2119
[147]: https://yaml.org/spec/1.2.2/#language-overview
[148]: https://yaml.org/spec/1.2.2/#processes-and-models
[149]: https://yaml.org/spec/1.2.2/#syntax-conventions
[150]: https://yaml.org/spec/1.2.2/#character-productions
[151]: https://yaml.org/spec/1.2.2/#structural-productions
[152]: https://yaml.org/spec/1.2.2/#flow-style-productions
[153]: https://yaml.org/spec/1.2.2/#block-style-productions
[154]: https://yaml.org/spec/1.2.2/#document-stream-productions
[155]: https://yaml.org/spec/1.2.2/#recommended-schemas
[156]: https://yaml.org/spec/1.2.2/#block-collection-styles
[157]: https://yaml.org/spec/1.2.2/#indentation-spaces
[158]: https://yaml.org/spec/1.2.2/#block-sequences
[159]: https://yaml.org/spec/1.2.2/#mapping
[160]: https://yaml.org/spec/1.2.2/#mapping
[161]: https://yaml.org/spec/1.2.2/#comments
[162]: https://yaml.org/spec/1.2.2/#flow-style-productions
[163]: https://yaml.org/spec/1.2.2/#indicator-characters
[164]: https://yaml.org/spec/1.2.2/#indentation-spaces
[165]: https://yaml.org/spec/1.2.2/#flow-sequences
[166]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[167]: https://yaml.org/spec/1.2.2/#flow-sequences
[168]: https://yaml.org/spec/1.2.2/#flow-sequences
[169]: https://yaml.org/spec/1.2.2/#flow-mappings
[170]: https://yaml.org/spec/1.2.2/#flow-mappings
[171]: https://yaml.org/spec/1.2.2/#flow-mappings
[172]: https://yaml.org/spec/1.2.2/#directives
[173]: https://yaml.org/spec/1.2.2/#documents
[174]: https://yaml.org/spec/1.2.2/#nodes
[175]: https://yaml.org/spec/1.2.2/#directives
[176]: https://yaml.org/spec/1.2.2/#nodes
[177]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[178]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[179]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[180]: https://yaml.org/spec/1.2.2/#mapping
[181]: https://yaml.org/spec/1.2.2/#nodes
[182]: https://yaml.org/spec/1.2.2/#block-collection-styles
[183]: https://yaml.org/spec/1.2.2/#mapping
[184]: https://yaml.org/spec/1.2.2/#block-sequences
[185]: https://yaml.org/spec/1.2.2/#flow-mappings
[186]: https://yaml.org/spec/1.2.2/#flow-mappings
[187]: https://yaml.org/spec/1.2.2/#scalar
[188]: https://yaml.org/spec/1.2.2/#scalars
[189]: https://yaml.org/spec/1.2.2/#literal-style
[190]: https://yaml.org/spec/1.2.2/#line-break-characters
[191]: https://yaml.org/spec/1.2.2/#folded-style
[192]: https://yaml.org/spec/1.2.2/#line-break-characters
[193]: https://yaml.org/spec/1.2.2/#line-folding
[194]: https://yaml.org/spec/1.2.2/#white-space-characters
[195]: https://yaml.org/spec/1.2.2/#empty-lines
[196]: https://yaml.org/spec/1.2.2/#example-more-indented-lines
[197]: https://yaml.org/spec/1.2.2/#flow-scalar-styles
[198]: https://yaml.org/spec/1.2.2/#plain-style
[199]: https://yaml.org/spec/1.2.2/#double-quoted-style
[200]: https://yaml.org/spec/1.2.2/#escaped-characters
[201]: https://yaml.org/spec/1.2.2/#single-quoted-style
[202]: https://yaml.org/spec/1.2.2/#escaped-characters
[203]: https://yaml.org/spec/1.2.2/#flow-scalar-styles
[204]: https://yaml.org/spec/1.2.2/#line-break-characters
[205]: https://yaml.org/spec/1.2.2/#line-folding
[206]: https://yaml.org/spec/1.2.2/#resolved-tags
[207]: https://yaml.org/spec/1.2.2/#processes-and-models
[208]: https://yaml.org/spec/1.2.2/#failsafe-schema
[209]: https://yaml.org/spec/1.2.2/#json-schema
[210]: https://yaml.org/spec/1.2.2/#tags
[211]: https://yaml.org/spec/1.2.2/#tags
[212]: https://yaml.org/spec/1.2.2/#tag-shorthands
[213]: https://yaml.org/spec/1.2.2/#tag-handles
[214]: https://yaml.org/spec/1.2.2/#processes-and-models
[215]: https://yaml.org/spec/1.2.2/#tags
[216]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[217]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[218]: https://yaml.org/spec/1.2.2/#representation-graph
[219]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[220]: https://yaml.org/spec/1.2.2/#representation-graph
[221]: https://yaml.org/spec/1.2.2/#streams
[222]: https://yaml.org/spec/1.2.2/#representation-graph
[223]: https://yaml.org/spec/1.2.2/#serialization-tree
[224]: https://yaml.org/spec/1.2.2/#presentation-stream
[225]: https://yaml.org/spec/1.2.2/#representation-graph
[226]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[227]: https://yaml.org/spec/1.2.2/#serialization-tree
[228]: https://yaml.org/spec/1.2.2/#representation-graph
[229]: https://yaml.org/spec/1.2.2/#presentation-stream
[230]: https://yaml.org/spec/1.2.2/#serialization-tree
[231]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[232]: https://yaml.org/spec/1.2.2/#streams
[233]: https://yaml.org/spec/1.2.2/#serialization-tree
[234]: https://yaml.org/spec/1.2.2/#representation-graph
[235]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[236]: https://yaml.org/spec/1.2.2/#streams
[237]: https://yaml.org/spec/1.2.2/#dump
[238]: https://yaml.org/spec/1.2.2/#load
[239]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[240]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[241]: https://yaml.org/spec/1.2.2/#representation-graph
[242]: https://yaml.org/spec/1.2.2/#mapping
[243]: https://yaml.org/spec/1.2.2/#comments
[244]: https://yaml.org/spec/1.2.2/#tag-handles
[245]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[246]: https://yaml.org/spec/1.2.2/#streams
[247]: https://yaml.org/spec/1.2.2/#nodes
[248]: https://yaml.org/spec/1.2.2/#sequence
[249]: https://yaml.org/spec/1.2.2/#mapping
[250]: https://yaml.org/spec/1.2.2/#node-comparison
[251]: https://yaml.org/spec/1.2.2/#nodes
[252]: https://yaml.org/spec/1.2.2/#nodes
[253]: https://yaml.org/spec/1.2.2/#scalar
[254]: https://yaml.org/spec/1.2.2/#sequence
[255]: https://yaml.org/spec/1.2.2/#mapping
[256]: https://yaml.org/spec/1.2.2/#scalar
[257]: https://yaml.org/spec/1.2.2/#nodes
[258]: https://yaml.org/spec/1.2.2/#nodes
[259]: https://yaml.org/spec/1.2.2/#nodes
[260]: https://yaml.org/spec/1.2.2/#tags
[261]: https://yaml.org/spec/1.2.2/#tags
[262]: https://yaml.org/spec/1.2.2/#tags
[263]: https://yaml.org/spec/1.2.2/#processes-and-models
[264]: https://yaml.org/spec/1.2.2/#scalar
[265]: https://yaml.org/spec/1.2.2/#tags
[266]: https://yaml.org/spec/1.2.2/#mapping
[267]: https://yaml.org/spec/1.2.2/#tags
[268]: https://yaml.org/spec/1.2.2/#representation-graph
[269]: https://yaml.org/spec/1.2.2/#representation-graph
[270]: https://yaml.org/spec/1.2.2/#nodes
[271]: https://yaml.org/spec/1.2.2/#nodes
[272]: https://yaml.org/spec/1.2.2/#mapping-key-order
[273]: https://yaml.org/spec/1.2.2/#nodes
[274]: https://yaml.org/spec/1.2.2/#nodes
[275]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[276]: https://yaml.org/spec/1.2.2/#processes-and-models
[277]: https://yaml.org/spec/1.2.2/#mapping-key-order
[278]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[279]: https://yaml.org/spec/1.2.2/#processes-and-models
[280]: https://yaml.org/spec/1.2.2/#serialization-tree
[281]: https://yaml.org/spec/1.2.2/#serialization-tree
[282]: https://yaml.org/spec/1.2.2/#streams
[283]: https://yaml.org/spec/1.2.2/#processes-and-models
[284]: https://yaml.org/spec/1.2.2/#streams
[285]: https://yaml.org/spec/1.2.2/#node-styles
[286]: https://yaml.org/spec/1.2.2/#scalar-formats
[287]: https://yaml.org/spec/1.2.2/#indentation-spaces
[288]: https://yaml.org/spec/1.2.2/#tag-handles
[289]: https://yaml.org/spec/1.2.2/#node-tags
[290]: https://yaml.org/spec/1.2.2/#resolved-tags
[291]: https://yaml.org/spec/1.2.2/#directives
[292]: https://yaml.org/spec/1.2.2/#comments
[293]: https://yaml.org/spec/1.2.2/#processes-and-models
[294]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[295]: https://yaml.org/spec/1.2.2/#streams
[296]: https://yaml.org/spec/1.2.2/#presentation-stream
[297]: https://yaml.org/spec/1.2.2/#streams
[298]: https://yaml.org/spec/1.2.2/#serialization-tree
[299]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[300]: https://yaml.org/spec/1.2.2/#presentation-stream
[301]: https://yaml.org/spec/1.2.2/#serialization-tree
[302]: https://yaml.org/spec/1.2.2/#well-formed-streams-and-identified-aliases
[303]: https://yaml.org/spec/1.2.2/#serialization-tree
[304]: https://yaml.org/spec/1.2.2/#representation-graph
[305]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[306]: https://yaml.org/spec/1.2.2/#serialization-tree
[307]: https://yaml.org/spec/1.2.2/#representation-graph
[308]: https://yaml.org/spec/1.2.2/#loading-failure-points
[309]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[310]: https://yaml.org/spec/1.2.2/#representation-graph
[311]: https://yaml.org/spec/1.2.2/#representation-graph
[312]: https://yaml.org/spec/1.2.2/#serialization-tree
[313]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[314]: https://yaml.org/spec/1.2.2/#comments
[315]: https://yaml.org/spec/1.2.2/#directives
[316]: https://yaml.org/spec/1.2.2/#mapping
[317]: https://yaml.org/spec/1.2.2/#node-styles
[318]: https://yaml.org/spec/1.2.2/#scalar-formats
[319]: https://yaml.org/spec/1.2.2/#indentation-spaces
[320]: https://yaml.org/spec/1.2.2/#available-tags
[321]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[322]: https://yaml.org/spec/1.2.2/#serialization-tree
[323]: https://yaml.org/spec/1.2.2/#presentation-stream
[324]: https://yaml.org/spec/1.2.2/#representation-graph
[325]: https://yaml.org/spec/1.2.2/#mapping-key-order
[326]: https://yaml.org/spec/1.2.2/#nodes
[327]: https://yaml.org/spec/1.2.2/#representation-graph
[328]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[329]: https://yaml.org/spec/1.2.2/#processes-and-models
[330]: https://yaml.org/spec/1.2.2/#indentation-spaces
[331]: https://yaml.org/spec/1.2.2/#node-styles
[332]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[333]: https://yaml.org/spec/1.2.2/#serialization-tree
[334]: https://yaml.org/spec/1.2.2/#representation-graph
[335]: https://yaml.org/spec/1.2.2/#serialization-tree
[336]: https://yaml.org/spec/1.2.2/#presentation-stream
[337]: https://yaml.org/spec/1.2.2/#representation-graph
[338]: https://yaml.org/spec/1.2.2/#processes-and-models
[339]: https://yaml.org/spec/1.2.2/#serialization-tree
[340]: https://yaml.org/spec/1.2.2/#presentation-stream
[341]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[342]: https://yaml.org/spec/1.2.2/#tags
[343]: https://yaml.org/spec/1.2.2/#nodes
[344]: https://yaml.org/spec/1.2.2/#nodes
[345]: https://yaml.org/spec/1.2.2/#nodes
[346]: https://yaml.org/spec/1.2.2/#fn:digraph
[347]: https://yaml.org/spec/1.2.2/#nodes
[348]: https://yaml.org/spec/1.2.2/#nodes
[349]: https://yaml.org/spec/1.2.2/#nodes
[350]: https://yaml.org/spec/1.2.2/#nodes
[351]: https://yaml.org/spec/1.2.2/#collections
[352]: https://yaml.org/spec/1.2.2/#nodes
[353]: https://yaml.org/spec/1.2.2/#nodes
[354]: https://yaml.org/spec/1.2.2/#scalars
[355]: https://yaml.org/spec/1.2.2/#nodes
[356]: https://yaml.org/spec/1.2.2/#mapping
[357]: https://yaml.org/spec/1.2.2/#sequence
[358]: https://yaml.org/spec/1.2.2/#mapping
[359]: https://yaml.org/spec/1.2.2/#mapping
[360]: https://yaml.org/spec/1.2.2/#nodes
[361]: https://yaml.org/spec/1.2.2/#node-comparison
[362]: https://yaml.org/spec/1.2.2/#representation-graph
[363]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[364]: https://yaml.org/spec/1.2.2/#tags
[365]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[366]: https://yaml.org/spec/1.2.2/#node-comparison
[367]: https://yaml.org/spec/1.2.2/#representation-graph
[368]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[369]: https://yaml.org/spec/1.2.2/#processes-and-models
[370]: https://yaml.org/spec/1.2.2/#fn:tag-uri
[371]: https://yaml.org/spec/1.2.2/#processes-and-models
[372]: https://yaml.org/spec/1.2.2/#escaped-characters
[373]: https://yaml.org/spec/1.2.2/#nodes
[374]: https://yaml.org/spec/1.2.2/#nodes
[375]: https://yaml.org/spec/1.2.2/#scalar
[376]: https://yaml.org/spec/1.2.2/#sequence
[377]: https://yaml.org/spec/1.2.2/#mapping
[378]: https://yaml.org/spec/1.2.2/#scalar
[379]: https://yaml.org/spec/1.2.2/#scalar-formats
[380]: https://yaml.org/spec/1.2.2/#canonical-form
[381]: https://yaml.org/spec/1.2.2/#equality
[382]: https://yaml.org/spec/1.2.2/#nodes
[383]: https://yaml.org/spec/1.2.2/#tag-resolution
[384]: https://yaml.org/spec/1.2.2/#nodes
[385]: https://yaml.org/spec/1.2.2/#mapping
[386]: https://yaml.org/spec/1.2.2/#nodes
[387]: https://yaml.org/spec/1.2.2/#representation-graph
[388]: https://yaml.org/spec/1.2.2/#nodes
[389]: https://yaml.org/spec/1.2.2/#scalar-formats
[390]: https://yaml.org/spec/1.2.2/#nodes
[391]: https://yaml.org/spec/1.2.2/#mapping
[392]: https://yaml.org/spec/1.2.2/#processes-and-models
[393]: https://yaml.org/spec/1.2.2/#scalar-formats
[394]: https://yaml.org/spec/1.2.2/#nodes
[395]: https://yaml.org/spec/1.2.2/#scalar
[396]: https://yaml.org/spec/1.2.2/#scalar
[397]: https://yaml.org/spec/1.2.2/#tags
[398]: https://yaml.org/spec/1.2.2/#scalar-formats
[399]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[400]: https://yaml.org/spec/1.2.2/#nodes
[401]: https://yaml.org/spec/1.2.2/#nodes
[402]: https://yaml.org/spec/1.2.2/#tags
[403]: https://yaml.org/spec/1.2.2/#nodes
[404]: https://yaml.org/spec/1.2.2/#tags
[405]: https://yaml.org/spec/1.2.2/#nodes
[406]: https://yaml.org/spec/1.2.2/#nodes
[407]: https://yaml.org/spec/1.2.2/#nodes
[408]: https://yaml.org/spec/1.2.2/#scalars
[409]: https://yaml.org/spec/1.2.2/#tags
[410]: https://yaml.org/spec/1.2.2/#collections
[411]: https://yaml.org/spec/1.2.2/#sequence
[412]: https://yaml.org/spec/1.2.2/#tags
[413]: https://yaml.org/spec/1.2.2/#nodes
[414]: https://yaml.org/spec/1.2.2/#sequence
[415]: https://yaml.org/spec/1.2.2/#nodes
[416]: https://yaml.org/spec/1.2.2/#sequence
[417]: https://yaml.org/spec/1.2.2/#mapping
[418]: https://yaml.org/spec/1.2.2/#tags
[419]: https://yaml.org/spec/1.2.2/#nodes
[420]: https://yaml.org/spec/1.2.2/#nodes
[421]: https://yaml.org/spec/1.2.2/#nodes
[422]: https://yaml.org/spec/1.2.2/#mapping
[423]: https://yaml.org/spec/1.2.2/#processes-and-models
[424]: https://yaml.org/spec/1.2.2/#tags
[425]: https://yaml.org/spec/1.2.2/#tags
[426]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[427]: https://yaml.org/spec/1.2.2/#processes-and-models
[428]: https://yaml.org/spec/1.2.2/#scalars
[429]: https://yaml.org/spec/1.2.2/#mapping
[430]: https://yaml.org/spec/1.2.2/#nodes
[431]: https://yaml.org/spec/1.2.2/#representation-graph
[432]: https://yaml.org/spec/1.2.2/#mapping-key-order
[433]: https://yaml.org/spec/1.2.2/#nodes
[434]: https://yaml.org/spec/1.2.2/#alias-nodes
[435]: https://yaml.org/spec/1.2.2/#nodes
[436]: https://yaml.org/spec/1.2.2/#nodes
[437]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[438]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[439]: https://yaml.org/spec/1.2.2/#mapping-key-order
[440]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[441]: https://yaml.org/spec/1.2.2/#processes-and-models
[442]: https://yaml.org/spec/1.2.2/#representation-graph
[443]: https://yaml.org/spec/1.2.2/#nodes
[444]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[445]: https://yaml.org/spec/1.2.2/#mapping
[446]: https://yaml.org/spec/1.2.2/#nodes
[447]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[448]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[449]: https://yaml.org/spec/1.2.2/#representation-graph
[450]: https://yaml.org/spec/1.2.2/#processes-and-models
[451]: https://yaml.org/spec/1.2.2/#nodes
[452]: https://yaml.org/spec/1.2.2/#sequence
[453]: https://yaml.org/spec/1.2.2/#mapping
[454]: https://yaml.org/spec/1.2.2/#representation-graph
[455]: https://yaml.org/spec/1.2.2/#sequence
[456]: https://yaml.org/spec/1.2.2/#mapping
[457]: https://yaml.org/spec/1.2.2/#mapping
[458]: https://yaml.org/spec/1.2.2/#mapping
[459]: https://yaml.org/spec/1.2.2/#example-flow-mapping-adjacent-values
[460]: https://yaml.org/spec/1.2.2/#representation-graph
[461]: https://yaml.org/spec/1.2.2/#nodes
[462]: https://yaml.org/spec/1.2.2/#collections
[463]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[464]: https://yaml.org/spec/1.2.2/#nodes
[465]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[466]: https://yaml.org/spec/1.2.2/#alias-nodes
[467]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[468]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[469]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[470]: https://yaml.org/spec/1.2.2/#representation-graph
[471]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[472]: https://yaml.org/spec/1.2.2/#serialization-tree
[473]: https://yaml.org/spec/1.2.2/#serialization-tree
[474]: https://yaml.org/spec/1.2.2/#streams
[475]: https://yaml.org/spec/1.2.2/#node-styles
[476]: https://yaml.org/spec/1.2.2/#scalar-formats
[477]: https://yaml.org/spec/1.2.2/#comments
[478]: https://yaml.org/spec/1.2.2/#directives
[479]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[480]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[481]: https://yaml.org/spec/1.2.2/#serialization-tree
[482]: https://yaml.org/spec/1.2.2/#serialization-tree
[483]: https://yaml.org/spec/1.2.2/#documents
[484]: https://yaml.org/spec/1.2.2/#document-markers
[485]: https://yaml.org/spec/1.2.2/#nodes
[486]: https://yaml.org/spec/1.2.2/#nodes
[487]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[488]: https://yaml.org/spec/1.2.2/#serialization-tree
[489]: https://yaml.org/spec/1.2.2/#representation-graph
[490]: https://yaml.org/spec/1.2.2/#block-style-productions
[491]: https://yaml.org/spec/1.2.2/#indentation-spaces
[492]: https://yaml.org/spec/1.2.2/#flow-style-productions
[493]: https://yaml.org/spec/1.2.2/#indicator-characters
[494]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[495]: https://yaml.org/spec/1.2.2/#literal-style
[496]: https://yaml.org/spec/1.2.2/#folded-style
[497]: https://yaml.org/spec/1.2.2/#flow-scalar-styles
[498]: https://yaml.org/spec/1.2.2/#plain-style
[499]: https://yaml.org/spec/1.2.2/#single-quoted-style
[500]: https://yaml.org/spec/1.2.2/#double-quoted-style
[501]: https://yaml.org/spec/1.2.2/#block-sequences
[502]: https://yaml.org/spec/1.2.2/#mapping
[503]: https://yaml.org/spec/1.2.2/#scalars
[504]: https://yaml.org/spec/1.2.2/#collections
[505]: https://yaml.org/spec/1.2.2/#example-flow-mapping-adjacent-values
[506]: https://yaml.org/spec/1.2.2/#example-flow-mapping-adjacent-values
[507]: https://yaml.org/spec/1.2.2/#flow-mappings
[508]: https://yaml.org/spec/1.2.2/#mapping
[509]: https://yaml.org/spec/1.2.2/#flow-sequences
[510]: https://yaml.org/spec/1.2.2/#scalars
[511]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[512]: https://yaml.org/spec/1.2.2/#tags
[513]: https://yaml.org/spec/1.2.2/#canonical-form
[514]: https://yaml.org/spec/1.2.2/#equality
[515]: https://yaml.org/spec/1.2.2/#node-styles
[516]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[517]: https://yaml.org/spec/1.2.2/#serialization-tree
[518]: https://yaml.org/spec/1.2.2/#representation-graph
[519]: https://yaml.org/spec/1.2.2/#comments
[520]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[521]: https://yaml.org/spec/1.2.2/#serialization-tree
[522]: https://yaml.org/spec/1.2.2/#representation-graph
[523]: https://yaml.org/spec/1.2.2/#nodes
[524]: https://yaml.org/spec/1.2.2/#scalars
[525]: https://yaml.org/spec/1.2.2/#scalars
[526]: https://yaml.org/spec/1.2.2/#collections
[527]: https://yaml.org/spec/1.2.2/#documents
[528]: https://yaml.org/spec/1.2.2/#directives
[529]: https://yaml.org/spec/1.2.2/#processes-and-models
[530]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[531]: https://yaml.org/spec/1.2.2/#serialization-tree
[532]: https://yaml.org/spec/1.2.2/#representation-graph
[533]: https://yaml.org/spec/1.2.2/#directives
[534]: https://yaml.org/spec/1.2.2/#load
[535]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[536]: https://yaml.org/spec/1.2.2/#streams
[537]: https://yaml.org/spec/1.2.2/#streams
[538]: https://yaml.org/spec/1.2.2/#well-formed-streams-and-identified-aliases
[539]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[540]: https://yaml.org/spec/1.2.2/#well-formed-streams-and-identified-aliases
[541]: https://yaml.org/spec/1.2.2/#resolved-tags
[542]: https://yaml.org/spec/1.2.2/#resolved-tags
[543]: https://yaml.org/spec/1.2.2/#tags
[544]: https://yaml.org/spec/1.2.2/#recognized-and-valid-tags
[545]: https://yaml.org/spec/1.2.2/#nodes
[546]: https://yaml.org/spec/1.2.2/#recognized-and-valid-tags
[547]: https://yaml.org/spec/1.2.2/#mapping
[548]: https://yaml.org/spec/1.2.2/#nodes
[549]: https://yaml.org/spec/1.2.2/#node-comparison
[550]: https://yaml.org/spec/1.2.2/#available-tags
[551]: https://yaml.org/spec/1.2.2/#resolved-tags
[552]: https://yaml.org/spec/1.2.2/#tags
[553]: https://yaml.org/spec/1.2.2/#nodes
[554]: https://yaml.org/spec/1.2.2/#canonical-form
[555]: https://yaml.org/spec/1.2.2/#scalar-formats
[556]: https://yaml.org/spec/1.2.2/#documents
[557]: https://yaml.org/spec/1.2.2/#tags
[558]: https://yaml.org/spec/1.2.2/#nodes
[559]: https://yaml.org/spec/1.2.2/#canonical-form
[560]: https://yaml.org/spec/1.2.2/#scalar-formats
[561]: https://yaml.org/spec/1.2.2/#equality
[562]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[563]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[564]: https://yaml.org/spec/1.2.2/#example-stream
[565]: https://yaml.org/spec/1.2.2/#streams
[566]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[567]: https://yaml.org/spec/1.2.2/#nodes
[568]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[569]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[570]: https://yaml.org/spec/1.2.2/#processes-and-models
[571]: https://yaml.org/spec/1.2.2/#processes-and-models
[572]: https://yaml.org/spec/1.2.2/#tags
[573]: https://yaml.org/spec/1.2.2/#streams
[574]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[575]: https://yaml.org/spec/1.2.2/#nodes
[576]: https://yaml.org/spec/1.2.2/#tags
[577]: https://yaml.org/spec/1.2.2/#plain-style
[578]: https://yaml.org/spec/1.2.2/#nodes
[579]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[580]: https://yaml.org/spec/1.2.2/#loading-failure-points
[581]: https://yaml.org/spec/1.2.2/#tags
[582]: https://yaml.org/spec/1.2.2/#tags
[583]: https://yaml.org/spec/1.2.2/#tags
[584]: https://yaml.org/spec/1.2.2/#nodes
[585]: https://yaml.org/spec/1.2.2/#nodes
[586]: https://yaml.org/spec/1.2.2/#representation-graph
[587]: https://yaml.org/spec/1.2.2/#nodes
[588]: https://yaml.org/spec/1.2.2/#nodes
[589]: https://yaml.org/spec/1.2.2/#nodes
[590]: https://yaml.org/spec/1.2.2/#nodes
[591]: https://yaml.org/spec/1.2.2/#nodes
[592]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[593]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[594]: https://yaml.org/spec/1.2.2/#nodes
[595]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[596]: https://yaml.org/spec/1.2.2/#comments
[597]: https://yaml.org/spec/1.2.2/#indentation-spaces
[598]: https://yaml.org/spec/1.2.2/#node-styles
[599]: https://yaml.org/spec/1.2.2/#nodes
[600]: https://yaml.org/spec/1.2.2/#nodes
[601]: https://yaml.org/spec/1.2.2/#nodes
[602]: https://yaml.org/spec/1.2.2/#mapping
[603]: https://yaml.org/spec/1.2.2/#representation-graph
[604]: https://yaml.org/spec/1.2.2/#nodes
[605]: https://yaml.org/spec/1.2.2/#nodes
[606]: https://yaml.org/spec/1.2.2/#nodes
[607]: https://yaml.org/spec/1.2.2/#collections
[608]: https://yaml.org/spec/1.2.2/#nodes
[609]: https://yaml.org/spec/1.2.2/#nodes
[610]: https://yaml.org/spec/1.2.2/#mapping
[611]: https://yaml.org/spec/1.2.2/#nodes
[612]: https://yaml.org/spec/1.2.2/#streams
[613]: https://yaml.org/spec/1.2.2/#nodes
[614]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[615]: https://yaml.org/spec/1.2.2/#nodes
[616]: https://yaml.org/spec/1.2.2/#processes-and-models
[617]: https://yaml.org/spec/1.2.2/#processes-and-models
[618]: https://yaml.org/spec/1.2.2/#nodes
[619]: https://yaml.org/spec/1.2.2/#nodes
[620]: https://yaml.org/spec/1.2.2/#streams
[621]: https://yaml.org/spec/1.2.2/#node-tags
[622]: https://yaml.org/spec/1.2.2/#nodes
[623]: https://yaml.org/spec/1.2.2/#sequence
[624]: https://yaml.org/spec/1.2.2/#mapping
[625]: https://yaml.org/spec/1.2.2/#nodes
[626]: https://yaml.org/spec/1.2.2/#processes-and-models
[627]: https://yaml.org/spec/1.2.2/#plain-style
[628]: https://yaml.org/spec/1.2.2/#processes-and-models
[629]: https://yaml.org/spec/1.2.2/#nodes
[630]: https://yaml.org/spec/1.2.2/#mapping
[631]: https://yaml.org/spec/1.2.2/#nodes
[632]: https://yaml.org/spec/1.2.2/#sequence
[633]: https://yaml.org/spec/1.2.2/#processes-and-models
[634]: https://yaml.org/spec/1.2.2/#processes-and-models
[635]: https://yaml.org/spec/1.2.2/#processes-and-models
[636]: https://yaml.org/spec/1.2.2/#documents
[637]: https://yaml.org/spec/1.2.2/#processes-and-models
[638]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[639]: https://yaml.org/spec/1.2.2/#loading-failure-points
[640]: https://yaml.org/spec/1.2.2/#processes-and-models
[641]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[642]: https://yaml.org/spec/1.2.2/#loading-failure-points
[643]: https://yaml.org/spec/1.2.2/#nodes
[644]: https://yaml.org/spec/1.2.2/#nodes
[645]: https://yaml.org/spec/1.2.2/#tags
[646]: https://yaml.org/spec/1.2.2/#processes-and-models
[647]: https://yaml.org/spec/1.2.2/#nodes
[648]: https://yaml.org/spec/1.2.2/#tags
[649]: https://yaml.org/spec/1.2.2/#documents
[650]: https://yaml.org/spec/1.2.2/#nodes
[651]: https://yaml.org/spec/1.2.2/#loading-failure-points
[652]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[653]: https://yaml.org/spec/1.2.2/#processes-and-models
[654]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[655]: https://yaml.org/spec/1.2.2/#loading-failure-points
[656]: https://yaml.org/spec/1.2.2/#collections
[657]: https://yaml.org/spec/1.2.2/#collections
[658]: https://yaml.org/spec/1.2.2/#equality
[659]: https://yaml.org/spec/1.2.2/#mapping
[660]: https://yaml.org/spec/1.2.2/#loading-failure-points
[661]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[662]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[663]: https://yaml.org/spec/1.2.2/#tags
[664]: https://yaml.org/spec/1.2.2/#tags
[665]: https://yaml.org/spec/1.2.2/#processes-and-models
[666]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[667]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[668]: https://yaml.org/spec/1.2.2/#loading-failure-points
[669]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[670]: https://yaml.org/spec/1.2.2/#processes-and-models
[671]: https://yaml.org/spec/1.2.2/#representation-graph
[672]: https://yaml.org/spec/1.2.2/#streams
[673]: https://yaml.org/spec/1.2.2/#rule-s-line-prefix
[674]: https://yaml.org/spec/1.2.2/#block-style-productions
[675]: https://yaml.org/spec/1.2.2/#flow-style-productions
[676]: https://yaml.org/spec/1.2.2/#line-break-characters
[677]: https://yaml.org/spec/1.2.2/#line-break-characters
[678]: https://yaml.org/spec/1.2.2/#line-break-characters
[679]: https://yaml.org/spec/1.2.2/#white-space-characters
[680]: https://yaml.org/spec/1.2.2/#white-space-characters
[681]: https://yaml.org/spec/1.2.2/#indentation-spaces
[682]: https://yaml.org/spec/1.2.2/#streams
[683]: https://yaml.org/spec/1.2.2/#fn:c0-block
[684]: https://yaml.org/spec/1.2.2/#fn:surrogates
[685]: https://yaml.org/spec/1.2.2/#processes-and-models
[686]: https://yaml.org/spec/1.2.2/#processes-and-models
[687]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[688]: https://yaml.org/spec/1.2.2/#escaped-characters
[689]: https://yaml.org/spec/1.2.2/#escaped-characters
[690]: https://yaml.org/spec/1.2.2/#yaml-directives
[691]: https://yaml.org/spec/1.2.2/#processes-and-models
[692]: https://yaml.org/spec/1.2.2/#double-quoted-style
[693]: https://yaml.org/spec/1.2.2/#escaped-characters
[694]: https://yaml.org/spec/1.2.2/#scalars
[695]: https://yaml.org/spec/1.2.2/#double-quoted-style
[696]: https://yaml.org/spec/1.2.2/#white-space-characters
[697]: https://yaml.org/spec/1.2.2/#double-quoted-style
[698]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[699]: https://yaml.org/spec/1.2.2/#nodes
[700]: https://yaml.org/spec/1.2.2/#processes-and-models
[701]: https://yaml.org/spec/1.2.2/#yaml-directives
[702]: https://yaml.org/spec/1.2.2/#streams
[703]: https://yaml.org/spec/1.2.2/#streams
[704]: https://yaml.org/spec/1.2.2/#documents
[705]: https://yaml.org/spec/1.2.2/#documents
[706]: https://yaml.org/spec/1.2.2/#streams
[707]: https://yaml.org/spec/1.2.2/#yaml-directives
[708]: https://yaml.org/spec/1.2.2/#double-quoted-style
[709]: https://yaml.org/spec/1.2.2/#nodes
[710]: https://yaml.org/spec/1.2.2/#escaped-characters
[711]: https://yaml.org/spec/1.2.2/#streams
[712]: https://yaml.org/spec/1.2.2/#streams
[713]: https://yaml.org/spec/1.2.2/#fn:uni-faq
[714]: https://yaml.org/spec/1.2.2/#block-sequences
[715]: https://yaml.org/spec/1.2.2/#nodes
[716]: https://yaml.org/spec/1.2.2/#mapping
[717]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[718]: https://yaml.org/spec/1.2.2/#flow-sequences
[719]: https://yaml.org/spec/1.2.2/#flow-sequences
[720]: https://yaml.org/spec/1.2.2/#flow-mappings
[721]: https://yaml.org/spec/1.2.2/#flow-mappings
[722]: https://yaml.org/spec/1.2.2/#rule-c-sequence-start
[723]: https://yaml.org/spec/1.2.2/#rule-c-sequence-end
[724]: https://yaml.org/spec/1.2.2/#rule-c-mapping-start
[725]: https://yaml.org/spec/1.2.2/#rule-c-mapping-end
[726]: https://yaml.org/spec/1.2.2/#rule-c-collect-entry
[727]: https://yaml.org/spec/1.2.2/#comments
[728]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[729]: https://yaml.org/spec/1.2.2/#alias-nodes
[730]: https://yaml.org/spec/1.2.2/#node-tags
[731]: https://yaml.org/spec/1.2.2/#tag-handles
[732]: https://yaml.org/spec/1.2.2/#tag-directives
[733]: https://yaml.org/spec/1.2.2/#node-tags
[734]: https://yaml.org/spec/1.2.2/#tags
[735]: https://yaml.org/spec/1.2.2/#resolved-tags
[736]: https://yaml.org/spec/1.2.2/#plain-style
[737]: https://yaml.org/spec/1.2.2/#rule-c-tag
[738]: https://yaml.org/spec/1.2.2/#rule-c-anchor
[739]: https://yaml.org/spec/1.2.2/#rule-c-alias
[740]: https://yaml.org/spec/1.2.2/#literal-style
[741]: https://yaml.org/spec/1.2.2/#block-folding
[742]: https://yaml.org/spec/1.2.2/#rule-c-literal
[743]: https://yaml.org/spec/1.2.2/#rule-c-folded
[744]: https://yaml.org/spec/1.2.2/#single-quoted-style
[745]: https://yaml.org/spec/1.2.2/#double-quoted-style
[746]: https://yaml.org/spec/1.2.2/#directives
[747]: https://yaml.org/spec/1.2.2/#rule-c-sequence-entry
[748]: https://yaml.org/spec/1.2.2/#rule-c-mapping-key
[749]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[750]: https://yaml.org/spec/1.2.2/#rule-c-collect-entry
[751]: https://yaml.org/spec/1.2.2/#rule-c-sequence-start
[752]: https://yaml.org/spec/1.2.2/#rule-c-sequence-end
[753]: https://yaml.org/spec/1.2.2/#rule-c-mapping-start
[754]: https://yaml.org/spec/1.2.2/#rule-c-mapping-end
[755]: https://yaml.org/spec/1.2.2/#rule-c-comment
[756]: https://yaml.org/spec/1.2.2/#rule-c-anchor
[757]: https://yaml.org/spec/1.2.2/#rule-c-alias
[758]: https://yaml.org/spec/1.2.2/#rule-c-tag
[759]: https://yaml.org/spec/1.2.2/#rule-c-literal
[760]: https://yaml.org/spec/1.2.2/#rule-c-folded
[761]: https://yaml.org/spec/1.2.2/#rule-c-single-quote
[762]: https://yaml.org/spec/1.2.2/#rule-c-double-quote
[763]: https://yaml.org/spec/1.2.2/#rule-c-directive
[764]: https://yaml.org/spec/1.2.2/#rule-c-reserved
[765]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[766]: https://yaml.org/spec/1.2.2/#rule-c-collect-entry
[767]: https://yaml.org/spec/1.2.2/#rule-c-sequence-start
[768]: https://yaml.org/spec/1.2.2/#rule-c-sequence-end
[769]: https://yaml.org/spec/1.2.2/#rule-c-mapping-start
[770]: https://yaml.org/spec/1.2.2/#rule-c-mapping-end
[771]: https://yaml.org/spec/1.2.2/#rule-b-line-feed
[772]: https://yaml.org/spec/1.2.2/#rule-b-carriage-return
[773]: https://yaml.org/spec/1.2.2/#yaml-directives
[774]: https://yaml.org/spec/1.2.2/#yaml-directives
[775]: https://yaml.org/spec/1.2.2/#processes-and-models
[776]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[777]: https://yaml.org/spec/1.2.2/#yaml-directives
[778]: https://yaml.org/spec/1.2.2/#documents
[779]: https://yaml.org/spec/1.2.2/#rule-c-printable
[780]: https://yaml.org/spec/1.2.2/#rule-b-char
[781]: https://yaml.org/spec/1.2.2/#rule-c-byte-order-mark
[782]: https://yaml.org/spec/1.2.2/#rule-b-carriage-return
[783]: https://yaml.org/spec/1.2.2/#rule-b-line-feed
[784]: https://yaml.org/spec/1.2.2/#rule-b-carriage-return
[785]: https://yaml.org/spec/1.2.2/#rule-b-line-feed
[786]: https://yaml.org/spec/1.2.2/#scalar
[787]: https://yaml.org/spec/1.2.2/#processes-and-models
[788]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[789]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[790]: https://yaml.org/spec/1.2.2/#nodes
[791]: https://yaml.org/spec/1.2.2/#rule-b-break
[792]: https://yaml.org/spec/1.2.2/#scalar
[793]: https://yaml.org/spec/1.2.2/#rule-b-break
[794]: https://yaml.org/spec/1.2.2/#processes-and-models
[795]: https://yaml.org/spec/1.2.2/#rule-s-space
[796]: https://yaml.org/spec/1.2.2/#rule-s-tab
[797]: https://yaml.org/spec/1.2.2/#character-set
[798]: https://yaml.org/spec/1.2.2/#line-break-characters
[799]: https://yaml.org/spec/1.2.2/#rule-nb-char
[800]: https://yaml.org/spec/1.2.2/#rule-s-white
[801]: https://yaml.org/spec/1.2.2/#escaped-characters
[802]: https://yaml.org/spec/1.2.2/#rule-ns-dec-digit
[803]: https://yaml.org/spec/1.2.2/#rule-ns-dec-digit
[804]: https://yaml.org/spec/1.2.2/#rule-ns-ascii-letter
[805]: https://yaml.org/spec/1.2.2/#tags
[806]: https://yaml.org/spec/1.2.2/#fn:uri
[807]: https://yaml.org/spec/1.2.2/#processes-and-models
[808]: https://yaml.org/spec/1.2.2/#tags
[809]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[810]: https://yaml.org/spec/1.2.2/#streams
[811]: https://yaml.org/spec/1.2.2/#rule-ns-hex-digit
[812]: https://yaml.org/spec/1.2.2/#rule-ns-word-char
[813]: https://yaml.org/spec/1.2.2/#tag-handles
[814]: https://yaml.org/spec/1.2.2/#tag-shorthands
[815]: https://yaml.org/spec/1.2.2/#tag-shorthands
[816]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[817]: https://yaml.org/spec/1.2.2/#rule-ns-uri-char
[818]: https://yaml.org/spec/1.2.2/#rule-c-tag
[819]: https://yaml.org/spec/1.2.2/#rule-c-flow-indicator
[820]: https://yaml.org/spec/1.2.2/#character-set
[821]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[822]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[823]: https://yaml.org/spec/1.2.2/#nodes
[824]: https://yaml.org/spec/1.2.2/#double-quoted-style
[825]: https://yaml.org/spec/1.2.2/#node-styles
[826]: https://yaml.org/spec/1.2.2/#character-set
[827]: https://yaml.org/spec/1.2.2/#nodes
[828]: https://yaml.org/spec/1.2.2/#nodes
[829]: https://yaml.org/spec/1.2.2/#yaml-directives
[830]: https://yaml.org/spec/1.2.2/#rule-ns-hex-digit
[831]: https://yaml.org/spec/1.2.2/#rule-ns-hex-digit
[832]: https://yaml.org/spec/1.2.2/#rule-ns-hex-digit
[833]: https://yaml.org/spec/1.2.2/#rule-c-escape
[834]: https://yaml.org/spec/1.2.2/#rule-ns-esc-null
[835]: https://yaml.org/spec/1.2.2/#rule-ns-esc-bell
[836]: https://yaml.org/spec/1.2.2/#rule-ns-esc-backspace
[837]: https://yaml.org/spec/1.2.2/#rule-ns-esc-horizontal-tab
[838]: https://yaml.org/spec/1.2.2/#rule-ns-esc-line-feed
[839]: https://yaml.org/spec/1.2.2/#rule-ns-esc-vertical-tab
[840]: https://yaml.org/spec/1.2.2/#rule-ns-esc-form-feed
[841]: https://yaml.org/spec/1.2.2/#rule-ns-esc-carriage-return
[842]: https://yaml.org/spec/1.2.2/#rule-ns-esc-escape
[843]: https://yaml.org/spec/1.2.2/#rule-ns-esc-space
[844]: https://yaml.org/spec/1.2.2/#rule-ns-esc-double-quote
[845]: https://yaml.org/spec/1.2.2/#rule-ns-esc-slash
[846]: https://yaml.org/spec/1.2.2/#rule-ns-esc-backslash
[847]: https://yaml.org/spec/1.2.2/#rule-ns-esc-next-line
[848]: https://yaml.org/spec/1.2.2/#rule-ns-esc-non-breaking-space
[849]: https://yaml.org/spec/1.2.2/#rule-ns-esc-line-separator
[850]: https://yaml.org/spec/1.2.2/#rule-ns-esc-paragraph-separator
[851]: https://yaml.org/spec/1.2.2/#rule-ns-esc-8-bit
[852]: https://yaml.org/spec/1.2.2/#rule-ns-esc-16-bit
[853]: https://yaml.org/spec/1.2.2/#rule-ns-esc-32-bit
[854]: https://yaml.org/spec/1.2.2/#block-style-productions
[855]: https://yaml.org/spec/1.2.2/#white-space-characters
[856]: https://yaml.org/spec/1.2.2/#white-space-characters
[857]: https://yaml.org/spec/1.2.2/#white-space-characters
[858]: https://yaml.org/spec/1.2.2/#white-space-characters
[859]: https://yaml.org/spec/1.2.2/#white-space-characters
[860]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[861]: https://yaml.org/spec/1.2.2/#nodes
[862]: https://yaml.org/spec/1.2.2/#rule-s-space
[863]: https://yaml.org/spec/1.2.2/#rule-s-indent
[864]: https://yaml.org/spec/1.2.2/#block-style-productions
[865]: https://yaml.org/spec/1.2.2/#rule-s-space
[866]: https://yaml.org/spec/1.2.2/#rule-s-indent-less-than
[867]: https://yaml.org/spec/1.2.2/#rule-s-space
[868]: https://yaml.org/spec/1.2.2/#rule-s-indent-less-or-equal
[869]: https://yaml.org/spec/1.2.2/#nodes
[870]: https://yaml.org/spec/1.2.2/#nodes
[871]: https://yaml.org/spec/1.2.2/#nodes
[872]: https://yaml.org/spec/1.2.2/#nodes
[873]: https://yaml.org/spec/1.2.2/#nodes
[874]: https://yaml.org/spec/1.2.2/#rule-s-indent
[875]: https://yaml.org/spec/1.2.2/#block-collection-styles
[876]: https://yaml.org/spec/1.2.2/#rule-s-indent
[877]: https://yaml.org/spec/1.2.2/#indentation-spaces
[878]: https://yaml.org/spec/1.2.2/#scalar
[879]: https://yaml.org/spec/1.2.2/#white-space-characters
[880]: https://yaml.org/spec/1.2.2/#white-space-characters
[881]: https://yaml.org/spec/1.2.2/#white-space-characters
[882]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[883]: https://yaml.org/spec/1.2.2/#nodes
[884]: https://yaml.org/spec/1.2.2/#rule-s-white
[885]: https://yaml.org/spec/1.2.2/#scalar
[886]: https://yaml.org/spec/1.2.2/#nodes
[887]: https://yaml.org/spec/1.2.2/#indentation-spaces
[888]: https://yaml.org/spec/1.2.2/#flow-scalar-styles
[889]: https://yaml.org/spec/1.2.2/#white-space-characters
[890]: https://yaml.org/spec/1.2.2/#white-space-characters
[891]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[892]: https://yaml.org/spec/1.2.2/#nodes
[893]: https://yaml.org/spec/1.2.2/#rule-s-block-line-prefix
[894]: https://yaml.org/spec/1.2.2/#rule-s-block-line-prefix
[895]: https://yaml.org/spec/1.2.2/#rule-s-flow-line-prefix
[896]: https://yaml.org/spec/1.2.2/#rule-s-flow-line-prefix
[897]: https://yaml.org/spec/1.2.2/#rule-s-indent
[898]: https://yaml.org/spec/1.2.2/#rule-s-indent
[899]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[900]: https://yaml.org/spec/1.2.2/#nodes
[901]: https://yaml.org/spec/1.2.2/#tag-prefixes
[902]: https://yaml.org/spec/1.2.2/#line-break-characters
[903]: https://yaml.org/spec/1.2.2/#rule-s-line-prefix
[904]: https://yaml.org/spec/1.2.2/#rule-s-indent-less-than
[905]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[906]: https://yaml.org/spec/1.2.2/#node-styles
[907]: https://yaml.org/spec/1.2.2/#line-break-characters
[908]: https://yaml.org/spec/1.2.2/#empty-lines
[909]: https://yaml.org/spec/1.2.2/#line-break-characters
[910]: https://yaml.org/spec/1.2.2/#nodes
[911]: https://yaml.org/spec/1.2.2/#rule-b-non-content
[912]: https://yaml.org/spec/1.2.2/#rule-l-empty
[913]: https://yaml.org/spec/1.2.2/#empty-lines
[914]: https://yaml.org/spec/1.2.2/#line-break-characters
[915]: https://yaml.org/spec/1.2.2/#white-space-characters
[916]: https://yaml.org/spec/1.2.2/#rule-b-break
[917]: https://yaml.org/spec/1.2.2/#empty-lines
[918]: https://yaml.org/spec/1.2.2/#line-break-characters
[919]: https://yaml.org/spec/1.2.2/#rule-b-l-trimmed
[920]: https://yaml.org/spec/1.2.2/#rule-b-as-space
[921]: https://yaml.org/spec/1.2.2/#block-folding
[922]: https://yaml.org/spec/1.2.2/#flow-scalar-styles
[923]: https://yaml.org/spec/1.2.2/#block-folding
[924]: https://yaml.org/spec/1.2.2/#line-break-characters
[925]: https://yaml.org/spec/1.2.2/#empty-lines
[926]: https://yaml.org/spec/1.2.2/#block-chomping-indicator
[927]: https://yaml.org/spec/1.2.2/#line-break-characters
[928]: https://yaml.org/spec/1.2.2/#white-space-characters
[929]: https://yaml.org/spec/1.2.2/#example-more-indented-lines
[930]: https://yaml.org/spec/1.2.2/#white-space-characters
[931]: https://yaml.org/spec/1.2.2/#empty-lines
[932]: https://yaml.org/spec/1.2.2/#example-more-indented-lines
[933]: https://yaml.org/spec/1.2.2/#rule-b-l-folded
[934]: https://yaml.org/spec/1.2.2/#flow-style-productions
[935]: https://yaml.org/spec/1.2.2/#flow-style-productions
[936]: https://yaml.org/spec/1.2.2/#indicator-characters
[937]: https://yaml.org/spec/1.2.2/#indentation-spaces
[938]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[939]: https://yaml.org/spec/1.2.2/#nodes
[940]: https://yaml.org/spec/1.2.2/#line-break-characters
[941]: https://yaml.org/spec/1.2.2/#empty-lines
[942]: https://yaml.org/spec/1.2.2/#example-more-indented-lines
[943]: https://yaml.org/spec/1.2.2/#nodes
[944]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[945]: https://yaml.org/spec/1.2.2/#rule-b-l-folded
[946]: https://yaml.org/spec/1.2.2/#rule-s-flow-line-prefix
[947]: https://yaml.org/spec/1.2.2/#rule-s-flow-folded
[948]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[949]: https://yaml.org/spec/1.2.2/#nodes
[950]: https://yaml.org/spec/1.2.2/#separation-spaces
[951]: https://yaml.org/spec/1.2.2/#white-space-characters
[952]: https://yaml.org/spec/1.2.2/#yaml-directives
[953]: https://yaml.org/spec/1.2.2/#processes-and-models
[954]: https://yaml.org/spec/1.2.2/#line-break-characters
[955]: https://yaml.org/spec/1.2.2/#streams
[956]: https://yaml.org/spec/1.2.2/#processes-and-models
[957]: https://yaml.org/spec/1.2.2/#streams
[958]: https://yaml.org/spec/1.2.2/#line-break-characters
[959]: https://yaml.org/spec/1.2.2/#rule-c-comment
[960]: https://yaml.org/spec/1.2.2/#rule-nb-char
[961]: https://yaml.org/spec/1.2.2/#rule-b-non-content
[962]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[963]: https://yaml.org/spec/1.2.2/#rule-c-nb-comment-text
[964]: https://yaml.org/spec/1.2.2/#rule-b-comment
[965]: https://yaml.org/spec/1.2.2/#scalar
[966]: https://yaml.org/spec/1.2.2/#indentation-spaces
[967]: https://yaml.org/spec/1.2.2/#scalar
[968]: https://yaml.org/spec/1.2.2/#white-space-characters
[969]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[970]: https://yaml.org/spec/1.2.2/#rule-c-nb-comment-text
[971]: https://yaml.org/spec/1.2.2/#rule-b-comment
[972]: https://yaml.org/spec/1.2.2/#block-scalar-headers
[973]: https://yaml.org/spec/1.2.2/#rule-s-b-comment
[974]: https://yaml.org/spec/1.2.2/#rule-l-comment
[975]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[976]: https://yaml.org/spec/1.2.2/#comments
[977]: https://yaml.org/spec/1.2.2/#indentation-spaces
[978]: https://yaml.org/spec/1.2.2/#comments
[979]: https://yaml.org/spec/1.2.2/#rule-s-separate-lines
[980]: https://yaml.org/spec/1.2.2/#rule-s-separate-lines
[981]: https://yaml.org/spec/1.2.2/#rule-s-separate-lines
[982]: https://yaml.org/spec/1.2.2/#rule-s-separate-lines
[983]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[984]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[985]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[986]: https://yaml.org/spec/1.2.2/#rule-s-flow-line-prefix
[987]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[988]: https://yaml.org/spec/1.2.2/#processes-and-models
[989]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[990]: https://yaml.org/spec/1.2.2/#nodes
[991]: https://yaml.org/spec/1.2.2/#rule-c-directive
[992]: https://yaml.org/spec/1.2.2/#rule-ns-yaml-directive
[993]: https://yaml.org/spec/1.2.2/#rule-ns-tag-directive
[994]: https://yaml.org/spec/1.2.2/#rule-ns-reserved-directive
[995]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[996]: https://yaml.org/spec/1.2.2/#indentation-spaces
[997]: https://yaml.org/spec/1.2.2/#processes-and-models
[998]: https://yaml.org/spec/1.2.2/#rule-ns-directive-name
[999]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1000]: https://yaml.org/spec/1.2.2/#rule-ns-directive-parameter
[1001]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1002]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1003]: https://yaml.org/spec/1.2.2/#documents
[1004]: https://yaml.org/spec/1.2.2/#processes-and-models
[1005]: https://yaml.org/spec/1.2.2/#documents
[1006]: https://yaml.org/spec/1.2.2/#documents
[1007]: https://yaml.org/spec/1.2.2/#documents
[1008]: https://yaml.org/spec/1.2.2/#documents
[1009]: https://yaml.org/spec/1.2.2/#documents
[1010]: https://yaml.org/spec/1.2.2/#processes-and-models
[1011]: https://yaml.org/spec/1.2.2/#documents
[1012]: https://yaml.org/spec/1.2.2/#processes-and-models
[1013]: https://yaml.org/spec/1.2.2/#documents
[1014]: https://yaml.org/spec/1.2.2/#line-break-characters
[1015]: https://yaml.org/spec/1.2.2/#line-break-characters
[1016]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1017]: https://yaml.org/spec/1.2.2/#rule-ns-yaml-version
[1018]: https://yaml.org/spec/1.2.2/#rule-ns-dec-digit
[1019]: https://yaml.org/spec/1.2.2/#rule-ns-dec-digit
[1020]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1021]: https://yaml.org/spec/1.2.2/#node-tags
[1022]: https://yaml.org/spec/1.2.2/#tag-handles
[1023]: https://yaml.org/spec/1.2.2/#tag-prefixes
[1024]: https://yaml.org/spec/1.2.2/#tags
[1025]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1026]: https://yaml.org/spec/1.2.2/#rule-c-tag-handle
[1027]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1028]: https://yaml.org/spec/1.2.2/#rule-ns-tag-prefix
[1029]: https://yaml.org/spec/1.2.2/#tag-handles
[1030]: https://yaml.org/spec/1.2.2/#tag-prefixes
[1031]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1032]: https://yaml.org/spec/1.2.2/#rule-c-named-tag-handle
[1033]: https://yaml.org/spec/1.2.2/#rule-c-secondary-tag-handle
[1034]: https://yaml.org/spec/1.2.2/#rule-c-primary-tag-handle
[1035]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1036]: https://yaml.org/spec/1.2.2/#tags
[1037]: https://yaml.org/spec/1.2.2/#tags
[1038]: https://yaml.org/spec/1.2.2/#tags
[1039]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1040]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1041]: https://yaml.org/spec/1.2.2/#nodes
[1042]: https://yaml.org/spec/1.2.2/#processes-and-models
[1043]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1044]: https://yaml.org/spec/1.2.2/#rule-c-tag
[1045]: https://yaml.org/spec/1.2.2/#rule-ns-word-char
[1046]: https://yaml.org/spec/1.2.2/#rule-c-tag
[1047]: https://yaml.org/spec/1.2.2/#rule-c-ns-local-tag-prefix
[1048]: https://yaml.org/spec/1.2.2/#rule-ns-global-tag-prefix
[1049]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1050]: https://yaml.org/spec/1.2.2/#tag-handles
[1051]: https://yaml.org/spec/1.2.2/#tags
[1052]: https://yaml.org/spec/1.2.2/#tags
[1053]: https://yaml.org/spec/1.2.2/#processes-and-models
[1054]: https://yaml.org/spec/1.2.2/#documents
[1055]: https://yaml.org/spec/1.2.2/#streams
[1056]: https://yaml.org/spec/1.2.2/#tags
[1057]: https://yaml.org/spec/1.2.2/#rule-c-tag
[1058]: https://yaml.org/spec/1.2.2/#rule-ns-uri-char
[1059]: https://yaml.org/spec/1.2.2/#tag-shorthands
[1060]: https://yaml.org/spec/1.2.2/#tag-handles
[1061]: https://yaml.org/spec/1.2.2/#processes-and-models
[1062]: https://yaml.org/spec/1.2.2/#documents
[1063]: https://yaml.org/spec/1.2.2/#streams
[1064]: https://yaml.org/spec/1.2.2/#tags
[1065]: https://yaml.org/spec/1.2.2/#rule-ns-tag-char
[1066]: https://yaml.org/spec/1.2.2/#rule-ns-uri-char
[1067]: https://yaml.org/spec/1.2.2/#nodes
[1068]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1069]: https://yaml.org/spec/1.2.2/#tags
[1070]: https://yaml.org/spec/1.2.2/#nodes
[1071]: https://yaml.org/spec/1.2.2/#nodes
[1072]: https://yaml.org/spec/1.2.2/#rule-c-ns-tag-property
[1073]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1074]: https://yaml.org/spec/1.2.2/#rule-c-ns-anchor-property
[1075]: https://yaml.org/spec/1.2.2/#rule-c-ns-anchor-property
[1076]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1077]: https://yaml.org/spec/1.2.2/#rule-c-ns-tag-property
[1078]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1079]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1080]: https://yaml.org/spec/1.2.2/#nodes
[1081]: https://yaml.org/spec/1.2.2/#rule-c-verbatim-tag
[1082]: https://yaml.org/spec/1.2.2/#rule-c-ns-shorthand-tag
[1083]: https://yaml.org/spec/1.2.2/#rule-c-non-specific-tag
[1084]: https://yaml.org/spec/1.2.2/#processes-and-models
[1085]: https://yaml.org/spec/1.2.2/#processes-and-models
[1086]: https://yaml.org/spec/1.2.2/#tag-resolution
[1087]: https://yaml.org/spec/1.2.2/#tags
[1088]: https://yaml.org/spec/1.2.2/#tags
[1089]: https://yaml.org/spec/1.2.2/#rule-ns-uri-char
[1090]: https://yaml.org/spec/1.2.2/#tag-handles
[1091]: https://yaml.org/spec/1.2.2/#tag-handles
[1092]: https://yaml.org/spec/1.2.2/#tag-prefixes
[1093]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1094]: https://yaml.org/spec/1.2.2/#tags
[1095]: https://yaml.org/spec/1.2.2/#tag-prefixes
[1096]: https://yaml.org/spec/1.2.2/#tags
[1097]: https://yaml.org/spec/1.2.2/#tags
[1098]: https://yaml.org/spec/1.2.2/#tag-handles
[1099]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1100]: https://yaml.org/spec/1.2.2/#nodes
[1101]: https://yaml.org/spec/1.2.2/#tag-handles
[1102]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1103]: https://yaml.org/spec/1.2.2/#tag-handles
[1104]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[1105]: https://yaml.org/spec/1.2.2/#escaped-characters
[1106]: https://yaml.org/spec/1.2.2/#rule-c-tag-handle
[1107]: https://yaml.org/spec/1.2.2/#rule-ns-tag-char
[1108]: https://yaml.org/spec/1.2.2/#nodes
[1109]: https://yaml.org/spec/1.2.2/#resolved-tags
[1110]: https://yaml.org/spec/1.2.2/#resolved-tags
[1111]: https://yaml.org/spec/1.2.2/#resolved-tags
[1112]: https://yaml.org/spec/1.2.2/#resolved-tags
[1113]: https://yaml.org/spec/1.2.2/#plain-style
[1114]: https://yaml.org/spec/1.2.2/#nodes
[1115]: https://yaml.org/spec/1.2.2/#node-styles
[1116]: https://yaml.org/spec/1.2.2/#nodes
[1117]: https://yaml.org/spec/1.2.2/#resolved-tags
[1118]: https://yaml.org/spec/1.2.2/#tag-resolution
[1119]: https://yaml.org/spec/1.2.2/#nodes
[1120]: https://yaml.org/spec/1.2.2/#nodes
[1121]: https://yaml.org/spec/1.2.2/#nodes
[1122]: https://yaml.org/spec/1.2.2/#alias-nodes
[1123]: https://yaml.org/spec/1.2.2/#nodes
[1124]: https://yaml.org/spec/1.2.2/#nodes
[1125]: https://yaml.org/spec/1.2.2/#alias-nodes
[1126]: https://yaml.org/spec/1.2.2/#nodes
[1127]: https://yaml.org/spec/1.2.2/#rule-c-anchor
[1128]: https://yaml.org/spec/1.2.2/#rule-ns-anchor-name
[1129]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[1130]: https://yaml.org/spec/1.2.2/#serialization-tree
[1131]: https://yaml.org/spec/1.2.2/#representation-graph
[1132]: https://yaml.org/spec/1.2.2/#nodes
[1133]: https://yaml.org/spec/1.2.2/#processes-and-models
[1134]: https://yaml.org/spec/1.2.2/#representation-graph
[1135]: https://yaml.org/spec/1.2.2/#composing-the-representation-graph
[1136]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[1137]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1138]: https://yaml.org/spec/1.2.2/#rule-c-flow-indicator
[1139]: https://yaml.org/spec/1.2.2/#rule-ns-anchor-char
[1140]: https://yaml.org/spec/1.2.2/#line-folding
[1141]: https://yaml.org/spec/1.2.2/#tags
[1142]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[1143]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1144]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1145]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1146]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[1147]: https://yaml.org/spec/1.2.2/#serializing-the-representation-graph
[1148]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1149]: https://yaml.org/spec/1.2.2/#nodes
[1150]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1151]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1152]: https://yaml.org/spec/1.2.2/#nodes
[1153]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1154]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1155]: https://yaml.org/spec/1.2.2/#documents
[1156]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1157]: https://yaml.org/spec/1.2.2/#node-properties
[1158]: https://yaml.org/spec/1.2.2/#nodes
[1159]: https://yaml.org/spec/1.2.2/#nodes
[1160]: https://yaml.org/spec/1.2.2/#rule-c-alias
[1161]: https://yaml.org/spec/1.2.2/#rule-ns-anchor-name
[1162]: https://yaml.org/spec/1.2.2/#nodes
[1163]: https://yaml.org/spec/1.2.2/#nodes
[1164]: https://yaml.org/spec/1.2.2/#nodes
[1165]: https://yaml.org/spec/1.2.2/#plain-style
[1166]: https://yaml.org/spec/1.2.2/#nodes
[1167]: https://yaml.org/spec/1.2.2/#scalars
[1168]: https://yaml.org/spec/1.2.2/#streams
[1169]: https://yaml.org/spec/1.2.2/#node-properties
[1170]: https://yaml.org/spec/1.2.2/#nodes
[1171]: https://yaml.org/spec/1.2.2/#rule-e-scalar
[1172]: https://yaml.org/spec/1.2.2/#double-quoted-style
[1173]: https://yaml.org/spec/1.2.2/#single-quoted-style
[1174]: https://yaml.org/spec/1.2.2/#plain-style
[1175]: https://yaml.org/spec/1.2.2/#node-styles
[1176]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1177]: https://yaml.org/spec/1.2.2/#nodes
[1178]: https://yaml.org/spec/1.2.2/#plain-style
[1179]: https://yaml.org/spec/1.2.2/#tag-resolution
[1180]: https://yaml.org/spec/1.2.2/#node-styles
[1181]: https://yaml.org/spec/1.2.2/#escaped-characters
[1182]: https://yaml.org/spec/1.2.2/#rule-c-ns-esc-char
[1183]: https://yaml.org/spec/1.2.2/#rule-nb-json
[1184]: https://yaml.org/spec/1.2.2/#rule-c-escape
[1185]: https://yaml.org/spec/1.2.2/#rule-c-double-quote
[1186]: https://yaml.org/spec/1.2.2/#rule-nb-double-char
[1187]: https://yaml.org/spec/1.2.2/#rule-s-white
[1188]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1189]: https://yaml.org/spec/1.2.2/#rule-c-double-quote
[1190]: https://yaml.org/spec/1.2.2/#rule-nb-double-text
[1191]: https://yaml.org/spec/1.2.2/#rule-c-double-quote
[1192]: https://yaml.org/spec/1.2.2/#rule-nb-double-multi-line
[1193]: https://yaml.org/spec/1.2.2/#rule-nb-double-multi-line
[1194]: https://yaml.org/spec/1.2.2/#rule-nb-double-one-line
[1195]: https://yaml.org/spec/1.2.2/#rule-nb-double-one-line
[1196]: https://yaml.org/spec/1.2.2/#rule-nb-double-char
[1197]: https://yaml.org/spec/1.2.2/#line-break-characters
[1198]: https://yaml.org/spec/1.2.2/#flow-folding
[1199]: https://yaml.org/spec/1.2.2/#white-space-characters
[1200]: https://yaml.org/spec/1.2.2/#line-break-characters
[1201]: https://yaml.org/spec/1.2.2/#line-break-characters
[1202]: https://yaml.org/spec/1.2.2/#nodes
[1203]: https://yaml.org/spec/1.2.2/#white-space-characters
[1204]: https://yaml.org/spec/1.2.2/#escaped-characters
[1205]: https://yaml.org/spec/1.2.2/#white-space-characters
[1206]: https://yaml.org/spec/1.2.2/#rule-s-white
[1207]: https://yaml.org/spec/1.2.2/#rule-c-escape
[1208]: https://yaml.org/spec/1.2.2/#rule-b-non-content
[1209]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1210]: https://yaml.org/spec/1.2.2/#rule-s-flow-line-prefix
[1211]: https://yaml.org/spec/1.2.2/#rule-s-double-escaped
[1212]: https://yaml.org/spec/1.2.2/#rule-s-flow-folded
[1213]: https://yaml.org/spec/1.2.2/#white-space-characters
[1214]: https://yaml.org/spec/1.2.2/#nodes
[1215]: https://yaml.org/spec/1.2.2/#white-space-characters
[1216]: https://yaml.org/spec/1.2.2/#line-folding
[1217]: https://yaml.org/spec/1.2.2/#rule-s-white
[1218]: https://yaml.org/spec/1.2.2/#rule-ns-double-char
[1219]: https://yaml.org/spec/1.2.2/#rule-s-double-break
[1220]: https://yaml.org/spec/1.2.2/#rule-ns-double-char
[1221]: https://yaml.org/spec/1.2.2/#rule-nb-ns-double-in-line
[1222]: https://yaml.org/spec/1.2.2/#rule-s-double-next-line
[1223]: https://yaml.org/spec/1.2.2/#rule-s-white
[1224]: https://yaml.org/spec/1.2.2/#rule-nb-ns-double-in-line
[1225]: https://yaml.org/spec/1.2.2/#rule-s-double-next-line
[1226]: https://yaml.org/spec/1.2.2/#rule-s-white
[1227]: https://yaml.org/spec/1.2.2/#character-set
[1228]: https://yaml.org/spec/1.2.2/#white-space-characters
[1229]: https://yaml.org/spec/1.2.2/#white-space-characters
[1230]: https://yaml.org/spec/1.2.2/#rule-c-quoted-quote
[1231]: https://yaml.org/spec/1.2.2/#rule-nb-json
[1232]: https://yaml.org/spec/1.2.2/#rule-c-single-quote
[1233]: https://yaml.org/spec/1.2.2/#rule-nb-single-char
[1234]: https://yaml.org/spec/1.2.2/#rule-s-white
[1235]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1236]: https://yaml.org/spec/1.2.2/#rule-c-single-quote
[1237]: https://yaml.org/spec/1.2.2/#rule-nb-single-text
[1238]: https://yaml.org/spec/1.2.2/#rule-c-single-quote
[1239]: https://yaml.org/spec/1.2.2/#rule-nb-single-multi-line
[1240]: https://yaml.org/spec/1.2.2/#rule-nb-single-multi-line
[1241]: https://yaml.org/spec/1.2.2/#rule-nb-single-one-line
[1242]: https://yaml.org/spec/1.2.2/#rule-nb-single-one-line
[1243]: https://yaml.org/spec/1.2.2/#rule-nb-single-char
[1244]: https://yaml.org/spec/1.2.2/#white-space-characters
[1245]: https://yaml.org/spec/1.2.2/#nodes
[1246]: https://yaml.org/spec/1.2.2/#white-space-characters
[1247]: https://yaml.org/spec/1.2.2/#line-folding
[1248]: https://yaml.org/spec/1.2.2/#rule-s-white
[1249]: https://yaml.org/spec/1.2.2/#rule-ns-single-char
[1250]: https://yaml.org/spec/1.2.2/#rule-s-flow-folded
[1251]: https://yaml.org/spec/1.2.2/#rule-ns-single-char
[1252]: https://yaml.org/spec/1.2.2/#rule-nb-ns-single-in-line
[1253]: https://yaml.org/spec/1.2.2/#rule-s-single-next-line
[1254]: https://yaml.org/spec/1.2.2/#rule-s-white
[1255]: https://yaml.org/spec/1.2.2/#rule-nb-ns-single-in-line
[1256]: https://yaml.org/spec/1.2.2/#rule-s-single-next-line
[1257]: https://yaml.org/spec/1.2.2/#rule-s-white
[1258]: https://yaml.org/spec/1.2.2/#indicator-characters
[1259]: https://yaml.org/spec/1.2.2/#context-c
[1260]: https://yaml.org/spec/1.2.2/#node-styles
[1261]: https://yaml.org/spec/1.2.2/#white-space-characters
[1262]: https://yaml.org/spec/1.2.2/#white-space-characters
[1263]: https://yaml.org/spec/1.2.2/#white-space-characters
[1264]: https://yaml.org/spec/1.2.2/#indicator-characters
[1265]: https://yaml.org/spec/1.2.2/#indicator-characters
[1266]: https://yaml.org/spec/1.2.2/#white-space-characters
[1267]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1268]: https://yaml.org/spec/1.2.2/#rule-c-indicator
[1269]: https://yaml.org/spec/1.2.2/#rule-c-mapping-key
[1270]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1271]: https://yaml.org/spec/1.2.2/#rule-c-sequence-entry
[1272]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe
[1273]: https://yaml.org/spec/1.2.2/#mapping
[1274]: https://yaml.org/spec/1.2.2/#mapping
[1275]: https://yaml.org/spec/1.2.2/#comments
[1276]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[1277]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1278]: https://yaml.org/spec/1.2.2/#flow-collection-styles
[1279]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe-out
[1280]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe-in
[1281]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe-out
[1282]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe-in
[1283]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1284]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1285]: https://yaml.org/spec/1.2.2/#rule-c-flow-indicator
[1286]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe
[1287]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1288]: https://yaml.org/spec/1.2.2/#rule-c-comment
[1289]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1290]: https://yaml.org/spec/1.2.2/#rule-c-comment
[1291]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1292]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe
[1293]: https://yaml.org/spec/1.2.2/#rule-ns-plain-first
[1294]: https://yaml.org/spec/1.2.2/#rule-ns-plain-char
[1295]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1296]: https://yaml.org/spec/1.2.2/#rule-ns-plain-multi-line
[1297]: https://yaml.org/spec/1.2.2/#rule-ns-plain-multi-line
[1298]: https://yaml.org/spec/1.2.2/#rule-ns-plain-one-line
[1299]: https://yaml.org/spec/1.2.2/#rule-ns-plain-one-line
[1300]: https://yaml.org/spec/1.2.2/#rule-s-white
[1301]: https://yaml.org/spec/1.2.2/#rule-ns-plain-char
[1302]: https://yaml.org/spec/1.2.2/#rule-ns-plain-first
[1303]: https://yaml.org/spec/1.2.2/#rule-nb-ns-plain-in-line
[1304]: https://yaml.org/spec/1.2.2/#white-space-characters
[1305]: https://yaml.org/spec/1.2.2/#nodes
[1306]: https://yaml.org/spec/1.2.2/#white-space-characters
[1307]: https://yaml.org/spec/1.2.2/#line-folding
[1308]: https://yaml.org/spec/1.2.2/#rule-s-flow-folded
[1309]: https://yaml.org/spec/1.2.2/#rule-ns-plain-char
[1310]: https://yaml.org/spec/1.2.2/#rule-nb-ns-plain-in-line
[1311]: https://yaml.org/spec/1.2.2/#rule-ns-plain-one-line
[1312]: https://yaml.org/spec/1.2.2/#rule-s-ns-plain-next-line
[1313]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1314]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1315]: https://yaml.org/spec/1.2.2/#example-empty-content
[1316]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-seq-entries
[1317]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-seq-entries
[1318]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-seq-entries
[1319]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-seq-entries
[1320]: https://yaml.org/spec/1.2.2/#rule-c-sequence-start
[1321]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1322]: https://yaml.org/spec/1.2.2/#rule-in-flow
[1323]: https://yaml.org/spec/1.2.2/#rule-c-sequence-end
[1324]: https://yaml.org/spec/1.2.2/#rule-ns-flow-seq-entry
[1325]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1326]: https://yaml.org/spec/1.2.2/#rule-c-collect-entry
[1327]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1328]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-seq-entries
[1329]: https://yaml.org/spec/1.2.2/#flow-nodes
[1330]: https://yaml.org/spec/1.2.2/#example-flow-mapping-adjacent-values
[1331]: https://yaml.org/spec/1.2.2/#mapping
[1332]: https://yaml.org/spec/1.2.2/#mapping
[1333]: https://yaml.org/spec/1.2.2/#rule-ns-flow-pair
[1334]: https://yaml.org/spec/1.2.2/#rule-ns-flow-node
[1335]: https://yaml.org/spec/1.2.2/#rule-c-mapping-start
[1336]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1337]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-map-entries
[1338]: https://yaml.org/spec/1.2.2/#rule-c-mapping-end
[1339]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-entry
[1340]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1341]: https://yaml.org/spec/1.2.2/#rule-c-collect-entry
[1342]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1343]: https://yaml.org/spec/1.2.2/#rule-ns-s-flow-map-entries
[1344]: https://yaml.org/spec/1.2.2/#example-empty-content
[1345]: https://yaml.org/spec/1.2.2/#rule-c-mapping-key
[1346]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1347]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-explicit-entry
[1348]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-implicit-entry
[1349]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-implicit-entry
[1350]: https://yaml.org/spec/1.2.2/#rule-e-node
[1351]: https://yaml.org/spec/1.2.2/#rule-e-node
[1352]: https://yaml.org/spec/1.2.2/#separation-spaces
[1353]: https://yaml.org/spec/1.2.2/#nodes
[1354]: https://yaml.org/spec/1.2.2/#white-space-characters
[1355]: https://yaml.org/spec/1.2.2/#plain-style
[1356]: https://yaml.org/spec/1.2.2/#white-space-characters
[1357]: https://yaml.org/spec/1.2.2/#plain-style
[1358]: https://yaml.org/spec/1.2.2/#mapping
[1359]: https://yaml.org/spec/1.2.2/#nodes
[1360]: https://yaml.org/spec/1.2.2/#example-empty-content
[1361]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-yaml-key-entry
[1362]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-empty-key-entry
[1363]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-json-key-entry
[1364]: https://yaml.org/spec/1.2.2/#rule-ns-flow-yaml-node
[1365]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1366]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-separate-value
[1367]: https://yaml.org/spec/1.2.2/#rule-e-node
[1368]: https://yaml.org/spec/1.2.2/#rule-e-node
[1369]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-separate-value
[1370]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1371]: https://yaml.org/spec/1.2.2/#rule-ns-plain-safe
[1372]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1373]: https://yaml.org/spec/1.2.2/#rule-ns-flow-node
[1374]: https://yaml.org/spec/1.2.2/#rule-e-node
[1375]: https://yaml.org/spec/1.2.2/#yaml-directives
[1376]: https://yaml.org/spec/1.2.2/#nodes
[1377]: https://yaml.org/spec/1.2.2/#flow-nodes
[1378]: https://yaml.org/spec/1.2.2/#nodes
[1379]: https://yaml.org/spec/1.2.2/#flow-nodes
[1380]: https://yaml.org/spec/1.2.2/#nodes
[1381]: https://yaml.org/spec/1.2.2/#indicator-characters
[1382]: https://yaml.org/spec/1.2.2/#processes-and-models
[1383]: https://yaml.org/spec/1.2.2/#separation-spaces
[1384]: https://yaml.org/spec/1.2.2/#nodes
[1385]: https://yaml.org/spec/1.2.2/#rule-c-flow-json-node
[1386]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1387]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-adjacent-value
[1388]: https://yaml.org/spec/1.2.2/#rule-e-node
[1389]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1390]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1391]: https://yaml.org/spec/1.2.2/#rule-ns-flow-node
[1392]: https://yaml.org/spec/1.2.2/#rule-e-node
[1393]: https://yaml.org/spec/1.2.2/#flow-sequences
[1394]: https://yaml.org/spec/1.2.2/#mapping
[1395]: https://yaml.org/spec/1.2.2/#node-properties
[1396]: https://yaml.org/spec/1.2.2/#mapping
[1397]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1398]: https://yaml.org/spec/1.2.2/#rule-c-mapping-key
[1399]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1400]: https://yaml.org/spec/1.2.2/#rule-ns-flow-map-explicit-entry
[1401]: https://yaml.org/spec/1.2.2/#rule-ns-flow-pair-entry
[1402]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1403]: https://yaml.org/spec/1.2.2/#nodes
[1404]: https://yaml.org/spec/1.2.2/#nodes
[1405]: https://yaml.org/spec/1.2.2/#nodes
[1406]: https://yaml.org/spec/1.2.2/#nodes
[1407]: https://yaml.org/spec/1.2.2/#nodes
[1408]: https://yaml.org/spec/1.2.2/#sequence
[1409]: https://yaml.org/spec/1.2.2/#mapping
[1410]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1411]: https://yaml.org/spec/1.2.2/#rule-ns-flow-pair-yaml-key-entry
[1412]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-empty-key-entry
[1413]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-pair-json-key-entry
[1414]: https://yaml.org/spec/1.2.2/#rule-ns-s-implicit-yaml-key
[1415]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-separate-value
[1416]: https://yaml.org/spec/1.2.2/#rule-c-s-implicit-json-key
[1417]: https://yaml.org/spec/1.2.2/#rule-c-ns-flow-map-adjacent-value
[1418]: https://yaml.org/spec/1.2.2/#rule-ns-flow-yaml-node
[1419]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1420]: https://yaml.org/spec/1.2.2/#rule-c-flow-json-node
[1421]: https://yaml.org/spec/1.2.2/#rule-s-separate-in-line
[1422]: https://yaml.org/spec/1.2.2/#flow-style-productions
[1423]: https://yaml.org/spec/1.2.2/#indicator-characters
[1424]: https://yaml.org/spec/1.2.2/#flow-style-productions
[1425]: https://yaml.org/spec/1.2.2/#plain-style
[1426]: https://yaml.org/spec/1.2.2/#double-quoted-style
[1427]: https://yaml.org/spec/1.2.2/#rule-ns-plain
[1428]: https://yaml.org/spec/1.2.2/#rule-c-flow-sequence
[1429]: https://yaml.org/spec/1.2.2/#rule-c-flow-mapping
[1430]: https://yaml.org/spec/1.2.2/#rule-c-single-quoted
[1431]: https://yaml.org/spec/1.2.2/#rule-c-double-quoted
[1432]: https://yaml.org/spec/1.2.2/#rule-ns-flow-yaml-content
[1433]: https://yaml.org/spec/1.2.2/#rule-c-flow-json-content
[1434]: https://yaml.org/spec/1.2.2/#flow-style-productions
[1435]: https://yaml.org/spec/1.2.2/#nodes
[1436]: https://yaml.org/spec/1.2.2/#node-properties
[1437]: https://yaml.org/spec/1.2.2/#alias-nodes
[1438]: https://yaml.org/spec/1.2.2/#anchors-and-aliases
[1439]: https://yaml.org/spec/1.2.2/#node-properties
[1440]: https://yaml.org/spec/1.2.2/#rule-c-ns-alias-node
[1441]: https://yaml.org/spec/1.2.2/#rule-ns-flow-yaml-content
[1442]: https://yaml.org/spec/1.2.2/#rule-c-ns-properties
[1443]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1444]: https://yaml.org/spec/1.2.2/#rule-ns-flow-yaml-content
[1445]: https://yaml.org/spec/1.2.2/#rule-e-scalar
[1446]: https://yaml.org/spec/1.2.2/#rule-c-ns-properties
[1447]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1448]: https://yaml.org/spec/1.2.2/#rule-c-flow-json-content
[1449]: https://yaml.org/spec/1.2.2/#rule-c-ns-alias-node
[1450]: https://yaml.org/spec/1.2.2/#rule-ns-flow-content
[1451]: https://yaml.org/spec/1.2.2/#rule-c-ns-properties
[1452]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1453]: https://yaml.org/spec/1.2.2/#rule-ns-flow-content
[1454]: https://yaml.org/spec/1.2.2/#rule-e-scalar
[1455]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1456]: https://yaml.org/spec/1.2.2/#indicator-characters
[1457]: https://yaml.org/spec/1.2.2/#literal-style
[1458]: https://yaml.org/spec/1.2.2/#line-folding
[1459]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[1460]: https://yaml.org/spec/1.2.2/#indicator-characters
[1461]: https://yaml.org/spec/1.2.2/#nodes
[1462]: https://yaml.org/spec/1.2.2/#line-break-characters
[1463]: https://yaml.org/spec/1.2.2/#comments
[1464]: https://yaml.org/spec/1.2.2/#comments
[1465]: https://yaml.org/spec/1.2.2/#comments
[1466]: https://yaml.org/spec/1.2.2/#production-parameters
[1467]: https://yaml.org/spec/1.2.2/#rule-c-indentation-indicator
[1468]: https://yaml.org/spec/1.2.2/#rule-c-chomping-indicator
[1469]: https://yaml.org/spec/1.2.2/#rule-c-chomping-indicator
[1470]: https://yaml.org/spec/1.2.2/#rule-c-indentation-indicator
[1471]: https://yaml.org/spec/1.2.2/#rule-s-b-comment
[1472]: https://yaml.org/spec/1.2.2/#white-space-characters
[1473]: https://yaml.org/spec/1.2.2/#white-space-characters
[1474]: https://yaml.org/spec/1.2.2/#empty-lines
[1475]: https://yaml.org/spec/1.2.2/#empty-lines
[1476]: https://yaml.org/spec/1.2.2/#empty-lines
[1477]: https://yaml.org/spec/1.2.2/#empty-lines
[1478]: https://yaml.org/spec/1.2.2/#white-space-characters
[1479]: https://yaml.org/spec/1.2.2/#empty-lines
[1480]: https://yaml.org/spec/1.2.2/#processes-and-models
[1481]: https://yaml.org/spec/1.2.2/#line-break-characters
[1482]: https://yaml.org/spec/1.2.2/#empty-lines
[1483]: https://yaml.org/spec/1.2.2/#line-break-characters
[1484]: https://yaml.org/spec/1.2.2/#empty-lines
[1485]: https://yaml.org/spec/1.2.2/#scalar
[1486]: https://yaml.org/spec/1.2.2/#line-break-characters
[1487]: https://yaml.org/spec/1.2.2/#scalar
[1488]: https://yaml.org/spec/1.2.2/#empty-lines
[1489]: https://yaml.org/spec/1.2.2/#scalar
[1490]: https://yaml.org/spec/1.2.2/#line-break-characters
[1491]: https://yaml.org/spec/1.2.2/#empty-lines
[1492]: https://yaml.org/spec/1.2.2/#scalar
[1493]: https://yaml.org/spec/1.2.2/#line-folding
[1494]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1495]: https://yaml.org/spec/1.2.2/#nodes
[1496]: https://yaml.org/spec/1.2.2/#line-break-characters
[1497]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[1498]: https://yaml.org/spec/1.2.2/#block-scalar-headers
[1499]: https://yaml.org/spec/1.2.2/#rule-b-non-content
[1500]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1501]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1502]: https://yaml.org/spec/1.2.2/#empty-lines
[1503]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[1504]: https://yaml.org/spec/1.2.2/#block-scalar-headers
[1505]: https://yaml.org/spec/1.2.2/#rule-l-strip-empty
[1506]: https://yaml.org/spec/1.2.2/#rule-l-strip-empty
[1507]: https://yaml.org/spec/1.2.2/#rule-l-keep-empty
[1508]: https://yaml.org/spec/1.2.2/#rule-s-indent-less-or-equal
[1509]: https://yaml.org/spec/1.2.2/#rule-b-non-content
[1510]: https://yaml.org/spec/1.2.2/#rule-l-trail-comments
[1511]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1512]: https://yaml.org/spec/1.2.2/#rule-l-trail-comments
[1513]: https://yaml.org/spec/1.2.2/#comments
[1514]: https://yaml.org/spec/1.2.2/#empty-lines
[1515]: https://yaml.org/spec/1.2.2/#comments
[1516]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1517]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[1518]: https://yaml.org/spec/1.2.2/#comments
[1519]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1520]: https://yaml.org/spec/1.2.2/#comments
[1521]: https://yaml.org/spec/1.2.2/#rule-s-indent-less-than
[1522]: https://yaml.org/spec/1.2.2/#rule-c-nb-comment-text
[1523]: https://yaml.org/spec/1.2.2/#rule-b-comment
[1524]: https://yaml.org/spec/1.2.2/#rule-l-comment
[1525]: https://yaml.org/spec/1.2.2/#block-scalar-styles
[1526]: https://yaml.org/spec/1.2.2/#empty-lines
[1527]: https://yaml.org/spec/1.2.2/#node-styles
[1528]: https://yaml.org/spec/1.2.2/#rule-c-literal
[1529]: https://yaml.org/spec/1.2.2/#rule-c-b-block-header
[1530]: https://yaml.org/spec/1.2.2/#rule-l-literal-content
[1531]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1532]: https://yaml.org/spec/1.2.2/#nodes
[1533]: https://yaml.org/spec/1.2.2/#white-space-characters
[1534]: https://yaml.org/spec/1.2.2/#line-break-characters
[1535]: https://yaml.org/spec/1.2.2/#line-break-characters
[1536]: https://yaml.org/spec/1.2.2/#empty-lines
[1537]: https://yaml.org/spec/1.2.2/#line-folding
[1538]: https://yaml.org/spec/1.2.2/#line-break-characters
[1539]: https://yaml.org/spec/1.2.2/#empty-lines
[1540]: https://yaml.org/spec/1.2.2/#block-chomping-indicator
[1541]: https://yaml.org/spec/1.2.2/#character-set
[1542]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1543]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1544]: https://yaml.org/spec/1.2.2/#rule-nb-char
[1545]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1546]: https://yaml.org/spec/1.2.2/#rule-l-nb-literal-text
[1547]: https://yaml.org/spec/1.2.2/#rule-l-nb-literal-text
[1548]: https://yaml.org/spec/1.2.2/#rule-b-nb-literal-next
[1549]: https://yaml.org/spec/1.2.2/#rule-b-chomped-last
[1550]: https://yaml.org/spec/1.2.2/#rule-l-chomped-empty
[1551]: https://yaml.org/spec/1.2.2/#rule-l-nb-literal-text
[1552]: https://yaml.org/spec/1.2.2/#rule-b-nb-literal-next
[1553]: https://yaml.org/spec/1.2.2/#rule-b-chomped-last
[1554]: https://yaml.org/spec/1.2.2/#rule-l-chomped-empty
[1555]: https://yaml.org/spec/1.2.2/#literal-style
[1556]: https://yaml.org/spec/1.2.2/#line-folding
[1557]: https://yaml.org/spec/1.2.2/#rule-c-folded
[1558]: https://yaml.org/spec/1.2.2/#rule-c-b-block-header
[1559]: https://yaml.org/spec/1.2.2/#rule-l-folded-content
[1560]: https://yaml.org/spec/1.2.2/#line-folding
[1561]: https://yaml.org/spec/1.2.2/#white-space-characters
[1562]: https://yaml.org/spec/1.2.2/#white-space-characters
[1563]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1564]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1565]: https://yaml.org/spec/1.2.2/#rule-nb-char
[1566]: https://yaml.org/spec/1.2.2/#rule-s-nb-folded-text
[1567]: https://yaml.org/spec/1.2.2/#rule-b-l-folded
[1568]: https://yaml.org/spec/1.2.2/#rule-s-nb-folded-text
[1569]: https://yaml.org/spec/1.2.2/#white-space-characters
[1570]: https://yaml.org/spec/1.2.2/#line-folding
[1571]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1572]: https://yaml.org/spec/1.2.2/#rule-s-white
[1573]: https://yaml.org/spec/1.2.2/#rule-nb-char
[1574]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1575]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1576]: https://yaml.org/spec/1.2.2/#rule-s-nb-spaced-text
[1577]: https://yaml.org/spec/1.2.2/#rule-b-l-spaced
[1578]: https://yaml.org/spec/1.2.2/#rule-s-nb-spaced-text
[1579]: https://yaml.org/spec/1.2.2/#line-break-characters
[1580]: https://yaml.org/spec/1.2.2/#empty-lines
[1581]: https://yaml.org/spec/1.2.2/#line-folding
[1582]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1583]: https://yaml.org/spec/1.2.2/#rule-l-nb-folded-lines
[1584]: https://yaml.org/spec/1.2.2/#rule-l-nb-spaced-lines
[1585]: https://yaml.org/spec/1.2.2/#rule-l-nb-same-lines
[1586]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1587]: https://yaml.org/spec/1.2.2/#rule-l-nb-same-lines
[1588]: https://yaml.org/spec/1.2.2/#rule-b-as-line-feed
[1589]: https://yaml.org/spec/1.2.2/#rule-l-empty
[1590]: https://yaml.org/spec/1.2.2/#line-break-characters
[1591]: https://yaml.org/spec/1.2.2/#empty-lines
[1592]: https://yaml.org/spec/1.2.2/#block-chomping-indicator
[1593]: https://yaml.org/spec/1.2.2/#line-folding
[1594]: https://yaml.org/spec/1.2.2/#rule-l-nb-diff-lines
[1595]: https://yaml.org/spec/1.2.2/#rule-b-chomped-last
[1596]: https://yaml.org/spec/1.2.2/#rule-l-chomped-empty
[1597]: https://yaml.org/spec/1.2.2/#indicator-characters
[1598]: https://yaml.org/spec/1.2.2/#plain-style
[1599]: https://yaml.org/spec/1.2.2/#mapping
[1600]: https://yaml.org/spec/1.2.2/#block-sequences
[1601]: https://yaml.org/spec/1.2.2/#nodes
[1602]: https://yaml.org/spec/1.2.2/#separation-spaces
[1603]: https://yaml.org/spec/1.2.2/#nodes
[1604]: https://yaml.org/spec/1.2.2/#white-space-characters
[1605]: https://yaml.org/spec/1.2.2/#plain-style
[1606]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1607]: https://yaml.org/spec/1.2.2/#rule-c-l-block-seq-entry
[1608]: https://yaml.org/spec/1.2.2/#rule-c-sequence-entry
[1609]: https://yaml.org/spec/1.2.2/#rule-ns-char
[1610]: https://yaml.org/spec/1.2.2/#rule-s-l+block-indented
[1611]: https://yaml.org/spec/1.2.2/#rule-c-l-block-seq-entry
[1612]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1613]: https://yaml.org/spec/1.2.2/#nodes
[1614]: https://yaml.org/spec/1.2.2/#example-empty-content
[1615]: https://yaml.org/spec/1.2.2/#block-nodes
[1616]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1617]: https://yaml.org/spec/1.2.2/#white-space-characters
[1618]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1619]: https://yaml.org/spec/1.2.2/#collections
[1620]: https://yaml.org/spec/1.2.2/#node-properties
[1621]: https://yaml.org/spec/1.2.2/#collections
[1622]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1623]: https://yaml.org/spec/1.2.2/#rule-ns-l-compact-sequence
[1624]: https://yaml.org/spec/1.2.2/#rule-ns-l-compact-mapping
[1625]: https://yaml.org/spec/1.2.2/#rule-s-l+block-node
[1626]: https://yaml.org/spec/1.2.2/#rule-e-node
[1627]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1628]: https://yaml.org/spec/1.2.2/#rule-c-l-block-seq-entry
[1629]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1630]: https://yaml.org/spec/1.2.2/#rule-c-l-block-seq-entry
[1631]: https://yaml.org/spec/1.2.2/#rule-s-l+block-node
[1632]: https://yaml.org/spec/1.2.2/#rule-ns-l-compact-sequence
[1633]: https://yaml.org/spec/1.2.2/#rule-ns-l-compact-mapping
[1634]: https://yaml.org/spec/1.2.2/#presenting-the-serialization-tree
[1635]: https://yaml.org/spec/1.2.2/#mapping
[1636]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1637]: https://yaml.org/spec/1.2.2/#rule-ns-l-block-map-entry
[1638]: https://yaml.org/spec/1.2.2/#rule-ns-l-block-map-entry
[1639]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1640]: https://yaml.org/spec/1.2.2/#example-block-sequence
[1641]: https://yaml.org/spec/1.2.2/#block-sequences
[1642]: https://yaml.org/spec/1.2.2/#rule-c-l-block-map-explicit-entry
[1643]: https://yaml.org/spec/1.2.2/#rule-ns-l-block-map-implicit-entry
[1644]: https://yaml.org/spec/1.2.2/#rule-c-l-block-map-explicit-key
[1645]: https://yaml.org/spec/1.2.2/#rule-l-block-map-explicit-value
[1646]: https://yaml.org/spec/1.2.2/#rule-e-node
[1647]: https://yaml.org/spec/1.2.2/#rule-c-mapping-key
[1648]: https://yaml.org/spec/1.2.2/#rule-s-l+block-indented
[1649]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1650]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1651]: https://yaml.org/spec/1.2.2/#rule-s-l+block-indented
[1652]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1653]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1654]: https://yaml.org/spec/1.2.2/#mapping
[1655]: https://yaml.org/spec/1.2.2/#flow-mappings
[1656]: https://yaml.org/spec/1.2.2/#nodes
[1657]: https://yaml.org/spec/1.2.2/#rule-ns-s-block-map-implicit-key
[1658]: https://yaml.org/spec/1.2.2/#rule-e-node
[1659]: https://yaml.org/spec/1.2.2/#rule-c-l-block-map-implicit-value
[1660]: https://yaml.org/spec/1.2.2/#rule-c-s-implicit-json-key
[1661]: https://yaml.org/spec/1.2.2/#rule-ns-s-implicit-yaml-key
[1662]: https://yaml.org/spec/1.2.2/#nodes
[1663]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1664]: https://yaml.org/spec/1.2.2/#nodes
[1665]: https://yaml.org/spec/1.2.2/#yaml-directives
[1666]: https://yaml.org/spec/1.2.2/#flow-mappings
[1667]: https://yaml.org/spec/1.2.2/#nodes
[1668]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1669]: https://yaml.org/spec/1.2.2/#nodes
[1670]: https://yaml.org/spec/1.2.2/#plain-style
[1671]: https://yaml.org/spec/1.2.2/#rule-c-mapping-value
[1672]: https://yaml.org/spec/1.2.2/#rule-s-l+block-node
[1673]: https://yaml.org/spec/1.2.2/#rule-e-node
[1674]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1675]: https://yaml.org/spec/1.2.2/#example-block-sequence
[1676]: https://yaml.org/spec/1.2.2/#block-sequences
[1677]: https://yaml.org/spec/1.2.2/#node-properties
[1678]: https://yaml.org/spec/1.2.2/#rule-ns-l-block-map-entry
[1679]: https://yaml.org/spec/1.2.2/#rule-s-indent
[1680]: https://yaml.org/spec/1.2.2/#rule-ns-l-block-map-entry
[1681]: https://yaml.org/spec/1.2.2/#flow-nodes
[1682]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1683]: https://yaml.org/spec/1.2.2/#flow-nodes
[1684]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1685]: https://yaml.org/spec/1.2.2/#white-space-characters
[1686]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1687]: https://yaml.org/spec/1.2.2/#flow-nodes
[1688]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1689]: https://yaml.org/spec/1.2.2/#plain-style
[1690]: https://yaml.org/spec/1.2.2/#example-single-pair-explicit-entry
[1691]: https://yaml.org/spec/1.2.2/#block-mappings
[1692]: https://yaml.org/spec/1.2.2/#rule-s-l+block-in-block
[1693]: https://yaml.org/spec/1.2.2/#rule-s-l+flow-in-block
[1694]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1695]: https://yaml.org/spec/1.2.2/#rule-ns-flow-node
[1696]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1697]: https://yaml.org/spec/1.2.2/#node-properties
[1698]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1699]: https://yaml.org/spec/1.2.2/#white-space-characters
[1700]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1701]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1702]: https://yaml.org/spec/1.2.2/#block-collection-styles
[1703]: https://yaml.org/spec/1.2.2/#rule-s-l+block-scalar
[1704]: https://yaml.org/spec/1.2.2/#rule-s-l+block-collection
[1705]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1706]: https://yaml.org/spec/1.2.2/#rule-c-ns-properties
[1707]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1708]: https://yaml.org/spec/1.2.2/#rule-c-l+literal
[1709]: https://yaml.org/spec/1.2.2/#rule-c-l+folded
[1710]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1711]: https://yaml.org/spec/1.2.2/#block-sequences
[1712]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1713]: https://yaml.org/spec/1.2.2/#white-space-characters
[1714]: https://yaml.org/spec/1.2.2/#block-sequences
[1715]: https://yaml.org/spec/1.2.2/#rule-s-separate
[1716]: https://yaml.org/spec/1.2.2/#rule-c-ns-properties
[1717]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1718]: https://yaml.org/spec/1.2.2/#rule-l+block-mapping
[1719]: https://yaml.org/spec/1.2.2/#rule-l+block-sequence
[1720]: https://yaml.org/spec/1.2.2/#rule-l+block-sequence
[1721]: https://yaml.org/spec/1.2.2/#streams
[1722]: https://yaml.org/spec/1.2.2/#character-encodings
[1723]: https://yaml.org/spec/1.2.2/#comments
[1724]: https://yaml.org/spec/1.2.2/#documents
[1725]: https://yaml.org/spec/1.2.2/#character-encodings
[1726]: https://yaml.org/spec/1.2.2/#character-encodings
[1727]: https://yaml.org/spec/1.2.2/#character-encodings
[1728]: https://yaml.org/spec/1.2.2/#documents
[1729]: https://yaml.org/spec/1.2.2/#documents
[1730]: https://yaml.org/spec/1.2.2/#rule-c-byte-order-mark
[1731]: https://yaml.org/spec/1.2.2/#rule-l-comment
[1732]: https://yaml.org/spec/1.2.2/#directives
[1733]: https://yaml.org/spec/1.2.2/#plain-style
[1734]: https://yaml.org/spec/1.2.2/#directives
[1735]: https://yaml.org/spec/1.2.2/#nodes
[1736]: https://yaml.org/spec/1.2.2/#directives
[1737]: https://yaml.org/spec/1.2.2/#documents
[1738]: https://yaml.org/spec/1.2.2/#documents
[1739]: https://yaml.org/spec/1.2.2/#directives
[1740]: https://yaml.org/spec/1.2.2/#directives
[1741]: https://yaml.org/spec/1.2.2/#documents
[1742]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1743]: https://yaml.org/spec/1.2.2/#directives
[1744]: https://yaml.org/spec/1.2.2/#documents
[1745]: https://yaml.org/spec/1.2.2/#nodes
[1746]: https://yaml.org/spec/1.2.2/#rule-c-document-end
[1747]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1748]: https://yaml.org/spec/1.2.2/#rule-c-directives-end
[1749]: https://yaml.org/spec/1.2.2/#rule-c-document-end
[1750]: https://yaml.org/spec/1.2.2/#rule-b-char
[1751]: https://yaml.org/spec/1.2.2/#rule-s-white
[1752]: https://yaml.org/spec/1.2.2/#directives
[1753]: https://yaml.org/spec/1.2.2/#document-markers
[1754]: https://yaml.org/spec/1.2.2/#nodes
[1755]: https://yaml.org/spec/1.2.2/#nodes
[1756]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1757]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1758]: https://yaml.org/spec/1.2.2/#white-space-characters
[1759]: https://yaml.org/spec/1.2.2/#nodes
[1760]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1761]: https://yaml.org/spec/1.2.2/#nodes
[1762]: https://yaml.org/spec/1.2.2/#nodes
[1763]: https://yaml.org/spec/1.2.2/#indentation-spaces
[1764]: https://yaml.org/spec/1.2.2/#white-space-characters
[1765]: https://yaml.org/spec/1.2.2/#rule-s-l+block-node
[1766]: https://yaml.org/spec/1.2.2/#rule-c-forbidden
[1767]: https://yaml.org/spec/1.2.2/#document-markers
[1768]: https://yaml.org/spec/1.2.2/#directives
[1769]: https://yaml.org/spec/1.2.2/#documents
[1770]: https://yaml.org/spec/1.2.2/#document-markers
[1771]: https://yaml.org/spec/1.2.2/#documents
[1772]: https://yaml.org/spec/1.2.2/#example-empty-content
[1773]: https://yaml.org/spec/1.2.2/#rule-c-directives-end
[1774]: https://yaml.org/spec/1.2.2/#rule-l-bare-document
[1775]: https://yaml.org/spec/1.2.2/#rule-e-node
[1776]: https://yaml.org/spec/1.2.2/#rule-s-l-comments
[1777]: https://yaml.org/spec/1.2.2/#directives
[1778]: https://yaml.org/spec/1.2.2/#document-markers
[1779]: https://yaml.org/spec/1.2.2/#rule-l-directive
[1780]: https://yaml.org/spec/1.2.2/#rule-l-explicit-document
[1781]: https://yaml.org/spec/1.2.2/#documents
[1782]: https://yaml.org/spec/1.2.2/#documents
[1783]: https://yaml.org/spec/1.2.2/#document-markers
[1784]: https://yaml.org/spec/1.2.2/#documents
[1785]: https://yaml.org/spec/1.2.2/#document-markers
[1786]: https://yaml.org/spec/1.2.2/#documents
[1787]: https://yaml.org/spec/1.2.2/#document-markers
[1788]: https://yaml.org/spec/1.2.2/#rule-l-directive-document
[1789]: https://yaml.org/spec/1.2.2/#rule-l-explicit-document
[1790]: https://yaml.org/spec/1.2.2/#rule-l-bare-document
[1791]: https://yaml.org/spec/1.2.2/#rule-l-document-prefix
[1792]: https://yaml.org/spec/1.2.2/#rule-l-any-document
[1793]: https://yaml.org/spec/1.2.2/#rule-l-document-suffix
[1794]: https://yaml.org/spec/1.2.2/#rule-l-document-prefix
[1795]: https://yaml.org/spec/1.2.2/#rule-l-any-document
[1796]: https://yaml.org/spec/1.2.2/#rule-c-byte-order-mark
[1797]: https://yaml.org/spec/1.2.2/#rule-l-comment
[1798]: https://yaml.org/spec/1.2.2/#rule-l-explicit-document
[1799]: https://yaml.org/spec/1.2.2/#tags
[1800]: https://yaml.org/spec/1.2.2/#resolved-tags
[1801]: https://yaml.org/spec/1.2.2/#resolved-tags
[1802]: https://yaml.org/spec/1.2.2/#documents
[1803]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1804]: https://yaml.org/spec/1.2.2/#processes-and-models
[1805]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1806]: https://yaml.org/spec/1.2.2/#mapping
[1807]: https://yaml.org/spec/1.2.2/#representation-graph
[1808]: https://yaml.org/spec/1.2.2/#nodes
[1809]: https://yaml.org/spec/1.2.2/#nodes
[1810]: https://yaml.org/spec/1.2.2/#nodes
[1811]: https://yaml.org/spec/1.2.2/#scalars
[1812]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[1813]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1814]: https://yaml.org/spec/1.2.2/#sequence
[1815]: https://yaml.org/spec/1.2.2/#representation-graph
[1816]: https://yaml.org/spec/1.2.2/#constructing-native-data-structures
[1817]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1818]: https://yaml.org/spec/1.2.2/#scalar
[1819]: https://yaml.org/spec/1.2.2/#representation-graph
[1820]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1821]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1822]: https://yaml.org/spec/1.2.2/#nodes
[1823]: https://yaml.org/spec/1.2.2/#resolved-tags
[1824]: https://yaml.org/spec/1.2.2/#resolved-tags
[1825]: https://yaml.org/spec/1.2.2/#nodes
[1826]: https://yaml.org/spec/1.2.2/#nodes
[1827]: https://yaml.org/spec/1.2.2/#resolved-tags
[1828]: https://yaml.org/spec/1.2.2/#processes-and-models
[1829]: https://yaml.org/spec/1.2.2/#loading-failure-points
[1830]: https://yaml.org/spec/1.2.2/#parsing-the-presentation-stream
[1831]: https://yaml.org/spec/1.2.2/#processes-and-models
[1832]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1833]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1834]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1835]: https://yaml.org/spec/1.2.2/#tags
[1836]: https://yaml.org/spec/1.2.2/#failsafe-schema
[1837]: https://yaml.org/spec/1.2.2/#scalar
[1838]: https://yaml.org/spec/1.2.2/#representation-graph
[1839]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1840]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1841]: https://yaml.org/spec/1.2.2/#mapping
[1842]: https://yaml.org/spec/1.2.2/#nodes
[1843]: https://yaml.org/spec/1.2.2/#nodes
[1844]: https://yaml.org/spec/1.2.2/#nodes
[1845]: https://yaml.org/spec/1.2.2/#mapping
[1846]: https://yaml.org/spec/1.2.2/#scalar
[1847]: https://yaml.org/spec/1.2.2/#representation-graph
[1848]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1849]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1850]: https://yaml.org/spec/1.2.2/#scalar
[1851]: https://yaml.org/spec/1.2.2/#representation-graph
[1852]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1853]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1854]: https://yaml.org/spec/1.2.2/#processes-and-models
[1855]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1856]: https://yaml.org/spec/1.2.2/#processes-and-models
[1857]: https://yaml.org/spec/1.2.2/#scalar
[1858]: https://yaml.org/spec/1.2.2/#representation-graph
[1859]: https://yaml.org/spec/1.2.2/#processes-and-models
[1860]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1861]: https://yaml.org/spec/1.2.2/#nodes
[1862]: https://yaml.org/spec/1.2.2/#json-schema
[1863]: https://yaml.org/spec/1.2.2/#tag-resolution
[1864]: https://yaml.org/spec/1.2.2/#failsafe-schema
[1865]: https://yaml.org/spec/1.2.2/#tag-resolution
[1866]: https://yaml.org/spec/1.2.2/#nodes
[1867]: https://yaml.org/spec/1.2.2/#resolved-tags
[1868]: https://yaml.org/spec/1.2.2/#resolved-tags
[1869]: https://yaml.org/spec/1.2.2/#nodes
[1870]: https://yaml.org/spec/1.2.2/#collections
[1871]: https://yaml.org/spec/1.2.2/#resolved-tags
[1872]: https://yaml.org/spec/1.2.2/#collections
[1873]: https://yaml.org/spec/1.2.2/#resolved-tags
[1874]: https://yaml.org/spec/1.2.2/#nodes
[1875]: https://yaml.org/spec/1.2.2/#scalars
[1876]: https://yaml.org/spec/1.2.2/#plain-style
[1877]: https://yaml.org/spec/1.2.2/#scalars
[1878]: https://yaml.org/spec/1.2.2/#processes-and-models
[1879]: https://yaml.org/spec/1.2.2/#json-schema
[1880]: https://yaml.org/spec/1.2.2/#presentation-stream
[1881]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1882]: https://yaml.org/spec/1.2.2/#processes-and-models
[1883]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1884]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1885]: https://yaml.org/spec/1.2.2/#tags
[1886]: https://yaml.org/spec/1.2.2/#json-schema
[1887]: https://yaml.org/spec/1.2.2/#core-schema
[1888]: https://yaml.org/spec/1.2.2/#tag-resolution
[1889]: https://yaml.org/spec/1.2.2/#json-schema
[1890]: https://yaml.org/spec/1.2.2/#tag-resolution
[1891]: https://yaml.org/spec/1.2.2/#nodes
[1892]: https://yaml.org/spec/1.2.2/#resolved-tags
[1893]: https://yaml.org/spec/1.2.2/#resolved-tags
[1894]: https://yaml.org/spec/1.2.2/#nodes
[1895]: https://yaml.org/spec/1.2.2/#collections
[1896]: https://yaml.org/spec/1.2.2/#resolved-tags
[1897]: https://yaml.org/spec/1.2.2/#collections
[1898]: https://yaml.org/spec/1.2.2/#resolved-tags
[1899]: https://yaml.org/spec/1.2.2/#nodes
[1900]: https://yaml.org/spec/1.2.2/#scalars
[1901]: https://yaml.org/spec/1.2.2/#plain-style
[1902]: https://yaml.org/spec/1.2.2/#scalar
[1903]: https://yaml.org/spec/1.2.2/#resolved-tags
[1904]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1905]: https://yaml.org/spec/1.2.2/#tags
[1906]: https://yaml.org/spec/1.2.2/#processes-and-models
[1907]: https://yaml.org/spec/1.2.2/#tags
[1908]: https://yaml.org/spec/1.2.2/#representing-native-data-structures
[1909]: https://yaml.org/spec/1.2.2/#tags
[1910]: https://yaml.org/spec/1.2.2/#processes-and-models
[1911]: https://yaml.org/spec/1.2.2/#processes-and-models
[1912]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1913]: https://yaml.org/spec/1.2.2/#tags
[1914]: https://yaml.org/spec/1.2.2/#representation-graph
[1915]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1916]: https://yaml.org/spec/1.2.2/#tag-resolution
[1917]: https://yaml.org/spec/1.2.2/#nodes
[1918]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1919]: https://yaml.org/spec/1.2.2/#resolved-tags
[1920]: https://yaml.org/spec/1.2.2/#nodes
[1921]: https://yaml.org/spec/1.2.2/#recommended-schemas
[1922]: https://yaml.org/spec/1.2.2/#core-schema
