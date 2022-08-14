# Installing and Upgrading MySQL


## 1. General Information
=========================


1.4 What Is New in MySQL 5.5
============================

This section summarizes what has been added to, deprecated in, and
removed from MySQL 5.5.

   * *note mysql-nutshell-additions::
   * *note mysql-nutshell-deprecations::
   * *note mysql-nutshell-removals::

*Features Added in MySQL 5.5*

The following features have been added to MySQL 5.5:

   * MySQL Enterprise Thread Pool

     The default thread-handling model in MySQL Server executes
     statements using one thread per client connection.  As more clients
     connect to the server and execute statements, overall performance
     degrades.  As of MySQL 5.5.16, MySQL Enterprise Edition
     distributions include a thread pool plugin that provides an
     alternative thread-handling model designed to reduce overhead and
     improve performance.  The plugin implements a thread pool that
     increases server performance by efficiently managing statement
     execution threads for large numbers of client connections.  For
     more information, see *note thread-pool::.

   * MySQL Enterprise Audit

     MySQL Enterprise Edition now includes MySQL Enterprise Audit,
     implemented using a server plugin named 'audit_log'.  MySQL
     Enterprise Audit uses the open MySQL Audit API to enable standard,
     policy-based monitoring and logging of connection and query
     activity executed on specific MySQL servers.  Designed to meet the
     Oracle audit specification, MySQL Enterprise Audit provides an out
     of box, easy to use auditing and compliance solution for
     applications that are governed by both internal and external
     regulatory guidelines.  When installed, the audit plugin enables
     MySQL Server to produce a log file containing an audit record of
     server activity.  The log contents include when clients connect and
     disconnect, and what actions they perform while connected, such as
     which databases and tables they access.  For more information, see
     *note audit-log::.

   * Pluggable authentication

     MySQL authentication supports two new capabilities, pluggable
     authentication and proxy users.  With pluggable authentication, the
     server can use plugins to authenticate incoming client connections,
     and clients can load an authentication plugin that interacts
     properly with the corresponding server plugin.  This capability
     enables clients to connect to the MySQL server with credentials
     that are appropriate for authentication methods other than the
     built-in MySQL authentication based on native MySQL passwords
     stored in the 'mysql.user' table.  For example, plugins can be
     created to use external authentication methods such as LDAP,
     Kerberos, PAM, or Windows login IDs.  Proxy user capability enables
     a client who connects and authenticates as one user to be treated,
     for purposes of access control while connected, as having the
     privileges of a different user.  In effect, one user impersonates
     another.  Proxy capability depends on pluggable authentication
     because it is based on having an authentication plugin return to
     the server the user name that the connecting user impersonates.
     See *note pluggable-authentication::, and *note proxy-users::.

     As of MySQL 5.5.16, MySQL Enterprise Edition includes two plugins
     that enable MySQL Server to use external authentication methods to
     authenticate MySQL users:

        * PAM (Pluggable Authentication Modules) enables a system to
          access various kinds of authentication methods through a
          standard interface.  A PAM authentication plugin enables MySQL
          Server to use PAM to authenticate MySQL users.

        * Distributions of MySQL for Windows include an authentication
          plugin that enables MySQL Server to use native Windows
          services to authenticate client connections.  Users who have
          logged in to Windows can connect from MySQL client programs to
          the server based on the information in their environment
          without specifying an additional password.

     These authentication plugins enable MySQL Server to accept
     connections from users defined outside the MySQL grant tables.
     They also support the MySQL proxy-user capability.  Each plugin can
     return to MySQL a user name different from the operating system
     user, which means that the plugin can return the MySQL user that
     defines the privileges the externally authenticated user should
     have.

     For more information, see *note pam-pluggable-authentication::, and
     *note windows-pluggable-authentication::.

   * Multi-core scalability

     Scalability on multi-core CPUs is improved.  The trend in hardware
     development now is toward more cores rather than continued
     increases in CPU clock speeds, which renders 'wait until CPUs get
     faster' a nonviable means of improving database performance.
     Instead, it is necessary to make better use of multiple cores to
     maximally exploit the processing cycles they make available.  MySQL
     5.5 takes advantage of features of SMP systems and tries to
     eliminate bottlenecks in MySQL architecture that hinder full use of
     multiple cores.  The focus has been on *note 'InnoDB':
     innodb-storage-engine, especially locking and memory management.
     See *note smp-improvements::.

   * Default storage engine

     The default storage engine for new tables is 'InnoDB' rather than
     'MyISAM'.  See *note innodb-introduction::.

   * InnoDB I/O subsystem

     *note 'InnoDB': innodb-storage-engine. I/O subsystem changes enable
     more effective use of available I/O capacity.  See *note
     innodb-io-changes::.

   * InnoDB storage engine

     MySQL 5.5 includes several 'InnoDB' storage engine enhancements:

        * Indexes can be added or dropped without copying the table.
          See *note innodb-create-index::.

        * Tables can be compressed to significantly reduce storage
          requirements and I/O. See *note innodb-compression::.

        * 'BLOB', 'TEXT', and 'VARCHAR' columns can be stored fully off
          page.  See *note innodb-row-format::.

        * File format management enhancements protect upward and
          downward compatibility.  See *note innodb-file-format::.

        * 'INFORMATION_SCHEMA' tables provide information about 'InnoDB'
          compression and locking.  See *note
          innodb-information-schema::.

        * 'InnoDB' performance and scalability enhancements:

             * The 'InnoDB' mutex and read/write lock implementation was
               improved.  Use of Pthreads mutexes was replaced with
               calls to GCC - atomic builtins.

             * The memory allocator used by 'InnoDB' is configurable.
               See *note innodb-performance-use_sys_malloc::.

             * The extent to which 'InnoDB' performs change buffering is
               configurable.  See *note
               innodb-change-buffer-configuration::.

             * The adaptive hash index (AHI) feature makes 'InnoDB'
               perform more like an in-memory database on systems with
               appropriate combinations of workload and ample memory for
               the buffer pool, without sacrificing transactional
               features or reliability.  See *note
               innodb-adaptive-hash::.

             * Different techniques can be used to limit the number of
               concurrently executing operating system threads to
               minimize context switching.  See *note
               innodb-performance-thread_concurrency::.

             * How 'InnoDB' performs buffer pool read-ahead is
               configurable.  See *note innodb-performance-read_ahead::.

             * The number of background threads that service read and
               write I/O operations on data pages is configurable.  See
               *note innodb-performance-multiple_io_threads::.

             * Asynchronous I/O is supported on Linux systems.  See
               'innodb_use_native_aio'.

             * The I/O capacity available to 'InnoDB' is configurable.
               See *note innodb-configuring-io-capacity::.

             * How 'InnoDB' performs buffer pool flushing is
               configurable.  *note innodb-buffer-pool-flushing::.

             * The maximum delay between checking the availability of a
               mutex or rw-lock is configurable.  See *note
               innodb-performance-spin_lock_polling::.

             * 'InnoDB' can be configured to minimize the amount of data
               brought into the buffer pool and never accessed again.
               See *note innodb-performance-midpoint_insertion::.

             * Crash recovery performance was improved.  See *note
               optimizing-innodb-configuration-variables::.

             * Certain internal 'InnoDB' operations can be profiled
               using the Performance Schema feature.  See *note
               innodb-performance-schema::.

             * The buffer pool can be divided into separate instances to
               reduce contention between threads that read and write to
               cached pages.  See *note innodb-multiple-buffer-pools::.

             * The limit on concurrent read-write transactions was
               increased.  See *note innodb-undo-logs::.

             * 'InnoDB' can be configured to have purge operations
               performed by a separate thread, rather than by the master
               thread.  See *note innodb-purge-configuration::.

             * As of MySQL 5.5.62, the zlib library
               (http://www.zlib.net/) version bundled with MySQL was
               raised from version 1.2.3 to version 1.2.11.  MySQL
               implements compression with the help of the zlib library.

               If you use 'InnoDB' compressed tables, see *note
               upgrading-from-previous-series:: for related upgrade
               implications.

        * 'InnoDB' flexibility, ease of use, and reliability
          enhancements:

             * The 'innodb_file_per_table', 'innodb_stats_on_metadata',
               'innodb_lock_wait_timeout', and
               'innodb_adaptive_hash_index' options can be set at
               runtime using a *note 'SET': set-variable. statement.

             * Operating system disk space can be reclaimed when
               truncating an 'InnoDB' table.  See *note
               innodb-truncate-table-reclaim-space::.

             * 'InnoDB' can be run in strict mode.  See the
               'innodb_strict_mode' parameter documentation.

             * 'InnoDB' provides greater control over the quality of
               optimizer statistics estimates.  See *note
               innodb-statistics-estimation::.

             * 'SHOW ENGINE INNODB MUTEX' output is more compact.  See
               *note show-engine::.

             * 'SHOW ENGINE INNODB STATUS' output displays counter
               information for the 'Innodb_buffer_pool_read_ahead' and
               'Innodb_buffer_pool_read_ahead_evicted' global status
               variables, which you can use to fine-tune the
               'innodb_random_read_ahead' setting and evaluate the
               effectiveness of the read-ahead algorithm.

   * Diagnostic improvements

     There is better access to execution and performance information.
     Diagnostic improvements include Performance Schema (a feature for
     monitoring MySQL Server execution at a low level), DTrace probes,
     expanded *note 'SHOW ENGINE INNODB STATUS': show-engine. output,
     Debug Sync, and a new status variable.  See *note
     monitoring-improvements::.

   * Solaris

     Several modifications improve operation of MySQL Server on Solaris.
     See *note solaris-enhancements::.

   * MySQL NDB Cluster

     MySQL NDB Cluster is released as a separate product, with version
     7.2 of the *note 'NDB': mysql-cluster. storage engine being based
     on MySQL 5.5.  Clustering support is not available in mainline
     MySQL Server 5.5 releases.  For more information about MySQL NDB
     Cluster 7.2, see *note mysql-cluster::.

     NDB Cluster releases are identified by a 3-part NDB version number.
     NDB Cluster 7.5, now available as a General Availability (GA)
     release beginning with version 7.5.4, incorporates version 7.5 of
     the 'NDB' storage engine.  Previous GA releases still available for
     production, NDB Cluster 7.3 and NDB Cluster 7.4, incorporate 'NDB'
     versions 7.3 and 7.4, respectively.  For information about NDB
     Cluster 7.5, see MySQL NDB Cluster 7.5 and NDB Cluster 7.6
     (https://dev.mysql.com/doc/refman/5.7/en/mysql-cluster.html).  For
     more information about NDB Cluster 7.4 and NDB Cluster 7.3, see
     MySQL NDB Cluster 7.3 and NDB Cluster 7.4
     (https://dev.mysql.com/doc/refman/5.6/en/mysql-cluster.html).

   * Semisynchronous replication

     A commit performed on the master side blocks before returning to
     the session that performed the transaction until at least one slave
     acknowledges that it has received and logged the events for the
     transaction.  Semisynchronous replication is implemented through an
     optional plugin component.  See *note replication-semisync::

   * Unicode

     Support for supplementary Unicode characters; that is, characters
     outside the Basic Multilingual Plane (BMP). These new Unicode
     character sets include supplementary characters: 'utf16', 'utf32',
     and 'utf8mb4'.  See *note charset-unicode::.

   * Partitioning

     Enhancements to table partitioning:

        * Two new types of user-defined partitioning are supported:
          'RANGE COLUMNS' partitioning is an extension to 'RANGE'
          partitioning; 'LIST COLUMNS' partitioning is an extension to
          'LIST' partitioning.  Each of these extensions provides two
          enhancements to MySQL partitioning capabilities:

             * It is possible to define partitioning ranges or lists
               based on *note 'DATE': datetime, *note 'DATETIME':
               datetime, or string values (such as *note 'CHAR': char.
               or *note 'VARCHAR': char.).

               You can also define ranges or lists based on multiple
               column values when partitioning tables by 'RANGE COLUMNS'
               or 'LIST COLUMNS', respectively.  Such a range or list
               may refer to up to 16 columns.

             * For tables defined using these partitioning types,
               partition pruning can now optimize queries with 'WHERE'
               conditions that use multiple comparisons between
               (different) column values and constants, such as 'a = 10
               AND b > 5' or 'a < "2005-11-25" AND b = 10 AND c = 50'.

          See *note partitioning-range::, and *note partitioning-list::.

        * It is now possible to delete all rows from one or more
          partitions of a partitioned table using the *note 'ALTER TABLE
          ... TRUNCATE PARTITION': alter-table. statement.  Executing
          the statement deletes rows without affecting the structure of
          the table.  The partitions named in the 'TRUNCATE PARTITION'
          clause do not have to be contiguous.

        * Key caches are now supported for indexes on partitioned *note
          'MyISAM': myisam-storage-engine. tables, using the *note
          'CACHE INDEX': cache-index. and *note 'LOAD INDEX INTO CACHE':
          load-index. statements.  In addition, a key cache can be
          defined for and loaded with indexes from an entire partitioned
          table, or for one or more partitions.  In the latter case, the
          partitions are not required to be contiguous.

        * The new 'TO_SECONDS()' function converts a date or datetime
          expression to a number of seconds since the year 0.  This is a
          general-purpose function, but is useful for partitioning.  You
          may use it in partitioning expressions, and partition pruning
          is supported for tables defined using such expressions.

   * SIGNAL and RESIGNAL

     Support for the SQL standard *note 'SIGNAL': signal. and *note
     'RESIGNAL': resignal. statements.  See *note condition-handling::.

   * Metadata locking

     The server now prevents DDL statements from compromising
     transaction serializibility by using a new class of locks called
     metadata locks.  See *note metadata-locking::.

   * IPv6 support

     MySQL Server can accept TCP/IP connections from clients connecting
     over IPv6.  See *note ipv6-support::.

   * XML

     Enhancements to XML functionality, including a new *note 'LOAD
     XML': load-xml. statement.  See *note load-xml::.

   * Build configuration

     MySQL releases are now built using 'CMake' rather than the GNU
     autotools.  Accordingly, the instructions for installing MySQL from
     source have been updated to discuss how to build MySQL using
     'CMake'.  See *note source-installation::.

     The build process is now similar enough on all platforms, including
     Windows, that there are no longer sections dedicated to notes for
     specific platforms.

*Features Deprecated in MySQL 5.5*

The following features are deprecated in MySQL 5.5 and may be or will be
removed in a future series.  Where alternatives are shown, applications
should be updated to use them.

For applications that use features deprecated in MySQL 5.5 that have
been removed in a higher MySQL series, statements may fail when
replicated from a MySQL 5.5 master to a higher-series slave, or may have
different effects on master and slave.  To avoid such problems,
applications that use features deprecated in 5.5 should be revised to
avoid them and use alternatives when possible.

   * Relying on implicit 'GROUP BY' sorting in MySQL 5.5 is deprecated.
     To achieve a specific sort order of grouped results, it is
     preferable to use an explicit 'ORDER BY' clause.  'GROUP BY'
     sorting is a MySQL extension that may change in a future release;
     for example, to make it possible for the optimizer to order
     groupings in whatever manner it deems most efficient and to avoid
     the sorting overhead.

   * The *note 'YEAR(2)': year. data type.  'YEAR(2)' columns in
     existing tables are treated as before, but 'YEAR(2)' in new or
     altered tables are converted to 'YEAR(4)'.  For more information,
     see *note migrating-from-year2::.

     The 'SHOW AUTHORS' and 'SHOW CONTRIBUTORS' statements.

   * The 'ignore_builtin_innodb' system variable.  It does nothing and
     has no effect.

   * The '--language' server option.  Use the 'lc_messages_dir' and
     'lc_messages' sytem variables instead.

   * The 'ALWAYS' value for the '--base64-output' option for *note
     'mysqlbinlog': mysqlbinlog.

   * The '--config-file' option for *note 'mysqld_multi': mysqld-multi.
     Use '--defaults-extra-file' instead.

   * Use of unambigious option prefixes.  If an unambiguous prefix is
     given, a warning occurs to provide feedback.  Option prefixes are
     no longer supported in MySQL 5.7; only full options are accepted.

   * The 'engine_condition_pushdown' system variable.  Use the
     'engine_condition_pushdown' flag of the 'optimizer_switch' variable
     instead.

   * The 'timed_mutexes' system variable.  It does nothing and has no
     effect.

   * The 'storage_engine' system variable.  Use 'default_storage_engine'
     instead.

   * Use of the data directory as the location for 'my.cnf'.

*Features Removed in MySQL 5.5*

The following constructs are obsolete and have been removed in MySQL
5.5.  Where alternatives are shown, applications should be updated to
use them.

For MySQL 5.1 applications that use features removed in MySQL 5.5,
statements may fail when replicated from a MySQL 5.1 master to a MySQL
5.5 slave, or may have different effects on master and slave.  To avoid
such problems, applications that use features removed in MySQL 5.5
should be revised to avoid them and use alternatives when possible.

   * The 'language' system variable (use 'lc_messages_dir' and
     'lc_messages').

   * The 'log_bin_trust_routine_creators' system variable (use
     'log_bin_trust_function_creators').

   * The 'myisam_max_extra_sort_file_size' system variable.

   * The 'record_buffer' system variable (use 'read_buffer_size').

   * The 'sql_log_update' system variable.

   * The 'Innodb_buffer_pool_read_ahead_rnd' and
     'Innodb_buffer_pool_read_ahead_seq' status variables (use
     'Innodb_buffer_pool_read_ahead' and
     'Innodb_buffer_pool_read_ahead_evicted').

   * The 'table_lock_wait_timeout' system variable.

   * The 'table_type' system variable (use 'default_storage_engine').

   * The 'FRAC_SECOND' modifier for the 'TIMESTAMPADD()' function (use
     'MICROSECOND').

   * The 'TYPE' table option to specify the storage engine for *note
     'CREATE TABLE': create-table. or *note 'ALTER TABLE': alter-table.
     (use 'ENGINE').

   * The 'SHOW TABLE TYPES' SQL statement (use *note 'SHOW ENGINES':
     show-engines.).

   * The 'SHOW INNODB STATUS' and 'SHOW MUTEX STATUS' SQL statements
     (use *note 'SHOW ENGINE INNODB STATUS': show-engine. and *note
     'SHOW ENGINE INNODB MUTEX': show-engine.).

   * The 'SHOW PLUGIN' SQL statement (use *note 'SHOW PLUGINS':
     show-plugins.).

   * The 'LOAD TABLE ... FROM MASTER' and 'LOAD DATA FROM MASTER' SQL
     statements (use *note 'mysqldump': mysqldump. or *note
     'mysqlhotcopy': mysqlhotcopy. to dump tables and *note 'mysql':
     mysql. to reload dump files).

   * The 'BACKUP TABLE' and 'RESTORE TABLE' SQL statements (use *note
     'mysqldump': mysqldump. or *note 'mysqlhotcopy': mysqlhotcopy. to
     dump tables and *note 'mysql': mysql. to reload dump files).

   * *note 'TIMESTAMP(N)': datetime. data type: The ability to specify a
     display width of N (use without N).

   * The '--default-character-set' and '--default-collation' server
     options (use the 'character_set_server' and 'collation_server'
     system variables).

   * The '--default-table-type' server option (use the
     'default_storage_engine' system variable).

   * The '--delay-key-write-for-all-tables' server option (set the
     'delay_key_write' system variable to 'ALL').

   * The '--enable-locking' and '--skip-locking' server options (use
     '--external-locking' and '--skip-external-locking').

   * The '--log-long-format' server option.

   * The '--log-update' server option.

   * The '--master-XXX' server options to set replication parameters
     (use the *note 'CHANGE MASTER TO': change-master-to. statement
     instead): '--master-host', '--master-user', '--master-password',
     '--master-port', '--master-connect-retry', '--master-ssl',
     '--master-ssl-ca', '--master-ssl-capath', '--master-ssl-cert',
     '--master-ssl-cipher', '--master-ssl-key'.

   * The '--safe-show-database' server option.

   * The '--skip-symlink' and '--use-symbolic-links' server options (use
     '--skip-symbolic-links' and '--symbolic-links').

   * The '--sql-bin-update-same' server option.

   * The '--warnings' server option (use '--log-warnings').

   * The '--no-named-commands' option for *note 'mysql': mysql. (use
     '--skip-named-commands').

   * The '--no-pager' option for *note 'mysql': mysql. (use
     '--skip-pager').

   * The '--no-tee' option for *note 'mysql': mysql. (use '--skip-tee').

   * The '--position' option for *note 'mysqlbinlog': mysqlbinlog. (use
     '--start-position').

   * The '--all' option for *note 'mysqldump': mysqldump. (use
     '--create-options').

   * The '--first-slave' option for *note 'mysqldump': mysqldump. (use
     '--lock-all-tables').

   * The '--config-file' option for *note 'mysqld_multi': mysqld-multi.
     (use '--defaults-extra-file').

   * The '--set-variable=VAR_NAME=VALUE' and '-O VAR_NAME=VALUE'
     general-purpose options for setting program variables (use
     '--VAR_NAME=VALUE').

   * The '--with-pstack' option for 'configure' and the
     '--enable-pstack' option for *note 'mysqld': mysqld.

*Scalability Improvements*

MySQL 5.5 modifications improve performance on SMP systems to increase
scalability on multi-core systems.  The changes affect *note 'InnoDB':
innodb-storage-engine. locking and memory management.

MySQL 5.5 incorporates changes in *note 'InnoDB': innodb-storage-engine.
that improve the performance of RW-locks by using atomic CPU
instructions (on platforms where they are available), rather than less
scalable mutexes.  It is also possible for *note 'InnoDB':
innodb-storage-engine. memory allocation to be disabled and replaced by
the normal 'malloc' library, or by a different library that implements
'malloc' such as 'tcmalloc' on Linux or 'mtalloc' on Solaris.

The reimplementation of RW-locks requires atomic instructions.  A status
variable, 'Innodb_have_atomic_builtins', shows whether the server was
built with atomic instructions.

*InnoDB I/O Subsystem Changes*

MySQL 5.5 changes to the *note 'InnoDB': innodb-storage-engine. I/O
subsystem enable more effective use of available I/O capacity.  The
changes also provide more control over configuration of the I/O
subsystem.

*Background I/O Threads*

*note 'InnoDB': innodb-storage-engine. uses background threads to
perform I/O for several kinds of activities, two of which are
prefetching disk blocks and flushing dirty pages.  Previously, *note
'InnoDB': innodb-storage-engine. used only one thread each to perform
these activities, but that can underutilize server capacity.  MySQL 5.5
enables use of multiple background read and write threads, making it
possible to read and write pages faster.

The patch makes the number of background I/O threads configurable using
system variables: 'innodb_read_io_threads' controls the number of
threads to use for read prefetch requests.  'innodb_write_io_threads'
controls the number of threads to use for writing dirty pages from the
buffer cache to disk.  The default for both variables is 4.

The ability to increase the number of I/O threads can benefit systems
that use multiple disks for *note 'InnoDB': innodb-storage-engine.
However, the type of I/O being done should be considered.  On systems
that use buffered writes rather than direct writes, increasing the write
thread count higher than 1 might yield little benefit because writes
will be quick already.

*Adjustable I/O Rate*

Previously, the number of input/output operations per second (IOPS) that
*note 'InnoDB': innodb-storage-engine. will perform was a compile-time
parameter.  The rate was chosen to prevent background I/O from
exhausting server capacity and the compiled-in value of 100 reflected an
assumption that the server can perform 100 IOPS. However, many modern
systems can exceed this, so the value is low and unnecessarily restricts
I/O utilization.

MySQL 5.5 exposes this I/O rate parameter as a system variable,
'innodb_io_capacity'.  This variable can be set at server startup, which
enables higher values to be selected for systems capable of higher I/O
rates.  Having a higher I/O rate can help the server handle a higher
rate of row changes because it may be able to increase dirty-page
flushing, deleted-row removal, and application of changes in the change
buffer.  The default value of 'innodb_io_capacity' is 200.  In general,
you can increase the value as a function of the number of drives used
for *note 'InnoDB': innodb-storage-engine. I/O.

The ability to raise the I/O limit should be especially beneficial on
platforms that support many IOPS. For example, systems that use multiple
disks or solid-state disks for *note 'InnoDB': innodb-storage-engine.
are likely to benefit from the ability to control this parameter.

*Diagnostic and Monitoring Capabilities*

MySQL 5.5 provides improved access to execution and performance
information.  Diagnostic improvements include Performance Schema, Dtrace
probes, expanded *note 'SHOW ENGINE INNODB STATUS': show-engine. output,
Debug Sync, and a new status variable.

*Performance Schema*

Performance Schema is a feature for monitoring MySQL Server execution at
a low level.  See *note performance-schema::.

*DTrace Support*

The DTrace probes work on Solaris, OS X, and FreeBSD. For information on
using DTrace in MySQL, see *note dba-dtrace-server::.

*Enhanced *note 'SHOW ENGINE INNODB STATUS': show-engine. Output*

The output from *note 'SHOW ENGINE INNODB STATUS': show-engine. includes
more information due to changes made for 'InnoDB Plugin'.  A description
of revisions to statement output follows.

A new 'BACKGROUND THREAD' section has 'srv_master_thread' lines that
show work done by the main background thread.

     ----------
     BACKGROUND THREAD
     ----------
     srv_master_thread loops: 53 1_second, 44 sleeps, 5 10_second, 7 background,
       7 flush
     srv_master_thread log flush and writes: 48

The 'SEMAPHORES' section includes a line to show the number of spinlock
rounds per OS wait for a mutex.

     ----------
     SEMAPHORES
     ----------
     ...
     Spin rounds per wait: 0.00 mutex, 20.00 RW-shared, 0.00 RW-excl

*Debug Sync*

The Debug Sync facility provides synchronization points for debugging,
see MySQL Internals: Test Synchronization
(https://dev.mysql.com/doc/internals/en/test-synchronization.html).

*New Status Variable*

The 'Innodb_have_atomic_builtins' status variable provides information
about availability of atomic instructions; see *note smp-improvements::.

*Enhanced Solaris Support*

MySQL 5.5 incorporates several modifications for improved operation of
MySQL Server on Solaris:

   * DTrace support for execution monitoring.  See *note
     monitoring-improvements::.

   * Atomic instructions, which are needed for the improvements to
     RW-locking described in *note smp-improvements::.  Atomic
     instructions now are supported for Sun Studio on SPARC and x86
     platforms.  This extends their previous availability (supported for
     'gcc' 4.1 and up on all platforms).

   * The SMP improvements described in *note smp-improvements::, were
     originally intended for x86 platforms.  In MySQL 5.5, these also
     work on SPARC platforms.  Also, Solaris optimizations have been
     implemented.

   * Large page support is enhanced for recent SPARC platforms.
     Standard use of large pages in MySQL attempts to use the largest
     size supported, up to 4MB. Under Solaris, a 'super large pages'
     feature enables uses of pages up to 256MB. This feature can be
     enabled or disabled by using the '--super-large-pages' or
     '--skip-super-large-pages' option.

   * Inline handling for *note 'InnoDB': innodb-storage-engine. and
     processor instruction prefetching support, previously not enabled
     for builds created using Sun Studio, now are supported for that
     build environment.



## 1.5 MySQL Information Sources
=============================

This section lists sources of additional information that you may find
helpful, such as MySQL websites, mailing lists, user forums, and
Internet Relay Chat.


1.5.1 MySQL Websites
--------------------

The primary website for MySQL documentation is
<https://dev.mysql.com/doc/>.  Online and downloadable documentation
formats are available for the MySQL Reference Manual, MySQL Connectors,
and more.

The MySQL developers provide information about new and upcoming features
as the MySQL Server Blog (http://mysqlserverteam.com/).


1.5.2 MySQL Community Support at the MySQL Forums
-------------------------------------------------

The forums at <http://forums.mysql.com> are an important community
resource.  Many forums are available, grouped into these general
categories:

   * Migration

   * MySQL Usage

   * MySQL Connectors

   * Programming Languages

   * Tools

   * 3rd-Party Applications

   * Storage Engines

   * MySQL Technology

   * SQL Standards

   * Business


File: manual.info.tmp,  Node: mysql-enterprise-information,  Prev: forums,  Up: information-sources

1.5.3 MySQL Enterprise
----------------------

Oracle offers technical support in the form of MySQL Enterprise.  For
organizations that rely on the MySQL DBMS for business-critical
production applications, MySQL Enterprise is a commercial subscription
offering which includes:

   * MySQL Enterprise Server

   * MySQL Enterprise Monitor

   * Monthly Rapid Updates and Quarterly Service Packs

   * MySQL Knowledge Base

   * 24x7 Technical and Consultative Support

MySQL Enterprise is available in multiple tiers, giving you the
flexibility to choose the level of service that best matches your needs.
For more information, see MySQL Enterprise
(https://www.mysql.com/products/enterprise/).


File: manual.info.tmp,  Node: bug-reports,  Next: compatibility,  Prev: information-sources,  Up: introduction

1.6 How to Report Bugs or Problems
==================================

Before posting a bug report about a problem, please try to verify that
it is a bug and that it has not been reported already:

   * Start by searching the MySQL online manual at
     <https://dev.mysql.com/doc/>.  We try to keep the manual up to date
     by updating it frequently with solutions to newly found problems.
     In addition, the release notes accompanying the manual can be
     particularly useful since it is quite possible that a newer version
     contains a solution to your problem.  The release notes are
     available at the location just given for the manual.

   * If you get a parse error for an SQL statement, please check your
     syntax closely.  If you cannot find something wrong with it, it is
     extremely likely that your current version of MySQL Server doesn't
     support the syntax you are using.  If you are using the current
     version and the manual doesn't cover the syntax that you are using,
     MySQL Server doesn't support your statement.

     If the manual covers the syntax you are using, but you have an
     older version of MySQL Server, you should check the MySQL change
     history to see when the syntax was implemented.  In this case, you
     have the option of upgrading to a newer version of MySQL Server.

   * For solutions to some common problems, see *note problems::.

   * Search the bugs database at <http://bugs.mysql.com/> to see whether
     the bug has been reported and fixed.

   * You can also use <http://www.mysql.com/search/> to search all the
     Web pages (including the manual) that are located at the MySQL
     website.

If you cannot find an answer in the manual, the bugs database, or the
mailing list archives, check with your local MySQL expert.  If you still
cannot find an answer to your question, please use the following
guidelines for reporting the bug.

The normal way to report bugs is to visit <http://bugs.mysql.com/>,
which is the address for our bugs database.  This database is public and
can be browsed and searched by anyone.  If you log in to the system, you
can enter new reports.

Bugs posted in the bugs database at <http://bugs.mysql.com/> that are
corrected for a given release are noted in the release notes.

If you find a security bug in MySQL Server, please let us know
immediately by sending an email message to <secalert_us@oracle.com>.
Exception: Support customers should report all problems, including
security bugs, to Oracle Support at <http://support.oracle.com/>.

To discuss problems with other users, you can use the MySQL Community
Slack (https://mysqlcommunity.slack.com/).

Writing a good bug report takes patience, but doing it right the first
time saves time both for us and for yourself.  A good bug report,
containing a full test case for the bug, makes it very likely that we
will fix the bug in the next release.  This section helps you write your
report correctly so that you do not waste your time doing things that
may not help us much or at all.  Please read this section carefully and
make sure that all the information described here is included in your
report.

Preferably, you should test the problem using the latest production or
development version of MySQL Server before posting.  Anyone should be
able to repeat the bug by just using 'mysql test < script_file' on your
test case or by running the shell or Perl script that you include in the
bug report.  Any bug that we are able to repeat has a high chance of
being fixed in the next MySQL release.

It is most helpful when a good description of the problem is included in
the bug report.  That is, give a good example of everything you did that
led to the problem and describe, in exact detail, the problem itself.
The best reports are those that include a full example showing how to
reproduce the bug or problem.  See *note porting::.

Remember that it is possible for us to respond to a report containing
too much information, but not to one containing too little.  People
often omit facts because they think they know the cause of a problem and
assume that some details do not matter.  A good principle to follow is
that if you are in doubt about stating something, state it.  It is
faster and less troublesome to write a couple more lines in your report
than to wait longer for the answer if we must ask you to provide
information that was missing from the initial report.

The most common errors made in bug reports are (a) not including the
version number of the MySQL distribution that you use, and (b) not fully
describing the platform on which the MySQL server is installed
(including the platform type and version number).  These are highly
relevant pieces of information, and in 99 cases out of 100, the bug
report is useless without them.  Very often we get questions like, 'Why
doesn't this work for me?' Then we find that the feature requested
wasn't implemented in that MySQL version, or that a bug described in a
report has been fixed in newer MySQL versions.  Errors often are
platform-dependent.  In such cases, it is next to impossible for us to
fix anything without knowing the operating system and the version number
of the platform.

If you compiled MySQL from source, remember also to provide information
about your compiler if it is related to the problem.  Often people find
bugs in compilers and think the problem is MySQL-related.  Most
compilers are under development all the time and become better version
by version.  To determine whether your problem depends on your compiler,
we need to know what compiler you used.  Note that every compiling
problem should be regarded as a bug and reported accordingly.

If a program produces an error message, it is very important to include
the message in your report.  If we try to search for something from the
archives, it is better that the error message reported exactly matches
the one that the program produces.  (Even the lettercase should be
observed.)  It is best to copy and paste the entire error message into
your report.  You should never try to reproduce the message from memory.

If you have a problem with Connector/ODBC (MyODBC), please try to
generate a trace file and send it with your report.  See How to Report
Connector/ODBC Problems or Bugs
(https://dev.mysql.com/doc/connector-odbc/en/connector-odbc-support-bug-report.html).

If your report includes long query output lines from test cases that you
run with the *note 'mysql': mysql. command-line tool, you can make the
output more readable by using the '--vertical' option or the '\G'
statement terminator.  The *note 'EXPLAIN SELECT': explain. example
later in this section demonstrates the use of '\G'.

Please include the following information in your report:

   * The version number of the MySQL distribution you are using (for
     example, MySQL 5.7.10).  You can find out which version you are
     running by executing *note 'mysqladmin version': mysqladmin.  The
     *note 'mysqladmin': mysqladmin. program can be found in the 'bin'
     directory under your MySQL installation directory.

   * The manufacturer and model of the machine on which you experience
     the problem.

   * The operating system name and version.  If you work with Windows,
     you can usually get the name and version number by double-clicking
     your My Computer icon and pulling down the 'Help/About Windows'
     menu.  For most Unix-like operating systems, you can get this
     information by executing the command 'uname -a'.

   * Sometimes the amount of memory (real and virtual) is relevant.  If
     in doubt, include these values.

   * The contents of the 'docs/INFO_BIN' file from your MySQL
     installation.  This file contains information about how MySQL was
     configured and compiled.

   * If you are using a source distribution of the MySQL software,
     include the name and version number of the compiler that you used.
     If you have a binary distribution, include the distribution name.

   * If the problem occurs during compilation, include the exact error
     messages and also a few lines of context around the offending code
     in the file where the error occurs.

   * If *note 'mysqld': mysqld. died, you should also report the
     statement that crashed *note 'mysqld': mysqld.  You can usually get
     this information by running *note 'mysqld': mysqld. with query
     logging enabled, and then looking in the log after *note 'mysqld':
     mysqld. crashes.  See *note porting::.

   * If a database table is related to the problem, include the output
     from the 'SHOW CREATE TABLE DB_NAME.TBL_NAME' statement in the bug
     report.  This is a very easy way to get the definition of any table
     in a database.  The information helps us create a situation
     matching the one that you have experienced.

   * The SQL mode in effect when the problem occurred can be
     significant, so please report the value of the 'sql_mode' system
     variable.  For stored procedure, stored function, and trigger
     objects, the relevant 'sql_mode' value is the one in effect when
     the object was created.  For a stored procedure or function, the
     *note 'SHOW CREATE PROCEDURE': show-create-procedure. or *note
     'SHOW CREATE FUNCTION': show-create-function. statement shows the
     relevant SQL mode, or you can query 'INFORMATION_SCHEMA' for the
     information:

          SELECT ROUTINE_SCHEMA, ROUTINE_NAME, SQL_MODE
          FROM INFORMATION_SCHEMA.ROUTINES;

     For triggers, you can use this statement:

          SELECT EVENT_OBJECT_SCHEMA, EVENT_OBJECT_TABLE, TRIGGER_NAME, SQL_MODE
          FROM INFORMATION_SCHEMA.TRIGGERS;

   * For performance-related bugs or problems with *note 'SELECT':
     select. statements, you should always include the output of
     'EXPLAIN SELECT ...', and at least the number of rows that the
     *note 'SELECT': select. statement produces.  You should also
     include the output from 'SHOW CREATE TABLE TBL_NAME' for each table
     that is involved.  The more information you provide about your
     situation, the more likely it is that someone can help you.

     The following is an example of a very good bug report.  The
     statements are run using the *note 'mysql': mysql. command-line
     tool.  Note the use of the '\G' statement terminator for statements
     that would otherwise provide very long output lines that are
     difficult to read.

          mysql> SHOW VARIABLES;
          mysql> SHOW COLUMNS FROM ...\G
                 <OUTPUT FROM SHOW COLUMNS>
          mysql> EXPLAIN SELECT ...\G
                 <OUTPUT FROM EXPLAIN>
          mysql> FLUSH STATUS;
          mysql> SELECT ...;
                 <A SHORT VERSION OF THE OUTPUT FROM SELECT,
                 INCLUDING THE TIME TAKEN TO RUN THE QUERY>
          mysql> SHOW STATUS;
                 <OUTPUT FROM SHOW STATUS>

   * If a bug or problem occurs while running *note 'mysqld': mysqld,
     try to provide an input script that reproduces the anomaly.  This
     script should include any necessary source files.  The more closely
     the script can reproduce your situation, the better.  If you can
     make a reproducible test case, you should upload it to be attached
     to the bug report.

     If you cannot provide a script, you should at least include the
     output from *note 'mysqladmin variables extended-status
     processlist': mysqladmin. in your report to provide some
     information on how your system is performing.

   * If you cannot produce a test case with only a few rows, or if the
     test table is too big to be included in the bug report (more than
     10 rows), you should dump your tables using *note 'mysqldump':
     mysqldump. and create a 'README' file that describes your problem.
     Create a compressed archive of your files using 'tar' and 'gzip' or
     'zip'.  After you initiate a bug report for our bugs database at
     <http://bugs.mysql.com/>, click the Files tab in the bug report for
     instructions on uploading the archive to the bugs database.

   * If you believe that the MySQL server produces a strange result from
     a statement, include not only the result, but also your opinion of
     what the result should be, and an explanation describing the basis
     for your opinion.

   * When you provide an example of the problem, it is better to use the
     table names, variable names, and so forth that exist in your actual
     situation than to come up with new names.  The problem could be
     related to the name of a table or variable.  These cases are rare,
     perhaps, but it is better to be safe than sorry.  After all, it
     should be easier for you to provide an example that uses your
     actual situation, and it is by all means better for us.  If you
     have data that you do not want to be visible to others in the bug
     report, you can upload it using the Files tab as previously
     described.  If the information is really top secret and you do not
     want to show it even to us, go ahead and provide an example using
     other names, but please regard this as the last choice.

   * Include all the options given to the relevant programs, if
     possible.  For example, indicate the options that you use when you
     start the *note 'mysqld': mysqld. server, as well as the options
     that you use to run any MySQL client programs.  The options to
     programs such as *note 'mysqld': mysqld. and *note 'mysql': mysql,
     and to the 'configure' script, are often key to resolving problems
     and are very relevant.  It is never a bad idea to include them.  If
     your problem involves a program written in a language such as Perl
     or PHP, please include the language processor's version number, as
     well as the version for any modules that the program uses.  For
     example, if you have a Perl script that uses the 'DBI' and
     'DBD::mysql' modules, include the version numbers for Perl, 'DBI',
     and 'DBD::mysql'.

   * If your question is related to the privilege system, please include
     the output of *note 'mysqladmin reload': mysqladmin, and all the
     error messages you get when trying to connect.  When you test your
     privileges, you should execute *note 'mysqladmin reload version':
     mysqladmin. and try to connect with the program that gives you
     trouble.

   * If you have a patch for a bug, do include it.  But do not assume
     that the patch is all we need, or that we can use it, if you do not
     provide some necessary information such as test cases showing the
     bug that your patch fixes.  We might find problems with your patch
     or we might not understand it at all.  If so, we cannot use it.

     If we cannot verify the exact purpose of the patch, we will not use
     it.  Test cases help us here.  Show that the patch handles all the
     situations that may occur.  If we find a borderline case (even a
     rare one) where the patch will not work, it may be useless.

   * Guesses about what the bug is, why it occurs, or what it depends on
     are usually wrong.  Even the MySQL team cannot guess such things
     without first using a debugger to determine the real cause of a
     bug.

   * Indicate in your bug report that you have checked the reference
     manual and mail archive so that others know you have tried to solve
     the problem yourself.

   * If your data appears corrupt or you get errors when you access a
     particular table, first check your tables with *note 'CHECK TABLE':
     check-table.  If that statement reports any errors:

        * The 'InnoDB' crash recovery mechanism handles cleanup when the
          server is restarted after being killed, so in typical
          operation there is no need to 'repair' tables.  If you
          encounter an error with 'InnoDB' tables, restart the server
          and see whether the problem persists, or whether the error
          affected only cached data in memory.  If data is corrupted on
          disk, consider restarting with the 'innodb_force_recovery'
          option enabled so that you can dump the affected tables.

        * For non-transactional tables, try to repair them with *note
          'REPAIR TABLE': repair-table. or with *note 'myisamchk':
          myisamchk.  See *note server-administration::.

     If you are running Windows, please verify the value of
     'lower_case_table_names' using the 'SHOW VARIABLES LIKE
     'lower_case_table_names'' statement.  This variable affects how the
     server handles lettercase of database and table names.  Its effect
     for a given value should be as described in *note
     identifier-case-sensitivity::.

   * If you often get corrupted tables, you should try to find out when
     and why this happens.  In this case, the error log in the MySQL
     data directory may contain some information about what happened.
     (This is the file with the '.err' suffix in the name.)  See *note
     error-log::.  Please include any relevant information from this
     file in your bug report.  Normally *note 'mysqld': mysqld. should
     _never_ crash a table if nothing killed it in the middle of an
     update.  If you can find the cause of *note 'mysqld': mysqld.
     dying, it is much easier for us to provide you with a fix for the
     problem.  See *note what-is-crashing::.

   * If possible, download and install the most recent version of MySQL
     Server and check whether it solves your problem.  All versions of
     the MySQL software are thoroughly tested and should work without
     problems.  We believe in making everything as backward-compatible
     as possible, and you should be able to switch MySQL versions
     without difficulty.  See *note which-version::.


File: manual.info.tmp,  Node: compatibility,  Next: credits,  Prev: bug-reports,  Up: introduction

1.7 MySQL Standards Compliance
==============================

* Menu:

* extensions-to-ansi::           MySQL Extensions to Standard SQL
* differences-from-ansi::        MySQL Differences from Standard SQL
* constraints::                  How MySQL Deals with Constraints

This section describes how MySQL relates to the ANSI/ISO SQL standards.
MySQL Server has many extensions to the SQL standard, and here you can
find out what they are and how to use them.  You can also find
information about functionality missing from MySQL Server, and how to
work around some of the differences.

The SQL standard has been evolving since 1986 and several versions
exist.  In this manual, 'SQL-92' refers to the standard released in
1992.  'SQL:1999', 'SQL:2003', 'SQL:2008', and 'SQL:2011' refer to the
versions of the standard released in the corresponding years, with the
last being the most recent version.  We use the phrase 'the SQL
standard' or 'standard SQL' to mean the current version of the SQL
Standard at any time.

One of our main goals with the product is to continue to work toward
compliance with the SQL standard, but without sacrificing speed or
reliability.  We are not afraid to add extensions to SQL or support for
non-SQL features if this greatly increases the usability of MySQL Server
for a large segment of our user base.  The *note 'HANDLER': handler.
interface is an example of this strategy.  See *note handler::.

We continue to support transactional and nontransactional databases to
satisfy both mission-critical 24/7 usage and heavy Web or logging usage.

MySQL Server was originally designed to work with medium-sized databases
(10-100 million rows, or about 100MB per table) on small computer
systems.  Today MySQL Server handles terabyte-sized databases, but the
code can also be compiled in a reduced version suitable for hand-held
and embedded devices.  The compact design of the MySQL server makes
development in both directions possible without any conflicts in the
source tree.

We are not targeting real-time support, although MySQL replication
capabilities offer significant functionality.

MySQL supports ODBC levels 0 to 3.51.

MySQL supports high-availability database clustering using the *note
'NDBCLUSTER': mysql-cluster. storage engine.  See *note mysql-cluster::.

We are implementing XML functionality beginning in MySQL 5.1, which
supports most of the W3C XPath standard.  See *note xml-functions::.

*Selecting SQL Modes*

The MySQL server can operate in different SQL modes, and can apply these
modes differently for different clients, depending on the value of the
'sql_mode' system variable.  DBAs can set the global SQL mode to match
site server operating requirements, and each application can set its
session SQL mode to its own requirements.

Modes affect the SQL syntax MySQL supports and the data validation
checks it performs.  This makes it easier to use MySQL in different
environments and to use MySQL together with other database servers.

For more information on setting the SQL mode, see *note sql-mode::.

*Running MySQL in ANSI Mode*

To run MySQL Server in ANSI mode, start *note 'mysqld': mysqld. with the
'--ansi' option.  Running the server in ANSI mode is the same as
starting it with the following options:

     --transaction-isolation=SERIALIZABLE --sql-mode=ANSI

To achieve the same effect at runtime, execute these two statements:

     SET GLOBAL TRANSACTION ISOLATION LEVEL SERIALIZABLE;
     SET GLOBAL sql_mode = 'ANSI';

You can see that setting the 'sql_mode' system variable to ''ANSI''
enables all SQL mode options that are relevant for ANSI mode as follows:

     mysql> SET GLOBAL sql_mode='ANSI';
     mysql> SELECT @@GLOBAL.sql_mode;
             -> 'REAL_AS_FLOAT,PIPES_AS_CONCAT,ANSI_QUOTES,IGNORE_SPACE,ANSI'

Running the server in ANSI mode with '--ansi' is not quite the same as
setting the SQL mode to ''ANSI'' because the '--ansi' option also sets
the transaction isolation level.

See *note server-options::.


File: manual.info.tmp,  Node: extensions-to-ansi,  Next: differences-from-ansi,  Prev: compatibility,  Up: compatibility

1.7.1 MySQL Extensions to Standard SQL
--------------------------------------

MySQL Server supports some extensions that you probably will not find in
other SQL DBMSs.  Be warned that if you use them, your code will not be
portable to other SQL servers.  In some cases, you can write code that
includes MySQL extensions, but is still portable, by using comments of
the following form:

     /*! MYSQL-SPECIFIC CODE */

In this case, MySQL Server parses and executes the code within the
comment as it would any other SQL statement, but other SQL servers will
ignore the extensions.  For example, MySQL Server recognizes the
'STRAIGHT_JOIN' keyword in the following statement, but other servers
will not:

     SELECT /*! STRAIGHT_JOIN */ col1 FROM table1,table2 WHERE ...

If you add a version number after the '!' character, the syntax within
the comment is executed only if the MySQL version is greater than or
equal to the specified version number.  The 'KEY_BLOCK_SIZE' clause in
the following comment is executed only by servers from MySQL 5.1.10 or
higher:

     CREATE TABLE t1(a INT, KEY (a)) /*!50110 KEY_BLOCK_SIZE=1024 */;

The following descriptions list MySQL extensions, organized by category.

   * Organization of data on disk

     MySQL Server maps each database to a directory under the MySQL data
     directory, and maps tables within a database to file names in the
     database directory.  This has a few implications:

        * 
          Database and table names are case-sensitive in MySQL Server on
          operating systems that have case-sensitive file names (such as
          most Unix systems).  See *note identifier-case-sensitivity::.

        * You can use standard system commands to back up, rename, move,
          delete, and copy tables that are managed by the 'MyISAM'
          storage engine.  For example, it is possible to rename a
          'MyISAM' table by renaming the '.MYD', '.MYI', and '.frm'
          files to which the table corresponds.  (Nevertheless, it is
          preferable to use *note 'RENAME TABLE': rename-table. or
          'ALTER TABLE ... RENAME' and let the server rename the files.)

   * General language syntax

        * By default, strings can be enclosed by '"' as well as '''.  If
          the 'ANSI_QUOTES' SQL mode is enabled, strings can be enclosed
          only by ''' and the server interprets strings enclosed by '"'
          as identifiers.

        * '\' is the escape character in strings.

        * In SQL statements, you can access tables from different
          databases with the DB_NAME.TBL_NAME syntax.  Some SQL servers
          provide the same functionality but call this 'User space'.
          MySQL Server doesn't support tablespaces such as used in
          statements like this: 'CREATE TABLE ralph.my_table ... IN
          my_tablespace'.

   * SQL statement syntax

        * The *note 'ANALYZE TABLE': analyze-table, *note 'CHECK TABLE':
          check-table, *note 'OPTIMIZE TABLE': optimize-table, and *note
          'REPAIR TABLE': repair-table. statements.

        * The *note 'CREATE DATABASE': create-database, *note 'DROP
          DATABASE': drop-database, and *note 'ALTER DATABASE':
          alter-database. statements.  See *note create-database::,
          *note drop-database::, and *note alter-database::.

        * The *note 'DO': do. statement.

        * *note 'EXPLAIN SELECT': explain. to obtain a description of
          how tables are processed by the query optimizer.

        * The *note 'FLUSH': flush. and *note 'RESET': reset.
          statements.

        * The *note 'SET': set-variable. statement.  See *note
          set-variable::.

        * The *note 'SHOW': show. statement.  See *note show::.  The
          information produced by many of the MySQL-specific *note
          'SHOW': show. statements can be obtained in more standard
          fashion by using *note 'SELECT': select. to query
          'INFORMATION_SCHEMA'.  See *note information-schema::.

        * 
          Use of *note 'LOAD DATA': load-data.  In many cases, this
          syntax is compatible with Oracle *note 'LOAD DATA': load-data.
          See *note load-data::.

        * Use of *note 'RENAME TABLE': rename-table.  See *note
          rename-table::.

        * Use of *note 'REPLACE': replace. instead of *note 'DELETE':
          delete. plus *note 'INSERT': insert.  See *note replace::.

        * Use of 'CHANGE COL_NAME', 'DROP COL_NAME', or *note 'DROP
          INDEX': drop-index, 'IGNORE' or 'RENAME' in *note 'ALTER
          TABLE': alter-table. statements.  Use of multiple 'ADD',
          'ALTER', 'DROP', or 'CHANGE' clauses in an *note 'ALTER
          TABLE': alter-table. statement.  See *note alter-table::.

        * Use of index names, indexes on a prefix of a column, and use
          of 'INDEX' or 'KEY' in *note 'CREATE TABLE': create-table.
          statements.  See *note create-table::.

        * Use of 'TEMPORARY' or 'IF NOT EXISTS' with *note 'CREATE
          TABLE': create-table.

        * Use of 'IF EXISTS' with *note 'DROP TABLE': drop-table. and
          *note 'DROP DATABASE': drop-database.

        * The capability of dropping multiple tables with a single *note
          'DROP TABLE': drop-table. statement.

        * The 'ORDER BY' and 'LIMIT' clauses of the *note 'UPDATE':
          update. and *note 'DELETE': delete. statements.

        * 'INSERT INTO TBL_NAME SET COL_NAME = ...' syntax.

        * The 'DELAYED' clause of the *note 'INSERT': insert. and *note
          'REPLACE': replace. statements.

        * The 'LOW_PRIORITY' clause of the *note 'INSERT': insert, *note
          'REPLACE': replace, *note 'DELETE': delete, and *note
          'UPDATE': update. statements.

        * Use of 'INTO OUTFILE' or 'INTO DUMPFILE' in *note 'SELECT':
          select. statements.  See *note select::.

        * Options such as 'STRAIGHT_JOIN' or 'SQL_SMALL_RESULT' in *note
          'SELECT': select. statements.

        * You don't need to name all selected columns in the 'GROUP BY'
          clause.  This gives better performance for some very specific,
          but quite normal queries.  See *note
          group-by-functions-and-modifiers::.

        * You can specify 'ASC' and 'DESC' with 'GROUP BY', not just
          with 'ORDER BY'.

        * The ability to set variables in a statement with the ':='
          assignment operator.  See *note user-variables::.

   * Data types

        * The *note 'MEDIUMINT': integer-types, *note 'SET': set, and
          *note 'ENUM': enum. data types, and the various *note 'BLOB':
          blob. and *note 'TEXT': blob. data types.

        * The 'AUTO_INCREMENT', 'BINARY', 'NULL', 'UNSIGNED', and
          'ZEROFILL' data type attributes.

   * Functions and operators

        * To make it easier for users who migrate from other SQL
          environments, MySQL Server supports aliases for many
          functions.  For example, all string functions support both
          standard SQL syntax and ODBC syntax.

        * MySQL Server understands the '||' and '&&' operators to mean
          logical OR and AND, as in the C programming language.  In
          MySQL Server, '||' and 'OR' are synonyms, as are '&&' and
          'AND'.  Because of this nice syntax, MySQL Server doesn't
          support the standard SQL '||' operator for string
          concatenation; use 'CONCAT()' instead.  Because 'CONCAT()'
          takes any number of arguments, it is easy to convert use of
          the '||' operator to MySQL Server.

        * Use of 'COUNT(DISTINCT VALUE_LIST)' where VALUE_LIST has more
          than one element.

        * String comparisons are case-insensitive by default, with sort
          ordering determined by the collation of the current character
          set, which is 'latin1' (cp1252 West European) by default.  To
          perform case-sensitive comparisons instead, you should declare
          your columns with the 'BINARY' attribute or use the 'BINARY'
          cast, which causes comparisons to be done using the underlying
          character code values rather than a lexical ordering.

        * 
          The '%' operator is a synonym for 'MOD()'.  That is, 'N % M'
          is equivalent to 'MOD(N,M)'.  '%' is supported for C
          programmers and for compatibility with PostgreSQL.

        * The '=', '<>', '<=', '<', '>=', '>', '<<', '>>', '<=>', 'AND',
          'OR', or 'LIKE' operators may be used in expressions in the
          output column list (to the left of the 'FROM') in *note
          'SELECT': select. statements.  For example:

               mysql> SELECT col1=1 AND col2=2 FROM my_table;

        * The 'LAST_INSERT_ID()' function returns the most recent
          'AUTO_INCREMENT' value.  See *note information-functions::.

        * 'LIKE' is permitted on numeric values.

        * The 'REGEXP' and 'NOT REGEXP' extended regular expression
          operators.

        * 'CONCAT()' or 'CHAR()' with one argument or more than two
          arguments.  (In MySQL Server, these functions can take a
          variable number of arguments.)

        * The 'BIT_COUNT()', 'CASE', 'ELT()', 'FROM_DAYS()', 'FORMAT()',
          'IF()', 'PASSWORD()', 'ENCRYPT()', 'MD5()', 'ENCODE()',
          'DECODE()', 'PERIOD_ADD()', 'PERIOD_DIFF()', 'TO_DAYS()', and
          'WEEKDAY()' functions.

        * Use of 'TRIM()' to trim substrings.  Standard SQL supports
          removal of single characters only.

        * The 'GROUP BY' functions 'STD()', 'BIT_OR()', 'BIT_AND()',
          'BIT_XOR()', and 'GROUP_CONCAT()'.  See *note
          group-by-functions-and-modifiers::.


File: manual.info.tmp,  Node: differences-from-ansi,  Next: constraints,  Prev: extensions-to-ansi,  Up: compatibility

1.7.2 MySQL Differences from Standard SQL
-----------------------------------------

* Menu:

* ansi-diff-select-into-table::  SELECT INTO TABLE Differences
* ansi-diff-update::             UPDATE Differences
* ansi-diff-foreign-keys::       FOREIGN KEY Constraint Differences
* ansi-diff-comments::           '-' as the Start of a Comment

We try to make MySQL Server follow the ANSI SQL standard and the ODBC
SQL standard, but MySQL Server performs operations differently in some
cases:

   * There are several differences between the MySQL and standard SQL
     privilege systems.  For example, in MySQL, privileges for a table
     are not automatically revoked when you delete a table.  You must
     explicitly issue a *note 'REVOKE': revoke. statement to revoke
     privileges for a table.  For more information, see *note revoke::.

   * The 'CAST()' function does not support cast to *note 'REAL':
     floating-point-types. or *note 'BIGINT': integer-types.  See *note
     cast-functions::.


File: manual.info.tmp,  Node: ansi-diff-select-into-table,  Next: ansi-diff-update,  Prev: differences-from-ansi,  Up: differences-from-ansi

1.7.2.1 SELECT INTO TABLE Differences
.....................................

MySQL Server doesn't support the 'SELECT ... INTO TABLE' Sybase SQL
extension.  Instead, MySQL Server supports the *note 'INSERT INTO ...
SELECT': insert-select. standard SQL syntax, which is basically the same
thing.  See *note insert-select::.  For example:

     INSERT INTO tbl_temp2 (fld_id)
         SELECT tbl_temp1.fld_order_id
         FROM tbl_temp1 WHERE tbl_temp1.fld_order_id > 100;

Alternatively, you can use *note 'SELECT ... INTO OUTFILE': select-into.
or *note 'CREATE TABLE ... SELECT': create-table.

You can use *note 'SELECT ... INTO': select. with user-defined
variables.  The same syntax can also be used inside stored routines
using cursors and local variables.  See *note select-into::.


File: manual.info.tmp,  Node: ansi-diff-update,  Next: ansi-diff-foreign-keys,  Prev: ansi-diff-select-into-table,  Up: differences-from-ansi

1.7.2.2 UPDATE Differences
..........................

If you access a column from the table to be updated in an expression,
*note 'UPDATE': update. uses the current value of the column.  The
second assignment in the following statement sets 'col2' to the current
(updated) 'col1' value, not the original 'col1' value.  The result is
that 'col1' and 'col2' have the same value.  This behavior differs from
standard SQL.

     UPDATE t1 SET col1 = col1 + 1, col2 = col1;


File: manual.info.tmp,  Node: ansi-diff-foreign-keys,  Next: ansi-diff-comments,  Prev: ansi-diff-update,  Up: differences-from-ansi

1.7.2.3 FOREIGN KEY Constraint Differences
..........................................

The MySQL implementation of foreign key constraints differs from the SQL
standard in the following key respects:

   * If there are several rows in the parent table with the same
     referenced key value, *note 'InnoDB': innodb-storage-engine.
     performs a foreign key check as if the other parent rows with the
     same key value do not exist.  For example, if you define a
     'RESTRICT' type constraint, and there is a child row with several
     parent rows, 'InnoDB' does not permit the deletion of any of the
     parent rows.

   * If 'ON UPDATE CASCADE' or 'ON UPDATE SET NULL' recurses to update
     the _same table_ it has previously updated during the same cascade,
     it acts like 'RESTRICT'.  This means that you cannot use
     self-referential 'ON UPDATE CASCADE' or 'ON UPDATE SET NULL'
     operations.  This is to prevent infinite loops resulting from
     cascaded updates.  A self-referential 'ON DELETE SET NULL', on the
     other hand, is possible, as is a self-referential 'ON DELETE
     CASCADE'.  Cascading operations may not be nested more than 15
     levels deep.

   * In an SQL statement that inserts, deletes, or updates many rows,
     foreign key constraints (like unique constraints) are checked
     row-by-row.  When performing foreign key checks, *note 'InnoDB':
     innodb-storage-engine. sets shared row-level locks on child or
     parent records that it must examine.  MySQL checks foreign key
     constraints immediately; the check is not deferred to transaction
     commit.  According to the SQL standard, the default behavior should
     be deferred checking.  That is, constraints are only checked after
     the _entire SQL statement_ has been processed.  This means that it
     is not possible to delete a row that refers to itself using a
     foreign key.

   * No storage engine, including 'InnoDB', recognizes or enforces the
     'MATCH' clause used in referential-integrity constraint
     definitions.  Use of an explicit 'MATCH' clause does not have the
     specified effect, and it causes 'ON DELETE' and 'ON UPDATE' clauses
     to be ignored.  Specifying the 'MATCH' should be avoided.

     The 'MATCH' clause in the SQL standard controls how 'NULL' values
     in a composite (multiple-column) foreign key are handled when
     comparing to a primary key in the referenced table.  MySQL
     essentially implements the semantics defined by 'MATCH SIMPLE',
     which permits a foreign key to be all or partially 'NULL'.  In that
     case, a (child table) row containing such a foreign key can be
     inserted even though it does not match any row in the referenced
     (parent) table.  (It is possible to implement other semantics using
     triggers.)

   * MySQL requires that the referenced columns be indexed for
     performance reasons.  However, MySQL does not enforce a requirement
     that the referenced columns be 'UNIQUE' or be declared 'NOT NULL'.

     A 'FOREIGN KEY' constraint that references a non-'UNIQUE' key is
     not standard SQL but rather an *note 'InnoDB':
     innodb-storage-engine. extension.

     The handling of foreign key references to nonunique keys or keys
     that contain 'NULL' values is not well defined for operations such
     as *note 'UPDATE': update. or 'DELETE CASCADE'.  You are advised to
     use foreign keys that reference only 'UNIQUE' (including 'PRIMARY')
     and 'NOT NULL' keys.

   * MySQL parses but ignores 'inline 'REFERENCES' specifications' (as
     defined in the SQL standard) where the references are defined as
     part of the column specification.  MySQL accepts 'REFERENCES'
     clauses only when specified as part of a separate 'FOREIGN KEY'
     specification.  For storage engines that do not support foreign
     keys (such as *note 'MyISAM': myisam-storage-engine.), MySQL Server
     parses and ignores foreign key specifications.

For information about foreign key constraints, see *note
create-table-foreign-keys::.


File: manual.info.tmp,  Node: ansi-diff-comments,  Prev: ansi-diff-foreign-keys,  Up: differences-from-ansi

1.7.2.4 '-' as the Start of a Comment
.....................................

Standard SQL uses the C syntax '/* this is a comment */' for comments,
and MySQL Server supports this syntax as well.  MySQL also support
extensions to this syntax that enable MySQL-specific SQL to be embedded
in the comment, as described in *note comments::.

Standard SQL uses ''--'' as a start-comment sequence.  MySQL Server uses
'#' as the start comment character.  MySQL Server also supports a
variant of the '--' comment style.  That is, the '--' start-comment
sequence must be followed by a space (or by a control character such as
a newline).  The space is required to prevent problems with
automatically generated SQL queries that use constructs such as the
following, where we automatically insert the value of the payment for
'payment':

     UPDATE account SET credit=credit-payment

Consider about what happens if 'payment' has a negative value such as
'-1':

     UPDATE account SET credit=credit--1

'credit--1' is a valid expression in SQL, but '--' is interpreted as the
start of a comment, part of the expression is discarded.  The result is
a statement that has a completely different meaning than intended:

     UPDATE account SET credit=credit

The statement produces no change in value at all.  This illustrates that
permitting comments to start with '--' can have serious consequences.

Using our implementation requires a space following the '--' for it to
be recognized as a start-comment sequence in MySQL Server.  Therefore,
'credit--1' is safe to use.

Another safe feature is that the *note 'mysql': mysql. command-line
client ignores lines that start with '--'.


File: manual.info.tmp,  Node: constraints,  Prev: differences-from-ansi,  Up: compatibility

1.7.3 How MySQL Deals with Constraints
--------------------------------------

* Menu:

* constraint-primary-key::       PRIMARY KEY and UNIQUE Index Constraints
* constraint-foreign-key::       FOREIGN KEY Constraints
* constraint-invalid-data::      Constraints on Invalid Data
* constraint-enum::              ENUM and SET Constraints

MySQL enables you to work both with transactional tables that permit
rollback and with nontransactional tables that do not.  Because of this,
constraint handling is a bit different in MySQL than in other DBMSs.  We
must handle the case when you have inserted or updated a lot of rows in
a nontransactional table for which changes cannot be rolled back when an
error occurs.

The basic philosophy is that MySQL Server tries to produce an error for
anything that it can detect while parsing a statement to be executed,
and tries to recover from any errors that occur while executing the
statement.  We do this in most cases, but not yet for all.

The options MySQL has when an error occurs are to stop the statement in
the middle or to recover as well as possible from the problem and
continue.  By default, the server follows the latter course.  This
means, for example, that the server may coerce invalid values to the
closest valid values.

Several SQL mode options are available to provide greater control over
handling of bad data values and whether to continue statement execution
or abort when errors occur.  Using these options, you can configure
MySQL Server to act in a more traditional fashion that is like other
DBMSs that reject improper input.  The SQL mode can be set globally at
server startup to affect all clients.  Individual clients can set the
SQL mode at runtime, which enables each client to select the behavior
most appropriate for its requirements.  See *note sql-mode::.

The following sections describe how MySQL Server handles different types
of constraints.


File: manual.info.tmp,  Node: constraint-primary-key,  Next: constraint-foreign-key,  Prev: constraints,  Up: constraints

1.7.3.1 PRIMARY KEY and UNIQUE Index Constraints
................................................

Normally, errors occur for data-change statements (such as *note
'INSERT': insert. or *note 'UPDATE': update.) that would violate
primary-key, unique-key, or foreign-key constraints.  If you are using a
transactional storage engine such as 'InnoDB', MySQL automatically rolls
back the statement.  If you are using a nontransactional storage engine,
MySQL stops processing the statement at the row for which the error
occurred and leaves any remaining rows unprocessed.

MySQL supports an 'IGNORE' keyword for *note 'INSERT': insert, *note
'UPDATE': update, and so forth.  If you use it, MySQL ignores
primary-key or unique-key violations and continues processing with the
next row.  See the section for the statement that you are using (*note
insert::, *note update::, and so forth).

You can get information about the number of rows actually inserted or
updated with the *note 'mysql_info()': mysql-info. C API function.  You
can also use the *note 'SHOW WARNINGS': show-warnings. statement.  See
*note mysql-info::, and *note show-warnings::.

Only 'InnoDB' tables support foreign keys.  See *note
create-table-foreign-keys::.


File: manual.info.tmp,  Node: constraint-foreign-key,  Next: constraint-invalid-data,  Prev: constraint-primary-key,  Up: constraints

1.7.3.2 FOREIGN KEY Constraints
...............................

Foreign keys let you cross-reference related data across tables, and
foreign key constraints help keep this spread-out data consistent.

MySQL supports 'ON UPDATE' and 'ON DELETE' foreign key references in
*note 'CREATE TABLE': create-table. and *note 'ALTER TABLE':
alter-table. statements.  The available referential actions are
'RESTRICT' (the default), 'CASCADE', 'SET NULL', and 'NO ACTION'.

'SET DEFAULT' is also supported by the MySQL Server but is currently
rejected as invalid by *note 'InnoDB': innodb-storage-engine.  Since
MySQL does not support deferred constraint checking, 'NO ACTION' is
treated as 'RESTRICT'.  For the exact syntax supported by MySQL for
foreign keys, see *note create-table-foreign-keys::.

'MATCH FULL', 'MATCH PARTIAL', and 'MATCH SIMPLE' are allowed, but their
use should be avoided, as they cause the MySQL Server to ignore any 'ON
DELETE' or 'ON UPDATE' clause used in the same statement.  'MATCH'
options do not have any other effect in MySQL, which in effect enforces
'MATCH SIMPLE' semantics full-time.

MySQL requires that foreign key columns be indexed; if you create a
table with a foreign key constraint but no index on a given column, an
index is created.

You can obtain information about foreign keys from the *note
'INFORMATION_SCHEMA.KEY_COLUMN_USAGE': key-column-usage-table. table.
An example of a query against this table is shown here:

     mysql> SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME
          > FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
          > WHERE REFERENCED_TABLE_SCHEMA IS NOT NULL;
     +--------------+---------------+-------------+-----------------+
     | TABLE_SCHEMA | TABLE_NAME    | COLUMN_NAME | CONSTRAINT_NAME |
     +--------------+---------------+-------------+-----------------+
     | fk1          | myuser        | myuser_id   | f               |
     | fk1          | product_order | customer_id | f2              |
     | fk1          | product_order | product_id  | f1              |
     +--------------+---------------+-------------+-----------------+
     3 rows in set (0.01 sec)

Only 'InnoDB' tables support foreign keys.  See *note
create-table-foreign-keys::.  'InnoDB'.


File: manual.info.tmp,  Node: constraint-invalid-data,  Next: constraint-enum,  Prev: constraint-foreign-key,  Up: constraints

1.7.3.3 Constraints on Invalid Data
...................................

By default, MySQL is forgiving of invalid or improper data values and
coerces them to valid values for data entry.  However, you can enable
strict SQL mode such that the server rejects invalid values and aborts
the statement in which they occur.  See *note sql-mode::.

This section describes the default (forgiving) behavior of MySQL, as
well as the strict SQL mode and how it differs.

If you are not using strict mode, then whenever you insert an
'incorrect' value into a column, such as a 'NULL' into a 'NOT NULL'
column or a too-large numeric value into a numeric column, MySQL sets
the column to the 'best possible value' instead of producing an error:
The following rules describe in more detail how this works:

   * If you try to store an out of range value into a numeric column,
     MySQL Server instead stores zero, the smallest possible value, or
     the largest possible value, whichever is closest to the invalid
     value.

   * For strings, MySQL stores either the empty string or as much of the
     string as can be stored in the column.

   * If you try to store a string that does not start with a number into
     a numeric column, MySQL Server stores 0.

   * Invalid values for *note 'ENUM': enum. and *note 'SET': set.
     columns are handled as described in *note constraint-enum::.

   * MySQL permits you to store certain incorrect date values into *note
     'DATE': datetime. and *note 'DATETIME': datetime. columns (such as
     ''2000-02-31'' or ''2000-02-00'').  In this case, when an
     application has not enabled strict SQL mode, it up to the
     application to validate the dates before storing them.  If MySQL
     can store a date value and retrieve exactly the same value, MySQL
     stores it as given.  If the date is totally wrong (outside the
     server's ability to store it), the special 'zero' date value
     ''0000-00-00'' is stored in the column instead.

   * If you try to store 'NULL' into a column that doesn't take 'NULL'
     values, an error occurs for single-row *note 'INSERT': insert.
     statements.  For multiple-row *note 'INSERT': insert. statements or
     for *note 'INSERT INTO ... SELECT': insert-select. statements,
     MySQL Server stores the implicit default value for the column data
     type.  In general, this is '0' for numeric types, the empty string
     ('''') for string types, and the 'zero' value for date and time
     types.  Implicit default values are discussed in *note
     data-type-defaults::.

   * If an *note 'INSERT': insert. statement specifies no value for a
     column, MySQL inserts its default value if the column definition
     includes an explicit 'DEFAULT' clause.  If the definition has no
     such 'DEFAULT' clause, MySQL inserts the implicit default value for
     the column data type.

The reason for using the preceding rules when strict mode is not in
effect is that we cannot check these conditions until the statement has
begun executing.  We cannot just roll back if we encounter a problem
after updating a few rows, because the storage engine may not support
rollback.  The option of terminating the statement is not that good; in
this case, the update would be 'half done,' which is probably the worst
possible scenario.  In this case, it is better to 'do the best you can'
and then continue as if nothing happened.

You can select stricter treatment of input values by using the
'STRICT_TRANS_TABLES' or 'STRICT_ALL_TABLES' SQL modes:

     SET sql_mode = 'STRICT_TRANS_TABLES';
     SET sql_mode = 'STRICT_ALL_TABLES';

'STRICT_TRANS_TABLES' enables strict mode for transactional storage
engines, and also to some extent for nontransactional engines.  It works
like this:

   * For transactional storage engines, bad data values occurring
     anywhere in a statement cause the statement to abort and roll back.

   * For nontransactional storage engines, a statement aborts if the
     error occurs in the first row to be inserted or updated.  (When the
     error occurs in the first row, the statement can be aborted to
     leave the table unchanged, just as for a transactional table.)
     Errors in rows after the first do not abort the statement, because
     the table has already been changed by the first row.  Instead, bad
     data values are adjusted and result in warnings rather than errors.
     In other words, with 'STRICT_TRANS_TABLES', a wrong value causes
     MySQL to roll back all updates done so far, if that can be done
     without changing the table.  But once the table has been changed,
     further errors result in adjustments and warnings.

For even stricter checking, enable 'STRICT_ALL_TABLES'.  This is the
same as 'STRICT_TRANS_TABLES' except that for nontransactional storage
engines, errors abort the statement even for bad data in rows following
the first row.  This means that if an error occurs partway through a
multiple-row insert or update for a nontransactional table, a partial
update results.  Earlier rows are inserted or updated, but those from
the point of the error on are not.  To avoid this for nontransactional
tables, either use single-row statements or else use
'STRICT_TRANS_TABLES' if conversion warnings rather than errors are
acceptable.  To avoid problems in the first place, do not use MySQL to
check column content.  It is safest (and often faster) to let the
application ensure that it passes only valid values to the database.

With either of the strict mode options, you can cause errors to be
treated as warnings by using *note 'INSERT IGNORE': insert. or 'UPDATE
IGNORE' rather than *note 'INSERT': insert. or *note 'UPDATE': update.
without 'IGNORE'.


File: manual.info.tmp,  Node: constraint-enum,  Prev: constraint-invalid-data,  Up: constraints

1.7.3.4 ENUM and SET Constraints
................................

*note 'ENUM': enum. and *note 'SET': set. columns provide an efficient
way to define columns that can contain only a given set of values.  See
*note enum::, and *note set::.

With strict mode enabled (see *note sql-mode::), the definition of a
*note 'ENUM': enum. or *note 'SET': set. column acts as a constraint on
values entered into the column.  An error occurs for values that do not
satisfy these conditions:

   * An *note 'ENUM': enum. value must be one of those listed in the
     column definition, or the internal numeric equivalent thereof.  The
     value cannot be the error value (that is, 0 or the empty string).
     For a column defined as *note 'ENUM('a','b','c')': enum, values
     such as '''', ''d'', or ''ax'' are invalid and are rejected.

   * A *note 'SET': set. value must be the empty string or a value
     consisting only of the values listed in the column definition
     separated by commas.  For a column defined as *note
     'SET('a','b','c')': set, values such as ''d'' or ''a,b,c,d'' are
     invalid and are rejected.

Errors for invalid values can be suppressed in strict mode if you use
*note 'INSERT IGNORE': insert. or 'UPDATE IGNORE'.  In this case, a
warning is generated rather than an error.  For *note 'ENUM': enum, the
value is inserted as the error member ('0').  For *note 'SET': set, the
value is inserted as given except that any invalid substrings are
deleted.  For example, ''a,x,b,y'' results in a value of ''a,b''.


File: manual.info.tmp,  Node: credits,  Prev: compatibility,  Up: introduction

1.8 Credits
===========

* Menu:

* contributors::                 Contributors to MySQL
* documenters-translators::      Documenters and translators
* packages::                     Packages that support MySQL
* tools-used-to-create-mysql::   Tools that were used to create MySQL
* supporters::                   Supporters of MySQL

The following sections list developers, contributors, and supporters
that have helped to make MySQL what it is today.


File: manual.info.tmp,  Node: contributors,  Next: documenters-translators,  Prev: credits,  Up: credits

1.8.1 Contributors to MySQL
---------------------------

Although Oracle Corporation and/or its affiliates own all copyrights in
the 'MySQL server' and the 'MySQL manual', we wish to recognize those
who have made contributions of one kind or another to the 'MySQL
distribution'.  Contributors are listed here, in somewhat random order:

   * Gianmassimo Vigazzola <qwerg@mbox.vol.it> or <qwerg@tin.it>

     The initial port to Win32/NT.

   * Per Eric Olsson

     For constructive criticism and real testing of the dynamic record
     format.

   * Irena Pancirov <irena@mail.yacc.it>

     Win32 port with Borland compiler.  'mysqlshutdown.exe' and
     'mysqlwatch.exe'.

   * David J. Hughes

     For the effort to make a shareware SQL database.  At TcX, the
     predecessor of MySQL AB, we started with 'mSQL', but found that it
     couldn't satisfy our purposes so instead we wrote an SQL interface
     to our application builder Unireg.  *note 'mysqladmin': mysqladmin.
     and *note 'mysql': mysql. client are programs that were largely
     influenced by their 'mSQL' counterparts.  We have put a lot of
     effort into making the MySQL syntax a superset of 'mSQL'.  Many of
     the API's ideas are borrowed from 'mSQL' to make it easy to port
     free 'mSQL' programs to the MySQL API. The MySQL software doesn't
     contain any code from 'mSQL'.  Two files in the distribution
     ('client/insert_test.c' and 'client/select_test.c') are based on
     the corresponding (noncopyrighted) files in the 'mSQL'
     distribution, but are modified as examples showing the changes
     necessary to convert code from 'mSQL' to MySQL Server.  ('mSQL' is
     copyrighted David J. Hughes.)

   * Patrick Lynch

     For helping us acquire <http://www.mysql.com/>.

   * Fred Lindberg

     For setting up qmail to handle the MySQL mailing list and for the
     incredible help we got in managing the MySQL mailing lists.

   * Igor Romanenko <igor@frog.kiev.ua>

     *note 'mysqldump': mysqldump. (previously 'msqldump', but ported
     and enhanced by Monty).

   * Yuri Dario

     For keeping up and extending the MySQL OS/2 port.

   * Tim Bunce

     Author of *note 'mysqlhotcopy': mysqlhotcopy.

   * Zarko Mocnik <zarko.mocnik@dem.si>

     Sorting for Slovenian language.

   * "TAMITO" <tommy@valley.ne.jp>

     The '_MB' character set macros and the ujis and sjis character
     sets.

   * Joshua Chamas <joshua@chamas.com>

     Base for concurrent insert, extended date syntax, debugging on NT,
     and answering on the MySQL mailing list.

   * Yves Carlier <Yves.Carlier@rug.ac.be>

     *note 'mysqlaccess': mysqlaccess, a program to show the access
     rights for a user.

   * Rhys Jones <rhys@wales.com> (And GWE Technologies Limited)

     For one of the early JDBC drivers.

   * Dr Xiaokun Kelvin ZHU <X.Zhu@brad.ac.uk>

     Further development of one of the early JDBC drivers and other
     MySQL-related Java tools.

   * James Cooper <pixel@organic.com>

     For setting up a searchable mailing list archive at his site.

   * Rick Mehalick <Rick_Mehalick@i-o.com>

     For 'xmysql', a graphical X client for MySQL Server.

   * Doug Sisk <sisk@wix.com>

     For providing RPM packages of MySQL for Red Hat Linux.

   * Diemand Alexander V. <axeld@vial.ethz.ch>

     For providing RPM packages of MySQL for Red Hat Linux-Alpha.

   * Antoni Pamies Olive <toni@readysoft.es>

     For providing RPM versions of a lot of MySQL clients for Intel and
     SPARC.

   * Jay Bloodworth <jay@pathways.sde.state.sc.us>

     For providing RPM versions for MySQL 3.21.

   * David Sacerdote <davids@secnet.com>

     Ideas for secure checking of DNS host names.

   * Wei-Jou Chen <jou@nematic.ieo.nctu.edu.tw>

     Some support for Chinese(BIG5) characters.

   * Wei He <hewei@mail.ied.ac.cn>

     A lot of functionality for the Chinese(GBK) character set.

   * Jan Pazdziora <adelton@fi.muni.cz>

     Czech sorting order.

   * Zeev Suraski <bourbon@netvision.net.il>

     'FROM_UNIXTIME()' time formatting, 'ENCRYPT()' functions, and
     'bison' advisor.  Active mailing list member.

   * Luuk de Boer <luuk@wxs.nl>

     Ported (and extended) the benchmark suite to 'DBI'/'DBD'.  Have
     been of great help with 'crash-me' and running benchmarks.  Some
     new date functions.  The *note 'mysql_setpermission':
     mysql-setpermission. script.

   * Alexis Mikhailov <root@medinf.chuvashia.su>

     User-defined functions (UDFs); *note 'CREATE FUNCTION':
     create-function. and *note 'DROP FUNCTION': drop-function.

   * Andreas F. Bobak <bobak@relog.ch>

     The 'AGGREGATE' extension to user-defined functions.

   * Ross Wakelin <R.Wakelin@march.co.uk>

     Help to set up InstallShield for MySQL-Win32.

   * Jethro Wright III <jetman@li.net>

     The 'libmysql.dll' library.

   * James Pereria <jpereira@iafrica.com>

     Mysqlmanager, a Win32 GUI tool for administering MySQL Servers.

   * Curt Sampson <cjs@portal.ca>

     Porting of MIT-pthreads to NetBSD/Alpha and NetBSD 1.3/i386.

   * Martin Ramsch <m.ramsch@computer.org>

     Examples in the MySQL Tutorial.

   * Steve Harvey

     For making *note 'mysqlaccess': mysqlaccess. more secure.

   * Konark IA-64 Centre of Persistent Systems Private Limited

     Help with the Win64 port of the MySQL server.

   * Albert Chin-A-Young.

     Configure updates for Tru64, large file support and better TCP
     wrappers support.

   * John Birrell

     Emulation of 'pthread_mutex()' for OS/2.

   * Benjamin Pflugmann

     Extended 'MERGE' tables to handle 'INSERTS'.  Active member on the
     MySQL mailing lists.

   * Jocelyn Fournier

     Excellent spotting and reporting innumerable bugs (especially in
     the MySQL 4.1 subquery code).

   * Marc Liyanage

     Maintaining the OS X packages and providing invaluable feedback on
     how to create OS X packages.

   * Robert Rutherford

     Providing invaluable information and feedback about the QNX port.

   * Previous developers of NDB Cluster

     Lots of people were involved in various ways summer students,
     master thesis students, employees.  In total more than 100 people
     so too many to mention here.  Notable name is Ataullah Dabaghi who
     up until 1999 contributed around a third of the code base.  A
     special thanks also to developers of the AXE system which provided
     much of the architectural foundations for NDB Cluster with blocks,
     signals and crash tracing functionality.  Also credit should be
     given to those who believed in the ideas enough to allocate of
     their budgets for its development from 1992 to present time.

   * Google Inc.

     We wish to recognize Google Inc.  for contributions to the MySQL
     distribution: Mark Callaghan's SMP Performance patches and other
     patches.

Other contributors, bugfinders, and testers: James H. Thompson, Maurizio
Menghini, Wojciech Tryc, Luca Berra, Zarko Mocnik, Wim Bonis, Elmar
Haneke, <jehamby@lightside>, <psmith@BayNetworks.com>,
<duane@connect.com.au>, Ted Deppner <ted@psyber.com>, Mike Simons,
Jaakko Hyvatti.

And lots of bug report/patches from the folks on the mailing list.

A big tribute goes to those that help us answer questions on the MySQL
mailing lists:

   * Daniel Koch <dkoch@amcity.com>

     Irix setup.

   * Luuk de Boer <luuk@wxs.nl>

     Benchmark questions.

   * Tim Sailer <tps@users.buoy.com>

     'DBD::mysql' questions.

   * Boyd Lynn Gerber <gerberb@zenez.com>

     SCO-related questions.

   * Richard Mehalick <RM186061@shellus.com>

     'xmysql'-related questions and basic installation questions.

   * Zeev Suraski <bourbon@netvision.net.il>

     Apache module configuration questions (log & auth), PHP-related
     questions, SQL syntax-related questions and other general
     questions.

   * Francesc Guasch <frankie@citel.upc.es>

     General questions.

   * Jonathan J Smith <jsmith@wtp.net>

     Questions pertaining to OS-specifics with Linux, SQL syntax, and
     other things that might need some work.

   * David Sklar <sklar@student.net>

     Using MySQL from PHP and Perl.

   * Alistair MacDonald <A.MacDonald@uel.ac.uk>

     Is flexible and can handle Linux and perhaps HP-UX.

   * John Lyon <jlyon@imag.net>

     Questions about installing MySQL on Linux systems, using either
     '.rpm' files or compiling from source.

   * Lorvid Ltd.  <lorvid@WOLFENET.com>

     Simple billing/license/support/copyright issues.

   * Patrick Sherrill <patrick@coconet.com>

     ODBC and VisualC++ interface questions.

   * Randy Harmon <rjharmon@uptimecomputers.com>

     'DBD', Linux, some SQL syntax questions.


File: manual.info.tmp,  Node: documenters-translators,  Next: packages,  Prev: contributors,  Up: credits

1.8.2 Documenters and translators
---------------------------------

The following people have helped us with writing the MySQL documentation
and translating the documentation or error messages in MySQL.

   * Paul DuBois

     Ongoing help with making this manual correct and understandable.
     That includes rewriting Monty's and David's attempts at English
     into English as other people know it.

   * Kim Aldale

     Helped to rewrite Monty's and David's early attempts at English
     into English.

   * Michael J. Miller Jr.  <mke@terrapin.turbolift.com>

     For the first MySQL manual.  And a lot of spelling/language fixes
     for the FAQ (that turned into the MySQL manual a long time ago).

   * Yan Cailin

     First translator of the MySQL Reference Manual into simplified
     Chinese in early 2000 on which the Big5 and HK coded versions were
     based.

   * Jay Flaherty <fty@mediapulse.com>

     Big parts of the Perl 'DBI'/'DBD' section in the manual.

   * Paul Southworth <pauls@etext.org>, Ray Loyzaga <yar@cs.su.oz.au>

     Proof-reading of the Reference Manual.

   * Therrien Gilbert <gilbert@ican.net>, Jean-Marc Pouyot
     <jmp@scalaire.fr>

     French error messages.

   * Petr Snajdr, <snajdr@pvt.net>

     Czech error messages.

   * Jaroslaw Lewandowski <jotel@itnet.com.pl>

     Polish error messages.

   * Miguel Angel Fernandez Roiz

     Spanish error messages.

   * Roy-Magne Mo <rmo@www.hivolda.no>

     Norwegian error messages and testing of MySQL 3.21.xx.

   * Timur I. Bakeyev <root@timur.tatarstan.ru>

     Russian error messages.

   * <brenno@dewinter.com> & Filippo Grassilli <phil@hyppo.com>

     Italian error messages.

   * Dirk Munzinger <dirk@trinity.saar.de>

     German error messages.

   * Billik Stefan <billik@sun.uniag.sk>

     Slovak error messages.

   * Stefan Saroiu <tzoompy@cs.washington.edu>

     Romanian error messages.

   * Peter Feher

     Hungarian error messages.

   * Roberto M. Serqueira

     Portuguese error messages.

   * Carsten H. Pedersen

     Danish error messages.

   * Arjen Lentz

     Dutch error messages, completing earlier partial translation (also
     work on consistency and spelling).


File: manual.info.tmp,  Node: packages,  Next: tools-used-to-create-mysql,  Prev: documenters-translators,  Up: credits

1.8.3 Packages that support MySQL
---------------------------------

The following is a list of creators/maintainers of some of the most
important API/packages/applications that a lot of people use with MySQL.

We cannot list every possible package here because the list would then
be way to hard to maintain.  For other packages, please refer to the
software portal at <http://solutions.mysql.com/software/>.

   * Tim Bunce, Alligator Descartes

     For the 'DBD' (Perl) interface.

   * Andreas Koenig <a.koenig@mind.de>

     For the Perl interface for MySQL Server.

   * Jochen Wiedmann <wiedmann@neckar-alb.de>

     For maintaining the Perl 'DBD::mysql' module.

   * Eugene Chan <eugene@acenet.com.sg>

     For porting PHP for MySQL Server.

   * Georg Richter

     MySQL 4.1 testing and bug hunting.  New PHP 5.0 'mysqli' extension
     (API) for use with MySQL 4.1 and up.

   * Giovanni Maruzzelli <maruzz@matrice.it>

     For porting iODBC (Unix ODBC).

   * Xavier Leroy <Xavier.Leroy@inria.fr>

     The author of LinuxThreads (used by the MySQL Server on Linux).


File: manual.info.tmp,  Node: tools-used-to-create-mysql,  Next: supporters,  Prev: packages,  Up: credits

1.8.4 Tools that were used to create MySQL
------------------------------------------

The following is a list of some of the tools we have used to create
MySQL. We use this to express our thanks to those that has created them
as without these we could not have made MySQL what it is today.

   * Free Software Foundation

     From whom we got an excellent compiler ('gcc'), an excellent
     debugger ('gdb' and the 'libc' library (from which we have borrowed
     'strto.c' to get some code working in Linux).

   * Free Software Foundation & The XEmacs development team

     For a really great editor/environment.

   * Julian Seward

     Author of 'valgrind', an excellent memory checker tool that has
     helped us find a lot of otherwise hard to find bugs in MySQL.

   * Dorothea Lu"tkehaus and Andreas Zeller

     For 'DDD' (The Data Display Debugger) which is an excellent
     graphical front end to 'gdb').


File: manual.info.tmp,  Node: supporters,  Prev: tools-used-to-create-mysql,  Up: credits
