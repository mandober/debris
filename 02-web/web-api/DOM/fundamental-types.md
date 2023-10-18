# Fundamental DOM types

- Document
- Node
- Element
- NodeList
- Attr
- NamedNodeMap


* `Document` - When a member returns an object of type `document` (e.g. the ownerDocument property of an element returns the document to which it belongs), this object is the *root document object* itself.

* `Node` - Every object located within a document is a node of some kind. In an HTML document, an object can be an element node, text node or attribute node.

* `Element` - The element type is based on node. It refers to an element or a node of type element returned by a member of the DOM API. Rather than saying, for example, that the `document.createElement()` method returns an object reference to a node, we just say that this method returns the element that has just been created in the DOM. `element` objects implement the *DOM Element interface* and also the more basic *Node interface*. In an HTML document, elements are further enhanced by the HTML DOM API's *HTMLElement interface* as well as other interfaces describing capabilities of specific kinds of elements (e.g. `HTMLTableElement` for `<table>` elements).

* `NodeList` - A `nodeList` is an array of elements, like the kind that is returned by the method `document.querySelectorAll()`. Items in a nodeList are accessed by index in either of two ways: `list.item(1)` or `list[1]`. These two are equivalent. In the first, `item()` is the single method on the nodeList object; the latter syntax uses the array access.

* `Attr` - When an attribute is returned by a member (e.g. by the `createAttribute()` method), it is an object reference that exposes a special (albeit small) interface for attributes. Attributes are nodes in the DOM just like elements are, though they are rarely used as such.

* `NamedNodeMap` - A `namedNodeMap` is like an array, but the items are accessed by name or index, though this latter case is merely a convenience for enumeration, as they have *no particular order* in the list. A `namedNodeMap` has an `item()` method for this purpose, and supports adding and removing items. Although called `NamedNodeMap`, this interface doesn't deal with *Node objects* but with *Attr objects*, which are a specialized class of Node objects. Objects inside a NamedNodeMap are not in any particular order, unlike NodeList, although they may be accessed by an index as in an array. A NamedNodeMap object is live and will thus be auto-updated if changes are made to its contents internally or elsewhere. 
