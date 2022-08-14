
Working with Characters
Characters as Data
Introduction to Characters and Unicode
Why Unicode?
What's in a Character?
Characters as Units of Text
Characters as abstractions
Variation of appearance or different characters?
Variation in shape turned into a character difference
Characters and "abstract characters"
Characters and other units of text
Characters Versus Images

Processing of Characters
Giving Identity to Characters
Definitions of characters in standards
Annotations used to emphasize differences
The representative glyphs
The number and the Unicode name as identifiers
Unicode is more explicit
Spelling of names and the U+nnnn convention
Unicode Definitions of Characters
Definitions of Characters Elsewhere
What's in a Name?
Should We Be Strict About the Meanings of Characters?
Ambiguity Among Characters
How Do I Find My Character?
Which Characters Does Each Language Use?
Variation of Writing Systems
Glyphs and Fonts
Allowed Variation of Glyphs
Fonts and Their Properties
Font Variation Versus Characters
Fonts in Implementations
Failures to Display a Character
Font Embedding
Definitions of Character Repertoires
Formally Defined Repertoires
Practical Repertoires
Numbering Characters
Hexadecimal Notation
Numbers as Indexes
Making Use of Character Numbers
Encoding Characters as Octet Sequences
Plain Text and Other Formats for Text
Bytes and Octets
Character Encodings
Single-Octet Encodings
Multi-Octet Encodings
The "Character Set" Confusion
Working with Encodings (1/2)
Working with Encodings (2/2)
Selecting the Encoding When Saving
How Encodings Should Be Detected
Setting the Encoding Manually
Sending Unicode Email
Viewing Web Pages in Different Encodings
Common Confusion: Encoding Versus Language
Working with Fonts (1/2)
Working with Fonts (2/2)
Installing Additional Support
Font Support in Web Browsers
Font Substitution: a Solution and a Problem
Printer Fonts
Finding Fonts
Fonts in Web Authoring
The fallback problem
Effects of browser settings
Summaries
Summary of Definitions
Summary of Concept Levels

2. Writing Characters
Method Varieties
A Simple Way or a Universal Way?
An Overview of Methods
Choosing Fonts
Keyboard Variation and Settings
Typing Characters-Just Pressing a Key?
Keyboard Limitations and Variation
Auxiliary Keys
Dead Keys
Virtual Keyboards
A Keyboard on Screen
Virtual Keys for Character Input in Forms
Program Commands (1/2)
Program Commands (2/2)
Copying via the Clipboard
Menu Commands
Insertion menu in Thunderbird
Symbol (character) insertion menu in MS Word
The Show Formatting (Show ¶) tool
Methods Using the Alt Key on Windows
The Alt-0n method
The code page-specific Alt-n method
The Unicode-based Alt-n method
The Alt-X method
The Alt-+n method
Ctrl-Q and Other Methods in Emacs
Character Maps
Character Map in MS Word
Windows Character Map
Replacements on the Fly (1/2)
Replacements on the Fly (2/2)
Default Replacements in MS Word
Viewing and changing the rules
Language dependency
Autoformatting in MS Word
Example: quotation marks
Defining Your Own Shortcuts
Special Techniques
Combining Diacritic Marks
Spacing Between Characters
Inputting East Asian Characters
Escape Sequences (1/2)
Escape Sequences (2/2)
Examples of Escape Notations
CSS
PostScript
RTF
TeX
Notations for Human Readers
Explanations to Human Readers
HTML, SGML, and XML Notations for Characters
Character and entity references in web authoring
The role and use of character and entity references
Definition: character reference
Definition: entity reference
Entity references in HTML
Character entities in XML
Specialized Editors
BabelPad
UniPad
Exercise
Chapter 3. Character Sets and Encodings
Good Old ASCII
American Origin
The ASCII Repertoire
The ASCII Encoding
ISO 646 and National Variants of ASCII
Subsets of ASCII for Safety
The Misnomer "8-bit ASCII"
ISO 8859 Codes
ISO 8859-1 (ISO Latin 1)
Names of Encodings
Other ISO 8859 Codes
Windows Latin 1 and Other Windows Codes
Windows Latin 1
Other Windows Character Codes
Other 8-bit Codes (1/2)
Other 8-bit Codes (2/2)
DOS Code Pages
Mac Encodings
EBCDIC
The Cyrillic KOI8 Encodings
Ad Hoc "8-bit Codes" Defined by Fonts
Unicode and UTF-8
The Conceptual Model: Levels of Coding
The Internet (IAB) model
The four-level Unicode model
Transfer Encoding Syntax
Encodings for Unicode
Saving as Unicode
Encodings for East Asian Language
Vietnamese 8-bit Codes
Encodings for Chinese
Encodings for Japanese
Encodings for Korean
Converters and Transcoding
Transcoding Tools
Free Recode
The iconv Converter
Using Character Codes (1/2)
Using Character Codes (2/2)
Repertoire Requirements
Encodings and the Internet
Encoding in Offline Data
Common Choices of Encoding
Sources of Information
Exercises
Testing encodings
"Deciphering" text
Part II. A Systematic Look at Unicode
Chapter 4. The Structure of Unicode
Design Principles
Goals: Universality, Efficiency, Unambiguity
The 10 Design Principles
Unification
Conformance Requirements
Unicode and ISO 10646
Why Go Beyond 16 Bits?
Does Unicode Contain All Characters in the World?
Identity of Characters
Characters as elementary units of text
Unicode numbers
Unicode names of characters
Using the names
Characters used in character names
Case of letters in names
Notational issues
UCS Sequence Identifiers (USI) and named character sequences
Versions of Unicode
Coding Space (1/3)
Coding Space (2/3)
Coding Space (3/3)
Planes
Allocation Areas
Rows and Blocks
Unicode as Extension of ISO-8859-1
Internal Structure of Blocks
Noncharacter Code Points
Classification of Code Points
Surrogates
Unassigned Code Points and Private Use
Unicode Terms
Deprecated and Obsolete Characters
Digraphs
Text Elements
Unicode Strings
Guide to the Unicode Standard (1/2)
Guide to the Unicode Standard (2/2)
Accessing the Unicode Versions
What Material Constitutes the Unicode Standard?
Viewing the Standard Online
The Chapters of the Standard
How Do I Find All the Information About a Character?
The Zvon database
Using Unibook
Using the Unicode standard
Additional Reference Material
Unicode and Fonts
Unicode as Plain Text
Font Variants as Characters
Variation Selectors
Affecting Font Usage
Ligatures
Vowels as Marks
Operations on Glyphs
Unicode Versus Font Tricks
Criticism of Unicode (1/2)
Criticism of Unicode (2/2)
Overall Complexity
Inefficiency?
Is It Reasonable to Require Support for 100,000 Characters?
Cultural Bias
Lack of precomposed characters
East Asian languages
Favoring UTF-8
Excessive Unification
Semantic Disambiguation Frowned Upon
Misleading Names of Characters
Concepts and Definitions
Illogical Division into Blocks
Questions and Answers
Where Can I Find Tools for Using Unicode?
Why Do People Call Unicode a 16-Bit Code?
How Can I Have a Character Added to Unicode?
How Can I Check That I've Understood the Principles?
Chapter 5. Properties of Characters
Character Classification
The Purposes of Classification
General Category Values
Use of General Category in Programming
An Overview of Properties (1/3)
An Overview of Properties (2/3)
An Overview of Properties (3/3)
Summary of Properties
Normative and Informative Properties
Structure of Database Files
Compositions and Decompositions (1/3)
Compositions and Decompositions (2/3)
Compositions and Decompositions (3/3)
The Impact of Diacritic Marks
Precomposed and decomposed form
Combining marks: powerful, but still poorly supported
Features that are not diacritic marks
Compatibility Mappings and Canonical Mappings
Difference between canonical and compatibility mappings
Canonical and compatibility equivalence
The meaning of canonical mapping
Differences in glyphs for equivalent characters
How the mappings are defined
Canonical Decomposition and Compatibility Decomposition
Canonical decomposition
Canonical Ordering Behavior
Canonical equivalence
Compatibility decomposition and equivalence
Canonical and compatibility decomposable characters
Compatibility Characters
Compatibility Decomposable Characters
Avoiding Compatibility Characters
Compatibility Characters for Ligatures
Normalization (1/2)
Normalization (2/2)
Normalization Versus Folding
Overview of Normalization Forms
Use of normalization forms
Invariance of Basic Latin characters
Normalization Form C
Normalization Form KC
Composition Exclusions
Definition of Compatibility Decomposable Character
W3C Normalization
Case Properties
Recognizing Uppercase, Lowercase, and Titlecase
Case Mappings
Case Folding in Unicode
Viewing the Mappings
Character Case Mappings Versus Visual Mappings
Collation and Sorting (1/2)
Collation and Sorting (2/2)
Sorting Characters Versus Sorting Strings
Collation and Unicode
Layered Model of Collation
Code Point Order Versus Collating Order
Code point order is unnatural
Using code point order as a fallback in definitions
Code point order sorting for technical reasons
Problems of legacy software
Unicode Collation Algorithm
Text Boundaries
Directionality (1/2)
Directionality (2/2)
Writing Direction of Text
Bidirectionality
Directionality and Character Codes
Directionality of Characters
Control Characters for Directionality
Bidi Mirroring
Directionality in HTML and CSS
Directionality of Formatting
Line-Breaking Properties (1/4)
Line-Breaking Properties (2/4)
Line-Breaking Properties (3/4)
Line-Breaking Properties (4/4)
Conformance Criteria
Characters for Special Control over Line Breaking
Preventing line breaks
Suggesting line break opportunities
Limited support
Principles of Line Breaking
Emergency Breaks
Unicode Line-Breaking Rules
Values of the LineBreak property
The format of LineBreak.txt
The formal rules
Applying the rules
Pair table implementation
Tailoring
Some background and criticism
Unicode Conformance Requirements (1/2)
Unicode Conformance Requirements (2/2)
An Informal Summary
Notations and Terms Used in the Requirements
Unassigned Code Points
Interpretation
Modification
Character Encoding Forms
Character Encoding Schemes
Bidirectional Text
Normalization Forms
Normative References
Unicode Algorithms
Default Casing Operations
Unicode Standard Annexes
Effects on Choosing Characters
Example: Some Mathematical Operators
Chapter 6. Unicode Encodings
Unicode Encodings in General
UTF-32 and UCS-4
UTF-16 and UCS-2
UCS-2 Is BMP Only
Surrogate Pairs in UTF-16
Some Properties of UTF-16
UTF-8
UTF-8 Encoding Algorithm
UTF-8 Versus ISO-8859-1
Some Properties of UTF-8
Byte Order
Conversions Between Unicode Encodings
Other Encodings (1/3)
Other Encodings (2/3)
Other Encodings (3/3)
SCSU Compression
BOCU-1 Compression
CESU-8
Modified UTF-8
Base64 Encoding of Data
Quoted Printable Encoding
Uuencode
UTF-7
UTF-1
UTF-EBCDIC
GB 18030, "Chinese Unicode"
Punycode, Encoding for Domain Names
URL Encoding
Introduction: URL Encoding for form data
The original URL Encoding
To encode or not to encode?
Generalized URL Encoding
Modern, UTF-8-based URL Encoding
Auto-Detecting the Encoding
Choosing an Encoding
Storage Requirements
Efficiency of Processing
Specific Limitations
Favoring UTF-8 on the Internet
Part III. Advanced Unicode Topics
Chapter 7. Characters and Languages
Writing Systems and IT
Internationalization (i18n) and Related Issues
Aspects of Writing and Their IT Impact
Writing direction
What does a language setting really set?
Setting the Language in Word Processing
Automatic operations on punctuation
Spelling and grammar checks
Determining the language of text
Exercise
Setting Language Preferences in Browsers
Script = Writing System
Categories of Scripts
Need for script information
Scripts and spoofing
Codes and names for scripts
The Script property: the script of a character
Character Requirements of Languages (1/3)
Character Requirements of Languages (2/3)
Character Requirements of Languages (3/3)
The Impact of Character Repertoire
Languages and Characters
What constitutes a character?
Does Unicode support all languages?
Attempts at technical definitions of character requirements
Which characters does a language need?
Language Coverage of ISO Latin Alphabets
Example: Spanish
Example: French
Transliteration and Transcription (1/2)
Transliteration and Transcription (2/2)
Solutions to Readers, Problems to Implementers
Transliteration Converts Letters
Transcription Converts Sounds
Phonetic Transcription in IPA
Transcription Inside a Script?
Language Metadata (1/2)
Language Metadata (2/2)
Need for Language Information
Methods of Determining Language
Language Markup
Attributes for language in HTML and XML
The impact of language markup
Granularity of markup
Language Codes
The confusion of codes
ISO 639
Language codes on the Internet
Language codes and user interfaces
Language Tags in Unicode
Languages and Fonts
Example: Shape of the Acute Accent
Chinese Characters and Language Information
Chapter 8. Character Usage
Basics of Character Usage
Orthography Sets Rules for Writing
Typography Is About Appearance
Liberal in What You Accept
Conservative in What You Send
ASCII (Basic Latin) (1/4)
ASCII (Basic Latin) (2/4)
ASCII (Basic Latin) (3/4)
ASCII (Basic Latin) (4/4)
Names of ASCII Characters
Alphanumeric Characters
Parentheses
Other Graphic Characters
Ampersand & (U⁠+⁠0026)
Apostrophe ' (U⁠+⁠0027)
Asterisk * (U⁠+⁠002A)
Circumflex accent ^ (U⁠+⁠005E)
Colon : (U⁠+⁠003A)
Comma , (U⁠+⁠002C)
Dollar sign $ (U⁠+⁠0024)
Commercial at @ (U⁠+⁠0040)
Equals sign = (U⁠+⁠003D)
Exclamation mark ! (U⁠+⁠0021)
Full stop "." (U⁠+⁠002E)
Grave accent ` (U⁠+⁠0060)
Greater-than sign > (U⁠+⁠003E)
Hyphen-minus "-" (U⁠+⁠002D)
Less-than sign < (U⁠+⁠003C)
Low line _ (U⁠+⁠005F)
Number sign # (U⁠+⁠0023)
Percent sign % (U⁠+⁠0025)
Plus sign + (U⁠+⁠002B)
Question mark ? (U⁠+⁠003F)
Quotation mark " (U⁠+⁠0022)
Reverse solidus \ (U⁠+⁠005C)
Semicolon ; (U⁠+⁠003B)
Solidus / (U⁠+⁠002F)
Space " " (U⁠+⁠0020)
Tilde ~ (U⁠+⁠007E)
Vertical line | (U⁠+⁠007C)
ASCII Control Characters (C0 Controls)
Control characters or control codes?
Types of control characters
Visible symbols for control characters
Summary of C0 Controls
Latin-1 Supplement (ISO 8859-1) (1/2)
Latin-1 Supplement (ISO 8859-1) (2/2)
Diacritic Marks and Letters with Them
Other Letters
Superscript Digits (¹ ² ³) and Vulgar Fractions (¼ ½ ¾)
Punctuation
Currency Symbols
Mathematical, Logical, and Physical Symbols
Specialized Characters
Other Latin Letters
Other European Alphabetic Scripts
Greek Script
Cyrillic Script
Armenian and Georgian Scripts
Diacritic Marks (1/2)
Diacritic Marks (2/2)
Why Diacritic Marks?
Early Approaches
Coded Combinations
Combining Diacritic Marks
Variation in Appearance
Spacing Diacritic Marks
Letterlike Symbols
General Punctuation (1/3)
General Punctuation (2/3)
General Punctuation (3/3)
Space Characters
Space
No-break space: use it!
Fixed-width spaces: rarely used
Adjusting spacing in other ways
Additional no-break space characters
A practical approach to thin spaces
Disallowing and allowing line breaks
Quotation Marks
Language-specific quotation marks
The apostrophe versus the single quotation mark
Hyphens and Dashes
Use of hyphens and dashes
The soft hyphen
MS Word specialties
Ellipsis
Angular brackets
Line Structure Control
Different Approaches to Line Structuring
Lines and Records
Methods of Coding Line Structure
Editors, Word Processors, and Data Transfer
Mathematical and Technical Symbols (1/2)
Mathematical and Technical Symbols (2/2)
Superscripts and Subscripts
The Number Forms Block
Roman numerals
Fractions
Characters in SI Notations
Conceptual levels of SI notations
Notes on individual characters
Letterlike symbols and the SI
Other Blocks (1/2)
Other Blocks (2/2)
Spacing Modifier Letters
Currency Symbols
Phonetic Characters
Specials
Dingbats
Summary of Blocks
Chapter 9. The Character Level and Above
Levels of Text Representation and Processing
Plain Text, Rich Text, and Markup
Plain text
Rich text formats
Text with markup
Quasi-markup
Conversion to plain text
Example: Nonbreaking Hyphen
Example: Formatting in Word Processing
Example: HTML Markup and CSS
Linear Text Versus Mathematical Notations
Unicode and Mathematics
Characters Outside the Repertoire
Different workarounds
Using a character versus using a small image
Button-like symbols
Using an image for esthetic reasons
Selecting the Appropriate Level of Expression
Subscripts and Superscripts
Visual appearance of subscripts and superscripts
Replacement notations for superscripts and subscripts
Suggested policy on subscripting and superscripting
Characters and Accessibility
Characters in non-visual presentation
Understandability of characters
Explaining characters
Characters and Markup (1/4)
Characters and Markup (2/4)
Characters and Markup (3/4)
Characters and Markup (4/4)
Markup and Styling
Document-wide Versus Local Decisions
Unicode Versus Markup
Differences between markup and plain text
Characters that should not be used in marked-up text
Formatting characters that may be used in marked-up text
Characters with compatibility mappings
Preventing Line Breaks
Breaking the Flow of Text
Why Not Markup in Unicode?
Media Types for Text (1/2)
Media Types for Text (2/2)
The Type text
The Character Encoding
The text Type Versus the application Type
Subtypes of text
Chapter 10. Characters in Internet Protocols
Information About Encoding
What Happens Without Information About Encoding
Approaches to Specifying the Encoding
Practical Recommendations
Looking at the Headers
Characters in MIME (1/5)
Characters in MIME (2/5)
Characters in MIME (3/5)
Characters in MIME (4/5)
Characters in MIME (5/5)
Media Types
Character Encoding ("charset") Information
MIME Headers
Internet message format and MIME
Headers related to characters
Headers for transfer encoding
The Quoted-Printable (QP) transfer encoding
How MIME should work
Troubleshooting Examples
Character Encoding on the Web
Headers in HTTP
Specifying the encoding in HTTP headers
Which encodings can be used?
HTTP versus HTML
Checking the HTTP headers
Server configuration
Using a meta tag
Resolution of conflicts
The effect of XHTML
Heuristics of detecting encoding
Which encoding should I use?
Avoiding the encoding problem
The "Unicode Encoded" logo
Content Negotiation and Multilingual Sites (1/3)
Content Negotiation and Multilingual Sites (2/3)
Content Negotiation and Multilingual Sites (3/3)
Introduction to Multilingual Web Sites
Parallel versions in different languages
Pages with a mix of languages
Language negotiation: automatic selection of version
Language versus country
Links to Language Versions
Writing Link Texts
Language Negotiation in the HTTP Protocol
Language Negotiation: the Server Side
Using Multiviews
Using type-map
When negotiation fails
Language Negotiation: the Browser Side
Notes on Multilingual Sites
Producing the translations
Translation or different content?
Indicating what is available in each language
Naming the versions
Language preferences and JavaScript
Making use of language preferences in CGI scripts
Types of Negotiation
Characters in Protocol Headers
The Signature Convention May Help
The Q Encoding
The B Encoding
Summary: Dealing with Non-ASCII Characters in Headers
Characters in Domain Names and URLs
Internationalized Domain Names (IDN)
The IDNA implementation
Security threats
Characters in URLs
Chapter 11. Characters in Programming
Characters in Computer Languages
Common Escape Notations
Characters in Markup Languages and CSS
Characters in HTML and XML
Problems in generating markup programmatically
Problems in using scripts inside HTML
Characters in CSS
Identifiers in CSS
Character and String Data (1/5)
Character and String Data (2/5)
Character and String Data (3/5)
Character and String Data (4/5)
Character and String Data (5/5)
Constructs and Principles of Processing Characters
The FORTRAN Model: Hollerith Data
The C model
The character data type
Strings as arrays
8-bit characters and sign extension
The EOF indicator
The zero byte (NUL byte) convention
The null pointer
Confusion around NUL, NULL, and relatives
C and Unicode
Unicode with 8-bit Quantities?
Wide Characters
Win32 APIs
Multibyte Character Sets (MBCS) Versus Unicode
The Perl Model
Strings and characters in Perl
The catenation operator "."
In Perl, double quotes mean evaluation
Notations for Unicode characters
Using properties of characters
ECMAScript (JavaScript)
String oriented
The ECMAScript standard
UTF-16 implied
The \u escape notation
PHP: Mostly Just 8 Bits
Java: Rich Support to Unicode
Characters, strings, objects, and methods
Encodings and escape notations
16-bit characters
Java identifiers
Library routines
The Preparedness Principle (1/2)
The Preparedness Principle (2/2)
Being Prepared for Amount of Data
Being Prepared for Content of Data
Methods of handling unexpected characters
Displaying unrecognized or undisplayable code points
Default ignorable code points
Table-Driven Versus Property-Driven Processing
Naïve Processing
Character Input and Output (1/2)
Character Input and Output (2/2)
Character-Oriented and Line-Oriented Processing
Perl I/O
Java File I/O
Buttons for Character Input
Processing Form Data
Decoding Form Data
Recognizing the Encoding
Avoid Oddities by Using UTF-8
Using UTF-8
Submitting a File
Identifiers, Patterns, and Regular Expressions
Identifiers
Identifiers: internal or external?
Traditional format of identifiers
Case sensitivity
The Unicode approach to identifiers
Patterns
Identifier and Pattern Characters
Identifier Syntax
Normalization
Case folding
Identifiers (names) in XML
Alternative Identifier Syntax
Pattern Syntax
Regular Expressions
Regexp use in programming
Regexp use by end users
Unicode regular expressions
Basic Unicode support
International Components for Unicode (ICU)
Using Locales
The Locale Concept
CLDR
CLDR versus Unix/Linux/POSIX locale concept
Using CLDR
Internationalization and Localization
CLDR Description and Data
Problems with Aspects of Localization
Tables for Writing Characters
Mapping from Symbol Font to Unicode
