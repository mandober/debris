# Date and Time data types

Date and time data types and functions.

## Date and Time data types
The date and time data types are listed in the following table:

Type: 
Format: 
Range: 
Accuracy: 
Storage size (bytes): 
User-defined fractional second precision: 
Time zone offset: 

Type: `time`
Format: `hh:mm:ss[.nnnnnnn]`
Range: 00:00:00.0000000 - 23:59:59.9999999
Accuracy: 100 ns
Storage size (bytes): **3-5**
User-defined fractional second precision: Yes
Time zone offset: No

Type: `date`
Format: YYYY-MM-DD
Range: 0001-01-01 - 9999-12-31
Accuracy: 1 day
Storage size (bytes): **3**
User-defined fractional second precision: No
Time zone offset: No

Type: `smalldatetime`
Format: YYYY-MM-DD hh:mm:ss
Range: 1900-01-01 - 2079-06-06
Accuracy: 1 minute
Storage size (bytes): **4**
User-defined fractional second precision: No
Time zone offset: No

Type: `datetime`
Format: YYYY-MM-DD hh:mm:ss[.nnn]
Range: 1753-01-01 - 9999-12-31
Accuracy: 0.00333 second
Storage size (bytes): **8**
User-defined fractional second precision: No
Time zone offset: No

Type: `datetime2`
Format: YYYY-MM-DD hh:mm:ss[.nnnnnnn]
Range: 0001-01-01 00:00:00.0000000 - 9999-12-31 23:59:59.9999999
Accuracy: 100 ns
Storage size (bytes): **6-8**
User-defined fractional second precision: Yes
Time zone offset: No

Type: `datetimeoffset`
Format: YYYY-MM-DD hh:mm:ss[.nnnnnnn] [+&#124;-]hh:mm
Range: 0001-01-01 00:00:00.0000000 - 9999-12-31 23:59:59.9999999 (in UTC)
Accuracy: 100 ns
Storage size (bytes): **8-10**
User-defined fractional second precision: Yes
Time zone offset: Yes


*Note*: TSQL `rowversion` data type is not a date or time data type. `timestamp` is a deprecated synonym for `rowversion`.


## Functions That Return Date and Time Parts

* `DAY (date)` Returns int representing the day part of specified date.
* `MONTH (date)` Returns int representing the month part of specified date.
* `YEAR (date)` Returns int representing the year part of specified date.
  - YEAR returns the same value as `DATEPART (year, date)`.
  - If date only contains a time part, return value is 1900, the base year.



## Cutoff year

The two digit year cutoff option specifies an integer from 1753 to 9999 that represents the cutoff year for interpreting two-digit years as four-digit years.

The default time span for SQL Server is 1950-2049, which represents a cutoff year of 2049.

This means that SQL Server interprets a two-digit year of 49 as 2049, a two-digit year of 50 as 1950, and a two-digit year of 99 as 1999. To maintain backward compatibility, leave the setting at the default value.

This example shows how to use `sp_configure` to set the value of the two digit year cutoff option to 2030

```sql
USE AdventureWorks2012;
GO

EXEC sp_configure 'show advanced options', 1;
GO
RECONFIGURE;
GO

EXEC sp_configure 'two digit year cutoff', 2030;
GO
RECONFIGURE;
GO
```

