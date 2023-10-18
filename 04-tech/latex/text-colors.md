# TeX :: Text


## Interactivity

`\href{url}{expression}`
Turns a mathematical expression into a clickable link. This makes use of Xlink.

$$\href{text-font-size.md}{size}$$


`\fghilight{colourspec}{expression} ( = \fghighlight)`
`\bghilight{colourspec}{expression} ( = \bghighlight)`
Change the foreground/background colour of an expression when the user hovers over it. Not supported by current browsers, but can be worked-around with little Javascript.

`\toggle{expression1}{expression2}`
Toggle between these two expressions when the user clicks on them.

`\begintoggle{expression1}{expression2}...{expressionN}\endtoggle`
Toggle between these n expressions when the user clicks on them.


`\tooltip{message}{expression}`
Displays the message text as a tooltip, when the user hovers his mouse over the mathematical expression. Also does not work natively in Mozilla/Firefox. Instead, Mozilla/Firefox supports the (nonexistent) title attribute. So, the same Javascript, below, works around the problem.


`\statusline{message}{expression}`
Displays the message text in the browser's status-line, when the user hovers his mouse over the mathematical expression. Works in current (but not older versions of) Mozilla/Firefox, or is easily implemented with a touch of Javascript.

## Colours

`\color{colourspec}` changes the current foreground colour.

It is either:
- HTML named-colour: 
  + black, white
  + aqua, blue, navy, teal,
  + fuchsia, gray, green, lime, maroon,
  + olive, purple, red, silver, yellow
- RGB colour value:     
  + `#rgb` or `#rrggbb`    
  + where rgb or rrggbb is a 3-digit or 6-digit hexadecimal number    
  + `#000000` is black    
  + `#FFFFFF` is white     
  + `#1AC`=`#11AACC` (shorthand)

As an example:

`$$a { b \color{red} c \color{#0F0} d } e$$` 

will render a, b and e in 
the default colour 
(usually black), 
c in red and d in green.



$$
4 + \color{fuchsia} x + y - \color{blue} z - y \\
a { b \color{red} c \color{#61afef} d } e \\
$$


$$
\color{fuchsia}{\{}
  \color{green}{\{}
    \color{blue}{\{}
      \color{#e5c07b}{\{}
        \color{#d19a66ff}{\{}
          \color{#61afefff}{\{}
            \color{#282c34ff}{\{}
              \color{#d55fdeff}{\{}
                \color{#89ca78ff}{\{}
                  a
                \color{#89ca78ff}{\}}
              \color{#d55fdeff}{\}}
            \color{#282c34ff}{\}}
          \color{#61afefff}{\}}
        \color{#d19a66ff}{\}}
      \color{#e5c07b}{\}}
    \color{blue}{\}}
  \color{green}{\}}
\color{fuchsia}{\}}
$$

$$
\color{#61afefff} \clubsuit    \qquad blue   \\
\color{#89ca78ff} \clubsuit    \qquad green  \\
\color{#d55fdeff} \clubsuit    \qquad pink  \\
\color{#282c34ff} \clubsuit    \qquad black  \\
\color{#d19a66ff} \clubsuit    \qquad pale brown  \\
\color{#e5c07b} \clubsuit      \qquad very pale brown  \\
\ \\
\color{#61afef}       \clubsuit  \qquad   blue   \\
\color{fuchsia}         \clubsuit  \qquad  fuchsia  \\
\color{cornflowerblue}  \clubsuit  \qquad  cornflowerblue  \\
\color{#61affa}  \clubsuit  \qquad  cornflowerblue  \\
$$


$$
\color{fuchsia}{\{ \clubsuit}
  \color{green}{\{ \spadesuit}
    \color{blue}{\{ \clubsuit}
      \color{#e5c07b}{\{ \clubsuit}
        \color{#d19a66ff}{\{ \spadesuit}
          \color{#61afefff}{\{ \clubsuit}
            \color{#282c34ff}{\{ \spadesuit}
              \color{#d55fdeff}{\{ \clubsuit}
                \color{#89ca78ff}{\{ \clubsuit}
                  \quad \clubsuit
                  \spadesuit \quad 
                \color{#89ca78ff}{\}}
              \color{#d55fdeff}{\}}
            \color{#282c34ff}{\}}
          \color{#61afefff}{\}}
        \color{#d19a66ff}{\}}
      \color{#e5c07b}{\}}
    \color{blue}{\}}
  \color{green}{\}}
\color{fuchsia}{\}}
$$
