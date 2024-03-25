# Primary key

A primary key (PK) is a specific choice of a minimal set of attributes (columns, fields) that uniquely specify a tuple (row) in a relation (table). Informally, a primary key comprises of attributes that uinquely identify a record.

In the SQL Standard, primary keys may consist of one or multiple columns. Each column participating in the primary key is implicitly defined as `NOT NULL`.

Although, a PK can consist of several attributes (fields), it mostly targets a single field. **Natural key** is a PK that is an observable, real attribute; an artificial attribute, created to act as a key is a **surrogate key**.

Primary keys, as defined in the SQL Standard, are employed through the `PRIMARY KEY` constraint. Adding a PK to an existing table is defined in *SQL:2003*.

```sql
ALTER TABLE <table id>
ADD [ CONSTRAINT <constraint id> ]
PRIMARY KEY ( <column exp> {, <column exp>} ... )
```

The primary key can also be specified directly during table creation. If the primary key consists only of a single column, the column can be marked as such using the syntax:

```sql
CREATE TABLE tableName (
  id int PRIMARY KEY,
  -- etc.
)
```
