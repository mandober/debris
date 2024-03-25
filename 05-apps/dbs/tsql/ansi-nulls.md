# ANSI_NULLS

https://docs.microsoft.com/en-us/sql/t-sql/statements/set-ansi-nulls-transact-sql?view=sql-server-2017

Specifies ISO compliant behavior of the Equals (=) and Not Equal To (<>) comparison operators when they are used with null values in SQL Server 2017.

**Important**: In a future version of SQL Server, ANSI_NULLS will be ON and any applications that explicitly set the option to OFF will generate an error. Avoid using this feature in new development work, and plan to modify applications that currently use this feature.


When SET ANSI_NULLS is ON, a SELECT statement that uses WHERE column_name = NULL returns zero rows even if there are null values in column_name. A SELECT statement that uses WHERE column_name <> NULL returns zero rows even if there are nonnull values in column_name.

When SET ANSI_NULLS is OFF, the Equals (=) and Not Equal To (<>) comparison operators do not follow the ISO standard. A SELECT statement that uses WHERE column_name = NULL returns the rows that have null values in column_name. A SELECT statement that uses WHERE column_name <> NULL returns the rows that have nonnull values in the column. Also, a SELECT statement that uses WHERE column_name <> XYZ_value returns all rows that are not XYZ_value and that are not NULL.

When SET ANSI_NULLS is ON, all comparisons against a null value evaluate to UNKNOWN. When SET ANSI_NULLS is OFF, comparisons of all data against a null value evaluate to TRUE if the data value is NULL. If SET ANSI_NULLS is not specified, the setting of the ANSI_NULLS option of the current database applies. For more information about the ANSI_NULLS database option, see ALTER DATABASE (Transact-SQL).

```
Expression          Result when `SET ANSI_NULLS ON`
NULL = NULL         UNKNOWN
1 = NULL            UNKNOWN
NULL <> NULL        UNKNOWN
1 <> NULL           UNKNOWN
NULL > NULL         UNKNOWN
1 > NULL            UNKNOWN
NULL IS NULL        TRUE
1 IS NULL           FALSE
NULL IS NOT NULL    FALSE
1 IS NOT NULL       TRUE
```

SET ANSI_NULLS ON affects a comparison only if one of the operands of the comparison is either a variable that is NULL or a literal NULL. If both sides of the comparison are columns or compound expressions, the setting does not affect the comparison.











