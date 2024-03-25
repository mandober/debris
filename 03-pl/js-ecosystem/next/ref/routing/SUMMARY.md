# JS :: Frameworks :: NextJS :: Routing :: Summary

- Next.js uses file-system routing; routes are determined by the file structure
- routing folder hierarchy is in the `src/app` directory
- Inside `app`, each folder represents a route if it contains page.js, that is, while folders define routes, only the contents returned by page.js (or route.js) is publicly addressable.
- `src/api` is special and used for API access.
- folder with name in parens, `(group)`, is for grouping routes.
- folder with name in bracket, `[id]`, captures the url segment that follows
- App Router is built on React Server Components
- shared layouts, nested routing, loading states, error handling
- By default, components inside `app` are *React Server Components*.
- This is a performance optimization but you can also use *Client Components*.
- place "use client" to opt-in to client rendering
- layout.js files define shared layouts
- the RootLayout is app/layout.js, contains head, body tags, optinal metadata
