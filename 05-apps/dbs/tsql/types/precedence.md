# Data type precedence

When an operator combines two expressions of different data types, the rules for data type precedence specify that the data type with the lower precedence is converted to the data type with the higher precedence.

If the conversion is not a supported implicit conversion, an error is returned. 

When both operand expressions have the same data type, the result of the operation has that data type.


SQL Server uses the following precedence order for data types (high to low):
- user-defined data types **highest**
- `sql_variant`
- `xml`
* *Datetime*
- `datetimeoffset`
- `datetime2`
- `datetime`
- `smalldatetime`
- `date`
- `time`
* *Numbers*
- float
- real
- decimal
- money
- smallmoney
- bigint
- int
- smallint
- tinyint
- bit
* *Text*
- ntext
- text
* *Blob*
- image
* *Specials*
- timestamp
- uniqueidentifier
* *Char*
- nvarchar, including `nvarchar(max)`
- nchar
- varchar, including `varchar(max)`
- char
* *Binary*
- varbinary, including `varbinary(max)`
- `binary` **lowest**
