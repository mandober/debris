# Defining Routes

https://nextjs.org/docs/app/building-your-application/routing/defining-routes

Defining Routes
- Creating Routes
- Creating UI


## Creating Routes

- Next.js uses a FS-based router where folders are used to define routes
- Each folder represents a *route segment* that maps to a *URL segment*
- To create a nested route, you can nest folders
- A special `page.js` file is used to make route segments publicly accessible
- special file conventions are used to create UI for each route segment
- `pages` are used to show UI unique to a route
- `layouts` are used to show UI shared across multiple routes


## Creating UI

Special file conventions are used to create UI for each route segment. The most common are pages to show UI unique to a route, and layouts to show UI that is shared across multiple routes.

For example, to create your first page, add a page.js file inside the app directory and export a React component:

```ts
export default function Page() {
  return <h1>Hello, Next.js!</h1>
}
```
