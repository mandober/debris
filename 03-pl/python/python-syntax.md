# Python Syntax


## Keywords

```py
import, global, nonlocal, assert
True, False, None
and, or, not
class, def, lambda,
return, yield, break, continue
if, elif, else
try, raise, finally, except
for, in, while
as, is, from, with, del, pass


a = True
b = False
c = True
if (a == True) and (b == False) and \
  (c == True):
  print("Continuation of statements")

# define main function to print out something:
def main():
  i = 1
  max = 10
  while (i < max):
    print(i)
    i = i + 1
# call function main 
main()

# statement separator is also semicolon:
x = 10; y = 20
print(x); print(y)

# keyword module functionality:
import keyword
print(keyword.iskeyword('for')) # True 
print(keyword.kwlist) # print out keywords list

# STRING LITERALS
#   single quote (')
#   double quotes (") 
#   triple single quotes (''')
#   triple double quotes (""")
# to denote a string literal.
# The string literal must begins and ends with the same type of quotes.
s = 'This is a string'
print(s)

s = "Another string using double quotes"
print(s)

s = ''' string can span
        multiple line '''
print(s)
```

