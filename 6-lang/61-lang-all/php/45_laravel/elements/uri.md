# URI

**Uniform Resource Identifier (URI)** is a string that unambiguously identifies a particular resource.

To guarantee uniformity, all URIs follow a predefined set of syntax rules, but also maintain extensibility through a separately defined hierarchical naming scheme (e.g. `http`, `ftp`, `mailto`, etc.).

Such identification enables interaction with representations of the resource over a network, typically the World Wide Web, using specific protocols.

Schemes specifying a concrete syntax and associated protocols define each URI.

The most common form of URI is the *Uniform Resource Locator (URL)*, frequently referred to informally as a web address.

More rarely seen in usage is the *Uniform Resource Name (URN)*, which was designed to complement URLs by providing a mechanism for the identification of resources in particular namespaces.

**A Uniform Resource Locator (URL)** is a URI that specifies the means of acting upon or obtaining the representation of a resource, i.e. specifying both its primary access mechanism and network location.

For example, the URL [http://example.org/wiki/Main_Page] refers to a resource identified as `/wiki/Main_Page` whose representation in the form of HTML and related code is obtainable via the Hypertext Transfer Protocol (`http:`) from a network host whose domain name is `example.org`.


## URI Generic Syntax

Each URI begins with a *scheme name* that refers to a specification for assigning identifiers within that scheme. As such, the URI syntax is a federated and extensible naming system wherein each scheme's specification may further restrict the syntax and semantics of identifiers using that scheme.

The URI generic syntax consists of a hierarchical sequence of 5 components:   
    `URI := scheme:[//authority]path[?query][#fragment]`    
where the authority has 3 subcomponents:   
    `authority := [userinfo@]host[:port]`



URI components:
- Scheme
- Authority
  - userinfo
    - username
    - password
  - host
    - domain name | IP v4 | IP v6
  - port
- Path
  - path segments
  - slug
- Query
  - key/value pairs
  - query delimiter
- Fragment


1. **Scheme**   
A non-empty *scheme* component followed by a *colon*. Scheme name: `[a-z][a-z0-9\.+-]`; case-insensitive. Although schemes are case-insensitive, the canonical form is *lowercase* and documents that specify schemes must do so with lowercase letters. Examples of popular schemes include `http`, `https`, `ftp`, `mailto`, `file`, `data`, `irc`.

2. **Authority**   
- optional authority component preceded by `//`
- comprised of 3 subcomponents:
  1. optional **userinfo** subcomponent:
    - *username* followed by `:`
    - optional *password* followed by `@`
  2. **Host** subcomponent consisting of:
    - registered name (including but not limited to a hostname)
    - IP address
      - IPv4 addresses must be in dot-decimal notation
      - IPv6 addresses must be enclosed in brackets
  3. optional **port** subcomponent preceded by `:`

3. **Path**   
Path component consisting of a sequence of *path segments* separated by `/`. A path is always defined for a URI, though it may be empty (zero length). A segment may also be empty, resulting in two consecutive slashes, `//`, in the path component.

If an authority component is present, then the path component must either be empty or begin with a slash, `/`. If an authority component is absent, then the path cannot begin with an empty segment, that is with two slashes, `//`, as the following characters would be interpreted as an authority component.

The final segment of the path may be referred to as a *slug*.

4. **Query**   
An optional query component is preceded by a question mark `?` and it contains a *query string* whose syntax is usually a sequence of *attribute=value* pairs separated by a delimiter (usually `&`, sometimes `;`).

5. **Fragment**   
An optional fragment component preceded by a hash `#`. The fragment contains a fragment identifier providing direction to a secondary resource, such as a section heading in an article identified by the remainder of the URI. When the primary resource is an HTML document, the fragment is often an `id` attribute of a page element.

## Allowed chars in URI

* Allowed characters: `a-z A-Z 0-9 - . _ ~`
* Octets represented by any other character must be *percent-encoded*.
* `: / ? # [ ] @` are reserved for use as delimiters of the generic URI components and must be percent-encoded (e.g. `%3F` is percent-encoded question mark).
* `! $ & ' ( ) * + , ; =` are allowed unencoded in userinfo, host and path as delimiters
* `:` and `@` may appear unencoded within the path, query, and fragment.
* `?` and `/` may appear unencoded as data within the query or fragment.


## URI examples

https://username:password@example.com:80/root/slug/?q=42&s=now#frag

https://[2001:db8::7]/

https://44.33.22.11/
