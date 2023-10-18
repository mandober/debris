# Wikipedia :: Help :: Searching

https://en.wikipedia.org/wiki/Help:Searching
https://en.wikipedia.org/wiki/Wikipedia:Tools#Searching

To power its search feature, Wikipedia uses `CirrusSearch`, a MediaWiki extension that uses Elasticsearch to provide enhanced search features.

- The *search box* navigates directly to a page when the name matches exactly.
- Force show other pages (that include your search string) by including a tilde anywhere in the query.
- The maximum search string is 300 characters long.
- Search can instantly search all `55,579,980 pages` on the wiki when the search is kept to a simple word or two.
- Wikipedia's searches can be made domain-specific (i.e. in desired namespaces)
- search engine supports special characters and parameters to extend the power of searches and allow users to make their search strings more specific.

Advanced features include
- multi-word proximity-searches (in which the user indicates how close the words in a phrase might be)
- wildcard searches
- "fuzzy~" searches (handles typo-correction and questionable spelling)
- several wiki-oriented operators and parameters for weighting and filtering
- Search can also handle regular expressions, a sophisticated exact-string and string-pattern search tool that is not offered by most public search engines.
- Search can also filter results by template names used, category membership, or pages linking to a specific page.

`Special:Preferences` offers several search options, and `Wikipedia:Tools § Searching` offers the setups of other users.

* ⇧ Shift+Alt+F focus search box
* Terms in the search string are subject to *stem matching*, except for anything included between double quotation marks.
* You can include in your search string special characters and parameters (e.g. `insource:`, `incategory:`, `prefix:`) that activate specific search capabilities. Using any of these will take you to Wikipedia's search results page with the results of your search displayed.
* The format of the text that is entered is called "search string syntax".

* In order to search for terms that contain non-alphanumeric characters, a regex search must be used instead (using the `\` escape character if required), for example `insource:/\|LT\|/` successfully returns all instances of `|LT|`.

## Namespaces

- The default search domain is the article space, but any namespace may be specified in a query.

https://en.wikipedia.org/wiki/Wikipedia:Namespace

- At the search results page, any number of namespaces can be specified, and users can keep those namespaces as their own default search domain. Partial namespace searches can be made by specifying the initial letters of a page name.

- Most punc chars are treated as a space character (grey-space)
- Parentheses (…) are ignored by the search engine and have no effect.

## Special characters

* Double quotes for exact phrase search

A phrase can be matched by enclosing it in double quotes, "like this". Double quotes can define a single search term that contains spaces. For example, `"holly dolly"` differs from `holly dolly` where the space is interpreted as a *logical AND*.

* Suffixed tilde character for fuzzy search

Spelling relaxation is requested by suffixing a tilde like `this~`, with results like "thus" and "thins". It covers any two character-changes for any character except the first: it returns addition, exchange, or subtraction. This search technique is sometimes called a "sounds-like" search. For example, searching for `charlie~ parker~` returns Charlie Parker, Charles Palmer, Charley Parks.

* Prefixed tilde character for forced search

To force a search rather than navigate directly to a matching page, include a tilde character anywhere in the query. It always takes you to the search results page, never jumping to a single title. For example, the misspelling `similiar` is redirected to the Similarity article, but prefixing a tilde, `~similiar`, lists pages containing that misspelling.

* Prefixed hyphen or exclamation point for exclusion

Pages matching a search term can be excluded by prefixing an exclamation point (!) or a hyphen or dash (-) to the term. This is the *logical NOT*. For example, `credit card -"credit card"` finds all articles with "credit" and "card" except those with the phrase "credit card".

* Wildcard characters

The two wildcard characters are `*` and `\?`, and both can come in the middle or end of a word. The escaped question mark stands for one character and the star stands for any number of characters. Because many users ask questions when searching, question marks are ignored by default, and the escaped question mark (\?) must be used for a wildcard.

* Logical operators

OR operator is supported, but will only give intuitive results (corresponding to logical disjunction) if all search terms are separated by OR (e.g. `red OR green OR blue` has the expected behaviour, but `red OR green blue` does not). OR also does not behave predictably with special keywords (like `intitle:`) or namespaces.

## Parameters

Parameters function as name filters, each followed by the search term it operates on. Their search term may be a word or a phrase.

The main parameters are
- {namespace}:
- intitle:
- insource:
- incategory:
- prefix:

* `prefix:` differs from the other parameters in that it can only be used at the end of a search string.

* A single "{namespace}:" filter can go first, and a single "prefix" filter can go last.

* {namespace} {name}:

Given only at the beginning of the query, a namespace name followed by a colon limits search results to that namespace. It is a filter without a query string. Namespace aliases, like "WP" for "Wikipedia", are accepted.

* All:

Prefixing `All:` to a search string, searches all namespaces, and prioritizes mainspace matches to the top.

* all:

Using the lower-case `all:` version also searches all namespaces but does not prioritize the results by namespace.

* intitle:

Page titles and redirects can be searched with `intitle:{query}`. The search results highlight occurrences in both the title and page content. Multiple "intitle" filters may be used to search for words in titles regardless of order, or possible in different titles (i.e. redirects) for the same article. Regular expressions can be used with `intitle:/regexp/` or the case insensitive `intitle:/regexp/i`.

Examples
- `intitle:mathematical`
- `intitle:airport`
  All articles with airport in their title
- `parking intitle:airport`
  Articles with "parking" in their text and "airport" in their title
- `intitle:international intitle:airport`
  Articles containing "international" and "airport" in their title (including Airports Council International)
- `intitle:"international airport"`
  Articles with the phrase "international airport" in their title
