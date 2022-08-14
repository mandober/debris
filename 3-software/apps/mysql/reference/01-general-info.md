# General Information

This is the Reference Manual for the MySQL Database System, version 5.5, through release 5.5.62. Differences between minor versions of MySQL 5.5 are noted in the present text with reference to release numbers (5.5.X).

The MySQL software delivers a very fast, multithreaded, multi-user, and robust SQL (Structured Query Language) database server. MySQL Server is intended for mission-critical, heavy-load production systems as well as for embedding into mass-deployed software.

The MySQL software is Dual Licensed. Users can choose to use the MySQL software as an Open Source product under the terms of the GNU General Public License (<http://www.fsf.org/licenses/>) or can purchase a standard commercial license from Oracle.

MySQL, the most popular Open Source SQL database management system, is developed, distributed, and supported by Oracle Corporation.


## Overview of the MySQL DBMS

> MySQL is a database management system.

A database is a structured collection of data. It may be anything from a simple shopping list to a picture gallery or the vast amounts of information in a corporate network. To add, access, and process data stored in a computer database, you need a database management system such as MySQL Server. Since computers are very good at handling large amounts of data, database management systems play a central role in computing, as standalone utilities, or as parts of other applications.

> MySQL databases are relational.

A relational database stores data in separate tables rather than putting all the data in one big storeroom. The database structures are organized into physical files optimized for speed. The logical model, with objects such as databases, tables, views, rows, and columns, offers a flexible programming environment. You set up rules governing the relationships between different data fields, such as one-to-one, one-to-many, unique, required or optional, and 'pointers' between different tables. The database enforces these rules, so that with a well-designed database, your application never sees inconsistent, duplicate, orphan, out-of-date, or missing data.

The SQL part of 'MySQL' stands for 'Structured Query Language'. SQL is the most common standardized language used to access databases. Depending on your programming environment, you might enter SQL directly (for example, to generate reports), embed SQL statements into code written in another language, or use a language-specific API that hides the SQL syntax.

SQL is defined by the ANSI/ISO SQL Standard. The SQL standard has been evolving since 1986 and several versions exist. In this manual, 'SQL-92' refers to the standard released in 1992, 'SQL:1999' refers to the standard released in 1999, and 'SQL:2003' refers to the current version of the standard. We use the phrase 'the SQL standard' to mean the current version of the SQL Standard at any time.

> MySQL software is Open Source

Open Source means that it is possible for anyone to use and modify the software. Anybody can download the MySQL software from the Internet and use it without paying anything. If you wish, you may study the source code and change it to suit your needs. The MySQL software uses the GPL (GNU General Public License), <http://www.fsf.org/licenses/>, to define what you may and may not do with the software in different situations. If you feel uncomfortable with the GPL or need to embed MySQL code into a commercial application, you can buy a commercially licensed version from us. See the MySQL Licensing Overview for more information (<http://www.mysql.com/company/legal/licensing/>).


> The MySQL Database Server is very fast, reliable, scalable, and easy to use.

If that is what you are looking for, you should give it a try. MySQL Server can run comfortably on a desktop or laptop, alongside your other applications, web servers, and so on, requiring little or no attention. If you dedicate an entire machine to MySQL, you can adjust the settings to take advantage of all the memory, CPU power, and I/O capacity available. MySQL can also scale up to clusters of machines, networked together.

MySQL Server was originally developed to handle large databases much faster than existing solutions and has been successfully used in highly demanding production environments for several years. Although under constant development, MySQL Server today offers a rich and useful set of functions. Its connectivity, speed, and security make MySQL Server highly suited for accessing databases on the Internet.

> MySQL Server works in client/server or embedded systems.

The MySQL Database Software is a client/server system that consists of a multithreaded SQL server that supports different back ends, several different client programs and libraries, administrative tools, and a wide range of application programming interfaces (APIs).

We also provide MySQL Server as an embedded multithreaded library that you can link into your application to get a smaller, faster, easier-to-manage standalone product.

> A large amount of contributed MySQL software is available.

MySQL Server has a practical set of features developed in close cooperation with our users. It is very likely that your favorite application or language supports the MySQL Database Server.

The official way to pronounce 'MySQL' is 'My Ess Que Ell' (spelled by letter).


## Main Features of MySQL

### Internals and Portability

* Written in C and C++.
* Tested with a broad range of different compilers.
* Works on many different platforms: https://www.mysql.com/support/supportedplatforms/database.html
* For portability, uses 'CMake' in MySQL 5.5 and up. Previous series use GNU Automake, Autoconf, and Libtool.
* Tested with Purify (a commercial memory leakage detector) as well as with Valgrind, a GPL tool http://developer.kde.org/~sewardj/
* Uses multi-layered server design with independent modules.
* Designed to be fully multithreaded using kernel threads, to easily use multiple CPUs if they are available.
* Provides transactional and nontransactional storage engines.
* Uses very fast B-tree disk tables ('MyISAM') with index compression.
* Designed to make it relatively easy to add other storage engines. This is useful if you want to provide an SQL interface for an in-house database.
* Uses a very fast thread-based memory allocation system.
* Executes very fast joins using an optimized nested-loop join.
* Implements in-memory hash tables, which are used as temporary tables.
* Implements SQL functions using a highly optimized class library that should be as fast as possible.  Usually there is no memory allocation at all after query initialization.
* Provides the server as a separate program for use in a client/server networked environment, and as a library that can be embedded (linked) into standalone applications. Such applications can be used in isolation or in environments where no network is available.


### Data Types Overview

Many data types:
- signed/unsigned integers 1, 2, 3, 4, and 8 bytes long
- FLOAT: floating-point-types
- DOUBLE floating-point-types
- CHAR
- VARCHAR
- BINARY: binary-varbinary
- VARBINARY: binary-varbinary
- TEXT: blob
- Fixed-length and variable-length string types
- BLOB
- DATE: datetime
- TIME: time
- DATETIME: datetime
- TIMESTAMP: datetime
- YEAR
- SET
- ENUM
- OpenGIS spatial types


### Statements and Functions

* Full operator and function support in the SELECT and WHERE clause of queries. 
  For example:
      mysql> SELECT CONCAT(first_name, ' ', last_name)
      -> FROM citizen
      -> WHERE income/dependents > 10000 AND age > 30;
* Full support for SQL GROUP BY and ORDER BY clauses.  Support for group functions: COUNT AVG STD SUM MAX MIN GROUP_CONCAT
* Support for 'LEFT OUTER JOIN' and 'RIGHT OUTER JOIN' with both standard SQL and ODBC syntax.
* Support for aliases on tables and columns as required by standard SQL.
* Support for DELETE, INSERT, REPLACE and UPDATE. To return the number of rows that were changed (affected), or to return the number of rows matched instead by setting a flag when connecting to the server.
* Support for MySQL-specific SHOW statements that retrieve information about databases, storage engines, tables, and indexes. Support for INFORMATION_SCHEMA,implemented according to standard SQL.
* An EXPLAIN statement to show how the optimizer resolves a query.
* Independence of function names from table or column names. For example, 'ABS' is a valid column name. The only restriction is that for a function call, no spaces are permitted between the function name and the '(' that follows it. 
* You can refer to tables from different databases in the same statement.

### Security
* A privilege and password system that is very flexible and secure, and that enables host-based verification.
* Password security by encryption of all password traffic when you connect to a server.

### Scalability and Limits
* Support for large databases. We use MySQL Server with databases that contain 50 million records. We also know of users who use MySQL Server with 200,000 tables and about 5,000,000,000 rows.
* **Support for up to 64 indexes per table**. Each index may consist of 1 to 16 columns or parts of columns. The maximum index width for InnoDB is either 767 bytes or 3072 bytes. The maximum index width for MyISAM is 1000 bytes. An index may use a prefix of a column for CHAR, VARCHAR, BLOB, or TEXT column types.

### Connectivity

Clients can connect to MySQL Server using several protocols:

* Clients can connect using *TCP/IP sockets* on any platform.

* On Windows systems, clients can connect using *named pipes* if the server
  is started with the `named_pipe` system variable enabled. 

* Windows servers also support *shared-memory connections* if started with 
  the `shared_memory` system variable enabled. 

* Clients can connect through shared memory by using the `--protocol=memory`

* On Unix systems, clients can connect using *Unix domain socket files*.

* MySQL client programs can be written in many languages.
  A client library written in C is available for clients written in C or C++,
  or for any language that provides C bindings.

* APIs for C, C++, Eiffel, Java, Perl, PHP, Python, Ruby, and Tcl are
  available, enabling MySQL clients to be written in many languages.

* The Connector/ODBC (MyODBC) interface provides MySQL support for
  client programs that use ODBC (Open Database Connectivity) connections.
  For example, you can use MS Access to connect to your MySQL server.
  Clients can be run on Windows or Unix.
  Connector/ODBC source is available.
  All ODBC 2.5 functions are supported, as are many others.
  See [MySQL Connector/ODBC Developer Guide](https://dev.mysql.com/doc/connector-odbc/en/).

* The Connector/J interface provides MySQL support for Java client programs that use JDBC connections. Clients can be run on Windows or Unix. Connector/J source is available. See [MySQL Connector/J 5.1 Developer Guide](https://dev.mysql.com/doc/connector-j/5.1/en/).

* MySQL Connector/NET enables developers to easily create .NET applications that require secure, high-performance data connectivity with MySQL. It implements the required ADO.NET interfaces and integrates into ADO.NET aware tools.  Developers can build applications using their choice of .NET languages.  MySQL Connector/NET is a fully managed ADO.NET driver written in 100% pure C#.  See [MySQL Connector/NET Developer Guide](https://dev.mysql.com/doc/connector-net/en/).


### Localization
* The server can provide error messages to clients in many languages.
* Full support for several different character sets, including
  - latin1 (cp1252)
  - german
  - big5
  - ujis
 several Unicode character sets, and more. For example, the Scandinavian characters are permitted in table and column names.
* All data is saved in the chosen character set.
* Sorting and comparisons are done according to the default character set and collation. It is possible to change this when the MySQL server is started. To see an example of very advanced sorting, look at the Czech sorting code. MySQL Server *supports many different character sets that can be specified at compile time and runtime*.
* The server time zone can be changed dynamically, and individual clients can specify their own time zone.

### Clients and Tools
* MySQL includes several client and utility programs.
These include both command-line programs such as mysqldump and mysqladmin and graphical programs such as MySQL Workbench.
* MySQL Server has built-in support for SQL statements to check, optimize, and repair tables. These statements are available from the command line through the  mysqlcheck client. MySQL also includes  myisamchk, a very fast command-line utility for performing these operations on MyISAM tables
* MySQL programs can be invoked with the '--help' or '-?' option to obtain online assistance.
