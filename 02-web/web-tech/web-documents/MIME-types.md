# Media type

https://en.wikipedia.org/wiki/Media_type

A **media type** (formerly known as a *MIME type*) is a 2-part identifier for *file formats* and *format contents* transmitted on the Internet.

Their purpose is somewhat similar to file extensions in that they identify the intended data format.

IANA is the official authority for the standardization and publication of these classifications.

Media types were originally defined in "RFC 2045 (MIME) Part One: Format of Internet Message Bodies (Nov 1996)" as a part of the MIME (Multipurpose Internet Mail Extensions) specification, for denoting type of email message content and attachments; hence the original name, MIME type.

Media types are also used by other internet protocols such as HTTP and document file formats such as HTML, for similar purposes.

## Contents

- 1. Naming
  - 1.1. Types
  - 1.2. Subtypes
    - 1.2.1. Standards tree
    - 1.2.2. Vendor tree
    - 1.2.3. Personal or vanity tree
    - 1.2.4. Unregistered tree
  - 1.3. Suffix
  - 1.4. Common examples
- 2. Mailcap
- 3. Mime.types
  - 3.1. Netscape use
- 4. See also
- 5. Links

## 1. Naming

Syntax notation is the Extended Backus-Naur form (EBNF), following RFC convention.

A media type consists of a type and a subtype, which is further structured into a tree. A media type can optionally define a suffix and parameters:

```bnf
mime-type = type "/" [tree "."] subtype ["+" suffix]* [";" parameter];
```

As an example, an HTML file might be designated `text/html; charset=UTF-8`. In this example, `text` is the *type*, `html` is the *subtype*, and `charset=UTF-8` is an *optional parameter* indicating the character encoding.

Types, subtypes, and parameter names are *case-insensitive*. Parameter values are usually case-sensitive, but may be interpreted in a case-insensitive fashion depending on the intended use.

Examples
- text/html
- text/javascript
- image/png


### 1.1. Types

The *type* defines the broad use of the media type.

Registered types (as of Dec 2020)
- application
- audio
- image
- message
- multipart
- text
- video
- font
- example
- model
- chemical (unofficial top-level type in common use)

### 1.2. Subtypes

A subtype typically consists of a *media format*, but it may or must also contain other content, such as a *tree prefix*, *producer*, *product* or *suffix*, according to the different rules in registration trees.

All media types should be registered using the IANA registration procedures.

For the efficiency and flexibility of the media type registration process, different structures of subtypes can be registered in registration trees that are distinguished by the use of *tree prefixes*.

Currently the following trees are created:
- standard, no prefix
- vendor, `vnd.` prefix
- personal or vanity, `prs.` prefix
- unregistered, `x.` prefix

These *registration trees* were first defined in Nov 1996 (obsoleted RFC 2048 - currently RFC 6838). New registration trees may be created by IETF Standards Action for external registration and management by well-known permanent organizations (e.g. scientific societies).

#### 1.2.1 Standards tree

The standards tree does not use any tree prefix. Examples are `text/javascript`, `image/png`.

Registrations in the standards tree must be either associated with IETF specifications approved directly by the IESG, or registered by an IANA recognized standards-related organization.

#### 1.2.2 Vendor tree

The vendor tree includes media types associated with publicly available products. It uses the vnd. tree prefix.

Examples:
- `application/vnd.ms-excel`
- `application/vnd.oasis.opendocument.text`

The terms "vendor" and "producer" are considered equivalent in the context.

Industry consortia as well as non-commercial entities can register media types in the vendor tree.

A registration in the vendor tree may be created by anyone who needs to interchange files associated with some software product or set of products.

However, the registration belongs to the vendor or organization producing the software that employs the type being registered, and that vendor or organization can at any time elect to assert ownership of a registration done by a third party.

#### 1.2.3 Personal or vanity tree

The personal or vanity tree includes media types associated with non publicly available products or experimental media types. It uses the `prs.` tree prefix.

Examples:
- `audio/prs.sid`
- `image/prs.btif`


#### 1.2.4 Unregistered tree

The unregistered tree includes media types intended exclusively for use in *private environments* and only with the active agreement of the parties exchanging them.

It uses the `x.` tree prefix.

Examples:
- `application/x.foo`
- `video/x.bar`

Media types in this tree cannot be registered.

This type was originally defined in RFC 1590 (published in September 1993) using the x- or X- prefix. RFC 2048 (published in November 1996) introduced the `x.` prefix, but discouraged use of the unregistered tree, as new personal and vendor trees with relaxed registration requirements are now available.

The current RFC 6838 (published in January 2013) maintains the same recommendation, but subtypes prefixed with `x-` or `X-` are no longer considered to be members of this tree.

Media types that have been widely deployed (with a subtype prefixed with x- or X-) without being registered, should be, if possible, re-registered with a proper prefixed subtype.

If this is not possible, the media type can, after an approval by both the media types reviewer and the IESG, be registered in the standards tree with its unprefixed subtype.

`application/x-www-form-urlencoded` is an example of a widely deployed type that ended up registered with the x- prefix.



## 1.3. Suffix

*Suffix* is an augmentation to the media type definition to additionally specify the *underlying structure of that media type*, allowing for generic processing based on that structure and independent of the exact type's particular semantics.

Media types that make use of a named structured syntax should use the appropriate IANA registered "+"suffix for that structured syntax when they are registered.

Structured Syntax Suffix Registry
- +xml
- +json
- +ber
- +der
- +fastinfoset
- +wbxml
- +zip
- +gzip
- +cbor
- +json-seq
- +cbor-seq

## 1.4. Common examples

```
text/plain
text/css
text/html
text/javascript(.js)
text/xml
text/csv
audio/mpeg
audio/ogg
image/avif
image/png
image/svg+xml (.svg)
image/jpeg (.jpg, .jpeg, .jfif, .pjpeg, .pjp)
model/obj (.obj)
application/json
application/ld+json (JSON-LD)
application/pdf
application/sql
application/xml
application/zip
multipart/form-data
application/x-www-form-urlencoded
application/msword (.doc)
application/vnd.api+json
application/vnd.ms-excel (.xls)
application/vnd.ms-powerpoint (.ppt)
application/vnd.oasis.opendocument.text (.odt)
```


## 5. Links

Media Types
https://www.iana.org/assignments/media-types/media-types.xhtml

Media container formats (file types) - Web media technologies | MDN
https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Containers

MIME types (IANA media types) - HTTP | MDN
https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types

Common MIME types - HTTP | MDN
https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types

MIME Types - The Complete List
https://www.sitepoint.com/mime-types-complete-list/

MIME Types: Complete List of MIME Types - HTTP - W3cubDocs
https://docs.w3cub.com/http/basics_of_http/mime_types/complete_list_of_mime_types.html
