# DB Configuration

https://laravel.com/docs/master/database

* Configuration
  - Configuration
  - Read & Write Connections
  - Using Multiple Database Connections
* Running Raw SQL Queries
* Listening For Query Events
* Database Transactions


## Configuration

Laravel interacts with databases using *Eloquent ORM*.

Currently, Laravel supports 4 databases:
* MySQL 5.6+
* PostgreSQL 9.4+
* SQLite 3.8.8+
* SQL Server 2017+


## SQLite Configuration

After creating a new SQLite database using a command such as touch `database/database.sqlite`, configure your env var to point to this newly created db file:

```ini
# use SQLite connection by default:
DB_CONNECTION=sqlite

# set to existing SQLite db path:
DB_DATABASE=/absolute/path/to/database.sqlite

# enable foreign key constraints in SQLite:
DB_FOREIGN_KEYS=true
```


## Using Multiple Database Connections

When using multiple connections, you may access each connection via the connection method on the DB facade. The name passed to the connection method should correspond to one of the connections listed in your config/database.php configuration file:

$users = DB::connection('foo')->select(...);

You may also access the raw, underlying PDO instance using the getPdo method on a connection instance:

$pdo = DB::connection()->getPdo();
