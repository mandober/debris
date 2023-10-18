# JS :: Frameworks :: NextJS

## How Next.js works

https://nextjs.org/learn/foundations/how-nextjs-works

React is used to build UIs and it is relatively unopinionated about how to build and structure an apps.

Next.js is built on top of React, so it is what is called a meta-framework. It provides a way to structure apps and fills i n the missing features like routing. It also makes optimizations that help make both the development process and final app faster.

Concepts
- Development vs production environment
- Build-time vs runtime
- Client-side vs server-side rendering

## Development vs production environment

Next.js provides features for both dev and production stages:

* In the development stage, Next.js optimizes for the developer experience (DX) of building an app. It comes with features that improve DX such the TypeScript and ESLint integration, Fast Refresh, and more.

* In the production stage, Next.js optimizes for user experience (UX). It transforms the code to make it performant and accessible.

Things concerning the development process:
- compilation
- minification
- code bundling
- code splitting
- tree shaking

Next.js handles much of these code transformations and underlying infrastructure thanks to the compiler written in Rust, and *SWC* (also written in Rust), a platform that takes care of compilation, minification, bundling, and more.

### Compiling

Code written in TS and/or code using JSX/TSX must be compiled to the standard JS for browsers to understand it.

Compiling refers to the process of taking code in one language and outputting it in another language or another version of that language.

In Next.js, compilation happens during the development stage as you edit your code, and as part of the build step to prepare your app for production.

### Minification

Developers write code that is optimized for human readability. This code might contain extra information that is not necessary for the code to run, such as comments, spaces, indents, and multiple lines.

Minification is the process of removing unnecessary code formatting and comments without changing the code's functionality. The goal is to improve the app's performance by decreasing file sizes.

In Next.js, JavaScript and CSS files are automatically minified for production.

### Bundling

Developers break up their app into modules, components, and functions that can be used to build larger pieces of their app. Exporting and importing these internal modules, as well as external third-party packages, creates a complex web of file dependencies.

Bundling is the process of resolving the web of dependencies and merging (or 'packaging') the files (or modules) into optimized bundles for the browser, with the goal of reducing the number of requests for files when a user visits a web page.

### Code Splitting

Developers usually split their app into multiple pages that can be accessed from different URLs. Each of these pages becomes a unique entry point into the app.

Code-splitting is the process of splitting the app's bundle into smaller chunks required by each entry point. The goal is to improve the app's initial load time by only loading the code required to run that page.

Next.js has built-in support for code splitting. Each file inside your 'pages' dir will be automatically code split into its own JS bundle during the build.

Further:
- any code shared between pages is also split into another bundle to avoid re-downloading the same code on further navigation.
- after the initial page load, Next.js can start pre-loading the code of other pages users are likely to navigate to.
- *dynamic imports* are another way to manually split what code is initially loaded.

## Build-time vs runtime

*Build time* (or *build phase*) names a series of steps that prepare code for production.

At build-time, Next.js transforms the code into production-optimized files ready to be deployed.

These files include:
- HTML files for statically generated pages
- JS code for rendering pages on the server
- JS code for making pages interactive on the client
- CSS files

*Runtime* (or *request time*) refers to the period when the app runs in response to a user's request, after it has been built and deployed to production.

## Client-side vs server-side rendering

*Client* refers to the browser on a user's device that sends a request to a server for an app. It then turns the response it receives from the server into an interface the user can interact with.

*Server* refers to the computers in a data center that store the app, receives requests from a client, does some computation, and sends back an appropriate response.

### Rendering

There is an unavoidable unit of work to convert the code you write in React into the HTML representation of your UI. This process is called rendering.

Rendering can take place on the server or on the client. It can happen either ahead of time at build time, or on every request at runtime.

With Next.js, three types of rendering methods are available: Server-Side Rendering, Static Site Generation, and Client-Side Rendering.

#### Pre-Rendering

*Server-Side Rendering* and *Static Site Generation* are also referred to as Pre-Rendering because the fetching of external data and transformation of React components into HTML happens before the result is sent to the client.

#### Client-Side Rendering vs Pre-rendering

In a standard React app, the browser receives an empty HTML shell from the server along with the JavaScript instructions to construct the UI. This is called client-side rendering because the initial rendering work happens on the user's device.

Note: You can opt to use client-side rendering for specific components in your Next.js app by choosing to fetch data with React's `useEffect()` or a data fetching hook such as `useSWR`.

In contrast, Next.js pre-renders every page by default. *Pre-rendering* means the HTML is generated in advance, on a server, instead of having it all done by JavaScript on the user's device.

In practice, this means that for a fully client-side rendered app, the user will see a blank page while the rendering work is being done; compared to a pre-rendered app, where the user will see the constructed HTML.

#### Server-Side Rendering

With server-side rendering, the HTML of the page is generated on a server for each request. The generated HTML, JSON data, and JavaScript instructions to make the page interactive are then sent to the client.

On the client, the HTML is used to show a fast non-interactive page, while React uses the JSON data and JavaScript instructions to make components interactive (for example, attaching event handlers to a button). This process is called hydration.

In Next.js, you can opt to server-side render pages by using getServerSideProps.

Note: React 18 and Next 12 introduce an alpha version of React server components. Server components are completely rendered on the server and do not require client-side JavaScript to render. In addition, server components allow developers to keep some logic on the server and only send the result of that logic to the client. This reduces the bundle size sent to the client and improves client-side rendering performance. Learn more about React server components here.

#### Static Site Generation

With Static Site Generation, the HTML is generated on the server, but unlike server-side rendering, there is no server at runtime. Instead, content is generated once, at build time, when the app is deployed, and the HTML is stored in a CDN and re-used for each request.

In Next.js, you can opt to statically generate pages by using getStaticProps.

Note: You can use Incremental Static Regeneration to create or update static pages after you've built your site. This means you do not have to rebuild your entire site if your data changes.

The beauty of Next.js is that you can choose the most appropriate rendering method for your use case on a page-by-page basis, whether that's Static Site Generation, Server-side Rendering, or Client-Side Rendering. To learn more about which rendering method is right for your specific use case, see the data fetching docs.

In the next section, we'll discuss where your code can be stored or run after it's deployed.



## Network deployment

Network deployement targets include
- origin servers
- Content Delivery Networks (CDNs)
- the Edge

### Origin Server

An **origin server** is a network computer that hosts the original instance of a webapp. The term "origin" distinguishes this server from the other servers the webapp may be distributed to, such as CDNs, Edge servers, proxy servers.

Since CDNs often serve only static content, the origin server hosting a dynamic webapp usually has to perform some operations, possibly genereting pages on the fly, before the result of this work can be distributed to a CDN.

### Content Delivery Network

A CDN stores and serves only static content (HTML, CSS, images, etc.), in multiple locations around the world, placed between the client and the origin server.

When a request comes in, a CDN server closest to the user responds with the cached result, which not only reduces the load on the origin server (since the computation doesn't have to happen on each request), but contributes to a more pleasent UX resulting from the fast content delivery.

CDNs are thus well suited to store the static content resulting from the NextJS' pre-rendering of the content on the origin server.

### The Edge

The Edge is a generalized concept for the fringe (edge) of the network, that is closest to the user. Similar to CDNs, Edge servers are distributed to multiple locations around the world.

Servers within a CDN could also be considered a part of "the Edge" because they store (static) content at the edges of a network. However, unlike CDN servers, an Edge server can also run small snippets of code. This means some tasks, (e.g. caching and code execution) traditionally executed at the origin server or the client, can be moved to the Edge server closest to the client.

By moving some of these tasks to the Edge, webapps become more performant due to the reduced amount of code sent to the client. Also, latency is reduced since the request doesn't have to go all the way back to the origin server.

In Next.js, you can run code at the Edge with *Middleware* or with *React Server Components*.


* Edge Network
https://vercel.com/docs/concepts/edge-network/overview
