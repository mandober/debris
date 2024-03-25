# REST

* Main elements:
  - HTTP: request/response protocol in the client/server computing model
  - request: issued by client
  - response: issued by server
  - status code: issued by server (1xx, 2xx, 3xx, 4xx, 5xx)
  - resource: pretty much any single identifiable entity
  - URI: Unique Resource Identifier
  - URL: Unique Resource Locator
* HTTP verbs
  - GET: idempotent, readonly
  - POST: create new resource
  - PUT: replace resource by providing the entire resource; idempotent
  - PATCH: update resource by providing partial (changes only) resource parts
  - DELETE: remove a resource
* Other HTTP verbs
  - HEAD: like GET without the resource body (payload); get headers
  - OPTIONS: query supported HTTP verbs (by the server)
  - TRACE: echo back the request to the client (request integrity checking)
  - CONNECT: establishes a persistent tunneled connection





# Representational state transfer

https://en.wikipedia.org/wiki/Representational_state_transfer

**Representational state transfer (REST)** is a software architectural style that defines a set of constraints to be used for accessing and creating *Web services*.

Web services that conform to the REST architectural style, called RESTful Web services, provide interoperability between computer systems on the Internet.

**RESTful Web services** allow the requesting systems to access and manipulate textual representations of *Web resources* by using a uniform and predefined set of stateless operations.

**Web resources** were first defined on the World Wide Web as documents or files identified by their URLs. However, today they have a much more generic and abstract definition that encompasses every thing or entity that can be identified, named, addressed, or handled, in any way whatsoever, on the Web.

In a *RESTful Web Service*, requests made to a resource's URI will elicit a response with a payload formatted in HTML, XML, JSON, or some other format.

The response can confirm that some alteration has been made to the stored resource, and the response can provide hypertext links to other related resources or collections of resources.

*HTTP methods* or *verbs*
- GET
- HEAD
- POST
- PUT
- PATCH
- DELETE
- CONNECT
- OPTIONS
- TRACE

Web service APIs that adhere to the REST architectural constraints are called RESTful APIs. HTTP-based RESTful APIs are defined with the following aspects:
- base URI, such as `http://api.example.com/collection/`
- standard HTTP methods, e.g., GET, POST, PUT, PATCH, DELETE
- media type that defines state transition data elements (Atom, microformats)
