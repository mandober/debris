# ENUM

ENUM and SET columns provide an efficient way to define columns that can contain only a given set of values.

**ENUM** is a *string object* with a value chosen from a list of permitted values that are enumerated explicitly in the column specification at table creation time.

Advantages:
- Compact data storage in situations where a column has a limited set of possible values. The strings you specify as input values are automatically encoded as numbers. (See Section 11.6, "Data Type Storage Requirements" for the storage requirements for ENUM types)
- Readable queries and output. The numbers are translated back to the corresponding strings in query results.

Disadvantages:
- If you make enumeration values that look like numbers, it is easy to mix up the literal values with their internal index numbers, as explained in *Enumeration Limitations*
- Using ENUM columns in ORDER BY clauses requires extra care, as explained in *Enumeration Sorting*



## Creating and Using ENUM Columns

An enumeration value must be a quoted string literal. For example, you can create a table with an ENUM column like this:

```sql
CREATE TABLE shirts (
name VARCHAR(40),
size ENUM('x-small', 'small', 'medium', 'large', 'x-large')
);

INSERT INTO shirts (name, size) VALUES ('dress shirt','large'), ('t-shirt','medium'),
('polo shirt','small');

SELECT name, size FROM shirts WHERE size = 'medium';
+---------+--------+
| name | size |
+---------+--------+
| t-shirt | medium |
+---------+--------+

UPDATE shirts SET size = 'small' WHERE size = 'large';
COMMIT;
```

> Inserting 1 million rows into this table with a value of 'medium' would require 1 million bytes of storage, as opposed to 6 million bytes if you stored the actual string "medium" in a VARCHAR column.

## Index Values for Enumeration Literals

Each enumeration value has an index:
- The elements listed in the column specification are assigned index numbers, beginning with 1.
- The index value of the empty string error value is 0. This means that you can use the following SELECT statement to find rows into which invalid ENUM values were assigned:`SELECT * FROM tbl_name WHERE enum_col=0`
- The index of the NULL value is NULL.
(The term “index” here refers to a position within the list of enumeration values. It has nothing to do with table indexes)

For example, a column specified as ENUM('Mercury', 'Venus', 'Earth') can have any of the values shown here. The index of each value is also shown.

Value     | Index
----------|-------
NULL      | NULL
''        | 0
'Mercury' | 1
'Venus'   | 2
'Earth'   | 3

* An ENUM column can have a maximum of 65,535 distinct elements.
* The practical limit is less than 3000
* A table can have no more than 255 unique element list definitions among its ENUM and SET columns considered as a group.
* If you retrieve an ENUM value in a numeric context, the column value's index is returned.


## Handling of Enumeration Literals
- When retrieved, values stored into an ENUM column are displayed using the lettercase that was used in the column definition
-  ENUM columns can be assigned a character set and collation. For binary or case-sensitive collations, lettercase is taken into account when assigning values to the column.
- If you store a number into an ENUM column, the number is treated as the index into the possible values, and the value stored is the enumeration member with that index.  If the numeric value is quoted, it is still interpreted as an index if there is no matching string in the list of enumeration values.

## Empty or NULL Enumeration Values
If an ENUM column is declared to permit NULL, the NULL value is a valid value for the column, and the default value is NULL. If an ENUM column is declared NOT NULL, its default value is the first element of the list of permitted values.

## Enumeration Sorting
ENUM values are sorted based on their index numbers, which depend on the order in which the enumeration members were listed in the column specification. The empty string sorts before nonempty strings, and NULL values sort before all other enumeration values.

