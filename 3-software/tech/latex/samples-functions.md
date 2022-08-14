# Functions

## Composition

$$\displaystyle g \circ f $$


## Math functions

$$
\arccos, \arcsin, \arctan, \arg, \cos, \cosh, \cot, \coth, \\
\csc, \deg, \det, \dim, \exp, \gcd, \inf, \hom, \ker, \lg, \\
\lim, \liminf, \limsup, \ln, \log, \max, \min, \\
\Pr, \sec, \sin, \sinh, \sup, \tan, \tanh \\
\ \\
\text{modulo (remainder) operator: } 22\! \! \! \mod 5 = 2\\
\text{modular arithmetic: } 13 \pmod 3 \equiv 1 \\
p! \mod (p-1) \cong p \ncong -1 \\
$$




## Per case functions

$$
\displaystyle{
  g(m,n) =
  \begin{cases}
    m-n \qquad  & \text{if} \ \ m \ge 0  \\
    0 \qquad    & \text{else}   \\
  \end{cases}
}
$$


## Per Case functions

While itex2MML, the stream filter, does not provide such facilities, various tools built around it, like the itex2MML MovableType plugin and Maruku provide enhanced features, such as equation-numbering and cross-referencing. $$...$$ produces an unnumbered equation. \[...\] produces a numbered equation.

Optionally, `\[...\]` can contain a label `\[...\label{foo}...\]`
You can then refer back to this equation by `(eq:foo)` or `\eqref{foo}`.
These are automatically turned into hyperlinks.

$$
x = 
\begin{cases}
  x > 0 : & 4 \\
  x = 0 : & 2 \\
  x < 0 : & 5
\end{cases}
$$


## Per Case functions - tagged

$$
\displaystyle
\begin{align}
(a+b)^2 & = (a+b)(a+b)    \tag{3.1c}       \\
  & = a^2 + ab + ba + b^2 \tag{$\dagger$}  \\
  & = a^2 + 2ab + b^2     \tag{$\ast$}
\end{align}
$$




## Lorenz Equations
$$
\begin{align}
  \dot{x}  & = \sigma(y-x)\\
  \dot{y}  & = \rho x - y - xz \\
  \dot{z}  & = -\beta z + xy
\end{align}
$$
