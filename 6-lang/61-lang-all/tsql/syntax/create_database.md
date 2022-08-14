# Create Database

https://docs.microsoft.com/en-us/sql/t-sql/statements/create-database-transact-sql?view=sql-server-2017

```sql
CREATE DATABASE Music;
```

Used to
- create new db (and the files used and their filegroups)
- create db snapshot
- attach db files to create a db from the detached files of another db.

You can use one CREATE DATABASE statement to create a db and the files that store the db. 

SQL Server implements the CREATE DATABASE statement:
- The SQL Server uses a copy of the model db to initialize the db and its metadata.
- A service broker GUID is assigned to the db.
- The Database Engine then fills the rest of the db with empty pages, except for pages that have internal data that records how the space is used in the db.
- A maximum of 32,767 dbs can be specified on an instance of SQL Server.
- Each db has an owner that can perform special activities in the db. The owner is the user that creates the db. The db owner can be changed by using sp_changedbowner.

