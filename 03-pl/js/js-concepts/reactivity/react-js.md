# JS :: Guides :: Reactivity :: React.js

`React.js` is split into two packages (for in browser usage): `react` and `react-dom`. The `react` package is a general way to describe components and elements. The `react-dom` package takes care of rendering these generic elements. Because of this design, `react-dom` includes code for every possible component/HTMLElement that can be rendered. It also includes code for incremental rendering, scheduling, event handling, etc. This has an overhead on the initial page load for downloading and evaluating the library.

However, there are apps which do not need all these features (at initial page load). For such apps it make sense to use native DOM operations to build the interactive UI. A prominent example is *Netflix* which removed client-side React.js components from its landing page and rebuilt interactivity using the native DOM code. Although it is achievable, writing React.js components is far simpler than translating them into the native DOM calls.

What if we could transpile *React.js* components to native DOM operations at build-time? This would eliminate the need for the react library at the cost of a somewhat larger component code. The *Svelte* framework has proven that this type of framework-eliminating transpilation can work very well. [Rawact](https://github.com/sokra/rawact) is a proof-of-concept *Babel* plugin that performs this transformation.

React concepts
- compiling React components as native Web Components
- state
- hidration: moving state around to the components that need it
- JSX/TSX markup
- rendering
- React hooks
