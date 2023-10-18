# JS :: Frameworks :: NextJS :: Rendering

https://nextjs.org/docs/app/building-your-application/rendering

Rendering
- Static and Dynamic
  - Static Rendering (Default)
  - Dynamic Rendering
    - Dynamic Functions
- Client and Server Components
- Edge and Node.js Runtimes
  - Runtime Differences
    - Edge Runtime
    - Node.js Runtime
    - Serverless Node.js
  - Examples
    - Segment Runtime Option

## Background

Rendering converts the code you write into user interfaces. This section deals with the differences between rendering environments, Client and Server Component rendering, static and dynamic rendering, and runtimes.

There are two environments where web apps can be rendered:
- client
- server

The **client** refers to the browser on a user's device that sends a request to a server for your application code. It then turns the response from the server into an interface the user can interact with.

The **server** refers to the computer in a data center that stores your application code, receives requests from a client, does some computation, and sends back an appropriate response.

Before React 18, the primary way to render your application was entirely on the client. Next.js provided an easier way to break down your application into pages and render on the server.

Now, with Server and Client Components, React renders on the client and the server, meaning you can choose where to render your application code, per component.

By default, the App Router uses Server Components to improve performance, and you can opt into using Client Components when needed.


Rendering
- Static and Dynamic
  about static and dynamic rendering in Next.js
- Client and Server Components
  how Server and Client Components are rendered in Next.js
- Edge and Node.js Runtimes
  switchable runtimes (Edge and Node.js) in Next.js
