# SVG

https://en.wikipedia.org/wiki/SVG

Scalable Vector Graphics (SVG) is an XML-based vector image format for defining two-dimensional graphics, having support for interactivity and animation. The SVG specification is an open standard developed by the World Wide Web Consortium since 1999.

SVG images are defined in a vector graphics format and stored in XML text files. SVG images can thus be scaled in size without loss of quality, and SVG files can be searched, indexed, scripted, and compressed. The XML text files can be created and edited with text editors or vector graphics editors, and are rendered by the most-used web browsers.

Early adoption was limited due to lack of support in older versions of Internet Explorer. However, as of 2011, all major desktop browsers began to support SVG. Native browser support offers various advantages, such as not requiring plugins, allowing SVG to be mixed with other content, and improving rendering and scripting reliability. Mobile support for SVG exists in various forms, with different devices and browsers supporting SVG Tiny 1.1 or 1.2. SVG can be produced using vector graphics editors and rendered into raster formats. In web-based applications, Inline SVG allows embedding SVG content within HTML documents.

Despite its benefits, SVG can pose security risks if used for images, as it can host scripts or CSS, potentially leading to cross-site scripting attacks or other vulnerabilities.

## Contents
- 1. History
  - 1.1. Version 1.x
  - 1.2. Version 2
- 2. Features
  - 2.1. Printing
  - 2.2. Scripting and animation
  - 2.3. Mobile profiles
  - 2.4. Compression
- 3. Design
- 4. Implementation
  - 4.1. Web browsers
  - 4.2. Mobile devices
  - 4.3. Authoring
- 5. Security
- 6. Related work
- 7. See also




## 3. Design

The SVG 1.1 specification defines 14 functional areas or feature sets ^[1]:

[1]: Scalable Vector Graphics (SVG) 1.1 Specification, World Wide Web Consortium http://www.w3.org/TR/SVG11/ Retrieved 14 April 2016

Paths
Simple or compound shape outlines are drawn with curved or straight lines that can be filled in, outlined, or used as a clipping path. Paths have a compact coding.
For example, M (for "move to") precedes initial numeric x and y coordinates, and L (for "line to") precedes a point to which a line should be drawn. Further command letters (C, S, Q, T, and A) precede data that is used to draw various Bézier and elliptical curves. Z is used to close a path.
In all cases, absolute coordinates follow capital letter commands and relative coordinates are used after the equivalent lower-case letters.[35]
Basic shapes
Straight-line paths and paths made up of a series of connected straight-line segments (polylines), as well as closed polygons, circles, and ellipses can be drawn. Rectangles and round-cornered rectangles are also standard elements.[36]
Text
Unicode character text included in an SVG file is expressed as XML character data. Many visual effects are possible, and the SVG specification automatically handles bidirectional text (for composing a combination of English and Arabic text, for example), vertical text (as Chinese or Japanese may be written) and characters along a curved path (such as the text around the edge of the Great Seal of the United States).[37]
Painting
SVG shapes can be filled and outlined (painted with a color, a gradient, or a pattern). Fills may be opaque, or have any degree of transparency.
"Markers" are line-end features, such as arrowheads, or symbols that can appear at the vertices of a polygon.[38]
Color
Colors can be applied to all visible SVG elements, either directly or via fill, stroke, and other properties. Colors are specified in the same way as in CSS2, i.e. using names like black or blue, in hexadecimal such as #2f0 or #22ff00, in decimal like rgb(255,255,127), or as percentages of the form rgb(100%,100%,50%).[39]
Gradients and patterns
SVG shapes can be filled or outlined with solid colors as above, or with color gradients or with repeating patterns. Color gradients can be linear or radial (circular), and can involve any number of colors as well as repeats. Opacity gradients can also be specified. Patterns are based on predefined raster or vector graphic objects, which can be repeated in x and y directions. Gradients and patterns can be animated and scripted.[40]
Since 2008, there has been discussion[41][42] among professional users of SVG that either gradient meshes or preferably diffusion curves could usefully be added to the SVG specification. It is said that a "simple representation [using diffusion curves] is capable of representing even very subtle shading effects"[43] and that "Diffusion curve images are comparable both in quality and coding efficiency with gradient meshes, but are simpler to create (according to several artists who have used both tools), and can be captured from bitmaps fully automatically."[44] The current draft of SVG 2 includes gradient meshes.[45]
Clipping, masking and compositing
Graphic elements, including text, paths, basic shapes and combinations of these, can be used as outlines to define both inside and outside regions that can be painted (with colors, gradients and patterns) independently. Fully opaque clipping paths and semi-transparent masks are composited together to calculate the color and opacity of every pixel of the final image, using alpha blending.[46]
Filter effects[47]
Main article: SVG filter effects
A filter effect consists of a series of graphics operations that are applied to a given source vector graphic to produce a modified bitmapped result.
Interactivity
SVG images can interact with users in many ways. In addition to hyperlinks as mentioned below, any part of an SVG image can be made receptive to user interface events such as changes in focus, mouse clicks, scrolling or zooming the image and other pointer, keyboard and document events. Event handlers may start, stop or alter animations as well as trigger scripts in response to such events.[48]
Linking
SVG images can contain hyperlinks to other documents, using XLink. Through the use of the <view> element or a fragment identifier, URLs can link to SVG files that change the visible area of the document. This allows for creating specific view states that are used to zoom in/out of a specific area or to limit the view to a specific element. This is helpful when creating sprites. XLink support in combination with the <use> element also allow linking to and re-using internal and external elements. This allows coders to do more with less markup and makes for cleaner code.[49]
Scripting
All aspects of an SVG document can be accessed and manipulated using scripts in a similar way to HTML. The default scripting language is JavaScript and there are defined Document Object Model (DOM) objects for every SVG element and attribute. Scripts are enclosed in <script> elements. They can run in response to pointer events, keyboard events and document events as required.[50]
Animation
Main article: SVG animation
SVG content can be animated using the built-in animation elements such as <animate>, <animateMotion> and <animateColor>. Content can be animated by manipulating the DOM using ECMAScript and the scripting language's built-in timers. SVG animation has been designed to be compatible with current and future versions of Synchronized Multimedia Integration Language (SMIL). Animations can be continuous, they can loop and repeat, and they can respond to user events, as mentioned above.[51]
Fonts
As with HTML and CSS, text in SVG may reference external font files, such as system fonts. If the required font files do not exist on the machine where the SVG file is rendered, the text may not appear as intended. To overcome this limitation, text can be displayed in an SVG font, where the required glyphs are defined in SVG as a font that is then referenced from the <text> element.[52]
Metadata
In accord with the W3C's Semantic Web initiative, SVG allows authors to provide metadata about SVG content. The main facility is the <metadata> element, where the document can be described using Dublin Core metadata properties (e.g. title, creator/author, subject, description, etc.). Other metadata schemas may also be used. In addition, SVG defines <title> and <desc> elements where authors may also provide plain-text descriptive material within an SVG image to help indexing, searching and retrieval by a number of means.[53]



An SVG document can define components including shapes, gradients etc., and use them repeatedly. SVG images can also contain raster graphics, such as PNG and JPEG images, and further SVG images.

This code will produce the colored shapes shown in the image, excluding the grid and labels:

```xml
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg width="391" height="391" viewBox="-70.5 -70.5 391 391" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<rect fill="#fff" stroke="#000" x="-70" y="-70" width="390" height="390"/>
<g opacity="0.8">
  <rect x="25" y="25" width="200" height="200" fill="lime" stroke-width="4" stroke="pink" />
  <circle cx="125" cy="125" r="75" fill="orange" />
  <polyline points="50,150 50,200 200,200 200,100" stroke="red" stroke-width="4" fill="none" />
  <line x1="50" y1="50" x2="200" y2="200" stroke="blue" stroke-width="4" />
</g>
</svg>
```
