# Middleware

https://nextjs.org/docs/app/building-your-application/routing/middleware

Middleware allows you to run code before a request is completed. Then, based on the incoming request, you can modify the response by rewriting, redirecting, modifying the request or response headers, or responding directly.

Middleware runs before cached content and routes are matched. See Matching Paths for more details: https://nextjs.org/docs/app/building-your-application/routing/middleware#matching-paths

Use the file `middleware.ts` in the root of the project to define Middleware; e.g. at the same level as `pages` or `app` (or inside `src` if applicable).

>Middleware runs in the Edge runtime.


## Matching Paths

>Middleware will be invoked for every route - on every page request!

This is the execution order:
- headers from `next.config.js`
- redirects from `next.config.js`
- Middleware (rewrites, redirects, …)
- *beforeFiles* (rewrites) from `next.config.js`
- Filesystem routes: public/, _next/static/, pages/, app/, …
- *afterFiles* (rewrites) from `next.config.js`
- Dynamic Routes, `/blog/[slug]`
- fallback (rewrites) from `next.config.js`


There are two ways to define which paths Middleware runs on
- Custom matcher config
- Conditional statements

### Custom matcher config

`matcher` allows you to filter Middleware to run on specific paths.

```ts
// in middleware.ts
export const config = {
  matcher: '/about/:path*',
}

// match a single path or multiple paths with an array syntax:
export const config = {
  matcher: ['/about/:path*', '/dashboard/:path*'],
}
```

The `matcher` config allows full regex, so matching like negative lookaheads or character matching is supported. An example of a negative lookahead to match all except specific paths can be seen here:

```ts
export const config = {
  matcher: [
    /*
     * Match all request paths except for the ones starting with:
     * - api (API routes)
     * - _next/static (static files)
     * - _next/image (image optimization files)
     * - favicon.ico (favicon file)
     */
    '/((?!api|_next/static|_next/image|favicon.ico).*)',
  ],
}
```

The `matcher` values **need to be constants** so they can be statically analyzed at build-time. Dynamic values such as variables will be ignored.

Configured matchers:
- MUST start with `/`
- can include named parameters:
  `/about/:path` matches `/about/a` and `/about/b` but not `/about/a/c`
- can have modifiers on named parameters (starting with `:`):
  `/about/:path*` matches `/about/a/b/c` 
- can use regular expression enclosed in parenthesis:
  `/about/(.*)` is the same as `/about/:path*`


Note: For backward compatibility, Next.js always considers `/public` as `/public/index`. Therefore, a matcher of `/public/:path` will match.


### Conditional statements

```ts
import { NextResponse } from 'next/server'
import type { NextRequest } from 'next/server'


export function middleware(request: NextRequest) {
  if (request.nextUrl.pathname.startsWith('/about')) {
    return NextResponse.rewrite(new URL('/about-2', request.url))
  }

  if (request.nextUrl.pathname.startsWith('/dashboard')) {
    return NextResponse.rewrite(new URL('/dashboard/user', request.url))
  }
}
```

## NextResponse

The `NextResponse` API allows you to:
- redirect the incoming request to a different URL
- rewrite the response by displaying a given URL
- set request headers for API Routes, `getServerSideProps`, rewrite destinations
- set response cookies
- set response headers

To produce a response from Middleware, you can:
- rewrite to a route (Page or Route Handler) that produces a response
- return a NextResponse directly
