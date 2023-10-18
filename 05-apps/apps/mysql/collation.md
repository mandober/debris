# Collation

> Which collation to choose?

`utf8mb4_unicode_ci`
Laravel internals use this collation everywhere, for every text field. It is used just to enable storing emojis.

`utf8-general-ci` Maybe this one is less costly?
`utf8-unicode-ci` diff?

`latin1_swedish_ci`
What about this one for text fields that can contain only ASCII chars?


## Character Set and collation

https://mariadb.com/kb/en/library/collation/

A `character set` can have many collations associated with it, while each collation is only associated with one character set.

In MariaDB, the character set name is always part of the collation name. For example, the `latin1_german1_ci` collation applies only to the `latin1` character set. 

Each character set also has one default collation. The `latin1` default collation is `latin1_swedish_ci`.

MySQL collations: utf8-general-ci , latin1_swedish_ci , utf8mb4_unicode_ci


## Setting Character Sets and Collations

https://mariadb.com/kb/en/library/setting-character-sets-and-collations/

Both **character sets** and **collations**
can be specified from:
- the *server* right down to 
- the *column level*
- and for *client-server connections*


Character sets and collations *always cascade down*, 
so a column without a specified 
collation will look for the table default,
the table for the database, and 
the database for the server.

It's therefore possible to have extremely fine-grained control over all the character sets and collations used in your data.

Default collations for each character set can be viewed with the SHOW COLLATION statement, for example, to find the default collation for the latin2 character set:


### Database level

The CREATE DATABASE and ALTER DATABASE statements have optional character set and collation clauses. If these are left out, the server defaults are used.

```sql
CREATE DATABASE czech_slovak_names 
  CHARACTER SET = 'keybcs2'
  COLLATE = 'keybcs2_bin';
ALTER DATABASE czech_slovak_names COLLATE = 'keybcs2_general_ci';
```

To determine the default character set used by a database, use:

```sql
SHOW CREATE DATABASE czech_slovak_names;
```



### Table level

The CREATE TABLE and ALTER TABLE statements support optional character set and collation clauses, a MariaDB and MySQL extension to standard SQL.

```sql
CREATE TABLE english_names (id INT, name VARCHAR(40)) 
  CHARACTER SET 'utf8' 
  COLLATE 'utf8_icelandic_ci';
```

- If neither character set nor collation is provided, db default is used
- If only character set is provided, default collation for that set is used
- If only the collation is provided, associated set will be used

```sql
ALTER TABLE table_name
 CONVERT TO CHARACTER SET charset_name [COLLATE collation_name];
```

If no collation is provided, the collation will be set to the default collation for that character set.

For VARCHAR or TEXT columns, `CONVERT TO CHARACTER SET` changes the data type if needed to ensure the new column is long enough to store as many characters as the original column.

For example

an ASCII TEXT column requires a single byte per character, 
so the column can hold up to 65,535 characters.

If the column is converted to `utf8`, 
3 bytes may be required for each character, 
so the column will be converted to MEDIUMTEXT 
to be able to hold the same number of characters.

`CONVERT TO CHARACTER SET binary` will convert CHAR, VARCHAR and TEXT columns to BINARY, VARBINARY and BLOB respectively, and from that point will no longer have a character set, or be affected by future CONVERT TO CHARACTER SET statements.

To avoid data type changes resulting from `CONVERT TO CHARACTER SET`, use `MODIFY` on the individual columns instead.

```sql
ALTER TABLE table_name MODIFY ascii_text_column TEXT CHARACTER SET utf8;
ALTER TABLE table_name MODIFY ascii_varchar_column VARCHAR(M) CHARACTER SET utf8;
```


### Column level

Character sets and collations can also be specified for columns that are character types CHAR, TEXT or VARCHAR.

The CREATE TABLE and ALTER TABLE statements support optional character set and collation clauses for this purpose - unlike those at the table level, the column level definitions are standard SQL.

```sql
CREATE TABLE european_names (
  croatian_names VARCHAR(40) COLLATE 'cp1250_croatian_ci',
  greek_names VARCHAR(40) CHARACTER SET 'greek');
```

- If neither collation nor character set is provided, the table default is used.
- If only the character set is specified, that character set's default collation is used
- if only the collation is specified, the associated character set is used.

When using ALTER TABLE to change a column's character set, you need to ensure the character sets are compatible with your data. MariaDB will map the data as best it can, but it's possible to lose data if care is not taken.


### Literals

By default, the character set and collation used for literals is determined by the `character_set_connection` and `collation_connection` system variables.

They can also be specified explicitly:

```sql
[_charset_name]'string' [COLLATE collation_name]
```

The character set of string literals that do not have a character set introducer is determined by the character_set_connection system variable.

This query always returns the same character set name in both columns:

```sql
SELECT CHARSET('a'), @@character_set_connection;
```


`character_set_client` and `character_set_connection` are normally (e.g. during handshake, or after a SET NAMES query) are set to equal values. However, it's possible to set to different values.


### Changing the default character set to UTF-8

To change the default character set from latin1 to UTF-8, the following settings should be specified in the my.cnf configuration file.

```
[client]
default-character-set=utf8mb4

[mysql]
default-character-set=utf8mb4

[mysqld]
collation-server = utf8mb4_unicode_ci
init-connect='SET NAMES utf8mb4'
character-set-server = utf8mb4
```

Note that the `default-character-set` option is a client option, not a server option.
