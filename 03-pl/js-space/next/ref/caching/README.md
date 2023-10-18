# JS :: Frameworks :: NextJS :: Ref :: Caching

https://nextjs.org/docs/app/building-your-application/caching

* Caching
  - Overview
  * Request Memoization
    - Duration
    - Revalidating
    - Opting out
  * Data Cache
    - Duration
    - Revalidating
      - Time-based Revalidation
      - On-demand Revalidation
    - Opting out
  * Full Route Cache
    - 1. React Rendering on the Server
    - 2. Next.js Caching on the Server (Full Route Cache)
    - 3. React Hydration and Reconciliation on the Client
    - 4. Next.js Caching on the Client (Router Cache)
    - 5. Subsequent Navigations
    - Static and Dynamic Rendering
    - Duration
    - Invalidation
    - Opting out
  * Router Cache
    - Duration
    - Invalidation
    - Opting out
  * Cache Interactions
    - Data Cache and Full Route Cache
    - Data Cache and Client-side Router cache
  * APIs
    - <Link>
    - router.prefetch
    - router.refresh
    - fetch
    - fetch options.cache
    - fetch options.next.revalidate
    - fetch options.next.tag and revalidateTag
    - revalidatePath
    - Dynamic Functions
      - cookies
    - Segment Config Options
    - generateStaticParams
    - React cache function
    - unstable_cache
