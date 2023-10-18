# CSS Color Level 4

* New in Chrome 111 (March 7, 2023)
https://developer.chrome.com/blog/new-in-chrome-111/#css-color-level4

With CSS color level 4, CSS now supports high definition displays, specifying colors from HD gamuts while also offering color spaces with specializations. In a nutshell it means 50% more colors to pick from.

The implementation includes the `color()` CSS function; it can be used for any color space that specifies colors with R, G, and B channels.

`color()` takes a *color space parameter* first, then a series of *channel values for RGB* and, optionally, a value for *alpha channel*.

```css
test {
  color: #861111;
  color: rgb(134 17 17);
  color: hsl(0deg 77.48% 29.61%);
  color: hwb(1.92deg 6.67% 47.66%);
  color: lch(29 58.72 36.27);
  color: oklch(0.4 0.15 27.6);
  color: lab(29 47.17 34.58);
  color: oklab(0.4 0.13 0.07);
  /*     color(colorSpace   R    G    B     alpha=optional) */
  color: color(srgb         0.52 0.08 0.07);
  color: color(srgb-linear  0.23 0.01 0.01);
  color: color(display-p3   0.47 0.14 0.12);
  color: color(a98-rgb      0.44 0.12 0.12);
  color: color(prophoto-rgb 0.31 0.15 0.09);
  color: color(rec2020      0.36 0.12 0.06);
  color: color(xyz          0.1  0.06 0.01);
  color: color(xyz-d50      0.11 0.06 0.01);
  color: color(xyz-d65      0.1  0.06 0.01);
}
```

Here are some examples of using the color function with different color spaces.

```css
.valid-css-color-function-colors {
  --srgb:         color(srgb 1 1 1);
  --srgb-linear:  color(srgb-linear 100% 100% 100% / 50%);
  --display-p3:   color(display-p3 1 1 1);
  --rec2020:      color(rec2020 0 0 0);
  --a98-rgb:      color(a98-rgb 1 1 1 / 25%);
  --prophoto:     color(prophoto-rgb 0% 0% 0%);
  --xyz:          color(xyz 1 1 1);
}
```

Checkout this article for more documentation to take full advantage of high definition colors using CSS.

## High Definition CSS Color Guide
(Feb 2, 2023)
https://developer.chrome.com/articles/high-definition-css-color-guide/

For over 25 years, `sRGB` (standard red green blue) has been the only color gamut for CSS gradients and colors, with *color space* offerings within it like `rgb()`, `hsl()` and `hex`. It is the most common color gamut capability amongst displays; a common denominator. We've grown very accustomed to specifying colors within this gamut.
