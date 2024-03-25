# JS :: Frameworks :: NextJS :: Routing

- 1. [Defining routes](./1-defining-routes.md)
  - Creating Routes
  - Creating UI
- 2. [Pages and Layouts](./2-pages-and-layouts.md)
  - Pages
  - Layouts
    - Root Layout (Required)
    - Nesting Layouts
  - Templates
  - Modifying <head>
- 3. [Linking and Navigating](./3-linking-and-navigating.md)
  - <Link> Component
    - Examples
    - Linking to Dynamic Segments
    - Checking Active Links
    - Scrolling to an id
  - useRouter() Hook
  - How Routing and Navigation Works
    - 1. Prefetching
    - 2. Caching
      - 3. Partial Rendering
      - 4. Soft Navigation
      - 5. Back and Forward Navigation
- 4. [Route groups](./4-route-groups.md)
- 5. [Dynamic routes](./5-dynamic-routes.md)
- 6. [Loading UI and streaming](./6-loading-ui-and-streaming.md)
- 7. [Error handling](./7-error-handling.md)
- 8. [Parallel routes](./8-parallel-routes.md)
- 9. [Intercepting routes](./9-intercepting-routes.md)
- 10. [Route handlers](./10-route-handlers.md)
- 11. [Middleware](./11-middleware.md)
- 12. [Project organization](./12-project-organization.md)
- 13. [Internationalization](./13-internationalization.md)


## Routing Topics

- Defining Routes
  Create routes in Next.js
- Pages and Layouts
  Create your first page and shared layout with the App Router.
- Linking and Navigating
  Learn how navigation works in Next.js, and how to use the Link Component and `useRouter` hook.
- Route Groups
  Route Groups can be used to partition your Next.js application into different sections.
- Dynamic Routes
  Dynamic Routes can be used to programmatically generate route segments from dynamic data.
- Loading UI and Streaming
  Built on top of Suspense, Loading UI allows you to create a fallback for specific route segments, and automatically stream content as it becomes ready.
- Error Handling
  Handle runtime errors by automatically wrapping route segments and their nested children in a React Error Boundary.
- Parallel Routes
  Simultaneously render one or more pages in the same view that can be navigated independently. A pattern for highly dynamic applications.
- Intercepting Routes
  Use intercepting routes to load a new route within the current layout while masking the browser URL, useful for advanced routing patterns such as modals.
- Route Handlers
  Create custom request handlers for a given route using the Web's Request and Response APIs.
- Middleware
  Learn how to use Middleware to run code before a request is completed.
- Project Organization
  Learn how to organize your Next.js project and colocate files.
- Internationalization
  Add support for multiple languages with internationalized routing and localized content.
