# TS :: Ref :: Types :: Intersection types

https://www.typescriptlang.org/docs/handbook/unions-and-intersections.html#intersection-types

Intersection types are closely related to union types, but they are used very differently.

>An *intersection type* combines multiple types into one.

Intersections allow us to combine existing types to get a single type that has all the features of component types combined.

For example, `Person & Serializable & Loggable` is a type which is an amalgam of `Person` and `Serializable` and `Loggable`. That means an object of this type will have members of all 3 component types.

As another example, if we had networking requests with consistent error handling then we could separate out the error handling into its own type which can be then merged with each individual type that corresponds to a single response type.

```ts
interface ErrorHandling {
  success: boolean
  error?: { message: string }
}

interface WithArtworks {
  artworks: { title: string }[]
  // i.e.
  artworks: Array<{ title: string }>
}

interface WithArtists {
  artists: { name: string }[]
}

// These interfaces are composed to have consistent
// error handling, besides having their own data
type ArtworksResponse = WithArtworks & ErrorHandling
type ArtistsResponse = WithArtists & ErrorHandling

const handleArtistsResponse = (res: ArtistsResponse) => {
  if (res.error) {
    console.error(res.error.message)
    return
  }
  console.log(res.artists)
}
```
