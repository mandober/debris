# LATEX: Tables

## Table1

$$
\begin{array}{|l|r|rr|ll|l|}
\hline
1  &  2   &  a3 & a4   &  b5 & b6   &   c7 & c8 \\
\hline
2  &  a   &  b & c   &  d & e   &   f & g \\
\hline
\end{array}
$$

## Table: report

$$$
\begin{array}{rrrrrrr|rr}
      & x_1 & x_2 & s_1 & s_2 & s_3 &  w &    & \text{ratio} \\ \hline
  s_1 &   0 &   1 &   1 &   0 &   0 &  0 &  8 &            - \\
    w & 1^* &  -1 &   0 &  -1 &   0 &  1 &  4 &            4 \\
  s_3 &   1 &   1 &   0 &   0 &   1 &  0 & 12 &           12 \\ \hdashline
      &   1 &  -1 &   0 &  -1 &   0 &  0 &  4 &              \\ \hline
  s_1 &   0 &   1 &   1 &   0 &   0 &  0 &  8 &              \\
  x_1 &   1 &  -1 &   0 &  -1 &   0 &  1 &  4 &              \\
  s_3 &   0 &   2 &   0 &   2 &   1 & -1 &  8 &              \\ \hdashline
      &   0 &   0 &   0 &   0 &   0 & -1 &  0 &
\end{array}
$$$


## Table: UTF8 schema

$$$
\begin{array}{|l|r|rr|ll|ll|}
\hline
B & b/cp & from  & to     & byte1      & byte2      & byte3      & byte4    \\
\hline
1 & 7    & 0     & 7f     & 0xxx\_xxxx & -          & -          & -          \\ \hline
2 & 11   & 80    & 7ff    & 110x\_xxxx & 10xx\_xxxx & -          & -          \\
3 & 16   & 800   & ffff   & 111x\_xxxx & 10xx\_xxxx & 10xx\_xxxx & -          \\ \hline
4 & 21   & 10000 & 10ffff & 1111\_xxxx & 10xx\_xxxx & 10xx\_xxxx & 10xx\_xxxx \\ \hline
\end{array}
$$$
