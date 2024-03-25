# Dynamic routes

https://nextjs.org/docs/app/building-your-application/routing/dynamic-routes

When you don't know the exact segment names ahead of time and want to create routes from dynamic data, you can use *Dynamic Segments* that are filled in at request time or *prerendered* at build time.

A Dynamic Segment can be created by wrapping a folder's name in square brackets: [folderName]. For example, [id] or [slug].

*Dynamic Segments* are passed as the params `prop` to `layout`, `page`, `route`, and `generateMetadata` functions.

## Example

A blog could include the route `app/blog/[slug]/page.js` where [slug] is the Dynamic Segment for blog posts.

```ts
export default function Page({ params }: { params: { slug: string } }) {
  return <div>My Post: {params.slug}</div>
}
```

Route                   | Example URL | params
------------------------|-------------|--------------
app/blog/[slug]/page.js | /blog/a     | { slug: 'a' }
app/blog/[slug]/page.js | /blog/b     | { slug: 'b' }
app/blog/[slug]/page.js | /blog/c     | { slug: 'c' }


See the `generateStaticParams()` page to see how to generate the params for the segment.

Note: *Dynamic Segments* are equivalent to *Dynamic Routes* in the `pages` dir.

## Generating Static Params

The `generateStaticParams()` function can be used in combination with dynamic route segments to statically generate routes at build time instead of on-demand at request time.
