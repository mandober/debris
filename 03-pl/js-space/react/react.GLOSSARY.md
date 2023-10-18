# React :: Glossary

## Client-Side Rendering
https://nextjs.org/docs/pages/building-your-application/rendering/client-side-rendering

Client-Side Rendering (CSR) is a rendering technique where the entire process of rendering happens on the client. In practice, this means that for a fully client-side rendered app, the user first sees a blank page whilst the rendering work is being done. This is contrasted with SSR, where the apps is pre-rendered, allowing the user to see something - the constructed HTML which is static, at least until the hydration finishes.

## Code bundling
The process in compilation or building phase where all kinds of dependencies (libraries, CSS, images, fonts, and other assets) are resolved and fetched, and then assembled (bundled) with the code that uses them.

## Code splitting
A web app is written in many separate files, in a modular manner, to aid reuse and author's sense of organization, but this may not be the most optimal organization, which is where a code splitter comes in and slices things up.

## Compilation
Compilation, regarding web apps, usually refers to the translation of JSX/TSX code, or of the TypeScript code alone, into the standard JS. That is, it doesn't normally refer to the traditional compilation, like the JIT compilation of JS code into machine code, but refers to this, lighter, variant, although some concepts from traditional compilation theory are employed. Babel.js can be used for transpiling JSX into regular JS, and TS has its own compiler, `tsc`, for compiling TS into regular JS. The web app compilation process is often further burdoned with additional tasks such as minification, code and assets bundling, code splitting, tree shaking, linting, etc., although these tasks may also be a part of the building process (like the compilation process itself).

## Express
Express.js is a low-level Node framework for building servers and server apps.

## Gatsby
Gatsby is a React-based JS static site generator with support for server-side rendering (SSR) and deferred static content.

## Hydration
https://react.dev/reference/react-dom/hydrate
https://react.dev/reference/react-dom/client/hydrateRoot

## Incremental Static Regeneration (ISR)
https://nextjs.org/docs/pages/building-your-application/rendering/incremental-static-regeneration

## MERN Stack
Full stack apps built with Mongo + Express + React + Node.

## Minification
Minification of JS files is still practiced today in order to further minimize the size of the deployed code and thus contribute to faster downloading. Minification should only squeeze varying kinds of whitespace and remove comments, and a related process called *uglification* goes a step further by renaming identifiers (*mengling identifiers*) to have shorter, often single-letter, names, possibly also refactoring function expressions into arrow functions and using the comma operator to convert statements into expressions, and other kinds of questionable stuff that could potentially reduce file sizes.

## Mongo
MongoDB is a Node-based NoSQL database.

## Next.js
Next.js is a React-based framework (sometimes called metaframework, being build onto another framework that is React) that provides the parts that React is missing when building web apps, such as routing, server-side rendering, and shit.

## Pre-rendering
Server-Side Rendering and Static Site Generation are also referred to as pre-rendering because the fetching of external data and transformation of React components into HTML happens before the result is sent to the client.

## React
React.js is a reactive JS framework for building UIs.

## Rendering
Rendering is the process of converting the code written in React into its HTML representation. This is not the same as compilation (wrt web apps), which is absolutely necessary in order to turn JSX code into standard JS. Compilation may be skipped if the React app doesn't use JSX (fat chance), but rendering always happens.

Rendering can happen ahead of time at build time, or on every request at runtime. Rendering can take place on the server, called server-side rendering (SSR) or on the client, called client-side rendering (CSR), with the other kinds of (hybrid) rendering in between these two extremes.

- Server-Side Rendering (SSR)
- Static Site Generation (SSG)
- Client-Side Rendering (CSR)
- Hybrid Rendering

In a standard React app, the browser is served a bare HTML shell (minimal HTML page) along with instructions on how to construct the UI. This is called client-side rendering because the initial rendering work happens on the user's device. A HTML shell is a page with a div element designated to host the app, and a single script that then bootstraps the app; and sometimes not even this, but the whole page gets built by JS - it starts on the server and continues on the client. In such setups, when server renders the HTML structure, it is necessary to attach event listeners and such, in general connecting the page with JS controlled logic - and this step is called *hydration*.

## Tree shaking
Tree shaking is the process, usually a part of the compilation or build phase, where the unused code (functions, classes, etc.) is excluded from the final code bundle. Of course, author of the web app won't write (much of) code they are not planning on using, so tree shaking is mostly related to the "thinning" of the third-party libraries the app depends on.

## Server-Side Rendering

https://nextjs.org/docs/pages/building-your-application/rendering/server-side-rendering

Server-Side Rendering (SSR) is a rendering technique where the server pre-renders the app, sending at least the basic HTML structure to the client.

With server-side rendering, the HTML of the page is generated on a server for each request. The generated HTML, JSON data, and JS that makes the page interactive are then sent to the client. On the client, the delivered HTML maintains illusion of responsiveness, even though it is non-interactive (at least not until until the hydration is completed), while React uses the JSON data and JS to breathe interactivity into components (e.g. attaching event handlers) in the process called *hydration*.

## Server-side components
React 18 and Next 12 have introduced an alpha version of *React Server Components*. These components are completely rendered on the server and do not require client-side JS in order to render. In addition, server components allow developers to keep some logic on the server and only send the results to the client. This reduces the bundle size sent to the client and improves client-side rendering performance.

## Static Site Generation

https://nextjs.org/docs/pages/building-your-application/rendering/static-site-generation

With Static Site Generation (SSG), the HTML is generated on the server, but unlike Server-Side Rendering (SSR), there is no server at runtime. Instead, content is generated once, at build time, when the application is deployed, and the HTML is hosted somewhere (like CDN) and re-used for each request. Using *Incremental Static Regeneration* (IRS), we can add new (static) pages or update existing ones after the built is done, meaning we don't have to rebuild the entire site if the data changes. When this techniques includes some additiona functionality it is called *serverless* I guess.

## HTTP Streaming
https://nextjs.org/docs/app/building-your-application/routing/loading-ui-and-streaming#what-is-streaming

Streaming allows breaking down the page's HTML into smaller chunks and progressively sending those chunks to the client. This enables parts of the page to be displayed sooner, without waiting for all the data to load before any UI can be rendered.

## Server-Centric Routing with Client-side Navigation


## Partial Rendering

## Cold and Hot Boots
https://vercel.com/docs/infrastructure/compute#cold-and-hot-boots
