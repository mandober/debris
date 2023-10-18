# Pages and Layouts

https://nextjs.org/docs/app/building-your-application/routing/pages-and-layouts

## TOC

- Intro
- Pages
- Layouts
  - Root Layout (Required)
  - Nesting Layouts
- Templates
- Modifying <head>


## Intro

App Router inside Next.js 13 introduced new file conventions to easily create
- pages
- (sharted) layouts
- templates
- error pages
- loading... pages

## Pages

>A page is UI that is unique to a route.

You can define pages by exporting a component from a `page.js` file.

Use *nested folders* to define a nested route and a `page.js` file placed in the leaf folder to make that route publicly accessible.

- page is always the leaf of the route subtree
- page.js file is required to make a route segment publicly accessible
- pages are *Server Components* by default but can be set to a Client Component
- pages can fetch data


## Layouts

- A layout is UI that is shared between multiple pages.
- on navigation, layouts preserve state, remain interactive, do not rerender.
- layouts may also be nested.

- Define a layout by default exporting a component from `layout.js`. The component should accept `children` prop that is populated with a child layout (if it exists), or a child page during rendering.

- root layout is the top-most layout, `src/app/layout.js`.
- root layout is shared across all pages in an app.
- `RootLayout` component must return <html> and <body> tags.

- Any route segment can optionally define its own layout.
- these layouts will be shared across all pages in that segment.
- layouts in a route are nested by default.
- each parent layout wraps child layouts below it using the `children` prop.

- *Route groups* opt specific route segments in and out of shared layouts.

- Layouts are Server Components by default.
- layouts may be changed to be Client Components instead.

- Layouts can fetch data.
- Passing data between a parent layout and its children is not possible.
- instead, fetch the same data and it will be efficiently deduped.
- layouts do not have access to the current route segment(s).
- To access route segments, use `useSelectedLayoutSegment` or `useSelectedLayoutSegments` in a Client Component.

- `layout.js` and `page.js` can be colocated; layout will wrap the page.

### Root Layout

The **root layout** is defined at the top level of the app directory and applies to all routes. This layout enables you to modify the initial HTML returned from the server.

- `app` directory must include a root layout.
- root layout must define <html> and <body> tags 
  since Next.js does not automatically create them.
- use the built-in SEO support to manage <head> HTML elements, 
  for example, the <title> element.
- You can use route groups to create multiple root layouts. See an example here.
- The root layout is a Server Component by default 
  and can not be set to a Client Component.

### Nesting Layouts

Layouts defined inside a folder (e.g. app/dashboard/layout.js) apply to specific route segments (e.g. acme.com/dashboard) and render when those segments are active. 

By default, layouts in the file hierarchy are nested, which means they wrap child layouts via their `children` prop.

Only the root layout can contain <html> and <body> tags.

You can use Route Groups to opt specific route segments in and out of shared layouts.

## Templates

Templates are similar to layouts in that they wrap each child layout or page.

Unlike layouts that persist across routes and maintain state, templates create a new instance for each of their children on navigation. This means that when a user navigates between routes that share a template, a new instance of the component is mounted, DOM elements are recreated, state is not preserved, and effects are re-synchronized.

There may be cases where you need those specific behaviors, and templates would be a more suitable option than layouts. For example:
- Enter/exit animations using CSS or animation libraries.
- Features that rely on useEffect (e.g logging page views) and useState (e.g a per-page feedback form).
- To change the default framework behavior. For example, Suspense Boundaries inside layouts only show the fallback the first time the Layout is loaded and not when switching pages. For templates, the fallback is shown on each navigation.

A template can be defined by exporting a default React component from a template.js file. The component should accept a children prop which will be nested segments.
