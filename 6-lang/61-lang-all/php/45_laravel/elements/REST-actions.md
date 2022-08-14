# HTTP actions


Seven RESTful controller methods:
1. index    Show all records
2. show     Show a record details
3. create   Create new record
4. save     Save created record
5. edit     Edit a record
6. update   Save edit changes
7. destroy  Delete a record

HTTP methods:
* fully browser-supported:
  - GET
  - POST
* partially-supported:
  - PUT
  - PATCH
  - DELETE
* additional:
  - HEAD
  - OPTIONS
  - TRACE
  - CONNECT


## HTTP verbs

**Resource** is any single thing that can be identified and addressed on the Internet. For example, a resource may be a forum, but also a post (maybe even in that same forum). The trouble is, there are no well-established terms that qualify collection-item relation between related resources. Maybe we'd use *collection-resource* and *item-resource* to disambiguate the referenced resources in the PUT method.

GET
- requests resource specified in URI
- it has no body
- readonly
- idempotent
- GET request line: `GET /favicon.png HTTP/1.1`

POST
- Requests that the server accepts enclosed, URI-less, entity as the new record/item, belonging under the resource identified by URI.
- For example, if the URI-identified resource is forum, the enclosed entity may be a new post.
- Upon creating a new resource (e.g. adding the post to the forum db), the server might return the URI under which that resource is available
- So, in the end there are two URIs: one URI that identifies a collection-like resource (e.g. `/forum`) and the newly created URI that identifies the item-like resource (e.g. `/forum/42`)

PUT
- requests that the enclosed entity be stored under the supplied URI (e.g. `/forum/33`) under the supplied collection-like URI resource (e.g. `/forum`) 
- If the resource identified by the URI (`/forum/33`) already exists, it is replaced by the enclosed entity. Otherwise, the server should create a new record (item-like resource) with that exact URI (`/forum/33`)
- similar to POST, but the child URI is predetermined which might end up as resource replacement instead of resource creation.
- the request message body must contain the entire resource (unlike PATCH)




## Laravel routes

GET `/users`
- displays all records (resources)
- clicking a record in that list would trigger the

GET `/users/{id}`
- route that would display details for that record

GET `/users/new`
- GET it also used to display a form for creating new (`create`) record



POST `/users`
- that form would post the data to the main route but using the POST verb, which would trigger creation of a new record (and not display of all records).


- GET it also used to display a form for creating new (`create`) or updating an existing record (`edit`).


`POST` is used to post a new record creation form to the `create` action/route.

The form to create a new resource has a `POST` verb targeting the `save` action (route), while the form to edit a resource targets the `update` action also using a `POST` verb.



`POST`

Only the GET and POST have the full browser support. We have use also for the next 3 verbs but they lack full support accross browser. That is why we must "fake" them in forms using the appropriate `@method('VERB')` workaround.

index
- index method is straightforward, it always uses a GET verb to display all records, perhaps in a paginated fashion.

Display a form, with action=POST, for creating a new record
