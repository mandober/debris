# SET

ENUM and SET columns provide an efficient way to define columns that can contain only a given set of values.

**SET** is a string object that can have zero or more values, each of which must be chosen from a list of permitted values specified when the table is created.

SET column values that consist of multiple set members are specified with members separated by commas (,). A consequence of this is that SET member values should not themselves contain commas.

- A SET column can have a maximum of 64 distinct members.
- set also supports bitwise manipulations on its members
- a field may have no, one, or many values from a set, but no duplicates

For example, a column `SET('one', 'two') NOT NULL` can have any of these vals:
- ''
- 'one'
- 'two'
- 'one,two'

When retrieved, values stored in a SET column are displayed using the lettercase that was used in the column definition. Note that SET columns can be assigned a character set and collation. For binary or case-sensitive collations, lettercase is taken into account when assigning values to the column.

MySQL stores SET values numerically, with the low-order bit of the stored value corresponding to the first set member. If you retrieve a SET value in a numeric context, the value retrieved has bits set corresponding to the set members that make up the column value.





