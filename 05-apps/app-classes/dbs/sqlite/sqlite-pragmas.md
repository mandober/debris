# SQLite :: PRAGMA Statements

https://www.sqlite.org/pragma.html

The PRAGMA statement is an SQL extension specific to SQLite and used to modify the operation of the SQLite library or to query the SQLite library for internal (non-table) data. The PRAGMA statement is issued using the same interface as other SQLite commands (e.g. SELECT, INSERT) but is different in the following important respects:

The pragma command is specific to SQLite and is not compatible with any other SQL database engine.
Specific pragma statements may be removed and others added in future releases of SQLite. There is no guarantee of backwards compatibility.
No error messages are generated if an unknown pragma is issued. Unknown pragmas are simply ignored. This means if there is a typo in a pragma statement the library does not inform the user of the fact.
Some pragmas take effect during the SQL compilation stage, not the execution stage. This means if using the C-language sqlite3_prepare(), sqlite3_step(), sqlite3_finalize() API (or similar in a wrapper interface), the pragma may run during the sqlite3_prepare() call, not during the sqlite3_step() call as normal SQL statements do. Or the pragma might run during sqlite3_step() just like normal SQL statements. Whether or not the pragma runs during sqlite3_prepare() or sqlite3_step() depends on the pragma and on the specific release of SQLite.
The EXPLAIN and EXPLAIN QUERY PLAN prefixes to SQL statements only affect the behavior of the statement during sqlite3_step(). That means that PRAGMA statements that take effect during sqlite3_prepare() will behave the same way regardless of whether or not they are prefaced by "EXPLAIN".
The C-language API for SQLite provides the SQLITE_FCNTL_PRAGMA file control which gives VFS implementations the opportunity to add new PRAGMA statements or to override the meaning of built-in PRAGMA statements.
