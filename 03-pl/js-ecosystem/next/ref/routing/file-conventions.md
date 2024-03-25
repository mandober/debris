# File Conventions

Next.js provides a set of *special files* to create UI with specific behavior in nested routes:
- `layout`      : Shared UI for a segment and its children
- `page`        : Unique UI of a route and make routes publicly accessible
- `loading`     : Loading UI for a segment and its children
- `not-found`   : Not found UI for a segment and its children
- `error`       : Error UI for a segment and its children
- `global-error`: Global Error UI
- `route`       : Server-side API endpoint
- `template`    : Specialized re-rendered Layout UI
- `default`     : Fallback UI for Parallel Routes

Note: *special files* are files with js, jsx, tsx extension.

## Component Hierarchy

The React components defined in special files of a route segment are rendered in a specific hierarchy:
- `layout.js`
- `template.js`
- `error.js`      (React error boundary)
- `loading.js`    (React suspense boundary)
- `not-found.js`  (React error boundary)
- `page.js` or nested `layout.js`

In a *nested route*, the *segment components* are nested inside the components of its *parent segment*.
