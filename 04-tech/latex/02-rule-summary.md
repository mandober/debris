# TeX :: Summary of Rules


* always introduce tex expr with `$$`
* turn inline into block style: `\displaystyle`
* turn block into inline style: `\textstyle`
* double *backslash* marks the line break
* tags (are backslash prefixed) are called environments 
* alignment tags: `\begin{align}`, `\end{align}`; align marker: `&` 
* For multiline equations use **multiline environment**:
  * insert *double backslash* to set equation brakepoint
  * first part left-aligns 
  * second part right-aligns (in the next line)
  * `&` determines where the equations align
  * `*` toggles the equation numbering: `\begin{align*}`, `\end{align*}`
  * when numbering is allowed, you can label each row
