# Tex :: Environment :: Align

For equations longer than a line use the **multiline environment**:
  - insert *double backslash* to set equation brakepoint
  - first part left-aligns 
  - second part right-aligns (in the next line)
- `&` determines where the equations align

$$
\displaystyle{
\begin{multline}
  p(x) = 3x^6 + 14x^5y + 590x^4y^2 + 17x^5y + 19x^3y^3 - 14x^5y + \\
                       17x^5y + 3x^6 + 14x^5y + 590x^4y^2 + \\
                                   17x^5y + 12x^2y^4 - 12xy^5 + 2y^6 - a^3b^3
\end{multline}}
$$



## 2-column alignment

> The ampersand character `&` determines where the equations align.

$$
\begin{align}
2x - 5y & =  18 \\
3x + 9y & =  -12
\end{align}
$$


> Put it before equals sign to align on it across the vertical axis.

$$
\begin{align}
&10^{-12} &=& 0.00000000000        \\
&10^{-9}  &=& 0.00000000        \\
&10^{-6}  &=& 0.000001       \\
&10^{-3}  &=& 0.001       \\
&10^{-2}  &=& 0.01      \\
&10^{-1}  &=& 0.1     \\
&10^0     &=& 1     \\
&10^{1}   &=& 10      \\
&10^{2}   &=& 100       \\
&10^{3}   &=& 1,000       \\
&10^{6}   &=& 1,000,000       \\
&10^{9}   &=& 1,000,000,000       \\
&10^{12}  &=& 1,000,000,000,000
\end{align}
$$

## 3-column alignment

To align vertically several equations use **align environment**. 
Below we arrange the equations in 3 columns:
- TeX assumes that each equation consists of two parts separated by `&`
- TeX assumes that an equation is separated from the previous one by `&`
- Use `*` to toggle the equation numbering
- When numbering is allowed, you can label each row individually

$$
\begin{align}
  x     & = y     &   w   & =z              &   a  & =b+c   \\
  2x    & = -y    &   3w  & =\frac{1}{2}z   &   a  & =b     \\
  -4+5x & = 2+y   &   w+2 & =-1+w           &   ab & =cb    
\end{align}
$$


## alignment and tag



When numbering is allowed, you can label each row individually

$$
\begin{align}
(a+b)^2 & = (a+b)(a+b)               & \tag{3.1c}       \\
        & = a^2 + ab + ba + b^2      & \tag{$\dagger$}  \\
        & = a^2 + 2ab + b^2          & \tag{$\ast$}
\end{align}
$$
