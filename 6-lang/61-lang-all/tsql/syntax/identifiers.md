# Database Identifiers

The database object name is referred to as its identifier. Everything in Microsoft SQL Server can have an identifier. Servers, databases, and database objects, such as tables, views, columns, indexes, triggers, procedures, constraints, and rules, can have identifiers. Identifiers are required for most objects, but are optional for some objects such as constraints.

An object identifier is created when the object is defined. The identifier is then used to reference the object.

This table also has an unnamed constraint: the PRIMARY KEY constraint has no identifier.

```sql
CREATE TABLE TableX  
(KeyCol INT PRIMARY KEY, Description nvarchar(80))
```

The collation of an identifier depends on the level at which it is defined:
* Identifiers of instance-level objects, such as logins and database names, are assigned the default collation of the instance.
* Identifiers of objects in a database, such as tables, views, and column names, are assigned the default collation of the database.

For example, two tables with names that differ only in case can be created in a database that has case-sensitive collation, but cannot be created in a database that has case-insensitive collation.


There are two classes of identifiers:
1. **Regular identifiers**    
  Comply with the rules for the format of identifiers. Regular identifiers are not delimited when they are used in Transact-SQL statements.
2. **Delimited identifiers**   
  enclosed in double quotation marks or brackets. Identifiers that comply with the rules for the format of identifiers might not be delimited.

Both regular and delimited identifiers must contain from 1 through 128 characters. For local temporary tables, the identifier can have a maximum of 116 characters.


## Rules for Regular Identifiers
The names of variables, functions, and stored procedures must comply with the following rules for Transact-SQL identifiers.

1. The first character must be one of the following:
  - A letter as defined by the Unicode Standard 3.2.
    Unicode letters includes Latin a-zA-Z and chars from other langs.
  - The underscore `_`, at sign `@`, or number sign `#`.
2. Subsequent characters can include the following:
  - Letters as defined in the Unicode Standard 3.2.
  - Decimal numbers from either Basic Latin or other national scripts.
  - The at sign `@`, dollar sign `$`, number sign `#`, or underscore `_`.
3. Embedded spaces or special characters are not allowed.
4. Supplementary characters are not allowed.


Symbols at the beginning of identifier with special meaning:
- A regular identifier that starts with `@` always denotes a local variable or parameter and cannot be used as the name of any other type of object. 
- An identifier that starts with a number sign `#` denotes a temporary table or procedure. 
- An identifier that starts with double number signs `##` denotes a global temporary object.
- Some Transact-SQL functions have names that start with double at signs `@@`, so avoit this.

Symbols in identifier with special meaning:
* The identifier must not be a Transact-SQL reserved word.
* SQL Server reserves uppercase and lowercase versions of reserved words.

When identifiers are used in Transact-SQL statements, the identifiers that do not comply with these rules must be delimited by double quotation marks or brackets.

_Note_: Some rules for the format of regular identifiers depend on the database compatibility level. This level can be set by using `ALTER DATABASE`.
