# Data types

https://docs.microsoft.com/en-us/sql/t-sql/data-types/data-types-transact-sql?view=sql-server-2016

In SQL Server, each column, local variable, expression, and parameter has a related data type. A data type is an attribute that specifies the type of data that the object can hold.

SQL Server supplies a set of system data types that define all the types of data that can be used with SQL Server. You can also define your own data types in Transact-SQL or the Microsoft .NET Framework. Alias data types are based on the system-supplied data types. User-defined types obtain their characteristics from the methods and operators of a class that you create by using one of the programming languages support by the .NET Framework.

When two expressions that have different data types, collations, precision, scale, or length are combined by an operator, the characteristics of result are determined by the following:
* The data type of the result is determined by applying the rules of data type precedence to the data types of the input expressions.
* The collation of the result is determined by the rules of collation precedence when the result data type is char, varchar, text, nchar, nvarchar, or ntext.
* The precision, scale, and length of the result depend on the precision, scale, and length of the input expressions.

SQL Server provides data type synonyms for ISO compatibility:
https://docs.microsoft.com/en-us/sql/t-sql/data-types/data-type-synonyms-transact-sql?view=sql-server-2017

Data types categories:
- Exact numerics
- Approximate numerics
- Date and time
- Character strings
- Unicode character strings
- Binary strings
- Other data types

In SQL Server, based on their storage characteristics, some data types are designated as belonging to the following groups:
* Large value data types: 
  - `varchar(max)`
  - `nvarchar(max)`
* Large object data types:
  - `text`
  - `ntext`
  - `image`
  - `varbinary(max)`
  - `xml`


* Exact numerics
  - bit
  - tinyint
  - smallint
  - int
  - bigint
  - numeric
  - decimal
  - smallmoney
  - money
* Approximate numerics
  - float
  - real
* Date and time
  - date
  - datetimeoffset
  - datetime2
  - smalldatetime
  - datetime
  - time
* Character strings
  - char
  - varchar
  - text
* Unicode character strings
  - nchar
  - nvarchar
  - ntext
* Binary strings
  - binary
  - varbinary
  - image
* Other data types
  - cursor
  - rowversion
  - hierarchyid
  - uniqueidentifier
  - sql_variant
  - xml
  - Spatial Geometry Types
  - Spatial Geography Types
  - table

