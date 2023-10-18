# Web :: Glossary

## CDN
A Content Delivery Network (CDN) stores and serves only static content (HTML, CSS, images, etc.), in multiple locations around the world, placed between the client and the origin server. When a request comes in, a CDN server closest to the user responds with the cached result, which not only reduces the load on the origin server (since the computation doesn't have to happen on each request), but contributes to a more pleasent UX resulting from the fast content delivery. CDNs are well suited to store the static content resulting from *pre-rendering* the content on the origin server.

## Google Chrome
is a cross-platform web browser developed by Google and first released in 2008. It has upped the ante in JS processing speed by introducing JIT compiler and shit, which soon other players followed, resulting in improved overall web experience. Chrome browser is also the main component of *Chrome OS* or is it *Chromium*, where it serves as the platform for web apps.

## CORS
CORS (Cross-Origin Resource Sharing) is a system, consisting of transmitting HTTP headers, that determines whether browsers block frontend JS code from accessing responses for cross-origin requests. The same-origin security policy forbids cross-origin access to resources, i.e. without configuring the CORS headers no access is permitted by default. CORS gives web servers the ability to say they want to opt into allowing cross-origin access to their resources.

## CSP
A CSP (Content Security Policy) is used to detect and mitigate certain types of website related attacks like Cross-site scripting, click-jacking and data injections. The implementation is based on an HTTP header called `Content-Security-Policy`.

## CSRF
CSRF (Cross-Site Request Forgery) is an attack that impersonates a trusted user and sends unwanted commands to a website. This can be done, for example, by including malicious parameters in an URL behind a link that purports to go somewhere else, `<img src="https://example.com/index?action=delete&id=123">`. For users who have modification permissions on the domain example.com, the image element executes action on that domain without their noticing, even if the (image) element is not hosted at example.com. There are many ways to prevent CSRF, such as implementing RESTful API, adding verification tokens to elements (especially forms), and other techniques.

## Edge
The Edge is a generalized concept for the fringe (edge) of the network, that is closest to the user. Servers within a CDN could also be considered a part of "the Edge" because they store (static) content at the fringes of a network.

## Edge server
Unlike CDN servers, an Edge server can also run small snippets of code. This means some tasks, traditionally executed at the origin server or the client, can be moved to the Edge server closest to the client. Edge Latency: 10-50 ms.

## Import alias
Import alias wrt TypeScript, relies on the `compilerOptions.paths` property in a `tsconfig.json` file, which allows defining custom import paths where TS searches for module names. `"paths"` can contain an array of custom paths each associated with a different name that is used like an alias for the path(s). For example, you can use `@` instead of `src` to import a module within `src` directory, by defining a `paths` entry: `"@/*": ["./src/*"]`.

```json
{
  "compilerOptions": {
    "paths": {
        "@/*": ["./src/*"],
        "conf/*": ["src/app/config/*"],
    },
}
```

Now, in a `.ts` file, you can import the `src/app/config/server.ts` module using an alias, `import conf/server.ts`.

## ISR
Incremental Static Regeneration (ISR) is a rendering mode (Next.js) 

## Latency
Latency (sometimes called the *lag*) is the difference in time between the moment a request is issued to the server to the moment a response is received. The lower the latency the better the UX. An example of excellent latency timings:
- API-to-data latency: < 1 ms
- On-prem latency:    2-10 ms
- Edge latency:      10-50 ms
- Global replication:  100 ms

Leveraging HarperDB, Edison Interactive distributed their API cache across Verizon's 5G Edge, plummeting latency below 20 ms.
https://www.youtube.com/watch?v=DJTvkEYJOTs

## NAT
NAT (Network Address Translation) is a technique for letting multiple computers share an IP address. NAT assigns unique addresses to each computer on the local network and adjusts incoming/outgoing network traffic to send data to the right place.

## Native
An app is said to be "native", in relation to a particular computer architecture, if it was compiled to run on the hardware that comprises that architecture. An example of a native Android app would be a mobile app written in Java using the Android toolchain. On the other hand, a webapp that runs inside a browser is not native - it runs in a browser which sits on top of a native environment, so it doesn't run in the native environment per se.

## MERN
A tech stack consisting of MongoDB, Express, React and Node.

## Monorepo
A monorepo is a collection of many different apps and packages in a single repository (a single codebase), in order to, among other things, share the code more efficiently. The alternative setup is called a *polyrepo* where each app (codebase) has its own repo so they are published and versioned separately.

( Cloning a monorepo from an online git server requires passing the `--recursive` flag to also get all the modules, right? )

The main building block of the monorepo is the *workspace*. Each application and package you build will be in its own workspace, with its own `package.json`, and workspaces can depend on each other.

There is also a root workspace - a `package.json` in the root folder of the codebase. This is a useful place for:
- specifying dependencies present across the entire monorepo
- add tasks that operate on the whole monorepo, not just individual workspaces
- add documentation on how to use the monorepo

( from: https://turbo.build/repo/docs/handbook )

## Origin server
An origin server is a network computer that hosts the original instance of a webapp. The term "origin" distinguishes this server from the other servers the webapp may be distributed to, such as CDNs, Edge servers, proxy servers. Since CDNs often serve only static content, the origin server hosting a dynamic webapp usually has to perform some operations, possibly genereting pages on the fly, before the result of this work can be distributed to a CDN.

## V8
V8 is Chrome's (Google's Chromium project) JS engine written in C++.
