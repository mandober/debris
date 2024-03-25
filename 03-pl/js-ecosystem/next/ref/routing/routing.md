# JS :: Frameworks :: NextJS :: Routing

https://nextjs.org/docs/app/building-your-application/routing

Routing can be visualized similar to a FS tree.

Next.js uses file-system routing, which means the routes in your app are determined by how you structure your files.


## File-based routing in NextJS

>*URL Segment* is the part of the URL path delimited by slashes.

>*URL Path* is the part of the URL that comes after the domain (composed of segments).


In Next.js, a *page is a React Component* exported from a file in the `pages` directory.

>Pages are associated with a route based on their file name.

For example, in development:
- `pages/index.js` is associated with the route `/`
- `pages/posts/first-post.js` is associated with the route `/posts/first-post`

By creating a JS/TS file under the `pages` directory, the path to the file becomes the URL path.

>However, even though route structure is defined through folders, a route is not publicly accessible until a `page.js` or `route.js` file is added to a route segment.

>And, even when a route is made publicly accessible, only the content returned by `page.js` or `route.js` is sent to the client.

This means that project files can be safely colocated inside route segments in the app directory without accidentally being routable.

>This is different from the *pages directory*, where any file in `pages` is considered a route.

While you can colocate your project files in the `app` dit you don't have to; if you prefer, you can keep them outside the `app` directory.



https://nextjs.org/docs/app/building-your-application/routing
https://nextjs.org/docs/app/building-your-application/routing/colocation
https://nextjs.org/docs/pages/building-your-application/routing/pages-and-layouts

https://nextjs.org/docs/app/building-your-application/configuring/src-directory
