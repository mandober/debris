# CRUD

- create/use/drop
- database/table

```sql
-- Connect to SQL Server instance...

-- set db context to mydb
USE mydb;

-- execute statements so far
GO

-- Create new db
CREATE DATABASE mydb;
GO

-- Drop database
DROP DATABASE mydb;

-- Drop db if exists
IF DB_ID(N'mydb') IS NOT NULL DROP DATABASE mydb;

-- check for error, abort if db can't be dropped due to active connections
IF @@ERROR = 3702
  RAISERROR(N'Cannot drop, active connections', 127, 127) WITH NOWAIT, LOG;

-- drop table if exists
DROP TABLE IF EXISTS dbo.Orders;

-- dbo is the default schema
CREATE TABLE dbo.Orders
  ([productName] varchar(13), [description] varchar(57));
```


## Insert

```sql
INSERT INTO dbo.Orders
  ([productName], [description])
VALUES
  ('OpenIDM', 'Platform for building'),
  ('OpenAM', 'Full-featured access management'),
  ('OpenDJ', 'Robust LDAP server for Java')
;
```
