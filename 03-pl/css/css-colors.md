# CSS colors

https://developer.mozilla.org/en-US/docs/Web/CSS/
https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Types
https://developer.mozilla.org/en-US/docs/Web/CSS/color_value
https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_colors/Color_picker_tool

The <color> CSS data type represents a color. A <color> may also include an alpha-channel transparency value.

Although <color> values are precisely defined, their actual appearance may vary (sometimes significantly) from device to device. This is because most devices are not calibrated, and some browsers do not support output devices' color profiles.

## Syntax

```css
:root {
  --color-mode: "light";
  --color-mode: "dark";
  
  /* Named colors */
  --named: rebeccapurple;
  --named: aliceblue;

  /* RGB Hexadecimal */
  --hex-short: #f09
  --hex: #ff0099

  /* RGB (Red, Green, Blue) */
  --rgb: rgb(255 0 153)
  --rgb: rgb(255 0 153 / 80%)

  /* HSL (Hue, Saturation, Lightness) */
  --hls: hsl(150 30% 60%)
  --hls: hsl(150 30% 60% / 0.8)

  /* HWB (Hue, Whiteness, Blackness) */
  --hwb: hwb(12 50% 0%)
  --hwb: hwb(194 0% 0% / 0.5)

  /* LAB (Lightness, A-axis, B-axis) */
  --lab: lab(50% 40 59.5)
  --lab: lab(50% 40 59.5 / 0.5)

  /* LCH (Lightness, Chroma, Hue) */
  --lch: lch(52.2% 72.2 50)
  --lch: lch(52.2% 72.2 50 / 0.5)

  /* Oklab (Lightness, A-axis, B-axis) */
  --oklab: oklab(59% 0.1 0.1)
  --oklab: oklab(59% 0.1 0.1 / 0.5)

  /* Oklch (Lightness, Chroma, Hue) */
  --oklch: oklch(60% 0.15 50)
  --oklch: oklch(60% 0.15 50 / 0.5)
}

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

## Specifying a color value

A <color> value can be specified using one of these methods:
- By keywords:
  - <named-color> (e.g blue or pink)
    https://developer.mozilla.org/en-US/docs/Web/CSS/named-color
  - <system-color>
  - currentcolor
- By hexadecimal notations: <hex-color> (e.g `#ff0000`)
- By parameters in a color space using functional notations
- sRGB color space: hsl(), hwb(), rgb()
- CIELAB color space: lab(), lch()
- Oklab color space: oklab(), oklch()
- Other color spaces: color()
- By mixing two colors: color-mix()
