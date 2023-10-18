## XPath

XPath, or XML Path Language, is a language used to navigat XML documents, using a syntax similar to the one used to refer to paths in a file system, in order to identify and navigate nodes in an XML document.

XPath uses *path expressions* to select nodes or node-sets in an XML document. XPath has functions for string values, numeric values, booleans, date and time comparison, node manipulation, sequence manipulation, and much more. Many programming languges support XPath expressions.

- there are 7 kinds of nodes in XPath:
  1. element
  2. attribute
  3. text
  4. namespace
  5. processing instruction
  6. comment
  7. document
- XML documents are treated as trees of nodes.
- The topmost element of the tree is called *the root element*.
- Atomic values are nodes with no children or parent.
- Items are atomic values or nodes.

Node relations:
- Parent
- Children
- Siblings
- Ancestors
- Descendants

## Selecting Nodes

Common path expressions:
- `.`     Selects the current node
- `..`    Selects the parent of the current node
- `@`     Selects attributes
- `name`  Selects all nodes with the name "name"
- `/`     Selects from the root node
- `//`    Selects the nodes, starting with the current node and including
          all other nodes that match the selection, no matter the location











